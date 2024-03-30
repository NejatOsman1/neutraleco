<?php
namespace App\Trinity\SliderBundle\Controller;

use App\CmsBundle\Controller\StorageController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

/* Required for file upload */
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\CmsBundle\Entity\Log;

class SliderController extends StorageController
{

    /**
     * @Route("/admin/slider", name="admin_mod_slider")
     * @Template()
     */
    public function indexAction( Request $request, $id = null)
    {

        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("Slider", 'cms'), "admin_mod_slider");

        $sliders = $this->getDoctrine()->getRepository('TrinitySliderBundle:Slider')->findBy([
            'language' => $this->language,
            'settings' => $this->Settings,
        ]);

        $slider_used = [];
        $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('TrinitySliderBundle');

        foreach($blocks as $Block){
            $p = $Block->getWrapper()->getPage();
            if($p->getLanguage() == $this->language){
                $data = $Block->getBundleData(true);
                if (isset($data['id'])) {
                    $slider_used[] = $data['id'];
                }
            }
        }

        return $this->attributes(array(
            'slider_used' => $slider_used,
            'sliders' => $sliders
        ));
    }

    /**
     * @Route("/admin/slider/edit/{id}/add", name="admin_mod_slider_edit_add")
     * @Template()
     */
    public function addSlideAction( Request $request, $id = null)
    {
        parent::init($request);
        
        $Slider = $this->getDoctrine()->getRepository('TrinitySliderBundle:Slider')->find($id);

        $Entry = new \App\Trinity\SliderBundle\Entity\Entry();

        $Entry->setSlider($Slider);

        $file = $_FILES['newSlideImage'];

        $em = $this->getDoctrine()->getManager();
        $Parent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . 'Slider/' . $Slider->getLabel(), $this->language);

        // Create UploadedFile-object
        $UploadedFile = new UploadedFile($file['tmp_name'], $file['name'], $file['type'], (int)$file['error'], true );

        $Media = new \App\CmsBundle\Entity\Media();
        $Media->setParent($Parent);
        $Media->setLabel($file['name']);
        $Media->setDateAdd();
        $Media->setFile($UploadedFile); // Link UploadedFile to the media entity
        $Media->preUpload(); // Prepare file and path
        $Media->upload(); // Upload actual file

        if($Entry->hasMedia()){
            $PrevMedia = $Entry->getMedia();
            try{ $em->remove($PrevMedia); }catch(\Exception $e){}
        }
        $Entry->setMedia($Media);

        $em->persist($Media);
        $em->persist($Entry);

        $em->flush();

        // FIXME how to deal wit hold sliders?
        $Slider->addEntry($Entry);
        $em->persist($Slider);
        $em->flush();

        return new JsonResponse(array('success' => true, 'entryid' => $Entry->getId(), 'image' => '/' . $Media->getWebPath()));
    }

    /**
     * @Route("/admin/slider/edit/{id}", name="admin_mod_slider_edit")
     * @Template()
     */
    public function editAction( Request $request, $id = null)
    {

        parent::init($request);

        $em = $this->getDoctrine()->getManager();

        $this->breadcrumbs->addRouteItem($this->trans("Slider", 'cms'), "admin_mod_slider");

        $new = false;
        if( (int)$id > 0 ){
            // Edit
            $Slider = $this->getDoctrine()->getRepository('TrinitySliderBundle:Slider')->find($id);
            $this->breadcrumbs->addRouteItem($Slider->getLabel(), "admin_mod_slider_edit");
        }else{
            $new = true;
            // Add
            $Slider = new \App\Trinity\SliderBundle\Entity\Slider();
            $this->breadcrumbs->addRouteItem($this->trans("Toevoegen", 'cms'), "admin_mod_slider_edit");
            $Slider->setLanguage($this->language);
            $Slider->setSettings($this->Settings);
        }

        $saved = false;
        $form = $this->createFormBuilder($Slider)
            ->add('label', TextType::class, array('label' => $this->trans('Slider titel', 'cms')));

        if(!$request->isXmlHttpRequest() && $id > 0){
            $form = $form->add('show_title', CheckboxType::class, array('label' => $this->trans('Titel tonen', 'cms'), 'required' => false))
                ->add('show_content', CheckboxType::class, array('label' => $this->trans('Sub titel tonen', 'cms'), 'required' => false))
                ->add('classes', TextType::class, array('label' => $this->trans('Classes', 'cms'), 'required' => false))
                ->add('arrows', CheckboxType::class, ['label' => $this->trans('Pijlen', 'cms'), 'required' => false])
                ->add('fade', CheckboxType::class, ['label' => $this->trans('Vervagen', 'cms'), 'required' => false])
                ->add('auto_play', CheckboxType::class, ['label' => $this->trans('Automatisch', 'cms'), 'required' => false])
                ->add('dots', CheckboxType::class, ['label' => $this->trans('Toon paginatie', 'cms'), 'required' => false])
                ->add('center_mode', CheckboxType::class, ['label' => $this->trans('Centreren', 'cms'), 'required' => false])
                ->add('infinite', CheckboxType::class, ['label' => $this->trans('Oneindig', 'cms'), 'required' => false])
                ->add('scroll_speed', TextType::class, ['label' => $this->trans('Slide snelheid (ms)', 'cms'), 'required' => false])
                ->add('auto_speed', TextType::class, ['label' => $this->trans('Automatisch sliden na ... (ms)', 'cms'), 'required' => false])
            ;
        }

        $form = $form->setMethod('post')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // Store in database
            if($request->isXmlHttpRequest()){
                $Slider->setArrows(true);
                $Slider->setAutoPlay(true);
                $Slider->setDots(true);
                $Slider->setArrows(true);
                $Slider->setInfinite(true);
            }

            $em->persist($Slider);

            if(isset($_POST['positions']) && trim($_POST['positions']) != ''){
                $sort = [];
                foreach(explode(',', $_POST['positions']) as $k => $v){
                    $sort[(int)$v] = $k;
                }
                // dump($sort);die();
            }

            // Delete entries
            $existingEntries = $Slider->getEntries();
            foreach($existingEntries as $Entry){
                if(empty($_POST['slide']) || !array_key_exists($Entry->getId(), $_POST['slide'])){
                    $em->remove($Entry);
                }
            }

            // Update entries
            if(!empty($_POST['slide'])){
                foreach($_POST['slide'] as $slideid => $slideData){
                    $SlideEntry = $this->getDoctrine()->getRepository('TrinitySliderBundle:Entry')->find($slideid);
                    if (empty($SlideEntry))
                    {
                        $SlideEntry = new \App\Trinity\SliderBundle\Entity\Entry();

                        $SlideEntry->setSlider($Slider);
                        $SlideEntry->setPosition($this->getDoctrine()->getRepository('TrinitySliderBundle:Entry')->getHighestPosition($Slider));
                    }

                    $SlideEntry->setLabel($slideData['title']);
                    $SlideEntry->setContent($slideData['content']);

                    if( substr($slideid, 0, 1) == '_' ){
                        // Temporary ID link
                        $mid = str_replace('_', '', $slideid);
                        if(!empty($mid)){
                            $m = $this->getDoctrine()->getRepository('CmsBundle:Media')->find($mid);
                            if($m) {
                                // Add media to the entity
                                $SlideEntry->setMedia($m);
                            }
                        }
                    }

                    if(isset($_POST['block_config'][$slideid]['buttons']))
                    {
                        $buttons = $_POST['block_config'][$slideid]['buttons'];
                        $SlideEntry->setButtons($buttons);
                    } else {
                        $SlideEntry->setButtons(null);
                    }

                    // Find sort
//                    if(isset($sort[$SlideEntry->getId()])){
//                        $SlideEntry->setPosition($sort[$SlideEntry->getId()]);
//                    }
                    $em->persist($SlideEntry);
                }
            }

            $em->flush();




            $Syslog = new Log();
            $Syslog->setUser($this->getUser());
            $Syslog->setUsername($this->getUser()->getUsername());
            $Syslog->setBundle('slider');
            $Syslog->setType('slide');
            $Syslog->setStatus('info');
            $Syslog->setObjectId($Slider->getId());
            $Syslog->setSettings($this->Settings);
            if($new){
                $Syslog->setAction('add');
                $Syslog->setMessage('Slider \'' . $Slider->getLabel() . '\' toegevoegd.');
            }else{
                $Syslog->setAction('update');
                $Syslog->setMessage('Slider \'' . $Slider->getLabel() . '\' gewijzigd.');
            }
            $em->persist($Syslog);
            $em->flush();

			// if cache is enabled, find pages with blog and reset them.
			$this->resetPageCacheThatContainedBundle('TrinitySliderBundle', $this->Settings);

            if(!$request->isXmlHttpRequest()){
                if(empty($_POST['inline_save'])){
                    return $this->redirect($this->generateUrl('admin_mod_slider'));
                }else{
                    return $this->redirect($this->generateUrl('admin_mod_slider_edit', ['id' => $Slider->getId()]));
                }
            }else{
                $saved = true;
            }
        }

        $maxFileSize = 10;
        try{
            $maxFileSize = (int)ini_get('upload_max_filesize');
        }catch(\Exception $e){
            // Nothing going on here
        }

        $slider_options = [
            'arrows'         => $Slider->getArrows(),
            'fade'           => $Slider->getFade(),
            'autoplay'       => false, //$Slider->getAutoPlay(),
            'dots'           => $Slider->getDots(),
            'centerMode'     => $Slider->getCenterMode(),
            'infinite'       => $Slider->getInfinite(),
            'speed'          => $Slider->getScrollSpeed(),
            'autoplaySpeed'  => $Slider->getAutoSpeed(),
        ];

        $slider_options = json_encode($slider_options);

        // Don't lookup a Mediadir if the Entry isn't saved yet. This prevents creation of empty media dirs.
        if (empty($Slider->getId())) {
            $HostRootId = null;
            $ParentId = null;
        } else {
            $HostRootId = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() : ''), $this->language);
            $ParentId = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . 'Slider/' . $Slider->getLabel(), $this->language);
        }

        return $this->attributes(array(
            'form'        => $form->createView(),
            'Slider'      => $Slider,
            'maxFileSize' => $maxFileSize,
            'slider_options' => $slider_options,
            'saved'       => (bool)$saved,
            'parentid'    => $ParentId,
            'hostrootid'  => $HostRootId,
        ));
    }

    /**
     * @Route("/admin/slider/delete/{id}", name="admin_mod_slider_delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id = null)
    {
        parent::init($request);

        $em = $this->getDoctrine()->getManager();
        $Slider = $em->getRepository('TrinitySliderBundle:Slider')->find($id);

        $parents = [];
        if(!is_null($Slider))
        {

            $label = $Slider->getLabel();
            $entries = $Slider->getEntries();
            //$Mediadir = $em->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . 'Slider/' . $Slider->getLabel(), $this->language);

            $Slider->setSettings(null);

            foreach($entries as $entity)
            {
                // DISABLE media removal because there is a conflict when two slide's use the same media file
                /*
                $media = $entity->getMedia();

                if (!empty($media) && !empty($Mediadir))
                {
                    $parent = $media->getParent();

                    if (!empty($parent) && $Mediadir->getId() == $parent->getId())
                    {
                        if($parent->countAll() == 0)
                        {
                            $parents[$parent->getId()] = $parent;
                        }

                        $media->removePhysicalFiles();
                        $em->remove($media);
                    }
                }

                $mobmedia = $entity->getMobilemedia();
                if (!empty($mobmedia) && !empty($Mediadir))
                {
                    $parent = $mobmedia->getParent();
                    if(!empty($parent) && $Mediadir->getId() == $parent->getId())
                    {
                        if($parent->countAll() == 0)
                        {
                            $parents[$parent->getId()] = $parent;
                        }

                        $mobmedia->removePhysicalFiles();
                        $em->remove($mobmedia);
                    }
                }*/
                $entity->setMedia(null);
                $entity->setMobileMedia(null);
                
                $em->remove($entity);
            }
            /*
            // remove mediadir
            foreach($parents as $p)
            {
                $em->remove($p);
            }

            // Remove root mediadir
            //$em->remove($Mediadir);
             */

            $em->remove($Slider);
            $em->flush();

            $Syslog = new Log();
            $Syslog->setUser($this->getUser());
            $Syslog->setUsername($this->getUser()->getUsername());
            $Syslog->setBundle('slider');
            $Syslog->setType('slide');
            $Syslog->setStatus('info');
            $Syslog->setObjectId($id);
            $Syslog->setSettings($this->Settings);
            $Syslog->setAction('delete');
            $Syslog->setMessage('Slider \'' . $label . '\' verwijderd.');
            $em->persist($Syslog);
            $em->flush();

			// if cache is enabled, find pages with blog and reset them.
			$this->resetPageCacheThatContainedBundle('TrinitySliderBundle', $this->Settings);
        }

        return $this->redirect($this->generateUrl('admin_mod_slider'));
    }

    /**
     * Show bundle content to front
     *
     * @param  array  $config Array with configuration options
     * @param  array  $params Additional parameters
     *
     * @return string         HTML
     */
    public function showAction($config, $params = array())
    {
        // View slider
        $Slider = $this->getDoctrine()->getRepository('TrinitySliderBundle:Slider')->findOneById($config['id']);
        
        if($Slider){
            $slider_options = [
                'arrows'         => $Slider->getArrows(),
                'fade'           => $Slider->getFade(),
                'autoplay'       => $Slider->getAutoPlay(),
                'dots'           => $Slider->getDots(),
                'centerMode'     => $Slider->getCenterMode(),
                'infinite'       => $Slider->getInfinite(),
                'speed'          => $Slider->getScrollSpeed(),
                'autoplaySpeed'  => $Slider->getAutoSpeed(),
                'slidesToShow'   => (int)$Slider->getSlidesToShow(),
                'slidesToScroll' => (int)$Slider->getSlidesToScroll(),
            ];
            // dump($slider_options);die();

            $slider_options = json_encode($slider_options);


            $entries = $Slider->getEntries();
            foreach($entries as $index => $Entry){
                if(!$Entry->getEnabled()){
                    unset($entries[$index]);
                    continue;
                }

                $buttonUrl = $Entry->getButtonUrl();
                if(preg_match('/^page:(\d+):(.*?)$/', $buttonUrl, $matches)){
                    $Page = $this->getDoctrine()->getRepository('CmsBundle:Page')->find($matches[1]);
                    $buttonUrl = $this->generateUrl($Page->getSlugKey());
                    $entries[$index]->setButtonUrl($buttonUrl);
                }
            }
        }

        return $this->renderView('@TrinitySlider/default/slider.html.twig', [
            'Slider' => $Slider,
            'entries' => (!empty($entries) ? $entries : []),
            'slider_options' => (!empty($slider_options) ? $slider_options : [])
        ]);
    }

	public static function resourcesHandler($Settings, array $bundledata, string $projectDir) : ?string
	{
		$resources = null;
		$layoutKey = !empty($Settings->getOverrideKey()) ? trim($Settings->getOverrideKey()) . '/' : '';

		$resource_file = 'resources.json';

		// check if file exists or build array in code and return that.
		$file = __DIR__ . "/../Resources/views/default/" . $resource_file;
		$override = $projectDir . '/public/custom/' . $layoutKey . 'slider/' . $resource_file;

		if (file_exists($override)) {
			$resources = $override;
		} else if (file_exists($file)) {
			$resources = $file;
		}

        return $resources;
    }

    /**
     * Return link data when required within the link form
     *
     * @param  object  Doctrine object
     *
     * @return array   Array with config options
     */
    public function getLinkData($em, $language, $container, $settings){
        return array(
            'sliders' => $em->getRepository('TrinitySliderBundle:Slider')->findBy([
                'language' => $language,
                'settings' => $settings,
            ])
        );
    }
}
