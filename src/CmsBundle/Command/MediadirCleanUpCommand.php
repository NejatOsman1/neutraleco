<?php

namespace App\CmsBundle\Command;

// Injection
use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

use App\CmsBundle\Entity\Mediadir;

class MediadirCleanUpCommand extends Command
{
	private $containerInterface = null;

	public function __construct(ContainerInterface $containerInterface)
	{
		$this->containerInterface = $containerInterface;

		parent::__construct();
	}

    protected function configure()
    {
        $this
            ->setName('trinity:mediadir:clean')
            ->setDescription('Cleanup and re-sort media')
            ->addOption(
                'debug',
                'd',
                InputOption::VALUE_NONE,
                'Debug.'
            )
            ->addOption(
                'master',
                'm',
                InputOption::VALUE_NONE,
                'List auto selected masters for checking.'
            )
            ->addOption(
                'remove',
                'r',
                InputOption::VALUE_NONE,
                'Remove empty folders.'
            )
        ;
    }

    private $em = null;
    private $output = null;
    private $debug = false;
    private $removed = 0;
    private $masters = [];

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->debug  = ($input->getOption('debug'));
        $this->remove = ($input->getOption('remove'));
        $this->master = ($input->getOption('master'));
        $this->em     = $this->containerInterface->get('doctrine.orm.entity_manager');
        $this->output = $output;

        $this->output->writeln('Fixing (<info>run mutations</info>)');
        if($this->debug == true){
            $this->output->writeln('');
            $this->output->writeln('/============================================\\');
            $this->output->writeln('|        --=--    <info>DEBUG_MODE</info>    --=--        |');
            $this->output->writeln('\\============================================/');
        }
        $this->output->writeln('');

        $this->fetchMasters();
        
        if($this->master == true){
            // Stop here
        }else{
            if($this->remove == true){
                $this->output->writeln('');
                $this->output->writeln('Cleanup empty directories (multiple attempts)');
                $this->clearEmptyFolders(8);
                $this->output->writeln('Cleared <info>' . $this->removed . '</info> directories.');
            }else{
                $this->processMasterDuplicates();
                $this->output->writeln('');
                $this->output->writeln('Fix depricated folders');
                $this->processInvalidRootFolders();
            }
        }

        $this->output->writeln('');
        $this->output->writeln('FINISHED');
        $this->output->writeln('');


        return Command::SUCCESS;
        
    }

    private function processInvalidRootFolders($parent = null, $path = []){
        $folders = $this->em->getRepository('CmsBundle:Mediadir')->findBy(['parent' => $parent]);
        foreach($folders as $Mediadir){
            if(empty($Mediadir->getSettings()) || $parent != null){

                $subPath = $path;
                $subPath[] = $Mediadir->getLabel();


                // dump(implode('/', $subPath));

                /*$newTarget = $this->findByPath($To, $subPath);
                $this->parseMedia($Child, $newTarget, $depth);*/
                $newTarget = $this->findByPath(reset($this->masters), $subPath);
                $this->parseMedia($Mediadir, $newTarget);

                $this->processInvalidRootFolders($Mediadir, $subPath);
            }
        }
    }

    /**
     * Process all folders similar to master folders
     */
    private function processMasterDuplicates(){
        $this->output->writeln('Fetch similar to masters');
        $this->output->writeln('');
        foreach($this->masters as $settings_id => $Mediadir){
            $Settings = $Mediadir->getSettings();

            $similar = $this->em->getRepository('CmsBundle:Mediadir')->findBy(['parent' => null, 'settings' => $Settings]);
            $count = (count($similar) - 1);

            if($count){
                $this->output->writeln('- ' . $Mediadir->getLabel() . ' (' . strtoupper($Settings->getLanguage()->getLocale()) . ' | ' . $Settings->getHost() . ')');
                $this->output->writeln("\t" . 'Found <info>' . $count . '</info> similar configs...');
                foreach($similar as $SimilarMediadir){
                    if($SimilarMediadir != $Mediadir){

                        $this->parseMedia($SimilarMediadir, $Mediadir, 0);

                        $this->migrateContents($SimilarMediadir, $SimilarMediadir, $Mediadir);
                    }
                }
            }
        }
        $this->output->writeln('');
    }

    /**
     * Process all folders similar to master folders
     */
    private function migrateContents(Mediadir $parent, Mediadir $From, Mediadir $To, $depth = 0, $path = []){
        if($this->debug){
            $this->output->writeln((str_repeat("\t", $depth)) . "\t\t" . '[DEPTH ' . ($depth + 1) . '] Merge data from <info>#' . $From->getId() . '</info> to <info>#' . $To->getId() . '</info>.');
        }
        
        foreach($parent->getChildren() as $Child){
            $subPath = $path;
            $subPath[] = $Child->getLabel();
            
            $newTarget = $this->findByPath($To, $subPath);
            $this->parseMedia($Child, $newTarget, $depth);

            if($this->debug){
                $this->output->writeln((str_repeat("\t", $depth)) . "\t\t\t" . 'FROM: ' . $From->getId());
                $this->output->writeln((str_repeat("\t", $depth)) . "\t\t\t" . 'Child: ' . $Child->getLabel());
                $this->output->writeln((str_repeat("\t", $depth)) . "\t\t\t" . 'Path: ' . implode('/', $subPath));
                $this->output->writeln('');
                // dump(($depth + 1) . ', ' . $Child->getLabel());
            }else{
                echo '.';
            }

            if($Child->countChildren()){
                $this->migrateContents($Child, $From, $To, ($depth + 1), $subPath);
            }
        }
    }

    /**
     * Parse media from folder
     * 
     * @param Mediadir $From 
     * @param Mediadir $To 
     * @param int $depth 
     */
    private function parseMedia(Mediadir $From, Mediadir $To, int $depth = 0){
        // dump($From->getLabel());
        // dump($To->getLabel());

        $media_data = $From->getMedia();
        if($depth > 0) $this->output->writeln((str_repeat("\t", $depth)) . "\t\t\t\t" . 'Found ' . $media_data->count() . ' media entities.');
        if($media_data->count()){
            foreach($media_data as $Media){
                if($depth > 0) $this->output->writeln((str_repeat("\t", $depth)) . "\t\t\t\t\t" . '<info>- Move ' . $Media->getLabel() . ' (' . $Media->getId() . ')</info>');
                $Media->setParent($To);
                $this->em->persist($Media);
                $this->em->flush();
            }
            // die();
        }
    }

    private function clearEmptyFolders(int $runs = 1){
        $all = $this->em->getRepository('CmsBundle:Mediadir')->findAll();
        foreach($all as $Mediadir){
            if($Mediadir->getMedia()->count() == 0 && $Mediadir->getChildren()->count() == 0){

                if(in_array($Mediadir, $this->masters)){
                    continue;
                }

                $this->em->remove($Mediadir);
                $this->em->flush();

                $this->removed++;
            }
        }
        $runs--;
        if($runs > 0){
            $this->clearEmptyFolders($runs);
        }
    }

    /**
     * Fetch all real master folders for further processing
     */
    private function fetchMasters(){
        $this->output->writeln('Fetch all masters');
        $this->output->writeln('');
        $all_roots = $this->em->getRepository('CmsBundle:Mediadir')->findBy(['parent' => null]);
        foreach($all_roots as $Mediadir){
            if($Mediadir->getSettings()){
                $key = $Mediadir->getSettings()->getId();
                if(!isset($this->masters[$key])){
                    $this->output->writeln('- <info>SET MASTER</info> | Folder #' . $Mediadir->getId() . ' (' . $Mediadir->getLabel() . ') | Settings #' . $Mediadir->getSettings()->getId() . ' (' . $Mediadir->getSettings()->getHost() . ') | Language #' . $Mediadir->getSettings()->getLanguage()->getId() . ' (' . $Mediadir->getSettings()->getLanguage()->getLabel() . ')');
                    $this->masters[$key] = $Mediadir;
                }
            }
        }
        $this->output->writeln('');
    }

    /**
     * Get Mediadir ID from path
     */
    private function findByPath($master, $path){
        $parent = $master;
        foreach($path as $section){
            $Mediadir = $this->em->getRepository('CmsBundle:Mediadir')->findOneBy(['parent' => $parent, 'label' => $section]);
            if(!empty($Mediadir)){
                // dump('FOUND: ' . $parent->getId() . ' => ' . $section . ' => ' . $Mediadir->getId());
                $parent = $Mediadir;
            }else{
                $new = new Mediadir();
                $new->setLabel($section);
                $new->setDateAdd(new \DateTime());
                $new->setDateEdit(new \DateTime());
                $new->setParent($parent);
                $new->setSettings($master->getSettings());

                $this->em->persist($new);
                $this->em->flush();

                // dump('CREATED: ' . $parent->getId() . ' => ' . $section . ' => ' . $new->getId());

                $parent = $new;
            }
        }

        return $parent;
    }
}