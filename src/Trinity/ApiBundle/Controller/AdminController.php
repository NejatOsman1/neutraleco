<?php
namespace App\Trinity\ApiBundle\Controller;

use App\CmsBundle\Controller\StorageController;
use App\Trinity\ApiBundle\Entity\AccessToken;
use App\Trinity\ApiBundle\Entity\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Form elements
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

// Custom form elements
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AdminController extends StorageController
{

    /**
     * @Route("/admin/api", name="admin_mod_api")
     * @Template()
     */
    public function clientsAction( Request $request)
    {

        parent::init($request);

        $this->breadcrumbs->addRouteItem("API", "admin_mod_api");

        $clients = $this->getDoctrine()->getRepository('TrinityApiBundle:Client')->findAll();

        return $this->attributes(array(
            'clients' => $clients
        ));
    }

    /**
     * @Route("/admin/api/{id}/token/delete", name="admin_mod_api_delete_token")
     */
    public function deleteTokenAction( Request $request, $id)
    {
        parent::init($request);
        $Token = $this->getDoctrine()->getRepository('TrinityApiBundle:AccessToken')->find($id);
        $Client = $Token->getClient();
        $clientId = $Client->getId();
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($Token);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_mod_api_view', ['id' => $clientId]));
    }

    /**
     * @Route("/admin/api/{id}/generate", name="admin_mod_api_generate")
     */
    public function generateAction( Request $request, $id)
    {
        parent::init($request);
        $Client = $this->getDoctrine()->getRepository('TrinityApiBundle:Client')->find($id);

        /*
            Generate token
        */

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->host . "/oauth/v2/token");
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'grant_type' => 'client_credentials',
            'client_id' => $Client->getId() . '_' . $Client->getRandomId(),
            'client_secret' => $Client->getSecret()
        ]);

        $data = curl_exec($ch);
        if(empty($data)){
            die( "<pre>" . print_r( curl_error($ch), 1 ) . "</pre>" );
        }

        $data = json_decode($data, true);

        return $this->redirect($this->generateUrl('admin_mod_api_view', ['id' => $Client->getId()]));
    }

    /**
     * @Route("/admin/api/{id}/view", name="admin_mod_api_view")
     * @Template()
     */
    public function viewAction( Request $request, $id)
    {

        parent::init($request);

        $this->breadcrumbs->addRouteItem("API", "admin_mod_api");

        $Client = $this->getDoctrine()->getRepository(Client::class)->find($id);

        $this->breadcrumbs->addRouteItem($Client->getLabel(), "admin_mod_api_edit", array('id' => $id));
        $this->breadcrumbs->addRouteItem('Tokens', "admin_mod_api_view", array('id' => $id));

        $tokens = $this->getDoctrine()->getRepository(AccessToken::class)->findByClient($Client);

        return $this->attributes(array(
            'Client' => $Client,
            'tokens' => $tokens
        ));
    }

    /**
     * @Route("/admin/api/edit/{id}", name="admin_mod_api_edit")
     * @Template()
     */
    public function clientEditAction( Request $request, $id = null)
    {

        parent::init($request);

        $this->breadcrumbs->addRouteItem("API", "admin_mod_api");
        if($id){
            $this->breadcrumbs->addRouteItem("Wijzigen", "admin_mod_api_edit", array('id' => $id));
        }else{
            $this->breadcrumbs->addRouteItem("Toevoegen", "admin_mod_api_edit");
        }

        if( (int)$id > 0 ){
            $Client = $this->getDoctrine()->getRepository(Client::class)->find($id);
        }else{
            $Client = new Client();
        }

        $form = $this->createFormBuilder($Client)
            ->add('label', TextType::class, array('label' => 'Titel'))
            ->add('randomId', TextType::class, array('label' => 'Hash', 'attr' => ['class' => 'keygen']))
            ->add('secret', TextType::class, array('label' => 'Sleutel', 'attr' => ['class' => 'keygen']))
            ->add('allowedGrantTypes', ChoiceType::class, array(
                'choices' => array(
                    'Autorisatie code' => 'authorization_code',
                    'Token' => 'token',
                    'Wachtwoord' => 'password',
                    'Client' => 'client_credentials',
                    'Vernieuwings token' => 'refresh_token',
                    'Extensies' => 'extensions',
                ),
                'label' => 'Methodes',
                'attr' => array(
                    'class' => 'multi-select',
                    'style' => 'height:110px;',
                ),
                'multiple' => true,
                'expanded' => true
            ))
            ->setMethod('post')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($Client);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_mod_api'));
        }

        return $this->attributes(array(
            'form' => $form->createView(),
            'id' => $id
        ));
    }

    /**
     * Show dashboard blocks
     *
     * @return array List of blocks
     */
    public function dashboardBlocks(){
        return array();
    }
}