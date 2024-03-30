<?php

namespace App\CmsBundle\Command;

// Injection
use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\StringInput;

class ControlCommand extends Command {

    private $output;
    private $Container;

    public function __construct(ContainerInterface $Container){
        $this->Container = $Container;

        parent::__construct();
    }

    protected function configure() {
        $this
                ->setName('trinity:control')
                ->setDescription('Manage C&C stuff')
                ->addArgument('action', InputArgument::OPTIONAL, 'What to do?')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $this->output = $output;
        $em = $this->Container->get('doctrine.orm.entity_manager');
        $action = $input->getArgument('action');
        $Settings = $em->getRepository('CmsBundle:Settings')->findOneBy([], ['id' => 'asc']);

        switch ($action) {
            case 'status':
                $status = $Settings->getCcEnabled(true);
                $output->writeln("Current status: <info>" . ($status ? 'ENABLED' : 'DISABLED') . "</info>.");
                break;
            case 'enable':
                $Settings->setCcEnabled(true);
                $em->persist($Settings);
                $em->flush();

                $this->resetApi($em);

                $output->writeln("C&C system is now <info>ENABLED</info>.");
                break;
            case 'disable':
                $Settings->setCcEnabled(false);
                $em->persist($Settings);
                $em->flush();
                $output->writeln("C&C system is now <info>DISABLED</info>.");
                break;
            case 'reset':
                $Settings->setCcEnabled(false);
                $em->persist($Settings);
                $em->flush();

                $this->resetApi($em);

                $output->writeln("Reset C&C done.");
                break;
            default:
                $output->writeln("");
                $output->writeln("The following options are available");
                $output->writeln("-----------------------------------");
                $output->writeln("- status\tGet current C&C status.");
                $output->writeln("- enable\tEnable the C&C backend for this website.");
                $output->writeln("- disable\tDisable the C&C backend for this website.");
                $output->writeln("- reset\tReset C&C API.");
                $output->writeln("");
                break;
        }

        return Command::SUCCESS;

    }

    private function resetApi($em){
        $ApiClient = $em->getRepository('TrinityApiBundle:Client')->findOneBy([], ['id' => 'asc']);
        $ApiClient->setRandomId('71cb7h9hd4m3k23ghpadk67ed8b663l8jcmb83hhhdk45');
        $ApiClient->setSecret('mp3mkk7lhh79cp4domebj8jgkeilk9nlef2dpi53p61hgf');
        $em->persist($ApiClient);
        $em->flush();
    }

}
