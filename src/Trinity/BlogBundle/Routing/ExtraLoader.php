<?php
namespace App\Trinity\BlogBundle\Routing;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class ExtraLoader extends Loader
{
    /**
     *
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * Constructor.
     *
     * @param \Doctrine\ORM\EntityManager $em the Doctrine Entity Manager
     */
    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function load($resource, $type = null) { return $collection; }

    public function init($collection){
        // $collection = $this->specialRouting(null, $collection, []);
        // $this->initLabels();
        // die();
        return $collection;
    }

    public function specialRouting($parent = null, $collection, $path = []){
        $entries = $this->em->createQuery('SELECT E FROM TrinityBlogBundle:Entry E ORDER BY E.datePublish desc')->execute();
        foreach ($entries as $Entry){

            $slug = '/' . $Entry->getId() . '/' . $Entry->getDefaultSlug();
            if(!empty($Entry->getSlug())){
                $slug = '/' . $Entry->getSlug();
            }

            $slugKey = 'blog-redirect-' . $Entry->getId();

            $Route = new Route($slug . '/{param1}/{param2}/{param3}');
            $Route->setDefaults(array(
                '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\BlogController::wpredirectAction',
                'entryId' => $Entry->getId(),
                'param1' => $Entry->getId(), 'param2' => null, 'param3' => null,
            ));
            $Route->setRequirements(array('param1' => '.*?', 'param2' => '.*?', 'param3' => '.*?'));
            $Route->setMethods(array('POST', 'GET'));

            $collection->add($slugKey, $Route);
        }

        return $collection;
    }

    public function initLabels(){
        $blogs = $this->em->createQuery('SELECT B FROM TrinityBlogBundle:Blog B ORDER BY B.id ASC')->execute();

        $cacheDir = preg_replace('/\/src.*/', '/var/cache/prod/', __DIR__);
        $cacheFile = $cacheDir . 'titles_blog';

		if (!file_exists($cacheDir)) {
			mkdir($cacheDir);
		}

        // Clear/create file
        file_put_contents($cacheFile, '');

        // Store format:
        // locale    path    title
        foreach($blogs as $Blog){
            $locale = $Blog->getLanguage()->getLocale();

            foreach($Blog->getEntries() as $Entry){

                $detailUrl = '/' . $Entry->getId() . '/' . $Entry->getDefaultSlug();
                file_put_contents($cacheFile, $locale . "\t" . $detailUrl . "\t" . $Entry->getLabel() . "\n", FILE_APPEND);

                if($Entry->getSlug()){
                    $detailUrl = '/' . $Entry->getSlug();
                    file_put_contents($cacheFile, $locale . "\t" . $detailUrl . "\t" . $Entry->getLabel() . "\n", FILE_APPEND);
                }
            }
        }
    }

    public function supports($resource, $type = null) { return 'extra' === $type; }
}
