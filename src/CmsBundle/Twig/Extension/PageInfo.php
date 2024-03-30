<?php
namespace App\CmsBundle\Twig\Extension;

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;

class PageInfo extends AbstractExtension {
    /**
     * @var EntityManager
     */
    private $em;
    private $generator;
    private $authCheck;
    private $ActivePage;
    private $requestStack;
    private $container;

    public function __construct(EntityManagerInterface $em, RouterInterface $generator, AuthorizationCheckerInterface $authCheck, RequestStack $requestStack, ContainerInterface $container){
        $this->em = $em;
        $this->generator = $generator;
        $this->authCheck = $authCheck;
        $this->requestStack = $requestStack;
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions() {
        return array(
            new \Twig\TwigFunction('sitename', array($this, 'getSitename'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('mailheader', array($this, 'getMailheader'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('mailfooter', array($this, 'getMailfooter'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('logo', array($this, 'getLogo'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('logo_alt', array($this, 'getLogoAlt'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('breadcrumbs', array($this, 'getBreadcrumbs'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('page_label', array($this, 'getPageLabel'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('page_subtitle', array($this, 'getPageSubtitle'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('pagehref', array($this, 'getPageHref'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('pageurl', array($this, 'getPageUrl'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('pageimage', array($this, 'getPageImage'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('pagecontent', array($this, 'getPageContent'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('pageblocks', array($this, 'getPageBlocks'), array('is_safe' => array('html'), 'needs_environment' => true)),
            new \Twig\TwigFunction('pageblocks_meta', array($this, 'getPageBlocksMeta'), array('is_safe' => array('html'), 'needs_environment' => true)),
            new \Twig\TwigFunction('trinity_render', array($this, 'doRender'), array('is_safe' => array('html'), 'needs_environment' => true)),
            new \Twig\TwigFunction('phone', array($this, 'getPhone'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('facebook_url', array($this, 'getFacebookUrl'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('twitter_url', array($this, 'getTwitterUrl'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('youtube_url', array($this, 'getYoutubeUrl'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('instagram_url', array($this, 'getInstagramUrl'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('linkedin_url', array($this, 'getLinkedinUrl'), array('is_safe' => array('html'))),
            new \Twig\TwigFunction('fetch_entity', array($this, 'fetchEntity'), array('is_safe' => array('html'))),
        );
    }

    public function getFacebookUrl(){
        $request  = $this->container->get('request_stack')->getCurrentRequest();
        if(!empty($request)){
            $locale   = $request->getLocale();
        }else{
            $locale = 'nl';
            $Settings = null;
        }
        if($locale){ $Language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale); }else{ $Languages = $this->em->getRepository('CmsBundle:Language')->findAll(); $Language = $Languages[0]; }
        if (!empty($request)) { $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage(null, str_replace('www.', '', $request->getHttpHost())); }
        if(is_null($Settings) || is_null($Settings->getId())){ $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($Language); }
        return (!empty($Settings->getFacebook()) ? 'https://www.facebook.com/' . $Settings->getFacebook() : null);
    }

    public function getTwitterUrl(){
        $request  = $this->container->get('request_stack')->getCurrentRequest();
        if(!empty($request)){
            $locale   = $request->getLocale();
        }else{
            $locale = 'nl';
            $Settings = null;
        }
        if($locale){ $Language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale); }else{ $Languages = $this->em->getRepository('CmsBundle:Language')->findAll(); $Language = $Languages[0]; }
        if (!empty($request)) { $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage(null, str_replace('www.', '', $request->getHttpHost())); }
        if(is_null($Settings) || is_null($Settings->getId())){ $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($Language); }
        return (!empty($Settings->getTwitter()) ? 'https://twitter.com/' . $Settings->getTwitter() : null);
    }

    public function getYoutubeUrl(){
        $request  = $this->container->get('request_stack')->getCurrentRequest();
        if(!empty($request)){
            $locale   = $request->getLocale();
        }else{
            $locale = 'nl';
            $Settings = null;
        }
        if($locale){ $Language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale); }else{ $Languages = $this->em->getRepository('CmsBundle:Language')->findAll(); $Language = $Languages[0]; }
        if (!empty($request)) { $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage(null, str_replace('www.', '', $request->getHttpHost())); }
        if(is_null($Settings) || is_null($Settings->getId())){ $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($Language); }
        return (!empty($Settings->getYoutube()) ? 'https://www.youtube.com/' . $Settings->getYoutube() : null);
    }

    public function getInstagramUrl(){
        $request  = $this->container->get('request_stack')->getCurrentRequest();
        if(!empty($request)){
            $locale   = $request->getLocale();
        }else{
            $locale = 'nl';
            $Settings = null;
        }
        if($locale){ $Language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale); }else{ $Languages = $this->em->getRepository('CmsBundle:Language')->findAll(); $Language = $Languages[0]; }
        if (!empty($request)) { $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage(null, str_replace('www.', '', $request->getHttpHost())); }
        if(is_null($Settings) || is_null($Settings->getId())){ $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($Language); }
        return (!empty($Settings->getInstagram()) ? 'https://www.instagram.com/' . $Settings->getInstagram() : null);
    }

    public function getLinkedinUrl(){
        $request  = $this->container->get('request_stack')->getCurrentRequest();
        if(!empty($request)){
            $locale   = $request->getLocale();
        }else{
            $locale = 'nl';
            $Settings = null;
        }
        if($locale){ $Language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale); }else{ $Languages = $this->em->getRepository('CmsBundle:Language')->findAll(); $Language = $Languages[0]; }
        if (!empty($request)) { $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage(null, str_replace('www.', '', $request->getHttpHost())); }
        if(is_null($Settings) || is_null($Settings->getId())){ $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($Language); }
        return (!empty($Settings->getLinkedin()) ? 'https://www.linkedin.com/' . $Settings->getLinkedin() : null);
    }

    public function fetchEntity($bundle, $entity, $id){
        $Entity = null;
        if(is_numeric($id)){
            $selector = 'Trinity' . ucfirst(strtolower($bundle)) . 'Bundle:' . ucfirst(strtolower($entity));
            $Entity = $this->em->getRepository($selector)->find((int)$id);
        }
        return $Entity;
    }


    public function getPhone($clean = false){
        $request  = $this->container->get('request_stack')->getCurrentRequest();
        if(!empty($request)){
            $locale   = $request->getLocale();
        }else{
            $locale = 'nl';
            $Settings = null;
        }
        if($locale){ $Language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale); }else{ $Languages = $this->em->getRepository('CmsBundle:Language')->findAll(); $Language = $Languages[0]; }
        if (!empty($request)) { $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage(null, str_replace('www.', '', $request->getHttpHost())); }
        if(is_null($Settings) || is_null($Settings->getId())){ $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($Language); }

        $phone = $Settings->getPhone();
        if($clean){
            $phone = preg_replace('/[^0-9]+/', '', $phone);
        }

        return (!empty($phone) ? $phone : null);
    }

    /**
     * @return string
     */
    public function getPageHref ($slugkey) {
        try{
            if(is_numeric($slugkey)){
                $tmp_page = $this->em->getRepository('CmsBundle:Page')->findOneById($slugkey);
                if($tmp_page == null) throw new \Exception('Invalid page');
                $slugkey = $tmp_page->getSlugKey();
            }

            $url = $this->generator->generate($slugkey);
            // Find page by slugkey
            $tmp_pages = $this->em->getRepository('CmsBundle:Page')->findBy(array('slugkey' => $slugkey, 'enabled' => true), array('sort' => 'ASC'), 1);
            if(!empty($tmp_pages)){
                $Page = $tmp_pages[0];
                return '<a href="' . $url . '">' . $Page->getTitle() . '</a>';
            }
        }catch(\Exception $e){}
        return '';
    }

    /**
     * @return string
     */
    public function getPageUrl ($slugkey) {
        try{
            if(is_numeric($slugkey)){
                $tmp_page = $this->em->getRepository('CmsBundle:Page')->findOneById($slugkey);
                if($tmp_page == null) throw new \Exception('Invalid page');
                $slugkey = $tmp_page->getSlugKey();
            }
            $url = $this->generator->generate($slugkey);
            return $url;
        }catch(\Exception $e){}
        return '';
    }

    /**
     * @return string
     */
    public function getPageImage ($slugkey) {
        try{
            $url = $this->generator->generate($slugkey);
            // Find page by slugkey
            $tmp_pages = $this->em->getRepository('CmsBundle:Page')->findBy(array('slugkey' => $slugkey, 'enabled' => true), array('sort' => 'ASC'), 1);
            if(!empty($tmp_pages)){
                $Page = $tmp_pages[0];
                if($Page->hasImage()){
                    return $Page->getImage()->getWebPath();
                }
            }
        }catch(\Exception $e){}
        return '';
    }

    /**
     * @return string
     */
    public function getBreadcrumbs ($Page, $seperator = '') {
        $crumbs = $Page->getParents();
        $crumbs = array_reverse($crumbs);
        $crumbs[] = $Page;

        $return = [];

        foreach($crumbs as $i => $Page){
            if($i == 0){
                $return[] = '<a class="breadcrumb-item" href="' . $this->generator->generate('homepage') . ($Page ? substr($Page->getSettings()->getBaseUri(), 1) : '') . '">Home</a>';
            }
            if($Page){
                $return[] = '<a class="breadcrumb-item" href="' . $this->generator->generate($Page->getSlugKey()) . '">' . $Page->getTitle() . '</a>';
            }
        }

        return '<div class="breadcrumb">' . implode($seperator, $return) . '</div>';
    }

    /**
     * @return string
     */
    public function getPageLabel ($slugkey) {
        // Find page by slugkey
        $tmp_pages = $this->em->getRepository('CmsBundle:Page')->findBy(array('slugkey' => $slugkey, 'enabled' => true), array('sort' => 'ASC'), 1);
        if(!empty($tmp_pages)){
            $Page = $tmp_pages[0];
            return $Page->getTitle();
        }

        return '';
    }

    /**
     * @return string
     */
    public function getPageSubtitle ($slugkey) {
        // Find page by slugkey
        $tmp_pages = $this->em->getRepository('CmsBundle:Page')->findBy(array('slugkey' => $slugkey, 'enabled' => true), array('sort' => 'ASC'), 1);
        if(!empty($tmp_pages)){
            $Page = $tmp_pages[0];
            return $Page->getSubtitle();
        }

        return '';
    }

    /**
     * @return string
     */
    public function getSitename($Settings = null){
        if (empty($Settings)) {
            $request  = $this->container->get('request_stack')->getCurrentRequest();
            if(!empty($request)){
                $locale   = $request->getLocale();
            }else{
                $locale = 'nl';
                $Settings = null;
            }
            if($locale){ $Language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale); }else{ $Languages = $this->em->getRepository('CmsBundle:Language')->findAll(); $Language = $Languages[0]; }
            if (!empty($request)) { $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage(null, str_replace('www.', '', $request->getHttpHost())); }
            if(is_null($Settings) || is_null($Settings->getId())){ $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($Language); }
        }
        return $Settings->getLabel();
    }

    /**
     * @return string
     */
    public function getMailheader($Settings = null){
        if (empty($Settings)) {
            $request  = $this->container->get('request_stack')->getCurrentRequest();
            if(!empty($request)){
                $locale   = $request->getLocale();
            }else{
                $locale = 'nl';
                $Settings = null;
            }
            if($locale){ $Language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale); }else{ $Languages = $this->em->getRepository('CmsBundle:Language')->findAll(); $Language = $Languages[0]; }
            if (!empty($request)) { $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage(null, str_replace('www.', '', $request->getHttpHost())); }
            if(is_null($Settings) || is_null($Settings->getId())){ $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($Language); }
        }
        return $Settings->getMailHeader();
    }

    /**
     * @return string
     */
    public function getMailfooter($Settings = null){
        if (empty($Settings)) {
            $request  = $this->container->get('request_stack')->getCurrentRequest();
            if(!empty($request)){
                $locale   = $request->getLocale();
            }else{
                $locale = 'nl';
                $Settings = null;
            }
            if($locale){ $Language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale); }else{ $Languages = $this->em->getRepository('CmsBundle:Language')->findAll(); $Language = $Languages[0]; }
            if (!empty($request)) { $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage(null, str_replace('www.', '', $request->getHttpHost())); }
            if(is_null($Settings) || is_null($Settings->getId())){ $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($Language); }
        }
        return $Settings->getMailFooter();
    }

    /**
     * @return string
     */
    public function getLogo($Settings = null){
        if (empty($Settings)) {
            $request  = $this->container->get('request_stack')->getCurrentRequest();
            if(!empty($request)){
                $locale   = $request->getLocale();
            }else{
                $locale = 'nl';
                $Settings = null;
            }
            if($locale){ $Language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale); }else{ $Languages = $this->em->getRepository('CmsBundle:Language')->findAll(); $Language = $Languages[0]; }
            if (!empty($request)) { $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage(null, str_replace('www.', '', $request->getHttpHost())); }
            if(is_null($Settings) || is_null($Settings->getId())){ $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($Language); }
        }
        return $Settings->getLogo();
    }

    /**
     * @return string
     */
    public function getLogoAlt($Settings = null){
        if (empty($Settings)) {
            $request  = $this->container->get('request_stack')->getCurrentRequest();
            if(!empty($request)){
                $locale   = $request->getLocale();
            }else{
                $locale = 'nl';
                $Settings = null;
            }
            if($locale){ $Language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale); }else{ $Languages = $this->em->getRepository('CmsBundle:Language')->findAll(); $Language = $Languages[0]; }
            if (!empty($request)) { $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage(null, str_replace('www.', '', $request->getHttpHost())); }
            if(is_null($Settings) || is_null($Settings->getId())){ $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($Language); }
        }
        return $Settings->getLogoAlt();
    }

    /**
     * @return string
     */
    public function getPageContent ($Page, $locale, $name = '') {
        $name = preg_replace('/[^0-9a-z-]*/', '', str_replace(' ', '-', strtolower($name)));
        // $session = new Session();
        $request  = $this->container->get('request_stack')->getCurrentRequest();
        if(!empty($request)){
            $locale   = $request->getLocale();
        }else{
            $locale = 'nl';
            $Settings = null;
        }
        if($locale){ $Language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale); }else{ $Languages = $this->em->getRepository('CmsBundle:Language')->findAll(); $Language = $Languages[0]; }
        if (!empty($request)) { $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage(null, str_replace('www.', '', $request->getHttpHost())); }
        if(is_null($Settings) || is_null($Settings->getId())){ $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($Language); }
        $Content = $this->em->getRepository('CmsBundle:PageContent')->findOneBy([
            'page' => $Page,
            'name' => $name,
            'published' => true
        ], [
            'revision' => 'desc'
        ]);

        if($Content){
            if(!empty($this->authCheck) && $this->authCheck->isGranted('ROLE_ADMIN') && $Settings->getInlineEdit() && $session->get('live_edit') == true){
                return '<div id="contentid-' . $Content->getId() . '" class="front-editor" contenteditable="true">' . $Content->getContent() . '</div>';
            }else{
                return $Content->getContent();
            }
        }
        return '';
    }

    /**
     * @return string
     */
    public function doRender (\Twig\Environment $environment, $ct){
        $request = $this->requestStack->getCurrentRequest();

        $params = array();
        $params[] = $request->get('param1');
        $params[] = $request->get('param2');
        $params[] = $request->get('param3');
        $params[] = $request->get('param4');
        $params[] = $request->get('param5');

        $ct = $this->parseModuleContent($ct, $params, $request);
        $ct = $this->parseModuleContent($ct, $params, $request);

        if(preg_match_all('/\[page:([a-zA-Z0-9\-\_]+)(\#[a-zA-Z0-9\-].*?)?\]/', $ct, $matches)){

            $idToSlug = [];
            $cacheFile = preg_replace('/\/src.*/', '/var/cache/prod/', __DIR__) . 'page_id_slug';
            if(file_exists($cacheFile)){
                $idToSlug = json_decode(file_get_contents($cacheFile), true);
            }

            foreach($matches[0] as $index => $tag){
                $key = $matches[1][$index];
                if(is_numeric($key)){ if(array_key_exists($key, $idToSlug)){ $key = $idToSlug[$key]; }else{ $key = 'homepage'; } }

                $key = str_replace('-', '_', $key);

                $ct = str_replace('http://' . $tag, $this->generator->generate($key), $ct);
                $ct = str_replace('https://' . $tag, $this->generator->generate($key), $ct);
                $ct = str_replace($tag, $this->generator->generate($key), $ct);
            }
        }

        if(preg_match_all('/page:(\d+)/', $ct, $m)){
            $foundIds = $m[1];
            arsort($foundIds);
            foreach($foundIds as $index => $id){
                $Page = $this->em->getRepository('CmsBundle:Page')->find($id);
                if ($Page) {
                    $ct = str_replace($m[0][$index], $this->generator->generate($Page->getSlugKey()), $ct);
                }else{
                    $ct = str_replace($m[0][$index], $this->generator->generate('homepage'), $ct);
                }
            }
        }
        return $ct;
    }

    /**
     * @return string
     */
    public function getPageBlocks (\Twig\Environment $environment, $Page, $locale, $name = '') {

        if($Page && $Page->requireAuth){
            return '';
        }

		$request = $this->requestStack->getCurrentRequest();

        $params = array();
        $params[] = $request->get('param1');
        $params[] = $request->get('param2');
        $params[] = $request->get('param3');
        $params[] = $request->get('param4');
        $params[] = $request->get('param5');

		
        if(!empty($Page->exception)){
            // EXCEPTION HANDLER

            $locale = $Page->getLanguage()->getLocale();

            if (empty($locale)) {
                $request  = $this->container->get('request_stack')->getCurrentRequest();

                if(!empty($request)){
                    $locale   = $request->getLocale();
                }else{
                    $locale = 'nl';
                    $Settings = null;
                }
            }

            $Settings = $Page->getSettings();
            $return = $ct = '';

			try{
				if($Page->getSlug() == 'error' || in_array($Page->exception->getStatusCode(),array(404,403,500))){
					$pageError = $this->em->getRepository('CmsBundle:Page')->findOneBy(array('slug' => $Page->exception->getStatusCode()));
					if(!empty($pageError) || $Page->getSlug() == 'error'){
						if(!empty($pageError) &&  $Page->getSlug() != 'error')$Page = $pageError;
						$blocks = $this->em->getRepository('CmsBundle:PageBlockWrapper')->findBy([
							'page' => $Page,
							'enabled' => true
						], ['pos' => 'asc']);
						

						if(!empty($blocks)){
							foreach($blocks as $pageBlock){


								$blockData = null;
								$templateKey = $pageBlock->getTemplateKey();
								if(empty($templateKey)) continue;

								$layoutPathOverride = '../templates/blocks/';
								if(!file_exists($layoutPathOverride . $templateKey . '.html.twig')){
									$layoutPath = '../src/CmsBundle/Resources/views/blocks/';
									$twigPath = '@Cms/blocks/';
								}else{
									$layoutPath = $layoutPathOverride;
									$twigPath = '/blocks/';
								}


								$f = $layoutPath . $templateKey . '.html.twig';
								if(file_exists($f)){
									$content = file_get_contents($f);

									if(preg_match('/\{\#(.*?)\#\}/is', $content, $m)){
										$conf = $m[1];
										$conf = json_decode($conf);
										if(!empty($conf)){
											$blockData = $conf;

											$conf->blocks_q = [];
											foreach($conf->blocks as $b){
												if(!isset($b->contained) || empty($b->contained)){
													$b->contained = false;
												}
												$conf->blocks_q[$b->key] = $b;
											}
										}
									}

									// Prepare contained blocks
									$parsed_blocks = [];
									$containments = [];
									foreach($pageBlock->getBlocks() as $block){
										if($block->getContained()){
											$containments[$block->getContained()][] = $block;
											if(!in_array('contained:' . $block->getContained(), $parsed_blocks)){
												$parsed_blocks[] = 'contained:' . $block->getContained();
											}
										}else{
											$parsed_blocks[] = $block;
										}
									}

									$childblocks = $pageBlock->getBlocks();

									$bundle = null;

									foreach($childblocks as $block){
										if($block->getBundle()){
											$bundle = str_replace('Trinity', '', $block->getBundle());
											$bundle = preg_split('/(?=[A-Z])/',$bundle);

											if(isset($bundle[0]) && empty($bundle[0])){
												unset($bundle[0]);
											}

											$bundle = strtolower(implode('_', $bundle));
										}
									}

									$anchor = '';
									if($pageBlock->getAnchor()){
										$anchor = '<a class="anchor" style="clear: both;display: block;" name="' . $pageBlock->getAnchor() . '"></a>';
									}

									$blockHtml = $anchor . $environment->render($twigPath . $templateKey . '.html.twig', ['page' => $Page, 'locale' => $locale, 'bundle' => $bundle, 'wrapper' => $pageBlock, 'containments' => $containments, 'firstBlock' => $pageBlock->getBlocks()->first(), 'blocks' => $parsed_blocks, 'data' => $blockData, 'Page' => $Page]);


									$ct .= $blockHtml;

									if(preg_match_all('/\[get\.(.*?)\]/', $ct, $matches)){
										foreach($matches[0] as $index => $tag){
											$key = $matches[1][$index];
											if(!empty($_GET[$key])){
												$ct = str_replace($tag, $_GET[$key], $ct);
											}else{
												$ct = str_replace($tag, '', $ct);
											}
										}
									}

									if(preg_match_all('/media:(\d+)/', $ct, $m)){
										$foundIds = $m[1];
										arsort($foundIds);
										foreach($foundIds as $index => $id){
											$Media = $this->em->getRepository('CmsBundle:Media')->find($id);
											$ct = str_replace($m[0][$index], '/' . $Media->getWebPath(), $ct);
										}
									}

									$ct = $this->parseModuleContent($ct, $params, $request);
									$ct = $this->parseModuleContent($ct, $params, $request);

									if(preg_match_all('/\[page:([a-zA-Z0-9\-\_]+)(\#[a-zA-Z0-9\-].*?)?\]/', $ct, $matches)){

										$idToSlug = [];
										$cacheFile = preg_replace('/\/src.*/', '/var/cache/prod/', __DIR__) . 'page_id_slug';
										if(file_exists($cacheFile)){
											$idToSlug = json_decode(file_get_contents($cacheFile), true);
										}

										foreach($matches[0] as $index => $tag){
											$key = $matches[1][$index];
											if(is_numeric($key)){ if(array_key_exists($key, $idToSlug)){ $key = $idToSlug[$key]; }else{ $key = 'homepage'; } }

											$key = str_replace('-', '_', $key);

											$ct = str_replace('http://' . $tag, $this->generator->generate($key), $ct);
											$ct = str_replace('https://' . $tag, $this->generator->generate($key), $ct);
											$ct = str_replace($tag, $this->generator->generate($key), $ct);
										}
									}

									if(preg_match_all('/page:(\d+)/', $ct, $m)){
										$foundIds = $m[1];
										arsort($foundIds);
										foreach($foundIds as $index => $id){
											$Page = $this->em->getRepository('CmsBundle:Page')->find($id);
											if ($Page) {
												$ct = str_replace($m[0][$index], $this->generator->generate($Page->getSlugKey()), $ct);
											}else{
												$ct = str_replace($m[0][$index], $this->generator->generate('homepage'), $ct);
											}
										}
									}
								}
							}
						}					
					}else{
						if(in_array($Page->exception->getStatusCode(),array(404,403,500))){
							if($Page->exception->getStatusCode() == 404){
								$return = $Settings->getErrorNotFound();
							}
							if($Page->exception->getStatusCode() == 403){
								$return = $Settings->getErrorNoAccess();
							}
							if($Page->exception->getStatusCode() == 500){
								$return = $Settings->getErrorSystem();
							}
						}
					}
				}
            }catch(\Throwable $e){
                $return = $Settings->getErrorSystem();
            }
			if(empty($return)){
				return $ct . '<!-- ERROR DEBUG | pid: ' . $Page->getId() . ' | sid: ' . $Settings->getId() . ' | lid: ' . $Settings->getLanguage()->getId() . ' | ' . $Settings->getLanguage()->getLocale() . ' -->';
			}else{
				return $ct . '<!-- ERROR DEBUG | pid: ' . $Page->getId() . ' | sid: ' . $Settings->getId() . ' | lid: ' . $Settings->getLanguage()->getId() . ' | ' . $Settings->getLanguage()->getLocale() . ' -->
					<section id="trinity-exception"><div class="container">' . $return . '</div></section>';
			}
        }

        // dump(func_get_args());die();
        $name = preg_replace('/[^0-9a-z-]*/', '', str_replace(' ', '-', strtolower($name)));
        $session = new Session();
        $request  = $this->container->get('request_stack')->getCurrentRequest();

        if(!empty($request)){
            $locale   = $request->getLocale();
        }else{
            $locale = 'nl';
            $Settings = null;
        }

        if($locale){ $Language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale); }else{ $Languages = $this->em->getRepository('CmsBundle:Language')->findAll(); $Language = $Languages[0]; }
        if (!empty($request)) { $Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage(null, str_replace('www.', '', $request->getHttpHost())); }
        if(is_null($Settings) || is_null($Settings->getId())){ $Settings = $this->em->getRepository('CmsBundle:Settings')->findOneByLanguage($Language); }

        $canEdit = false;
        if(!empty($this->authCheck) && $this->authCheck->isGranted('ROLE_ADMIN') && $Settings->getInlineEdit() && $session->get('live_edit') == true){
            $canEdit = $Settings->getInlineEdit();
        }

        $use_materialize = false;
        $use_bootstrap = false;
        $libraries = (array)$Settings->getLayoutIncludeJs();
        foreach($libraries as $lib){
            if(preg_match('/materialize/', strtolower($lib))){
                $use_materialize = true;
                $use_bootstrap = false;
                break;
            }else if(preg_match('/bootstrap/', strtolower($lib))){
                $use_materialize = false;
                $use_bootstrap = true;
                break;
            }
        }

        $ct = '';


        // $blocks = $Page->getBlocks();

        $blocks = $this->em->getRepository('CmsBundle:PageBlockWrapper')->findBy([
            'page' => $Page,
            'enabled' => true
        ], ['pos' => 'asc']);

        if(!empty($blocks)){
            foreach($blocks as $pageBlock){


                $blockData = null;
                $templateKey = $pageBlock->getTemplateKey();
                if(empty($templateKey)) continue;

                $layoutPathOverride = '../templates/blocks/';
                if(!file_exists($layoutPathOverride . $templateKey . '.html.twig')){
                    $layoutPath = '../src/CmsBundle/Resources/views/blocks/';
                    $twigPath = '@Cms/blocks/';
                }else{
                    $layoutPath = $layoutPathOverride;
                    $twigPath = 'blocks/';
                }

                // Search for native blocks provided by bundles
                $bundleDir = $this->container->get('kernel')->getProjectDir() . '/src/Trinity/';
                if(file_exists($bundleDir)){
                    foreach(scandir($bundleDir) as $bundleKey){
                        if(substr($bundleKey, 0, 1) == '.') continue;
                        $bundleRoot = $bundleDir . $bundleKey;
                        if(file_exists($bundleRoot . '/Resources/views/Cms/Blocks')){
                            // Has custom layout dir
                            if(file_exists($bundleRoot . '/Resources/views/Cms/Blocks/' . $templateKey . '.html.twig')){
                                $layoutPath = $bundleRoot . '/Resources/views/Cms/Blocks/';
                                $twigPath = 'Trinity' . $bundleKey . ':Cms/Blocks:';
                            }
                        }
                    }
                }

                $f = $layoutPath . $templateKey . '.html.twig';
                if(file_exists($f)){
                    $content = file_get_contents($f);

                    if(preg_match('/\{\#(.*?)\#\}/is', $content, $m)){
                        $conf = $m[1];
                        $conf = json_decode($conf);
                        if(!empty($conf)){
                            $blockData = $conf;

                            $conf->blocks_q = [];
                            foreach($conf->blocks as $b){
                                if(!isset($b->contained) || empty($b->contained)){
                                    $b->contained = false;
                                }
                                $conf->blocks_q[$b->key] = $b;
                            }
                        }
                    }

                    // Prepare contained blocks
                    $parsed_blocks = [];
                    $containments = [];
                    foreach($pageBlock->getBlocks() as $block){
                        if($block->getContained()){
                            $containments[$block->getContained()][] = $block;
                            if(!in_array('contained:' . $block->getContained(), $parsed_blocks)){
                                $parsed_blocks[] = 'contained:' . $block->getContained();
                            }
                        }else{
                            $parsed_blocks[] = $block;
                        }
                    }

                    $childblocks = $pageBlock->getBlocks();

                    $bundle = null;

                    foreach($childblocks as $block){
                        if($block->getBundle()){
                            $bundle = str_replace('Trinity', '', $block->getBundle());
                            $bundle = preg_split('/(?=[A-Z])/',$bundle);

                            if(isset($bundle[0]) && empty($bundle[0])){
                                unset($bundle[0]);
                            }

                            $bundle = strtolower(implode('_', $bundle));
                        }
                    }

                    $anchor = '';
                    if($pageBlock->getAnchor()){
                        $anchor = '<a class="anchor" style="clear: both;display: block;" name="' . $pageBlock->getAnchor() . '"></a>';
                    }

                    $blockHtml = $anchor . $environment->render($twigPath . $templateKey . '.html.twig', ['page' => $Page, 'locale' => $locale, 'bundle' => $bundle, 'wrapper' => $pageBlock, 'containments' => $containments, 'firstBlock' => $pageBlock->getBlocks()->first(), 'blocks' => $parsed_blocks, 'data' => $blockData, 'Page' => $Page]);

                    $ct .= $blockHtml;

                    if(preg_match_all('/\[get\.(.*?)\]/', $ct, $matches)){
                        foreach($matches[0] as $index => $tag){
                            $key = $matches[1][$index];
                            if(!empty($_GET[$key])){
                                $ct = str_replace($tag, $_GET[$key], $ct);
                            }else{
                                $ct = str_replace($tag, '', $ct);
                            }
                        }
                    }

                    if(preg_match_all('/media:(\d+)/', $ct, $m)){
                        $foundIds = $m[1];
                        arsort($foundIds);
                        foreach($foundIds as $index => $id){
                            $Media = $this->em->getRepository('CmsBundle:Media')->find($id);
                            $ct = str_replace($m[0][$index], '/' . $Media->getWebPath(), $ct);
                        }
                    }

                    $ct = $this->parseModuleContent($ct, $params, $request);
                    $ct = $this->parseModuleContent($ct, $params, $request);

                    if(preg_match_all('/\[page:([a-zA-Z0-9\-\_]+)(\#[a-zA-Z0-9\-].*?)?\]/', $ct, $matches)){

                        $idToSlug = [];
                        $cacheFile = preg_replace('/\/src.*/', '/var/cache/prod/', __DIR__) . 'page_id_slug';
                        if(file_exists($cacheFile)){
                            $idToSlug = json_decode(file_get_contents($cacheFile), true);
                        }

                        foreach($matches[0] as $index => $tag){
                            $key = $matches[1][$index];
                            if(is_numeric($key)){ if(array_key_exists($key, $idToSlug)){ $key = $idToSlug[$key]; }else{ $key = 'homepage'; } }

                            $key = str_replace('-', '_', $key);

                            $ct = str_replace('http://' . $tag, $this->generator->generate($key), $ct);
                            $ct = str_replace('https://' . $tag, $this->generator->generate($key), $ct);
                            $ct = str_replace($tag, $this->generator->generate($key), $ct);
                        }
                    }

                    if(preg_match_all('/page:(\d+)/', $ct, $m)){
                        $foundIds = $m[1];
                        arsort($foundIds);
                        foreach($foundIds as $index => $id){
                            $Page = $this->em->getRepository('CmsBundle:Page')->find($id);
                            if ($Page) {
                                $ct = str_replace($m[0][$index], $this->generator->generate($Page->getSlugKey()), $ct);
                            }else{
                                $ct = str_replace($m[0][$index], $this->generator->generate('homepage'), $ct);
                            }
                        }
                    }
                }
            }
        }

        if($canEdit){
            $ct .= '
                <script>
                    var savePath = \'' . $this->generator->generate('admin_page_save_front') . '\';
                </script>
                <script src="/bundles/cms/js/front-editor.js"></script>
                <script src="/bundles/cms/ckeditor/ckeditor.js"></script>
            ';
        }

        // die();

        /*$ct = $this->parseModuleContent($ct, $params, $request);

        if(preg_match_all('/\[page:([a-zA-Z0-9-_]+)\]/', $ct, $matches)){
            foreach($matches[0] as $index => $tag){
                $ct = str_replace('http://' . $tag, $this->generateUrl($matches[1][$index]), $ct);
                $ct = str_replace('https://' . $tag, $this->generateUrl($matches[1][$index]), $ct);
                $ct = str_replace($tag, $this->generateUrl($matches[1][$index]), $ct);
            }
        }*/

        return $ct;
    }

    /**
     * @return string
     */
    public function getPageBlocksMeta (\Twig\Environment $environment, $Page) {
        if($Page && $Page->requireAuth){ return null; }
        if($Page && !empty($Page->exception)){ return null; }

        $request = $this->requestStack->getCurrentRequest();

        $params = array();
        $params[] = $request->get('param1');
        $params[] = $request->get('param2');
        $params[] = $request->get('param3');
        $params[] = $request->get('param4');
        $params[] = $request->get('param5');

        // $blocks = $Page->getBlocks();

        $blocks = $this->em->getRepository('CmsBundle:PageBlockWrapper')->findBy([
            'page' => $Page,
            'enabled' => true
        ], ['pos' => 'asc']);

        $seo_data = null;

        if(!empty($blocks)){
            foreach($blocks as $pageBlock){
                foreach($pageBlock->getBlocks() as $block){
                    $bundle = $block->getBundle();
                    if(!empty($bundle)){

                        if(preg_match_all('/((?:^|[A-Z])[a-z]+)/',$bundle,$split)){
                            if(!empty($split[1])){

                                try {
                                    $config = $block->getBundleData(true);

                                    $namespace = implode('\\', $split[1]);
                                    $namespace = '\\' . str_replace('\\Bundle', 'Bundle', $namespace) . '\\Classes\\Metadata';
                                    if(class_exists($namespace)){
                                        $cl = new $namespace($this->em, $params, $config, $this->container);
                                        if(method_exists($cl, 'parse')){
                                            $seo_data = $cl->parse();

                                            if(!is_array($seo_data) || empty($seo_data)){
                                                $seo_data = null;
                                            }
                                        }
                                    }
                                } catch (\Exception $e) {}

                                if(!empty($seo_data)){
                                    break;
                                }
                            }
                        }
                    }
                }
            }

            return $seo_data;
        }

        return null;
    }

    private function parseModuleContent($content, $params = array(), $request = null){

        // Legacy
        if(preg_match_all('/(qinox(\w+bundle)_show)/', $content, $m)){
            foreach($m[0] as $key => $str){
                $content = str_replace($m[0][$key], 'trinity' . $m[2][$key] . '_show', $content);
            }
        }

        if(preg_match_all('/trinity:(\w+):(\{.*?\})/', $content, $m)){
            foreach($m[1] as $k => $bundle){
                $call = 'trinity' . strtolower($bundle) . 'bundle_show';
                $cfg = json_decode($m[2][$k], true);
                if(is_null($cfg)) $cfg = array();

                try{
                    $func = 'ShowAction';
                    $content = str_replace($m[0][$k], $this->container->get($call)->$func($cfg, $params, $request), $content);
                }catch(\Exception $e){
                    $content = str_replace($m[0][$k], $e->getMessage(), $content);
                }
            }
        }
        if(preg_match_all('/\[(.*?_show):(.*?)\((.*?)\)\]/', $content, $m)){
            foreach($m[1] as $i => $call){
                // $call = preg_replace('/^trinity/', 'qinox', $call);
                $action = $m[2][$i];
                $value = $m[3][$i];

                $cfg = json_decode($value, true);
                if(is_null($cfg)) $cfg = array();

                try{
                    $func = $action . 'Action';
                    $content = str_replace($m[0][$i], $this->container->get($call)->$func($cfg, $params, $request), $content);
                }catch(\Exception $e){
                    $content = str_replace($m[0][$i], $e->getMessage(), $content);
                }
            }
        }
        return $content;
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'Page info';
    }
}
