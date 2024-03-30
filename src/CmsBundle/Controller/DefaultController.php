<?php

namespace App\CmsBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\CmsBundle\Classes\Postcode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends StorageController
{

    /**
     * Show dashboard blocks
     *
     * @return array List of blocks
     */
    public function dashboardBlocks(){

        $users = array('added' => array(), 'lastactive' => array());
        foreach($this->em->getRepository('CmsBundle:User')->getLatest(5) as $User){
            $users['added'][$User->getId()] = $User;
            $users['lastactive'][$User->getLastLogin('')->getTimestamp()] = $User;
        }
        krsort($users['added']);
        krsort($users['lastactive']);

        $added = '';
        $lastactive = '';

        foreach($users['added'] as $User){
            $added .= '<tr>
                <td><a href="#">' . $User->getName() . '</a></td>
                <td><a href="mailto:' . $User->getEmail() . '">' . $User->getEmail() . '</a></td>
            </tr>';
        }

        foreach($users['lastactive'] as $User){
            $lastactive .= '<tr>
                <td><a href="#">' . $User->getName() . '</a></td>
                <td><a href="mailto:' . $User->getEmail() . '">' . $User->getEmail() . '</a></td>
                <td style="text-align:center;">' . $User->getLastLogin() . '</td>
            </tr>';
        }

        return array(
            array(
                'title' => 'Gebruiker',
                'class' => '',
                'content' => '<table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th style="width:110px;text-align:left;">Gebruiker</th>
                            <th style="text-align:left;">E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        ' . ($added ? $added : '<tr><td colspan="2" style="text-align:center;">Geen gegevens beschikbaar</td></tr>') . '
                    </tbody>
                </table>'
            ),
            array(
                'title' => 'Laatste gebruikers',
                'class' => '',
                'content' => '<table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th style="width:110px;text-align:left;">Gebruiker</th>
                            <th style="text-align:left;">E-mail</th>
                            <th style="text-align:left;">Laatste inlog</th>
                        </tr>
                    </thead>
                    <tbody>
                        ' . ($lastactive ? $lastactive : '<tr><td colspan="2" style="text-align:center;">Geen gegevens beschikbaar</td></tr>') . '
                    </tbody>
                </table>'
            ),
        );
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request)
    {
        $redirect = $this->containerInterface->get('session')->get('redirect');

        $this->containerInterface->get('security.token_storage')->setToken(null);
        $this->containerInterface->get('session')->invalidate();




        /*$this->containerInterface->get('security.context')->setToken(null);
        $this->containerInterface->get('session')->invalidate();*/

        /*$response = new RedirectResponse($this->generateUrl('dn_send_me_the_bundle_confirm', array(
        'token' => $token
        )));
        // Clearing the cookies.
        $cookieNames = [
        $this->containerInterface->getParameter('session.name'),
        $this->containerInterface->getParameter('session.remember_me.name'),
        ];
        foreach ($cookieNames as $cookieName) {
        $response->headers->clearCookie($cookieName);
        }*/


        $this->clearNavCache();


        if($redirect){
            // $this->containerInterface->get('session')->set('redirect', null);
            // return $this->redirectToRoute($redirect);
        }

        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/postcode-api", name="postcode_api")
     */
    public function postcode(Request $request, $path = null, $file = null)
    {
        parent::init($request);

        if($request->isXmlHttpRequest()) {
            // Only allow XHR
            $result = null;
            if(!empty($_GET['postalcode']) && !empty($_GET['number'])){
                $PostalCode = new Postcode($this->Settings);
                $result = $PostalCode->fetch($_GET['postalcode'], $_GET['number']);
            }

            return new JsonResponse($result, 200);
        }
        
        return $this->redirect($this->generateUrl('homepage'));
    }

    /**
     * @Route("/doc/{path}/{file}", name="doc")
     */
    public function doc(Request $request, $path = null, $file = null)
    {
        // dump($path);
        // dump($file);
        // dd('..');
        $Media = $this->getDoctrine()->getRepository('CmsBundle:Media')->findOneBy(['path' => $path . '/' . $file]);
        if(!empty($Media)){
			if(in_array('TrinityWebshopBundle' , $this->installed)){
				$productFiles = $this->getDoctrine()->getRepository('TrinityWebshopBundle:ProductFile')->findOneBy(['media' => $Media]);
				if(!empty($productFiles)){
					throw $this->createNotFoundException('Document does not exist.');
				}
			}

            $uploadpath = str_replace('src/CmsBundle/Controller', '', __DIR__) . 'public/uploads';
            $filename = $Media->getLabel();
            $filepath = $uploadpath . '/' . $Media->getType() . '/' . $Media->getPath();

            if(file_exists($filepath)){
                //Define header information
                header('Content-Description: File Transfer');
                header('Content-Type: ' . $Media->getMime());
                header("Cache-Control: no-cache, must-revalidate");
                header("Expires: 0");
                header('Content-Disposition: attachment; filename="'.basename($filename).'"');
                header('Content-Length: ' . $Media->getSize());
                header('Pragma: public');
        
                //Clear system output buffer
                flush();
        
                //Read the size of the file
                readfile($filepath);
        
                //Terminate from the script
                die();
            }

            throw $this->createNotFoundException('Document does not exist.');
        }

        throw $this->createNotFoundException('Document does not exist.');
    }

    /**
     * @Route("/secure/{dir1}/{dir2}/{file}", name="secure")
     */
    public function secureAction(Request $request, $dir1 = null, $dir2 = null, $file = null)
    {
        parent::init($request);

        $path = [];
        if(!empty($dir1)) $path[] = $dir1;
        if(!empty($dir2)) $path[] = $dir2;
        if(!empty($file)) $path[] = $file;
        $path = implode('/', $path);

        $FirstPage = null;
        $tmp_pages = $this->getDoctrine()->getRepository('CmsBundle:Page')->findBy(array('page' => null, 'settings' => $this->Settings, 'enabled' => true), array('sort' => 'ASC'), 1);
        if(!empty($tmp_pages)){
            $FirstPage = $tmp_pages[0];
        }

        $metatags       = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->getBySystem(0, (int)$FirstPage->getId(), true);
        $systemMetatags = $this->getDoctrine()->getRepository('CmsBundle:Metatag')->getBySystem(1, false, false);

        // VALIDATE HOMEPAGE AS HIGHEST LEVEL
        $access = $FirstPage->getAccess();

        if($access != null){
            // Validate permissions
            if($access == 'login'){
                $checkRoles = $FirstPage->getAccessRoles();
                if($checkRoles){
                    if(!is_array($checkRoles)) $checkRoles = [$checkRoles];
                    $hasRoleAccess = false;
                    foreach($checkRoles as $role){
                        if($this->get('security.authorization_checker')->isGranted($role)){
                            $hasRoleAccess = true;
                            break;
                        }
                    }

                    if(!$hasRoleAccess){
                        if ($FirstPage->getAccessAllowLogin()) {
                            // LOGIN FORM

                            $hasLoginInvalidRoles = false;
                            if($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')){
                                $hasLoginInvalidRoles = true;
                            }

                            $lastUsername = '';
                            $error = null;

                            $FirstPage->setTitle($this->trans('Inloggen', [], 'frontend', $request->getLocale()));
                            $FirstPage->setLabel($this->trans('Inloggen', [], 'frontend', $request->getLocale()));

                            $FirstPage->requireAuth = true;

                            return $this->parse( '@Cms/page/page', $this->attributes([
                                'loginform'            => true,
                                'bodyClass'            => 'dynamic',
                                'loginUri'            => '/' . $path,
                                'Page'                 => $FirstPage,
                                'metatags'             => $metatags,
                                'systemMetatags'       => $systemMetatags,
                                'bundle_metatags'      => [],
                                'error'                => $error,
                                'last_username'        => $lastUsername,
                                'hasLoginInvalidRoles' => $hasLoginInvalidRoles,
                            ]));
                        }else{
                            throw $this->createAccessDeniedException('Permission denied');
                        }
                    }
                }
            }elseif($access == 'no-login'){
                if($this->get('security.authorization_checker')->isGranted('ROLE_USER')){
                    throw $this->createAccessDeniedException('Permission denied');
                }
            }
        }

        if(!empty($path)){
            $dir = str_replace('src/CmsBundle/Controller', 'secure/', __DIR__);
            if(file_exists($dir . $path)){
                $file = $dir . $path;

                header('Content-Type: application/octet-stream');
                header("Content-Transfer-Encoding: Binary"); 
                header("Content-disposition: attachment; filename=\"" . basename($file) . "\""); 
                readfile($file);
                exit;
            }
        }

        die('Invalid');
    }

    public function parse( $tpl, $args = array() ){
        $args[ 'Settings' ] = $this->Settings;
        $args[ 'languages' ] = $this->getDoctrine()->getRepository('CmsBundle:Language')->findAll();

        if( !isset($args[ 'bodyClass' ]) ) $args[ 'bodyClass' ] = 'sub';

        return $this->render($tpl . '.html.twig', $args);
    }

    /**
     * @Route("/nav-account", name="nav_account")
     */
    public function account(Request $request)
    {
        $logged_in = false;
        if(!empty($this->getUser())){
            $logged_in = true;
        }
        return new JsonResponse([
            'logged_in' => $logged_in
        ]);
    }

    /**
     * @Route("/admin/live", name="admin_live")
     */
    public function liveAction(Request $request)
    {
        parent::init($request);

        $Stats = new \App\CmsBundle\Classes\Matomo($this->Settings->getPiwikUrl(), $this->Settings->getPiwikApiHash(), $this->Settings->getPiwikSiteId());

        return new JsonResponse($Stats->getLive());
    }

    /**
     * @Route("/admin", name="admin")
     * @Template()
     */
    public function dashboardAction(Request $request)
    {
        parent::init($request);

        /*if($this->getUser() == null || (int)$this->getUser()->getId() < 1){
            return $this->redirectToRoute('admin_login');
        }*/

        $this->breadcrumbs->addRouteItem($this->trans("Dashboard", [], 'cms'), "admin");

        if(!$this->getUser()->checkPermissions('ALLOW_DASHBOARD') || empty($this->Settings->getPiwikUrl()) || empty($this->Settings->getPiwikApiHash())){
            if ($this->getUser()->checkPermissions('ALLOW_PAGE')) {
                return $this->redirectToRoute('admin_page');
            } else if ($this->getUser()->checkPermissions('ALLOW_BUNDLES')) {
                if ($this->getUser()->getLockinUri()) {
                    if(!preg_match('/^' . str_replace('/', '\\/', $this->getUser()->getLockinUri()) . '/', $request->getPathInfo())){
                        header('Location:' . preg_replace('/\/$/', '', $this->generateUrl('homepage')) . $this->getUser()->getLockinUri());
                        exit;
                    }
                } else {
                    $installed = array_merge($this->modRoutes);

                    sort($installed);

                    $found_route = 'admin_page';
                    foreach($installed as $i)
                    {
                        if ($i['route'] !== 'admin_mod_api') {
                            $found_route = $i['route'];
                            break;
                        }
                    }    

                    return $this->redirectToRoute($found_route);
                }
            } else if ($this->getUser()->checkPermissions('ALLOW_WEBSHOP')) {
                if ($this->getUser()->checkPermissions('ECOMM_DASHBOARD')) {
                    return $this->redirectToRoute('admin_mod_webshop');
                } else if ($this->getUser()->checkPermissions('ECOMM_SALES')) {
                    return $this->redirectToRoute('admin_mod_webshop_orders');
                } else if ($this->getUser()->checkPermissions('ECOMM_PRODUCTS')) {
                    return $this->redirectToRoute('admin_mod_webshop_products');
                } else if ($this->getUser()->checkPermissions('ECOMM_PROMOTIONS')) {
                    return $this->redirectToRoute('admin_mod_webshop_promotions');
                } else if ($this->getUser()->checkPermissions('ECOMM_CONFIG')) {   
                    return $this->redirectToRoute('admin_mod_webshop_config');
                }
            } else if ($this->getUser()->checkPermissions('ALLOW_REDIRECTS')) {
                return $this->redirectToRoute('admin_redirects');
            } else if ($this->getUser()->checkPermissions('ALLOW_NAVIGATION')) {
                return $this->redirectToRoute('admin_navigation');
            } else if ($this->getUser()->checkPermissions('ALLOW_MEDIA')) {
                return $this->redirectToRoute('admin_media');
            } else if ($this->getUser()->checkPermissions('ALLOW_USERS')) {
                return $this->redirectToRoute('admin_users');
            } else if ($this->getUser()->checkPermissions('ALLOW_CONFIGURATION')) {
                return $this->redirectToRoute('admin_settings');
            } else {
                parent::test_permissions($request, $this->getUser());
                throw $this->createNotFoundException($this->trans('This feature does not exist', [], 'cms'));
            }
        }

        $Stats = new \App\CmsBundle\Classes\Matomo($this->Settings->getPiwikUrl(), $this->Settings->getPiwikApiHash(), $this->Settings->getPiwikSiteId(), $this->language->getLocale());

        $start = date('Y-m-d');
        $end = date('Y-m-d');

        if(!empty($_GET['s']) && !empty($_GET['e'])){
            $start = $_GET['s'];
            $end = $_GET['e'];
        }

        $Stats->setRange($start, $end);

        $live = $Stats->getLive();
        $visitors = $Stats->getVisitors();
        $countries = $Stats->getCountries();
        $resolutions = $Stats->getResolutions();
        $referrers = $Stats->getReferrers();
        $moments = $Stats->getPopularMoments();
        $isp = $Stats->getISPs();

        return $this->attributes([
            'live' => $live,
            'visitors' => $visitors,
            'countries' => $countries,
            'resolutions' => $resolutions,
            'referrers' => $referrers,
            'moments' => $moments,
            'isp' => $isp,

            'start' => $start,
            'end' => $end,
        ]);
    }

    /**
     * @Route("/admin/blocks", name="admin_blocks")
     * @Template()
     */
    public function blocksAction(Request $request)
    {
        parent::init($request);

        $blocks = array();

        $dbb = $this->dashboardBlocks();
        foreach($dbb as $i => $b){
            $b['bundle'] = 'Trinity';
            $b['index'] = $i;
            $blocks[] = $b;
        }

        foreach($this->modRoutes as $i => $mod){
            /*
            [bundleName] => TrinityFormsBundle
            [route] => admin_mod_forms
            [path] => ../src/Trinity/FormsBundle/
            [name] => Forms
            */
            $controller = $this->containerInterface->get(strtolower($mod['bundleName']) . '_show');
            try{
                if(method_exists($controller, 'dashboardBlocks')){
                    $result = $controller->dashboardBlocks();
                    if(!empty($result) && is_array($result)){

                        foreach($result as $index => $r){
                            $result[$index]['bundle'] = $mod['name'];
                            $result[$index]['index'] = $index;
                        }

                        $blocks = array_merge($blocks, $result);
                    }
                }
            }catch(\Exception $e){dump($e);}
        }

        return $this->attributes([
            'blocks' => $blocks
        ]);
    }

    /**
     * @Route("/admin/block/{bundle}/{index}", name="admin_block")
     * @Template()
     */
    public function blockAction(Request $request, $bundle = '', $index = 0)
    {
        parent::init($request);

        $User = $this->getUser();
        $linked = $User->getDashboardBlocks();
        if(!is_array($linked)){
            $linked = [];
        }

        $block = array();

        if(strtolower($bundle) == 'trinity'){
            $dbb = $this->dashboardBlocks();
            foreach($dbb as $i => $b){
                if($index == $i){
                    $b['bundle'] = 'Trinity';
                    $b['index'] = $i;
                    $block = $b;
                    break;
                }
            }
        }else{
            foreach($this->modRoutes as $mod){
                if(strtolower($mod['name']) != $bundle){
                    continue;
                }
                // if($index == $index){
                    // dump($mod);
                    /*
                    [bundleName] => TrinityFormsBundle
                    [route] => admin_mod_forms
                    [path] => ../src/Trinity/FormsBundle/
                    [name] => Forms
                    */
                    $controller = $this->containerInterface->get(strtolower($mod['bundleName']) . '_show');
                    try{
                        if(method_exists($controller, 'dashboardBlocks')){
                            $result = $controller->dashboardBlocks();
                            if(!empty($result) && is_array($result)){

                                foreach($result as $i => $r){
                                    if($index == $i){
                                        $result[$i]['bundle'] = $mod['name'];
                                        $result[$i]['index'] = $i;
                                        $block = $result[$i];
                                        break;
                                    }else{
                                        continue;
                                    }
                                }
                            }
                        }
                    }catch(\Exception $e){dump($e);}
                    // break;
                // }
            }
        }

        $needle = strtolower($block['bundle']) . '-' . $block['index'];
        if(!in_array($needle, $linked)){
            $linked[] = $needle;
        }

        $em = $this->getDoctrine()->getManager();
        $User->setDashboardBlocks($linked);
        $em->persist($User);
        $em->flush();

        return new JsonResponse($block);
    }

    /**
     * @Route("/spotlight/search/{q}", name="spotlight_search")
     * @Template()
     */
    public function spotlightSearch(Request $request, EntityManagerInterface $em, $q = ''){
        parent::init($request);
        $results = array();

        // PAGES
        $pages = $em->getRepository('CmsBundle:Page')->search($q, $this->language);
        if(count($pages) > 0){
            $results['Pagina\'s'] = array();
            foreach($pages as $page){ $results['Pagina\'s'][$this->generateUrl('admin_page_edit', array('id' => $page->getId()))] = $page->getLabel(); }
        }

        if(in_array('WebshopBundle', $this->installed)){
            // PRODUCTS
            $products = $em->getRepository(\App\Trinity\WebshopBundle\Entity\Product::class)->searchSimple($q);
            if(count($products) > 0){
                $results['Producten'] = array();
                foreach($products as $Product){ $results['Producten'][$this->generateUrl('admin_mod_webshop_products_edit', array('id' => $Product->getId()))] = $Product->getLabel() . '<span class="subtitle">(' . $Product->getTypeLabel() . ' product)</span>'; }
            }

            // PRODUCT CATEGORY
            $categories = $em->getRepository(\App\Trinity\WebshopBundle\Entity\Category::class)->searchSimple($q);
            if(count($categories) > 0){
                $results['Categorieën'] = array();
                foreach($categories as $Category){ $results['Categorieën'][$this->generateUrl('admin_mod_webshop_categories_edit', array('id' => $Category->getId()))] = $Category->getLabel() . '<span class="subtitle">(Bevat ' . $Category->getProducts()->count() . ' producten)</span>'; }
            }
        }

        // USERS
        $users = $em->getRepository('CmsBundle:User')->search($q);
        if(count($users) > 0){
            $results['Gebruikers'] = array();
            foreach($users as $user){ $results['Gebruikers'][$this->generateUrl('admin_users_edit', array('id' => $user->getId()))] = $user->getFirstname() . ' ' . $user->getLastname() . ' (' . $user->getUsername() . ')'; }
        }

        // MEDIA
        $media = $em->getRepository('CmsBundle:Media')->search($q);
        if(count($media) > 0){
            $results['Media'] = array();
            foreach($media as $Media){ $results['Media'][$this->generateUrl('admin_media_view', array('id' => $Media->getId()))] = $Media->getLabel(); }
        }

        // MEDIADIRS
        $mediadirs = $em->getRepository('CmsBundle:Mediadir')->search($q);
        if(count($mediadirs) > 0){
            $results['Media albums'] = array();
            foreach($mediadirs as $Mediadir){ $n = $Mediadir->countMedia(); $results['Media albums'][$this->generateUrl('admin_media', array('id' => $Mediadir->getId()))] = $Mediadir->getLabel() . '<span class="subtitle">(' . $n . ' item' . ($n == 1 ? '' : 's') . ')</span>'; }
        }

        // TAGS
        $tags = $em->getRepository('CmsBundle:Tag')->search($q);
        if(count($tags) > 0){
            $results['Tags'] = array();
            foreach($tags as $Tag){ $n = $Tag->totalCount(); $results['Tags'][$this->generateUrl('admin_tag_view', array('tag' => $Tag->getLabel()))] = $Tag->getLabel() . '<span class="subtitle">(' . $n . ' item' . ($n == 1 ? '' : 's') . ')</span>'; }
        }

        return new JsonResponse($results);
    }

    /**
     * @Route("/admin/feedback", name="admin_feedback")
     * @Template()
     */
    public function feedbackAction(Request $request)
    {

        $Webshop = $request->getSession()->get('webshop');

        $success = false;
        $error = false;
        if(!empty($_POST)){
            // set url
            $url = 'https://gitlab.com/api/v4/projects/4636464/issues';

            $fields = [
                'title' => $_POST['title'],
                'description' => $_POST['description'] . (!empty($_POST['location']) ? "\n\n**URL:**\n" . $_POST['location'] : ''),
                'labels' => $_POST['type'] . ',' . $_POST['priority'] . (!empty($_POST['tags']) ? ',' . $_POST['tags'] : ''),
            ];

            $fields_string = '';
            foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
            rtrim($fields_string, '&');

            if(substr($fields_string, -1) == '&'){
                $fields_string = substr($fields_string, 0, -1);
            }

            //open connection
            // ob_start();
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);

            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
            curl_setopt($ch, CURLOPT_POST, count($fields));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array('PRIVATE-TOKEN: LXuhvfs7kUXZzhLt1dyH'));

            $result = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // curl_close($ch);
            // ob_end_clean();

            if($httpcode > 201){
                $success = false;
                $error = 'Uw feedback kan niet worden verstuurd door een systeemfout. [' . $httpcode . ']';
            }else{
                $success = true;
            }
        }

        // $r = $this->containerInterface->get('session')->get('last_route');
        return [
            'success' => $success,
            'error'   => $error
        ];
    }

    /**
     * @Route("/admin/switchlanguage/{locale}/{msite}", name="admin_switch_language")
     */
    public function languageSwitchAction(Request $request, $locale = 'nl', $msite = 0){
        $url = urldecode($_GET['url']);

        $isAdmin = preg_match('/(^admin_|^admin$)/', $request->get('_route'));

        $session_name = '_locale';
        if($isAdmin){
            $session_name = 'admin_locale';
        }

        $request->getSession()->set($session_name, $locale);
        $request->setLocale($request->getSession()->get($session_name, 'nl'));

        if(!empty($msite)){
            $request->getSession()->set('admin_msite', $msite);
        }else{
            $request->getSession()->set('admin_msite', null);
        }

        $User = $this->getUser();
        $User->setLocale($locale);
        $em = $this->getDoctrine()->getManager();
        $em->persist($User);
        $em->flush();

        return $this->redirect($url);
    }

    /**
     * @Route("/admin/about", name="admin_about")
     * @Template()
     */
    public function aboutAction(Request $request){
        parent::init($request);

        $this->breadcrumbs->addItem($this->trans("Over " . $this->containerInterface->getParameter('trinity_title'), [], 'cms'), $this->containerInterface->get("router")->generate("admin_about"));

        $changelog_file = str_replace('/Controller', '/CHANGELOG.md', __DIR__);

        $Parsedown = new \App\CmsBundle\Classes\Parsedown();
        $date = new \DateTime();
        $date->setTimestamp(filemtime($changelog_file));

        $bundle_changelogs = [];
        $bundle_changelogs_dates = [];
        $bundleDir = str_replace('/CmsBundle/Controller', '/Trinity/', __DIR__);
        foreach(scandir($bundleDir) as $dir){
            $bundle = $bundleDir . $dir . '/';
            if(preg_match('/.*?\.[a-zA-Z]+\//', $bundle)){
                if(is_dir($bundle) && substr($dir, 0, 1) != '.'){
                    $clfile = $bundle . 'CHANGELOG.md';
                    if(file_exists($clfile)){
                        $bundle_changelogs[$dir] = $Parsedown->text(file_get_contents($clfile));

                        $b_date = new \DateTime();
                        $b_date->setTimestamp(filemtime($clfile));

                        $bundle_changelogs_dates[$dir] = $b_date;
                    }
                }
            }
        }

        return $this->attributes([
            'changelog' => $Parsedown->text(file_get_contents($changelog_file)),
            'date' => $date,
            'bundle_changelogs' => $bundle_changelogs,
            'bundle_changelogs_dates' => $bundle_changelogs_dates,
        ]);
    }

    /**
     * @Route("/admin/doc/download/{bundle}", name="admin_doc_download")
     */
    public function docDownloadAction(Request $request, $bundle = null){
        parent::init($request);

        $availableDocs = ['cms' => '../src/CmsBundle/docs/'];

        $dlBundle = $bundle;

        foreach($this->installed as $bundle){
            $bundleClean = str_replace('bundle', '', strtolower($bundle));
            $bundlePath = '../src/Trinity/' . $bundle . '/docs/';
            if(file_exists($bundlePath)){
                if(!empty($this->modRoutes[ucfirst($bundleClean)])){
                    $availableDocs[$bundleClean] = $bundlePath;
                }
            }
        }

        if(!empty($dlBundle)){
            $custom = [$dlBundle => $availableDocs[$dlBundle]];
            $availableDocs = $custom;
        }

        $pdf = new \App\CmsBundle\Classes\Pdf();

        foreach($availableDocs as $bundle => $path){
            $files = scandir($path);
            $file_list = ['intro.md'];
            foreach($files as $f){
                if(substr($f, -3) == '.md' && $f != 'nav.md' && $f != 'intro.md'){
                    $file_list[] = $f;
                }
            }

            sort($file_list);


            if($bundle != 'cms'){
                $details = $this->modRoutes[ucfirst($bundle)];
            }else{
                $details = ['name' => $this->containerInterface->getParameter('trinity_title')];
            }

            $pdf->title = $details['name'];
            $pdf->SetTopMargin(30);
            $pdf->SetFooterMargin(30);



            foreach($file_list as $f){

                $pdf->AddPage();

                $Parsedown = new \App\CmsBundle\Classes\Parsedown();
                $data = $Parsedown->text(file_get_contents($path . $f));
                $pdf->WriteHtml($data);
                
                $pdf->title = null;
                $pdf->SetTopMargin(10);
            }
        }

        $pdf->Output('trinity_doc.pdf', 'I');

        exit;
    }

    /**
     * @Route("/admin/doc/{viewbundle}", name="admin_doc")
     * @Template()
     */
    public function docAction(Request $request, $viewbundle = null){
        parent::init($request);

        $colors = [ 'green', 'pink', 'blue', 'purple', 'primary', 'orange' ];

        $availableDocs = [
            'cms' => [
                'path' => '../src/CmsBundle/docs/',
                'label' => $this->containerInterface->getParameter('trinity_title'),
                'icon' => 'fas fa-toolbox',
                'route' => 'admin',
                'color' => $colors[0],
            ]
        ];

        $colorIndex = 1;
        foreach($this->installed as $bundle){
            $bundleClean = str_replace('bundle', '', strtolower($bundle));
            $bundlePath = '../src/Trinity/' . $bundle . '/docs/';
            if(file_exists($bundlePath)){

                if(!empty($this->modRoutes[ucfirst($bundleClean)])){
                    $details = $this->modRoutes[ucfirst($bundleClean)];

                    $availableDocs[$bundleClean] = [
                        'path' => $bundlePath,
                        'label' => $details['name'],
                        'icon' => $details['icon'],
                        'route' => $details['route'],
                        'color' => $colors[$colorIndex],
                    ];

                    $colorIndex++;
                }
            }
        }

        $navData = '';
        $introData = '';
        $docData = [];

        if($viewbundle){

            $docData = $availableDocs[$viewbundle];
            $docDir = $docData['path'];

            // Main navigation
            $navFile = $docDir . 'nav.md';
            $Parsedown = new \App\CmsBundle\Classes\ParsedownBootstrap();
            $navData = $Parsedown->text(file_get_contents($navFile));

            // Intro
            $introFile = $docDir . 'intro.md';
            $Parsedown = new \App\CmsBundle\Classes\ParsedownBootstrap();
            $introData = $Parsedown->text(file_get_contents($introFile));

        }

        return $this->attributes([
            'bundle'        => $viewbundle,
            'docData'       => $docData,
            'introData'     => $introData,
            'navData'       => $navData,
            'availableDocs' => $availableDocs,
        ]);
    }

    /**
     * @Route("/admin/doc/loader/{key}", name="admin_doc_loader")
     */
    public function docLoaderAction(Request $request, $key = null){
        parent::init($request);

        $docDir = '../src/CmsBundle/docs/';

        if(file_exists($docDir . $key . '.md')){
            $Parsedown = new \App\CmsBundle\Classes\ParsedownBootstrap();
            $content = $Parsedown->text(file_get_contents($docDir . $key . '.md'));
        }else{
            $content = 'No such file: <strong>' . $docDir . $key . '.md</strong>.';
        }

        echo $content;

        exit;
    }

    /**
     * @Route("/admin/features", name="admin_features")
     * @Template()
     */
    public function featuresAction(Request $request, $key = null){
        parent::init($request);

        $this->breadcrumbs->addItem($this->trans("Features", [], 'cms'), $this->get("router")->generate("admin_features"));

        return $this->attributes([
            'xmas' => new \DateTime('25-12-2020 17:00:00'),
            'post' => $_POST,
        ]);
    }

    private function clearNavCache(){


        $realCacheDir = $this->containerInterface->getParameter('kernel.cache_dir');

        // Page caching in prod
        $pageCacheFile = str_replace('/dev', '/prod', $realCacheDir) . '/';
        foreach(scandir($pageCacheFile) as $f){
            if(is_file($pageCacheFile . $f) && preg_match('/page_structure$/', $f)){
                if(file_exists($pageCacheFile . $f)){
                    unlink($pageCacheFile . $f); // Relete cache file
                }
            }
        }
    }
}
