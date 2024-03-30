<?php

namespace App\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserProfile
 *
 * @ORM\Table(name="user_profile", indexes={@ORM\Index(name="fk_user_profile_user1_idx", columns={"userid"}), @ORM\Index(name="fk_user_profile_profile_field1_idx", columns={"profile_fieldid"})})
 * @ORM\Entity
 */
class UserProfile
{
    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=true)
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
     * @var \App\CmsBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userid", referencedColumnName="id")
     * })
     */
    private $userid;

    /**
     * @var \App\CmsBundle\Entity\ProfileField
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\ProfileField")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profile_fieldid", referencedColumnName="id")
     * })
     */
    private $profileFieldid;



    /**
     * Set value
     *
     * @param string $value
     * @return UserProfile
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
     * Set userid
     *
     * @param \App\CmsBundle\Entity\Users $userid
     * @return UserProfile
     */
    public function setUserid(User $userid = null)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return \App\CmsBundle\Entity\Users
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set profileFieldid
     *
     * @param \App\CmsBundle\Entity\ProfileField $profileFieldid
     * @return UserProfile
     */
    public function setProfileFieldid(\App\CmsBundle\Entity\ProfileField $profileFieldid = null)
    {
        $this->profileFieldid = $profileFieldid;

        return $this;
    }

    /**
     * Get profileFieldid
     *
     * @return \App\CmsBundle\Entity\ProfileField
     */
    public function getProfileFieldid()
    {
        return $this->profileFieldid;
    }
}
