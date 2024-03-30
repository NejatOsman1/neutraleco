<?php
namespace App\CmsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * PageBlockMedia
 *
 * @ORM\Table(name="page_block_media_link")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 */
class PageBlockMedia
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
     * @var \App\CmsBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $media;

    /**
     * @ORM\ManyToMany(targetEntity="PageBlock", mappedBy="alt_media")
     */
    protected $page_block;

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
     * Constructor
     */
    public function __construct()
    {
        $this->page_block = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set media.
     *
     * @param \App\CmsBundle\Entity\Media|null $media
     *
     * @return PageBlockMedia
     */
    public function setMedia(\App\CmsBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media.
     *
     * @return \App\CmsBundle\Entity\Media|null
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Add pageBlock.
     *
     * @param \App\CmsBundle\Entity\PageBlock $pageBlock
     *
     * @return PageBlockMedia
     */
    public function addPageBlock(\App\CmsBundle\Entity\PageBlock $pageBlock)
    {
        $this->page_block[] = $pageBlock;

        return $this;
    }

    /**
     * Remove pageBlock.
     *
     * @param \App\CmsBundle\Entity\PageBlock $pageBlock
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePageBlock(\App\CmsBundle\Entity\PageBlock $pageBlock)
    {
        return $this->page_block->removeElement($pageBlock);
    }

    /**
     * Get pageBlock.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPageBlock()
    {
        return $this->page_block;
    }
}
