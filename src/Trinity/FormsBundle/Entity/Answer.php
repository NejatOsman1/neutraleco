<?php
namespace App\Trinity\FormsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Form
 *
 * @ORM\Table(name="form_answer")
 * @ORM\Entity(repositoryClass="App\Trinity\FormsBundle\Repository\AnswerRepository")
 */
class Answer
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Form", inversedBy="answers")
     * @ORM\JoinColumn(name="form_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $form;

    /**
     * @ORM\OneToOne(targetEntity="Session", inversedBy="answer")
     * @ORM\JoinColumn(name="session_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $session;

    /**
     * @var string
     *
     * @ORM\Column(name="answer", type="text", nullable=true)
     */
    private $answer;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="text", nullable=true)
     */
    private $ip;

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
     * Set answer
     *
     * @param string $answer
     *
     * @return Answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return Answer
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
     * Set session
     *
     * @param \App\Trinity\FormsBundle\Entity\Session $session
     *
     * @return Answer
     */
    public function setSession(\App\Trinity\FormsBundle\Entity\Session $session = null)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get session
     *
     * @return \App\Trinity\FormsBundle\Entity\Session
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set form
     *
     * @param \App\Trinity\FormsBundle\Entity\Form $form
     *
     * @return Answer
     */
    public function setForm(\App\Trinity\FormsBundle\Entity\Form $form = null)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * Get form
     *
     * @return \App\Trinity\FormsBundle\Entity\Form
     */
    public function getForm()
    {
        return $this->form;
    }
}
