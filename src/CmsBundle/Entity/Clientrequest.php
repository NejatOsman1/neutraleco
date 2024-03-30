<?php
namespace App\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\CmsBundle\Repository\ClientrequestRepository")
 */
class Clientrequest {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Clientdomain", inversedBy="requests")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $domain;

    /** @ORM\column(type="string", length=200, nullable=true) */
    private $uri;

    /** @ORM\column(type="string", length=200, nullable=true) */
    private $hostname;

    /** @ORM\column(type="string", length=200, nullable=true) */
    private $serverip;

    /** @ORM\column(type="string", length=200, nullable=true) */
    private $datetime;

    /** @ORM\column(type="string", length=200, nullable=true) */
    private $version;

    /** @ORM\column(type="string", length=200, nullable=true) */
    private $username;

    /** @ORM\column(type="string", length=200, nullable=true) */
    private $userip;


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
     * Set uri.
     *
     * @param string $uri
     *
     * @return Clientrequest
     */
    public function setUri($uri)
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * Get uri.
     *
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Set hostname.
     *
     * @param string $hostname
     *
     * @return Clientrequest
     */
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * Get hostname.
     *
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * Set serverip.
     *
     * @param string $serverip
     *
     * @return Clientrequest
     */
    public function setServerip($serverip)
    {
        $this->serverip = $serverip;

        return $this;
    }

    /**
     * Get serverip.
     *
     * @return string
     */
    public function getServerip()
    {
        return $this->serverip;
    }

    /**
     * Set datetime.
     *
     * @param string $datetime
     *
     * @return Clientrequest
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime.
     *
     * @return string
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set version.
     *
     * @param string $version
     *
     * @return Clientrequest
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version.
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set username.
     *
     * @param string $username
     *
     * @return Clientrequest
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set userip.
     *
     * @param string $userip
     *
     * @return Clientrequest
     */
    public function setUserip($userip)
    {
        $this->userip = $userip;

        return $this;
    }

    /**
     * Get userip.
     *
     * @return string
     */
    public function getUserip()
    {
        return $this->userip;
    }

    /**
     * Set domain.
     *
     * @param \App\CmsBundle\Entity\Clientdomain|null $domain
     *
     * @return Clientrequest
     */
    public function setDomain(\App\CmsBundle\Entity\Clientdomain $domain = null)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain.
     *
     * @return \App\CmsBundle\Entity\Clientdomain|null
     */
    public function getDomain()
    {
        return $this->domain;
    }
}
