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

class MigrateCommand extends Command
{
    private $output;
    private $test = false;
    private $Container;

    public function __construct(ContainerInterface $Container){
        $this->Container = $Container;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('trinity:migrate')
            ->setDescription('Fix issues after updates')
            ->addArgument('action', InputArgument::OPTIONAL, 'Specify an action')
            ->addOption(
                'test',
                't',
                InputOption::VALUE_NONE,
                'Run in test mode (no mutations).'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
		$output->writeln('This command is currently not needed');
		return 0;

        $action = $input->getArgument('action');
        $this->test = ($input->getOption('test'));

        $output->writeln('');

        switch ($action) {
            case 'fix_block_media':
                $this->actionFixBlockMedia($input, $output);
                break;
            case 'fix_multisite_support':
                $this->actionFixMultisiteUpdate($input, $output);
                break;
            default:
                $this->doWriteln($output, '<error>Invalid action "' . $action . '"</error>');
                $this->doWriteln($output, '');
                $this->doWriteln($output, 'Available options:');
                $this->doWriteln($output, "\t" . '<info>fix_block_media</info>' . "\t\t" . 'Fix blocks which used the old media link.');
                $this->doWriteln($output, "\t" . '<info>fix_multisite_support</info>' . "\t\t" . 'Update old data with new multisite support in bundles.');
                break;
        }

        $output->writeln('');

        return Command::SUCCESS;
    }

    private function actionFixBlockMedia($input, $output){
        $this->doWriteln($output, 'Searching for old media links...');

        $em = $this->Container->get('doctrine.orm.entity_manager');

        $query = 'SELECT * FROM page_block_media;';
        $statement = $em->getConnection()->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();

        $n = count($result);
        if($n){

            $added = 0;
            $ignored = 0;

            // Found
            foreach($result as $res){

                $Media = $em->getRepository('CmsBundle:Media')->find($res['media_id']);
                $PageBlock = $em->getRepository('CmsBundle:PageBlock')->find($res['page_block_id']);

                $BlockMedia = $em->getRepository('CmsBundle:PageBlockMedia')->findOneBy([
                    'media' => $Media,
                    'page_block' => $PageBlock
                ]);

                if(!$BlockMedia){
                    $BlockMedia = new \App\CmsBundle\Entity\PageBlockMedia();
                    $BlockMedia->setMedia($Media);
                    $BlockMedia->addPageBlock($PageBlock);

                    $added++;
                }else{
                    $ignored++;
                }

                $em->persist($BlockMedia);
            }

            if(!$this->test){
                $em->flush();
            }

            if($added) $this->doWriteln($output, 'Migrated <info>' . $added . '</info> media rows.');
            if($ignored) $this->doWriteln($output, 'Ignored <info>' . $ignored . '</info> existing media rows.');
        }else{
            // Not found
            $this->doWriteln($output, '<info>No migrations needed.</info>');
        }
    }

    private function actionFixMultisiteUpdate($input, $output)
    {
        $em = $this->Container->get('doctrine.orm.entity_manager');

        try {
            $output->writeln('Migration AffiliateBundle to multisite');

            $Affiliates = $em->getRepository('TrinityAffiliateBundle:Categories')->findBySettings(null);

            $found = false;
            foreach($Affiliates as $A) {
                $Settings = $A->getLanguage()->getSettings()->first();

                $found = true;
                $A->setSettings($Settings);
                $em->persist($A);
            }
            if ($found && !$this->test) {
                $em->flush();
            }

            $output->writeln('');
        } catch (\Exception $e) {

        }

        try {
            $output->writeln('Migration AvgcheckBundle to multisite');

            $Avg = $em->getRepository('TrinityAvgcheckBundle:QuestionLists')->findBySettings(null);

            $Language = $em->getRepository('CmsBundle:Language')->findOneByLocale('nl');
            $Settings = $Language->getSettings()->first();

            $found = false;
            foreach($Avg as $A) {
                $found = true;
                $A->setLanguage($Language);
                $A->setSettings($Settings);
                $em->persist($A);
            }
            if ($found && !$this->test) {
                $em->flush();
            }

            $output->writeln('');
        } catch (\Exception $e) {

        }

        try {
            $output->writeln('Migration CarbuilderBundle to multisite');

            $Brand = $em->getRepository('TrinityCarbuilderBundle:Brand')->findBySettings(null);
            $Model = $em->getRepository('TrinityCarbuilderBundle:Model')->findBySettings(null);

            $found = false;
            foreach($Brand as $B) {
                $Settings = $B->getLanguage()->getSettings()->first();
                $found = true;
                $B->setSettings($Settings);
                $em->persist($B);
            }
            foreach($Model as $M) {
                $Settings = $M->getLanguage()->getSettings()->first();
                $found = true;
                $M->setSettings($Settings);
                $em->persist($M);
            }
            if ($found && !$this->test) {
                $em->flush();
            }

            $output->writeln('');
        } catch (\Exception $e) {

        }

        try {
            $output->writeln('Migration CatalogBundle to multisite');

            $Category = $em->getRepository('TrinityCatalogBundle:Category')->findBySettings(null);
            $Product = $em->getRepository('TrinityCatalogBundle:Product')->findBySettings(null);

            $found = false;
            foreach($Category as $C) {
                $Settings = $C->getLanguage()->getSettings()->first();
                $found = true;
                $C->setSettings($Settings);
                $em->persist($C);
            }
            foreach($Product as $P) {
                $Settings = $P->getLanguage()->getSettings()->first();
                $found = true;
                $P->setSettings($Settings);
                $em->persist($P);
            }
            if ($found && !$this->test) {
                $em->flush();
            }

            $output->writeln('');
        } catch (\Exception $e) {

        }

        try {
            $output->writeln('Migration ExpertiseBundle to multisite');

            $Expertise = $em->getRepository('TrinityExpertiseBundle:Expertises')->findBySettings(null);

            $found = false;
            foreach($Expertise as $E)
            {
                $Settings = $E->getLanguage()->getSettings()->first();

                $found = true;
                $E->setSettings($Settings);
                $em->persist($E);
            }
            if ($found && !$this->test) {
                $em->flush();
            }

            $output->writeln('');
        } catch (\Exception $e) {

        }

        try {
            $output->writeln('Migration SliderBundle to multisite');

            $Sliders = $em->getRepository('TrinitySliderBundle:Slider')->findBySettings(null);

            $found = false;
            foreach($Sliders as $S)
            {
                $Settings = $S->getLanguage()->getSettings()->first();

                $found = true;
                $S->setSettings($Settings);
                $em->persist($S);
            }
            if ($found && !$this->test) {
                $em->flush();
            }

            $output->writeln('');
        } catch (\Exception $e) {

        }


        try {
            $output->writeln('Migration EventsBundle to multisite');

            $Events = $em->getRepository('TrinityEventsBundle:Event')->findBySettings(null);

            $found = false;
            foreach($Events as $E)
            {
                $Settings = $E->getLanguage()->getSettings()->first();

                $found = true;
                $E->setSettings($Settings);
                $em->persist($E);
            }
            if ($found && !$this->test) {
                $em->flush();
            }

            $entities = $em->getRepository('TrinityEventsBundle:Category')->findBySettings(null);

            $found = false;
            foreach($entities as $entity)
            {
                $Settings = $entity->getLanguage()->getSettings()->first();

                $found = true;
                $entity->setSettings($Settings);
                $em->persist($entity);
            }
            if ($found && !$this->test) {
                $em->flush();
            }

            $output->writeln('');
        } catch (\Exception $e) {

        }

        try {
            $output->writeln('Migration InterestBundle to multisite');

            $Interest = $em->getRepository('TrinityInterestBundle:Interest')->findBySettings(null);

            $found = false;
            foreach($Interest as $I)
            {
                $Settings = $I->getLanguage()->getSettings()->first();

                $found = true;
                $I->setSettings($Settings);
                $em->persist($I);
            }
            if ($found && !$this->test) {
                $em->flush();
            }

            $output->writeln('');
        } catch (\Exception $e) {

        }


        try {
            $output->writeln('Migration LocationBundle to multisite');

            $Location = $em->getRepository('TrinityLocationBundle:Location')->findBySettings(null);

            $Language = $em->getRepository('CmsBundle:Language')->findOneByLocale('nl');
            $Settings = $Language->getSettings()->first();

            $found = false;
            foreach($Location as $L)
            {
                $found = true;
                $L->setLanguage($Language);
                $L->setSettings($Settings);
                $em->persist($I);
            }
            if ($found && !$this->test) {
                $em->flush();
            }

            $output->writeln('');
        } catch (\Exception $e) {

        }

        try {
            $output->writeln('Migration ProjectliteBundle to multisite');

            $entities = $em->getRepository('TrinityProjectenliteBundle:Project')->findBySettings(null);

            $found = false;
            foreach($entities as $entity)
            {
                $Settings = $entity->getLanguage()->getSettings()->first();

                $found = true;
                $entity->setSettings($Settings);
                $em->persist($entity);
            }
            if ($found && !$this->test) {
                $em->flush();
            }

            $entities = $em->getRepository('TrinityProjectenliteBundle:Category')->findBySettings(null);

            $found = false;
            foreach($entities as $entity)
            {
                $Settings = $entity->getLanguage()->getSettings()->first();

                $found = true;
                $entity->setSettings($Settings);
                $em->persist($entity);
            }
            if ($found && !$this->test) {
                $em->flush();
            }

            $output->writeln('');
        } catch (\Exception $e) {

        }


        // merken (meerdere entities)
        try {
            $output->writeln('Migration MerkenBundle to multisite');

            $entities = $em->getRepository('TrinityMerkenBundle:Config')->findBySettings(null);

            $found = false;
            foreach($entities as $entity)
            {
                $Language = $em->getRepository('CmsBundle:Language')->findOneByLocale('nl');
                $Settings = $Language()->getSettings()->first();

                $found = true;
                $entity->setLanguage($Language);
                $entity->setSettings($Settings);
                $em->persist($entity);
            }
            if ($found && !$this->test) {
                $em->flush();
            }

            $output->writeln('');
        } catch (\Exception $e) {

        }


        try {
            $output->writeln('Migration MedewerkersBundle to multisite');

            $entities = $em->getRepository('TrinityMedewerkersBundle:Config')->findBySettings(null);

            $found = false;
            foreach($entities as $entity)
            {
                $Settings = $entity->getLanguage()->getSettings()->first();

                $found = true;
                $entity->setSettings($Settings);
                $em->persist($entity);
            }
            if ($found && !$this->test) {
                $em->flush();
            }

            $output->writeln('');
        } catch (\Exception $e) {

        }


        try {
            $output->writeln('Migration PortfolioBundle to multisite');

            $entities = $em->getRepository('TrinityPortfolioBundle:Portfolio')->findBySettings(null);

            $found = false;
            foreach($entities as $entity)
            {
                $Language = $em->getRepository('CmsBundle:Language')->findOneByLocale('nl');
                $Settings = $Language->getSettings()->first();

                $found = true;
                $entity->setLanguage($Language);
                $entity->setSettings($Settings);
                $em->persist($entity);
            }
            if ($found && !$this->test) {
                $em->flush();
            }

            $output->writeln('');
        } catch (\Exception $e) {

        }

        try {
            $output->writeln('Migration RegistrationBundle to multisite');

            $entities = $em->getRepository('TrinityRegistrationBundle:Config')->findBySettings(null);

            $found = false;
            foreach($entities as $entity)
            {
                $Settings = $entity->getLanguage()->getSettings()->first();

                $found = true;
                $entity->setSettings($Settings);
                $em->persist($entity);
            }

            $entities = $em->getRepository('TrinityRegistrationBundle:Type')->findBySettings(null);

            $found = false;
            foreach($entities as $entity)
            {
                $Settings = $entity->getLanguage()->getSettings()->first();

                $found = true;
                $entity->setSettings($Settings);
                $em->persist($entity);
            }

            $entities = $em->getRepository('TrinityRegistrationBundle:Registration')->findBySettings(null);

            $found = false;
            foreach($entities as $entity)
            {
                $Settings = $entity->getLanguage()->getSettings()->first();

                $found = true;
                $entity->setSettings($Settings);
                $em->persist($entity);
            }

            if ($found && !$this->test) {
                $em->flush();
            }

            $output->writeln('');
        } catch (\Exception $e) {

        }

        try {
            $output->writeln('Migration TagcloudBundle to multisite');

            $entities = $em->getRepository('TrinityTagcloudBundle:Category')->findBySettings(null);

            $found = false;
            foreach($entities as $entity)
            {
                $Settings = $entity->getLanguage()->getSettings()->first();

                $found = true;
                $entity->setSettings($Settings);
                $em->persist($entity);
            }

            $entities = $em->getRepository('TrinityTagcloudBundle:Tag')->findBySettings(null);

            foreach($entities as $entity)
            {
                $Settings = $entity->getLanguage()->getSettings()->first();

                $found = true;
                $entity->setSettings($Settings);
                $em->persist($entity);
            }

            if ($found && !$this->test) {
                $em->flush();
            }

            $output->writeln('');
        } catch (\Exception $e) {

        }

        try {
            $output->writeln('Migration WtcBundle to multisite');

            $entities = $em->getRepository('TrinityWtcBundle:Expo')->findBySettings(null);

            $Language = $em->getRepository('CmsBundle:Language')->findOneByLocale('nl');
            $Settings = $Language->getSettings()->first();

            $found = false;
            foreach($entities as $entity)
            {
                $found = true;
                $entity->setLanguage($Language);
                $entity->setSettings($Settings);
                $em->persist($entity);
            }

            if ($found && !$this->test) {
                $em->flush();
            }

            $output->writeln('');
        } catch (\Exception $e) {

        }
    }

    private function doWriteln($output, $msg){
        $output->writeln(($this->test ? "<info>TEST:</info>\t" : '') . $msg);
    }
}
