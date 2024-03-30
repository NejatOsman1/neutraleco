<?php
namespace App\CmsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\CmsBundle\Repository\ClientdomainRepository")
 */
class Clientdomain {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /** @ORM\column(type="string", length=200) */
    private $domain;

    /** @ORM\column(type="string", length=200) */
    private $url;

    /**
     * @ORM\OneToMany(targetEntity="Clientrequest", mappedBy="domain")
     * @ORM\OrderBy({"datetime" = "DESC"})
     */
    protected $requests;

    /** @ORM\column(type="string", length=200, nullable=true) */
    private $last_date;

    /**
     * @var string
     *
     * @ORM\column(type="string", length=200)
     */
    private $symfony_version;

    /**
     * @var string
     *
     * @ORM\column(type="string", length=200)
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\column(type="string", length=200)
     */
    private $api_token;

    /**
     * @var string
     *
     * @ORM\column(type="string", length=200)
     */
    private $api_secret;

    /**
     * @var string
     *
     * @ORM\column(type="string", length=200, nullable=true)
     */
    private $api_key;

    /**
     * @var array
     *
     * @ORM\column(type="array")
     */
    private $bundles;

    /**
     * @var array
     *
     * @ORM\column(type="array")
     */
    private $dns;

    /**
     * @var array
     *
     * @ORM\column(type="array")
     */
    private $warnings;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $monitor = false;

    /**
     * @var array
     *
     * @ORM\column(type="array")
     */
    private $monitor_emails = [];

    /**
     * @var integer
     *
     * @ORM\column(type="integer", length=3)
     */
    private $monitor_status = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $monitor_date;

    /**
     * @var array
     *
     * @ORM\column(type="array")
     */
    private $monitor_history = [];

    /**
     * @var string
     *
     * @ORM\column(type="string", length=10, nullable=true)
     */
    private $status;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="domains")
     * @ORM\JoinTable(name="tags_domains")
     */
    protected $tags;

    /**
     * @var string
     *
     * @ORM\column(type="string", length=200, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\column(type="string", length=200, nullable=true)
     */
    private $matomo_url;

    /**
     * @var string
     *
     * @ORM\column(type="string", length=200, nullable=true)
     */
    private $matomo_hash;

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
        $this->requests = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    /**
     * Set domain.
     *
     * @param string $domain
     *
     * @return Clientdomain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain.
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Add request.
     *
     * @param \App\CmsBundle\Entity\Clientrequest $request
     *
     * @return Clientdomain
     */
    public function addRequest(\App\CmsBundle\Entity\Clientrequest $request)
    {
        $this->requests[] = $request;

        return $this;
    }

    /**
     * Remove request.
     *
     * @param \App\CmsBundle\Entity\Clientrequest $request
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeRequest(\App\CmsBundle\Entity\Clientrequest $request)
    {
        return $this->requests->removeElement($request);
    }

    /**
     * Get requests.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Set version.
     *
     * @param string $version
     *
     * @return Clientdomain
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
     * Set apiToken.
     *
     * @param string $apiToken
     *
     * @return Clientdomain
     */
    public function setApiToken($apiToken)
    {
        $this->api_token = $apiToken;

        return $this;
    }

    /**
     * Get apiToken.
     *
     * @return string
     */
    public function getApiToken()
    {
        return $this->api_token;
    }

    /**
     * Set apiSecret.
     *
     * @param string $apiSecret
     *
     * @return Clientdomain
     */
    public function setApiSecret($apiSecret)
    {
        $this->api_secret = $apiSecret;

        return $this;
    }

    /**
     * Get apiSecret.
     *
     * @return string
     */
    public function getApiSecret()
    {
        return $this->api_secret;
    }

    /**
     * Set bundles.
     *
     * @param array $bundles
     *
     * @return Clientdomain
     */
    public function setBundles($bundles)
    {
        $this->bundles = $bundles;

        return $this;
    }

    /**
     * Get bundles.
     *
     * @return array
     */
    public function getBundles()
    {
        return $this->bundles;
    }

    /**
     * Set apiKey.
     *
     * @param string $apiKey
     *
     * @return Clientdomain
     */
    public function setApiKey($apiKey)
    {
        $this->api_key = $apiKey;

        return $this;
    }

    /**
     * Get apiKey.
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * Test wether this domain can update OTA
     *
     * @return boolean
     */
    public function canUpdate(){
        if(version_compare($this->version, '1.0.16', '>=')){
            return true;
        }

        return false;
    }

    /**
     * Test wether this domain can refresh data
     *
     * @return boolean
     */
    public function canRefresh(){
        if(version_compare($this->version, '1.0.16', '>=')){
            return true;
        }

        return false;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Clientdomain
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        $url = $this->url;

        $url = preg_replace('/\/$/', '', $url);

        return $url;
    }

    /**
     * Set dns.
     *
     * @param array $dns
     *
     * @return Clientdomain
     */
    public function setDns($dns)
    {
        $this->dns = $dns;

        return $this;
    }

    /**
     * Get dns.
     *
     * @return array
     */
    public function getDns()
    {
        return $this->dns;
    }

    /**
     * Set warnings.
     *
     * @param array $warnings
     *
     * @return Clientdomain
     */
    public function setWarnings($warnings)
    {
        $this->warnings = $warnings;

        return $this;
    }

    /**
     * Get warnings.
     *
     * @return array
     */
    public function getWarnings()
    {
        return $this->warnings;
    }

    /**
     * Set monitor.
     *
     * @param bool|null $monitor
     *
     * @return Clientdomain
     */
    public function setMonitor($monitor = null)
    {
        $this->monitor = $monitor;

        return $this;
    }

    /**
     * Get monitor.
     *
     * @return bool|null
     */
    public function getMonitor()
    {
        return $this->monitor;
    }

    /**
     * Set status.
     *
     * @param string $status
     *
     * @return Clientdomain
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus()
    {
        return (!empty($this->status) ? $this->status : 'DOWN');
    }

    /**
     * Set monitorEmails.
     *
     * @param array $monitorEmails
     *
     * @return Clientdomain
     */
    public function setMonitorEmails($monitorEmails)
    {
        $this->monitor_emails = $monitorEmails;

        return $this;
    }

    /**
     * Get monitorEmails.
     *
     * @return array
     */
    public function getMonitorEmails()
    {
        return $this->monitor_emails;
    }

    /**
     * Set monitorStatus.
     *
     * @param int $monitorStatus
     *
     * @return Clientdomain
     */
    public function setMonitorStatus($monitorStatus)
    {
        $this->monitor_status = $monitorStatus;

        return $this;
    }

    /**
     * Get monitorStatus.
     *
     * @return int
     */
    public function getMonitorStatus()
    {
        return $this->monitor_status;
    }

    /**
     * Set monitorDate.
     *
     * @param \DateTime|null $monitorDate
     *
     * @return Clientdomain
     */
    public function setMonitorDate($monitorDate = null)
    {
        $this->monitor_date = $monitorDate;

        return $this;
    }

    /**
     * Get monitorDate.
     *
     * @return \DateTime|null
     */
    public function getMonitorDate()
    {
        return $this->monitor_date;
    }

    /**
     * Set monitorHistory.
     *
     * @param array $monitorHistory
     *
     * @return Clientdomain
     */
    public function setMonitorHistory($monitorHistory)
    {
        $this->monitor_history = $monitorHistory;

        return $this;
    }

    /**
     * Get monitorHistory.
     *
     * @return array
     */
    public function getMonitorHistory()
    {
        return $this->monitor_history;
    }

    /**
     * Add tag.
     *
     * @param \App\CmsBundle\Entity\Tag $tag
     *
     * @return Clientdomain
     */
    public function addTag(\App\CmsBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag.
     *
     * @param \App\CmsBundle\Entity\Tag $tag
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTag(\App\CmsBundle\Entity\Tag $tag)
    {
        return $this->tags->removeElement($tag);
    }

    /**
     * Get tags.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Get tags list concatinated.
     *
     * @return string
     */
    public function getTagslist()
    {
        $list = [];
        foreach($this->tags as $Tag){
            $list[] = $Tag->getLabel();
        }
        return implode(', ', $list);
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Clientdomain
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set matomoUrl.
     *
     * @param string $matomoUrl
     *
     * @return Clientdomain
     */
    public function setMatomoUrl($matomoUrl)
    {
        $this->matomo_url = $matomoUrl;

        return $this;
    }

    /**
     * Get matomoUrl.
     *
     * @return string
     */
    public function getMatomoUrl()
    {
        return $this->matomo_url;
    }

    /**
     * Set matomoHash.
     *
     * @param string $matomoHash
     *
     * @return Clientdomain
     */
    public function setMatomoHash($matomoHash)
    {
        $this->matomo_hash = $matomoHash;

        return $this;
    }

    /**
     * Get matomoHash.
     *
     * @return string
     */
    public function getMatomoHash()
    {
        return $this->matomo_hash;
    }

    /**
     * Set symfonyVersion.
     *
     * @param string $symfonyVersion
     *
     * @return Clientdomain
     */
    public function setSymfonyVersion($symfonyVersion)
    {
        $this->symfony_version = $symfonyVersion;

        return $this;
    }

    /**
     * Get symfonyVersion.
     *
     * @return string
     */
    public function getSymfonyVersion()
    {
        return $this->symfony_version;
    }

    /**
     * Set lastDate.
     *
     * @param string|null $lastDate
     *
     * @return Clientdomain
     */
    public function setLastDate($lastDate = null)
    {
        $this->last_date = $lastDate;

        return $this;
    }

    /**
     * Get lastDate.
     *
     * @return string|null
     */
    public function getLastDate()
    {
        return $this->last_date;
    }
}
