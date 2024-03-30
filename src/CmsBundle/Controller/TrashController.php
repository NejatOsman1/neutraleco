<?php

namespace App\CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TrashController extends StorageController{

    /**
     * @Route("/admin/trash", name="admin_trash")
     * @Template()
     */
    public function indexAction(Request $request){
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans('Prullenbak', [], 'cms'), 'admin_trash');

        return $this->attributes(array(
        ));
    }
}
