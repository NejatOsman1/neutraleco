<?php
namespace App\Trinity\SliderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Slider
 *
 * @ORM\Table(name="slider")
 * @ORM\Entity
 */
class Slider
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=true)
     */
    private $label;

    /**
     * @ORM\OneToMany(targetEntity="Entry", mappedBy="slider")
     * @ORM\OrderBy({"position" = "ASC"})
     */
    protected $entries;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $show_title = true;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $show_content  = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $fade = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $auto_play = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $dots = true;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $center_mode = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $arrows = true;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $infinite = true;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=5, nullable=true)
     */
    private $scroll_speed = 300;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=5, nullable=true)
     */
    private $auto_speed = 2000;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=5, nullable=true)
     */
    private $slides_to_show = 1;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=5, nullable=true)
     */
    private $slides_to_scroll = 1;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $classes;

    /**
     * @var integer
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $height;

    /**
     * @ORM\ManyToOne(targetEntity="\App\CmsBundle\Entity\Language")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $language;

    /**
     * @ORM\ManyToOne(targetEntity="\App\CmsBundle\Entity\Settings")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $settings;

    public function __construct(){
        $this->entries = new ArrayCollection();
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
     * Set label
     *
     * @param string $label
     *
     * @return Slider
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
     * Add entry
     *
     * @param \App\Trinity\SliderBundle\Entity\Entry $entry
     *
     * @return Slider
     */
    public function addEntry(\App\Trinity\SliderBundle\Entity\Entry $entry)
    {
        $this->entries[] = $entry;

        return $this;
    }

    /**
     * Remove entry
     *
     * @param \App\Trinity\SliderBundle\Entity\Entry $entry
     */
    public function removeEntry(\App\Trinity\SliderBundle\Entity\Entry $entry)
    {
        $this->entries->removeElement($entry);
    }

    /**
     * Get entries
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * Set classes
     *
     * @param string $classes
     *
     * @return Slider
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
     * Set height
     *
     * @param integer $height
     *
     * @return Slider
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set showTitle
     *
     * @param boolean $showTitle
     *
     * @return Slider
     */
    public function setShowTitle($showTitle)
    {
        $this->show_title = $showTitle;

        return $this;
    }

    /**
     * Get showTitle
     *
     * @return boolean
     */
    public function getShowTitle()
    {
        return $this->show_title;
    }

    /**
     * Set fade
     *
     * @param boolean $fade
     *
     * @return Slider
     */
    public function setFade($fade)
    {
        $this->fade = $fade;

        return $this;
    }

    /**
     * Get fade
     *
     * @return boolean
     */
    public function getFade()
    {
        return (bool)$this->fade;
    }

    /**
     * Set autoPlay
     *
     * @param boolean $autoPlay
     *
     * @return Slider
     */
    public function setAutoPlay($autoPlay)
    {
        $this->auto_play = $autoPlay;

        return $this;
    }

    /**
     * Get autoPlay
     *
     * @return boolean
     */
    public function getAutoPlay()
    {
        return (bool)$this->auto_play;
    }

    /**
     * Set dots
     *
     * @param boolean $dots
     *
     * @return Slider
     */
    public function setDots($dots)
    {
        $this->dots = $dots;

        return $this;
    }

    /**
     * Get dots
     *
     * @return boolean
     */
    public function getDots()
    {
        return (bool)$this->dots;
    }

    /**
     * Set centerMode
     *
     * @param boolean $centerMode
     *
     * @return Slider
     */
    public function setCenterMode($centerMode)
    {
        $this->center_mode = $centerMode;

        return $this;
    }

    /**
     * Get centerMode
     *
     * @return boolean
     */
    public function getCenterMode()
    {
        return (bool)$this->center_mode;
    }

    /**
     * Set infinite
     *
     * @param boolean $infinite
     *
     * @return Slider
     */
    public function setInfinite($infinite)
    {
        $this->infinite = $infinite;

        return $this;
    }

    /**
     * Get infinite
     *
     * @return boolean
     */
    public function getInfinite()
    {
        return (bool)$this->infinite;
    }

    /**
     * Set scrollSpeed
     *
     * @param integer $scrollSpeed
     *
     * @return Slider
     */
    public function setScrollSpeed($scrollSpeed)
    {
        $this->scroll_speed = $scrollSpeed;

        return $this;
    }

    /**
     * Get scrollSpeed
     *
     * @return integer
     */
    public function getScrollSpeed()
    {
        return (int)$this->scroll_speed == 0 ? 200 : (int)$this->scroll_speed;
    }

    /**
     * Set autoSpeed
     *
     * @param integer $autoSpeed
     *
     * @return Slider
     */
    public function setAutoSpeed($autoSpeed)
    {
        $this->auto_speed = $autoSpeed;

        return $this;
    }

    /**
     * Get autoSpeed
     *
     * @return integer
     */
    public function getAutoSpeed()
    {
        return (int)$this->auto_speed == 0 ? 1000 : (int)$this->auto_speed;
    }

    /**
     * Set slidesToShow
     *
     * @param integer $slidesToShow
     *
     * @return Slider
     */
    public function setSlidesToShow($slidesToShow)
    {
        $this->slides_to_show = $slidesToShow;

        return $this;
    }

    /**
     * Get slidesToShow
     *
     * @return integer
     */
    public function getSlidesToShow()
    {
        return (int)$this->slides_to_show == 0 ? 1 : (int)$this->slides_to_show;
    }

    /**
     * Set slidesToScroll
     *
     * @param integer $slidesToScroll
     *
     * @return Slider
     */
    public function setSlidesToScroll($slidesToScroll)
    {
        $this->slides_to_scroll = $slidesToScroll;

        return $this;
    }

    /**
     * Get slidesToScroll
     *
     * @return integer
     */
    public function getSlidesToScroll()
    {
        return (int)$this->slides_to_scroll == 0 ? 1 : (int)$this->slides_to_scroll;
    }

    /**
     * Set arrows
     *
     * @param boolean $arrows
     *
     * @return Slider
     */
    public function setArrows($arrows)
    {
        $this->arrows = $arrows;

        return $this;
    }

    /**
     * Get arrows
     *
     * @return boolean
     */
    public function getArrows()
    {
        return (bool)$this->arrows;
    }

    /**
     * Set language
     *
     * @param \App\CmsBundle\Entity\Language $language
     *
     * @return Slider
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
     * Set showContent.
     *
     * @param bool $showContent
     *
     * @return Slider
     */
    public function setShowContent($showContent)
    {
        $this->show_content = $showContent;

        return $this;
    }

    /**
     * Get showContent.
     *
     * @return bool
     */
    public function getShowContent()
    {
        return $this->show_content;
    }

    /**
     * Set settings.
     *
     * @param \App\CmsBundle\Entity\Settings|null $settings
     *
     * @return Slider
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
}
