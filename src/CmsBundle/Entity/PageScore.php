<?php

namespace App\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class PageScore
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="scores")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id")
     */
    private $page;

    /**
     * @var datetime $created
     *
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $status_code;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $score;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $score_mobile;

    /**
     * @var string
     *
     * @ORM\Column(type="array", nullable=true)
     */
    private $stats;

    /**
     * @var string
     *
     * @ORM\Column(type="array", nullable=true)
     */
    private $results;

    /**
     * @var string
     *
     * @ORM\Column(type="array", nullable=true)
     */
    private $results_mobile;

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
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return PageScore
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
     * Set score.
     *
     * @param int|null $score
     *
     * @return PageScore
     */
    public function setScore($score = null)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score.
     *
     * @return int|null
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set scoreMobile.
     *
     * @param int|null $scoreMobile
     *
     * @return PageScore
     */
    public function setScoreMobile($scoreMobile = null)
    {
        $this->score_mobile = $scoreMobile;

        return $this;
    }

    /**
     * Get scoreMobile.
     *
     * @return int|null
     */
    public function getScoreMobile()
    {
        return $this->score_mobile;
    }

    /**
     * Set stats.
     *
     * @param array|null $stats
     *
     * @return PageScore
     */
    public function setStats($stats = null)
    {
        $this->stats = $stats;

        return $this;
    }

    /**
     * Get stats.
     *
     * @return array|null
     */
    public function getStats()
    {
        return $this->stats;
    }

    /**
     * Set results.
     *
     * @param array|null $results
     *
     * @return PageScore
     */
    public function setResults($results = null)
    {
        $this->results = $results;

        return $this;
    }

    /**
     * Get results.
     *
     * @return array|null
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Set resultsMobile.
     *
     * @param array|null $resultsMobile
     *
     * @return PageScore
     */
    public function setResultsMobile($resultsMobile = null)
    {
        $this->results_mobile = $resultsMobile;

        return $this;
    }

    /**
     * Get resultsMobile.
     *
     * @return array|null
     */
    public function getResultsMobile()
    {
        return $this->results_mobile;
    }

    /**
     * Set page.
     *
     * @param \App\CmsBundle\Entity\Page|null $page
     *
     * @return PageScore
     */
    public function setPage(\App\CmsBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page.
     *
     * @return \App\CmsBundle\Entity\Page|null
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set statusCode.
     *
     * @param int|null $statusCode
     *
     * @return PageScore
     */
    public function setStatusCode($statusCode = null)
    {
        $this->status_code = $statusCode;

        return $this;
    }

    /**
     * Get statusCode.
     *
     * @return int|null
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }
}
