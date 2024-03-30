<?php

namespace App\CmsBundle\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Nelmio\ApiDocBundle\Annotation\Operation;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;
use Nelmio\ApiDocBundle\Annotation\Security;
use Symfony\Component\Routing\Annotation\Route;

use \App\CmsBundle\Entity\Clientdomain;
use \App\CmsBundle\Entity\Clientrequest;
use \App\CmsBundle\Entity\Language;

class ApiController extends AbstractFOSRestController
{

    const GITLAB_KEY = 'KMxyG67dpkD8DqPztieR';
    const GITLAB_TRINITY_ID = '4636464';

    /**
     * Command and Control Authentication
     *
     * @Route("/api/authorize", methods={"POST"})
     * @OA\Response(
     *     response=200,
     *     description="Returned when successful"
     * )
     * @OA\Parameter(
     *     name="api_token",
     *     in="query",
     *     description="API token",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="api_secret",
     *     in="query",
     *     description="API secret",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="domain",
     *     in="query",
     *     description="Domain name",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="version",
     *     in="query",
     *     description="Easify version",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="symfony_version",
     *     in="query",
     *     description="Symfony version",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="datetime",
     *     in="query",
     *     description="Datetime",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="title",
     *     in="query",
     *     description="Title",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="matomo_url",
     *     in="query",
     *     description="Matomo url",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="matomo_hash",
     *     in="query",
     *     description="Matomo hash",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="bundleList",
     *     in="query",
     *     description="Bundle list",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="uri",
     *     in="query",
     *     description="URI",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="hostname",
     *     in="query",
     *     description="Hostname",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="serverip",
     *     in="query",
     *     description="Server IP",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="username",
     *     in="query",
     *     description="Username",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="userip",
     *     in="query",
     *     description="User IP",
     *     @OA\Schema(type="string")
     * )
     * @OA\Tag(name="Command & Control")
     * @Security(name="Bearer")
     */
    public function postApiAuthorizeAction()
    {
        $em = $this->getDoctrine()->getManager();

        try{
            $encrypt_method = "AES-256-CBC";
            $secret_key = '0XBD7DsyTqGQJJ';
            $secret_iv = 'sDRFpXBBy3q5rc';

            // hash
            $key = hash('sha256', $secret_key);
            // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
            $iv = substr(hash('sha256', $secret_iv), 0, 16);

            $api_token = openssl_decrypt(base64_decode($_POST['api_token']), $encrypt_method, $key, 0, $iv);
            $api_secret = openssl_decrypt(base64_decode($_POST['api_secret']), $encrypt_method, $key, 0, $iv);

            $Clientdomain = $em->getRepository(Clientdomain::class)->findOneBy(['domain' => $_POST['domain']]);
            if(empty($Clientdomain)){
            $Clientdomain = new Clientdomain();
                $Clientdomain->setDomain($_POST['domain']);
                $Clientdomain->setUrl($this->findRealUrl($_POST['domain']));
            }

            $Clientdomain->setVersion($_POST['version']);
            $Clientdomain->setSymfonyVersion($_POST['symfony_version']);
            $Clientdomain->setApiToken($api_token);
            $Clientdomain->setLastDate($_POST['datetime']);
            $Clientdomain->setApiSecret($api_secret);
            if(isset($_POST['title'])){
                $Clientdomain->setTitle($_POST['title']);
            }
            if(isset($_POST['matomo_url'])){
                $Clientdomain->setMatomoUrl($_POST['matomo_url']);
            }
            if(isset($_POST['matomo_hash'])){
                $Clientdomain->setMatomoHash($_POST['matomo_hash']);
            }
            $Clientdomain->setBundles($_POST['bundleList']);
            $em->persist($Clientdomain);

        $Clientrequest = new Clientrequest();
            $Clientrequest->setDomain($Clientdomain);
            $Clientrequest->setUri($_POST['uri']);
            $Clientrequest->setHostname($_POST['hostname']);
            $Clientrequest->setServerip($_POST['serverip']);
            $Clientrequest->setDatetime($_POST['datetime']);
            $Clientrequest->setVersion($_POST['version']);
            $Clientrequest->setUsername($_POST['username']);
            $Clientrequest->setUserip($_POST['userip']);

            $em->persist($Clientrequest);

            $settings = $em->getRepository('CmsBundle:Settings')->findAll();
            foreach($settings as $SettingsObj){
                $SettingsObj->setCcEnabled(true);
                $em->persist($SettingsObj);
            }

            $em->flush();

            $view = $this->view(['success' => true]);
        }catch(\Exception $e){
            $view = $this->view(['success' => false, 'domain' => (!empty($_POST['domain']) ? $_POST['domain'] : 'NO_DOMAIN'), 'error' => $e->getMessage()]);
        }
        return $this->handleView($view);
    }

    private function findRealUrl($base_url, $iterator = 0){
        if(!preg_match('/http/', $base_url)){
            $url = 'http://' . $base_url;
        }else{
            $url = $base_url;
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64; rv:21.0) Gecko/20100101 Firefox/21.0"); // Necessary. The server checks for a valid User-Agent.
        curl_exec($ch);

        $response = curl_exec($ch);
        preg_match('/^Location:(.*)$/mi', $response, $matches);
        curl_close($ch);

        if(!empty($matches[1])){
            $tmp_url = trim($matches[1]);
            $tmp_url = rtrim($tmp_url, '/');

            if($tmp_url == $url){
                // URL's are identical, assume it has an HTTPS equivalent
                return str_replace('http:', 'https:', $url);
            }

            if(strpos($tmp_url, preg_replace('/(https?:\/\/)/', '', $base_url)) !== false){
                if(preg_match('/https/', $tmp_url)){
                    return $tmp_url;
                }
                return $this->findRealUrl($tmp_url, ($iterator + 1));
            }else{
            }
        }

        return $url;
    }

    /**
     * Get bundle list
     *
     * @Route("/api/bundles", methods={"GET"})
     * @OA\Response(
     *     response=200,
     *     description="Returned when successful"
     * )
     * @OA\Tag(name="Command & Control")
     * @Security(name="Bearer")
     */
    public function getApiBundlesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rootDir = str_replace('src/CmsBundle/Controller', '', __DIR__);
        $bundle_info = [];
        if(file_exists($rootDir . 'bundles.cache')){
            $bundle_info = json_decode(file_get_contents($rootDir . 'bundles.cache'), true);

            $data = [
                'success' => true,
                'updated' => $bundle_info['updated']['date'],
                'bundles' => $bundle_info['bundles'],
            ];
        }else{
            $data = [
                'success' => true,
                'updated' => null,
                'bundles' => [],
            ];
        }

        $view = $this->view($data);
        return $this->handleView($view);
    }

    /**
     * Get update URL
     *
     * @Route("/api/updateurl", methods={"POST"})
     * @OA\Response(
     *     response=200,
     *     description="Returned when successful"
     * )
     * @OA\Parameter(
     *     name="tag",
     *     in="query",
     *     description="Git tag number",
     *     @OA\Schema(type="string")
     * )
     * @OA\Tag(name="Command & Control")
     * @Security(name="Bearer")
     */
    public function postApiUpdateurlAction()
    {
        // $zipFile = rand(100000,999999) . date('YmdHis') . '.zip';
        $tmpDir = str_replace('src/CmsBundle/Controller', 'public/update/', __DIR__);
        if(!file_exists($tmpDir)){
            mkdir($tmpDir);
        }
        // $gitlabUrl = 'https://gitlab.com/' . $_POST['namespace'] . '/' . $_POST['project'] . '/repository/' . $_POST['tag'] . '/archive.zip?private_token=' . self::GITLAB_KEY;
        // $gitlabUrl = 'https://gitlab.com/api/v4/projects/' . self::GITLAB_TRINITY_ID . '/repository/archive.zip?private_token=' . self::GITLAB_KEY;

        // Request desired SHA in gitlab
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,'https://gitlab.com/api/v4/projects/' . self::GITLAB_TRINITY_ID . '/repository/tags/' . $_POST['tag'] . '?private_token=' . self::GITLAB_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resp = json_decode(curl_exec ($ch));
        curl_close ($ch);

        $sha = null;
        if(!empty($resp->commit->id)){
            $sha = $resp->commit->id;
        }

        $zipFile = $sha . '.zip';




        if(!file_exists($zipFile)){
            $gitlabUrl = 'https://gitlab.com/api/v4/projects/' . self::GITLAB_TRINITY_ID . '/repository/archive.zip?private_token=' . self::GITLAB_KEY . '&sha=' . $sha;
            file_put_contents($tmpDir . $zipFile, fopen($gitlabUrl, 'r'));
        }

        /*$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,'https://gitlab.com/api/v4/projects?private_token=' . self::GITLAB_KEY . '&visibility=private&order_by=name');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec ($ch);
        curl_close ($ch);
        die( "<pre>" . print_r( $resp, 1 ) . "</pre>" );

        die( "<pre>" . print_r( $gitlabUrl, 1 ) . "</pre>" );*/

        $view = $this->view(['url' => '/update/' . $zipFile, 'sha' => $sha]);
        return $this->handleView($view);
    }

    /**
     * Get info details
     *
     * @Route("/api/info", methods={"GET"})
     * @OA\Response(
     *     response=200,
     *     description="Returned when successful"
     * )
     * @OA\Tag(name="Command & Control")
     * @Security(name="Bearer")
     */
    public function getApiInfoAction()
    {
        $em = $this->getDoctrine()->getManager();

        $Language = $em->getRepository(Language::class)->findOneBy(['locale' => 'nl']);
        $Settings = $Language->getSettings();


        $view = $this->view([
            'success' => true,
            'langid' => $Language->getId(),
            'locale' => $Language->getLocale(),
            'label' => $Settings->getLabel(),
            'tagline' => $Settings->getTagline(),
        ]);
        return $this->handleView($view);
    }

    /**
     * Get dashboard data
     *
     * @Route("/api/dashboard", methods={"GET"})
     * @OA\Response(
     *     response=200,
     *     description="Returned when successful"
     * )
     * @OA\Tag(name="Analytics")
     * @Security(name="Bearer")
     */
    public function getApiDashboardAction()
    {
        $em = $this->getDoctrine()->getManager();

        $Language = $em->getRepository(Language::class)->findOneBy(['locale' => 'nl']);
        $Settings = $Language->getSettings();



        $dashboard_stats = [];
        if(!empty($Settings->getPiwikUrl()) && !empty($Settings->getPiwikApiHash())){

            $Stats = new \App\CmsBundle\Classes\Matomo($Settings->getPiwikUrl(), $Settings->getPiwikApiHash(), $Settings->getPiwikSiteId(), $Language->getLocale());

            $start = date('Y-m-d', strtotime('-1 WEEK'));
            $end = date('Y-m-d');

            if(!empty($_GET['s']) && !empty($_GET['e'])){
                $start = $_GET['s'];
                $end = $_GET['e'];
            }

            $Stats->setRange($start, $end);

            $dashboard_stats['live'] = $Stats->getLive();
            $dashboard_stats['visitors'] = $Stats->getVisitors();
            $dashboard_stats['countries'] = $Stats->getCountries();
            $dashboard_stats['resolutions'] = $Stats->getResolutions();
            $dashboard_stats['referrers'] = $Stats->getReferrers();
            $dashboard_stats['moments'] = $Stats->getPopularMoments();
            $dashboard_stats['isp'] = $Stats->getISPs();
        }






        $view = $this->view([
            'success' => true,
            'langid' => $Language->getId(),
            'locale' => $Language->getLocale(),
            'label' => $Settings->getLabel(),
            'tagline' => $Settings->getTagline(),
            'dashboard_stats' => $dashboard_stats
        ]);
        return $this->handleView($view);
    }

    /**
     * Self update
     *
     * @Route("/api/selfupdate", methods={"POST"})
     * @OA\Response(
     *     response=200,
     *     description="Returned when successful"
     * )
     * @OA\Parameter(
     *     name="bundle",
     *     in="query",
     *     description="Bundle identifier",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="version",
     *     in="query",
     *     description="Bundle version",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="domain",
     *     in="query",
     *     description="Related domain",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="email",
     *     in="query",
     *     description="Notification emailaddress",
     *     @OA\Schema(type="string")
     * )
     * @OA\Tag(name="Command & Control")
     * @Security(name="Bearer")
     */
    public function postApiSelfupdateAction()
    {
        $em = $this->getDoctrine()->getManager();

        $Crontask = new \App\CmsBundle\Entity\CronTask();
        $Crontask->setName('C&C - Auto update - versie ' . $_POST['version']);
        $Crontask->setCommands(
            [
                'trinity:update ' . $_POST['version'] . (!empty($_POST['email']) ? ' ' . $_POST['email'] . (!empty($_POST['domain']) ? ' ' . $_POST['domain'] : '') : ''),
                'trinity:report ' . $_POST['domain'],
            ]
        );
        $Crontask->setMinutes('*');
        $Crontask->setHours('*');
        $Crontask->setDays('*');
        $Crontask->setMonths('*');
        $Crontask->setStatusTask(true);
        $Crontask->setLastRun(new \DateTime());
        $Crontask->setDeleteAfterRun(true);

        $em->persist($Crontask);
/*
        $Crontask = new \App\CmsBundle\Entity\CronTask();
        $Crontask->setName('C&C - Database update voor: Auto update - versie ' . $_POST['version']);
        $Crontask->setCommands( [
            'doctrine:schema:update --force',
            'cache:clear --env=prod'
        ] );
        $Crontask->setMinutes('*');
        $Crontask->setHours('*');
        $Crontask->setDays('*');
        $Crontask->setMonths('*');
        $Crontask->setStatusTask(true);
        $Crontask->setLastRun(new \DateTime());
        $Crontask->setDeleteAfterRun(true);

        $em->persist($Crontask);
*/
        $em->flush();

        $data = [
            'id' => $Crontask->getId(),
            'success' => true,
        ];
        $view = $this->view($data);
        return $this->handleView($view);
    }

    /**
     * Install/update bundle
     *
     * @Route("/api/bundleinstaller", methods={"POST"})
     * @OA\Response(
     *     response=200,
     *     description="Returned when successful"
     * )
     * @OA\Parameter(
     *     name="bundle",
     *     in="query",
     *     description="Bundle identifier",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="version",
     *     in="query",
     *     description="Bundle version",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="domain",
     *     in="query",
     *     description="Related domain",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="email",
     *     in="query",
     *     description="Notification emailaddress",
     *     @OA\Schema(type="string")
     * )
     * @OA\Tag(name="Command & Control")
     * @Security(name="Bearer")
     */
    public function postApiBundleinstallerAction()
    {
        $em = $this->getDoctrine()->getManager();

        $Crontask = new \App\CmsBundle\Entity\CronTask();
        $Crontask->setName('C&C - Bundel ' . $_POST['bundle'] . ' - versie ' . $_POST['version']);
        $Crontask->setCommands(
            [
                'trinity:bundle:install ' . $_POST['bundle'] . ' ' . $_POST['version'] . (!empty($_POST['email']) ? ' ' . $_POST['email'] . (!empty($_POST['domain']) ? ' ' . $_POST['domain'] : '') : ''),
                'trinity:bundle:activate',
                'assets:install --symlink',
                'trinity:report ' . $_POST['domain'],
            ]
        );
        $Crontask->setMinutes('*');
        $Crontask->setHours('*');
        $Crontask->setDays('*');
        $Crontask->setMonths('*');
        $Crontask->setStatusTask(true);
        $Crontask->setLastRun(new \DateTime());
        $Crontask->setDeleteAfterRun(true);

        $em->persist($Crontask);
/*
        $Crontask = new \App\CmsBundle\Entity\CronTask();
        $Crontask->setName('C&C - Database update voor: bundel ' . $_POST['bundle'] . ' - versie ' . $_POST['version']);
        $Crontask->setCommands( [
            'doctrine:schema:update --force',
            'cache:clear --env=prod'
        ] );
        $Crontask->setMinutes('*');
        $Crontask->setHours('*');
        $Crontask->setDays('*');
        $Crontask->setMonths('*');
        $Crontask->setStatusTask(true);
        $Crontask->setLastRun(new \DateTime());
        $Crontask->setDeleteAfterRun(true);
*/
        $em->persist($Crontask);
        $em->flush();

        $data = [
            'id' => $Crontask->getId(),
            'success' => true,
        ];
        $view = $this->view($data);
        return $this->handleView($view);
    }

}
