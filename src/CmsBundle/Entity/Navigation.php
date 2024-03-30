<?php
namespace App\CmsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Navigation
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Navigation
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $short;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $label;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date_edit;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $sub_pages = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $sub_webshop_cats = false;

    /**
     * @ORM\OneToMany(targetEntity="NavigationItem", mappedBy="navigation", cascade={"persist", "remove" })
     * @ORM\OrderBy({"position" = "ASC"})
     */
    protected $items;

    /**
     * @ORM\ManyToOne(targetEntity="\App\CmsBundle\Entity\Language")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $language;

    /**
     * @ORM\ManyToOne(targetEntity="Settings", inversedBy="navigations")
     * @ORM\JoinColumn(name="settings_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $settings;

    public function __construct(){
        if(is_null($this->date)) $this->date = new \DateTime();
        if(is_null($this->date_edit)) $this->date_edit = new \DateTime();
        $this->items = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set short.
     *
     * @param string $short
     *
     * @return Navigation
     */
    public function setShort($short)
    {
        $this->short = $short;

        return $this;
    }

    /**
     * Get short.
     *
     * @return string
     */
    public function getShort()
    {
        return $this->short;
    }

    /**
     * Set label.
     *
     * @param string $label
     *
     * @return Navigation
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Navigation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set dateEdit.
     *
     * @param \DateTime $dateEdit
     *
     * @return Navigation
     */
    public function setDateEdit($dateEdit)
    {
        $this->date_edit = $dateEdit;

        return $this;
    }

    /**
     * Get dateEdit.
     *
     * @return \DateTime
     */
    public function getDateEdit()
    {
        return $this->date_edit;
    }

    /**
     * Add item.
     *
     * @param \App\CmsBundle\Entity\NavigationItem $item
     *
     * @return Navigation
     */
    public function addItem(\App\CmsBundle\Entity\NavigationItem $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Remove item.
     *
     * @param \App\CmsBundle\Entity\NavigationItem $item
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeItem(\App\CmsBundle\Entity\NavigationItem $item)
    {
        return $this->items->removeElement($item);
    }

    /**
     * Get items.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set language.
     *
     * @param \App\CmsBundle\Entity\Language|null $language
     *
     * @return Navigation
     */
    public function setLanguage(\App\CmsBundle\Entity\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language.
     *
     * @return \App\CmsBundle\Entity\Language|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set settings.
     *
     * @param \App\CmsBundle\Entity\Settings|null $settings
     *
     * @return Navigation
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
     * Set subPages.
     *
     * @param bool|null $subPages
     *
     * @return Navigation
     */
    public function setSubPages($subPages = null)
    {
        $this->sub_pages = $subPages;

        return $this;
    }

    /**
     * Get subPages.
     *
     * @return bool|null
     */
    public function getSubPages()
    {
        return $this->sub_pages;
    }

    /**
     * Set subWebshopCats.
     *
     * @param bool|null $subWebshopCats
     *
     * @return Navigation
     */
    public function setSubWebshopCats($subWebshopCats = null)
    {
        $this->sub_webshop_cats = $subWebshopCats;

        return $this;
    }

    /**
     * Get subWebshopCats.
     *
     * @return bool|null
     */
    public function getSubWebshopCats()
    {
        return $this->sub_webshop_cats;
    }
}
