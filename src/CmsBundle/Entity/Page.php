<?php

namespace App\CmsBundle\Entity;

use App\CmsBundle\Entity\PageInterface as PageInterface;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Page
 *
 * @ORM\Table(name="page", indexes={@ORM\Index(name="fk_page_layout1_idx", columns={"layoutid"})})
 * @ORM\Entity(repositoryClass="App\CmsBundle\Repository\PageRepository")
 */
class Page implements PageInterface
{

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subtitle;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $layout;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $slugkey;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $classes;

    /**
     * @var string
     */
    private $url = '/';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $page_type = null;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $custom_url = null;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $target = null;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $static = false;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $visible = false;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $enabled = true;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sort;


    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ref_id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_add", type="datetime", nullable=true)
     */
    private $dateAdd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_edit", type="datetime", nullable=true)
     */
    private $dateEdit;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\CmsBundle\Entity\Layout
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\Layout")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="layoutid", referencedColumnName="id")
     * })
     */
    private $layoutid;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $controller;

    /**
     * @ORM\OneToMany(targetEntity="PageVersion", mappedBy="page", cascade={"remove"})
     */
    protected $versions;

    /**
     * @ORM\OneToMany(targetEntity="PageMetatag", mappedBy="page", cascade={"remove"})
     */
    protected $metatags;

    /**
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="pages")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $page;

    /**
     * @ORM\OneToMany(targetEntity="Page", mappedBy="page", cascade={"remove"})
     * @ORM\OrderBy({"sort" = "asc"})
     */
    protected $pages;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="pages")
     * @ORM\JoinTable(name="tags_pages")
     */
    protected $tags;

    /**
     * @var \App\CmsBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="image", referencedColumnName="id")
     * })
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="PageContent", mappedBy="page", cascade={"persist", "remove" })
     * @ORM\OrderBy({"revision" = "DESC"})
     */
    protected $content;

    /**
     * @ORM\OneToMany(targetEntity="PageBlockWrapper", mappedBy="page", cascade={"persist", "remove" })
     * @ORM\OrderBy({"pos" = "ASC"})
     */
    protected $blocks;

    /**
     * @ORM\ManyToOne(targetEntity="Language", inversedBy="pages")
     * @ORM\JoinColumn(name="language_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $language;

    /**
     * @ORM\ManyToOne(targetEntity="Page")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $base;

    /**
     * @var \App\CmsBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(referencedColumnName="id")
     * })
     */
    private $media;

    public $clone_type = '';
    public $em = null;
    public $isHome = false;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $option_title = true;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $option_subtitle = false;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $option_subnavigation = true;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $option_breadcrumbs = true;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $option_hide_in_submenu = false;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $notify_change = false;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $notify_create_child = false;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $notify_change_child = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notify_type = 'email';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notify_email;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notify_telegram_bot;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notify_telegram_bot_chat_id;

    /**
     * @ORM\OneToMany(targetEntity="PageScore", mappedBy="page", cascade={"remove"})
     * @ORM\OrderBy({"date" = "DESC"})
     */
    protected $scores;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $access = '';

    /**
     * @var array
     *
     * @ORM\Column(type="array", nullable=true)
     */
    private $access_roles = [];

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cache = false;

	/**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
	private $critical = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $access_free = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $access_allow_login = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $access_alt_home = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $access_visible_menu = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $access_b2b = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $access_pwd = '';

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $tpl_inject;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $show_in_sitemap = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    protected $robots = '';

    /**
     * @ORM\ManyToOne(targetEntity="Settings", inversedBy="pages")
     * @ORM\JoinColumn(name="settings_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $settings;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $old_id;

    public $requireAuth = false;
    public $exception = null;

    public function __construct(){
        $this->versions = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->content = new ArrayCollection();
        $this->metatags = new ArrayCollection();
        $this->pages = new ArrayCollection();
        $this->blocks = new ArrayCollection();
        $this->scores = new ArrayCollection();
    }

    /**
     * Set label
     *
     * @param string $label
     * @return Page
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Page
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Page
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set slugkey
     *
     * @param string $slugkey
     * @return Page
     */
    public function setSlugkey($slugkey)
    {
        $this->slugkey = $slugkey;

        return $this;
    }

    /**
     * Get slugkey
     *
     * @return string
     */
    public function getSlugKey()
    {
        return $this->slugkey;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Page
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set static
     *
     * @param boolean $static
     *
     * @return Page
     */
    public function setStatic($static)
    {
        $this->static = $static;

        return $this;
    }

    /**
     * Get static
     *
     * @return boolean
     */
    public function getStatic()
    {
        return $this->static;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     *
     * @return Page
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return Page
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set sort
     *
     * @param integer $sort
     * @return Page
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return integer
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Set dateAdd
     *
     * @param \DateTime $dateAdd
     * @return Page
     */
    public function setDateAdd($dateAdd)
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }

    /**
     * Get dateAdd
     *
     * @return \DateTime
     */
    public function getDateAdd()
    {
        return $this->dateAdd;
    }

    /**
     * Set dateEdit
     *
     * @param \DateTime $dateEdit
     * @return Page
     */
    public function setDateEdit($dateEdit)
    {
        $this->dateEdit = $dateEdit;

        return $this;
    }

    /**
     * Get dateEdit
     *
     * @return \DateTime
     */
    public function getDateEdit()
    {
        return $this->dateEdit;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set layoutid
     *
     * @param \App\CmsBundle\Entity\Layout $layoutid
     * @return Page
     */
    public function setLayoutid(\App\CmsBundle\Entity\Layout $layoutid = null)
    {
        $this->layoutid = $layoutid;

        return $this;
    }

    /**
     * Get layoutid
     *
     * @return \App\CmsBundle\Entity\Layout
     */
    public function getLayoutid()
    {
        return $this->layoutid;
    }

    /**
     * Get controller
     *
     * @return \App\CmsBundle\Controller\PageController
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set controller
     *
     * @return Page
     */
    public function setController( $value )
    {
        $this->controller = $value;

        return $this;
    }

    /**
     * Add version
     *
     * @param \App\CmsBundle\Entity\PageVersion $version
     *
     * @return Page
     */
    public function addVersion(\App\CmsBundle\Entity\PageVersion $version)
    {
        $this->versions[] = $version;

        return $this;
    }

    /**
     * Remove version
     *
     * @param \App\CmsBundle\Entity\PageVersion $version
     */
    public function removeVersion(\App\CmsBundle\Entity\PageVersion $version)
    {
        $this->versions->removeElement($version);
    }

    /**
     * Get versions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVersions()
    {
        return $this->versions;
    }

    /**
     * Add metatag
     *
     * @param \App\CmsBundle\Entity\PageMetatag $metatag
     *
     * @return Page
     */
    public function addMetatag(\App\CmsBundle\Entity\PageMetatag $metatag)
    {
        $this->metatags[] = $metatag;

        return $this;
    }

    /**
     * Remove metatag
     *
     * @param \App\CmsBundle\Entity\PageMetatag $metatag
     */
    public function removeMetatag(\App\CmsBundle\Entity\PageMetatag $metatag)
    {
        $this->metatags->removeElement($metatag);
    }

    /**
     * Get metatags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMetatags()
    {
        return $this->metatags;
    }

    /**
     * Set page
     *
     * @param \App\CmsBundle\Entity\Page $page
     *
     * @return Page
     */
    public function setPage(\App\CmsBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Has page
     *
     * @return boolean
     */
    public function hasPage()
    {
        return !empty($this->page);
    }

    /**
     * Get all page parents
     *
     * @return array
     */
    public function getParents($RootPage = null)
    {
        $list = [];

        if($this->getPage() != null){
            $parent = $this->getPage();
            while($parent != null){
                $list[] = $parent;
                $parent = $parent->getPage();
            }
        }

        if(!empty($RootPage)){
            // Add 'home' page to list
            $list[] = $RootPage;
        }

        return $list;
    }

    /**
     * Get full URL based on parents
     *
     * @return array
     */
    public function getFullUrl($hideFirstSlash = false)
    {
        $url = [];
        $parents = $this->getParents();

        // Make sure the parent that is the root is added first
        foreach(array_reverse($parents) as $Parent){
            $url[] = $Parent->getSlug();
        }
        $url[] = $this->getSlug();

        foreach($url as $k => $v){
            if($k > 0){
                $url[$k] = preg_replace('/^\w{2}\/(.*?)$/', '$1', $v);
            }
        }

        return ($hideFirstSlash ? '' : '/') . implode('/', $url);
    }

    /**
     * Get page
     *
     * @return \App\CmsBundle\Entity\Page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Add page
     *
     * @param \App\CmsBundle\Entity\Page $page
     *
     * @return Page
     */
    public function addPage(\App\CmsBundle\Entity\Page $page)
    {
        $this->pages[] = $page;

        return $this;
    }

    /**
     * Remove page
     *
     * @param \App\CmsBundle\Entity\Page $page
     */
    public function removePage(\App\CmsBundle\Entity\Page $page)
    {
        $this->pages->removeElement($page);
    }

    /**
     * Get pages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Add tag
     *
     * @param \App\CmsBundle\Entity\Tag $tag
     *
     * @return Page
     */
    public function addTag(\App\CmsBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Check tag
     *
     * @param \App\CmsBundle\Entity\Tag $tag
     *
     * @return boolean
     */
    public function hasTag(\App\CmsBundle\Entity\Tag $tag)
    {
        $idlist = array();
        foreach($this->tags as $storedtag){
            $idlist[] = $storedtag->getId();
        }

        return in_array($tag->getId(), $idlist);
    }

    /**
     * Remove tag
     *
     * @param \App\CmsBundle\Entity\Tag $tag
     */
    public function removeTag(\App\CmsBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set layout
     *
     * @param string $layout
     *
     * @return Page
     */
    public function setLayout($layout = 'default')
    {
        $this->layout = $layout;

        return $this;
    }

    /**
     * Get layout
     *
     * @return string
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * Get layout path
     *
     * @return string
     */
    public function getLayoutPath()
    {
        if(strpos($this->layout, ':') !== false){
            $layout_arr      = explode(':', $this->layout);
            $bundleKey       = $layout_arr[0];
            $bundleTpl       = $layout_arr[1];
            $bundleLayoutDir = __DIR__ . '/../../../src/Trinity/' . $bundleKey . '/Resources/views/Cms/Layouts/';
            $layoutFile      = $bundleLayoutDir . $bundleTpl . '.html.twig';
            if(file_exists($layoutFile)){
                return 'Trinity' . $bundleKey . ':Cms/Layouts:' . $bundleTpl;
            }
        }
        return 'layouts/' . $this->layout;
    }

    /**
     * Get layout label
     *
     * @return string
     */
    public function getLayoutLabel()
    {
        $layout = ($this->layout == '[Follow system]' ? 'default' : $this->layout);
        if($layout == 'default'){
            $layout = 'Standaard layout';
        }
        return $layout;
    }

    /**
     * Check recursively if page is valid (page tree is enabled completely)
     *
     * @return boolean
     */
    public function isValid(){
        if(!$this->getEnabled()) return false;

        // Find upper pages
        $ParentPage = $this->getPage();
        while($ParentPage != null){
            if(!$ParentPage->getEnabled()) return false;
            $ParentPage = $ParentPage->getPage();
        }

        return true;
    }

    /**
     * Set image
     *
     * @param \App\CmsBundle\Entity\Media $image
     *
     * @return Page
     */
    public function setImage(\App\CmsBundle\Entity\Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \App\CmsBundle\Entity\Media
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get image object
     *
     * @return \App\CmsBundle\Entity\Media
     */
    public function getImageObject()
    {
        return $this->image;
    }

    /**
     * Has image
     *
     * @return boolean
     */
    public function hasImage()
    {
        return !empty($this->image);
    }

    public function getAdminStatusIcon(){
        $return = '';

        $required = array('description', 'keywords');
        $missing = array();
        foreach($this->getMetatags() as $Metatag){
            if(in_array($Metatag->getMetatagid()->getKey(), $required)){
                if(empty($Metatag->getValue())){
                    $missing[] = $Metatag->getMetatagid()->getLabel();
                }
            }
        }
        if(!empty($missing)){
            // $return = '<i data-tooltip="De volgende metadata ontbreken:<br/><br/>' . implode("<br/>", $missing) . '" class="fa fa-exclamation-triangle" style="color:' . (count($missing) > 1 ? 'red' : 'orange') . ';" title="Homepagina"></i>';
            $return = '<a style="cursor: default;" data-position="top" data-delay="300" data-tooltip="' . implode(', ', $missing) . '" class="tooltipped"><i class="' . (count($missing) > 1 ? 'red' : 'orange') . '-text fa fa-exclamation-triangle"></i></a>';
        }
        return $return;
    }

    /**
     * Add content
     *
     * @param \App\CmsBundle\Entity\PageContent $content
     *
     * @return Page
     */
    public function addContent(\App\CmsBundle\Entity\PageContent $content)
    {
        $this->content[] = $content;

        return $this;
    }

    /**
     * Remove content
     *
     * @param \App\CmsBundle\Entity\PageContent $content
     */
    public function removeContent(\App\CmsBundle\Entity\PageContent $content)
    {
        $this->content->removeElement($content);
    }

    /**
     * Get content
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set language
     *
     * @param \App\CmsBundle\Entity\Language $language
     *
     * @return Page
     */
    public function setLanguage(\App\CmsBundle\Entity\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \App\CmsBundle\Entity\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set base
     *
     * @param \App\CmsBundle\Entity\Page $base
     *
     * @return Page
     */
    public function setBase(\App\CmsBundle\Entity\Page $base = null)
    {
        $this->base = $base;

        return $this;
    }

    /**
     * Get base
     *
     * @return \App\CmsBundle\Entity\Page
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * Set classes
     *
     * @param string $classes
     *
     * @return Page
     */
    public function setClasses($classes)
    {
        $this->classes = $classes;

        return $this;
    }

    /**
     * Get classes
     *
     * @return string
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * Add block
     *
     * @param \App\CmsBundle\Entity\PageBlockWrapper $block
     *
     * @return Page
     */
    public function addBlock(\App\CmsBundle\Entity\PageBlockWrapper $block)
    {
        $this->blocks[] = $block;

        return $this;
    }

    /**
     * Remove block
     *
     * @param \App\CmsBundle\Entity\PageBlockWrapper $block
     */
    public function removeBlock(\App\CmsBundle\Entity\PageBlockWrapper $block)
    {
        $this->blocks->removeElement($block);
    }

    /**
     * Get blocks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    /**
     * Set customUrl
     *
     * @param string $customUrl
     *
     * @return Page
     */
    public function setCustomUrl($customUrl)
    {
        $this->custom_url = $customUrl;

        return $this;
    }

    /**
     * Get customUrl
     *
     * @return string
     */
    public function getCustomUrl()
    {
        return $this->custom_url;
    }

    /**
     * Set pageType
     *
     * @param string $pageType
     *
     * @return Page
     */
    public function setPageType($pageType)
    {
        $this->page_type = $pageType;

        return $this;
    }

    /**
     * Get pageType
     *
     * @return string
     */
    public function getPageType()
    {
        return $this->page_type;
    }

    /**
     * Set target
     *
     * @param string $target
     *
     * @return Page
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set media
     *
     * @param \App\CmsBundle\Entity\Media $media
     *
     * @return Page
     */
    public function setMedia(\App\CmsBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \App\CmsBundle\Entity\Media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Clone
     */
    public function __clone() {
        $this->id = null;
        $this->media = null;
        $this->base = null;

        // Get current collection
        $contents = $this->getContent();
        $this->content = new ArrayCollection();
        foreach ($contents as $content) {
            $content->clone_type = $this->clone_type;
            $content->em = $this->em;

            $newContent = clone $content;
            $this->content->add($newContent);
            $newContent->setPage($this);

            if($this->clone_type == 'lorem'){
                $newContent->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum bibendum velit sed mattis iaculis. Donec libero odio, mollis quis libero quis, feugiat bibendum ante. Sed erat diam, vehicula a lectus sodales, pulvinar aliquet odio. Etiam ornare enim convallis, consectetur eros nec, interdum augue. In tortor elit, malesuada eget metus vel, facilisis tristique urna. Fusce finibus, sem interdum accumsan consequat, velit diam posuere justo, eu lacinia lacus leo dapibus ligula. Sed maximus accumsan accumsan. Suspendisse ut odio ut odio pellentesque dignissim ac in diam. Nullam malesuada, elit non ultricies scelerisque, turpis mauris aliquet est, varius fermentum orci tortor et justo.');
            }else if($this->clone_type == 'remove'){
                $newContent->setContent('');
            }
        }

        // Get current collection
        /*$pages = $this->getPages();
        if(!empty($pages)){
            $this->pages = new ArrayCollection();
            foreach ($pages as $page) {
                $newPage = clone $page;
                $this->pages->add($newPage);
                $newPage->setPage($this);
            }
        }*/

        // Get current collection
        $wrappers = $this->getBlocks();
        $this->blocks = new ArrayCollection();
        foreach ($wrappers as $wrapper) {
            $wrapper->clone_type = $this->clone_type;
            $wrapper->em = $this->em;

            $newWrapper = clone $wrapper;
            $this->blocks->add($newWrapper);
            $newWrapper->setPage($this);
        }

        // Get current collection
        $versions = $this->getVersions();
        $this->versions = new ArrayCollection();
        foreach ($versions as $version) {
            $version->clone_type = $this->clone_type;
            $version->em = $this->em;

            $newVersion = clone $version;
            $this->versions->add($newVersion);
            $newVersion->setPage($this);

            if($this->clone_type == 'lorem'){
                $newVersion->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum bibendum velit sed mattis iaculis. Donec libero odio, mollis quis libero quis, feugiat bibendum ante. Sed erat diam, vehicula a lectus sodales, pulvinar aliquet odio. Etiam ornare enim convallis, consectetur eros nec, interdum augue. In tortor elit, malesuada eget metus vel, facilisis tristique urna. Fusce finibus, sem interdum accumsan consequat, velit diam posuere justo, eu lacinia lacus leo dapibus ligula. Sed maximus accumsan accumsan. Suspendisse ut odio ut odio pellentesque dignissim ac in diam. Nullam malesuada, elit non ultricies scelerisque, turpis mauris aliquet est, varius fermentum orci tortor et justo.');
            }else if($this->clone_type == 'remove'){
                $newVersion->setContent('');
            }
        }
    }

    /**
     * Set subtitle
     *
     * @param string $subtitle
     *
     * @return Page
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set optionTitle
     *
     * @param boolean $optionTitle
     *
     * @return Page
     */
    public function setOptionTitle($optionTitle)
    {
        $this->option_title = $optionTitle;

        return $this;
    }

    /**
     * Get optionTitle
     *
     * @return boolean
     */
    public function getOptionTitle()
    {
        return $this->option_title;
    }

    /**
     * Set optionSubtitle
     *
     * @param boolean $optionSubtitle
     *
     * @return Page
     */
    public function setOptionSubtitle($optionSubtitle)
    {
        $this->option_subtitle = $optionSubtitle;

        return $this;
    }

    /**
     * Get optionSubtitle
     *
     * @return boolean
     */
    public function getOptionSubtitle()
    {
        return $this->option_subtitle;
    }

    /**
     * Set optionSubnavigation
     *
     * @param boolean $optionSubnavigation
     *
     * @return Page
     */
    public function setOptionSubnavigation($optionSubnavigation)
    {
        $this->option_subnavigation = $optionSubnavigation;

        return $this;
    }

    /**
     * Get optionSubnavigation
     *
     * @return boolean
     */
    public function getOptionSubnavigation()
    {
        return $this->option_subnavigation;
    }

    /**
     * Set optionBreadcrumbs
     *
     * @param boolean $optionBreadcrumbs
     *
     * @return Page
     */
    public function setOptionBreadcrumbs($optionBreadcrumbs)
    {
        $this->option_breadcrumbs = $optionBreadcrumbs;

        return $this;
    }

    /**
     * Get optionBreadcrumbs
     *
     * @return boolean
     */
    public function getOptionBreadcrumbs()
    {
        return $this->option_breadcrumbs;
    }

    /**
     * Set optionHideInSubmenu.
     *
     * @param bool $optionHideInSubmenu
     *
     * @return Page
     */
    public function setOptionHideInSubmenu($optionHideInSubmenu)
    {
        $this->option_hide_in_submenu = $optionHideInSubmenu;

        return $this;
    }

    /**
     * Get optionHideInSubmenu.
     *
     * @return bool
     */
    public function getOptionHideInSubmenu()
    {
        return $this->option_hide_in_submenu;
    }

    /**
     * Set notifyChange.
     *
     * @param bool $notifyChange
     *
     * @return Page
     */
    public function setNotifyChange($notifyChange)
    {
        $this->notify_change = $notifyChange;

        return $this;
    }

    /**
     * Get notifyChange.
     *
     * @return bool
     */
    public function getNotifyChange()
    {
        return $this->notify_change;
    }

    /**
     * Set notifyCreateChild.
     *
     * @param bool $notifyCreateChild
     *
     * @return Page
     */
    public function setNotifyCreateChild($notifyCreateChild)
    {
        $this->notify_create_child = $notifyCreateChild;

        return $this;
    }

    /**
     * Get notifyCreateChild.
     *
     * @return bool
     */
    public function getNotifyCreateChild()
    {
        return $this->notify_create_child;
    }

    /**
     * Set notifyChangeChild.
     *
     * @param bool $notifyChangeChild
     *
     * @return Page
     */
    public function setNotifyChangeChild($notifyChangeChild)
    {
        $this->notify_change_child = $notifyChangeChild;

        return $this;
    }

    /**
     * Get notifyChangeChild.
     *
     * @return bool
     */
    public function getNotifyChangeChild()
    {
        return $this->notify_change_child;
    }

    /**
     * Set notifyEmail.
     *
     * @param string|null $notifyEmail
     *
     * @return Page
     */
    public function setNotifyEmail($notifyEmail = null)
    {
        $this->notify_email = $notifyEmail;

        return $this;
    }

    /**
     * Get notifyEmail.
     *
     * @return string|null
     */
    public function getNotifyEmail()
    {
        return $this->notify_email;
    }

    /**
     * Set notifyType.
     *
     * @param string|null $notifyType
     *
     * @return Page
     */
    public function setNotifyType($notifyType = null)
    {
        $this->notify_type = $notifyType;

        return $this;
    }

    /**
     * Get notifyType.
     *
     * @return string|null
     */
    public function getNotifyType()
    {
        return !empty($this->notify_type) ? $this->notify_type : 'email';
    }

    /**
     * Set notifyTelegramBot.
     *
     * @param string|null $notifyTelegramBot
     *
     * @return Page
     */
    public function setNotifyTelegramBot($notifyTelegramBot = null)
    {
        $this->notify_telegram_bot = $notifyTelegramBot;

        return $this;
    }

    /**
     * Get notifyTelegramBot.
     *
     * @return string|null
     */
    public function getNotifyTelegramBot()
    {
        return $this->notify_telegram_bot;
    }

    /**
     * Set notifyTelegramBotChatId.
     *
     * @param string|null $notifyTelegramBotChatId
     *
     * @return Page
     */
    public function setNotifyTelegramBotChatId($notifyTelegramBotChatId = null)
    {
        $this->notify_telegram_bot_chat_id = $notifyTelegramBotChatId;

        return $this;
    }

    /**
     * Get notifyTelegramBotChatId.
     *
     * @return string|null
     */
    public function getNotifyTelegramBotChatId()
    {
        return $this->notify_telegram_bot_chat_id;
    }

    /**
     * Add score.
     *
     * @param \App\CmsBundle\Entity\PageScore $score
     *
     * @return Page
     */
    public function addScore(\App\CmsBundle\Entity\PageScore $score)
    {
        $this->scores[] = $score;

        return $this;
    }

    /**
     * Remove score.
     *
     * @param \App\CmsBundle\Entity\PageScore $score
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeScore(\App\CmsBundle\Entity\PageScore $score)
    {
        return $this->scores->removeElement($score);
    }

    /**
     * Get scores.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getScores()
    {
        return $this->scores;
    }

    /**
     * Set access.
     *
     * @param string|null $access
     *
     * @return Page
     */
    public function setAccess($access = null)
    {
        // Allowed:
        //
        // ''           // Everyone
        // 'login'      // Only logged in (seek at roles)
        // 'no-login'   // Not logged in

        $this->access = $access;

        return $this;
    }

    /**
     * Get access.
     *
     * @return string|null
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Set accessRoles.
     *
     * @param array|null $accessRoles
     *
     * @return Page
     */
    public function setAccessRoles($accessRoles = null)
    {
        $this->access_roles = $accessRoles;

        return $this;
    }

    /**
     * Get accessRoles.
     *
     * @return array|null
     */
    public function getAccessRoles()
    {
        return $this->access_roles;
    }

    /**
     * Set tplInject.
     *
     * @param string|null $tplInject
     *
     * @return Page
     */
    public function setTplInject($tplInject = null)
    {
        $this->tpl_inject = $tplInject;

        return $this;
    }

    /**
     * Get tplInject.
     *
     * @return string|null
     */
    public function getTplInject()
    {
        return $this->tpl_inject;
    }

    /**
     * Set accessAllowLogin.
     *
     * @param bool|null $accessAllowLogin
     *
     * @return Page
     */
    public function setAccessAllowLogin($accessAllowLogin = null)
    {
        $this->access_allow_login = $accessAllowLogin;

        return $this;
    }

    /**
     * Get accessAllowLogin.
     *
     * @return bool|null
     */
    public function getAccessAllowLogin()
    {
        return $this->access_allow_login;
    }

    /**
     * Set accessVisibleMenu.
     *
     * @param bool|null $accessVisibleMenu
     *
     * @return Page
     */
    public function setAccessVisibleMenu($accessVisibleMenu = null)
    {
        $this->access_visible_menu = $accessVisibleMenu;

        return $this;
    }

    /**
     * Get accessVisibleMenu.
     *
     * @return bool|null
     */
    public function getAccessVisibleMenu()
    {
        return $this->access_visible_menu;
    }

    /**
     * Set showInSitemap.
     *
     * @param bool $showInSitemap
     *
     * @return Page
     */
    public function setShowInSitemap($showInSitemap)
    {
        $this->show_in_sitemap = $showInSitemap;

        return $this;
    }

    /**
     * Get showInSitemap.
     *
     * @return bool
     */
    public function getShowInSitemap()
    {
        return $this->show_in_sitemap;
    }

    /**
     * Set robots.
     *
     * @param string|null $robots
     *
     * @return Page
     */
    public function setRobots($robots = null)
    {
        $this->robots = $robots;

        return $this;
    }

    /**
     * Get robots.
     *
     * @return string|null
     */
    public function getRobots()
    {
        return $this->robots;
    }

    /**
     * Set settings.
     *
     * @param \App\CmsBundle\Entity\Settings|null $settings
     *
     * @return Page
     */
    public function setSettings(\App\CmsBundle\Entity\Settings $settings = null)
    {
        $this->settings = $settings;

        return $this;
    }

    /**
     * Get settings.
     *
     * @return \App\CmsBundle\Entity\Settings|null
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Set oldId.
     *
     * @param int|null $oldId
     *
     * @return Page
     */
    public function setOldId($oldId = null)
    {
        $this->old_id = $oldId;

        return $this;
    }

    /**
     * Get oldId.
     *
     * @return int|null
     */
    public function getOldId()
    {
        return $this->old_id;
    }

    /**
     * Set refId.
     *
     * @param int|null $refId
     *
     * @return Page
     */
    public function setRefId($refId = null)
    {
        $this->ref_id = $refId;

        return $this;
    }

    /**
     * Get refId.
     *
     * @return int|null
     */
    public function getRefId()
    {
        return $this->ref_id;
    }

    /**
     * Set accessAltHome.
     *
     * @param bool|null $accessAltHome
     *
     * @return Page
     */
    public function setAccessAltHome($accessAltHome = null)
    {
        $this->access_alt_home = $accessAltHome;

        return $this;
    }

    /**
     * Get accessAltHome.
     *
     * @return bool|null
     */
    public function getAccessAltHome()
    {
        return $this->access_alt_home;
    }

    /**
     * Set accessB2b.
     *
     * @param bool|null $accessB2b
     *
     * @return Page
     */
    public function setAccessB2b($accessB2b = null)
    {
        $this->access_b2b = $accessB2b;

        return $this;
    }

    /**
     * Get accessB2b.
     *
     * @return bool|null
     */
    public function getAccessB2b()
    {
        return $this->access_b2b;
    }

    /**
     * Set accessFree.
     *
     * @param bool|null $accessFree
     *
     * @return Page
     */
    public function setAccessFree($accessFree = null)
    {
        $this->access_free = $accessFree;

        return $this;
    }

    /**
     * Get accessFree.
     *
     * @return bool|null
     */
    public function getAccessFree()
    {
        return $this->access_free;
    }

    /**
     * Set accessPwd.
     *
     * @param string|null $accessPwd
     *
     * @return Page
     */
    public function setAccessPwd($accessPwd = null)
    {
        $this->access_pwd = $accessPwd;

        return $this;
    }

    /**
     * Get accessPwd.
     *
     * @return string|null
     */
    public function getAccessPwd()
    {
        return $this->access_pwd;
    }

    /**
     * Set static page cache.
     *
     * @param string|null $source
     *
     * @return Page
     */
    public function setCacheData($source = null, string $requestUri = '') : self
    {
        if(!empty($source)){
            $cf = $this->getCacheFile($requestUri);
            $cacheHeader = '<!-- Cache: ' . date('Y-m-d H:i:s') . ' -->' . "\n";

            file_put_contents($cf, $cacheHeader . $source);
        }else{
            $path = str_replace('src/CmsBundle/Entity', 'var/cache/page/', __DIR__);

            $dir = $path . $this->getId();

			// Don't bother with clearing cache if the page hasn't been saved yet.
            if(!empty($this->getId()) && file_exists($dir)){
                foreach (new \DirectoryIterator($dir) as $fileInfo) {
                    if(!$fileInfo->isDot()) {
						if($fileInfo->isDir()) {
							foreach (new \DirectoryIterator($fileInfo->getPathName()) as $fileInfo) {
								if(!$fileInfo->isDot()) {
									if($fileInfo->isfile()) {
										unlink($fileInfo->getPathname());
									}
								}
							}
						}
						if($fileInfo->isFile()) {
							unlink($fileInfo->getPathname());
						}
                    }
                }
    
                rmdir($dir);
            }
        }

        return $this;
    }

    /**
     * Get static page cache.
     *
     * @return string|null
     */
    public function getCacheData(string $requestUri, string $cachepage = null) : ?string
    {
        $cf = $this->getCacheFile($requestUri);

        if(file_exists($cf)){
            $cacheAge = (((time() - filemtime($cf)) / 60));

			if (!empty($cachepage) && filemtime($cf) + (int)$cachepage <= time()) {
				$this->setCacheData(null);
				return null;
			}

            $cache_msg = '<!-- CA: ' . round($cacheAge, 1) . ' minutes -->';
            return $cache_msg . file_get_contents($cf);
        }

        return null;
    }

    /**
     * Get static page cache file.
     *
     * @return string
     */
    public function getCacheFile(string $requestUri) : string
    {
        $path = str_replace('src/CmsBundle/Entity', 'var/cache/page/', __DIR__);

        if(!file_exists($path)){
            mkdir($path);
        }

		$hash = md5(md5('trinity_' . $this->getId() . $requestUri));

		$path = $path . $this->getId() . '/';

		if(!file_exists($path)){
            mkdir($path);
        }

		$path = $path . $hash . '.html';

        return $path;
    }

    /**
     * Set cache.
     *
     * @param bool|null $cache
     *
     * @return Page
     */
    public function setCache($cache = null)
    {
        $this->cache = $cache;

        return $this;
    }

    /**
     * Get cache.
     *
     * @return bool|null
     */
    public function getCache()
    {
        return $this->cache;
    }

	/**
     * Set static critical cache.
     *
     * @param string|null $source
     *
     * @return Page
     */
    public function setCricitalCss($source = null)
    {
        $cf = $this->getCricitalFile();

        $cacheHeader = '<!-- Critical css: ' . date('Y-m-d H:i:s') . ' -->' . "\n";

        if(!empty($source)){
            file_put_contents($cf, $cacheHeader . $source);
        }else{
			if(file_exists($cf)) {
				unlink($cf);
			}
        }

        return $this;
    }

	/**
     * Get static critical cache.
     *
     * @return string|null
     */
    public function getCricitalCss()
    {
        $cf = $this->getCricitalFile();

        if(file_exists($cf)){
            $cacheAge = (((time() - filemtime($cf)) / 60));
            $cache_msg = '<!-- CA: ' . round($cacheAge, 1) . ' minutes -->';
            return $cache_msg . file_get_contents($cf);
        }
        return null;
    }

    /**
     * Get static critical css cache file.
     *
     * @return string|null
     */
    public function getCricitalFile()
    {
        $path = str_replace('src/CmsBundle/Entity', 'var/cache/cricital/', __DIR__);
        if(!file_exists($path)){
            mkdir($path);
        }
        $path = $path . md5(md5('trinity_' . $this->getId())) . '.html';
        return $path;
    }

    /**
     * Set critical.
     *
     * @param bool|null $critical
     *
     * @return Page
     */
    public function setCritical($critical = null)
    {
        $this->critical = $critical;

        return $this;
    }

    /**
     * Get critical.
     *
     * @return bool|null
     */
    public function getCritical()
    {
        return $this->critical;
    }
}
