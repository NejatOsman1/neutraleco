<?php

namespace App\CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

/* Required for file upload */
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Translation\Catalogue\MergeOperation;
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\Translator;
use Symfony\Bundle\FrameworkBundle\Translation\TranslationLoader;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\CmsBundle\Entity\LanguageToken;
use App\CmsBundle\Entity\LanguageTranslation;

use App\CmsBundle\Entity\Log;
use App\CmsBundle\Util\Mailer;

class SettingsController extends StorageController
{

    /**
     * @Route("/admin/settings/templates/email/{template}", name="admin_templates_email")
     * @Template()
     */
    public function templatesEmailAction( Request $request, $template = '' )
    {
        parent::init($request);

        $this->breadcrumbs->addItem($this->trans("Configuratie", [], 'cms'), $this->containerInterface->get("router")->generate("admin_settings"));
        $this->breadcrumbs->addItem($this->trans("E-mail templates", [], 'cms'), $this->containerInterface->get("router")->generate("admin_templates_email"));

        if(!empty($template)){
            return $this->render('emails/' . $template, array());
        }

        $templates = scandir('../templates/emails');
        foreach($templates as $k => $v){
            if(substr($v, 0, 1) == '.'){
                unset($templates[$k]);
            }
        }

        return $this->attributes(array(
            'templates' => $templates,
        ));
    }

    /**
     * @Route("/admin/pay/{method}", name="admin_settings_pay")
     * @Template()
     */
    public function payAction( Request $request, $method )
    {
        parent::init($request);

        $this->breadcrumbs->addItem($this->trans("Configuratie", [], 'cms'), $this->containerInterface->get("router")->generate("admin_settings"));
        $this->breadcrumbs->addItem($this->trans("Betaalmethode testen", [], 'cms'), $this->containerInterface->get("router")->generate("admin_settings_pay", ['method' => $method]));

        $Pay = $this->Settings->getPay($method);
        $method_label = $this->Settings->getPayLabel($method);

        $message = null;
        if(!empty($_GET['finish'])){
            if(!empty($_COOKIE['testpaymentid'])){
                $Pay->getPayment($_COOKIE['testpaymentid']);
            }else if(!empty($_GET['trxid'])){
                $Pay->getPayment($_GET['trxid']);
            }else if(!empty($_GET['status']) && !empty($_GET['signature'])){
                $Pay->getPayment($_GET['status']);
            }
            
            $message = $this->trans('Betaling voltooid, met status:', [], 'cms') . ' <strong>' . $Pay->status . '</strong>';
        }else{
            if(!empty($_POST)){

                $payment_params = [
                    'id'           => (1000000000 + rand(100000, 999999)),
                    'order_id'     => (1000000000 + rand(100000, 999999)),
                    'amount'       => (float)str_replace(',', '.', ((24.20 + 6.95 + 1.00) - 12.10)),
                    'description'  => $this->trans('Order SIMULATION', [], 'cms'),
                    'redirectUrl'  => $this->generateUrl('admin_settings_pay', ['method' => $method, 'finish' => 1], UrlGeneratorInterface::ABSOLUTE_URL),
                    'method'       => (!empty($_POST['method']) ? $_POST['method'] : null),
                    'subscription' => (!empty($_POST['subscription']) ? true : false),
                    'issuer'       => (!empty($_POST['issuer']) ? $_POST['issuer'] : null),
                    'personal' => [
                        'dob'        => new \DateTime('1990-01-01 00:00:00'),
                        'firstname'  => 'Test',
                        'lastname'   => 'Gebruiker',
                        'phone'      => '1234567890',
                        'ip'         => $_SERVER['REMOTE_ADDR'],
                        'email'      => 'devs@beyonit.nl',
                        'contact'    => 'Test Gebruiker',
                        'street'     => 'Simon Vestdijkwei',
                        'number'     => '14',
                        'postalcode' => '8914 AX',
                        'city'       => 'Leeuwarden',
                        'country'    => 'NL',
                    ],
                    'products' => [
                        [
                            'sku'              => 'TEST01',
                            'label'            => 'Test product 1',
                            'type'             => 'physical',
                            'amount'           => 1,
                            'price'            => 24.20,
                            'total_price'      => 24.20,
                            'total_price_excl' => 20.00,
                            'tax'              => 4.20,
                            'tax_perc'         => 2100,
                        ],
                        [
                            'sku'              => 'PAYMENTFEE',
                            'label'            => 'Betaling',
                            'type'             => 'digital',
                            'amount'           => 1,
                            'price'            => 1.00,
                            'total_price'      => 1.00,
                            'total_price_excl' => 20.00,
                            'tax'              => 0.83,
                            'tax_perc'         => 2100,
                        ],
                        [
                            'sku'              => 'VERZENDING',
                            'label'            => 'Verzendkosten',
                            'type'             => 'shipping_fee',
                            'amount'           => 1,
                            'price'            => 6.95,
                            'total_price'      => 6.95,
                            'total_price_excl' => 5.74,
                            'tax'              => 1.21,
                            'tax_perc'         => 2100,
                        ],
                        [
                            'sku'              => 'KORTINGCODE',
                            'label'            => 'Korting',
                            'type'             => 'discount',
                            'amount'           => 1,
                            'price'            => 12.10,
                            'total_price'      => 12.10,
                            'total_price_excl' => 10.00,
                            'tax'              => 2.10,
                            'tax_perc'         => 2100,
                        ]
                    ]
                ];

                $status = $Pay->createPayment($payment_params);

                if(!empty($Pay->id)){
                    setcookie("testpaymentid",$Pay->id,(time() + 100));
                }

                //dump($Pay);die();

                if($status === true){
                    header('Location:' . $Pay->url);
                    exit;
                }else{
                    $message = $status;
                }
            }
        }

        return $this->attributes([
            'label'   => $method_label,
            'message' => $message,
            'Pay'     => $Pay,
        ]);
    }

    /**
     * @Route("/admin/settings", name="admin_settings")
     * @Template()
     */
    public function indexAction( Request $request )
    {
        parent::init($request);

        // Check permissions
        if(!$this->getUser()->checkPermissions('ALLOW_CONFIGURATION')){
            parent::test_permissions($request, $this->getUser());
            throw $this->createNotFoundException('This feature does not exist.');
        }

        $this->breadcrumbs->addItem($this->trans("Configuratie", [], 'cms'), $this->containerInterface->get("router")->generate("admin_settings"));

        $em = $this->getDoctrine()->getManager();

        if(!empty($this->Settings)){
            $Settings = $this->Settings;
        }else{
            $Settings = $em->getRepository('CmsBundle:Settings')->findByLanguage($this->language);
        }

        $currentHost = $Settings->getHost();



        /*$Pay = $Settings->getPay();
        if($Pay->isValid()){
            dump($Pay);
            dump($Pay->getMethods());
        }else{
            dump('PAY IS NOT VALID');
        }
        die();*/



        if(isset($_GET['testmode'])){
            if((int)$_GET['testmode'] == 1){
                $Settings->setTest(true);
            }else{
                $Settings->setTest(false);
            }
            $em->persist($Settings);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_settings'));
        }

        // Upload logo
        $SettingsMediadir = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . $this->trans('Instellingen', [], 'cms'), $this->language);

        if(!empty($_FILES)){


        	$Parent = null;
        	$type = '';
        	if(isset($_FILES['mail_header'])){
                // Upload mail_header
                $Parent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . $this->trans('Instellingen/Email header', [], 'cms'), $this->language);
                $file = $_FILES['mail_header'];
                $type = 'mail_header';
            }else if(isset($_FILES['background'])){
                // Upload background
                $Parent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . $this->trans('Instellingen/Achtergrond', [], 'cms'), $this->language);
                $file = $_FILES['background'];
                $type = 'background';
            }else if(isset($_FILES['service_background'])){
        		// Upload background
        		$Parent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . $this->trans('Instellingen/Onderhoud', [], 'cms'), $this->language);
        		$file = $_FILES['service_background'];
        		$type = 'service_background';
        	}else if(isset($_FILES['logo'])){
                // Upload logo
                $Parent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . $this->trans('Instellingen/Logo', [], 'cms'), $this->language);
                $file = $_FILES['logo'];
                $type = 'logo';
            }else if(isset($_FILES['logo_alt'])){
                // Upload logo
                $Parent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . $this->trans('Instellingen/Logo (alternatief)', [], 'cms'), $this->language);
                $file = $_FILES['logo_alt'];
                $type = 'logo_alt';
            }else if(isset($_FILES['app_icon'])){
        		// Upload logo
        		$Parent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . $this->trans('Instellingen/AppIcon', [], 'cms'), $this->language);
        		$file = $_FILES['app_icon'];
        		$type = 'app_icon';
        	}

        	if(!is_null($Parent)){

				// Create UploadedFile-object
                $filesize = filesize($file['tmp_name']);
				$UploadedFile = new UploadedFile($file['tmp_name'], $file['name'], $file['type'], (int)$file['error'], true );

				$Media = new \App\CmsBundle\Entity\Media();
				$Media->setParent($Parent);
				$Media->setLabel($file['name']);
				$Media->setDateAdd();
				$Media->setFile($UploadedFile); // Link UploadedFile to the media entity
				$Media->preUpload(); // Prepare file and path
				$Media->upload(); // Upload actual file
                $Media->setSize($filesize);

                $Syslog = new Log();
                $Syslog->setAction('update');
                $Syslog->setUser($this->getUser());
                $Syslog->setUsername($this->getUser()->getUsername());
                $Syslog->setType('settings');
                $Syslog->setStatus('info');
                $Syslog->setObjectId($Settings->getId());
                $Syslog->setSettings($this->Settings);

				if($type == 'mail_header'){
                    if($Settings->hasMailHeader()){
                        $PrevMedia = $Settings->getMailHeaderObject();
                        try{
                            $em->remove($PrevMedia);
                        }catch(\Exception $e){
                            // dump($e);die();
                        }
                    }
                    $Settings->setMailHeader($Media);
                    $Syslog->setMessage('E-mail header afbeelding is gewijzigd.');
                }else if($type == 'background'){
                    if($Settings->hasBackground()){
                        $PrevMedia = $Settings->getBackgroundObject();
                        try{
                            $em->remove($PrevMedia);
                        }catch(\Exception $e){
                            // dump($e);die();
                        }
                    }
                    $Settings->setBackground($Media);
                    $Syslog->setMessage('Achtergrond afbeelding is gewijzigd.');
                }else if($type == 'service_background'){
					if($Settings->hasServiceBackground()){
						$PrevMedia = $Settings->getServiceBackgroundObject();
						try{
                            $em->remove($PrevMedia);
                        }catch(\Exception $e){
                            // dump($e);die();
                        }
					}
					$Settings->setServiceBackground($Media);
                    $Syslog->setMessage('Onderhoud achtergrond afbeelding is gewijzigd.');
				}else if($type == 'logo'){
                    if($Settings->hasLogo()){
                        $PrevMedia = $Settings->getLogoObject();
                        try{
                            $em->remove($PrevMedia);
                        }catch(\Exception $e){
                            // dump($e);die();
                        }
                    }
                    $Settings->setLogo($Media);
                    $Syslog->setMessage('Logo afbeelding is gewijzigd.');
                }else if($type == 'logo_alt'){
                    if($Settings->hasLogoAlt()){
                        $PrevMedia = $Settings->getLogoAltObject();
                        try{
                            $em->remove($PrevMedia);
                        }catch(\Exception $e){
                            // dump($e);die();
                        }
                    }
                    $Settings->setLogoAlt($Media);
                    $Syslog->setMessage('Alternatieve logo afbeelding is gewijzigd.');
                }else if($type == 'app_icon'){
					if($Settings->hasAppIcon()){
						$PrevMedia = $Settings->getAppIconObject();
						try{
                            $em->remove($PrevMedia);
                        }catch(\Exception $e){
                            // dump($e);die();
                        }
					}
					$Settings->setAppIcon($Media);
                    $Syslog->setMessage('App-icon afbeelding is gewijzigd.');
				}

                $em->persist($Syslog);
				$em->persist($Media);
				$em->persist($Settings);
				$em->flush();

                die(json_encode(['success' => true, 'type' => $type, 'image' => '/' . $Media->getWebPath(), 'id' => $Media->getId()]));
				// return new JsonResponse(['success' => true, 'type' => $type, 'image' => '/' . $Media->getWebPath(), 'id' => $Media->getId()], 200);
			}

			return new JsonResponse(['success' => false], 401);
        }


        $layout_dir = $this->containerInterface->get('kernel')->getProjectDir() . '/templates/layouts/';
        $layouts = [];
        foreach(scandir($layout_dir) as $dir){
            if(substr($dir, 0, 1) == '.') continue;
            $layouts[str_replace('.html.twig', '', $dir)] = str_replace('.html.twig', '', $dir);
        }

        $form = $this->createFormBuilder($Settings)
            ->add('label', TextType::class, array('label' => $this->trans('Website titel', [], 'cms')))
            ->add('host', TextType::class, array('label' => $this->trans('Domein (zonder HTTP[S])', [], 'cms'), 'required' => false))
            ->add('tagline', TextType::class, array('label' => $this->trans('Tagline', [], 'cms'), 'required' => false))
            ->add('systemEmail', TextType::class, array('label' => $this->trans('Systeem e-mailadres', [], 'cms'), 'required' => false))
            ->add('systemEmailFrom', TextType::class, array('label' => $this->trans('Systeem afzender', [], 'cms'), 'required' => false))
            ->add('adminEmail', TextType::class, array('label' => $this->trans('Systeem admin e-mailadres', [], 'cms'), 'required' => false))
            ->add('adminEmailFrom', TextType::class, array('label' => $this->trans('Systeem admin afzender', [], 'cms'), 'required' => false))
            ->add('snow', CheckboxType::class, array('label' => $this->trans('Let it snow', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('custom_navigation', CheckboxType::class, array('label' => $this->trans('Custom navigatie', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('maintenance', CheckboxType::class, array('label' => $this->trans('Onderhoudsmodus', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('inlineEdit', CheckboxType::class, array('label' => $this->trans('Live bewerken', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('maintenance_message', TextareaType::class, array('label' => $this->trans('Onderhoud bericht', [], 'cms'), 'required' => false))
            ->add('default_template', ChoiceType::class, array('label' => $this->trans('Standaard layout', [], 'cms'), 'required' => false, 'choices' => $layouts))
            // ->add('priceIncludeTax', CheckboxType::class, array('label' => 'settings.price_tax', 'required' => false, 'row_attr' => ['class' => 'page-chk']))

            ->add('api_postcode_token', TextType::class, array('label' => $this->trans(' ', [], 'cms'), 'required' => false))

            ->add('openai_key', TextType::class, array('label' => $this->trans('Verkrijgbaar op https://platform.openai.com/', [], 'cms'), 'required' => false))
            ->add('openai_model', ChoiceType::class, array('choices'  => [
                'GPT 3.5 Turbo' => 'gpt-3.5-turbo'
            ],'label' => $this->trans('AI Model', [], 'cms'), 'required' => false, 'empty_data' => 'gpt-3.5-turbo'))
            ->add('openai_temp', NumberType::class, array('label' => $this->trans('AI Temperatuur 0-2 (bepaald de creativiteit en randomness van de AI)', [], 'cms'), 'required' => false, 'empty_data' => 1))

            ->add('company', TextType::class, array('label' => $this->trans('Bedrijf', [], 'cms'), 'required' => false))
            ->add('phone', TextType::class, array('label' => $this->trans('Telefoonnummer', [], 'cms'), 'required' => false))
            ->add('address', TextType::class, array('label' => $this->trans('Adres', [], 'cms'), 'required' => false))
            ->add('postalcode', TextType::class, array('label' => $this->trans('Postcode', [], 'cms'), 'required' => false))
            ->add('place', TextType::class, array('label' => $this->trans('Plaats', [], 'cms'), 'required' => false))
            ->add('state', TextType::class, array('label' => $this->trans('Provincie', [], 'cms'), 'required' => false))
            // @TODO translate countries tooo??
            ->add('country', ChoiceType::class, array('label' => $this->trans('Land', [], 'cms'), 'required' => false, 'choices' => array('Afghanistan' => 'AF', 'Åland Islands' => 'AX', 'Albania' => 'AL', 'Algeria' => 'DZ', 'American Samoa' => 'AS', 'Andorra' => 'AD', 'Angola' => 'AO', 'Anguilla' => 'AI', 'Antarctica' => 'AQ', 'Antigua and Barbuda' => 'AG', 'Argentina' => 'AR', 'Armenia' => 'AM', 'Aruba' => 'AW', 'Australia' => 'AU', 'Austria' => 'AT', 'Azerbaijan' => 'AZ', 'Bahamas' => 'BS', 'Bahrain' => 'BH', 'Bangladesh' => 'BD', 'Barbados' => 'BB', 'Belarus' => 'BY', 'Belgium' => 'BE', 'Belize' => 'BZ', 'Benin' => 'BJ', 'Bermuda' => 'BM', 'Bhutan' => 'BT', 'Bolivia, Plurinational State of' => 'BO', 'Bonaire, Sint Eustatius and Saba' => 'BQ', 'Bosnia and Herzegovina' => 'BA', 'Botswana' => 'BW', 'Bouvet Island' => 'BV', 'Brazil' => 'BR', 'British Indian Ocean Territory' => 'IO', 'Brunei Darussalam' => 'BN', 'Bulgaria' => 'BG', 'Burkina Faso' => 'BF', 'Burundi' => 'BI', 'Cambodia' => 'KH', 'Cameroon' => 'CM', 'Canada' => 'CA', 'Cape Verde' => 'CV', 'Cayman Islands' => 'KY', 'Central African Republic' => 'CF', 'Chad' => 'TD', 'Chile' => 'CL', 'China' => 'CN', 'Christmas Island' => 'CX', 'Cocos (Keeling) Islands' => 'CC', 'Colombia' => 'CO', 'Comoros' => 'KM', 'Congo' => 'CG', 'Congo, the Democratic Republic of the' => 'CD', 'Cook Islands' => 'CK', 'Costa Rica' => 'CR', 'Côte d\'Ivoire' => 'CI', 'Croatia' => 'HR', 'Cuba' => 'CU', 'Curaçao' => 'CW', 'Cyprus' => 'CY', 'Czech Republic' => 'CZ', 'Denmark' => 'DK', 'Djibouti' => 'DJ', 'Dominica' => 'DM', 'Dominican Republic' => 'DO', 'Ecuador' => 'EC', 'Egypt' => 'EG', 'El Salvador' => 'SV', 'Equatorial Guinea' => 'GQ', 'Eritrea' => 'ER', 'Estonia' => 'EE', 'Ethiopia' => 'ET', 'Falkland Islands (Malvinas)' => 'FK', 'Faroe Islands' => 'FO', 'Fiji' => 'FJ', 'Finland' => 'FI', 'France' => 'FR', 'French Guiana' => 'GF', 'French Polynesia' => 'PF', 'French Southern Territories' => 'TF', 'Gabon' => 'GA', 'Gambia' => 'GM', 'Georgia' => 'GE', 'Germany' => 'DE', 'Ghana' => 'GH', 'Gibraltar' => 'GI', 'Greece' => 'GR', 'Greenland' => 'GL', 'Grenada' => 'GD', 'Guadeloupe' => 'GP', 'Guam' => 'GU', 'Guatemala' => 'GT', 'Guernsey' => 'GG', 'Guinea' => 'GN', 'Guinea-Bissau' => 'GW', 'Guyana' => 'GY', 'Haiti' => 'HT', 'Heard Island and McDonald Islands' => 'HM', 'Holy See (Vatican City State)' => 'VA', 'Honduras' => 'HN', 'Hong Kong' => 'HK', 'Hungary' => 'HU', 'Iceland' => 'IS', 'India' => 'IN', 'Indonesia' => 'ID', 'Iran, Islamic Republic of' => 'IR', 'Iraq' => 'IQ', 'Ireland' => 'IE', 'Isle of Man' => 'IM', 'Israel' => 'IL', 'Italy' => 'IT', 'Jamaica' => 'JM', 'Japan' => 'JP', 'Jersey' => 'JE', 'Jordan' => 'JO', 'Kazakhstan' => 'KZ', 'Kenya' => 'KE', 'Kiribati' => 'KI', 'Korea, Democratic People\'s Republic of' => 'KP', 'Korea, Republic of' => 'KR', 'Kuwait' => 'KW', 'Kyrgyzstan' => 'KG', 'Lao People\'s Democratic Republic' => 'LA', 'Latvia' => 'LV', 'Lebanon' => 'LB', 'Lesotho' => 'LS', 'Liberia' => 'LR', 'Libya' => 'LY', 'Liechtenstein' => 'LI', 'Lithuania' => 'LT', 'Luxembourg' => 'LU', 'Macao' => 'MO', 'Macedonia, the former Yugoslav Republic of' => 'MK', 'Madagascar' => 'MG', 'Malawi' => 'MW', 'Malaysia' => 'MY', 'Maldives' => 'MV', 'Mali' => 'ML', 'Malta' => 'MT', 'Marshall Islands' => 'MH', 'Martinique' => 'MQ', 'Mauritania' => 'MR', 'Mauritius' => 'MU', 'Mayotte' => 'YT', 'Mexico' => 'MX', 'Micronesia, Federated States of' => 'FM', 'Moldova, Republic of' => 'MD', 'Monaco' => 'MC', 'Mongolia' => 'MN', 'Montenegro' => 'ME', 'Montserrat' => 'MS', 'Morocco' => 'MA', 'Mozambique' => 'MZ', 'Myanmar' => 'MM', 'Namibia' => 'NA', 'Nauru' => 'NR', 'Nepal' => 'NP', 'Netherlands' => 'NL', 'New Caledonia' => 'NC', 'New Zealand' => 'NZ', 'Nicaragua' => 'NI', 'Niger' => 'NE', 'Nigeria' => 'NG', 'Niue' => 'NU', 'Norfolk Island' => 'NF', 'Northern Mariana Islands' => 'MP', 'Norway' => 'NO', 'Oman' => 'OM', 'Pakistan' => 'PK', 'Palau' => 'PW', 'Palestinian Territory, Occupied' => 'PS', 'Panama' => 'PA', 'Papua New Guinea' => 'PG', 'Paraguay' => 'PY', 'Peru' => 'PE', 'Philippines' => 'PH', 'Pitcairn' => 'PN', 'Poland' => 'PL', 'Portugal' => 'PT', 'Puerto Rico' => 'PR', 'Qatar' => 'QA', 'Réunion' => 'RE', 'Romania' => 'RO', 'Russian Federation' => 'RU', 'Rwanda' => 'RW', 'Saint Barthélemy' => 'BL', 'Saint Helena, Ascension and Tristan da Cunha' => 'SH', 'Saint Kitts and Nevis' => 'KN', 'Saint Lucia' => 'LC', 'Saint Martin (French part)' => 'MF', 'Saint Pierre and Miquelon' => 'PM', 'Saint Vincent and the Grenadines' => 'VC', 'Samoa' => 'WS', 'San Marino' => 'SM', 'Sao Tome and Principe' => 'ST', 'Saudi Arabia' => 'SA', 'Senegal' => 'SN', 'Serbia' => 'RS', 'Seychelles' => 'SC', 'Sierra Leone' => 'SL', 'Singapore' => 'SG', 'Sint Maarten (Dutch part)' => 'SX', 'Slovakia' => 'SK', 'Slovenia' => 'SI', 'Solomon Islands' => 'SB', 'Somalia' => 'SO', 'South Africa' => 'ZA', 'South Georgia and the South Sandwich Islands' => 'GS', 'South Sudan' => 'SS', 'Spain' => 'ES', 'Sri Lanka' => 'LK', 'Sudan' => 'SD', 'Suriname' => 'SR', 'Svalbard and Jan Mayen' => 'SJ', 'Swaziland' => 'SZ', 'Sweden' => 'SE', 'Switzerland' => 'CH', 'Syrian Arab Republic' => 'SY', 'Taiwan, Province of China' => 'TW', 'Tajikistan' => 'TJ', 'Tanzania, United Republic of' => 'TZ', 'Thailand' => 'TH', 'Timor-Leste' => 'TL', 'Togo' => 'TG', 'Tokelau' => 'TK', 'Tonga' => 'TO', 'Trinidad and Tobago' => 'TT', 'Tunisia' => 'TN', 'Turkey' => 'TR', 'Turkmenistan' => 'TM', 'Turks and Caicos Islands' => 'TC', 'Tuvalu' => 'TV', 'Uganda' => 'UG', 'Ukraine' => 'UA', 'United Arab Emirates' => 'AE', 'United Kingdom' => 'GB', 'United States' => 'US', 'United States Minor Outlying Islands' => 'UM', 'Uruguay' => 'UY', 'Uzbekistan' => 'UZ', 'Vanuatu' => 'VU', 'Venezuela, Bolivarian Republic of' => 'VE', 'Viet Nam' => 'VN', 'Virgin Islands, British' => 'VG', 'Virgin Islands, U.S.' => 'VI', 'Wallis and Futuna' => 'WF', 'Western Sahara' => 'EH', 'Yemen' => 'YE', 'Zambia' => 'ZM', 'Zimbabwe' => 'ZW')))
            ->add('kvk', TextType::class, array('label' => $this->trans('KVK-nummer', [], 'cms'), 'required' => false))
            ->add('taxNo', TextType::class, array('label' => $this->trans('BTW-nummer', [], 'cms'), 'required' => false))
            ->add('iban', TextType::class, array('label' => $this->trans('IBAN', [], 'cms'), 'required' => false))
            ->add('bic', TextType::class, array('label' => $this->trans('BIC-code', [], 'cms'), 'required' => false))
            ->add('kvk_location', TextType::class, array('label' => $this->trans('KVK locatie', [], 'cms'), 'required' => false))
            ->add('invoice_period', TextType::class, array('label' => $this->trans('Factuur vervaldagen', [], 'cms'), 'required' => false))

            ->add('twitter', TextType::class, array('label' => $this->trans('Twitter', [], 'cms'), 'required' => false))
            ->add('facebook', TextType::class, array('label' => $this->trans('Facebook', [], 'cms'), 'required' => false))
            ->add('instagram', TextType::class, array('label' => $this->trans('Instagram', [], 'cms'), 'required' => false))
            ->add('youtube', TextType::class, array('label' => $this->trans('Youtube', [], 'cms'), 'required' => false))
            ->add('linkedin', TextType::class, array('label' => $this->trans('LinkedIn', [], 'cms'), 'attr' => ['placeholder' => $this->trans('Bijv. /in/test-629a5818 of /company/test', [], 'cms')], 'required' => false))
            ->add('google_g', TextType::class, array('label' => $this->trans('Google Analytics 4', [], 'cms'), 'required' => false, 'attr' => ['placeholder' => 'G-##########']))
            ->add('google_ua', TextType::class, array('label' => $this->trans('Google Analytics', [], 'cms'), 'required' => false, 'attr' => ['placeholder' => 'UA-########-1']))
            ->add('google_cc', TextType::class, array('label' => $this->trans('Google Site Verification', [], 'cms'), 'required' => false, 'attr' => ['placeholder' => '5uizJUhrBdfFoQJMtUImPU1CLioSzxsHF1MmUmmWPAU']))
            ->add('google_gtm', TextType::class, array('label' => $this->trans('Google Tag Manager', [], 'cms'), 'required' => false, 'attr' => ['placeholder' => 'GTM-#######']))
            ->add('google_recaptcha_sitekey', TextType::class, array('label' => $this->trans('Google reCAPTCHA (sitekey)', [], 'cms'), 'required' => false))
            ->add('google_recaptcha_secret', TextType::class, array('label' => $this->trans('Google reCAPTCHA (secret)', [], 'cms'), 'required' => false))
            ->add('captcha_treshold', RangeType::class, array('label' => $this->trans('Google reCAPTCHA treshold (hoger is strenger)', [], 'cms'), 'attr' => ['style' => 'margin-bottom: 0;'], 'required' => false))
            ->add('google_recaptcha_text', TextType::class, array('label' => $this->trans('Google reCAPTCHA text (optional, max 255 characters)', [], 'cms'), 'required' => false))
            ->add('google_recaptcha_mode', ChoiceType::class, array('label' => $this->trans('Google reCAPTCHA modus', [], 'cms'), 'required' => true, 'choices' => [
                $this->trans('Versie 2: Checkbox', [], 'cms') => '2_checkbox',
                $this->trans('Versie 2: Onzichtbaar', [], 'cms') => '2_invisible',
                $this->trans('Versie 3: Onzichtbaar', [], 'cms') => '3_invisible',
            ]))
            ->add('face_domain_key', TextType::class, array('label' => $this->trans('Meta (Facebook) Domain Verification', [], 'cms'), 'required' => false, 'attr' => ['placeholder' => 'd5zeTiJ6uIkbpEflvZC1UGsc9bzucV']))
            ->add('facebook_pixel', TextType::class, array('label' => $this->trans('Meta Pixel ID', [], 'cms'), 'required' => false, 'attr' => ['placeholder' => '1234567891011123']))
            ->add('meta_api_token', TextType::class, array('label' => $this->trans('Meta Conversie API token', [], 'cms'), 'required' => false, 'attr' => ['placeholder' => 'bmxmcRlmxFCuMnJCMSQcBwh3Ckj9XqyeMCK7ailgsTioDw7ZvzdesopTg8RhrlecEIRC85PDSqIZ4wox5PouHNTfC7hlcDTA7uZv6aAhuxASvnxgAGeQL8TwvmfRyjVGGDboRmUYMTnXDQIxjMPMXAjeCFrqzekFDxJdcvPV0nRshfiTrUfYGJpjK7ZGnyQlTN8OhsCyL']))
            ->add('piwik_url', TextType::class, array('label' => $this->trans('Matomo URL', [], 'cms'), 'required' => false))
            ->add('piwik_api_hash', TextType::class, array('label' => $this->trans('API hash', [], 'cms'), 'required' => false))
            ->add('piwik_site_id', TextType::class, array('label' => $this->trans('Site ID', [], 'cms'), 'required' => false))
            ->add('piwik_container_hashs', TextType::class, array('label' => $this->trans("Matomo container id's (comma gescheiden)", [], 'cms'), 'required' => false))
            ->add('uptime_robot_key', TextType::class, array('label' => $this->trans('UptimeRobot API', [], 'cms'), 'required' => false))
			->add('mollie_api_test', TextType::class, array('label' => $this->trans('API sleutel (test)', [], 'cms'), 'required' => false))
            ->add('mollie_api_live', TextType::class, array('label' => $this->trans('API sleutel (live)', [], 'cms'), 'required' => false))
            ->add('mollie_live', CheckboxType::class, array('label' => $this->trans('Live modus', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('mollie_subscription', CheckboxType::class, array('label' => $this->trans('Abonnementen inschakelen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('pay_api_test', TextType::class, array('label' => $this->trans('API sleutel (test)', [], 'cms'), 'required' => false))
            ->add('pay_api_live', TextType::class, array('label' => $this->trans('API sleutel (live)', [], 'cms'), 'required' => false))
            ->add('pay_service_id', TextType::class, array('label' => $this->trans('Service ID', [], 'cms'), 'required' => false))
            ->add('pay_live', CheckboxType::class, array('label' => $this->trans('Live modus', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('multisafepay_api', TextType::class, array('label' => $this->trans('API sleutel (live)', [], 'cms'), 'required' => false))
			->add('multisafepay_api_test', TextType::class, array('label' => $this->trans('API sleutel (test)', [], 'cms'), 'required' => false))
            ->add('multisafepay_live', CheckboxType::class, array('label' => $this->trans('Live modus', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('buckaroo_website_key', TextType::class, array('label' => $this->trans('Website sleutel', [], 'cms'), 'required' => false))
			->add('buckaroo_secret', TextType::class, array('label' => $this->trans('Geheime sleutel', [], 'cms'), 'required' => false))
            ->add('buckaroo_live', CheckboxType::class, array('label' => $this->trans('Live modus', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
			->add('omnikassa_live', CheckboxType::class, array('label' => $this->trans('Live modus', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('omnikassa_sign', TextType::class, array('label' => $this->trans('Signing token (productie)', [], 'cms'), 'required' => false))
            ->add('omnikassa_refresh', TextType::class, array('label' => $this->trans('Refresh token (productie)', [], 'cms'), 'required' => false))
            ->add('omnikassa_sign_test', TextType::class, array('label' => $this->trans('Signing token (sandbox)', [], 'cms'), 'required' => false))
            ->add('omnikassa_refresh_test', TextType::class, array('label' => $this->trans('Refresh token (sandbox)', [], 'cms'), 'required' => false))
            ->add('tinypng_api', TextType::class, array('label' => $this->trans('API sleutel','cms'), 'required' => false))
            ->add('sisow_live', CheckboxType::class, array('label' => $this->trans('Live modus', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('sisow_merchant_id', TextType::class, array('label' => $this->trans('Merchant ID', [], 'cms'), 'required' => false))
            ->add('sisow_merchant_key', TextType::class, array('label' => $this->trans('Merchant sleutel', [], 'cms'), 'required' => false))
            ->add('sisow_shop_id', TextType::class, array('label' => $this->trans('Winkel/shop ID', [], 'cms'), 'required' => false))
            ->add('paypro_live', CheckboxType::class, array('label' => $this->trans('Live modus', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('paypro_key', TextType::class, array('label' => $this->trans('API sleutel', [], 'cms'), 'required' => false))
            ->add('paypro_subscription', CheckboxType::class, array('label' => $this->trans('Abonnementen inschakelen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('allow_registration', CheckboxType::class, array('label' => $this->trans('Registreren toestaan', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('moderate_registration', CheckboxType::class, array('label' => $this->trans('Registraties modereren', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('birthday_fields', CheckboxType::class, array('label' => $this->trans('Geboortedatum velden tonen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))			
            ->add('santander_loan_active', CheckboxType::class, array('label' => $this->trans('Santander leen API ingeschakeld', [], 'cms'), 'required' => false))
            ->add('santander_is_live', CheckboxType::class, array('label' => $this->trans('Santander leen API is live', [], 'cms'), 'required' => false))
            ->add('santander_loan_api_test', TextType::class, array('label' => $this->trans('Test API sleutel','cms'), 'required' => false))
            ->add('santander_loan_api_live', TextType::class, array('label' => $this->trans('Live API sleutel','cms'), 'required' => false))
            /*->add('layout_include_css', ChoiceType::class, array(
                "multiple" => true,
                "expanded" => true,
                "label" => "CSS:",
                "choices" => array(
                    'CSS: Bootstrap (v3.3.7)' => '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
                    'CSS: Bootstrap (theme, v3.3.7)' => '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css',
                    'CSS: Bootstrap (v4.0.0-beta.2)' => '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css',
                    'CSS: Bootstrap (v4.3.1)' => '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css',
                    'CSS: Slick slider (v1.8.1)' => '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css',
                    'CSS: Slick theme (v1.8.1)' => '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css',
                )
            ))
            ->add('layout_include_js', ChoiceType::class, array(
                "multiple" => true,
                "expanded" => true,
                "label" => "Javascript:",
                "choices" => array(
                    'JS: jQuery (v3.1.1)' => '//code.jquery.com/jquery-3.1.1.min.js',
                    'JS: jQuery (v3.3.1)' => '//code.jquery.com/jquery-3.3.1.min.js',
                    'JS: Popper (v1.12.3)' => '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js',
                    'JS: Popper (v1.14.7)' => '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js',
                    'JS: Bootstrap (v3.3.7)' => '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
                    'JS: Bootstrap (v4.0.0-beta.2)' => '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js',
                    'JS: Bootstrap (v4.3.1)' => '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',
                    'JS: Slick slider (v1.8.1)' => '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js',
                    'JS: Chart.js (v2.7.1)' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js',
                    'JS: Moments' => '//momentjs.com/downloads/moment.js',
                    'JS: Moments (with locales)' => '//momentjs.com/downloads/moment-with-locales.js',
                )
            ))
            ->add('layout_include_font', ChoiceType::class, array(
                "multiple" => true,
                "expanded" => true,
                "label" => "Fonts:",
                "choices" => array(
                    'FONT: Font Awesome (v4.7.0)' => '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
                    'FONT: Font Awesome (v5.0.6)' => '//use.fontawesome.com/releases/v5.0.6/css/all.css',
                    'FONT: Font Awesome (v5.7.2)' => '//use.fontawesome.com/releases/v5.7.2/css/all.css',
                    'FONT: Font Awesome (v5.10.2)' => '//use.fontawesome.com/releases/v5.10.2/css/all.css',
                )
            ))*/
            ->add('robots', ChoiceType::class, array(
                "multiple" => false,
                "expanded" => false,
                "label" => $this->trans("Zoekmachines", [], 'cms'),
                "choices" => array(
                    $this->trans('Niet indexeren of volgen', [], 'cms') => 'noindex,nofollow',
                    $this->trans('Alleen indexeren', [], 'cms')         => 'index,nofollow',
                    $this->trans('Indexeren en volgen', [], 'cms')      => 'index,follow',
                )
            ))

            // Access control
            ->add('restrict_access', TextareaType::class, array('label' => $this->trans('Toegestane IP-adressen (huidig: %remoteaddr%)', ['%remoteaddr%' => $_SERVER['REMOTE_ADDR']], 'cms'), 'required' => false, 'attr' => array('placeholder' => $this->trans('Één IP-adres per regel.', [], 'cms'))))
            ->add('restrict_access_deny', TextareaType::class, array('label' => $this->trans('Geblokkeerde IP-adressen (huidig: %remoteaddr%)', ['%remoteaddr%' => $_SERVER['REMOTE_ADDR']], 'cms'), 'required' => false, 'attr' => array('placeholder' => $this->trans('Één IP-adres per regel.', [], 'cms'))))
            ->add('restrict_access_type', ChoiceType::class, array(
                "label" => $this->trans("Blokkering", [], 'cms'),
                "choices" => array(
                    $this->trans('Admin', [], 'cms') => 'admin',
                    $this->trans('Admin + website', [], 'cms') => 'admin_website',
                    $this->trans('Uitgaande e-mail blokkeren', [], 'cms') => 'email',
                )
            ))
                
            ->add('favicon_location', TextType::class, array('label' => $this->trans('Override favicon.ico (zonder / aan het begin)', [], 'cms'), 'required' => false))
            ->add('apple_touch_icon', TextType::class, array('label' => $this->trans('Override apple_touch_icon (zonder / aan het begin)', [], 'cms'), 'required' => false))
            ->add('author', TextType::class, array('label' => $this->trans('Override site author', [], 'cms'), 'required' => false))
            ->add('og_site_name', TextType::class, array('label' => $this->trans('Set og:site_name', [], 'cms'), 'required' => false))

            ->add('footer_block_1', TextareaType::class, array('label' => $this->trans('Footer blok 1', [], 'cms'), 'required' => false))
            ->add('footer_block_2', TextareaType::class, array('label' => $this->trans('Footer blok 2', [], 'cms'), 'required' => false))
            ->add('footer_block_3', TextareaType::class, array('label' => $this->trans('Footer blok 3', [], 'cms'), 'required' => false))
            ->add('footer_block_4', TextareaType::class, array('label' => $this->trans('Footer blok 4', [], 'cms'), 'required' => false))
            ->add('footer_block_5', TextareaType::class, array('label' => $this->trans('Footer blok 5', [], 'cms'), 'required' => false))

            ->add('errorNotFound', TextareaType::class, array('label' => $this->trans('Fout: Pagina niet gevonden', [], 'cms'), 'required' => false))
            ->add('errorNoAccess', TextareaType::class, array('label' => $this->trans('Fout: Geen toegang', [], 'cms'), 'required' => false))
            ->add('errorSystem', TextareaType::class, array('label' => $this->trans('Fout: Systeem fout', [], 'cms'), 'required' => false))

            ->add('header_bar', CheckboxType::class, array('label' => $this->trans('Header balk inschakelen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('header_bar_left', TextareaType::class, array('label' => $this->trans('Inhoud links', [], 'cms'), 'required' => false))
            ->add('header_bar_right', TextareaType::class, array('label' => $this->trans('Inhoud rechts', [], 'cms'), 'required' => false))

            ->add('postnl_checker', CheckboxType::class, array('label' => $this->trans('Postnl inschakelen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('postnl_key', TextType::class, array('label' => $this->trans('Key', [], 'cms'), 'required' => false))
            ->add('postnl_secret_key', TextType::class, array('label' => $this->trans('Secret key', [], 'cms'), 'required' => false))

            ->add('cache_cdn', CheckboxType::class, array('label' => $this->trans('CDN cache inschakelen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('force_https', CheckboxType::class, array('label' => $this->trans('HTTPS forceren', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('calendar', CheckboxType::class, array('label' => $this->trans('Kalender functionaliteit', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))

            ->add('cookiebar', CheckboxType::class, array('label' => $this->trans('Cookiebar inschakelen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('cookiebar_button', CheckboxType::class, array('label' => $this->trans('Reset-knop inschakelen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('cookiebar_button_position', ChoiceType::class, array(
                "label" => $this->trans("Reset-knop positie", [], 'cms'),
                "choices" => array(
                    $this->trans('Onderaan', [], 'cms') => 'bottom',
                    $this->trans('Bovenaan', [], 'cms') => 'top',
                )
            ))
            ->add('cookiebar_button_offset', TextType::class, array('label' => $this->trans('Reset-knop afstand (px)', [], 'cms'), 'required' => false))

            ->add('base_uri', TextType::class, array('label' => $this->trans('Base URI (multi-language)', [], 'cms'), 'attr' => ['placeholder' => $this->trans('Bijv. /en', [], 'cms')], 'required' => false))
            ->add('app_label', TextType::class, array('label' => $this->trans('App titel', [], 'cms'), 'required' => false))
            ->add('override_key', TextType::class, array('label' => $this->trans('Override key', [], 'cms'), 'required' => false))
            ->add('ios_app_id', TextType::class, array('label' => $this->trans('iOS App ID', [], 'cms'), 'required' => false))
            ->add('android_app_id', TextType::class, array('label' => $this->trans('Android App ID', [], 'cms'), 'required' => false))

            ->add('avg_cookie', TextType::class, array('label' => $this->trans('Cookie pagina', [], 'cms'), 'required' => false))
            ->add('avg_disclaimer', TextType::class, array('label' => $this->trans('Disclaimer pagina', [], 'cms'), 'required' => false))
            ->add('avg_privacy', TextType::class, array('label' => $this->trans('Privacy pagina', [], 'cms'), 'required' => false))

            ->add('ignore_cms_blocks', CheckboxType::class, array('label' => $this->trans('Negeer CMS blocks', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
			
			->add('lef_api_active', CheckboxType::class, array('label' => $this->trans('API activeren', [], 'cms'), 'required' => false))
			->add('lef_api_live', CheckboxType::class, array('label' => $this->trans('Live url inschakelen', [], 'cms'), 'required' => false))
			->add('lef_api_test_url', TextType::class, array('label' => $this->trans('Test url', [], 'cms'), 'required' => false))
			->add('lef_api_live_url', TextType::class, array('label' => $this->trans('Live url', [], 'cms'), 'required' => false))
			->add('lef_user_name', TextType::class, array('label' => $this->trans('Gebruikersnaam', [], 'cms'), 'required' => false))
			->add('lef_password', TextType::class, array('label' => $this->trans('Password', [], 'cms'), 'required' => false))
			->add('lef_occasion_request', CheckboxType::class, array('label' => $this->trans('In Occasion aanvraag activeren', [], 'cms'), 'required' => false))
			->add('lef_finance_occasion_request', CheckboxType::class, array('label' => $this->trans('In Occasion financieringsaanvraag activeren', [], 'cms'), 'required' => false))
			->add('lef_forms_request', CheckboxType::class, array('label' => $this->trans('In formulier aanvraag activeren', [], 'cms'), 'required' => false))
			->add('lef_privatelease_request', CheckboxType::class, array('label' => $this->trans('In Private Lease aanvraag activeren', [], 'cms'), 'required' => false))
			->add('lef_offer_request', CheckboxType::class, array('label' => $this->trans('In Offerte aanvraag activeren', [], 'cms'), 'required' => false))
			->add('lef_testdrive_request', CheckboxType::class, array('label' => $this->trans('In Proefrit aanvraag activeren', [], 'cms'), 'required' => false))
            ->add('is_catalog', CheckboxType::class, array('label' => $this->trans('Toon webshop als catalogus', [], "cms"), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
			
            // Out of office form
            ->add('outOfOfficeStart', DateType::class, array(
                'label' => $this->trans('Startdatum', [], "webshop_backend"),
                'input'  => 'datetime',
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,
                'format' => 'y-MM-dd',
                'attr' => array('class' => 'trinity_date')
            ))
            ->add('outOfOfficeEnd', DateType::class, array(
                'label' => $this->trans('Einddatum', [], "webshop_backend"),
                'input'  => 'datetime',
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,
                'format' => 'y-MM-dd',
                'attr' => array('class' => 'trinity_date')
            ))
            ->add('outOfOfficeMessage', TextareaType::class, array('label' => $this->trans('Vakantie meldingen', [], 'cms'), 'required' => false))
            ->add('outOfOfficeEnabled', CheckboxType::class, array('label' => $this->trans('Inschakelen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))

            ->add('Hummessenger_api_enabled', CheckboxType::class, array('label' => $this->trans('Inschakelen', [], 'cms'), 'required' => false,  'row_attr' => ['class' => 'page-chk']))
            ->add('Hummessenger_api_url', TextType::class, array('label' => $this->trans('Hummessenger Api base url', [], 'cms'), 'required' => false))
            ->add('Hummessenger_api_key', TextType::class, array('label' => $this->trans('Hummessenger Api key', [], 'cms'), 'required' => false))

			->setAction($this->containerInterface->get("router")->generate("admin_settings"))
			->setMethod('post')
			->getForm();

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$Settings->setMediaDimensions($_POST['dimensions']);
			$Settings->setMaxMediaSize(trim($request->request->get('maxmediauploadsize')));

            $foundMedia = [];

            if(!empty($_POST['link'])){
                foreach($_POST['link'] as $k => $v){
                    if(!empty($v)){
                        $id = (0 + $v);
                        $v = \App\CmsBundle\Util\Util::dashesToCamelCase($k, true);
                        $has = 'has' . $v;
                        $get = 'get' . $v . 'Object';
                        $set = 'set' . $v . '';

                        $FoundMedia = $this->getDoctrine()->getRepository('CmsBundle:Media')->find($id);


                        if($FoundMedia){
                            $Settings->$set($FoundMedia);
                            $foundMedia[] = $v;
                        }
                    }
                }
            }

            if(!empty($_POST['delete'])){
                foreach($_POST['delete'] as $k => $v){
                    if(!empty($v)){
                        $v = \App\CmsBundle\Util\Util::dashesToCamelCase($k, true);
                        if(!in_array($v, $foundMedia)){
                            $has = 'has' . $v;
                            $get = 'get' . $v . 'Object';
                            $set = 'set' . $v . '';
                            if($Settings->$has()){
                                $PrevMedia = $Settings->$get();
                                try{
                                    $Settings->$set(null);
                                    //$em->remove($PrevMedia);
                                }catch(\Exception $e){}
                            }
                        }
                    }
                }
            }

            $Settings->setLayoutIncludeJs([]);
            $Settings->setLayoutIncludeCss([]);
            $Settings->setLayoutIncludeFont([]);

            $extension = (!empty($_POST['extension']) ? $_POST['extension'] : []);
            if(!empty($extension['layout_include_js'])){ $Settings->setLayoutIncludeJs($extension['layout_include_js']); }
            if(!empty($extension['layout_include_css'])){ $Settings->setLayoutIncludeCss($extension['layout_include_css']); }
            if(!empty($extension['layout_include_font'])){ $Settings->setLayoutIncludeFont($extension['layout_include_font']); }

            $Settings->setBuckarooEnabled(!empty($_POST['buckaroo_enabled']));
            $Settings->setPayEnabled(!empty($_POST['pay_enabled']));
            $Settings->setMollieEnabled(!empty($_POST['mollie_enabled']));
            $Settings->setOmnikassaEnabled(!empty($_POST['omnikassa_enabled']));
            $Settings->setMultisafepayEnabled(!empty($_POST['multisafepay_enabled']));
            $Settings->setSisowEnabled(!empty($_POST['sisow_enabled']));

            $sisow_options = [];
            if(!empty($_POST['sisow_options']) && is_array($_POST['sisow_options'])){
                $sisow_options = array_keys($_POST['sisow_options']);
            }
            $Settings->setSisowOptions($sisow_options);
            
            $Settings->setPayproEnabled(!empty($_POST['paypro_enabled']));

            if($Settings->getHost() != $currentHost){
                $mediaDir = $em->getRepository('CmsBundle:MediaDir')->findOneByLabel($currentHost);
                if(!empty($mediaDir)){
                    $mediaDir->setLabel($Settings->getHost());
                    $em->persist($mediaDir);
                }
            }

            /*if(!empty($Settings->getHost())){
                $existingSettingsWithHost = $em->getRepository('CmsBundle:Settings')->findByHost($Settings->getHost());
                foreach($existingSettingsWithHost as $S){
                    if($S != $Settings){
                        $S->setHost(null);
                        $em->persist($S);
                    }
                }
            }*/



            $swap = [];
            foreach($_POST['color_swap_from'] as $k => $f){
                $t = $_POST['color_swap_to'][$k];
                if(!empty($f) && !empty($t)){
                    $swap[$f] = $t;
                }
            }

            $Settings->setColorSwap($swap);


            
            $Syslog = new Log();
            $Syslog->setAction('update');
            $Syslog->setUser($this->getUser());
            $Syslog->setUsername($this->getUser()->getUsername());
            $Syslog->setType('settings');
            $Syslog->setStatus('info');
            $Syslog->setObjectId($Settings->getId());
            $Syslog->setSettings($this->Settings);
            $Syslog->setMessage('Instellingen zijn gewijzigd.');
            $em->persist($Syslog);

			$em->persist($Settings);
			$em->flush();

			// if cache is enabled, find pages with blog and reset them.
			$this->resetPageCacheThatContainedBundle(null, $this->Settings);

			return $this->redirect($this->generateUrl('admin_settings'));
		}

        $maxFileSize = 10;
        try{
            $maxFileSize = (int)ini_get('upload_max_filesize');
        }catch(\Exception $e){
            // Nothing going on here
        }

        $version_apache = '<i>' . $this->trans('Onbekend', [], 'cms') . '</i>';
        if(function_exists('apache_get_version')){
            $version_apache = apache_get_version();
        }

        $version_php = '<i>' .$this->trans('Onbekend', [], 'cms') . '</i>';
        if(function_exists('phpversion')){
            $version_php = phpversion();
        }

        $Tinify = $this->Settings->getTinifyObject();

        $maxMediaFileSize = $this->Settings->getMaxMediaSizeInKB();

        return $this->attributes(array(
            'form'             => $form->createView(),
            'maxFileSize'      => $maxFileSize,
            'maxMediaFileSize' => $maxMediaFileSize,
            'Tinify'           => $Tinify,
            
            // Server information
            'version_apache'   => $version_apache,
            'version_php'      => $version_php,
            'ck_mediadir_id'   => $SettingsMediadir->getId(),
        ));
    }

    /**
     * @Route("/admin/settings/mailtest", name="admin_settings_mailtest")
     * @Template()
     */
    public function mailtestAction( Request $request)
    {
        parent::init($request);

        $this->breadcrumbs->addItem($this->trans("E-mail test", [], 'cms'), $this->containerInterface->get("router")->generate("admin_settings_mailtest"));


        $send = false;
        $errors = array();
        if(!empty($_POST)){
            if(empty($_POST['to'])) $errors[] = $this->trans('Geen ontvanger ingevuld.', [], 'cms');
            if(empty($_POST['to_email'])) $errors[] = $this->trans('Geen ontvanger e-mailadres ingevuld.', [], 'cms');
            if(empty($_POST['subject'])) $errors[] = $this->trans('Geen onderwerp ingevuld.', [], 'cms');
            if(empty($_POST['message'])) $errors[] = $this->trans('Geen bericht ingevuld.', [], 'cms');

            if(empty($errors)){
				$mailer = clone $this->mailer;
				$mailer->init();
                $mailer->setSettings($this->Settings);
                $mailer->setSubject($_POST['subject'])
                        ->setTwigBody('emails/' . $_POST['template'], [
                            'label' => $_POST['label'],
                            'message' => $_POST['message']
                        ])
                        ->setPlainBody($_POST['message'])
                        ->setTo([$_POST['to_email'] => $_POST['to']]);
                $send = $mailer->execute();
            }
        }

        $templates = scandir('../templates/emails');
        foreach($templates as $k => $v){
            if(substr($v, 0, 1) == '.'){
                unset($templates[$k]);
            }
        }


        return $this->attributes([
            'templates' => $templates,
            'send' => $send,
            'errors' => $errors
        ]);
    }

    /**
     * @param string $locale
     * @param array  $transPaths
     *
     * @return MessageCatalogue
     */
    private function extractMessages($locale, $transPaths)
    {
        $extractedCatalogue = new MessageCatalogue($locale);
        foreach ($transPaths as $path) {
            $path = $path.'views';
            if (is_dir($path)) {
                $this->containerInterface->get('translation.extractor')->extract($path, $extractedCatalogue);
            }
        }

        return $extractedCatalogue;
    }

    /**
     * @param string            $locale
     * @param array             $transPaths
     * @param TranslationLoader $loader
     *
     * @return MessageCatalogue
     */
    private function loadCurrentMessages($locale, $transPaths, TranslationLoader $loader)
    {
        $currentCatalogue = new MessageCatalogue($locale);
        foreach ($transPaths as $path) {
            $path = $path.'translations';
            if (is_dir($path)) {
                $loader->loadMessages($path, $currentCatalogue);
            }
        }

        return $currentCatalogue;
    }

    /**
     * @Route("/admin/settings/languages", name="admin_settings_languages")
     * @Template()
     */
    public function languagesAction( Request $request )
    {
        parent::init($request);

        if(!empty($_FILES['lang_file'])){
            $em = $this->getDoctrine()->getManager();

            $added = 0;
            $updated = 0;
            $success = true;

            $r = 0;
            $file = fopen($_FILES['lang_file']['tmp_name'],"r");
            while (($data = fgetcsv($file)) !== FALSE) {
                if($r > 0){
                    $Language = $this->getDoctrine()->getRepository('CmsBundle:Language')->findOneByLocale($data[0]);
                    if(!empty($Language)){

                        $token = $this->getDoctrine()->getRepository('CmsBundle:LanguageToken')->findOneByToken($data[2]);
                        if(empty($token)){
                            // NEW TOKEN
                            $token = new LanguageToken();
                            $token->setToken($data[2]);
                            $em->persist($token);
                        }

                        $translation = $this->getDoctrine()->getRepository('CmsBundle:LanguageTranslation')->findOneBy([
                            'language' => $Language,
                            'languageToken' => $token,
                            'catalogue' => $data[1],
                        ]);
                        if(empty($translation)){
                            // NEW TRANSLATION
                            $translation = new LanguageTranslation();
                            $translation->setLanguage($Language);
                            $translation->setLanguageToken($token);
                            $translation->setCatalogue($data[1]);

                            $added++;
                        }else{
                            $updated++;
                        }

                        $translation->setTranslation($data[3]);
                        $em->persist($translation);
                    }else{
                        $success = false;
                        $this->addFlash('', '<i class="material-icons left">clear</i>' . $this->trans('Geen taal gevonden met de taalcode: <strong style="padding-left:6px;">%localecode%</strong>.', ['%localecode%' => $data[0]], 'cms'));
                        break;
                    }
                }
                $r++;
            }

            if($success){
                $em->flush();

                $this->addFlash('', '<i class="material-icons left">check</i>' . $this->trans('Het importeren is gelukt.<br/>%added% toegevoegd<br/>%updated% gewijzigd', ['%added%' => $added, '%updated%' => $updated], 'cms'));
            }
        }

        $this->breadcrumbs->addItem($this->trans("Talen", [], 'cms'), $this->containerInterface->get("router")->generate("admin_settings_languages"));

        return $this->attributes(array('languages' => $this->getDoctrine()->getRepository('CmsBundle:Language')->findAll()));
    }

    /**
     * @Route("/admin/settings/languages/delete/{id}", name="admin_settings_languages_delete")
     */
    public function deleteLanguageAction( Request $request, $id = null )
    {
        parent::init($request);

        if($id){
            $Language = $this->getDoctrine()->getRepository('CmsBundle:Language')->find($id);
            $Settings = $this->getDoctrine()->getRepository('CmsBundle:Settings')->findBy(['language' => $Language]);
            
            $em = $this->getDoctrine()->getManager();
            foreach($Settings as $S){
                $em->remove($S);
                $em->flush();
            }

            $Translations = $this->getDoctrine()->getRepository('CmsBundle:LanguageTranslation')->findBy(['language' => $Language]);
            foreach($Translations as $S){
                $em->remove($S);
            }
            $em->flush();

            $em->remove($Language);
            $em->flush();
            
            $this->addFlash(
                '',
                $this->trans('De taal is verwijderd', [], 'cms')
            );
        }


        return $this->redirect($this->generateUrl('admin_settings_languages'));
    }

    /**
     * @Route("/admin/settings/languages/dl/{id}/{group}", name="admin_settings_languages_dl")
     * @Template()
     */
    public function dlLanguageAction( Request $request, $id, $group = null )
    {
        parent::init($request);
        $Language = $this->getDoctrine()->getRepository('CmsBundle:Language')->find($id);
        $locale = strtoupper($Language->getLocale());

        if(!empty($group)){
            $groups = [$group];
        }else{
            $languagetranslations = $this->getDoctrine()->getRepository('CmsBundle:LanguageTranslation')->findBy([ 'language' => $Language ]);
            $groups = [];
            foreach($languagetranslations as $T){
                if(!in_array($T->getCatalogue(), $groups)){
                    $groups[] = $T->getCatalogue();
                }
            }
        }

        $type = [
            'blog'            => 'nieuws',
            'forms'           => 'formulieren',
            'faq_backend'     => 'backend_faq',
            'cookiebar'       => 'cookiebar',
            'login'           => 'frontend_login',
            'messages'        => 'backend_globaal',
            'webshop'         => 'frontend_webshop',
            'webshop_backend' => 'backend_webshop',
            'faq'             => 'frontend_faq',
            'search'          => 'frontend_zoeken',
            'frontend'        => 'frontend_globaal',
            'pelikan'         => 'frontend_pelikan',
            'cms'             => 'backend_cms',
            'blocks'          => 'backend_blocks',
            'blokken'         => 'backend_blokken',
        ];

        // create your zip file
        $zipname = 'translations_' . $this->Settings->getLabel() . '_' . $locale . '.zip';
        $zip = new \ZipArchive;
        $zip->open($zipname, \ZipArchive::CREATE);

        foreach($groups as $group){
            $filename = strtolower((!empty($type[$group]) ? $type[$group] : $group) . '.csv');

            $languagetranslations = $this->getDoctrine()->getRepository('CmsBundle:LanguageTranslation')->findBy([
                'language' => $Language,
                'catalogue' => $group,
            ]);

            // disable caching
            /*$now = gmdate("D, d M Y H:i:s");
            header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
            header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
            header("Last-Modified: {$now} GMT");

            // force download
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");

            // disposition / encoding on response body
            header("Content-Disposition: attachment;filename={$filename}");
            header("Content-Transfer-Encoding: binary");*/

            $df = fopen('php://temp/maxmemory:1048576', 'w');
            if (false === $df) {
                die('Failed to create temporary file');
            }

            fputcsv($df, ['Taalcode', 'Groep', 'Tekst', 'Vertaling']);
            foreach($languagetranslations as $LanguageTranslation){
                if(!empty($LanguageTranslation->getLanguageToken())){
                    $row = [
                        $locale,
                        $group,
                        $LanguageTranslation->getLanguageToken()->getToken(),
                        $LanguageTranslation->getTranslation(),
                    ];
                    fputcsv($df, $row);
                }
            }

            rewind($df);

            // add the in-memory file to the archive, giving a name
            $zip->addFromString($filename, stream_get_contents($df) );

            fclose($df);
        }

        // close the archive
        $zip->close();


        header('Content-Type: application/zip');
        header('Content-disposition: attachment; filename='.$zipname);
        header('Content-Length: ' . filesize($zipname));
        readfile($zipname);

        // remove the zip archive
        // you could also use the temp file method above for this.
        unlink($zipname);

        exit;
    }

    /**
     * @Route("/admin/settings/languages/view/{id}", name="admin_settings_languages_view")
     * @Template()
     */
    public function viewLanguageAction( Request $request, $id )
    {
        parent::init($request);

        $Language = $this->getDoctrine()->getRepository('CmsBundle:Language')->find($id);

        $this->breadcrumbs->addItem($this->trans("Talen", [], 'cms'), $this->containerInterface->get("router")->generate("admin_settings_languages"));
        $this->breadcrumbs->addItem($Language->getLabel(), $this->containerInterface->get("router")->generate("admin_settings_languages_view", array('id' => $id)));

        $em = $this->getDoctrine()->getManager();

        $transCats = [
            'FOSUserBundle'        => 'Authenticatie',
            'cms'                  => 'CMS',
            'forms'                => 'Formulieren',
            'photoalbum'           => 'Fotoalbum',
            'blog'                 => 'Nieuws',
            'FOSOAuthServerBundle' => 'API',
            'validators'           => 'Validatie',
            'messages'             => 'Algemeen',
            'webshop_backend'      => 'Webshop | Backend',
        ];

        $transGroups = [
            'Nieuws'                         => ['blog'],
            'Formulieren'                    => ['forms'],
            'FAQ'                            => ['faq_backend', 'faq'],
            'Cookiebar'                      => ['cookiebar'],
            'Easify CMS | Front-end'        => ['login', 'search', 'frontend', 'pelikan'],
            'Easify CMS | Back-end'         => ['messages', 'cms', 'blocks', 'blokken'],
            'Easify E-Commerce | Front-end' => ['webshop'],
            'Easify E-Commerce | Back-end'  => ['webshop_backend'],
        ];

        $transHide = ['Array', 'FOSUserBundle', 'FOSOAuthServerBundle', 'validators'];

        $transGroupedAbove = [];
        foreach($transGroups as $superGroup => $groups){
            foreach($groups as $group){
                $transGroupedAbove[$group] = $superGroup;
            }
        }

        $translationList = [];
        $translations = $this->getDoctrine()->getRepository('CmsBundle:LanguageTranslation')->findBy([
            // 'catalogue' => $group,
            'language' => $Language,
        ]);

        foreach($translations as $T){
            $catalogue = $T->getCatalogue();
            $catalogue_remap = (!empty($transCats[$catalogue]) ? $transCats[$catalogue] : ucfirst($catalogue));

            if(!in_array($catalogue, $transHide)){
                if(!empty($catalogue)){
                    if(empty($transGroupedAbove[$catalogue])){
                        $transGroups[$catalogue_remap] = [$catalogue];
                    }
                }

                /*if(!isset($transCats[$T->getCatalogue()])){
                    $transCats[$T->getCatalogue()] = $T->getCatalogue();
                }*/
                $translationList[$catalogue][$T->getId()] = $T;
            }
        }

        foreach($translationList as $key => $group)
        {
            usort($group, function($a, $b) {return strcmp($a->getTranslation(), $b->getTranslation());});
            $translationList[$key] = $group;
        }

        if(!empty($_POST)){
            // dump($_POST);die();
            $keys = (!empty($_POST['keys']) ? $_POST['keys'] : []);

            foreach($_POST['trans'] as $tid => $trans){
                if(!is_numeric($tid)){
                    // dump($tid);die();
                    // New
                    $myKeys = $keys[$tid];
                    foreach($trans as $i => $new){
                        if(!empty($new)){
                            $key = $myKeys[$i];
                            $Token = $this->getDoctrine()->getRepository('CmsBundle:LanguageToken')->findOneByToken($key);
                            if(empty($Token)){
                                $Token = new LanguageToken();
                                $Token->setToken($key);
                                $em->persist($Token);
                            }

                            $Translation = new LanguageTranslation();
                            $Translation->setLanguageToken($Token);
                            $Translation->setLanguage($Language);
                            $Translation->setCatalogue($tid);
                            $Translation->setTranslation($new);
                            $em->persist($Translation);
                        }
                    }
                }else{
                    $Translation = $this->getDoctrine()->getRepository('CmsBundle:LanguageTranslation')->find($tid);
                    $Translation->setTranslation($trans);
                    $em->persist($Translation);
                }
            }
            $em->flush();

            // Clear language cache
            $cacheDir = $this->containerInterface->get('kernel')->getProjectDir() . '/var/cache';
            exec('rm -rf ' . $cacheDir . '/dev/translations ' . $cacheDir . '/prod/translations');

            $this->clearCache('dev');
            // $this->clearCache('prod');




            $Syslog = new Log();
            $Syslog->setUser($this->getUser());
            $Syslog->setUsername($this->getUser()->getUsername());
            $Syslog->setType('language');
            $Syslog->setStatus('info');
            $Syslog->setObjectId($Language->getId());
            $Syslog->setSettings($this->Settings);
            $Syslog->setAction('update');
            $Syslog->setMessage('Vertalingen voor \'' . $Language->getLabel() . '\' (' . $Language->getLocale() . ') gewijzigd.');
            $em->persist($Syslog);
            $em->flush();

            return $this->redirectToRoute('admin_settings_languages_view', array('id' => $id));
        }

        return $this->attributes(array(
            'id'              => $id,
            'Language'        => $Language,
            'transGroups'     => $transGroups,
            'transCats'       => $transCats,
            'translationList' => $translationList,
            // 'newRelationList' => $newRelationList,
        ));
    }

    private function clearCache($env){
        $kernel = $this->containerInterface->get('kernel');
        $application = new \Symfony\Bundle\FrameworkBundle\Console\Application($kernel);
        $application->setAutoExit(false);
        $options = array('command' => 'cache:clear',"--env" => $env, '--no-warmup' => true);
        $application->run(new \Symfony\Component\Console\Input\ArrayInput($options));
    }

    /**
     * @Route("/admin/settings/languages/edit/{id}", name="admin_settings_languages_edit")
     * @Template()
     */
    public function editLanguageAction( Request $request, $id = 0 )
    {
        parent::init($request);

        $this->breadcrumbs->addItem($this->trans("Talen", [], 'cms'), $this->containerInterface->get("router")->generate("admin_settings_languages"));
        $this->breadcrumbs->addItem("Wijzigen", $this->containerInterface->get("router")->generate("admin_settings_languages_edit", array('id' => $id)));

        $new = false;
        if($id){
            $Language = $this->getDoctrine()->getRepository('CmsBundle:Language')->find($id);
        }else{
            $Language = new \App\CmsBundle\Entity\Language();
            $new = true;
        }

        $uniqueSites = $this->getDoctrine()->getRepository('CmsBundle:Settings')->findUniqueSites();

        $form = $this->createFormBuilder($Language)
            ->add('label', TextType::class, array('label' => $this->trans('Taal (titel)', "cms")))
            ->add('locale', TextType::class, array('label' => $this->trans('Taalcode (2 tekens, kleine letters)', "cms")))
            ->add('locale_full', TextType::class, array('label' => $this->trans('Taalcode (ISO 15897)', "cms")))
            ->add('notify_email', EmailType::class, array('label' => $this->trans('Notificatie e-mail (leeg laten indien niet van toepassing)', "cms"), 'required' => false))
            ->add('hide_baseuri', CheckboxType::class, array('label' => $this->trans('Base URI verbergen', "cms"), 'required' => false))
            // ->add('save', SubmitType::class, array('label' => 'btn.save', 'attr' => array('class' => 'btn')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($Language);

            if($new){

                $allSettings = [];
                if(!empty($_POST['sites'])){
                    foreach($_POST['sites'] as $site_key_combine){
                        $site_key_combine = explode('_', $site_key_combine);
                        $site_id = $site_key_combine[0];
                        $site_key = $site_key_combine[1];

                        $selected_settings = $this->getDoctrine()->getRepository('CmsBundle:Settings')->find($site_id);
                        $NewSettings = clone $selected_settings;
                        $NewSettings->setLanguage($Language);
                        $em->persist($NewSettings);
                        $allSettings[] = $NewSettings;
                    }
                }else{
                    $NewSettings = clone $this->Settings;
                    $NewSettings->setLanguage($Language);
                    $em->persist($NewSettings);
                    $allSettings[] = $NewSettings;
                }

                foreach($allSettings as $S){
                    $site_key = $S->getSiteKey();

                    $Users = $this->getDoctrine()->getRepository('CmsBundle:User')->getAdmins();
                    if(!empty($Users)){
                        foreach($Users as $U){
                            $sitekeys = [];
                            foreach($U->getSites() as $SITE){
                                if(!in_array($SITE->getSiteKey(), $sitekeys)){
                                    $sitekeys[] = $SITE->getSiteKey();
                                }
                            }

                            $mutate = false;
                            if(in_array($site_key, $sitekeys)){
                                // dump('ADD: ' . $site_key . ' (' . $S->getLabel() . ' | ' . $S->getLanguage()->getLabel() . ')');
                                $U->addSite($S);
                                $mutate = true;
                            }

                            if($mutate){
                                $em->persist($U);
                            }
                        }
                    }
                }
            }else{
                if(!empty($_POST['sites'])){
                    foreach($_POST['sites'] as $site_key_combine){
                        $site_key_combine = explode('_', $site_key_combine);
                        $site_id = $site_key_combine[0];
                        $site_key = $site_key_combine[1];

                        $selected_settings = $this->getDoctrine()->getRepository('CmsBundle:Settings')->find($site_id);
                        $NewSettings = clone $selected_settings;
                        $NewSettings->setLanguage($Language);
                        $em->persist($NewSettings);
                        $allSettings[] = $NewSettings;
                    }
                }
            }

            $em->flush();

            // Add placeholder file
            $transDir = $this->containerInterface->get('kernel')->getProjectDir() . '/src/CmsBundle/Resources/translations/';
            if(!file_exists($transDir . 'messages.' . $Language->getLocale() . '.db')){
                file_put_contents($transDir . 'messages.' . $Language->getLocale() . '.db', '');
            }

            // Clear language cache
            $cacheDir = $this->containerInterface->get('kernel')->getProjectDir() . '/var/cache';
            exec('rm -rf ' . $cacheDir . '/dev/translations ' . $cacheDir . '/prod/translations');

            $Syslog = new Log();
            $Syslog->setUser($this->getUser());
            $Syslog->setUsername($this->getUser()->getUsername());
            $Syslog->setType('language');
            $Syslog->setStatus('info');
            $Syslog->setObjectId($Language->getId());
            $Syslog->setSettings($this->Settings);
            if($new){
                $Syslog->setAction('add');
                $Syslog->setMessage('Taal \'' . $Language->getLabel() . '\' (' . $Language->getLocale() . ') toegevoegd.');
            }else{
                $Syslog->setAction('update');
                $Syslog->setMessage('Taal \'' . $Language->getLabel() . '\' (' . $Language->getLocale() . ') gewijzigd.');
            }
            $em->persist($Syslog);
            $em->flush();

            return $this->redirectToRoute('admin_settings_languages');
        }

        return $this->attributes(array(
            'id' => $id,
            'uniqueSites' => $uniqueSites,
            'form' => $form->createView(),
        ));
    }

    public function getRefererRoute(Request $request)
    {
        parent::init($request);

        //look for the referer route
        $referer = $request->headers->get('referer');
        $lastPath = substr($referer, strpos($referer, $request->getBaseUrl()));
        $lastPath = str_replace($request->getBaseUrl(), '', $lastPath);

        $matcher = $this->containerInterface->get('router')->getMatcher();
        $parameters = $matcher->match($lastPath);
        $route = $parameters['_route'];

        return $route;
    }

    /**
     * @Route("/admin/settings/clear/cache", name="admin_settings_clear_cache")
     */
    public function clearCacheAction( Request $request, $id = 0 )
    {
    	parent::init($request);


        $realCacheDir = $this->containerInterface->getParameter('kernel.cache_dir');
        $oldCacheDir = substr($realCacheDir, 0, -1).('~' === substr($realCacheDir, -1) ? '+' : '~');
        $filesystem = $this->containerInterface->get('filesystem');
        if (!is_writable($realCacheDir)) { throw new \RuntimeException(sprintf('Unable to write in the "%s" directory', $realCacheDir)); }
        if ($filesystem->exists($oldCacheDir)) { $filesystem->remove($oldCacheDir); }
        $kernel = $this->containerInterface->get('kernel');
        $this->containerInterface->get('cache_clearer')->clear($realCacheDir);
        $filesystem->remove($realCacheDir);

        // Warmup
        // $this->containerInterface->get('router')->warmUp($realCacheDir);


        /*$cacheDir =  preg_replace('/cache\/.*$/', 'cache/', $this->containerInterface->getParameter('kernel.cache_dir')) . 'prod/';
        if(file_exists($cacheDir)) self::delTree($cacheDir);

        $kernel = $this->containerInterface->get('kernel');
        $application = new \Symfony\Bundle\FrameworkBundle\Console\Application($kernel);
        $application->setAutoExit(false);
        $application->run(new \Symfony\Component\Console\Input\ArrayInput(array(
            'command' => 'cache:warmup',
            "--env" => 'prod'
        )));

        $em = $this->getDoctrine()->getManager();

        // De-invalidate cache
        $Settings = $em->getRepository('CmsBundle:Settings')->findByLanguage($this->language);
        $Settings->setCacheInvalidated(false);

        $em->persist($Settings);
        $em->flush();*/

        $locale = $request->get('_locale');
        $ruta = $this->getRefererRoute($request);
        $url = $this->containerInterface->get('router')->generate($ruta, array('_locale' => $locale));

        $this->addFlash('', '<i class="material-icons left">check</i>' . $this->trans('Cache is geleegd.', [], 'cms'));

        return $this->redirect($url);
    }

    /**
     * Static caller for deleting a directory tree
     *
     * @param  string $dir Directory to delete
     *
     * @return boolean     Remove deletion status
     */
    public static function delTree($dir){
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? self::delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }
}