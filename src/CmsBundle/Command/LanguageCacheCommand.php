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

use Symfony\Component\Translation\Catalogue\MergeOperation;
use Symfony\Component\Translation\Catalogue\TargetOperation;
use Symfony\Component\Translation\Extractor\ExtractorInterface;
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\MessageCatalogueInterface;
use Symfony\Component\Translation\Reader\TranslationReaderInterface;
use Symfony\Component\Translation\Writer\TranslationWriterInterface;

use App\CmsBundle\Entity\LanguageToken;
use App\CmsBundle\Entity\LanguageTranslation;

class LanguageCacheCommand extends Command
{
    private $output;
    private $em;
	private $Container = null;

    private $reader;
    private $extractor;

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
            ->setName('trinity:language:cache')
            ->setDescription('Update caches for example languages')
            ->addArgument('bundle', InputArgument::OPTIONAL, 'Bundle to index')
            ->addArgument('locale', InputArgument::OPTIONAL, 'Locale to focus on')
        ;
    }

    private function createTranslations($key){
        // check if token already exists
        $token = $this->em->getRepository('CmsBundle:LanguageToken')->findOneByToken($key);
        if (empty($token)) {
            $token = new \App\CmsBundle\Entity\LanguageToken();
            $token->setToken($key);
            $this->em->persist($token);
            $this->em->flush();
        }

        
        foreach($this->em->getRepository('CmsBundle:Language')->findAll() as $L){
            $trans = $this->em->getRepository("CmsBundle:LanguageTranslation")->findOneby(['languageToken' => $token->getId(), 'language' => $L, 'catalogue' => 'blocks']);
            if (empty($trans)) {
                $trans = new \App\CmsBundle\Entity\LanguageTranslation();
                $trans->setLanguage($L);
                $trans->setCatalogue('blocks');
                $trans->setTranslation($key);

                $trans->setLanguageToken($token);
                $this->em->persist($trans);
                unset($trans);
                $this->em->flush();
            }
        }
        unset($token);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->output = $output;

        $this->output->writeln('');
        $this->output->writeln('Updating language cache...');

        $this->em = $this->Container->get('doctrine.orm.entity_manager');

        $bundle = $input->getArgument('bundle');

        if($bundle == 'all') $bundle = null;

        $locale = $input->getArgument('locale');
        if($bundle){
            $bundle = strtolower($bundle);
            if($bundle != 'cms' && $bundle != 'trinity' && $bundle != 'app'){
                if(!preg_match('/bundle/', $bundle)){
                    $bundle = 'trinity' . $bundle . 'bundle';
                }
            }

            if($bundle == 'cms' || $bundle == 'trinity'){
                $bundle = 'cmsbundle';
            }
        }

        $domain = null;
        $loader = $this->Container->get('translation.loader.db');

        $kernel = $this->Container->get('kernel');

        $transPaths = [];

        if(empty($bundle) || $bundle == 'cmsbundle' || $bundle == 'app'){
            $transPaths = [
                'templates/'
            ];
        }

        $bundleFound = false;
        foreach ($kernel->getBundles() as $bundleObj) {
            if($bundle == null || strtolower($bundleObj->getName()) == $bundle){
                $bundleFound = true;
                $transPaths[] = $bundleObj->getPath().'/Resources/';
                $transPaths[] = sprintf('%s/Resources/%s/', $kernel->getProjectDir() . '/src', $bundleObj->getName());
            }
        }

        if(!$bundleFound && $bundle != 'app'){
            $output->writeln('');
            $output->writeln('Stopped, invalid bundle: ' . $bundle);
            exit;
        }

        /* **************************************************
                    CUSTOM BLOCK TRANSLATIONS
        ************************************************** */

        $rootDir = str_replace('src/CmsBundle/Command', '', __DIR__);
        $blocksFolders = [
            $rootDir . 'templates/blocks/',
            $rootDir . 'src/CmsBundle/Resources/views/blocks/',
        ];

        foreach($blocksFolders as $bf){
            foreach(scandir($bf) as $f){
                if(is_file($bf . $f)){
                    $fd = file_get_contents($bf . $f);
                    if(preg_match('/\{\#(.*?)\#\}/is', $fd, $m)){
                        $conf = json_decode($m[1], true);
                        $this->createTranslations($conf['label']);

                        if(!empty($conf['blocks'])){
                            foreach($conf['blocks'] as $b){
                                if(!empty($b['fields'])){
                                    foreach($b['fields'] as $f){
                                        $label = $f['label'];
                                        $this->createTranslations($label);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        /* **************************************************
        
        ************************************************** */


        if($locale){
            $languages = $this->em->getRepository('CmsBundle:Language')->findByLocale($locale);
        }else{
            $languages = $this->em->getRepository('CmsBundle:Language')->findAll();
        }
        foreach($languages as $Language){
            $this->output->writeln("\t" . 'Language: <info>' . $Language->getLabel() . '</info> (<info>' . $Language->getLocale() . '</info>)');

            $locale = $Language->getLocale();

            // Extract used messages
            $this->output->writeln("\t" . 'Extracting translatable strings from bundles...');
            $extractedCatalogue = $this->extractMessages($locale, $transPaths);

            // Load defined messages
            $this->output->writeln("\t" . 'Load existing translations...');
            $currentCatalogue = $this->loadCurrentMessages($locale, $transPaths);

            $this->output->writeln("\t" . 'Merge translations...');
            // Merge defined and extracted messages to get all message ids
            $mergeOperation = new MergeOperation($extractedCatalogue, $currentCatalogue);
            $available = $mergeOperation->getResult()->all($domain);
            if (null !== $domain) {
                $available = array($domain => $available);
            }

            $dir = str_replace('Command', 'Resources/translations/', __DIR__);
            $fileList = scandir($dir);

            $translationList = [];
            foreach ($available as $group => $list) {

                // Create placeholder files
                $f = $group.'.'.$Language->getLocale().'.db';
                if(!in_array($f, $fileList)){
					file_put_contents($dir.$f, '');
				}

                foreach ($list as $key => $translation) {
                    $T = $this->em->getRepository('CmsBundle:LanguageToken')->findOneByToken($key);
                    $L = new LanguageTranslation();
                    if(!empty($T)){
                        $L = $this->em->getRepository('CmsBundle:LanguageTranslation')->findOneBy([
                            'catalogue' => $group,
                            'language' => $Language,
                            'languageToken' => $T,
                        ]);
                        if(empty($L)){
                            $L = new LanguageTranslation();
                            $L->setCatalogue($group);
                            $L->setTranslation($translation);
                            $L->setLanguage($Language);
                            $L->setLanguageToken($T);
                            $this->em->persist($L);
                            $this->em->flush();
                        }
                    }else{
                        $T = new LanguageToken();
                        $T->setToken($key);
                        $this->em->persist($T);

                        $L->setCatalogue($group);
                        $L->setTranslation($translation);
                        $L->setLanguage($Language);
                        $L->setLanguageToken($T);
                        $this->em->persist($L);
                        $this->em->flush();
                    }

                    $translationList[$group][] = $L;
                }
            }
        }




        $this->output->writeln('');
        $this->output->writeln('Done!');

        return Command::SUCCESS;
    }

    /**
     * @param string $locale
     * @param array  $transPaths
     *
     * @return MessageCatalogue
     */
    private function extractMessages($locale, $transPaths)
    {
        $extractedCatalogue = new MessageCatalogue($locale);

        $timer = time();
        
        foreach ($transPaths as $_path) {

			// Add extra handling for project templates. They don't live in a view subdir anymore (symfony 3.4 behaviour).
			if ($_path == 'templates/') {
				if (is_dir($_path)) {
					// Do not fetch from vendor folder, these are already in here
					$this->output->writeln("\t\t" . '- Extracting <info>' . $_path . '</info>');
					$this->extractor->extract($_path, $extractedCatalogue);
					$this->output->writeln("\t\t\t" . '<info>Took ' . (time() - $timer) . ' seconds</info>');
					$timer = time();
				}
			}

            // extract translations from twig templates
            $path = $_path.'views';

            if (is_dir($path)) {
                if(!preg_match('/vendor/', $path)){
                    // Do not fetch from vendor folder, these are already in here
                    $this->output->writeln("\t\t" . '- Extracting <info>' . $path . '</info>');
                    $this->extractor->extract($path, $extractedCatalogue);
                    $this->output->writeln("\t\t\t" . '<info>Took ' . (time() - $timer) . ' seconds</info>');
                    $timer = time();
                }
            }
            // extract translations from Controllers
            $path = $_path.'../Controller';

            if (is_dir($path)) {
                if(!preg_match('/vendor/', $path)){
                    $this->output->writeln("\t\t" . '- Extracting <info>' . $path . '</info>');
                    $this->extractor->extract($path, $extractedCatalogue);
                    $this->output->writeln("\t\t\t" . '<info>Took ' . (time() - $timer) . ' seconds</info>');
                    $timer = time();
                }
            }
            // make twig extensions translatable
            $path = $_path.'../Twig';
            if (is_dir($path)) {
                if(!preg_match('/vendor/', $path)) {
                    $this->output->writeln("\t\t" . '- Extracting <info>' . $path . '</info>');
                    $this->extractor->extract($path, $extractedCatalogue);
                    $this->output->writeln("\t\t\t" . '<info>Took ' . (time() - $timer) . ' seconds</info>');
                    $timer = time();
                }
            }
	        // make Classe extensions translatable
	        /* Temp disabled, due to warning messages */
                $path = $_path.'../Classes';
                if (is_dir($path)) {
                    if(!preg_match('/vendor/', $path)) {
                        $this->output->writeln("\t\t" . '- Extracting <info>' . $path . '</info>');
                        $this->extractor->extract($path, $extractedCatalogue);
                        $this->output->writeln("\t\t\t" . '<info>Took ' . (time() - $timer) . ' seconds</info>');
                        $timer = time();
                    }
	        }
            /* make EventListener translateable */
            $path = $_path.'../EventListener';
            if (is_dir($path)) {
                if(!preg_match('/vendor/', $path)) {
                    $this->output->writeln("\t\t" . '- Extracting <info>' . $path . '</info>');
                    $this->extractor->extract($path, $extractedCatalogue);
                    $this->output->writeln("\t\t\t" . '<info>Took ' . (time() - $timer) . ' seconds</info>');
                    $timer = time();
                }
            }
            /* make Commands translateable */
            $path = $_path.'../Command';
            if (is_dir($path)) {
                if(!preg_match('/vendor/', $path)) {
                    $this->output->writeln("\t\t" . '- Extracting <info>' . $path . '</info>');
                    $this->extractor->extract($path, $extractedCatalogue);
                    $this->output->writeln("\t\t\t" . '<info>Took ' . (time() - $timer) . ' seconds</info>');
                    $timer = time();
                }
            }
        }

        return $extractedCatalogue;
    }

    /**
     * @param string            $locale
     * @param array             $transPaths
     * @param TranslationLoader $loader
     *
     * @return MessageCatalogue
     */
    private function loadCurrentMessages($locale, $transPaths)
    {
        $currentCatalogue = new MessageCatalogue($locale);
        foreach ($transPaths as $path) {
            $path = $path.'translations';
            if (is_dir($path)) {
				$this->reader->read($path, $currentCatalogue);
            }
        }

        return $currentCatalogue;
    }
}
