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

class InstallBundleCommand extends Command
{
    private $output;

    const GITLAB_KEY = 'KMxyG67dpkD8DqPztieR';
    const NAMESPACE = 'trinity-bundles';
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
            ->setName('trinity:bundle:install')
            ->setDescription('Install plugin into Trintiy CMS')
            ->addArgument('package', InputArgument::REQUIRED, 'Package to install.')
            ->addArgument('tag', InputArgument::REQUIRED, 'Version to install.')
            ->addArgument('notify', InputArgument::OPTIONAL, 'Emailaddress to notify.')
            ->addArgument('domain', InputArgument::OPTIONAL, 'Domain to notify about.')
        ;
    }

    protected function getCurrentInstalled(){
        $output = new BufferedOutput();
        $command = $this->getApplication()->find('config:dump-reference');

        $arguments = array('command' => 'config:dump-reference');

        $greetInput = new ArrayInput($arguments);
        $returnCode = $command->run($greetInput, $output);

        return $output->fetch();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $package = $input->getArgument('package');
        $notify = $input->getArgument('notify');
        $domain = $input->getArgument('domain');
        $tag = $input->getArgument('tag');
        if(!preg_match('/Bundle/', $package)){
            $package = ucfirst($package) . 'Bundle';
        }

        $installed = $this->getCurrentInstalled();
        $updateAvailable = false;

        $em = $this->Container->get('doctrine.orm.entity_manager');
        $Settings = $em->getRepository('CmsBundle:Settings')->findOneBy([], ['id' => 'asc']);

        $cacheFile = __DIR__ . '/../../../bundles.cache';

        $target = $this->containerInterface->getParameter('trinity_cc_server');

        if($Settings->getCcAuthKey()){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$target . '/api/bundles');
            $headers = array(
                'Content-Type:application/x-www-form-urlencoded',
                'Authorization:Bearer ' . $Settings->getCcAuthKey()
            );
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_response_raw = curl_exec ($ch);
            $server_response = json_decode($server_response_raw, true);
            if($server_response){
                $data = [
                    'updated' => new \DateTime($server_response['updated']),
                    'bundles' => $server_response['bundles'],
                ];
                file_put_contents($cacheFile, json_encode($data));
            }
            curl_close ($ch);
        }

        if(file_exists($cacheFile) && strpos($installed, $package)){
            $data = file_get_contents($cacheFile);
            $dump = json_decode($data, true);
            if(array_key_exists($package, $dump['bundles'])){
                $bundleDump = $dump['bundles'][$package];

                $version = 'repo';
                $bundleDir = __DIR__ . '/../../Trinity/' . $package . '/';
                if(file_exists($bundleDir . 'VERSION')){
                    $vdata = file($bundleDir . 'VERSION');
                    $version = trim($vdata[0]);
                }

                if($bundleDump['tag'] != $version){
                    $updateAvailable = true;
                }
            }
        }

        // if(!strpos($installed, $package) || $updateAvailable){
            if($package == 'ListBundle'){

                $cacheFile = __DIR__ . '/../../../bundles.cache';
                if(file_exists($cacheFile)){
                    $data = file_get_contents($cacheFile);

                    $output->writeln('');

                    $dump = json_decode($data, true);
                    $date = new \DateTime($dump['updated']['date']);

                    $output->writeln('List has been renewed on: <info>' . $date->format('d-m-Y H:i:s') . '</info>');
                    $output->writeln('');

                    $output->writeln(str_pad('Package', 25, ' ') . '' . str_pad('Available', 13, ' ') . ' <info>Installed</info>');
                    $output->writeln(str_pad('-', 48, '-'));

                    // dump($dump);

                    foreach($dump['bundles'] as $name => $res){
                        if(strpos($installed, $name)){

                            $version = 'repo';
                            $bundleDir = __DIR__ . '/../../Trinity/' . $name . '/';
                            if(file_exists($bundleDir . 'VERSION')){
                                $vdata = file($bundleDir . 'VERSION');
                                $version = trim($vdata[0]);
                            }

                            $output->writeln(str_pad($name, 25, ' ') . '' . str_pad($res['tag'], 13, ' ') . ' <info>' . $version . ($version != 'xxxrepo' ? ($res['tag'] == $version ? '' : ' - UPDATE AVAILABLE!') : '') . '</info>');
                        }else{
                            $output->writeln(str_pad($name, 25, ' ') . '' . str_pad($res['tag'], 13, ' ') . '');
                        }
                    }

                    $output->writeln('');
                }

                /*$repoUrl = 'https://gitlab.com/api/v4/groups/2170826/projects?private_token=LXuhvfs7kUXZzhLt1dyH';
                $cacheFile = __DIR__ . '/../../../packages.cache';

                if(file_exists($cacheFile)){
                    $output->writeln('Retrieving list from cache ...');
                    $json = file_get_contents($cacheFile);
                }else{
                    $output->writeln('Retrieving list from server ...');
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $repoUrl);
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1) ;
                    $json = curl_exec($ch);
                    file_put_contents($cacheFile, $json);
                    curl_close($ch);
                }

                $results = json_decode($json, 1);
                $output->writeln('');
                foreach($results as $res){

                    if(strpos($installed, $res['name'])){
                        $output->writeln($res['name'] . ' <info>[INSTALLED]</info>');
                    }else{
                        $output->writeln($res['name']);
                    }

                }
                $output->writeln('');*/
            }else{

                $cacheFile = __DIR__ . '/../../../bundles.cache';
                if(file_exists($cacheFile)){
                    $data = file_get_contents($cacheFile);
                    $dump = json_decode($data, true);

                    if(array_key_exists($package, $dump['bundles'])){




                        $bundleDump = $dump['bundles'][$package];


                        if($input->getArgument('tag')){
                            // Specified version
                            $tag = $input->getArgument('tag');
                        }else{
                            // Latest version
                            $tag = $bundleDump['tag'];
                        }







                        $cacheDir = $this->Container->get('kernel')->getProjectDir() . '/var/cache/dev/';
                        $targetDir = __DIR__ . '/../../Trinity/' . $package . '/';
                        $targetDirBase = __DIR__ . '/../../Trinity/';

                        $zipFilename = $package . '_' . $tag . '.zip';
                        $zipFile = $cacheDir . $zipFilename;

                        $output->writeln('Installing <info>' . ucfirst($package) . '</info>, version <info>' . $tag . '</info>');
                        $output->writeln('');

                        // Lookup bundle Id
                        $bundleId = null;
                        $trinitybundles = file_get_contents('https://gitlab.com/api/v4/groups/trinity-bundles?private_token=' . self::GITLAB_KEY);
                        $trinitybundles = json_decode($trinitybundles, true);

                        foreach($trinitybundles['projects'] as $project) {
                            if ($project['name'] == $package) {
                                $bundleId = $project['id'];
                            }
                        }

                        if (empty($bundleId)) {
                            $output->writeln('Can\'t find bundle Id for requested bundle: ' . $package . '. Bailing out');
                            exit;
                        }

                        if(!file_exists($zipFile)){
                            $output->writeln('Downloading ZIP file to <info>var/cache/dev/' . $zipFilename . '</info> ...');
                             file_put_contents($zipFile, fopen('https://gitlab.com/api/v4/projects/' . $bundleId . '/repository/archive.zip?private_token=' . self::GITLAB_KEY . '&sha=' . $tag, 'r'));
                        }else{
                            $output->writeln('Using existing ZIP file from <info>var/cache/dev/' . $zipFilename . '</info> ...');
                        }

                        $output->writeln('Extracting ...');
                        $zip = new \ZipArchive;
                        $res = $zip->open($zipFile);
                        if ($res === TRUE) {
                            if(!file_exists($targetDir)){
                                $output->writeln('Target directory doesn\'t exist yet.');

                                $zip->extractTo($targetDirBase);
                                $output->writeln('Done extracting, searching source directory ...');
                                $zip->close();

                                $srcDir = null;
                                foreach(scandir($targetDirBase) as $d){
                                    if(preg_match('/^' . $package . '-' . $tag . '/', $d)){
                                        $srcDir = $targetDirBase . $d . '/';
                                        break;
                                    }
                                }

                                if($srcDir){
                                    $output->writeln('Found, folder located, now renaming folder ...' . "\t" . $srcDir);

                                    // Moving files from extracted files
                                    if (rename($srcDir, $targetDir)) {
                                        $output->writeln('<info>Successfully renamed folder!</info>');
                                    } else {
                                        $output->writeln('<error>FAILED: Could not rename folder...</error>');
                                        unlink($srcDir);
                                    }
                                }
                            }else{
                                $zip->extractTo($cacheDir);
                                $output->writeln('Done extracting, searching source directory ...');
                                $zip->close();

                                $srcDir = null;
                                foreach(scandir($cacheDir) as $d){
                                    if(preg_match('/^' . $package . '-' . $tag . '/', $d)){
                                        $srcDir = $cacheDir . $d . '/';
                                        break;
                                    }
                                }

                                if($srcDir){
                                    $output->writeln('Found, folder located, now moving files ...');

                                    // Moving files from extracted files
                                    if (is_writable($targetDir)) {
                                        $this->syncFolder($output, $srcDir, $targetDir);
                                    } else {
                                        $output->writeln('<error>FAILED: Could not write to destination folder...</error>');
                                    }
                                }else{
                                    $output->writeln('<error>FAILED: Could not find the folder where the bundle was extracted...</error>');
                                }
                            }
                        }else{
                            $output->writeln('<error>FAILED: Unable to unzip...</error>');
                        }


































                        if($notify){
                            $this->Mailer->setSubject('Bundle installatie voltooid!')
                                    ->setTwigBody('emails/notify.html.twig', [
                                        'label' => '',
                                        'message' => 'Op het domein \'<strong>' . $domain . '\'</strong> is de Trinity bundle <strong>' . $package . '</strong> geïnstalleerd met versie <strong>' . $tag . '</strong>'
                                    ])
                                    ->setPlainBody('Op het domein \'<strong>' . $domain . '\'</strong> is de Trinity bundle <strong>' . $package . '</strong> geïnstalleerd met versie <strong>' . $tag . '</strong>')
                                    ->setTo([$notify => $notify]);

                            $status = $this->Mailer->execute_forced();
                        }






                        $cleanCacheFile = $cacheDir . 'CLEANME';
                        file_put_contents($cleanCacheFile, 'y');



                        $output->writeln('<info>Package \'' . $package . '\' installed successfully.</info>');
                    }else{
                        $output->writeln('<error>Package \'' . $package . '\' could not be found.</error>');
                    }
                }
                /*$output->writeln('<info>Searching for package \'' . $package . '\' ...</info>');

                $result = exec('git ls-remote git@gitlab.com:trinity-bundles/' . $package . '.git 2> /dev/null');

                if(preg_match('/master/', $result)){
                    $output->writeln('<info>Found package, installing ...</info>');

                    // Install bundle via git
                    exec('git submodule add git@gitlab.com:trinity-bundles/' . $package . '.git src/Trinity/' . $package, $result);
                    if(preg_match('/fatal/', implode('', $result))){
                        $output->writeln('<error>Package \'' . $package . '\' could not be downloaded.</error>');
                    }else{
                        exec('gsed -i "/CmsBundle/anew Trinity\\\\\\' . $package . '\\\\\\Trinity' . $package . '()," app/AppKernel.php');
                        exec('printf "\nqinox' . strtolower($package) . ':\n    resource: \"@Trinity' . $package . '/Controller/\"\n    type:     annotation\n    prefix:   /\n" >> app/config/routing.yml');
                        exec('php bin/console assets:install --symlink --relative');
                        exec('php bin/console doctrine:schema:update --force');

                        $output->writeln('<info>Package \'' . $package . '\' installed successfully.</info>');
                    }
                }else{
                    $output->writeln('<error>Package \'' . $package . '\' could not be found.</error>');
                }*/
            }
        /*}else{
            $output->writeln('');
            $output->writeln('<error>Package \'' . $package . '\' is already installed!</error>');
            $output->writeln('');
        }*/

        return Command::SUCCESS;
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

    private function runCommand($string)
    {
        // Split namespace and arguments
        $namespace = split(' ', $string)[0];

        // Set input
        $command = $this->getApplication()->find($namespace);
        $input = new StringInput($string);

        // Send all output to the console
        $returnCode = $command->run($input, $this->output);

        return $returnCode != 0;
    }
}
