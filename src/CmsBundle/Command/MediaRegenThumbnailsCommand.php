<?php

namespace App\CmsBundle\Command;

// Injection
use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MediaRegenThumbnailsCommand extends Command
{

    private $Container;

    public function __construct(ContainerInterface $Container){
        $this->Container = $Container;

        parent::__construct();
    }
    
    protected function configure()
    {
        $this
            ->setName('trinity:media:regen')
            ->setDescription('Find missing media "thumbnails" and regen them')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Scanning for missing media thumbnails.');
        $output->writeln('');

        $em = $this->Container->get('doctrine.orm.entity_manager');

        // find all media entities
        $medias = $em->getRepository('CmsBundle:Media')->findAll();

        // make dynamic?
        $sizes = [
            'large' => '900',
            'medium' => '600',
            'small' => '350',
            'thumb' => '150',
        ];

        // loop over them
        foreach($medias as $media)
        {
            $mime = $media->getMime();
            if($mime != 'image/jpeg' && $mime != 'image/png')
            {
                $output->writeln('Skipping Media Entity ' . $media->getId() . ' non image mime: ' . $mime);
                continue;
            }

            $parent = $media->getParent() ? ' Mediadir: ' . $media->getParent()->getLabel() : '/';

            $output->writeln("Checking Media Entity " . $media->getId() . $parent);

            // check if "parent" is there, if not bail and report
            if(!file_exists($media->getAbsolutePath()))
            {
                $output->writeln('WARNING: couldn\'t find parent (large) image of Media Entity ' . $media->getId() . ' path: ' . $media->getAbsolutePath());
                continue;
            }

            foreach($sizes as $scale => $size)
            {
                // check if the children exist
                if(!file_exists($media->getAbsolutePath($scale)))
                {
                    $output->writeln('  Regening "' . $scale . '" of Media Entity ' . $media->getId() . ' path ' . $scale . '/' . $media->getPath());
                    $result = $this->resize($media, $scale, $size);
                    if ($result <= 0)
                    {
                        if ($result == 0)
                            $output->writeln('  Generating of "' . $scale . '" of Media Entity ' . $media->getId() .' skipped!');
                        else if ($result == -1)
                            $output->writeln('  Generating of "' . $scale . '" of Media Entity ' . $media->getId() .' failed!');
                    }
                    // regen
                }
            }
            unset($media);
        }

        $output->writeln('');
        $output->writeln('Done.');

        return Command::SUCCESS;
    }

    // Copied from CmsBundle:Media:resize() please keep in sync (regarding supported images types)
    private function resize($media, $scale, $maxWidth)
    {
        // we don't touch the original
        if ($scale == 'full')
            return -1;

        $source = $media->getAbsolutePath();
        $destination = $media->getAbsolutePath($scale);
        $mime = $media->getMime();

        switch ($mime) {
            case 'image/jpeg':
                if (!$image = @imagecreatefromjpeg($source)){
                    return false;
                }
                $quality = 75;
                break;
            case 'image/png':
                if (!$image = @imagecreatefrompng($source)){
                    return false;
                }
                $quality = 4;
                break;
            default:
                return 0;
                break;
        }

        // Get dimensions of source image.
        list($origWidth, $origHeight) = getimagesize($source);

        // Calculate ratio of desired maximum sizes and original sizes.
        $ratio = $maxWidth / $origWidth;

        // Calculate new image dimensions.
        $newWidth  = (int)$origWidth  * $ratio;
        $newHeight = (int)$origHeight * $ratio;

        // Create final image with new dimensions.
        $newImage = imagecreatetruecolor($newWidth, $newHeight);

        if($mime == 'image/png'){
            imagealphablending($newImage, FALSE);
            imagesavealpha($newImage, TRUE);
        }

        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);

        switch ($mime) {
            case 'image/jpeg':
                imagejpeg($newImage, $destination, $quality);
                break;
            case 'image/png':
                imagepng($newImage, $destination, $quality);
                break;
            default: break;
        }

        // Free up the memory.
        imagedestroy($image);
        imagedestroy($newImage);

        return 1;
    }
}