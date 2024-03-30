<?php

namespace App\CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MaintenanceController extends StorageController{

    /**
     * @Route("/admin/maintenance/checkmobile", name="admin_maintenance_checkmobile")
     * @Template()
     */
    public function checkmobileAction(Request $request){
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans('Mobiel check', [], 'cms'), 'admin_maintenance_checkmobile');

        return $this->attributes(array(
        ));
    }

    /**
     * @Route("/admin/maintenance/analytics", name="admin_maintenance_analytics")
     * @Template()
     */
    public function analyticsAction(Request $request){
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans('Analyse', [], 'cms'), 'admin_maintenance_analytics');

        return $this->attributes(array(
        ));
    }

    /**
     * @Route("/admin/maintenance/history", name="admin_maintenance_history")
     * @Template()
     */
    public function historyAction(Request $request){
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans('Historie', [], 'cms'), 'admin_maintenance_history');

        return $this->attributes(array(
        ));
    }

    /**
     * @Route("/admin/maintenance/linktest", name="admin_maintenance_linktest")
     * @Template()
     */
    public function linktestAction(Request $request){
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans('Link test', [], 'cms'), 'admin_maintenance_linktest');

        return $this->attributes(array(
        ));
    }

    /**
     * @Route("/admin/maintenance", name="admin_maintenance")
     * @Template()
     */
    public function indexAction(Request $request){
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans('Onderhoud', [], 'cms'), 'admin_maintenance');

        return $this->attributes(array(
        ));
    }
}
