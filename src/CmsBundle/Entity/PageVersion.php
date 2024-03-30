<?php

namespace App\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class PageVersion
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="languagecode", type="string", length=2)
     */
     private $languagecode;

    /**
     * @ORM\Column(name="content", type="text")
     */
     private $content;

    /**
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="versions")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id")
     */
    protected $page;

    public $clone_type = '';

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
     * Set languagecode
     *
     * @param string $languagecode
     *
     * @return PageVersion
     */
    public function setLanguagecode($languagecode)
    {
        $this->languagecode = $languagecode;

        return $this;
    }

    /**
     * Get languagecode
     *
     * @return string
     */
    public function getLanguagecode()
    {
        return $this->languagecode;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return PageVersion
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
     * Set page
     *
     * @param \App\CmsBundle\Entity\Page $page
     *
     * @return PageVersion
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
}
