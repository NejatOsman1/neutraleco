<?php
namespace App\CmsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * NavigationItem
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class NavigationItem
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
     * @ORM\Column(type="string", length=30)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="NavigationItem", inversedBy="children", cascade={"remove"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    protected $parent;

    /**
     * @ORM\OneToMany(targetEntity="NavigationItem", mappedBy="parent", cascade={"remove"})
     * @ORM\OrderBy({"position" = "asc"})
     */
    protected $children;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $target_id;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $label;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $show_sub = true;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $locked = false;


    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity="Navigation", inversedBy="items")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $navigation;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $new_tab = false;

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
     * Set type.
     *
     * @param string $type
     *
     * @return NavigationItem
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set targetId.
     *
     * @param int $targetId
     *
     * @return NavigationItem
     */
    public function setTargetId($targetId)
    {
        $this->target_id = $targetId;

        return $this;
    }

    /**
     * Get targetId.
     *
     * @return int
     */
    public function getTargetId()
    {
        return $this->target_id;
    }

    /**
     * Set position.
     *
     * @param int $position
     *
     * @return NavigationItem
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position.
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set label.
     *
     * @param string $label
     *
     * @return NavigationItem
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
     * Set navigation.
     *
     * @param \App\CmsBundle\Entity\Navigation|null $navigation
     *
     * @return NavigationItem
     */
    public function setNavigation(\App\CmsBundle\Entity\Navigation $navigation = null)
    {
        $this->navigation = $navigation;

        return $this;
    }

    /**
     * Get navigation.
     *
     * @return \App\CmsBundle\Entity\Navigation|null
     */
    public function getNavigation()
    {
        return $this->navigation;
    }

    /**
     * Get navigation.
     */
    public function getObject($doctrine)
    {
        if($this->type == 'category'){
            return $doctrine->getRepository('TrinityWebshopBundle:Category')->find($this->target_id);
        }
        return $doctrine->getRepository('CmsBundle:Page')->find($this->target_id);
    }

    /**
     * Set slug.
     *
     * @param string $slug
     *
     * @return NavigationItem
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set parent.
     *
     * @param \App\CmsBundle\Entity\NavigationItem|null $parent
     *
     * @return NavigationItem
     */
    public function setParent(\App\CmsBundle\Entity\NavigationItem $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent.
     *
     * @return \App\CmsBundle\Entity\NavigationItem|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add child.
     *
     * @param \App\CmsBundle\Entity\NavigationItem $child
     *
     * @return NavigationItem
     */
    public function addChild(\App\CmsBundle\Entity\NavigationItem $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child.
     *
     * @param \App\CmsBundle\Entity\NavigationItem $child
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeChild(\App\CmsBundle\Entity\NavigationItem $child)
    {
        return $this->children->removeElement($child);
    }

    /**
     * Get children.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set locked.
     *
     * @param bool $locked
     *
     * @return NavigationItem
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get locked.
     *
     * @return bool
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Set showSub.
     *
     * @param bool $showSub
     *
     * @return NavigationItem
     */
    public function setShowSub($showSub)
    {
        $this->show_sub = $showSub;

        return $this;
    }

    /**
     * Get showSub.
     *
     * @return bool
     */
    public function getShowSub()
    {
        return $this->show_sub;
    }

    /**
     * Set newTab.
     *
     * @param bool $newTab
     *
     * @return NavigationItem
     */
    public function setNewTab($newTab)
    {
        $this->new_tab = $newTab;

        return $this;
    }

    /**
     * Get newTab.
     *
     * @return bool
     */
    public function getNewTab()
    {
        return $this->new_tab;
    }
}
