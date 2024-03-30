<?php
namespace App\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Ipcheck
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Ipcheck
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
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $user_attempt;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $login_attempts = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $login_last_attempt;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $blocked = 0;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;


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
     * Set ip.
     *
     * @param string|null $ip
     *
     * @return Ipcheck
     */
    public function setIp($ip = null)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip.
     *
     * @return string|null
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set loginAttempts.
     *
     * @param string|null $loginAttempts
     *
     * @return Ipcheck
     */
    public function setLoginAttempts($loginAttempts = null)
    {
        $this->login_attempts = $loginAttempts;

        return $this;
    }

    /**
     * Get loginAttempts.
     *
     * @return string|null
     */
    public function getLoginAttempts()
    {
        return $this->login_attempts;
    }

    /**
     * Set loginLastAttempt.
     *
     * @param \DateTime|null $loginLastAttempt
     *
     * @return Ipcheck
     */
    public function setLoginLastAttempt($loginLastAttempt = null)
    {
        $this->login_last_attempt = $loginLastAttempt;

        return $this;
    }

    /**
     * Get loginLastAttempt.
     *
     * @return \DateTime|null
     */
    public function getLoginLastAttempt()
    {
        return $this->login_last_attempt;
    }

    /**
     * Set userAttempt.
     *
     * @param string|null $userAttempt
     *
     * @return Ipcheck
     */
    public function setUserAttempt($userAttempt = null)
    {
        $this->user_attempt = $userAttempt;

        return $this;
    }

    /**
     * Get userAttempt.
     *
     * @return string|null
     */
    public function getUserAttempt()
    {
        return $this->user_attempt;
    }

    /**
     * Set blocked.
     *
     * @param bool|null $blocked
     *
     * @return Ipcheck
     */
    public function setBlocked($blocked = null)
    {
        $this->blocked = $blocked;

        return $this;
    }

    /**
     * Get blocked.
     *
     * @return bool|null
     */
    public function getBlocked()
    {
        return $this->blocked;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }
}
