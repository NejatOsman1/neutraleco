<?php

namespace App\CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

use App\CmsBundle\Entity\Navigation;
use App\CmsBundle\Entity\NavigationItem;

class NavigationController extends StorageController{

    /**
     * @Route("/admin/navigation", name="admin_navigation")
     * @Template()
     */
    public function indexAction(Request $request){
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans('Navigatie', [], 'cms'), 'admin_navigation');

        if(!empty($_GET['enable'])){
            $this->Settings->setCustomNavigation(true);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($this->Settings);
            $em->flush();

            return $this->redirectToRoute('admin_navigation');
        }

        $em = $this->getDoctrine()->getManager();

        // backwards compat
        $compat_items = $em->getRepository('CmsBundle:Navigation')->findAll();
        foreach ($compat_items as $item){
            if (empty($item->getLanguage())) {
                $item->setLanguage($this->language);
                $em->persist($item);
                $em->flush();
            }
        }

        $items = $this->getDoctrine()->getRepository('CmsBundle:Navigation')->findBy(['language' => $this->language]);
        foreach($items as $i => $Nav){
            if($Nav->getSettings() && $Nav->getSettings() != $this->Settings){
                unset($items[$i]);
            }
        }

        return $this->attributes([
            'items' => $items
        ]);
    }

    /**
     * @Route("/admin/navigation/edit/{id}", name="admin_navigation_edit")
     * @Template()
     */
    public function editAction(Request $request, $id = 0){
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans('Navigatie', [], 'cms'), 'admin_navigation');
        $this->breadcrumbs->addRouteItem(($id ? $this->trans('Wijzigen', [], 'cms') : $this->trans('Toevoegen', [], 'cms')), 'admin_navigation_edit', ['id' => $id]);

        $webshop_installed = $this->bundleInstalled('webshop');
        $webshop_categories = [];
        if($webshop_installed){
            $Webshop = $this->Webshop;
            if($Webshop){
                $webshop_categories = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Category')->findBy(['webshop' => $Webshop, 'parent' => null]);
            }
        }

        $cms_pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(['enabled' => true, 'page' => null, 'language' => $this->language, 'settings' => $this->Settings]);
        $cms_pages_reference = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(['language' => $this->language, 'settings' => $this->Settings]);
        
        $anchor_wrappers = $this->getDoctrine()->getRepository('CmsBundle:PageBlockWrapper')->getWithAnchor();
        $anchors = [];
        foreach($anchor_wrappers as $wrapper){
            $anchors[] = $wrapper->getAnchor();
        }

        $Navigation = $this->getDoctrine()->getRepository('CmsBundle:Navigation')->find($id);
        if(is_null($Navigation)){
            $Navigation = new Navigation();
            $Navigation->setLanguage($this->language);
            $Navigation->setSettings($this->Settings);
        }

		if((empty($Navigation->getSettings()) && $Navigation->getLanguage() != $this->language) || $Navigation->getSettings() != $this->Settings){
			// Invalid navigation! STOP NOW!

			return $this->redirect($this->generateUrl('admin_navigation'));
		}

        $Form = $this->createFormBuilder($Navigation)
            ->add('short', TextType::class, array('label' => $this->trans('Sleutel', [], 'cms')))
            ->add('label', TextType::class, array('label' => $this->trans('Titel', [], 'cms')))
            ->add('sub_pages', CheckboxType::class, array('label' => $this->trans("Sub-pagina's tonen", [], 'cms'), 'required' => false))
            ->add('sub_webshop_cats', CheckboxType::class, array('label' => $this->trans("Webshop sub-categorieën tonen", [], 'cms'), 'required' => false))
            ->getForm();
        $Form->handleRequest($request);
        if ($Form->isSubmitted() && $Form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Navigation);

            $existing = [];
            if($Navigation->getItems()){
                foreach($Navigation->getItems() as $item){
                    $existing[$item->getId()] = $item->getId();
                }
            }

            if(!empty($_POST['pagesort'])){
                $sort = json_decode($_POST['pagesort'], true);
                if(!empty($sort)){
                    $i = 0;

                    foreach($sort as $data){
                        if(!empty($data['type'])){

                            $clean_id = $data['id'];
                            $clean_type = 'page';
                            if(preg_match('/^10000(\d+)$/', $clean_id, $m)){
                                $clean_id = $m[1];
                                $clean_type = 'page';
                            }else if(preg_match('/^20000(\d+)$/', $clean_id, $m)){
                                $clean_id = $m[1];
                                $clean_type = 'category';
                            }else if(preg_match('/^30000(\d+)$/', $clean_id, $m)){
                                $clean_id = $m[1];
                                $clean_type = 'anchor';
                            }else if(preg_match('/^40000(\d+)$/', $clean_id, $m)){
                                $clean_id = $m[1];
                                $clean_type = 'custom_page';
                            }

                            $clean_parent_id = $data['parent_id'];
                            $clean_parent_type = 'page';
                            if(preg_match('/^10000(\d+)$/', $clean_parent_id, $m)){
                                $clean_parent_id = $m[1];
                                $clean_parent_type = 'page';
                            }else if(preg_match('/^20000(\d+)$/', $clean_parent_id, $m)){
                                $clean_parent_id = $m[1];
                                $clean_parent_type = 'category';
                            }else if(preg_match('/^30000(\d+)$/', $clean_parent_id, $m)){
                                $clean_parent_id = $m[1];
                                $clean_parent_type = 'anchor';
                            }else if(preg_match('/^40000(\d+)$/', $clean_parent_id, $m)){
                                $clean_parent_id = $m[1];
                                $clean_parent_type = 'custom_page';
                            }


                            if($data['type'] == 'anchor'){
                                $Item = $this->getDoctrine()->getRepository('CmsBundle:NavigationItem')->findOneBy([
                                    'navigation' => $Navigation,
                                    'slug' => $data['slug'],
                                ]);
                            }else if($data['type'] == 'custom_page'){
								$Item = $this->getDoctrine()->getRepository('CmsBundle:NavigationItem')->findOneBy([
                                    'navigation' => $Navigation,
                                    'type' => $data['type'],
                                    'slug' => $data['slug'],
                                ]);
							}else{
                                $Item = $this->getDoctrine()->getRepository('CmsBundle:NavigationItem')->findOneBy([
                                    'navigation' => $Navigation,
                                    'type' => $data['type'],
                                    'target_id' => $clean_id,
                                ]);
                            }
							

                            if(empty($Item)){
                                $Item = new NavigationItem();
                                $Item->setType($data['type']);
                                $Item->setTargetId($clean_id);
                                $Item->setNavigation($Navigation);
                                if(!empty($_POST['new_labels'][$data['slug']])){
                                    $Item->setLabel($_POST['new_labels'][$data['slug']]);
                                }else{
                                    $Item->setLabel($data['label']);
                                }
                            }else{
                                unset($existing[$Item->getId()]);
                                // The system sends two different responses depending on if you add or just rename a exsisting item.
                                if (isset($_POST['labels'][$Item->getId()])) {
                                    $Item->setLabel($_POST['labels'][$Item->getId()]);
                                } else {
                                    if(!empty($_POST['new_labels'][$data['slug']])){
                                        $Item->setLabel($_POST['new_labels'][$data['slug']]);
                                    }else{
                                        $Item->setLabel($_POST['new_labels'][strtolower($data['slug'])]);
                                    }
                                }

                                if(!empty($_POST['clickable']) && array_key_exists($Item->getId(), $_POST['clickable'])){
                                    $Item->setLocked(false);
                                }else{
                                    $Item->setLocked(true);
                                }
                                if(!empty($_POST['show_sub']) && array_key_exists($Item->getId(), $_POST['show_sub'])){
                                    // $Item->setShowSub(true);
                                }else{
                                    // $Item->setShowSub(false);
                                }
                                $Item->setShowSub(false);
                            }

                            if(!empty($clean_parent_id)){
                                $parent = $this->getDoctrine()->getRepository('CmsBundle:NavigationItem')->findOneBy(['navigation' => $Navigation, 'type' => $clean_parent_type, 'target_id' => (int)$clean_parent_id]);
                                $Item->setParent($parent);
                            }else{
                                $Item->setParent(null);
                            }

							$Item->setNewTab($data['newtab']);
                            $Item->setSlug($data['slug']);
                            $Item->setPosition($i);

                            // dump($Item);

                            $em->persist($Item);
                            $em->flush();
                            $i++;
                        }
                    }
                }
                // die();
            }

            if(!empty($existing)){
                foreach($existing as $id){
                    $Item = $this->getDoctrine()->getRepository('CmsBundle:NavigationItem')->find($id);
                    $Navigation->removeItem($Item);
                    $em->remove($Item);
                    $em->persist($Navigation);
                }
            }

            $em->flush();

			$this->resetPageCacheThatContainedBundle(null, $this->Settings);

            $this->addFlash('', '<i class="material-icons left">check</i>' . $this->trans('De navigatie is opgeslagen.', [], 'cms'));
            return $this->redirectToRoute('admin_navigation_edit', ['id' => $Navigation->getId()]);
        }

        $rootItems = $this->getDoctrine()->getRepository('CmsBundle:NavigationItem')->findBy(['navigation' => $Navigation, 'parent' => null], ['position' => 'asc']);

        $itemNotExists = [];
        $slugCheck = [];
        if(!empty($Navigation->getItems())){
            foreach($Navigation->getItems() as $Item){
                if($Item->getType() == 'page'){
                    $Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->find($Item->getTargetId());
                    if(!empty($Page)){
                        $slugCheck[$Item->getId()] = $Page->getSlugKey();
                    }else{
                        $itemNotExists[] = $Item->getId();
                    }
                }
            }
        }

        return $this->attributes([
            'Form'                => $Form->createView(),
            'Navigation'          => $Navigation,
            'cms_pages'           => $cms_pages,
            'cms_pages_reference' => $cms_pages_reference,
            'anchors'             => $anchors,
            'webshop_categories'  => $webshop_categories,
            'rootItems'           => $rootItems,
            'slugCheck'           => $slugCheck,
            'itemNotExists'       => $itemNotExists,
            'doctrine'            => $this->getDoctrine(),
        ]);
    }

    /**
     * @Route("/admin/navigation/delete/{id}", name="admin_navigation_delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id = null)
    {
        parent::init($request);

        $em = $this->getDoctrine()->getManager();
        $Navigation = $em->getRepository('CmsBundle:Navigation')->find($id);

        if(!is_null($Navigation)){
            $em = $this->getDoctrine()->getManager();
            $em->remove($Navigation);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_navigation'));
    }
}
