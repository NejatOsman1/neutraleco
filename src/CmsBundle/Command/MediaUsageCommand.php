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

class MediaUsageCommand extends Command
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
            ->setName('trinity:media:usage')
            ->setDescription('Find media usage and orphanage')
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
        $installed = $this->getCurrentInstalled();

        $em = $this->Container->get('doctrine.orm.entity_manager');
        $output->writeln('Searching through pages...');
        $output->writeln('');

        // Pages
        $all_pages = $em->getRepository('CmsBundle:Page')->findAll();
        foreach($all_pages as $Page){
            $output->writeln('- ' . $Page->getLabel() . ' (' . strtoupper($Page->getLanguage()->getLocale()) . ')');
            $found = false;

            if($Page->getImage()){
               // Page has image
                $Page->getImage()->setUsed(true)->setUsedIn(['Page: ' . $Page->getId()]);
                $em->persist($Page->getImage());
                $output->writeln("\t" . '- Has image [<info>' . $Page->getImage()->getId() . '</info>]');
                $found = true;
            }

            if($Page->getMedia()){
               // Page has media
                $Page->getMedia()->setUsed(true)->setUsedIn(['Page: ' . $Page->getId()]);
                $em->persist($Page->getMedia());
                $output->writeln("\t" . '- Has media [<info>' . $Page->getMedia()->getId() . '</info>]');
                $found = true;
            }

            if($Page->getBlocks()){
                $wrappers = $Page->getBlocks();
                foreach($wrappers as $wrapper){
                    $blocks = $wrapper->getBlocks();
                    foreach($blocks as $block){
                        $content     = $block->getContent();
                        $config      = $block->getConfig();
                        $block_media = $block->getAltMedia();

                        if(!empty($content)){
                            if(preg_match_all('/\/images\/(.*?\.[a-zA-Z]+)/', $content, $m)){
                                foreach($m[1] as $path){
                                    $Media = $em->getRepository('CmsBundle:Media')->findOneByPath($path);
                                    if($Media){
                                        $Media->setUsed(true)->setUsedIn(['Page: ' . $Page->getId()]);
                                        $output->writeln("\t" . '- Has block content media [<info>' . $Media->getId() . '</info>]');
                                        $found = true;
                                    }else{
                                        $output->writeln("\t" . '- <error>Block content media ' . $path . ' not found!</error>');
                                    }
                                }
                            }
                        }

                        if(!empty($config)){
                            if(is_array($config)){
                                // Force config to plain text
                                $config = json_encode($config);
                            }
                            if(preg_match_all('/\/images\/(.*?\.[a-zA-Z]+)/', $config, $m)){
                                foreach($m[1] as $path){
                                    $Media = $em->getRepository('CmsBundle:Media')->findOneByPath($path);
                                    if($Media){
                                        $Media->setUsed(true)->setUsedIn(['Page: ' . $Page->getId()]);
                                        $output->writeln("\t" . '- Has block config media [<info>' . $Media->getId() . '</info>]');
                                        $found = true;
                                    }else{
                                        $output->writeln("\t" . '- <error>Block config media ' . $path . ' not found!</error>');
                                    }
                                }
                            }
                        }

                        if($block_media){
                            foreach($block_media as $BlockMedia){
                                if($BlockMedia->getMedia()){
                                    $Media = $BlockMedia->getMedia();
                                    $Media->setUsed(true)->setUsedIn(['Page: ' . $Page->getId()]);
                                    $em->persist($Media);
                                    $found = true;
                                }
                            }
                        }
                    }
                }
            }

            if($found){
                $em->flush();
            }
        }

        // Settings

        $found = false;
        $all_entries = $em->getRepository('CmsBundle:Settings')->findAll();
        foreach($all_entries as $Entry){
            $output->writeln('- Settings (' . strtoupper($Entry->getLanguage()->getLocale()) . ')');

            if($Entry->getLogo()){
                $Media = $Entry->getLogoObject();
                if($Media){
                    $Media->setUsed(true);
                    $Media->setUsedIn(['Settings' => $Entry->getId()]);
                    $em->persist($Media);
                    $found = true;

                    $output->writeln("\t" . '- Has logo [<info>' . $Media->getId() . '</info>]');
                }
            }

            if($Entry->getLogoAlt()){
                $Media = $Entry->getLogoAltObject();
                if($Media){
                    $Media->setUsed(true);
                    $Media->setUsedIn(['Settings' => $Entry->getId()]);
                    $em->persist($Media);
                    $found = true;

                    $output->writeln("\t" . '- Has logo (alt) [<info>' . $Media->getId() . '</info>]');
                }
            }

            if($Entry->getBackground()){
                $Media = $Entry->getBackgroundObject();
                if($Media){
                    $Media->setUsed(true);
                    $Media->setUsedIn(['Settings' => $Entry->getId()]);
                    $em->persist($Media);
                    $found = true;

                    $output->writeln("\t" . '- Has background [<info>' . $Media->getId() . '</info>]');
                }
            }

            if($Entry->getAppIcon()){
                $Media = $Entry->getAppIconObject();
                if($Media){
                    $Media->setUsed(true);
                    $Media->setUsedIn(['Settings' => $Entry->getId()]);
                    $em->persist($Media);
                    $found = true;

                    $output->writeln("\t" . '- Has app icon [<info>' . $Media->getId() . '</info>]');
                }
            }

            if($found){
                $em->flush();
            }
        }

        /*
            BUNDLE SPECIFIC
        */

        // Occasions
        if(strpos($installed, 'OccasionsBundle')){
            $output->writeln('');
            $output->writeln('----------------------------------------------------------------------');
            $output->writeln('Bundle: OCCASIONS');
            $output->writeln('----------------------------------------------------------------------');
            $output->writeln('');
            $found = false;
            $all_occasions = $em->getRepository('TrinityOccasionsBundle:Occasion')->findAll();
            foreach($all_occasions as $Occasion){
                $label = [
                    $Occasion->getMerk(),
                    $Occasion->getModel(),
                    $Occasion->getType(),
                    $Occasion->getToevoeging(),
                ];
                $output->writeln('- ' . implode($label, ' '));

                foreach($Occasion->getMedia() as $Media)
				{
                        $Media->setUsed(true);
                        $Media->setUsedIn(['Occcasion: ' . $Entry->getId()]);
                        $em->persist($Media);
                        $found = true;

                        $output->writeln("\t" . '- Has media [<info>' . $Media->getId() . '</info>]');
                }

				foreach($Occasion->getPanoramas() as $Media)
				{
					$Media->setUsed(true);
					$Media->setUsedIn(['Occcasion: ' . $Entry->getId()]);
					$em->persist($Media);
					$found = true;

					$output->writeln("\t" . '- Has media [<info>' . $Media->getId() . '</info>]');
                }

                if($found){
                    $em->flush();
                }
            }
        }

        // Blog
        if(strpos($installed, 'BlogBundle')){
            $output->writeln('');
            $output->writeln('----------------------------------------------------------------------');
            $output->writeln('Bundle: BLOG');
            $output->writeln('----------------------------------------------------------------------');
            $output->writeln('');

            $found = false;
            $all_entries = $em->getRepository('TrinityBlogBundle:Entry')->findAll();
            foreach($all_entries as $Entry){
                $output->writeln('- ' . $Entry->getLabel());

                if($Entry->getImage()){
                    $Media = $Entry->getImage();
                    $Media->setUsed(true);
                    $Media->setUsedIn(['Blog: ' . $Entry->getId()]);
                    $em->persist($Media);
                    $found = true;

                    $output->writeln("\t" . '- Has media [<info>' . $Media->getId() . '</info>]');
                }

                if($found){
                    $em->flush();
                }
            }
        }

        // Webshop
        if(strpos($installed, 'WebshopBundle')){
            $output->writeln('');
            $output->writeln('----------------------------------------------------------------------');
            $output->writeln('Bundle: WEBSHOP');
            $output->writeln('----------------------------------------------------------------------');
            $output->writeln('');

            $found = false;
            $all_entries = $em->getRepository('TrinityWebshopBundle:Settings')->findAll();
            foreach($all_entries as $Entry){
                $output->writeln('- Settings');

                if($Entry->getDefaultProductImage()){
                    $path = $Entry->getDefaultProductImage();

                    if(preg_match('/\/images\/(.*?\.[a-zA-Z]+)/', $path, $m)){
                        $path = $m[1];
                        $Media = $em->getRepository('CmsBundle:Media')->findOneByPath($path);
                        if($Media){
                            $Media->setUsed(true);
                            $Media->setUsedIn(['Webshop' => ['Settings: ' . $Entry->getId()]]);
                            $em->persist($Media);
                            $found = true;

                            $output->writeln("\t" . '- Has media [<info>' . $Media->getId() . '</info>]');
                        }
                    }
                }

                if($found){
                    $em->flush();
                }
            }

            $found = false;
            $all_entries = $em->getRepository('TrinityWebshopBundle:Product')->findAll();
            foreach($all_entries as $Entry){
                $output->writeln('- ' . $Entry->getLabel());

                if($Entry->getMedia()){
                    foreach($Entry->getMedia() as $Media){
                        $Media->setUsed(true);
                        $Media->setUsedIn(['Webshop' => ['Product: ' . $Entry->getId()]]);
                        $em->persist($Media);
                        $found = true;

                        $output->writeln("\t" . '- Has media [<info>' . $Media->getId() . '</info>]');
                    }
                }

                if($found){
                    $em->flush();
                }
            }
        }


        $output->writeln('');
        $output->writeln('Done; no media found.');

        return Command::SUCCESS;
    }
}