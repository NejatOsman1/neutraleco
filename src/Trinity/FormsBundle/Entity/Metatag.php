<?php
namespace App\Trinity\FormsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metatag
 *
 * @ORM\Table(name="form_metatag")
 * @ORM\Entity
 */
class Metatag
{
    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $value;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var App\Trinity\FormsBundle\Entity
     *
     * @ORM\ManyToOne(targetEntity="Form")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $form;

    /**
     * @var \App\CmsBundle\Entity\Metatag
     *
     * @ORM\ManyToOne(targetEntity="\App\CmsBundle\Entity\Metatag")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="metatagid", referencedColumnName="id")
     * })
     */
    private $metatag;

    /**
     * Set value.
     *
     * @param string|null $value
     *
     * @return Metatag
     */
    public function setValue($value = null)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value.
     *
     * @return string|null
     */
    public function getValue()
    {
        return $this->value;
    }

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
     * Set form.
     *
     * @param \App\Trinity\FormsBundle\Entity\Form|null $form
     *
     * @return Metatag
     */
    public function setForm(\App\Trinity\FormsBundle\Entity\Form $form = null)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * Get form.
     *
     * @return App\Trinity\FormsBundle\Entity\Form|null
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Set metatag.
     *
     * @param \App\CmsBundle\Entity\Metatag|null $metatag
     *
     * @return Metatag
     */
    public function setMetatag(\App\CmsBundle\Entity\Metatag $metatag = null)
    {
        $this->metatag = $metatag;

        return $this;
    }

    /**
     * Get metatag.
     *
     * @return \App\CmsBundle\Entity\Metatag|null
     */
    public function getMetatag()
    {
        return $this->metatag;
    }
}
