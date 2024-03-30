<?php

namespace App\CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\Routing\RouteCollection;
use App\CmsBundle\Entity\Log;

class JsonController extends StorageController
{
	/**
	 * @Route("/admin/json/{caller}/{param1}/{param2}/{param3}", name="_adminjson")
	 */
	public function ajaxAction(Request $Request, $caller = null, $param1 = null, $param2 = null, $param3 = null)
	{
        parent::init($Request);

		$em = $this->getDoctrine()->getManager();

		if ($Request->isXMLHttpRequest()) {
			if( $caller !== null ){

		        // Invalidate cache
		        /*$em = $this->getDoctrine()->getManager();
		        $Settings = $em->getRepository('CmsBundle:Settings')->findByLanguage($this->language);
		        $Settings->setCacheInvalidated(true);
		        $em->persist($Settings);
		        $em->flush();*/

				switch( $caller ){
					case 'pagesort':
						if( !empty($_POST['post']) ){
							$sortid = 0;
							foreach($_POST['post'] as $index => $pagePos){
								if(isset($pagePos['id']) && (int)$pagePos['id'] > 0){
									$Parent = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneById((int)$pagePos['parent_id']);
									$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneById((int)$pagePos['id']);
									$Page->setPage($Parent)->setSort($sortid);

						            $em->persist($Page);
						            $em->flush();

									$sortid++;
								}
							}

							// Send slugs and urls back to template for refreshing new paths
							$slugpaths = array();
							$slugurls = array();
							foreach($_POST['post'] as $index => $pagePos){
								if(isset($pagePos['id']) && (int)$pagePos['id'] > 0){
									$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneById((int)$pagePos['id']);
						            $slugpaths[$Page->getId()] = $this->getDoctrine()->getRepository('CmsBundle:Page')->getSlugPathByPage($Page);
						            $slugurls[$Page->getId()] = $this->generateUrl('homepage') . $slugpaths[$Page->getId()];
								}
							}

				            // Clear cache
					        // $this->clearcacheAction();

					        return new JsonResponse(array('result' => 'success', 'slugpaths' => $slugpaths, 'slugurls' => $slugurls));
						}
						return new JsonResponse(array('result' => 'invalid'));
					case 'page':
						switch( $param1 ){
							case 'savesbs':
								$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneById((int)$param2);
					            $Page->setContent($_POST['content']);
								$em->persist($Page);
					            $em->flush();

					            // Clear cache
					            // $this->clearcacheAction();
					            break;
							case 'savefront':
								$func = null;
								$pageid = null;
								$type = null;
								if(preg_match('/^(pageid|contentid|title)-\d+/', $_POST['editorID'], $m)){
									$type = $m[1];
									$pageid = str_replace($m[1] . '-', '', $_POST['editorID']);
									switch ($m[1]) {
										case 'title': $func = 'setTitle'; break;
										case 'pageid':
										case 'contentid': $func = 'setContent'; break;
									}
								}

								$Language = $em->getRepository('CmsBundle:Language')->findOneByLocale($Request->getLocale());

								if($pageid != null && $func != null){
									if($func == 'setContent'){
										if($type == 'pageid'){
											$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->find((int)$pageid);
											$PageContent = new \App\CmsBundle\Entity\PageContent();

											$PageContent->setLanguage($Language);
											$PageContent->setContent($_POST['editabledata']);
						                    $PageContent->setPage($Page);

						                    $em->persist($PageContent);
										}else{
											$PageContent = $this->getDoctrine()->getRepository('CmsBundle:PageContent')->find((int)$pageid);
											if(!empty($PageContent)){
												$next_rev = ((int)$PageContent->getRevision() + 1);

							                    if($_POST['editabledata'] != $PageContent->getContent()){
							                        // Content has changed
							                        /*$PageContentRevision = clone $PageContent;
							                        $PageContentRevision->setContent($_POST['editabledata']);
							                        $PageContentRevision->setRevision($next_rev);
							                        $PageContentRevision->setPublished(false);

							                        $em->persist($PageContentRevision);*/

							                        // Content has changed
							                        $PageContent->setContent($_POST['editabledata']);

							                        $em->persist($PageContent);
							                    }
											}
										}
									}else{
										$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->find((int)$pageid);
							            $Page->$func($_POST['editabledata']);
										$em->persist($Page);
									}
						            $em->flush();

						            // Clear cache
						            // $this->clearcacheAction();
						        }
					            break;
							case 'availability':
								$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneById((int)$param2);
								$Page->setEnabled($param3 == 'on');
								$em->persist($Page);
					            $em->flush();
					            $this->clearNavCache();
					            break;
							case 'visibility':
								$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneById((int)$param2);
								$Page->setVisible($param3 == 'on');
								$em->persist($Page);
					            $em->flush();
								$this->resetPageCacheThatContainedBundle(null, $this->Settings);
					            $this->clearNavCache();
					            break;
							case 'pagecache':
								$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneById((int)$param2);
								$Page->setCache(($param3 == 'on' ? true : false));
								$Page->setCacheData(null);
								$em->persist($Page);
					            $em->flush();
								$this->resetPageCacheThatContainedBundle(null, $this->Settings);
					            $this->clearNavCache();
								break;
							case 'pagecacheall':
								$this->resetPageCacheThatContainedBundle(null, $this->Settings);
								break;
							case 'pagecritical':
								$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneById((int)$param2);
								
								$Page->setCritical(($param3 == 'on' ? true : false));
								$Page->setCricitalCss(null);
								$em->persist($Page);
					            $em->flush();
								
								// static?
								// Request async critical CSS request
								if ($Page->getEnabled() && $Page->getCritical())
								{
									$cssSuccess = false;

									$criticalHost = 'https://critical.beyonitdev.nl';
									if(!empty($_ENV['CRITICAL_HOST'])){
										$criticalHost = $_ENV['CRITICAL_HOST'];
									}

									try {
										$pageSlug = $this->generateUrl($Page->getSlugKey());
										$pageSlug = str_replace('app_dev.php/', '', $pageSlug);

										$host = '';
										if($this->Settings->getHost()){

											$www = '';
											if(preg_match('/www/', $Request->getHttpHost())){
												// Contains www
												$www = 'www.';
											}

											if($Request->isSecure()){
												$host = 'https://' . $www . $this->Settings->getHost();
											}else{
												$host = 'http://' . $www . $this->Settings->getHost();
											}
										}

										$postArray = [
											'remoteUrl'		=> $host,
											'criticalUrl'	=> $host . $pageSlug,
											'pageId'		=> $Page->getId(),
											'token'			=> '!Uv7JHmrR*A9@sy._WzFr*7rqnrvkjR@',
										];

										$ch = curl_init();
										curl_setopt($ch, CURLOPT_URL, $criticalHost);
										curl_setopt($ch, CURLOPT_POST, true);
										curl_setopt($ch, CURLOPT_POSTFIELDS, $postArray);
										curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
										curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

										$data = curl_exec($ch);
										$info = curl_getinfo($ch);

										if (isset($info['http_code']) and $info['http_code'] == 200)
										{
											$data = json_decode($data, true);
											if (isset($data['status']) && $data['status'] == 'true') {
												$cssSuccess = true;
											}
										}

										curl_close($ch);
									} catch (Exception $ex) {
										//dump('cacht');die();
									} finally {
										$Syslog = new Log();
										$Syslog->setUser($this->getUser());
										$Syslog->setUsername($this->getUser()->getUsername());
										$Syslog->setType('page');
										$Syslog->setStatus('info');
										$Syslog->setObjectId($Page->getId());
										$Syslog->setSettings($this->Settings);
										if ($cssSuccess) {
											$Syslog->setAction('success');
											$Syslog->setMessage('Pagina \'' . $Page->getLabel() . '\' critical css aangevraagd.');
										} else {
											$Syslog->setAction('failed');
											$Syslog->setMessage('Pagina \'' . $Page->getLabel() . '\' critical css aanvraag mislukt.');
										}
										$this->em->persist($Syslog);
										$this->em->flush();
									}
								}

					            $this->clearNavCache();
								break;
							default: break;
						}
						return new JsonResponse(array('result' => 'success'));
						break;
					default: break;
				}
			}
			return new JsonResponse(array('result' => 'Called: ' . $caller));
		}
		return new Response('This is not ajax!', 400);
	}

	private function clearNavCache(){


        $realCacheDir = $this->containerInterface->getParameter('kernel.cache_dir');

        // Page caching in prod
        $pageCacheFile = str_replace('/dev', '/prod', $realCacheDir) . '/';
        foreach(scandir($pageCacheFile) as $f){
            if(is_file($pageCacheFile . $f) && preg_match('/page_structure$/', $f)){
                if(file_exists($pageCacheFile . $f)){
                    unlink($pageCacheFile . $f); // Relete cache file
                }
            }
        }
	}

    /**
     * Clear Symfony cache
     *
     * @return Response
     */
    /*public function clearcacheAction(){
        $kernel = $this->containerInterface->get('kernel');
        $application = new \Symfony\Bundle\FrameworkBundle\Console\Application($kernel);
        $application->setAutoExit(false);
        $options = array('command' => 'cache:clear',"--env" => 'prod', '--no-warmup' => true);
        $application->run(new \Symfony\Component\Console\Input\ArrayInput($options));
        return new Response();
    }*/
}
