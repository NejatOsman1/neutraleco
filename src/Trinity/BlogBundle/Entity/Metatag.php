<?php
namespace App\Trinity\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metatag
 *
 * @ORM\Table(name="blog_entry_metatag")
 * @ORM\Entity
 */
class Metatag
{
    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $value;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Trinity\BlogBundle\Entity
     *
     * @ORM\ManyToOne(targetEntity="Entry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $entry;

    /**
     * @var \App\CmsBundle\Entity\Metatag
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\Metatag")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="metatagid", referencedColumnName="id")
     * })
     */
    private $metatag;

    /**
     * Set value.
     *
     * @param string|null $value
     *
     * @return Metatag
     */
    public function setValue($value = null)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value.
     *
     * @return string|null
     */
    public function getValue()
    {
        return $this->value;
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
     * Set entry.
     *
     * @param \App\Trinity\BlogBundle\Entity\Entry|null $entry
     *
     * @return Metatag
     */
    public function setEntry(\App\Trinity\BlogBundle\Entity\Entry $entry = null)
    {
        $this->entry = $entry;

        return $this;
    }

    /**
     * Get entry.
     *
     * @return \App\Trinity\BlogBundle\Entity\Entry|null
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * Set metatag.
     *
     * @param \App\CmsBundle\Entity\Metatag|null $metatag
     *
     * @return Metatag
     */
    public function setMetatag(\App\CmsBundle\Entity\Metatag $metatag = null)
    {
        $this->metatag = $metatag;

        return $this;
    }

    /**
     * Get metatag.
     *
     * @return \App\CmsBundle\Entity\Metatag|null
     */
    public function getMetatag()
    {
        return $this->metatag;
    }
}
