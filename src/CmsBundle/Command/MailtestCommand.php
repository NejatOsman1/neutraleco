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

use App\CmsBundle\Util\Mailer;

class MailtestCommand extends Command
{
    private $output;
    private $Container;
	private $mailer;

    public function __construct(ContainerInterface $Container, Mailer $mailer){
        $this->Container = $Container;
		$this->mailer = $mailer;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('trinity:test:mail')
            ->setDescription('E-mail testen')
            ->addArgument('to', InputArgument::REQUIRED, 'Send mail to...')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $to = $input->getArgument('to');

        $output->writeln('');
        $output->writeln('Sending mail to ' . $to);

		$mailer = clone $this->mailer;
		$mailer->init();
        $mailer->setSubject('Test e-email vanuit Trinity')
                ->setTwigBody('emails/notify.html.twig', [
                    'label' => '',
                    'message' => 'Dit is een test e-mail vanuit Trinity.'
                ])
                ->setPlainBody('Dit is een test e-mail vanuit Trinity.')
                ->setTo([$to => $to]);

        $status = $mailer->execute_forced();

        if($status){
            $output->writeln('<info>E-mail send!</info>');
        }else{
            $output->writeln('<error>Er ging iets mis...</error>');
        }
        $output->writeln('');

        return Command::SUCCESS;
    }
}