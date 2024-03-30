<?php
namespace App\CmsBundle\Controller;

use App\CmsBundle\Controller\StorageController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

// Forms
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class IntegrationsController extends StorageController
{

    /**
     * @Route("/admin/integrations/test/{provider}", name="admin_integrations_test")
     */
    public function testAction(Request $request, $provider = null)
    {
        parent::init($request);

        if(empty($provider)){
            return new JsonResponse(['Geen integratie opgegeven.']);
        }

        $send = false;
        $Integrations = $this->Settings->getIntegrations();
        if(!empty($Integrations)){
            if($provider == 'telegram'){
                $response = $Integrations->sendTelegram('Dit is een test vanuit Trinity.');
                if($response === true){
                    $send = true;
                }
            }

            if($send){
                return new JsonResponse(['Test succesvol!']);
            }
        }

        return new JsonResponse(['Er zijn geen integraties ingeschakeld.']);
    }

    /**
     * @Route("/admin/integrations", name="admin_integrations")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        parent::init($request);

        $this->breadcrumbs->addRouteItem("Cms", "admin");
        $this->breadcrumbs->addRouteItem("Integraties", "admin_integrations");

        $Integrations = $this->Settings->getIntegrations();
        $new = false;
        if(empty($Integrations)){
        	$Integrations = new \App\CmsBundle\Entity\Integrations();
        	$Integrations->setSettings($this->Settings);
        	$new = true;
        }

        $Form = $this->createFormBuilder($Integrations)
            ->add('telegram', CheckboxType::class, array('label' => $this->trans('Telegram inschakelen', [], 'cms'), 'required' => false))
			->add('telegram_chat_id', TextType::class, array('label' => $this->trans('Chat ID', [], 'cms'), 'required' => false))
			->add('telegram_token', TextType::class, array('label' => $this->trans('API token', [], 'cms'), 'required' => false))
            ->getForm();
        $Form->handleRequest($request);
        if ($Form->isSubmitted() && $Form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Integrations);
            $em->flush();

            if($new){
            	$this->Settings->setIntegrations($Integrations);
            	$em->persist($this->Settings);
            	$em->flush();
            }

            return $this->redirectToRoute('admin_integrations');
        }

        return $this->attributes([
            'form'     => $Form->createView(),
            'Integrations' => $Integrations,
        ]);
    }

}