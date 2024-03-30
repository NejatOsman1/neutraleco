<?php
namespace App\Trinity\SliderBundle\Controller;

use App\CmsBundle\Controller\StorageController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class EntryController extends StorageController
{

    /**
     * @Route("/admin/slider/entry/{id}", name="admin_mod_slider_entry")
     * @Template()
     */
    public function indexAction( Request $request, $id = null)
    {
        parent::init($request);
        $this->breadcrumbs->addRouteItem($this->trans("Slider", 'cms'), "admin_mod_slider");

        $Slider = $this->getDoctrine()->getRepository('TrinitySliderBundle:Slider')->find($id);
        $this->breadcrumbs->addRouteItem($Slider->getLabel(), "admin_mod_slider_entry", array('id' => $id));

        $Slider = $this->getDoctrine()->getRepository('TrinitySliderBundle:Slider')->findOneById($id);
        $entries = $this->getDoctrine()->getRepository('TrinitySliderBundle:Entry')->findBySlider($Slider);

        // Create readable URLs
        foreach($entries as $index => $Entry){
            if(preg_match('/^page:(\d+):(.*?)$/', $Entry->getButtonUrl(), $matches)){
                $Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->find($matches[1]);
                $buttonUrl = $this->generateUrl($Page->getSlugKey());
                $entries[$index]->setButtonUrl($buttonUrl);
            }
        }

        return $this->attributes(array(
            'Slider' => $Slider,
            'entries' => $entries
        ));
    }

    /**
     * @Route("/admin/slider/entry/add/{id}", name="admin_mod_slider_entry_add")
     * @Template()
     */
    public function addAction( Request $request, $id = null)
    {
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("Slider", 'cms'), "admin_mod_slider");

        $em = $this->getDoctrine()->getManager();

        // Add
        $Entry = new \App\Trinity\SliderBundle\Entity\Entry();

        $Slider = $em->getRepository('TrinitySliderBundle:Slider')->find($id);

        $position = $em->getRepository('TrinitySliderBundle:Entry')->getHighestPosition($Slider->getId());

        $Entry->setPosition($position);

        if(!empty($_FILES['newSlideImage']['tmp_name']))
        {
            // Create UploadedFile-object
            $UploadedFile = new UploadedFile( $_FILES['newSlideImage']['tmp_name'], $_FILES['newSlideImage']['name'], $_FILES['newSlideImage']['type'], (int)$_FILES['newSlideImage']['error'], true );

            $Mediadir = $em->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . 'Slider/' . $Slider->getLabel(), $this->language);

            $Media = new \App\CmsBundle\Entity\Media();
            $Media->setLabel($_FILES['newSlideImage']['name']);
            $Media->setDateAdd();
            $Media->setParent($Mediadir);
            $Media->setFile($UploadedFile); // Link UploadedFile to the media entity
            $Media->preUpload(); // Prepare file and path
            $Media->upload(); // Upload actual file

            $em->persist($Media);
            $Entry->setMedia($Media);
        }

        $Entry->setSlider($Slider);
        $em->persist($Entry);
        $em->flush();
        
        $Slider->addEntry($Entry);
        $em->persist($Entry);
        $em->flush();

        if (!empty($Media))
        {
            $image = '/' . $Media->getWebPath('medium');
        }else
        {
            $image = '/bundles/cms/images/transparent_square.gif';
        }
        return new JsonResponse([
            'success' => true,
            'entryid' => $Entry->getId(),
            'image' => $image,
        ]);

        /*

        $this->breadcrumbs->addRouteItem("Toevoegen", "admin_mod_slider_entry_edit");

        $saved = false;
        $form = $this->createFormBuilder($Entry)
            ->add('label', TextType::class, array('label' => 'Titel'))
            ->add('enabled', CheckboxType::class, array('label' => 'Ingeschakeld', 'required' => false))
            ->add('classes', TextType::class, array('label' => 'Classes', 'required' => false))
            ->add('content', TextareaType::class, array('label' => 'Inhoud', 'required' => true, 'attr' => array('class' => 'ckeditor')))
            // ->add('button', TextType::class, array('label' => 'button', 'required' => false))
            // ->add('buttonUrl', TextType::class, array('label' => 'button URL', 'required' => false))
            ->setMethod('post')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Store in database
            $em = $this->getDoctrine()->getManager();

            if(!empty($_FILES['media']['tmp_name'])){
                // Create UploadedFile-object
                $UploadedFile = new UploadedFile( $_FILES['media']['tmp_name'], $_FILES['media']['name'], $_FILES['media']['type'], (int)$_FILES['media']['error'], true );

                $Media = new \App\CmsBundle\Entity\Media();
                $Media->setLabel($_FILES['media']['name']);
                $Media->setDateAdd();
                $Media->setFile($UploadedFile); // Link UploadedFile to the media entity
                $Media->preUpload(); // Prepare file and path
                $Media->upload(); // Upload actual file

                $em->persist($Media);
                $Entry->setMedia($Media);
            }

            $em->persist($Entry);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_mod_slider_entry', array('id' => $Slider->getId())));
        }

        return $this->attributes(array(
            'form'  => $form->createView(),
            'Slider'  => $Slider,
            'Entry' => $Entry,
            'saved' => (bool)$saved
        ));*/
    }


    /**
     * @Route("/admin/slider/entry/media/{sliderid}/add/{mediaid}", name="admin_mod_slider_entry_media_add")
     * @Template()
     */
    public function addMediaToSlider(Request $request, $sliderid = null, $mediaid = null)
    {
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("Slider", 'cms'), "admin_mod_slider");

        $em = $this->getDoctrine()->getManager();

        // Add
        $Entry = new \App\Trinity\SliderBundle\Entity\Entry();

        $Slider = $em->getRepository('TrinitySliderBundle:Slider')->find($sliderid);

        $position = $em->getRepository('TrinitySliderBundle:Entry')->getHighestPosition($Slider->getId());

        $Entry->setPosition($position);
        
        $Media = $em->getRepository('CmsBundle:Media')->find($mediaid);

        $Entry->setMedia($Media);

        $Entry->setSlider($Slider);
        $em->persist($Entry);
        $em->flush();
        
        $Slider->addEntry($Entry);
        $em->persist($Entry);
        $em->flush();

        if (!empty($Media))
        {
            $image = '/' . $Media->getWebPath('medium');
        }else
        {
            $image = '/bundles/cms/images/transparent_square.gif';
        }

        return new JsonResponse([
            'success' => true,
            'entryid' => $Entry->getId(),
            'image' => $image,
        ]);

 
    }

    /**
     * @Route("/admin/slider/entry/edit/delimage/{id}", name="admin_mod_slider_entry_edit_delimage")
     * @Template()
     */
    public function delimageAction( Request $request, $id = null)
    {
        parent::init($request);

        // FIXME desktop/mobile support
        $Entry = $this->getDoctrine()->getRepository('TrinitySliderBundle:Entry')->find($id);

        //$Mediadir = $em->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . 'Slider/' . $Slider->getLabel(), $this->language);

        $em = $this->getDoctrine()->getManager();

        $removed = false;
        $Media = $Entry->getMedia();
        if(!empty($Media))
        {
            /*
            $parent = $media->getParent();

            if (!empty($parent) && $Mediadir->getId() == $parent->getId())
            {*/
                $Entry->setMedia(null);
                /*
                $em->remove($Media);
                $em->persist($Media);
                $em->flush();
            }*/
                $removed = true;
        }

        $MobiMedia = $Entry->getMobilemedia();
        if(!empty($MobiMedia))
        {
            /*
            $parent = $MobiMedia->getParent();

            if (!empty($parent) && $Mediadir->getId() == $parent->getId())
            {
             */
                $Entry->setMobilemedia(null);
            /*
                //$em->remove($MobiMedia);
                //$em->persist($MobiMedia);
                //$em->flush();
            }*/
                $removed = true;
        }
        if ($removed) {
            $em->persist($Entry);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_mod_slider_entry_edit', array('id' => $Entry->getId())));
    }

    /**
     * @Route("/admin/slider/entry/edit/{id}", name="admin_mod_slider_entry_edit")
     * @Template()
     */
    public function editAction( Request $request, $id = null)
    {
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("Slider", 'cms'), "admin_mod_slider");

        // Edit
        $Entry = $this->getDoctrine()->getRepository('TrinitySliderBundle:Entry')->find($id);

        $Slider = $Entry->getSlider();
        $this->breadcrumbs->addRouteItem($Slider->getLabel(), "admin_mod_slider_entry", array('id' => $Slider->getId()));

        $this->breadcrumbs->addRouteItem($this->trans("Wijzigen", 'cms'), "admin_mod_slider_entry_edit");

        $saved = false;
        $form = $this->createFormBuilder($Entry)
            ->add('label', TextType::class, array('label' => $this->trans('Titel', 'cms')))
            ->add('enabled', CheckboxType::class, array('label' => $this->trans('Ingeschakeld', 'cms'), 'required' => false))
            ->add('classes', TextType::class, array('label' => 'Classes', 'required' => false))
            ->add('content', TextareaType::class, array('label' => $this->trans('Inhoud', 'cms'), 'required' => true, 'attr' => array('class' => 'ckeditor')))
            // ->add('button', TextType::class, array('label' => 'button', 'required' => false))
            // ->add('buttonUrl', TextType::class, array('label' => 'button URL', 'required' => false))
            ->setMethod('post')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // Store in database
            $em = $this->getDoctrine()->getManager();

            // FIXME is dit nog nodig?
            if(!empty($_FILES['media']['tmp_name'])){
                // Create UploadedFile-object
                $UploadedFile = new UploadedFile( $_FILES['media']['tmp_name'], $_FILES['media']['name'], $_FILES['media']['type'], (int)$_FILES['media']['error'], true );

                $Media = new \App\CmsBundle\Entity\Media();
                $Media->setLabel($_FILES['media']['name']);
                $Media->setDateAdd();
                $Media->setFile($UploadedFile); // Link UploadedFile to the media entity
                $Media->preUpload(); // Prepare file and path
                $Media->upload(); // Upload actual file

                $em->persist($Media);
                $Entry->setMedia($Media);
            }

            $em->persist($Entry);
            $em->flush();

			// if cache is enabled, find pages with blog and reset them.
			$this->resetPageCacheThatContainedBundle('TrinitySliderBundle', $this->Settings);

            return $this->redirect($this->generateUrl('admin_mod_slider_entry', array('id' => $Slider->getId())));
        }
        
        return $this->attributes(array(
            'form'  => $form->createView(),
            'Entry' => $Entry,
            'saved' => (bool)$saved,
        ));
    }

    /**
     * @Route("/admin/slider/entry/delete/{id}", name="admin_mod_slider_entry_delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id = null)
    {
        parent::init($request);

        $em = $this->getDoctrine()->getManager();
        $Entry = $em->getRepository('TrinitySliderBundle:Entry')->find($id);

        $Slider = $Entry->getSlider();

        if(!is_null($Entry))
        {
            $Slider->removeEntry($Entry);
            $em->persist($Slider);
            $em->flush();

            $parents = [];
            $position = $Entry->getPosition();

            $Mediadir = $em->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . 'Slider/' . $Slider->getLabel(), $this->language);
            $media = $Entry->getMedia();

            if (!empty($media) && !empty($Mediadir))
            {
                $parent = $media->getParent();

                if (!empty($parent) && $Mediadir->getId() == $parent->getId())
                {
                    if($parent->countAll() == 0)
                    {
                        $parents[$parent->getId()] = $parent;
                    }
                    $Entry->setMedia(null);
                    //$media->removePhysicalFiles();
                    //$em->remove($media);
                }
            }

            $mobmedia = $Entry->getMobilemedia();
            if (!empty($mobmedia) && !empty($Mediadir))
            {
                $parent = $mobmedia->getParent();

                if (!empty($parent) && $Mediadir->getId() == $parent->getId())
                {
                    if($parent->countAll() == 0)
                    {
                        $parents[$parent->getId()] = $parent;
                    }
                    $Entry->setMobilemedia(null);
                    //$mobmedia->removePhysicalFiles();
                    //$em->remove($mobmedia);
                }
            }

            $em->remove($Entry);
            $em->flush();
            
            // remove mediadir
            foreach($parents as $p)
            {
                //$em->remove($p);
            }
            
            // fix positions
            $entries = $em->getRepository('TrinitySliderBundle:Entry')->findBySlider($Slider->getId());
            foreach($entries as $e)
            {
                if ($e->getPosition() > $position)
                {
                    $e->setPosition($e->getPosition() - 1);
                    $em->persist($e);
                }
            }

            $em->flush();

			// if cache is enabled, find pages with blog and reset them.
			$this->resetPageCacheThatContainedBundle('TrinitySliderBundle', $this->Settings);
        }

        return new JsonResponse([
            'success' => 'true',
        ]);
        //return $this->redirect($this->generateUrl('admin_mod_slider_edit', ['id' => $sliderId]));
        //return $this->redirect($this->generateUrl('admin_mod_slider'));
    }

    /**
     * @Route("/admin/slider/entry/replaceImage/{entryid}/{mediaid}/{device}", name="admin_mod_slider_entry_edit_replace_image")
     * @Template()
     */
    public function replaceImageAction(Request $request, $entryid = null, $mediaid = null, $device = 'desktop')
    {
        parent::init($request);
        
        // FIXME checken of de waardes kloppen?

        $em = $this->getDoctrine()->getManager();

        $Entry = $em->getRepository('TrinitySliderBundle:Entry')->find($entryid);

        switch($device)
        {
            case 'desktop':
                $Media = $em->getRepository('CmsBundle:Media')->find($mediaid);
                $Entry->setMedia($Media);
                $em->persist($Entry);
                $em->flush();
                break;
            case 'mobile':
                $Media = $em->getRepository('CmsBundle:Media')->find($mediaid);
                $Entry->setMobileMedia($Media);
                $em->persist($Entry);
                $em->flush();
                break;
        }

        return new JsonResponse([
            'success' => true,
            'id' => $Media->getId(),
            'label' => $Media->getLabel(),
            'path' => '/' . $Media->getWebPath(),
        ]);
    }

    /**
     * @Route("/admin/slider/entry/toggle/{id}", name="admin_mod_slider_entry_toggle")
     * @Template()
     */
    public function toggleEnabledAction(Request $request, $id = null)
    {
        parent::init($request);

        $em = $this->getDoctrine()->getManager();

        $result = false;
        $value = '';

        if (!empty($id))
        {
            $Entry = $em->getRepository('TrinitySliderBundle:Entry')->find($id);
            if (!empty($Entry))
            {
                $Entry->setEnabled($Entry->getEnabled() ? false : true);
                $em->persist($Entry);
                $em->flush($Entry);

                $result = true;
                $value = $Entry->getEnabled();
            }
        }

        return new JsonResponse([
            'result' => $result,
            'value' => $value,
        ]);
    }

    /**
     * @Route("/admin/slider/entry/position/{id}/{direction}", name="admin_mod_slider_entry_position")
     * @Template()
     */
    public function changePositionEntry(Request $request, $direction = '', $id = null)
    {
        parent::init($request);
        
        $em = $this->getDoctrine()->getManager();
        
        $result = false;

        if (!empty($direction) && !empty($id))
        {
            $Entry = $em->getRepository('TrinitySliderBundle:Entry')->find($id);
            $sliderId = $Entry->getSlider()->getId();
            
            $position = $Entry->getPosition();
            
            // Can't use $Entry->getSlider()->getEntries() because the link Slider->Entry was only made in the rewrite
            $entries = $em->getRepository('TrinitySliderBundle:Entry')->findBySlider($sliderId);
            
            foreach($entries as $key => $entry)
            {
                $pos = $entry->getPosition();
                if ($pos == null)
                {
                    $entry->setPosition($key + 1);

                    $em->persist($entry);
                    $em->flush();

                    $result = true;
                }else if ($direction == "up" && $pos == $position - 1)
                {
                    $Entry->setPosition($pos);
                    $entry->setPosition($position);

                    $em->persist($Entry);
                    $em->persist($entry);
                    $em->flush();

                    $result = true;
                    break;
                }else if ($direction == "down" && $pos == $position + 1)
                {
                    $Entry->setPosition($pos);
                    $entry->setPosition($position);

                    $em->persist($Entry);
                    $em->persist($entry);
                    $em->flush();

                    $result = true;
                    break;
                }
            
            }
//dump($this->generateUrl('admin_mod_slider_entry_edit', ['id' => $Entry->getId()]));
//die();
            //return $this->redirect($this->generateUrl('admin_mod_slider_entry_edit', ['id' => $Entry->getId()]));
            return new JsonResponse([
                'url' => $this->generateUrl('admin_mod_slider_entry_edit', ['id' => $Entry->getId()]),
            ]);
        }

        return $this->redirect($this->generateUrl('admin_mod_slider'));
        /*return new JsonResponse([
            'result' => $result,
        ]);*/
    }
    
    public function showAction($sliderid)
    {
        $Slider = $this->getDoctrine()->getRepository('TrinitySliderBundle:Slider')->findOneById($sliderid);
        return $this->renderView('@TrinitySlider/default/slider.html.twig', array('Slider' => $Slider));
    }
    
    
    /**
     * @Route("/admin/slider/entry/media/popup/{parentid}", name="admin_slider_entry_media_popup")
     * @Template("TrinitySliderBundle:Media:popup.html.twig")
     */
    public function popupAction(Request $request, $parentid = null)
    {
        parent::init($request);

        $gString = '';
        foreach($_GET as $k => $v) $gString .= ($gString == '' ? '?' : '&') . $k . '=' . $v;

        $asset_crumbs = [];

        $this->breadcrumbs->addRouteItem($this->trans('Media', 'cms'), 'admin_slider_entry_media_popup', ['parentid' => null]);
        $asset_crumbs[$this->generateUrl('admin_slider_entry_media_popup', ['parentid' => null]) . $gString] = 'Media';

        $mediaDirId = null;
        $Mediadir = null;
        if($parentid){
            $Mediadir = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->find($parentid);
            $mediaDirId = $Mediadir->getId();

            $Parent = $Mediadir;
            $crumbs = [];
            while($Parent->getParent() != null){
                $Parent = $Parent->getParent();
                $crumbs[] = $Parent;
            }

            $crumbs = array_reverse($crumbs);
            foreach($crumbs as $Crumb){

                $asset_crumbs[$this->generateUrl('admin_slider_entry_media_popup', ['parentid' => $Crumb->getId()]) . $gString] = $Crumb->getLabel();

                $this->breadcrumbs->addRouteItem($Crumb->getLabel(), 'admin_slider_entry_media_popup', ['parentid' => $Crumb->getId()]);
            }

            $asset_crumbs[$this->generateUrl('admin_slider_entry_media_popup', ['parentid' => $parentid]) . $gString] = $Mediadir->getLabel();
            $this->breadcrumbs->addRouteItem($Mediadir->getLabel(), 'admin_slider_entry_media_popup', ['parentid' => $parentid]);
        }

        $maxFileSize = 10;
        try{
            $maxFileSize = (int)ini_get('upload_max_filesize');
        }catch(\Exception $e){
            // Nothing going on here
        }

        $maxMediaFileSize = $this->Settings->getMaxMediaSizeInKB();

        $folders = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findByParent($parentid);
        $files = $this->getDoctrine()->getRepository('CmsBundle:Media')->findByParent($parentid);

        return $this->attributes(array(
            'folders'      => $folders,
            'files'        => $files,
            'mediaDirId'   => $mediaDirId,
            'Mediadir'     => $Mediadir,
            'asset_crumbs' => $asset_crumbs,
            'gString'      => $gString,
            'maxFileSize'  => $maxFileSize,
            'maxMediaFileSize' => $maxMediaFileSize,
        ));
    }
    
    /**
     * @Route("/admin/slider/entry/sorting/{sliderid}", name="admin_slider_entry_sorting")
     * @Template()
     */
    public function sortingAction(Request $request, $sliderid)
    {
        $em = $this->getDoctrine()->getManager();
        $Slider = $em->getRepository('TrinitySliderBundle:Slider')->find($sliderid);
        
        // FIXME check on null
        //dump($request->request->get('pagesort'));
        //die();
        $data = [];
        $form = $this->createFormBuilder($data)
            ->getForm();
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            //dump($_POST['pagesort']);

            if(!empty($_POST['pagesort']))
            {
                $sort = json_decode($_POST['pagesort'], true);
                //dump($sort);die();
                if(!empty($sort))
                {
                    $i = 1;
                    foreach($sort as $data){
                        if(!empty($data['item_id']))
                        {
                            $Entry = $em->getRepository('TrinitySliderBundle:Entry')->find($data['item_id']);
                            $Entry->setPosition($i);

                            $em->persist($Entry);
                            unset($Entry);
                            $i++;
                        }
                    }
                }
            }
            //die('lol copter');
            $em->flush();

            return $this->attributes([
                'done' => true
            ]);
            //return $this->redirectToRoute('admin_mod_slider');
        }

        

        return $this->attributes([
            'slider' => $Slider,
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/admin/slider/entry/config/edit/{entryid}", name="admin_slider_entry_edit_config")
     * @Template()
     */
    public function configEditAction(Request $request, $entryid = null)
    {
        parent::init($request);
        
        $em = $this->getDoctrine()->getManager();
        
        $Entry = $em->getRepository('TrinitySliderBundle:Entry')->find($entryid);
        
        $form = $this->createFormBuilder($Entry)
            ->add('slideUrl', TextType::class, array('required' => false))
            ->add('classes', TextType::class, ['required' => false])
            ->setMethod('post')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em->persist($Entry);
            $em->flush();
            //return $this->redirect($this->generateUrl('admin_mod_slider_entry', ['id' => $Entry->getSlider()->getId()]));\
            return $this->attributes(['done' => true]);
        }
        
        return $this->attributes([
            'form' => $form->createView(),
        ]);
    }
}
