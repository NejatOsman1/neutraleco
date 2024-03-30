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

class ActivateBundleCommand extends Command
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
            ->setName('trinity:bundle:activate')
            ->setDescription('Activate missing Trinity bundles')
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
        $output->writeln('Searching for not activated bundles...');
        $output->writeln('');

        $installed = $this->getCurrentInstalled();

        // $this->clearCache($output);die();

        $srcDir = $this->Container->get('kernel')->getProjectDir() . '/src/';
        $bundlesDir = $srcDir . 'Trinity/';

        $toInstall = 0;
        foreach(scandir($bundlesDir) as $dir){
            if(preg_match('/Bundle/', $dir)){
                if(!strpos($installed, $dir)){
                    $output->writeln('<info>' . $dir . '</info>');
                    $this->install($output, $dir, $bundlesDir . $dir);
                    $toInstall += 1;
                }
            }
        }

        if(empty($toInstall)){
            $output->writeln('<error>Nothing to install...</error>');
        }

        $output->writeln('');
        $output->writeln('Done!');

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

        $output->writeln('Execute the following three commands to finalize:');
        $output->writeln('');
        $output->writeln('rm -rf var/cache/prod/* var/cache/dev/*');
        $output->writeln('bin/console doctrine:schema:update -f');
        $output->writeln('bin/console assets:install --symlink --relative');
        $output->writeln('');

        /* $Kernel = $this->Container->get('kernel');
        $output->writeln('- Updating database ...');
        $application = new \Symfony\Bundle\FrameworkBundle\Console\Application($Kernel);
        $application->setAutoExit(false);
        //Create de Schema
        $options = array('command' => 'doctrine:schema:update',"--force" => true);
        $application->run(new \Symfony\Component\Console\Input\ArrayInput($options)); */
    }
}