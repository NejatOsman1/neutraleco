<?php
namespace App\CmsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use App\CmsBundle\Classes\VideoUrlParser;

/**
 * PageBlock
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="App\CmsBundle\Repository\PageBlockRepository")
 * @ORM\HasLifecycleCallbacks
 */
class PageBlock
{

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50)
     */
    private $internal_id = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25)
     */
    private $template_key = '';

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=3)
     */
    private $pos = 0;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $data = [];

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=70, nullable=true)
     */
    private $bundle = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $bundle_label = '';

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true, nullable=true)
     */
    private $bundle_data;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $content_type = '';

    /**
     * @ORM\ManyToOne(targetEntity="PageBlockWrapper", inversedBy="blocks", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $wrapper;

    /**
     * @var string
     *
     * @ORM\Column(type="array", nullable=true)
     */
    private $config;

    /**
     * @var \App\CmsBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\Media", inversedBy="block")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    private $media;

    /**
     * @ORM\ManyToMany(targetEntity="App\CmsBundle\Entity\PageBlockMedia", inversedBy="page_block")
     */
    protected $alt_media;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $enabled = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $contained = '';


    public $clone_type = '';

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
     * Set internalId
     *
     * @param string $internalId
     *
     * @return PageBlock
     */
    public function setInternalId($internalId)
    {
        $this->internal_id = $internalId;

        return $this;
    }

    /**
     * Get internalId
     *
     * @return string
     */
    public function getInternalId()
    {
        return $this->internal_id;
    }

    /**
     * Set pos
     *
     * @param integer $pos
     *
     * @return PageBlock
     */
    public function setPos($pos)
    {
        $this->pos = $pos;

        return $this;
    }

    /**
     * Get pos
     *
     * @return integer
     */
    public function getPos()
    {
        return $this->pos;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return PageBlock
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        if($this->content_type == 'bundle'){
            return '[' . strtolower($this->bundle) . '_show:show(' . $this->bundle_data . ')]';
        }
        return $this->content;
    }

    /**
     * Set wrapper
     *
     * @param \App\CmsBundle\Entity\PageBlockWrapper $wrapper
     *
     * @return PageBlock
     */
    public function setWrapper(\App\CmsBundle\Entity\PageBlockWrapper $wrapper = null)
    {
        $this->wrapper = $wrapper;

        return $this;
    }

    /**
     * Get wrapper
     *
     * @return \App\CmsBundle\Entity\PageBlockWrapper
     */
    public function getWrapper()
    {
        return $this->wrapper;
    }

    /**
     * Set contentType
     *
     * @param string $contentType
     *
     * @return PageBlock
     */
    public function setContentType($contentType)
    {
        $this->content_type = $contentType;

        return $this;
    }

    /**
     * Get contentType
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->content_type;
    }

    /**
     * Set bundle
     *
     * @param string|null $bundle
     *
     * @return PageBlock
     */
    public function setBundle($bundle)
    {
        $this->bundle = $bundle;

        return $this;
    }

    /**
     * Get bundle
     *
     * @return string
     */
    public function getBundle()
    {
        return $this->bundle;
    }

    /**
     * Set bundleLabel
     *
     * @param string $bundleLabel
     *
     * @return PageBlock
     */
    public function setBundleLabel($bundleLabel)
    {
        $this->bundle_label = $bundleLabel;

        return $this;
    }

    /**
     * Get bundleLabel
     *
     * @return string
     */
    public function getBundleLabel()
    {
        return $this->bundle_label;
    }

    /**
     * Set bundleData
     *
     * @param string $bundleData
     *
     * @return PageBlock
     */
    public function setBundleData($bundleData)
    {
        $this->bundle_data = $bundleData;

        return $this;
    }

    /**
     * Get bundleData
     *
     * @return string
     */
    public function getBundleData($decode = false)
    {
        if($decode){
            return json_decode($this->bundle_data, true);    
        }
        return $this->bundle_data;
    }

    /**
     * Set config
     *
     * @param array $config
     *
     * @return PageBlock
     */
    public function setConfig($config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Get config
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Set templateKey
     *
     * @param string $templateKey
     *
     * @return PageBlock
     */
    public function setTemplateKey($templateKey)
    {
        $this->template_key = $templateKey;

        return $this;
    }

    /**
     * Get templateKey
     *
     * @return string
     */
    public function getTemplateKey()
    {
        return $this->template_key;
    }

    /**
     * Set media
     *
     * @param \App\CmsBundle\Entity\Media $media
     *
     * @return PageBlock
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
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return PageBlock
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
     * Set contained
     *
     * @param string $contained
     *
     * @return PageBlock
     */
    public function setContained($contained)
    {
        $this->contained = $contained;

        return $this;
    }

    /**
     * Get contained
     *
     * @return string
     */
    public function getContained()
    {
        return $this->contained;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alt_media = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Clear alt_media
     */
    public function clearAltMedia()
    {
        $this->alt_media = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set alt_media
     */
    public function setAltMedia($ac)
    {
        $this->alt_media = $ac;
    }

    /**
     * Add altMedia.
     *
     * @param \App\CmsBundle\Entity\PageBlockMedia $altMedia
     *
     * @return PageBlock
     */
    public function addAltMedia(\App\CmsBundle\Entity\PageBlockMedia $altMedia)
    {
        $this->alt_media[] = $altMedia;

        return $this;
    }

    /**
     * Remove altMedia.
     *
     * @param \App\CmsBundle\Entity\PageBlockMedia $altMedia
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAltMedia(\App\CmsBundle\Entity\PageBlockMedia $altMedia)
    {
        return $this->alt_media->removeElement($altMedia);
    }

    /**
     * Get altMedia.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAltMedia()
    {
        return $this->alt_media;
    }

    public function addAltMedium(PageBlockMedia $altMedium): self
    {
        if (!$this->alt_media->contains($altMedium)) {
            $this->alt_media[] = $altMedium;
        }

        return $this;
    }

    public function removeAltMedium(PageBlockMedia $altMedium): self
    {
        if ($this->alt_media->contains($altMedium)) {
            $this->alt_media->removeElement($altMedium);
        }

        return $this;
    }

    /**
     * Clone
     */
    public function __clone() {
        $toAdd = [];

        if($this->getAltMedia()->count() > 0){
            foreach($this->getAltMedia() as $m){
                $toAdd[] = $m->getMedia();
            }
        }

        $this->alt_media = new ArrayCollection();
        foreach($toAdd as $Media){
            $BlockMedia = new \App\CmsBundle\Entity\PageBlockMedia();
            $BlockMedia->setMedia($Media);
            $BlockMedia->addPageBlock($this);
            $this->em->persist($BlockMedia);

            $this->alt_media->add($BlockMedia);
        }
    }

    /**
     * Set data.
     *
     * @param array|null $data
     *
     * @return PageBlock
     */
    public function setData($data = null)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data.
     *
     * @return array|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get parsed video.
     *
     * @return string
     */
    public function getVideo($embedCode = true, $playbutton = false)
    {
        if(!empty($this->data) && !empty($this->data['type']) && $this->data['type'] == 'video'){
            if($embedCode){
                return VideoUrlParser::get_embed_code($this->data['source'], $playbutton);
            }
            return VideoUrlParser::get_url_embed($this->data['source']);
        }

        return '<span>Invalid video</span>';
    }

    /**
     * Helper function to get the real width of the block in column format
     *
     * @return integer
     */
    public function getWidth(){

        // Attempt to get custom size for block specific
        $config = $this->getConfig();
        if(!empty($config['width'])){
            return $config['width'];
        }
        
        // Attempt to get grid size defined by parent wrapper
        $gridSize = $this->getWrapper()->getGridSize();
        if(!empty($gridSize)){
            return (12 / $gridSize);
        }

        // Fallback to 12 (full size)
        return 12;
    }

    /**
     * Helper function to get the offset for single block
     *
     * @return integer
     */
    public function getOffset($prefix = '', $suffix = ''){

        // Attempt to get custom size for block specific
        $config = $this->getConfig();
        if(!empty($config['offset'])){
            return $prefix . $config['offset'] . $suffix;
        }

        // Fallback to empty
        return '';
    }

    /**
     * Helper function to get the block CSS class
     *
     * @return string
     */
    public function getClass(){
        $class = '';

        // Find by config
        $config = $this->getConfig();
        if(!empty($config['class'])){
            $class = $config['class'];
        }
        
        return $class;
    }

    /**
     * Helper function to get the block CSS id with tag
     *
     * @return string
     */
    public function getCssId(){
        $id = '';

        // Find by config
        $config = $this->getConfig();
        if(!empty($config['id'])){
            $id = 'id="' . $config['id'] . '"';
        }
        
        return $id;
    }
}
