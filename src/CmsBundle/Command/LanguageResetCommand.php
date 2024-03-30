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
use Symfony\Component\Console\Helper\Table;

use Symfony\Component\Translation\Catalogue\MergeOperation;
use Symfony\Component\Translation\Catalogue\TargetOperation;
use Symfony\Component\Translation\Extractor\ExtractorInterface;
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\MessageCatalogueInterface;
use Symfony\Component\Translation\Reader\TranslationReaderInterface;
use Symfony\Component\Translation\Writer\TranslationWriterInterface;

use App\CmsBundle\Entity\Language;
use App\CmsBundle\Entity\LanguageToken;
use App\CmsBundle\Entity\LanguageTranslation;

class LanguageResetCommand extends Command
{
    private $output;
    private $em;
	private $Container = null;

    private $reader;
    private $extractor;

    private $catalogues = [
        'backend' => [
            'webshop_backend',
            'webshop-backend',
            'faq_backend',
            'cms',
            'FOSOAuthServerBundle',
            'tables',
        ],
        'frontend' => [
        ],
    ];

    public function __construct(ContainerInterface $Container, TranslationReaderInterface $reader, ExtractorInterface $extractor)
    {
		parent::__construct();

		$this->Container = $Container;

        $this->reader = $reader;
        $this->extractor = $extractor;
    }

    protected function configure()
    {
        $this
            ->setName('trinity:language:reset')
            ->setDescription('Reset language to default for a specific language and view')
            ->addArgument('locale', InputArgument::OPTIONAL, 'language locale')
            ->addArgument('view', InputArgument::OPTIONAL, 'backend or frontend')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->output = $output;

        $this->output->writeln('');
        $this->output->writeln('Updating language...');

        $this->em = $this->Container->get('doctrine.orm.entity_manager');

        $locale = $input->getArgument('locale');
        $view = $input->getArgument('view');

        $valid = false;
        if(!empty($locale) && !empty($view)){
            $Language = $this->em->getRepository(Language::class)->findOneBy(['locale' => $locale]);
            if(!empty($Language)){
                $valid = true;
                $this->output->writeln('Clearing translations for language <info>' . $Language->getLabel() . '</info> -> <info>' . $view . '</info>');

                $translations = $this->em->getRepository(LanguageTranslation::class)->findBy(['language' => $Language]);
                die(count($translations));
            }
        }

        if(!$valid){
            // Show overview

            $rows = [];
            foreach($this->em->getRepository(Language::class)->findAll() as $Language){
                $rows[] = [$Language->getId(), $Language->getLabel(), $Language->getLocale()];
            }

            $output->writeln('Here is a list of all available languages');
            $output->writeln('');
            $table = new Table($output);
            $table->setHeaders(['Language ID', 'Label', 'Locale'])->setRows($rows)->render();

            $rows = [
                ['frontend', 'Reset frontend translations; leave backend intact'],
                ['backend', 'Reset backend translations; leave frontend intact']
            ];

            $output->writeln('Here is a list of all available languages');
            $output->writeln('');
            $table = new Table($output);
            $table->setHeaders(['View', 'Description'])->setRows($rows)->render();

            $this->output->writeln('');
            $this->output->writeln('Run the script as follows:');
            $this->output->writeln('bin/console trinity:language:reset <Locale> <View>');
        }
        $this->output->writeln('');
        $this->output->writeln('Done!');

        return Command::SUCCESS;
    }
}
