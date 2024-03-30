<?php

namespace App\Trinity\BlogBundle\Command;

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

use App\Trinity\BlogBundle\Entity\Entry;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\CmsBundle\Entity\Media;

/**
 * Description of BlogMediaMigrationCommand
 *
 * @author kwm
 */
class BlogMediaMigrationCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('trinity:blog:media-migration')
            ->setDescription('Migrate old Image media to new media media')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $output->writeln('Starting blog entry image migration');
        
        // haal alle blog entries op (niet kijken naar taal)
        $entries = $em->getRepository('TrinityBlogBundle:Entry')->findAll();
        
        // loop over them
        foreach($entries as $entry)
        {
            // if image != null -> move to media and set image op null.
            if (!empty($entry->getImage()))
            {
                $output->writeln('Behandel entry: ' . $entry->getId() . ' Label: ' . $entry->getLabel());
                $image = $entry->getImage();

                // FIXME betere positie fixen ..
                $position = count($entry->getMedia()) + 1;

                $image->setPosition($position);
                $em->persist($image);

                $entry->addMedia($image);
                $entry->setImage(null);

                $em->persist($entry);
                $em->flush();

                unset($entry);
                unset($image);
            }
        }
        // done

        $output->writeln('Done');

        return Command::SUCCESS;
    }
}
