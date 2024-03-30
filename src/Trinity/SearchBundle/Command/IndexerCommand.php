<?php
namespace App\Trinity\SearchBundle\Command;

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
use Symfony\Component\Routing\RouterInterface;

class IndexerCommand extends Command
{
    private $input;
    private $output;
    private $em;
    private $router;
    private $indexId;
	
	private $containerInterface = null;

	public function __construct(ContainerInterface $containerInterface){
        $this->containerInterface = $containerInterface;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('trinity:search:indexer')
            ->setDescription('Index search results')
            ->addArgument('bundle', InputArgument::OPTIONAL, 'Bundle to index')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $bundle = $input->getArgument('bundle');
        if($bundle){
            $bundle = strtolower($bundle);
            if($bundle != 'cms' && $bundle != 'trinity'){
                if(!preg_match('/bundle/', $bundle)){
                    $bundle = $bundle . 'bundle';
                }
            }
        }

        $this->indexId = date('YmdHis');
        
        $this->input   = $input;
        $this->output  = $output;
        $this->router  = $this->containerInterface->get('router');
        $this->em      = $this->containerInterface->get('doctrine.orm.entity_manager');

        $v = null;
        $versionFile = $this->containerInterface->get('kernel')->getProjectDir() . '/src/CmsBundle/VERSION';
        if (file_exists($versionFile)) {
            $versionEntries = file($versionFile);
            $v        = trim($versionEntries[0]);
        }

        if($bundle && $bundle != 'cms' && $bundle != 'trinity'){
            $bundleList = [];
        }else{
    		$bundleList = [
                'cms' => $v
            ];
        }

        if($bundle != 'cms' && $bundle != 'trinity'){
            $this->output->writeln('');
            $this->output->writeln('Searching for indexable bundles...');
            $this->output->writeln('');

            $bundleDir = $this->containerInterface->get('kernel')->getProjectDir() . '/src/Trinity/';
            foreach(scandir($bundleDir) as $d){
                if($bundle == null || strtolower($d) == $bundle){
                    $path = $bundleDir . $d;
                    if(is_dir($path) && !in_array($d, ['.', '..'])){
                        if(file_exists($path . '/Classes/Indexer.php')){
                            $v = '<error>Version unknown</error>';
                            $versionFile = $path . '/VERSION';
                            if (file_exists($versionFile)) {
                                $versionEntries = file($versionFile);
                                $v = trim($versionEntries[0]);
                            }
                            $bundleList[$d] = $v;
                        }
                    }
                }
            }
        }

        foreach($bundleList as $bundle => $version){
            $this->output->writeln('Indexing <info>' . $bundle . '</info> (' . $version . ') ...');
            if($bundle == 'cms'){
                $class = "App\\CmsBundle\Classes\Indexer";
            }else{
                $class = "App\\Trinity\\" . $bundle . "\Classes\Indexer";
            }
            $BundleIndexer = new $class();

            $t = time();
            $this->runIndexer($BundleIndexer, $bundle);
            $diff = round((time() - $t), 1);

            $this->output->writeln('');
            $this->output->writeln("\t" . '<info>INDEX TOOK ' . $diff . ' SECONDS</info>');
        }

        $this->output->writeln('');

        return Command::SUCCESS;
    }

    private function runIndexer($Indexer, $bundle){
        $request = new \Symfony\Component\HttpFoundation\Request();

        $didRemove = false;
        $indexes = $this->em->getRepository('TrinitySearchBundle:SearchIndex')->findByBundle($bundle);
        foreach($indexes as $index){
            $this->em->remove($index);
            $didRemove = true;
        }
        if($didRemove) {
            $this->em->flush();
        }

        $results = $Indexer->index($this->output, $this->em, $this->getApplication()->getKernel()->getContainer(), $request, $this->router, $this->indexId);

        if($bundle != 'cms' && $bundle != 'trinity' && is_array($results) && !empty($results)){
            foreach ($results as $result) {
                // $SearchIndex = $this->em->getRepository('TrinitySearchBundle:SearchIndex')->findOneBy(['object' => $result['object'], 'object_id' => $result['id']]);
                // if(empty($SearchIndex)){
                $SearchIndex = new \App\Trinity\SearchBundle\Entity\SearchIndex();

                $SearchIndex->setBundle($bundle);
                // settings
                if(!empty($result['category'])){
                    $SearchIndex->setCategory($result['category']);
                }
                if(!empty($result['extra'])){
                    $SearchIndex->setExtra($result['extra']);
                }
                if (!empty($result['extra_ranking'])) {
                    $SearchIndex->setLabelRating($result['extra_ranking']);
                }
                $SearchIndex->setLabel($result['title']);
                if (!empty($result['title_ranking'])) {
                    $SearchIndex->setLabelRating($result['title_ranking']);
                }
                $SearchIndex->setSize($result['size']);
                $SearchIndex->setUri($result['uri']);
                $SearchIndex->setContent($result['content']);
                if (!empty($result['content_ranking'])) {
                    $SearchIndex->setLabelRating($result['content_ranking']);
                }
                $SearchIndex->setObject($result['object']);
                $SearchIndex->setObjectId($result['id']);
                $SearchIndex->setLanguage($result['language']);
                if (empty($result['settings'])) {
                    $SearchIndex->setSettings($result['language']->getSettings()->first());
                } else {
                    $SearchIndex->setSettings($result['settings']);
                }
                $SearchIndex->setSecondExtra(!empty($result['secondExtra']) ? $result['secondExtra'] : '');
                if (!empty($result['secondExtra_ranking'])) {
                    $SearchIndex->setLabelRating($result['secondExtra_ranking']);
                }
                $SearchIndex->setThirdExtra(!empty($result['thirdExtra']) ? $result['thirdExtra'] : '');

                $SearchIndex->setIndexId($this->indexId);

                // Thumbnail
                if(!empty($result['media']) && is_numeric($result['media'])){
                    $Media = $this->em->getRepository('CmsBundle:Media')->find($result['media']);
                    $SearchIndex->setMedia($Media);
                }
                if(!empty($result['mediaUrl'])){
                    $SearchIndex->setMediaUrl($result['mediaUrl']);
                }

                $this->em->persist($SearchIndex);
                // $this->em->flush();

                unset($result);
                unset($SearchIndex);
            }

            $this->em->flush();
        }
    }
}

class Request{
    public function getHttpHost(){
        return '';
    }
    public function getRequestUri(){
        return '';
    }
    public function get($param){
        return '';
    }
    public function getSession($param = null){
        return new Session;
    }
    public function setLocale($param = null){
        return null;
    }
}

class Session{
    public function get($param = null){
        return null;
    }
    public function set($param = null, $value = null){
        return null;
    }
}
