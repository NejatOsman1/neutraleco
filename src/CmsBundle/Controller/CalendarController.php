<?php

namespace App\CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CalendarController extends StorageController{

    /**
     * @Route("/admin/calendar/event/{id}", name="admin_calendar_event")
     * @Template()
     */
    public function eventAction(Request $request, $id = null)
    {
        $Event = $this->getDoctrine()->getRepository('CmsBundle:Event')->find($id);

        return new JsonResponse([
            'id'       => $Event->getId(),
            'label'       => $Event->getLabel(),
            'url'       => $Event->getUrl(),
            'description' => $Event->getDescription(),
            'start'       => $Event->getStart()->format('Y-m-d H:i:s'),
            'end'         => $Event->getEnd()->format('Y-m-d H:i:s'),
        ]);
    }

    /**
     * @Route("/admin/calendar/update", name="admin_calendar_update")
     * @Template()
     */
    public function updateEventAction(Request $request)
    {
        $data = [
            'message' => '',
            'status' => '',
        ];

        if(!empty($_POST)){
            if(!empty($_POST['title'])){

                $start = new \DateTime($_POST['time_start']);
                $end   = new \DateTime($_POST['time_end']);

                if(!empty($_POST['id'])){
                    $Event = $this->getDoctrine()->getRepository('CmsBundle:Event')->find($_POST['id']);
                }else{
                    $Event = new \App\CmsBundle\Entity\Event();
                }

                $Event->setLabel($_POST['title']);
                $Event->setUrl($_POST['url']);
                $Event->setDescription($_POST['description']);
                $Event->setStart($start);
                $Event->setEnd($end);

                $em = $this->getDoctrine()->getManager();
                $em->persist($Event);
                $em->flush();

                $data['message'] = '';
                $data['status'] = 200;
            }else{
                $data['message'] = 'Missing title';
                $data['status'] = 400;
            }
        }

        return new JsonResponse($data);
    }

    /**
     * @Route("/admin/calendar/delete/{id}", name="admin_calendar_delete")
     * @Template()
     */
    public function deleteEventAction(Request $request, $id = null)
    {

        $Event = $this->getDoctrine()->getRepository('CmsBundle:Event')->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($Event);
        $em->flush();


        return new JsonResponse([
            'message' => '',
            'status' => 200,
        ]);
    }

    /**
     * @Route("/admin/calendar/{type}", name="admin_calendar")
     * @Template()
     */
    public function indexAction(Request $request, $type = null){
        parent::init($request);

        $types = array(
            'day'       => 'Vandaag',
            'yesterday' => 'Gisteren',
            'week'      => 'Deze week',
            'month'     => 'Deze maand',
        );

        $this->breadcrumbs->addRouteItem($this->trans('Kalender', [], 'cms'), 'admin_calendar', array('type' => null));
        if($type != null && isset($types[$type])){
            $this->breadcrumbs->addRouteItem($types[$type], 'admin_calendar', array('type' => $type));
        }

        $course_urls = [];
        $course_dates = [];
        if(in_array('CoursesBundle', $this->installed)){
        	$course_dates = $this->getDoctrine()->getRepository('TrinityCoursesBundle:CourseDate')->findAll();
            foreach($course_dates as $d){
                $course_urls[$d->getCourse()->getId()] = $this->generateUrl('admin_mod_courses_edit', ['id' => $d->getCourse()->getId()]);
            }
        }

        return $this->attributes([
            'events' => $this->getDoctrine()->getRepository('CmsBundle:Event')->findAll(),
            'course_urls' => $course_urls,
            'course_dates' => $course_dates,
        ]);
    }
}
