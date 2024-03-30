<?php
namespace App\CmsBundle\Command;

// Injection

use App\CmsBundle\Util\Mailer;
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

class UpdateCommand extends Command
{
    private $output;

    const PROJECT = 'trinity';
    const NAMESPACE = 'qinox';
    const DESTINATION = 'CmsBundle';

    public $sha = null;
    private $Container;
    private $Mailer;

    public function __construct(ContainerInterface $Container, Mailer $Mailer){
        $this->Container = $Container;
        $this->Mailer = $Mailer;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('trinity:update')
            ->setDescription('Update trinity')
            ->addArgument('tag', InputArgument::REQUIRED, 'Version to install.')
            ->addArgument('notify', InputArgument::OPTIONAL, 'Emailaddress to notify.')
            ->addArgument('domain', InputArgument::OPTIONAL, 'Domain to notify about.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $tag = $input->getArgument('tag');
        $notify = $input->getArgument('notify');
        $domain = $input->getArgument('domain');

        if($notify){
            $this->Mailer->setSubject('Update voltooid!')
                    ->setTwigBody('emails/notify.html.twig', [
                        'label' => '',
                        'message' => 'Het domein \'<strong>' . $domain . '\'</strong> is succesvol geupdated met Trinity versie <strong>' . $tag . '</strong>'
                    ])
                    ->setPlainBody('Het domein \'' . $domain . '\' is succesvol geupdated met Trinity versie ' . $tag . '')
                    ->setTo([$notify => $notify]);
        }


        $cacheDir = $this->Container->get('kernel')->getProjectDir() . '/var/cache/';
        $targetDir = __DIR__ . '/../../' . self::DESTINATION . '/';

        $zipFilename = self::PROJECT . '_' . $tag . '.zip';
        $zipFile = $cacheDir . 'dev/' . $zipFilename;

        $output->writeln('Requesting update...');

        $updateurl = $this->requestUpdate(self::NAMESPACE, self::PROJECT, $tag);

        $output->writeln('SHA: <info>' . $this->sha . '</info>');
        $output->writeln('URL: <info>' . $updateurl . '</info>');

        $unpack_folder = $cacheDir . 'dev/' . self::PROJECT . '-' . $this->sha . '-' . $this->sha;

        if($updateurl){
            $output->writeln('Updating ' . ucfirst(self::PROJECT) . ' to version <info>' . $tag . '</info>...');
            $output->writeln('');

            $output->writeln('Downloading ZIP file to <info>var/cache/dev/' . $zipFilename . '</info> ...');
            
            file_put_contents($zipFile, fopen($updateurl, 'r'));

            $output->writeln('Extracting ...');
            $zip = new \ZipArchive;
            $res = $zip->open($zipFile);
            if ($res === TRUE) {
                $zip->extractTo($cacheDir .'dev/');
                $output->writeln('Done extracting, searching source directory ...');
                $zip->close();

                $srcDir = $unpack_folder . '/';

                if($srcDir){
                    $output->writeln('Found, folder located, now moving files ...');

                    // Moving files from extracted files
                    if (is_writable($targetDir)) {
                        $this->syncFolder($output, $srcDir, $targetDir);

                        $cacheFile = str_replace('src/CmsBundle/Command', 'public/uploads/update_cache', __DIR__);
                        file_put_contents($cacheFile, '');
                    } else {
                        $output->writeln('<error>FAILED: Could not write to destination folder...</error>');
                    }
                }else{
                    $output->writeln('<error>FAILED: Could not find the folder where the bundle was extracted...</error>');
                }
            }else{
                $output->writeln('<error>FAILED: Unable to unzip...</error>');
            }

            $cleanCacheFile = $cacheDir . 'CLEANME';
            file_put_contents($cleanCacheFile, 'y');

            if($notify){
                $send = $this->Mailer->execute();

                if($send){
                    $output->writeln('Notification send to ' . $notify);
                }else{
                    $output->writeln('Notification could not be send');
                }
            }

            $output->writeln('');
            $output->writeln('Update done');
        }

        return Command::SUCCESS;
    }

    private function requestUpdate($namespace, $project, $tag){
        $target = $this->containerInterface->getParameter('trinity_cc_server') . '/';
        $target_clean = preg_replace('/^http(s)?:\/\//', '', $target);

        $em = $this->Container->get('doctrine.orm.entity_manager');
        $Settings = $em->getRepository('CmsBundle:Settings')->findOneBy([]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$target . 'api/updateurl');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/x-www-form-urlencoded', 'Authorization:Bearer ' . $Settings->getCcAuthKey()]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // POST
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['namespace' => $namespace, 'project' => $project, 'tag' => $tag]));
        // POST

        $resp = curl_exec ($ch);
        curl_close ($ch);

        try {
            $server_response = json_decode($resp, true);
            if(!empty($server_response['url'])){
                if(!empty($server_response['sha'])){
                    $this->sha = $server_response['sha'];
                }
                return $target . $server_response['url'];
            }
        } catch (\Exception $e) {}

        return false;
    }

    private function syncFolder($output, $source, $target, $level = 0){
        $ignore = array('.', '..');
        $dh = @opendir( $source );
        while( false !== ( $file = readdir( $dh ) ) ){
            if( !in_array( $file, $ignore ) ){
                if( is_dir( "$source$file" ) ){
                    if( !file_exists( "$target$file" ) ){
                        mkdir("$target$file");
                    }

                    $this->syncFolder($output, $source.$file . '/', $target.$file . '/', ($level+1) );
                }else {
                    rename($source.$file, $target.$file);
                }
            }
        }
        closedir( $dh );
    }
}