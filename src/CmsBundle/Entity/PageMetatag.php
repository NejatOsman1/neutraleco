<?php

namespace App\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageMetatag
 *
 * @ORM\Table(name="page_metatag", indexes={@ORM\Index(name="fk_page_metatag_metatag1_idx", columns={"metatagid"}), @ORM\Index(name="fk_page_metatag_page1_idx", columns={"page"})})
 * @ORM\Entity
 */
class PageMetatag
{
    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", nullable=true)
     */
    private $value;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\CmsBundle\Entity\Page
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\Page", inversedBy="metatags")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="page", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $page;

    /**
     * @var string
     *
     * @ORM\Column(name="page_slug", type="string", nullable=true)
     */
    private $pageSlug;

    /**
     * @var \App\CmsBundle\Entity\Metatag
     *
     * @ORM\ManyToOne(targetEntity="Metatag")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="metatagid", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $metatagid;



    /**
     * Set value
     *
     * @param string $value
     * @return PageMetatag
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
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
     * Set page
     *
     * @param \App\CmsBundle\Entity\Page $page
     * @return PageMetatag
     */
    public function setPage(\App\CmsBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \App\CmsBundle\Entity\Page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set pageSlug
     *
     * @param string $pageSlug
     * @return PageMetatag
     */
    public function setPageSlug($pageSlug = '')
    {
        $this->pageSlug = (string)$pageSlug;

        return $this;
    }

    /**
     * Get pageSlug
     *
     * @return string
     */
    public function getPageSlug()
    {
        return (string)$this->pageSlug;
    }

    /**
     * Set metatagid
     *
     * @param \App\CmsBundle\Entity\Metatag $metatagid
     * @return PageMetatag
     */
    public function setMetatagid(\App\CmsBundle\Entity\Metatag $metatagid = null)
    {
        $this->metatagid = $metatagid;

        return $this;
    }

    /**
     * Get metatagid
     *
     * @return \App\CmsBundle\Entity\Metatag
     */
    public function getMetatagid()
    {
        return $this->metatagid;
    }
}
