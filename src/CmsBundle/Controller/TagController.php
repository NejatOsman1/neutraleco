<?php
namespace App\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TagController extends StorageController{

    /**
     * @Route("/admin/tag", name="admin_tag")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("Tags", [], 'cms'), "admin_tag");

        return $this->attributes(array(
            //
        ));
    }

    /**
     * @Route("/admin/tag/{tag}", name="admin_tag_view")
     * @Template()
     */
    public function viewAction(Request $request, $tag = null)
    {
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("Tags", [], 'cms'), "admin_tag");
        $this->breadcrumbs->addRouteItem($tag, "admin_tag_view");

        $Tag = $this->getDoctrine()->getRepository('CmsBundle:Tag')->findOneByLabel($tag);

        return $this->attributes(array(
            'Tag' => $Tag,
            'result_mediadir' => $Tag->getMediadirs(),
            'result_media' => $Tag->getMedia()
        ));
    }

}
