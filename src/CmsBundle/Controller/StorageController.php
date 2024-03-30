<?php
namespace App\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use GeoIp2\Database\Reader;

use App\CmsBundle\Classes\Meta;

// Injection
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

use App\CmsBundle\Util\Mailer;

class StorageController extends AbstractController {

    protected $em;
    protected $breadcrumbs         = null;
    protected $languages           = null;
    protected $languages_available = [];
    protected $siteToLang          = [];
    protected $Settings            = null;
    protected $multisite           = [];
    protected $multisite_other     = [];
    protected $multisite_all       = [];
    protected $tags                = null;
    protected $gravatar            = '';
    protected $modRoutes           = array();
    protected $installed           = array();
    protected $ipblocks            = array();
    protected $language            = null;
    protected $translator          = null;
    protected $containerInterface      = null;
	protected $mailer			   = null;
    protected $Meta                = null; 
    
    protected $version             = null;
    protected $git_hash            = null;
    protected $git_hash_long       = null;
    protected $date                = null;
    protected $prev_version        = null;
    protected $host                = '';
    protected $uri                 = '';
    
    protected $moderation          = 0;
    
    protected $webshop_enabled     = false;
	protected $webshop_quote_enabled = false;
    protected $new_reviews     = false;
    protected $Webshop             = null;
    protected $WebshopSettings     = null;
    protected $WebshopCustomer     = null;
    
    public $bundleIcons            = [];

    public $Timer = null;

	protected $cache_page          = 3600;
	protected $cache_widget        = 3600;
	protected $cache_bundle        = 3600;

    public function __construct(TranslatorInterface $translator, ContainerInterface $containerInterface, Mailer $mailer){
        $this->translator = $translator;
        $this->containerInterface = $containerInterface;
		$this->mailer = $mailer;
    }

    public function trans($key,  $params = [], $group = '', $locale = null){

        /*
         * Fallback for change in attributes in this function
         * 
         * It turns out that the symfony/translator extractor find our trans()
         * function and assumes that the domein is defined in the third parameter.
         * Which wasn't the case, switch the arguments of  our trans function
         * around so the extractor can do it's magic.
         */
        if (!is_array($params)) {
            $old_group = $group;
            $group = $params;
            $params = $old_group;
        }

        // Get locale for admin
        $adminLocale = $this->get('session')->get('admin_custom_locale');

        if (empty($adminLocale)){
            $adminLocale = $this->get('session')->get('admin_locale');
        }

        if(empty($adminLocale)){
            // Fallback to default locale
            $adminLocale = $this->get('session')->get('_locale');
        }

        // Override by function
        if(!empty($locale)){
            $adminLocale = $locale;
        }

        if (!is_array($params)) {
            $params = [];
        }
        // check if token already exists
        $token = $this->em->getRepository('CmsBundle:LanguageToken')->findOneByToken($key);
        if (empty($token)) {
            $token = new \App\CmsBundle\Entity\LanguageToken();
            $token->setToken($key);
            $this->em->persist($token);
            $this->em->flush();
        }

        $target_language = $this->em->getRepository('CmsBundle:Language')->findOneBy(['locale' => $adminLocale]);
        $trans = $this->em->getRepository("CmsBundle:LanguageTranslation")->findOneby(['languageToken' => $token->getId(), 'language' => $target_language, 'catalogue' => $group]);
        if (empty($trans)) {
            $changes = false;
            foreach($this->languages as $L){
                $changes = true;
                $trans = new \App\CmsBundle\Entity\LanguageTranslation();
                $trans->setLanguage($L);
                $trans->setCatalogue($group);
                $trans->setTranslation($key);

                $trans->setLanguageToken($token);
                $this->em->persist($trans);
            }

            if($changes){
                $this->em->flush();
            }
            unset($trans);
        }
        unset($token);

        return $this->translator->trans($key, $params, $group, $adminLocale);
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function test_permissions($request, $User){
        $permissions = $User->listPermissions();

        $isWebshop = false;
        if(strpos($request->get('_route'), 'admin_mod_webshop') !== false){
            $isWebshop = true;
        }

        if(!$isWebshop || !$User->checkPermissions('ALLOW_WEBSHOP')){
            foreach($permissions as $k => $v){
                if(substr($k, 0, 6) == 'ECOMM_'){
                    unset($permissions[$k]);
                }
            }
        }

        foreach($permissions as $perm => $path){
            if(!empty($path)){
                $url = $this->generateUrl($path);
                header('Location: ' . $url);
                exit;
            }
        }
    }

    public function init($request = null, $translator = null, $containerInterface = null, $mailer = null){

        if(!empty($translator) && !empty($containerInterface) && !empty($mailer)){
            $this->translator = $translator;
            $this->containerInterface = $containerInterface;
            $this->mailer = $mailer;
        }



        if(preg_match('/(^admin_|^admin$)/', $request->get('_route')) && !preg_match('/setup2fa/', $request->get('_route')) && $this->getUser() != null){
            // Logged in, in admin
            if($this->getUser()->isTotpEnabled() && empty($this->getUser()->getTotpSecret())){
                // 2FA initialized, need to be setup
                header('Location: ' . $this->generateUrl('admin_setup2fa')); exit;
            }
        }


        // $GeoIPDB = new Reader('../src/CmsBundle/GeoLite2-City.mmdb');
        $this->em = $this->getDoctrine()->getManager();

        if(empty($this->containerInterface)){
            $this->containerInterface = $this->container;
        }
        
		if ($this->containerInterface->hasParameter('cache_max_age')) {
			$this->cache_page   = (int)$this->containerInterface->getParameter('cache_max_age');
		} else {
			$this->cache_page   = 3600 * 24 * 7;
		}
		if ($this->containerInterface->hasParameter('widget_max_age')) {
			$this->cache_widget = (int)$this->containerInterface->getParameter('widget_max_age');
		} else {
			$this->cache_widget = 3600 * 24 * 7;
		}
		if ($this->containerInterface->hasParameter('bundle_max_age')) {
			$this->cache_bundle = (int)$this->containerInterface->getParameter('bundle_max_age');
		} else {
			$this->cache_bundle = 3600 * 24 * 7;
		}

        $this->Timer = new \App\CmsBundle\Classes\Timer($this->containerInterface->getParameter('kernel.environment') == 'dev');

        $is_alias = null;
		$lookupHost = preg_replace('/:\d+/', '', $request->getHttpHost());
        if(file_exists('../alias.json')){
            $alias = json_decode(file_get_contents('../alias.json'), true);
            foreach($alias as $alias_parent => $aliasses){
                if(in_array($lookupHost, $aliasses)){ 
                    $is_alias = $lookupHost;
                    $lookupHost = $alias_parent;
                }
            }
        }

        if(count($this->em->getRepository('CmsBundle:Settings')->findBy(['host' => str_replace('www.', '', $lookupHost)])) == 0){
            $ExistingSettings = $this->em->getRepository('CmsBundle:Settings')->findOneBy([]);
            $host = str_replace('www.', '', $lookupHost);

            if(isset($_GET['link']) && $_GET['link'] == 'host'){
                // Assign host to settings directly
                $ExistingSettings->setHost($host);
                $this->em->persist($ExistingSettings);
                $this->em->flush();

                header('Location: /'); exit;
            }

            $cleared = $this->render('@Cms/no-host.html.twig', ['host' => $host, 'ExistingSettings' => $ExistingSettings])->getContent();
            die($cleared);
        }


        /* *********************************
            AUTOLOGIN BASED ON IP
            CREATE FILE .ip WITH SYNTAX:

            127.0.0.1:admin
            217.158.75.1:username
        ********************************* */

        $isAdmin = preg_match('/(^admin_|^admin$)/', $request->get('_route'));

        if($this->getUser() == null){
            if(!$isAdmin || $this->containerInterface->getParameter('kernel.environment') == 'dev'){
                $ip_whitelist_file = '../.ip';
                if(file_exists($ip_whitelist_file) && !empty($_SERVER['REMOTE_ADDR'])){
                    $ipdata = file($ip_whitelist_file);
                    foreach($ipdata as $ip_row){
                        if(!preg_match('/\#/', $ip_row)){
                            $ip_row = explode(':', trim($ip_row));
                            if($ip_row[0] == $_SERVER['REMOTE_ADDR']){
                                $AutoUser = $this->getDoctrine()->getRepository('CmsBundle:User')->findOneByUsername($ip_row[1]);
                                if(!empty($AutoUser)){
                                    $token = new UsernamePasswordToken($AutoUser, null, 'main', $AutoUser->getRoles());
                                    $this->get('security.token_storage')->setToken($token);
                                    $this->get('session')->set('_security_main', serialize($token));
                                }
                            }
                        }
                    }
                }
            }
        }







        $localeInRequest = $request->getLocale();

        $versionFile = $this->containerInterface->get('kernel')->getProjectDir() . '/src/CmsBundle/VERSION';
        if (file_exists($versionFile)) {
            $versionEntries = file($versionFile);

            $this->version        = trim($versionEntries[0]);
            $this->git_hash       = trim($versionEntries[1]);
            $this->git_hash_long  = trim($versionEntries[2]);
            $this->date           = trim($versionEntries[3]);
            $this->prev_version   = trim($versionEntries[4]);
            /*foreach(file($versionFile) as $ln){
                $ln = trim($ln);
                dump($ln);
            }*/
        }

        $isAdmin = preg_match('/(^admin_|^adminjson|^_adminjson|^admin$)/', $request->get('_route'));

        if($isAdmin){
            // Only for admin panel
            $this->ipblocks = $this->em->getRepository('CmsBundle:Ipcheck')->findAll();
            foreach($this->ipblocks as $index => $Ipcheck){
                if($Ipcheck->getLoginAttempts() < 5 || $Ipcheck->getBlocked()){
                    unset($this->ipblocks[$index]);
                }

                // Adding country code to existing
                /* if(empty($Ipcheck->getCountry())){
                    if($Ipcheck->getIp() != '127.0.0.1'){
                        try{
                            $client_ip = $GeoIPDB->city($Ipcheck->getIp());
                            $client_country = $client_ip->country->isoCode;
                            $Ipcheck->setCountry($client_country);
                            $this->em->persist($Ipcheck);
                            $this->em->flush();
                        }catch(\GeoIp2\Exception\AddressNotFoundException $e){}
                    }
                } */
            }


            if($this->getUser() && !empty($this->getUser()->getLockinUri())){
                if(!preg_match('/^' . str_replace('/', '\\/', $this->getUser()->getLockinUri()) . '/', $request->getPathInfo())){
                    header('Location:' . preg_replace('/\/$/', '', $this->generateUrl('homepage')) . $this->getUser()->getLockinUri());
                    exit;
                }
            }




            // Check existing settings if site_key is filled
            if($this->em->getRepository('CmsBundle:Settings')->countWithoutSiteKey()){
                $settings_sitekey = $this->em->getRepository('CmsBundle:Settings')->findWithoutSiteKey();
                $languages_sitekey = $this->em->getRepository('CmsBundle:Language')->findAll();

                $hasMoreForOneLanguage = false;
                foreach($languages_sitekey as $k => $L){
                    if($L->getSettings()->count() > 1){
                        $hasMoreForOneLanguage = true;
                    }
                }

                if(!$hasMoreForOneLanguage){
                    foreach($settings_sitekey as $k => $S){
                        if(empty($S->getSiteKey())){
                            $S->setSiteKey('default');
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($S);
                            $em->flush();

                            unset($settings_sitekey[$k]);
                        }
                    }
                }else{
                    $host_done = [];
                    $host_done_alt = [];
                    // Remaining sites
                    foreach($settings_sitekey as $k => $S){
                        if(!empty($host_done_alt[$S->getLabel()])){
                            $S->setSiteKey($host_done_alt[$S->getLabel()]);
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($S);
                            $em->flush();

                            unset($settings_sitekey[$k]);
                        }elseif(!empty($host_done[$S->getHost()])){
                            $S->setSiteKey($host_done[$S->getHost()]);
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($S);
                            $em->flush();

                            unset($settings_sitekey[$k]);
                        }else{
                            $newSitekey = $this->generateRandomString();

                            $S->setSiteKey($newSitekey);
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($S);
                            $em->flush();

                            unset($settings_sitekey[$k]);
                            $host_done[$S->getHost()] = $newSitekey;
                            $host_done_alt[$S->getLabel()] = $newSitekey;
                        }
                    }
                }
            }
        }

        // Get locale for admin
        $adminLocale = $this->containerInterface->get('session')->get('admin_locale');
        if(empty($adminLocale)){
            // Fallback to default locale
            $adminLocale = $this->containerInterface->get('session')->get('_locale');
        }

        $this->languages       = $this->em->getRepository('CmsBundle:Language')->findAll();
        $this->multisite       = $this->em->getRepository('CmsBundle:Settings')->findAll();
        $this->multisite_other = $this->em->getRepository('CmsBundle:Settings')->findAll();
        $this->multisite_all   = $this->em->getRepository('CmsBundle:Settings')->findAll();

        /*foreach($this->multisite as $index => $Settings){
            if($Settings->getLanguage() != $this->Language){
                unset($this->multisite[$index]);
            }
        }*/

        $this->moderation = $this->em->getRepository('CmsBundle:User')->countModeration();

        // Multi-site switcher
        $msite = null;
        if($isAdmin){
            $msite = $request->getSession()->get('admin_msite');
            if(!empty($_GET['msite'])){ $msite = (int)$_GET['msite']; }
            if($msite){
                $request->getSession()->set('admin_msite', $msite);
            }else{
                // No 'msite', use first site based on locale
                $Language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($adminLocale);




                // Find first by host as priority
                $msite_priority_Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['host' => str_replace('www.', '', $lookupHost), 'language' => $Language]);

                if(empty($msite_priority_Settings)){
                    $msite_first_Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['language' => $Language], ['id' => 'asc']);
                    if(!empty($msite_first_Settings)){
                        $msite = $msite_first_Settings->getId();
                        $request->getSession()->set('admin_msite', $msite);
                    }
                }else{
                    $msite = $msite_priority_Settings->getId();
                    $request->getSession()->set('admin_msite', $msite);
                }
            }
        }


        if (!empty($_GET['mlang']) && !empty($_GET['msite'])) {
            $Settings = $this->em->getRepository('CmsBundle:Settings')->find($_GET['msite']);
            $this->Settings = $Settings;
            $Language = $this->em->getRepository('CmsBundle:Language')->find($_GET['mlang']);
            $this->language = $Language;
            $request->getSession()->set('admin_msite', $msite);
            $request->getSession()->set('admin_locale', $Language->getLocale());
        }

        $Settings = null;
        $byBaseUri = false;
        if($msite){
            $tmp_Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['id' => $msite], [], ['host' => 'null']);
            if(empty($tmp_Settings) || $tmp_Settings->getLanguage() != $this->language){
                if(preg_match('/(\/[a-z]{2})(\/.*?)?$/', $request->getPathInfo(), $m)){
                    $byBaseUri = true;
                    $Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['host' => str_replace('www.', '', $lookupHost), 'base_uri' => $m[1]]);
                    // dump($Settings);die();
                }else{
                    $Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['host' => str_replace('www.', '', $lookupHost), 'base_uri' => '']);
                    if (empty($Settings)) {
                        $Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['host' => str_replace('www.', '', $lookupHost)]);
                    }
                }
            }else{
                $Settings = $tmp_Settings;
            }
        }else{
            if(preg_match('/(\/[a-z]{2})(\/.*?)?$/', $request->getPathInfo(), $m)){
                $byBaseUri = true;
                $Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['host' => str_replace('www.', '', $lookupHost), 'base_uri' => $m[1]]);
            }else{
                $Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['host' => str_replace('www.', '', $lookupHost), 'base_uri' => '']);
                if (empty($Settings)) {
                    $Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['host' => str_replace('www.', '', $lookupHost)]);
                }
            }
        }

        $session_locale = null;
        if($isAdmin){
            $session_locale = $this->containerInterface->get('session')->get('admin_locale');
        }else{
            if(!$byBaseUri){
                $session_locale = $this->containerInterface->get('session')->get('_locale');
            }
        }

        // Check if settings is present, and if it matches the locale from session (if in session)
        if(!empty($Settings) && ($session_locale == null || $Settings->getLanguage()->getLocale() == $session_locale)){
            $this->Settings = $Settings;
            $this->language = $Settings->getLanguage();

            // dump('..');die();
            // dump('..');die();
        }else{
            // Settings are not present or not valid for current locale
            if($isAdmin){
                $locale = $this->containerInterface->get('session')->get('admin_locale');
            }else{
                $locale = $this->containerInterface->get('session')->get('_locale');
            }
            if($locale){
                $this->language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale);
            }else{
                $this->language = $this->languages[0];
            }
        }

        // Set breadcrumbs
        $this->Settings = null;
        if($msite){
            $TempSettings = $this->em->getRepository('CmsBundle:Settings')->find($msite);
            if(!empty($TempSettings) && $TempSettings->getHost() != 'null' && $TempSettings->getLanguage() == $this->language){
                $this->Settings = $TempSettings;
            }else{
                if(preg_match('/(\/[a-z]{2})(\/.*?)?$/', $request->getPathInfo(), $m)){
                    $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['host' => str_replace('www.', '', $lookupHost), 'base_uri' => $m[1]]);
                }else{
                    $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['host' => str_replace('www.', '', $lookupHost), 'base_uri' => '']);
                    if (empty($this->Settings)) {
                        $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['host' => str_replace('www.', '', $lookupHost)], ['id' => 'asc']);
                    }
                }
            }
            /*if($this->Settings->getLanguage() != $this->language){
                $this->Settings = $this->em->getRepository('CmsBundle:Settings')->find($msite);
            }*/
            // dump($this->Settings->getLabel());die();
        }else{
            if(preg_match('/(\/[a-z]{2})(\/.*?)?$/', $request->getPathInfo(), $m)){
                $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['host' => str_replace('www.', '', $lookupHost), 'base_uri' => $m[1]]);
            }else{
                $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['host' => str_replace('www.', '', $lookupHost), 'base_uri' => '']);
                if (empty($this->Settings)) {
                    $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['host' => str_replace('www.', '', $lookupHost)], ['id' => 'asc']);
                }
            }
        }

        if(empty($this->Settings) || preg_match('/(^admin_|^admin$)/', $request->get('_route'))){
            if($msite){
                if(empty($Settings) || $Settings->getLanguage() != $this->language){
                    $tmp_settings = $this->em->getRepository('CmsBundle:Settings')->find($msite);
                    if($tmp_settings->getLanguage() != $this->language){
                        $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['language' => $this->language, 'host' => str_replace('www.', '', $lookupHost)], ['id' => 'desc'], ['host' => 'null']);
                        if(empty($this->Settings)){
                            $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['language' => $this->language], ['id' => 'desc'], ['host' => 'null']);
                        }
                        if(empty($this->Settings)){
                            $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy([], ['id' => 'asc']);
                        }
                    }else{
                        $this->Settings = $tmp_settings;
                    }
                }else{
                    $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['language' => $this->language, 'host' => str_replace('www.', '', $lookupHost)], ['id' => 'desc'], ['host' => 'null']);
                    if(empty($this->Settings)){
                        $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['language' => $this->language], ['id' => 'desc'], ['host' => 'null']);
                    }
                    if(empty($this->Settings)){
                        $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy([], ['id' => 'asc']);
                    }
                }




                // Recheck
                if($this->Settings->getId() != $msite){
                    $tmp_settings = $this->em->getRepository('CmsBundle:Settings')->find($msite);
                    $this->Settings = $tmp_settings;
                }


            }else{
                $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['language' => $this->language, 'host' => str_replace('www.', '', $lookupHost)], ['id' => 'desc']);
                if(empty($this->Settings)){
                    $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['language' => $this->language], ['id' => 'desc']);
                }
                if(empty($this->Settings)){
                    $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy([], ['id' => 'asc']);
                }
            }
        }


        if($this->Settings->getLanguage() != $this->language && !$isAdmin){
            $this->language = $this->Settings->getLanguage();
        }

        // Find settings by language when settings language and backend language don't match
        if($this->Settings->getLanguage() != $this->language){
            // if($this->Settings->getLanguage()->getLocale() == 'nl'){
                // $searchSettings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['parent' => $this->Settings, 'language' => $this->language], ['id' => 'desc'], ['host' => 'null']);
            // }else{
                $searchSettings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['language' => $this->language], ['id' => 'desc']);
            // }

            if(empty($searchSettings)){
                // No settings found based on current language
                dump($this->language);
                dump($this->Settings);
                dump('....!!');die();
                $NewSettings = clone $this->Settings;
                $NewSettings->setLanguage($this->language);
                if($this->Settings->getLanguage()->getLocale() == 'nl'){
                    $NewSettings->setParent($this->Settings);
                }else{
                    $NewSettings->setParent($this->Settings->getParent());
                }


                $this->em->persist($NewSettings);
                $this->em->flush();

                $this->Settings = $NewSettings;
            }else{
                $this->Settings = $searchSettings;
            }
        }

        // Prefill required host
        if(empty($this->Settings->getHost())){
            $this->Settings->setHost($_SERVER['SERVER_NAME']);
            $this->em->persist($this->Settings);
            $this->em->flush();
        }

        $hasCustomAdminLocaleOverride = false;
        if ($this->getUser() && $isAdmin && !empty($this->getUser()->getAdminLocale())) {
    		$request->getSession()->set('admin_custom_locale', $this->getUser()->getAdminLocale());
    		// $request->getSession()->remove('admin_locale');
            $request->setLocale($this->getUser()->getAdminLocale());
            $hasCustomAdminLocaleOverride = true;
        }else{
            if($this->language == null){
                // Might happen after changing locale for a language
                $this->language = $this->languages[0];
            }

            if($isAdmin){
                $request->getSession()->set('admin_locale', $this->language->getLocale());
            }else{
                $request->getSession()->set('_locale', $this->language->getLocale());
            }
            $request->setLocale($this->language->getLocale());

            $request->getSession()->remove('admin_custom_locale');
        }

        $localeInRequest = $request->getLocale();
        if ($localeInRequest == 'en') {
            $localeInRequest = 'gb';
        }

        if($request->headers->get('Content-Type') == 'application/json'){
            // JSON request
        }else{
			if ($this->containerInterface->hasParameter('trinity_disable_antibot') && ($this->containerInterface->getParameter('trinity_disable_antibot') || $this->containerInterface->getParameter('trinity_disable_antibot') == 'true')) {
				// Don't try to block bots
			} else {
				$crawlerDetect = new \Jaybizzle\CrawlerDetect\CrawlerDetect;

				$isBot = false;
				$botRedirect = false;

				if ($crawlerDetect->isCrawler($request->headers->get('User-Agent')))
				{
					$isBot = true;

					// List of allowed scraper useragent
					if(!preg_match('/beyonit-cricitalgen|pingdom|uptime-kuma|google|postmanruntime|chrome-lighthouse|adsbot|bingbot|slurp|linkedin|duckduckbot|baiduspider|yandexbot|spider|exabot|facebot|toolbot|facebook|ia_archiver|doorlinken|uptimerobot/', strtolower($request->headers->get('User-Agent')))){
						if (empty($_FILES) && empty($_POST)) {
							$botRedirect = true;
						}
					}
				}

				$user_agent_log = $this->containerInterface->hasParameter('trinity_useragent_log') && ($this->containerInterface->getParameter('trinity_useragent_log') || $this->containerInterface->getParameter('trinity_useragent_log') == 'true');
				if ($user_agent_log) {
					$logDate = new \DateTime();
					$logFile = $this->containerInterface->get('kernel')->getProjectDir() . '/var/log/user-agents-' .$logDate->format('Y-m-d') . '.log';
					if ($isBot) {
						$logPrefix = 'Bot ';
					} else {
						$logPrefix = 'User';
					}
					if ($botRedirect) {
						$logPrefix .= ' (redirect):     ';
					} else {
						$logPrefix .= ' (no redirect):  ';
					}

					file_put_contents($logFile, $logPrefix . $request->headers->get('User-Agent') . PHP_EOL, FILE_APPEND);
				}

				if ($botRedirect) {
					header('Location:' . $request->getUri());exit;
				}
			}
        }









        // Validate if current settings are linked to logged in user
        if($isAdmin && $this->getUser()){
            if($this->getUser()->getSites()->count() > 0){
                if(!$this->getUser()->getSites()->contains($this->Settings)){
                    header('Location:' . $this->generateUrl('admin_switch_language', ['locale' => $this->getUser()->getSites()->first()->getLanguage()->getLocale(), 'url' => urlencode($this->generateUrl($request->attributes->get('_route'), $request->attributes->get('_route_params')))]));
                    exit;
                }
            }
        }










        $thisIsAdmin = false;
        if(substr($request->get('_route'), 0, 6) == 'admin_'){
            $thisIsAdmin = true;
        }

        $blocked = false;
        if($this->Settings && !empty($this->Settings->getRestrictAccessList())){
            $accessList = $this->Settings->getRestrictAccessList();
            $denyList = explode("\n", $this->Settings->getRestrictAccessDeny());
            $type = $this->Settings->getRestrictAccessType();
            $ip = $_SERVER['REMOTE_ADDR'];

            if($type == 'admin_website' || ($type == 'admin' && $thisIsAdmin)){
                // Block admin and website
                $blocked = true;
                if(in_array($ip, $accessList)){
                    $blocked = false;
                }
                if(in_array($ip, $denyList)){
                    $blocked = true;
                }
            }
        }

        if($blocked){
            die('Geen toegang.');
        }

        // Force HTTPS
        if(substr($request->getHost(), -6) != '.local' && substr($request->getHost(), -4) != '.dev' && $this->Settings->getForceHttps() && !$request->isSecure()){
            $this->Timer->mark('Force HTTPS');
            $url = $this->generateUrl($request->get('_route'), [], UrlGeneratorInterface::ABSOLUTE_URL);

            $params = $request->attributes->get('_route_params');
            $urlParams = [];
            foreach($params as $key => $param){
                if (substr($key, 0, 5) == 'param' && !empty($param)) {
                    $urlParams[] = $param;
                }
            }

            if(!empty($urlParams)){
                $url .= (preg_match('/.*?\/$/', $url) ? '' : '/') . implode('/', $urlParams);
            }

            $q = '';
            if(!empty($_GET)){
                $q = [];
                foreach($_GET as $k => $v){
                    if(is_array($v)){
                        foreach($v as $k2 => $v2){
                            $q[] = $k . '[' . $k2 . ']=' . $v2;
                        }
                    }else{
                        $q[] = urlencode($k) . '=' . urlencode($v);
                    }
                }
                $q = '?' . implode('&', $q);
            }
            $url = str_replace('http:', 'https:', $url . $q);

            header("Location: " . $url);
            exit;
        }

        if(is_null($this->Settings)) $this->Settings = new \App\CmsBundle\Entity\Settings();

        // Validate access by IP-address, only allow override if 'development' mode is enabled
        if(!is_null($request) && $this->containerInterface->getParameter('kernel.environment') != 'dev'){
            $ra_type = $this->Settings->getRestrictAccessType();
            if(empty($ra_type)) $ra_type = 'admin';
            if(($ra_type == 'admin' && substr($request->get('_route'), 0, 5) == 'admin') || ($ra_type == 'admin_website')){
                $access = $this->Settings->hasAccess();
                if(!$access){
                    throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException('No access.');
                }
            }
        }

        $this->breadcrumbs = $this->containerInterface->get("white_october_breadcrumbs");

        $this->host = '';
        if($this->Settings->getHost()){

            $www = '';
            if(preg_match('/www/', $lookupHost)){
                // Contains www
                $www = 'www.';
            }

            if(!empty($is_alias)){
                $this->host = 'http://' . $www . $is_alias;
            }else{
                if($request->isSecure()){
                    $this->host = 'https://' . $www . $this->Settings->getHost();
                }else{
                    $this->host = 'http://' . $www . $this->Settings->getHost();
                }
            }
        }

	if($this->breadcrumbs->count() == 0){
            $this->breadcrumbs->addItem($this->Settings->getLabel(), $this->host . $this->generateUrl('homepage') . substr($this->Settings->getBaseUri(),1));
            if(!is_null($request)){
                $route = $request->get('_route');
                if(preg_match('/admin/', $route)){
                    $this->breadcrumbs->addRouteItem($this->trans('Admin', [], 'cms'), 'admin');
                }
            }
        }

        if($this->language != $this->Settings->getLanguage()){
            // Override language based on settings
            $this->language = $this->Settings->getLanguage();
        }

        $this->tags = $this->getDoctrine()->getRepository('CmsBundle:Tag')->findAllNotEmpty();
        foreach($this->tags as $i => $tag){
            if($i > 3) unset($this->tags[$i]);
        }






        /* *********************************
            Fix default host folder for
            media with locale attached.
        ********************************* */


        $this->Timer->mark('Prepare mediadir for current settings');
        $Mediadir = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findOneBy(['label' => $this->Settings->getHost(), 'parent' => null]);
        if ($Mediadir) {
            // Found mediadir based on hostname without locale addition
            if(!empty($this->languages) && count($this->languages) > 1){
                // Found multiple languages, now this folder need a locale suffix
                
                // Search for first language (probably NL)
                $Language = $this->getDoctrine()->getRepository('CmsBundle:Language')->findOneBy([], ['id' => 'asc']);
                
                // Generate new label
                $newLabel = $this->Settings->getHost() . ' (' . strtoupper($Language->getLocale()) . ')';
                $Mediadir->setLabel($newLabel);

                // Save
                $this->em->persist($Mediadir);
                $this->em->flush();
            }
        }




        $settingsWithSameSiteKey = $this->getDoctrine()->getRepository('CmsBundle:Settings')->findBy(['site_key' => $this->Settings->getSiteKey()]);
        foreach($settingsWithSameSiteKey as $S){
            if(!empty($S->getLanguage()) && !in_array($S->getLanguage(), $this->languages_available)){
                $this->languages_available[] = $S->getLanguage();
            }
            $this->siteToLang[$S->getLanguage()->getId()] = $S->getId();
        }


        $parsedKeys = [];
        foreach($this->multisite as $index => $S){
            if($S->getLanguage() == $this->Settings->getLanguage()){
                $parsedKeys[] = $S->getSiteKey();
            }
        }


        $multisite_filter = [];
        foreach($this->multisite_other as $S){
            if(!in_array($S->getSiteKey(), $parsedKeys)){
                if(!array_key_exists($S->getSiteKey(), $multisite_filter)){
                    $multisite_filter[$S->getSiteKey()] = $S;
                }
            }
        }
        $this->multisite_other = $multisite_filter;



        // Get routes by modules

        $this->Timer->mark('Parse bundle info');
        $this->parseBundleInfo();

        $fb1 = $this->parseCmsUrls($this->Settings->getFooterBlock1());
        $this->Settings->setFooterBlock1($fb1);
        $fb2 = $this->parseCmsUrls($this->Settings->getFooterBlock2());
        $this->Settings->setFooterBlock2($fb2);
        $fb3 = $this->parseCmsUrls($this->Settings->getFooterBlock3());
        $this->Settings->setFooterBlock3($fb3);
        $fb4 = $this->parseCmsUrls($this->Settings->getFooterBlock4());
        $this->Settings->setFooterBlock4($fb4);
        $fb5 = $this->parseCmsUrls($this->Settings->getFooterBlock5());
        $this->Settings->setFooterBlock5($fb5);

		$hbl = $this->parseCmsUrls($this->Settings->getHeaderBarLeft());
		$this->Settings->setHeaderBarLeft($hbl);
		$hbr = $this->parseCmsUrls($this->Settings->getHeaderBarRight());
		$this->Settings->setHeaderBarRight($hbr);

        $this->uri = $request->getRequestUri();

        // Get Gravatar
        if($this->containerInterface->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $this->gravatar = '//www.gravatar.com/avatar/' . md5(strtolower(trim($this->containerInterface->get('security.token_storage')->getToken()->getUser()->getEmail())));
        }

        $this->Timer->mark('Set webshop + settings defaults');
        if(in_array('WebshopBundle', $this->installed)){
            $this->webshop_enabled = true;
            $this->Webshop = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Webshop')->getByLanguageAndSettings($this->language, $this->Settings);
            if($this->getUser()){
                $this->WebshopCustomer = $this->getDoctrine()->getRepository('TrinityWebshopBundle:User')->findOneBy(['user' => $this->getUser()]);
            }
            $this->WebshopSettings = $this->Webshop->getSettings();

			if ($this->WebshopSettings && method_exists($this->WebshopSettings, 'getQuoteEnabled')) {
				$this->webshop_quote_enabled = $this->WebshopSettings->getQuoteEnabled();
			}

            $this->new_reviews = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Review')->countReviews('', false);
        }
        if(in_array('PelikanproductsBundle', $this->installed)){
            $this->Webshop = $this->getDoctrine()->getRepository('TrinityPelikanproductsBundle:Webshop')->getByLanguageAndSettings($this->language, $this->Settings);
            $this->WebshopSettings = $this->Webshop->getSettings();
        }

        //Init Meta conversion API class
        if(!empty($this->Settings->getMetaApiToken()) && !empty($this->Settings->getMetaPixelId())){
            $this->Meta = new Meta($this->Settings);
        }

        $this->Timer->mark('Done loading storage init');
        if(isset($_GET['timer']) && $_GET['timer'] === 1){
            $this->Timer->show(true);
        }
    }

    public function hasParameter(string $key): bool
    {
        try{
            $param = $this->getParameter($key);
            if(!empty($param)){
                return true;
            }
        }catch(\Exception $e){
            // Error
        }
        return false;
    }

	/**
	 * Parse text content and translate page:x notations to page url's.
	 *
	 * @param string $content Texts to replace
	 * @return string Update text
	 */
	public function parseCmsUrls(?string $content) : ?string
	{
		if (preg_match_all('/\[page:([a-zA-Z0-9\-\_]+)(\#[a-zA-Z0-9\-].*?)?\]/', $content, $matches))
		{
			$idToSlug = [];
			$cacheFile = preg_replace('/\/src.*/', '/var/cache/prod/', __DIR__) . 'page_id_slug';
			if (file_exists($cacheFile)) {
				$idToSlug = json_decode(file_get_contents($cacheFile), true);
			}

			foreach ($matches[0] as $index => $tag) {
				$key = $matches[1][$index];
				if (is_numeric($key)){
					if (array_key_exists($key, $idToSlug)) {
						$key = $idToSlug[$key];
					} else {
						$key = 'homepage';
					}
						
				}

				$key = str_replace('-', '_', $key);

				$content = str_replace('http://' . $tag, $this->generateUrl($key), $content);
				$content = str_replace('https://' . $tag, $this->generateUrl($key), $content);
				$content = str_replace($tag, $this->generateUrl($key), $content);
			}
		}

		return $content;
	}

    public function attributes($attributes = array()){

        // $Version = new \App\CmsBundle\Model\Version();
        $attr = array(
            'new_reviews'         => $this->new_reviews,
            'webshop_enabled'     => $this->webshop_enabled,
			'webshop_quote_enabled' => $this->webshop_quote_enabled,
            'Webshop'             => $this->Webshop,
            'WebshopSettings'     => $this->WebshopSettings,
            'WebshopCustomer'     => $this->WebshopCustomer,
            'languages'           => $this->languages,
            'languages_available' => $this->languages_available,
            'siteToLang'          => $this->siteToLang,
            'Settings'            => $this->Settings,
            'multisite'           => $this->multisite,
            'multisite_other'     => $this->multisite_other,
            'multisite_all'       => $this->multisite_all,
            'tags'                => $this->tags,
            // 'version'          => $Version,
            'modroutes'           => $this->modRoutes,
            'installed'           => $this->installed,
            'gravatar'            => $this->gravatar,
            'language'            => $this->language,
            'moderation'          => $this->moderation,
            'version'             => $this->version,
            'git_hash'            => $this->git_hash,
            'git_hash_long'       => $this->git_hash_long,
            'date'                => $this->date,
            'host'                => $this->host,
            'uri'                 => $this->uri,
            'prev_version'        => $this->prev_version,
            'bundleIcons'         => $this->bundleIcons,
            'ipblocks'            => $this->ipblocks,
            'translator'            => $this->translator,
            // 'Timer'               => $this->Timer,
            'cache_page'          => $this->cache_page,
            'cache_page_min'      => ($this->cache_page / 60),
            'cache_widget'        => $this->cache_widget,
            'cache_widget_min'    => ($this->cache_widget / 60),
            'cache_bundle'        => $this->cache_bundle,
            'cache_bundle_min'    => ($this->cache_bundle / 60),
        );
        foreach($attributes as $k => $v){
            $attr[$k] = $v;
        }
        return $attr;
    }

    private function parseBundleInfo(){

        $sort = [];

        $srcdir = '../src/';
        foreach(scandir('../src/Trinity') as $bundleDir){
            if(substr($bundleDir, 0, 1) != '.'){
                $bundlePath = '../src/Trinity/' . $bundleDir . '/';
                if(file_exists($bundlePath . 'MODULE')){

                    $bundleKey = str_replace('bundle', '', strtolower($bundleDir));

                    $route = 'admin_mod_' . $bundleKey;
                    $modcfg = file($bundlePath . 'MODULE');
                    $conf = array('bundleName' => '', 'route' => $route, 'path' => $bundlePath);

                    $bundleName = str_replace(array($srcdir, '/'), '', $conf['path']);
                    $conf['bundleName'] = $bundleName;

                    if(!in_array($bundleName, $this->installed)){
                        $this->installed[] = str_replace('Trinity', '', $bundleName);
                    }

                    foreach($modcfg as $i => $cfg){
                        if(preg_match('/^(.*?):\s+(.*?)$/', $cfg, $m)){

                            // Nav stuff
                            if($m[1] == 'nav'){
                                $m[2] = json_decode($m[2], true);
                                foreach($m[2] as $route => $label){
                                    $m[2][$route] = array('route' => trim($route), 'label' => trim($label));
                                }
                            }

                            if($m[1] == 'quickmenu'){
                                $m[2] = json_decode($m[2], true);

                                $c = array();
                                foreach($m[2]['add'] as $option){
                                    // foreach($options as $option){
                                        $c['add'][] = $option;
                                    // }
                                }

                                $m[2] = $c;
                            }

                            if($m[1] == 'nav_icon'){
                                $m[2] = json_decode($m[2], true);
                            }

                            $conf[$m[1]] = $m[2];
                        }
                    }

                    $this->bundleIcons[$conf['bundleName']] = $conf['icon'];

                    $conf['name'] = str_replace("\r", '', $conf['name']);
                    $this->modRoutes[] = $conf;
                }
            }
        }

        // SORT
        $sort = [];
        foreach($this->modRoutes as $r){
            $sort[$r['name']] = $r;
        }
        ksort($sort);
        $this->modRoutes = $sort;
    }

    protected function bundleInstalled($bundleName){
        $dir = str_replace('CmsBundle/Controller', 'Trinity/', __DIR__);
        foreach(scandir($dir) as $d){
            if(strpos(strtolower($d), strtolower($bundleName)) !== false){
                return true;
            }
        }
        return false;
    }

    /**
     * Clear Symfony router cache
     *
     * @return Response
     */
    protected function clearRouterCache(){

        $router = $this->containerInterface->get('router');
        $filesystem = $this->containerInterface->get('filesystem');
        $kernel = $this->containerInterface->get('kernel');
        $cacheDir = $kernel->getCacheDir();

        foreach (array('matcher_cache_class', 'generator_cache_class') as $option) {
            try{
                $className = $router->getOption($option);
                $cacheFile = $cacheDir . DIRECTORY_SEPARATOR . $className . '.php';
                $filesystem->remove($cacheFile);
            }catch(\Exception $e){
                //
            }
        }

        $router->warmUp($cacheDir);

        return true;
    }

	private function htmlMinifier(string $content) : string
	{
		$search = [
			'/(\n|^)(\x20+|\t)/',
			'/(\n|^)\/\/(.*?)(\n|$)/',
			'/\n/',
			'/\<\!--.*?-->/',
			'/(\x20+|\t)/',			# Delete multispace (Without \n)
			'/\>\s+\</',			# strip whitespaces between tags
			'/(\"|\')\s+\>/',		# strip whitespaces between quotation ("') and end tags
			'/=\s+(\"|\')/'			# strip whitespaces between = "'
		];

		$replace = [
			"\n",
			"\n",
			" ",
			"",
			" ",
			"><",
			"$1>",
			"=$1"
		];

		return preg_replace($search, $replace, $content);
	}
	
	/**
	 * Aanpassingen van de response html content
	 *
	 * @param Response $response Symfony Response object that needs to be optimized
	 * @return Response Optimized Symfony Response object
	 */
	protected function responseRewriteOutput(Response $response, $minify = false, $defer = true) : Response
	{
return $response;

		$old = strlen($response->getContent());
		$content = $this->htmlMinifier($response->getContent());
		$new = strlen($content);

		$verschil = $old - $new;

		$percent = ($verschil / $old) * 100;
		
		if ($this->containerInterface->getParameter('kernel.environment') == 'dev') {
			$content = '<!-- old size: ' . number_format($old, 0, ',', '.') . ' new size: ' . number_format($new, 0, ',', '.') . ' improvement: ' . round($percent, 2, PHP_ROUND_HALF_DOWN) . '% -->' .  $content;
		}

		$response->setContent($content);

		// DOMDocument is disabled, it does weird things to the html layout. For example inserting </source> elements in <picture> which is not valid.
		return $response;

		//$response->setSharedMaxAge(3600);

		$dom = new \DOMDocument();
		$dom->validateOnParse = true;
		$dom->resolveExternals = true;
		libxml_use_internal_errors(true);

		$page = mb_convert_encoding($response->getContent(), 'HTML-ENTITIES', "UTF-8");

		$dom->loadHTML($page, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | LIBXML_NOENT);

		$xpath = new \DOMXpath($dom);

		if (0) {
			foreach (libxml_get_errors() as $error) {
				// Do something with the error.
				dump($error);
			}
			//die();
		}
		libxml_clear_errors();

		$defer = false;
		$minify = false;

		if ($defer) {
			foreach ($dom->getElementsByTagName('script') as $node)
			{
				if ($node->getAttribute('type') == 'text/javascript' || $node->getAttribute('type') == '')
				{
					if ($node->getAttribute('type') == 'text/javascript' || $node->getAttribute('type') == '')
					{
						if ($node->getAttribute('src')) {
							/*$aScript['handle'] = ($node->getAttribute('id'))?$node->getAttribute('id'):md5($node->nodeValue);
							$aScript['handle'] =  md5($node->getAttribute('src'));
							$aScript['src'] = $node->getAttribute('src');
							$aScript['cleansrc'] =  remove_query_arg('ver',$node->getAttribute('src'));*/
							
							$node->setAttribute('defer','defer');
						} else {
							$node->setAttribute('src','data:text/javascript;base64,'.base64_encode($node->nodeValue));
							$node->setAttribute('defer','defer');
							$node->nodeValue='';
						}
					}
				}
			}
		}

		if ($minify) {
			$dom = $this->responseMinify($dom, $xpath);
		}

		$dir = $this->containerInterface->get('kernel')->getProjectDir() . '/var/cache/';
		file_put_contents($dir . 'content_before.txt', $response->getContent());
		//dump('einde');die();
		$response->setContent($dom->saveHTML());
		file_put_contents($dir . 'content_after.txt', $dom->saveHTML());
		//dump('hoi 1');die();

		return $response;
	}

	/**
	 * Minify the html of a DOMDocument
	 *
	 * @param  \DOMDocument $dom DomDocumunt
	 * @param  \DOMXPath $xpath DomXpath
	 * @return \DOMDocument
	 */
	private function responseMinify(\DOMDocument $dom, \DOMXPath $xpath) : \DOMDocument
	{
		$dom->preserveWhiteSpace = false;

		// remove comments
		foreach ($xpath->query('//comment()') as $comment) {
			$val= $comment->nodeValue;
			if( strpos($val,'[')===false){
				$comment->parentNode->removeChild($comment);
			}
		}

		$dom->normalizeDocument();

		$textnodes = $xpath->query('//text()');

		$skip = ["style","pre","code","script","textarea"];

		foreach ($textnodes as $t) {
			$xp = $t->getNodePath();
			$doskip = false;

			foreach ($skip as $pattern) {
				if (strpos($xp,"/$pattern")!==false) {
					$doskip = true;
					break;
				}
			}

			if ($doskip) {
				continue;
			}

			$t->nodeValue = preg_replace("/\s{2,}/", " ", $t->nodeValue);
		}

		$dom->normalizeDocument();

		$divnodes = $xpath->query('//div|//p|//nav|//footer|//article|//script|//hr|//br');

		foreach($divnodes as $d){
			$candidates = [];
			if(count($d->childNodes)){
				$candidates[] = $d->firstChild;
				$candidates[] = $d->lastChild;
				$candidates[] = $d->previousSibling;
				$candidates[] = $d->nextSibling;
			}

			foreach($candidates as $c){
				if($c==null){
					continue;
				}
				if($c->nodeType==3){
					$c->nodeValue = preg_replace('/\s{2,}/im', '', $c->nodeValue);
				}
			}
		}

		$dom->normalizeDocument();

		/*
		if($js){
			$scriptnodes = $xpath->query('//script');
			foreach($scriptnodes as $d){

				$d->nodeValue = preg_replace(array('/<!--(.*)-->/Uis',"/[[:blank:]]+/",'/\/\*(.*)\*\//Uis',),array('',' ',''),str_replace(array("\n","\r","\t"),'',$d->nodeValue));

			}
		}

		if($css){
			$cssnodes = $xpath->query('//style');
			foreach($cssnodes as $d){

				$d->nodeValue = preg_replace(array('/<!--(.*)-->/Uis',"/[[:blank:]]+/",'/\/\*(.*)\*\//Uis',),array('',' ',''),str_replace(array("\n","\r","\t"),'',$d->nodeValue));
			}
		}*/

		return $dom;
	}

	/**
	 * Reset pageCache where a block contains a bundle
	 *
	 * @param string $string bundleName if string is null, then all pages of the website are reset.
	 * @return void
	 */
	protected function resetPageCacheThatContainedBundle(?string $string, \App\CmsBundle\Entity\Settings $Settings) : void
	{
		// check if cache is enabled
		$allowCache = false;
		if ($this->containerInterface->hasParameter('trinity_cache') && ($this->containerInterface->getParameter('trinity_cache') == 'true' || $this->containerInterface->getParameter('trinity_cache'))) {
			$allowCache = true;
		}

		if (!$allowCache) {
			return;
		}

		if (empty($string)) {
			$pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(['settings' => $Settings]);

			if (!empty($pages))
			{
				foreach($pages as $page)
				{
					if ($page->getEnabled() && $page->getCache()) {
						$page->setCacheData(null);
					}
				}
			}

		} else {
			$pageBlocks = $this->em->getRepository('CmsBundle:PageBlock')->findByData($string);

			if (!empty($pageBlocks)) {
				foreach($pageBlocks as $block) {
					$blockWrapper = $block->getWrapper();
					$page = $blockWrapper->getPage();

					if ($page->getSettings()->getId() == $Settings->getId()) {
						// reset cache
						$page->setCacheData(null);
					}
				}
			}
		}

		return;
	}
}
