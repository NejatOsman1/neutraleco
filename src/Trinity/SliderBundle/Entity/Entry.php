<?php
namespace App\Trinity\SliderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entry
 *
 * @ORM\Table(name="slider_entry")
 * @ORM\Entity(repositoryClass="App\Trinity\SliderBundle\Repository\EntryRepository")
 */
class Entry
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
     * @var string
     *
     * @ORM\Column(name="intro", type="text", nullable=true)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="button", type="string", length=255, nullable=true)
     */
    private $button;

    /**
     * @var string
     *
     * @ORM\Column(name="button_url", type="string", length=255, nullable=true)
     */
    private $buttonUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="slide_url", type="string", length=255, nullable=true)
     */
    private $slideUrl;

    /**
     * @ORM\ManyToOne(targetEntity="Slider", inversedBy="entries")
     * @ORM\JoinColumn(name="slider_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $slider;

    /**
     * @var string
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled = true;

    /**
     * @ORM\ManyToOne(targetEntity="\App\CmsBundle\Entity\Media")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    protected $media;

    /**
     * @ORM\ManyToOne(targetEntity="\App\CmsBundle\Entity\Media")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    protected $mobilemedia;
    
    /**
     * @var string
     *
     * @ORM\Column(name="classes", type="string", length=255, nullable=true)
     */
    private $classes;

    /**
     * @var array
     *
     * @ORM\Column(type="array", nullable=true)
     */
    private $buttons;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=3, nullable=true)
     */
    private $position;

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
     * @return Entry
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
     * Set content
     *
     * @param string $content
     *
     * @return Entry
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
        return $this->content;
    }

    /**
     * Set button
     *
     * @param string $button
     *
     * @return Entry
     */
    public function setButton($button)
    {
        $this->button = $button;

        return $this;
    }

    /**
     * Get button
     *
     * @return string
     */
    public function getButton()
    {
        return $this->button;
    }

    /**
     * Set slider
     *
     * @param \App\Trinity\SliderBundle\Entity\Slider $slider
     *
     * @return Entry
     */
    public function setSlider(\App\Trinity\SliderBundle\Entity\Slider $slider = null)
    {
        $this->slider = $slider;

        return $this;
    }

    /**
     * Get slider
     *
     * @return \App\Trinity\SliderBundle\Entity\Slider
     */
    public function getSlider()
    {
        return $this->slider;
    }

    /**
     * Set buttonUrl
     *
     * @param string $buttonUrl
     *
     * @return Entry
     */
    public function setButtonUrl($buttonUrl)
    {
        $this->buttonUrl = $buttonUrl;

        return $this;
    }

    /**
     * Get buttonUrl
     *
     * @return string
     */
    public function getButtonUrl()
    {
        return $this->buttonUrl;
    }

    /**
     * Get parsed buttonUrl
     *
     * @return string
     */
    public function getParsedButtonUrl()
    {
        $url = $this->getButtonUrl();
        return preg_replace('/^(http(\s?):\/\/)?(www.)?/', '', $url);
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return Entry
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
     * Has media
     *
     * @return boolean
     */
    public function hasMedia()
    {
        return !empty($this->media);
    }

    /**
     * Set media
     *
     * @param \App\CmsBundle\Entity\Media $media
     *
     * @return Slide
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
     * Has mobilemedia
     *
     * @return boolean
     */
    public function hasMobileMedia()
    {
        return !empty($this->mobilemedia);
    }

    /**
     * Set mobilemedia.
     *
     * @param \App\CmsBundle\Entity\Media|null $mobilemedia
     *
     * @return Entry
     */
    public function setMobilemedia(\App\CmsBundle\Entity\Media $mobilemedia = null)
    {
        $this->mobilemedia = $mobilemedia;

        return $this;
    }

    /**
     * Get mobilemedia.
     *
     * @return \App\CmsBundle\Entity\Media|null
     */
    public function getMobilemedia()
    {
        return $this->mobilemedia;
    }

    /**
     * Set classes
     *
     * @param string $classes
     *
     * @return Entry
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
     * Set position
     *
     * @param integer $position
     *
     * @return Entry
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set buttons
     *
     * @param array $buttons
     *
     * @return Entry
     */
    public function setButtons($buttons)
    {
        $this->buttons = $buttons;

        return $this;
    }

    /**
     * Get buttons
     *
     * @return array
     */
    public function getButtons()
    {
        return $this->buttons;
    }

    /**
     * Set slideUrl.
     *
     * @param string|null $slideUrl
     *
     * @return Entry
     */
    public function setSlideUrl($slideUrl = null)
    {
        $this->slideUrl = $slideUrl;

        return $this;
    }

    /**
     * Get slideUrl.
     *
     * @return string|null
     */
    public function getSlideUrl()
    {
        return $this->slideUrl;
    }
}
