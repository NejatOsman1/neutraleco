<?php
namespace App\Trinity\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reply
 *
 * @ORM\Table(name="blog_reply")
 * @ORM\Entity(repositoryClass="App\Trinity\BlogBundle\Repository\ReplyRepository")
 */
class Reply
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
     * @var integer
     *
     * @ORM\Column(type="integer", length=30, nullable=true)
     */
    private $old_id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Entry", inversedBy="replies")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $entry;

    /**
     * @ORM\ManyToOne(targetEntity="Reply", inversedBy="replies")
     * @ORM\JoinColumn()
     */
    protected $reply;

    /**
     * @ORM\OneToMany(targetEntity="Reply", mappedBy="reply")
     */
    protected $replies;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $approved = false;

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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Reply
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Reply
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Reply
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return Reply
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Reply
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Reply
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
     * Set entry
     *
     * @param \App\Trinity\BlogBundle\Entity\Entry $entry
     *
     * @return Reply
     */
    public function setEntry(\App\Trinity\BlogBundle\Entity\Entry $entry = null)
    {
        $this->entry = $entry;

        return $this;
    }

    /**
     * Get entry
     *
     * @return \App\Trinity\BlogBundle\Entity\Entry
     */
    public function getEntry()
    {
        return $this->entry;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->replies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set reply
     *
     * @param \App\Trinity\BlogBundle\Entity\Reply $reply
     *
     * @return Reply
     */
    public function setReply(\App\Trinity\BlogBundle\Entity\Reply $reply = null)
    {
        $this->reply = $reply;

        return $this;
    }

    /**
     * Get reply
     *
     * @return \App\Trinity\BlogBundle\Entity\Reply
     */
    public function getReply()
    {
        return $this->reply;
    }

    /**
     * Add reply
     *
     * @param \App\Trinity\BlogBundle\Entity\Reply $reply
     *
     * @return Reply
     */
    public function addReply(\App\Trinity\BlogBundle\Entity\Reply $reply)
    {
        $this->replies[] = $reply;

        return $this;
    }

    /**
     * Remove reply
     *
     * @param \App\Trinity\BlogBundle\Entity\Reply $reply
     */
    public function removeReply(\App\Trinity\BlogBundle\Entity\Reply $reply)
    {
        $this->replies->removeElement($reply);
    }

    /**
     * Get replies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReplies()
    {
        return $this->replies;
    }

    /**
     * Set approved.
     *
     * @param bool|null $approved
     *
     * @return Reply
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

    /**
     * Set oldId.
     *
     * @param int|null $oldId
     *
     * @return Reply
     */
    public function setOldId($oldId = null)
    {
        $this->old_id = $oldId;

        return $this;
    }

    /**
     * Get oldId.
     *
     * @return int|null
     */
    public function getOldId()
    {
        return $this->old_id;
    }

    /**
     * Set avatar.
     *
     * @param string $avatar
     *
     * @return Reply
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar.
     *
     * @return string
     */
    public function getAvatar()
    {
        if(empty($this->avatar)){
            // Try to fetch 'Gravatar'
            return 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $this->getEmail() ) ) );
        }
        return $this->avatar;
    }
}
