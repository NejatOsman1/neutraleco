<?php
namespace App\Trinity\SearchBundle\Controller;

use App\CmsBundle\Controller\StorageController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Custom form elements
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SearchController extends StorageController
{
    /**
     * @Route("/admin/search", name="admin_mod_search")
     * @Template()
     */
    public function indexAction( Request $request, $id = null)
    {
        // Initialize StorageController
        parent::init($request);

        $this->breadcrumbs->addRouteItem('Zoeken', 'admin_mod_search');

        return $this->attributes([
            // Variables
        ]);
    }

    /**
     * Show bundle content to front
     *
     * @param  array  $config Array with configuration options
     * @param  array  $params Additional parameters
     *
     * @return string         HTML
     */
    public function showAction($config, $params, $request)
    {
        parent::init($request);

        $q = (!empty($_GET['q']) ? $_GET['q'] : null);
        $sorted = [];

        // TODO fullTextSearch needs a value, if searchstring isn't long enough use old search?
        if ($q) {
            $results = $this->getDoctrine()->getRepository('TrinitySearchBundle:SearchIndex')->search($q, (!empty($config['bundlefilter']) ? $config['bundlefilter'] : []), $this->language, $this->Settings);
            //$results = $this->getDoctrine()->getRepository('TrinitySearchBundle:SearchIndex')->fullTextSearch($q, $this->language, $this->Settings);
            foreach($results as $result){
                $sorted[$result->getCategory()][$result->getBundle()][] = $result;
            }
        }

        // TODO impliment bundles filter
        $sorted_new = [];
        foreach($sorted as $k => $v){
            if($k != 'Pagina\'s'){
                $sorted_new[$k] = $v;
            }
        }
        foreach($sorted as $k => $v){
            if($k == 'Pagina\'s'){
                $sorted_new[$k] = $v;
            }
        }

        // Call for template to show on website when this module is linked to a page.
        // You can do whatever you want in this function, just return data as below, extend the 'renderView' function with variables when required.
        return $this->renderView('@TrinitySearch/default/front.html.twig', [
            'sorted' => $sorted_new,
            'q' => $q,
        ]);
    }

    /**
     * Return link data when required within the link form
     *
     * @param  object  Doctrine object
     *
     * @return array   Array with config options
     */
    public function getLinkData($em, $language, $container, $settings){

        $bundles = $em->getRepository('TrinitySearchBundle:SearchIndex')->getBundles($language, $settings);

        $result = [];

        foreach($bundles as $bundle)
        {
            $result[] = $bundle[1];
        }

        return [
            'bundles' => $result,
        ];
    }

    /**
     * Show dashboard blocks
     *
     * @return array List of blocks
     */
    /*public function dashboardBlocks(){
        // Return block data to show on Trinity dashboard in the following format.
        // You can do whatever you want in this function, just return data as below.
        return [
            [

                'title' => 'Zoeken',
                'class' => '',
                'content' => '<div style="text-align:center;padding:20px;">Lege module</div>'
            ]
        ];
    }*/
}
