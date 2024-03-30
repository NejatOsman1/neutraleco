<?php
namespace App\CmsBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tag
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="App\CmsBundle\Repository\TagRepository")
 */
class Tag
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
     * @ORM\ManyToMany(targetEntity="Page", mappedBy="tags")
     */
    protected $pages;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="tags")
     */
    protected $users;

    /**
     * @ORM\ManyToMany(targetEntity="Mediadir", mappedBy="tags")
     */
    protected $mediadirs;

    /**
     * @ORM\ManyToMany(targetEntity="Media", mappedBy="tags")
     */
    protected $media;

    /**
     * @ORM\ManyToMany(targetEntity="Clientdomain", mappedBy="tags")
     */
    protected $domains;

    public function __construct(){
        $this->pages = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->mediadirs = new ArrayCollection();
        $this->media = new ArrayCollection();
        $this->domains = new ArrayCollection();
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
     * @return Tag
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
     * Add page
     *
     * @param \App\CmsBundle\Entity\Page $page
     *
     * @return Tag
     */
    public function addPage(\App\CmsBundle\Entity\Page $page)
    {
        $this->pages[] = $page;

        return $this;
    }

    /**
     * Remove page
     *
     * @param \App\CmsBundle\Entity\Page $page
     */
    public function removePage(\App\CmsBundle\Entity\Page $page)
    {
        $this->pages->removeElement($page);
    }

    /**
     * Get pages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Count pages
     *
     * @return integer
     */
    public function countPages()
    {
        return count($this->pages);
    }

    /**
     * Add user
     *
     * @param \App\CmsBundle\Entity\User $user
     *
     * @return Tag
     */
    public function addUser(\App\CmsBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \App\CmsBundle\Entity\User $user
     */
    public function removeUser(\App\CmsBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Count users
     *
     * @return integer
     */
    public function countUsers()
    {
        return count($this->users);
    }

    /**
     * Add mediadir
     *
     * @param \App\CmsBundle\Entity\Mediadir $mediadir
     *
     * @return Tag
     */
    public function addMediadir(\App\CmsBundle\Entity\Mediadir $mediadir)
    {
        $this->mediadirs[] = $mediadir;

        return $this;
    }

    /**
     * Remove mediadir
     *
     * @param \App\CmsBundle\Entity\Mediadir $mediadir
     */
    public function removeMediadir(\App\CmsBundle\Entity\Mediadir $mediadir)
    {
        $this->mediadirs->removeElement($mediadir);
    }

    /**
     * Get mediadirs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMediadirs()
    {
        return $this->mediadirs;
    }

    /**
     * Count mediadirs
     *
     * @return integer
     */
    public function countMediadirs()
    {
        return count($this->mediadirs);
    }

    /**
     * Add medium
     *
     * @param \App\CmsBundle\Entity\Media $medium
     *
     * @return Tag
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
     * @return integer
     */
    public function countMedia()
    {
        return count($this->media);
    }

    /**
     * Get total count
     *
     * @return integer count
     */
    public function totalCount(){
        $total = 0;
        $total += $this->countMedia();
        $total += $this->countMediadirs();
        $total += $this->countUsers();
        $total += $this->countPages();
        return $total;
    }

    public function addMedium(Media $medium): self
    {
        if (!$this->media->contains($medium)) {
            $this->media[] = $medium;
            $medium->addTag($this);
        }

        return $this;
    }

    public function removeMedium(Media $medium): self
    {
        if ($this->media->contains($medium)) {
            $this->media->removeElement($medium);
            $medium->removeTag($this);
        }

        return $this;
    }

    /**
     * Add domain.
     *
     * @param \App\CmsBundle\Entity\Clientdomain $domain
     *
     * @return Tag
     */
    public function addDomain(\App\CmsBundle\Entity\Clientdomain $domain)
    {
        $this->domains[] = $domain;

        return $this;
    }

    /**
     * Remove domain.
     *
     * @param \App\CmsBundle\Entity\Clientdomain $domain
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDomain(\App\CmsBundle\Entity\Clientdomain $domain)
    {
        return $this->domains->removeElement($domain);
    }

    /**
     * Get domains.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDomains()
    {
        return $this->domains;
    }
}
