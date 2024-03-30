<?php

namespace App\Trinity\BlogBundle\Controller;

use App\CmsBundle\Controller\StorageController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use App\CmsBundle\Entity\Log;
use App\CmsBundle\Util\Mailer;
use App\CmsBundle\Classes\Openai;
use Twig\Environment;

class EntryController extends StorageController
{

    private $CurrentBlog = null;

    /**
     * @Route("/admin/blog/entry/selector", name="admin_mod_blog_selector")
     * @Template()
     */
    public function selectorAction(Request $request)
    {
        parent::init($request);

        $blogs = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->findBy(['language' => $this->language]);

        $entries = new \Doctrine\Common\Collections\ArrayCollection();
        foreach($blogs as $blog)
        {
            foreach($blog->getEntries() as $entry)
            {
                $entries->add($entry);
            }
        }

        $page = null;
        $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('TrinityBlogBundle', 'is_overview');
        if(empty($blocks)){
            // Fallback
            $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('QinoxBlogBundle', 'is_overview');
        }
        foreach($blocks as $Block){
            $p = $Block->getWrapper()->getPage();
            if($p->getLanguage() == $this->language){
                $page = $p;
                break;
            }
        }

        if($page == null){
            $page = $this->getDoctrine()->getRepository('CmsBundle:Page')->find(1);
        }

        return $this->attributes([
            'page' => $page,
            'entries' => $entries,
        ]);
    }

    /**
     * @Route("/admin/blog/entry/filter/{blogid}/{page}", name="admin_mod_blog_entry_filter", requirements={"blogid": "\d+", "page": "\d+"})
     * @Template()
     */
    public function filterAction(Request $request, $blogid, $page = 1)
    {
        parent::init($request);




        /*
        {% if page %}
            {% set detailUrl = path(page.slugKey) ~ '/' ~ Entry.id ~ '/' ~ Entry.getDefaultSlug %}
            {% if Entry.slug is not empty and Entry.slug != '/' %}
                {% set detailUrl = path(page.slugKey) ~ '/' ~ Entry.getSlug %}
            {% endif %}
            {% set detailUrl = '<a target="_blank" href="' ~ detailUrl ~ '">' ~ detailUrl ~ '</a>' %}
        {% else %}
            {% set detailUrl = '<span class="red-text">' ~ ('Er is geen overzichts pagina gekoppeld' | trans)  ~ '</span>' %}
        {% endif %}
         */


        $em = $this->getDoctrine()->getManager();

        $link_page = null;
        $cblock = null;
        $blocks = $em->getRepository('CmsBundle:PageBlock')->findByData('TrinityBlogBundle', 'is_overview', '"id":"' . $blogid . '"');
        if(empty($blocks)){
            // Fallback
            $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('QinoxBlogBundle', 'is_overview');
        }
        foreach($blocks as $Block){
            $p = $Block->getWrapper()->getPage();
            if($p->getLanguage() == $this->language){
                $cblock = $Block;
                $link_page = $p;
                break;
            }
        }




        $filter = $request->get('filter');
        if(!empty($filter['q'])){
            $filter['q'] = explode(' ', $filter['q']);
        }
        $offset = 0;
        $limit  = (int)(!empty($_GET['pp']) ? $_GET['pp'] : 20);

        $count = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->filter($blogid, true, $offset, $limit, $filter);

        $pages = ceil($count / $limit);
        if($pages == 0) $pages = 1;
        if($page > $pages){ $page = $pages; }
        if($pages < 1){ $pages = 1; }
        $offset = (($page * $limit) - $limit);

        $results = [];
        $dql_results = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->filter($blogid, false, $offset, $limit, $filter);
        foreach($dql_results as $Entry){
            if($Entry->getIsExternal()){
                if(!empty($Entry->getExternalUrl())){
                    $detailUrl = $Entry->getExternalUrl() . ' <i class="fas fa-link"></i>';
                } else {
                    $detailUrl = null;
                }
            } else {
                if($link_page){
                    $detailUrl = $this->generateUrl($link_page->getSlugKey()) . '/' . $Entry->getId() . '/' . $Entry->getDefaultSlug();
                    if(!empty($Entry->getSlug()) && $Entry->getSlug() != '/'){
                        $detailUrl = $this->generateUrl($link_page->getSlugKey()) . '/' . $Entry->getSlug();
                    }
                    $detailUrl = $detailUrl;
                }else{
                    $detailUrl = null;
                }    
            }

            // Category list
            $catLabels = [];
            foreach($Entry->getCategory() as $Cat){
                $catLabels[] = $Cat->getCategory();
            }

            $results[] = [
                'id'      => $Entry->getId(),
                'label'   => htmlspecialchars($Entry->getLabel()),
                'datum'   => $Entry->getDatePublish() ? $Entry->getDatePublish()->format('d M Y H:i') : $this->trans('onbekend', 'cms'),
                'datum_eind'   => $Entry->getDatePublishEnd() ? $Entry->getDatePublishEnd()->format('d M Y H:i') : '',
                'concept' => $Entry->getConcept(),
                'is_external' => $Entry->getIsExternal(),
                'replies' => $Entry->getReplies()->count(),
                'read'    => $Entry->getReadCount(),
                'url'     => $detailUrl,
                'cat'     => $catLabels,
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
     * @Route("/admin/blog/entry/replies/delete/{id}", name="admin_mod_blog_entry_replies_delete")
     */
    public function deleteReplyAction(Request $request, $id = null)
    {
        parent::init($request);

        $Reply = $this->getDoctrine()->getRepository('TrinityBlogBundle:Reply')->find($id);

        $blog_id = $Reply->getEntry()->getBlog()->getId();
        $entry_id = $Reply->getEntry()->getId();

        $em = $this->getDoctrine()->getManager();
        $em->remove($Reply);
        $em->flush();

        if(!empty($_GET['dst'])){
            if($_GET['dst'] == 'index'){
                return $this->redirect($this->generateUrl('admin_mod_blog_entry', ['id' => $blog_id]) . '#recent');
            }
        }

        return $this->redirect($this->generateUrl('admin_mod_blog_entry_replies', ['id' => $entry_id]));
    }

    /**
     * @Route("/admin/blog/entry/replies/edit/{id}", name="admin_mod_blog_entry_replies_edit")
     * @Template()
     */
    public function editReplyAction(Request $request, $id = null)
    {
        parent::init($request);

        $Reply = $this->getDoctrine()->getRepository('TrinityBlogBundle:Reply')->find($id);

        if($Reply){

            $em = $this->getDoctrine()->getManager();

            $returnTab = 'recent';
            if(!empty($_GET['approve'])){
                $returnTab = 'moderation';
                $Reply->setApproved(true);
                $em->persist($Reply);
                $em->flush();
            }


            $form = $this->createFormBuilder($Reply)
            ->add('comment', TextareaType::class, array('label' => $this->trans('Reactie', 'cms'), 'attr' => ['class' => 'ckeditor']))
            ->add('approved', CheckboxType::class, ['label' => $this->trans('Goedgekeurd', 'cms')])
            ->setMethod('post')
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
              

                if(!empty($_POST['comment'])){
                    $Reply->setComment($_POST['comment']);
                }
                if(!empty($_POST['admin_comment'])){
                    $AdminReply = new \App\Trinity\BlogBundle\Entity\Reply();
                    $AdminReply->setEntry($Reply->getEntry());
                    
                    $AdminReply->setFirstname($this->Settings->getLabel());
                    $AdminReply->setLastname('');
                    $AdminReply->setEmail($this->Settings->getSystemEmail());
                    $AdminReply->setIp($_SERVER['REMOTE_ADDR']);
                    $AdminReply->setComment($_POST['admin_comment']);
                    $AdminReply->setDate(new \DateTime());
                    $AdminReply->setApproved(true);
                    $AdminReply->setReply($Reply);
                    // dump($AdminReply);die();

                    $em->persist($AdminReply);
                }

                $em->persist($Reply);
                $em->flush();

                
                return $this->redirect($this->generateUrl($_GET['src'], ['id' => $_GET['srcid']]) . '#' . $returnTab);
            }




        }

        return $this->attributes([
            'Reply' => $Reply,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/blog/approval/{blog}/{id}/{status}", name="admin_mod_blog_approval")
     * @Template()
     */
    public function approvalAction(Request $request, $blog = null, $id = null, $status = null)
    {
        parent::init($request);

        $Reply = $this->getDoctrine()->getRepository('TrinityBlogBundle:Reply')->find($id);

        $em = $this->getDoctrine()->getManager();

        if((int)$status === 1){
            $Reply->setApproved(true);
            $em->persist($Reply);

            $Mailreply = $this->getDoctrine()->getRepository('TrinityBlogBundle:Mailreply')->findOneByEmail($Reply->getEmail());
            if($Mailreply){
                $Mailreply->setApproved(true);
                $em->persist($Mailreply);
            }
        }else{
            $em->remove($Reply);
        }

        $em->flush();

        return $this->redirect($this->generateUrl('admin_mod_blog_entry', ['id' => $blog]) . '#recent');
    }

    /**
     * @Route("/admin/blog/entry/add/category/{id}/{catid}", name="admin_mod_blog_category_add")
     * @Template()
     */
    public function addcategoryAction(Request $request, $id = null, $catid = null)
    {
        parent::init($request);

        $Blog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->find($id);

        $em = $this->getDoctrine()->getManager();

        $this->breadcrumbs->addRouteItem("Nieuws", "admin_mod_blog");
        $this->breadcrumbs->addRouteItem($Blog->getLabel(), "admin_mod_blog_entry", array('id' => $id));

        $Mediadir = null;
        if (!empty($catid)) {
            $this->breadcrumbs->addRouteItem($this->trans("Categorie wijzigen", 'cms'), "admin_mod_blog_category_add", array('id' => $id));

            $newCategory = $this->getDoctrine()->getRepository('TrinityBlogBundle:Category')->find($catid);

            $Mediadir = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . 'Blog/Category/' . $newCategory->getCategory(), $this->language);
        } else {
            $this->breadcrumbs->addRouteItem($this->trans("Categorie toevoegen", 'cms'), "admin_mod_blog_category_add", array('id' => $id));

            $newCategory = new \App\Trinity\BlogBundle\Entity\Category();
            $newCategory->setLanguage($this->language);
            $newCategory->setBlog($Blog);

            $Mediadir = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . 'Blog/Category/' . $newCategory->getCategory(), $this->language);
        }

        $saved = false;

        $form = $this->createFormBuilder($newCategory)
            ->add('category', TextType::class)
            ->add('intro', TextareaType::class, array('label' => $this->trans('Introtekst', 'cms'), 'attr' => array('class' => 'ckeditor')))
            ->setMethod('post')
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if(!empty($newCategory->getImage())){                
                $newCategory->setImage(null);
            }

            if(!empty($_POST["image-input"])){
                if(!empty($newCategory->getImage())){
                    if($newCategory->getImage()->getId() != $_POST["image-input"]){
                        $m = $this->getDoctrine()->getRepository('CmsBundle:Media')->find($_POST["image-input"]);

                        if(!empty($m)){
                            $newCategory->setImage($m);
                        }
                    }

                } else {
                    $m = $this->getDoctrine()->getRepository('CmsBundle:Media')->find($_POST["image-input"]);

                    if(!empty($m)){
                        $newCategory->setImage($m);
                    }
                }
            }

            $em->persist($newCategory);
            $em->flush();

            $saved = true;
        }

        try{
            $maxFileSize = (int)ini_get('upload_max_filesize');
        }catch(\Exception $e){
            $maxFileSize = 10;
        }

        return $this->attributes(array(
            'form' => $form->createView(),
            'category' => $newCategory,
            'blog' => $Blog,
            'Mediadir' => $Mediadir,
            'maxFileSize' => $maxFileSize,
            'maxMediaFileSize' => $this->Settings->getMaxMediaSizeInKB(),
            'saved' => $saved,
        ));
    }

    /**
     * @Route("/admin/blog/category/handler", name="admin_mod_blog_cat_handler")
     */
    public function catMediaHandlerAction(Request $request)
    {
        parent::init($request);
        // Upload requested
        if(!empty($_FILES['media'])){
            $result = array();

            $em = $this->getDoctrine()->getManager();

            $Category = $this->getDoctrine()->getRepository('TrinityBlogBundle:Category')->find($_GET['id']);

            if($Category){
                $Parent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . 'Blog/Category/' . $Category->getCategory(), $this->language);
            }else{
                $Parent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . 'Blog/Category/' . $Category->getCategory(), $this->language);
            }

            $files = $_FILES['media'];

            // foreach($files['name'] as $index => $filename){
                $filename = $files['name'];
                $Media = $this->em->getRepository('CmsBundle:Media')->findOneBy(['parent' => $Parent, 'label' => $filename]);

                if(empty($Media)){
                    // Create UploadedFile-object
                    $UploadedFile = new UploadedFile(
                        $files['tmp_name'],
                        $filename,
                        $files['type'],
                        (int)$files['error'],
                        $test = true
                    );

                    $Media = new \App\CmsBundle\Entity\Media();
                    $Media->setParent($Parent);
                    $Media->setLabel($filename);
                    $Media->setDateAdd();
                    $Media->setFile($UploadedFile); // Link UploadedFile to the media entity
                    $Media->preUpload(); // Prepare file and path
                    $Media->upload(); // Upload actual file

                    $em->persist($Media);
                }

                if($Category){
                    $Category->setImage($Media);
                }

                $Media->webPath = $Media->getWebPath();

                $result = $Media;
            // }

            if($Category){
                $em->persist($Category);
            }

            $em->flush();

            if(!isset($_POST['manual_upload'])){
                // create a JSON-response with a 200 status code
                $response = new Response(json_encode($result));
                $response->headers->set('Content-Type', 'application/json');

                return $response;
            }else{
                //return $this->redirectToRoute('admin_mod_webshop_media', array('type' => (int)$_POST['mediadirid']));
            }
        }
    }

    /**
     * @Route("/admin/blog/entry/add/category/{id}/{catid}/delete", name="admin_mod_blog_category_delete")
     * @ Template()
     */
    public function deleteCategoryAction(Request $request, $id, $catid)
    {
        parent::init($request);

        $category = $this->getDoctrine()->getRepository('TrinityBlogBundle:Category')->find($catid);


        if (!is_null($category)) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($category);
            $em->flush();
            $this->addFlash('', 'Category ' . $category->getCategory() . ' '. $this->trans('is verwijderd.', 'cms'));
        }
        return $this->redirect($this->generateUrl('admin_mod_blog_entry', ['id' => $id]));
    }

    private function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    /**
     * @Route("/admin/blog/entry/add/{id}", name="admin_mod_blog_entry_add")
     * @Template()
     */
    /*public function addAction(Request $request, $id = null)
    {

        parent::init($request);

        $this->breadcrumbs->addRouteItem("Nieuws", "admin_mod_blog");

        // Add
        $Entry = new \App\Trinity\BlogBundle\Entity\Entry();
        $Entry->setDateAdd(new \Datetime('now'));
        $Entry->setUser($this->getUser());

        $Blog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->find($id);

        if (empty($Blog)) {
            // Create default blog
            $Blog = new \App\Trinity\BlogBundle\Entity\Blog();
            $Blog->setLanguage($this->language);
            $Blog->setLabel($this->trans('Algemeen', [], 'cms'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($Blog);
            $em->flush();
        }

        $this->breadcrumbs->addRouteItem($Blog->getLabel(), "admin_mod_blog_entry", array('id' => $id));

        $Entry->setBlog($Blog);

        $this->breadcrumbs->addRouteItem("Toevoegen", "admin_mod_blog_entry_edit");

        $Entry->setDatePublish(new \Datetime());

        $saved = false;
        $form = $this->createFormBuilder($Entry)
            ->add('label', TextType::class, array('label' => 'Titel'))
            ->add('concept', CheckboxType::class, array('label' => 'Concept (niet tonen op website)', 'required' => false))
            ->add('slug', TextType::class, array('label' => 'URL sleutel', 'required' => false))
            ->setMethod('post')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // Combine date
            $full_date = $_POST['date']['date'] . ' ' . $_POST['date']['time'];
            $Entry->setDatePublish(new \Datetime($full_date));

            // Store in database
            $em = $this->getDoctrine()->getManager();
            $em->persist($Entry);
            $em->flush();

            $saved = true;
        }

        return $this->attributes(array(
            'form' => $form->createView(),
            'Blog' => $Blog,
            'Entry' => $Entry,
            'saved' => (bool)$saved
        ));
    }*/

    /**
     * @Route("/admin/blog/entry/clone/{id}", name="admin_mod_blog_entry_clone", requirements={"id": "\d+"})
     * @Template()
     */
    public function cloneAction(Request $request, $id = null)
    {
        parent::init($request);

        $em = $this->getDoctrine()->getManager();
        $OriginalEntry = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->find($id);

        $OriginalEntry->em = $em;

        if(!empty($_POST)){

            if(!empty($_POST['newclone'])){
                foreach($_POST['newclone'] as $id){
                    $LinkedSettings = $this->getDoctrine()->getRepository('CmsBundle:Settings')->find($id);
                    $LinkedBlog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->findOneBySettings($LinkedSettings);

                    if (empty($LinkedBlog)) {
                        $LinkedBlog = new \App\Trinity\BlogBundle\Entity\Blog();
                        $LinkedBlog->setLanguage($LinkedSettings->getLanguage());
                        $LinkedBlog->setSettings($LinkedSettings);
                        $LinkedBlog->setLabel($this->trans('Algemeen', 'cms'));
                        $em->persist($LinkedBlog);
                    }

                    $NewLangEntry = clone $OriginalEntry;
                    $NewLangEntry->setBlog($LinkedBlog);
                
                    if(!empty($_POST['label'])){
                        $NewLangEntry->setLabel($_POST['label']);
                        $NewLangEntry->setSlug($this->slugify($_POST['label']));
                    }

                    $em->persist($NewLangEntry);
                }

                $em->flush();
            }else if(!empty($_POST['clonelang'])){
                foreach($_POST['clonelang'] as $id){
                    $LinkedLanguage = $this->getDoctrine()->getRepository('CmsBundle:Language')->find($id);
                    $LinkedSettings = $LinkedLanguage->getSettings()->first();
                    $LinkedBlog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->findOneBySettings($LinkedSettings);

                    if (empty($LinkedBlog)) {
                        $LinkedBlog = new \App\Trinity\BlogBundle\Entity\Blog();
                        $LinkedBlog->setLanguage($LinkedLanguage);
                        $LinkedBlog->setSettings($LinkedSettings);
                        $LinkedBlog->setLabel($this->trans('Algemeen', 'cms'));
                        $em->persist($LinkedBlog);
                    }

                    $NewLangEntry = clone $OriginalEntry;
                    $NewLangEntry->setBlog($LinkedBlog);
                
                    if(!empty($_POST['label'])){
                        $NewLangEntry->setLabel($_POST['label']);
                        $NewLangEntry->setSlug($this->slugify($_POST['label']));
                    }

                    $em->persist($NewLangEntry);
                }

                $em->flush();
            }else{

                $NewEntry = clone $OriginalEntry;

                $em->persist($NewEntry);
                
                if(!empty($_POST['label'])){
                    $NewEntry->setLabel($_POST['label']);
                    $NewEntry->setSlug($this->slugify($_POST['label']));
                }

                $em->persist($NewEntry);

                $em->flush();
            }


    	    $this->clearRouterCache();

    	    if (!empty($OriginalEntry->getBlog())) {
    		    $blogid = $OriginalEntry->getBlog()->getId();
    	    } else {
    		    $blogid =  null;
    	    }

            return $this->attributes([
    		    'done' => true,
    		    'blogid' => $blogid,
            ]);
        }

        if(!empty($_GET['popup'])){

            /*$categories = [];
            $webshops = $this->getDoctrine()->getRepository('TrinityBlogBundle:Webshop')->findAll();
            foreach($webshops as $w){
                $categories_raw = $this->getDoctrine()->getRepository('TrinityBlogBundle:Category')->findBy(['webshop' => $w], ['parent' => 'asc', 'position' => 'asc']);
                foreach($categories_raw as $c){
                    $categories[$w->getId()][] = [
                        'id' => $c->getId(),
                        'label' => $c->getLabel(),
                        'parent' => ($c->getParent() ? $c->getParent()->getId() : null),
                    ];
                }
            }*/

            /*$linked = [];
            foreach($OriginalEntry->getCategory() as $c){
                $linked[] = $c->getCategory()->getId();
            }*/

            return $this->attributes([
                'Entry' => $OriginalEntry,
                // 'webshops' => $webshops,
                // 'categories' => $categories,
                // 'linked' => $linked,
            ]);
	}

        return $this->redirect($this->generateUrl('admin_mod_blog_entry_edit', ['id' => $NewEntry->getId()]));
    }

     /**
     * @Route("/admin/blog/ajax/openai/{id}/{type}", name="admin_mod_blog_ajax_openai")
     */
    public function openAIAction(Request $request, $id = null, $type = 'content')
    {
        parent::init($request);

        $em = $this->getDoctrine()->getManager();

        $OpenAI = new OpenAI($this->Settings);

        $Entry = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->find($id);

        $result = '';

        if($type == 'body'){
            $result = $OpenAI->doPrompt('Schrijf een volledig SEO geoptimaliseerde blog in HTML code (zonder meta tags) over het onderwerp: ' . $Entry->getLabel() . '. Gebruik titels, subtitels en bullet points (waar nodig). Zorg ervoor dat er 0% plagiaat is. Schrijf het namens ' . $this->Settings->getLabel() . '. Beschrijf pas wat ' . $this->Settings->getLabel() . ' voor je kan betekenen helemaal aan het eind van de blog. De tekst moet minimaal 2000 woorden zijn. Gebruik ‘je’ vorm. Schrijf met een ‘confident’ toon en een creatieve schrijfstijl.');
        } else if($type == 'title'){
            $result = $OpenAI->doPrompt('Schrijf een titel voor een blogpost met de tekst (denk om SEO): ' . $Entry->getBody());
        } else if($type == 'intro'){
            $result = $OpenAI->doPrompt('Schrijf een volledig SEO geoptimaliseerde introtekst voor een blogpost met de titel: ' . $Entry->getLabel() . ' en de tekst: ' . $Entry->getBody());
        }

        return new JsonResponse([
            'success' => true,
            'text' => $result
        ]);
    }

    /**
     * @Route("/admin/blog/easifygpt", name="admin_mod_blog_openai")
     * @Template()
     */
    public function easifyGptAction(Request $request)
    {
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("Nieuws", 'cms'), "admin_mod_blog");
        $this->breadcrumbs->addRouteItem($this->trans("EasifyGPT", 'cms'), "admin_mod_blog_openai");

        $em = $this->getDoctrine()->getManager();

        return $this->attributes(array(
            'settings' => $this->Settings,
        ));
    }

    /**
     * @Route("/admin/blog/entry/edit/{id}/{blog}", name="admin_mod_blog_entry_edit")
     * @Template()
     */
    public function editAction(Request $request, Environment $twig, $id = null, $blog = null)
    {
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("Nieuws", 'cms'), "admin_mod_blog");
        $em = $this->getDoctrine()->getManager();

        // dump($this->get('session')->get('admin_msite'));die();

        // Edit
        $new = false;
        if(!empty($id)){
            $Entry = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->find($id);
            $Blog = $Entry->getBlog();

            if($Blog->getSettings() != $this->Settings){
                return $this->redirect($this->generateUrl('admin_mod_blog'));
            }

        }else{
            $Blog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->find($blog);

            $new = true;
            $Entry = new \App\Trinity\BlogBundle\Entity\Entry();
            $Entry->setDateAdd(new \Datetime('now'));
            $Entry->setDatePublish(new \Datetime('now'));
            $Entry->setBlog($Blog);
        }

        $Entry->setUser($this->getUser());

        // Upload requested
        $Mediadir = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . 'Nieuws/' . $Blog->getLabel() . '/' . $Entry->getLabel(), $this->language);

        $this->breadcrumbs->addRouteItem($Blog->getLabel(), "admin_mod_blog_entry", array('id' => $Blog->getId()));

        if ($new) {
            $this->breadcrumbs->addRouteItem($this->trans("Bericht toevoegen", 'cms'), "admin_mod_blog_entry_edit");
        }else{
            $this->breadcrumbs->addRouteItem($this->trans("Bericht wijzigen", 'cms'), "admin_mod_blog_entry_edit");
        }

        if($Entry->getSeoTitle() == ''){
            $Entry->setSeoTitle($Entry->getLabel());
        }

        $this->CurrentBlog = $Blog;

        $saved = false;
        $form = $this->createFormBuilder($Entry)
            ->add('is_external', CheckboxType::class, array('label' => $this->trans('Bericht verwijst naar externe link', 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('external_url', TextType::class, array('label' => $this->trans('Externe URL', 'cms'), 'required' => false, 'row_attr' => ['class' => 'page-chk']))
            ->add('label', TextType::class, array('label' => $this->trans('Titel', 'cms')))
            ->add('subtitle', TextType::class, ['label' => $this->trans('Ondertitel', 'cms'), 'required' => false])
            ->add('concept', CheckboxType::class, array('label' => $this->trans('Concept (niet tonen op website)', 'cms'), 'required' => false))
            ->add('slug', TextType::class, array('label' => $this->trans('URL sleutel', 'cms'), 'required' => false, 'attr' => ['class' => 'fld-seo-slug']))
            ->add('intro', TextareaType::class, array('label' => $this->trans('Introtekst', 'cms'), 'attr' => array('class' => 'ckeditor')))
            ->add('body', TextareaType::class, array('label' => $this->trans('Bodytekst', 'cms'), 'attr' => array('class' => 'ckeditor')))
            ->add('datePublish', DateTimeType::class, array(
                'label' => $this->trans('Publicatiedatum', 'cms'),
                'label_attr' => ['class' => 'active'],
                'input' => 'datetime',
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'yyyy-MM-dd HH:mm',
                'attr' => ['class' => 'trinity_datetime'],
                'required' => true,
            ))
            ->add('datePublishEnd', DateTimeType::class, array(
                'label' => $this->trans('Publicatiedatum (einde)', [], 'cms'),
                'label_attr' => ['class' => 'active'],
                'input' => 'datetime',
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'yyyy-MM-dd HH:mm',
                'attr' => ['class' => 'trinity_datetime'],
                'required' => false,
                'placeholder'   => array(
                    'month' => null,
                    'year'  => null,
                ),
            ))
            ->add('Category', EntityType::class, [
                'label' => ' ',
                'class' => 'App\Trinity\BlogBundle\Entity\Category',
                'query_builder' => function (\Doctrine\ORM\EntityRepository $cat) {
                    return $cat->createQueryBuilder('pt')
                        ->where('pt.blog = :blog')
                        ->setParameter('blog', $this->CurrentBlog)
                        ->orderBy('pt.category', 'ASC');
                },
                'multiple' => true,
                'expanded' => true,
                'choice_label' => 'Category',
                'required' => true,
            ])
            ->add('seo_title', TextType::class, array('label' => $this->trans('Meta title', 'cms'), 'required' => false, 'attr' => ['placeholder' => $Entry->getLabel(), 'class' => 'fld-seo-title']))
            ->add('seo_keywords', TextType::class, array('label' => $this->trans('Meta keywords', 'cms'), 'required' => false, 'attr' => ['placeholder' => '']))
            ->add('seo_description', TextareaType::class, array('label' => $this->trans('Meta description', 'cms'), 'required' => false, 'attr' => ['class' => 'materialize-textarea fld-seo-description']))
            ->setMethod('post')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Store in database

            /*$products = [];
            if(!empty($_POST['products'])){
                $products = array_keys($_POST['products']);
            }

            $Entry->setProducts($products);*/
            

            if(isset($_POST['conf_link'])){
                $Entry->setProducts($_POST['conf_link']);
            }else{
                $Entry->setProducts([]);
            }

            $em->persist($Entry);

            $currentCategories = $Entry->getCategory();
            if (is_object($currentCategories)) {
                if (!empty($currentCategories)) {
                    $previousCategories = $currentCategories->getSnapshot();
                    foreach ($previousCategories as $_Category) {
                        if (!$currentCategories->contains($_Category)) {
                            $_Category->removeEntry($Entry);
                            $em->persist($_Category);
                        }
                    }
                }
            }

            if ($Entry->getCategory()) {
                foreach ($Entry->getCategory() as $_Category) {
                    $_Category->removeEntry($Entry);
                    $_Category->addEntry($Entry);
                    $em->persist($_Category);
                }
            }

            /*if (!empty($_FILES['media']['tmp_name'])) {
                // Create UploadedFile-object
                $UploadedFile = new UploadedFile( $_FILES['media']['tmp_name'], $_FILES['media']['name'], $_FILES['media']['type'], (int)$_FILES['media']['error'], true );

                $Media = new \App\CmsBundle\Entity\Media();
                $Media->setLabel($_FILES['media']['name']);
                $Media->setDateAdd();
                $Media->setFile($UploadedFile); // Link UploadedFile to the media entity
                $Media->preUpload(); // Prepare file and path
                $Media->upload(); // Upload actual file

                $em->persist($Media);
                $Entry->setImage($Media);
            }*/

            if(empty($id) && !empty($_POST['new_media'])){
                $list = explode(',', $_POST['new_media']);

                $Parent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . 'Nieuws/' . $Entry->getBlog()->getLabel() . '/' . $Entry->getLabel(), $this->language);

                foreach($list as $mid){
                    if(!empty($mid)){
                        $m = $this->getDoctrine()->getRepository('CmsBundle:Media')->find($mid);
                        if($m){
                            $m->setParent($Parent);
                            $em->persist($m);
                            $Entry->addMedia($m);
                        }
                    }
                }
            }

            if(!empty($_POST['existing_media'])){
                $list = explode(',', $_POST['existing_media']);

                foreach($list as $mid){
                    if(!empty($mid)){
                        $m = $this->getDoctrine()->getRepository('CmsBundle:Media')->find($mid);
                        if($m){
                            $Entry->addMedia($m);
                        }
                    }
                }
            }


            if($new && $Entry->getDatePublish() <= new \DateTime()){
                // Is new, and published today or earlier, reply to people who wanted to be notified
                $mailreplies = $this->getDoctrine()->getRepository('TrinityBlogBundle:Mailreply')->findBy(['notify_new_blog' => true]);
                if(!empty($mailreplies)){






                    $link_page = null;
                    $blocks = $em->getRepository('CmsBundle:PageBlock')->findByData('TrinityBlogBundle', 'is_overview', '"id":"' . $blog . '"');
                    foreach($blocks as $Block){
                        $p = $Block->getWrapper()->getPage();
                        if($p->getLanguage() == $this->language){
                            $link_page = $p;
                            break;
                        }
                    }
                    if($link_page){
                        $detailUrl = $this->generateUrl($link_page->getSlugKey()) . '/' . $Entry->getId() . '/' . $Entry->getDefaultSlug();
                        if(!empty($Entry->getSlug()) && $Entry->getSlug() != '/'){
                            $detailUrl = $this->generateUrl($link_page->getSlugKey()) . '/' . $Entry->getSlug();
                        }

                        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();

                        foreach($mailreplies as $R){
                            $message =  $this->trans('<p>Er is een nieuw bericht geplaatst met de titel:<br/><strong>%label%</strong></p>' . "\n".
                                        '<p style="text-align:center;border-top: dashed 1px #ddd;padding-top:40px;margin-top:40px;"><a href="%messageurl%">Klik hier</a> om het bericht te bekijken.<br/>'.
                                        '<a href="%prefsurl%">Klik hier</a> om uw voorkeuren voor deze geautomatiseerde e-mails te beheren.</p>',
                                    'cms',
                                    [
                                        '%label%' => $Entry->getLabel(),
                                        '%messageurl%' => $baseurl . $detailUrl,
                                        '%prefsurl%' => $baseurl . $this->generateUrl($request->get('_route')) . '/prefs/' . $emailToHash,
                                    ]);

                            ob_start();
                            $htmlDebug = $twig->render('/emails/notify.html.twig', [
                                'label' => '',
                                'message' => $message
                            ]);

                            // Send notification to person replied to
                            $mailer->setSubject('Nieuw blog bericht: ' . $Entry->getLabel())
                                    ->setTo($R->getEmail())
                                    ->setTwigBody('/emails/notify.html.twig', [
                                        'label' => '',
                                        'message' => $message
                                    ])
                                    ->setPlainBody(strip_tags($message));
                            $status = $mailer->execute_forced();
                        }
                    }else{
                        $detailUrl = null;
                    }
                }
            }

            $em->persist($Entry);

            if($new && !empty($_POST['clone'])){
                foreach($_POST['clone'] as $id){
                    $LinkedSettings = $this->getDoctrine()->getRepository('CmsBundle:Settings')->find($id);
                    $LinkedBlog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->findOneBySettings($LinkedSettings);

                    if (empty($LinkedBlog)) {
                        $LinkedBlog = new \App\Trinity\BlogBundle\Entity\Blog();
                        $LinkedBlog->setLanguage($this->language);
                        $LinkedBlog->setSettings($LinkedSettings);
                        $LinkedBlog->setLabel($this->trans('Algemeen', 'cms'));
                        $em->persist($LinkedBlog);
                    }

                    $NewEntry = clone $Entry;
                    $NewEntry->setBlog($LinkedBlog);

                    $em->persist($NewEntry);
                }
            }


            if($new && !empty($_POST['clonelang'])){
                foreach($_POST['clonelang'] as $id){
                    $LinkedLanguage = $this->getDoctrine()->getRepository('CmsBundle:Language')->find($id);
                    $LinkedSettings = $LinkedLanguage->getSettings()->first();
                    $LinkedBlog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->findOneBySettings($LinkedSettings);

                    if (empty($LinkedBlog)) {
                        $LinkedBlog = new \App\Trinity\BlogBundle\Entity\Blog();
                        $LinkedBlog->setLanguage($LinkedLanguage);
                        $LinkedBlog->setSettings($LinkedSettings);
                        $LinkedBlog->setLabel($this->trans('Algemeen', [], 'cms'));
                        $em->persist($LinkedBlog);
                    }

                    $NewEntry = clone $Entry;
                    $NewEntry->setBlog($LinkedBlog);

                    $em->persist($NewEntry);
                }
            }



            $em->flush();

            // REORDER IMAGES
            if(!empty($_POST['media_sort'])){
                foreach($_POST['media_sort'] as $i => $id){
                    $m = $this->getDoctrine()->getRepository('CmsBundle:Media')->find($id);
                    $m->setPosition($i);
                    $em->persist($m);
                    $em->flush();
                }
            }


            // Store metadata/metatags
            if(!empty($_POST['metadata'])){
                foreach($_POST['metadata'] as $metatagid => $value){
                    $Metatag = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->findOneById($metatagid);

                    $EntryMetatag = $this->getDoctrine()->getRepository('TrinityBlogBundle:Metatag')->findOneBy(['metatag' => $Metatag, 'entry' => $Entry]);
                    if(empty($EntryMetatag)){
                        $EntryMetatag = new \App\Trinity\BlogBundle\Entity\Metatag();
                        $EntryMetatag->setMetatag($Metatag);
                        $EntryMetatag->setEntry($Entry);
                    }
                    $EntryMetatag->setValue($value);

                    $em->persist($EntryMetatag);
                }
                $em->flush();
            }

			// if cache is enabled, find pages with blog and reset them.
			$this->resetPageCacheThatContainedBundle('TrinityBlogBundle', $this->Settings);

            $Syslog = new Log();
            $Syslog->setUser($this->getUser());
            $Syslog->setUsername($this->getUser()->getUsername());
            $Syslog->setBundle('blog');
            $Syslog->setType('entry');
            $Syslog->setStatus('info');
            $Syslog->setObjectId($Entry->getId());
            $Syslog->setSettings($this->Settings);
            if($new){
                $Syslog->setAction('add');
                $Syslog->setMessage('Blog post \'' . $Entry->getLabel() . '\' toegevoegd.');
            }else{
                $Syslog->setAction('update');
                $Syslog->setMessage('Blog post \'' . $Entry->getLabel() . '\' gewijzigd.');
            }
            $em->persist($Syslog);
            $em->flush();


            
            if(empty($_POST['inline_save'])){
                return $this->redirect($this->generateUrl('admin_mod_blog_entry', array('id' => $Blog->getId())));
            }else{
                return $this->redirect($this->generateUrl('admin_mod_blog_entry_edit', ['id' => $Entry->getId(), 'blog' => $Blog->getId()]));
            }
        }

        $maxFileSize = 10;
        try{
            $maxFileSize = (int)ini_get('upload_max_filesize');
        }catch(\Exception $e){
            // Nothing going on here
        }

    	$products = [];
        if(in_array('WebshopBundle', $this->installed)){
            try {
                /*$categories = $this->getDoctrine()->getRepository('TrinityBlogBundle:Category')->findBy(['webshop' => $this->Webshop]);
                foreach($categories as $Category){
                    foreach($Category->getProducts() as $CategoryProduct){
                        if(!empty($CategoryProduct->getProduct())){
                            $Product = $CategoryProduct->getProduct();
                            $products[$Product->getLabel()] = $Product;
                        }
                    }
                }*/
                if(!empty($Entry->getProducts())){
                    foreach($Entry->getProducts() as $pid){
                        $products[] = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Product')->find($pid);
                    }
                }
            } catch (\Exception $e) {
                //
            }
	}
        
        $detailUrl = null;
        $blocks = $em->getRepository('CmsBundle:PageBlock')->findByData('TrinityBlogBundle', 'is_overview', '"id":"' . $Blog->getId() . '"');
        foreach($blocks as $Block){
            $p = $Block->getWrapper()->getPage();
            if($p->getLanguage() == $this->language){
                $detailUrl = $this->generateUrl($p->getSlugKey()) . '/' . $Entry->getId() . '/' . $Entry->getDefaultSlug();
                if(!empty($Entry->getSlug()) && $Entry->getSlug() != '/'){
                    $detailUrl = $this->generateUrl($p->getSlugKey()) . '/' . $Entry->getSlug();
                }
                break;
            }
        }

        $entryMetatags = [];
        $ignoreTags    = ['description', 'keywords'];
        $metatags      = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->findBy(['system' => false]);
        foreach($metatags as $index => $Metatag){
            if(!in_array($Metatag->getKey(), $ignoreTags)){
                $EntryMetatag = $this->getDoctrine()->getRepository('TrinityBlogBundle:Metatag')->findOneBy(['metatag' => $Metatag, 'entry' => $Entry]);
                if(empty($EntryMetatag)){
                    $EntryMetatag = new \App\Trinity\BlogBundle\Entity\Metatag();
                    $EntryMetatag->setMetatag($Metatag);
                }
                $entryMetatags[] = $EntryMetatag;
            }
        }

        $categories = $this->getDoctrine()->getRepository('TrinityBlogBundle:Category')->findBy(['language' => $this->language]);

        return $this->attributes(array(
            'form'             => $form->createView(),
            'Entry'            => $Entry,
            'id'               => $id,
            'Mediadir'         => $Mediadir,
            'new'              => $new,
            'products'         => $products,
            'detailUrl'        => $detailUrl,
            'categories'        => $categories,
            'maxFileSize'      => $maxFileSize,
            'maxMediaFileSize' => $this->Settings->getMaxMediaSizeInKB(),
            'saved'            => (bool)$saved,
            
            'metatags'         => $entryMetatags,
            'ck_mediadir_id'   => $Mediadir->getId(),
        ));
    }

    /**
     * @Route("/admin/blog/entry/media/handler", name="admin_mod_blog_entry_media_handler")
     * @Template()
     */
    public function mediaHandlerAction(Request $request)
    {
        parent::init($request);
        // Upload requested
        if(!empty($_FILES['media'])){
            $result = array();

            $em = $this->getDoctrine()->getManager();

            $Entry = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->find($_POST['entryid']);

            if($Entry){
                $Parent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . 'Nieuws/' . $Entry->getBlog()->getLabel() . '/' . $Entry->getLabel(), $this->language);
            }else{
                $Parent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($em, (!empty($this->Settings->getHost()) ? $this->Settings->getHost() . '/' : '') . 'Nieuws/temp', $this->language);
            }

            $files = $_FILES['media'];

            foreach($files['name'] as $index => $filename){
                // Create UploadedFile-object
                $UploadedFile = new UploadedFile( $files['tmp_name'][$index], $filename, $files['type'][$index], (int)$files['error'][$index], true );

                $Media = new \App\CmsBundle\Entity\Media();
                $Media->setParent($Parent);
                $Media->setLabel($filename);
                $Media->setDateAdd();
                $Media->setFile($UploadedFile); // Link UploadedFile to the media entity
                $Media->preUpload(); // Prepare file and path
                $Media->upload(); // Upload actual file

                $em->persist($Media);

                if($Entry){
                    $Entry->addMedia($Media);
                }

                $Media->webPath = $Media->getWebPath();

                $Media->createWebP($this->Settings, $Media->getPath(), true);

                $result[] = $Media;
            }

            if($Entry){
                $em->persist($Entry);
            }
            $em->flush();

            // if(!isset($_POST['manual_upload'])){
                // create a JSON-response with a 200 status code
                $response = new Response(json_encode($result));
                $response->headers->set('Content-Type', 'application/json');

                return $response;
            /*}else{
                return $this->redirectToRoute('admin_mod_webshop_media', array('type' => (int)$_POST['mediadirid']));
            }*/
        }
    }

    /**
     * @Route("/admin/blog/entry/deletemedia/{id}/{mediaid}",
     *      name="admin_mod_blog_entry_media_delete",
     *      requirements = {
     *          "id" = "\d+",
     *          "mediaid" = "\d+"
     *      }
     * )
     */
    public function deleteMediaAction(Request $request, $id = null, $mediaid = null)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TrinityBlogBundle:Entry')->find($id);
        $redirect = 'admin_mod_blog_entry_edit';

        if (!empty($entity)) {
            $media = $em->getRepository('CmsBundle:Media')->find($mediaid);

            $entity->removeMedia($media);

            $em->persist($entity);
            $em->flush();
        }

        return $this->redirectToRoute($redirect, ['id' => $id]);
    }

    /**
     * @Route("/admin/blog/entry/delete/{id}", name="admin_mod_blog_entry_delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id = null)
    {
        parent::init($request);

        $em = $this->getDoctrine()->getManager();
        $Entry = $em->getRepository('TrinityBlogBundle:Entry')->find($id);
        $blogid = $Entry->getBlog()->getId();
        $label = $Entry->getLabel();

        if (!is_null($Entry)) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($Entry);
            $em->flush();

			$this->resetPageCacheThatContainedBundle('TrinityBlogBundle', $this->Settings);
        }

        $Syslog = new Log();
        $Syslog->setUser($this->getUser());
        $Syslog->setUsername($this->getUser()->getUsername());
        $Syslog->setBundle('blog');
        $Syslog->setType('entry');
        $Syslog->setStatus('info');
        $Syslog->setObjectId($id);
        $Syslog->setSettings($this->Settings);
        $Syslog->setAction('delete');
        $Syslog->setMessage('Blog post \'' . $label . '\' verwijderd.');
        $em->persist($Syslog);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_mod_blog_entry', ['id' => $blogid]));
    }

    /**
     * @Route("/admin/blog/entry/import/{blog}", name="admin_mod_blog_entry_import")
     * @Template()
     */
    public function importAction(Request $request, $blog = null)
    {
        parent::init($request);
        $Blog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->find($blog);

        $this->breadcrumbs->addRouteItem($this->trans("Nieuws", 'cms'), "admin_mod_blog");
        $this->breadcrumbs->addRouteItem($Blog->getLabel(), "admin_mod_blog_entry", array('id' => $blog));
        $this->breadcrumbs->addRouteItem($this->trans('Importeren', 'cms'), "admin_mod_blog_entry_import", array('blog' => $blog));

        if(!empty($_FILES['csv'])){
            $stats = ['add' => 0, 'edit' => 0];
            $em = $this->getDoctrine()->getManager();
            if (($handle = fopen($_FILES['csv']['tmp_name'], "r")) !== FALSE) {
                $i = 0;
                $labels = [];
                while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
                    if($i == 0){
                        foreach($data as $k => $v){$labels[$k] = $v;}
                    }else{

                        if($_POST['what'] == 'posts'){
                            /*
                                POSTS
                             */
                            if($data[20] == 'post'){
                                $preview = []; foreach($data as $k => $v){ $preview[$k . ' | ' . $labels[$k]] = $v; }
                                // dump($preview);die();

                                $id        = $data[0];
                                $title     = $data[5];
                                $content   = $data[4];
                                $slug      = $data[11];
                                $date_add  = $data[2];
                                $date_edit = $data[14];

                                $add = false;
                                $Entry = $em->getRepository('TrinityBlogBundle:Entry')->findOneBy(['old_id' => $id]);
                                if(empty($Entry)){
                                    $Entry = new \App\Trinity\BlogBundle\Entity\Entry();
                                    $Entry->setOldId($id);
                                    $Entry->setBlog($Blog);
                                    $add = true;
                                    $stats['add']++;
                                }else{
                                    $stats['edit']++;
                                }

                                $Entry->setDateAdd(new \DateTime($date_add));
                                $Entry->setDatePublish(new \DateTime($date_add));
                                $Entry->setDateEdit(new \DateTime($date_edit));
                                $Entry->setLabel($title);
                                $Entry->setSlug($slug);
                                $Entry->setBody($content);
                                $Entry->setImage();
                                $Entry->setConcept($data[7] != 'publish');

                                $em->persist($Entry);
                                $em->flush();
                            }
                        }else if($_POST['what'] == 'readcount'){
                            /*
                                COUNTS
                             */
                            $preview = []; foreach($data as $k => $v){ $preview[$k . ' | ' . $labels[$k]] = $v; }
                            // dump($preview);die();

                            $id        = $data[0];
                            $date_last = $data[2];
                            $count     = $data[3];

                            $Entry = $em->getRepository('TrinityBlogBundle:Entry')->findOneBy(['old_id' => $id]);
                            if(!empty($Entry)){
                                $Entry->setReadcount($count);

                                $em->persist($Entry);
                                $em->flush();
                                $stats['edit']++;
                            }
                        }else if($_POST['what'] == 'replies'){
                            /*
                                REPLIES
                             */
                            if($data[12] == '' && $data[10] != 'spam'){
                                $preview = []; foreach($data as $k => $v){ $preview[$k . ' | ' . $labels[$k]] = $v; }
                                // dump($preview);die();

                                $comment_id = (int)$data[0];
                                $post_id    = (int)$data[1];
                                $author     = $data[2];
                                $email      = $data[3];
                                $avatar     = $data[4];
                                $ip         = $data[5];
                                $date       = $data[6];
                                $comment    = $data[8];
                                $approved   = $data[10];
                                $parent     = (int)$data[13];

                                $Entry = $em->getRepository('TrinityBlogBundle:Entry')->findOneBy(['old_id' => $post_id]);
                                if(!empty($Entry)){

                                    $Reply = $em->getRepository('TrinityBlogBundle:Reply')->findOneBy(['old_id' => $comment_id]);
                                    if(empty($Reply)){
                                        $Reply = new \App\Trinity\BlogBundle\Entity\Reply();
                                        $Reply->setOldId($comment_id);
                                        $Reply->setEntry($Entry);
                                        $stats['add']++;
                                    }else{
                                        $stats['edit']++;
                                    }

                                    $Reply->setFirstname($author);
                                    $Reply->setLastname('');
                                    $Reply->setEmail($email);
                                    $Reply->setIp($ip);
                                    $Reply->setComment($comment);
                                    $Reply->setDate(new \DateTime($date));
                                    $Reply->setApproved((int)$approved === 1);

                                    if(!empty($parent)){
                                        $ParentReply = $em->getRepository('TrinityBlogBundle:Reply')->findOneBy(['old_id' => $parent]);
                                        $Reply->setReply($ParentReply);
                                    }

                                    $em->persist($Reply);
                                    $em->flush();
                                }
                            }
                        }else{
                            die($_POST['what']);
                        }
                    }

                    $i++;
                }
                fclose($handle);

                dump($stats);die();
            }
        }

        return $this->attributes([
            'id' => $blog,
        ]);
    }

    /**
     * @Route("/admin/blog/entry/replies/{id}/{page}", name="admin_mod_blog_entry_replies")
     * @Template()
     */
    public function repliesAction(Request $request, $id = null, $page = 1)
    {
        parent::init($request);

        $Entry = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->find($id);

        $this->breadcrumbs->addRouteItem($this->trans("Nieuws", 'cms'), "admin_mod_blog");
        $this->breadcrumbs->addRouteItem($Entry->getBlog()->getLabel(), "admin_mod_blog_entry", array('id' => $Entry->getBlog()->getId()));
        $this->breadcrumbs->addRouteItem($Entry->getLabel(), "admin_mod_blog_entry", ['id' => $Entry->getBlog()->getId()]);
        $this->breadcrumbs->addRouteItem($this->trans("Reacties", 'cms'), "admin_mod_blog_entry_replies", ['id' => $id]);

        $replies_limit = 20;
        $replies_offset = (($page * $replies_limit) - $replies_limit);

        // Replies
        $replies = $this->getDoctrine()->getRepository('TrinityBlogBundle:Reply')->searchByBlog($Entry->getBlog(), (!empty($_GET['q']) ? $_GET['q'] : ''), $replies_limit, $replies_offset, $Entry);
        $replies_count = $this->getDoctrine()->getRepository('TrinityBlogBundle:Reply')->searchByBlogCount($Entry->getBlog(), (!empty($_GET['q']) ? $_GET['q'] : ''), $replies_limit, $replies_offset, $Entry);
        $replies_pages = ceil($replies_count / $replies_limit);


        $Page = null;
        $BlogBlock = null;
        $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('TrinityBlogBundle');
        if(empty($blocks)){
            // Fallback
            $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('QinoxBlogBundle');
        }
        foreach($blocks as $Block){
            $p = $Block->getWrapper()->getPage();
            if($p->getLanguage() == $this->language){
                $BlogBlock = $Block;
                $Page = $p;
                break;
            }
        }

        $baseUrl = null;
        if($Page){
            $baseUrl = $this->generateUrl($Page->getSlugKey());
        }

        return $this->attributes(array(
            'Blog' => $Entry->getBlog(),
            'Entry' => $Entry,
            'replies' => $replies,
            'replies_limit' => $replies_limit,
            'replies_count' => $replies_count,
            'replies_pages' => $replies_pages,
            'page' => $page,
            'baseUrl' => $baseUrl,
        ));
    }

    /**
     * @Route("/admin/blog/entry/{id}/{page}", name="admin_mod_blog_entry")
     * @Template()
     */
    public function indexAction(Request $request, Environment $twig, $id = null, $page = 1)
    {
        parent::init($request);

        $replies_limit = 20;
        if($request->isXmlHttpRequest()){
            $Blog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->findOneBy([]);
            // $replies = $this->getDoctrine()->getRepository('TrinityBlogBundle:Reply')->findBy([], ['date' => 'desc'], $replies_limit);

            $replies_offset = (($page * $replies_limit) - $replies_limit);


            $Page = null;
            $BlogBlock = null;
            $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('TrinityBlogBundle');
            if(empty($blocks)){
                // Fallback
                $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('QinoxBlogBundle');
            }
            foreach($blocks as $Block){
                $p = $Block->getWrapper()->getPage();
                if($p->getLanguage() == $this->language){
                    $BlogBlock = $Block;
                    $Page = $p;
                    break;
                }
            }
    
            $baseUrl = null;
            if($Page){
                $baseUrl = $this->generateUrl($Page->getSlugKey());
            }

            // Replies
            // $replies = $this->getDoctrine()->getRepository('TrinityBlogBundle:Reply')->findBy([], ['date' => 'desc'], $replies_limit, $replies_offset);
            $replies = $this->getDoctrine()->getRepository('TrinityBlogBundle:Reply')->searchByBlog($Blog, (!empty($_GET['q']) ? $_GET['q'] : ''), $replies_limit, $replies_offset);
            $replies_count = $this->getDoctrine()->getRepository('TrinityBlogBundle:Reply')->searchByBlogCount($Blog, (!empty($_GET['q']) ? $_GET['q'] : ''), $replies_limit, $replies_offset);
            $replies_pages = ceil($replies_count / $replies_limit);
    
            return $this->render('@TrinityBlog/entry/replies_ajax.html.twig', [
                'Blog' => $Blog,
                'replies' => $replies,
                'replies_limit' => $replies_limit,
                'replies_count' => $replies_count,
                'replies_pages' => $replies_pages,
                'page' => $page,
                'baseUrl' => $baseUrl,
            ]);
            // return $html;
        }

        $this->breadcrumbs->addRouteItem($this->trans("Nieuws", 'cms'), "admin_mod_blog");

        $blogs = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->findBy([
            'language' => $this->language,
            'settings' => $this->Settings
        ]);

        $em = $this->getDoctrine()->getManager();

        $Blog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->find($id);

        if($Blog->getSettings() != $this->Settings){
            return $this->redirect($this->generateUrl('admin_mod_blog'));
        }

        if ($this->language) {
            if ($Blog->getLanguage() != $this->language) {
                if ($blogs) {
                    return $this->redirect($this->generateUrl('admin_mod_blog_entry', ['id' => $blogs[0]->getId()]));
                } else {
                    // Create default blog
                    $Blog = new \App\Trinity\BlogBundle\Entity\Blog();
                    $Blog->setLanguage($this->language);
                    $Blog->setLabel($this->trans('Algemeen', 'cms'));
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($Blog);
                    $em->flush();

                    return $this->redirect($this->generateUrl('admin_mod_blog_entry', ['id' => $Blog->getId()]));
                }
            }
        }

        $this->breadcrumbs->addRouteItem($Blog->getLabel(), "admin_mod_blog_entry", array('id' => $id));

        $entries = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findBy(['blog' => $Blog], ['id' => 'desc']);
        $categories1 = $this->getDoctrine()->getRepository('TrinityBlogBundle:Category')->findBy(['language' => $this->language, 'blog' => $Blog]);
        $categories2 = $this->getDoctrine()->getRepository('TrinityBlogBundle:Category')->findBy(['language' => $this->language, 'blog' => null]);

        $categories = [];
        foreach($categories1 as $C){ $categories[$C->getCategory()] = $C; }
        foreach($categories2 as $C){ $categories[$C->getCategory()] = $C; }

        ksort($categories);

        $moderate_replies = [];
        foreach($this->getDoctrine()->getRepository('TrinityBlogBundle:Reply')->findByNotApproved($Blog) as $R){
            if(!empty($R)){
                if($R->getApproved() != true){
                    $Mailreply = $this->getDoctrine()->getRepository('TrinityBlogBundle:Mailreply')->findOneByEmail($R->getEmail());
                    if($Mailreply && $Mailreply->getApproved()){
                        $R->setApproved(true);
                        $em->persist($R);
                        $em->flush();
                    }else{
                        $moderate_replies[] = $R;
                    }
                }
            }
        }

        // $moderate_replies = $this->getDoctrine()->getRepository('TrinityBlogBundle:Reply')->findBy(['approved' => false]);
        // $moderate_replies = array_merge($moderate_replies, $this->getDoctrine()->getRepository('TrinityBlogBundle:Reply')->findBy(['approved' => null]));



        $page = null;
        $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('TrinityBlogBundle', 'is_overview');
        if(empty($blocks)){
            // Fallback
            $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('QinoxBlogBundle', 'is_overview');
        }
        foreach($blocks as $Block){
            $p = $Block->getWrapper()->getPage();
            if($p && $p->getLanguage() == $this->language){
                $page = $p;
                break;
            }
        }

        $blogDetailPage = null;
        if($page){
            $blogDetailPage = $this->generateUrl($page->getSlugKey());
        }


        $blogs_used = [];
        $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('TrinityBlogBundle');
        if(empty($blocks)){
            // Fallback
            $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('QinoxBlogBundle');
        }
        foreach($blocks as $Block){
            $p = $Block->getWrapper()->getPage();
            if($p && $p->getLanguage() == $this->language){
                $data = $Block->getBundleData(true);
                if (isset($data['id'])) {
                    $blogs_used[] = $data['id'];
                }
            }
        }


        return $this->attributes(array(
            'blogs_used' => $blogs_used,
            'blogs' => $blogs,
            'entries' => $entries,
            'Blog' => $Blog,
            'categories' => $categories,
            'blogDetailPage' => $blogDetailPage,
            'moderate_replies' => $moderate_replies,

        ));
    }
}
