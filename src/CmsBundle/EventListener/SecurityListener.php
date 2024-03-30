<?php
namespace App\CmsBundle\EventListener;

use App\CmsBundle\Entity\Ipcheck;
use Symfony\Component\HttpKernel\Kernel;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Authentication\Token\Storage\UsageTrackingTokenStorage;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;

use App\CmsBundle\Entity\Log;
use GeoIp2\Database\Reader;

class SecurityListener
{

    private $em              = null;
    private $security        = null;
    private $session         = null;
    private $kernel          = null;
    private $requestStack    = null;
    private $container       = null;
    private $translator      = null;
    private $GeoIPDB      = null;
    
    private $version         = null;
    private $git_hash        = null;
    private $git_hash_long   = null;
    private $date            = null;
    private $prev_version    = null;
    
    private $cooldown = 'U bent tijdelijk geblokkeerd vanwege herhaaldelijk onjuist inloggen. Probeer het later opnieuw.';
    private $blocked = 'Je bent geblokkeerd, neem contact op met de applicatieleverancier.';

   public function __construct(EntityManager $entityManager, UsageTrackingTokenStorage $security, Session $session, \App\Kernel $kernel, RequestStack $requestStack, ContainerInterface $container, $translator)
   {
      $this->em       = $entityManager;
      $this->security = $security;
      $this->session  = $session;
      $this->kernel  = $kernel;
      $this->requestStack  = $requestStack;
      $this->container  = $container;
      $this->translator   = $translator;


      $this->GeoIPDB = new Reader('../src/CmsBundle/GeoLite2-City.mmdb');
   }

    public function onAuthenticationFailure( AuthenticationFailureEvent $event )
    {
        $request = $this->requestStack->getCurrentRequest();
        $authDir = $this->kernel->getProjectDir() . '/var/auth/';
        if(!file_exists($authDir)){ mkdir($authDir); }

        $Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy([], ['id' => 'asc']);

        $errorKey = $event->getAuthenticationException()->getMessageKey();
        if(file_exists($authDir)){
            $ip = $request->getClientIp();
            $_credentials = $event->getAuthenticationToken()->getCredentials();

            if (isset($_credentials['username']) && !empty($_credentials['username'])) {
				$username = $_credentials['username'];
			} else {
                $username = 'unknown';
            }

            // Whitelist IP's in .ip file
            $whitelist = false;
            $ipFile = str_replace('/src/CmsBundle/EventListener', '/.ip', __DIR__);
            if(file_exists($ipFile)){
                $ip_list = file($ipFile);
                foreach($ip_list as $ip_entry){
                    $ip_entry = explode(':', trim($ip_entry));
                    $ip_entry = trim($ip_entry[0]);
                    if($ip == $ip_entry){
                        $whitelist = true;
                        break;
                    }
                }
            }

            // Whitelist IP's in .whitelist file
            $whitelist = false;
            $ipFile = str_replace('/src/CmsBundle/EventListener', '/.whitelist', __DIR__);
            if(file_exists($ipFile)){
                $ip_list = file($ipFile);
                foreach($ip_list as $ip_entry){
                    $ip_entry = trim($ip_entry);
                    if($ip == $ip_entry){
                        $whitelist = true;
                        break;
                    }
                }
            }
            
            if($whitelist){
                // IP is whitelisted

                $Ipcheck = $this->em->getRepository(Ipcheck::class)->findOneBy(['user_attempt' => $username, 'ip' => $ip]);
                if($Ipcheck){
                    // Remove existing entry
                    $this->em->remove($Ipcheck);
                    $this->em->flush();
                }

                $Syslog = new Log();
                $Syslog->setAction('login');
                $Syslog->setType('auth');
                $Syslog->setStatus('failure');
                $Syslog->setMessage('Foutieve inlog met gebruikersnaam, IP op whitelist.');
                $Syslog->setSettings($Settings);
                $this->em->persist($Syslog);

                if($Settings->getIntegrations()){ $Settings->getIntegrations()->sendTelegram($Settings->getLabel() . ': Foutieve inlog met gebruikersnaam, IP op whitelist. Gebruikersnaam: "' . $username . '"'); }

                $this->session->getFlashBag()->add(
                    'error',
                    $this->translator->trans('Gebruikersnaam en/of wachtwoord is onjuist.', [], 'security')
                );

            }else{

                $is_admin = (empty($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], '/admin') !== false ? true : false);

                if($is_admin){
                // $User = $this->em->getRepository('CmsBundle:User')->findOneByUsername($username);
                // if($User){
                    $Ipcheck = $this->em->getRepository(Ipcheck::class)->findOneBy(['user_attempt' => $username, 'ip' => $ip]);
                    if(empty($Ipcheck)){
                        $Ipcheck = new Ipcheck();
                        $Ipcheck->setIp($ip);
                        $Ipcheck->setBlocked(false);

                        if($ip != '127.0.0.1'){
                            try{
                                $client_ip = $this->GeoIPDB->city($ip);
                                $client_country = $client_ip->country->isoCode;
                                $Ipcheck->setCountry($client_country);
                            }catch(\GeoIp2\Exception\AddressNotFoundException $e){}
                        }
                    }

                    try{
                        $datetime1 = $Ipcheck->getLoginLastAttempt();
                        if(!empty($datetime1)){
                            $datetime2 = new \DateTime();
                            $interval = $datetime1->diff($datetime2);
                            $min = $interval->format('%i');
                        }else{
                            $min = 0;
                        }
                    }catch(\Exception $e){
                        $min = 0;
                    }

                    $Ipcheck->setLoginAttempts($Ipcheck->getLoginAttempts() + 1);
                    // $Ipcheck->setLoginLastAttempt(new \DateTime());

                    if(preg_match('/\w+/', $username)){
                        $Ipcheck->setUserAttempt($username);
                    }else{
                        $Ipcheck->setUserAttempt('unknown: ' . $username);
                    }

                    // $User->setIpCheck($Ipcheck);

                    $this->em->persist($Ipcheck);
                    $this->em->flush();

                    // Last invalid login was less then 15 minutes ago, check if it has 5 failed attempts
                    if($Ipcheck->getLoginAttempts() >= 5){

                        if($min >= 15){
                            // Cooldown period is over, restart 5 attempts, with 1 attempt directly used (4 to go before next cooldown)
                            $Ipcheck->setLoginAttempts(1);
                            $Ipcheck->setLoginLastAttempt(new \DateTime());
                            $this->em->persist($Ipcheck);
                            $this->em->flush();
                            $this->session->getFlashBag()->add(
                                'error',
                                $this->translator->trans('Gebruikersnaam en/of wachtwoord is onjuist.', [], 'security')
                            );
                        }else{
                            $response = new \Symfony\Component\HttpFoundation\RedirectResponse($this->container->get('router')->generate('admin_login') . '?cooldown=1');

                            $this->security->setToken(null);
                            $this->session->invalidate();
                            // $sec = $interval->format('%s');
                            // $dev = ($this->kernel->getEnvironment() == 'dev');

                            $this->session->getFlashBag()->add(
                                'error',
                                ($Ipcheck->getBlocked() ? $this->blocked : $this->cooldown)
                            );

                            $Syslog = new Log();
                            $Syslog->setAction('login');
                            $Syslog->setUsername($username);
                            $Syslog->setType('blocked');
                            $Syslog->setPriority(1);
                            $Syslog->setMessage('Meer dan 5 pogingen, vervolg pogingen zijn geblokkeerd.');
                            $Syslog->setSettings($Settings);
                            $this->em->persist($Syslog);
                            $this->em->flush();

                            if($Settings->getIntegrations()){ $Settings->getIntegrations()->sendTelegram($Settings->getLabel() . ': Meer dan 5 pogingen, vervolg pogingen zijn geblokkeerd. Gebruikersnaam: "' . $username . '"'); }

                            return $response;
                        }
                    }else{

                        $Syslog = new Log();
                        $Syslog->setAction('login');
                        $Syslog->setUsername($username);
                        $Syslog->setType('auth');
                        $Syslog->setStatus('failure');
                        $Syslog->setMessage('Foutieve inlog met gebruikersnaam.');
                        $Syslog->setSettings($Settings);
                        $this->em->persist($Syslog);
                        $this->em->flush();

                        if($Settings->getIntegrations()){ $Settings->getIntegrations()->sendTelegram($Settings->getLabel() . ': Foutieve inlog met gebruikersnaam: "' . $username . '"'); }

                        $this->session->getFlashBag()->add(
                            'error',
                            $this->translator->trans('Gebruikersnaam en/of wachtwoord is onjuist.', [], 'security')
                        );
                    }

                    // dump($ip);
                    // dump($username);
                // }
                }else{
                    $this->session->getFlashBag()->add(
                        'error',
                        $this->translator->trans('Gebruikersnaam en/of wachtwoord is onjuist.', [], 'security')
                    );
                }
                $errorLine = [
                    '[' . date('Y-m-d H:i:s') . ']',
                    $ip,
                    $username,
                    $errorKey,
                ];
                $errorLine = implode(' | ', $errorLine) . "\n";
                file_put_contents($authDir . $username, $errorLine, FILE_APPEND);
            }
            /*if(file_exists($authDir . $username)){
                file_put_contents($errorLine, $authDir . $username, FILE_APPEND);
            }else{
                echo ( '<pre>' . print_r( '??', 1 ) . '</pre>' );
                file_put_contents($errorLine, $authDir . $username);
            }*/
            // die( "<pre>" . print_r( $errorLine, 1 ) . "</pre>" );
            // dump($request->getParameter('_username'));die();
        }else{
            $this->session->getFlashBag()->add(
                'error',
                $this->translator->trans('Gebruikersnaam en/of wachtwoord is onjuist.', [], 'security')
            );
        }

        // die();
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $request = $request = $this->requestStack->getCurrentRequest();

        $Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy([], ['id' => 'asc']);

        $User = $this->security->getToken()->getUser();
        $username = $event->getAuthenticationToken()->getUsername();

        if(empty($username)){
            $username = 'unknown';
        }


        $is_admin = (empty($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], '/admin') !== false ? true : false);
        if(!$is_admin){
            if($User->getUsername() == 'admin'){
                $response = new \Symfony\Component\HttpFoundation\RedirectResponse($this->container->get('router')->generate('admin_login') . '?cooldown=1');

                $this->security->setToken(null);
                $this->session->invalidate();

                return $response;
            }
        }


        $ip = $request->getClientIp();
        $Ipcheck = $this->em->getRepository(Ipcheck::class)->findOneBy(['user_attempt' => $username, 'ip' => $ip]);

        // Whitelist IP's in .ip file
        $whitelist = false;
        $ipFile = str_replace('/src/CmsBundle/EventListener', '/.ip', __DIR__);
        if(file_exists($ipFile)){
            $ip_list = file($ipFile);
            foreach($ip_list as $ip_entry){
                $ip_entry = explode(':', trim($ip_entry));
                $ip_entry = trim($ip_entry[0]);
                if($ip == $ip_entry){
                    $whitelist = true;
                    break;
                }
            }
        }

        // Whitelist IP's in .whitelist file
        $whitelist = false;
        $ipFile = str_replace('/src/CmsBundle/EventListener', '/.whitelist', __DIR__);
        if(file_exists($ipFile)){
            $ip_list = file($ipFile);
            foreach($ip_list as $ip_entry){
                $ip_entry = trim($ip_entry);
                if($ip == $ip_entry){
                    $whitelist = true;
                    break;
                }
            }
        }
        
        if($whitelist){
            // IP is whitelisted

            if($Ipcheck){
                // Remove existing entry
                $this->em->remove($Ipcheck);
                $this->em->flush();
            }

        }else{
            $is_admin = (empty($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], '/admin') !== false ? true : false);
            /**
             COOLDOWN
             */
            if($is_admin && $Ipcheck && $Ipcheck->getLoginAttempts() >= 5){

                $datetime1 = $Ipcheck->getLoginLastAttempt();
                $datetime2 = new \DateTime();
                $interval = $datetime1->diff($datetime2);
                $min = $interval->format('%i');

                if((float)$min >= 15){
                    // Cooldown of 15 minutes is gone, reset.
                    $this->em->remove($Ipcheck);
                    $this->em->flush();
                }else{
                    // Still in cooldown, return error
                    $response = new \Symfony\Component\HttpFoundation\RedirectResponse($this->container->get('router')->generate('admin_login') . '?cooldown=1');

                    $this->security->setToken(null);
                    $this->session->invalidate();

                    $this->session->getFlashBag()->add(
                        'error',
                        ($Ipcheck->getBlocked() ? $this->blocked : $this->cooldown)
                    );

                    return $response;
                }
            }
        }

        /**
         ACCOUNT IS EXPIRED
         */
        if($User->getExpire()){
            $d = new \DateTime();
            if($User->getExpireDate()->format('Ymd') <= $d->format('Ymd')){
                $response = new \Symfony\Component\HttpFoundation\RedirectResponse($this->container->get('router')->generate('admin_login') . '?expired=1');



                $this->security->setToken(null);
                $this->session->invalidate();

                $this->session->getFlashBag()->add(
                    'warning',
                    'Your account has expired.'
                );

                $Syslog = new Log();
                $Syslog->setAction('login');
                $Syslog->setUser($User);
                $Syslog->setUsername($username);
                $Syslog->setType('auth');
                $Syslog->setStatus('expired');
                $Syslog->setMessage('Succesvolle login met verlopen account.');
                $Syslog->setSettings($Settings);
                $this->em->persist($Syslog);
                $this->em->flush();

                if($Settings->getIntegrations()){ $Settings->getIntegrations()->sendTelegram($Settings->getLabel() . ': Succesvolle login met verlopen account. Gebruikersnaam: "' . $username . '"'); }

                return $response;
            }
        }

        /**
         * PASSWORD IS EXPIRED
         */
        if($User->getExpirePasswordEnable()){
            $d = new \DateTime();
            if ($User->getExpirePasswordDate()->format('Ymd') <= $d->format('Ymd')) {
                $response = new \Symfony\Component\HttpFoundation\RedirectResponse($this->container->get('router')->generate('admin_login') . '?passwordexpired=1');

                $this->security->setToken(null);
                $this->session->invalidate();

                $this->session->getFlashBag()->add(
                    'warning',
                    'Je wachtwoord is verlopen.<br/><a href="/admin/lostpassword?expired=1">Verander wachtwoord</a>'
                );

                $Syslog = new Log();
                $Syslog->setAction('login');
                $Syslog->setUser($User);
                $Syslog->setUsername($username);
                $Syslog->setType('auth');
                $Syslog->setStatus('expired');
                $Syslog->setMessage('Wachtwoord is verlopen.');
                $Syslog->setSettings($Settings);
                $this->em->persist($Syslog);
                $this->em->flush();

                if($Settings->getIntegrations()){ $Settings->getIntegrations()->sendTelegram($Settings->getLabel() . ': Wachtwoord is verlopen. Gebruikersnaam: "' . $username . '"'); }

                return $response;
            }

            $expireDate = $User->getExpirePasswordDate();
            $expireDate->modify('-1 month');
            if ($User->getExpirePasswordDate()->format('Ymd') <= $d->format('Ymd')) {
                $this->session->getFlashBag()->add(
                    'warning',
                    'Uw wachtwoord verloopt op: ' . $User->getExpirePasswordDate()->format('d-m-Y')
                );
            }
        }

        /*$validCaptcha = $Settings->validateGoogleRecaptcha($request->request->get('g-recaptcha-response'));
        if(!$validCaptcha){
            $response = new \Symfony\Component\HttpFoundation\RedirectResponse($this->container->get('router')->generate('admin_login') . '?expired=1');

            $this->security->setToken(null);
            $this->session->invalidate();

            $this->session->getFlashBag()->add(
                'warning',
                'Ongeldige captcha.'
            );

            return $response;
        }*/

        /**
         RESET LOGIN ATTEMPTS
         */
        if(!empty($Ipcheck)){
            $Ipcheck->setLoginAttempts(0);
            $this->em->persist($Ipcheck);
            $this->em->flush();
        }







        $symfony_version = \Symfony\Component\HttpKernel\Kernel::VERSION;

        $target = $this->container->getParameter('trinity_cc_server') . '/';
        $target_clean = preg_replace('/^http(s)?:\/\//', '', $target);

        $authKey = $Settings->getCcAuthKey();

        $versionFile = $this->kernel->getProjectDir() . '/src/CmsBundle/VERSION';
        if (file_exists($versionFile)) {
            $versionEntries = file($versionFile);

            $this->version         = trim($versionEntries[0]);
            $this->git_hash        = trim($versionEntries[1]);
            $this->git_hash_long   = trim($versionEntries[2]);
            $this->date            = trim($versionEntries[3]);
            $this->prev_version    = trim($versionEntries[4]);
            /*foreach(file($versionFile) as $ln){
                $ln = trim($ln);
                dump($ln);
            }*/
        }

        $bundleList = [];
        $bundleDir = $this->kernel->getProjectDir() . '/src/Trinity/';
        foreach(scandir($bundleDir) as $d){
            $path = $bundleDir . $d;
            if(is_dir($path) && !in_array($d, ['.', '..'])){

                $version = '';
                if(file_exists($path . '/VERSION')){
                    $versionEntries = file($path . '/VERSION');

                    if(!empty($versionEntries)){
                        $version = [
                            'version'        => trim($versionEntries[0]),
                            'git_hash'       => trim($versionEntries[1]),
                            'git_hash_long'  => trim($versionEntries[2]),
                            'date'           => trim($versionEntries[3]),
                            'date'           => trim($versionEntries[3]),
                        ];
                    }
                }

                $bundleList[$d] = [
                    'path' => $path,
                    'version' => $version,
                ];
            }
        }

        $Syslog = new Log();
        $Syslog->setAction('login');
        $Syslog->setUser($User);
        $Syslog->setUsername($username);
        $Syslog->setType('auth');
        $Syslog->setStatus('success');
        $Syslog->setMessage('Succesvol ingelogd.');
        $Syslog->setSettings($Settings);
        $this->em->persist($Syslog);
        $this->em->flush();

        if($Settings->getIntegrations()){ $Settings->getIntegrations()->sendTelegram($Settings->getLabel() . ': Succesvol ingelogd. Gebruikersnaam: "' . $username . '"'); }

        if($User && $request->getHost() != $target_clean){
            $client_data = [
                'domain'          => $request->getHost(),
                'uri'             => $request->get('uri') ?? '/',
                'hostname'        => '',
                'serverip'        => $_SERVER['SERVER_ADDR'],
                'datetime'        => date('Y-m-d H:i:s'),
                'version'         => $this->version,
                'symfony_version' => $symfony_version,
                'username'        => $User->getUsername(),
                'title'           => $Settings->getLabel(),
                'matomo_url'      => $Settings->getPiwikUrl(),
                'matomo_hash'     => $Settings->getPiwikApiHash(),
                'userip'          => $_SERVER['REMOTE_ADDR'],
                'bundleList'      => $bundleList,
            ];

            $id      = '1_71cb7h9hd4m3k23ghpadk67ed8b663l8jcmb83hhhdk45';

            if($Settings->getCcExpires()){
                $expiresIn = $Settings->getCcExpires()->getTimestamp() - time();
                $expiresInHours = (($expiresIn / 60) / 60);
                if($expiresInHours < 4){
                    // Force expire in 4 hours
                    $authKey = null;
                }
            }

            $key     = 'mp3mkk7lhh79cp4domebj8jgkeilk9nlef2dpi53p61hgf';
            $payload = 'grant_type=client_credentials&client_id=' . $id . '&client_secret=' . $key;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$target . 'oauth/v2/token');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_response = json_decode(curl_exec ($ch), true);
            curl_close ($ch);

            if($server_response){
                if(!empty($server_response['access_token'])){
                    $Settings->setCcExpires(new \DateTime(date('Y-m-d H:i:s', strtotime('+' . $server_response['expires_in'] . ' seconds'))));
                    $Settings->setCcAuthKey($server_response['access_token']);

                    if($Settings->hasLogo()){
                        $this->em->persist($Settings);
                        $this->em->flush();
                    }
                }else{
                    // return new JsonResponse(['success' => false, 'message' => $server_response['error_description']]);
                }
            }else{
                // return new JsonResponse(['success' => false, 'message' => 'Invalid endpoint: ' . $target]);
            }

            if($this->container->getParameter('kernel.environment') != 'dev'){

            $host = $this->requestStack->getCurrentRequest()->getHost();
            $isLocal = false;
            if(preg_match('/\.local/', $host)){
                $isLocal = true;
            }

            if($Settings->getCcAuthKey() && !$isLocal){







                    $encrypt_method = "AES-256-CBC";
                    $secret_key = '0XBD7DsyTqGQJJ';
                    $secret_iv = 'sDRFpXBBy3q5rc';

                    // hash
                    $key = hash('sha256', $secret_key);
                    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
                    $iv = substr(hash('sha256', $secret_iv), 0, 16);


                    $TRC_client = $this->em->getRepository('TrinityApiBundle:Client')->findOneByLabel('TRC');
                    if(empty($TRC_client)){
                        $hash1 = substr(md5(openssl_random_pseudo_bytes(20)),-25) . substr(md5(openssl_random_pseudo_bytes(20)),-25);
                        $hash2 = substr(md5(openssl_random_pseudo_bytes(20)),-25) . substr(md5(openssl_random_pseudo_bytes(20)),-25);
                        $TRC_client = new \App\Trinity\ApiBundle\Entity\Client();
                        $TRC_client->setLabel('TRC');
                        $TRC_client->setRandomId($hash1);
                        $TRC_client->setSecret($hash2);

                        $grant_types = array(
                            'authorization_code',
                            'token',
                            'client_credentials',
                        );
                        $TRC_client->setAllowedGrantTypes($grant_types);

                        $this->em->persist($TRC_client);
                        $this->em->flush();
                    }

                    $api_token = base64_encode(openssl_encrypt($TRC_client->getId() . '_' . $TRC_client->getRandomId(), $encrypt_method, $key, 0, $iv));
                    $api_secret = base64_encode(openssl_encrypt($TRC_client->getSecret(), $encrypt_method, $key, 0, $iv));

                    $client_data['api_token'] = $api_token;
                    $client_data['api_secret'] = $api_secret;

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL,$target . 'api/authorize');
                    $headers = array(
                        'Content-Type:application/x-www-form-urlencoded',
                        'Authorization:Bearer ' . $Settings->getCcAuthKey()
                    );
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($client_data));

                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                    $server_response_raw = curl_exec ($ch);
                    $server_response = json_decode($server_response_raw);
                    curl_close ($ch);

                    if($server_response){
                        // dump($server_response);die();
                    }else{
                        // dump($server_response_raw);die();
                    }
                }else{
                    // dump('Invalid auth key');die();
                }

            }
        }

        // return new JsonResponse(['success' => false]);
    }

}
