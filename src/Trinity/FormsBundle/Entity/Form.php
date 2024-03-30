<?php
namespace App\Trinity\FormsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Form
 *
 * @ORM\Table(name="form")
 * @ORM\Entity(repositoryClass="App\Trinity\FormsBundle\Repository\FormRepository")
 */
class Form
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
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $intro;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $auto_response;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $auto_response_text;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $auto_response_subject;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hide_clear_button;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_start", type="datetime", nullable=true)
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_edit", type="datetime", nullable=true)
     */
    private $dateEdit;

    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="form")
     */
    protected $questions;

    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="form")
     * @ORM\OrderBy({"id" = "desc"})
     */
    protected $answers;

    /**
     * @var array
     *
     * @ORM\Column(type="array", nullable=true)
     */
    private $mails;

    /**
     * @ORM\ManyToOne(targetEntity="\App\CmsBundle\Entity\Language")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $language;

    /**
     * @ORM\ManyToOne(targetEntity="\App\CmsBundle\Entity\Settings")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $settings;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $floating_labels = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $active_campaign = false;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $active_campaign_listid;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $active_campaign_key;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $active_campaign_url;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $mail_reply_to = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $mailer_listid;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $mail_interal_username = false;

    public function __construct(){
        $this->questions = new ArrayCollection();
        $this->answers = new ArrayCollection();
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
     * Set label
     *
     * @param string $label
     *
     * @return Form
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set intro
     *
     * @param string $intro
     *
     * @return Form
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;

        return $this;
    }

    /**
     * Get intro
     *
     * @return string
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return Form
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEdit
     *
     * @param \DateTime $dateEdit
     *
     * @return Form
     */
    public function setDateEdit($dateEdit)
    {
        $this->dateEdit = $dateEdit;

        return $this;
    }

    /**
     * Get dateEdit
     *
     * @return \DateTime
     */
    public function getDateEdit()
    {
        return $this->dateEdit;
    }

    /**
     * Add question
     *
     * @param \App\Trinity\FormsBundle\Entity\Question $question
     *
     * @return Form
     */
    public function addQuestion(\App\Trinity\FormsBundle\Entity\Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \App\Trinity\FormsBundle\Entity\Question $question
     */
    public function removeQuestion(\App\Trinity\FormsBundle\Entity\Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Add answer
     *
     * @param \App\Trinity\FormsBundle\Entity\Answer $answer
     *
     * @return Form
     */
    public function addAnswer(\App\Trinity\FormsBundle\Entity\Answer $answer)
    {
        $this->answers[] = $answer;

        return $this;
    }

    /**
     * Remove answer
     *
     * @param \App\Trinity\FormsBundle\Entity\Answer $answer
     */
    public function removeAnswer(\App\Trinity\FormsBundle\Entity\Answer $answer)
    {
        $this->answers->removeElement($answer);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Set language
     *
     * @param \App\CmsBundle\Entity\Language $language
     *
     * @return Form
     */
    public function setLanguage(\App\CmsBundle\Entity\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \App\CmsBundle\Entity\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set autoResponse
     *
     * @param boolean $autoResponse
     *
     * @return Form
     */
    public function setAutoResponse($autoResponse)
    {
        $this->auto_response = $autoResponse;

        return $this;
    }

    /**
     * Get autoResponse
     *
     * @return boolean
     */
    public function getAutoResponse()
    {
        return $this->auto_response;
    }

    /**
     * Set autoResponseText
     *
     * @param string $autoResponseText
     *
     * @return Form
     */
    public function setAutoResponseText($autoResponseText)
    {
        $this->auto_response_text = $autoResponseText;

        return $this;
    }

    /**
     * Get autoResponseText
     *
     * @return string
     */
    public function getAutoResponseText()
    {
        return $this->auto_response_text;
    }

    /**
     * Set autoResponseSubject
     *
     * @param string $autoResponseSubject
     *
     * @return Form
     */
    public function setAutoResponseSubject($autoResponseSubject)
    {
        $this->auto_response_subject = $autoResponseSubject;

        return $this;
    }

    /**
     * Get autoResponseSubject
     *
     * @return string
     */
    public function getAutoResponseSubject()
    {
        return $this->auto_response_subject;
    }

    /**
     * Set mails
     *
     * @param array $mails
     *
     * @return Form
     */
    public function setMails($mails)
    {
        $this->mails = $mails;

        return $this;
    }

    /**
     * Get mails
     *
     * @return array
     */
    public function getMails()
    {
        return $this->mails;
    }

    /**
     * Set hideClearButton.
     *
     * @param bool|null $hideClearButton
     *
     * @return Form
     */
    public function setHideClearButton($hideClearButton = null)
    {
        $this->hide_clear_button = $hideClearButton;

        return $this;
    }

    /**
     * Get hideClearButton.
     *
     * @return bool|null
     */
    public function getHideClearButton()
    {
        return $this->hide_clear_button;
    }

    /**
     * Set settings.
     *
     * @param \App\CmsBundle\Entity\Settings|null $settings
     *
     * @return Form
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
     * Clone
     */
    /*public function __clone() {
        // Clone questions
        foreach($this->questions as $Question){
            $NewQuestion = clone $Question;
            $NewQuestion->setForm($this);
            $this->addQuestion($NewQuestion);
        }
    }*/

    /**
     * Set mailReplyTo.
     *
     * @param bool|null $mailReplyTo
     *
     * @return Form
     */
    public function setMailReplyTo($mailReplyTo = null)
    {
        $this->mail_reply_to = $mailReplyTo;

        return $this;
    }

    /**
     * Get mailReplyTo.
     *
     * @return bool|null
     */
    public function getMailReplyTo()
    {
        return $this->mail_reply_to;
    }

    /**
     * Set mailInteralUsername.
     *
     * @param bool|null $mailInteralUsername
     *
     * @return Form
     */
    public function setMailInteralUsername($mailInteralUsername = null)
    {
        $this->mail_interal_username = $mailInteralUsername;

        return $this;
    }

    /**
     * Get mailInteralUsername.
     *
     * @return bool|null
     */
    public function getMailInteralUsername()
    {
        return $this->mail_interal_username;
    }

    /**
     * Set floating_labels.
     *
     * @param bool|null $floating_labels
     *
     * @return Form
     */
    public function setFloatingLabels($floating_labels = null)
    {
        $this->floating_labels = $floating_labels;

        return $this;
    }

    /**
     * Get floating_labels.
     *
     * @return bool|null
     */
    public function getFloatingLabels()
    {
        return $this->floating_labels;
    }

    /**
     * Set activeCampaign.
     *
     * @param bool|null $activeCampaign
     *
     * @return Form
     */
    public function setActiveCampaign($activeCampaign = null)
    {
        $this->active_campaign = $activeCampaign;

        return $this;
    }

    /**
     * Get activeCampaign.
     *
     * @return bool|null
     */
    public function getActiveCampaign()
    {
        return $this->active_campaign;
    }

    /**
     * Set activeCampaignListid.
     *
     * @param int|null $activeCampaignListid
     *
     * @return Form
     */
    public function setActiveCampaignListid($activeCampaignListid = null)
    {
        $this->active_campaign_listid = $activeCampaignListid;

        return $this;
    }

    /**
     * Get activeCampaignListid.
     *
     * @return int|null
     */
    public function getActiveCampaignListid()
    {
        return $this->active_campaign_listid;
    }

    /**
     * Set activeCampaignKey.
     *
     * @param string|null $activeCampaignKey
     *
     * @return Form
     */
    public function setActiveCampaignKey($activeCampaignKey = null)
    {
        $this->active_campaign_key = $activeCampaignKey;

        return $this;
    }

    /**
     * Get activeCampaignKey.
     *
     * @return string|null
     */
    public function getActiveCampaignKey()
    {
        return $this->active_campaign_key;
    }

    /**
     * Set activeCampaignUrl.
     *
     * @param string|null $activeCampaignUrl
     *
     * @return Form
     */
    public function setActiveCampaignUrl(string $activeCampaignUrl = null)
    {
        $this->active_campaign_url = $activeCampaignUrl;

        return $this;
    }

    /**
     * Get activeCampaignKey.
     *
     * @return string|null
     */
    public function getActiveCampaignUrl()
    {
        return $this->active_campaign_url;
    }

    /**
     * @return string|null
     */
    public function getMailerListid()
    {
        return $this->mailer_listid;
    }

    /**
     * @param string $mailer_listid
     */
    public function setMailerListid(string $mailer_listid): void
    {
        $this->mailer_listid = $mailer_listid;
    }

}
