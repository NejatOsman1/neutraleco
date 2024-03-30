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

class OptimizeCommand extends Command
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
            ->setName('trinity:media:optimize')
            ->setDescription('Optimize miscellaneous stuff like image dimensions and more.')

        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->Container->get('doctrine.orm.entity_manager');
        $Settings = $em->getRepository('CmsBundle:Settings')->findOneBy([], ['id' => 'asc']);

        $medias = $em->getRepository('CmsBundle:Media')->findAll();
        foreach($medias as $Media){
            dump($Media);die();
        }

/*        $output->writeln('');
        $output->writeln('1/1 <info>Re-arranging and optimizing media...</info>');
        $output->writeln('');

        /* FIXING FILESIZES */

        $medias = $em->getRepository('CmsBundle:Media')->findAll();
        foreach($medias as $Media){
            $fullPath = $Media->getUploadRootDir() . '/' . $Media->getPath();
            if(file_exists($fullPath)){
                $og_size = $Media->getSize();
                $new_size = filesize($fullPath);

                if($og_size != $new_size){
                    $output->writeln($Media->getId() . ' | ' . $Media->getLabel() . ' | ' . $og_size . ' => ' . $new_size);

                    $Media->setSize($new_size);
                    $em->persist($Media);
                }
            }else{
                $output->writeln($Media->getId() . ' | ' . $Media->getLabel() . ' | <error>Bestand bestaat niet</error>');
            }
        }

        $em->flush();

        /* RESIZING (POSSIBLY NOT NEEDED ANYMORE) */

        /*$dimensions = $Settings->getMediaDimensions();
        $mediaItems = $em->getRepository('CmsBundle:Media')->findByType('images');
        $output->writeln("\t" . 'Searching for media larger then the maximum image size <info>' . $dimensions['full'] . 'px...</info>');
        foreach($mediaItems as $Media){
            $fullPath = $Media->getUploadRootDir() . '/' . $Media->getPath();
            dump($fullPath);
            if(file_exists($fullPath) && $Media->getWidth() > $dimensions['full']){
                $output->writeln("\t\t" . '- #' . $Media->getId() . ': <info>' . $Media->getFolderPath() . $Media->getLabel() . '</info>: ' . $Media->getWidth() . 'px');

                if(!$Media->resize('full', $dimensions['full'])){
                    $output->writeln("\t\t\t" . 'FAILED');
                }else{
                    $output->writeln("\t\t\t" . 'SUCCESS');
                }
                $em->persist($Media);
            }
        }

        $em->flush();

        foreach($dimensions as $key => $maxWidth){
            if($key != 'full'){
                $output->writeln("\t" . 'Create smaller sizes <info>< ' . $maxWidth . 'px...</info>');
                echo "\t";
                foreach($mediaItems as $Media){
                    $fullPath = $Media->getUploadRootDir() . '/' . $Media->getPath();
                    if(file_exists($fullPath)){
                        if(!$Media->resize($key, $maxWidth)){
                            echo 'X';
                        }else{
                            echo '.';
                        }
                    }else{
                        echo 'E';
                    }
                }
                $output->writeln('');
            }
        }*/


        $output->writeln('');
        $output->writeln('Done!');
        $output->writeln('');

        return Command::SUCCESS;
    }
}