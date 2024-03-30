<?php

namespace App\CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class MediaController extends StorageController{

    /**
     * @Route("/admin/media/folder/{id}", name="admin_media_folder")
     * @Template()
     */
    public function folderAction(Request $request, $id = null){
        parent::init($request);

        $Mediadir = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->find($id);

        $data = [
            'label'   => $Mediadir->getLabel(),
            'depth'   => ($Mediadir->getDepth() + 1),
            'folders' => $Mediadir->getChildren()->count(),
            'files'   => $Mediadir->getMedia()->count(),
            'parent'  => null,
            'childs'  => [],
        ];

        if(!empty($Mediadir->getParent())){
            $data['parent'] = [
                'id'    => $Mediadir->getParent()->getId(),
                'label' => $Mediadir->getParent()->getLabel(),
                'depth' => ($Mediadir->getParent()->getDepth() + 1),
            ];
        }

        if($Mediadir->getChildren()->count()){
            foreach($Mediadir->getChildren() as $Child){
                if(substr($Child->getLabel(), 0, 1) != '_'){
                    $data['childs'][] = [
                        'id'      => $Child->getId(),
                        'label'   => (!empty($Child->getLabel()) ? $Child->getLabel() : '<em>Onbekend</em>'),
                        'folders' => $Child->getChildren()->count(),
                        'files'   => $Child->getMedia()->count(),
                    ];
                }
            }
        }

        return new JsonResponse($data);
    }

    /**
     * @Route("/admin/media/alter/{id}", name="admin_media_alter")
     * @Template()
     */
    public function alterAction(Request $request, $id = null){
        parent::init($request);

        $Media = $this->getDoctrine()->getRepository('CmsBundle:Media')->findOneById($id);

        $result = array('success' => false);

        if(!empty($_POST['imgsrc'])){
            // Alter media
            if($Media->alter($_POST['imgsrc'])){
                $em = $this->getDoctrine()->getManager();
                $em->persist($Media);
                $em->flush();

                $result['success'] = true;
            }
        }

        $response = new Response(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/admin/media/compress/{id}", name="admin_media_compress")
     * @Template()
     */
    public function compressAction(Request $request, $id = null){
        parent::init($request);

        $Tinify = $this->Settings->getTinifyObject();

        $callbackUrl = null;
        $callbackType = null;

        if(!empty($_GET['callback'])){
            $callbackUrl = urldecode($_GET['callback']);
        }
        if(!empty($_GET['callbackType'])){
            $callbackType = $_GET['callbackType'];
        }

        $Media = $this->getDoctrine()->getRepository('CmsBundle:Media')->findOneById($id);

        $source = $Media->getAbsolutePath();
        $source_size = filesize($source);
        $ext = preg_replace('/^.*?(\.\w+)$/', '$1', $Media->getPath());

        if(!file_exists($Media->getUploadTempDir())){
            mkdir($Media->getUploadTempDir());
        }

        $dest = $Media->getUploadTempDir() . '/tmp_tinified' . $ext;
        $dest_path = '/' . $Media->getUploadDir(true) . '/tmp_tinified' . $ext;

        if(!empty($_GET['save'])){

            $mediaDir = str_replace('src/CmsBundle/Controller', 'public/uploads/images/', __DIR__);

            $Media->setSize(filesize($dest)); // Link UploadedFile to the media entity

            $fs = new Filesystem();
            $fs->copy($dest, $mediaDir.$Media->getPath(), true);

            $em = $this->getDoctrine()->getManager();
            $em->persist($Media);
            $em->flush();

            return $this->attributes([
                'Media'        => $Media,
                'Tinify'       => null,
                'callbackUrl'  => $callbackUrl,
                'callbackType' => $callbackType,
                'dest_path'    => null,
                'saved'        => true,
            ]);
        }else{
            if(!empty($Tinify)){
                $Tinify->compress($source, $dest);
            }
        }

        return $this->attributes([
            'Media'        => $Media,
            'Tinify'       => $Tinify,
            'callbackUrl'  => $callbackUrl,
            'callbackType' => $callbackType,
            'dest_path'    => $dest_path,
            'saved'        => false,
        ]);
    }

    /**
     * @Route("/admin/media/edit/{id}", name="admin_media_edit")
     * @Template()
     */
    public function editAction(Request $request, $id = null){
        parent::init($request);

        $Media = $this->getDoctrine()->getRepository('CmsBundle:Media')->findOneById($id);

        $saved = false;

        if(!empty($_FILES['croppedImage']['tmp_name'])){
            $em = $this->getDoctrine()->getManager();
            $files = $_FILES['croppedImage'];

            $mediaDir = str_replace('src/CmsBundle/Controller', 'public/uploads/images/', __DIR__);

            $filesize = filesize($files['tmp_name']);
            $UploadedFile = new UploadedFile( $files['tmp_name'], $Media->getLabel(), $files['type'], (int)$files['error'], false );

            $is = getimagesize($files['tmp_name']);

            $storedPath = ''.$Media->getPath();

            // Only do this when there is no crop source yet
            $cc = $Media->getRealCropSource();
            if(empty($cc)){
                $originalPath = preg_replace('/(\.[a-zA-Z]+)$/', '-original$1', $Media->getPath());
                $Media->setCropSource($originalPath);

                // Create source clone
                $fs = new Filesystem();
                $fs->copy($mediaDir.$Media->getPath(), $mediaDir.$originalPath, true);
            }

            $Media->setFile($UploadedFile); // Link UploadedFile to the media entity
            $Media->preUpload(true); // Prepare file and path
            $Media->upload(); // Upload actual file

            $Media->setWidth($is[0]);
            $Media->setHeight($is[1]);
            $Media->setSize($filesize);
            $Media->setPath($storedPath); // Ensure the path doesnt change

            $em->persist($Media);
            $em->flush();

            return new JsonResponse([
                'success' => true,
            ]);
        }else{
            if(!empty($_POST)){
                $em = $this->getDoctrine()->getManager();

                $Media->setCropBox($_POST['crop_box']);
                $Media->setCropRatio($_POST['crop_ratio']);
                $Media->setCropFlipX($_POST['crop_flip_x']);
                $Media->setCropFlipY($_POST['crop_flip_y']);
                
                $em->persist($Media);
                $em->flush();

                $saved = true;
            }
        }

        $Tinify = $this->Settings->getTinifyObject();

        return $this->attributes([
            'saved' => $saved,
            'Media' => $Media,
            'Tinify' => $Tinify,
        ]);
    }

    /**
     * @Route("/admin/media/restore/{id}", name="admin_media_restore")
     * @Template()
     */
    public function restoreAction(Request $request, $id = null){
        parent::init($request);

        $Media = $this->getDoctrine()->getRepository('CmsBundle:Media')->findOneById($id);

        if($Media->restore()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($Media);
            $em->flush();
        }
        return new RedirectResponse($this->generateUrl('admin_media_view',array('id' => $Media->getId())));
    }

    /**
     * @Route("/admin/media/history/{id}", name="admin_media_history")
     * @Template()
     */
    public function historyAction(Request $request, $id = null){
        parent::init($request);

        $Media = $this->getDoctrine()->getRepository('CmsBundle:Media')->findOneById($id);

        return $this->attributes(array(
            'Media' => $Media
        ));
    }

    /**
     * @Route("/admin/media/orphaned", name="admin_media_orphaned")
     * @Template()
     */
    public function orphanedAction(Request $request, $id = null){
        parent::init($request);

        $media = $this->getDoctrine()->getRepository('CmsBundle:Media')->findBy(['used' => null, 'type' => 'images']);

        return $this->attributes(array(
            'media' => $media
        ));
    }

    /**
     * @Route("/admin/media/dl/{id}", name="admin_media_download")
     * @Template()
     */
    public function downloadAction(Request $request, $id = null){
        parent::init($request);

        $Media = $this->getDoctrine()->getRepository('CmsBundle:Media')->findOneById($id);

        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header('Content-Disposition: attachment; filename="'.basename($Media->getLabel()).'"');
        readfile($Media->getAbsolutePath());
        exit;
    }

    /**
     * @Route("/admin/media/delete/{id}", name="admin_media_delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id = null){
        parent::init($request);

        // Check permissions
        if(!$this->getUser()->checkPermissions('ALLOW_MEDIA')){
            parent::test_permissions($request, $this->getUser());
            throw $this->createNotFoundException('This feature does not exist.');
        }

        $Media = $this->getDoctrine()->getRepository('CmsBundle:Media')->findOneById($id);

        $Media->removePhysicalFiles();

        $Parent = $Media->getParent();

            // Delete entity after succesful file deletion
            $em = $this->getDoctrine()->getManager();
            $em->remove($Media);
            $em->flush();

        return new RedirectResponse($this->generateUrl('admin_media',array('parentid' => ($Parent ? $Parent->getId() : null))));
    }

    /**
     * @Route("/admin/media/webp/{id}", name="admin_media_webp")
     */
    public function webpAction(Request $request, $id = null){
        parent::init($request);

        $Media = $this->getDoctrine()->getRepository('CmsBundle:Media')->findOneById($id);

        $Media->createWebP($this->Settings, $Media->getPath(), true);
        

        return new RedirectResponse($this->generateUrl('admin_media_view',array('id' => $Media->getId())));
    }

    /**
     * @Route("/admin/media/view/{id}", name="admin_media_view")
     * @Template()
     */
    public function viewAction(Request $request, $id = null){
        parent::init($request);

        // Check permissions
        if(!$this->getUser()->checkPermissions('ALLOW_MEDIA')){
            parent::test_permissions($request, $this->getUser());
            throw $this->createNotFoundException('This feature does not exist.');
        }

        $Tinify = $this->Settings->getTinifyObject();

        $Media = $this->getDoctrine()->getRepository('CmsBundle:Media')->findOneById($id);

        if(!empty($_FILES['croppedImage']['tmp_name'])){
            $em = $this->getDoctrine()->getManager();
            $files = $_FILES['croppedImage'];

            $mediaDir = str_replace('src/CmsBundle/Controller', 'public/uploads/images/', __DIR__);

            $filesize = filesize($files['tmp_name']);
            $UploadedFile = new UploadedFile( $files['tmp_name'], $Media->getLabel(), $files['type'], (int)$files['error'], false );

            $is = getimagesize($files['tmp_name']);

            $storedPath = ''.$Media->getPath();

            // Only do this when there is no crop source yet
            $cc = $Media->getRealCropSource();
            if(empty($cc)){
                $originalPath = preg_replace('/(\.[a-zA-Z]+)$/', '-original$1', $Media->getPath());
                $Media->setCropSource($originalPath);

                // Create source clone
                $fs = new Filesystem();
                $fs->copy($mediaDir.$Media->getPath(), $mediaDir.$originalPath, true);
            }

            $Media->setFile($UploadedFile); // Link UploadedFile to the media entity
            $Media->preUpload(true); // Prepare file and path
            $Media->upload(); // Upload actual file

            $Media->setWidth($is[0]);
            $Media->setHeight($is[1]);
            $Media->setSize($filesize);
            $Media->setPath($storedPath); // Ensure the path doesnt change

            $em->persist($Media);
            $em->flush();

            return new JsonResponse([
                'success' => true,
            ]);
        }

        $this->breadcrumbs->addRouteItem($this->trans('Media', [], 'cms'), 'admin_media', array('parentid' => null));

        if(($Mediadir = $Media->getParent()) != null){
            $mediatree = array($Mediadir);

            // All parent 'Mediadirs'
            while(($Mediadir = $Mediadir->getParent()) != null){
                $mediatree[] = $Mediadir;
            }

            // Show reversed in breadcrumbs
            foreach(array_reverse($mediatree) as $Mediadir){
                $this->breadcrumbs->addRouteItem($Mediadir->getLabel(), 'admin_media', array('parentid' => $Mediadir->getId()));
            }
        }

        $this->breadcrumbs->addRouteItem($Media->getLabel(), 'admin_media_view', array('id' => $Media->getId()));

        if(!empty($_POST)){
            $em = $this->getDoctrine()->getManager();

            $Media->setLabel($_POST['label']);
            $Media->setDescription($_POST['description']);
            $Media->setDescriptionAlt($_POST['description_alt']);
            $Media->setCropBox($_POST['crop_box']);
            $Media->setCropRatio($_POST['crop_ratio']);
            $Media->setCropFlipX($_POST['crop_flip_x']);
            $Media->setCropFlipY($_POST['crop_flip_y']);

            $originalFilename = preg_replace('/^[0-9]+\/[0-9]+_/', '', $Media->getPath());

            if(!empty($_FILES['newMedia']['tmp_name'])){

                $files = $_FILES['newMedia'];
                $filesize = filesize($files['tmp_name']);
                $UploadedFile = new UploadedFile( $files['tmp_name'], $originalFilename, $files['type'], (int)$files['error'], false );

                $is = getimagesize($files['tmp_name']);

                $Media->setFile($UploadedFile); // Link UploadedFile to the media entity
                $Media->preUpload(true); // Prepare file and path
                $Media->upload(); // Upload actual file
                $Media->setSize($filesize);

                $Media->setWidth($is[0]);
                $Media->setHeight($is[1]);

                $em->persist($Media);
            }


            /* $activeTags = array();
            if(!empty($_POST['tags'])){
                foreach($_POST['tags'] as $taglabel){
                    $Tag = $this->getDoctrine()->getRepository('CmsBundle:Tag')->getOrCreateByLabel($taglabel);
                    $activeTags[] = $Tag->getId();
                    if(!$Media->hasTag($Tag)) $Media->addTag($Tag);
                }
            }

            foreach($Media->getTags() as $Tag){
                if(!in_array($Tag->getId(), $activeTags)){
                    $Media->removeTag($Tag);
                }
            } */

            $em->flush();

            $Parent = $Media->getParent();
            return new RedirectResponse($this->generateUrl('admin_media',array('parentid' => ($Parent ? $Parent->getId() : null))));
        }

        $maxMediaFileSize = $this->Settings->getMaxMediaSizeInKB();

        $allowWebP = false; try{ $allowWebP = $this->containerInterface->getParameter('trinity_webp'); }catch(\Exception $e){}

        return $this->attributes(array(
            'Tinify'           => $Tinify,
            'Media'            => $Media,
            'allowWebP'        => $allowWebP,
            'tags'             => $this->getDoctrine()->getRepository('CmsBundle:Tag')->findAll(),
            'maxMediaFileSize' => $maxMediaFileSize,
        ));
    }

    /**
     * @Route("/admin/media/add/folder/{parentid}", name="admin_media_addfolder")
     * @Template()
     */
    public function addfolderAction(Request $request, $parentid = null){
        parent::init($request);

        $Album = new \App\CmsBundle\Entity\Mediadir();

        if(!empty($parentid)){
            $Parent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findOneById($parentid);
        }

        if(!empty($_POST)){
            $em = $this->getDoctrine()->getManager();

            // Set data
            $Album->setLabel( (!empty($_POST['label']) ? $_POST['label'] : 'Nieuwe map') );
            $Album->setDateAdd();

            if(isset($Parent)){
                $Album->setParent($Parent);
            }

            $em->persist($Album);

            /*$activeTags = array();
            if(!empty($_POST['tags'])){
                foreach($_POST['tags'] as $taglabel){
                    $Tag = $this->getDoctrine()->getRepository('CmsBundle:Tag')->getOrCreateByLabel($taglabel);
                    $activeTags[] = $Tag->getId();
                    if(!$Album->hasTag($Tag)) $Album->addTag($Tag);
                }
            }

            foreach($Album->getTags() as $Tag){
                if(!in_array($Tag->getId(), $activeTags)){
                    $Album->removeTag($Tag);
                }
            }*/

            $em->flush();

            // Get results via AJAX
            if($request->isXmlHttpRequest()){
                return new JsonResponse([
                    'success' => true,
                    'label' => $Album->getLabel(),
                    'id' => $Album->getId()
                ]);
            }

            return array('saved' => true, 'Album' => $Album);
        }

        return $this->attributes(array(
            'Album' => $Album,
            'tags'  => $this->getDoctrine()->getRepository('CmsBundle:Tag')->findAll(),
        ));
    }

    /**
     * @Route("/admin/media/move/{source}/{destination}/{type}", name="admin_media_move")
     * @Template()
     */
    public function moveAction(Request $request, $source = null, $destination = null, $type = null){

        $em = $this->getDoctrine()->getManager();
        $Destination = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->find($destination);
        if($type == 'folder'){
            $Mediadir = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->find($source);
            $label = $Mediadir->getLabel();

            $Mediadir->setParent($Destination);
            $em->persist($Mediadir);
        }else{
            $Media = $this->getDoctrine()->getRepository('CmsBundle:Media')->find($source);
            $label = $Media->getLabel();
            $Media->setParent($Destination);
            $em->persist($Media);
        }

        $em->flush();

        return new JsonResponse([
            'success' => true,
            'label' => $label
        ]);
    }

    /**
     * @Route("/admin/media/popup/{parentid}", name="admin_media_popup")
     * @Template()
     */
    public function popupAction(Request $request, $parentid = null){
        parent::init($request);

        $gString = '';
        foreach($_GET as $k => $v) $gString .= ($gString == '' ? '?' : '&') . $k . '=' . $v;

        $asset_crumbs = [];

        $this->breadcrumbs->addRouteItem($this->trans('Media', [], 'cms'), 'admin_media_popup', ['parentid' => null]);
        $asset_crumbs[$this->generateUrl('admin_media_popup', ['parentid' => null]) . $gString] = 'Media';

        $mediaDirId = null;
        $Mediadir = null;
        if($parentid){
            $Mediadir = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->find($parentid);
            $mediaDirId = $Mediadir->getId();

            $Parent = $Mediadir;
            $crumbs = [];
            while($Parent->getParent() != null){
                $Parent = $Parent->getParent();
                $crumbs[] = $Parent;
            }

            $crumbs = array_reverse($crumbs);
            foreach($crumbs as $Crumb){

                $asset_crumbs[$this->generateUrl('admin_media_popup', ['parentid' => $Crumb->getId()]) . $gString] = $Crumb->getLabel();

                $this->breadcrumbs->addRouteItem($Crumb->getLabel(), 'admin_media_popup', ['parentid' => $Crumb->getId()]);
            }

            $asset_crumbs[$this->generateUrl('admin_media_popup', ['parentid' => $parentid]) . $gString] = $Mediadir->getLabel();
            $this->breadcrumbs->addRouteItem($Mediadir->getLabel(), 'admin_media_popup', ['parentid' => $parentid]);
        }

        $maxFileSize = 10;
        try{
            $maxFileSize = (int)ini_get('upload_max_filesize');
        }catch(\Exception $e){
            // Nothing going on here
        }

        $maxMediaFileSize = $this->Settings->getMaxMediaSizeInKB();

        $folders = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findByParent($parentid);
        $files = $this->getDoctrine()->getRepository('CmsBundle:Media')->findByParent($parentid);

        return $this->attributes(array(
            'folders'      => $folders,
            'files'        => $files,
            'mediaDirId'   => $mediaDirId,
            'Mediadir'     => $Mediadir,
            'asset_crumbs' => $asset_crumbs,
            'gString'      => $gString,
            'maxFileSize'  => $maxFileSize,
            'maxMediaFileSize' => $maxMediaFileSize,
        ));
    }

    public function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
         $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    /**
     * @Route("/admin/media/{parentid}/{type}/{inline}/{composer}", name="admin_media")
     * @Template()
     */
    public function indexAction(Request $request, $parentid = 0, $type = null, $inline = false, $composer = false){
        parent::init($request);

        // Check permissions
        if(!$this->getUser()->checkPermissions('ALLOW_MEDIA')){
            parent::test_permissions($request, $this->getUser());
            throw $this->createNotFoundException('This feature does not exist.');
        }

        $gString = '';
        foreach($_GET as $k => $v){
            if($k != 'inline'){
                $gString .= ($gString == '' ? '?' : '&') . $k . '=' . $v;
            }
        }

        $availableSettings = [];
        if($this->getUser()->getSites()->count()){
            $availableSettings = $this->getUser()->getSites()->toArray();
        }else{
            $availableSettings = $this->getDoctrine()->getRepository('CmsBundle:Settings')->findAll();
        }

        /*if($this->Settings->getParent()){
            // Is child
            $availableSettings[] = $this->Settings->getParent();
            foreach($this->getDoctrine()->getRepository('CmsBundle:Settings')->findBy(['parent' => $this->Settings->getParent()]) as $S){
                $availableSettings[] = $S;
            }
        }else{
            // Is base
            $availableSettings[] = $this->Settings;
            foreach($this->getDoctrine()->getRepository('CmsBundle:Settings')->findBy(['parent' => $this->Settings]) as $S){
                $availableSettings[] = $S;
            }
        }*/

        $selectedSegment = 'tile';
        if(!empty($_COOKIE['t-media-segment'])){
            $selectedSegment = $_COOKIE['t-media-segment'];
        }

        $asset_crumbs = [];

        $this->breadcrumbs->addRouteItem($this->trans('Media', [], 'cms'), 'admin_media', ['parentid' => null]);
        $asset_crumbs[$this->generateUrl('admin_media', ['parentid' => null]) . $gString] = 'Media';

        $mediaDirId = null;
        $Mediadir = null;
        if(!empty($parentid)){
            $Mediadir = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->find($parentid);
            $mediaDirId = $Mediadir->getId();

            $Parent = $Mediadir;
            $crumbs = [];
            while($Parent->getParent() != null){
                $Parent = $Parent->getParent();
                $crumbs[] = $Parent;
            }

            $crumbs = array_reverse($crumbs);
            foreach($crumbs as $Crumb){

                $asset_crumbs[$this->generateUrl('admin_media', ['parentid' => $Crumb->getId()]) . $gString] = $Crumb->getLabel();

                $this->breadcrumbs->addRouteItem($Crumb->getLabel(), 'admin_media', ['parentid' => $Crumb->getId()]);
            }

            $asset_crumbs[$this->generateUrl('admin_media', ['parentid' => $parentid]) . $gString] = $Mediadir->getLabel();
            $this->breadcrumbs->addRouteItem($Mediadir->getLabel(), 'admin_media', ['parentid' => $parentid]);
        }

        // Upload requested
        if(!empty($_FILES['media'])){
            $result = $this->uploadHandler((int)$_POST['mediadirid'], $_FILES['media']);
            if(!isset($_POST['manual_upload'])){
                // create a JSON-response with a 200 status code
                $response = new Response(json_encode($result));
                $response->headers->set('Content-Type', 'application/json');

                return $response;
            }else{
                return $this->redirectToRoute('admin_media', array('parentid' => (int)$_POST['mediadirid']));
            }
        }else if(!empty($_FILES['upload'])){
            $result = $this->uploadHandler(0, $_FILES['upload']);
            return new JsonResponse([
                'uploaded' => 1,
                'fileName' => $result->getLabel(),
                'url'      => '/' . $result->getWebPath(),
            ]);
        }

        // Get results via AJAX
        if(($request->isXmlHttpRequest() || !empty($_GET['ajax'])) && empty($_GET['callback']) && !$inline) {
            $folders = [];
            $folders_raw = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findBy(['parent' => (!empty($parentid) ? $parentid : null), 'settings' => $availableSettings], ['label' => 'asc']);

            $depth = 0;
            if($Mediadir){
                $depth = $Mediadir->getDepth();
            }

            $checkAllowed = [];
            $as = $this->getDoctrine()->getRepository('CmsBundle:Settings')->count([]);
            if($as > 1){
                if($this->getUser()->getSites()->count() > 0 && $depth == 0){
                    foreach($this->getUser()->getSites() as $Site){
                        if($Site->getHost() != 'null'){
                            $checkAllowed[] = $Site->getHost() . ' (' . strtoupper($Site->getLanguage()->getLocale()) . ')';
                            $checkAllowed[] = $Site->getHost();
                        }
                    }
                }
            }
            foreach($folders_raw as $folder){
                if(substr($folder->getLabelRaw(), 0, 1) == '_' || (!empty($checkAllowed) && !in_array($folder->getLabelRaw(), $checkAllowed))){
                    continue;
                }
                $folders[] = [
                    'id'           => $folder->getId(),
                    'label'        => $folder->getLabel(),
                    'date_add'     => $folder->getDateAdd(),
                    'date_edit'    => $folder->getDateEdit(),
                    'has_children' => !empty($folder->getChildren()->count()),
                    'has_media'    => !empty($folder->getMedia()->count()),
                    'url_delete'   => $this->generateUrl('admin_mediadir_delete', ['id' => $folder->getId()]),
                ];
            }

            $order = [];
            if(!empty($_GET['sort'])){
                $order_raw = explode('_', $_GET['sort']);
                if(count($order_raw) == 2){
                    $order = [$order_raw[0] => $order_raw[1]];
                }
            }

            $files = [];
            $files_sort = [];
            $files_raw = $this->getDoctrine()->getRepository('CmsBundle:Media')->findBy(['parent' => (!empty($parentid) ? $parentid : null)], $order);
            foreach($files_raw as $Media){


                                                    
                $img_ext = '<span class="img_ext">
                    <span class="' . $Media->getExtension() . '">' . $Media->getExtension() . '</span>
                    ' . ($Media->hasWebp() ? '<span class="webp">webp</span>' : '') . '
                </span>';

                $f = [
                    'id'          => $Media->getId(),
                    'label'       => $Media->getLabel(),
                    'date_simple' => (!empty($Media->getDateAdd()) ? $Media->getDateAdd()->format('d-m-Y H:i:s') : ''),
                    'size'        => $Media->getSize(),
                    'thumb'       => '/' . $Media->getWebPath('small'),
                    'path'        => '/' . $Media->getWebPath(),
                    'url'         => ($Media->getRemoteUrl() ? 'https:/' . $Media->getWebPath() : $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath() . '/' . $Media->getWebPath()),
                    'type'        => $Media->getType(),
                    'mime'        => $Media->getMime(),
                    'file_image'  => $Media->getFileImage(),
                    'size_format' => $this->formatBytes($Media->getSize()),
                    'cropped'     => ($Media->getRealCropSource() != null),
                    'width'       => $Media->getWidth(),
                    'height'      => $Media->getHeight(),
                    'description' => $Media->getDescription(),
                    'date_add'    => $Media->getDateAdd(),
                    'date_edit'   => $Media->getDateEdit(),
                    'url_view'    => $this->generateUrl('admin_media_view', ['id' => $Media->getId()]),
                    'url_delete'  => $this->generateUrl('admin_media_delete', ['id' => $Media->getId()]),
                    'img_ext'     => $img_ext,
                ];
                $files[] = $f;

                if(!isset($files_sort[$Media->getType()])) $files_sort[$Media->getType()] = [];
                $files_sort[$Media->getType()][] = $f;
            }

            // When the root folder is requested, it doesn't have Mediadir parent.
            if (!empty($Mediadir)) {
                $jsonMediadir = [
                        'id'           => $Mediadir->getId(),
                        'label'        => $Mediadir->getLabel(),
                        'date_add'     => $Mediadir->getDateAdd(),
                        'date_edit'    => $Mediadir->getDateEdit(),
                        'has_children' => !empty($Mediadir->getChildren()->count()),
                    ];
            } else {
                $jsonMediadir = null;
            }

            $parent = null;
            if(!empty($Mediadir)){
                if($Mediadir->getParent()){
                    $parent = [
                        'id' => $Mediadir->getParent()->getId(),
                        'label' => $Mediadir->getParent()->getLabel(),
                    ];
                }else{
                    $parent = [
                        'id' => 0,
                        'label' => 'Root',
                    ];
                }
            }

            return new JsonResponse(array(
                'folders'           => $folders,
                'files'             => $files,
                'files_sort'        => $files_sort,
                'mediaDirId'        => $mediaDirId,
                'depth'             => $depth,
                'parent'            => $parent,
                'availableSettings' => $availableSettings,
                'Mediadir'          => $jsonMediadir,
                'crumbs'            => (!empty($Mediadir) ? $Mediadir->getBreadcrumbs() : ''),
            ));
        }

        $maxFileSize = 10;
        try{
            $maxFileSize = (int)ini_get('upload_max_filesize');
        }catch(\Exception $e){
            // Nothing going on here
        }

        $isModal = false;
        if(isset($_GET['CKEditor'])){
            $isModal = true;
        }

        $depth = 0;
        if($Mediadir){
            $depth = $Mediadir->getDepth();
        }

        $checkAllowed = [];
        $as = $this->getDoctrine()->getRepository('CmsBundle:Settings')->count([]);
        if($as > 1){
            if($this->getUser()->getSites()->count() > 0 && $depth == 0){
                foreach($this->getUser()->getSites() as $Site){
                    if($Site->getHost() != 'null'){
                        $checkAllowed[] = $Site->getHost() . ' (' . strtoupper($Site->getLanguage()->getLocale()) . ')';
                        $checkAllowed[] = $Site->getHost();
                    }
                }
            }
        }

        $folders = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findBy(['parent' => $Mediadir, 'settings' => $availableSettings], ['label' => 'asc']);
        $folders_root = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findBy(['parent' => null, 'settings' => $availableSettings], ['label' => 'asc']);
        /* foreach($folders as $i => $F){
            if(substr($F->getLabelRaw(), 0, 1) == '_' || (!empty($checkAllowed) && !in_array($F->getLabelRaw(), $checkAllowed))){
                unset($folders[$i]);
            }
        }

        foreach($folders_root as $i => $F){
            if(substr($F->getLabelRaw(), 0, 1) == '_' || (!empty($checkAllowed) && !in_array($F->getLabelRaw(), $checkAllowed))){
                unset($folders_root[$i]);
            }
        } */

        $files = $this->getDoctrine()->getRepository('CmsBundle:Media')->findBy(['parent' => (!empty($parentid) ? $parentid : null)], ['id' => 'desc']);

        $maxMediaFileSize = $this->Settings->getMaxMediaSizeInKB();

        $Media = null;
        if(!empty($_GET['relatedMedia']) && !empty($_GET['inlineedit'])){
            $Media = $this->getDoctrine()->getRepository('CmsBundle:Media')->find($_GET['relatedMedia']);
        }

        return $this->attributes(array(
            'baseurl'           => $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath(),
            'folders'           => $folders,
            'folders_root'      => $folders_root,
            'files'             => $files,
            'Media'             => $Media,
            'mediaDirId'        => $mediaDirId,
            'Mediadir'          => $Mediadir,
            'isModal'           => $isModal,
            'asset_crumbs'      => $asset_crumbs,
            'gString'           => $gString,
            'inline'            => $inline,
            'availableSettings' => $availableSettings,
            'composer'          => $composer,
            'maxFileSize'       => $maxFileSize,
            'selectedSegment'   => $selectedSegment,
            'maxMediaFileSize'  => $maxMediaFileSize,
            'crumbs'            => (!empty($Mediadir) ? $Mediadir->getBreadcrumbs() : ''),
        ));
    }

    /**
     * Upload file
     *
     * @param  integer $parentid Parent ID
     * @param  array   $files    List of files
     *
     * @return array
     */
    public function uploadHandler($parentid, $files){
        $return = array();

        $em = $this->getDoctrine()->getManager();

        if(!is_array($files['name'])){
            $filesize = filesize($files['tmp_name']);
            // Create UploadedFile-object
            $UploadedFile = new UploadedFile( $files['tmp_name'], $files['name'], $files['type'], (int)$files['error'], true );

            $Parent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findOneById($parentid);

            $Media = new \App\CmsBundle\Entity\Media();
            $Media->setParent($Parent);
            $Media->setLabel($files['name']);
            $Media->setDateAdd();
            $Media->setFile($UploadedFile); // Link UploadedFile to the media entity
            $Media->preUpload(); // Prepare file and path
            $Media->upload(); // Upload actual file
            $Media->setSize($filesize);

            $em->persist($Media);

            $return = $Media;
        }else{
            foreach($files['name'] as $index => $filename){
                $filesize = filesize($files['tmp_name'][$index]);

                // Create UploadedFile-object
                $UploadedFile = new UploadedFile( $files['tmp_name'][$index], $filename, $files['type'][$index], (int)$files['error'][$index], true );

                $Parent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findOneById($parentid);

                $Media = new \App\CmsBundle\Entity\Media();
                $Media->setParent($Parent);
                $Media->setLabel($filename);
                $Media->setDateAdd();
                $Media->setFile($UploadedFile); // Link UploadedFile to the media entity
                $Media->preUpload(); // Prepare file and path
                $Media->upload(); // Upload actual file
                $Media->setSize($filesize);

                $em->persist($Media);

                $return[] = $Media;
            }
        }

        $em->flush();

        return $return;
    }

    /**
     * @Route("/admin/mediadir/delete/{id}", name="admin_mediadir_delete")
     * @Template()
     */
    public function deleteMediaDirAction(Request $request, $id = null){
        parent::init($request);

        // Check permissions
        if(!$this->getUser()->checkPermissions('ALLOW_MEDIA')){
            parent::test_permissions($request, $this->getUser());
            throw $this->createNotFoundException('This feature does not exist.');
        }

        $MediaDir = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findOneById($id);

        if (!empty($MediaDir) && $MediaDir->countAll() == 0)
        {
            $Parent = $MediaDir->getParent();

            // Delete entity after succesful file deletion
            $em = $this->getDoctrine()->getManager();
            $em->remove($MediaDir);
            $em->flush();
        }

        if($request->isXmlHttpRequest()){
            return new JsonResponse([
                'success' => true,
            ]);
        }

        return new RedirectResponse($this->generateUrl('admin_media',array('parentid' => ($Parent ? $Parent->getId() : null))));
    }
}
