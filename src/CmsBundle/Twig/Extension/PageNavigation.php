<?php
namespace App\CmsBundle\Twig\Extension;

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\RouterInterface;
// use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\AbstractExtension;

class PageNavigation extends AbstractExtension {
    /**
     * @var EntityManager
     */
    private $em;
    private $generator;
    private $request;
    private $authCheck;
    private $language = null;
    private $ActivePage;
    private $Settings;
    private $pageParentList = [];

    public function __construct(EntityManagerInterface $em, RouterInterface $generator, AuthorizationCheckerInterface $authCheck, RequestStack $requestStack = null){
        $this->em = $em;
        $this->generator = $generator;
        $this->authCheck = $authCheck;

        if(!empty($requestStack)){
            $this->setRequest($requestStack);
        }
    }

    public function setRequest(RequestStack $request_stack)
    {
        $this->request = $request_stack->getCurrentRequest();
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions() {
        return array(
            new \Twig\TwigFunction('cms_navigation', array($this, 'navigation'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('custom_navigation', array($this, 'custom_navigation'), array('is_safe' => array('html')))
        );
    }

    /**
     * @return string
     */
    public function custom_navigation ($key, $extraClass = '', $container = true){

        // THIS should be in setRequest() but needs more testing. And other Settings queries need to be adapted.
        $language = $this->em->getRepository('CmsBundle:Language')->findOneBy(['locale' => $this->request->getLocale()]);




		$lookupHost = preg_replace('/:\d+/', '', $_SERVER['HTTP_HOST']);
        if(file_exists('../alias.json')){
            $alias = json_decode(file_get_contents('../alias.json'), true);
            foreach($alias as $alias_parent => $aliasses){
                if(in_array($lookupHost, $aliasses)){ $lookupHost = $alias_parent; }
            }
        }

        if($this->request && preg_match('/(\/[a-z]{2})(\/.*?)?$/', $this->request->getPathInfo(), $m)){
            $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['base_uri' => $m[1]]);
        }else{
            $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($language, str_replace('www.', '', $lookupHost));
            if (empty($this->Settings)) {
                $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['base_uri' => '']);
            }
        }

        if(empty($this->Settings)){
            $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneByLanguage($this->language);
        }

        if(empty($this->Settings)){
            $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy([], ['id' => 'asc']);
        }

        $this->language = $this->Settings->getLanguage();

        // Find first page
        $this->ActivePage = null;
        $tmp_page = $this->em->getRepository('CmsBundle:Page')->findOneBy(array('page' => null, 'settings' => $this->Settings, 'language' => $this->language, 'enabled' => true), array('sort' => 'ASC'), 1);
        if(!empty($tmp_page)){
            $this->ActivePage = $tmp_page;
        }

        if($this->request){
            $currentRoute = $this->request->get('_route');
        }else{
            $currentRoute = 'homepage';
        }
        if($currentRoute == 'homepage'){
            $AP = $this->ActivePage;
        }else{
            $AP = $this->em->getRepository('CmsBundle:Page')->findOneBy(['slugkey' => $currentRoute, 'language' => $this->language]);
            if(empty($AP)){
                try{
                    $AP = $this->em->getRepository('TrinityWebshopBundle:Category')->findOneBy(['slug_key' => $currentRoute]);
                }catch(\Exception $e){}
            }
        }

        $bs5 = false;
        if($extraClass == 'bootstrap-5'){
            $bs5 = true;
        }

        $Navigation = $this->em->getRepository('CmsBundle:Navigation')->findOneBy(['short' => $key, 'language' => $this->language]);
        if($Navigation){
            if($container){
                if($bs5){
                    $return = '<div class="list-group">';
                }else{
                    $return = '<ul class="' . $extraClass . ' custom-nav key-' . $key . '">';
                }
            }else{
                $return = '';
            }
            $rootItems = $this->em->getRepository('CmsBundle:NavigationItem')->findBy(['navigation' => $Navigation, 'parent' => null], ['position' => 'asc']);
            $return .= $this->custom_navigation_items($rootItems, 0, $AP, $bs5);
            if($container){
                if($bs5){
                    $return .= '</div>';
                }else{
                    $return .= '</ul>';
                }
            }
            return $return;
        }
        return '<!-- ONGELDIG MENU: "' . $key . '" -->';
    }

    /**
     * @return string
     */
    public function custom_navigation_items ($items, $depth = 0, $AP = null, $bs5 = false){
        $return = '';
        foreach($items as $Item){
            $hasChildren = $Item->getChildren()->count();
            $realCat = false;
            $active = '';
            if($Item instanceof \Trinity\WebshopBundle\Entity\Category){
                // Skip WebShop category which has navigation disabled.
                if (!$Item->getNavigation()) {
                    continue;
                }
                $P = $Item;
                $type = 'category';
                // $hasChildren = $P->getChildren()->count();
                $realCat = true;
                $active = ($P == $AP);
            }else{
                $P = $Item->getObject($this->em);

                if(empty($P) && $Item->getType() != 'anchor' && $Item->getType() != 'custom_page'){
                    continue;
                }

                $type = $Item->getType();
                if($type == 'category'){
                    $active = ($P == $AP);
                    if($Item->getNavigation()->getSubWebshopCats()){
                        $hasChildren = $P->getChildren()->count();
                    }
                }else if($type == 'page'){
                    $active = ($P == $AP);

                    if(!$P->getEnabled() || !$P->getVisible()){
                        continue;
                    }
                }
            }
            // Only add <li> if we have a item to add
            if($P || ($Item->getType() == 'anchor' || $Item->getType() == 'custom_page')) {
                if(!$bs5){
                    $return .= '<li class="' . ( $hasChildren ? 'drop has-children' : '') . ' ' . $this->toAscii($Item->getLabel()) . ' ' . ($active ? 'active' : '' ) . '">';
                }
            }

            if($P){
                if($type != "category"){
                    if ($P->getPageType() == 'external' && !empty($P->getCustomUrl())) {
                        $url = $P->getCustomUrl();
                        $target = ((!empty($P->getTarget()) && $P->getTarget() == '_blank') ? 'target="' . $P->getTarget() . '"' : '');
                    } else {
                        $url = $this->generator->generate($P->getSlugKey());
                        $target = '';
                    }
                } else {
                    $url = $this->generator->generate($P->getSlugKey());
                    $target = '';
                }
                if($bs5){
                    $return .= ($realCat == false && $Item->getLocked() ? '<a class="item-locked">' : '<a href="' . $url . '" ' . $target . ' class="' . ($active ? 'active' : '' ) . ' list-group-item list-group-item-action" aria-current="true">') . $Item->getLabel() . ($realCat == false && $Item->getLocked() ? '</a>' : '</a>');
                }else{
                    $return .= ($realCat == false && $Item->getLocked() ? '<a class="item-locked">' : '<a href="' . $url . '" ' . $target . '>') . $Item->getLabel() . ($realCat == false && $Item->getLocked() ? '</a>' : '</a>');
                }
            }else if($Item->getType() == 'anchor'){
                $return .= ($realCat == false && $Item->getLocked() ? '<a class="item-locked">' : '<a href="#' . $Item->getSlug() . '">') . $Item->getLabel() . ($realCat == false && $Item->getLocked() ? '</a>' : '</a>');
            }else if($Item->getType() == 'custom_page'){
                $return .= ($Item->getLocked() ? '<a class="item-locked">' : '<a'.($Item->getNewTab() ? ' target="blank"' : '').' href="' . $Item->getSlug() . '">') . $Item->getLabel() . ($Item->getLocked() ? '</a>' : '</a>');
            }

            if($hasChildren){
                $return .= '<span class="togglesub"><i></i></span>';
            }

            if($type == 'category' && $Item->getNavigation()->getSubWebshopCats()){
                $Category = clone $P;
                if($Category->getChildren()->count()){
                    $return .= '<ul class="has-parent sub dropdown depth-' . $depth . '">';
                    foreach($Category->getChildren() as $ChildCat){
                        $return .= '<li class="' . $this->toAscii($ChildCat->getLabel()) . '"><a href="' . $this->generator->generate('homepage') . (!empty($this->Settings->getBaseUri()) ? substr($this->Settings->getBaseUri(), 1) . '/' : '') . $ChildCat->getUri() . '">' . $ChildCat->getLabel() . '</a></li>';
                    }
                    $return .= '</ul>';
                }
            }else
            if($hasChildren){
                $return .= '<ul class="has-parent sub dropdown depth-' . $depth . '">';
                $return .= $this->custom_navigation_items($Item->getChildren(), ($depth + 1), $AP, $bs5);
                $return .= '</ul>';
            }
            // Only add </li> if we have a item to add
            if($P || ($Item->getType() == 'anchor' || $Item->getType() == 'custom_page')) {
                if(!$bs5){
                    $return .= '</li>';
                }
            }
        }
        // die();
        $return .= '';
        return $return;
    }

    /**
     * @return string
     */
    public function navigation ($additionalClass = '', $additionalId = '', $outerWrapper = 1, $includeSubmenu = true, $parent = 0, $activePageId = 0, $startFromLevel = 1, $startFromInversed = false) {

        // THIS should be in setRequest() but needs more testing. And other Settings queries need to be adapted.
        $language = $this->em->getRepository('CmsBundle:Language')->findOneBy(['locale' => $this->request->getLocale()]);

		$lookupHost = preg_replace('/:\d+/', '', $_SERVER['HTTP_HOST']);
        if(file_exists('../alias.json')){
            $alias = json_decode(file_get_contents('../alias.json'), true);
            foreach($alias as $alias_parent => $aliasses){
                if(in_array($lookupHost, $aliasses)){ $lookupHost = $alias_parent; }
            }
        }

        if($this->request && !empty($this->request) && preg_match('/(\/[a-z]{2})(\/.*?)?$/', $this->request->getPathInfo(), $m)){
            $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['base_uri' => $m[1]]);
        }else{
            $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($language, str_replace('www.', '', $lookupHost));
            if (empty($this->Settings)) {
                $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['base_uri' => '']);
            }
        }

        if(empty($this->Settings)){
            $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneByLanguage($this->language);
        }

        if(empty($this->Settings)){
            $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy([], ['id' => 'asc']);
        }

        $this->language = $this->Settings->getLanguage();

        $locale = $this->language->getLocale();

        $AP = false;
        if($activePageId > 0){
            $AP = $this->em->getRepository('CmsBundle:Page')->find($activePageId);
        }

        // Find first page
        $this->ActivePage = null;
        $tmp_page = $this->em->getRepository('CmsBundle:Page')->findOneBy(array('page' => null, 'settings' => $this->Settings, 'language' => $this->language, 'enabled' => true), array('sort' => 'ASC'), 1);
        if(!empty($tmp_page)){
            $this->ActivePage = $tmp_page;
        }

        if($AP == false){
            if($this->request){
                $currentRoute = $this->request->get('_route');
            }else{
                $currentRoute = 'homepage';
            }
            if($currentRoute == 'homepage'){
                $AP = $this->ActivePage;
            }else{
                $AP = $this->em->getRepository('CmsBundle:Page')->findOneBy(['slugkey' => $currentRoute, 'settings' => $this->Settings, 'language' => $this->language]);
            }
        }

        $pageCacheFileName = implode('', [
            $locale . '_',
            ($additionalClass ? $additionalClass . '_' : '_'),
            ($additionalId ? $additionalId . '_' : '_'),
            (int)$parent . '_',
            (int)$startFromLevel . '_',
            ($startFromLevel > 1 && $AP && $AP->hasPage() ? $AP->getPage()->getId() : '') . '_',
            '_page_structure'
        ]);

        $pageCacheFile = str_replace('src/CmsBundle/Twig/Extension', 'var/cache/prod/' . $pageCacheFileName, __DIR__);
        /* if(file_exists($pageCacheFile) && filesize($pageCacheFile) > 10){
            $c = file_get_contents($pageCacheFile);
            $c = preg_replace('/active\s?/', '', $c);
            if($AP){
                $parents = $AP->getParents();
                foreach($parents as $Parent){
                    $c = preg_replace('/(nav-link-' . $Parent->getId()  .'".*?class=")/', '$1active ', $c);
                    $c = preg_replace('/(nav-item-' . $Parent->getId()  .'".*?class=")/', '$1active ', $c);
                }
                $c = preg_replace('/(nav-link-' . $AP->getId()  .'".*?class=")/', '$1active ', $c);
                $c = preg_replace('/(nav-item-' . $AP->getId()  .'".*?class=")/', '$1active ', $c);
            }

            return $c;
        } */

        /*$locale = $session->get('_locale');
        if($locale){
            $this->language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale);
        }else{
            $this->language = $this->languages[0];
        }*/

        $this->pageParentList = [];
        if($AP){
            $par = $AP;
            while($par->getPage() != null){
                $P = $par->getPage();
                $this->pageParentList[] = $P->getId();
                $par = $P;
            }
        }

        $ParentPage = null;
        $depth = 0;
        if($parent > 0){
            $ParentPage = $this->em->getRepository('CmsBundle:Page')->find($parent);
            $depth = 1;
        }else if($startFromLevel > 1){
            $list = [];
            if(!empty($AP)){
                $list = $AP->getParents();
            }
            if(count($list) > 0){
                if ($startFromInversed) {
                    $ParentPage = $list[$startFromLevel - 2];
                }else{
                    $ParentPage = (!empty($list[$startFromLevel]) ? $list[$startFromLevel] : end($list));
                }
                $depth = ($startFromLevel-1);
            }else{
                $ParentPage = $AP;
                $depth = 1;
            }
        }

        $return = $this->parsePagesByParentid($ParentPage, $depth, $additionalClass, $additionalId, $outerWrapper, $includeSubmenu, $parent = 0, $AP, $startFromLevel, $pageCacheFile);
        return $return;
    }

    private function parsePagesByParentid($ParentPage = null, $depth = 0, $additionalClass = '', $additionalId = '', $outerWrapper = 1, $includeSubmenu = true, $parent = 0, $AP = false, $startFromLevel = 0, $pageCacheFile = ''){
        $html = '';

        if($depth && $startFromLevel > 1){
            $tmp_pages = $this->em->getRepository('CmsBundle:Page')->findBy(array('language' => $this->Settings->getLanguage(), 'settings' => $this->Settings,'page' => $ParentPage, 'enabled' => true, 'visible' => true, 'base' => null), array('sort' => 'ASC'));
        }else{
            $tmp_pages = $this->em->getRepository('CmsBundle:Page')->findBy(array('language' => $this->Settings->getLanguage(), 'settings' => $this->Settings,'page' => $ParentPage, 'enabled' => true, 'visible' => true, 'base' => null), array('sort' => 'ASC'));
        }

        /*try {
            if(empty($tmp_pages) && (empty($this->authCheck) || !$this->authCheck->isGranted('ROLE_ADMIN') || $depth > 1)) return $html;
        } catch (\Exception $e) {
            if(empty($tmp_pages) && $depth > 1) return $html;
        }*/

        if(empty($tmp_pages)) return $html;

        if($depth > 0 || $outerWrapper) $html .= '<ul ' . (!empty($additionalId) ? 'id="' . $additionalId . '"' : '') . ' class="' . ($ParentPage ? 'has-parent ' : '') . ($depth == 0 ? 'main' : 'sub dropdown depth-' . $depth) . (!empty($additionalClass) ? ' ' . $additionalClass : '') . '">';
        foreach($tmp_pages as $Page){

            try {
                $access = $Page->getAccess();
                if($access != null && (!$Page->getAccessVisibleMenu() || $depth > 0)){
                    // Validate permissions
                    if($access == 'login'){
                        $checkRoles = $Page->getAccessRoles();
                        if($checkRoles){
                            if(!is_array($checkRoles)) $checkRoles = [$checkRoles];
                            $hasRoleAccess = false;
                            foreach($checkRoles as $role){
                                if($this->authCheck->isGranted($role)){
                                    $hasRoleAccess = true;
                                    break;
                                }
                            }

                            if(!$hasRoleAccess){
                                continue;
                            }
                        }
                    }elseif($access == 'no-login'){
                        if($this->authCheck->isGranted('ROLE_USER')){
                            continue;
                        }
                    }elseif($access == 'no-role'){
                        $checkRoles = $Page->getAccessRoles();
                        if($checkRoles){
                            if(!is_array($checkRoles)) $checkRoles = [$checkRoles];
                            $hasRoleAccess = false;
                            foreach($checkRoles as $role){
                                if($this->authCheck->isGranted($role)){
                                    $hasRoleAccess = true;
                                    break;
                                }
                            }

                            if($hasRoleAccess){
                                continue;
                            }
                        }
                    }
                }
            } catch (\Exception $e) {
                // Cannot verify login because of an error.
            }

            /*$TranslatedPage = $this->em->getRepository('CmsBundle:Page')->findOneBy(['base' => $Page, 'language' => $this->language]);
            $Base = $Page;
            if(!empty($TranslatedPage)){
                $Page = $TranslatedPage;
                $Base = $Page->getBase();
            }*/

            $target = $Page->getTarget();
            if(!empty($target)){
                $target = ' target="' . $target . '"';
            }

            if(!is_null($this->ActivePage) && $this->ActivePage->getId() == $Page->getId()){ // Homepage?
                $baseUri = $this->Settings->getBaseUri();
                if(!empty($baseUri)){
                    $url = $this->generator->generate('homepage') . substr($baseUri, 1);
                }else{
                    $url = $this->generator->generate('homepage');
                }
            }else{
                $url = '';

                // Fetch external URL if configured
                if($Page->getPageType() == 'external'){
                    $url = $Page->getCustomUrl();
                }

                // Fetch URL from first child
                if($Page->getPageType() == 'child'){
                    $FirstChild = $Page->getPages()->first();
                    if(!empty($FirstChild)){
                        $url = $this->generator->generate('homepage') . $this->em->getRepository('CmsBundle:Page')->getSlugPathByPage($FirstChild);

                        // Fetch external URL if configured
                        if($FirstChild->getPageType() == 'external'){
                            $url = $FirstChild->getCustomUrl();
                        }
                        // Fetch external URL if configured
                        if($FirstChild->getPageType() == 'child'){
                            $AnotherFirstChild = $FirstChild->getPages()->first();
                            $url = $this->generator->generate('homepage') . $this->em->getRepository('CmsBundle:Page')->getSlugPathByPage($AnotherFirstChild);
                        }
                    }
                }

                if(empty($url)){
                    $url = $this->generator->generate('homepage') . $this->em->getRepository('CmsBundle:Page')->getSlugPathByPage($Page);
                }
            }

            $hasChildren = ($Page->getPages()->count() > 0);

            if($hasChildren){
                $visibleChildCount = count($this->em->getRepository('CmsBundle:Page')->findBy(['page' => $Page, 'visible' => true, 'enabled' => true]));
                if($visibleChildCount == 0){
                    $hasChildren = false;
                }
            }

            $html .= '<li id="nav-item-' . $Page->getId() . '" class="' . ($hasChildren ? 'drop has-children' : '') . ' ' . $Page->getClasses() . ' ' . $Page->getSlugKey() . ' ' . ($AP && $AP->getId() == $Page->getId() ? 'active' : '' ) . ' ' . (in_array($Page->getId(), $this->pageParentList) ? 'active-parent' : '' ) . '"><a id="nav-link-' . $Page->getId() . '" class="' . ($AP && $AP->getId() == $Page->getId() ? 'active' : '' ) . '" href="' . $url . '"' . $target .'><span>' . $Page->getLabel() . '</span></a>' . ($hasChildren ? '<span class="togglesub"><i></i></span>' : '');
            if($includeSubmenu) $html .= $this->parsePagesByParentid($Page, ($depth + 1), '', '', 1, true, 0, $AP, $startFromLevel, $pageCacheFile);
            $html .= '</li>';
        }

        // $session = new Session();
		$lookupHost = preg_replace('/:\d+/', '', $_SERVER['HTTP_HOST']);
        if(file_exists('../alias.json')){
            $alias = json_decode(file_get_contents('../alias.json'), true);
            foreach($alias as $alias_parent => $aliasses){
                if(in_array($lookupHost, $aliasses)){ $lookupHost = $alias_parent; }
            }
        }

        try{
            if(!empty($this->authCheck) && $this->authCheck->isGranted('ROLE_ADMIN')){
                $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage('', str_replace('wwww.', '', $lookupHost));
                if($Settings->getInlineEdit()/* && $session->get('live_edit') == true*/){
                    $html .= '<li class="admin-page-add" data-path="' . $this->generator->generate('homepage') . ($ParentPage != null ? $this->em->getRepository('CmsBundle:Page')->getSlugPathByPage($ParentPage) : '') . '" data-parent="' . ($depth > 0 && $ParentPage != null ? $ParentPage->getId() : '') . '"><a title="Pagina toevoegen" href="#"><i class="fa fa-fw fa-plus-square"></i></a></li>';
                }
            }
        }catch(\Exception $e){
            // In any case other then above, don't show the page add function
        }

        if($depth > 0 || $outerWrapper) $html .= '</ul>';


        file_put_contents($pageCacheFile, $html);


        return $html;
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'cms_navigation';
    }

    /**
     * Convert to ASCII
     *
     * @param  string $str       Input string
     * @param  array  $replace   Replace these additional characters
     * @param  string $delimiter Space delimiter
     *
     * @return string
     */
    public function toAscii($str, $replace=array(), $delimiter='-') {
        /*
        $str = strtolower($str);

        if( !empty($replace) ) {
            $str = str_replace((array)$replace, ' ', $str);
        }

        if(function_exists('iconv')){
            $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        }else{
            $clean = $str;
        }
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

        return $clean;
        */

        if( !empty($replace) ) {
            $str = str_replace((array)$replace, ' ', $str);
        }

        $slugify = new \Cocur\Slugify\Slugify();

        return $slugify->slugify($str, $delimiter);
    }
}
