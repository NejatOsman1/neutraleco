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

use Sensio\Bundle\GeneratorBundle\Manipulator\ConfigurationManipulator;
use Sensio\Bundle\GeneratorBundle\Manipulator\KernelManipulator;
use Sensio\Bundle\GeneratorBundle\Manipulator\RoutingManipulator;
use Sensio\Bundle\GeneratorBundle\Model\Bundle;

class CreateBundleCommand extends Command
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
            ->setName('trinity:bundle:create')
            ->setDescription('Create new Trinity bundle')
            ->addArgument('name', InputArgument::REQUIRED, 'Bundle name with a single word, e.g. \'forms\'.')
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

    public static function recurse_copy($src,$dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    self::recurse_copy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    public static function delTree($dir) {
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('');

        $name = $input->getArgument('name');
        $srcDir = $this->Container->get('kernel')->getProjectDir() . '/src/';
        $bundlesDir = $srcDir . 'Trinity/';
        $emptyBundleDir = $srcDir . 'CmsBundle/Storage/BundleSkeleton';
        $emptyBundleZip = $emptyBundleDir.'.zip';

        if(preg_match('/^[a-z]+$/', $name)) {
            $bundleName = ucfirst($name) . 'Bundle';

            if(file_exists($emptyBundleZip)){
                if(!file_exists($bundlesDir . $bundleName)){
                    $output->writeln('Creating new bundle:  <info>' . $bundleName . '</info>');
                    $output->writeln('');

                    $zip = new \ZipArchive;
                    if ($zip->open($emptyBundleZip) === TRUE) {
                        $zip->extractTo($bundlesDir . $bundleName);
                        $zip->close();
                    } else {
                        die('Could not open: ' . $emptyBundleZip);
                    }
                    // self::recurse_copy($emptyBundleDir, $bundlesDir . $bundleName);

                    if(file_exists($bundlesDir . $bundleName . '/.git')){
                        unlink($bundlesDir . $bundleName . '/.git');
                    }

                    $this->fixEmptuBundleFiles($bundlesDir . $bundleName . '/', $bundleName);

                    $this->install($output, $bundleName, $bundlesDir . $bundleName);
                    /*$output->writeln('- Activating bundle...');
                    $bundle = new Bundle(
                        'Trinity\\'.$bundleName,
                        'Trinity'.$bundleName,
                        $bundlesDir.$bundleName,
                        'annotation',
                        'no'
                    );

                    $Kernel = $this->Container->get('kernel');
                    $kernelManipulator = new KernelManipulator($Kernel);

                    $ret = $kernelManipulator->addBundle($bundle->getBundleClassName());

                    if (!$ret) {
                        $reflected = new \ReflectionObject($Kernel);
                        $output->writeln('<error>Failed.</error>');
                    }else{
                        $output->writeln('- Add configuration ...');
                        $targetConfigurationPath = $this->Container->get('kernel')->getProjectDir().'/app/config/config.yml';
                        $manipulator = new ConfigurationManipulator($targetConfigurationPath);
                        try {
                            $manipulator->addResource($bundle);
                            $output->writeln('- Add routes ...');
                            $targetRoutingPath = $this->Container->get('kernel')->getProjectDir().'/app/config/routing.yml';
                            $routing = new RoutingManipulator($targetRoutingPath);
                            try {
                                $ret = $routing->addResource($bundle->getName(), $bundle->getConfigurationFormat());
                                if (!$ret) {
                                    $output->writeln('<error>Failed.</error>');
                                }else{
                                    $output->writeln('- Updating database ...');
                                    $application = new \Symfony\Bundle\FrameworkBundle\Console\Application($Kernel);
                                    $application->setAutoExit(false);
                                    //Create de Schema
                                    $options = array('command' => 'doctrine:schema:update',"--force" => true);
                                    $application->run(new \Symfony\Component\Console\Input\ArrayInput($options));
                                }
                            } catch (\RuntimeException $e) {
                                dump($e->getMessage());die();
                            }
                        } catch (\RuntimeException $e) {
                            dump($e->getMessage());die();
                        }
                    }*/

                    $output->writeln('');
                    $output->writeln('Done, installed in folder: <info>' . $bundlesDir . $bundleName . '</info>');
                }else{
                    $output->writeln('<error>Requested bundle name \'' . $bundleName . '\' already exists.</error>');
                }
            }else{
                $output->writeln('<error>Empty bundle ZIP file does not exist, tried to search in:</error>');
                $output->writeln('<error>' . $emptyBundleZip . '</error>');
            }
        }else{
            $output->writeln('<error>Requested bundle name \'' . $name . '\' contains invalid characters.</error>');
            $output->writeln('<error>The bundle name need to be lowercase and not contain \'Bundle\'. Exmaple: \'webshop\' or \'blog\'.</error>');
        }

        $output->writeln('');

        return Command::SUCCESS;
    }

    private function install($output, $bundleName, $path){
        $output->writeln('- Activating bundle...');

        // Write to routes

        $section = "\n\ntrinity_" . strtolower($bundleName) . ":
    resource: \"@Trinity$bundleName/Controller/\"
    type:     annotation
    prefix:   /";
        $routesFile = $this->Container->get('kernel')->getProjectDir() . '/config/routes.yaml';
        $ct = file_get_contents($routesFile);
        $ct = $ct . $section;
        file_put_contents($routesFile, $ct);

        // Write to bundles file
        $bundlesFile = $this->Container->get('kernel')->getProjectDir() . '/config/bundles.php';
        $ct = file_get_contents($bundlesFile);
        $ct = str_replace('];', "    App\\Trinity\\$bundleName\\Trinity$bundleName::class => ['all' => true],\n];", $ct);
        file_put_contents($bundlesFile, $ct);

        // $this->clearCache($output);

        $Kernel = $this->Container->get('kernel');
        $output->writeln('- Updating database ...');
        $application = new \Symfony\Bundle\FrameworkBundle\Console\Application($Kernel);
        $application->setAutoExit(false);
        //Create de Schema
        $options = array('command' => 'doctrine:schema:update',"--force" => true);
        $application->run(new \Symfony\Component\Console\Input\ArrayInput($options));
    }

    // FIXMEEEEEE
    protected function fixEmptuBundleFiles($bundleDir, $bundleName){
        $simpleName = str_replace('bundle', '', strtolower($bundleName));
        if(file_exists($bundleDir)){
            // Rename specific files
            $fileRename = [
                'TrinityEmptyBundle.php'                        => 'Trinity' . $bundleName . '.php',
                'Controller/EmptyController.php'              => 'Controller/' . ucfirst($simpleName) . 'Controller.php',
                'DependencyInjection/TrinityEmptyExtension.php' => 'DependencyInjection/Trinity' . ucfirst($simpleName) . 'Extension.php',
                'TrinityEmptyBundle.php'                        => 'Trinity' . $bundleName . '.php',
                'Resources/views/empty'                       => 'Resources/views/' . $simpleName,
            ];

            foreach($fileRename as $from => $to){
                if(file_exists($bundleDir . $from)){
                    rename($bundleDir . $from, $bundleDir . $to);
                }
            }

            // Find references in files
            $files = self::getDirContents($bundleDir);

            $replacements = [
                'Trinity\\EmptyBundle' => 'Trinity\\' . $bundleName . '',
                'Trinity\\Empty\\Tests\\Controller' => 'Trinity\\' . ucfirst($simpleName) . '\\Tests\\Controller',
                'TrinityEmptyBundle' => 'Trinity' . $bundleName . '',
                'TrinityEmptyExtension' => 'Trinity' . ucfirst($simpleName) . 'Extension',
                'trinityemptybundle' => 'trinity' . $simpleName . 'bundle',
                'TrinityEmpty' => 'Trinity' . ucfirst($bundleName) . '',
                'trinity_empty' => 'trinity_' . $simpleName,
                'EmptyController' => ucfirst($simpleName) . 'Controller',
                '/empty' => '/' . $simpleName,
                'admin_mod_empty' => 'admin_mod_' . $simpleName,
                'trinity_empty' => 'trinity_' . $simpleName,
                'empty-bundle' => $simpleName . '-bundle',
                'name: Leeg' => 'name: ' . ucfirst($simpleName),
                '\'empty\'' => '\'' . $simpleName . '\'',
            ];

            foreach($files as $file){
                if(is_file($file)){
                    $str = file_get_contents($file);
                    $str = str_replace(array_keys($replacements), array_values($replacements), $str);
                    file_put_contents($file, $str);
                }
            }
        }
    }

    public static function getDirContents($dir, &$results = array()){
        $files = scandir($dir);

        foreach($files as $key => $value){
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
            if(!is_dir($path)) {
                $results[] = $path;
            } else if($value != "." && $value != "..") {
                self::getDirContents($path, $results);
                $results[] = $path;
            }
        }

        return $results;
    }
}