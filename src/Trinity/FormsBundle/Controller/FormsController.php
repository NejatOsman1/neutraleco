<?php
namespace App\Trinity\FormsBundle\Controller;

use App\CmsBundle\Classes\Hummessenger as MailerTool;
use App\CmsBundle\Controller\StorageController;
use App\CmsBundle\Entity\Media;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class FormsController extends StorageController
{

	/**
	 * @Route("/admin/forms/answers/filter/{formid}/{page}", name="admin_mod_forms_answers_filter", requirements={"formid": "\d+", "page": "\d+"})
	 * @Template()
	 */
	public function filterAction(Request $request, $formid, $page = 1)
	{
		parent::init($request);



		$filter = $request->get('filter');
		if(!empty($filter['q'])){
			$filter['q'] = explode(' ', $filter['q']);
		}
		$offset = 0;
		$limit  = (int)(!empty($_GET['pp']) ? $_GET['pp'] : 20);

		$count = $this->getDoctrine()->getRepository('TrinityFormsBundle:Answer')->filter($formid, true, $offset, $limit, $filter);

		$pages = ceil($count / $limit);
		if($pages == 0) $pages = 1;
		if($page > $pages){ $page = $pages; }
		if($pages < 1){ $pages = 1; }
		$offset = (($page * $limit) - $limit);

		$results = [];
		$dql_results = $this->getDoctrine()->getRepository('TrinityFormsBundle:Answer')->filter($formid, false, $offset, $limit, $filter);

		foreach($dql_results as $Entry){


			$a = [
				'name' => [],
				'email' => '',
				'phone' => '',
				'nieuwsbrief' => '',
			];

			if(!is_array($Entry->getAnswer())){
				$ans = json_decode($Entry->getAnswer(), true);
				foreach($ans as $k => $v){
					$k = strtolower($k);
					// echo '<pre>' . print_r($k, 1) . '</pre>';
					if(preg_match('/naam/', $k)){
						$a['name'][] = $v;
					}
					if(preg_match('/mail/', $k)){
						$a['email'] = $v;
					}
					if(preg_match('/nieuwsbrief/', $k)){
						$a['nieuwsbrief'] = '<i class="material-icons">check_circle</i>';
					}
					if(preg_match('/foon/', $k)){
						$a['phone'] = $v;
					}
				}

				$a['name'] = implode(' ', $a['name']);

				// $answers[$i]->setAnswer($a);
			}



			$results[] = [
				'id'      => $Entry->getId(),
				'ip'      => (!empty($Entry->getIp()) ? $Entry->getIp() : '----'),
				'date' => (!empty($Entry->getSession()) ? $Entry->getSession()->getDateEnd()->format('d-m-Y H:i:s') : ''),
				'name' => $a['name'],
				'email' => $a['email'],
				'phone' => $a['phone'],
				'nieuwsbrief' => $a['nieuwsbrief'],
			];
		}

		return new JsonResponse([
			'count'   => (int)$count,
			'page'    => $page,
			'pages'   => $pages,
			'offset'  => $offset,
			'limit'   => $limit,
			'results' => $results,
		]);
	}

	/**
	 * @Route("/admin/forms", name="admin_mod_forms")
	 * @Template()
	 */
	public function indexAction( Request $request, $id = null)
	{

		parent::init($request);

		$this->breadcrumbs->addRouteItem($this->trans("Formulieren", 'cms'), "admin_mod_forms");

		$forms = $this->getDoctrine()->getRepository('TrinityFormsBundle:Form')->findBy([
			'language' => $this->language,
			'settings' => $this->Settings
		]);

		$forms_used = [];
		$blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('TrinityFormsBundle');

		foreach($blocks as $Block){
			$p = $Block->getWrapper()->getPage();
			if($p->getLanguage() == $this->language){
				$data = $Block->getBundleData(true);
				if (isset($data['id'])) {
					$forms_used[] = $data['id'];
				}
			}
		}

		return $this->attributes(array(
			'forms_used' => $forms_used,
			'forms' => $forms
		));
	}

	/**
	 * @Route("/admin/forms/answers/delete/{id}", name="admin_mod_forms_answers_delete")
	 */
	public function deleteAmswerAction( Request $request, $id = null)
	{
		parent::init($request);

		$Answer = $this->getDoctrine()->getRepository('TrinityFormsBundle:Answer')->find($id);
		$form_id = $Answer->getForm()->getId();

		$em = $this->getDoctrine()->getManager();
		$em->remove($Answer);
		$em->flush();

		return $this->redirectToRoute('admin_mod_forms_answers', ['id' => $form_id]);
	}

	/**
	 * @Route("/admin/forms/answers/{id}/export", name="admin_mod_forms_answers_export")
	 * @Template()
	 */
	public function export( Request $request, $id = null)
	{
		parent::init($request);
		
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=form_answers.csv');
		$output = fopen('php://output', 'w');

		$Form = $this->getDoctrine()->getRepository('TrinityFormsBundle:Form')->find($id);

		fputcsv($output, ['Veld',  'Invoer']);
		fputcsv($output, ['']);

		$answers = $Form->getAnswers();
		foreach($answers as $i => $answer){

			if(!is_array($answer->getAnswer())){
				$ans = json_decode($answer->getAnswer(), true);
				$keys = [];
				$values = [];
				foreach($ans as $k => $v){
					if(is_array($v)){
						$v = implode(', ', $v);
					}

					fputcsv($output, [$k,  $v]);
				}

				fputcsv($output, ['']);

				/* if(empty($csv[0])){
					$csv[0] = $keys;
				} */
			}
		}

		exit;
	}

	/**
	 * @Route("/admin/forms/answers/{id}/{answerid}", name="admin_mod_forms_answers")
	 * @Template()
	 */
	public function answersAction( Request $request, $id = null, $answerid = null)
	{
		parent::init($request);

		$Form = $this->getDoctrine()->getRepository('TrinityFormsBundle:Form')->find($id);

		$this->breadcrumbs->addRouteItem($this->trans("Formulieren", 'cms'), "admin_mod_forms");
		$this->breadcrumbs->addRouteItem($Form->getLabel(), "admin_mod_forms");
		$this->breadcrumbs->addRouteItem($this->trans("Reacties", 'cms'), "admin_mod_forms_answers", array('id' => $id, 'answerid' => null));

		$Answer = null;
		if(!is_null($answerid)){
			$Answer = $this->getDoctrine()->getRepository('TrinityFormsBundle:Answer')->find($answerid);
			$this->breadcrumbs->addRouteItem($this->trans("Reactie", 'cms'), "admin_mod_forms_answers", array('id' => $id, 'answerid' => $answerid));
			$Answer->setAnswer(json_decode($Answer->getAnswer(), true));

			if($request->isXmlHttpRequest()) {
				return $this->render('@TrinityForms/form/answers_ajax.html.twig', ['Answer' => $Answer]);
			}
		}

		$answers = $Form->getAnswers();
		foreach($answers as $i => $answer){
			$a = [
				'name' => [],
				'email' => '',
				'phone' => '',
			];

			if(!is_array($answer->getAnswer())){
				$ans = json_decode($answer->getAnswer(), true);
				foreach($ans as $k => $v){
					$k = strtolower($k);
					// echo '<pre>' . print_r($k, 1) . '</pre>';
					if(preg_match('/naam/', $k)){
						$a['name'][] = $v;
					}
					if(preg_match('/mail/', $k)){
						$a['email'] = $v;
					}
					if(preg_match('/foon/', $k)){
						$a['phone'] = $v;
					}
				}

				$a['name'] = implode(' ', $a['name']);

				$answers[$i]->setAnswer($a);
			}
		}

		$hasNewsletter = false;
		if(in_array('NewsletterBundle', $this->installed)){
			$hasNewsletter = true;
		}

		return $this->attributes(array(
			'Form' => $Form,
			'Answer' => $Answer,
			'hasNewsletter' => $hasNewsletter,
			'answers' => $answers
		));
	}

	/**
	 * @Route("/admin/forms/edit/addelement/{id}/{type}", name="admin_mod_forms_addrow")
	 */
	public function addelementAction(Request $request, $id = null, $type = null){
		parent::init($request);

		$tpl = '';
		$tplDir = $this->containerInterface->get('kernel')->locateResource('@TrinityFormsBundle/Resources/views/elements/');

		// Check for newsletter presence
		$emaillists = null;
		if(in_array('NewsletterBundle', $this->installed)){
			$emaillists = $this->getDoctrine()->getRepository('TrinityFormsBundle:Emaillist')->findAll();
		}

		if(file_exists($tplDir . $type . '.html.twig')){
			$Question = new \App\Trinity\FormsBundle\Entity\Question();
			$Question->setType($type);

			/*if($Question->getTitle() == 'Titel'){
				$Question->setTitle($this->trans('Title', 'cms'));
			}*/

			/*if($Question->getSubTitle() == 'Toelichting'){
				$Question->setSubTitle($this->trans('Explanation', 'cms'));
			}*/

			// Default values
			if($type == 'newsletter'){
				$Question->setTitle($this->trans('Ik wil me aanmelden voor de nieuwsbrief', 'cms'));
			}


			$random = time();

			// Get Form
			$Form = $this->getDoctrine()->getRepository('TrinityFormsBundle:Form')->findOneById($id);

			return $this->render('@TrinityForms/elements/' . $type . '.html.twig', array('edit' => true, 'emaillists' => $emaillists, 'Form' => $Form, 'Question' => $Question, 'random' => $random));
		}
		return $this->render('@TrinityForms/elements/invalid.html.twig', array('edit' => true, 'emaillists' => $emaillists));
	}

	/**
	 * @Route("/admin/forms/edit/{id}", name="admin_mod_forms_edit")
	 * @Template()
	 */
	public function editAction( Request $request, $id = null)
	{

		parent::init($request);

		$hasNewsletter = false;
		if(in_array('NewsletterBundle', $this->installed)){
			$hasNewsletter = true;
		}

		$this->breadcrumbs->addRouteItem($this->trans("Formulieren", 'cms'), "admin_mod_forms");

		$new = false;
		if( (int)$id > 0 ){
			// Edit
			$Form = $this->getDoctrine()->getRepository('TrinityFormsBundle:Form')->find($id);


			if($this->language != $Form->getLanguage() || $this->Settings != $Form->getSettings()){
				return $this->redirect($this->generateUrl('admin_mod_forms'));
			}

			$this->breadcrumbs->addRouteItem($this->trans("Wijzigen:", 'cms'). " " . $Form->getLabel(), "admin_mod_forms_edit");

		}else{
			$new = true;
			// Add
			$Form = new \App\Trinity\FormsBundle\Entity\Form();
			$Form->setLanguage($this->language);
			$Form->setSettings($this->Settings);
			$this->breadcrumbs->addRouteItem($this->trans("Toevoegen", 'cms'), "admin_mod_forms_edit");
		}
		$saved = false;
        if($this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            $editform = $this->createFormBuilder($Form)
                ->add('label', TextType::class, array('label' => $this->trans('Formulier titel', [], 'cms')))
                ->add('hide_clear_button', CheckBoxType::class, ['label' => $this->trans('Verberg de leegmaken knop', 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']])
                ->add('mail_reply_to', CheckboxType::class, array('label' => $this->trans('E-mail als reply-to adres', 'cms'), 'row_attr' => ['class' => 'page-chk']))
                ->add('floating_labels', CheckboxType::class, array('label' => 'Floating labels', 'required' => false))
			    ->add('active_campaign', CheckboxType::class, array('label' => 'ActiveCampaign', 'required' => false, 'row_attr' => ['class' => 'page-chk']))
                ->add('active_campaign_url', TextType::class, array('label' => 'ActiveCampaign Key', 'required' => false))
                ->add('active_campaign_key', TextType::class, array('label' => 'ActiveCampaign Key', 'required' => false))
                ->add('active_campaign_listid', TextType::class, array('label' => 'ActiveCampaign List ID', 'required' => false))
                ->setMethod('post')
                ->getForm();
            if($Form->getSettings()->isHummessengerApiEnabled()){
            $editform->add('mailer_listid', TextType::class, array('label' => 'Hummessenger List ID', 'required' => false));
            }
        } else {
            $editform = $this->createFormBuilder($Form)
                ->add('label', TextType::class, array('label' => $this->trans('Formulier titel', [], 'cms')))
                ->add('hide_clear_button', CheckBoxType::class, ['label' => $this->trans('Verberg de leegmaken knop', 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']])
                ->add('mail_reply_to', CheckboxType::class, array('label' => $this->trans('E-mail als reply-to adres', 'cms'), 'row_attr' => ['class' => 'page-chk']))
                ->setMethod('post')
                ->getForm();
        }

		$em = $this->getDoctrine()->getManager();

		$editform->handleRequest($request);
		if ($editform->isSubmitted() && $editform->isValid()) {

			if(!isset($_POST['id'])){
				// No fields found, clean up
				$rm_questions = $this->getDoctrine()->getRepository('TrinityFormsBundle:Question')->findByForm($Form);
				foreach($rm_questions as $RmQuestion){
					$em->remove($RmQuestion);
				}
			}

			if(!empty($_POST['id'])){
				$ids = [];
				$q = $this->getDoctrine()->getRepository('TrinityFormsBundle:Question')->findByForm($Form);
				foreach($q as $Q){ $ids[] = $Q->getId(); }
				foreach(array_diff($ids, $_POST['id']) as $id){
					$Question = $this->getDoctrine()->getRepository('TrinityFormsBundle:Question')->find($id);
					$em->remove($Question);
				}

				$positions = [];
				if(!empty($_POST['pos'])){
					$positions = array_values($_POST['pos']);
				}

				$width = [];
				if(!empty($_POST['width'])){
					$width = array_values($_POST['width']);
				}

				foreach($_POST['id'] as $i => $id){
					$pos = (isset($positions[$i]) ? (int)$positions[$i] : 0);
					$w = (isset($width[$i]) ? (int)$width[$i] : 12);

					$Question = $this->getDoctrine()->getRepository('TrinityFormsBundle:Question')->find($id);
					if(empty($Question)){
						// New
						$Question = new \App\Trinity\FormsBundle\Entity\Question();
						$Question->setForm($Form);
						$Question->setType($_POST['type'][$i]);
						$Form->addQuestion($Question);
					}

					$Question->setPosition($pos); // Set position
					$Question->setWidth($w); // Set position

					if(isset($_POST['values'][$id])){
						if(is_array($_POST['values'][$id])){
							foreach($_POST['values'][$id] as $k => $v){
								$_POST['values'][$id][$k] = str_replace(',', '&comma;', $v);
							}
						}

						$Question->setValues($_POST['values'][$id]);
					}

					if(isset($_POST['disabled'][$id])){
						$Question->setDisabled($_POST['disabled'][$id]);
					}else{
						$Question->setDisabled([]);
					}

					if(isset($_POST['config'][$id])){
						$Question->setConfig($_POST['config'][$id]);
					}else{
						$Question->setConfig([]);
					}

					if(isset($_POST['default'][$id])){
						$Question->setDefault($_POST['default'][$id]);
					}else{
						$Question->setDefault([]);
					}

					if(isset($_POST['email'][$id])){
						$Question->setEmail($_POST['email'][$id]);
					}else{
						$Question->setEmail([]);
					}

					if(isset($_POST['title'][$id])){
						$Question->setTitle(strip_tags($_POST['title'][$id]));
					}else{
						$Question->setTitle("");
					}

					if(isset($_POST['subtitle'][$id])){
						$Question->setSubTitle(strip_tags($_POST['subtitle'][$id]));
					}else{
						$Question->setSubTitle("");
					}

					if(!empty($_POST['required'])){
						$Question->setRequired(in_array($id, $_POST['required']));
					}else{
						$Question->setRequired(false);
					}

					if(!empty($_POST['hidden'])){
						$Question->setHidden(in_array($id, $_POST['hidden']));
					}else{
						$Question->setHidden(false);
					}

					if(!empty($_POST['hidden_label'][$id])){
						$Question->setHiddenLabel(in_array($id, $_POST['hidden_label']));
					}else{
						$Question->setHiddenLabel(false);
					}

					if(!empty($_POST['placeholder'][$i])){
						$Question->setPlaceholder($_POST['placeholder'][$i]);
					} else if (empty($_POST['placeholder'][$i]) && !empty($Question->getPlaceHolder())) {
						$Question->setPlaceholder(null);
					}

					// Set new sort order
					$Question->setSort($i);

					$em->persist($Question);
				}
			}

			$Form->setMails($_POST['mail']);

			if(!empty($_POST['delete'])){
				foreach(explode(',', $_POST['delete']) as $id){
					if(!empty($id)){
						$Question = $this->getDoctrine()->getRepository('TrinityFormsBundle:Question')->find($id);
						$em->remove($Question);
					}
				}
			}

			// Store in database
			$em->persist($Form);
			$em->flush();

			// Clone question to more sites
			if(!empty($_POST['clone'])){
				foreach($_POST['clone'] as $id){
					$LinkedSettings = $this->getDoctrine()->getRepository('CmsBundle:Settings')->find($id);

					$NewForm = clone $Form;
					$NewForm->setSettings($LinkedSettings);
					$NewForm->setLanguage($LinkedSettings->getLanguage());
					$em->persist($NewForm);

					// Clone questions
					foreach($Form->getQuestions() as $Question){
						$newQuestion = clone $Question;
						$newQuestion->setForm($NewForm);
						$em->persist($newQuestion);
					}
				}
				$em->flush();
			}

			// Store metadata/metatags
			if(!empty($_POST['metadata'])){
				foreach($_POST['metadata'] as $metatagid => $value){
					$Metatag = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->findOneById($metatagid);

					$FormMetatag = $this->getDoctrine()->getRepository('TrinityFormsBundle:Metatag')->findOneBy(['metatag' => $Metatag, 'form' => $Form]);
					if(empty($FormMetatag)){
						$FormMetatag = new \App\Trinity\FormsBundle\Entity\Metatag();
						$FormMetatag->setMetatag($Metatag);
						$FormMetatag->setForm($Form);
					}
					$FormMetatag->setValue($value);

					$em->persist($FormMetatag);
				}
			$em->flush();
			}

			$this->resetPageCacheThatContainedBundle('TrinityFormsBundle', $this->Settings);

			if(empty($_POST['inline_save'])){
				return $this->redirect($this->generateUrl('admin_mod_forms'));
			}else{
				return $this->redirect($this->generateUrl('admin_mod_forms_edit', ['id' => $Form->getId()]));
			}
		}

		$templates = scandir('../templates/emails');
		foreach($templates as $k => $v){
			if(substr($v, 0, 1) == '.'){
				unset($templates[$k]);
			}
		}

		$questions = $this->getDoctrine()->getRepository('TrinityFormsBundle:Question')->findBy(array('form'=> $Form), array('sort' => 'ASC'));

		// Check for newsletter presence
		$emaillists = null;
		if(in_array('NewsletterBundle', $this->installed)){
			$emaillists = $this->getDoctrine()->getRepository('TrinityFormsBundle:Emaillist')->findAll();
		}

		$formMetatags = [];
		$ignoreTags    = ['description', 'keywords'];
		$metatags      = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->findBy(['system' => false]);
		foreach($metatags as $index => $Metatag){
			if(!in_array($Metatag->getKey(), $ignoreTags)){
				$FormMetatag = $this->getDoctrine()->getRepository('TrinityFormsBundle:Metatag')->findOneBy(['metatag' => $Metatag, 'form' => $Form]);
				if(empty($FormMetatag)){
					$FormMetatag = new \App\Trinity\FormsBundle\Entity\Metatag();
					$FormMetatag->setMetatag($Metatag);
				}
				$formMetatags[] = $FormMetatag;
			}
		}

		return $this->attributes(array(
			'form'          => $editform->createView(),
			'Form'          => $Form,
			'mails'         => $Form->getMails(),
			'questions'     => $questions,
			'templates'     => $templates,
			'hasNewsletter' => $hasNewsletter,
			'id'            => $id,
			'new'           => $new,
			'Settings'      => $this->Settings,
			'edit'          => true,
			'saved'         => (bool)$saved,
			'emaillists'    => $emaillists,
			'metatags'      => $formMetatags,
		));
	}

	/**
	 * @Route("/admin/forms/config/{id}", name="admin_mod_forms_config")
	 * @Template()
	 */
	public function configAction( Request $request, $id)
	{

		parent::init($request);

		$this->breadcrumbs->addRouteItem($this->trans("Formulieren", 'cms'), "admin_mod_forms");
		$this->breadcrumbs->addRouteItem($this->trans("Configureren", 'cms'), "admin_mod_forms_config", ['id' => $id]);

		$Form = $this->getDoctrine()->getRepository('TrinityFormsBundle:Form')->find($id);

		$saved = false;
		$editform = $this->createFormBuilder($Form)
			->add('label', TextType::class, array('label' => $this->trans('Formulier titel', 'cms')))
			->add('auto_response', CheckboxType::class, array('label' => $this->trans('Automatisch antwoord', 'cms')))
			->add('auto_response_subject', TextType::class, array('label' => $this->trans('Onderwerp', 'cms')))
			->add('auto_response_text', TextareaType::class, array('label' => $this->trans('E-mail inhoud', 'cms')))
			->setMethod('post')
			->getForm();

		$em = $this->getDoctrine()->getManager();

		$editform->handleRequest($request);
		if ($editform->isSubmitted() && $editform->isValid()) {

			// Store in database
			$em->persist($Form);
			$em->flush();
			return $this->redirect($this->generateUrl('admin_mod_forms'));
		}

		return $this->attributes(array(
			'form'      => $editform->createView(),
			'Form'      => $Form,
		));
	}

	/**
	 * @Route("/admin/forms/delete/{id}", name="admin_mod_forms_delete")
	 * @Template()
	 */
	public function deleteAction(Request $request, $id = null)
	{

		parent::init($request);

		$em = $this->getDoctrine()->getManager();
		$Form = $em->getRepository('TrinityFormsBundle:Form')->find($id);

		if(!is_null($Form)){
			$em = $this->getDoctrine()->getManager();

			$sessions = $em->getRepository('TrinityFormsBundle:Session')->findByForm($Form);
			foreach($sessions as $a){
				$a->setForm(null);
				$a->setAnswer(null);
				$em->flush();
			}
			foreach($sessions as $a){
				$em->remove($a);
				$em->flush();
			}

			foreach($Form->getAnswers() as $a){
				$em->remove($a);
				$em->flush();
			}

			$em->remove($Form);
			$em->flush();

			$this->resetPageCacheThatContainedBundle('TrinityFormsBundle', $this->Settings);
		}

		return $this->redirect($this->generateUrl('admin_mod_forms'));
	}

	/**
	 * @Route("/forms/ajax/{id}", name="mod_forms_ajax")
	 * @Template()
	 */
	public function ajaxShowAction(Request $request,$id = null){
		parent::init($request);
		
		$config['id'] = $id;
		return $this->showAction($config,array('isAjax' => true),$request);
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

		$Form = $this->getDoctrine()->getRepository('TrinityFormsBundle:Form')->findOneById($config['id']);
		if($Form){
			$hash = $this->get('session')->get('formhash');
			if(is_null($hash) || substr($hash, 0, strlen($Form->getId()) + 1) != $Form->getId() . '_'){
				$hash = $Form->getId() . '_' . md5(rand(1000,9999) . '' . time());
			}

			$this->get('session')->set('formhash', $hash);

			$saved = false;
			$error = false;
			$inline_error = false;

			$files = array();
			$canvas = [];

			// Add attachement
			$uploadDir = str_replace('/src/Trinity/FormsBundle/Controller' , '/public/uploads/', __DIR__);

			if(!is_writable($uploadDir)){
				die($this->trans('Upload dir for forms is not writable!', 'cms'));
			}

			$ctx = $this->container->get('router')->getContext();
			$webUrl = $ctx->getScheme() . '://' . $ctx->getHost();
			if(isset($_FILES['form']['tmp_name'][$config['id']]) && is_array($_FILES['form']['tmp_name'][$config['id']])){
				foreach($_FILES['form']['tmp_name'][$config['id']] as $index => $tmpfile){
					if(!empty($tmpfile)){
						$filename = $_FILES['form']['name'][$config['id']][$index];
						$size = $_FILES['form']['size'][$config['id']][$index];

						if ($size > 10485760) { // 10 MB
							$error = $this->trans('Het bestand dat u probeert te uploaden is te groot:', 'cms') . ' <strong>' . $filename . '</strong> (' . round($size/1024/1024, 2) . ' MB)';
						}else{
							// Validation
							$finfo = new \finfo(FILEINFO_MIME_TYPE);
							if (false === $ext = array_search(
								$finfo->file($tmpfile),
								[
									'doc'     => 'application/doc',
									'xls'     => 'application/excel',
									'pdf'     => 'application/pdf',
									'ppt'     => 'application/powerpoint',
									'rtf'     => 'application/rtf',
									'keynote' => 'application/vnd.apple.keynote',
									'numbers' => 'application/vnd.apple.numbers',
									'pages'   => 'application/vnd.apple.pages',
									'xlsx'    => 'application/vnd.ms-excel',
									'pptx'    => 'application/vnd.ms-powerpoint',
									'rar'     => 'application/x-rar-compressed',
									'zip'     => 'application/zip',
									'ogg'     => 'audio/ogg',
									'wav'     => 'audio/wav',
									'midi'    => 'audio/x-midi',
									'csv'     => 'text/csv',
									'avi'     => 'video/avi',
									'mp4'     => 'video/mp4',
									'mpg'     => 'video/mpeg',
									'mpeg'    => 'video/mpeg',
									'mov'     => 'video/quicktime',
									'bmp'     => 'image/bmp',
									'gif'     => 'image/gif',
									'jpeg'    => 'image/jpeg',
									'jpg'     => 'image/jpeg',
									'png'     => 'image/png',
									'svg'     => 'image/svg+xml',
								],
								true
							)) {
								$error = $this->trans('U heeft geen geldig bestandstype geupload:', 'cms') . ' <strong>' . $filename . '</strong><br/><br/>' . $this->trans('De volgende bestanden zijn toegestaan:', 'cms') . '<br/>.doc, .xls, .pdf, .ppt, .rtf, .keynote, .numbers, .pages, .xlsx, .pptx, .rar, .zip, .ogg, .wav, .midi, .csv, .avi, .mp4, .mpg, .mpeg, .mov, .bmp, .gif, .jpeg, .jpg, .png, .svg.';
							}
						}

						if(!$error){
							$tmpUploadDir = $uploadDir . '';

							$tmpUploadDir = $tmpUploadDir . 'forms/';
							if(!file_exists($tmpUploadDir)) mkdir($tmpUploadDir);

							$tmpUploadDir = $tmpUploadDir . $config['id'] . '/';
							if(!file_exists($tmpUploadDir)) mkdir($tmpUploadDir);

							$tmpUploadDir = $tmpUploadDir . date('YmdH') . '/';
							if(!file_exists($tmpUploadDir)) mkdir($tmpUploadDir);

							$dest = $tmpUploadDir . $filename;
							if(move_uploaded_file($tmpfile, $dest)){
								$files[$filename] = $webUrl . '/uploads/forms/' . $config['id'] . '/' . date('YmdH') . '/' . $filename;
							}
						}
					}
				}
			}

			// Store in database
			if(!empty($_POST['form']) && !$error && !empty($_POST['form-bundle-submit']) && $_POST['form-bundle-submit'] == $Form->getId()){

				// $Session = $this->getDoctrine()->getRepository('TrinityFormsBundle:Session')->findOneByHash($hash);
				$validCaptcha = $this->Settings->validateGoogleRecaptcha($request->request->get('g-recaptcha-response'));
			
				if(($validCaptcha) && empty($_POST['form-check'])){

					if(empty($Session)){
						// Generate new session in case the current sesion got lost.
						$hash = $Form->getId() . '_' . md5(rand(1000,9999) . '' . time());
						$this->get('session')->set('formhash', $hash);

						// if(is_null($Session)){
						$Session = new \App\Trinity\FormsBundle\Entity\Session();
						$Session->setForm($Form);
						$Session->setHash($hash);
						$Session->setIpaddress($_SERVER['REMOTE_ADDR']);
						$Session->setDateStart(new \Datetime("now"));
					}

					$receiverFromAnswer = null;

				$Answer = $this->getDoctrine()->getRepository('TrinityFormsBundle:Answer')->findOneBySession($Session);
				if(!empty($Answer)){
					$saved = false;
					$error = $this->trans('Uw heeft het formulier al verzonden.', 'cms');
				}else{
					$Answer = new \App\Trinity\FormsBundle\Entity\Answer();
					$Answer->setForm($Form);
					$results = array();
					$email = null;
					$firstname = '';
					$lastname = '';
					$emaillist = null;

					foreach($_POST['form'][$Form->getId()] as $questionid => $answer){
						$Question = $this->getDoctrine()->getRepository('TrinityFormsBundle:Question')->findOneById($questionid);

						if($Question->getType() == 'email'){
							$email = $answer;
						}
						if($Question->getType() == 'newsletter'){
							$this->addmemberActivecampaign($Answer->getForm(), [], $email);
                        }
                        if($Question->getType() == 'mailer'){
                            if($email !== null) {
                                $mailerTool = new MailerTool(
                                        $this->Settings->getHummessengerApiUrl(),
                                        $this->Settings->getHummessengerApiKey(),
                                        $Answer->getForm()->getMailerListid()
                                );
                                $mailerTool->setEmail($email);
                                if ($firstname != '') {
                                    $mailerTool->setName($firstname);
                                }
                                if ($lastname != '') {
                                    $mailerTool->setSurname($lastname);
                                }
                                $mailerTool->EditToList();
                            }
                        }
                        if($Question->getType() == 'canvas'){
								$random = bin2hex(openssl_random_pseudo_bytes(5));
								$filename = 'canvas-' . $random . '.png';

								$encoded_image = explode(",", $answer)[1];
								$decoded_image = base64_decode($encoded_image);

								$uploadDir = str_replace('/src/Trinity/FormsBundle/Controller' , '/public/uploads/', __DIR__);

								$uploadDir = $uploadDir . 'canvas/';
								if(!file_exists($uploadDir)) {
									mkdir($uploadDir);
								}

								$uploadDir = $uploadDir . date('Ymd') . '/';
								if(!file_exists($uploadDir)) {
									mkdir($uploadDir);
								}

								$dest = $uploadDir . $filename;

								$webDest = preg_replace('/^.*?\/public/', '', $dest);
								if(file_put_contents($dest, $decoded_image) === false)
								{
									// return code was false
								}else {
									$canvas[$Question->getTitle()] = $webUrl . $webDest;
								}
							}
							if(preg_match('/voornaam/', strtolower($Question->getTitle()))){
								$firstname = $answer;
							}
							if(preg_match('/achternaam/', strtolower($Question->getTitle()))){
								$lastname = $answer;
							}

							if($Question->getType() == 'select'){
								foreach($Question->getValues() as $i => $v){
									if($v == $answer){
										if(!empty($Question->getEmail()[$i])){
											// Can send mail?
											$receiverFromAnswer = $v;
										}
									}
								}
							}

							$results[$Question->getTitle()] = $answer;
						}

						$imagesUrls = [];

						$hosturl = $this->generateUrl('homepage', [], \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL);

						if(isset($_POST['imageslist'])) {
							$imageQuestionId = 0;

							foreach($_POST['imageslist'] as $questionid => $answer) {

								$Question = $this->getDoctrine()->getRepository('TrinityFormsBundle:Question')->findOneById($questionid);
								$imageQuestionId = $Question->getId();

								if ($Question->getType() == 'dropzone') {
									$images = explode(',', $answer);

									foreach($images as $imageId) {
                                        /** @var Media $Media */
                                        $Media = $this->getDoctrine()->getRepository('CmsBundle:Media')->find($imageId);

										if ($Media) {
                                            $extentions = explode('.', $Media->getWebPath());
                                            switch (end($extentions)){
                                                case 'doc':
                                                case 'docx':
                                                    $path = 'bundles/cms/images/filetypes/' . $Media->getFileImage();
                                                    break;
                                                case 'xlsx':
                                                    $path = 'bundles/cms/images/filetypes/excel.png';
                                                    break;
                                                case 'pptx':
                                                    $path = 'bundles/cms/images/filetypes/powerpoint.png';
                                                    break;
                                                default:
                                                    if($Media->getFileImage() !== 'png.png' || $Media->getFileImage() !== 'jpg.png'){
                                                        $path = 'bundles/cms/images/filetypes/' . $Media->getFileImage();
                                                    } else {
                                                        $path = $Media->getWebPath();
                                                    }
                                            }
											$imagesUrls[] = '<a class="d-flex justify-content-center" target="_blank" href="' . $hosturl . $Media->getWebPath() . '"><img src="' . $hosturl . $path . '" width="70" height="70"/><br/> klik hier om ' . $Media->getLabel() . ' te downloaden </a>';
										}
									}
								}
							}
							$results[$imageQuestionId] = $imagesUrls;
						}

						$Answer->setIp($_SERVER['REMOTE_ADDR']);
						$Answer->setAnswer(json_encode($results, JSON_FORCE_OBJECT));
						$Answer->setSession($Session);

						$Session->setDateEnd(new \Datetime("now"));
						$Session->setAnswer($Answer);
						$Session->setDone(1);
						$Session->setDuration($Session->getDateEnd()->getTimestamp() - $Session->getDateStart()->getTimestamp());

						if($this->Settings->getLefApiActive()){
							if($this->Settings->getLefFormsRequest()){
								$origin = $_SERVER['HTTP_REFERER'];
								$hostUrl = "https://".$this->Settings->getHost();
								$lef = new \App\CmsBundle\Classes\Lef();

								$apiRequest = $lef->setSettings($this->Settings)
									->setId()
									->setType()
									->setKindOf()
									->setInitType()
									->setDescription($Form->getLabel())
									->setOrigin($hostUrl)
									->setEntityManager($this->getDoctrine())
									->setByForm($_POST['form'][$Form->getId()])
									->addAddress();


								if(!empty($origin)){
									$apiRequest->addPair("Url",$origin);
									$apiRequest->addGroup("Volledige URL");
								}
								$result = $apiRequest->send();
								if(!empty($result)){
									$questions = $this->getDoctrine()->getRepository('TrinityFormsBundle:Question')->findBy(array('form'=> $Form), array('sort' => 'ASC'));
									$error = $result;
									$saved = false;
									$maxFileSize = 10;
									return $this->renderView('@TrinityForms/default/form.html.twig', array(
										'config'           => $config,
										'Form'             => $Form,
										'questions'        => $questions,
										'saved'            => $saved,
										'hide_send'        => !empty($config['hide_send']),
										'error'            => $error,
										'inline_error'     => $inline_error,
										'settings'         => $this->Settings,
										'maxMediaFileSize' => $this->Settings->getMaxMediaSizeInKB(),
										'maxFileSize'      => $maxFileSize,
									));
								}
							}
						}

						/*
							AUTO RESPONSE
						*/
						/*if($Form->getAutoResponse() && $email){
							$Settings = $this->getDoctrine()->getRepository('CmsBundle:Settings')->findOneById(1);

							$body = $this->renderView(
									':emails:notify.html.twig',
									array(
										'label' => $Form->getAutoResponseSubject(),
										'message' => $Form->getAutoResponseText()
									)
								);

							$message = \Swift_Message::newInstance()
							->setSubject($Form->getAutoResponseSubject())
							->setFrom(array($Settings->getSystemEmail() => $Settings->getSystemEmailFrom()))
							->setTo($email)
							->setBody($body, 'text/html')
							->addPart($Form->getAutoResponseText(), 'text/plain');

							$this->get('mailer')->send($message);
						}*/

						/*
							SEND COPY
						*/
						if(!empty($_POST['form'][$Form->getId()])){
							ob_start();
							$this->trans('Het onderstaande formulier is ingevuld via de website:', 'cms')
							?>
							<table style="margin-top: 20px;width: 100%;">
								<?php
								foreach($_POST['form'][$Form->getId()] as $questionid => $value){
									$Question = $this->getDoctrine()->getRepository('TrinityFormsBundle:Question')->findOneById($questionid);

									// we don't want the raw canvas data in the mails, canvas data will get added as a Bijlage
									if($Question->getType() == "canvas")
									{
										continue;
									}

									$valueLabels = $Question->getValues();

									if ($Question->getType() == 'checkbox') {
										if(is_array($value)){
											$value = '<ul><li>' . implode('</li><li>', $value) . '</li></ul>';
										}
									}

									// I don't know why this code is here, probably for checkbox. But so leave it here and fix checkbox above.
									if(is_array($value)){
										$values = [];
										foreach($value as $k => $v){
											$values[] = $valueLabels[$k];
										}
										$value = '<ul><li>' . implode('</li><li>', $values) . '</li></ul>';
									}
									if(preg_match('/\s?\|\s?/', $value)){
										$value = preg_replace('/^(.*?)\s?\|.*?$/', '$1', $value);
									}

									$value = str_replace('&comma;', ',', $value);
									?>
									<tr>
										<td style="padding: 10px 0;width: 40%;vertical-align: top;font-weight: bold;text-align: right;padding-right: 20px;"><?php echo $Question->getTitle(); ?></td>
										<td style="padding: 10px 0;width: 60%;vertical-align: top;"><?php echo nl2br($value); ?></td>
									</tr>
									<?php
								}

							if(!empty($files) || !empty($canvas) || !empty($imagesUrls)){
                                if ($Question->getType() == 'newsletter') {
                                    if(is_array($value)){
                                        $value = '<ul><li>' . implode('</li><li>', $value) . '</li></ul>';
                                    }
                                }
								?>
								<tr>
									<td style="padding: 10px 0;width: 40%;vertical-align: top;font-weight: bold;text-align: right;padding-right: 20px;"><?php $this->trans('Bijlage(n)', 'cms')?></td>
									<td style="padding: 10px 0;width: 60%;vertical-align: top;">
										<?php
										foreach($files as $filename => $path){
											?>
											<a href="<?php echo $path; ?>"><?php echo $filename; ?></a><br />
											<?php   
										}

											foreach($canvas as $title => $path){
												echo $title;
												?>
												<br />
												<img src="<?php echo $path; ?>" style="width: 400px; height: 200px;"><br/>
												<?php
											}

											foreach($imagesUrls as $i) {
												?>
												<?php echo $i; ?><br/><br/>
												<?php
											}
											?>
										</td>
									</tr>
									<?php
								}
								?>
							</table>
							<?php
							$message = ob_get_contents();
							ob_end_clean();

							/*if($this->container->getParameter('kernel.environment') == 'dev'){
								dump($message);die();
							}*/



								//$Settings = $this->getDoctrine()->getRepository('CmsBundle:Settings')->findOneById(1);
							$mails = $Form->getMails();
							foreach($mails as $key => $mail){

								if(!isset($mail['receiver'])){
									// Try to find local mailaddress
									$mail['receiver'] = $email;
								}

								// Remove spaces
								$mail['receiver'] = str_replace(' ', '', $mail['receiver']);
								$mail['receiver'] = explode(';', $mail['receiver']);

								$vals = $_POST['form'][$Form->getId()];

								foreach($mail['receiver'] as $index => $receiver){
									if(empty($receiver)){
										unset($mail['receiver'][$index]);
									}
								}


									$tags = preg_match_all('/\[(\d+)\#.*?\]/', $mail['subject'], $m);
									if($tags){
										foreach($m[1] as $index => $field_id){
											$value = $vals[$field_id];
											if(preg_match('/\s?\|\s?/', $value)){
												$value = preg_replace('/^(.*?)\s?\|.*?$/', '$1', $value);
											}
											$mail['subject'] = str_replace($m[0][$index], $value, $mail['subject']);
										}
									}

								if (isset($mail['sendername'])) {
									$tags = preg_match_all('/\[(\d+)\#.*?\]/', $mail['sendername'], $m);
									if($tags){
										foreach($m[1] as $index => $field_id){
											$value = $vals[$field_id];
											if(preg_match('/\s?\|\s?/', $value)){
												$value = preg_replace('/^(.*?)\s?\|.*?$/', '$1', $value);
											}
											$mail['sendername'] = str_replace($m[0][$index], $value, $mail['sendername']);
										}
									}
								}

								if(!empty($mail['receiver'])){


										if(is_array($mail['receiver'])){
											foreach($mail['receiver'] as $i => $receiver){
												$tags = preg_match_all('/\[(\d+)\#.*?\]/', $receiver, $m);
												if($tags){
													foreach($m[1] as $index => $field_id){

														$receiver = str_replace($m[0][$index], $vals[$field_id], $receiver);

														if(preg_match('/\s?\|\s?/', $receiver)){
															$receiver = preg_replace('/^.*?\s?\|\s?(.*?)$/', '$1', $receiver);
														}
													}
												}

												$mail['receiver'][$i] = $receiver;
											}
										}

									$tags = preg_match_all('/\[(\d+)\#.*?\]/', $mail['content'], $m);
									if($tags){
										foreach($m[1] as $index => $field_id){

												$value = $vals[$field_id];
												if(preg_match('/\s?\|\s?/', $value)){
													$value = preg_replace('/^(.*?)\s?\|.*?$/', '$1', $value);
												}
												$mail['content'] = str_replace($m[0][$index], $value, $mail['content']);
										}
									}

									$mail['content'] = str_replace('[FORM_RESULTS]', $message, $mail['content']);
									
									// $mail['receiver'] = 'jelle@beyonit.nl';

									$mailer = clone $this->mailer;
									$mailer->init();

									// Add optional reply-to
									if ($key == 'internal') {
										if (isset($mail['sendername']) && !empty($mail['sendername'])) {
											if($this->Settings->getTest()){
												$mailer->setFrom(explode(';', $this->Settings->getAdminEmail())[0], $mail['sendername']);
											}else{
												$mailer->setFrom($this->Settings->getSystemEmail(), $mail['sendername']);
											}
										}

										if ($Form->getMailReplyTo() && !empty($email) && !empty($mail['sendername'])) {
											$mailer->setReplyTo([$email => $mail['sendername']]);
										} elseif ($Form->getMailReplyTo() && !empty($email)) {
											$mailer->setReplyTo([$email]);
										}
									}

									$mailer->setSubject($mail['subject'])
											->setTo($mail['receiver'])
											->setTwigBody('/emails/' . $mail['template'], [
												// 'label' => $mail['label'],
												'message' => $mail['content']
											])
											->setPlainBody($mail['content']);

										if(!empty($mail['from_email']) && !empty($mail['from_name'])){
											$mailer->setFrom($mail['from_email'], $mail['from_name']);
										}

									$send = $mailer->execute_forced();
								}
							}

						}

						/**
						 * LEF call
						 */
						if (isset($config['extension_lef']))
						{
							$extensionObject = new \App\Trinity\ExtensionsBundle\Classes\Extensions($this->container, $this->Settings, 'lef');

							$formLabel = $Form->getLabel();
							$extensionObject->setDescriptionSuffix($formLabel);

							// Aftersales formulieren
							$aftersales = [];
							if (preg_match('/renses-online.nl/', $request->server->get('HTTP_HOST')))
							{
								$aftersales[] = 'werkplaats';
								$aftersales[] = 'ruitschade';
								$aftersales[] = 'autoschade';
							}

							if (preg_match('/kreijne.nl/', $request->server->get('HTTP_HOST')))
							{
								$aftersales[] = 'Auto verzekering';
								$aftersales[] = 'werkplaatsafspraak';
							}

							foreach ($aftersales as $as)
							{
								if (strpos(strtolower($formLabel), $as) !== FALSE)
								{
									$extensionObject->setLeadType('AfterSales');
								}
							}

							// FIXME HARDCODED, hoe willen we particulier / zakelijk keuze aanbidden?
							$extensionObject->setRelationType($extensionObject->getRelationType()[0]);

							$foundAccount = false;
							$extrainfo = [];
							foreach($_POST['form'][$Form->getId()] as $questionid => $answer)
							{
								$Question = $this->getDoctrine()->getRepository('TrinityFormsBundle:Question')->findOneById($questionid);

								switch($Question->getTitle())
								{
									case "Vestiging":
								case "Selecteer vestiging":
										$accounts = $extensionObject->getAccounts();
										foreach($accounts as $account)
										{
										$expoded = explode(' ', $answer);

										foreach ($expoded as $item)
										{
											if (strpos($account['label'], $item) !== false)
											{
												$foundAccount = true;
												$extensionObject->setAccount($account['id']);
												$extrainfo['vestiging'] = $answer;
												continue 2;
											}
										}
									}

									if (preg_match('/kreijne.nl/', $request->server->get('HTTP_HOST')))
									{
										$aftersalesquestions = 'werkplaats';

										if (strpos(strtolower($answer), $aftersalesquestions) !== FALSE)
										{
											$extensionObject->setLeadType('AfterSales');
											}
										}
										break;
									case "Aanhef":
										$extensionObject->setNamePrefix($answer);
										break;
									case "Voornaam":
										$extensionObject->setFirstName($answer);
										break;
									case "Voorletters":
										$extensionObject->setNameInitials($answer);
										break;
									case "tussenvoegsel":
										$extensionObject->setMiddleName($answer);
										break;
									case "Naam":
									case "Uw naam":
									case "Achternaam":
									case "Voornaam + Achternaam":
										$extensionObject->setLastName($answer);
										break;
									case "Straat":
									case "Straatnaam + huisnummer":
										$extensionObject->setStreetName($answer);
										break;
									case "Huisnummer":
									case "huisnummer":
										$extensionObject->setHouseNumber($answer);
										break;
								case "Huisnummertoevoeging":
									case "huisnummertoevoeging":
										$extensionObject->setHouseNumberSuffix($answer);
										break;
									case "Postcode":
									case "postcode":
										$extensionObject->setPostcode($answer);
										break;
									case "Plaats":
									case "Stad":
										$extensionObject->setCity($answer);
										break;
									case "Land":
										$extensionObject->setCountry($answer);
										break;
									case "GeboorteDatum":
									case "Geboortedatum":
										$extensionObject->setBirthday($answer);
										break;
									case "Gender":
									case "Sex":
										$extensionObject->setGender($answer);
										break;
									case "Telefoonnummer":
										$extensionObject->addTelephoneNumber($answer);
										break;
									case "Bedrijfsnaam":
										$extensionObject->setCompanyName($answer);
										break;
									case "Bedrijfsnummer":
									case "CompanyNumber":
									case "KvKnummer":
										$extensionObject->setCompanyNumber($answer);
										break;
									case "E-mailadres":
									case "Uw e-mailadres":
									case "E-mail":
										$extensionObject->setEmailAddress($answer);
										break;
									default:
										// Add unknown forms to extrainfo.
										$title = $Question->getTitle();
										$newtitle = $title;

										// Make sure we don't overwrite another key, value pair
										for($i = 0; ; $i++)
										{
											if (array_key_exists($newtitle, $extrainfo))
											{
												$newtitle = $title . ' ' . ($i + 1);
										} else {
												break;
										}
									}

										// Support checkbox questions
										if (is_array($answer))
										{
											$question_value_list = $Question->getValues();
											$temp = 'Opties: ';
											foreach($answer as $key => $a)
											{
												if ($temp != 'Opties: ')
											{
													$temp .= '; ';
											}

												$temp .= '\'' . $question_value_list[$key] . '\'';
											}
											$answer = $temp . ' geselecteerd';
										}

										$extrainfo[$newtitle] = $answer;
										break;
								}
							} // end foreach()

							if (!$foundAccount)
							{
								$accounts = $extensionObject->getAccounts();
								if(count($accounts) >= 1)
								{
									$extensionObject->setAccount($accounts[0]['id']);
								}
							}

							$extensionObject->setAdditionInfoGroup('Overige informatie', $extrainfo);

							$extensionObject->sendContent();
						} // end LEF

						//Active Campaign
						if ($Form->getActiveCampaign() && !empty($Form->getActiveCampaignKey()) && !empty($Form->getActiveCampaignListid())) {
                            $this->addmemberActivecampaign($Form, $results, $email);
					    }

					$em = $this->getDoctrine()->getManager();
					$em->persist($Answer);
					$em->persist($Session);

					if($emaillist && $email && in_array('NewsletterBundle', $this->installed)){
						$List = $this->getDoctrine()->getRepository('TrinityNewsletterBundle:Emaillist')->find($emaillist);
						$Recipient = new \App\Trinity\NewsletterBundle\Entity\Recipient();
						$Recipient->setEmaillist($List);
						$Recipient->setEmail($email);
						$Recipient->setName(implode(' ', [$firstname, $lastname]));

						$em->persist($Recipient);
					}

					$em->flush();

					$saved = true;

						if(isset($config['redirect']) && !empty($config['redirect'])){
							header('Location: ' . $config['redirect']);
							exit;
						}
					}
				}
				else
				{
					$saved = false;
					$inline_error = $this->trans('Ongeldige reCAPTCHA.', 'cms');
				}
			}else{
				$hash = $Form->getId() . '_' . md5(rand(1000,9999) . '' . time());
				$this->get('session')->set('formhash', $hash);

				// if(is_null($Session)){
				$Session = new \App\Trinity\FormsBundle\Entity\Session();
				$Session->setForm($Form);
				$Session->setHash($hash);
				$Session->setIpaddress($_SERVER['REMOTE_ADDR']);
				$Session->setDateStart(new \Datetime("now"));

				$em = $this->getDoctrine()->getManager();
				$em->persist($Session);
				$em->flush();
				// }
			}

			$questions = $this->getDoctrine()->getRepository('TrinityFormsBundle:Question')->findBy(array('form'=> $Form), array('sort' => 'ASC'));

			$maxFileSize = 10;
			try{
				//$maxFileSize = (int)ini_get('upload_max_filesize');
			}catch(\Exception $e){
				// Nothing going on here
			}
			
			$parameters = array(
					'config'           => $config,
					'Form'             => $Form,
					'questions'        => $questions,
					'saved'            => $saved,
					'hide_send'        => !empty($config['hide_send']),
					'error'            => $error,
					'inline_error'     => $inline_error,
					'settings'         => $this->Settings,
					'maxMediaFileSize' => $this->Settings->getMaxMediaSizeInKB(),
					'maxFileSize'      => $maxFileSize,
				);
			
			if(!empty($params["isAjax"]) && $params["isAjax"]){
				return $this->render('@TrinityForms/default/form.html.twig',$parameters);				
			}
			return $this->renderView('@TrinityForms/default/form.html.twig',$parameters);
		}
		return $this->renderView('@TrinityForms/default/not-found.html.twig');
	}

    public function addmemberActivecampaign($Form, $results, $email)
    {

        $ApiKey = $Form->getActiveCampaignKey();
        $ListId = $Form->getActiveCampaignListid();
        $ApiUrl = $Form->getActiveCampaignUrl();


        if (isset($results['Naam'])) {
            $name = $results['Naam'];
        } else {
            $name = explode("@", $email)[0];
        }

        // $Mail = $_POST['email'];
        $curl = curl_init();
        $data = array(
            'contact' => array(
                'email' => $email,
                // 'lastname' => $firstName,
                'firstName' => $name,
                // 'phone' => $_POST['phone']
            )
        );
        curl_setopt_array($curl, array(
            CURLOPT_URL => $ApiUrl . "/api/3/contacts",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "Api-Token: $ApiKey",
                "Content-Type: application/json",
                "Postman-Token: 41fb5406-d0b7-40e3-b168-2645967314b0",
                "cache-control: no-cache"
            )
        ));


        $response = curl_exec($curl);
        $err = curl_error($curl);


        curl_close($curl);


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $ApiUrl . "/api/3/contacts?search=" . $email,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Api-Token: $ApiKey",
                "Content-Type: application/json",
                "Postman-Token: 41fb5406-d0b7-40e3-b168-2645967314b0",
                "cache-control: no-cache"
            )
        ));

        $response1 = curl_exec($curl);
        $err = curl_error($curl);
        $dataID = json_decode($response1, true);
        $ID = $dataID['contacts'][0]["id"];


        curl_close($curl);

        $curl = curl_init();
        $dataList = array(
            'contactList' => array(
                'list' => $ListId,
                'contact' => $ID,
                'status' => 1,
            )
        );

        curl_setopt_array($curl, array(
            CURLOPT_URL => $ApiUrl . "/api/3/contactLists",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($dataList),
            CURLOPT_HTTPHEADER => array(
                "Api-Token: $ApiKey",
                "Content-Type: application/json",
                "Postman-Token: 41fb5406-d0b7-40e3-b168-2645967314b0",
                "cache-control: no-cache"
            )
        ));


        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
    }

	/**
	 * Return link data when required within the link form
	 *
	 * @param  object  Doctrine object
	 *
	 * @return array   Array with config options
	 */
	public function getLinkData($em, $language, $container, $settings){
		$questions = [];
		$forms = $em->getRepository('TrinityFormsBundle:Form')->findBy([ 'language' => $language, 'settings' => $settings ]);
		foreach($forms as $Form){
			$q = $em->getRepository('TrinityFormsBundle:Question')->findBy([ 'form' => $Form ], ['sort' => 'asc']);
			foreach($q as $Question){
				$questions[$Form->getId()][$Question->getId()] = [
					'id' => $Question->getId(),
					'title' => $Question->getTitle(),
					'type' => $Question->getType(),
					'values' => $Question->getValues(),
				];
			}
		}
		return array(
			'forms' => $forms,
			'questions' => $questions,
		);
	}

	/**
	 * Show dashboard blocks
	 *
	 * @return array List of blocks
	 */
	public function dashboardBlocks(){
		$sessions = $this->getDoctrine()->getRepository('TrinityFormsBundle:Session')->findBy(array(
			'done' => 1
		), array(
			'dateStart' => 'desc'
		), 10);

		$responses = '';
		foreach($sessions as $Session){
			$responses .= '<tr>
				<td style="text-align:left;">' . $Session->getForm()->getLabel() . '</td>
				<td style="text-align:center;"><a href="' . $this->generateUrl('admin_mod_forms_answers', array('id' => $Session->getForm()->getId(), 'answerid' => $Session->getAnswer()->getId())) . '">' . $this->time2str($Session->getDateStart()) . '</a></td>
			</tr>';
		}

		return array(
			array(
				'title' => $this->trans('Laatst ingevulde formulieren', 'cms'),
				'class' => '',
				'content' => '<table><tr><th style="text-align:left;">'.$this->trans('Formulier', 'cms').'</th><th style="text-align:center;">'.$this->trans('Datum', 'cms').'</th></tr>' . $responses . '</table>'
			),
		);
	}

	/**
	 * Generate relative date
	 *
	 * @param  mixed $ts Timestamp or \DateTime object
	 *
	 * @return string    Relative date
	 */
	private function time2str($ts) {
		if($ts instanceof \DateTime){
			$ts = $ts->getTimestamp();
		}
		if(!ctype_digit($ts)) {
			$ts = strtotime($ts);
		}
		$diff = time() - $ts;
		if($diff == 0) {
			return 'Nu';
		} elseif($diff > 0) {
			$day_diff = floor($diff / 86400);
			if($day_diff == 0) {
				if($diff < 60) { return $this->trans('Zojuist', 'cms'); }
				if($diff < 120) { return $this->trans('1 minuut geleden', 'cms'); }
				if($diff < 3600) { return floor($diff / 60) . ' ' . $this->trans('minuten geleden', 'cms'); }
				if($diff < 7200) { return $this->trans('1 uur geleden', 'cms'); }
				if($diff < 86400) { return floor($diff / 3600) . ' ' . $this->trans('uren geleden', 'cms'); }
			}
			if($day_diff == 1) { return $this->trans('Gisteren', 'cms'); }
			if($day_diff < 7) { return $day_diff . ' ' . $this->trans('dagen geleden', 'cms'); }
			if($day_diff < 31) { return ceil($day_diff / 7) . ' '. $this->trans('weken geleden', 'cms'); }
			if($day_diff < 60) { return $this->trans('afgelopen maand', 'cms'); }
			return date('F Y', $ts);
		} else {
			$diff = abs($diff);
			$day_diff = floor($diff / 86400);
			if($day_diff == 0) {
				if($diff < 120) { return $this->trans('Binnen een minuut', 'cms'); }
				if($diff < 3600) { return $this->trans('Binnen %time% minuten', 'cms', ['%time%' => floor($diff / 60)]); }
				if($diff < 7200) { return $this->trans('Binnen een uur', 'cms'); }
				if($diff < 86400) { return $this->trans('Binnen %time% uren', 'cms', ['%time%' => floor($diff / 3600)]); }
			}
			if($day_diff == 1) { return $this->trans('Morgen', 'cms'); }
			if($day_diff < 4) { return date('l', $ts); }
			if($day_diff < 7 + (7 - date('w'))) { return $this->trans('Volgende week', 'cms'); }
			if(ceil($day_diff / 7) < 4) { return $this->trans('Binnen %time% weken', 'cms', ['%time%' => ceil($day_diff / 7)]); }
			if(date('n', $ts) == date('n') + 1) { return $this->trans('Volgende week', 'cms'); }
			return date('F Y', $ts);
		}
	}

	/**
	 * Handle uploaded files
	 *
	 * @Route("/trinity/forms/upload", name="trinity_mod_forms_upload")
	 */
	public function uploadAction(Request $request){
		parent::init($request);

		/*if(count($_FILES) != 1 || !is_array($_FILES) || !isset($_FILES['images-' . $id]) || !is_array($_FILES['images-' . $id])) {
			$response = new JsonResponse(['error' => 'File parameter count is not 1, or the parameter is empty', 'json' => $_FILES]);
			$response->setStatusCode(\Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST);
			return $response;
		}*/
		if(!empty($_FILES['file'])){

			$file = $_FILES['file'];

			$uploadedfile = new UploadedFile( $file['tmp_name'], $file['name'], $file['type'], (int)$file['error'] );

			$em = $this->getDoctrine()->getManager();
			$mediadir = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') .  $this->trans('Forms', [], 'forms') . '/' . date('Ymd'), $this->language);

			$mediafile = new \App\CmsBundle\Entity\Media();
			$mediafile->setParent($mediadir);
			$mediafile->setLabel($file['name']);
			$mediafile->setDateAdd();
			$mediafile->setFile($uploadedfile);
			$mediafile->preUpload();
			$mediafile->upload();
			$em->persist($mediafile);
			$em->flush($mediafile);

			return new JsonResponse([
				'status' => true,
				'mediaid' => $mediafile->getId(),
				'webpath' => $mediafile->getWebpath(),
			]);
		}

		return new JsonResponse([
			'status' => false,
			'_FILES' => (!empty($_FILES) ? $_FILES : []),
			'_POST' => (!empty($_POST) ? $_POST : []),
			'error' => 'No file given',
		]);

    }

	public static function resourcesHandler($Settings, array $bundledata, string $projectDir) : ?string
	{
		$resources = null;
		$layoutKey = !empty($Settings->getOverrideKey()) ? trim($Settings->getOverrideKey()) . '/' : '';

		// check if file exists or build array in code and return that.
		$file = __DIR__ . "/../Resources/views/default/resources.json";
		$override = $projectDir . '/public/custom/' . $layoutKey . 'blog/resources.json';

		if (file_exists($override)) {
			$resources = $override;
		} else if (file_exists($file)) {
			$resources = $file;
		}

        return $resources;
    }

}
