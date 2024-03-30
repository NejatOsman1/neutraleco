<?php
namespace App\Trinity\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Blog
 *
 * @ORM\Table(name="blog")
 * @ORM\Entity(repositoryClass="App\Trinity\BlogBundle\Repository\BlogRepository")
 */
class Blog
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
     * @ORM\Column(name="info", type="text", nullable=true)
     */
    private $info;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="blog")
     */
    protected $category;

    /**
     * @ORM\OneToMany(targetEntity="Entry", mappedBy="blog")
     */
    protected $entries;

    /**
     * @ORM\ManyToOne(targetEntity="\App\CmsBundle\Entity\Language")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $language;

    /**
     * @ORM\ManyToOne(targetEntity="\App\CmsBundle\Entity\Settings", cascade={"persist", "remove" })
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
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
     * @return Blog
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
     * @param \App\Trinity\BlogBundle\Entity\Entry $entry
     *
     * @return Blog
     */
    public function addEntry(\App\Trinity\BlogBundle\Entity\Entry $entry)
    {
        $this->entries[] = $entry;

        return $this;
    }

    /**
     * Remove entry
     *
     * @param \App\Trinity\BlogBundle\Entity\Entry $entry
     */
    public function removeEntry(\App\Trinity\BlogBundle\Entity\Entry $entry)
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
     * Set language
     *
     * @param \App\CmsBundle\Entity\Language $language
     *
     * @return Blog
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
     * Set info.
     *
     * @param string|null $info
     *
     * @return Blog
     */
    public function setInfo($info = null)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info.
     *
     * @return string|null
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set settings.
     *
     * @param \App\CmsBundle\Entity\Settings|null $settings
     *
     * @return Blog
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
     * Add category.
     *
     * @param \App\Trinity\BlogBundle\Entity\Category $category
     *
     * @return Blog
     */
    public function addCategory(\App\Trinity\BlogBundle\Entity\Category $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category.
     *
     * @param \App\Trinity\BlogBundle\Entity\Category $category
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCategory(\App\Trinity\BlogBundle\Entity\Category $category)
    {
        return $this->category->removeElement($category);
    }

    /**
     * Get category.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->category;
    }
}
