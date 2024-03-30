<?php

namespace App\CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/* Required for file upload */
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Translation\Catalogue\MergeOperation;
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\Translator;
use Symfony\Bundle\FrameworkBundle\Translation\TranslationLoader;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\CmsBundle\Entity\Settings;

class MultisiteController extends StorageController
{

    /**
     * @Route("/admin/settings/multisite", name="admin_multisite")
     * @Template()
     */
    public function indexAction( Request $request )
    {
        parent::init($request);

        $this->breadcrumbs->addItem($this->trans("Multi-site configuratie", [], 'cms'), $this->containerInterface->get("router")->generate("admin_multisite"));

        $em = $this->getDoctrine()->getManager();
        $configs = $em->getRepository('CmsBundle:Settings')->findBy([], ['site_key' => 'asc']);

        return $this->attributes(array(
            'configs' => $configs,
        ));
    }

    /**
     * @Route("/admin/settings/multisite/delete/{id}", name="admin_multisite_delete")
     * @Template()
     */
    public function deleteAction( Request $request, $id = '' )
    {
        parent::init($request);

        $em = $this->getDoctrine()->getManager();
        $Settings = $em->getRepository('CmsBundle:Settings')->find($id);

        if(!is_null($Settings)){

            $em = $this->getDoctrine()->getManager();
            $em->remove($Settings);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_multisite'));
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * @Route("/admin/settings/multisite/edit/{id}", name="admin_multisite_edit")
     * @Template()
     */
    public function editAction( Request $request, $id = 0 )
    {
        parent::init($request);

        $this->breadcrumbs->addItem($this->trans("Multi-site configuratie", [], 'cms'), $this->containerInterface->get("router")->generate("admin_multisite"));
        $this->breadcrumbs->addItem($this->trans("Toevoegen", [], 'cms'), $this->containerInterface->get("router")->generate("admin_multisite_edit"));

        $em = $this->getDoctrine()->getManager();

        $languagesActive = [];
        $new = false;
        if(empty($id)){
            $new = true;
            $Settings = new Settings();

            $newSitekey = $this->generateRandomString();

            $DefaultSettings = null;
            if(empty($_GET['nocopy'])){
                $config_count = $em->getRepository('CmsBundle:Settings')->count([]);
                if($config_count >= 1){
                    // When there is only one config (one host), clone it
                    $DefaultSettings = $em->getRepository('CmsBundle:Settings')->findAll()[0];
                    $Settings = clone $DefaultSettings;
                }
            }

            $Settings->setLanguage($this->language);
            $Settings->setHost($request->getHost());
            $Settings->setSiteKey($newSitekey);

            $languagesActive = [$this->language];

            $Form = $this->createFormBuilder($Settings)
                ->add('label', TextType::class, array('label' => $this->trans('Titel', [], 'cms')))
                ->add('host', TextType::class, array('label' => $this->trans('Hostname', [], 'cms')))
                ->add('systemEmail', TextType::class, array('label' => $this->trans('Systeem e-mailadres', [], 'cms')))
                ->add('systemEmailFrom', TextType::class, array('label' => $this->trans('Systeem e-mailadres (naam)', [], 'cms')))
                ->setMethod('post')
                ->getForm();

        }else{
            $Settings = $em->getRepository('CmsBundle:Settings')->find($id);

            $DefaultSettings = null;

            $Form = $this->createFormBuilder($Settings)
                ->add('label', TextType::class, array('label' => $this->trans('Titel', [], 'cms')))
                ->setMethod('post')
                ->getForm();

            $settingsWithSameSiteKey = $this->getDoctrine()->getRepository('CmsBundle:Settings')->findBy(['site_key' => $Settings->getSiteKey()]);
            foreach($settingsWithSameSiteKey as $S){
                if(!empty($S->getLanguage()) && !in_array($S->getLanguage(), $languagesActive)){
                    $languagesActive[] = $S->getLanguage();
                }
            }
        }

        $Form->handleRequest($request);
        if ($Form->isSubmitted() && $Form->isValid()) {

            if($new && !empty($_POST['languages']) && count($_POST['languages']) >= 1){
                $firstLang = reset($_POST['languages']);
                $Lang = $em->getRepository('CmsBundle:Language')->find($firstLang);
                $Settings->setLanguage($Lang);
            }

            $Settings->setVisibleBundles((!empty($_POST['bundles']) ? $_POST['bundles'] : []));

            if($Settings->getParent()){
                $OtherSettings = $em->getRepository('CmsBundle:Settings')->findByParent($Settings->getParent());
                foreach($OtherSettings as $OS){
                    $OS->setVisibleBundles((!empty($_POST['bundles']) ? $_POST['bundles'] : []));
                    $em->persist($OS);
                }
            }
            
            // Save
            $em->persist($Settings);
            $em->flush();


            if($new && !empty($_POST['languages']) && count($_POST['languages']) > 1){
                foreach($_POST['languages'] as $index => $language_id){
                    if($index == 0) continue; // Used in initial
                    $Lang = $em->getRepository('CmsBundle:Language')->find($language_id);
                    $LinkedSettings = clone $Settings;
                    $LinkedSettings->setLanguage($Lang);

                    $em->persist($LinkedSettings);
                    $em->flush();
                }
            }

            if(!$new && !empty($_POST['languages']) && count($_POST['languages']) > 0){
                foreach($_POST['languages'] as $index => $language_id){
                    $Lang = $em->getRepository('CmsBundle:Language')->find($language_id);
                    if(!in_array($Lang, $languagesActive)){
                        $LinkedSettings = clone $Settings;
                        $LinkedSettings->setLanguage($Lang);

                        $em->persist($LinkedSettings);
                        $em->flush();
                    }
                }
            }



            // Link to old settings
            if($DefaultSettings){                
                // Find unlinked pages
                $Pages = $em->getRepository('CmsBundle:Page')->findBySettings(null);
                foreach($Pages as $Page){
                    $Page->setSettings($DefaultSettings);
                    $em->persist($Page);
                }
                
                // Find unlinked users
                $Users = $em->getRepository('CmsBundle:User')->findBySettings(null);
                foreach($Users as $User){
                    $User->setSettings($DefaultSettings);
                    $em->persist($User);
                }

                // Run mutations
                $em->flush();
            }
            

            return $this->redirect($this->generateUrl('admin_multisite'));
        }

        return $this->attributes(array(
            'Form'            => $Form->createView(),
            'BaseSettings'        => $Settings,
            'languagesActive' => $languagesActive,
            'DefaultSettings' => $DefaultSettings,
        ));
    }

}
