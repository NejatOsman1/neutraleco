<?php

namespace App\CmsBundle\Command;

// Injection
use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

use App\CmsBundle\Entity\Media;
use App\CmsBundle\Entity\Settings;

class MediaCreateFullCommand extends Command
{
	private $container = null;

    protected function configure(){
        $this
            ->setName('trinity:media:createfull')
            ->setDescription('Create or recreate \'full\' type of already uploaded media (doesn\'t do webp or blurred type)');
        ;
    }

	public function __construct(ContainerInterface $container){
		$this->container = $container;

		parent::__construct();
	}

    protected function execute(InputInterface $input, OutputInterface $output){
		$em = $this->container->get('doctrine.orm.entity_manager');

		$output->writeln('Find missing \'full\' type files');

		$medias = $em->getRepository(Media::class)->findAll();

		foreach ($medias as $Media)
		{
            $previousFile = $Media->getPath();

			$Media->resize('full', 1920, $previousFile);
		}

        return Command::SUCCESS;
    }
}
