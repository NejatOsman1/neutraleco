<?php
namespace App\CmsBundle\Command;

// Injection
use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\Output;

class ReportCommand extends Command
{
    private $output;
    private $Container;

    public function __construct(ContainerInterface $Container){
        $this->Container = $Container;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('trinity:report')
            ->setDescription('Report trinity statistics to server')
            ->addArgument('domain', InputArgument::REQUIRED, 'Domain to notify about.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
		$domain = $input->getArgument('domain');

		$em = $this->Container->get('doctrine.orm.entity_manager');
        $Settings = $em->getRepository('CmsBundle:Settings')->findOneBy([], ['id' => 'asc']);

        $target = $this->Container->getParameter('trinity_cc_server') . '/';
        $target_clean = preg_replace('/^http(s)?:\/\//', '', $target);

        $authKey = $Settings->getCcAuthKey();

        $versionFile = $this->Container->get('kernel')->getProjectDir() . '/src/CmsBundle/VERSION';
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

        $bundleList = [];
        $bundleDir = $this->Container->get('kernel')->getProjectDir() . '/src/Trinity/';
        foreach(scandir($bundleDir) as $d){
            $path = $bundleDir . $d;
            if(is_dir($path) && !in_array($d, ['.', '..'])){

                $version = '';
                if(file_exists($path . '/VERSION')){
                    $versionEntries = file($path . '/VERSION');

                    $version = [
                        'version'        => trim($versionEntries[0]),
                        'git_hash'       => trim($versionEntries[1]),
                        'git_hash_long'  => trim($versionEntries[2]),
                        'date'           => trim($versionEntries[3]),
                    ];
                }

                $bundleList[$d] = [
                    'path' => $path,
                    'version' => $version,
                ];
            }
        }

        // $User = $this->security->getToken()->getUser();

        // if($User && $request->getHost() != $target_clean){
            $client_data = [
                'domain'     => $domain,
                'uri'        => '/',
                'hostname'   => '',
                'serverip'   => '',
                'datetime'   => date('Y-m-d H:i:s'),
                'version'    => $this->version,
                'username'   => 'cron',
                'userip'     => '',
                'bundleList' => $bundleList,
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

            // if($authKey == null){
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

                        $em->persist($Settings);
                        $em->flush();
                    }else{
                        // return new JsonResponse(['success' => false, 'message' => $server_response['error_description']]);
                    }
                }else{
                    // return new JsonResponse(['success' => false, 'message' => 'Invalid endpoint: ' . $target]);
                }
            // }

            if($Settings->getCcAuthKey()){







                $encrypt_method = "AES-256-CBC";
                $secret_key = '0XBD7DsyTqGQJJ';
                $secret_iv = 'sDRFpXBBy3q5rc';

                // hash
                $key = hash('sha256', $secret_key);
                // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
                $iv = substr(hash('sha256', $secret_iv), 0, 16);


                $TRC_client = $em->getRepository('TrinityApiBundle:Client')->findOneByLabel('TRC');
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

                    $em->persist($TRC_client);
                    $em->flush();
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

        // }

        return Command::SUCCESS;
    }
}