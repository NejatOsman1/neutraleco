<?php
namespace App\CmsBundle\Controller;

use App\CmsBundle\Controller\StorageController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;

// Form elements
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Twig\Environment;

class MailController  extends StorageController
{

    /**
     * @Route("/admin/mail", name="admin_mail")
     * @Template()
     */
    public function indexAction(Request $request)
    {

        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("E-mail notificaties", [], 'cms'), "admin_mail");

        /*$emails = $this->getDoctrine()->getRepository('CmsBundle:Mail')->findAll();
        $grouped = [];

        foreach($emails as $Email){
            $grouped[$Email->getCategory()][] = $Email;
        }*/



        $emails_cms = $this->getDoctrine()->getRepository('CmsBundle:Mail')->findBySettings($this->Settings);
        if(empty($emails_cms)){
            $emails_cms = $this->getDoctrine()->getRepository('CmsBundle:Mail')->findByLanguage($this->Settings->getLanguage());

            $em = $this->getDoctrine()->getManager();
            if($this->Settings->getId() == 1){
                // Default settings, assign mails to this one
                foreach($emails_cms as $TempEmail){
                    if(empty($TempEmail->getSettings())){
                        $TempEmail->setSettings($this->Settings);
                        $em->persist($TempEmail);
                    }
                }
            }else{
                foreach($emails_cms as $TempEmail){
                    if(empty($TempEmail->getSettings()) || $TempEmail->getSettings()->getId() == 1){
                        // Only clone from first batch
                        $NewEmail = clone $TempEmail;
                        $NewEmail->setSettings($this->Settings);
                        $em->persist($NewEmail);
                    }
                }
            }
            $em->flush();
            $emails_cms = $this->getDoctrine()->getRepository('CmsBundle:Mail')->findBySettings($this->Settings);
        }

        if(in_array('WebshopBundle', $this->installed) && !empty($this->WebshopSettings) && !empty($this->WebshopSettings->getWebshop())){
            $emails = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Mail')->findByWebshop($this->WebshopSettings->getWebshop());
        }else{
            $emails = [];
        }

        $grouped = [];

		$not_allowed = ['no_payment', 'abandoned', 'status_update', 'order_delivered', 'lost_password', 'new_account', 'internal'];

		if (!empty($this->WebshopSettings) && method_exists($this->WebshopSettings, 'getQuoteEnabled') && !$this->WebshopSettings->getQuoteEnabled()) {
			array_push($not_allowed, 'new_quote');
		}

        foreach($emails as $Email){
			if(!in_array($Email->getKey(), $not_allowed)){
                $grouped[$Email->getCategory()][] = $Email;
            }
        }

        foreach($emails_cms as $Email){
            $grouped['Systeem'][] = $Email;
        }



        $form = $this->createFormBuilder($this->Settings)
            ->add('mail_footer', TextareaType::class, array('label' => $this->trans('E-mail footer tekst', [], 'cms'), 'required' => false))

            ->setAction($this->containerInterface->get("router")->generate("admin_mail"))
            ->setMethod('post')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($this->Settings);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_mail'));
        }

        return $this->attributes([
            'form'    => $form->createView(),
            'grouped' => $grouped,
        ]);
    }

    /**
     * @Route("/admin/mail/templates", name="admin_mail_templates")
     * @Template()
     */
    public function templatesAction(Request $request)
    {

        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("E-mail templates", [], 'cms'), "admin_mail_templates");

        $templates = $this->getDoctrine()->getRepository('CmsBundle:MailTemplate')->findAll();

        return $this->attributes([
            'templates' => $templates
        ]);
    }

    /**
     * @Route("/admin/mail/templates/edit/{id}", name="admin_mail_templates_edit")
     * @Template()
     */
    public function templatesEditAction(Request $request, $id = null)
    {

        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("E-mail templates", [], 'cms'), "admin_mail_templates");

        if($id){
            $MailTemplate = $this->getDoctrine()->getRepository('CmsBundle:MailTemplate')->find($id);
            $this->breadcrumbs->addRouteItem($MailTemplate->getLabel(), "admin_mail_templates_edit", array('id' => $id));
        }else{
            $this->breadcrumbs->addRouteItem($this->trans("Toevoegen", [], 'cms'), "admin_mail_templates_edit");
            $MailTemplate = new \App\CmsBundle\Entity\MailTemplate();
            $MailTemplate->setSettings($this->Settings);
            $MailTemplate->setLanguage($this->Settings->getLanguage());
        }

        $form = $this->createFormBuilder($MailTemplate)
            ->add('label', TextType::class, array('label' => $this->trans('Interne titel', [], 'cms')))
            ->add('subject', TextType::class, array('label' => $this->trans('Onderwerp', [], 'cms')))
            ->add('body', TextareaType::class, array('label' => $this->trans('Inhoud', [], 'cms'), 'attr' => ['class' => 'ckeditor']))
            ->setMethod('post')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($MailTemplate);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_mail_templates'));
        }

        return $this->attributes([
            'id'           => $id,
            'form'         => $form->createView(),
            'MailTemplate' => $MailTemplate,
        ]);
    }

    /**
     * @Route("/admin/mail/edit/{id}", name="admin_mail_edit")
     * @Template()
     */
    public function editAction(Request $request, $id = null)
    {

        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("E-mail notificaties", [], 'cms'), "admin_mail");

        $system = $request->get('system');

        if($id){
            if($system){
                $Mail = $this->getDoctrine()->getRepository('CmsBundle:Mail')->find($id);
            }else{
                $Mail = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Mail')->find($id);
            }
            $this->breadcrumbs->addRouteItem($Mail->getLabel(), "admin_mail_edit", array('id' => $id));
        }else{
            $this->breadcrumbs->addRouteItem($this->trans("Toevoegen", [], 'cms'), "admin_mail_edit");
            $Mail = new \App\CmsBundle\Entity\Mail();
            // $Mail->setWebshop($Webshop);
        }

        $form = $this->createFormBuilder($Mail)
            ->add('subject', TextType::class, array('label' => $this->trans('Onderwerp', [], 'cms')))
            ->add('body', TextareaType::class, array('label' => $this->trans('Inhoud', [], 'cms'), 'attr' => ['class' => 'ckeditor']))
            ->setMethod('post')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Mail);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_mail'));
        }

        return $this->attributes([
            'id'             => $id,
            'form'           => $form->createView(),
            'Mail' => $Mail,
        ]);
    }

    /**
     * @Route("/admin/mail/history/{id}", name="admin_mail_history")
     * @Template()
     */
    public function historyAction(Request $request, $id = null)
    {

        parent::init($request);

        if($id){
            die('<iframe frameborder="0" style="width:100%;height:100%;margin:0;" src="' . $this->generateUrl('admin_mail_history_view', ['id' => $id]) . '"></iframe>');
        }

        $this->breadcrumbs->addRouteItem($this->trans("E-mail historie", [], 'cms'), "admin_mail_history");

        $emails = $this->getDoctrine()->getRepository('CmsBundle:Mailhistory')->findBy([], [
            'date' => 'desc'
        ]);

        return $this->attributes([
            'emails' => $emails,
        ]);
    }

    /**
     * @Route("/admin/mail/history/view/{id}", name="admin_mail_history_view")
     * @Template()
     */
    public function historyViewAction(Request $request, $id = null)
    {
        parent::init($request);

        $EmailHistory = $this->getDoctrine()->getRepository('CmsBundle:Mailhistory')->find($id);

        $this->breadcrumbs->addRouteItem($this->trans("E-mail historie", [], 'cms'), "admin_mail_history");
        $this->breadcrumbs->addRouteItem($EmailHistory->getDate()->format('d-m-Y H:i:s'), "admin_mail_history_view", ['id' => $id]);

        return $this->attributes([
            'EmailHistory' => $EmailHistory,
        ]);
    }

    /**
     * @Route("/admin/mail/preview/{id}", name="admin_mail_preview")
     * @Template()
     */
    public function previewAction(Request $request, $id)
    {
        parent::init($request);
        
        // Met opzet geen code.
        // We willen enkel de ruwe template hebben zonder backend opmaak.

        return ['id' => $id];
    }

    /**
     * @Route("/admin/mail/preview/include/{id}", name="admin_mail_preview_include")
     * @Template()
     */
    public function previewIncludeAction(Request $request, Environment $twig, $id)
    {

        parent::init($request);

        $Mail = $this->getDoctrine()->getRepository('CmsBundle:Mail')->find($id);

        $plain_body = $twig->render(
            'emails/' . $Mail->getTemplate(),
            [
                'label'       => '',
                'message'     => $Mail->getBody(),
                'sitename'    => $this->Settings->getLabel(),
                'phone'       => $this->Settings->getPhone(),
                'email'       => $this->Settings->getSystemEmail(),
            ]
        );

        /*$body = $twig->createTemplate($plain_body)->render([
            'sitename'   => $this->Settings->getLabel(),
            'username'   => 'gebruikersnaam',
            'password'   => 'wachtwoord',
            'newpassword' => 'wachtwoord',
            'firstname'  => 'Voornaam',
            'lastname'   => 'Achternaam',
            'street'     => 'Straatnaam',
            'number'     => '10',
            'postalcode' => '1234 AB',
            'city'       => 'Plaatsnaam',
            'credits' => 'Credits',
            'full_name_receiver' => 'Voornaam Achternaam',
            'full_name_sender' => 'Voornaam Achternaam',
            'project_name' => 'Projectnaam',
            'content' => 'Inhoud',
            'project_type' => 'Projecttype',
            'project_type_different' => 'Projecttype',
            'project_summary' => 'Project samenvatting',
            'project_description' => 'Project omschrijving',
            'project_company_desciption' => 'Project bedrijfsomschrijving',
            'project_certificates' => 'Project certificaten',
            'phone'      => $this->Settings->getPhone(),
            'email'      => $this->Settings->getSystemEmail(),
        ]);*/

        // Dit is met opzet zodat er geen extra backend opmaak in de output zit.
        die($plain_body);
    }

}
