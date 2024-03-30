<?php
namespace App\CmsBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * PageBlockWrapper
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="App\CmsBundle\Repository\PageBlockWrapperRepository")
 * @ORM\HasLifecycleCallbacks
 */
class PageBlockWrapper
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
    private $internal_id = 0;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50)
     */
    private $template_key = '';

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=3)
     */
    private $pos = 0;

    /**
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="blocks")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $page;

    /**
     * @ORM\OneToMany(targetEntity="PageBlock", mappedBy="wrapper", cascade={"persist"})
     * @ORM\OrderBy({"pos" = "ASC"})
     */
    protected $blocks;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $enabled = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $label = '';

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $intro;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $css_class;


    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $bg_color;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $css_id;

    public $clone_type = '';
    public $em = null;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=1)
     */
    private $grid_size = 0;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $anchor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $select_class;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $select_text_color;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $padding_top;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $padding_right;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $padding_bottom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $padding_left;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->blocks = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set internalId
     *
     * @param string $internalId
     *
     * @return PageBlockWrapper
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
     * @return PageBlockWrapper
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
     * Set page
     *
     * @param \App\CmsBundle\Entity\Page $page
     *
     * @return PageBlockWrapper
     */
    public function setPage(\App\CmsBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
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
     * Add block
     *
     * @param \App\CmsBundle\Entity\PageBlock $block
     *
     * @return PageBlockWrapper
     */
    public function addBlock(\App\CmsBundle\Entity\PageBlock $block)
    {
        $this->blocks[] = $block;

        return $this;
    }

    /**
     * Remove block
     *
     * @param \App\CmsBundle\Entity\PageBlock $block
     */
    public function removeBlock(\App\CmsBundle\Entity\PageBlock $block)
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
     * Set templateKey
     *
     * @param string $templateKey
     *
     * @return PageBlockWrapper
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
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return PageBlockWrapper
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
     * Set label
     *
     * @param string $label
     *
     * @return PageBlockWrapper
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
     * Set intro
     *
     * @param string $intro
     *
     * @return PageBlockWrapper
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;

        return $this;
    }

    /**
     * Get intro
     *
     * @return string
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Clone
     */
    public function __clone() {
        // Get current collection
        $blocks = $this->getBlocks();
        $this->blocks = new ArrayCollection();
        foreach ($blocks as $block) {
            $block->clone_type = $this->clone_type;
            $block->em = $this->em;

            $newBlock = clone $block;
            $this->blocks->add($newBlock);
            $newBlock->setWrapper($this);

            if($this->clone_type == 'lorem'){
                if($newBlock->getContent() != '' && $newBlock->getMedia() == null){
                    $newBlock->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum bibendum velit sed mattis iaculis. Donec libero odio, mollis quis libero quis, feugiat bibendum ante. Sed erat diam, vehicula a lectus sodales, pulvinar aliquet odio. Etiam ornare enim convallis, consectetur eros nec, interdum augue. In tortor elit, malesuada eget metus vel, facilisis tristique urna. Fusce finibus, sem interdum accumsan consequat, velit diam posuere justo, eu lacinia lacus leo dapibus ligula. Sed maximus accumsan accumsan. Suspendisse ut odio ut odio pellentesque dignissim ac in diam. Nullam malesuada, elit non ultricies scelerisque, turpis mauris aliquet est, varius fermentum orci tortor et justo.');
                }else{
                    $newBlock->setContentType(null);
                }
                $newBlock->setConfig('a:0:{}');
                $newBlock->setMedia(null);
            }else if($this->clone_type == 'remove'){
                $newBlock->setContent('');
                $newBlock->setConfig('a:0:{}');
                $newBlock->setMedia(null);
                $newBlock->setContentType(null);
            }
        }
    }

    /**
     * Set cssClass
     *
     * @param string $cssClass
     *
     * @return PageBlockWrapper
     */
    public function setCssClass($cssClass)
    {
        $this->css_class = $cssClass;

        return $this;
    }

    /**
     * Get cssClass
     *
     * @return string
     */
    public function getCssClass()
    {
        return $this->css_class;
    }

    /**
     * Set cssId
     *
     * @param string $cssId
     *
     * @return PageBlockWrapper
     */
    public function setCssId($cssId)
    {
        $this->css_id = $cssId;

        return $this;
    }

    /**
     * Get cssId
     *
     * @return string
     */
    public function getCssId()
    {
        return $this->css_id;
    }

    /**
     * Set gridSize
     *
     * @param integer $gridSize
     *
     * @return PageBlockWrapper
     */
    public function setGridSize($gridSize)
    {
        $this->grid_size = $gridSize;

        return $this;
    }

    /**
     * Get gridSize
     *
     * @return integer
     */
    public function getGridSize()
    {
        return $this->grid_size;
    }

    /**
     * Set anchor.
     *
     * @param string|null $anchor
     *
     * @return PageBlockWrapper
     */
    public function setAnchor($anchor = null)
    {
        $this->anchor = $anchor;

        return $this;
    }

    /**
     * Get anchor.
     *
     * @return string|null
     */
    public function getAnchor()
    {
        return $this->anchor;
    }

    /**
     * Set bgColor.
     *
     * @param string|null $bgColor
     *
     * @return PageBlockWrapper
     */
    public function setBgColor($bgColor = null)
    {
        $this->bg_color = $bgColor;

        return $this;
    }

    /**
     * Get bgColor.
     *
     * @return string|null
     */
    public function getBgColor()
    {
        return $this->bg_color;
    }

    public function getSelectClass(): ?string
    {
        return $this->select_class;
    }

    public function setSelectClass(?string $select_class): self
    {
        $this->select_class = $select_class;

        return $this;
    }

    public function getSelectTextColor(): ?string
    {
        return $this->select_text_color;
    }

    public function setSelectTextColor(?string $select_text_color): self
    {
        $this->select_text_color = $select_text_color;

        return $this;
    }

    public function getPaddingTop(): ?int
    {
        return $this->padding_top;
    }

    public function setPaddingTop(?int $padding_top): self
    {
        $this->padding_top = $padding_top;

        return $this;
    }

    public function getPaddingRight(): ?int
    {
        return $this->padding_right;
    }

    public function setPaddingRight(?int $padding_right): self
    {
        $this->padding_right = $padding_right;

        return $this;
    }

    public function getPaddingBottom(): ?int
    {
        return $this->padding_bottom;
    }

    public function setPaddingBottom(?int $padding_bottom): self
    {
        $this->padding_bottom = $padding_bottom;

        return $this;
    }

    public function getPaddingLeft(): ?int
    {
        return $this->padding_left;
    }

    public function setPaddingLeft(?int $padding_left): self
    {
        $this->padding_left = $padding_left;

        return $this;
    }

    /**
     * Render all dynamic classes for frontend
     * 
     * @return string
     */
    public function classList(){
        $classes = [];
        if(!empty($this->getCssClass())){
            $classes[] = $this->getCssClass();
        }
        if(!empty($this->getSelectClass())){
            $classes[] = $this->getSelectClass();
        }
        if(!empty($this->getSelectTextColor())){
            $classes[] = $this->getSelectTextColor();
        }
        return implode(' ', $classes);
    }

    /**
     * Render all dynamic inline style for frontend
     * 
     * @return string
     */
    public function styleList(){
        $styles = [];
        if(!empty($this->getBgColor())){
            $styles[] = 'background-color: ' . $this->getBgColor() . ';';
        }
        if(!is_null($this->getPaddingTop())){
            $styles[] = 'padding-top: ' . $this->getPaddingTop() . 'px;';
        }
        if(!is_null($this->getPaddingRight())){
            $styles[] = 'padding-right: ' . $this->getPaddingRight() . 'px;';
        }
        if(!is_null($this->getPaddingBottom())){
            $styles[] = 'padding-bottom: ' . $this->getPaddingBottom() . 'px;';
        }
        if(!is_null($this->getPaddingLeft())){
            $styles[] = 'padding-left: ' . $this->getPaddingLeft() . 'px;';
        }
        return implode(' ', $styles);
    }
}
