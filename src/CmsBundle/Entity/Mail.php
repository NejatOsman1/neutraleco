<?php
namespace App\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="mail")
 * @ORM\Entity()
 */
class Mail
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="`key`", type="string", length=50, nullable=true)
     */
    private $key = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $template = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $category = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $label = '';

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $description = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $subject = '';

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    protected $body = '';

    /**
     * @ORM\ManyToOne(targetEntity="Settings")
     * @ORM\JoinColumn(name="settings_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $settings;

    /**
     * @ORM\ManyToOne(targetEntity="Language")
     * @ORM\JoinColumn(name="language_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $language;

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
     * Set template.
     *
     * @param string|null $template
     *
     * @return Mail
     */
    public function setTemplate($template = null)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Get template.
     *
     * @return string|null
     */
    public function getTemplate()
    {
        return $this->template ? $this->template : 'notify.html.twig';
    }

    /**
     * Set subject.
     *
     * @param string|null $subject
     *
     * @return Mail
     */
    public function setSubject($subject = null)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject.
     *
     * @return string|null
     */
    public function getSubject($Settings = null)
    {
        if($Settings){
            return str_replace([
                '{{sitename}}'
            ],[
                $Settings->getLabel()
            ], $this->subject);
        }
        return $this->subject;
    }

    /**
     * Set body.
     *
     * @param string $body
     *
     * @return Mail
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body.
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Get body.
     *
     * @return string
     */
    public function getBodyParsed($params)
    {
        $body = $this->body;
        foreach($params as $k => $v){
            $body = str_replace('{{' . $k . '}}', $v, $body);
        }
        return $body;
        
        /*$twig = new \Twig_Environment();
        $template = $twig->createTemplate($this->body);
        return $template->render(
          $params
        );*/
    }

    /**
     * Set label.
     *
     * @param string|null $label
     *
     * @return Mail
     */
    public function setLabel($label = null)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label.
     *
     * @return string|null
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set category.
     *
     * @param string|null $category
     *
     * @return Mail
     */
    public function setCategory($category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category.
     *
     * @return string|null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Mail
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set key.
     *
     * @param string|null $key
     *
     * @return Mail
     */
    public function setKey($key = null)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key.
     *
     * @return string|null
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set language.
     *
     * @param \App\CmsBundle\Entity\Language|null $language
     *
     * @return Mail
     */
    public function setLanguage(\App\CmsBundle\Entity\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language.
     *
     * @return \App\CmsBundle\Entity\Language|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set settings.
     *
     * @param \App\CmsBundle\Entity\Settings|null $settings
     *
     * @return Mail
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
}
