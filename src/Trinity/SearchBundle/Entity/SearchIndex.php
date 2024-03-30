<?php

namespace App\Trinity\SearchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="search_index", indexes={@ORM\Index(name="search_fulltext", columns={"label","content","extra","second_extra"}, flags={"fulltext"})})
 * @ORM\Entity(repositoryClass="App\Trinity\SearchBundle\Repository\IndexRepository")
 */
class SearchIndex {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bundle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $label;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $label_rating = 1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $uri;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $extra;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $extra_rating = 1;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $second_extra;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $second_extra_rating = 1;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $third_extra;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $third_extra_rating = 1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $object;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $index_id;

    /**
     * @ORM\Column(type="integer", length=20, nullable=true)
     */
    private $object_id;

    /**
     * @ORM\Column(type="integer", length=20, nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $content_rating = 1;

    /**
     * @ORM\ManyToOne(targetEntity="\App\CmsBundle\Entity\Language")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $language;

    /**
     * @ORM\ManyToOne(targetEntity="\App\CmsBundle\Entity\Settings")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $settings;

    /**
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\Media")
     * @ORM\JoinColumn(onDelete="cascade")
     */
    protected $media;

    /**
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $mediaUrl;

    private $weight = 0;

    public function calculateWeight($q)
    {
        $types = [
            ['label', 'label_rating'],
            ['extra', 'extra_rating'],
            ['second_extra', 'second_extra_rating'],
            ['content', 'content_rating']
        ];
        
        foreach($types as $type)
        {
            $fieldname = $type[0];
            $fieldweight = $type[1];

            //dump($this->$fieldname);dump($this->$fieldweight);
            foreach($q as $string)
            if (strpos(strtolower($this->$fieldname), strtolower($string)) !== false) {
                //dump($fieldname . ' has a hit on ' . $string . '!');
                $this->weight += (int)$this->$fieldweight;
            }
        }
        //dump($this->weight);
    }

    public function getWeight()
    {
        return $this->weight;
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
     * Set bundle.
     *
     * @param string|null $bundle
     *
     * @return SearchIndex
     */
    public function setBundle($bundle = null)
    {
        $this->bundle = $bundle;

        return $this;
    }

    /**
     * Get bundle.
     *
     * @return string|null
     */
    public function getBundle()
    {
        return $this->bundle;
    }

    /**
     * Set category.
     *
     * @param string|null $category
     *
     * @return SearchIndex
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
     * Set label.
     *
     * @param string|null $label
     *
     * @return SearchIndex
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
     * Set labelRating.
     *
     * @param int|null $labelRating
     *
     * @return SearchIndex
     */
    public function setLabelRating($labelRating = null)
    {
        $this->label_rating = $labelRating;

        return $this;
    }

    /**
     * Get labelRating.
     *
     * @return int|null
     */
    public function getLabelRating()
    {
        return $this->label_rating;
    }

    /**
     * Set uri.
     *
     * @param string|null $uri
     *
     * @return SearchIndex
     */
    public function setUri($uri = null)
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * Get uri.
     *
     * @return string|null
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Set extra.
     *
     * @param string|null $extra
     *
     * @return SearchIndex
     */
    public function setExtra($extra = null)
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * Get extra.
     *
     * @return string|null
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * Set extraRating.
     *
     * @param int|null $extraRating
     *
     * @return SearchIndex
     */
    public function setExtraRating($extraRating = null)
    {
        $this->extra_rating = $extraRating;

        return $this;
    }

    /**
     * Get extraRating.
     *
     * @return int|null
     */
    public function getExtraRating()
    {
        return $this->extra_rating;
    }

    /**
     * Set secondExtra.
     *
     * @param string|null $secondExtra
     *
     * @return SearchIndex
     */
    public function setSecondExtra($secondExtra = null)
    {
        $this->second_extra = $secondExtra;

        return $this;
    }

    /**
     * Get secondExtra.
     *
     * @return string|null
     */
    public function getSecondExtra()
    {
        return $this->second_extra;
    }

    /**
     * Set secondExtraRating.
     *
     * @param int|null $secondExtraRating
     *
     * @return SearchIndex
     */
    public function setSecondExtraRating($secondExtraRating = null)
    {
        $this->second_extra_rating = $secondExtraRating;

        return $this;
    }

    /**
     * Get secondExtraRating.
     *
     * @return int|null
     */
    public function getSecondExtraRating()
    {
        return $this->second_extra_rating;
    }

    /**
     * Set object.
     *
     * @param string|null $object
     *
     * @return SearchIndex
     */
    public function setObject($object = null)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Get object.
     *
     * @return string|null
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Set indexId.
     *
     * @param string|null $indexId
     *
     * @return SearchIndex
     */
    public function setIndexId($indexId = null)
    {
        $this->index_id = $indexId;

        return $this;
    }

    /**
     * Get indexId.
     *
     * @return string|null
     */
    public function getIndexId()
    {
        return $this->index_id;
    }

    /**
     * Set objectId.
     *
     * @param int|null $objectId
     *
     * @return SearchIndex
     */
    public function setObjectId($objectId = null)
    {
        $this->object_id = $objectId;

        return $this;
    }

    /**
     * Get objectId.
     *
     * @return int|null
     */
    public function getObjectId()
    {
        return $this->object_id;
    }

    /**
     * Set size.
     *
     * @param int|null $size
     *
     * @return SearchIndex
     */
    public function setSize($size = null)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size.
     *
     * @return int|null
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set content.
     *
     * @param string|null $content
     *
     * @return SearchIndex
     */
    public function setContent($content = null)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string|null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set contentRating.
     *
     * @param int|null $contentRating
     *
     * @return SearchIndex
     */
    public function setContentRating($contentRating = null)
    {
        $this->content_rating = $contentRating;

        return $this;
    }

    /**
     * Get contentRating.
     *
     * @return int|null
     */
    public function getContentRating()
    {
        return $this->content_rating;
    }

    /**
     * Set mediaUrl.
     *
     * @param string|null $mediaUrl
     *
     * @return SearchIndex
     */
    public function setMediaUrl($mediaUrl = null)
    {
        $this->mediaUrl = $mediaUrl;

        return $this;
    }

    /**
     * Get mediaUrl.
     *
     * @return string|null
     */
    public function getMediaUrl()
    {
        return $this->mediaUrl;
    }

    /**
     * Set language.
     *
     * @param \App\CmsBundle\Entity\Language|null $language
     *
     * @return SearchIndex
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
     * @return SearchIndex
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
     * Set media.
     *
     * @param \App\CmsBundle\Entity\Media|null $media
     *
     * @return SearchIndex
     */
    public function setMedia(\App\CmsBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media.
     *
     * @return \App\CmsBundle\Entity\Media|null
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set thirdExtra.
     *
     * @param string|null $thirdExtra
     *
     * @return SearchIndex
     */
    public function setThirdExtra($thirdExtra = null)
    {
        $this->third_extra = $thirdExtra;

        return $this;
    }

    /**
     * Get thirdExtra.
     *
     * @return string|null
     */
    public function getThirdExtra()
    {
        return $this->third_extra;
    }

    /**
     * Set thirdExtraRating.
     *
     * @param int|null $thirdExtraRating
     *
     * @return SearchIndex
     */
    public function setThirdExtraRating($thirdExtraRating = null)
    {
        $this->third_extra_rating = $thirdExtraRating;

        return $this;
    }

    /**
     * Get thirdExtraRating.
     *
     * @return int|null
     */
    public function getThirdExtraRating()
    {
        return $this->third_extra_rating;
    }
}
