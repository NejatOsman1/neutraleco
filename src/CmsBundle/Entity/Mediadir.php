<?php
namespace App\CmsBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Mediadir
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="App\CmsBundle\Repository\MediadirRepository")
 */
class Mediadir
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", nullable=true)
     */
    private $label;

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
     * @ORM\ManyToOne(targetEntity="Mediadir", inversedBy="children")
     * @ORM\JoinColumn(name="parentid", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $parent;

    /**
     * @ORM\OneToMany(targetEntity="Mediadir", mappedBy="parent")
     */
    protected $children;

    /**
     * @ORM\OneToMany(targetEntity="Media", mappedBy="parent")
     */
    protected $media;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="mediadirs")
     * @ORM\JoinTable(name="tags_mediadir")
     */
    protected $tags;

    /**
     * @ORM\ManyToOne(targetEntity="Settings", inversedBy="mediadirs")
     * @ORM\JoinColumn(name="settings_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $settings;

    public function __construct(){
        $this->children = new ArrayCollection();
        $this->media = new ArrayCollection();
        $this->tags = new ArrayCollection();
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
     * Set depth
     *
     * @return integer
     */
    public function getDepth()
    {
        $parent = $this->getParent();
        $n = 1;
        while($parent != null){
            $n++;
            $parent = $parent->getParent();
        }

        return $n;
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return Mediadir
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label (without mutations)
     *
     * @return string
     */
    public function getLabelRaw()
    {
        return $this->label;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel($showLanguages = false)
    {
        $S = $this->getSettings();
        if(!empty($S) && empty($this->getParent())){
            $L = $S->getLanguage();
            $flag = '';
            if($showLanguages){
                $flag = '<span style="float: left; margin-right: 5px; margin-top: 3px; border-radius: 100%; width: 13px; height: 13px; background-size: cover;" class="flag-icon flag-icon-' . strtolower($L->getLocale()) . '"></span>';
            }
            return $S->getLabel() . $flag;
            // return $S->getLabel() . ' (' . strtoupper($L->getLocale()) . ')';
        }
        return $this->label;
    }

    /**
     * Set dateAdd
     *
     * @param \DateTime $dateAdd
     *
     * @return Media
     */
    public function setDateAdd()
    {
        $this->dateAdd = new \DateTime('now');

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
     *
     * @return Media
     */
    public function setDateEdit()
    {
        $this->dateEdit = new \DateTime('now');

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
     * Set parent
     *
     * @param \App\CmsBundle\Entity\Mediadir $parent
     *
     * @return Mediadir
     */
    public function setParent(\App\CmsBundle\Entity\Mediadir $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \App\CmsBundle\Entity\Mediadir
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Get all parents
     *
     * @return array
     */
    public function getParents()
    {
        $list = [];

        if($this->getParent() != null){
            $parent = $this->getParent();
            while($parent != null){
                $list[] = $parent;
                $parent = $parent->getParent();
            }
        }

        return array_reverse($list);
    }

    /**
     * Get breadcrumbs
     *
     * @return array
     */
    public function getBreadcrumbs()
    {
        $list = $this->getParents();

        $crumbs = [];
        foreach($list as $P){
            $crumbs[] = '<span class="media-crumb" onclick="openFolder(null, ' . $P->getId() . ');">' . $P->getLabel() . '</span>';
        }

        $crumbs[] = '<span class="media-crumb" onclick="openFolder(null, ' . $this->getId() . ');">' . $this->getLabel() . '</span>';

        return implode(' <i class="fa fa-angle-right"></i> ', $crumbs);
    }

    /**
     * Add child
     *
     * @param \App\CmsBundle\Entity\Mediadir $child
     *
     * @return Mediadir
     */
    public function addChild(\App\CmsBundle\Entity\Mediadir $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \App\CmsBundle\Entity\Mediadir $child
     */
    public function removeChild(\App\CmsBundle\Entity\Mediadir $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Count children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function countChildren()
    {
        return count($this->children);
    }

    /**
     * Add medium
     *
     * @param \App\CmsBundle\Entity\Media $medium
     *
     * @return Mediadir
     */
    public function addMedia(\App\CmsBundle\Entity\Media $medium)
    {
        $this->media[] = $medium;

        return $this;
    }

    /**
     * Remove medium
     *
     * @param \App\CmsBundle\Entity\Media $medium
     */
    public function removeMedia(\App\CmsBundle\Entity\Media $medium)
    {
        $this->media->removeElement($medium);
    }

    /**
     * Get media
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Count media
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function countMedia()
    {
        return count($this->media);
    }

    /**
     * Count children + media
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function countAll()
    {
        return (count($this->media) + count($this->children));
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
     * Add tag
     *
     * @param \App\CmsBundle\Entity\Tag $tag
     *
     * @return Mediadir
     */
    public function addTag(\App\CmsBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
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

    public function addMedium(Media $medium): self
    {
        if (!$this->media->contains($medium)) {
            $this->media[] = $medium;
            $medium->setParent($this);
        }

        return $this;
    }

    public function removeMedium(Media $medium): self
    {
        if ($this->media->contains($medium)) {
            $this->media->removeElement($medium);
            // set the owning side to null (unless already changed)
            if ($medium->getParent() === $this) {
                $medium->setParent(null);
            }
        }

        return $this;
    }

    /**
     * Set settings.
     *
     * @param \App\CmsBundle\Entity\Settings|null $settings
     *
     * @return Mediadir
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
