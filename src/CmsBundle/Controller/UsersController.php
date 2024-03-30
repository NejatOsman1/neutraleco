<?php

namespace App\CmsBundle\Controller;

use App\CmsBundle\Classes\QRcode;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

// Injection
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Validator\Constraints as Assert;

use App\CmsBundle\Entity\User;
use App\CmsBundle\Entity\Settings;

use App\CmsBundle\Entity\Log;
use App\CmsBundle\Util\Mailer;
use Scheb\TwoFactorBundle\Security\TwoFactor\Provider\Totp\TotpAuthenticatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class UsersController extends StorageController
{
	private $passwordEncoder;

    public function __construct(TranslatorInterface $translator, ContainerInterface $containerInterface, Mailer $mailer, UserPasswordEncoderInterface $passwordEncoder)
    {
		parent::__construct($translator, $containerInterface, $mailer);

        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/admin/users/filter/{page}", name="admin_users_filter", requirements={"page": "\d+"})
     * @Template()
     */
    public function filterAction(Request $request, $page = 1)
    {
        parent::init($request);

        $hasWebshop = in_array('WebshopBundle', $this->installed);

        $filter = $request->get('filter');
        if(!empty($filter['q'])){
            $filter['q'] = explode(' ', $filter['q']);
        }

        if(!empty($_GET['role'])){
            $filter['role'] = $_GET['role'];
        }

        $offset = 0;
        $limit  = (int)(!empty($_GET['pp']) ? $_GET['pp'] : 20);

        // if($hasWebshop && $_GET['role'] == 'webshop_users'){
        //     $dql_results = $this->getDoctrine()->getRepository('TrinityWebshopBundle:User')->filter(false, null, null, null, $filter);
        //     $count = count($dql_results);
        // }else{
            $dql_results = $this->getDoctrine()->getRepository('CmsBundle:User')->filter(false, null, null, $filter);
            if($_GET['role'] == 'user'){
                foreach($dql_results as $index => $Entry){
                    // if($hasWebshop){
                    //     $WebshopUser = $this->getDoctrine()->getRepository('TrinityWebshopBundle:User')->findByUser($Entry);
                    //     if(count($WebshopUser)){
                    //         unset($dql_results[$index]);
                    //     }
                    // }
                }
            }
            $count = count($dql_results);
        // }

        /*if($hasWebshop && $_GET['role'] == 'webshop_users'){
            $count = $this->getDoctrine()->getRepository('TrinityWebshopBundle:User')->filter(true, null, $offset, $limit, $filter);
        }else{
            $count = $this->getDoctrine()->getRepository('CmsBundle:User')->filter(true, $offset, $limit, $filter, $hasWebshop);
        }*/

        $pages = ceil($count / $limit);
        if($pages == 0) $pages = 1;
        if($page > $pages){ $page = $pages; }
        if($pages < 1){ $pages = 1; }
        $offset = (($page * $limit) - $limit);

        $d = new \DateTime();

        $results = [];

        /*if($hasWebshop && $_GET['role'] == 'webshop_users'){
            $dql_results = $this->getDoctrine()->getRepository('TrinityWebshopBundle:User')->filter(false, null, $offset, $limit, $filter);
        }else{
            $dql_results = $this->getDoctrine()->getRepository('CmsBundle:User')->filter(false, $offset, $limit, $filter);
        }*/

        if($hasWebshop && $_GET['role'] == 'webshop_users'){
            $dql_results = $this->getDoctrine()->getRepository('TrinityWebshopBundle:User')->filter(false, null, $offset, $limit, $filter);
        }else{
            $dql_results = $this->getDoctrine()->getRepository('CmsBundle:User')->filter(false, $offset, $limit, $filter);
            if($_GET['role'] == 'user'){
                foreach($dql_results as $index => $Entry){
                    // if($hasWebshop){
                    //     $WebshopUser = $this->getDoctrine()->getRepository('TrinityWebshopBundle:User')->findByUser($Entry);
                    //     if(count($WebshopUser)){
                    //         unset($dql_results[$index]);
                    //     }
                    // }
                }
            }
        }
        
        foreach($dql_results as $Entry){

            // if($hasWebshop && $_GET['role'] == 'webshop_users'){
            //     $Entry = $Entry->getUser();
            // }


            $roles = [];
            foreach($Entry->getRoles() as $r){
                if($r == 'ROLE_SUPER_ADMIN') $r = 'Beheerder';
                $roles[] = $this->trans($r, 'cms');
            }
            
            $results[] = [
                'id'                    => $Entry->getId(),
                'name'                  => $Entry->getFullName(),
                'username'              => $Entry->getUsername(),
                'roles'                 => $roles,
                'lastLogin'             => $Entry->getLastLogin(),
                'enabled'               => $Entry->isEnabled(),
                'twoFactor'             => $Entry->isTotpEnabled(),
                'expires'               => $Entry->getExpire(),
                'expired'               => ($Entry->getExpire() ? ($Entry->getExpireDate()->format('Ymd') <= $d->format('Ymd') ? '<span class="red-text">Verlopen</span><span style="font-size:11px;display:block;">' . $Entry->getExpireDate()->format('d-m-Y') . '</span>' : $Entry->getExpireDate()->format('d-m-Y')) : '-'),
                'isExpired'             => ($Entry->getExpire() ? ($Entry->getExpireDate()->format('Ymd') <= $d->format('Ymd') ? true : false) : false),
                'passwordExpireEnabled' => !empty($Entry->getExpirePasswordEnable()),
                'passwordExpired'       => (!empty($Entry->getExpirePasswordEnable()) ? ($Entry->getExpirePasswordDate()->format('Ymd') <= $d->format('Ymd') ? '<span class="red-text">Verlopen</span><span style="font-size:11px;display:block;">' . $Entry->getExpirePasswordDate()->format('d-m-Y') . '</span>' : $Entry->getExpirePasswordDate()->format('d-m-Y')) : '-'),
                'isPasswordExpired'     => !empty($Entry->isPasswordExpired()),
                'denyUserRemoval'       => !empty($Entry->getDenyUserRemoval()),
                'isAdmin'               => in_array('ROLE_ADMIN', $roles),
            ];
        }

        return new JsonResponse([
            'count'   => (int)$count,
            'page'    => $page,
            'pages'   => $pages,
            'offset'  => $offset,
            'limit'   => $limit,
            'results' => $results,
        ]);
    }

    /**
     * @Route("/admin/users/deleteip/{ip}", name="admin_users_deleteip")
     * @Template()
     */
    public function deleteipAction(Request $request, $ip = 0)
    {
        $em = $this->getDoctrine()->getManager();

        $attempts = $this->getDoctrine()->getRepository('CmsBundle:Ipcheck')->findByIp($ip);
        foreach($attempts as $ipcheck){
            $em->remove($ipcheck);
        }
        $em->flush();

        return new RedirectResponse($this->generateUrl('admin_users') . '#ipblocks');
    }

    /**
     * @Route("/admin/users/blockip/{ip}", name="admin_users_blockip")
     * @Template()
     */
    public function blockipAction(Request $request, $ip = 0)
    {
        $em = $this->getDoctrine()->getManager();

        $attempts = $this->getDoctrine()->getRepository('CmsBundle:Ipcheck')->findByIp($ip);
        foreach($attempts as $ipcheck){
            $ipcheck->setBlocked(true);
            $em->persist($ipcheck);
        }
        $em->flush();

        return new RedirectResponse($this->generateUrl('admin_users') . '#ipblocks');
    }

    /**
     * @Route("/admin/profile/dark/{enabled}", name="admin_profile_dark")
     * @Template()
     */
    public function darkAction(Request $request, $enabled = 0)
    {
        $em = $this->getDoctrine()->getManager();

        $User = $this->getUser();
        $User->setDark($enabled);
        $em->persist($User);

        $em->flush();
        return new JsonResponse([]);
    }

    /**
     * @Route("/admin/profile/qr/{size}/{margin}", name="admin_profile_qr")
     */
    public function qr($size = 6, $margin = 2)
    {
        $qrdata = $this->containerInterface->get("scheb_two_factor.security.totp_authenticator")->getQRContent($this->getUser());
        $qr = new QRcode();
        $qr->png($qrdata, false, QR_ECLEVEL_L, $size, $margin, false);
        $str = $qr->encodeString($qrdata, false, QR_ECLEVEL_L, $size, $margin, false);
        exit;
    }

    /**
     * @Route("/admin/profile/setup2fa", name="admin_profile_setup2fa")
     * @Template()
     */
    public function setup2fa(Request $request, TotpAuthenticatorInterface $totpAuthenticator, Session $session)
    {
        parent::init($request);

        $this->breadcrumbs->addItem($this->trans("Profiel", [], 'cms'), $this->containerInterface->get("router")->generate("admin_profile"));

        $User = $this->getUser();

        if($User->isTotpEnabled()){
            $session->getFlashBag()->add(
                'success',
                '2FA is al ingeschakeld!'
            );

            return $this->redirectToRoute('admin_profile');
        }

        $em = $this->getDoctrine()->getManager();

        $invalidCode = false;
        if(!empty($_POST['2fa-code'])){
            if($totpAuthenticator->checkCode($this->getUser(), $_POST['2fa-code'])){
                $session->getFlashBag()->add(
                    'success',
                    '2FA is succesvol ingeschakeld!'
                );
                $User->setTotpEnabled(true);
                $hashes = [];
                for($i = 0; $i < 10; $i++){
                    $hash = strtoupper(substr(md5(rand(10000000,99999999) . md5(time()) . md5($User->getId()) . rand(10000000,99999999)), 0, 6));
                    $hashes[] = $hash;
                }
                $User->setBackUpCodes($hashes);
                $em->persist($User);
                $em->flush();

                return $this->redirectToRoute('admin_profile');
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
     * @Route("/admin/profile", name="admin_profile")
     * @Template()
     */
    public function profileAction(Request $request, TotpAuthenticatorInterface $totpAuthenticator)
    {
        parent::init($request);

        // Check permissions
        /*if(!$this->getUser()->checkPermissions('ALLOW_PROFILE')){
            parent::test_permissions($request, $this->getUser());
            throw $this->createNotFoundException('This feature does not exist.');
        }*/

        $this->breadcrumbs->addItem($this->trans("Profiel", [], 'cms'), $this->containerInterface->get("router")->generate("admin_profile"));

        $User = $this->getUser();

        if (!is_object($User)) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->containerInterface->get('event_dispatcher');

        $em = $this->getDoctrine()->getManager();

        if(!empty($_GET['2fa'])){
            if($_GET['2fa'] == 'off'){
                // Disable 2fa
                $User->setTotpEnabled(false);
                $em->persist($User);
                $em->flush();
            }
            if($_GET['2fa'] == 'on'){
                // Enable 2fa
                $User->setTotpEnabled(true);
                $User->setTotpSecret($totpAuthenticator->generateSecret());
                $hashes = [];
                for($i = 0; $i < 10; $i++){
                    $hash = strtoupper(substr(md5(rand(10000000,99999999) . md5(time()) . md5($User->getId()) . rand(10000000,99999999)), 0, 12));
                    $hashes[] = $hash;
                }

                $User->setBackUpCodes($hashes);
                $em->persist($User);
                $em->flush();
            }
        }

        $form = $this->createFormBuilder($User);

        $form
            ->add('email', EmailType::class, array('label' => $this->trans('E-mailadres', [], 'cms')))
            ->add('username', null, array('label' => $this->trans('Gebruikersnaam', [], 'cms'), 'disabled' => ($User->getDenyUserNameChange() ? true : false)));

        $rolesToIgnore = array('ROLE_ALLOWED_TO_SWITCH', 'ROLE_SUPER_ADMIN', 'ROLE_REPORTER', 'ROLE_EDITOR');
        $roles = array();
        foreach ($this->getParameter('security.role_hierarchy.roles') as $key => $value) {
            if(in_array($key, $rolesToIgnore)) continue;
            $roles[$this->containerInterface->get('translator')->trans($key)] = $key;
            foreach ($value as $value2) {
                if(in_array($value2, $rolesToIgnore)) continue;
                $roles[$this->containerInterface->get('translator')->trans($value2)] = $value2;
            }
        }

        $form
            ->add('plainPassword', RepeatedType::class, array(
                'type'            => PasswordType::class,
                'mapped'          => false,
                'options'         => array('translation_domain' => 'cms'),
                'first_options'   => array('label' => $this->trans('Wachtwoord', [], 'cms')),
                'second_options'  => array('label' => $this->trans('Wachtwoord (controle)', [], 'cms')),
                'invalid_message' => $this->trans('Het opgegeven wachtwoord en de controle komen niet overeen', [], 'cms'),
                'required'        => false
            ));

        $languages = $this->getDoctrine()->getRepository('CmsBundle:Language')->findBy([], ['label' => 'asc']);

        $language_choises = ['Nederlands' => 'nl'];
        foreach ($languages as $l) {
            // Temp work around to hide german and others (not translated)
            if ($l->getLocale() != 'gb' && $l->getLocale() != 'en') {
                continue;
            }
            $language_choises[$l->getLabel()] = $l->getLocale();
        }

        $form
            ->add('admin_locale', ChoiceType::class, array('label' => $this->trans('Backend taal', [], 'cms'), 'choices' => $language_choises ))

            ->add('firstname', TextType::class, array( 'label' => $this->trans('Voornaam', [], 'cms') , 'translation_domain' => 'cms' ))
            ->add('lastname', TextType::class, array( 'label' => $this->trans('Achternaam', [], 'cms'), 'translation_domain' => 'cms', 'required' => false ))            
            ->add('street', TextType::class, array( 'label' => $this->trans('Straat', [], 'cms'), 'required' => false ))
            ->add('number', TextType::class, array( 'label' => $this->trans('Huisnummer', [], 'cms'), 'required' => false ))
            ->add('postalcode', TextType::class, array( 'label' => $this->trans('Postcode', [], 'cms'), 'required' => false ))
            ->add('city', TextType::class, array( 'label' => $this->trans('Plaats', [], 'cms'), 'required' => false ))
            // ->add('province', TextType::class, array( 'label' => $this->trans('Provincie', [], 'cms'), 'required' => false ))
            ->add('country', TextType::class, array( 'label' => $this->trans('Land', [], 'cms'), 'required' => false ))
            ->add('phone', TextType::class, array( 'label' => $this->trans('Telefoonnummer', [], 'cms'), 'required' => false ))
            ->add('gender', ChoiceType::class, array(
                'choices' => array(
                    $this->trans('Meneer', [], "webshop_backend") => 'Man',
                    $this->trans('Mevrouw', [], "webshop_backend") => 'Vrouw',
                    $this->trans('Anders', [], "webshop_backend") => 'Anders'
                ),
                'label' => $this->trans('Aanhef', [], "webshop_backend")
            ))
            ->add('dateofbirth', BirthdayType::class, array(
                'label' => $this->trans('Geboortedatum', [], "webshop_backend"),
                'input'  => 'datetime',
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,
                'format' => 'y-MM-dd',
                'attr' => array('class' => 'trinity_date')
            ))
            // ->add('newsletter', CheckboxType::class, array('label' => $this->trans('Aanmelden voor de nieuwsbrief', [], 'cms'), 'required' => false ))

            // ->add('website', TextType::class, array( 'label' => $this->trans('Website', [], 'cms'), 'required' => false ))
            ->add('company', TextType::class, array( 'label' => $this->trans('Bedrijfsnaam', [], 'cms'), 'required' => false ))
            // ->add('companyEmail', TextType::class, array( 'label' => $this->trans('Bedrijfs e-mail', [], 'cms'), 'required' => false ))
            // ->add('companyPhone', TextType::class, array( 'label' => $this->trans('Bedrijfs telefoonnummer', [], 'cms'), 'required' => false ))
            ->add('companyKvk', TextType::class, array( 'label' => $this->trans('Referentie', [], 'cms'), 'required' => false ))
            // ->add('companyTaxNo', TextType::class, array( 'label' => $this->trans('BTW-nummer', [], 'cms'), 'required' => false ))
            ;

        $form = $form->getForm();

        $form->handleRequest($request);


        $error = false;
        if(!empty($_POST['form'])){
            $existingUser = $this->getDoctrine()->getRepository('CmsBundle:User')->findOneByEmail($_POST['form']['email']);
            if($existingUser == $User){
                $existingUser = false;
            }
            $existingUsername = $this->getDoctrine()->getRepository('CmsBundle:User')->findOneByUsername($_POST['form']['username']);
            if($existingUsername == $User){
                $existingUsername = false;
            }

            if(!empty($existingUsername)){
                $form->addError(new FormError('Er bestaat al een gebruiker met dezelfde gebruikersnaam.'));
                $error = true;
            }elseif(!empty($existingUser)){
                $form->addError(new FormError('Er bestaat al een gebruiker met dit e-mailadres.'));
                $error = true;
            }

            // Validate password
            $pwd = $_POST['form']['plainPassword']['first'];
            if(!empty($pwd)){
                $pwdErrors = \App\CmsBundle\Entity\User::checkPassword($pwd);
                $passwordSafe = empty($pwdErrors);

                if(!$passwordSafe){
                    $form->addError(new FormError($this->trans('Het ingevoerde wachtwoord voldoet niet aan onze veiligheidseisen:', [], 'cms')));
                    $form->addError(new FormError(' '));
                    foreach($pwdErrors as $error){
                        $form->addError(new FormError('- ' . $this->trans($error, [], 'cms')));
                    }
                    $error = true;
                }
            }
        }

        if (!$error && $form->isSubmitted() && $form->isValid()) {

            // Set expire password date if enabled and password is changed
            if($User->getExpirePasswordEnable() && $User->getPlainPassword())
            {
                $newDate = new \DateTime('now');
                $newDate->modify('+' . $User->getExpirePasswordPeriod() . ' months');
                $User->setExpirePasswordDate($newDate);
            }

			$newPassword = $_POST['form']['plainPassword']['first'];
            if(!empty($newPassword)){
			    $User->setPassword($this->passwordEncoder->encodePassword($User, $newPassword));
            }

            $em->persist($User);
            $em->flush();

            header('Location:' . $request->getUri(). "?saved=1");
            exit;

            return $response;
        }

        return $this->attributes(array(
            'User' => $User,
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/admin/users", name="admin_users")
     * @Template()
     */
    public function indexAction( Request $request, $id = null )
    {
        parent::init($request);

        // Check permissions
        if(!$this->getUser()->checkPermissions('ALLOW_USERS')){
            parent::test_permissions($request, $this->getUser());
            throw $this->createNotFoundException($this->trans('This feature does not exist.', [], 'cms'));
        }

        $this->breadcrumbs->addItem($this->trans("Gebruikers", [], 'cms'), $this->containerInterface->get("router")->generate("admin_users"));

        $rolesToIgnore = array('ROLE_ALLOWED_TO_SWITCH', 'ROLE_SUPER_ADMIN', 'ROLE_REPORTER', 'ROLE_EDITOR');
        $roles = array();
        foreach ($this->getParameter('security.role_hierarchy.roles') as $key => $value) {
            if(in_array($key, $rolesToIgnore)) continue;
            $roles[$this->containerInterface->get('translator')->trans($key)] = $key;
            foreach ($value as $value2) {
                if(in_array($value2, $rolesToIgnore)) continue;
                $roles[$this->containerInterface->get('translator')->trans($value2)] = $value2;
            }
        }

        $hasWebshop = in_array('WebshopBundle', $this->installed);

        return $this->attributes(array(
            'roles'      => $roles,
            'hasWebshop' => $hasWebshop,
            'mod_users'  => $this->getDoctrine()->getRepository('CmsBundle:User')->getModeration(),
        ));
    }

    /**
     * @Route("/admin/users/edit/validate/{type}/{value}/{id}", name="admin_users_edit_validate")
     * @Template()
     */
    public function validateAction(Request $request, $type = '', $value = '', $id = null)
    {
        $em = $this->getDoctrine()->getManager();

        if(!empty($value)){
            if($type == 'username'){
                $existingUser = $this->getDoctrine()->getRepository('CmsBundle:User')->findOneByUsername($value);
                if(!empty($existingUser)){
                    if((!empty($id) && $id != $existingUser->getId()) || empty($id)){
                        return new JsonResponse(['success' => false, 'message' => $this->trans('Er bestaat al een gebruiker met deze gebruikersnaam', [], 'cms')]);
                    }
                }
            }

            if($type == 'email'){
                $existingUser = $this->getDoctrine()->getRepository('CmsBundle:User')->findOneByEmail($value);
                if(!empty($existingUser)){
                    if((!empty($id) && $id != $existingUser->getId()) || empty($id)){
                        return new JsonResponse(['success' => false, 'message' => $this->trans('Er bestaat al een gebruiker met dit e-mailadres', [], 'cms')]);
                    }
                }
            }
        }

        return new JsonResponse(['success' => true]);
    }

    /**
     * @Route("/admin/users/edit/{id}", name="admin_users_edit")
     * @Template()
     */
    public function editAction( Request $request, $id = null)
    {
        parent::init($request);

        // Check permissions
        if(!$this->getUser()->checkPermissions('ALLOW_USERS')){
            parent::test_permissions($request, $this->getUser());
            throw $this->createNotFoundException($this->trans('This feature does not exist', [], 'cms'));
        }

        $this->breadcrumbs->addItem($this->trans("Gebruikers", [], 'cms'), $this->containerInterface->get("router")->generate("admin_users"));

        $new = false;
        if( !empty($id) ){
            // Edit
            $this->breadcrumbs->addItem($this->trans("Wijzigen", [], 'cms'), $this->containerInterface->get("router")->generate("admin_users_edit"));
            $User = $this->getDoctrine()->getRepository(User::class)->findOneBy(['id' => $id]);
        }else{
            // Add
            $this->breadcrumbs->addItem($this->trans("Toevoegen", [], 'cms'), $this->get("router")->generate("admin_users_edit"));
            $new = true;
            $this->breadcrumbs->addItem("Toevoegen", $this->containerInterface->get("router")->generate("admin_users_edit"));
            $User = new User();
            $User->setEnabled(true);
            $User->setExpirePasswordPeriod(12);
            $User->setSettings($this->Settings);
            $User->addSite($this->Settings);
        }

        // $User->

        $permissions = [
            'ALLOW_DASHBOARD'           => $this->trans("Dashboard", [], 'cms'),
            'ALLOW_PAGE'           => $this->trans("Pagina's", [], 'cms'),
            'ALLOW_NAVIGATION'     => $this->trans('Navigatie', [], 'cms'),
            'ALLOW_MEDIA'          => $this->trans('Media', [], 'cms'),
            // 'ALLOW_ANALYTICS'      => $this->trans('Analytics', [], 'cms'),
            'ALLOW_USERS'          => $this->trans('Gebruikers', [], 'cms'),
            'ALLOW_CONFIGURATION'  => $this->trans('Configuratie', [], 'cms'),
            'ALLOW_BUNDLES'        => $this->trans('Extensies', [], 'cms'),
            // 'ALLOW_PROFILE'        => $this->trans('Eigen profiel bewerken', [], 'cms'),
            'ALLOW_REDIRECTS'      => $this->trans('Redirects', [], 'cms'),
            'ALLOW_WEBSHOP'      => $this->trans('Webshop', [], 'cms'),
            'ALLOW_EMAIL_TEMPLATES' => $this->trans('Email templates', [], 'cms'),
            // 'ALLOW_SITE_SWITCHING' => $this->trans('Multi-site wisselen', [], 'cms'),
        ];

        if(empty($this->Settings->getPiwikUrl()) || empty($this->Settings->getPiwikApiHash())){
            unset($permissions['ALLOW_DASHBOARD']);
        }

        if(!in_array('WebshopBundle', $this->installed)){
            unset($permissions['ALLOW_WEBSHOP']);
        }

        // Filter permissions, admin cannot give other admin more permissions then he has
        foreach($permissions as $k => $v){
            if(!$this->getUser()->checkPermissions($k)){
                unset($permissions[$k]);
            }
        }

        $ecomm_permissions = [
            'ECOMM_DASHBOARD'  => $this->trans('Dashboard', [], 'webshop_backend'),
            'ECOMM_SALES'      => $this->trans('Orders', [], 'webshop_backend'),
            'ECOMM_PRODUCTS'   => $this->trans('Assortiment', [], 'webshop_backend'),
            // 'ECOMM_CATEGORIES' => $this->trans('', [], 'webshop_backend'),
            // 'ECOMM_CUSTOMERS'  => $this->trans('', [], 'webshop_backend'),
            // 'ECOMM_CARTS'      => $this->trans('', [], 'webshop_backend'),
            'ECOMM_PROMOTIONS' => $this->trans('Marketing', [], 'webshop_backend'),
            // 'ECOMM_REVIEWS'    => $this->trans('', [], 'webshop_backend'),
            // 'ECOMM_REPORTS'    => $this->trans('', [], 'webshop_backend'),
            'ECOMM_CONFIG'     => $this->trans('Configuratie', [], 'webshop_backend'),
            // 'ECOMM_SYSTEM'     => $this->trans('', [], 'webshop_backend'),
        ];

        // Filter permissions, admin cannot give other admin more permissions then he has
        foreach($ecomm_permissions as $k => $v){
            if(!$this->getUser()->checkPermissions($k)){
                unset($ecomm_permissions[$k]);
            }
        }

        if (!is_object($User)) {
            throw new AccessDeniedException($this->trans('This user does not have access to this section.', [], 'cms'));
        }

        $form = $this->createFormBuilder($User);

        $form
            ->add('email', EmailType::class, array('label' => $this->trans('E-mailadres', 'cms')))
            ->add('username', null, array('label' => $this->trans('Gebruikersnaam', 'cms')));

        $form
            ->add('plainPassword', RepeatedType::class, array(
                'type'            => PasswordType::class,
                'mapped'          => false,
                'required'        => $new,
                'options'         => array('translation_domain' => 'cms'),
                'first_options'   => array('label' => $this->trans('Wachtwoord', [], 'cms')),
                'second_options'  => array('label' => $this->trans('Wachtwoord (controle)', [], 'cms')),
                'invalid_message' => $this->trans('Het opgegeven wachtwoord en de controle komen niet overeen', [], 'cms'),
            ));

        $rolesToIgnore = array('ROLE_ALLOWED_TO_SWITCH', 'ROLE_SUPER_ADMIN', 'ROLE_REPORTER', 'ROLE_EDITOR');
        $roles = array();
        foreach ($this->getParameter('security.role_hierarchy.roles') as $key => $value) {
            if(in_array($key, $rolesToIgnore)) continue;
            $roles[$this->containerInterface->get('translator')->trans($key)] = $key;
            foreach ($value as $value2) {
                if(in_array($value2, $rolesToIgnore)) continue;
                $roles[$this->containerInterface->get('translator')->trans($value2)] = $value2;
            }
        }

        $roles_trans = [];
        foreach($roles as $k => $v){
            if($k == 'ROLE_USER'){
                $k = 'Gebruiker';
            }
            $lbl = ucfirst(strtolower(str_replace('ROLE_', '', $k)));
            if(strtoupper($lbl) == 'ADMIN'){
                $lbl = 'Beheerder';
            }
            $roles_trans[$lbl] = $v;
        }

        $roles_trans = array_reverse($roles_trans);

        $languages = $this->getDoctrine()->getRepository('CmsBundle:Language')->findBy([], ['label' => 'asc']);

        $language_choises = ['Nederlands' => 'nl'];
        foreach ($languages as $l) {
            // Temp work around to hide german (not translated)
            if ($l->getLocale() != 'gb' && $l->getLocale() != 'en') {
                continue;
            }
            $language_choises[$l->getLabel()] = $l->getLocale();
        }

        if($User->hasRole('ROLE_ADMIN') || (!empty($_GET['role']) && $_GET['role'] == 'admin')){
            $selected_role = 'ROLE_ADMIN';
        }else{
            $selected_role = 'ROLE_USER';
        }

        $form
            ->add('admin_locale', ChoiceType::class, array('label' => $this->trans('Backend taal', [], 'cms'), 'choices' => $language_choises ))

            ->add('firstname', TextType::class, array( 'label' => $this->trans('Voornaam', [], 'cms')))
            ->add('lastname', TextType::class, array( 'label' => $this->trans('Achternaam', [], 'cms'), 'required' => false ))
            ->add('street', TextType::class, array( 'label' => $this->trans('Straat', [], 'cms'), 'required' => false ))
            ->add('number', TextType::class, array( 'label' => $this->trans('Huisnummer', [], 'cms'), 'required' => false ))
            ->add('postalcode', TextType::class, array( 'label' => $this->trans('Postcode', [], 'cms'), 'required' => false ))
            ->add('city', TextType::class, array( 'label' => $this->trans('Plaats', [], 'cms'), 'required' => false ))
            // ->add('province', TextType::class, array( 'label' => $this->trans('Provincie', [], 'cms'), 'required' => false ))
            ->add('country', TextType::class, array( 'label' => $this->trans('Land', [], 'cms'), 'required' => false ))
            ->add('phone', TextType::class, array( 'label' => $this->trans('Telefoonnummer', [], 'cms'), 'required' => false ))
            ->add('gender', ChoiceType::class, array(
                'choices' => array(
                    $this->trans('Meneer', [], "webshop_backend") => 'Man',
                    $this->trans('Mevrouw', [], "webshop_backend") => 'Vrouw',
                    $this->trans('Anders', [], "webshop_backend") => 'Anders'
                ),
                'label' => $this->trans('Aanhef', [], "webshop_backend")
            ))
            // ->add('newsletter', CheckboxType::class, array('label' => $this->trans('Aanmelden voor de nieuwsbrief', [], "cms"), 'required' => false ))
            ->add('expire', CheckboxType::class, array('label' => $this->trans('Gebruiker verloopt na een bepaalde tijd', [], "cms"), 'required' => false ))
            // ->add('expire_delete', CheckboxType::class, array('label' => $this->trans('Verwijder gebruiker nadat deze is verlopen', [], "cms"), 'required' => false ))
            // ->add('website', TextType::class, array( 'label' => $this->trans('Website', [], "cms"), 'required' => false ))
            ->add('company', TextType::class, array( 'label' => $this->trans('Bedrijfsnaam', [], "cms"), 'required' => false ))
            // ->add('companyEmail', TextType::class, array( 'label' => $this->trans('Bedrijfs e-mail', [], "cms"), 'required' => false ))
            // ->add('companyPhone', TextType::class, array( 'label' => $this->trans('Bedrijfs telefoonnummer', [], "cms"), 'required' => false ))
            ->add('companyKvk', TextType::class, array( 'label' => $this->trans('Referentie', [], "cms"), 'required' => false ))
            // ->add('companyTaxNo', TextType::class, array( 'label' => $this->trans('BTW-nummer', [], "cms"), 'required' => false ))
            ->add('dateofbirth', BirthdayType::class, array(
                'label' => $this->trans('Geboortedatum', [], "webshop_backend"),
                'input'  => 'datetime',
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,
                'format' => 'y-MM-dd',
                'attr' => array('class' => 'trinity_date')
            ))

            ->add('role', ChoiceType::class, array('label' => $this->trans('Rol', [], 'cms'), 'choices' => $roles_trans, 'data' => $selected_role ))
            ;

            $active_sites = [];
            foreach($User->getSites() as $Site){
                $active_sites[] = $Site->getSiteKey();
            }

            $my_active_sites = [];
            foreach($this->getUser()->getSites() as $Site){
                $my_active_sites[] = $Site->getSiteKey();
            }
            $available_sites = [];
            $available_sites_langs = [];
            // if ($this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')){
                $available_sites_raw = $this->getDoctrine()->getRepository('CmsBundle:Settings')->findAll();
            
                foreach($available_sites_raw as $Site){
                    if(in_array($Site->getSiteKey(), $my_active_sites) || $this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')){
                        if(!isset($available_sites[$Site->getSiteKey()])){
                            $available_sites[$Site->getSiteKey()] = $Site->getLabel();
                        }
                        if(!isset($available_sites_langs[$Site->getSiteKey()])){
                            $available_sites_langs[$Site->getSiteKey()] = [$Site->getLanguage()->getLabel()];
                        }else{
                            $available_sites_langs[$Site->getSiteKey()][] = $Site->getLanguage()->getLabel();
                        }
                    }
                }
            // }

            // dump($available_sites);
            // dump($available_sites_langs);die();

        // if ($this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')){
            /*$form = $form->add('sites', EntityType::class, [
                'label' => '&nbsp;',
                'class' => Settings::class,
                'choice_label' => 'labelDisplay',
                'choices' => $sites,
                'required' => false,
                'multiple' => true,
                'expanded' => true,
            ]);*/
        // }

        $is_b2b = false;
        $is_webshop = false;
        if($this->Webshop){
            $is_webshop = true;
            if(!empty($this->Webshop) && !empty($this->Webshop->getSettings())){
                if($this->Webshop->getSettings()->getB2b()){
                    $is_b2b = true;
                    $form = $form->add('b2b', CheckboxType::class, array('label' => 'Gebruiker heeft B2B toegang', 'required' => false));
                }
            }
        }

        if($this->getUser() != $User){
            $form
                ->add('expire_date', DateType::class, array(
                    'label' => $this->trans('Verloopdatum', [], 'cms'),
                    'input'  => 'datetime',
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                    'required' => false,
                    'attr' => array('class' => 'trinity_date')
                ))
                ->add('enabled', CheckboxType::class, array('label' => $this->trans('Gebruiker inschakelen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk'] ))
                ->add('totpEnabled', CheckboxType::class, array('label' => $this->trans('2FA inschakelen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk'] ))
                ->add('expire_password_enable', CheckBoxType::class, array( 'label' => $this->trans('Wachtwoord verloopt na een bepaalde tijd', [], "cms"), 'required' => false ))
                ->add('expire_password_date', DateType::class, array('label' => $this->trans('Verloopdatum', [], "cms"), 'required' => false, 'input'  => 'datetime', 'widget' => 'single_text', 'format' => 'yyyy-MM-dd', 'required' => false, 'attr' => array('class' => 'trinity_date') ))
                ->add('expire_password_period', IntegerType::class, array(
                    'label' => $this->trans('Wachtwoord verloopt na X maanden', [], 'cms'), 'required' => false, 'attr' => ['placeholder' => $this->trans('Vul enkel een numerieke waarde in!', [], "cms")])
                )
                ->add('deny_user_name_change', CheckBoxType::class, array( 'label' => $this->trans('Voorkom dat de gebruiker zijn gebruikersnaam kan aanpassen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk'] ))
                ->add('deny_user_removal', CheckBoxType::class, array( 'label' => $this->trans('Voorkom dat de gebruiker andere gebruikers en beheerders kan verwijderen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk'] ))
                ;
        }
        // if($this->getUser()->hasRole('ROLE_ADMIN')){
            $bundleOptions = [
                $this->trans('Geen restrictie', [], 'cms') => '',
            ];
            foreach($this->modRoutes as $label => $info){
                if(!empty($label)){
                    $translabel = $this->trans($label, [], 'cms');
                    $bundleOptions[$translabel . ' ' . strtolower($this->trans('Extensie', [], 'cms'))] = $this->generateUrl($info['route']);
                }
            }
            $form
                ->add('lockin_uri', ChoiceType::class, array('choices' => $bundleOptions, 'label' => $this->trans('Gebruiker insluiten binnen een extensie', [], 'cms'), 'required' => false))
                ;
        // }

        $form = $form->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                // $User->setRoles($_POST['roles']);

                if($User->getExpire()){
                    if(empty($_POST['form']['expire_date'])){
                        // Fix; add current date when no date is filled in to avoid 500 error
                        $User->setExpireDate(new \DateTime());
                    }
                }

                if(!$User->isTotpEnabled()){
                    // Totp is not enabled or is disabled, clear key and backup codes
                    $User->setTotpSecret('');
                    $User->setBackUpCodes([]);
                }

                // Set expire password date if enabled and date is not set
                if($User->getExpirePasswordEnable() && empty($User->getExpirePasswordDate()))
                {
                    $newDate = new \DateTime('now');
                    $newDate->modify('+' . $User->getExpirePasswordPeriod() . ' months');
                    $User->setExpirePasswordDate($newDate);
                }

                $existingUser = ($id > 0 ? false : $this->getDoctrine()->getRepository('CmsBundle:User')->findOneByEmail($_POST['form']['email']));
                $existingUsername = ($id > 0 ? false : $this->getDoctrine()->getRepository('CmsBundle:User')->findOneByUsername($_POST['form']['username']));
                if(!empty($existingUsername)){
                    $form->addError(new FormError($this->trans('Er bestaat al een gebruiker met dezelfde gebruikersnaam.', [], 'cms')));
                }elseif(!empty($existingUser)){
                    $form->addError(new FormError($this->trans('Er bestaat al een gebruiker met dit e-mailadres.', [], 'cms')));
                }else{

                    $checkPwd = (!empty($_POST['form']['plainPassword']['first']) || !empty($_POST['form']['plainPassword']['second']));

                    // Validate password
                    $pwd = $_POST['form']['plainPassword']['first'];
                    $pwdErrors = \App\CmsBundle\Entity\User::checkPassword($pwd);
                    $passwordSafe = true;//empty($pwdErrors);

                    if(!empty($_POST['form']['role']) && $_POST['form']['role'] == 'ROLE_ADMIN'){
                        $passwordSafe = empty($pwdErrors);
                    }

                    if($checkPwd && !$passwordSafe){
                        $form->addError(new FormError($this->trans('Het ingevoerde wachtwoord voldoet niet aan onze veiligheidseisen:', [], 'cms')));
                        $form->addError(new FormError(' '));
                        foreach($pwdErrors as $error){
                            $form->addError(new FormError('- ' . $this->trans($error, [], 'cms')));
                        }
                    }else{

						$newPassword = $_POST['form']['plainPassword']['first'];
                        if(!empty($newPassword)){
                            // Set new password only when password is entered
                            $User->setPassword($this->passwordEncoder->encodePassword($User, $newPassword));
                        }
						
                        if($this->getUser() != $User){
                            // Setup Bitwise permission operators
                            $permissionBits = 0;
                            if(!empty($_POST['permissions'])){
                                foreach($_POST['permissions'] as $key){
                                    $permissionBits += constant('App\CmsBundle\Entity\User::' . $key);
                                }
                            }
                            $User->setPermissions($permissionBits);

                            $ecomm_permissionBits = 0;
                            if(!empty($_POST['ecomm_permissions'])){
                                foreach($_POST['ecomm_permissions'] as $key){
                                    $ecomm_permissionBits += constant('App\CmsBundle\Entity\User::' . $key);
                                }
                            }
                            $User->setEcommPermissions($ecomm_permissionBits);
                        }

                        if(!empty($_POST['sites'])){
                            $added = [];
                            foreach($_POST['sites'] as $key){
                                $sites = $this->getDoctrine()->getRepository('CmsBundle:Settings')->findBy(['site_key' => $key]);
                                foreach($sites as $S){
                                    $added[] = $S;
                                    if($new){
                                        if($S != $this->Settings){
                                            $User->addSite($S);
                                        }
                                    }else{
                                        if(!$User->getSites()->contains($S)){
                                            $User->addSite($S);
                                        }
                                    }
                                }
                            }

                            foreach($User->getSites() as $S){
                                if(!in_array($S, $added)){
                                    $User->removeSite($S);
                                }
                            }
                        }

                        $em = $this->getDoctrine()->getManager();
                        $em->persist($User);
                        $em->flush();


                        $Syslog = new Log();
                        $Syslog->setUser($this->getUser());
                        $Syslog->setUsername($this->getUser()->getUsername());
                        $Syslog->setType('user');
                        $Syslog->setStatus('info');
                        $Syslog->setObjectId($User->getId());
                        $Syslog->setSettings($this->Settings);
                        if ($new) {
                            $Syslog->setAction('add');
                            $Syslog->setMessage('Gebruiker is toegevoegd: <strong>' . $User->getUsername() . '</strong>.');
                        }else{
                            $Syslog->setAction('update');
                            $Syslog->setMessage('Gebruiker is gewijzigd: <strong>' . $User->getUsername() . '</strong>.');
                        }

                        $em->persist($Syslog);
                        $em->flush();

                        // Send login to user
                        if(!empty($_POST['sendpassword'])){

							$mailer = clone $this->mailer;
                            $mailer->init();
                            $MailTemplate = $this->getDoctrine()->getRepository('CmsBundle:Mail')->findOneBy(['key' => 'usercreation', 'settings' => $this->Settings]);
                            if(empty($MailTemplate)){
                                $MailTemplate = $this->getDoctrine()->getRepository('CmsBundle:Mail')->findOneBy(['key' => 'usercreation', 'language' => $this->language]);
                            }
                            if(!empty($MailTemplate)){
                                $mailer->setSubject($MailTemplate->getSubject($this->Settings))
                                    ->setTo($User->getEmail())
                                    ->setTwigBody('emails/' . $MailTemplate->getTemplate(),
                                    [
                                        'label' => '',
                                        'message' => $MailTemplate->getBodyParsed([
                                            'domain'   => $request->getHost(),
                                            'name'     => $_POST['form']['firstname'],
                                            'username' => $_POST['form']['username'],
                                            'password' => $_POST['form']['plainPassword']['first']
                                        ])
                                    ]);
                            }else{
                                $mailer->setSubject($this->trans('Er is een account aangemaakt voor ' . $this->Settings->getLabel(), [], 'cms'))
                                        ->setTo($User->getEmail())
                                        ->setTwigBody('emails/notify.html.twig', [
                                            'message' => $this->get('twig')->render('@Cms/emails/usercreation.html.twig',[
                                                'domain' => $request->getHost(), 'name' => $_POST['form']['firstname'], 'username' => $_POST['form']['username'], 'password' => $_POST['form']['plainPassword']['first']
                                            ]),
                                        ]);
                            }
                            $send = $mailer->execute_forced();

                            $this->addFlash(
                                '',
                                $this->trans('Er is een e-mail naar <span style="font-weight:bold;padding: 0 5px;">%email%</span> gestuurd met het wachtwoord.', ['%email%' => $_POST['form']['email']], 'cms')
                            );

                            $Syslog = new Log();
                            $Syslog->setAction('password');
                            $Syslog->setUser($this->getUser());
                            $Syslog->setUsername($this->getUser()->getUsername());
                            $Syslog->setType('user');
                            $Syslog->setStatus('info');
                            $Syslog->setObjectId($User->getId());
                            $Syslog->setSettings($this->Settings);
                            $Syslog->setMessage('Nieuw wachtwoord is gestuurd naar gebruiker: <strong>' . $User->getUsername() . '</strong>.');
                            
                            $em->persist($Syslog);
                            $em->flush();
                        }else{
                            $this->addFlash(
                                '',
                                $this->trans('De gebruiker <span style="font-weight:bold;padding: 0 5px;">%username%</span> is succesvol opgeslagen.', ['%username%' => $_POST['form']['username']], 'cms')
                                
                            );

                            return $this->redirect($this->generateUrl('admin_users'));
                        }

                        // return $response;
                    }
                }
            }else{
                $this->addFlash(
                    '',
                    $this->trans('De opgegeven wachtwoorden komen niet overeen.', [], 'cms')
                );
            }
        }

        return $this->attributes(array(
            'User'                  => $User,
            'id'                    => $id,
            'new'                    => ((int)$id <= 0),
            'form'                  => $form->createView(),
            'permissions'           => $permissions,
            'ecomm_permissions'     => $ecomm_permissions,
            // 'sites'              => $sites,
            'is_b2b'                => $is_b2b,
            'active_sites'          => $active_sites,
            'available_sites'       => $available_sites,
            'available_sites_langs' => $available_sites_langs,
        ));
    }

    /**
     * @Route("/admin/users/delete/{id}", name="admin_users_delete")
     */
    public function deleteAction( Request $request, $id = null )
    {
        parent::init($request);

        // Check permissions
        if(!$this->getUser()->checkPermissions('ALLOW_USERS')){
            parent::test_permissions($request, $this->getUser());
            throw $this->createNotFoundException($this->trans('This feature does not exist.', [], 'cms'));
        }

        if($id){
            $User = $this->getDoctrine()->getRepository('CmsBundle:User')->find($id);
            $Logs = $this->getDoctrine()->getRepository('CmsBundle:Log')->findby(['userid' => $User->getId()]);

            $cleanedLogs = false;
            foreach($Logs as $log)
            {
                $cleanedLogs = true;
                $log->setUser(null);
                $this->em->persist($log);
            }
            if ($cleanedLogs) {
                $this->em->flush();
            }

            $this->em->remove($User);
            $this->em->flush();

            $this->addFlash(
                '',
                $this->trans('De gebruiker is verwijderd.', [], 'cms')
            );
        }


        return $this->redirect($this->generateUrl('admin_users'));
    }

    /**
     * @Route("/admin/users/allow/{id}", name="admin_users_allow")
     */
    public function allowAction( Request $request, $id = null)
    {
        $this->init($request);

        // Check permissions
        if(!$this->getUser()->checkPermissions('ALLOW_USERS')){
            parent::test_permissions($request, $this->getUser());
            throw $this->createNotFoundException($this->trans('This feature does not exist.', [], 'cms'));
        }

        if($id){
            $em = $this->getDoctrine()->getManager();

            $User = $this->getDoctrine()->getRepository('CmsBundle:User')->find($id);

            $User->setModeration(false);
            $User->setEnabled(true);
            $em->persist($User);

            $em->flush();

            $MailTemplate = $this->getDoctrine()->getRepository('CmsBundle:Mail')->findOneBy([
                'key' => 'registration_enabled',
                'settings' => $this->Settings,
            ]);
            if(empty($MailTemplate)){
                $MailTemplate = $this->getDoctrine()->getRepository('CmsBundle:Mail')->findOneBy([
                    'key' => 'registration_enabled',
                    'language' => $this->language,
                ]);
            }

            if(!empty($MailTemplate)){
				$mailer = clone $this->mailer;
                $mailer->init();
                $mailer->setSubject($MailTemplate->getSubject($this->Settings))
                        ->setTo($User->getEmail())
                        ->setTwigBody('emails/' . $MailTemplate->getTemplate(),
                        [
                            'label' => '',
                            'message' => $MailTemplate->getBodyParsed(['Settings' => $this->Settings, 'User' => $User])
                        ])
                        ->setPlainBody(strip_tags($MailTemplate->getBodyParsed(['Settings' => $this->Settings, 'User' => $User])));
                $send = $mailer->execute_forced();
            }

            $this->addFlash(
                '',
                $this->trans('De gebruiker is geactiveerd.', [], 'cms')
            );
        }


        return $this->redirect($this->generateUrl('admin_users'));
    }
}
