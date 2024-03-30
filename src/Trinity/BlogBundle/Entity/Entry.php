<?php
namespace App\Trinity\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entry
 *
 * @ORM\Table(name="blog_entry")
 * @ORM\Entity(repositoryClass="App\Trinity\BlogBundle\Repository\EntryRepository")
 */
class Entry
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
     * @var integer
     *
     * @ORM\Column(type="integer", length=30, nullable=true)
     */
    private $old_id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255, nullable=true)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="intro", type="text", nullable=true)
     */
    private $intro;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", nullable=true)
     */
    private $body;

    /**
     * @var string
     *
     * @ORM\Column(name="readcount", type="integer", nullable=true)
     */
    private $readcount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_add", type="datetime", nullable=true)
     */
    private $dateAdd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_publish", type="datetime", nullable=true)
     */
    private $datePublish;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_publish_end", type="datetime", nullable=true)
     */
    private $datePublishEnd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_edit", type="datetime", nullable=true)
     */
    private $dateEdit;

    /**
     * @ORM\ManyToOne(targetEntity="Blog", inversedBy="entries")
     * @ORM\JoinColumn(name="blog_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $blog;

    /**
     * @ORM\ManyToOne(targetEntity="\App\CmsBundle\Entity\User")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected $user;

    /**
     * @ORM\OneToMany(targetEntity="Reply", mappedBy="entry")
     */
    protected $replies;

    /**
     * @var \App\CmsBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="image", referencedColumnName="id")
     * })
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="App\CmsBundle\Entity\Media")
     * @ORM\JoinTable(name="blog_entry_media")
     * @ORM\OrderBy({"position" = "ASC"})
     */
    protected $media;

    /**
     * @var integer
     *
     * @ORM\Column(name="likes", type="integer", nullable=true)
     */
    private $likes;

    /**
     * @ORM\ManyToMany(targetEntity="Category", mappedBy="entry")
     */
    protected $category;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $concept = false;

    /**
     * @var array
     *
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $products = [];

    /**
     * @var string
     *
     * @ORM\Column(name="subtitle", type="string", length=255, nullable=true)
     */
    private $subtitle;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $seo_title;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $seo_description;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $seo_keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="accessoires", type="string", length=255, nullable=true)
     */
    private $accessoires;

    /**
     * @var string
     *
     * @ORM\Column(name="accessoires_subtitle", type="string", length=255, nullable=true)
     */
    private $accessoires_subtitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $external_url;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_external;

    public function __construct(){
        $this->categories = new ArrayCollection();
        $this->replies = new ArrayCollection();
        $this->media = new ArrayCollection();
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
     * Set readcount
     *
     * @param integer $readcount
     *
     * @return Entry
     */
    public function setReadcount($readcount)
    {
        $this->readcount = $readcount;

        return $this;
    }

    /**
     * Get readcount
     *
     * @return integer
     */
    public function getReadcount()
    {
        return (int)$this->readcount;
    }

    /**
     * Set dateAdd
     *
     * @param \DateTime $dateAdd
     *
     * @return Entry
     */
    public function setDateAdd($dateAdd)
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }

    /**
     * Get dateAdd
     *
     * @return \DateTime
     */
    public function getDateAdd()
    {
        return $this->dateAdd;
    }

    /**
     * Set datePublish
     *
     * @param \DateTime $datePublish
     *
     * @return Entry
     */
    public function setDatePublish($datePublish)
    {
        $this->datePublish = $datePublish;

        return $this;
    }

    /**
     * Get datePublish
     *
     * @return \DateTime
     */
    public function getDatePublish()
    {
        return $this->datePublish;
    }

    /**
     * Set dateEdit
     *
     * @param \DateTime $dateEdit
     *
     * @return Entry
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
     * Set blog
     *
     * @param \App\Trinity\BlogBundle\Entity\Blog $blog
     *
     * @return Entry
     */
    public function setBlog(\App\Trinity\BlogBundle\Entity\Blog $blog = null)
    {
        $this->blog = $blog;

        return $this;
    }

    /**
     * Get blog
     *
     * @return \App\Trinity\BlogBundle\Entity\Blog
     */
    public function getBlog()
    {
        return $this->blog;
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return Entry
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Entry
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set likes
     *
     * @param string $likes
     *
     * @return Entry
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;

        return $this;
    }

    /**
     * Get likes
     *
     * @return string
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * @param $counter
     * @return string
     */
    public function formatLikes($counter) {
        $neg = false;
        if( $counter < 0 ) $neg = true;
        $counter = abs($counter);

        $number_format = 0;
        $suffix = '';
        if ($counter > -1 && $counter < 1000) {
            // 1 - 999
            $number_format = round($counter);
            $suffix = '';
        } else if ($counter >= 1000 && $counter < 1000000) {
            // 1k-999k
            $number_format = round($counter / 1000 , 1);
            $suffix = 'K+';
        } else if ($counter >= 1000000 && $counter < 1000000000) {
            // 1m-999m
            $number_format = round($counter / 1000000 , 1);
            $suffix = 'M+';
        } else if ($counter >= 1000000000 && $counter < 1000000000000) {
            // 1b-999b
            $number_format = round($counter / 1000000000 , 1);
            $suffix = 'B+';
        } else if ($counter >= 1000000000000) {
            // 1t+
            $number_format = round($counter / 1000000000000 , 1);
            $suffix = 'T+';
        }

        return !empty($number_format . $suffix) ? ($neg ? '-' : '') . $number_format . $suffix : 0;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getDefaultSlug()
    {
        return $this->toAscii($this->label);
    }

    /**
     * Convert to ASCII
     *
     * @param  string $str       Input string
     * @param  array  $replace   Replace these additional characters
     * @param  string $delimiter Space delimiter
     *
     * @return string
     */
    private function toAscii($str, $replace=array(), $delimiter='-') {
        $str = strtolower($str);

        if( !empty($replace) ) {
            $str = str_replace((array)$replace, ' ', $str);
        }

        // translate wierd characters
        $transliterationTable = array('á' => 'a', 'Á' => 'A', 'à' => 'a', 'À' => 'A', 'ă' => 'a', 'Ă' => 'A', 'â' => 'a', 'Â' => 'A', 'å' => 'a', 'Å' => 'A', 'ã' => 'a', 'Ã' => 'A', 'ą' => 'a', 'Ą' => 'A', 'ā' => 'a', 'Ā' => 'A', 'ä' => 'ae', 'Ä' => 'AE', 'æ' => 'ae', 'Æ' => 'AE', 'ḃ' => 'b', 'Ḃ' => 'B', 'ć' => 'c', 'Ć' => 'C', 'ĉ' => 'c', 'Ĉ' => 'C', 'č' => 'c', 'Č' => 'C', 'ċ' => 'c', 'Ċ' => 'C', 'ç' => 'c', 'Ç' => 'C', 'ď' => 'd', 'Ď' => 'D', 'ḋ' => 'd', 'Ḋ' => 'D', 'đ' => 'd', 'Đ' => 'D', 'ð' => 'dh', 'Ð' => 'Dh', 'é' => 'e', 'É' => 'E', 'è' => 'e', 'È' => 'E', 'ĕ' => 'e', 'Ĕ' => 'E', 'ê' => 'e', 'Ê' => 'E', 'ě' => 'e', 'Ě' => 'E', 'ë' => 'e', 'Ë' => 'E', 'ė' => 'e', 'Ė' => 'E', 'ę' => 'e', 'Ę' => 'E', 'ē' => 'e', 'Ē' => 'E', 'ḟ' => 'f', 'Ḟ' => 'F', 'ƒ' => 'f', 'Ƒ' => 'F', 'ğ' => 'g', 'Ğ' => 'G', 'ĝ' => 'g', 'Ĝ' => 'G', 'ġ' => 'g', 'Ġ' => 'G', 'ģ' => 'g', 'Ģ' => 'G', 'ĥ' => 'h', 'Ĥ' => 'H', 'ħ' => 'h', 'Ħ' => 'H', 'í' => 'i', 'Í' => 'I', 'ì' => 'i', 'Ì' => 'I', 'î' => 'i', 'Î' => 'I', 'ï' => 'i', 'Ï' => 'I', 'ĩ' => 'i', 'Ĩ' => 'I', 'į' => 'i', 'Į' => 'I', 'ī' => 'i', 'Ī' => 'I', 'ĵ' => 'j', 'Ĵ' => 'J', 'ķ' => 'k', 'Ķ' => 'K', 'ĺ' => 'l', 'Ĺ' => 'L', 'ľ' => 'l', 'Ľ' => 'L', 'ļ' => 'l', 'Ļ' => 'L', 'ł' => 'l', 'Ł' => 'L', 'ṁ' => 'm', 'Ṁ' => 'M', 'ń' => 'n', 'Ń' => 'N', 'ň' => 'n', 'Ň' => 'N', 'ñ' => 'n', 'Ñ' => 'N', 'ņ' => 'n', 'Ņ' => 'N', 'ó' => 'o', 'Ó' => 'O', 'ò' => 'o', 'Ò' => 'O', 'ô' => 'o', 'Ô' => 'O', 'ő' => 'o', 'Ő' => 'O', 'õ' => 'o', 'Õ' => 'O', 'ø' => 'oe', 'Ø' => 'OE', 'ō' => 'o', 'Ō' => 'O', 'ơ' => 'o', 'Ơ' => 'O', 'ö' => 'oe', 'Ö' => 'OE', 'ṗ' => 'p', 'Ṗ' => 'P', 'ŕ' => 'r', 'Ŕ' => 'R', 'ř' => 'r', 'Ř' => 'R', 'ŗ' => 'r', 'Ŗ' => 'R', 'ś' => 's', 'Ś' => 'S', 'ŝ' => 's', 'Ŝ' => 'S', 'š' => 's', 'Š' => 'S', 'ṡ' => 's', 'Ṡ' => 'S', 'ş' => 's', 'Ş' => 'S', 'ș' => 's', 'Ș' => 'S', 'ß' => 'SS', 'ť' => 't', 'Ť' => 'T', 'ṫ' => 't', 'Ṫ' => 'T', 'ţ' => 't', 'Ţ' => 'T', 'ț' => 't', 'Ț' => 'T', 'ŧ' => 't', 'Ŧ' => 'T', 'ú' => 'u', 'Ú' => 'U', 'ù' => 'u', 'Ù' => 'U', 'ŭ' => 'u', 'Ŭ' => 'U', 'û' => 'u', 'Û' => 'U', 'ů' => 'u', 'Ů' => 'U', 'ű' => 'u', 'Ű' => 'U', 'ũ' => 'u', 'Ũ' => 'U', 'ų' => 'u', 'Ų' => 'U', 'ū' => 'u', 'Ū' => 'U', 'ư' => 'u', 'Ư' => 'U', 'ü' => 'ue', 'Ü' => 'UE', 'ẃ' => 'w', 'Ẃ' => 'W', 'ẁ' => 'w', 'Ẁ' => 'W', 'ŵ' => 'w', 'Ŵ' => 'W', 'ẅ' => 'w', 'Ẅ' => 'W', 'ý' => 'y', 'Ý' => 'Y', 'ỳ' => 'y', 'Ỳ' => 'Y', 'ŷ' => 'y', 'Ŷ' => 'Y', 'ÿ' => 'y', 'Ÿ' => 'Y', 'ź' => 'z', 'Ź' => 'Z', 'ž' => 'z', 'Ž' => 'Z', 'ż' => 'z', 'Ż' => 'Z', 'þ' => 'th', 'Þ' => 'Th', 'µ' => 'u', 'а' => 'a', 'А' => 'a', 'б' => 'b', 'Б' => 'b', 'в' => 'v', 'В' => 'v', 'г' => 'g', 'Г' => 'g', 'д' => 'd', 'Д' => 'd', 'е' => 'e', 'Е' => 'E', 'ё' => 'e', 'Ё' => 'E', 'ж' => 'zh', 'Ж' => 'zh', 'з' => 'z', 'З' => 'z', 'и' => 'i', 'И' => 'i', 'й' => 'j', 'Й' => 'j', 'к' => 'k', 'К' => 'k', 'л' => 'l', 'Л' => 'l', 'м' => 'm', 'М' => 'm', 'н' => 'n', 'Н' => 'n', 'о' => 'o', 'О' => 'o', 'п' => 'p', 'П' => 'p', 'р' => 'r', 'Р' => 'r', 'с' => 's', 'С' => 's', 'т' => 't', 'Т' => 't', 'у' => 'u', 'У' => 'u', 'ф' => 'f', 'Ф' => 'f', 'х' => 'h', 'Х' => 'h', 'ц' => 'c', 'Ц' => 'c', 'ч' => 'ch', 'Ч' => 'ch', 'ш' => 'sh', 'Ш' => 'sh', 'щ' => 'sch', 'Щ' => 'sch', 'ъ' => '', 'Ъ' => '', 'ы' => 'y', 'Ы' => 'y', 'ь' => '', 'Ь' => '', 'э' => 'e', 'Э' => 'e', 'ю' => 'ju', 'Ю' => 'ju', 'я' => 'ja', 'Я' => 'ja');

        $str = str_replace(array_keys($transliterationTable), array_values($transliterationTable), $str);

        // https://php.net/manual/en/function.iconv.php#74101
        // Basicly ASCII//TRANSLIT doesn't work propperly for LC_CTYPE == C or POSIXOude
        //$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = $str;
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

        return $clean;
    }

    /**
     * Set intro
     *
     * @param string $intro
     *
     * @return Entry
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
     * Set body
     *
     * @param string $body
     *
     * @return Entry
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set user
     *
     * @param \App\CmsBundle\Entity\User $user
     *
     * @return Entry
     */
    public function setUser(\App\CmsBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \App\CmsBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add reply
     *
     * @param \App\Trinity\BlogBundle\Entity\Reply $reply
     *
     * @return Entry
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
     * Has replies
     *
     * @return boolean
     */
    public function hasReplies()
    {
        return count($this->replies) > 0;
    }

    /**
     * Count replies
     *
     * @return boolean
     */
    public function countReplies()
    {
        $count = 0;
        foreach($this->replies as $r) {
            if ($r->getApproved()) {
                $count += 1;
            }
        }
        return $count;
    }

    /**
     * Set image
     *
     * @param \App\CmsBundle\Entity\Media $image
     *
     * @return Entry
     */
    public function setImage(\App\CmsBundle\Entity\Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \App\CmsBundle\Entity\Media
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add category.
     *
     * @param \App\Trinity\BlogBundle\Entity\Category $category
     *
     * @return Entry
     */
    public function addCategory(\App\Trinity\BlogBundle\Entity\Category $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category.
     *
     * @param \App\Trinity\BlogBundle\Entity\Category $category
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCategory(\App\Trinity\BlogBundle\Entity\Category $category)
    {
        return $this->category->removeElement($category);
    }

    /**
     * Get category.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set concept.
     *
     * @param bool|null $concept
     *
     * @return Entry
     */
    public function setConcept($concept = null)
    {
        $this->concept = (boolean)$concept;

        return $this;
    }

    /**
     * Get concept.
     *
     * @return bool|null
     */
    public function getConcept()
    {
        return (boolean)$this->concept;
    }

    /**
     * Add medium.
     *
     * @param \App\CmsBundle\Entity\Media $medium
     *
     * @return Entry
     */
    public function addMedia(\App\CmsBundle\Entity\Media $medium)
    {
        $this->media[] = $medium;

        return $this;
    }

    /**
     * Remove medium.
     *
     * @param \App\CmsBundle\Entity\Media $medium
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeMedia(\App\CmsBundle\Entity\Media $medium)
    {
        return $this->media->removeElement($medium);
    }

    /**
     * Get media.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set subtitle.
     *
     * @param string|null $subtitle
     *
     * @return Entry
     */
    public function setSubtitle($subtitle = null)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get subtitle.
     *
     * @return string|null
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set oldId.
     *
     * @param int|null $oldId
     *
     * @return Entry
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
     * Set seoTitle.
     *
     * @param string|null $seoTitle
     *
     * @return Entry
     */
    public function setSeoTitle($seoTitle = null)
    {
        $this->seo_title = $seoTitle;

        return $this;
    }

    /**
     * Get seoTitle.
     *
     * @return string|null
     */
    public function getSeoTitle()
    {
        return $this->seo_title;
    }

    /**
     * Set products.
     *
     * @param array|null $products
     *
     * @return Entry
     */
    public function setProducts($products = null)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * Get products.
     *
     * @return array|null
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set seoDescription.
     *
     * @param string|null $seoDescription
     *
     * @return Entry
     */
    public function setSeoDescription($seoDescription = null)
    {
        $this->seo_description = $seoDescription;

        return $this;
    }

    /**
     * Get seoDescription.
     *
     * @return string|null
     */
    public function getSeoDescription()
    {
        return $this->seo_description;
    }

    /**
     * Set seoKeywords.
     *
     * @param string|null $seoKeywords
     *
     * @return Entry
     */
    public function setSeoKeywords($seoKeywords = null)
    {
        $this->seo_keywords = $seoKeywords;

        return $this;
    }

    /**
     * Get seoKeywords.
     *
     * @return string|null
     */
    public function getSeoKeywords()
    {
        return $this->seo_keywords;
    }

    /**
     * Set author.
     *
     * @param string|null $author
     *
     * @return Entry
     */
    public function setAuthor($author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author.
     *
     * @return string|null
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set datePublishEnd.
     *
     * @param \DateTime|null $datePublishEnd
     *
     * @return Entry
     */
    public function setDatePublishEnd($datePublishEnd = null)
    {
        $this->datePublishEnd = $datePublishEnd;

        return $this;
    }

    /**
     * Get datePublishEnd.
     *
     * @return \DateTime|null
     */
    public function getDatePublishEnd()
    {
        return $this->datePublishEnd;
    }

    /**
     * Set accessoires.
     *
     * @param string|null $accessoires
     *
     * @return Entry
     */
    public function setAccessoires($accessoires = null)
    {
        $this->accessoires = $accessoires;

        return $this;
    }

    /**
     * Get accessoires.
     *
     * @return string|null
     */
    public function getAccessoires()
    {
        return $this->accessoires;
    }

    /**
     * Set accessoiresSubtitle.
     *
     * @param string|null $accessoiresSubtitle
     *
     * @return Entry
     */
    public function setAccessoiresSubtitle($accessoiresSubtitle = null)
    {
        $this->accessoires_subtitle = $accessoiresSubtitle;

        return $this;
    }

    /**
     * Get accessoiresSubtitle.
     *
     * @return string|null
     */
    public function getAccessoiresSubtitle()
    {
        return $this->accessoires_subtitle;
    }

    public function getExternalUrl(): ?string
    {
        return $this->external_url;
    }

    public function setExternalUrl(?string $external_url): self
    {
        $this->external_url = $external_url;

        return $this;
    }

    public function getIsExternal(): ?bool
    {
        return $this->is_external;
    }

    public function setIsExternal(?bool $is_external): self
    {
        $this->is_external = $is_external;

        return $this;
    }
}
