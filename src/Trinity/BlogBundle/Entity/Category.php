<?php

namespace App\Trinity\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="blog_category")
 * @ORM\Entity
 */
class Category
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
     * @ORM\ManyToOne(targetEntity="Blog", inversedBy="category")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $blog;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string")
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="intro", type="text", nullable=true)
     */
    private $intro;

    /**
     * @ORM\ManyToMany(targetEntity="Entry", inversedBy="category")
     * @ORM\JoinTable(name="blog_category_link")
     */
    protected $entry;

    /**
     * @ORM\ManyToOne(targetEntity="\App\CmsBundle\Entity\Language")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $language;

     /**
     * @var \App\CmsBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="media", referencedColumnName="id")
     * })
     */
    private $image;

    public function __construct()
    {
        $this->entry = new ArrayCollection();
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
     * Set category.
     *
     * @param string $category
     *
     * @return Category
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category.
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add entry.
     *
     * @param \App\Trinity\BlogBundle\Entity\Entry $entry
     *
     * @return Category
     */
    public function addEntry(\App\Trinity\BlogBundle\Entity\Entry $entry)
    {
        $this->entry[] = $entry;

        return $this;
    }

    /**
     * Remove entry.
     *
     * @param \App\Trinity\BlogBundle\Entity\Entry $entry
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeEntry(\App\Trinity\BlogBundle\Entity\Entry $entry)
    {
        return $this->entry->removeElement($entry);
    }

    /**
     * Get entry.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEntry()
    {
        return $this->entry;
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
     * Set blog.
     *
     * @param \App\Trinity\BlogBundle\Entity\Blog|null $blog
     *
     * @return Category
     */
    public function setBlog(\App\Trinity\BlogBundle\Entity\Blog $blog = null)
    {
        $this->blog = $blog;

        return $this;
    }

    /**
     * Get blog.
     *
     * @return \App\Trinity\BlogBundle\Entity\Blog|null
     */
    public function getBlog()
    {
        return $this->blog;
    }

     /**
     * Set image.
     *
     * @param \App\CmsBundle\Entity\Media|null $image
     *
     * @return Category
     */
    public function setImage(\App\CmsBundle\Entity\Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return \App\CmsBundle\Entity\Media|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set intro
     *
     * @param string $intro
     *
     * @return Entry
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
}
