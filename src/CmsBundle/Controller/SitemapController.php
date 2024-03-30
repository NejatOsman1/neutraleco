<?php
namespace App\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SitemapController extends StorageController
{

    /**
     * @Route("/sitemap.{_format}", name="sample_sitemaps_sitemap", requirements={"_format" = "xml"})
     * @Template("@Cms/sitemaps/sitemap.xml.twig")
     */
    public function sitemapAction(Request $request)
    {
        $this->init($request);

        $slugify = new \Cocur\Slugify\Slugify();

        $em = $this->getDoctrine()->getManager();

        $urls = array();
        $hostname = $request->getHost();

        // add some urls homepage
        $urls[] = array('loc' => $this->containerInterface->get('router')->generate('homepage'), 'changefreq' => 'weekly', 'priority' => '1.0');

        // multi-lang pages
        // foreach($languages as $lang) {
            // $urls[] = array('loc' => $this->containerInterface->get('router')->generate('home_contact', array('_locale' => $lang)), 'changefreq' => 'monthly', 'priority' => '0.3');
        // }

        // urls from database
        // $urls[] = array('loc' => $this->containerInterface->get('router')->generate('home_product_overview', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.7');
        // service
        /*foreach ($em->getRepository('AcmeSampleStoreBundle:Product')->findAll() as $product) {
            $urls[] = array('loc' => $this->containerInterface->get('router')->generate('home_product_detail',
                    array('productSlug' => $product->getSlug())), 'priority' => '0.5');
        }*/

        $pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(array('page' => null, 'enabled' => true, 'settings' => $this->Settings), array('sort' => 'ASC'));
        foreach($pages as $Page){

            if($Page->getVisible() == false && $Page->getShowInSitemap() == false){
                continue;
            }

            $loc = $this->containerInterface->get('router')->generate($Page->getSlugKey());
            if($loc == '/home') continue;
            $urls[$loc] = array('loc' => $loc, 'changefreq' => 'weekly', 'priority' => '1.0');

            $sub_pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(array('page' => $Page, 'enabled' => true, 'settings' => $this->Settings), array('sort' => 'ASC'));
            foreach($sub_pages as $Page){

                if($Page->getVisible() == false && $Page->getShowInSitemap() == false){
                    continue;
                }

                $loc = $this->containerInterface->get('router')->generate($Page->getSlugKey());
                $urls[$loc] = array('loc' => $loc, 'changefreq' => 'weekly', 'priority' => '1.0');

                $sub_sub_pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(array('page' => $Page, 'enabled' => true, 'settings' => $this->Settings), array('sort' => 'ASC'));
                foreach($sub_sub_pages as $Page){

                    if($Page->getVisible() == false && $Page->getShowInSitemap() == false){
                        continue;
                    }

                    $loc = $this->containerInterface->get('router')->generate($Page->getSlugKey());
                    $urls[$loc] = array('loc' => $loc, 'changefreq' => 'weekly', 'priority' => '1.0');
                }
            }
        }

        $h = $this->containerInterface->get('router')->generate('homepage');

        $bundles = scandir('../src/Trinity/');
        if(in_array('WebshopBundle', $bundles)){

            $urls_category = [];
            $urls_product = [];

            $Webshop = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Webshop')->findOneBy(['cms_settings' => $this->Settings]);
            $categories = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Category')->findBy(['webshop' => $Webshop]);
            foreach($categories as $c){
                $loc = $this->containerInterface->get('router')->generate('homepage') . $c->getUri();

                if($loc == $h) continue;
                $urls_category[$loc] = array('loc' => $loc, 'changefreq' => 'weekly', 'priority' => '1.0');

                $sub_categories = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Category')->findBy(['parent' => $c]);
                foreach($sub_categories as $c2){
                    $loc = $this->containerInterface->get('router')->generate('homepage') . $c2->getUri();
                    $urls_category[$loc] = array('loc' => $loc, 'changefreq' => 'weekly', 'priority' => '1.0');

                    $sub_sub_categories = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Category')->findBy(['parent' => $c2]);
                    foreach($sub_sub_categories as $c3){
                        $loc = $this->containerInterface->get('router')->generate('homepage') . $c3->getUri();
                        $urls_category[$loc] = array('loc' => $loc, 'changefreq' => 'weekly', 'priority' => '1.0');

                        $sub_sub_sub_pages = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Category')->findBy(['parent' => $c3]);
                        foreach($sub_sub_sub_pages as $c4){
                            $loc = $this->containerInterface->get('router')->generate('homepage') . $c4->getUri();
                            $urls_category[$loc] = array('loc' => $loc, 'changefreq' => 'weekly', 'priority' => '1.0');
                        }
                    }
                }
            }

            $urls = array_merge($urls, $urls_category);

            $products = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Product')->search(null, ['visible' => true, 'enabled' => true, 'language' => $this->language], null, 'asc', true, false, 1);
            foreach($products['results'] as $p){
                if($p->getLinkedTo()->count() == 0){


                    $canonical_url = '';
                    $foundCategory = null;
        
                    foreach ($p->getCategory() as $catProd)
                    {
                        if (empty($foundCategory)) {
                            $foundCategory = $catProd->getCategory();
                        } else if ($this->WebshopSettings->getCanonicalType() == 'first-main-cat') {
                            if (!empty($foundCategory->getParent()) && $foundCategory->getParent()->getId() == $catProd->getCategory()->getId()) {
                                $foundCategory = $catProd->getCategory();
                            }
                        } else if (is_null($this->WebshopSettings->getCanonicalType()) || $this->WebshopSettings->getCanonicalType() == 'first-sub-cat') {
                            $subCat = $catProd->getCategory();
                            $tempCat = null;
                            $subLoop = true;
        
                            do {
                                if (!empty($subCat->getParent()) &&
                                    $subCat->getParent()->getId() == $foundCategory->getId()) {
                                    $tempCat = $subCat;
                                } else if (!empty($subCat->getParent()) &&
                                           !empty($subCat->getParent()->getParent()) &&
                                           $subCat->getParent()->getParent()->getId() == $foundCategory->getId()) {
                                    $tempCat = $subCat;
                                } else if (!empty($subCat->getParent()) && 
                                           !empty($subCat->getParent()->getParent()) &&
                                           !empty($subCat->getParent()->getParent()->getParent()) &&
                                           $subCat->getParent()->getParent()->getParent()->getId() == $foundCategory->getId()) {
                                    $tempCat = $subCat;
                                } else {
                                    $subLoop = false;
                                }
        
                                $subCat = $subCat->getParent();
                            } while ($subLoop);
        
                            if (!empty($tempCat)) {
                                $foundCategory = $tempCat;
                            }
                        }
                    }
        
                    if (!empty($foundCategory)) {
                        $canonical_url = '/' . $foundCategory->getUri() . '/' . $p->getSlug();
                        $urls_product[$canonical_url] = array('loc' => $canonical_url, 'changefreq' => 'weekly', 'priority' => '1.0');
                    }


                }
            }
            
            $urls = array_merge($urls, $urls_product);
        }

        if(in_array('BlogBundle', $bundles)){
            $Page = null;
            $BlogBlock = null;
            $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('TrinityBlogBundle', 'is_overview');
            foreach($blocks as $Block){
                $p = $Block->getWrapper()->getPage();
                if($p->getLanguage() == $this->language){
                    $BlogBlock = $Block;
                    $Page = $p;
                    break;
                }
            }

            if(!empty($Page)){
                $data = json_decode($BlogBlock->getBundleData(), true);
                $customDetailUrl = null;
                if(!empty($data['uri'])){
                    $customDetailUrl = $data['uri'];
                }
                $blogs = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->findAll();
                foreach($blogs as $Blog){
                    $entries = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findEntriesPublishedNow($Blog);
                    foreach($entries as $Entry){
                        $loc = ($customDetailUrl ? $customDetailUrl : $this->containerInterface->get('router')->generate($Page->getSlugKey()));
                        if(!empty($Entry->getSlug())){
                            $loc .= '/' . $Entry->getSlug();
                        }else{
                            $loc .= '/' . $Entry->getId() . '/' . $Entry->getDefaultSlug();
                        }
                        $urls[$loc] = array('loc' => $loc, 'changefreq' => 'weekly', 'priority' => '1.0');
                    }
                }
            }
        }

        if(in_array('ProjectenliteBundle', $bundles)){
            $Page = null;
            $BlogBlock = null;
            $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('TrinityProjectenliteBundle', 'projects_overview');
            foreach($blocks as $Block){
                $p = $Block->getWrapper()->getPage();
                if($p->getLanguage() == $this->language){
                    $BlogBlock = $Block;
                    $Page = $p;
                    break;
                }
            }

            if(!empty($Page)){
                $data = json_decode($BlogBlock->getBundleData(), true);
                if(!empty($data['projectPage'])){
                    $pageUrl = $this->getDoctrine()->getRepository('CmsBundle:Page')->find($data['projectPage'])->getSlugKey();
                    $loc = $this->containerInterface->get('router')->generate($pageUrl);
                    
                    $projects = $em->getRepository('TrinityProjectenliteBundle:Project')->findBy(['concept' => 0]);
                    foreach($projects as $Project){
                        $label = $slugify->slugify($Project->getLabel(), '-');
                        $loc_sub = $loc . '/' . $Project->getId() . '/' . $label;
                        $urls[$loc_sub] = array('loc' => $loc_sub, 'changefreq' => 'weekly', 'priority' => '1.0');
                    }
                }
            }
        }

        return array('urls' => $urls, 'hostname' => $hostname);
    }
}
