<?php

namespace App\Trinity\BlogBundle\Controller;

use App\CmsBundle\Controller\StorageController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Doctrine\Common\Collections\ArrayCollection;
use App\CmsBundle\Util\Mailer;

use Symfony\Component\HttpKernel\EventListener\AbstractSessionListener;
use Twig\Environment;

class BlogController extends StorageController
{
    /**
     * @Route("/admin/blog", name="admin_mod_blog")
     */
    public function indexAction(Request $request, $id = null)
    {
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("Nieuws", 'cms'), "admin_mod_blog");

        $Blog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->findOneBy([
            'language' => $this->language,
            'settings' => $this->Settings,
        ]);

        if (empty($Blog)) {
            // Create default blog
            $Blog = new \App\Trinity\BlogBundle\Entity\Blog();
            $Blog->setLanguage($this->language);
            $Blog->setSettings($this->Settings);
            $Blog->setLabel($this->trans('Algemeen', 'cms'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($Blog);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_mod_blog_entry', ['id' => $Blog->getId()]));
    }

    /**
     * @Route("/admin/blog/edit/{id}", name="admin_mod_blog_edit")
     * @Template()
     */
    public function editAction(Request $request, $id = null)
    {
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("Nieuws", 'cms'), "admin_mod_blog");

        $new = false;
        if ((int)$id > 0) {
            // Edit
            $Blog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->find($id);
            $this->breadcrumbs->addRouteItem($this->trans("Wijzigen", 'cms'), "admin_mod_blog_edit");
        } else {
            // Add
            $new = true;
            $Blog = new \App\Trinity\BlogBundle\Entity\Blog();
            $Blog->setLanguage($this->language);
            $Blog->setSettings($this->Settings);
            $this->breadcrumbs->addRouteItem($this->trans("Toevoegen", 'cms'), "admin_mod_blog_edit");
        }

        $saved = false;
        $form = $this->createFormBuilder($Blog)
            ->add('label', TextType::class, array('label' => $this->trans('Titel', 'cms')))
            ->add('info', TextareaType::class, array('label' => $this->trans('Info', 'cms'), 'attr' => ['class' => 'ckeditor']))
            ->setMethod('post')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Store in database
            $em = $this->getDoctrine()->getManager();
            $em->persist($Blog);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_mod_blog_entry', ['id' => $Blog->getId()]));
        }

        return $this->attributes(array(
            'form' => $form->createView(),
            'Blog' => $Blog,
            'saved' => (bool)$saved
        ));
    }

    /**
     * @Route("/admin/blog/delete/{id}", name="admin_mod_blog_delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id = null)
    {
        parent::init($request);

        $em = $this->getDoctrine()->getManager();
        $Blog = $em->getRepository('TrinityBlogBundle:Blog')->find($id);

        if (!is_null($Blog)) {
            $Blog->setSettings(null);
            $em->remove($Blog);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_mod_blog'));
    }

    public function wpredirectAction(Request $request){
        $this->init($request);

        $entryId = $request->get('entryId');
        $redirect = $this->generateUrl('homepage');
        try{
            if(!empty($entryId)){
                $Entry = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findOneById($entryId);
                if(!empty($Entry)){
                    $page = null;
                    $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('TrinityBlogBundle', 'is_overview');
                    foreach($blocks as $Block){
                        $p = $Block->getWrapper()->getPage();
                        if($p->getLanguage() == $this->language){
                            $page = $p;
                            break;
                        }
                    }

                    if($page){
                        $redirect = $this->generateUrl($page->getSlugKey());
                        $slug = '/' . $Entry->getId() . '/' . $Entry->getDefaultSlug();
                        if(!empty($Entry->getSlug())){
                            $slug = '/' . $Entry->getSlug();
                        }

                        $redirect = $redirect . $slug;
                    }
                }
            }
        }catch(\Exception $e){}

        return $this->redirect($redirect);
    }

    public function showAction($config, $params = array(), $request)
    {
        parent::init($request);
        $related = [];

        if(!empty($config['uri'])){
            $config['uri'] = preg_replace('/^\//', '', $config['uri']);
        }

        if(!empty($config['uri_overview'])){
            $config['uri_overview'] = preg_replace('/^\//', '', $config['uri_overview']);
        }

        if(!empty($config['type']) && $config['type'] == 'categories'){
            #Get all blog categories by language and settings
            $Blogs = $this->getDoctrine()->getRepository('TrinityBlogBundle:Category')->findBy([
                'language' => $this->language
            ]);

            return $this->renderView('@TrinityBlog/default/categories.html.twig', $this->attributes(array(
                'config' => $config,
                'Blogs' => $Blogs
            )));
        }

        if(!empty($config['type']) && $config['type'] == 'popular'){
            $Blog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->findOneById($config['id']);
            $html = '<ul>';

            $page = null;
            // Add check for TrinityBlogBundle for legacy support
            $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('TrinityBlogBundle', 'is_overview');
            foreach($blocks as $Block){
                $p = $Block->getWrapper()->getPage();
                if($p->getLanguage() == $this->language){
                    $page = $p;
                    break;
                }
            }

            $blocks = $this->getDoctrine()->getRepository('CmsBundle:PageBlock')->findByData('TrinityBlogBundle', 'is_overview');
            foreach($blocks as $Block){
                $p = $Block->getWrapper()->getPage();
                if($p->getLanguage() == $this->language){
                    $page = $p;
                    break;
                }
            }

            $entries = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findPopularEntriesPublishedNow($Blog, 4);
            foreach($entries as $Entry){
                if($page){
                    $baseUrl = $this->generateUrl($page->getSlugKey());
                    $slug = '/' . $Entry->getId() . '/' . $Entry->getDefaultSlug();
                    if(!empty($Entry->getSlug())){
                        $slug = '/' . $Entry->getSlug();
                    }

                    $url = $baseUrl . $slug;
                }else{
                    if(!empty($Entry->getSlug())){
                        $url = $this->generateUrl($request->get('_route'), ['param1' => $Entry->getSlug()]);
                    }else{
                        $url = $this->generateUrl($request->get('_route'), ['param1' => $config['id'], 'param2' => $Entry->getDefaultSlug()]);
                    }
                }
                $html .= '<li><a href="' . $url . '">' . $Entry->getLabel() . '</a></li>';
            }
            $html .= '</ul>';
            return $html;
        }

        $message = '';
        if($params[0] == 'prefs'){
            $emailhash = openssl_decrypt($params[1], 'aes-128-cbc', 'blogdata.0010000', null, 'blogdata.0010000');

            $Mailreply = null;
            if($emailhash){
                $Mailreply = $this->getDoctrine()->getRepository('TrinityBlogBundle:Mailreply')->findOneByEmail($emailhash);
                if(empty($Mailreply)){
                    $Mailreply = new \App\Trinity\BlogBundle\Entity\Mailreply();
                    $Mailreply->setEmail($emailhash);
                    $Mailreply->setEnabled(true);
                }

                $Form = $this->createFormBuilder($Mailreply)
                        ->add('enabled', CheckboxType::class, ['label' => $this->trans('E-mail reacties ontvangen', 'cms')])
                        ->add('notify_new_blog', CheckboxType::class, ['label' => $this->trans('E-mail update ontvangen bij nieuwe berichten', 'cms')])
                        ->setMethod('post')
                        ->getForm();

                $Form->handleRequest($request);
                if ($Form->isSubmitted() && $Form->isValid())
                {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($Mailreply);
                    $em->flush();

                    $message = $this->trans('De voorkeuren zijn opgeslagen.', 'cms');
                }
            }

            return $this->renderView('@TrinityBlog/default/prefs.html.twig', [
                'Form'      => ($Mailreply ? $Form->createView() : null),
                'emailhash' => $emailhash,
                'message'   => $message,
            ]);
        }

        if (!empty($_GET['id'])) {
            $Entry = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findOneById($_GET['id']);

            if ($Entry) {
                if(!empty($Entry->getSlug())){
                    $url = $this->generateUrl($request->get('_route'), ['param1' => $Entry->getSlug()]);
                }else{
                    $url = $this->generateUrl($request->get('_route'), ['param1' => $_GET['id'], 'param2' => $Entry->getDefaultSlug()]);
                }
            } else {
                $url = $this->generateUrl($request->get('_route'));
            }

            header("HTTP/1.1 301 Moved Permanently");
            header('Location: ' . $url);
            exit;
        }

        if (!empty($params[0])) {
            $inline_error = false;

            if (!isset($config['notblogspecific']))
            {

                $Blog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->findOneById($config['id']);

                if(!is_numeric($params[0])){
                    $Entry = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findOneBy(['slug' => $params[0], 'blog' => $Blog]);
                }else{
                    $Entry = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findOneBy(['id' => $params[0], 'blog' => $Blog]);

                    if(!empty($Entry->getSlug())){
                        $url = $this->generateUrl($request->get('_route'), ['param1' => $Entry->getSlug()]);

                        header("HTTP/1.1 301 Moved Permanently");
                        header('Location: ' . $url);
                        exit;
                    }
                }
            } else {
                $Blog = null;

                // FIXME Blog restriction here?
                if(!is_numeric($params[0])){
                    $Entry = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findOneBy(['slug' => $params[0]]);
                }else{
                    $Entry = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findOneBy(['id' => $params[0]]);

                    if(!empty($Entry) && !empty($Entry->getSlug())){
                        $url = $this->generateUrl($request->get('_route'), ['param1' => $Entry->getSlug()]);

                        header("HTTP/1.1 301 Moved Permanently");
                        header('Location: ' . $url);
                        exit;
                    }
                }
            }

            if(empty($Entry))
            {
                header("HTTP/1.1 301 Moved Permanently");
                header("location: " . $this->generateUrl($request->get('_route')));
                exit;
            }

            $em = $this->getDoctrine()->getManager();
            $Entry->setReadcount($Entry->getReadcount() + 1);
            $em->persist($Entry);
            $em->flush();

            if($Entry->getCategory()->count()){
                $C = $Entry->getCategory()->first();
                $related = $C->getEntry();
            }

            $Reply = new \App\Trinity\BlogBundle\Entity\Reply();
            
            $Form = $this->createFormBuilder($Reply)
                    ->add('firstname', TextType::class, ['data' => ($this->getUser() ? $this->getUser()->getFirstname() : '')])
                    ->add('lastname', TextType::class, ['data' => ($this->getUser() ? $this->getUser()->getLastname() : '')])
                    ->add('email', EmailType::class, ['data' => ($this->getUser() ? $this->getUser()->getEmail() : '')])
                    ->add('comment', TextareaType::class, ['required' => true])
                    ->setMethod('post')
                    ->getForm();

            $Form->handleRequest($request);
            // View entry details
            //if (!empty($_POST)) {
            if ($Form->isSubmitted() && $Form->isValid())
            {
                $validCaptcha = $this->Settings->validateGoogleRecaptcha($request->request->get('g-recaptcha-response'));

                if(($validCaptcha))
                {


                    if(!empty($_POST['replyto'])){
                        $Parent = $this->getDoctrine()->getRepository('TrinityBlogBundle:Reply')->find($_POST['replyto']);
                        if($Parent){
                            $Reply->setReply($Parent);

                            $Mailreply = $this->getDoctrine()->getRepository('TrinityBlogBundle:Mailreply')->findOneByEmail($Parent->getEmail());

                            if(!empty($Parent->getEmail()) && ($Mailreply && $Mailreply->getEnabled()) || empty($Mailreply)){

                                $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();

                                $emailToHash = openssl_encrypt($Parent->getEmail(), 'aes-128-cbc', 'blogdata.0010000', null, 'blogdata.0010000');
                                // $emailToHash = urlencode($emailToHash);

                                $message =
                                        $this->trans('<p>Beste %firstname%,</p>' . "\n".
                                            '<p>Een bezoeker heeft gereageerd op je reactie:</p>' . "\n".
                                            '<div style="border:solid 1px black;border-width:1px 0;padding: 10px 0;margin: 10px 0;">%comment%</div>'.
                                            '<p style="text-align:center;border-top: dashed 1px #ddd;padding-top:40px;margin-top:40px;"><a href="%entryurl%">Klik hier</a> om de reactie te bekijken.<br/>'.
                                            '<a href="%prefsurl%">Klik hier</a> om uw voorkeuren voor deze geautomatiseerde e-mails te beheren.</p>',
                                        'cms',
                                        [
                                            '%firstname%' => $Parent->getFirstname(),
                                            '%comment%' => $Reply->getcomment(),
                                            '%entryurl%' => $baseurl . $this->generateUrl($request->get('_route')) . '/' . ($Entry->getSlug() ? $Entry->getSlug() : $Entry->getId() . '/' . $Entry->getDefaultSlug()),
                                            '%prefsurl%' => $baseurl . $this->generateUrl($request->get('_route')) . '/prefs/' . $emailToHash,
                                        ]);
                                
                                /*ob_start();
                                $htmlDebug = $twig->render('/emails/notify.html.twig', [
                                    'label' => '',
                                    'message' => $message
                                ]);

                                die($htmlDebug);*/

                                // Send notification to person replied to
								$mailer = clone $this->mailer;
		                        $mailer->init();
                                $mailer->setSubject($this->trans('Nieuwe reactie op je reactie bij het blog bericht', 'cms') . ' ' . $Entry->getLabel())
                                        ->setTo($Parent->getEmail())
                                        ->setTwigBody('/emails/notify.html.twig', [
                                            'label' => '',
                                            'message' => $message
                                        ])
                                        ->setPlainBody(strip_tags($message));
                                $status = $mailer->execute_forced();
                            }else{
                                // NOT WANT EMAIL
                            }
                        }
                    }

                    $Mailreply = $this->getDoctrine()->getRepository('TrinityBlogBundle:Mailreply')->findOneByEmail($Reply->getEmail());
                    if(empty($Mailreply)){
                        // Mailreply setting doesnt exist yet, make it - enabled.
                        $Mailreply = new \App\Trinity\BlogBundle\Entity\Mailreply();
                        $Mailreply->setEmail($Reply->getEmail());
                    }

                    $Mailreply->setEnabled(!empty($_POST['optin']['reply']));
                    $Mailreply->setNotifyNewBlog(!empty($_POST['optin']['new']));
                    $em->persist($Mailreply);





                    // Check if already approved
                    $approved = false;
                    /*foreach($this->getDoctrine()->getRepository('TrinityBlogBundle:Reply')->findBy(['email' => $Reply->getEmail()]) as $R){
                        if(!empty($R)){
                            if($R->getApproved() != true){
                                $Mailreply = $this->getDoctrine()->getRepository('TrinityBlogBundle:Mailreply')->findOneByEmail($R->getEmail());
                                if($Mailreply && $Mailreply->getApproved()){
                                    $approved = true;
                                }else{
                                    $approved = false;
                                }
                            }
                        }
                    }*/

                    $Reply->setApproved($approved);



                    $Reply->setEntry($Entry);
                    $Reply->setIp($_SERVER['REMOTE_ADDR']);
                    $Reply->setDate(new \Datetime('now'));

                    $em->persist($Reply);
                    $em->flush();

                    // Redirect to the same page, this prevents that the form can be submitted multiple times by refreshing the page.
                    header_remove();
                    header("HTTP/1.1 301 Moved Permanently");
                    header('Location: ' . $request->getUri());
                    exit;
                } else {
                    $inline_error = $this->trans('Ongeldige reCAPTCHA, uw reactie is niet opgeslagen.', 'cms');
                }
            }

            $replies = $this->getDoctrine()->getRepository('TrinityBlogBundle:Reply')->findBy(['entry' => $Entry, 'reply' => null, 'approved' => true], ['date' => 'desc']);
            $replies_count = $this->getDoctrine()->getRepository('TrinityBlogBundle:Reply')->count(['entry' => $Entry, 'approved' => true], ['date' => 'desc']);

            if (!isset($config['notblogspecific'])) {
                // FIXME There function should also check category is needed?
                $popular = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findPopularEntriesPublishedNow($Blog);
                $recentFour = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findRecentEntriesPublishedNow($Blog, 3, $Entry->getId());
                // $recentFour = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findBy(['blog' => $Blog], ['datePublish' => 'desc'], 4);
            } else {
                if (!isset($config['category_id'])) {
                    $categories = null;
                } else {
                    $categories = $config['category_id'];
                }
                $popular = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findPopularEntriesPublishedByCategoryNow($this->language, $categories);
                $recentFour = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findPopularEntriesPublishedByCategoryNow($this->language, $categories, 4);
            }
            $products = [];
            $WebshopSettings = null;
            if(!empty($Entry->getProducts())){
                foreach($Entry->getProducts() as $id){
                    $products[$id] = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Product')->find($id);
                }

                $WebshopSettings = $this->getDoctrine()->getRepository('TrinityWebshopBundle:Settings')->find(1);
            }

            $content = $Entry->getBody();

            if(preg_match_all('/\[caption\s(.*?)\](.*?)\[\/caption\]/', $content, $m)){
                if(!empty($m)){
                    foreach($m[1] as $i => $params){
                        $src = $m[0][$i];
                        $inner = $m[2][$i];

                        $inner = preg_replace("/ width=\"\d+\"/", '', $inner);
                        $inner = preg_replace("/ height=\"\d+\"/", '', $inner);
                        $inner = preg_replace("/ class=\".*?\"/", '', $inner);

                        $config = [];
                        $params = explode(' ', $params);
                        foreach($params as $p){
                            $p = explode('=', $p);
                            $config[$p[0]] = str_replace('"', '', $p[1]);
                        }

                        $widget = '<div class="caption-widget ' . (!empty($config['align']) ? $config['align'] : '') . '">
                            ' . preg_replace('/Bron(.*?)http/', 'Bron$1<br/>http', $inner) . '
                        </div>';

                        $content = str_replace($src, $widget, $content);
                    }
                }
            }
            // $content = '<h1>:\'-)</h1>';

            // $content            

            $Entry->setBody($content);

            $most_recent = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findBy(array('blog' => $Entry->getBlog()), array('datePublish' => 'desc'), 5);

            if($Entry->getIsExternal() && !empty($Entry->getExternalUrl())){
                header("HTTP/1.1 301 Moved Permanently");
                header('Location: ' . $Entry->getExternalUrl());
                exit;
            }

            if (isset($config['show_anchors']) && $config['show_anchors'] == 1) {
                $this->getDoctrine()->getManager()->detach($Entry);
                //Get the innerHtml all of the <h2> tags from the body of the entry and store their text in an array to be used as anchors
                $h2s = [];
                preg_match_all('/<h2>(.*?)<\/h2>/', $Entry->getBody(), $h2s);

                //Get all the h2 tags from the Entry body and give them an incrementing id attribute
                $h2s[0] = array_unique($h2s[0]);
                $i = 0;
                foreach($h2s[0] as $h2){
                    $Entry->setBody(str_replace($h2, '<h2 id="anchor-' . $i . '">' . $h2s[1][$i] . '</h2>', $Entry->getBody()));
                    $i++;
                }

                $h2s = $h2s[1];
            } else {
                $h2s = [];
            }

            return $this->renderView('@TrinityBlog/default/entry.html.twig', $this->attributes(array(
                'config' => $config,
                'Entry' => $Entry,
                'Blog' => $Blog,
                'Anchors' => $h2s,
                'recentFour' => $recentFour,
                'replies' => $replies,
                'replies_count' => $replies_count,
                'popular' => $popular,
                'related' => $related,
                'Form' => $Form->createView(),
                'products' => $products,
                'settings' => $this->Settings,
                'most_recent' => $most_recent,
                'installed' => $this->installed,
                'WebshopSettings' => $WebshopSettings,
                'error' => '',
                'inline_error' => $inline_error,
            )));
        } else {

            // View index
            if (!isset($config['notblogspecific'])) {
                $Blog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->findOneById($config['id']);

                // Tmp fix for concept being 'null'
                /*$em = $this->getDoctrine()->getManager();
                $tmpEntries = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findBy(array('blog' => $Blog, 'concept' => null));
                foreach($tmpEntries as $Entry){
                    if(!$Entry->getConcept()){
                        $Entry->setConcept(false);
                        $em->persist($Entry);
                    }
                    $em->flush();
                }*/

                if ((int)$config['limit'] > 0) {
                    $page = isset($_GET['page']) && (int)$_GET['page'] > 0 ? $_GET['page'] : 1;
                    $offset = (($page - 1) * (int)$config['limit']);
                } else {
                    $page = 1;
                    $offset = 0;
                }

                $limit = !empty($config['limit']) ? $config['limit'] : null;

                if (isset($config['category_id']) && !empty($config['category_id']))
                {
//                    $category = $this->getDoctrine()->getRepository('TrinityBlogBundle:Category')->find($config['category_id']);

                    $count = count($this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findEntriesByCategory($Blog, $config['category_id']));
                    $entries = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findEntriesByCategory($Blog, $config['category_id'], false, $limit, $offset);
                } else {
                    $count = count($this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findEntriesPublishedNow($Blog, false));
                    $entries = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findEntriesPublishedNow($Blog, false, $limit, $offset);
                }
                if ((int)$config['limit'] > 0) {
                    $pages = ceil($count / (int)$config['limit']);
                } else {
                    $pages = 0;
                }

                $popular = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findPopularEntriesPublishedNow($Blog);
            } else {
                $Blog = null;
                    
                // Tmp fix for concept being 'null'
/*
                $em = $this->getDoctrine()->getManager();
                $tmpEntries = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findBy(array('blog' => $Blog, 'concept' => null));
                foreach($tmpEntries as $Entry){
                    if(!$Entry->getConcept()){
                        $Entry->setConcept(false);
                        $em->persist($Entry);
                    }
                    $em->flush();
                }
*/
                if ((int)$config['limit'] > 0) {
                    $page = isset($_GET['page']) && (int)$_GET['page'] > 0 ? $_GET['page'] : 1;
                    $offset = (($page - 1) * (int)$config['limit']);
                } else {
                    $page = 1;
                    $offset = 0;
                }

                $limit = !empty($config['limit']) ? $config['limit'] : null;

                if (isset($config['category_id']) && !empty($config['category_id']))
                {
                    $count = count($this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->FindEntriesByLanguage($this->language, $config['category_id']));
                    $entries = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->FindEntriesByLanguage($this->language, $config['category_id'], $limit, $offset);
                } else {
                    $count = count($this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->FindEntriesByLanguage($this->language));
                    $entries = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->FindEntriesByLanguage($this->language, null, $limit, $offset);
                }

                if ((int)$config['limit'] > 0) {
                    $pages = ceil($count / (int)$config['limit']);
                } else {
                    $pages = 0;
                }

// XXX implimenteren
                $popular = null; //$this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findPopularEntriesPublishedNow($Blog);
            }

            if (isset($config['show_slider']) && isset($config['limit']) && $config['limit'] > 0) {
                return $this->renderView('@TrinityBlog/default/slider.html.twig', $this->attributes(array(
                    'config' => $config,
                    'Blog' => $Blog,
                    'entries' => $entries,
                    'page' => $page,
                    'pages' => $pages,
                )));
            } else {
                return $this->renderView('@TrinityBlog/default/blog.html.twig', $this->attributes(array(
                    'config' => $config,
                    'Blog' => $Blog,
                    'entries' => $entries,
                    'popular' => $popular,
                    'page' => $page,
                    'limit' => $limit,
                    'offset' => $offset,
                    'pages' => $pages,
                )));
            }
        }
    }

    public static function metatagHandler($em, $params, $bundledata, $request){
        if(!is_numeric($params[0])){
            $Entry = $em->getRepository('TrinityBlogBundle:Entry')->findOneBy(['slug' => $params[0]]);
        }else{
            $Entry = $em->getRepository('TrinityBlogBundle:Entry')->findOneBy(['id' => $params[0]]);
        }

        $entryMetatags = [];
        $ignoreTags    = ['description'];
        $metatags      = $em->getRepository('CmsBundle:Metatag')->findBy(['system' => false]);

        if($Entry){
            foreach($metatags as $index => $Metatag){
                if(!in_array($Metatag->getKey(), $ignoreTags)){
                    $EntryMetatag = $em->getRepository('TrinityBlogBundle:Metatag')->findOneBy(['metatag' => $Metatag, 'entry' => $Entry]);
                    if(empty($EntryMetatag)){
                        $EntryMetatag = new \App\Trinity\BlogBundle\Entity\Metatag();
                        $EntryMetatag->setMetatag($Metatag);
                    }

                    if(empty($EntryMetatag->getValue())){
                        if($EntryMetatag->getMetatag()->getKey() == 'keywords'){
                            if(!empty($Entry->getSeoKeywords())){
                                $EntryMetatag->setValue($Entry->getSeoKeywords());
                            }
                        }
                        if($EntryMetatag->getMetatag()->getKey() == 'og:title'){
                            if(!empty($Entry->getSeoTitle())){
                                $EntryMetatag->setValue($Entry->getSeoTitle());
                            }else{
                                $EntryMetatag->setValue($Entry->getLabel());
                            }
                        }
                        if($EntryMetatag->getMetatag()->getKey() == 'og:description'){
                            if(!empty($Entry->getSeoDescription())){
                                $EntryMetatag->setValue($Entry->getSeoDescription());
                            }else{
                                $EntryMetatag->setValue($Entry->getIntro());
                            }
                        }
                        if($EntryMetatag->getMetatag()->getKey() == 'og:image'){
                            if($Entry->getMedia()){
                                foreach($Entry->getMedia() as $Media){
                                    $EntryMetatag->setValue('/' . $Media->getWebPath());
                                    break;
                                }
                            }
                        }
                    }
                        if($EntryMetatag->getMetatag()->getKey() == 'og:url'){
                            $Settings = $Entry->getBlog()->getSettings();
                            if ($Settings->getForceHttps()) {
                                $url = 'https://';
                            } else {
                                $url = 'http://';
                            }
                            $url = $url . $Settings->getHost();
                            $url = $url . $request->getRequestUri();
                            $EntryMetatag->setValue($url);
                        }

                    if(!empty($EntryMetatag->getValue())){
                        $entryMetatags[] = $EntryMetatag;
                    }
                }
            }
        }

        return $entryMetatags;
	}

	public static function resourcesHandler($Settings, array $bundledata, string $projectDir) : ?string
	{
		$resources = null;
		$layoutKey = !empty($Settings->getOverrideKey()) ? trim($Settings->getOverrideKey()) . '/' : '';

		$resource_file = 'resources.json';
		if (isset($bundledata['allow_replies']) && $bundledata['allow_replies'] == 1) {
			$resource_file = 'resources_replies.json';
		}

		// check if file exists or build array in code and return that.
		$file = __DIR__ . "/../Resources/views/default/" . $resource_file;
		$override = $projectDir . '/public/custom/' . $layoutKey . 'blog/' . $resource_file;

		if (file_exists($override)) {
			$resources = $override;
		} else if (file_exists($file)) {
			$resources = $file;
		}

        return $resources;
    }

    /**
     * @Route("/ajax/blog/category/{id}/{uri}/{catid}", name="mod_blog_category_ajax")
     */
    public function getCategory(Request $request, $id, $uri = "", $catid = 0)
    {
        $blog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->find($id);
        $current_category = $this->getDoctrine()->getRepository('TrinityBlogBundle:Category')->find($catid);
        if ($catid == 0) {
            $current_category = $blog;
        }
        $content = '';
        if ($current_category == $blog) {
            $entries_tmp = $current_category->getEntries();
        } else {
            $entries_tmp = $current_category->getEntry();
        }
        $entries = new ArrayCollection();
        for ($i = $entries_tmp->count(); $i > -1; $i--) {
            $e = $entries_tmp->get($i);
            if ($e)
                $entries->add($e);
        }

        $first = false;

        foreach ($entries as $entry) {
            $url = $request->getBaseUrl() . '/' . urldecode($uri) . '/' . $entry->getId() . '/' . $entry->getSlug();
            if ($entry->getImage()) {
                if (!$first) {
                    if ($entry->getImage()->getHeight() < 600) {
                        $imgsize = 'catimg';
                    } else {
                        $imgsize = 'catimg-full-width';
                    }

                    $headimgcontent = '
                    <div class="img-wrap">
                        <a class="imageEntry" href="' . $url . '">
                            <div class="imgbackgr header-img ' . $imgsize . ' " style="background-color:#DCDCDC; background-image: url(/' . $entry->getImage()->getWebPath() . '); background-repeat: no-repeat; background-size:cover; background-position:center;">
                            </div>
                            <div class="title-holder">
                                <h4 class="h-post-title">' . $entry->getLabel() . '</h4>
                                <span class="icon-holder h-post-title">
                                    <i class="fa fa-thumbs-up"></i>' . $entry->getLikes() . '
                                    <i class="fa fa-eye"></i> ' . $entry->getReadCount() . '
                                </span>
                            </div>
                            <div class="overlay"></div>
                        </a>
                    </div>';

                    $first = true;
                } else {
                    if ($entry->getBlog() == $blog) {
                        $content .= '
                        <div class="pull-left" style="padding-top:10px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="img-wrap">
                                    <a class="imageEntry" href="' . $url . '">
                                        <div class="imgbackgr" style="height:100px; padding:5px; background-image:url(/' . $entry->getImage()->getWebPath() . ');background-repeat: no-repeat; background-size:cover; background-position:center;"></div>
                                    </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="imgcontent pull-left">
                                        <a class="cat-label" href="' . $url . '">
                                            ' . $entry->getlabel() . '
                                        </a>
                                    </div><br>
                                    <div class="pull-left">
                                        <p style="color:grey; font-size:14px;;"><i class="fa fa-eye"></i> ' . $entry->getReadcount() . '
                                           <i class="fa fa-thumbs-up"></i>' . $entry->formatLikes($entry->getLikes()) . '
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                }
            }
        }
        return new JsonResponse(['content' => $content,
            'headercontent' => $headimgcontent,]);
    }

    /**
     * @Route("/ajax/blog/{id}/{show_amount}/{page}", name="mod_pagination_ajax")
     */
    public function paginationAction(Request $request, $id = null, $page = '', $show_amount = '')
    {
        parent::init($request);
        $pagipage = $page && (int)$page > 0 ? $page : 1;
        // blog
        $blog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->find($id);
        //entries
        $entry = $blog->getEntries();

        if (empty($show_amount)) {
            $limit = $entry->count();
        } else {
            $limit = $show_amount;
        }
        $countimg = [];
        foreach ($entry as $Entry) {
            if (!empty($Entry->getImage())) {
                $countimg[] = $Entry;
            }
        }
        $count = count($countimg);
        $offset = (($pagipage * $limit) - $limit);
        $pages = (int)ceil($count / $limit);
        $entries = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findByNot(['blog' => $id], ['image' => null], [], $limit, $offset);

        $likes = [];
        foreach ($entries as $Entry) {
            $likes[] = $Entry->formatLikes($Entry->getLikes());
        }

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $normalizer->setIgnoredAttributes(['dateAdd', 'dateEdit', 'blog', 'intro', 'body', 'replies', 'category', 'user', 'datePublish', 'media', 'page', 'tags', 'content', 'language', 'metatags', 'versions']);
        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize($entries, 'json');
        $likesContent = $serializer->serialize($likes, 'json');

        $entriesdata = json_decode($jsonContent, TRUE);
        $likesdata = json_decode($likesContent, TRUE);

        return new JsonResponse([
            'count' => $count,
            'pages' => $pages,
            'page' => $pagipage,
            'jsonContent' => $entriesdata,
            'pagilikes' => $likesdata,
        ]);
    }

    /**
     * @Route("/ajax/blog/{id}/like/{entryid}/{action}", name="mod_like_dislike_ajax")
     */
    public function likeAction(Request $request, $id = null, $entryid = null, $action = '')
    {
        parent::init($request);
        $Blog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->find($id);
        $Entry = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->find($entryid);

        if ($action == 'likes') {
            $em = $this->getDoctrine()->getManager();

            $likes_count = $Entry->setLikes($Entry->getLikes() + 1);
            $em->persist($likes_count);
            $em->flush();
        }
        if ($action == 'dislikes') {
            $em = $this->getDoctrine()->getManager();

            $dislikes_count = $Entry->setLikes($Entry->getLikes() - 1);
            $em->persist($dislikes_count);
            $em->flush();
        }
        $all_likes = $Entry->getLikes();

        if ($all_likes == null) {
            $all_likes = 0;
        }

        return new JsonResponse([
            'all_likes' => $Entry->formatLikes($Entry->getLikes()),
        ]);
    }

    /**
     * Return link data when required within the link form
     *
     * @param  object  Doctrine object
     *
     * @return array   Array with config options
     */
    public function getLinkData($em, $language, $container, $settings)
    {
        $blogs = $em->getRepository('TrinityBlogBundle:Blog')->findBy(['language' => $language, 'settings' => $settings]);
        $categories = $em->getRepository('TrinityBlogBundle:Category')->findBy(['language' => $language]);

        return array(
            'blogs' => $blogs,
            'categories' => $categories,
        );
    }

    /**
     * Show dashboard blocks
     *
     * @return array List of blocks
     */
    public function dashboardBlocks()
    {
        $Blog = $this->getDoctrine()->getRepository('TrinityBlogBundle:Blog')->findOneBy(array(), array(
            'id' => 'asc'
        ));
        $entries = $this->getDoctrine()->getRepository('TrinityBlogBundle:Entry')->findBy(array(), array(
            'dateAdd' => 'desc'
        ), 10);

        $responses = '';
        foreach ($entries as $Entry) {
            $responses .= '<tr>
                <td style="text-align:left;"><a href="' . $this->generateUrl('admin_mod_blog_entry_edit', array('id' => $Entry->getId())) . '">' . $Entry->getLabel() . '</a></td>
                <td style="text-align:center;">' . $Entry->getReadCount() . '</td>
            </tr>';
        }

        return array(
            array(
                'title' => $this->trans('Laatste blog berichten', 'cms'),
                'class' => '',
                'content' => '<table><tr><th style="text-align:left;">' . $this->trans('Post', 'cms') .'</th><th style="width:60px;text-align:center;">' . $this->trans('Gelezen', 'cms').'</th></tr>' . $responses . '</table>' .
                    ($Blog ? '<div style="text-align:center;padding:20px 0 10px 0;"><a href="' . $this->generateUrl('admin_mod_blog_entry_edit', array('id' => $Blog->getId())) . '" class="btn">'.$this->trans('Nieuw bericht', 'cms').'</a></div>' : '')
            ),
        );
    }
}
