<?php

namespace App\CmsBundle\Controller;

use App\CmsBundle\Classes\QRcode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

// Injection
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

use App\CmsBundle\Util\Mailer;
use Scheb\TwoFactorBundle\Security\TwoFactor\Provider\Totp\TotpAuthenticatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

class LoginController extends StorageController
{

    protected $breadcrumbs = null;
    protected $Settings = null;
    private $tokenManager;

	private $passwordEncoder;

    public function __construct(TranslatorInterface $translator, ContainerInterface $containerInterface, Mailer $mailer, UserPasswordEncoderInterface $passwordEncoder, CsrfTokenManagerInterface $tokenManager = null)
    {
		parent::__construct($translator, $containerInterface, $mailer);

        $this->passwordEncoder = $passwordEncoder;
        $this->tokenManager = $tokenManager;
    }

    /**
     * @Route("/admin/login", name="admin_login")
     * @Template()
     */
    public function loginAction(Request $request)
    {
        parent::init($request);

        // Redirect if logged in
        $securityContext = $this->containerInterface->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('admin'));
        }

        /** @var $session \Symfony\Component\HttpFoundation\Session\Session */
        $session = $request->getSession();

        $em = $this->getDoctrine()->getManager();
        $Settings = $em->getRepository('CmsBundle:Settings')->findByLanguage($this->language);

        $authErrorKey = Security::AUTHENTICATION_ERROR;
        $lastUsernameKey = Security::LAST_USERNAME;

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has($authErrorKey)) {
            $error = $request->attributes->get($authErrorKey);
        } elseif (null !== $session && $session->has($authErrorKey)) {
            $error = $session->get($authErrorKey);
            $session->remove($authErrorKey);
        } else {
            $error = null;
        }

        if (!$error instanceof AuthenticationException) {
            $error = null; // The value does not come from the security component.
        }
//dump($error);die();
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get($lastUsernameKey);

        $csrfToken = $this->containerInterface->get('security.csrf.token_manager')->getToken('authenticate')->getValue();
        
        return $this->attributes(array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'csrf_token'    => $csrfToken,
        ));
    }

    /**
     * @Route("/admin/setup2fa", name="admin_setup2fa")
     * @Template()
     */
    public function setup2fa(Request $request, TotpAuthenticatorInterface $totpAuthenticator, Session $session)
    {
        parent::init($request);
        $User = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        $invalidCode = false;
        if(!empty($_POST['2fa-code'])){
            if($totpAuthenticator->checkCode($this->getUser(), $_POST['2fa-code'])){
                $session->getFlashBag()->add(
                    'success',
                    '2FA is succesvol ingeschakeld!'
                );
                $hashes = [];
                for($i = 0; $i < 10; $i++){
                    $hash = strtoupper(substr(md5(rand(10000000,99999999) . md5(time()) . md5($User->getId()) . rand(10000000,99999999)), 0, 6));
                    $hashes[] = $hash;
                }
                $User->setBackUpCodes($hashes);
                $em->persist($User);
                $em->flush();

                return $this->redirectToRoute('admin');
            }else{
                $invalidCode = true;
            }
        }

        $User->setTotpSecret($totpAuthenticator->generateSecret());
        $em->persist($User);
        $em->flush();

        $qr_file = '/tmp/qr-' . $User->getId() . '.png';
        $qrdata = $this->containerInterface->get("scheb_two_factor.security.totp_authenticator")->getQRContent($User);
        $qr = new QRcode();
        $qr->png($qrdata, $qr_file, QR_ECLEVEL_L, 6, 4);
        $type = pathinfo($qr_file, PATHINFO_EXTENSION);
        $data = file_get_contents($qr_file);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        return $this->attributes(array(
            'User' => $User,
            'base64' => $base64,
            'invalidCode' => $invalidCode,
        ));
    }

    /**
     * @Route("/admin/lostpassword", name="admin_lostpassword")
     * @Template()
     */
    public function lostpasswordAction(Request $request)
    {
        parent::init($request);

		$em = $this->getDoctrine()->getManager();

        $status = null;
        $send = false;
        $unknownUser = false;
        $changed = false;
		$em = $this->getDoctrine()->getManager();

        if(!empty($params[0])){
            $hash = $params[0];
            $User = $this->getDoctrine()->getRepository(User::class)->findOneBy(['user_hash' => $hash]);
            if(!empty($User)){
                $now = new \DateTime();
                $date_expire = $User->getUserHashExpire();
                if($date_expire > $now){
                    // Not expired
                    $status = 'allowed';

                    if(!empty($_POST['plainPassword'])){
                        $first = $_POST['plainPassword']['first'];
                        $second = $_POST['plainPassword']['second'];
                        if($first !== $second){
                            $status = 'not_same';
                        }else{
                            // All done, move on
                            $em = $this->getDoctrine()->getManager();
                            $User->setPassword($this->passwordEncoder->encodePassword($User, $first));
                            $User->setUserHash(null);
                            $em->persist($User);
                            $em->flush();

                            $status = 'changed';
                            $changed = true;
                        }
                    }
                }else{
                    // Expired
                    $status = 'expired';
                }
            }else{
                // user not found
                $status = 'user_not_found';
            }
        }else{
            if(!empty($_POST)){
                $User = $em->getRepository('CmsBundle:User')->findUserByUsernameOrEmail($request->get('_username'));
                if($User !== null){

                    // Generate hash and timeout
                    $dt = new \DateTime();
                    $dt->add(new \DateInterval('PT1H'));
                    $hash = strtoupper(substr(md5(rand(10000000,99999999) . md5(time()) . md5($User->getId()) . rand(10000000,99999999)), 0, 12));

                    $url = $this->generateUrl('homepage', [], UrlGeneratorInterface::ABSOLUTE_URL) . 'wachtwoord-vergeten/' . $hash;

                    $User->setUserHash($hash);
                    $User->setUserHashExpire($dt);

                    $em->persist($User);
                    $em->flush();

                    /**
                    * Register mail to customer
                    */
                    $msg = '
                        <p>Beste ' . $User->getFirstname() . ',</p>
                        <p>
                            De volgende link kan worden gebruikt om het wachtwoord te herstellen:<br/>
                        </p>
                        <p>
                            <a href="' . $url . '">' . $url . '</a>
                        </p>
                        <p>De link is 1 uur geldig.</p>
                    ';
                    $mailer = clone $this->mailer;
                    $mailer->init();
                    $mailer->setSubject('Wachtwoord herstellen')
                            ->setTo($User->getEmail())
                            // ->setTo('jelle@beyonit.nl')
                            ->setTwigBody('emails/notify.html.twig',
                            [
                                'label' => '',
                                'message' => $msg
                            ])
                            ->setPlainBody(strip_tags($msg));
                    $send = $mailer->execute_forced();
                    
                    $send = true;
                    $changed = true;
                }else{
                    $unknownUser = true;
                }
            }
        }

        return $this->attributes(array(
            'changed' => $changed,
            'unknownUser' => $unknownUser,
        ));
    }

    /**
     * @Route("/admin/login_check", name="admin_login_check")
     */
    public function loginCheckAction(Request $request) {
        parent::init($request);

        return $this->redirect($this->generateUrl('admin'));
    }

    /**
     * @Route("/admin/logout", name="admin_logout")
     */
    public function logoutAction(Request $request) {
        parent::init($request);

        //clear the token, cancel session and redirect
        $this->containerInterface->get('security.context')->setToken(null);
        $this->containerInterface->get('request')->getSession()->invalidate();
        return $this->redirect($this->generateUrl('admin_login'));
    }
}
