<?php

namespace App\CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class MetadataController extends StorageController
{
    /**
     * @Route("/admin/metadata", name="admin_metadata")
     * @Template()
     */
    public function indexAction( Request $request )
    {
    	parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("Metatags", [], 'cms'), "admin_metadata");

        $pageMetatags = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->getBySystem(0);
        $systemMetatags = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->getBySystem(1);

        return $this->attributes(array(
        	'pageMetatags' => $pageMetatags,
        	'systemMetatags' => $systemMetatags
        ));
    }

    /**
     * @Route("/admin/metadata/edit/{id}", name="admin_metadata_edit")
     * @Template()
     */
    public function editAction( Request $request, $id = null)
    {
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("Metadata", [], 'cms'), "admin_metadata");



        if( (int)$id > 0 ){
            // Edit
            $Metatag = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->find($id);
            $this->breadcrumbs->addRouteItem($this->trans("Wijzigen", [], 'cms'), "admin_metadata_edit");
        }else{
            // Add
            $Metatag = new \App\CmsBundle\Entity\Metatag();
            $this->breadcrumbs->addRouteItem($this->trans("Toevoegen", [], 'cms'), "admin_metadata_edit");
        }


        $PageMetatag = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->getSystemTagByMetatag($Metatag);


        $form = $this->createFormBuilder($Metatag)
            ->add('label', TextType::class, array('label' => $this->trans('Titel', [], 'cms')))
            ->add('key', TextType::class, array('label' => $this->trans('Sleutel', [], 'cms')))
            ->add('key_type', ChoiceType::class, array('label' => $this->trans('Sleutel soort', [], 'cms'), 'required' => false, 'choices' => [
                'property' => 'property',
                'name'     => 'name',
            ]))
            ->add('value_type', ChoiceType::class, array('label' => $this->trans('Soort waarde', [], 'cms'), 'required' => false, 'choices' => [
                $this->trans('Standaard', [], 'cms')  => '',
                $this->trans('Afbeelding', [], 'cms') => 'image',
            ]))
            ->add('value_options', ChoiceType::class, array('multiple' => true, 'label' => $this->trans('Waarde opties', [], 'cms'), 'required' => false, 'choices' => [
                'music.song'          => 'music.song',
                'music.album'         => 'music.album',
                'music.playlist'      => 'music.playlist',
                'music.radio_station' => 'music.radio_station',
                'video.movie'         => 'video.movie',
                'video.episode'       => 'video.episode',
                'video.tv_show'       => 'video.tv_show',
                'video.other'         => 'video.other',
                'article'             => 'article',
                'book'                => 'book',
                'profile'             => 'profile',
                'website'             => 'website',
            ], 'attr' => ['class' => 'tag-selector']))
            ->add('system', CheckboxType::class, array('label' => $this->trans('Systeem wijd', [], 'cms'), 'required' => false))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Store in database
            $em = $this->getDoctrine()->getManager();
            $em->persist($Metatag);
            $em->flush();


            if(!empty($_POST)){
                $PageMetatag->setValue($_POST['value']);
                $PageMetatag->setMetatagid($Metatag);
                $em = $this->getDoctrine()->getManager();
                $em->persist($PageMetatag);
                $em->flush();
            }

            return $this->redirect($this->generateUrl('admin_metadata'));
        }


        return $this->attributes(array(
            'form'        => $form->createView(),
            'Metatag'     => $Metatag,
            'PageMetatag' => $PageMetatag
        ));
    }

    /**
     * @Route("/admin/metadata/delete/{id}", name="admin_metadata_delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id = null)
    {
        parent::init($request);

        $em = $this->getDoctrine()->getManager();
        $Metatag = $em->getRepository('CmsBundle:Metatag')->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($Metatag);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_metadata'));
    }
}
