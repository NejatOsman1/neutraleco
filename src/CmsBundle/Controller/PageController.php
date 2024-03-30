<?php

namespace App\CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\HttpKernel\EventListener\AbstractSessionListener;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

/* Required for file upload */
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/* Serializer components */
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;

use App\CmsBundle\Entity\Page;
use App\CmsBundle\Entity\Tag;
use App\CmsBundle\Entity\PageBlock;
use App\CmsBundle\Entity\PageBlockWrapper;

use App\CmsBundle\Entity\Log;
use App\CmsBundle\Util\Mailer;
use Twig\Environment;

class PageController extends StorageController
{
	/**
	 * @Route("/admin/page/save/front", name="admin_page_save_front")
	 * @Template()
	 */
	public function saveFrontAction(Request $request)
	{
		parent::init($request);

		$status = 200;
		$message = '';

		$em = $this->getDoctrine()->getManager();

		if(!empty($_POST['b'])){
			// Blocks
			foreach($_POST['b'] as $block_id => $fields){
				$Block = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->find($block_id);
				if($Block){
					foreach($fields as $name => $value){
						if($name == 'content'){
							$Block->setContent($value);
						}
					}
					$em->persist($Block);
				}
			}
		}

		$em->flush();

		return new JsonResponse([
			'status' => $status,
			'message' => $message,
		]);
	}

	/**
	 * @Route("/admin/page", name="admin_page")
	 * @Template()
	 */
	public function indexAction(Request $request)
	{
		parent::init($request);

		$allowCache = false; try{ $allowCache = $this->containerInterface->getParameter('trinity_cache'); }catch(\Exception $e){}
		if(!empty($_GET['nocache']) || !empty($_GET['resetcache']) || !empty($_GET['timer'])){
			$allowCache = false;
		}

		// Check permissions
		if(!$this->getUser()->checkPermissions('ALLOW_PAGE')){
			parent::test_permissions($request, $this->getUser());
			throw $this->createNotFoundException('This feature does not exist.');
		}

		$this->breadcrumbs->addRouteItem($this->trans("Pagina's", [], 'cms'), "admin_page");

		$em = $this->getDoctrine()->getManager();

		if(!empty($_POST)){


			if(!empty($_POST['bulk-ids'])){
				$ids = explode(',', $_POST['bulk-ids']);
				$action = $_POST['bulk-action'];

				foreach($ids as $id){
					$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->find($id);
					if(!empty($Page)){
						if($action == 'visible-on'){
							$Page->setVisible(true);
						}
						if($action == 'visible-off'){
							$Page->setVisible(false);
						}
						if($action == 'enabled-on'){
							$Page->setEnabled(true);
						}
						if($action == 'enabled-off'){
							$Page->setEnabled(false);
						}
						if ($action == 'pagecache-on') {
							$Page->setCache(true);
							$Page->setCacheData(null);
						}
						if ($action == 'pagecache-off') {
							$Page->setCache(false);
							$Page->setCacheData(null);
						}
						if ($action == 'pagecritical-on') {
							$Page->setCritical(true);
							$Page->setCricitalCss(null);

							$this->requestCriticalCss($request, $Page);
						}
						if ($action == 'pagecritical-off') {
							$Page->setCritical(false);
							$Page->setCricitalCss(null);
						}

						$em->persist($Page);
					}

					$em->flush();
				}

				header('Location: /bundles/cms/cache.php?url=' . urlencode($this->generateUrl('admin_page')));
				exit;
			}


			if(!empty($_POST['bulk'])){
				$bulk = trim($_POST['bulk']);

				// dump($bulk);die();

				$pageDepth = [];

				$sort = count($this->getDoctrine()->getRepository('CmsBundle:Page')->findAll());
				foreach(preg_split("/((\r?\n)|(\r\n?))/", $bulk) as $k => $line){
					$depth = strspn($line, "\t");
					$line = trim($line);

					if(substr($line, 0, 1) == '#') continue;
					
					// dump($depth . ': ' . $line);

					$slug = $this->toAscii($line);

					if($depth > 0){
						$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneBy(['page' => $pageDepth[($depth - 1)], 'slug' => $slug]);
					}else{
						$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneBy(['page' => null, 'slug' => $slug]); 
					}

					if(empty($Page)){
						// echo ( '<pre>' . print_r( (str_repeat('- ', $depth)) . 'NEW: ' . $depth . ': ' . $slug, 1 ) . '</pre>' );
						$Page = new Page();
						$Page->setLabel($line);
						$Page->setTitle($line);
						$Page->setLanguage($this->language);
						$Page->setSettings($this->Settings);
						$Page->setSort($sort);
						$Page->setEnabled(true);
						$Page->setVisible(false);
						$Page->setController('CmsBundle:Page:page');
						$Page->setSlug($slug);
						$Page->setSlugkey('pages_' . $Page->getSlug());
					}else{
						// echo ( '<pre>' . print_r( (str_repeat('- ', $depth)) . 'EXISTING: ' . $depth . ': ' . $slug, 1 ) . '</pre>' );
					}

					$em->persist($Page);

					$em->flush();


					if(!empty($depth)){
						$Page->setPage($pageDepth[($depth - 1)]);
						$pageDepth[$depth] = $Page;

						$em->persist($Page);
						$em->flush();
					}else{
						$pageDepth[0] = $Page;
					}

					$sort++;
				}

				header('Location: /bundles/cms/cache.php?url=' . urlencode($this->generateUrl('admin_page')));
				exit;
			}

			if(!empty($_POST['pagesort'])){
			$pagesort = json_decode($_POST['pagesort'], true);

			$sortid = 0;
			foreach($pagesort as $index => $pagePos){
				if(isset($pagePos['id']) && (int)$pagePos['id'] > 0){
					$Parent = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneById((int)$pagePos['parent_id']);

					if(is_array($Parent) && empty($Parent)){
						$Parent = null;
					}

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
			foreach($pagesort as $index => $pagePos){
				if(isset($pagePos['id']) && (int)$pagePos['id'] > 0){
					$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneById((int)$pagePos['id']);
					$slugpaths[$Page->getId()] = $this->getDoctrine()->getRepository('CmsBundle:Page')->getSlugPathByPage($Page);
					$slugurls[$Page->getId()] = $this->generateUrl('homepage') . $slugpaths[$Page->getId()];
				}
			}

			// Clear cache
			// $this->clearcacheAction();

			$Syslog = new Log();
			$Syslog->setUser($this->getUser());
			$Syslog->setUsername($this->getUser()->getUsername());
			$Syslog->setType('page');
			$Syslog->setStatus('info');
			$Syslog->setSettings($this->Settings);
			$Syslog->setAction('sort');
			$Syslog->setMessage('Pagina volgorde is gewijzigd.');
			$em->persist($Syslog);
			$em->flush();

			header('Location: /bundles/cms/cache.php?url=' . urlencode($this->generateUrl('admin_page')));
			exit;
		}
		}

		// Find first page
		$ActivePage = null;
		$tmp_pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(array('page' => null, 'language' => $this->language, 'settings' => $this->Settings), array('sort' => 'ASC'), 1);
		if(!empty($tmp_pages)){
			$ActivePage = $tmp_pages[0];
		}

		$pages = $this->getPagesByParentid();


		if(!empty($_GET['cloned'])){
			$ClonedPage = $this->getDoctrine()->getRepository('CmsBundle:Page')->find((int)$_GET['cloned']);
			$this->addFlash('', '<i class="material-icons left">check</i>' . $this->trans('Gekopieerd:', [], 'cms') . '&nbsp;<strong>' . $ClonedPage->getLabel() . '</strong>.');
			return $this->redirect($this->generateUrl('admin_page'));
		}

		$maxFileSize = 10;
		try{
			$maxFileSize = (int)ini_get('upload_max_filesize');
		}catch(\Exception $e){
			// Nothing going on here
		}

		/*return $this->parse('page', array(
			'pages' => $pages
		));*/
		return $this->attributes(array(
			'pages' => $pages,
			'allowCache' => $allowCache,
			'maxFileSize' => $maxFileSize,
			'ActivePage' => $ActivePage
		));
	}

	/**
	 * @Route("/admin/page/score/{pageid}", name="admin_page_score")
	 * @Template()
	 */
	public function scoreAction(Request $request, $pageid)
	{
		parent::init($request);

		// Check permissions
		if(!$this->getUser()->checkPermissions('ALLOW_PAGE')){
			parent::test_permissions($request, $this->getUser());
			throw $this->createNotFoundException('This feature does not exist.');
		}

		$this->breadcrumbs->addRouteItem($this->trans("Pagina's", [], 'cms'), "admin_page");

		$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->find($pageid);

		$parents = $Page->getParents();
		if(!empty($parents)){
			foreach(array_reverse($parents) as $Parent){
				$this->breadcrumbs->addRouteItem($Parent->getLabel(), "admin_page_edit", ['id' => $Parent->getId()]);
			}
		}

		$this->breadcrumbs->addRouteItem($Page->getLabel(), "admin_page_edit", ['id' => $Page->getId()]);
		$this->breadcrumbs->addRouteItem($this->trans('Score', [], 'cms'), "admin_page_score", ['pageid' => $Page->getId()]);

		$scores = $Page->getScores();

		return $this->attributes(array(
			'Page' => $Page,
			'scores' => $scores,
			'score' => $scores->first(),
		));
	}

	/**
	 * @Route("/admin/page/media/{pageid}", name="admin_page_media")
	 * @Template()
	 */
	public function mediaAction(Request $request, $pageid)
	{
		parent::init($request);

		$this->breadcrumbs->addRouteItem($this->trans("Pagina's", [], 'cms'), "admin_page");

		// Find first page
		$ActivePage = null;
		$tmp_pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(array('page' => null, 'language' => $this->language), array('sort' => 'ASC'), 1);
		if(!empty($tmp_pages)){
			$ActivePage = $tmp_pages[0];
		}

		$ParentPage = null;

		$pageSections = array();
		$pageBlockSections = array();
		$block_sections = array();
		$all_block_sections = [];

		$new = false;
		$addToParent = false;

		// Edit
		$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->find($pageid);

		if($Page->getLanguage() != $this->language){
			// Invalid page! STOP NOW!

			// Try to find alternative page
			$AltPage = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneBy(['slugkey' => $Page->getSlugKey(), 'language' => $this->language]);
			if(!empty($AltPage)){
				return $this->redirect($this->generateUrl('admin_page_edit', ['id' => $AltPage->getId()]));
			}else{
				return $this->redirect($this->generateUrl('admin_page'));
			}
		}

		$Page->setUrl($this->generateUrl('homepage') . $this->getDoctrine()->getRepository('CmsBundle:Page')->getSlugPathByPage($Page));

		$parents = $Page->getParents();
		if(!empty($parents)){
			foreach(array_reverse($parents) as $Parent){
				$this->breadcrumbs->addRouteItem($Parent->getLabel(), "admin_page_edit", ['id' => $Parent->getId()]);
			}
		}

		$this->breadcrumbs->addRouteItem($Page->getLabel(), "admin_page_edit", ['id' => $Page->getId()]);
		$this->breadcrumbs->addRouteItem($this->trans('Gekoppelde media', [], 'cms'), "admin_page_media", ['pageid' => $Page->getId()]);

		$usedMedia = $this->getDoctrine()->getRepository('CmsBundle:Page')->getUsedMedia($pageid);

		return $this->attributes([
			'usedMedia' => $usedMedia,
			'pageid' => $pageid,
		]);
	}

	/**
	 * @Route("/admin/page/media/download/{pageid}", name="admin_page_media_download")
	 * @Template()
	 */
	public function mediadownloadAction(Request $request, $pageid)
	{
		$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->find($pageid);
		$usedMedia = $this->getDoctrine()->getRepository('CmsBundle:Page')->getUsedMedia($pageid);

		$archive_file_name = 'media_tmp.zip';

		$zip = new \ZipArchive();
		//create the file and throw the error if unsuccessful
		if ($zip->open($archive_file_name, \ZipArchive::CREATE )!==TRUE) {
			exit("cannot open <$archive_file_name>\n");
		}



		foreach($usedMedia as $Media){
			$webdir = preg_replace('/^.*?\/public/', 'public', $Media->getAbsolutePath());
			$zip->addFile($Media->getAbsolutePath(),$webdir);

			$webdir_custom = preg_replace('/\/images\//', '/images/large/', $webdir);
			$zip->addFile($Media->getAbsolutePath('large'),$webdir_custom);

			$webdir_custom = preg_replace('/\/images\//', '/images/medium/', $webdir);
			$zip->addFile($Media->getAbsolutePath('medium'),$webdir_custom);

			$webdir_custom = preg_replace('/\/images\//', '/images/small/', $webdir);
			$zip->addFile($Media->getAbsolutePath('small'),$webdir_custom);

			$webdir_custom = preg_replace('/\/images\//', '/images/thumb/', $webdir);
			$zip->addFile($Media->getAbsolutePath('thumb'),$webdir_custom);

		}

		$zip->close();
		//then send the headers to force download the zip file
		header("Content-type: application/zip");
		header("Content-Disposition: attachment; filename=$archive_file_name");
		header("Content-length: " . filesize($archive_file_name));
		header("Pragma: no-cache");
		header("Expires: 0");
		readfile("$archive_file_name");
		exit;
	}

	/**
	 * @Route("/admin/page/selector/{type}", name="admin_page_selector")
	 * @Template()
	 */
	public function selectorAction(Request $request, $type = null)
	{
		parent::init($request);

		if($type != null){
			// Find first page
			$ActivePage = null;
			$tmp_pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(array('page' => null), array('sort' => 'ASC'), 1);
			if(!empty($tmp_pages)){
				$ActivePage = $tmp_pages[0];
			}

			return $this->attributes(array(
				'pages' => $this->getPagesByParentid(),
				'ActivePage' => $ActivePage,
				'type' => $type
			));
		}else{
			return $this->attributes(array());
		}
	}

	/**
	 * @Route("/admin/page/bundles/{type}", name="admin_page_bundles")
	 * @Template()
	 */
	public function bundlesAction(Request $request, $type = null)
	{
		parent::init($request);

		// Check permissions
		if(!$this->getUser()->checkPermissions('ALLOW_PAGE') || !$this->getUser()->checkPermissions('ALLOW_BUNDLES')){
			parent::test_permissions($request, $this->getUser());
			throw $this->createNotFoundException('This feature does not exist.');
		}

		$this->breadcrumbs->addRouteItem($this->trans("Gekoppelde extensies", [], 'cms'), "admin_page_bundles");

		// All pages
		$pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findAll();

		$bundleInfo = [];
		foreach($this->modRoutes as $r){
			$bundleInfo[$r['bundleName']] = ['label' => $r['name'], 'icon' => $r['icon'], 'route' => $r['route']];
		}

		// Find blocks containing bundles
		$linked = [];
		$blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('Trinity%Bundle');
		if(empty($blocks)){
			// Fallback to migrated site
			$blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('Qinox%Bundle');
		}
		
		foreach($blocks as $Block){

			$bundleData = $Block->getBundleData(true);

			$BlockWrapper = $Block->getWrapper();
			$Page = $BlockWrapper->getPage();

			if($Page){
				$host = 'Onbekend';
				if(!empty($Page->getSettings())){
					$host = $Page->getSettings()->getHost();
					if($host == 'null'){
						$host = 'Onbekend';
					}
				}
				$i = 1;
				$block_index = 0;
				foreach($Page->getBlocks() as $Wrapper){
					if($Wrapper == $BlockWrapper){
						$block_index = $i;
					}
					$i++;
				}

				if(!isset($linked[$host])){
					$linked[$host] = [];
				}
				if(!isset($linked[$host][$bundleData['bundlename']]) && !empty($bundleInfo[str_replace('Qinox', 'Trinity', $bundleData['bundlename'])])){
					$linked[$host][$bundleData['bundlename']] = $bundleInfo[str_replace('Qinox', 'Trinity', $bundleData['bundlename'])];
					$linked[$host][$bundleData['bundlename']]['pages'] = [];
				}
				$linked[$host][$bundleData['bundlename']]['pages'][] = [
					'Page' => $Page,
					'Wrapper' => $BlockWrapper,
					'Block' => $Block,
					'bundleData' => $bundleData,
					'block_index' => $block_index . '/' . $Page->getBlocks()->count(),
				];
			}
		}

		return $this->attributes([
			'linked' => $linked,
		]);
	}

	/**
	 * @Route("/admin/page/list", name="admin_page_list")
	 */
	public function listAction(Request $request, $returnType = null)
	{
		parent::init($request);

		$list = $this->getPagesByParentid(null, true);

		$return = '<ul class="page-list">';
		foreach($list as $id => $pageinfo){
			// die( "<pre>" . print_r( $pageinfo, 1 ) . "</pre>" );
			$return .= '<li style="margin-left:' . ($pageinfo['depth']*20) . 'px;" onclick="pageSelect(' . $id . ', \'' . $pageinfo['slugkey'] . '\', \'' . $pageinfo['label'] . '\')">' . $pageinfo['label'] . '</li>';
		}
		$return .= '</ul>';
		die($return);
	}

	private function getPagesByParentid($ParentPage = null, $flat = false, $depth = 0, $data = array()){
		if(!$flat) $data = array();

		/*if($ParentPage){
			$TranslatedParentPage = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneBy(['base' => $ParentPage, 'language' => $this->language]);
			if(!empty($TranslatedParentPage)){
				$ParentPage = $TranslatedParentPage;
			}else{
				$ParentPage = $ParentPage->getBase();
			}
		}*/

		// $Language = $this->getDoctrine()->getRepository('CmsBundle:Language')->findOneBy([], ['id' => 'asc']);
		$tmp_pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(array('page' => $ParentPage, 'language' => $this->language, 'base' => null, 'settings' => $this->Settings), array('sort' => 'ASC'));
		if(!empty($tmp_pages)){
			foreach($tmp_pages as $Page){
				/*$TranslatedPage = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneBy(['base' => $Page, 'language' => $this->language]);
				$Base = $Page;
				if(!empty($TranslatedPage)){
					$Page = $TranslatedPage;
					$Base = $Page->getBase();
				}*/
				if($flat){
					if($Page->getEnabled()){
						$data[$Page->getId()] = array(
							'label'    => $Page->getLabel(),
							'title'    => $Page->getTitle(),
							'slug'     => $Page->getSlug(),
							'slugkey'  => $Page->getSlugKey(),
							'static'   => $Page->getStatic(),
							'visible'  => $Page->getVisible(),
							// 'enabled'  => $Page->getEnabled(),
							// 'sort'     => $Page->getSort(),
							'dateadd'  => $Page->getDateAdd(),
							'dateedit' => $Page->getDateEdit(),
							'depth'    => $depth,
						);
					}
					$data = $this->getPagesByParentid($Page, $flat, ($depth+1), $data);
				}else{
					$data[] = array(
						'Page' => $Page->setURL($this->generateUrl('homepage') . $this->getDoctrine()->getRepository('CmsBundle:Page')->getSlugPathByPage($Page)),
						'children' => $this->getPagesByParentid($Page, $flat, ($depth+1), $data)
					);
				}
			}
		}
		return $data;
	}

	/**
	 * @Route("/admin/page/download/{id}", name="admin_page_download")
	 * @Template()
	 */
	public function downloadAction(Request $request, $id)
	{

		$exportId = time() . '_';

		$encoders = array(new XmlEncoder(), new JsonEncoder());
		$defaultContext = [
			AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
				return $object->getId();
			},
			AbstractNormalizer::IGNORED_ATTRIBUTES => ['page', 'language', 'versions', 'parents', 'dateAdd', 'dateEdit', 'children', 'metatags', 'settings', 'scores']
		];
		$normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);
		$normalizers = array($normalizer);
		$serializer = new Serializer($normalizers, $encoders);

		$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->find($id);

		$jsonContent = $serializer->serialize($Page, 'json');

		// Gather media
		$mediaList = [];
		foreach($Page->getBlocks() as $Wrapper){
			foreach($Wrapper->getBlocks() as $Block){
				if(!empty($Block->getMedia())){
					$mediaList[$Block->getMedia()->getId()] = $Block->getMedia();
				}
				if($Block->getAltMedia()->count()){
					foreach($Block->getAltMedia() as $m){
						$Media = $m->getMedia();
						$mediaList[$Media->getId()] = $Media;
					}
				}
			}
		}

		$files = [$exportId . 'page.json'];
		file_put_contents('/tmp/' . $exportId . 'page.json', $jsonContent);
		if(!empty($mediaList)){
			$defaultContext = [
				AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
					return $object->getId();
				},
				AbstractNormalizer::IGNORED_ATTRIBUTES => ['dateAdd', 'dateEdit', 'children', 'block', 'tags', 'parent']
			];
			$normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);
			$normalizers = array($normalizer);
			$serializer = new Serializer($normalizers, $encoders);
			$mediaJsonData = ($serializer->serialize($mediaList, 'json'));

			file_put_contents('/tmp/' . $exportId . 'media.json', $mediaJsonData);
			$files[] = $exportId . 'media.json';

			$mediaPath = '/tmp/' . $exportId . 'media/';
			if(!file_exists($mediaPath)) mkdir($mediaPath);
			foreach($mediaList as $Media){
				$dir = str_replace('src/CmsBundle/Controller', 'public/uploads/' . $Media->getType() . '/', __DIR__);
				$files[] = [$dir.$Media->getPath(),'media/' . $Media->getLabel()];
			}
		}

		$zip = new \ZipArchive();
		$filepath = '/tmp/' . $exportId . $Page->getSlug() . '.zip';
		$filename = $exportId . $Page->getSlug() . '.zip';

		if ($zip->open($filepath, \ZipArchive::CREATE)!==TRUE) {
			exit("cannot open <$filepath>\n");
		}

		foreach($files as $f){
			if(is_array($f)){
				$zip->addFile($f[0], $f[1]);
			}else{
				$zip->addFile('/tmp/' . $f, $f);
			}
		}

		$zip->close();

		header("Content-type: application/zip");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-length: " . filesize($filepath));
		header("Pragma: no-cache");
		header("Expires: 0");
		readfile("$filepath");

		/*header('Content-disposition: attachment; filename=tpd_' . $Page->getSlug() . '.json');
		header('Content-type: application/json');
		echo $jsonContent;*/
		exit;
	}

	/**
	 * @Route("/admin/page/import", name="admin_page_import")
	 * @Template()
	 */
	public function importAction(Request $request)
	{
		parent::init($request);

		if(!empty($_FILES['file']) && $_FILES['file']['error'] == 0){
			$f = $_FILES['file'];
			if($f['type'] == 'application/zip' || $f['type'] == 'application/x-zip-compressed'){
				$importId = time();

				$filePath = '/tmp/' . $importId . '/';
				// Extract zip
				$zip = new \ZipArchive;
				if ($zip->open($f['tmp_name']) === TRUE) {

					$zip->extractTo($filePath);
					$zip->close();

					$files = scandir($filePath);

					// Validate files
					$pageFile  = null;
					$mediaFile = null;
					$mediaDir  = null;

					$found = 0;
					foreach($files as $f){
						if(preg_match('/_media\.json/', $f)){
							$found++;
							$mediaFile = $filePath . $f;
						}else if(preg_match('/_page\.json/', $f)){
							$found++;
							$pageFile = $filePath . $f;
						}else if($f == 'media'){
							$found++;
							$mediaDir = $filePath . 'media/';
						}
					}

					if($pageFile && (empty($mediaFile) || ($mediaFile && $mediaDir))){

						$em = $this->getDoctrine()->getManager();

						$convert = [];

						if($mediaFile){
							$data = (string)file_get_contents($mediaFile);
							$json = json_decode($data, true);
							foreach($json as $old_id => $data){
								$dirPath = array_reverse(explode(' / ', $data['folderPath']));
								foreach($dirPath as $k => $v){ if(empty($v)){ unset($dirPath[$k]); } }
								$dirPath = implode('/', $dirPath) . '_' . $importId;

								$mediaParent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, $dirPath, $this->language);

								$filename = $data['label'];
								$realFile = $mediaDir.$filename;

								$filesize = filesize($realFile);
								$UploadedFile = new UploadedFile($realFile, $filename, $data['type'], 0, true );

								$Media = new \App\CmsBundle\Entity\Media();
								$Media->setParent($mediaParent);
								$Media->setLabel($filename);
								$Media->setDateAdd();
								$Media->setFile($UploadedFile); // Link UploadedFile to the media entity
								$Media->preUpload(); // Prepare file and path
								$Media->upload(); // Upload actual file
								$Media->setSize($filesize);

								$em->persist($Media);

								$convert[$old_id] = $Media;
							}
						}


						/*dump($mediaFile);
						dump($pageFile);
						dump($mediaDir);
						die();*/













						$data = (string)file_get_contents($pageFile);
						$json = json_decode($data, true);

						$encoders = array(new XmlEncoder(), new JsonEncoder());
						$defaultContext = [
							AbstractNormalizer::IGNORED_ATTRIBUTES => ['media', 'pages', 'blocks', 'wrapper', 'page', 'tags', 'content', 'image', 'language', 'metatags', 'versions', 'scores', 'altMedia', 'settings']
						];
						$normalizer = new ObjectNormalizer(null, null, null, new ReflectionExtractor(), null, null, $defaultContext); //
						$normalizers = array($normalizer);
						$serializer = new Serializer($normalizers, $encoders);

						// Initial page
						$repairJson = json_decode($data, true);
						$repairJson['cache'] = true;
						$data = json_encode($repairJson);
						$Page = $serializer->deserialize($data, Page::class, 'json');

						// Check if page with same slug key already exists
						$TestPage = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneBy(['slugkey' => $Page->getSlugKey(), 'settings' => $this->Settings]);
						if($TestPage){
							// Page with same slugkey already exists, add ' - Kopie' suffix
							$Page->setLabel($json['label'] . ' - Kopie');
							$Page->setSlug($this->toAscii($Page->getLabel())); // Make slug lowercase and remove chars
							$Page->setSlugkey('pages_' . $Page->getSlug());
						}else{
							$Page->setLabel($json['label']);
							$Page->setSlug($json['slug']);
							$Page->setSlugkey('pages_' . $json['slug']);
						}

						$Page->setLanguage($this->language);

						$Page->setEnabled(true);
						$Page->setVisible(false);
						
						$Page->setSettings($this->Settings);

						// FIX MISSING LAYOUT
						$layout = $Page->getLayout();
						$layoutPath = $this->containerInterface->get('kernel')->getProjectDir() . '/templates/layouts/';
						if(!empty($layout)){
							$layoutFile = $layoutPath . $layout . '.html.twig';
							if(!file_exists($layoutFile)){
								$Page->setLayout('');
							}
						}

						$em->persist($Page);

						foreach($json['blocks'] as $block){

							$PageBlockWrapper = $serializer->deserialize(json_encode($block), PageBlockWrapper::class, 'json');
							$PageBlockWrapper->setPage($Page);

							$em->persist($PageBlockWrapper);

							foreach($block['blocks'] as $child_block){

								// Repairs
								if(empty($child_block['bundle'])){ $child_block['bundle'] = ''; }
								if(empty($child_block['bundleLabel'])){ $child_block['bundleLabel'] = ''; }
								if(empty($child_block['bundleData'])){ $child_block['bundleData'] = ''; }
								if(empty($child_block['contained'])){ $child_block['contained'] = ''; }

								$PageBlock = $serializer->deserialize(json_encode($child_block), PageBlock::class, 'json');
								$PageBlock->setWrapper($PageBlockWrapper);



								$content = [];

								// Gather media
								if(!empty($child_block['media'])){
									$m = $convert[$child_block['media']['id']];
									$PageBlock->setMedia($m);
									$content[] = $m->getId() . ',/' . $m->getWebPath() . ',' . $m->getLabel();
								}
								if(!empty($child_block['altMedia'])){

									$PageBlock->clearAltMedia();

									$ac = new \Doctrine\Common\Collections\ArrayCollection();

									foreach($child_block['altMedia'] as $m){
										$m = $convert[$m['media']['id']];
										$content[] = $m->getId() . ',/' . $m->getWebPath() . ',' . $m->getLabel();
										$BlockMedia = new \App\CmsBundle\Entity\PageBlockMedia();
										$BlockMedia->setMedia($m);
										$BlockMedia->addPageBlock($PageBlock);
										$em->persist($BlockMedia);
										$PageBlock->addAltMedia($BlockMedia);
									}
								}

								if(!empty($content)){
									$PageBlock->setContent(implode(';', $content));
								}else{
									if(!empty($child_block['content'])){
										$PageBlock->setContent($child_block['content']);
									}
								}




								$em->persist($PageBlock);

								$PageBlockWrapper->addBlock($PageBlock);

							}

							$Page->addBlock($PageBlockWrapper);
						}

						// if(!empty($json['pages'])){
						//     foreach($json['pages'] as $json){
						//         $data = json_encode($json);

						//         // Initial page
						//         $ChildPage = $serializer->deserialize($data, Page::class, 'json');
						//         $ChildPage->setLabel($json['label']);
						//         $ChildPage->setLanguage($this->language);
						//         $ChildPage->setPage($Page);
						//         $em->persist($ChildPage);

						//         foreach($json['blocks'] as $block){

						//             $ChildPageBlockWrapper = $serializer->deserialize(json_encode($block), PageBlockWrapper::class, 'json');
						//             $ChildPageBlockWrapper->setPage($ChildPage);
						//             $em->persist($ChildPageBlockWrapper);

						//             foreach($block['blocks'] as $child_block){

						//                 $ChildPageBlock = $serializer->deserialize(json_encode($child_block), PageBlock::class, 'json');
						//                 $ChildPageBlock->setWrapper($ChildPageBlockWrapper);
						//                 $em->persist($ChildPageBlock);

						//             }
						//         }

						//         if(!empty($json['pages'])){
						//             foreach($json['pages'] as $json){
						//                 $data = json_encode($json);

						//                 // Initial page
						//                 $SubChildPage = $serializer->deserialize($data, Page::class, 'json');
						//                 $SubChildPage->setLabel($json['label']);
						//                 $SubChildPage->setLanguage($this->language);
						//                 $SubChildPage->setPage($ChildPage);
						//                 $em->persist($SubChildPage);

						//                 foreach($json['blocks'] as $block){

						//                     $SubChildPageBlockWrapper = $serializer->deserialize(json_encode($block), PageBlockWrapper::class, 'json');
						//                     $SubChildPageBlockWrapper->setPage($SubChildPage);
						//                     $em->persist($SubChildPageBlockWrapper);

						//                     foreach($block['blocks'] as $child_block){

						//                         $SubChildPageBlock = $serializer->deserialize(json_encode($child_block), PageBlock::class, 'json');
						//                         $SubChildPageBlock->setWrapper($SubChildPageBlockWrapper);
						//                         $em->persist($SubChildPageBlock);

						//                     }
						//                 }
						//             }
						//         }
						//     }
						// }

						$em->flush();
						$this->addFlash('', '<i class="material-icons left">check</i>' . $this->trans('Import is voltooid.', [], 'cms'));
						if($request->isXmlHttpRequest()) {
							return new JsonResponse(['success' => true, 'message' => 'Import was successful']);
						}else{
							header('Location: /bundles/cms/cache.php?url=' . urlencode($this->generateUrl('admin_page')));
							exit;
						}
					}else{
						$this->addFlash('', '<i class="material-icons left">clear</i>' . $this->trans('De inhoud van het ZIP-bestand is ongeldig.', [], 'cms'));
						if($request->isXmlHttpRequest()) {
							return new JsonResponse(['success' => false, 'message' => 'The ZIP contents are not valid']);
						}else{
							return $this->redirect($this->generateUrl('admin_page'));
						}
					}
				}else{
					$this->addFlash('', '<i class="material-icons left">clear</i>'. $this->trans('Het uitpakken is mislukt.', [], 'cms'));
					if($request->isXmlHttpRequest()) {
						return new JsonResponse(['success' => false, 'message' => 'Unzip failed', 'file' => $f['tmp_name'], 'path' => $filePath]);
					}else{
						return $this->redirect($this->generateUrl('admin_page'));
					}
				}
			}else{
				$this->addFlash('', '<i class="material-icons left">clear</i>' . $this->trans('Het bestand bevat geen geldig bestandstype.', [], 'cms'));
				if($request->isXmlHttpRequest()) {
					return new JsonResponse(['success' => false, 'message' => 'Invalid filetype: ' . $f['type']]);
				}else{
					return $this->redirect($this->generateUrl('admin_page'));
				}
			}
		}

		return $this->attributes([]);
	}

	/**
	 * @Route("/admin/page/inactive", name="admin_page_inactive")
	 * @Template()
	 */
	public function inactiveAction(Request $request)
	{
		parent::init($request);

		// Check permissions
		if(!$this->getUser()->checkPermissions('ALLOW_PAGE')){
			parent::test_permissions($request, $this->getUser());
			throw $this->createNotFoundException('This feature does not exist.');
		}

		$this->breadcrumbs->addRouteItem($this->trans("Pagina's", [], 'cms'), "admin_page");
		$this->breadcrumbs->addRouteItem($this->trans("Inactief", [], 'cms'), "admin_page_inactive");

		return $this->attributes(array(
		));
	}

	/**
	 * @Route("/admin/page/modified", name="admin_page_modified")
	 * @Template()
	 */
	public function modifiedAction(Request $request)
	{
		parent::init($request);

		// Check permissions
		if(!$this->getUser()->checkPermissions('ALLOW_PAGE')){
			parent::test_permissions($request, $this->getUser());
			throw $this->createNotFoundException('This feature does not exist.');
		}

		$this->breadcrumbs->addRouteItem($this->trans("Pagina's", [], 'cms'), "admin_page");
		$this->breadcrumbs->addRouteItem($this->trans("Recentelijk gewijzigd", [], 'cms'), "admin_page_modified");

		return $this->attributes(array(
		));
	}

	/**
	 * @Route("/admin/page/composer/uploadhandler/{pageid}", name="admin_page_composer_uploadhandler")
	 */
	public function composerUploadAction( Request $request, $pageid = null){
		$f = $_FILES['media'];
		// Media upload
		// $mediaParent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, $dirPath);

		$filesize = filesize($f['tmp_name']);
		$UploadedFile = new UploadedFile($f['tmp_name'], $f['name'], $f['type'], 0, true );

		$Media = new \App\CmsBundle\Entity\Media();
		// $Media->setParent($mediaParent);
		$Media->setLabel($f['name']);
		$Media->setDateAdd();
		$Media->setFile($UploadedFile); // Link UploadedFile to the media entity
		$Media->preUpload(); // Prepare file and path
		$Media->upload(); // Upload actual file
		$Media->setSize($filesize);

		$em = $this->getDoctrine()->getManager();
		$em->persist($Media);
		$em->flush();

		return new JsonResponse([
			'id'       => $Media->getId(),
			'filename' => $f['name'],
			'path'     => '/' . $Media->getWebPath('small'),
			'width'     => $Media->getWidth(),
		]);
	}

	private function ImageRectangleWithRoundedCorners(&$im, $x1, $y1, $x2, $y2, $radius, $color) {
		if(is_array($color)){
			$color = imagecolorallocate($im, $color[0], $color[1], $color[2]);
		}
		// draw rectangle without corners
		imagefilledrectangle($im, $x1+$radius, $y1, $x2-$radius, $y2, $color);
		imagefilledrectangle($im, $x1, $y1+$radius, $x2, $y2-$radius, $color);
		// draw circled corners
		imagefilledellipse($im, $x1+$radius, $y1+$radius, $radius*2, $radius*2, $color);
		imagefilledellipse($im, $x2-$radius, $y1+$radius, $radius*2, $radius*2, $color);
		imagefilledellipse($im, $x1+$radius, $y2-$radius, $radius*2, $radius*2, $color);
		imagefilledellipse($im, $x2-$radius, $y2-$radius, $radius*2, $radius*2, $color);
	}

	/**
	 * @Route("/admin/page/icon/{id}/{icon_size}", name="admin_page_icon")
	 */
	public function iconAction( Request $request, $id, $icon_size = 100, $method = '')
	{

		$bgcolor = [255, 255, 255]; // RGB
		$blockcolors = [
			[23, 155, 222],
			[23, 155, 222],
			[23, 155, 222],
			[23, 155, 222],
			[23, 155, 222],
		]; // RGB

		$margin = 6;
		if($icon_size <= 50){
			$margin = 3;
		}elseif($icon_size <= 100){
			$margin = 5;
		}elseif($icon_size >= 400){
			$margin = 15;
		}elseif($icon_size >= 500){
			$margin = 20;
		}

		$y_offset = $margin;

		$im = imagecreatetruecolor($icon_size, $icon_size);
		imagealphablending($im , false);
		imagesavealpha($im , true);
		imagecolortransparent ($im, 0);
		$bg = imagecolorallocatealpha($im, 255, 255, 255, 0);
		imagefill($im, 0, 0, $bg);
		
		$text_color = imagecolorallocate($im, 255, 255, 255);
		$radius = ceil(($icon_size / 100) * 7); // 5% of icon size

		foreach($blockcolors as $n => $blockcolor){
			$blockcolors[$n] = imagecolorallocate($im, $blockcolor[0], $blockcolor[1], $blockcolor[2]);
		}
		// $background_color = imagecolorallocate($im, $bgcolor[0], $bgcolor[1], $bgcolor[2]);
		if($icon_size <= 100){
			imagefilledrectangle($im, 0, 0, $icon_size, $icon_size, imagecolorallocate($im, $bgcolor[0], $bgcolor[1], $bgcolor[2]));
		}else{
			$this->ImageRectangleWithRoundedCorners($im, 0, 0, $icon_size, $icon_size, $radius, $bgcolor);
		}

		$n = 0;
		if(!empty($id) && is_numeric($id)){
			$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->find($id);
			if($Page->getBlocks()->count() > 0){
		
				$block_amount_vertical = $Page->getBlocks()->count();
				if($block_amount_vertical > 5){
					$block_amount_vertical = 5;
				}

				$block_height = ((($icon_size / 100) * (100 / $block_amount_vertical))) - $margin; // 20% of icon size
				$block_height -= ($margin / $block_amount_vertical);

				// Has at least one block
				foreach($Page->getBlocks() as $BlockWrapper){
					$block_height_curr = $block_height;
					$grid_size = $BlockWrapper->getGridSize();
					if($grid_size === 0){
						$grid_size = 1;
					}

					// imagefilledrectangle($im, $margin, $y_offset, ($icon_size - $margin), $y_offset + $block_height, $blockcolors[$n]);
					$blockRadius = (($radius / 100) * 75);
					if($blockRadius > ($block_height / 2.5)){
						$blockRadius = ($block_height / 2.5);
					}

					$label = $BlockWrapper->getLabel();
					
					if($BlockWrapper->getBlocks()->count() > $grid_size){
						$grid_size = $BlockWrapper->getBlocks()->count();
					}

					$margin_x = $margin;
					foreach($BlockWrapper->getBlocks() as $Block){
						// dump($Block);

						$bw = ($icon_size - ($margin * 1));
						$bw_for_lbl = $bw;
						$bw = ($bw / $grid_size);
						$bw = ($bw - $margin);
						if(preg_match('/hero/', $BlockWrapper->getTemplateKey())){
							// Dual height
							$block_height_curr = ($block_height_curr * 2) + $margin;
							$label = 'Hero';
						}

						$data = $Block->getData();

						// if($icon_size <= 100){
							imagefilledrectangle($im, $margin_x, $y_offset, $margin_x + $bw, ($y_offset + $block_height_curr), $blockcolors[$n]);
						// }else{
						//     $this->ImageRectangleWithRoundedCorners($im, $margin_x, $y_offset, $margin_x + $bw, ($y_offset + $block_height_curr), $blockRadius, $blockcolors[$n]);
						// }

						$icon_scale = 1.5;
						if($icon_size >= 400){
							$icon_scale = 2.5;
						}else if($icon_size >= 200){
							$icon_scale = 2;
						}


						if(!empty($label)){
							$font_size = 5;
							if($icon_size < 110){
								$label = '';
							}elseif($icon_size < 120){
								$font_size = 2;
							}elseif($icon_size < 150){
								$font_size = 3;
							}elseif($icon_size < 200){
								$font_size = 5;
							}
							$tw = (strlen($label) * imagefontwidth($font_size));
							$th = imagefontheight($font_size);

							imagestring($im, $font_size, $margin + (($bw_for_lbl / 2) - ($tw / 2)), ($y_offset + (($block_height_curr / 2) - ($th / 2))),  $label, $text_color);
						}else{
							if($Block->getContentType() == 'bundle'){
								$icon_bundle = str_replace('/Controller', '/Storage', __DIR__) . '/block_bundle.png';

								$im_ico_bundle = imagecreatefrompng($icon_bundle);
								$ico_size = ($block_height_curr / $icon_scale);
								imagecopyresized($im, $im_ico_bundle, (($margin_x + ($bw / 2)) - ($ico_size / 2)), $y_offset + (($block_height_curr / 2) - ($ico_size / 2)), 0, 0, $ico_size, $ico_size, 150, 150);    
							}else if($Block->getContentType() == 'source'){
								$icon_source = str_replace('/Controller', '/Storage', __DIR__) . '/block_source.png';

								$im_ico_source = imagecreatefrompng($icon_source);
								$ico_size = ($block_height_curr / $icon_scale);
								imagecopyresized($im, $im_ico_source, (($margin_x + ($bw / 2)) - ($ico_size / 2)), $y_offset + (($block_height_curr / 2) - ($ico_size / 2)), 0, 0, $ico_size, $ico_size, 150, 150);    
							}else if(!empty($data['type']) && $data['type'] == 'video'){
								$icon_video = str_replace('/Controller', '/Storage', __DIR__) . '/block_video.png';

								$im_ico_video = imagecreatefrompng($icon_video);
								$ico_size = ($block_height_curr / $icon_scale);
								imagecopyresized($im, $im_ico_video, (($margin_x + ($bw / 2)) - ($ico_size / 2)), $y_offset + (($block_height_curr / 2) - ($ico_size / 2)), 0, 0, $ico_size, $ico_size, 150, 150);    
							}else if($Block->getMedia()){
								$icon_img = str_replace('/Controller', '/Storage', __DIR__) . '/block_img.png';

								$im_ico_img = imagecreatefrompng($icon_img);
								$ico_size = ($block_height_curr / $icon_scale);
								imagecopyresized($im, $im_ico_img, (($margin_x + ($bw / 2)) - ($ico_size / 2)), $y_offset + (($block_height_curr / 2) - ($ico_size / 2)), 0, 0, $ico_size, $ico_size, 150, 150);
							}else if($Block->getContent()){
								$icon_text = str_replace('/Controller', '/Storage', __DIR__) . '/block_text.png';

								$im_ico_text = imagecreatefrompng($icon_text);
								$ico_size = ($block_height_curr / $icon_scale);
								imagecopyresized($im, $im_ico_text, (($margin_x + ($bw / 2)) - ($ico_size / 2)), $y_offset + (($block_height_curr / 2) - ($ico_size / 2)), 0, 0, $ico_size, $ico_size, 150, 150);    
							}
						}


						$margin_x += ($bw + $margin);
					}

					$y_offset += ($block_height_curr + $margin);
					$n++;
					if($n > ($block_amount_vertical - 1)){
						break;
					}
				}
					// die();
			}
		}

		if($method == 'base64'){
			ob_start(); // Let's start output buffering.
			imagepng($im); //This will normally output the image, but because of ob_start(), it won't.
			$contents = ob_get_contents(); //Instead, output above is saved to $contents
			ob_end_clean(); //End the output buffer.

			return 'data:image/png;base64,' . base64_encode($contents);
		}

		header("Content-Type: image/png");
		imagepng($im);
		imagedestroy($im);
		exit;
	}

	/**
	 * @Route("/admin/page/savetemplate/{id}", name="admin_page_savetemplate")
	 * @Template()
	 */
	public function savetemplateAction( Request $request, $id = null)
	{
		parent::init($request);

		// Check permissions
		if(!$this->getUser()->checkPermissions('ALLOW_PAGE')){
			parent::test_permissions($request, $this->getUser());
			throw $this->createNotFoundException('This feature does not exist.');
		}

		$this->breadcrumbs->addRouteItem($this->trans("Opslaan als sjabloon", [], 'cms'), "admin_page");


		$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->find($id);

		$json_file = str_replace('/src/CmsBundle/Controller', '/', __DIR__) . 'page_teplates.json';
		if(!empty($_POST)){
			if(!empty($_POST['label'])){
				$label = $_POST['label'];
				$description = $_POST['description'];

				$templates_json = [];
				if(file_exists($json_file)){
					$templates_json = json_decode(file_get_contents($json_file), true);
				}

				$icon_small = $this->iconAction($request, $id, 150, 'base64');
				$icon_big = $this->iconAction($request, $id, 350, 'base64');

				$layout = [];

				foreach($Page->getBlocks() as $BlockWrapper){
					foreach($BlockWrapper->getBlocks() as $Block){
						dump($Block);die();
					}
				}

				$templates_json[$label] = [
					'label'       => $label,
					'description' => $description,
					'icon_small'  => $icon_small,
					'icon_big'    => $icon_big,
					'layout'      => $layout,
				];

				file_put_contents($json_file, json_encode($templates_json));
				die('..');
			}
		}

		return $this->attributes([
			'Page' => $Page,
		]);
	}

	/**
	 * @Route("/admin/page/edit/{id}", name="admin_page_edit")
	 * @Template()
	 */
	public function editAction( Request $request, $id = null)
	{
		parent::init($request);

		// Check permissions
		if(!$this->getUser()->checkPermissions('ALLOW_PAGE')){
			parent::test_permissions($request, $this->getUser());
			throw $this->createNotFoundException('This feature does not exist.');
		}

		$this->breadcrumbs->addRouteItem($this->trans("Pagina's", [], 'cms'), "admin_page");

		$usedBlockDir = $this->containerInterface->get('kernel')->getProjectDir() . '/var/cache';
		 if(!file_exists($usedBlockDir)){
            mkdir($usedBlockDir);
        }

		$usedBlocks = ['framework_empty'];
		$usedBlockJSON = $usedBlockDir . '/usedBlocks_' . $this->Settings->getID() . '.json';
		if (file_exists($usedBlockJSON)) {
			$usedBlocks = file_get_contents($usedBlockJSON);
			$usedBlocks = json_decode($usedBlocks, JSON_FORCE_OBJECT);
		}

		// Find first page
		$ActivePage = null;
		$tmp_pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(array('page' => null, 'language' => $this->language), array('sort' => 'ASC'), 1);
		if(!empty($tmp_pages)){
			$ActivePage = $tmp_pages[0];
		}

		$ParentPage = null;

		$pageSections = array();
		$pageBlockSections = array();
		$block_sections = array();
		$all_block_sections = [];

		$new = false;
		$addToParent = false;

		if( (int)$id > 0 ){
			// Edit
			$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->find($id);

			// FIX MISSING LAYOUT
			$layout = $Page->getLayout();
			$layoutPath = $this->containerInterface->get('kernel')->getProjectDir() . '/templates/layouts/';
			if(empty($layout)) $layout = 'default';
			$layoutFile = $layoutPath . $layout . '.html.twig';

			if(strpos($layout, ':') !== false){
				$layout_arr = explode(':', $layout);
				if(in_array($layout_arr[0], $this->installed)){
					$bundleDir = $this->containerInterface->get('kernel')->getProjectDir() . '/src/Trinity/' . $layout_arr[0] . '/Resources/views/Cms/Layouts/';
					$layoutFile = $bundleDir . $layout_arr[1] . '.html.twig';
				}
			}

			if(!file_exists($layoutFile)){
				$Page->setLayout('default');

				$em = $this->getDoctrine()->getManager();
				$em->persist($Page);
				$em->flush();
			}

			if((empty($Page->getSettings()) && $Page->getLanguage() != $this->language) || $Page->getSettings() != $this->Settings){
				// Invalid page! STOP NOW!

				// Try to find alternative page
				/*$AltPage = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneBy(['slugkey' => $Page->getSlugKey(), 'language' => $this->language]);
				if(!empty($AltPage)){
					return $this->redirect($this->generateUrl('admin_page_edit', ['id' => $AltPage->getId()]));
				}else{*/
					return $this->redirect($this->generateUrl('admin_page'));
				// }
			}

			$base_uri_tmp = $this->Settings->getBaseUri();
			if(preg_match('/\/.*?$/', $base_uri_tmp)){
				$base_uri = substr($base_uri_tmp, 1) . '/';
				$newSlug = str_replace($base_uri, '', $Page->getSlug());
				$Page->setSlug($newSlug);
			}

			$Page->setUrl($this->generateUrl('homepage') . $this->getDoctrine()->getRepository('CmsBundle:Page')->getSlugPathByPage($Page));

			$parents = $Page->getParents();
			if(!empty($parents)){
				foreach(array_reverse($parents) as $Parent){
					$this->breadcrumbs->addRouteItem($Parent->getLabel(), "admin_page_edit", ['id' => $Parent->getId()]);
				}
			}

			$this->breadcrumbs->addRouteItem($Page->getLabel(), "admin_page_edit");

			/*if($Page->getLanguage() != $this->language){
				$TranslatedPage = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneBy(['base' => $Page, 'language' => $this->language]);
				if(!empty($TranslatedPage)){
					return $this->redirect($this->generateUrl('admin_page_edit', ['id' => $TranslatedPage->getId()]));
				}else{
					$Original = $this->getDoctrine()->getRepository('CmsBundle:Page')->find($id);
					$Page = clone $Page;
					$Page->setLanguage($this->language);
					$Page->setBase($Original);
				}
			}*/

			$ParentPage = $Page->getPage();

			$found_main_content = false;

			// Find page content sections for dynamically assign content in templates
			$layout = $Page->getLayout();
			$layoutPath = $this->containerInterface->get('kernel')->getProjectDir() . '/templates/layouts/';
			if(empty($layout)){


				if($this->Settings){
					if(!empty($this->Settings->getDefaultTemplate())){
						$layout = $this->Settings->getDefaultTemplate();
					}
				}

				if(empty($layout)){
					$layout = 'default';
				}
			}
			$layoutFile = $layoutPath . $layout . '.html.twig';
			if(file_exists($layoutFile)){
				$layoutData = file_get_contents($layoutFile);

				if(preg_match('/{%\s?block\s?body\s?%}{%\s?endblock\s?%}/', $layoutData)){
					$pageSections['default'] = 'Pagina inhoud';
				}

				// {{pagecontent(PageObject: Page, locale: app.request.locale, id: 3)}}
				if(preg_match_all('/{{.*?pagecontent\(.*?,.*?,.*?\'(.*?)\'.*?\).*?}}/', $layoutData, $m)){
					foreach($m[1] as $i => $key){
						$keyLabel = trim($key);
						$key = preg_replace('/[^0-9a-z-]*/', '', str_replace(' ', '-', strtolower($keyLabel)));
						$pageSections[$key] = $keyLabel;
					}
				}
				if(preg_match_all('/{{.*?pageblocks\(.*?,.*?,.*?\'(.*?)\'.*?\).*?}}/', $layoutData, $m)){
					foreach($m[1] as $i => $key){
						$keyLabel = trim($key);
						$key = preg_replace('/[^0-9a-z-]*/', '', str_replace(' ', '-', strtolower($keyLabel)));
						$pageBlockSections[$key] = $keyLabel;
					}
				}
			}
		}else{
			// Add
			$Page = new \App\CmsBundle\Entity\Page();
			$Page->setLanguage($this->language);
			$Page->setSettings($this->Settings);
			$Page->setDateAdd(new \DateTime());

			$Page->setCritical(true);
			$Page->setCache(true);

			/* Don't embed default layout in pages themself, ask at "run-time" instead
			$dtpl = $this->Settings->getDefaultTemplate();
			if(!empty($dtpl)){
				$Page->setLayout($dtpl);
			}*/

			$all = $this->getDoctrine()->getRepository('CmsBundle:Page')->findAll();

			$Page->setSort(count($all));
			$this->breadcrumbs->addRouteItem($this->trans("Toevoegen", [], 'cms'), "admin_page_edit");

			$appendToParent = $request->query->get('parent');
			if(!is_null($appendToParent)){
				$addToParent = $ParentPage;
				$ParentPage = $this->getDoctrine()->getRepository('CmsBundle:Page')->find($appendToParent);
				$Page->setPage($ParentPage);
			}

			$new = true;
		}

		/*$PageMediaDir = $this->getDoctrine()->getRepository('CmsBundle:MediaDir')->findOneByLabel($Page->getLabel());
		$pageMediaDirId = 0;
		if(!empty($PageMediaDir)){
			$pageMediaDirId = $PageMediaDir->getId();
		}*/

		$layoutPaths = [
			$this->containerInterface->get('kernel')->getProjectDir() . '/templates/blocks/',
		];

		if (!$this->Settings->getIgnoreCmsBlocks()) {
			$layoutPaths = array_merge( $layoutPaths, [
				$this->containerInterface->get('kernel')->getProjectDir() . '/src/CmsBundle/Resources/views/blocks/',
				$this->containerInterface->get('kernel')->getProjectDir() . '/src/CmsBundle/Resources/views/blocksv2/'
			]);
		}

		// Search for native blocks provided by bundles
		if(!empty($this->installed)){
			$bundleDir = $this->containerInterface->get('kernel')->getProjectDir() . '/src/Trinity/';
			foreach($this->installed as $bundleKey){
				$bundleRoot = $bundleDir . $bundleKey;
				if(file_exists($bundleRoot . '/Resources/views/Cms/Blocks')){
					// Has custom layout dir
					$layoutPaths[] = $bundleRoot . '/Resources/views/Cms/Blocks/';
				}
			}
		}

		$blockKeyToLabel = [];

		foreach($layoutPaths as $layoutPath){
			if(!file_exists($layoutPath)) continue;
			// $layoutPath = $this->containerInterface->get('kernel')->getProjectDir() . '/src/CmsBundle/Resources/views/blocks/';
			foreach(scandir($layoutPath) as $block_tpl){
				if(is_dir($layoutPath.$block_tpl) || substr($block_tpl, 0, 1) == '.' || substr($block_tpl, -2) == 'md') continue;

				$content = file_get_contents($layoutPath . $block_tpl);

				if(preg_match('/\{\#(.*?)\#\}/is', $content, $m)){
					$conf = $m[1];
					// $conf = trim($conf);
					// $conf = preg_replace('/\\r|\\n/', '', $conf);
					// $conf = preg_replace('/\s+/', ' ', $conf);
					// echo '<pre>' . print_r($conf, 1) . '</pre>';
					$conf = json_decode($conf);
					$category = 'Ongesorteerd';
					if(preg_match('/blocksv2/', $layoutPath)){
						$category = 'v2';
					}
					if(!empty($conf->category)){
						$category = $conf->category;
					}

					$tmpLabel = $this->trans($conf->label, 'blokken');
					$blockKeyToLabel[$conf->key] = $tmpLabel;

					if(!empty($conf) && !isset($all_block_sections[$conf->key])){
						if(!isset($block_sections[$category])){
							$block_sections[$category] = [];
						}
						$block_sections[$category][$conf->key] = $conf;
						$all_block_sections[$conf->key] = $conf;

						ksort($block_sections[$category]);
					}
				}
			}
		}

		// dump($blockKeyToLabel);die();

		ksort($block_sections);
		ksort($all_block_sections);

		$parentpath = '';
		if(is_object($ParentPage)){
			$parentpath = $this->getDoctrine()->getRepository('CmsBundle:Page')->getTitlePathByPage($ParentPage, ' / ');
		}

		$em = $this->getDoctrine()->getManager();
		$mediaParent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . $this->trans('Paginas', [], 'cms') . '/' . $Page->getLabel(), $this->language);
		$pageMediaDirId = $mediaParent->getId();

		if(!empty($_FILES)){


			$Parent = null;
			$type = '';
			if(isset($_FILES['image'])){
				// Upload image
				$file = $_FILES['image'];
				$type = 'image';
			}

			if(!is_null($mediaParent)){
				// Create UploadedFile-object
				$UploadedFile = new UploadedFile($file['tmp_name'], $file['name'], $file['type'], (int)$file['error'], true );

				$Media = new \App\CmsBundle\Entity\Media();
				$Media->setParent($mediaParent);
				$Media->setLabel($file['name']);
				$Media->setDateAdd();
				$Media->setFile($UploadedFile); // Link UploadedFile to the media entity
				$Media->preUpload(); // Prepare file and path
				$Media->upload(); // Upload actual file
				$Media->setSize($file['size']);

				if($type == 'image'){
					if($Page->hasImage()){
						$PrevMedia = $Page->getImageObject();
						try{
							// $em->remove($PrevMedia);
						}catch(\Exception $e){}
					}
					$Page->setImage($Media);
				}

				$em->persist($Media);
				$em->persist($Page);
				$em->flush();

				return new JsonResponse(array('success' => true, 'type' => $type, 'image' => '/' . $Media->getWebPath(), 'id' => $Media->getId()));
			}

			return new JsonResponse(array('success' => false));
		}

		// $Language = $this->getDoctrine()->getRepository('CmsBundle:Language')->findOneByLocale($request->getLocale());

		if($Page->getVisible() && $Page->getEnabled()){
			$Page->setShowInSitemap(true);
		}

		$availableRoles = [
			$this->trans('Gebruiker', [], 'cms') => 'ROLE_USER',
		];

		$roles = $this->getParameter('security.role_hierarchy.roles');
		foreach($roles as $role => $inherit){
			$roleLabel = ucfirst(strtolower(str_replace('_', ' ', str_replace('ROLE_', '', $role))));
			if($roleLabel == 'User'){
				$roleLabel = 'Gebruiker';
			}
			$availableRoles[$roleLabel] = $role;
		}

		$saved = false;
		if(!empty($_POST)){
			if(!empty($_POST['form'])){

				$em = $this->getDoctrine()->getManager();

				// xxx niet gebruikt?
				$Layout = $this->getDoctrine()->getRepository('CmsBundle:Layout')->findOneBy([], ['id' => 'asc']);

				$form = $_POST['form'];

				if(!isset($form['enabled']) && isset($form['visible'])){
					unset($form['visible']);
				}

				if(!empty($form['option_title'])){ $Page->setOptionTitle($form['option_title']); }else{ $Page->setOptionTitle(false); }
				if(!empty($form['option_subtitle'])){ $Page->setOptionSubtitle($form['option_subtitle']); }else{ $Page->setOptionSubtitle(false); }
				if(!empty($form['option_subnavigation'])){ $Page->setOptionSubnavigation($form['option_subnavigation']); }else{ $Page->setOptionSubnavigation(false); }
				if(!empty($form['option_breadcrumbs'])){ $Page->setOptionBreadcrumbs($form['option_breadcrumbs']); }else{ $Page->setOptionBreadcrumbs(false); }

				$Page->setLabel($form['label']);
				$Page->setTitle($form['title']);
				$Page->setSubtitle($form['subtitle']);
				$Page->setEnabled(isset($form['enabled']));
				$Page->setVisible(isset($form['visible']));
				$Page->setTplInject($form['tpl_inject']);
				$Page->setPageType($form['page_type']);
				$Page->setCustomUrl($form['custom_url']);
				$Page->setTarget($form['target']);
				$Page->setClasses($form['classes']);

				if(isset($form['layout'])) $Page->setLayout($form['layout']);
				$Page->setLayoutid($Layout);
				$Page->setController('CmsBundle:page:page');

				// Notify
				if(isset($form['notify_type'])) $Page->setNotifyType($form['notify_type']);
				$Page->setNotifyTelegramBot($form['notify_telegram_bot']);
				$Page->setNotifyTelegramBotChatId($form['notify_telegram_bot_chat_id']);
				$Page->setNotifyEmail($form['notify_email']);
				if(!empty($form['notify_change'])){ $Page->setNotifyChange($form['notify_change']); }else{ $Page->setNotifyChange(false); }
				if(!empty($form['notify_create_child'])){ $Page->setNotifyCreateChild($form['notify_create_child']); }else{ $Page->setNotifyCreateChild(false); }
				if(!empty($form['notify_change_child'])){ $Page->setNotifyChangeChild($form['notify_change_child']); }else{ $Page->setNotifyChangeChild(false); }

				if(isset($form['access'])) $Page->setAccess($form['access']);
				$Page->setAccessFree(!empty($form['access_free']));
				$Page->setAccessAllowLogin(!empty($form['access_allow_login']));
				$Page->setAccessAltHome(!empty($form['access_alt_home']));
				$Page->setAccessVisibleMenu(!empty($form['access_visible_menu']));
				$Page->setAccessB2b(!empty($form['access_b2b']));
				
				if(isset($form['access_pwd'])){
					$Page->setAccessPwd($form['access_pwd']);
				}

				/* $role_labels = array_values($availableRoles);
				foreach($form['access_roles'] as $k => $v){
					$form['access_roles'][$k] = $role_labels[$v];
				} */

				$Page->setAccessRoles((isset($form['access_roles']) ? $form['access_roles'] : []));

				$Page->setShowInSitemap(!empty($form['show_in_sitemap']));

				if ($this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
					$Page->setCache(!empty($form['cache']));
					$Page->setCritical(!empty($form['critical']));
				}

				$Page->setRobots($form['robots']);

				if (empty($form['slug'])) {
					if (!empty($form['title'])) {
						$slug = $form['title'];
					} else {
						$slug = $form['label'];
					}
					
					$Page->setSlug($this->toAscii($slug)); // Make slug lowercase and remove chars
				} else {
					$Page->setSlug($this->toAscii($form['slug']));
				}

				$Page->setCacheData(null); // Clear page cache
				$Page->setCricitalCss(null); // Clear critical Css
				
				// Store in database
				$em->persist($Page);
				$em->flush(); // Pre-flush to avoid error

				$FoundMedia = false;
				if(!empty($_POST['link'])){
					foreach($_POST['link'] as $k => $v){
						if(!empty($v)){
							$id = (0 + $v);
							$v = \App\CmsBundle\Util\Util::dashesToCamelCase($k, true);
							$has = 'has' . $v;
							$get = 'get' . $v . 'Object';
							$set = 'set' . $v . '';

							$FoundMedia = $this->getDoctrine()->getRepository('CmsBundle:Media')->find($id);

							if($FoundMedia){
								$Page->$set($FoundMedia);
							}
						}
					}
				}


				if(!empty($_POST['delete']) && empty($FoundMedia)){
					foreach($_POST['delete'] as $k => $v){
						if(!empty($v)){
							$v = \App\CmsBundle\Util\Util::dashesToCamelCase($k, true);
							$has = 'has' . $v;
							$get = 'get' . $v . 'Object';
							$set = 'set' . $v . '';
							if($Page->$has()){
								$PrevMedia = $Page->$get();
								try{
									$Page->$set(null);
									// $em->remove($PrevMedia);
								}catch(\Exception $e){}
							}
						}
					}
				}



				foreach($Page->getTags() as $Tag){ $Page->removeTag($Tag); }

				if(!empty($_POST['form']['tags'])){
					foreach($_POST['form']['tags'] as $value){
						// Check if exists as ID
						if(is_numeric($value)){
							$Tag = $this->getDoctrine()->getRepository('CmsBundle:Tag')->findOneById($value);
						}
						// Check if exists as label (newly linked)
						else{
							$Tag = $this->getDoctrine()->getRepository('CmsBundle:Tag')->findOneByLabel($value);
						}

						if(empty($Tag)){
							// Create new
							$Tag = new \App\CmsBundle\Entity\Tag();
							$Tag->setLabel($value);
							$em->persist($Tag);
						}
						$Page->addTag($Tag);
					}
				}

				$Page->setDateEdit(new \DateTime());

				$currentBlockIds = (!empty($_POST['block_config']) ? array_keys($_POST['block_config']) : []);
				if(!empty($Page) && !empty($Page->getBlocks())){
					foreach($Page->getBlocks() as $Wrapper){
						foreach($Wrapper->getBlocks() as $Block){
							if(!in_array($Block->getId(), $currentBlockIds)){
								$Wrapper->removeBlock($Block);
								$em->remove($Block);
							}
						}

						// Clear empty wrapper
						if($Wrapper->getBlocks()->count() == 0){
							$em->remove($Wrapper);
						}
					}

					$em->flush();
				}


				if(!empty($_POST['block_wrappers'])){
					foreach($_POST['block_wrappers'] as $index => $wrapper_id){

						$wrapper_attr = (!empty($_POST['block_wrappers_attr'][$wrapper_id]) ? $_POST['block_wrappers_attr'][$wrapper_id] : []);
						$wrapper_key = (!empty($wrapper_attr['key']) ? $wrapper_attr['key'] : '');

						if(is_numeric($wrapper_id)){
							// Existing
							$BlockWrapper = $this->getDoctrine()->getRepository('CmsBundle:PageBlockWrapper')->find($wrapper_id);
						}else{
							// New
							$BlockWrapper = new \App\CmsBundle\Entity\PageBlockWrapper();
							$BlockWrapper->setInternalId($wrapper_id);
							$BlockWrapper->setPage($Page);
							$BlockWrapper->setTemplateKey($wrapper_key);
						}

						if(!empty($_POST['wrapper_fields'][$wrapper_id])){
							foreach($_POST['wrapper_fields'][$wrapper_id] as $field => $value){
								$act = 'set' . ucfirst($field);

								if(trim(strip_tags($value)) == 'Introductie tekst'){
									$value = '';
								}
								if(trim(strip_tags($value)) == 'Titel'){
									$value = '';
								}

								$BlockWrapper->$act($value);
							}
						}

						$padding_fields = ['paddingTop', 'paddingRight', 'paddingBottom', 'paddingLeft'];

						if(!empty($_POST['wrapper-config'][$wrapper_id])){							
							$BlockWrapper->setCssClass(null); 
							foreach($_POST['wrapper-config'][$wrapper_id] as $field => $value){

								// Fallback for padding
								if(in_array($field, $padding_fields) && $value !== 0 && $value !== '0' && empty($value)){
									$value = null;
								}elseif($field == "cssClass" && !empty($value)){ 
									$value = implode(" ",$value);
								}

								$act = 'set' . ucfirst($field);
								$BlockWrapper->$act($value);
							}
						}

						if(isset($_POST['wrapper-grid'][$wrapper_id])){
							$BlockWrapper->setGridSize($_POST['wrapper-grid'][$wrapper_id]);
						}else{
							// $BlockWrapper->setGridSize(1);
						}

						$BlockWrapper->setEnabled(!empty($_POST['block_wrappers_enabled'][$wrapper_id]));

						$BlockWrapper->setPos($index);
						$em->persist($BlockWrapper);

						$sort = 0;
						if(!empty($_POST['block'][$wrapper_id])){
							foreach($_POST['block'][$wrapper_id] as $block_id){

								$block_attr = (!empty($_POST['block_attr'][$block_id]) ? $_POST['block_attr'][$block_id] : []);
								$block_key = (!empty($block_attr['key']) ? $block_attr['key'] : '');
								if(is_numeric($block_id)){
									// Existing
									$Block = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->find($block_id);
								}else{
									// New
									$Block = new \App\CmsBundle\Entity\PageBlock();
									$Block->setInternalId($block_id);
									$Block->setWrapper($BlockWrapper);
									$Block->setTemplateKey($block_key);
								}

								$config = (!empty($_POST['block_config'][$block_id]) ? $_POST['block_config'][$block_id] : []);
								$req = (!empty($_POST['block_req'][$block_id]) ? $_POST['block_req'][$block_id] : '');


								// New data source
								if(!empty($_POST['block_data'][$block_id])){
									$data_src = $_POST['block_data'][$block_id];
									if(($data = json_decode($data_src, true)) && $data){
										// Done, valid JSON
									}else{
										if($this->containerInterface->getParameter('kernel.environment') == 'dev'){
											// JSON error, dump when on dev mode
											// dump('JSON error'); dump($data_src); die();                                            
										}
										$data = [];
									}
								}else{
									$data = [];
								}
								$Block->setData($data);

								$contained = (!empty($_POST['block_contained'][$block_id]) ? $_POST['block_contained'][$block_id] : '');

								if(is_array($config)){
									$Block->setConfig($config);
								}

								// Clean block content for now
								$Block->setContent(null);
								$Block->setContentType(null);
								$Block->setBundle(null);
								$Block->setBundleLabel(null);
								$Block->setBundleData(null);

								if($contained){
									$Block->setContained($contained);
								}

								$blockType = null;
								if(!empty($_POST['block_type'])){
									if(!empty($_POST['block_type'][$block_id])){
										$blockType = $_POST['block_type'][$block_id][0];
									}
								}

								if(!empty($_POST['block_content'][$block_id])){
									// Block content
									$Block->setContent($_POST['block_content'][$block_id][0]);
									$Block->setContentType('text');
									if($blockType){
										$Block->setContentType($blockType);
									}
								}else if(!empty($_POST['block_bundle'][$block_id])){
									// Block bundle

									$bundle = $_POST['block_bundle'][$block_id]['bundle'];
									$label = $_POST['block_bundle'][$block_id]['label'];
									$data = $_POST['block_bundle'][$block_id]['data'];

									$Block->setContent('<h1>' . $label . '</h1>');
									$Block->setContentType('bundle');
									$Block->setBundle($bundle);
									$Block->setBundleLabel($label);
									$Block->setBundleData($data);
								}

								$ct = (!empty($_POST['block_content'][$block_id][0]) ? $_POST['block_content'][$block_id][0] : '');
								if($req == 'media' || $req == 'medias' || preg_match('/^\d+,/', $ct)){

									// Virtually remove media
									foreach($Block->getAltMedia() as $m){
										$Block->removeAltMedia($m);
										$em->remove($m);
									}

									$ct = $Block->getContent();
									foreach(explode(';', $ct) as $i => $l){
										$t = explode(',', $l);
										$mediaId = (int)$t[0];

										$Media = $this->getDoctrine()->getRepository('CmsBundle:Media')->find($mediaId);
										if($i == 0){
											$Block->setMedia($Media);
										}else{
											$BlockMedia = new \App\CmsBundle\Entity\PageBlockMedia();
											$BlockMedia->setMedia($Media);
											// $BlockMedia->setPageBlock($Block);
											$em->persist($BlockMedia);

											$Block->addAltMedia($BlockMedia);
										}
									}
								}

								$Block->setPos($sort);
								$em->persist($Block);

								$sort++;
							}
						}
					}
					$em->flush();
				}
			}

			$enabledContent = (!empty($_POST['enabled']) ? $_POST['enabled'] : array());

			if(!empty($_POST['content']['new'])){
				foreach ($_POST['content']['new'] as $name => $content){
					$PageContent = new \App\CmsBundle\Entity\PageContent();
					$PageContent->setContent($content);
					$PageContent->setPage($Page);
					$PageContent->setName($name);

					$PageContent->setPublished(array_key_exists($name, $enabledContent));

					$em->persist($PageContent);
				}
			}

			if(!empty($_POST['content']['edit'])){
				foreach ($_POST['content']['edit'] as $id => $content){
					$PageContent = $this->getDoctrine()->getRepository('CmsBundle:PageContent')->find($id);
					$next_rev = ((int)$PageContent->getRevision() + 1);

					if($content != $PageContent->getContent()){
						// Content has changed
						$PageContentRevision = clone $PageContent;
						$PageContentRevision->setContent($content);
						$PageContentRevision->setRevision($next_rev);

						$PageContentRevision->setPublished(array_key_exists($PageContentRevision->getName(), $enabledContent));

						$em->persist($PageContentRevision);
					}elseif($content == $PageContent->getContent()){
						// Content hasn't changed
						if(!$PageContent->getPublished() && array_key_exists($PageContent->getName(), $enabledContent)){
							// Publish without changes
							$PageContent->setPublished(true);
							$em->persist($PageContent);
						}
					}
				}
			}

			/*$activeTags = array();
			if(!empty($_POST['tags'])){
				foreach($_POST['tags'] as $taglabel){
					$Tag = $this->getDoctrine()->getRepository('CmsBundle:Tag')->getOrCreateByLabel($taglabel);
					$activeTags[] = $Tag->getId();
					if(!$Page->hasTag($Tag)) $Page->addTag($Tag);
				}
			}

			foreach($Page->getTags() as $Tag){
				if(!in_array($Tag->getId(), $activeTags)){
					$Page->removeTag($Tag);
				}
			}*/

			$em->flush();

			$notifySend = false;
			foreach($Page->getParents() as $Parent){
				if($new && $Parent->getNotifyCreateChild()){
					// Child created
					$this->notify($Parent, $this->Settings->getLabel() . "\n" . 'De pagina \'' . ($Page->getPage() ? $parentpath . ' / ' : '') . $Page->getLabel() . '\' is toegevoegd.', 'Pagina toegevoegd');
					$notifySend = true;
					break;
				}else if(!$new && $Parent->getNotifyChangeChild()){
					// Child changed
					$this->notify($Parent, $this->Settings->getLabel() . "\n" . 'De pagina \'' . ($Page->getPage() ? $parentpath . ' / ' : '') . $Page->getLabel() . '\' is gewijzigd.', 'Pagina gewijzigd');
					$notifySend = true;
					break;
				}
			}

			if(!$notifySend && $Page->getNotifyChange()){
				// Edit page
				$this->notify($Page, $this->Settings->getLabel() . "\n" . 'De pagina \'' . ($Page->getPage() ? $parentpath . ' / ' : '') . $Page->getLabel() . '\' is gewijzigd.', 'Pagina gewijzigd');
			}


			// Store metadata/metatags
			if(!empty($_POST['metadata'])){
				foreach($_POST['metadata'] as $metatagid => $value){
					$Metatag = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->findOneById($metatagid);

					$PageMetatag = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->getPageMetatagByPageId($Metatag, $Page->getId());
					$PageMetatag->setPage($Page);
					$PageMetatag->setMetatagid($Metatag);
					$PageMetatag->setValue($value);

					$em->persist($PageMetatag);
				}
				$em->flush();
				$saved = true;
			}




			$notifyEmail = $this->language->getNotifyEmail();
			$targetLocale = $this->language->getLocale();

			if(!empty($notifyEmail)){
				$subject = $this->trans('notify_page_create_subject', [], 'cms', [], $targetLocale);
				$subject = str_replace([
					'((page_label))',
				], [
					$Page->getLabel(),
				], $subject);

				$body = $this->trans('notify_page_create', [], 'cms', [], $targetLocale);
				$body = str_replace([
					'((page_id))',
					'((page_label))',
					'((page_edit_url))',
				], [
					$Page->getId(),
					$Page->getLabel(),
					$this->generateUrl('admin_page_edit', ['id' => $Page->getId()], UrlGenerator::ABSOLUTE_URL),
				], $body);

				$mailer = clone $this->mailer;
				$mailer->init();
				$mailer->setSubject($this->Settings->getLabel() . ': ' . $subject)
						->setTo($notifyEmail)
						->setTwigBody('emails/notify.html.twig', [
							'label' => '',
							'message' => nl2br($body)
						])
						->setPlainBody(strip_tags($body));
				$status = $mailer->execute_forced();
			}




			$Syslog = new Log();
			$Syslog->setUser($this->getUser());
			$Syslog->setUsername($this->getUser()->getUsername());
			$Syslog->setType('page');
			$Syslog->setStatus('info');
			$Syslog->setObjectId($Page->getId());
			$Syslog->setSettings($this->Settings);
			if($new){
				$Syslog->setAction('add');
				$Syslog->setMessage('Pagina \'' . $Page->getLabel() . '\' toegevoegd.');
			}else{
				$Syslog->setAction('update');
				$Syslog->setMessage('Pagina \'' . $Page->getLabel() . '\' gewijzigd.');
			}
			$this->em->persist($Syslog);
			$this->em->flush();

			// Request async critical CSS request
			$this->requestCriticalCss($request, $Page);

			// scan for blocks used in the CMS and save this as a json
			$keys = $this->getDoctrine()->getRepository(Page::class)->getUsedBlocksBySettings($this->Settings);
			file_put_contents($usedBlockJSON, json_encode($keys));

			// Clear cache
			// $this->clearcacheAction();

			if(!empty($_POST['template_save'])){
				header('Location: /bundles/cms/cache.php?url=' . urlencode($this->generateUrl('admin_page_savetemplate', ['id' => $id])));
				exit;
			}elseif(empty($_POST['inline_save'])){
				if(!$request->isXmlHttpRequest()) {
					header('Location: /bundles/cms/cache.php?url=' . urlencode($this->generateUrl('admin_page_critical_generate', ['pageid' => $Page->getId()])) . '?url=' . urlencode($this->generateUrl('admin_page')));
					exit;
				}else{
					$Page->setSlugkey('pages_' . $Page->getSlug());
					die(
						$this->trans('<p>De pagina "<strong>%pagelabel%</strong>" is succesvol toegevoegd.</p>
						<p>Dit scherm wordt binnen enkele ogenblikken vernieuwd.</p>', ['%pagelabel%' => $Page->getLabel()], 'cms') .
						'<script>window.location.reload(false);</script>'
					);
				}
			}else{
				header('Location: /bundles/cms/cache.php?url=' . urlencode($this->generateUrl('admin_page_critical_generate', ['pageid' => $Page->getId()])) . '?url=' . urlencode($this->generateUrl('admin_page_edit', ['id' => $Page->getId()])));
				exit;
			}
		}

		$pageContents = array();
		$sectionKeys = array_keys($pageSections);
		foreach($sectionKeys as $name){
			$pageContents[$name] = $this->getDoctrine()->getRepository('CmsBundle:PageContent')->findOneBy([
				'page' => $Page,
				'name' => $name,
			], [
				'revision' => 'desc'
			]);
		}

		$layout_dir = $this->containerInterface->get('kernel')->getProjectDir() . '/templates/layouts/';
		$layouts = [];
		foreach(scandir($layout_dir) as $dir){
			if(substr($dir, 0, 1) == '.') continue;
			$layouts[str_replace('.html.twig', '', $dir)] = str_replace('.html.twig', '', $dir);
		}

		// Search for custom layouts provided by bundles
		if(!empty($this->installed)){
			$bundleDir = $this->containerInterface->get('kernel')->getProjectDir() . '/src/Trinity/';
			foreach($this->installed as $bundleKey){
				$bundleRoot = $bundleDir . $bundleKey;
				if(file_exists($bundleRoot . '/Resources/views/Cms/Layouts')){
					// Has custom layout dir
					foreach(scandir($bundleRoot . '/Resources/views/Cms/Layouts') as $dir){
						if(substr($dir, 0, 1) == '.') continue;
						$layouts[str_replace('.html.twig', '', $dir)] = $bundleKey . ':' . str_replace('.html.twig', '', $dir);
					}
				}
			}
		}

		$page_type_options = [
			$this->trans('Standaard', [], 'cms')                   => '',
			$this->trans('Externe URL', [], 'cms')                 => 'external',
			$this->trans('Eerste onderliggende pagina', [], 'cms') => 'child',
		];

		$notify_type_options = [
			$this->trans('Standaard (e-mail)', [], 'cms') => 'email',
			$this->trans('Telegram', [], 'cms')           => 'telegram',
		];

		$target_options = [
			$this->trans('Huidige pagina', [], 'cms') => '',
			$this->trans('Nieuwe pagina', [], 'cms')  => '_blank',
			$this->trans('Huidig frame', [], 'cms')   => '_parent',
			$this->trans('Negeer frames', [], 'cms')  => '_top',
		];

		$accessOptions = [
			$this->trans('Iedereen', [], 'cms')                    => '',
			$this->trans('Met wachtwoord', [], 'cms')              => 'password',
			$this->trans('Alleen ingelogd', [], 'cms')             => 'login',
			$this->trans('Alleen uitgelogd', [], 'cms')            => 'no-login',
			$this->trans('Heeft niet een bepaalde rol', [], 'cms') => 'no-role',
		];

		$allowCache = false;
		if ($this->containerInterface->hasParameter('trinity_cache') && ($this->containerInterface->getParameter('trinity_cache') == 'true' || $this->containerInterface->getParameter('trinity_cache'))) {
			$allowCache = true;
		}

		// dump($Page->getTags());die();

		$form = $this->createFormBuilder($Page)
			->add('label', TextType::class, array('label' => $this->trans('Interne titel', [], 'cms')))
			->add('title', TextType::class, array('label' => $this->trans('Weergave titel / Meta title', [], 'cms'), 'attr' => ['class' => 'fld-seo-title']))
			->add('subtitle', TextType::class, array('label' => $this->trans('Sub-titel', [], 'cms'), 'required' => false))
			->add('slug', TextType::class, array('label' => $this->trans('URI', [], 'cms'), 'required' => false, 'attr' => ['class' => 'fld-seo-slug', 'placeholder' => $this->trans('Optioneel', [], 'cms')]))
			->add('page_type', ChoiceType::class, array('label' => $this->trans('Soort pagina', [], 'cms'), 'required' => false, 'choices' => $page_type_options))
			->add('target', ChoiceType::class, array('label' => $this->trans('Link doel', [], 'cms'), 'required' => false, 'choices' => $target_options))
			->add('custom_url', TextType::class, array('label' => $this->trans('Externe URL', [], 'cms'), 'required' => false))
			->add('enabled', CheckboxType::class, array('label' => $this->trans('Pagina inschakelen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
			->add('visible', CheckboxType::class, array('label' => $this->trans('Pagina zichtbaar in menu', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
			->add('classes', TextType::class, array('label' => $this->trans('Additionele CSS classes', [], 'cms'), 'required' => false))
			->add('layout', ChoiceType::class, array('label' => $this->trans('Layout', [], 'cms'), 'required' => false, 'choices' => $layouts, 'placeholder' => '[system specified layout]'))
			->add('content', TextareaType::class, array('label' => $this->trans('Inhoud', [], 'cms'), 'attr' => array('class' => 'ckeditor')))
			->add('tpl_inject', TextareaType::class, array('label' => $this->trans('Template content', [], 'cms'), 'required' => false, 'attr' => ['class' => '']))

			/* not used atm, so hide
			->add('tags', EntityType::class, [
				'label' => $this->trans('Tags', [], 'cms'),
				'class' => Tag::class,
				'choice_label' => 'label',

				'required' => false,
				'multiple' => true,
				// 'expanded' => true,
				'attr' => [
					'class' => 'tag-selector'
				]
			])
			*/

			// Options
			->add('option_title', CheckboxType::class, array('label' => $this->trans('Titel tonen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
			->add('option_subtitle', CheckboxType::class, array('label' => $this->trans('Sub-titel tonen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
			->add('option_subnavigation', CheckboxType::class, array('label' => $this->trans('Sub-menu tonen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
			->add('option_breadcrumbs', CheckboxType::class, array('label' => $this->trans('Breadcrumbs tonen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
			->add('option_hide_in_submenu', CheckboxType::class, array('label' => $this->trans('Verbergen in submenu', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))

			// Notify
			->add('notify_change', CheckboxType::class, array('label' => $this->trans('Melding bij wijzigen pagina', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
			->add('notify_create_child', CheckboxType::class, array('label' => $this->trans('Melding bij aanmaken onderliggende pagina', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
			->add('notify_change_child', CheckboxType::class, array('label' => $this->trans('Melding bij wijzigen onderliggende pagina', [], 'cms'), 'required' => false))
			->add('notify_type', ChoiceType::class, array('label' => $this->trans('Soort melding', [], 'cms'), 'required' => false, 'choices' => $notify_type_options))
			->add('notify_telegram_bot', TextType::class, array('label' => $this->trans('Telegram bot ID', [], 'cms'), 'required' => false))
			->add('notify_telegram_bot_chat_id', TextType::class, array('label' => $this->trans('Telegram chat ID', [], 'cms'), 'required' => false))
			->add('notify_email', TextType::class, array('label' => $this->trans('Ontvanger (email)', [], 'cms'), 'required' => false))

			->add('access', ChoiceType::class, array('label' => $this->trans('Wie kan deze pagina zien?', [], 'cms'), 'required' => false, 'choices' => $accessOptions))
			->add('access_roles', ChoiceType::class, array('label' => $this->trans('Toegestane rechten', [], 'cms'), 'multiple' => true, 'expanded' => true, 'required' => false, 'choices' => $availableRoles))
			->add('access_free', CheckboxType::class, array('label' => $this->trans('Beschikbaar zonder inloggen (overruled andere paginas)', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
			->add('access_allow_login', CheckboxType::class, array('label' => $this->trans('Inloggen toestaan', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
			->add('access_alt_home', CheckboxType::class, array('label' => $this->trans('Alternatief home', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
			->add('access_visible_menu', CheckboxType::class, array('label' => $this->trans('Pagina zichtbaar in navigatie', [], 'cms'), 'required' => false))
			->add('access_pwd', TextType::class, array('label' => $this->trans('Pagina wachtwoord', [], 'cms'), 'required' => false))

			->add('show_in_sitemap', CheckboxType::class, array('label' => $this->trans('Zichtbaar in sitemap', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
			->add('robots', ChoiceType::class, array(
				"multiple" => false,
				"expanded" => false,
				"label" => $this->trans("Zoekmachines", [], 'cms'),
				'required' => false,
				"choices" => array(
					$this->trans('- Standaard (systeem instelling) -', [], 'cms') => '',
					$this->trans('Niet indexeren of volgen', [], 'cms') => 'noindex,nofollow',
					$this->trans('Alleen indexeren', [], 'cms')         => 'index,nofollow',
					$this->trans('Indexeren en volgen', [], 'cms')      => 'index,follow',
				)
			));

		$is_b2b = false;
		$is_webshop = false;
		if($this->Webshop){
			$is_webshop = true;
			if(!empty($this->Webshop) && !empty($this->Webshop->getSettings())){
				if($this->Webshop->getSettings()->getB2b()){
					$is_b2b = true;
					$form = $form->add('access_b2b', CheckboxType::class, array('label' => 'Enkel inloggen met een B2B (webshop) account', 'required' => false));
				}
			}
		}

		if($allowCache){
			$form = $form->add('cache', CheckboxType::class, array('label' => $this->trans('Pagina cache inschakelen', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']));
			if ($this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
				$form = $form->add('critical', CheckboxType::class, array('label' => $this->trans('Pagina cricital css genereren', [], 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']));
			}
		}

		$form = $form->getForm();

		$allowCache = false; try{ $allowCache = $this->containerInterface->getParameter('trinity_cache'); }catch(\Exception $e){}

		$maxFileSize = 10;
		try{
			$maxFileSize = (int)ini_get('upload_max_filesize');
		}catch(\Exception $e){
			// Nothing going on here
		}

		$pageMetatags   = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->getBySystem(0, (int)$Page->getId(), true);
		$systemMetatags = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->getBySystem(1, false, false);

		$dev = false;
		if($this->containerInterface->getParameter('kernel.environment') == 'dev'){
			$dev = true;
		}

		// Reorder based on priority
		$prioList = [];
		foreach($block_sections as $cat => $blocks){
			foreach($blocks as $block){
				$priority = 0;
				if(!empty($block->priority)){
					$priority = $block->priority;
				}
				$category = '..';
				if(!empty($block->category)){
					$category = $block->category;
				}
				$prioList[$priority][$category][$block->key] = $block;
				ksort($prioList[$priority][$category]);
			}
		}

		krsort($prioList);

		$block_sections = [];
		foreach($prioList as $prio => $blocks_categorized){
			foreach($blocks_categorized as $blocklist){
				foreach($blocklist as $block){
					$category = '..';
					if(!empty($block->category)){
						$category = $block->category;
					}
					$block_sections[$category][$block->key] = $block;
				}
			}
		}


		// Get block field translations
		$BackendLanguage = $this->getDoctrine()->getRepository('CmsBundle:Language')->findOneByLocale($this->getUser()->getAdminLocale());
		$LanguageTranslation = $this->getDoctrine()->getRepository('CmsBundle:LanguageTranslation')->findBy(['catalogue' => 'blocks', 'language' => $BackendLanguage]);
		$blockTranslationList = [];
		foreach($LanguageTranslation as $LT){
			$blockTranslationList[$LT->getLanguageToken()->getToken()] = $LT->getTranslation();
		}

		$allBlockCssClasses = $this->getDoctrine()->getRepository('CmsBundle:PageBlockWrapper')->findAllCssClasses();
		if($request->isXmlHttpRequest()) {
			return $this->render('@Cms/page/edit.ajax.twig', array(
				'form'                 => $form->createView(),
				'tags'                 => $this->getDoctrine()->getRepository('CmsBundle:Tag')->findAll(),
				'new'                  => $new,
				'pageMediaDirId'       => $pageMediaDirId,
				'Page'                 => $Page,
				'pageContents'         => $pageContents,
				'ParentPage'           => $ParentPage,
				'dev'                  => $dev,
				'parentpath'           => $parentpath,
				'pageMetatags'         => $pageMetatags,
				'systemMetatags'       => $systemMetatags,
				'pageSections'         => $pageSections,
				'blockKeyToLabel'      => $blockKeyToLabel,
				'pageBlockSections'    => $pageBlockSections,
				'block_sections'       => $block_sections,
				'all_block_sections'   => $all_block_sections,
				'blockTranslationList' => $blockTranslationList,
				'ActivePage'           => $ActivePage,
				'id'                   => (int)$id,
				'maxFileSize'          => (int)$maxFileSize,
				'saved'                => (bool)$saved,
				'is_b2b'             => (bool)$is_b2b,
				'ck_mediadir_id'       => $pageMediaDirId,
				'allowCache'           => $allowCache,
				'allBlockCssClasses'	=> $allBlockCssClasses,
			));
		}

		return $this->attributes(array(
			'form'                 => $form->createView(),
			'tags'                 => $this->getDoctrine()->getRepository('CmsBundle:Tag')->findAll(),
			'new'                  => $new,
			'pageMediaDirId'       => $pageMediaDirId,
			'Page'                 => $Page,
			'pageContents'         => $pageContents,
			'ParentPage'           => $ParentPage,
			'dev'                  => $dev,
			'parentpath'           => $parentpath,
			'pageMetatags'         => $pageMetatags,
			'systemMetatags'       => $systemMetatags,
			'pageSections'         => $pageSections,
			'blockKeyToLabel'      => $blockKeyToLabel,
			'pageBlockSections'    => $pageBlockSections,
			'mediaParent'          => $mediaParent,
			'block_sections'       => $block_sections,
			'all_block_sections'   => $all_block_sections,
			'blockTranslationList' => $blockTranslationList,
			'ActivePage'           => $ActivePage,
			'id'                   => (int)$id,
			'maxFileSize'          => (int)$maxFileSize,
			'saved'                => (bool)$saved,
			'is_b2b'             => (bool)$is_b2b,
			'pages'                => $this->getPagesByParentid(),
			'ck_mediadir_id'       => $pageMediaDirId,
			'allowCache'           => $allowCache,
			'usedBlocks'           => $usedBlocks,
			'allBlockCssClasses'	=> $allBlockCssClasses,
		));
	}

	/**
	 * @Route("/admin/page/request_critical/{pageid}", name="admin_page_critical_generate")
	 */
	public function requestCriticalAction(Request $request, $pageid)
	{
		$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->find($pageid);

		if(empty($Page)){
			header('Location: /bundles/cms/cache.php?url=' . urlencode($this->generateUrl('admin_page')));
			exit;
		}

		// Request async critical CSS request
		$this->requestCriticalCss($request, $Page);

		if(!empty($request->get('url'))){
			//Redirect to URL
			header('Location: /bundles/cms/cache.php?url=' . $request->get('url'));
			exit;
		} else {
			//Redirect to Admin
			header('Location: /bundles/cms/cache.php?url=' . urlencode($this->generateUrl('admin_page')));
			exit;
		}
	}

	/**
	 * @Route("/admin/page/delete/{id}", name="admin_page_delete")
	 * @Template()
	 */
	public function deleteAction(Request $request, $id = null)
	{
		parent::init($request);

		// Check permissions
		if(!$this->getUser()->checkPermissions('ALLOW_PAGE')){
			parent::test_permissions($request, $this->getUser());
			throw $this->createNotFoundException($this->trans('This feature does not exist', [], 'cms'));
		}

		$em = $this->getDoctrine()->getManager();
		$Page = $em->getRepository('CmsBundle:Page')->find($id);

		$pageLabel = $Page->getLabel();

		if(!is_null($Page)){

			$ParentPage = $Page->getPage();

			$parentpath = '';
			if(is_object($ParentPage)){
				$parentpath = $this->getDoctrine()->getRepository('CmsBundle:Page')->getTitlePathByPage($ParentPage, ' / ');
			}


			$notifySend = false;
			foreach($Page->getParents() as $Parent){
				if($Parent->getNotifyChangeChild()){
					// Child changed
					$this->notify($Parent, 
							$this->trans("%settingslabel%\nDe pagina \'%pagelabel%\' is verwijderd", ['%settingslabel%' => $this->Settings->getLabel(), '%pagelabel%' => ($Page->getPage() ? $parentpath . ' / ' : '') . $Page->getLabel()], 'cms'),
							/*$this->Settings->getLabel() . "\n" . 'De pagina \'' . ($Page->getPage() ? $parentpath . ' / ' : '') . $Page->getLabel() . '\' is verwijderd.',*/
							$this->trans('Pagina verwijderd', [], 'cms'));
					$notifySend = true;
					break;
				}
			}

			if(!$notifySend && $Page->getNotifyChange()){
				// Edit page
				$this->notify($Page,
						$this->trans("%settingslabel%\nDe pagina \'%pagelabel%\' is verwijderd", ['%settingslabel%' => $this->Settings->getLabel(), '%pagelabel%' => ($Page->getPage() ? $parentpath . ' / ' : '') . $Page->getLabel()], 'cms'),
						/*$this->Settings->getLabel() . "\n" . 'De pagina \'' . ($Page->getPage() ? $parentpath . ' / ' : '') . $Page->getLabel() . '\' is verwijderd.',*/
						$this->trans('Pagina verwijderd', [], 'cms'));
			}

			$em = $this->getDoctrine()->getManager();
			$em->remove($Page);
			$em->flush();

			// Clear cache
			$this->clearcacheAction();

			$Syslog = new Log();
			$Syslog->setUser($this->getUser());
			$Syslog->setUsername($this->getUser()->getUsername());
			$Syslog->setType('page');
			$Syslog->setStatus('info');
			$Syslog->setSettings($this->Settings);
			$Syslog->setAction('delete');
			$Syslog->setMessage('Pagina \'' . $pageLabel . '\' is verwijderd.');

			$em = $this->getDoctrine()->getManager();
			$em->persist($Syslog);
			$em->flush();
		}

		header('Location: /bundles/cms/cache.php?url=' . urlencode($this->generateUrl('admin_page')));
		exit;

		// return $this->redirect($this->generateUrl('admin_page'));
	}

	/**
	 * @Route("/admin/page/permissions/{id}", name="admin_page_permissions")
	 * @Template()
	 */
	public function permissionsAction(Request $request, $id = null)
	{

		parent::init($request);

		$em = $this->getDoctrine()->getManager();
		$Page = $em->getRepository('CmsBundle:Page')->find($id);

		/*if(!is_null($Page)){
			$em = $this->getDoctrine()->getManager();
			$em->remove($Page);
			$em->flush();
		}*/

		return $this->attributes(array(
			'Page' => $Page,
		));
	}

	/**
	 * Convert to ASCII
	 *
	 * @param  string $str       Input string
	 * @param  array  $replace   Replace these additional characters
	 * @param  string $delimiter Space delimiter
	 *
	 * @return string
	 */
	public function toAscii($str, $replace=array(), $delimiter='-') {

		if( !empty($replace) ) {
			$str = str_replace((array)$replace, ' ', $str);
		}

		$slugify = new \Cocur\Slugify\Slugify();

		return $slugify->slugify($str, $delimiter);
	}

	/**
	 * Clear Symfony cache
	 *
	 * @return Response
	 */
	public function clearcacheAction(){

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


		$oldCacheDir = substr($realCacheDir, 0, -1).('~' === substr($realCacheDir, -1) ? '+' : '~');
		$filesystem = $this->containerInterface->get('filesystem');
		if (!is_writable($realCacheDir)) { throw new \RuntimeException($this->trans('Unable to write in the "%directory%" directory', ['%directory%' => $realCacheDir], 'cms')); }
		if ($filesystem->exists($oldCacheDir)) { $filesystem->remove($oldCacheDir); }
		$kernel = $this->containerInterface->get('kernel');
		$this->containerInterface->get('cache_clearer')->clear($realCacheDir);
		// This causes problems when the system doesn't have enough rights
		//$filesystem->remove($realCacheDir);

		return new Response();
	}

	protected $Settings = null;
	protected $breadcrumbs = null;
	protected $absoluteUrl = '';
	protected $FirstPage = null;

	public function initPaging(Request $request){
		parent::init($request);

		$em = $this->getDoctrine()->getManager();
		if(is_null($this->Settings)) $this->Settings = $em->getRepository('CmsBundle:Settings')->findByLanguage($this->language, str_replace('www.', '', $request->getHttpHost()));

		if(empty($this->Settings) || empty($this->Settings->getId())){

			// Try to find default settings (first one) and append host
			$tmpSettings = $em->getRepository('CmsBundle:Settings')->findOneBy([], ['id' => 'asc']);
			if(!empty($tmpSettings) && empty($tmpSettings->getHost())){
				$tmpSettings->setHost(str_replace('www.', '', $request->getHttpHost()));
				$em->persist($tmpSettings);
				$em->flush();

				$this->Settings = $tmpSettings;
			}

			if(empty($this->Settings) || empty($this->Settings->getId())){
				die($this->trans('Er zijn geen instellingen gevonden met de host:', [], 'cms') . '<br/><strong>' . str_replace('www.', '', $request->getHttpHost()) . '</strong>');
			}
		}

		if(is_null($this->Settings)) $this->Settings = new \App\CmsBundle\Entity\Settings();

		$this->absoluteUrl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();

		$this->FirstPage = null;
		$tmp_pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(array('language' => $this->Settings->getLanguage(), 'settings' => $this->Settings, 'page' => null, 'base' => null, 'enabled' => true), array('sort' => 'ASC'), 1);
		if(!empty($tmp_pages)){
			$this->FirstPage = $tmp_pages[0];
		}
	}

	public function pageHandler($request){
		// Handle page stuff from the website
		if(isset($_GET['live_edit']) && is_numeric($_GET['live_edit'])){
			$this->containerInterface->get('session')->set('live_edit', $_GET['live_edit'] == 1);
		}
	}

	/**
	 * @Route("/", name="homepage")
	 */
	public function homepageAction(Request $request)
	{
		$this->init($request);

		$cacheAge = $this->cache_page;

		$this->Timer->mark('Before loading page');

		$this->initPaging($request);
		$this->Timer->mark('After: initPaging');
		$this->pageHandler($request);
		$this->Timer->mark('After: pageHandler');

		$request->getSession()->set('webshop_locale', $request->getSession()->get('_locale'));

		$User = $this->containerInterface->get('security.token_storage')->getToken()->getUser();

		$webshop_enabled = false;
		if(in_array('WebshopBundle', $this->installed)){
			$webshop_enabled = true;
		}

		// Maintenance mode
		if($this->Settings->getMaintenance() && (!is_object($User) || (!$User->hasRole('ROLE_ADMIN') && !$User->hasRole('ROLE_SUPER_ADMIN')))){
			return $this->render('@Cms/maintain.html.twig', array(
				'bodyClass'       => 'dynamic',
				'webshop_enabled' => $webshop_enabled,
				'Settings'        => $this->Settings,
				'metatags'        => $this->getDoctrine()->getRepository('CmsBundle:Metatag')->getBySystem(0, (int)$this->FirstPage->getId(), true),
				'users'           => $this->getDoctrine()->getRepository('CmsBundle:User')->findAll(),
				'systemMetatags'  => $this->getDoctrine()->getRepository('CmsBundle:Metatag')->getBySystem(1, false, false),
			));
		}

		// $this->breadcrumbs = $this->containerInterface->get("white_october_breadcrumbs");
		// $this->breadcrumbs->addItem($this->Settings->getLabel(), $this->containerInterface->get("router")->generate("homepage"));

		// Load actual homepage instead of dynamic page
		if( $request->attributes->get('_route') == 'homepage' ){

			// $this->breadcrumbs->addItem($Page->getTitle(), '/' . $Page->getSlug());
			if(!is_null($this->FirstPage)){

                $allowCache = false;
				if ($this->containerInterface->hasParameter('trinity_cache') && ($this->containerInterface->getParameter('trinity_cache') == 'true' || $this->containerInterface->getParameter('trinity_cache'))) {
					$allowCache = true;
				}
                if(!empty($_GET['nocache']) || !empty($_GET['resetcache']) || !empty($_GET['timer']) || $this->containerInterface->getParameter('kernel.environment') == 'dev'){
                    $allowCache = false;
                }

				if(!empty($_POST['form']) && !empty($_POST['form-bundle-submit'])){
					$allowCache = false;
				}

				if($this->Meta){
					$this->Meta->registerView($request, 'page');
				}

                if($allowCache && $this->FirstPage->getCache()){
                    $cachedData = $this->FirstPage->getCacheData($request->getRequestUri(), $this->cache_page);
                    if(!empty($cachedData)){
                        // Return cached data
                        echo $cachedData;
                        exit;
                    }
                }

				$metatags       = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->getBySystem(0, (int)$this->FirstPage->getId(), true);
				$systemMetatags = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->getBySystem(1, false, false);



				if(!empty($this->FirstPage)){
					if($this->FirstPage->getPageType() == 'external'){
						$custom_url = $this->FirstPage->getCustomUrl();
						if(!empty($custom_url)){
							header('Location:' . $custom_url);
							exit;
						}
					}
				}


				// VALIDATE
				$access = $this->FirstPage->getAccess();
				$access_b2b = $this->FirstPage->getAccessB2b();
				if($access != null){
					// Validate permissions
					if($access == 'login'){
						$checkRoles = $this->FirstPage->getAccessRoles();
						if($checkRoles){
							if(!is_array($checkRoles)) $checkRoles = [$checkRoles];
							$hasRoleAccess = false;
							$hasB2bAccess = false;
							foreach($checkRoles as $role){
								if($this->containerInterface->get('security.authorization_checker')->isGranted($role)){
									$hasRoleAccess = true;
									break;
								}
							}

							if($hasRoleAccess){
								if($access_b2b && !$this->getUser()->getB2b()){
									// User is authenticated, b2b access is required, but user doesnt have it
									$hasRoleAccess = false;
								}
							}

							if(!$hasRoleAccess){
								if ($this->FirstPage->getAccessAllowLogin()) {
									// LOGIN FORM

									$hasLoginInvalidRoles = false;
									if($this->containerInterface->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')){
										$hasLoginInvalidRoles = true;
									}






									$hasAltPage = false;
									if($hasLoginInvalidRoles){
										// Invalid role for this page
										$pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(['settings' => $this->Settings, 'access_alt_home' => true]);
										foreach($pages as $PageCheck){
											$access = $PageCheck->getAccess();
											if($access != null && $access == 'login'){
												$checkRoles = $PageCheck->getAccessRoles();
												if($checkRoles){
													if(!is_array($checkRoles)) $checkRoles = [$checkRoles];
													$hasRoleAccess = false;
													foreach($checkRoles as $role){
														if($this->get('security.authorization_checker')->isGranted($role)){
															$hasRoleAccess = true;
															break;
														}
													}
													if($hasRoleAccess){
														$this->FirstPage = $PageCheck;
														$hasAltPage = true;
													}
												}
											}
										}
									}







									if(!$hasAltPage){
										$lastUsername = '';
										$error = null;

										$LoginPage = clone $this->FirstPage;

										$LoginPage->setTitle($this->trans('Inloggen', [], 'frontend', $request->getLocale()));
										$LoginPage->setLabel($this->trans('Inloggen', [], 'frontend', $request->getLocale()));

										$LoginPage->requireAuth = true;
										$LoginPage->isHome = true;

										return $this->parse( '@Cms/page/page', $this->attributes([
											'loginform'            => true,
											'bodyClass'            => 'dynamic',
											'webshop_enabled'      => $webshop_enabled,
											'Page'                 => $LoginPage,
											'metatags'             => $metatags,
											'systemMetatags'       => $systemMetatags,
											'error'                => $error,
											'last_username'        => $lastUsername,
											'hasLoginInvalidRoles' => $hasLoginInvalidRoles,
										]));
									}
								}else{
									throw $this->createAccessDeniedException('Permission denied');
								}
							}
						}
					}elseif($access == 'no-login'){
						if($this->containerInterface->get('security.authorization_checker')->isGranted('ROLE_USER')){
							throw $this->createAccessDeniedException('Permission denied');
						}
					}
				}

				$content = array();
				$Language = $this->em->getRepository('CmsBundle:Language')->findByLocale($request->getLocale());
				$contents = $this->em->getRepository('CmsBundle:PageContent')->findBy([
					'page' => $this->FirstPage,
					// 'language' => $Language
				], [
					'revision' => 'desc'
				]);

				$used = [];
				if(!empty($contents)){
					foreach($contents as $PageContent){

						if(!empty($_GET['rev']) && is_numeric($_GET['rev']) && $PageContent->getName() == 'default' && $PageContent->getRevision() != (int)$_GET['rev']){
							continue;
						}

						if((empty($_GET['rev']) || $_GET['rev'] != $PageContent->getRevision()) && !$PageContent->getPublished()){
							continue;
						}

						if(!in_array($PageContent->getName(), $used)){
							if((int)$this->containerInterface->get('session')->get('live_edit') == 0){
								$ct = $PageContent->getContent();
								$ct = $this->parseModuleContent($ct, array(), $request);

								$ct = $this->parseCmsUrls($ct);

								$PageContent->setContent($ct);
							}
							$content[$PageContent->getName()] = $PageContent;
							$used[] = $PageContent->getName();
						}
					}
				}


				$extraPageJs = [];
				$extraPageCss = [];

				// Find bundles resources.json
				$active_bundles = [];
				if ($this->FirstPage->getBlocks()->count() > 0) {
					foreach ($this->FirstPage->getBlocks() as $Wrapper) {
						if ($Wrapper->getBlocks()->count() > 0) {
							foreach ($Wrapper->getBlocks() as $Block) {

								if (!empty($Block->getBundleData()) ||  !empty($Block->getConfig())) {
									$bundledata = json_decode($Block->getBundleData(), true);

									if (empty($bundledata) && !empty($Block->getConfig())) {
										$configText = $Block->getConfig();
										if (isset($configText['text'])) {
											$configText = $configText['text'];
											if (preg_match('/({(.*?)})/', $configText, $match) == 1) {
												$text = json_decode($match[1], true);
												if (!empty($text) && isset($text['bundlename'])) {
													$bundledata = $text;
												}
											}
										}
									}
									
									if (!empty($bundledata)) {
										$bundleName = $bundledata['bundlename'];

										try {
											$bundleName = str_replace('Qinox', 'Trinity', $bundleName);
											$bundleControllerName = str_replace('Trinity', 'App\\Trinity\\', $bundleName) . '\\Controller\\' . preg_replace('/(Trinity|Bundle)/', '', $bundleName) . 'Controller';

											// THIS IS HOMEPAGE
											if (method_exists($bundleControllerName, 'resourcesHandler')) {
												$bundle_resources_file = $bundleControllerName::resourcesHandler($this->Settings, $bundledata, $this->containerInterface->get('kernel')->getProjectDir());
												if (!empty($bundle_resources_file))
												{
													$bundle_resources_file = file_get_contents($bundle_resources_file);
													$bundle_resources = json_decode($bundle_resources_file, true);

													// is json_decode fails the content is null
													if (!empty($bundle_resources))
													{
														if (isset($bundle_resources['scripts'])) {
															foreach($bundle_resources['scripts'] as $script) {
																if(!in_array($script, $extraPageJs)){
																	$extraPageJs[] = $script;
																}
															}
														}
														if (isset($bundle_resources['style'])) {
															foreach($bundle_resources['style'] as $style) {
																if(!in_array($style, $extraPageCss)){
																	$extraPageCss[] = $style;
																}
															}
														}
													}
												}
												if (!in_array($bundleName, $active_bundles)) {
													$active_bundles[] = $bundleName;
												}
											}
										} catch (\Exception $e) {

										}
									}
								}
							}
						}
					}
				}


				$this->FirstPage->isHome = true;

				$this->Timer->mark('Before returning page to front-end');

				$response = $this->render('@Cms/page/page.html.twig', $this->attributes([
					'bodyClass'       => 'dynamic',
					'content'         => $content,
					'webshop_enabled' => $webshop_enabled,
					'Page'            => $this->FirstPage,
					'extraPageCss'    => $extraPageCss,
					'extraPageJs'     => $extraPageJs,
					'metatags'        => $this->getDoctrine()->getRepository('CmsBundle:Metatag')->getBySystem(0, (int)$this->FirstPage->getId(), true),
					'users'           => $this->getDoctrine()->getRepository('CmsBundle:User')->findAll(),
					'systemMetatags'  => $this->getDoctrine()->getRepository('CmsBundle:Metatag')->getBySystem(1, false, false),
					])
				);

				$response = $this->responseRewriteOutput($response, false, false);

				if ($this->containerInterface->getParameter('kernel.environment') == 'prod') {
					if(empty($_POST['form']) && empty($_POST['form-bundle-submit'])){
						$this->FirstPage->setCacheData($response->getContent(), $request->getRequestUri());
					}
				}

/*
				$response->headers->set(AbstractSessionListener::NO_AUTO_CACHE_CONTROL_HEADER, 'true');
				$response->setPublic();
				$response->setMaxAge($cacheAge);
				$response->headers->addCacheControlDirective('must-revalidate');  
				$response->setVary(array('Accept-Encoding', 'User-Agent'));
				$response->headers->addCacheControlDirective('max-age', $cacheAge);
				$response->setSharedMaxAge($cacheAge);
*/

				return $response;
			}

			return $this->render('@Cms/clean-install.html.twig', []);
		}
	}

	/**
	 * Load dynamic page as defined in CmsBundle
	 *
	 * @param  Request $request
	 * @Template()
	 */
	public function pageAction(Request $request){
		$this->init($request);

		$cacheAge = $this->cache_page;

		$this->Timer->reset();
		$this->Timer->mark('Before loading page');

		$Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->find($request->get('pageId'));

		// Check from parameters if caching must be enabled
		$allowCache = false; try{ $allowCache = $this->containerInterface->getParameter('trinity_cache'); }catch(\Exception $e){}
		if(!empty($_GET['nocache']) || !empty($_GET['resetcache']) || !empty($_GET['timer'])){
			$allowCache = false;
		}

		if(!empty($_POST['form']) && !empty($_POST['form-bundle-submit'])){
			$allowCache = false;
		}

		if($this->Meta){
			$this->Meta->registerView($request, 'page');
		}


		if($allowCache && $Page->getCache()){
			$cachedData = $Page->getCacheData($request->getRequestUri(), $this->cache_page);
			if(!empty($cachedData)){
				// Return cached data
				echo $cachedData;
				exit;
			}
		}

		$this->initPaging($request);
		$this->Timer->mark('After: initPaging');
		$this->pageHandler($request);
		$this->Timer->mark('After: pageHandler');

		$request->getSession()->set('webshop_locale', $request->getSession()->get('_locale'));

		$FirstPage = null;
		$tmp_pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(array('page' => null, 'settings' => $this->Settings, 'enabled' => true), array('sort' => 'ASC'), 1);
		if(!empty($tmp_pages)){
			$FirstPage = $tmp_pages[0];
		}

		$params = array();
		$params[] = $request->get('param1');
		$params[] = $request->get('param2');
		$params[] = $request->get('param3');
		$params[] = $request->get('param4');
		$params[] = $request->get('param5');

		$User = $this->containerInterface->get('security.token_storage')->getToken()->getUser();

		// Maintenance mode
		if($this->Settings->getMaintenance() && (!is_object($User) || (!$User->hasRole('ROLE_ADMIN') && !$User->hasRole('ROLE_SUPER_ADMIN')))){
			return $this->render('@Cms/maintain.html.twig', array(
				'Settings' => $this->Settings,
				'users' => $this->getDoctrine()->getRepository('CmsBundle:User')->findAll()
			));
		}

		if($Page->getSettings() && $Page->getSettings()->getId() != $this->Settings->getId()){
			// Found page doesn't share the proper settings ID, try to find another page with the same slug key and the proper settings ID

			$tmpSlugKey = $Page->getSlugKey();
			$AltPage = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneBy(['settings' => $this->Settings, 'slugkey' => $tmpSlugKey]);
			if($AltPage){
				// Found alternative page on current site, moving..
				$Page = $AltPage;
			}else{
				// Not found, page is not available for current settings
				throw $this->createNotFoundException('Page not found');
			}
		}

		// Find alternative for language
		if($Page->getLanguage() != $this->language){
			$AltPage = $this->getDoctrine()->getRepository('CmsBundle:Page')->findOneBy(['language' => $this->language, 'slugkey' => $Page->getSlugKey()]);
			if(!empty($AltPage)){
				$Page = $AltPage;
			}
		}

		if($Page->getPageType() == 'external'){
			header('Location:' . $Page->getCustomUrl()); exit;
		}

		if($Page->getPageType() == 'child'){
			$ChildPage = null;
			$childPages = $Page->getPages();
			// Ignore disabled pages. If no valid childs are found, redirect to 'homepage'
			foreach($childPages as $p)
			{
				if ($p->getEnabled() && $p->getLanguage() == $Page->getLanguage()) {
					$ChildPage = $p;
					break;
				}
			}

			if (empty($ChildPage)) {
				header('Location:'.$this->generateUrl('homepage'));exit;
			}

			header('Location:' . $this->generateUrl($ChildPage->getSlugKey())); exit;
		}

		if(!$Page->isValid() || $Page->getLanguage() != $this->language){
			throw $this->createNotFoundException($this->trans('Page not found', [], 'cms'));
		}

		if($Page == $FirstPage){
			// If active page and home page are identical, redirect to homepage
			$baseUri = $this->Settings->getBaseUri();
			if(empty($baseUri)){
				return $this->redirect($this->generateUrl('homepage'));
			}
		}

		$Parent = $Page;
		$parent_crumbs = [];
		while($Parent->hasPage()){
			$Parent = $Parent->getPage();
			$parent_crumbs[] = [$Parent->getLabel(), $Parent->getSlugKey()];
		}
		if(!empty($parent_crumbs)){
			$parent_crumbs = array_reverse($parent_crumbs);
			foreach($parent_crumbs as $crumb){
				$this->breadcrumbs->addRouteItem($crumb[0], $crumb[1]);
			}
		}

		$this->breadcrumbs->addItem($Page->getLabel(), $Page->getSlug());

		// $this->breadcrumbs->addItem($Page->getTitle(), '/' . $Page->getSlug());

		$metatags       = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->getBySystem(0, (int)$Page->getId(), true);
		$systemMetatags = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->getBySystem(1, false, false);


		/* **** **** **** **** **** **** **** **** **** **** **** **** ****

			START | FIND ENTITIES RELATED TO METATAG

		**** **** **** **** **** **** **** **** **** **** **** **** **** */

		$linkedBundle = null;
		$bundle_metatags = [];

		// Find first bundle linked on page        
		if($Page->getBlocks()->count() > 0){
			foreach($Page->getBlocks() as $Wrapper){
				if($Wrapper->getBlocks()->count() > 0){
					foreach($Wrapper->getBlocks() as $Block){
						if(!empty($Block->getBundleData())){
							$bundledata = json_decode($Block->getBundleData(), true);
							if(!empty($bundledata)){
								$bundleName = $bundledata['bundlename'];

								try {
									$bundleName = str_replace('Qinox', 'Trinity', $bundleName);
									$bundleControllerName = str_replace('Trinity', 'App\\Trinity\\', $bundleName) . '\\Controller\\' . preg_replace('/(Trinity|Bundle)/', '', $bundleName) . 'Controller';
									$cleanUri = preg_replace('/^\//', '', str_replace($this->generateUrl($request->get('_route')), '', $this->uri));
									$params = explode('/', $cleanUri);
									if(method_exists($bundleControllerName, 'metatagHandler')){
										$bundle_metatags = $bundleControllerName::metatagHandler($this->em, $params, $bundledata, $request);

										$linkedBundle = str_replace('Trinity', '', $Block->getBundle()); break 2;
									}
								} catch (\Symfony\Component\Debug\Exception\UndefinedMethodException $e) {
									
								}
							}
						}
					}
				}
			}
		}

		/* **** **** **** **** **** **** **** **** **** **** **** **** ****

			END | FIND ENTITIES RELATED TO METATAG

		**** **** **** **** **** **** **** **** **** **** **** **** **** */

		$blockData = null;
		$content = array();
		$Language = $this->em->getRepository('CmsBundle:Language')->findByLocale($request->getLocale());
		$contents = $this->em->getRepository('CmsBundle:PageContent')->findBy([
			'page' => $Page,
			// 'language' => $Language
		], [
			'revision' => 'desc'
		]);

		$used = [];
		$blocks = $Page->getBlocks();
		$ct = '';

		if($Page->getAccessFree()){
			// No login required
		}else{
			$CheckPage = null;
			foreach($Page->getParents($this->FirstPage) as $Parent){
				// VALIDATE
				$access = $Parent->getAccess();
				$access_b2b = $Parent->getAccessB2b();
				if($access != null){
					// Validate permissions
					if($access == 'password'){

						if ($this->get('session')->get('page-auth') == $Page->getId()) {
							// Succes
						}else{

							// PASSWORD FORM
							$LoginPage = clone $Parent;

							$LoginPage->setTitle($this->trans('Inloggen', [], 'frontend', $request->getLocale()));
							$LoginPage->setLabel($this->trans('Inloggen', [], 'frontend', $request->getLocale()));

							$LoginPage->requireAuth = true;
							$error = null;

							if(!empty($_POST['_password'])){
								if($_POST['_password'] == $LoginPage->getAccessPwd()){
									$this->get('session')->set('page-auth', $Page->getId());

									header('Location:' . $this->generateUrl($Page->getSlugKey()));
									exit;
								}else{
									$error = $this->trans('Het wachtwoord is ongeldig.', [], 'cms');
								}
							}

							return $this->attributes([
								'pwdform'            => true,
								'bodyClass'            => 'dynamic',
								'Page'                 => $LoginPage,
								'metatags'             => $metatags,
								'systemMetatags'       => $systemMetatags,
								'bundle_metatags'      => $bundle_metatags,
								'error'                => $error,
							]);
						}

					}elseif($access == 'login'){
						$checkRoles = $Parent->getAccessRoles();
						if($checkRoles){
							if(!is_array($checkRoles)) $checkRoles = [$checkRoles];
							$hasRoleAccess = false;
							foreach($checkRoles as $role){
								if($this->containerInterface->get('security.authorization_checker')->isGranted($role)){
									$hasRoleAccess = true;
									break;
								}
							}

							if($hasRoleAccess){
								if($access_b2b && !$this->getUser()->getB2b()){
									// User is authenticated, b2b access is required, but user doesnt have it
									$hasRoleAccess = false;
								}
							}

							if(!$hasRoleAccess){
								if ($Parent->getAccessAllowLogin()) {
									// LOGIN FORM
									$LoginPage = clone $Parent;

									$hasLoginInvalidRoles = false;
									if($this->containerInterface->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')){
										$hasLoginInvalidRoles = true;
									}

									$lastUsername = '';
									$error = null;

									$LoginPage->setTitle($this->trans('Inloggen', [], 'frontend', $request->getLocale()));
									$LoginPage->setLabel($this->trans('Inloggen', [], 'frontend', $request->getLocale()));

									$LoginPage->requireAuth = true;

									return $this->attributes([
										'loginform'            => true,
										'bodyClass'            => 'dynamic',
										'Page'                 => $LoginPage,
										'metatags'             => $metatags,
										'systemMetatags'       => $systemMetatags,
										'bundle_metatags'      => $bundle_metatags,
										'error'                => $error,
										'last_username'        => $lastUsername,
										'hasLoginInvalidRoles' => $hasLoginInvalidRoles,
									]);
								}else{
									throw $this->createAccessDeniedException($this->trans('Permission denied'));
								}
							}
						}
					}elseif($access == 'no-login'){
						if($this->containerInterface->get('security.authorization_checker')->isGranted('ROLE_USER')){
							throw $this->createAccessDeniedException($this->trans('Permission denied', [], 'cms'));
						}
					}
				}
			}



			// VALIDATE
			$access = $Page->getAccess();
			$access_b2b = $Page->getAccessB2b();
			if($access != null){
				// Validate permissions
				if($access == 'password'){

					if ($this->get('session')->get('page-auth') == $Page->getId()) {
						// Succes
					}else{

						// PASSWORD FORM
						$LoginPage = clone $Page;

						$LoginPage->setTitle($this->trans('Inloggen', [], 'frontend', $request->getLocale()));
						$LoginPage->setLabel($this->trans('Inloggen', [], 'frontend', $request->getLocale()));

						$LoginPage->requireAuth = true;
						$error = null;

						if(!empty($_POST['_password'])){
							if($_POST['_password'] == $LoginPage->getAccessPwd()){
								$this->get('session')->set('page-auth', $Page->getId());

								header('Location:' . $this->generateUrl($Page->getSlugKey()));
								exit;
							}else{
								$error = $this->trans('Het wachtwoord is ongeldig.', [], 'cms');
							}
						}

						return $this->attributes([
							'pwdform'            => true,
							'bodyClass'            => 'dynamic',
							'Page'                 => $LoginPage,
							'metatags'             => $metatags,
							'systemMetatags'       => $systemMetatags,
							'bundle_metatags'      => $bundle_metatags,
							'error'                => $error,
						]);
					}

				}elseif($access == 'login'){
					$checkRoles = $Page->getAccessRoles();
					if($checkRoles){
						if(!is_array($checkRoles)) $checkRoles = [$checkRoles];
						$hasRoleAccess = false;
						foreach($checkRoles as $role){
							if($this->containerInterface->get('security.authorization_checker')->isGranted($role)){
								$hasRoleAccess = true;
								break;
							}
						}

						if($hasRoleAccess){
							if($access_b2b && !$this->getUser()->getB2b()){
								// User is authenticated, b2b access is required, but user doesnt have it
								$hasRoleAccess = false;
							}
						}

						if(!$hasRoleAccess){
							if ($Page->getAccessAllowLogin()) {
								// LOGIN FORM

								$hasLoginInvalidRoles = false;
								if($this->containerInterface->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')){
									$hasLoginInvalidRoles = true;
								}

								$lastUsername = '';
								$error = null;

								$LoginPage = clone $Page;

								$LoginPage->setTitle($this->trans('Inloggen', [], 'frontend', $request->getLocale()));
								$LoginPage->setLabel($this->trans('Inloggen', [], 'frontend', $request->getLocale()));

								$LoginPage->requireAuth = true;

								return $this->attributes([
									'loginform'            => true,
									'bodyClass'            => 'dynamic',
									'Page'                 => $LoginPage,
									'metatags'             => $metatags,
									'systemMetatags'       => $systemMetatags,
									'bundle_metatags'      => $bundle_metatags,
									'error'                => $error,
									'last_username'        => $lastUsername,
									'hasLoginInvalidRoles' => $hasLoginInvalidRoles,
								]);
							}else{
								throw $this->createAccessDeniedException($this->trans('Permission denied', [], 'cms'));
							}
						}
					}
				}elseif($access == 'no-login'){
					if($this->containerInterface->get('security.authorization_checker')->isGranted('ROLE_USER')){
						throw $this->createAccessDeniedException($this->trans('Permission denied', [], 'cms'));
					}
				}
			}
		}

		// VALIDATE
		$access = $Page->getAccess();
		$access_b2b = $Page->getAccessB2b();
		if($access != null){
			// Validate permissions
				if($access == 'password'){

					if ($this->get('session')->get('page-auth') == $Page->getId()) {
						// Succes
					}else{

						// PASSWORD FORM
						$LoginPage = clone $Page;

						$LoginPage->setTitle($this->trans('Inloggen', [], 'frontend', $request->getLocale()));
						$LoginPage->setLabel($this->trans('Inloggen', [], 'frontend', $request->getLocale()));

						$LoginPage->requireAuth = true;
						$error = null;

						if(!empty($_POST['_password'])){
							if($_POST['_password'] == $LoginPage->getAccessPwd()){
								$this->get('session')->set('page-auth', $Page->getId());

								header('Location:' . $this->generateUrl($Page->getSlugKey()));
								exit;
							}else{
								$error = $this->trans('Het wachtwoord is ongeldig.', [], 'cms');
							}
						}

						return $this->attributes([
							'pwdform'            => true,
							'bodyClass'            => 'dynamic',
							'Page'                 => $LoginPage,
							'metatags'             => $metatags,
							'systemMetatags'       => $systemMetatags,
							'bundle_metatags'      => $bundle_metatags,
							'error'                => $error,
						]);
					}

				}elseif($access == 'login'){
				$checkRoles = $Page->getAccessRoles();
				if($checkRoles){
					if(!is_array($checkRoles)) $checkRoles = [$checkRoles];
					$hasRoleAccess = false;
					foreach($checkRoles as $role){
						if($this->containerInterface->get('security.authorization_checker')->isGranted($role)){
							$hasRoleAccess = true;
							break;
						}
					}

					if($hasRoleAccess){
						if($access_b2b && !$this->getUser()->getB2b()){
							// User is authenticated, b2b access is required, but user doesnt have it
							$hasRoleAccess = false;

							if(!$hasRoleAccess){
								if ($this->FirstPage->getAccessAllowLogin()) {
									// LOGIN FORM

									$hasLoginInvalidRoles = false;
									if($this->containerInterface->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')){
										$hasLoginInvalidRoles = true;
									}






									$hasAltPage = false;
									if($hasLoginInvalidRoles){
										// Invalid role for this page
										$pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(['settings' => $this->Settings, 'access_alt_home' => true]);
										foreach($pages as $PageCheck){
											$access = $PageCheck->getAccess();
											if($access != null && $access == 'login'){
												$checkRoles = $PageCheck->getAccessRoles();
												if($checkRoles){
													if(!is_array($checkRoles)) $checkRoles = [$checkRoles];
													$hasRoleAccess = false;
													foreach($checkRoles as $role){
														if($this->get('security.authorization_checker')->isGranted($role)){
															$hasRoleAccess = true;
															break;
														}
													}
													if($hasRoleAccess){
														$this->FirstPage = $PageCheck;
														$hasAltPage = true;
													}
												}
											}
										}
									}







									if(!$hasAltPage){

										$lastUsername = '';
										$error = null;

										$LoginPage = clone $this->FirstPage;

										$LoginPage->setTitle($this->trans('Inloggen', [], 'frontend', $request->getLocale()));
										$LoginPage->setLabel($this->trans('Inloggen', [], 'frontend', $request->getLocale()));

										$LoginPage->requireAuth = true;

										return $this->parse( '@Cms/Page/page', $this->attributes([
											'loginform'            => true,
											'bodyClass'            => 'dynamic',
											'Page'                 => $LoginPage,
											'metatags'             => $metatags,
											'systemMetatags'       => $systemMetatags,
											'bundle_metatags'      => $bundle_metatags,
											'error'                => $error,
											'last_username'        => $lastUsername,
											'hasLoginInvalidRoles' => $hasLoginInvalidRoles,
										]));
									}
								}else{
									throw $this->createAccessDeniedException($this->trans('Permission denied', [], 'cms'));
								}
							}
						}
					}elseif($access == 'no-login'){
						if($this->containerInterface->get('security.authorization_checker')->isGranted('ROLE_USER')){
							throw $this->createAccessDeniedException($this->trans('Permission denied', [], 'cms'));
						}
					}
				}
			}
		}

		if(!empty($contents)){
			foreach($contents as $PageContent){
				if(!empty($_GET['rev']) && is_numeric($_GET['rev']) && $PageContent->getName() == 'default' && $PageContent->getRevision() != (int)$_GET['rev']){
					continue;
				}

				if((empty($_GET['rev']) || $_GET['rev'] != $PageContent->getRevision()) && !$PageContent->getPublished()){
					continue;
				}

				if(!in_array($PageContent->getName(), $used)){
					if((int)$this->containerInterface->get('session')->get('live_edit') == 0){
						$ct = $PageContent->getContent();
						$ct = $this->parseModuleContent($ct, $params, $request);

						if(preg_match_all('/\[page:([a-zA-Z0-9\-\_]+)(\#[a-zA-Z0-9\-].*?)?\]/', $ct, $matches)){

							$idToSlug = [];
							$cacheFile = preg_replace('/\/src.*/', '/var/cache/prod/', __DIR__) . 'page_id_slug';
							if(file_exists($cacheFile)){
								$idToSlug = json_decode(file_get_contents($cacheFile), true);
							}

							foreach($matches[0] as $index => $tag){
								$key = $matches[1][$index];
								if(is_numeric($key)){ if(array_key_exists($key, $idToSlug)){ $key = $idToSlug[$key]; }else{ $key = 'homepage'; } }

								$key = str_replace('-', '_', $key);

								$ct = str_replace('http://' . $tag, $this->generateUrl($key), $ct);
								$ct = str_replace('https://' . $tag, $this->generateUrl($key), $ct);
								$ct = str_replace($tag, $this->generateUrl($key), $ct);
							}
						}

						$PageContent->setContent($ct);
					}
					$content[$PageContent->getName()] = $PageContent;
					$used[] = $PageContent->getName();
				}
			}
		}

		// Check for alt names
		$customTitle = null;
		$page_locale = $Page->getLanguage()->getLocale();
		$realCacheDir = preg_replace('/\/cache.*/', '/cache/prod/', $this->containerInterface->getParameter('kernel.cache_dir'));
		foreach(scandir($realCacheDir) as $file){
			if(is_file($realCacheDir.$file) && substr($file, 0, 7) == 'titles_'){
				$fd = file($realCacheDir.$file);
				foreach($fd as $line){
					$line = explode("\t", $line);
					if($page_locale == trim($line[0])){
						$uri = str_replace('/' . $Page->getSlug(), '', $_SERVER['REQUEST_URI']);
						if(strpos(trim($uri), trim($line[1])) !== false){
							$customTitle = trim($line[2]) . ' - ';
						}
					}
				}
			}
		}

		$extraPageJs = [];
		$extraPageCss = [];

		// Find bundles resources.json
		$active_bundles = [];
		if ($Page->getBlocks()->count() > 0) {
			foreach ($Page->getBlocks() as $Wrapper) {
				if ($Wrapper->getBlocks()->count() > 0) {
					foreach ($Wrapper->getBlocks() as $Block) {
						if (!empty($Block->getBundleData())) {
							$bundledata = json_decode($Block->getBundleData(), true);
							if (!empty($bundledata)) {
								$bundleName = $bundledata['bundlename'];

								try {
									$bundleName = str_replace('Qinox', 'Trinity', $bundleName);
									$bundleControllerName = str_replace('Trinity', 'App\\Trinity\\', $bundleName) . '\\Controller\\' . preg_replace('/(Trinity|Bundle)/', '', $bundleName) . 'Controller';

									// THIS IS REGULAR PAGE
									if (method_exists($bundleControllerName, 'resourcesHandler')) {
										$bundle_resources_file = $bundleControllerName::resourcesHandler($this->Settings, $bundledata, $this->containerInterface->get('kernel')->getProjectDir());
										// dump($bundle_resources_file); die();
										if (!empty($bundle_resources_file))
										{
											$bundle_resources_file = file_get_contents($bundle_resources_file);
											$bundle_resources = json_decode($bundle_resources_file, true);

											// is json_decode fails the content is null
											if (!empty($bundle_resources))
											{
												if (isset($bundle_resources['scripts'])) {
													foreach($bundle_resources['scripts'] as $script) {
														if(!in_array($script, $extraPageJs)){
															$extraPageJs[] = $script;
														}
													}
												}
												if (isset($bundle_resources['style'])) {
													foreach($bundle_resources['style'] as $style) {
														if(!in_array($style, $extraPageCss)){
															$extraPageCss[] = $style;
														}
													}
												}
											}
										}
										if (!in_array($bundleName, $active_bundles)) {
											$active_bundles[] = $bundleName;
										}
									}
								} catch (\Exception $e) {

								}
							}
						}
					}
				}
			}
		}

		
		$this->containerInterface->get('session')->set('last-route', $request->get('_route'));

		$this->Timer->mark('Before returning page to front-end');

		$response = $this->render('@Cms/page/page.html.twig', $this->attributes([
			'bodyClass'      => 'dynamic',
			'Page'           => $Page,
			'extraPageCss'   => $extraPageCss,
			'extraPageJs'    => $extraPageJs,
			'params'         => $params,
			'customTitle'    => $customTitle,
			'blockData'      => $blockData,
			'content'        => $content,
			'metatags'       => $metatags,
			'systemMetatags' => $systemMetatags,
			'bundle_metatags' => $bundle_metatags,
			'users'          => $this->getDoctrine()->getRepository('CmsBundle:User')->findAll(),
			'timer_result'    => $this->Timer->show(false),
		]));

		$response = $this->responseRewriteOutput($response, true);

/*
		$response->headers->set(AbstractSessionListener::NO_AUTO_CACHE_CONTROL_HEADER, 'true');
		$response->setPublic();
		$response->setMaxAge($cacheAge);
		$response->headers->addCacheControlDirective('must-revalidate');  
		$response->setVary(array('Accept-Encoding', 'User-Agent'));
		$response->headers->addCacheControlDirective('max-age', $cacheAge);
		$response->setSharedMaxAge($cacheAge);
*/

		if ($this->containerInterface->getParameter('kernel.environment') == 'prod') {
			if(empty($_POST['form']) && empty($_POST['form-bundle-submit'])){
				$Page->setCacheData($response->getContent(), $request->getRequestUri());
			}
		}

		return $response;
	}

	private function parseModuleContent($content, $params = array(), $request = null){
		// $content = '[app.show_form:show(2)]'; // Form
		// $content = '[app.show_blog:show(1)]'; // Blog
		if(preg_match_all('/\[(.*?_show):(.*?)\((.*?)\)\]/', $content, $m)){
			foreach($m[1] as $i => $call){
				$action = $m[2][$i];
				$value = $m[3][$i];

				$cfg = json_decode($value, true);
				if(is_null($cfg)) $cfg = array();

				try{
					$func = $action . 'Action';
					$content = str_replace($m[0][$i], $this->containerInterface->get($call)->$func($cfg, $params, $request), $content);
				}catch(\Exception $e){
					$content = str_replace($m[0][$i], $e->getMessage(), $content);
				}
			}
		}
		return $content;
	}

	/**
	 * @Route("/admin/page/link/{plugin}", name="admin_page_link")
	 * @Template()
	 */
	public function linkAction(Request $request, Environment $twig, $plugin = null){
		parent::init($request);

		$routes = $this->modRoutes;
		/* foreach($routes as $index => $route){
			if(!$this->containerInterface->get('templating')->exists($route['bundleName'] . '::link.html.twig')){
				unset($routes[$index]);
			}
		} */

		$linkdata = array();

		$activeRoute = null;
		if($plugin != null){
			foreach($routes as $route){
				if($plugin == $route['name']){
					$activeRoute = $route; break;
				}
			}

			if(in_array(strtolower($plugin), ['trinity', 'admin'])){
				$route = [
					'name' => 'Admin',
					'route' => 'admin',
					'bundleName' => 'admin'
				];

				$activeRoute = $route;
			}

			if(!empty($activeRoute)){
				$LinkController = $this->containerInterface->get(strtolower($activeRoute['bundleName']) . '_link');
				$linkdata = $LinkController->getLinkData($this->getDoctrine(), $this->language, $this->containerInterface, $this->Settings);
			}
		}

		return $this->attributes([
			'activeRoute' => $activeRoute,
			'routes' => $routes,
			'linkdata' => $linkdata,
			'post' => (!empty($_POST) && !isset($_POST['init']) ? $_POST : null),
			'poststring' => (!empty($_POST) ? json_encode($_POST) : json_encode([]))
		]);
	}

	/**
	 * @Route("/admin/page/copy/{locale}", name="admin_page_copy")
	 * @Template()
	 */
	public function copyAction(Request $request, $locale = null, $parent = null, $newParent = null, $depth = 0){
		parent::init($request);

		/*if($depth > 5){
			die("DEPTH ERROR!!!");
		}*/

		// Multisite import
		if(!empty($_POST['pages']) && empty($parent)){
			foreach($_POST['pages'] as $pageid){
				$OriginalPage = $this->em->getRepository('CmsBundle:Page')->find($pageid);
				$NewPage = clone $OriginalPage;
				$NewPage->setPage($newParent);
				$NewPage->setLanguage($this->language);
				$NewPage->setSettings($this->Settings);

				if(isset($_POST['layout'])){
					$NewPage->setLayout($_POST['layout']);
				}

				$this->em->persist($NewPage);

				foreach($OriginalPage->getContent() as $Content){
					$NewContent = clone $Content;
					$NewContent->setPage($NewPage);
					$this->em->persist($NewContent);
				}

				if(!empty($_POST['include-childs'])){
					$this->copyAction($request, $NewPage->getLanguage()->getLocale(), $OriginalPage, $NewPage, ($depth + 1));
				}
			}

			$this->em->flush();

			if(empty($parent)){
				?>
				U wordt doorgestuurd...
				<script>
					window.location.reload(true);
				</script>
				<?php
				die();
			}
		}

		if(!empty($locale)){
			// Locale is now settings ID
			$Settings = $this->em->getRepository('CmsBundle:Settings')->find($locale);
			$Language = $Settings->getLanguage();

			$pages = $this->em->getRepository('CmsBundle:Page')->findBy([
				'settings' => $Settings,
				'page' => $parent
			], [
				'sort' => 'asc'
			]);

			if(!empty($pages)){
				foreach($pages as $Page){
					$NewPage = clone $Page;
					$NewPage->setPage($newParent);
					$NewPage->setLanguage($this->language);
					$NewPage->setSettings($this->Settings);

					if(isset($_POST['layout'])){
						$NewPage->setLayout($_POST['layout']);
					}
					$this->em->persist($NewPage);

					foreach($Page->getContent() as $Content){
						$NewContent = clone $Content;
						$NewContent->setPage($NewPage);
						$this->em->persist($NewContent);
					}

					$this->copyAction($request, $locale, $Page, $NewPage, ($depth + 1));
				}
			}
			$this->em->flush();

			return $this->redirect($this->generateUrl('admin_page'));
		}

		$layout_dir = $this->containerInterface->get('kernel')->getProjectDir() . '/templates/layouts/';
		$layouts = [];
		foreach(scandir($layout_dir) as $dir){
			if(substr($dir, 0, 1) == '.') continue;
			$layouts[str_replace('.html.twig', '', $dir)] = str_replace('.html.twig', '', $dir);
		}

		return $this->attributes(['layouts' => $layouts]);
	}

	/**
	 * @Route("/admin/page/block-preview/{id}", name="admin_page_block_preview")
	 */
	public function blockpreviewAction(Request $request, $id){
		parent::init($request);



		return $this->redirect($this->generateUrl('admin_page'));
	}

	/**
	 * @Route("/admin/page/clone/{id}", name="admin_page_clone")
	 * @Template()
	 */
	public function cloneAction(Request $request, $id = ''){
		parent::init($request);

		$ActivePage = $this->em->getRepository(Page::class)->find($id);

		$PossibleParent = $ActivePage->getPage();

		$error = null;
		if(!empty($_POST)){
			$title = $ActivePage->getLabel() . ' ' . $this->trans('(kopie)', [], 'cms');
			if(!empty($_POST['title'])){
				$title = $_POST['title'];
			}

			if($ActivePage->getLabel() == $title){
				// Duplicate label
				$title = $ActivePage->getLabel() . ' ' . $this->trans('(kopie)', [], 'cms');
			}

			$em = $this->getDoctrine()->getManager();

			$ActivePage->clone_type = $_POST['content'];
			$ActivePage->em = $em;

			$refId = $id;

			$notifyEmail = null;
			$targetLocale = null;

			$slug = $this->toAscii($title);
			$checkForSlug = $this->em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
			if(!empty($checkForSlug)){
				// Found existing page with slug, add "-kopie" to the slug
				$slug = $slug . '-kopie';
			}

			$Page = clone $ActivePage;
			$Page->setPage(null);
			$Page->setLabel($title);
			$Page->setTitle($title);
			$Page->setVisible(false);
			$Page->setSlug($slug);

			if(!empty($_POST['languageid'])){
				$ChosenLanguage = $this->em->getRepository('CmsBundle:Language')->find($_POST['languageid']);

				$notifyEmail = $ChosenLanguage->getNotifyEmail();
				$targetLocale = $ChosenLanguage->getLocale();

				$Page->setLanguage($ChosenLanguage);
				if(count($this->multisite) <= 1){
					$Page->setSettings($ChosenLanguage->getSettings()->first());
				}

				// Set reference page
				$Page->setRefId($refId);

				if($Page->getPage()){
					// This is sub
					$foundParent = null;
					$pagesByLanguage = $ChosenLanguage->getPages();
					foreach($pagesByLanguage as $P){
						if($P->getRefId() == $Page->getPage()->getId()){
							$foundParent = $P;
							break;
						}
					}

					$Page->setPage($foundParent);
				}
			}

			if(!empty($_POST['multisite_id'])){
				$Settings = $this->getDoctrine()->getRepository('CmsBundle:Settings')->find($_POST['multisite_id']);
				$Page->setSettings($Settings);
				$Page->setLanguage($Settings->getLanguage());
			}

			$all = $this->getDoctrine()->getRepository('CmsBundle:Page')->findAll();
			$sort = count($all);
			$Page->setSort($sort);
			
			if(isset($_POST['visible'])){
				$Page->setVisible(true);
			}

			$em->persist($Page);

			// Children
			if(isset($_POST['childs'])){
				foreach($ActivePage->getPages() as $Child){
					$NewChild = clone $Child;
					$NewChild->setPage($Page);
					$NewChild->setSort($sort += 1);
					$em->persist($NewChild);

					foreach($Child->getPages() as $SubChild){
						$NewSubChild = clone $SubChild;
						$NewSubChild->setPage($NewChild);
						$NewSubChild->setSort($sort += 2);
						$em->persist($NewSubChild);

						foreach($SubChild->getPages() as $SubSubChild){
							$NewSubSubChild = clone $SubSubChild;
							$NewSubSubChild->setPage($NewSubChild);
							$NewSubSubChild->setSort($sort += 2);
							$em->persist($NewSubSubChild);
						}
					}
				}
			}

			$em->flush();

			if(!empty($notifyEmail)){
				$subject = $this->trans('notify_page_copy_subject', [], 'cms', $targetLocale);
				$subject = str_replace([
					'((page_label))',
				], [
					$Page->getLabel(),
				], $subject);

				$body = $this->trans('notify_page_copy', [], 'cms', $targetLocale);
				$body = str_replace([
					'((page_id))',
					'((page_label))',
					'((page_edit_url))',
				], [
					$Page->getId(),
					$Page->getLabel(),
					$this->generateUrl('admin_page_edit', ['id' => $Page->getId()], UrlGenerator::ABSOLUTE_URL),
				], $body);

				$mailer->setSubject($this->Settings->getLabel() . ': ' . $subject)
						->setTo($notifyEmail)
						->setTwigBody('emails/notify.html.twig', [
							'label' => '',
							'message' => nl2br($body)
						])
						->setPlainBody(strip_tags($body));
				$status = $mailer->execute_forced();
			}

			header('Location: /bundles/cms/cache.php?url=' . urlencode($this->generateUrl('admin_page', ['cloned' => $id])));
			exit;

			// Clear cache
			/*$this->clearcacheAction();

			return $this->redirect($this->generateUrl('admin_page_clone', ['id' => $id]) . '?cloned=1');*/
		}

		return $this->attributes(array(
			'Page' => $ActivePage,
			'post' => $_POST
		));
	}

	public function parse( $tpl, $args = array() ){
		$args[ 'Settings' ] = $this->Settings;
		$args[ 'languages' ] = $this->getDoctrine()->getRepository('CmsBundle:Language')->findAll();

		if( !isset($args[ 'bodyClass' ]) ) $args[ 'bodyClass' ] = 'sub';

		return $this->render($tpl . '.html.twig', $args);
	}

	public function notify(Page $Page, string $message, $subject = ''){
		if($Page->getNotifyType() == 'telegram'){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,'https://api.telegram.org/' . $Page->getNotifyTelegramBot() . '/sendMessage');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,'chat_id=' . $Page->getNotifyTelegramBotChatId() . '&text=' . urlencode($message));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$server_output = curl_exec ($ch);
			curl_close ($ch);
		}else{
			// Email
			if($Page->getNotifyEmail()){
				$mailer = clone $this->mailer;
				$mailer->init();
				$mailer->setSubject($this->Settings->getLabel() . ': ' . $subject)
						->setTo(explode(';', $Page->getNotifyEmail()))
						->setTwigBody('emails/notify.html.twig', [
							'label' => '',
							'message' => nl2br($message)
						])
						->setPlainBody($message);
				$status = $mailer->execute_forced();
			}
		}
	}

	/**
	 * @Route("/admin/page/ajax/pageid/{id}", name="admin_page_ajax_pageid")
	 */
	public function pageGetUrlAction(Request $request, $id)
	{
		parent::init($request);

		$status = false;
		$url = '';

		$FirstPage = null;
		$tmp_pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(array('page' => null, 'settings' => $this->Settings, 'enabled' => true), array('sort' => 'ASC'), 1);
		if(!empty($tmp_pages)){
			$FirstPage = $tmp_pages[0];
		}

		if(!empty($id)) {
			$status = true;
			
			if ($this->Settings->getForceHttps() || $request->isSecure()) {
				$url = 'https://';
			} else {
				$url = 'http://';
			}

			$em = $this->getDoctrine()->getManager();

			$host = $this->Settings->getHost();
			if (empty($host)) {
				$host = $em->getRepository('CmsBundle:Settings')->findOneBy([], ['id' => 'asc'])->getHost();
			}

			$lookupHost = preg_replace('/:\d+/', '', $request->getHttpHost());
			if(file_exists('../alias.json')){
				$alias = json_decode(file_get_contents('../alias.json'), true);
				foreach($alias as $alias_parent => $aliasses){
					if(in_array($lookupHost, $aliasses)){ 
						$host = $lookupHost;
						if(!$request->isSecure()){
							$url = 'http://';
						}
					}
				}
			}

			$url .= $host;
			$Page = $em->getRepository('CmsBundle:Page')->find($id);

			if($FirstPage && $Page == $FirstPage){
				$url .= $this->generateUrl('homepage');
				$baseuri = $Page->getSettings()->getBaseUri();
				
				$url = rtrim($url, '/') . $baseuri;
			}else{
				$url .= $this->generateUrl('homepage') . $this->getDoctrine()->getRepository('CmsBundle:Page')->getSlugPathByPage($Page);
			}

		}

		return new JsonResponse([
			'status' => $status,
			'url' => $url,
		]);
	}

	private function requestCriticalCss(Request $request, Page $Page) : void
	{
		parent::init($request);

		if ($Page->getEnabled() && $Page->getCritical())
		{
			$cssSuccess = false;
			$foundOccasion = false;

			//Check if page has a Occasionbundle linked and has default view
			if (isset($this->modRoutes['Occasions'])) {
				foreach ($Page->getBlocks() as $wrapper) {
					foreach ($wrapper->getBlocks() as $block) {
						$bundleData = json_decode($block->getBundleData(), true);

						// contains
						if (isset($bundleData['bundlename']) && $bundleData['bundlename'] == 'TrinityOccasionsBundle' && isset($bundleData['display']) && $bundleData['display'] == 'default') {
							$foundOccasion = true;
						}
					}
				}
			}

			$criticalHost = 'https://critical.beyonitdev.nl';
			if(!empty($_ENV['CRITICAL_HOST'])){
				$criticalHost = $_ENV['CRITICAL_HOST'];
			}

			try {
				$cssSuccess = false;

				if(!empty($Page->getSlugKey())){
					$pageSlug = $this->generateUrl($Page->getSlugKey());

					$remoteUrl		= $request->headers->get('origin');
					$criticalUrl	= $request->headers->get('origin') . $pageSlug;
					$pageId			= $Page->getId();
					$type			= 'page';

					if ($foundOccasion) {
						$occasion = $this->em->getRepository('TrinityOccasionsBundle:Occasion')->findOneby([], ['id' => 'asc']);
						$pageSlug = $pageSlug . '/' . $occasion->getId() . '/' . $occasion->getSlug();
					}

					$disabledhosts = [
						'.local',
						'.dev',
					];

					foreach ($disabledhosts as $host) {
						if (str_ends_with($remoteUrl, $host)) {
							return;
						}
					}

					$postArray = [
						'remoteUrl'		=> $remoteUrl,
						'criticalUrl'	=> $criticalUrl,
						'pageId'		=> $pageId,
						'type'          => $type,
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

					// reset critcal so the generator doesn't see it.
					$Page->setCricitalCss(null); // Clear critical Css don't reset cricital
				}
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
	}

	/**
	  * This function saves the generated critical so it can be used.
	  *
	  * @Route("/__submit_critical", name="page_submit_critical_css")
	  *
	  * @param Request $request
	  * @return JsonResponse
	  */
	public function criticalSubmitAction(Request $request) : JsonResponse
	{
		$status = false;
		$message = 'failed';

		try {
			$em = $this->getDoctrine()->getManager();

			$itemId		= $request->request->get('pageId');
			$content	= $request->request->get('content');
			$token		= $request->request->get('token');
			$type       = $request->request->get('type');

			if (!empty($token) && $token == 'zAjrsTNpyMD8LtpZc_m!bbout@oqXcAs')
			{
				if (!empty($content)) {
					$Page = $em->getRepository('CmsBundle:Page')->find($itemId);

					if (!empty($Page)) {
						$Page->setCricitalCss($content);
						$Page->setCacheData(null); // Clear page cache, so page cache is regenerated with critical
						$status = true;
						$message = 'success';
					}

					if ($type == 'product') {
						if (file_exists($projectDir . '/templates/override/webshop/')) {
							mkdir ($projectDir . '/templates/override/webshop/');
						}
						//override webshop
						$productDir = $projectDir . '/templates/override/webshop/product-critical.html.twig';
						//file_put_contents($productDir, $content);
					}

					if ($type == 'category') {
						if (file_exists($projectDir . '/templates/override/webshop/')) {
							mkdir ($projectDir . '/templates/override/webshop/');
						}
						$productDir = $projectDir . '/templates/override/webshop/category-critical.html.twig';
						//file_put_contents($productDir, $content);
					}

					if ($type == 'checkout') {
						if (file_exists($projectDir . '/templates/override/webshop/')) {
							mkdir ($projectDir . '/templates/override/webshop/');
						}
						$productDir = $projectDir . '/templates/webshop/checkout-critical.html.twig';
						//file_put_contents($productDir, $content);
					}

				} else {
					$message = 'empty content';
				}

			} else {
				$message = 'denied';
			}
		} catch (\Exception $ex) {
			$message = 'exception: ' . $ex->getMessage();
		}

		return new JsonResponse([
			'status' => $status,
			'message' => 'pagecontroller ' . $message,
		]);
	}
}