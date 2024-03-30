<?php
namespace App\Trinity\BlogBundle\Classes;

use Symfony\Component\Console\Output\OutputInterface;

class Indexer
{
	private $request = null;
	private $container = null;
	private $em = null;
	private $router = null;

	public function index(OutputInterface $output, $em, $container, $request, $router)
        {
            $this->request = $request;
            $this->container = $container;
            $this->em = $em;
            $this->router = $router;

            $output->writeln('');

            $return_results = [];

            $langPages = [];
            $cblock = [];
            $l = $em->getRepository('CmsBundle:Language')->findAll();
            foreach($l as $lang){
                $blocks = $em->getRepository('CmsBundle:PageBlock')->findByData('TrinityBlogBundle', 'is_overview');
                foreach($blocks as $Block){
                    $p = $Block->getWrapper()->getPage();
                    if($p->getLanguage() == $lang){
                        $cblock[$lang->getId()] = $Block;
                        $langPages[$lang->getId()] = $p;
                    }
                }
            }

            foreach($langPages as $langId => $Page){

                if(!empty($cblock[$langId])){
                    $Language = $em->getRepository('CmsBundle:Language')->find($langId);
                    $data = json_decode($cblock[$langId]->getBundleData(), true);
                    if(!empty($data['id'])){
                        $pageurl = $this->container->get('router')->generate($Page->getSlugKey());

                        $Blog = $em->getRepository('TrinityBlogBundle:Blog')->findOneBy(['language' => $Language, 'id' => $data['id']]);
                        if(!empty($Blog)){
                            foreach($Blog->getEntries() as $Entry){
                                if($Entry->getConcept()) continue;
                                $output->writeln("\t" . 'Parsing entry <info>' . $Entry->getLabel() . '</info> ' . $Entry->getId());

                                $content = $Entry->getLabel() . ' - ' . $Entry->getIntro() . ' - ' . $Entry->getBody() . ' - ' . $Entry->getSubtitle();

                                $uri = $Entry->getId() . '/' . $Entry->getDefaultSlug();
                                if(!empty($Entry->getSlug())){
                                    $uri = $Entry->getSlug();
                                }

                                $return_results[] = [
                                    'category' => 'Nieuws',
                                    'title'    => $Entry->getLabel(),
                                    'content'  => $content,
                                    'size'     => strlen($content),
                                    'uri'      => $pageurl . '/' . $uri,
                                    'object'   => '\\Trinity\\BlogBundle\\Entry',
                                    'id'       => $Entry->getId(),
                                    'language' => $Blog->getLanguage(),
                                ];
                            }
                        }
                    }
                }
            }

            $output->writeln('');

            return $return_results;
	}
}
