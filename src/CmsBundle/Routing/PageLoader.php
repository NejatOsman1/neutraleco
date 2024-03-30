<?php
namespace App\CmsBundle\Routing;

use Doctrine\ORM\EntityManager,
	Symfony\Component\Routing\RouteCollection,
	Symfony\Component\Routing\Route,
	Symfony\Component\Config\Loader\Loader,
	Symfony\Component\HttpFoundation\Session\Session,
	Symfony\Component\HttpFoundation\RequestStack,
	Symfony\Component\DependencyInjection\ContainerInterface;

/*
 * This file is made by Leon
 *
 * (c) Leon van der Ree <leon@fun4me.demon.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE of Symfony2.
 */

/**
 * PageLoader loads routes from a Database.
 *
 * You can configure the table name in your routing.yml. E.G.
 *
 * pages:
 *     resource: CmsBundle:Page
 *     type: db
 *
 * this table should implement the function that are mentioned in the PageInterface
 *
 *
 * @author Leon van der Ree <leon@fun4me.demon.nl>
 */
class PageLoader extends Loader
{
	/**
	 *
	 * @var \Doctrine\ORM\EntityManager
	 */
	protected $em;

	/**
	 *
	 * @var \Symfony\Component\HttpFoundation\Session\Session
	 */
	protected $session;

	/**
	 *
	 * @var \Symfony\Component\DependencyInjection\ContainerInterface
	 */
	protected $container;

	/**
	 *
	 * @var \Symfony\Component\HttpFoundation\RequestStack
	 */
	protected $requestStack;

	/**
	 * Constructor.
	 *
	 * @param \Doctrine\ORM\EntityManager $em the Doctrine Entity Manager
	 */
	public function __construct(\Doctrine\ORM\EntityManager $em, $session, ContainerInterface $container,RequestStack $requestStack)
	{
		$this->em = $em;
		$this->session = $session;
		$this->container = $container;
		$this->requestStack = $requestStack;
	}

	/**
	 * Loads from the database
	 *
	 * @param string $table    The table that contains the pages (with title, slug and controller, configure this as resource in your routing.yml, provide as type: db )
	 * @param string $type     The resource type
	 * @return RouteCollection the collection of routes stored in the database table
	 */
	public function load($table, $type = null)
	{
		$collection = new RouteCollection();
		$request = $this->requestStack->getCurrentRequest();

		$locale = $this->session->get('_locale');
		if(empty($locale)){
			$locale = 'nl';
		}

		$cacheDir = preg_replace('/\/src.*/', '/var/cache/prod/', __DIR__);
				$cacheFile = $cacheDir . 'page_id_slug';

	  $bundleDir = str_replace('CmsBundle/Routing', 'Trinity/',__DIR__);
		foreach(scandir($bundleDir) as $dir){
			if(substr($dir, -6) == 'Bundle'){
				$fullDir = $bundleDir . $dir . '/';
				if(file_exists($fullDir . 'Routing/ExtraLoader.php')){
					$bundleName = basename($fullDir);

					$routerFile = $fullDir . 'Routing/ExtraLoader.php';

					// Extra loaders from other Trinity bundles
				$class = '\\App\\Trinity\\' . $bundleName . '\\Routing\\ExtraLoader';
					$ExtraLoader = new $class($this->em, $this->container);
					$collection = $ExtraLoader->init($collection);
					$this->em->flush();
				}
			}
		}


		$sluglist = array();
		$toSort = [];

		$idToSlug = [];


		// Find languages with base URL
		/*$parsedLanguages = [];
		$result = $this->em->getRepository('CmsBundle:Settings')->customLangPath();
		foreach($result as $Settings){
			$host = $Settings->getHost();
			$Language = $Settings->getLanguage();
			$locale = $Language->getLocale();
			$parsedLanguages[] = $locale;

			$pages = $this->em->createQuery("SELECT P FROM CmsBundle:Page P WHERE P.language = " . $Language->getId() . " ORDER BY P.sort")->execute();
			foreach ($pages as $Page){
				$slug = $locale . '/' . $Page->getSlug();

				$sluglist[$Page->getId()] = ($Page->getPage() != null && isset($sluglist[$Page->getPage()->getId()]) && $Page->getPage()->getId() != 0 ? $sluglist[$Page->getPage()->getId()] . '/' : '') . $slug;

				$slugkey = 'pages_'.str_replace(['/', '-'], '_', $sluglist[$Page->getId()]); // Internally used for page identification
				$Page->setSlugkey($slugkey);

				$idToSlug[$Page->getId()] = $slugkey;
				$this->em->persist($Page);

				dump($sluglist[$Page->getId()] . '/{param1}/{param2}/{param3}/{param4}/{param5}');

				$Route = new Route($sluglist[$Page->getId()] . '/{param1}/{param2}/{param3}/{param4}/{param5}');
				$Route->setDefaults(array('_controller' => $Page->getController(), 'pageId' => $Page->getId(), 'locale' => $locale, 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null, ));
				$Route->setRequirements(array('param1' => '.*?', 'param2' => '.*?', 'param3' => '.*?', 'param4' => '.*?', 'param5' => '.*?', ));
				$Route->setMethods(array('POST', 'GET'));
				$toSort[$slugkey] = $Route;
			}
		}*/

		// $sluglist = array();

		$pages = $this->em->createQuery('SELECT P FROM CmsBundle:Page P ORDER BY P.sort')->execute();
		foreach ($pages as $Page){
			$locale = ($Page->getLanguage() ? $Page->getLanguage()->getLocale() : 'nl');

			$base_uri = '';
			$base_uri_prefix = '';
			$base_uri_clean = '';
			if($Page->getLanguage()){
				$Settings = $Page->getLanguage()->getSettings()[0];
				if(empty($Settings)){
					// Alternative way
					$Settings = $this->em->getRepository('CmsBundle:Settings')->findOneByLanguage($Page->getLanguage());
				}
				$base_uri_tmp = $Settings->getBaseUri();
				if(preg_match('/\/.*?$/', $base_uri_tmp)){
					$base_uri = substr($base_uri_tmp, 1) . '/';
					$base_uri_clean = substr($base_uri_tmp, 1);
					$base_uri_prefix = substr($base_uri_tmp, 1) . '_';
				}
			}

			// if(!in_array($locale, $parsedLanguages)){
			$slug = str_replace($base_uri, '', $Page->getSlug());

			if(preg_match('/^[a-z]+\//', $Page->getSlug(), $m) && empty($base_uri)){
				$slug = str_replace($m[0], '', $slug);
				$Page->setSlug($slug);
			}

				$sluglist[$Page->getId()] = ($Page->getPage() != null && isset($sluglist[$Page->getPage()->getId()]) && $Page->getPage()->getId() != 0 ? $sluglist[$Page->getPage()->getId()] . '/' : '') . $slug;
				
				$slug = $base_uri . $Page->getSlug();

				$slugkey = 'pages_' . $base_uri_prefix .str_replace(['/', '-'], '_', $sluglist[$Page->getId()]); // Internally used for page identification
				// dump($slugkey);
				$Page->setSlugkey($slugkey);

				if(!empty($base_uri)){
					$currentSlug = $Page->getSlug();
					if(substr($currentSlug, 0, strlen($base_uri)) != $base_uri){
						$Page->setSlug($base_uri . $currentSlug);
					}
				}

				$idToSlug[$Page->getId()] = $slugkey;
				$this->em->persist($Page);

				if(empty($base_uri)){
					$activeSlug = $sluglist[$Page->getId()];
				}else{
					$activeSlug = $base_uri . $sluglist[$Page->getId()];
				}


				$activeSlug = preg_replace('/\/home$/', '', $activeSlug);

				// dump($slug . ' // ' . $activeSlug . ' // ' . $base_uri . ' // ' . $locale . ' // ' . $Page->getId());

				if($base_uri_clean == $activeSlug){
					$Route = new Route($activeSlug);
				}else{
					$Route = new Route($activeSlug . '/{param1}/{param2}/{param3}/{param4}/{param5}');
				}
				$Route->setDefaults(array('_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => $Page->getId(), 'locale' => $locale, 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null, ));
				if(empty($base_uri_clean) || $base_uri_clean != $activeSlug){
					$Route->setRequirements(array('param1' => '.*?', 'param2' => '.*?', 'param3' => '.*?', 'param4' => '.*?', 'param5' => '.*?', ));
				}
				$Route->setMethods(array('POST', 'GET'));
				$toSort[$slugkey] = $Route;
			// }
		}

		// Build /logout uri's
		$Settings = $this->em->getRepository('CmsBundle:Settings')->findAll();
		$isCatalog = false;
		foreach ($Settings as $Setting)
		{
			if($Setting->getIsCatalog()){
				$isCatalog = true;
			}
			
			// when we don't have a baseUri, the default handler already takes care of this.
			if (empty($Setting->getBaseUri())) {
				continue;
            } else {
                $uri = $Setting->getBaseUri() . '/logout';
            }

			$slugkey = substr_replace($uri, '', 0, 1);
			$slugkey = str_replace('/', '_', $slugkey);
			if (empty($slugkey)) {
				continue;
			}

			$slugkey = str_replace('-', '_', $slugkey);

			$Route = new Route($uri);
			$Route->setDefaults(array(
				'_controller' => 'CmsBundle:Default:logout',
			));

			$Route->setMethods(array('POST', 'GET'));

			$toSort[$slugkey] = $Route;			
		}
		if($isCatalog){
			if(!empty($request->attributes) && 
				(str_contains($request->attributes->get('_route'), 'admin_webshop') ||
				str_contains($request->attributes->get('_route'), 'admin_mod_webshop'))){
				header('Location: https://'.$_SERVER["HTTP_HOST"].'/admin');
				exit;
			}
		}

		file_put_contents($cacheFile, json_encode($idToSlug));

		krsort($toSort);

		$newSort = [];
		foreach($toSort as $k => $v){
			if(!preg_match('/pages_home/', $k)){
				$newSort[$k] = $v;
			}
		}
		foreach($toSort as $k => $v){
			if(preg_match('/pages_home/', $k)){
				$newSort[$k] = $v;
			}
		}

		foreach($newSort as $slugkey => $Route){
			$collection->add($slugkey, $Route);
		}

		$this->em->flush(); // Store page changes

		return $collection;
	}

	/**
	 * Returns true if this class supports the given type (db).
	 *
	 * @param mixed  $resource the name of a table with title and slug field
	 * @param string $type     The resource type (db)
	 *
	 * @return boolean True if this class supports the given type (db), false otherwise
	 */
	public function supports($resource, $type = null)
	{
		return 'db' === $type;
	}
}
