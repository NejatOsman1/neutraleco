<?php
namespace App\CmsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\CmsBundle\Repository\LanguageRepository")
 */
class Language {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /** @ORM\column(type="string", length=5) */
    private $locale; // Short

    /** @ORM\column(type="string", length=10) */
    private $locale_full; // ISO 15897

    /** @ORM\column(type="string", length=50) */
    private $label;


    /** @ORM\column(type="string", length=50, nullable=true) */
    private $notify_email;

    /**
     * @ORM\OneToMany(targetEntity="Settings", mappedBy="language")
     */
    protected $settings;

    /**
     * @ORM\OneToMany(targetEntity="Page", mappedBy="language")
     */
    protected $pages;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $hide_baseuri = false;

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
     * Set locale
     *
     * @param string $locale
     *
     * @return Language
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return Language
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
     * Set settings
     *
     * @param \App\CmsBundle\Entity\Settings $settings
     *
     * @return Language
     */
    public function setSettings(\App\CmsBundle\Entity\Settings $settings = null)
    {
        $this->settings = $settings;

        return $this;
    }

    /**
     * Get settings
     *
     * @return \App\CmsBundle\Entity\Settings
     */
    public function getSettings()
    {
        return $this->settings;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->settings = new ArrayCollection();
    }

    /**
     * Add page
     *
     * @param \App\CmsBundle\Entity\Page $page
     *
     * @return Language
     */
    public function addPage(\App\CmsBundle\Entity\Page $page)
    {
        $this->pages[] = $page;

        return $this;
    }

    /**
     * Remove page
     *
     * @param \App\CmsBundle\Entity\Page $page
     */
    public function removePage(\App\CmsBundle\Entity\Page $page)
    {
        $this->pages->removeElement($page);
    }

    /**
     * Get pages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Add setting.
     *
     * @param \App\CmsBundle\Entity\Settings $setting
     *
     * @return Language
     */
    public function addSetting(\App\CmsBundle\Entity\Settings $setting)
    {
        $this->settings[] = $setting;

        return $this;
    }

    /**
     * Remove setting.
     *
     * @param \App\CmsBundle\Entity\Settings $setting
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSetting(\App\CmsBundle\Entity\Settings $setting)
    {
        return $this->settings->removeElement($setting);
    }

    /**
     * Set hideBaseuri.
     *
     * @param bool|null $hideBaseuri
     *
     * @return Language
     */
    public function setHideBaseuri($hideBaseuri = null)
    {
        $this->hide_baseuri = $hideBaseuri;

        return $this;
    }

    /**
     * Get hideBaseuri.
     *
     * @return bool|null
     */
    public function getHideBaseuri()
    {
        return $this->hide_baseuri;
    }

    /**
     * Set notifyEmail.
     *
     * @param string $notifyEmail
     *
     * @return Language
     */
    public function setNotifyEmail($notifyEmail)
    {
        $this->notify_email = $notifyEmail;

        return $this;
    }

    /**
     * Get notifyEmail.
     *
     * @return string
     */
    public function getNotifyEmail()
    {
        return $this->notify_email;
    }

    /**
     * Set localeFull.
     *
     * @param string $localeFull
     *
     * @return Language
     */
    public function setLocaleFull($localeFull)
    {
        $this->locale_full = $localeFull;

        return $this;
    }

    /**
     * Get localeFull.
     *
     * @return string
     */
    public function getLocaleFull()
    {
        if(empty($this->locale_full)){
            // Generate based on locale
            $this->locale_full = $this->getLocale() . '_' . strtoupper($this->getLocale());
        }
        return $this->locale_full;
    }
}
