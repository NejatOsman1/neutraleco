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

class MissingmediaCommand extends Command
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
            ->setName('trinity:media:missing')
            ->setDescription('Find missing media')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->Container->get('doctrine.orm.entity_manager');
        $mediaItems = $em->getRepository('CmsBundle:Media')->findAll();
        $output->writeln('Searching for missing media...');
        $output->writeln('');
        $prevFound = false;
        $num_found = 0;
        $num_missing = 0;
        $num_total = 0;
        foreach($mediaItems as $Media){
            $path = $Media->getAbsolutePath();
            if(!file_exists($path)){
                if($prevFound){
                    $output->writeln('');
                }
                $output->writeln('Missing: <error>' . $path . '</error>');
                $output->writeln("\t" . 'Filename: <error>' . $Media->getLabel() . '</error>');
                $output->writeln("\t" . 'Folder: <error>' . ($Media->getParent() ? $Media->getParent()->getLabel() : 'Root') . '</error>');
                $prevFound = false;
                $num_missing++;
            }else{
                echo '.';
                $prevFound = true;
                $num_found++;
            }

            $num_total++;
        }

        $output->writeln('');
        $output->writeln('');
        $output->writeln('Done, found <info>' . $num_found . '</info> of <info>' . $num_total . '</info> (<info>' . round(($num_found / $num_total) * 100,1) . '%</info> found)');
        $output->writeln('');

        return Command::SUCCESS;
    }
}