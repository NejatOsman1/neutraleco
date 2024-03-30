<?php
namespace App\Trinity\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reply
 *
 * @ORM\Table(name="blog_mailreply")
 * @ORM\Entity
 */
class Mailreply
{

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $approved = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $enabled = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $notify_new_blog = false;

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
     * Set email.
     *
     * @param string|null $email
     *
     * @return Mailreply
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set enabled.
     *
     * @param bool|null $enabled
     *
     * @return Mailreply
     */
    public function setEnabled($enabled = null)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled.
     *
     * @return bool|null
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set notifyNewBlog.
     *
     * @param bool|null $notifyNewBlog
     *
     * @return Mailreply
     */
    public function setNotifyNewBlog($notifyNewBlog = null)
    {
        $this->notify_new_blog = $notifyNewBlog;

        return $this;
    }

    /**
     * Get notifyNewBlog.
     *
     * @return bool|null
     */
    public function getNotifyNewBlog()
    {
        return $this->notify_new_blog;
    }

    /**
     * Set approved.
     *
     * @param bool|null $approved
     *
     * @return Mailreply
     */
    public function setApproved($approved = null)
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * Get approved.
     *
     * @return bool|null
     */
    public function getApproved()
    {
        return $this->approved;
    }
}
