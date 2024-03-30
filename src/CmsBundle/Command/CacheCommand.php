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
use Symfony\Component\Console\Input\InputOption;

class CacheCommand extends Command
{
	private $container = null;

    public function __construct(ContainerInterface $container)
    {
		parent::__construct();

		$this->container = $container;
    }

    protected function configure()
    {
        $this
            ->setName('trinity:cache')
            ->setDescription('Handle/clear page caching')
            ->addOption(
                'clear',
                'c',
                InputOption::VALUE_NONE,
                'Clear cache'
            )
            ->addOption(
                'warmup',
                'w',
                InputOption::VALUE_NONE,
                'Warmup cache.'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Cache handler");

        if($input->getOption('clear')){
            // Clear cache
            $this->clearCache($output);
        }
        if($input->getOption('warmup')){
            // Clear cache
            $this->warmupCache($output);
        }

        $output->writeln("Cache handler done");

        return Command::SUCCESS;
    }

    private function warmupCache($output){
        $cacheDir = str_replace('src/CmsBundle/Command', 'var/cache/page/', __DIR__);
        // TODO
    }

    private function clearCache($output){
        $cacheDir = str_replace('src/CmsBundle/Command', 'var/cache/page/', __DIR__);
        if(!file_exists($cacheDir)){
            $output->writeln('Cache dir ' . $cacheDir . ' doesn\'t exist!');
        }else{
            $n = 0;
            foreach(scandir($cacheDir) as $f){
                if(is_file($cacheDir . $f)){
                    unlink($cacheDir . $f);
                    $n++;
                }
            }

            if($n == 0){
                $output->writeln('No cache files to clear.');
            }else{
                $output->writeln('<info>Cleared ' . $n . ' cache files</info>');
            }
        }
    }
}
