<?php
namespace App\Trinity\FormsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Form
 *
 * @ORM\Table(name="form_question")
 * @ORM\Entity
 */
class Question
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id = 0;

    /**
     * @ORM\ManyToOne(targetEntity="Form", inversedBy="questions")
     * @ORM\JoinColumn(name="form_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $form;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="text", nullable=true)
     */
    private $title = 'Titel';

    /**
     * @var string
     *
     * @ORM\Column(name="subtitle", type="string", length=255, nullable=true)
     */
    private $subtitle = '';

    /**
     * @var string
     *
     * @ORM\Column(name="regex", type="string", length=255, nullable=true)
     */
    private $regex;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort", type="integer", length=5, nullable=true)
     */
    private $sort;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", length=1, nullable=true)
     */
    private $required;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", length=1, nullable=true)
     */
    private $hidden;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", length=1, nullable=true)
     */
    private $hidden_label;

    /**
     * @var integer
     *
     * @ORM\Column(name="value_list", type="simple_array", nullable=true)
     */
    private $values;

    /**
     * @var array
     *
     * @ORM\Column(name="disabled_list", type="array", nullable=true)
     */
    private $disabled;

    /**
     * @var array
     *
     * @ORM\Column(name="default_list", type="array", nullable=true)
     */
    private $default;

    /**
     * @var array
     *
     * @ORM\Column(name="email_list", type="json_array", nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $classes;

    /**
     * @var array
     *
     * @ORM\Column(type="array", nullable=true)
     */
    private $config = [];

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $placeholder = '';

    /**
     * @var integer
     *
     * @ORM\Column(type="text", length=2, nullable=false)
     */
    private $position = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="text", length=3, nullable=false)
     */
    private $width = 12;

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
     * Set form
     *
     * @param \App\Trinity\FormsBundle\Entity\Form $form
     *
     * @return Link
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

    public function getType()
    {
        return $this->type;
    }

    public function setType(?string $type)
    {
        $this->type = $type;

        return $this;
    }

    public function getTypeLabel()
    {
        switch ($this->type) {
            case 'plain': return 'Vrije tekst'; break;
            case 'h1': return 'Titel (h1)'; break;
            case 'h2': return 'Titel (h2)'; break;
            case 'h3': return 'Titel (h3)'; break;
            case 'upload': return 'Upload'; break;
            case 'text': return 'Tekst'; break;
            case 'date': return 'Datum'; break;
            case 'email': return 'E-mailadres'; break;
            case 'email_check': return 'E-mailadres (controle)'; break;
            case 'textarea': return 'Tekst blok'; break;
            case 'select': return 'Dropdown'; break;
            case 'checkbox': return 'Meerkeuze'; break;
            case 'radio': return 'Radio'; break;
            case 'canvas': return 'Canvas'; break;
            case 'dropzone': return 'Dropzone'; break;
            case 'newsletter': return 'Nieuwsbrief'; break;
            case 'mailer': return 'Hummessenger Niewsbrief'; break;
            default: return $this->type; break;
        }

        return '';
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Question
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set subtitle
     *
     * @param string $subtitle
     *
     * @return Question
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set regex
     *
     * @param string $regex
     *
     * @return Question
     */
    public function setRegex($regex)
    {
        $this->regex = $regex;

        return $this;
    }

    /**
     * Get regex
     *
     * @return string
     */
    public function getRegex()
    {
        return $this->regex;
    }

    /**
     * Set sort
     *
     * @param integer $sort
     *
     * @return Question
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return integer
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Set values
     *
     * @param array $values
     *
     * @return Question
     */
    public function setValues($values)
    {
        $this->values = $values;

        return $this;
    }

    /**
     * Get values
     *
     * @return array
     */
    public function getValues($valueType = 0)
    {
        if(!empty($this->values) && $valueType > 0){
            foreach($this->values as $i => $value){
                if($valueType == 1){
                    // Get first part
                    $this->values[$i] = preg_replace('/^(.*?)\s?\|.*?$/', '$1', $value);
                }else if($valueType == 2){
                    // Get second part
                    $this->values[$i] = preg_replace('/^.*?\s?\|\s?(.*?)$/', '$1', $value);
                }
            }
        }

        return $this->values;
    }

    /**
     * Set classes
     *
     * @param string $classes
     *
     * @return Question
     */
    public function setClasses($classes)
    {
        $this->classes = $classes;

        return $this;
    }

    /**
     * Get classes
     *
     * @return string
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * Set required
     *
     * @param boolean $required
     *
     * @return Question
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Get required
     *
     * @return boolean
     */
    public function getRequired()
    {
        if(in_array($this->type, ['email', 'email_check'])){
            return true;
        }

        return $this->required;
    }

    /**
     * Set placeholder
     *
     * @param string $placeholder
     *
     * @return Question
     */
    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * Get placeholder
     *
     * @return string
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    /**
     * Set disabled
     *
     * @param array $disabled
     *
     * @return Question
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;

        return $this;
    }

    /**
     * Get disabled
     *
     * @return array
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * Set default
     *
     * @param array $default
     *
     * @return Question
     */
    public function setDefault($default)
    {
        $this->default = $default;

        return $this;
    }

    /**
     * Get default
     *
     * @return array
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * Set position
     *
     * @param string $position
     *
     * @return Question
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set width
     *
     * @param string $width
     *
     * @return Question
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return string
     */
    public function getWidth()
    {
        return (!empty($this->width) ? $this->width : 12);
    }

    /**
     * Set hidden.
     *
     * @param bool|null $hidden
     *
     * @return Question
     */
    public function setHidden($hidden = null)
    {
        $this->hidden = $hidden;

        return $this;
    }

    /**
     * Get hidden label.
     *
     * @return bool|null
     */
    public function getHiddenLabel()
    {
        return $this->hidden_label;
    }

    /**
     * Set hidden label.
     *
     * @param bool|null $hiddenLabel
     *
     * @return Question
     */
    public function setHiddenLabel($hidden = null)
    {
        $this->hidden_label = $hidden;

        return $this;
    }

    /**
     * Get hidden.
     *
     * @return bool|null
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Set config.
     *
     * @param array|null $config
     *
     * @return Question
     */
    public function setConfig($config = null)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Get config.
     *
     * @return array|null
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Set email.
     *
     * @param array|null $email
     *
     * @return Question
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return array|null
     */
    public function getEmail()
    {
        return $this->email;
    }
}
