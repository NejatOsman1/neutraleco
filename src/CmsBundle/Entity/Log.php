<?php

namespace App\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Log
 *
 * @ORM\Table(name="log", indexes={@ORM\Index(name="userid", columns={"userid"})})
 * @ORM\Entity(repositoryClass="App\CmsBundle\Repository\LogRepository")
 */
class Log
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $action;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $bundle;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=2, nullable=true)
     */
    private $priority;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=20, nullable=true)
     */
    private $object_id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=false)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userid", referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    private $userid;

    /**
     * @ORM\ManyToOne(targetEntity="Settings")
     * @ORM\JoinColumn(name="settings_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $settings;

    public function __construct(){
        if(!empty($_SERVER['REMOTE_ADDR'])){
            $this->setIp($_SERVER['REMOTE_ADDR']);
        }
        $this->setDate(new \DateTime());
        $this->setPriority(0);
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
     * Set type
     *
     * @param string $type
     * @return Log
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type as label
     *
     * @return string
     */
    public function getTypeLabel()
    {
        switch ($this->type) {
            // Trinity
            case 'auth': return 'Authenticatie'; break;
            case 'blocked': return 'Blokkade'; break;
            case 'page': return 'Pagina beheer'; break;
            case 'settings': return 'Configuratie'; break;
            case 'user': return 'Gebruiker beheer'; break;
            case 'redirects': return 'Omleidingen'; break;
            case 'language': return 'Talen beheer'; break;
            
            // Webshop
            case 'discount': return 'Kortingcodes'; break;
            case 'promotion': return 'Promoties'; break;
            case 'product': return 'Producten'; break;
            case 'delivery': return 'Aflevering'; break;
            case 'tax': return 'BTW'; break;
            case 'order': return 'Bestelling'; break;
            case 'invoice': return 'Factuur'; break;
            case 'credit': return 'Creditfactuur'; break;
        }

        return $this->type;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Log
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Log
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set userid
     *
     * @param \App\CmsBundle\Entity\User $user
     * @return Log
     */
    public function setUser(\App\CmsBundle\Entity\User $user = null)
    {
        $this->userid = $user;

        return $this;
    }

    /**
     * Get userid
     *
     * @return \App\CmsBundle\Entity\User
     */
    public function getUser()
    {
        return $this->userid;
    }

    /**
     * Set userid
     *
     * @param \App\CmsBundle\Entity\User $userid
     *
     * @return Log
     */
    public function setUserid(\App\CmsBundle\Entity\User $userid = null)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return \App\CmsBundle\Entity\User
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set ip.
     *
     * @param string $ip
     *
     * @return Log
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip.
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set status.
     *
     * @param string $status
     *
     * @return Log
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
        return $this->status;
    }

    /**
     * Set priority.
     *
     * @param int $priority
     *
     * @return Log
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority.
     *
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set username.
     *
     * @param string $username
     *
     * @return Log
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
     * Set objectId.
     *
     * @param int $objectId
     *
     * @return Log
     */
    public function setObjectId($objectId)
    {
        $this->object_id = $objectId;

        return $this;
    }

    /**
     * Get objectId.
     *
     * @return int
     */
    public function getObjectId()
    {
        return $this->object_id;
    }

    /**
     * Set settings.
     *
     * @param \App\CmsBundle\Entity\Settings|null $settings
     *
     * @return Log
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
     * Set action.
     *
     * @param string|null $action
     *
     * @return Log
     */
    public function setAction($action = null)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action.
     *
     * @return string|null
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set bundle.
     *
     * @param string|null $bundle
     *
     * @return Log
     */
    public function setBundle($bundle = null)
    {
        $this->bundle = $bundle;

        return $this;
    }

    /**
     * Get bundle.
     *
     * @return string|null
     */
    public function getBundle()
    {
        return $this->bundle;
    }
}
