<?php
namespace App\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Symfony\Component\Form\FormError;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

// Injection
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

use Symfony\Component\Intl\Countries;
use App\CmsBundle\Util\Mailer;

use App\CmsBundle\Entity\User;

class LinkController extends StorageController
{
	private $passwordEncoder;

	public function __construct(TranslatorInterface $translator, ContainerInterface $containerInterface, Mailer $mailer, UserPasswordEncoderInterface $passwordEncoder)
    {
		parent::__construct($translator, $containerInterface, $mailer);

        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * Return link data when required within the link form
     *
     * @param  object  Doctrine object
     * @param object language object
     * @param object container object
     *
     * @return array   Array with config options
     */
    public function getLinkData($em, $language, $container)
    {
        return [];
    }

    public function showAction($config, $params = array(), $request = null)
    {
        parent::init($request);

        switch ($config['id']) {
            case 'calendar_upcoming':
                return $this->widget_calendar_upcoming($config, $params, $request);
                break;
            case 'login':
                return $this->widget_login($config, $params, $request);
                break;
	    case 'logout':
                return $this->widget_logout($config, $params, $request);
                break;
            case 'register':
                return $this->widget_register($config, $params, $request);
                break;
            case 'password_forgotten':
                return $this->widget_password_forgotten_link($config, $params, $request);
                break;
            case 'password_forgotten_link':
                return $this->widget_password_forgotten_link($config, $params, $request);
                break;
            case 'sitemap':
                return $this->widget_sitemap($config, $params, $request);
                break;
        }
    }

    public function widget_sitemap($config, $params, $request)
    {
        parent::init($request);

        $params = [
            'pages' => $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(['enabled' => true, 'show_in_sitemap' => true, 'page' => null, 'settings' => $this->Settings], ['sort' => 'asc', 'title' => 'asc']),
        ];
        if(in_array('WebshopBundle', $this->installed)){
            $Webshop = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Webshop')->getByLanguageAndSettings($this->language, $this->Settings);
            $WebshopSettings = $Webshop->getSettings();
            $products = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Product')->filter(false, $Webshop, 0, 0, []);

            $params['WebshopSettings'] = $WebshopSettings;
            $params['webshop_categories'] = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Category')->findBy(['webshop' => $Webshop, 'parent' => null], ['position' => 'asc', 'label' => 'asc']);
            // $params['webshop_products'] = $products;
        }

        return $this->renderView('@Cms/widgets/sitemap.html.twig', $params);
    }

    public function widget_calendar_upcoming($config, $params, $request)
    {
        parent::init($request);

        $course_dates = [];
        $course_pages = [];
        $current_host = [];
        
        if(in_array('CoursesBundle', $this->installed)){
            $course_dates = $this->getDoctrine()->getRepository('TrinityCoursesBundle:CourseDate')->findUpcoming();

            $course_pages = [];
            $course_pages_alt = [];
            $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('TrinityCoursesBundle', '');
            foreach($blocks as $Block){
                $p = $Block->getWrapper()->getPage();
                $c = json_decode($Block->getBundleData());
                if(!empty($c->id)){
                    $host = ($p->getPage() ? $p->getPage()->getSettings()->getHost() : $p->getSettings()->getHost());
                    if(empty($course_pages[$c->id]) || ($host == $this->Settings->getHost())){
                        $course_pages[$c->id] = ['host' => $host, 'label' => $p->getLabel(), 'page' => $p];
                        $course_pages_alt[$p->getSettings()->getId()][$c->id] = ['host' => $host, 'label' => $p->getLabel(), 'page' => $p];
                    }
                }
            }
        }

        // if($this->containerInterface->getParameter('kernel.environment') == 'dev'){
        if(!empty($course_pages_alt[$this->Settings->getId()])){
            $current_host = $course_pages_alt[$this->Settings->getId()];
            foreach($current_host as $k => $v){
                unset($course_pages[$k]);
            }
        }
        // }

        return $this->renderView('@Cms/widgets/calendar_upcoming.html.twig', [
            'events' => $this->getDoctrine()->getRepository('CmsBundle:Event')->findUpcoming(),
            'course_dates' => $course_dates,
            'course_pages' => $course_pages,
            'current_host' => $current_host,
        ]);
    }

    public function widget_password_forgotten($config, $params, $request)
    {
        parent::init($request);
        $url = $this->generateUrl('homepage');

		$em = $this->getDoctrine()->getManager();

        $target = $this->generateUrl('homepage', [], UrlGeneratorInterface::ABSOLUTE_URL);
        if(!empty($_GET['url'])){
            $target = $this->generateUrl($_GET['url'], [], UrlGeneratorInterface::ABSOLUTE_URL);
        }

        $changed = false;
        $unknownUser = false;
        if(!empty($_POST)){
            $User = $em->getRepository('CmsBundle:User')->findUserByUsernameOrEmail($request->get('_username'));
            if($User !== null){
                $newPassword = substr(md5(rand(1000,9999).$User->getId().$User->getUsername()), 0, 8);

                $User->setPassword($this->passwordEncoder->encodePassword($User, $newPassword));
                $em->persist($User);
                $em->flush();

                $MailTemplate = $this->getDoctrine()->getRepository('CmsBundle:Mail')->findOneBy([
                    'key'      => 'lostpassword',
                    'settings' => $this->Settings,
                ]);
                if(empty($MailTemplate)){
                    $MailTemplate = $this->getDoctrine()->getRepository('CmsBundle:Mail')->findOneBy([
                        'key'      => 'lostpassword',
                        'language' => $this->language,
                    ]);
                }

                if(!empty($MailTemplate)){
                    $params = ['sitename' => $this->Settings->getLabel(), 'name' => $User->getName(), 'newpassword' => $newPassword];
                    $message = $MailTemplate->getBodyParsed($params);
                    $mailer = clone $this->mailer;
                    $mailer->init();
                    $mailer->setSubject($MailTemplate->getSubject($this->Settings))
                            ->setTo($User->getEmail())
                            ->setTwigBody('emails/' . $MailTemplate->getTemplate(),
                            [
                                'label' => '',
                                'message' => $message
                            ])
                            ->setPlainBody(strip_tags($message));
                    $send = $mailer->execute_forced();
                }

                $changed = true;
            }else{
                $unknownUser = true;
            }
        }

        return $this->renderView('@Cms/widgets/password_forgotten.html.twig', [
            'url' => $url,
            'changed' => $changed,
            'target' => $target,
            'unknownUser' => $unknownUser,
            'Settings' => $this->Settings,
        ]);
    }

    public function widget_password_forgotten_link($config, $params, $request)
    {
        parent::init($request);

        $status = null;
        $send = false;
        $unknownUser = false;
        $User = null;
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
                }else{
                    $unknownUser = true;
                }
            }
        }

        return $this->renderView('@Cms/widgets/password_forgotten_link.html.twig', [
            'status' => $status,
            'send' => $send,
            'User' => $User,
            'unknownUser' => $unknownUser,
            'Settings' => $this->Settings,
        ]);
    }

    public function widget_login($config, $params, $request)
    {
        parent::init($request);
        $redirect = $this->containerInterface->get('session')->get('redirect');

        $url = $this->generateUrl('homepage');

        if(!empty($_POST)){
            $validCaptcha = $this->Settings->validateGoogleRecaptcha($request->request->get('g-recaptcha-response'));
            if(($validCaptcha)){
				$em = $this->getDoctrine()->getManager();
                $factory = $this->containerInterface->get('security.encoder_factory');

                
				$User = $em->getRepository('CmsBundle:User')->findUserByUsername($request->get('_username'));
                if(!empty($User)){
                    $encoder = $factory->getEncoder($usr);
                    if($encoder->isPasswordValid($User->getPassword(),$request->get('_password'), $User->getSalt())){
                        $token = new UsernamePasswordToken($User, null, 'main', $User->getRoles());
                        $this->containerInterface->get('security.token_storage')->setToken($token);
                        $this->containerInterface->get('session')->set('_security_main', serialize($token));

                        // Clear cache
                        $this->clearNavCache();

                        if($redirect){
                            $url = $this->generateUrl($redirect);
                        }elseif(!empty($this->Settings->getBaseUri())){
                            $url = preg_replace('/\/$/', '', $url) . $this->Settings->getBaseUri();
                        }
                    }else{
                        //
                    }
                }else{
                    //
                }
            }else{
                // 
            }


            /*$uri = $this->generateUrl('homepage');
            $response = new RedirectResponse($uri, 301);
            $response->setContent($this->render(
                'CmsBundle:Error:301.html.twig',
                array( 'uri' => $uri )
            ));

            return $response;*/

            // return $this->redirectToRoute('homepage');
            // header('Location:' . $url); exit;
        }

        return $this->renderView('@Cms/widgets/login.html.twig', [
            'url' => $url,
            'Settings' => $this->Settings
        ]);
    }

	public function widget_logout($config, $params, $request)
	{
		parent::init($request);

		$url = $request->getRequestUri();
		$url = str_replace('/logout', '', $url);

		$this->clearNavCache();

		return $this->redirect($url);
	}

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function widget_register($config, $params, $request)
    {
        parent::init($request);

        $redirect = $this->containerInterface->get('session')->get('redirect');

        $url = $this->generateUrl('homepage');


        $done = false;
        $em = $this->getDoctrine()->getManager();
        $User = new User();

        $moderation = false;
        if(empty($config['moderation']) && !$this->Settings->getModerateRegistration()){
            $User->setEnabled(true);
        }else{
            $User->setModeration(true);
            $moderation = true;
        }

        $form = $this->createFormBuilder($User);
        $form
            ->add('email', EmailType::class, array(
                'label' => $this->trans('E-mailadres', [], 'cms'),
                'attr' => [
                    'placeholder' => $this->trans('E-mailadres', [], 'cms'),
                    'class' => 'validate'
                ],
                'row_attr' => ['class' => 'form-floating']
            ))

            ->add('plainPassword', RepeatedType::class, array(
                'type'            => PasswordType::class,
                'mapped'          => false,
                'options'         => array('translation_domain' => 'cms'),
                'first_options'   => array(
                    'label' => $this->trans('Wachtwoord', [], 'cms'),
                    'attr' => [
                        'placeholder' => $this->trans('Wachtwoord', [], 'cms'),
                        'class' => 'validate'
                    ],
                    'row_attr' => ['class' => 'form-floating']
                ),
                'second_options'  => array(
                    'label' => $this->trans('Wachtwoord (controle)', [], 'cms'),
                    'attr' => [
                        'placeholder' => $this->trans('Wachtwoord (controle)', [], 'cms'),
                        'class' => 'validate'
                    ],
                    'row_attr' => ['class' => 'form-floating']
                ),
                'invalid_message' => $this->trans('Het opgegeven wachtwoord en de controle komen niet overeen', [], 'cms'),
            ))
            ->add('gender', ChoiceType::class, array(
                'choices' => array('Maak een keuze' => '', 'Meneer' => $this->trans('Man', [], 'cms'), 'Mevrouw' => $this->trans('Vrouw', [], 'cms'), 'Anders' => $this->trans('Anders', [], 'cms')),
                'label' => $this->trans('Aanhef', [], 'cms'), 'attr' => ['placeholder' => $this->trans('Aanhef', [], 'cms'), 'class' => 'validate'],'row_attr' => ['class' => 'form-floating'], 
                // 'choice_attr' => function($key, $val, $index) {
                //     $disabled = false;
            
                //     $disabled = ($key == '');
            
                //     return $disabled ? ['disabled' => 'disabled'] : [];
                // },
            ))
            ->add('firstname', TextType::class, array('label' => $this->trans('Voornaam', [], 'cms'), 'attr' => ['placeholder' => $this->trans('Voornaam', [], 'cms'), 'class' => 'validate'],'row_attr' => ['class' => 'form-floating'], ))
            ->add('lastname', TextType::class, array( 'label' => $this->trans('Achternaam', [], 'cms'), 'attr' => ['placeholder' => $this->trans('Achternaam', [], 'cms'), 'class' => 'validate'],'row_attr' => ['class' => 'form-floating'], ))
            ->add('street', TextType::class, array(
                'label' => $this->trans('Straat', [], 'cms'),
                'required' => true,
                'attr' => [
                    'placeholder' => $this->trans('Straat', [], 'cms'),
                    'class' => 'validate'
                ],
                'row_attr' => ['class' => 'form-floating']
            ))
            ->add('number', TextType::class, array(
                'label' => $this->trans('Huisnummer', [], 'cms'), 
                'required' => true, 
                'attr' => [
                    'placeholder' => $this->trans('Huisnummer', [], 'cms'),
                    'pattern' => '^([0-9 -]+)\s?(\w*)$',
                    'class' => 'validate'
                ],
                'row_attr' => ['class' => 'form-floating']
            ))
            ->add('number_add', TextType::class, array(
                'label' => $this->trans('Toevoeging', [], 'cms'), 
                'required' => false, 
                'attr' => [
                    'placeholder' => $this->trans('Toevoeging', [], 'cms')
                ],
                'row_attr' => ['class' => 'form-floating']
            ))
            ->add('postalcode', TextType::class, array( 'label' => $this->trans('Postcode', [], 'cms'), 'required' => true, 'attr' => ['placeholder' => $this->trans('Postcode', [], 'cms'),'pattern' => '^([0-9]{1,8}.*?[a-zA-Z]+|[0-9]{1,8})$', 'class' => 'validate', 'title' => 'Voer een geldige postcode in.'],'row_attr' => ['class' => 'form-floating'], ))
            ->add('city', TextType::class, array( 'label' => $this->trans('Plaats', [], 'cms'), 'attr' => ['placeholder' => $this->trans('Plaats', [], 'cms'), 'class' => 'validate'], 'required' => true,'row_attr' => ['class' => 'form-floating'], ))
            // ->add('province', TextType::class, array( 'label' => $this->trans('Provincie', [], 'cms'), 'required' => false ))
            ->add('country', CountryType::class, array( 'preferred_choices' => ['NL'], 'label' => $this->trans('Land', [], 'cms'), 'required' => true, 'attr' => ['class' => 'validate'],'row_attr' => ['class' => 'form-floating'], ))
            ->add('phone', TextType::class, array(
                'label' => $this->trans('Telefoonnummer', [], 'cms'),
                'required' => true,
                'attr' => [
                    'placeholder' => $this->trans('Telefoonnummer', [], 'cms'),
                    'pattern' => '[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,9}',
                    'title' => 'Voer een geldig telefoonnummer in.',
                    'class' => 'validate'
                ],
                'row_attr' => ['class' => 'form-floating']
                )
            )
            // ->add('dateofbirth', BirthdayType::class, array('label' => $this->trans('Geboortedatum', [], 'cms')))
            // ->add('newsletter', CheckboxType::class, array('label' => $this->trans('Aanmelden voor de nieuwsbrief', [], 'cms'), 'required' => false ))

            // ->add('website', TextType::class, array( 'label' => $this->trans('Website', [], 'cms'), 'required' => false ))
            // ->add('company', TextType::class, array( 'label' => $this->trans('Bedrijf', [], 'cms'), 'required' => false ))
            // ->add('companyEmail', TextType::class, array( 'label' => $this->trans('Bedrijfs e-mail', [], 'cms'), 'required' => false ))
            // ->add('companyPhone', TextType::class, array( 'label' => $this->trans('Bedrijfs telefoonnummer', [], 'cms'), 'required' => false ))
            // ->add('companyKvk', TextType::class, array( 'label' => $this->trans('KVK-nummer', [], 'cms'), 'required' => false ))
            // ->add('companyTaxNo', TextType::class, array( 'label' => $this->trans('BTW-nummer', [], 'cms'), 'required' => false ))
            ;
            if(!empty($this->Settings->getBirthdayFields())){
                $form = $form->add('dateOfBirth', BirthdayType::class, array(
                    'label' => $this->trans('Geboortedatum', [], 'cms'), 'input' => 'datetime',
                    'required' => false,
                    'attr' => [
                        'placeholder' => $this->trans('Geboortedatum', [], 'cms'), 'class' => 'validate'
                    ],
                    'row_attr' => ['class' => 'form-floating']
                ));
            }
            if(!empty($config['website'])){
                $form = $form->add('website', TextType::class, array(
                    'label' => $this->trans('Website', [], 'cms'),
                    'required' => false,
                    'attr' => [
                        'placeholder' => $this->trans('Website', [], 'cms'), 'class' => 'validate'
                    ],
                    'row_attr' => ['class' => 'form-floating']
                ));
            }

            $form = $form->add('company', TextType::class, array(
                'label' => $this->trans('Bedrijfsnaam', [], 'cms'),
                'required' => false,
                'attr' => [
                    'placeholder' => $this->trans('Bedrijfsnaam', [], 'cms'), 'class' => 'validate'
                ],
                'row_attr' => ['class' => 'form-floating']
            ));

            if(!empty($config['companyEmail'])){
                $form = $form->add('companyEmail', TextType::class, array(
                    'label' => $this->trans('Bedrijfs e-mail', [], 'cms'),
                    'required' => false,
                    'attr' => [
                        'placeholder' => $this->trans('Bedrijfs e-mail', [], 'cms'), 'class' => 'validate'
                    ],
                    'row_attr' => ['class' => 'form-floating']
                ));
            }

            if(!empty($config['companyPhone'])){
                $form = $form->add('companyPhone', TextType::class, array(
                    'label' => $this->trans('Bedrijfs telefoonnummer', [], 'cms'),
                    'required' => false,
                    'attr' => [
                        'placeholder' => $this->trans('Bedrijfs telefoonnummer', [], 'cms'), 'class' => 'validate'
                    ],
                    'row_attr' => ['class' => 'form-floating']
                ));
            }

            if(!empty($config['companyKvk'])){
                $form = $form->add('companyKvk', TextType::class, array(
                    'label' => $this->trans('Referentie (optioneel)', [], 'cms'),
                    'required' => false,
                    'attr' => [
                        'placeholder' => $this->trans('Referentie (optioneel)', [], 'cms'), 'class' => 'validate'
                    ],
                    'row_attr' => ['class' => 'form-floating']
                ));
            }

            if(!empty($config['companyTaxNo'])){
                $form = $form->add('companyTaxNo', TextType::class, array(
                    'label' => $this->trans('BTW-nummer', [], 'cms'),
                    'required' => false,
                    'attr' => [
                        'placeholder' => $this->trans('BTW-nummer', [], 'cms'), 'class' => 'validate'
                    ],
                    'row_attr' => ['class' => 'form-floating']
                ));
            }


        $form = $form->getForm();

        $form->handleRequest($request);

        $message = '';

        if ($form->isSubmitted() && $form->isValid()) {
            $validCaptcha = $this->Settings->validateGoogleRecaptcha($request->request->get('g-recaptcha-response'));
            
            if(($validCaptcha && !empty($_POST['form']['email']))){

                $User->setUsername($User->getEmail());

                if(!empty($_POST['form']['postalcode']) && !preg_match('/^([0-9]{1,8}.*?[a-zA-Z]+|[0-9]{1,8})$/', trim($_POST['form']['postalcode']))){
                    $form->addError(new FormError($this->trans('Ongeldige postcode', [], 'cms')));
                }elseif(!empty($_POST['form']['phone']) && !preg_match('/[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,9}/', trim($_POST['form']['phone']))){
                    $form->addError(new FormError($this->trans('Ongeldig telefoonnummer', [], 'cms')));
                }elseif(!empty($_POST['form']['number']) && !preg_match('/^([0-9 -]+)\s?(\w*)$/', trim($_POST['form']['number']))){
                    $form->addError(new FormError($this->trans('Ongeldig huisnummer', [], 'cms')));
                }else{
                    $existingUser = $this->getDoctrine()->getRepository('CmsBundle:User')->findOneByEmail($_POST['form']['email']);
                    if(!empty($existingUser)){
                        $form->addError(new FormError($this->trans('Er bestaat al een gebruiker met dit e-mailadres', [], 'cms')));
                    }else{
						$skipConfirmationMail = false;
						
						//add simple profile
						if(!empty($_POST['action']) && $_POST['action'] == "add_simple_profile"){
							if(!empty($_POST['enable_profile']) && $_POST['enable_profile']){
								$User->setEnabled(1);
							}
							if(!empty($_POST['skip_confirmation_mail']) && $_POST['skip_confirmation_mail']){
								$skipConfirmationMail = true;
							}
							if(!empty($_POST['redirect'])){
								$redirect = $_POST['redirect'];
							}
						}
						
                        // Validate password
                        $pwd = $_POST['form']['plainPassword']['first'];
                        $pwdErrors = \App\CmsBundle\Entity\User::checkPassword($pwd);
                        $passwordSafe = true; //empty($pwdErrors);
                        
                        if(!$passwordSafe){
                            $form->addError(new FormError($this->trans('Het ingevoerde wachtwoord voldoet niet aan onze veiligheidseisen:', [], 'cms')));
                            $form->addError(new FormError(' '));
                            foreach($pwdErrors as $error){
                                $form->addError(new FormError('- ' . $this->trans($error, [], 'cms')));
                            }
                        }else{
                            $User->setIp($_SERVER['REMOTE_ADDR']);

                            $password = $_POST['form']['plainPassword']['first'];
							$User->setPassword($this->passwordEncoder->encodePassword($User, $password));

                            $em->persist($User);
							$em->flush();
                            $done = true;
							
							if(!$skipConfirmationMail){
								$MailTemplate = $this->getDoctrine()->getRepository('CmsBundle:Mail')->findOneBy([
									'key' => 'registration' . ($moderation ? '_pending' : ''),
									'settings' => $this->Settings,
								]);
								if(empty($MailTemplate)){
									$MailTemplate = $this->getDoctrine()->getRepository('CmsBundle:Mail')->findOneBy([
										'key' => 'registration' . ($moderation ? '_pending' : ''),
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
												'message' => $MailTemplate->getBodyParsed([
													'user' => $User,
													'sitename'  => $this->Settings->getLabel(),
													'password' => $password,
													'username' => $User->getUsername(),
													'firstname' => $User->getFirstname(),
													'lastname'  => $User->getLastname(),
												])
											])
											->setPlainBody(strip_tags($MailTemplate->getBodyParsed([
												'user' => $User,
												'sitename'  => $this->Settings->getLabel(),
												'password' => $password,
												'username' => $User->getUsername(),
												'firstname' => $User->getFirstname(),
												'lastname'  => $User->getLastname(),
											])));
									$send = $mailer->execute_forced();
								}
							}

                            if($moderation && !$skipConfirmationMail){
                                // Account needs to be moderated before access
                                $message = $this->trans('<strong>Succesvol geregistreerd</strong><br/>Uw account is succesvol geregistreerd, u heeft hier ook een e-mail over ontvangen. Zodra wij uw account hebben gevalideerd ontvangt u nogmaals een e-mail.', [], 'cms');

                                $MailTemplate = $this->getDoctrine()->getRepository('CmsBundle:Mail')->findOneBy([
                                    'key' => 'registration_notify',
                                    'settings' => $this->Settings,
                                ]);
                                if(empty($MailTemplate)){
                                    $MailTemplate = $this->getDoctrine()->getRepository('CmsBundle:Mail')->findOneBy([
                                        'key' => 'registration_notify',
                                        'language' => $this->language,
                                    ]);
                                }

                                if(!empty($MailTemplate)){
									$mailer = clone $this->mailer;
                                    $mailer->init();
                                    $mailer->setSubject($MailTemplate->getSubject($this->Settings))
                                            ->setTo($this->Settings->getSystemEmail())
                                            ->setTwigBody('emails/' . $MailTemplate->getTemplate(),
                                            [
                                                'label' => '',
                                                'message' => $MailTemplate->getBodyParsed($_POST['form'])
                                            ])
                                            ->setPlainBody(strip_tags($MailTemplate->getBodyParsed($_POST['form'])));
                                    $send = $mailer->execute_forced();
                                }
                            }else{
                                // Auto login after registration
                                $token = new UsernamePasswordToken($User, null, 'main', $User->getRoles());
                                $this->get('security.token_storage')->setToken($token);
                                $this->get('session')->set('_security_main', serialize($token));

                                // Clear cache
                                $this->clearNavCache();

                                if($redirect){
                                    $url = $this->generateUrl($redirect);
                                }elseif(!empty($this->Settings->getBaseUri())){
                                    if(empty($url)){
										$url = preg_replace('/\/$/', '', $url) . $this->Settings->getBaseUri();
									}
                                }
                            }
                        }

                    }
                }
            }else{
                $form->addError(new FormError($this->trans('Ongeldige captcha', [], 'cms'))); 
            }
        }

        // $countries = Countries::getNames('nl');

        return $this->renderView('@Cms/widgets/register.html.twig', [
            'config'      => $config,
            'done'        => $done,
            'url'         => $url,
            'message'     => $message,
            'form'        => $form->createView(),
            'Settings'    => $this->Settings
        ]);
    }

    private function clearNavCache(){


        $realCacheDir = $this->containerInterface->getParameter('kernel.cache_dir');

        // Page caching in prod
        $pageCacheFile = str_replace('/dev', '/prod', $realCacheDir) . '/';
        foreach(scandir($pageCacheFile) as $f){
            if(is_file($pageCacheFile . $f) && preg_match('/page_structure$/', $f)){
                if(file_exists($pageCacheFile . $f)){
                    unlink($pageCacheFile . $f); // Relete cache file
                }
            }
        }
    }

    /*private function getPagesByParentid($ParentPage = null, $flat = false, $depth = 0, $data = array()){
        if(!$flat) $data = array();

        // $Language = $this->getDoctrine()->getRepository('CmsBundle:Language')->findOneBy([], ['id' => 'asc']);
        $tmp_pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(array('page' => $ParentPage, 'language' => $this->language, 'base' => null), array('sort' => 'ASC'));
        if(!empty($tmp_pages)){
            foreach($tmp_pages as $Page){
                if($flat){
                    if($Page->getEnabled()){
                        $data[$Page->getId()] = array(
                            'label'    => $Page->getLabel(),
                            'title'    => $Page->getTitle(),
                            'slug'     => $Page->getSlug(),
                            'slugkey'  => $Page->getSlugKey(),
                            'static'   => $Page->getStatic(),
                            'visible'  => $Page->getVisible(),
                            // 'enabled'  => $Page->getEnabled(),
                            // 'sort'     => $Page->getSort(),
                            'dateadd'  => $Page->getDateAdd(),
                            'dateedit' => $Page->getDateEdit(),
                            'depth'    => $depth,
                        );
                    }
                    $data = $this->getPagesByParentid($Page, $flat, ($depth+1), $data);
                }else{
                    $data[] = array(
                        'Page' => $Page->setURL($this->generateUrl('homepage') . $this->getDoctrine()->getRepository('CmsBundle:Page')->getSlugPathByPage($Page)),
                        'children' => $this->getPagesByParentid($Page, $flat, ($depth+1), $data)
                    );
                }
            }
        }
        return $data;
    }*/

}
