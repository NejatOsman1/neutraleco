<?php

namespace App\CmsBundle\Command;

// Injection
use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\StringInput;

use Symfony\Component\Console\Question\Question;

class FixTranslationsCommand extends Command {

	private $containerInterface = null;

    private $input;
    private $output;
    private $em;
    private $languages;

    private $tokens = [
        'Goed' => 'cms',
        'Matig' => 'cms',
        'Slecht' => 'cms',
        'Het ingevoerde wachtwoord voldoet niet aan onze veiligheidseisen:' => 'cms',
        'Ongeldge captcha' => 'cms',
        'Het wachtwoord is te kort (minimaal 8 tekens).' => 'cms',
        'Het wachtwoord moet minimaal een cijfer bevatten.' => 'cms',
        'Het wachtwoord moet minimaal een letter bevatten.' => 'cms',
        'Het wachtwoord moet minimaal een hoofdletter bevatten.' => 'cms',
        'Het wachtwoord moet minimaal één van de volgende tekens bevatten: . , \\ - = ! @' => 'cms',
        'Het bestand dat u probeert te uploaden is te groot:' => 'cms',
        'U heeft geen geldig bestandstype geupload:' => 'cms',
        'De volgende bestanden zijn toegestaan:' => 'cms',
        'Minimaal 8 tekens.' => 'cms',
        'Minimaal één cijfer.' => 'cms',
        'Minimaal één kleine letter.' => 'cms',
        'Minimaal één hoofdletter.' => 'cms',
        'Minimaal één van de volgende tekens:' => 'cms',
    ];

	public function __construct(ContainerInterface $containerInterface)
	{
		$this->containerInterface = $containerInterface;

		parent::__construct();
	}

    protected function configure() {
        $this
        ->setName('trinity:fix:translations')
        ->setDescription('Fix/update missing translations')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $this->input = $input;
        $this->output = $output;
        $this->em = $this->containerInterface->get('doctrine.orm.entity_manager');

        $this->output->writeln('Checking ' . count($this->tokens) . ' tokens');

        $this->checkTokens();

        return Command::SUCCESS;
    }

    private function checkTokens(){
        $this->languages = $this->em->getRepository('CmsBundle:Language')->findAll();

        foreach($this->tokens as $token => $catalogue){
            $Token = $this->em->getRepository('CmsBundle:LanguageToken')->findOneBy(['token' => $token]);
            if(empty($Token)){
                // Doesnt exist, create
                $this->output->writeln('- Token: ' . $token . ' [CREATE]');
                $Token = new \App\CmsBundle\Entity\LanguageToken();
                $Token->setToken($token);

                $this->em->persist($Token);
                $this->em->flush();
            }else{
                $this->output->writeln('- Token: ' . $token . ' [EXISTS: ' . $Token->getId() . ']');
            }

            $this->checkTranslations($Token, $catalogue);
        }
    }

    private function checkTranslations($Token, $catalogue){
        $helper = $this->getHelper('question');
        foreach($this->languages as $Language){
            $Translation = $this->em->getRepository('CmsBundle:LanguageTranslation')->findOneBy(['language' => $Language, 'catalogue' => $catalogue, 'languageToken' => $Token]);
            if(empty($Translation)){
                // Doesnt exist, create

                $this->output->writeln("\t" . '- <info>' . strtoupper($Language->getLocale()) . '</info> | Translation: "' . $Token->getToken() . '" => "" [CREATE]' . "\t" . $Language->getLabel());
                $question = new Question("\t\t" . 'Vertaling voor: ' . $Token->getToken() . "\n\t\t");
                $trans = $helper->ask($this->input, $this->output, $question);

                if(empty($trans)){
                    $trans = $Token->getToken();
                }

                $this->output->writeln("\t\t" . 'Veranderd naar: <info>' . $trans . '</info>');

                // $trans = 'test';
                $Translation = new \App\CmsBundle\Entity\LanguageTranslation();
                $Translation->setLanguage($Language);
                $Translation->setLanguageToken($Token);
                $Translation->setCatalogue($catalogue);
                $Translation->setTranslation($trans);

                $this->em->persist($Translation);
                $this->em->flush();
            }else{
                $this->output->writeln("\t" . '- <info>' . strtoupper($Language->getLocale()) . '</info> | Translation: "' . $Token->getToken() . '" => "' . $Translation->getTranslation() . '" [EXISTS: ' . $Translation->getId() . ']');
            }
        }
    }

}
