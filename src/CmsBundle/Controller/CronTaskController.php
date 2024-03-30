<?php
namespace App\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\CmsBundle\Entity AS Entity;
use App\CmsBundle\Form\CronTaskType;
use App\CmsBundle\Util\Util;

// Form elements
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

/**
 * Cron Task Controller
 *
 */
class CronTaskController extends StorageController{

    const accessDeniedMessage = 'accessDeniedMessage';
    const globalAccessDenied = 'global.access_denied';
    const masterUnlockBackendHomepage = 'master_unlock_backend_homepage';
    const CmsBundleCronTask = 'CmsBundle:CronTask';
    const session = 'session';
    const translator = 'translator';

    /**
     * @Route("/admin/cron", name="admin_cron")
     * @Template()
     */
    public function indexAction(Request $request) {
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("Cronjobs", [], 'cms'), "admin_cron");

        $em = $this->getDoctrine()->getManager();
        $crontaskStyle = $request->get('crontaskStyle');
        $cronTasks = $em->getRepository(self::CmsBundleCronTask)->findAll();

        foreach($cronTasks as $k => $v){
            if(!$v->naturalString()){
                unset($cronTasks[$k]);
            }
        }

        return $this->attributes(array(
            'cronTasks' => $cronTasks,
            'crontaskStyle' => $crontaskStyle,
        ));
    }

    /**
     * @Route("/admin/cron/edit/{id}", name="admin_cron_edit")
     * @Template()
     */
    public function editAction(Request $request, $id = null) {
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("Cronjobs", [], 'cms'), "admin_cron");
        if($id){
            $this->breadcrumbs->addRouteItem($this->trans("Wijzigen", [], 'cms'), "admin_cron_edit", array('id' => $id));
        }else{
            $this->breadcrumbs->addRouteItem($this->trans("Toevoegen", [], 'cms'), "admin_cron_edit");
        }

        if( (int)$id > 0 ){
            $CronTask = $this->getDoctrine()->getRepository('CmsBundle:CronTask')->find($id);
        }else{
            $CronTask = new \App\CmsBundle\Entity\CronTask();
            $CronTask->setStatusTask(true);
        }

        $CronTask->setLastrun(new \DateTime());

        $form = $this->createFormBuilder($CronTask)
            ->add('name', TextType::class, array('label' => $this->trans('Titel', [], 'cms')))
            ->add('minutes', TextType::class, array('label' => $this->trans('Minuut', [], 'cms')))
            ->add('hours', TextType::class, array('label' => $this->trans('Uur', [], 'cms')))
            ->add('days', TextType::class, array('label' => $this->trans('Dag van de maand', [], 'cms')))
            ->add('months', TextType::class, array('label' => $this->trans('Maand', [], 'cms')))
            // ->add('weeks', TextType::class, array('label' => $this->trans('Weekdag', [], 'cms')))
            ->add('statusTask', CheckboxType::class, array('label' => $this->trans('Actief', [], 'cms'), 'required' => false))
            ->add('single_run', CheckboxType::class, array('label' => $this->trans('Eenmalig', [], 'cms'), 'required' => false))
            ->add('delete_after_run', CheckboxType::class, array('label' => $this->trans('Verwijder na run', [], 'cms'), 'required' => false))
            ->setMethod('post')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            if(!empty($_POST['preset']) && $_POST['preset'] != 'custom'){
                $preset = explode(' ', $_POST['preset']);
                $CronTask->setMinutes($preset[0]);
                $CronTask->setHours($preset[1]);
                $CronTask->setDays($preset[2]);
                $CronTask->setMonths($preset[3]);
                $CronTask->setWeeks($preset[4]);
            }

            $cmd = explode("\n", $_POST['command']);
            foreach($cmd as $i => $v){
                if(empty($v)){
                    unset($cmd[$i]);
                }
            }
            $CronTask->setCommands($cmd);

            $em = $this->getDoctrine()->getManager();
            $em->persist($CronTask);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_cron'));
        }

        return $this->attributes(array(
            'form' => $form->createView(),
            'CronTask' => $CronTask,
            'id' => $id
        ));
    }

    /**
     * @Route("/admin/cron/delete/{id}", name="admin_cron_delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id = null) {
        parent::init($request);

        $CronTask = $this->getDoctrine()->getRepository('CmsBundle:CronTask')->find($id);

        if(!is_null($CronTask)){
            $em = $this->getDoctrine()->getManager();
            $em->remove($CronTask);
            $em->flush();

            $this->addFlash('', '<i class="material-icons left">delete</i>Cronjob is verwijderd.');
        }

        return $this->redirect($this->generateUrl('admin_cron'));
    }

    /**
     * @Route("/admin/cron/singlerun/{id}", name="admin_cron_singlerun")
     * @Template()
     */
    public function singlerunAction(Request $request, $id = null) {
        parent::init($request);

        $CronTask = $this->getDoctrine()->getRepository('CmsBundle:CronTask')->find($id);
        if($CronTask->getSingleRun()){
            $CronTask->setSingleRun(false);
            $this->addFlash('', '<i class="material-icons left">clear</i>Cronjob wordt voor onbepaalde tijd uitgevoerd.');
        }else{
            $CronTask->setSingleRun(true);
            $this->addFlash('', '<i class="material-icons left">check</i>Cronjob wordt éénmalig uitgevoerd.');
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($CronTask);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_cron'));
    }

    /**
     * @Route("/admin/cron/deleteafterrun/{id}", name="admin_cron_delete_after_run")
     * @Template()
     */
    public function deleteafterrunAction(Request $request, $id = null) {
        parent::init($request);

        $CronTask = $this->getDoctrine()->getRepository('CmsBundle:CronTask')->find($id);
        if($CronTask->getDeleteAfterRun()){
            $CronTask->setDeleteAfterRun(false);
            $this->addFlash('', '<i class="material-icons left">clear</i>Cronjob wordt niet meer automatisch verwijderd.');
        }else{
            $CronTask->setDeleteAfterRun(true);
            $this->addFlash('', '<i class="material-icons left">check</i>Cronjob wordt verwijderd na eerstvolgende run.');
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($CronTask);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_cron'));
    }

    /**
     * @Route("/admin/cron/status/{id}", name="admin_cron_status")
     * @Template()
     */
    public function statusAction(Request $request, $id = null) {
        parent::init($request);

        $CronTask = $this->getDoctrine()->getRepository('CmsBundle:CronTask')->find($id);
        if($CronTask->getStatusTask()){
            $CronTask->setStatusTask(false);
            $this->addFlash('', '<i class="material-icons left">clear</i>Cronjob is uitgeschakeld.');
        }else{
            $CronTask->setStatusTask(true);
            $this->addFlash('', '<i class="material-icons left">check</i>Cronjob is ingeschakeld.');
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($CronTask);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_cron'));
    }

    /**
     * @Route("/admin/cron/update", name="admin_cron_update")
     * @Template()
     */
    public function cronTaskUpdateAction(Request $request) {
        parent::init($request);

        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {

            $parameters = $request->request->getIterator()->getArrayCopy();
            $i = 0;
            foreach ($parameters as $form) {
                $prev = $em->getRepository(self::CmsBundleCronTask)->findAll();

                $interval = Util::convertDaysHoursMinutes($form['interval'], $form['range']);
                if (isset($form['statusTask'])) {
                    $statusTask = boolval((int) $form['statusTask']);
                } else {
                    $statusTask = boolval((int) Entity\CronTask::DISABLED);
                }
                $prev[$i]->setInterval($interval);
                $prev[$i]->setStatusTask($statusTask);

                $em->persist($prev[$i]);
                $em->flush();

                $i++;
            }
            $referer = $request->headers->get('referer');
            return $this->redirect($referer);
        }
    }

}
