<?php
namespace App\CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MonitorController extends StorageController
{

    /**
     * @Route("/admin/monitor", name="admin_monitor")
     * @Template()
     */
    public function indexAction(Request $request){
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans('Uptime monitor', [], 'cms'), 'admin_monitor');

        $em = $this->getDoctrine()->getManager();
        $clients = $em->getRepository('CmsBundle:Clientdomain')->findBy([], ['id' => 'desc']);
        $enabled = count($em->getRepository('CmsBundle:Clientdomain')->findByMonitor(true));
        $up = count($em->getRepository('CmsBundle:Clientdomain')->findByStatus('up'));
        $down = count($em->getRepository('CmsBundle:Clientdomain')->findByStatus('down'));
        
        return $this->attributes([
            'clients' => $clients,
            'enabled' => $enabled,
            'up' => $up,
        	'down' => $down,
        ]);
    }

}