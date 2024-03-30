<?php

namespace App\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metatag
 *
 * @ORM\Table(name="metatag")
 * @ORM\Entity(repositoryClass="App\CmsBundle\Repository\MetatagRepository")
 */
class Metatag
{
    /**
     * @var string
     *
     * @ORM\Column(name="tag_key", type="string", length=45, nullable=true)
     */
    private $key;

    /**
     * @var string
     *
     * @ORM\Column(name="key_type", type="string", length=100, nullable=true)
     */
    private $key_type;

    /**
     * @var string
     *
     * @ORM\Column(name="value_type", type="string", length=100, nullable=true)
     */
    private $value_type;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="placeholder", type="string", length=150, nullable=true)
     */
    private $placeholder;

    /**
     * @var integer
     *
     * @ORM\Column(name="sortid", type="integer", length=10, nullable=true)
     */
    private $sortid;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_system", type="integer", length=1, nullable=true)
     */
    private $system = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    private $value = '';

    /**
     * @var string
     *
     * @ORM\Column(type="simple_array", nullable=true)
     */
    private $value_options = [];



    /**
     * Set key
     *
     * @param string $key
     * @return Metatag
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set label
     *
     * @param string $label
     * @return Metatag
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
     * Set placeholder
     *
     * @param string $placeholder
     * @return Metatag
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
     * Set sortid
     *
     * @param integer $sortid
     * @return Metatag
     */
    public function setSortid($sortid = 0)
    {
        $this->sortid = $sortid;

        return $this;
    }

    /**
     * Get sortid
     *
     * @return integer
     */
    public function getSortid()
    {
        return $this->sortid;
    }

    /**
     * Set system
     *
     * @param integer $system
     * @return Metatag
     */
    public function setSystem($system = 0)
    {
        $this->system = (int)$system;

        return $this;
    }

    /**
     * Get system
     *
     * @return integer
     */
    public function getSystem()
    {
        return $this->system == 1;
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
     * Set value
     *
     * @param string $value
     * @return Metatag
     */
    public function setValue($value = ''){
        $this->value = (string)$value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue(){
        return (string)$this->value;
    }

    /**
     * Set keyType.
     *
     * @param string|null $keyType
     *
     * @return Metatag
     */
    public function setKeyType($keyType = null)
    {
        $this->key_type = $keyType;

        return $this;
    }

    /**
     * Get keyType.
     *
     * @return string|null
     */
    public function getKeyType()
    {
        return $this->key_type;
    }

    /**
     * Set valueOptions.
     *
     * @param array|null $valueOptions
     *
     * @return Metatag
     */
    public function setValueOptions($valueOptions = null)
    {
        $this->value_options = $valueOptions;

        return $this;
    }

    /**
     * Get valueOptions.
     *
     * @return array|null
     */
    public function getValueOptions()
    {
        return $this->value_options;
    }

    /**
     * Set valueType.
     *
     * @param string|null $valueType
     *
     * @return Metatag
     */
    public function setValueType($valueType = null)
    {
        $this->value_type = $valueType;

        return $this;
    }

    /**
     * Get valueType.
     *
     * @return string|null
     */
    public function getValueType()
    {
        return $this->value_type;
    }
}
