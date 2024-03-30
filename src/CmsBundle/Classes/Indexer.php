<?php
namespace App\CmsBundle\Classes;

use Symfony\Component\Console\Output\OutputInterface;
use App\Trinity\SearchBundle\Entity\SearchIndex;

class Indexer
{

	private $request = null;
	private $container = null;
	private $em = null;
	private $router = null;

	public function index(OutputInterface $output, $em, $container, $request, $router, $indexId){

		$this->request = $request;
		$this->container = $container;
		$this->em = $em;
		$this->router = $router;

		$return_results = [];

		$output->writeln('');

		$all_settings = $em->getRepository('CmsBundle:Settings')->findAll();
		foreach($all_settings as $Settings){

			$Language = $Settings->getLanguage();

			$output->writeln('');

			if(!empty($Settings)){
				$bareHost = $Settings->getHost();
                $baseURI = $Settings->getBaseUri();

				if(!empty($bareHost) && empty($baseURI)){
					$host = 'http://' . $bareHost;
					if($Settings){
						$output->writeln('LANGUAGE' . "\t" . '<info>' . $Language->getLabel() . '</info> with label <info>' . $Settings->getLabel() . '</info>');
						$output->writeln('BASE URL' . "\t" . '<info>' . $host . '</info>');
						$output->writeln('');

						$pages = $em->getRepository('CmsBundle:Page')->findBy(['enabled' => true, 'language' => $Language]);
						foreach($pages as $Page){

							if(!empty($Page->getAccess())){
								$output->writeln("\t" . 'IGNORE page <info>' . $Page->getLabel() . '</info> with URL <info>' . $url . '</info> ' . $Page->getId() . ': Page has access control');
								continue;
							}

							if(!empty($Page->getPageType())){
								$output->writeln("\t" . 'IGNORE page <info>' . $Page->getLabel() . '</info> with URL <info>' . $url . '</info> ' . $Page->getId() . ': Page has relation to: ' . $Page->getPageType() . (!empty($Page->getCustomUrl()) ? ': ' . $Page->getCustomUrl() : ''));
								continue;
							}

							/*if(!empty($Page->getPage()) && !$Page->getPage()->getEnabled()){
								$output->writeln("\t" . '<error>Ignore page ' . $Page->getLabel() . ' with URL ' . $url . ' ' . $Page->getId() . ' (parent #' . $Page->getPage()->getId() . ' is disabled)</error>');
								continue;
							}*/

							if(empty($Page->getSlugKey()))continue;
							$uri = $this->router->generate($Page->getSlugKey());
							$url = $host . $uri;

							$output->writeln("\t" . 'Parsing page <info>' . $Page->getLabel() . '</info> with URL <info>' . $url . '</info> ' . $Page->getId());

							$content = '';
							$content = $this->scrapeContent($url);

							$result = [
								'category' => 'Pagina\'s',
								'title'    => $Page->getLabel(),
								'content'  => $content,
								'size'     => strlen($content),
								'uri'      => $uri,
								'object'   => '\\CmsBundle\\Page',
								'id'       => $Page->getId(),
								'language' => $Language,
								'settings' => $Page->getSettings(),
							];

							$output->writeln("\t\t" . 'Found content <info>' . strlen($content) . ' bytes</info>');


			                // $SearchIndex = $this->em->getRepository('TrinitySearchBundle:SearchIndex')->findOneBy(['object' => $result['object'], 'object_id' => $result['id']]);
			                // if(empty($SearchIndex)){
			                $SearchIndex = new SearchIndex();
			                // }

			                $SearchIndex->setBundle('cms');
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
			                $SearchIndex->setIndexId($indexId);

			                // Thumbnail
			                if(!empty($result['media']) && is_numeric($result['media'])){
			                    $Media = $this->em->getRepository('CmsBundle:Media')->find($result['media']);
			                    $SearchIndex->setMedia($Media);
			                }
			                if(!empty($result['mediaUrl'])){
			                    $SearchIndex->setMediaUrl($result['mediaUrl']);
			                }

			                $this->em->persist($SearchIndex);
						}
		                $this->em->flush();
					}else{
						$output->writeln('<error>ERROR: no settings found</error> for the language <info>' . $Language->getLabel() . '</info> with label <info>' . $Settings->getLabel() . '</info>.');
					}
				} elseif (!empty($baseURI)) {
                    // baseURI
                    // cycle $languages for a Settings with host
                    /*$bareHost = null;
                    foreach($all_settings as $S) {
                        if (!empty($S->getHost())) {
                            $bareHost = $S->getHost();
                        }
                    }*/

                    $bareHost = $Settings->getHost();

                    $host = 'http://' . $bareHost;
					if(!empty($bareHost)){
						$output->writeln('LANGUAGE' . "\t" . '<info>' . $Language->getLabel() . '</info> with label <info>' . $Settings->getLabel() . '</info>');
						$output->writeln('BASE URI' . "\t" . '<info>' . $host . $baseURI . '</info>');
						$output->writeln('');

						$pages = $em->getRepository('CmsBundle:Page')->findBy(['enabled' => true, 'visible' => true, 'language' => $Language, 'settings' => $Settings]);
						foreach($pages as $Page){

							$uri = $this->router->generate($Page->getSlugKey());
							$url = $host . $uri;

							$output->writeln("\t" . 'Parsing page <info>' . $Page->getLabel() . '</info> with URL <info>' . $url . '</info> ' . $Page->getId());

							$content = '';
							$content = $this->scrapeContent($url);

							$result = [
								'category' => 'Pagina\'s',
								'title'    => $Page->getLabel(),
								'content'  => $content,
								'size'     => strlen($content),
								'uri'      => $uri,
								'object'   => '\\CmsBundle\\Page',
								'id'       => $Page->getId(),
								'language' => $Language,
								'settings' => $Page->getSettings(),
							];

							$output->writeln("\t\t" . 'Found content <info>' . strlen($content) . ' bytes</info>');

							
			                $SearchIndex = new SearchIndex();

			                $SearchIndex->setBundle('cms');
			                if(!empty($result['category'])){ $SearchIndex->setCategory($result['category']); }
			                if(!empty($result['extra'])){ $SearchIndex->setExtra($result['extra']); }
			                if (!empty($result['extra_ranking'])) { $SearchIndex->setLabelRating($result['extra_ranking']); }
			                $SearchIndex->setLabel($result['title']);
			                if (!empty($result['title_ranking'])) { $SearchIndex->setLabelRating($result['title_ranking']); }
			                $SearchIndex->setSize($result['size']);
			                $SearchIndex->setUri($result['uri']);
			                $SearchIndex->setContent($result['content']);
			                if (!empty($result['content_ranking'])) { $SearchIndex->setLabelRating($result['content_ranking']); }
			                $SearchIndex->setObject($result['object']);
			                $SearchIndex->setObjectId($result['id']);
			                $SearchIndex->setLanguage($result['language']);
			                if (empty($result['settings'])) { $SearchIndex->setSettings($result['language']->getSettings()->first()); } else { $SearchIndex->setSettings($result['settings']); }
			                $SearchIndex->setSecondExtra(!empty($result['secondExtra']) ? $result['secondExtra'] : '');
			                if (!empty($result['secondExtra_ranking'])) { $SearchIndex->setLabelRating($result['secondExtra_ranking']); }
			                $SearchIndex->setIndexId($indexId);

			                // Thumbnail
			                if(!empty($result['media']) && is_numeric($result['media'])){
			                    $Media = $this->em->getRepository('CmsBundle:Media')->find($result['media']);
			                    $SearchIndex->setMedia($Media);
			                }
			                if(!empty($result['mediaUrl'])){
			                    $SearchIndex->setMediaUrl($result['mediaUrl']);
			                }

			                $this->em->persist($SearchIndex);
						}
						$this->em->flush();
					}else{
						$output->writeln('<error>ERROR: Could not find a host to match with the baseUri found</error> for the language <info>' . $Language->getLabel() . '</info> with label <info>' . $Settings->getLabel() . '</info>.');
					}
                }else{
					$output->writeln('<error>ERROR: no host or baseuri found in settings</error> <info>#' . $Settings->getId() . '</info> for the language <info>' . $Language->getLabel() . '</info> with label <info>' . $Settings->getLabel() . '</info>.');
				}
			}else{
				$output->writeln('<error>ERROR: no settings found</error> for the language <info>' . $Language->getLabel() . '</info> with label <info>' . $Settings->getLabel() . '</info>.');
			}
		}

		$output->writeln('');

		return $return_results;
	}

	private function scrapeContent($url){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');
		$response = curl_exec($ch);
		curl_close($ch);

		$return = '';

		// Filter sections
		if($response){
			if(preg_match_all('/(<section.*?>)(.*?)<\/section>/sim', $response, $matches)){
				foreach($matches[1] as $index => $sectionTag){
					if(!preg_match('/navbar|footer|search_bundle|breadcrumbs|subnavbar/', $sectionTag)){
						$sectionBody = $matches[2][$index];
						$sectionBody = preg_replace('/(<script.*?>)(.*?)<\/script>/sim', '', $sectionBody);
						$sectionBody = preg_replace('/(<form.*?>)(.*?)<\/form>/sim', '', $sectionBody);
						$sectionBody = strip_tags($sectionBody);
						$sectionBody = preg_replace("/\n|\r|\t/", '', $sectionBody);
						$sectionBody = preg_replace("/\s+/", ' ', $sectionBody);
						$return .= $sectionBody;
					}
				}
			}
		}

		return $return;
	}

}
