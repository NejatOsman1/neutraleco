<?php

namespace App\CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

class CommandcontrolController extends StorageController{

    const GITLAB_KEY = 'KMxyG67dpkD8DqPztieR';

    /**
     * @Route("/admin/commandcontrol/{branch}", name="admin_cc")
     * @Template()
     */
    public function indexAction(Request $request, $branch = null){
        parent::init($request);

        /*if($request->get('update') == 'bundles'){
            $application = new Application($this->containerInterface->get('kernel'));
            $application->setAutoExit(false);

            $input = new ArrayInput(array(
               'command' => 'trinity:bundle:repo'
            ));

            // You can use NullOutput() if you don't need the output
            $output = new BufferedOutput();
            $application->run($input, $output);
            $content = $output->fetch();

            dump($content);die();

            // header('Location:' . $this->generateUrl('admin_cc'));exit;
        }*/

        $this->breadcrumbs->addRouteItem($this->trans('Command & Control', [], 'cms'), 'admin_cc');

        $em = $this->getDoctrine()->getManager();

        $activeTag = (!empty($_GET['tag']) ? $_GET['tag'] : null);

        if($activeTag){
            $activeTag = $em->getRepository('CmsBundle:Tag')->find($activeTag);
            $clients = $em->getRepository('CmsBundle:Clientdomain')->getByTag($activeTag);
        }else{
            $clients = $em->getRepository('CmsBundle:Clientdomain')->findBy([], ['last_date' => 'desc']);
        }

        $last_requests = $em->getRepository('CmsBundle:Clientrequest')->findBy(['username' => 'admin'], ['datetime' => 'desc'], 5);
        $cron_requests = $em->getRepository('CmsBundle:Clientrequest')->findBy(['username' => 'cron'], ['datetime' => 'desc'], 5);

        $bundles = [];
        $bundlesFile = __DIR__ . '/../../../bundles.cache';
        if(file_exists($bundlesFile)){
            $bundles = json_decode(file_get_contents($bundlesFile), true);
        }

        $version_list = json_decode(file_get_contents('https://gitlab.com/api/v4/projects/4636464/repository/tags?private_token=' . self::GITLAB_KEY), true);
        $version = $version_list[0];

        $count = [
            'total'  => count($clients),
            'latest' => 0,
            'demo'   => 0,
            'dev'    => 0,
            'prod'    => 0,
        ];

        $realDomains = [];

        try {
            $dev_regex = $this->getParameter('trinity_cc_dev_regex');
        } catch (\Exception $e) {
            $dev_regex = null;
        }
        try {
            $demo_regex = $this->getParameter('trinity_cc_demo_regex');
        } catch (\Exception $e) {
            $demo_regex = null;
        }


        $domains_grouped = [];

        $today = 0;
        $yesterday = 0;
        $earlier = 0;

        $clientSort = [];
        foreach($clients as $k => $client){
            if($client->getVersion() == $version['name']){
                $count['latest']++;
            }


            try{
                $lastRequest = $client->getRequests()->last();
                if($lastRequest->getServerip() == '149.210.142.15'){
                    unset($clients[$k]);continue;
                }
            }catch(\Exception $e){}

            if(!empty($_GET['q'])){
                if(strpos($client->getDomain(), $_GET['q']) === false){
                    unset($clients[$k]);continue;
                }
            }

            if($demo_regex && preg_match($demo_regex, $client->getDomain())){
                $count['demo']++;
                unset($clients[$k]);continue;
            }else if($dev_regex && preg_match($dev_regex, $client->getDomain())){
                $count['dev']++;
                unset($clients[$k]);continue;
            }else{

                $domain = $client->getDomain();
                $domain_no_www = str_replace(['www.'], [''], $domain);

                $domains_grouped[$domain_no_www][$domain] = $client;

                if(empty($realDomains[$domain_no_www])) $realDomains[$domain_no_www] = 1;
                $realDomains[$domain_no_www]++;

                $lastDate = new \DateTime($client->getLastDate());
                if($lastDate->format('Ymd') == date('Ymd')){
                    $today++;
                }elseif($lastDate->format('Ymd') == date('Ymd', strtotime('-1 DAY'))){
                    $yesterday++;
                }else{
                    $earlier++;
                }


                $count['prod']++;

                ksort($domains_grouped[$domain_no_www]);
            }

            # if(!preg_match('/default.beyonitdemo/', $client->getDomain())){
                // unset($clients[$k]);
            // }
        }

        if(!empty($_GET['urls'])){
            die( "<pre>" . print_r( $realDomains, 1 ) . "</pre>" );
        }

        $count['real'] = count($realDomains);

        $count['percent'] = 0;
        if($count['total'] > 0){
            $count['percent'] = (int)round((($count['latest'] / $count['total']) * 100), 0);
        }

        if(!empty($bundles['bundles'])){
            foreach($bundles['bundles'] as $name => $data){
                // if(!isset($bundles['bundles'][$name]['installed'])) $bundles['bundles'][$name]['installed'] = [];
                $count_clients = $em->getRepository('CmsBundle:Clientdomain')->findByBundle(true, $name);
                $bundles['bundles'][$name]['installed'] = $count_clients;
                /*foreach($clients as $Client){
                    $bundles['bundles'][$name]['installed'][] = $Client->getDomain();
                }*/
            }
        }

        if(!empty($branch)){
            foreach($bundles['bundles'] as $k => $bundle){
                $found = false;
                if(!empty($bundle['branches'])){
                    foreach($bundle['branches'] as $kb => $b){
                        if($b['name'] == $branch){
                            $found = true;

                            $bundles['bundles'][$k]['branches'][$kb]['commit']['committed_date'] = new \DateTime($b['commit']['committed_date']);
                        }
                    }
                }

                if(!$found){
                    unset($bundles['bundles'][$k]);
                }
            }
        }

        $tags = $em->getRepository('CmsBundle:Tag')->findAll();

        return $this->attributes(array(
            'domains_grouped' => $domains_grouped,
            'clients'         => $clients,
            'last_requests'   => $last_requests,
            'cron_requests'   => $cron_requests,
            'bundles'         => $bundles,
            'branch_filter'   => $branch,
            'today'           => $today,
            'yesterday'       => $yesterday,
            'earlier'         => $earlier,
            'count'           => $count,
            'tags'            => $tags,
        ));
    }

    /**
     * @Route("/admin/commandcontrol/installed/{bundle}", name="admin_cc_installed")
     * @Template()
     */
    public function installedAction(Request $request, $bundle){
        parent::init($request);

        $em = $this->getDoctrine()->getManager();
        $clients = $em->getRepository('CmsBundle:Clientdomain')->findByBundle(false, $bundle);

        $grouped = [
            'live' => [],
            'demo' => [],
            'dev' => [],
        ];
        foreach($clients as $c){
            $d = str_replace('www.', '', $c->getDomain());
            if(preg_match('/demo/', $d)){
                $grouped['demo'][$d] = 1;
            }elseif(preg_match('/dev/', $d)){
                $grouped['dev'][$d] = 1;
            }else{
                $grouped['live'][$d] = 1;
            }
        }

        $grouped['demo'] = array_keys($grouped['demo']);
        $grouped['dev'] = array_keys($grouped['dev']);
        $grouped['live'] = array_keys($grouped['live']);

        // dump($grouped);die();

        foreach($grouped as $env => $ds){
            if(!empty($ds)){
                sort($ds);
                echo '<h2>' . $env . '</h2>';
                echo '<ul>';
                foreach($ds as $d){
                    echo '<li>' . $d . '</li>';
                }
                echo '</ul>';
            }
        }
        die();
    }

    /**
     * @Route("/admin/commandcontrol/dns/{domain}", name="admin_cc_dns")
     * @Template()
     */
    public function dnsAction(Request $request, $domain){
        parent::init($request);

        $em = $this->getDoctrine()->getManager();
        $Client = $em->getRepository('CmsBundle:Clientdomain')->findOneByDomain($domain);

        return $this->attributes(array(
            'Client' => $Client,
        ));
    }

    /**
     * @Route("/admin/commandcontrol/warnings/{domain}", name="admin_cc_warnings")
     * @Template()
     */
    public function warningsAction(Request $request, $domain){
        parent::init($request);

        $em = $this->getDoctrine()->getManager();
        $Client = $em->getRepository('CmsBundle:Clientdomain')->findOneByDomain($domain);

        return $this->attributes(array(
            'Client' => $Client,
        ));
    }

    /**
     * @Route("/admin/commandcontrol/bulkupdate", name="admin_cc_bulkupdate")
     * @Template()
     */
    public function bulkupdateAction(Request $request){
        parent::init($request);

        $version_list = file_get_contents('https://gitlab.com/api/v4/projects/4636464/repository/tags?private_token=' . self::GITLAB_KEY);
        $version_list = json_decode($version_list, true);

        $em = $this->getDoctrine()->getManager();
        $Settings = $em->getRepository('CmsBundle:Settings')->find(1);

        if(!empty($_POST['clientlist'])){
            $stats = [];
            $clients = explode(',', $_POST['clientlist']);
            foreach($clients as $cid){
                $Client = $em->getRepository('CmsBundle:Clientdomain')->find($cid);
                $stats[$Client->getDomain()] = 0;

                // Validate
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$Client->getUrl() . '/api/ping');
                $headers = array('Authorization:Bearer ' . $Client->getApiKey());
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                $server_response_raw = curl_exec ($ch);
                $server_response = json_decode($server_response_raw, true);
                curl_close ($ch);
                if($server_response && isset($server_response['error'])){
                    if($server_response['error'] == 'invalid_grant'){
                        // Invalid keys, request new keys
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL,$Client->getUrl() . '/oauth/v2/token');
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials&client_id=' . $Client->getApiToken() . '&client_secret=' . $Client->getApiSecret());
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                        $server_response_raw = curl_exec ($ch);
                        $server_response = json_decode(curl_exec ($ch), true);

                        $Client->setApiKey($server_response['access_token']);
                        $em->persist($Client);
                        $em->flush();

                        curl_close ($ch);
                    }
                }



                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$Client->getUrl() . '/api/selfupdate');
                $headers = array('Authorization:Bearer ' . $Client->getApiKey());
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, 'version=' . $_POST['version'] . '&domain=' . urlencode($Client->getDomain()) . '&email=' . (!empty($_POST['email']) ? $_POST['email'] : $Settings->getAdminEmail()));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                $server_response_raw = curl_exec ($ch);
                $server_response = json_decode($server_response_raw, true);
                curl_close ($ch);

                if(isset($server_response['success']) && (boolean)$server_response['success'] == true){
                    $stats[$Client->getDomain()] = 1;
                }else{
                    $stats[$Client->getDomain()] = 0;
                }
            }
            return $this->attributes([
                'Settings' => $Settings,
                'stats' => $stats,
            ]);
        }else{
            $clientlist = [];
            $clientids = $_POST['check'];
            if(!empty($_POST['check'])){
                foreach($_POST['check'] as $id){
                    $Client = $em->getRepository('CmsBundle:Clientdomain')->find($id);
                    $clientlist[] = $Client->getDomain();
                }
            }
        }

        return $this->attributes([
            'Settings' => $Settings,
            'version_list' => $version_list,
            'clientids' => $clientids,
            'clientlist' => $clientlist,
        ]);
    }

    /**
     * @Route("/admin/commandcontrol/update/{domain}", name="admin_cc_update")
     * @Template()
     */
    public function updateAction(Request $request, $domain){
        parent::init($request);

        $em = $this->getDoctrine()->getManager();
        $Settings = $em->getRepository('CmsBundle:Settings')->find(1);
        $Client = $em->getRepository('CmsBundle:Clientdomain')->findOneByDomain($domain);

        if(!empty($_POST)){



            // Validate
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$Client->getUrl() . '/api/ping');
            $headers = array('Authorization:Bearer ' . $Client->getApiKey());
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            $server_response_raw = curl_exec ($ch);
            $server_response = json_decode($server_response_raw, true);
            curl_close ($ch);
            if($server_response && isset($server_response['error'])){
                if($server_response['error'] == 'invalid_grant'){
                    // Invalid keys, request new keys
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL,$Client->getUrl() . '/oauth/v2/token');
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials&client_id=' . $Client->getApiToken() . '&client_secret=' . $Client->getApiSecret());
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                    $server_response_raw = curl_exec ($ch);
                    $server_response = json_decode(curl_exec ($ch), true);

                    $Client->setApiKey($server_response['access_token']);
                    $em->persist($Client);
                    $em->flush();

                    curl_close ($ch);
                }
            }



            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$Client->getUrl() . '/api/selfupdate');
            $headers = array('Authorization:Bearer ' . $Client->getApiKey());
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'version=' . $_POST['version'] . '&domain=' . urlencode($domain) . '&email=' . (!empty($_POST['email']) ? $_POST['email'] : $Settings->getAdminEmail()));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            $server_response_raw = curl_exec ($ch);
            $server_response = json_decode($server_response_raw, true);
            curl_close ($ch);

            if(isset($server_response['success']) && (boolean)$server_response['success'] == true){
                die('<div class="green-text center-align">Update verzoek ingedient.<br/>De update wordt binnen 5 minuut uitgevoerd.</div>');
            }else{
                die('<div class="red-text center-align">Ongeldige reactie van client:<br/><br/>' . $server_response_raw . '</div>');
            }
        }

        $version_list = file_get_contents('https://gitlab.com/api/v4/projects/4636464/repository/tags?private_token=' . self::GITLAB_KEY);
        $version_list = json_decode($version_list, true);

        return $this->attributes(array(
            'Client' => $Client,
            'Settings' => $Settings,
            'version_list' => $version_list
        ));
    }

    /**
     * @Route("/admin/commandcontrol/view/{domain}", name="admin_cc_view")
     * @Template()
     */
    public function viewAction(Request $request, $domain){
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans('Command & Control', [], 'cms'), 'admin_cc');
        $this->breadcrumbs->addRouteItem($domain, 'admin_cc');

        $em = $this->getDoctrine()->getManager();
        $Client = $em->getRepository('CmsBundle:Clientdomain')->findOneByDomain($domain);

		if (!empty($request->request->get('tagssubmit'))) {
			foreach($Client->getTags() as $Tag){
	            $Client->removeTag($Tag);
	        }
			if (!empty($request->request->get('tags'))) {
		        foreach($Client->getTags() as $Tag){
		            $Client->removeTag($Tag);
		        }
		        foreach($_POST['tags'] as $t){
		            if(is_numeric($t)){
		                $Tag = $em->getRepository('CmsBundle:Tag')->find($t);
		            }else{
		                $Tag = $em->getRepository('CmsBundle:Tag')->findOneByLabel($t);
		                if(empty($Tag)){
		                    $Tag = new \App\CmsBundle\Entity\Tag();
		                    $Tag->setLabel($t);

		                    $em->persist($Tag);
		                }
		            }

		            $Client->addTag($Tag);
	            }
            }
        
            $em->persist($Client);

            $em->flush();

            return $this->redirect($this->generateUrl('admin_cc_view', ['domain' => $domain]));
        }

        $tags = $em->getRepository('CmsBundle:Tag')->findAll();

        return $this->attributes(array(
            'tags' => $tags,
            'Client' => $Client
        ));
    }

    /**
     * @Route("/admin/commandcontrol/refresh/{domain}", name="admin_cc_refresh")
     * @Template()
     */
    public function refreshAction(Request $request, $domain){
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans('Command & Control', [], 'cms'), 'admin_cc');
        $this->breadcrumbs->addRouteItem($domain, 'admin_cc');
//        $this->breadcrumbs->addRouteItem('admin_cc');

        $em = $this->getDoctrine()->getManager();
        $Client = $em->getRepository('CmsBundle:Clientdomain')->findOneByDomain($domain);

        return $this->attributes(array(
            'Client' => $Client
        ));
    }

    /**
     * @Route("/admin/commandcontrol/bundles/{domain}", name="admin_cc_bundles")
     * @Template()
     */
    public function bundlesAction(Request $request, $domain){
        parent::init($request);

        $em = $this->getDoctrine()->getManager();
        $Settings = $em->getRepository('CmsBundle:Settings')->findOneBy([], ['id' => 'asc']);
        $Client = $em->getRepository('CmsBundle:Clientdomain')->findOneByDomain($domain);

        if($request->get('action') == 'install'){

            if ($request->get('bundle') && $request->get('tag')) {



                // Validate
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$Client->getUrl() . '/api/ping');
                $headers = array('Authorization:Bearer ' . $Client->getApiKey());
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                $server_response_raw = curl_exec ($ch);
                $server_response = json_decode($server_response_raw, true);
                curl_close ($ch);
                if($server_response && isset($server_response['error'])){
                    if($server_response['error'] == 'invalid_grant'){
                        // Invalid keys, request new keys
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL,$Client->getUrl() . '/oauth/v2/token');
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials&client_id=' . $Client->getApiToken() . '&client_secret=' . $Client->getApiSecret());
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                        $server_response_raw = curl_exec ($ch);
                        $server_response = json_decode(curl_exec ($ch), true);

                        $Client->setApiKey($server_response['access_token']);
                        $em->persist($Client);
                        $em->flush();

                        curl_close ($ch);
                    }
                }

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$Client->getUrl() . '/api/bundleinstaller');
                $headers = array('Authorization:Bearer ' . $Client->getApiKey());
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, 'bundle=' . urlencode($request->get('bundle')) . '&version=' . urlencode($request->get('tag')) . '&domain=' . urlencode($domain) . '&email=' . urlencode((!empty($_POST['email']) ? $_POST['email'] : $Settings->getAdminEmail())));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                $server_response_raw = curl_exec ($ch);
                $server_response = json_decode($server_response_raw, true);
                curl_close ($ch);

                if(isset($server_response['success']) && (boolean)$server_response['success'] == true){
                    die('<div class="green-text center-align">Update verzoek ingedient.<br/>De update wordt binnen 5 minuut uitgevoerd.</div>');
                }else{
                    die('<div class="red-text center-align">Ongeldige reactie van client:<br/><br/>' . $server_response_raw . '</div>');
                }
            }

            $bundles = [];
            $bundlesFile = __DIR__ . '/../../../bundles.cache';
            if(file_exists($bundlesFile)){
                $bundles = json_decode(file_get_contents($bundlesFile), true);
            }

            return $this->attributes(array(
                'Client' => $Client,
                'bundles' => $bundles,
                'domain' => $domain,
            ));
        }else{
            return $this->attributes(array(
                'Client' => $Client,
                'domain' => $domain,
            ));
        }
    }

    /**
     * @Route("/admin/commandcontrol/ping/{domain}", name="admin_cc_ping")
     * @Template()
     */
    public function pingAction(Request $request, $domain){
        parent::init($request);

        $time = time();

        $em = $this->getDoctrine()->getManager();
        $Client = $em->getRepository('CmsBundle:Clientdomain')->findOneByDomain($domain);

        // Get access token
        if((string)$Client->getApiKey() == ''){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$Client->getUrl() . '/oauth/v2/token');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials&client_id=' . $Client->getApiToken() . '&client_secret=' . $Client->getApiSecret());
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            $server_response_raw = curl_exec ($ch);
            $server_response = json_decode(curl_exec ($ch), true);

            $Client->setApiKey($server_response['access_token']);
            $em->persist($Client);
            $em->flush();

            curl_close ($ch);
        }else{

                // Validate
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$Client->getUrl() . '/api/ping');
                $headers = array('Authorization:Bearer ' . $Client->getApiKey());
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                $server_response_raw = curl_exec ($ch);
                $server_response = json_decode($server_response_raw, true);
                curl_close ($ch);
                if($server_response && isset($server_response['error'])){
                    if($server_response['error'] == 'invalid_grant'){
                        // Invalid keys, request new keys
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL,$Client->getUrl() . '/oauth/v2/token');
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials&client_id=' . $Client->getApiToken() . '&client_secret=' . $Client->getApiSecret());
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                        $server_response_raw = curl_exec ($ch);
                        $server_response = json_decode(curl_exec ($ch), true);

                        $Client->setApiKey($server_response['access_token']);
                        $em->persist($Client);
                        $em->flush();

                        curl_close ($ch);
                    }
                }
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$Client->getUrl() . '/api/ping');
        $headers = array('Authorization:Bearer ' . $Client->getApiKey());
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $server_response_raw = curl_exec ($ch);
        $server_response = json_decode($server_response_raw, true);
        curl_close ($ch);

        $diff = (time() - $time);

        if(isset($server_response['success']) && (boolean)$server_response['success'] == true){
            die('<div class="green-text center-align">Succesvolle reactie van client na ' . $diff . ' seconden.</div>');
        }else{
            die('<div class="red-text center-align">Ongeldige reactie van client:<br/><br/>' . $server_response_raw . '<p>' . 'Authorization:Bearer ' . $Client->getApiKey() . '</p></div>');
        }
    }
}
