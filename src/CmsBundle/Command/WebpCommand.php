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

class WebpCommand extends Command
{
	private $Container;

    protected function configure(){
        $this
            ->setName('trinity:media:webp')
            ->setDescription('Create missing Blurred and WebP images')
            ->addOption(
                'refresh',
                'r',
                InputOption::VALUE_NONE,
                'Refresh existing Blur and WebP-files.'
            )
        ;
    }

    public function __construct(ContainerInterface $Container){
        $this->Container = $Container;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        $em = $this->Container->get('doctrine.orm.entity_manager');

        $allowWebP = false;
		try {
			$allowWebP = $this->Container->getParameter('trinity_webp');
		} catch(\Exception $e) {
			// LEROY LENKINS!
		}

        $refresh = ($input->getOption('refresh') ? true : false);

		$output->writeln('Find missing blurred' . ($allowWebP ? ' and webp' : '') . ' files');

		$medias = $em->getRepository(Media::class)->findAll();
		foreach ($medias as $Media)
		{
			if ($Media->hasRemoteUrl()) {
				continue;
			}
			if(preg_match('/image\/svg/', $Media->getMime())){
				// Ignore SVG
				continue;
			}

			$mutated = [];

			if (empty($Media->getParent())) {
				$Settings = $em->getRepository(Settings::class)->findOneBy([], ['id' => 'asc']);
			} else {
				$Settings = $Media->getParent()->getSettings();
			}

			if (!$refresh && $Media->hasBlurred()) {
				// $mutated[] = $Media->getLabel() . ': <info>Has Blurred</info>';
			} else {
				if ($Media->hasBlurred()) {
					$mutated[] = $Media->getLabel() . ': <info>Has Blurred</info> : Re-create Blurred...';
				}
			}

			if ($allowWebP) {
				if(!$refresh && $Media->hasWebp()){
					// $mutated[] = $Media->getLabel() . ': <info>Has WebP</info>';
				}else{
					if($Media->hasWebp()){
						$mutated[] = $Media->getLabel() . ': <info>Has WebP</info> : Re-create WebP...';
					}else{
						$mutated[] = $Media->getLabel() . ': Create WebP...';
					}
					$Media->createWebP($Settings, $Media->getPath(), true);
				}

				if(!$Media->hasBlurredWebp() || $refresh){
					$mutated[] = $Media->getLabel() . ': Create Blurred (with WebP)...';
					$Media->createLowRes($Settings, $Media->getPath(), true, true);
				}
			}else{
				if (!$Media->hasBlurred() || $refresh) {
					$mutated[] = $Media->getLabel() . ': Create Blurred...';
					$Media->createLowRes($Settings, $Media->getPath(), true, false);
				}
			}

			if(count($mutated)){
				foreach($mutated as $m){
					$output->writeln($m);
				}
			}
		}

		return Command::SUCCESS;
    }
}
