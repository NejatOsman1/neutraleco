<?php

namespace App\CmsBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Settings
 *
 * @ORM\Table(name="settings", options={"collate"="utf8mb4_unicode_ci", "charset"="utf8mb4"})
 * @ORM\Entity(repositoryClass="App\CmsBundle\Repository\SettingsRepository")
 */
class Settings
{
    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=150, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $host;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $override_key;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $site_key;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $base_uri;

    /**
     * @var string
     *
     * @ORM\Column(name="tagline", type="string", length=150, nullable=true)
     */
    private $tagline;

    /**
     * @var \App\CmsBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="logo", referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    private $logo;

    /**
     * @var \App\CmsBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="logo_alt", referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    private $logo_alt;

    /**
     * @var \App\CmsBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="background", referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    private $background;

    /**
     * @var \App\CmsBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="service_background", referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    private $service_background;

    /**
     * @var \App\CmsBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mail_header", referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    private $mail_header;

    /**
     * @var string
     *
     * @ORM\Column(name="admin_email", type="string", length=50, nullable=true)
     */
    private $adminEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="admin_email_from", type="string", length=80, nullable=true)
     */
    private $adminEmailFrom;

    /**
     * @var string
     *
     * @ORM\Column(name="system_email", type="string", length=45, nullable=true)
     */
    private $systemEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="system_email_from", type="string", length=45, nullable=true)
     */
    private $systemEmailFrom;

    /**
     * @var string
     *
     * @ORM\Column(name="maintenance", type="string", nullable=true)
     */
    private $maintenance;

    /**
     * @var string
     *
     * @ORM\Column(name="inline_edit", type="string", nullable=true)
     */
    private $inlineEdit;

    /**
     * @var string
     *
     * @ORM\Column(name="maintenance_message", type="text", nullable=true)
     */
    private $maintenance_message;

    /**
     * @var string
     *
     * @ORM\Column(name="price_include_tax", type="string", nullable=true)
     */
    private $priceIncludeTax;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $tinypng_api = 'DyWNlDgmWrQ75K6CCMcF91sDvgthtJFM';

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=150, nullable=true)
     */
    protected $company = '';

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=30, nullable=true)
     */
    protected $phone = '';

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    protected $address = '';

    /**
     * @var string
     *
     * @ORM\Column(name="postalcode", type="string", length=100, nullable=true)
     */
    protected $postalcode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=150, nullable=true)
     */
    protected $place = '';

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=100, nullable=true)
     */
    protected $state = '';

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=30, nullable=true)
     */
    protected $country = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="kvk", type="integer", length=30, nullable=true)
     */
    protected $kvk = null;


    /**
     * @var string
     *
     * @ORM\Column(name="kvk_loc", type="string", length=200, nullable=true)
     */
    protected $kvk_location = null;

    /**
     * @var string
     *
     * @ORM\Column(name="tax_no", type="string", length=30, nullable=true)
     */
    protected $taxNo = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    protected $bic = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    protected $iban = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="inv_prd", type="integer", length=30, nullable=true)
     */
    protected $invoice_period = 0;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $twitter;

     /**
     * @var text
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $api_postcode_token = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $facebook_pixel;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $instagram;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $youtube;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $linkedin;

    /**
     * @var string
     *
     * @ORM\Column(type="array", nullable=true)
     */
    private $layout_include_js;

    /**
     * @var string
     *
     * @ORM\Column(type="array", nullable=true)
     */
    private $layout_include_css;

    /**
     * @var string
     *
     * @ORM\Column(type="array", nullable=true)
     */
    private $layout_include_font;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $default_template;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $restrict_access;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $restrict_access_deny;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $restrict_access_type;

    /**
     * @var string
     */
    protected $mollie_api = null;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $mollie_api_test = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $mollie_api_live = '';

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $mollie_live = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $mollie_enabled = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mollie_sub", type="boolean", nullable=true)
     */
    protected $mollie_subscription = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $santander_loan_active = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $santander_is_live = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $santander_loan_api_test = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $santander_loan_api_live = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $buckaroo_website_key = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $buckaroo_secret = '';

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $buckaroo_live = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $buckaroo_enabled = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $multisafepay_api = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $multisafepay_api_test = '';

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $multisafepay_live = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $multisafepay_enabled = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $omnikassa_live = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $omnikassa_enabled = false;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $omnikassa_sign = '';


    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $omnikassa_refresh = '';

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $omnikassa_sign_test = '';


    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $omnikassa_refresh_test = '';

    /**
     * @var string
     */
    protected $pay_api = null;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $pay_service_id = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $pay_api_test = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $pay_api_live = '';

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $pay_live = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $pay_enabled = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $google_ua = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $google_gtm = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $google_g = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $google_cc = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="captcha_treshold", type="integer", length=3, nullable=true)
     */
    protected $captcha_treshold = 50;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $piwik_url = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $piwik_api_hash = '';

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=5, nullable=true)
     */
    protected $piwik_site_id = 1;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    protected $piwik_container_hashs = '';

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $birthday_fields = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $cache_invalidated = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $custom_navigation = false;

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $footer_block_1 = '';

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $footer_block_2 = '';

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $footer_block_3 = '';

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $footer_block_4 = '';

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $footer_block_5 = '';

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $header_bar = false;

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $header_bar_left = '';

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $header_bar_right = '';

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $postnl_checker = false;

    /**
     * @var text
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $postnl_key = false;

    /**
     * @var text
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $postnl_secret_key = false;

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $uptime_robot_key = '';

    /**
     * @ORM\ManyToOne(targetEntity="Language", inversedBy="settings")
     * @ORM\JoinColumn(name="language_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $language;

    /**
     * @ORM\ManyToOne(targetEntity="Settings", inversedBy="linked")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="Settings", mappedBy="parent")
     */
    protected $linked;


    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $snow = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $force_https = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $test = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $max_media_size = '2M';

    /**
     * @var array
     *
     * @ORM\Column(type="array", nullable=false)
     */
    private $media_dimensions = [
        'full' => '1920',
        'large' => '900',
        'medium' => '600',
        'small' => '350',
        'thumb' => '150',
    ];

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $cookiebar = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $cookiebar_button = true;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    protected $cookiebar_button_position = 'bottom';

    /**
     * @var string
     *
     * @ORM\Column(type="integer", length=30, nullable=true)
     */
    protected $cookiebar_button_offset = 20;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $cache_cdn = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    protected $robots = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $app_label = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $ios_app_id = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $android_app_id = '';

    /**
     * @var \App\CmsBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="App\CmsBundle\Entity\Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="app_icon", referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    private $app_icon;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cc_auth_key = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $cc_expires;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cc_enabled = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $cc_notify_email = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $google_recaptcha_sitekey = null;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $google_recaptcha_secret = null;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $google_recaptcha_text = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $google_recaptcha_mode = '2_checkbox';

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $mail_footer;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $errorNotFound = '';

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $errorNoAccess = '';

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $errorSystem = '';

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $avg_cookie = '';

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $avg_disclaimer = '';

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $avg_privacy = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $sisow_merchant_id = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $sisow_merchant_key = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $sisow_shop_id = '';

    /**
     * @var string
     *
     * @ORM\Column(type="json_array", length=255, nullable=true)
     */
    protected $sisow_options = [];

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $sisow_live = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $sisow_enabled = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $paypro_key = '';

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $paypro_live = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $paypro_enabled = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="paypro_sub", type="boolean", nullable=true)
     */
    protected $paypro_subscription = false;

    /**
     * @ORM\OneToMany(targetEntity="Mediadir", mappedBy="settings")
     */
    protected $mediadirs;

    /**
     * @ORM\OneToMany(targetEntity="Page", mappedBy="settings")
     */
    protected $pages;

    /**
     * @ORM\OneToMany(targetEntity="Navigation", mappedBy="settings")
     */
    protected $navigations;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="settings")
     */
    protected $users;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $calendar = false;

    /**
     * @var string
     *
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $visible_bundles = [];

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="sites")
     */
    protected $user_access;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $ignore_cms_blocks = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enbl_reg", type="boolean", nullable=true)
     */
    protected $allow_registration = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mod_reg", type="boolean", nullable=true)
     */
    protected $moderate_registration = false;

    /**
     * @ORM\OneToOne(targetEntity="Integrations", mappedBy="settings")
     */
    protected $integrations;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $favicon_location;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $author;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $apple_touch_icon;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $og_site_name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $face_domain_key;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $color_swap = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $meta_pixel_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $meta_api_token;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $ooo_start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $ooo_end;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $ooo_msg = '';

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ooo_enbl = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lef_api_active", type="boolean", nullable=true)
     */
    protected $lef_api_active = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lef_api_live", type="boolean", nullable=true)
     */
    protected $lef_api_live = false;
	
    /**
     * @var string
     *
     * @ORM\Column(name="lef_api_test_url", length="255", nullable=true)
     */
    protected $lef_api_test_url;
	
    /**
     * @var string
     *
     * @ORM\Column(name="lef_api_live_url", length="255", nullable=true)
     */
    protected $lef_api_live_url;

    /**
     * @var string
     *
     * @ORM\Column(name="lef_user_name", length="100", nullable=true)
     */
    protected $lef_user_name;

    /**
     * @var string
     *
     * @ORM\Column(name="lef_password", length="100", nullable=true)
     */
    protected $lef_password;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lef_occasion_request", type="boolean", nullable=true)
     */
    protected $lef_occasion_request = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lef_finance_occassion_request", type="boolean", nullable=true)
     */
    protected $lef_finance_occassion_request = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lef_forms_request", type="boolean", nullable=true)
     */
    protected $lef_forms_request = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lef_privatelease_request", type="boolean", nullable=true)
     */
    protected $lef_privatelease_request = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lef_offer_request", type="boolean", nullable=true)
     */
    protected $lef_offer_request = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lef_testdrive_request", type="boolean", nullable=true)
     */
    protected $lef_testdrive_request = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Hummessenger_api_enababled", type="boolean", nullable=true)
     */
    protected $Hummessenger_api_enabled = false;

    /**
     * @var string
     *
     * @ORM\Column(name="Hummessenger_api_url", length=100, nullable=true)
     */
    protected $Hummessenger_api_url = "";

    /**
     * @var string
     *
     * @ORM\Column(name="Hummessenger_api_key", length=100, nullable=true)
     */
    protected $Hummessenger_api_key = "";
	
	/**
     * @ORM\Column(type="boolean", nullable=true)
     */
	protected $is_catalog = false;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $openai_key;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $openai_model;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $openai_temp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $openai_startprompt;

    /**
     * Set label
     *
     * @param string $label
     * @return Settings
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
     * Get label (display)
     *
     * @return string
     */
    public function getLabelDisplay()
    {
        return $this->label . ' | ' . $this->language->getLabel();
    }

    /**
     * Set adminEmail
     *
     * @param string $adminEmail
     * @return Settings
     */
    public function setAdminEmail($adminEmail)
    {
        $this->adminEmail = $adminEmail;

        return $this;
    }

    /**
     * Get adminEmail
     *
     * @return string
     */
    public function getAdminEmail()
    {
        return $this->adminEmail;
    }

    /**
     * Set adminEmailFrom
     *
     * @param string $adminEmailFrom
     * @return Settings
     */
    public function setAdminEmailFrom($adminEmailFrom)
    {
        $this->adminEmailFrom = $adminEmailFrom;

        return $this;
    }

    /**
     * Get adminEmailFrom
     *
     * @return string
     */
    public function getAdminEmailFrom()
    {
        return $this->adminEmailFrom;
    }

    /**
     * Set systemEmail
     *
     * @param string $systemEmail
     * @return Settings
     */
    public function setSystemEmail($systemEmail)
    {
        $this->systemEmail = $systemEmail;

        return $this;
    }

    /**
     * Get systemEmail
     *
     * @return string
     */
    public function getSystemEmail()
    {
        return $this->systemEmail;
    }

    /**
     * Set systemEmailFrom
     *
     * @param string $systemEmailFrom
     * @return Settings
     */
    public function setSystemEmailFrom($systemEmailFrom)
    {
        $this->systemEmailFrom = $systemEmailFrom;

        return $this;
    }

    /**
     * Get systemEmailFrom
     *
     * @return string
     */
    public function getSystemEmailFrom()
    {
        return $this->systemEmailFrom;
    }

    /**
     * Set maintenance
     *
     * @param string $maintenance
     * @return Settings
     */
    public function setMaintenance($maintenance)
    {
        $this->maintenance = $maintenance;

        return $this;
    }

    /**
     * Get maintenance
     *
     * @return string
     */
    public function getMaintenance()
    {
        return (bool)$this->maintenance;
    }

    /**
     * Set inlineEdit
     *
     * @param string $inlineEdit
     * @return Settings
     */
    public function setInlineEdit($inlineEdit)
    {
        $this->inlineEdit = $inlineEdit;

        return $this;
    }

    /**
     * Get inlineEdit
     *
     * @return string
     */
    public function getInlineEdit()
    {
        return (bool)$this->inlineEdit;
    }

    /**
     * Set priceIncludeTax
     *
     * @param string $priceIncludeTax
     * @return Settings
     */
    public function setPriceIncludeTax($priceIncludeTax)
    {
        $this->priceIncludeTax = $priceIncludeTax;

        return $this;
    }

    /**
     * Get priceIncludeTax
     *
     * @return string
     */
    public function getPriceIncludeTax()
    {
        return (bool)$this->priceIncludeTax;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Settings
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set logo
     *
     * @param \App\CmsBundle\Entity\Media $logo
     *
     * @return Settings
     */
    public function setLogo(\App\CmsBundle\Entity\Media $logo = null)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return \App\CmsBundle\Entity\Media
     */
    public function getLogo($fallback = true)
    {
        if($this->hasLogo()){
            return '/' . $this->logo->getWebPath();
        }else{
            if($fallback){
                return '/bundles/cms/images/logo.svg';
            }
        }

        return null;
    }

    /**
     * Get logo object
     *
     * @return \App\CmsBundle\Entity\Media
     */
    public function getLogoObject()
    {
        if($this->hasLogo()){
            return $this->logo;
        }
        return null;
    }

    /**
     * Has logo
     *
     * @return boolean
     */
    public function hasLogo()
    {
        return !empty($this->logo);
    }
	
    /**
     * Has Postcode NL Checker
     *
     * @return boolean
     */
    public function hasPostnlChecker()
    {
        return !empty($this->postnl_checker);
    }
	
	/**
     * Set postNlChecker
     *
     * @param boolean $postNlChecker
     *
     * @return boolean
     */
    public function setPostNlChecker($postNlChecker)
    {
        $this->postnl_checker = $postNlChecker;

        return $this;
    }

    /**
     * Get postNlChecker
     *
     * @return boolean
     */
    public function getPostNlChecker()
    {
        return $this->postnl_checker;
    }
	
    /**
     * Has Postcode NL Key
     *
     * @return text
     */
    public function getPostnlKey()
    {
        return $this->postnl_key;
    }
	
	/**
     * Set postNlKey
     *
     * @param boolean $postNlKey
     *
     * @return text
     */
    public function setPostnlKey($postNlKey)
    {
        $this->postnl_key = $postNlKey;

        return $this;
    }
	
    /**
     * Has Postcode NL Secret Key
     *
     * @return text
     */
    public function getPostnlSecretKey()
    {
        return $this->postnl_secret_key;
    }
	
	/**
     * Set postNlSecretKey
     *
     * @param boolean $postNlSecretKey
     *
     * @return text
     */
    public function setPostnlSecretKey($postNlSecretKey)
    {
        $this->postnl_secret_key = $postNlSecretKey;

        return $this;
    }

    /**
     * Set background
     *
     * @param \App\CmsBundle\Entity\Media $background
     *
     * @return Settings
     */
    public function setBackground(\App\CmsBundle\Entity\Media $background = null)
    {
        $this->background = $background;

        return $this;
    }

    /**
     * Get background
     *
     * @return \App\CmsBundle\Entity\Media
     */
    public function getBackground()
    {
        if($this->hasBackground()){
            return '/' . $this->background->getWebPath();
        }else{
            return '/bundles/cms/images/background.jpg';
        }
    }

    /**
     * Get background object
     *
     * @return \App\CmsBundle\Entity\Media
     */
    public function getBackgroundObject()
    {
        if($this->hasBackground()){
            return $this->background;
        }
        return null;
    }

    /**
     * Has background
     *
     * @return boolean
     */
    public function hasBackground()
    {
        return !empty($this->background);
    }

    /**
     * Set maintenanceMessage
     *
     * @param string $maintenanceMessage
     *
     * @return Settings
     */
    public function setMaintenanceMessage($maintenanceMessage)
    {
        $this->maintenance_message = $maintenanceMessage;

        return $this;
    }

    /**
     * Get maintenanceMessage
     *
     * @return string
     */
    public function getMaintenanceMessage()
    {
        return $this->maintenance_message;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     *
     * @return Settings
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     *
     * @return Settings
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    public function getMetaApiToken(): ?string
    {
        return $this->meta_api_token;
    }

    public function setMetaApiToken(?string $meta_api_token): self
    {
        $this->meta_api_token = $meta_api_token;

        return $this;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Settings
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Settings
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Settings
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set postalcode
     *
     * @param string $postalcode
     *
     * @return Settings
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    /**
     * Get postalcode
     *
     * @return string
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * Set place
     *
     * @param string $place
     *
     * @return Settings
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Settings
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Settings
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set kvk
     *
     * @param integer $kvk
     *
     * @return Settings
     */
    public function setKvk($kvk)
    {
        $this->kvk = $kvk;

        return $this;
    }

    /**
     * Get kvk
     *
     * @return integer
     */
    public function getKvk()
    {
        return $this->kvk;
    }

    /**
     * Set taxNo
     *
     * @param integer $taxNo
     *
     * @return Settings
     */
    public function setTaxNo($taxNo)
    {
        $this->taxNo = $taxNo;

        return $this;
    }

    /**
     * Get taxNo
     *
     * @return integer
     */
    public function getTaxNo()
    {
        return $this->taxNo;
    }

    /**
     * Set tagline
     *
     * @param string $tagline
     *
     * @return Settings
     */
    public function setTagline($tagline)
    {
        $this->tagline = $tagline;

        return $this;
    }

    /**
     * Get tagline
     *
     * @return string
     */
    public function getTagline()
    {
        return $this->tagline;
    }

    /**
     * Set layoutIncludeJs
     *
     * @param array $layoutIncludeJs
     *
     * @return Settings
     */
    public function setLayoutIncludeJs($layoutIncludeJs)
    {
        $this->layout_include_js = $layoutIncludeJs;

        return $this;
    }

    /**
     * Get layoutIncludeJs
     *
     * @return array
     */
    public function getLayoutIncludeJs($allowCache = false)
    {
        $cacheDir = __DIR__ . '/../../../public/static/';
        $cacheDirJs = $cacheDir . 'js/';
        if($this->cache_cdn && $allowCache){
            if(!file_exists($cacheDir)){ @mkdir($cacheDir); }
            if(!file_exists($cacheDirJs)){ @mkdir($cacheDirJs); }
            if(file_exists($cacheDirJs) && is_writable($cacheDirJs)){
                $urls = [];
                foreach($this->layout_include_js as $k => $f){
                    $v = $this->guessVersion($f, true);
                    $filename = (!empty($v) ? $v . '_' : '') . basename($f);
                    if(!file_exists($cacheDirJs . $filename)){
                        $f_full = $f;
                        if(substr($f_full, 0, 2) == '//') $f_full = 'http:' . $f_full;
                        $data = file_get_contents($f_full);
                        if(strlen($data) > 50){
							// check if there are any external (.map) files
							if (preg_match('/sourceMappingURL=(.+map)/', $data, $matches)) {
								if (isset($matches[1]))
								{
									$mapUrl = dirname($f_full) . '/' . $matches[1];
									
									$sourceFilename = (!empty($v) ? $v . '_' : '') . basename($matches[1]);

									set_time_limit(0);
									$fp = fopen ($cacheDirJs . $sourceFilename, 'w+');
									$ch = curl_init(str_replace(" ", "%20", $mapUrl));
									curl_setopt($ch, CURLOPT_TIMEOUT, 50);
									curl_setopt($ch, CURLOPT_FILE, $fp);
									curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
									curl_exec($ch);
									
									$info = curl_getinfo($ch);

									curl_close($ch);
									fclose($fp);

									if ($info['http_code'] == 200) {
										// update sourceMappingURL
										$data = str_replace($matches[1], '/static/js/' . $sourceFilename, $data);
									} else {
										// we got a error downloading the map file, deleting file and reference to it.
										if (file_exists($cacheDirJs . $sourceFilename)) {
											unlink($cacheDirJs . $sourceFilename);
										}
										
										$data = preg_replace('/sourceMappingURL=.+map/', '', $data);
									}
								}
							}

                            file_put_contents($cacheDirJs . $filename, $data);
                            $urls[] = '/static/js/' . $filename;
                        }else{
                            $urls[] = $f;
                        }
                    }else{
                        $urls[] = '/static/js/' . $filename;
                    }
                }

                return $urls;
            }
        }
        return $this->layout_include_js;
    }

    /**
     * Set layoutIncludeCss
     *
     * @param array $layoutIncludeCss
     *
     * @return Settings
     */
    public function setLayoutIncludeCss($layoutIncludeCss)
    {
        $this->layout_include_css = $layoutIncludeCss;

        return $this;
    }

    function guessVersion($str, $strip = false) {
        preg_match("/(?:version|v)?\s*((?:[0-9]+\.?)+)/i", $str, $matches);
        $v = (!empty($matches[1]) ? $matches[1] : '');
        if($strip){
            $v = str_replace('.', '', $v);
        }
        return $v;
    }

    /**
     * Get layoutIncludeCss
     *
     * @return array
     */
    public function getLayoutIncludeCss($allowCache = false)
    {
        $patterns = ['/\(\s?\'(.*?)\'\s?\)/','/url\(\s?(.*?)\s?\)/'];

        $cacheDir = __DIR__ . '/../../../public/static/';
        $cacheDirCss = $cacheDir . 'css/';
        if($this->cache_cdn && $allowCache){
            if(!file_exists($cacheDir)){ @mkdir($cacheDir); }
            if(!file_exists($cacheDirCss)){ @mkdir($cacheDirCss); }
            if(file_exists($cacheDirCss) && is_writable($cacheDirCss)){
                $urls = [];
                foreach($this->layout_include_css as $k => $f){
                    $v = $this->guessVersion($f, true);
                    $filename = (!empty($v) ? $v . '_' : '') . basename($f);
                    if(!file_exists($cacheDirCss . $filename)){
                        $f_full = $f;
                        if(substr($f_full, 0, 2) == '//') $f_full = 'http:' . $f_full;
                        $data = file_get_contents($f_full);
                        if(strlen($data) > 50){
                            // Gather external assets
                            foreach($patterns as $pattern){
                                if(preg_match_all($pattern, $data, $matches)){
                                    foreach($matches[1] as $k => $include){
										if (str_contains($include, 'data:image/svg')) {
											// embedded svg, skipping
											continue;
										}

                                        if(empty($include)){
                                            if(!empty($matches[2][$k])){
                                                $include = $matches[2][$k];
                                            }
                                        }

                                        if(strpos($include, '.') !== false){
                                            $prev = $include;

                                            $uri = preg_replace('/\/[a-zA-Z0-9-_\.]+\.[a-z]+$/', '/', $f_full);
                                            $file_url = $uri . $include;
                                            $include = str_replace('../', '', $include);
                                            $include = str_replace('./', '', $include);
                                            $include = preg_replace('/\?.*?$/', '', $include);
											$include = preg_replace('/\#.*?$/', '', $include);

                                            $new = $include;

                                            $data = str_replace($prev, $new, $data);

                                            $path = explode('/', $include);
                                            $path_str = $cacheDirCss;
                                            if(!file_exists($path_str)){
                                                mkdir($path_str);
                                            }
                                            foreach($path as $index => $dir){
                                                if($dir == '.') continue;
                                                if($index < (count($path) - 1)){
                                                    if(!file_exists($path_str . $dir)){
                                                        mkdir($path_str . $dir);
                                                    }
                                                    $path_str = $path_str . $dir . '/';
                                                }
                                            }

                                            set_time_limit(0);
                                            $fp = fopen ($cacheDirCss . $include, 'w+');
                                            $ch = curl_init(str_replace(" ","%20",$file_url));
                                            curl_setopt($ch, CURLOPT_TIMEOUT, 50);
                                            curl_setopt($ch, CURLOPT_FILE, $fp);
                                            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                                            curl_exec($ch);
                                            curl_close($ch);
                                            fclose($fp);
                                        }
                                    }

									// check if there are any external (.map) files
									if (preg_match('/sourceMappingURL=(.+map)/', $data, $matches)) {
										if (isset($matches[1]))
										{
											$mapUrl = dirname($f_full) . '/' . $matches[1];

											$sourceFilename = (!empty($v) ? $v . '_' : '') . basename($matches[1]);

											set_time_limit(0);
											$fp = fopen ($cacheDirCss . $sourceFilename, 'w+');
											$ch = curl_init(str_replace(" ", "%20", $mapUrl));
											curl_setopt($ch, CURLOPT_TIMEOUT, 50);
											curl_setopt($ch, CURLOPT_FILE, $fp);
											curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
											curl_exec($ch);

											$info = curl_getinfo($ch);

											curl_close($ch);
											fclose($fp);

											if ($info['http_code'] == 200) {
												// update sourceMappingURL
												$data = str_replace($matches[1], '/static/css/' . $sourceFilename, $data);
											} else {
												// we got a error downloading the map file, deleting file and reference to it.
												if (file_exists($cacheDirCss . $sourceFilename)) {
													unlink($cacheDirCss . $sourceFilename);
												}

												$data = preg_replace('/sourceMappingURL=.+map/', '', $data);
											}
										}
									}

                                    break;
                                }
                            }
                            file_put_contents($cacheDirCss . $filename, $data);
                            $urls[] = '/static/css/' . $filename;
                        }else{
                            $urls[] = $f;
                        }
                    }else{
                        $urls[] = '/static/css/' . $filename;
                    }
                }

                return $urls;
            }
        }
        return $this->layout_include_css;
    }

    /**
     * Set restrictAccess
     *
     * @param string $restrictAccess
     *
     * @return Settings
     */
    public function setRestrictAccess($restrictAccess)
    {
        $this->restrict_access = $restrictAccess;

        return $this;
    }

    /**
     * Get restrictAccess
     *
     * @return string
     */
    public function getRestrictAccess()
    {
        return $this->restrict_access;
    }

    /**
     * Get restrictAccess as array
     *
     * @return array
     */
    public function getRestrictAccessList()
    {
        $list = explode("\n", $this->restrict_access);
        $return = array();
        foreach($list as $k => $v){
            $v = trim($v);
            if(!empty($v)) $return[] = $v;
        }
        return $return;
    }

    /**
     * Set restrictAccess
     *
     * @param string $restrictAccess
     *
     * @return Settings
     */
    public function setRestrictAccessDeny($restrictAccessDeny)
    {
        $this->restrict_access_deny = $restrictAccessDeny;

        return $this;
    }

    /**
     * Get restrictAccessDeny
     *
     * @return string
     */
    public function getRestrictAccessDeny()
    {
        return $this->restrict_access_deny;
    }

    /**
     * Get restrictAccessDeny as array
     *
     * @return array
     */
    public function getRestrictAccessDenyList()
    {
        $list = explode("\n", $this->restrict_access_deny);
        $return = array();
        foreach($list as $k => $v){
            $v = trim($v);
            if(!empty($v)) $return[] = $v;
        }
        return $return;
    }

    public function hasAccess(){
        $allowList = $this->getRestrictAccessList();
        $denyList = $this->getRestrictAccessDenyList();

        $access = true;
        if(in_array($_SERVER['REMOTE_ADDR'], $denyList) || in_array('*.*.*.*', $denyList)){
            $access = false;
        }
        if(in_array($_SERVER['REMOTE_ADDR'], $allowList)){
            $access = true;
        }

        return $access;
    }

    public function getPayLabel($method = null){
        if(empty($method)){
            if($this->mollie_enabled){
                $method = 'mollie';
            }else if($this->buckaroo_enabled){
                $method = 'buckaroo';
            }else if($this->omnikassa_enabled){
                $method = 'omnikassa';
            }else if($this->multisafepay_enabled){
                $method = 'multisafepay';
            }else if($this->pay_enabled){
                $method = 'pay';
            }else if($this->sisow_enabled){
                $method = 'sisow';
            }else if($this->paypro_enabled){
                $method = 'paypro';
            }
        }

        $trans = [
            'mollie'       => 'Mollie',
            'buckaroo'     => 'Buckaroo',
            'omnikassa'    => 'OmniKassa',
            'multisafepay' => 'MultiSafePay',
            'pay'          => 'Pay.nl',
            'sisow'        => 'Sisow',
        ];

        if(array_key_exists($method, $trans)){
            return $trans[$method];
        }

        return 'unknown';
    }

    public function getPay($method = null, $test = false){

        if(empty($method)){
            if($this->mollie_enabled){
                $method = 'mollie';
            }else if($this->buckaroo_enabled){
                $method = 'buckaroo';
            }else if($this->omnikassa_enabled){
                $method = 'omnikassa';
            }else if($this->multisafepay_enabled){
                $method = 'multisafepay';
            }else if($this->pay_enabled){
                $method = 'pay';
            }else if($this->sisow_enabled){
                $method = 'sisow';
            }else if($this->paypro_enabled){
                $method = 'paypro';
            }
        }

        if($this->getTest()){
            $test = true;
        }

        if($method == 'mollie'){
            $Pay = new \App\CmsBundle\Classes\Pay('mollie', [
                'locale' => $this->language->getLocale(),
                'live_mode' => ($test ? false : (bool)$this->getMollieLive()),
                'key_test'  => $this->getMollieApiTest(),
                'key_live'  => $this->getMollieApiLive(),
                'subscription' => $this->getMollieSubscription(),
            ]);
        }else if($method == 'paypro'){
            $Pay = new \App\CmsBundle\Classes\Pay('paypro', [
                'locale'       => $this->language->getLocale(),
                'live_mode'    => ($test ? false : (bool)$this->getPayproLive()),
                'key'          => $this->getPayproKey(),
                'subscription' => $this->getPayproSubscription(),
            ]);
        }else if($method == 'buckaroo'){
            $Pay = new \App\CmsBundle\Classes\Pay('buckaroo', [
                'locale' => $this->language->getLocale(),
                'live_mode' => ($test ? false : (bool)$this->getBuckarooLive()),
                'key'       => $this->getBuckarooWebsiteKey(),
                'secret'       => $this->getBuckarooSecret(),
                'subscription' => false,
            ]);
        }else if($method == 'omnikassa'){
            $Pay = new \App\CmsBundle\Classes\Pay('omnikassa', [
                'locale' => $this->language->getLocale(),
                'live_mode' => ($test ? false : (bool)$this->getOmnikassaLive()),
                'signing_live' => $this->getOmnikassaSign(),
                'refresh_live' => $this->getOmnikassaRefresh(),
                'signing_test' => $this->getOmnikassaSignTest(),
                'refresh_test' => $this->getOmnikassaRefreshTest(),
                'subscription' => false,
            ]);
        }else if($method == 'multisafepay'){
            $Pay = new \App\CmsBundle\Classes\Pay('multisafepay', [
                'locale' => $this->language->getLocale(),
                'live_mode' => ($test ? false : (bool)$this->getMultisafepayLive()),
                'api_key_live'  => $this->getMultisafepayApi(),
                'api_key_test'  => $this->getMultisafepayApiTest(),
                'subscription' => false,
            ]);
        }else if($method == 'pay'){
            $Pay = new \App\CmsBundle\Classes\Pay('pay', [
                'locale' => $this->language->getLocale(),
                'live_mode' => ($test ? false : (bool)$this->getPayLive()),
                'service_id'  => $this->getPayServiceId(),
                'key_test'  => $this->getPayApiTest(),
                'key_live'  => $this->getPayApiLive(),
                'subscription' => false,
            ]);
        }else if($method == 'sisow'){
            $Pay = new \App\CmsBundle\Classes\Pay('sisow', [
                'locale' => $this->language->getLocale(),
                'live_mode' => ($test ? false : (bool)$this->getSisowLive()),
                'merchant_id'  => $this->getSisowMerchantId(),
                'merchant_key'  => $this->getSisowMerchantKey(),
                'shop_id'  => $this->getSisowShopId(),
                'subscription' => false,
                'options'      => $this->getSisowOptions(),
            ]);
        }else{
            $Pay = new \App\CmsBundle\Classes\Pay();
        }

        if($this->getTest() || $test){
            $Pay->setTest(true);
        }

        return $Pay;
    }

    /**
     * Get Mollie object
     *
     * @return string
     */
    /*public function getMollie()
    {
        $key = $this->getMollieApiTest();
        if($this->getMollieLive()){
            $key = $this->getMollieApiLive();
        }
        if(!empty($key)){
            $mollie = new \Mollie_API_Client;
            $mollie->setApiKey($key);
            return $mollie;
        }
        return null;
    }*/

    /**
     * Set mollieApi
     *
     * @param string $mollieApi
     *
     * @return Settings
     */
    public function setMollieApi($mollieApi)
    {
        $this->mollie_api = $mollieApi;

        return $this;
    }

    /**
     * Get mollieApi
     *
     * @return string
     */
    public function getMollieApi()
    {
        return $this->mollie_api;
    }

    /**
     * Set mollieApiTest
     *
     * @param string $mollieApiTest
     *
     * @return Settings
     */
    public function setMollieApiTest($mollieApiTest)
    {
        $this->mollie_api_test = $mollieApiTest;

        return $this;
    }

    /**
     * Get mollieApiTest
     *
     * @return string
     */
    public function getMollieApiTest()
    {
        return $this->mollie_api_test;
    }

    /**
     * Set mollieApiLive
     *
     * @param string $mollieApiLive
     *
     * @return Settings
     */
    public function setMollieApiLive($mollieApiLive)
    {
        $this->mollie_api_live = $mollieApiLive;

        return $this;
    }

    /**
     * Get mollieApiLive
     *
     * @return string
     */
    public function getMollieApiLive()
    {
        return $this->mollie_api_live;
    }

    /**
     * Set mollieLive
     *
     * @param boolean $mollieLive
     *
     * @return Settings
     */
    public function setMollieLive($mollieLive)
    {
        $this->mollie_live = $mollieLive;

        return $this;
    }

    /**
     * Get mollieLive
     *
     * @return boolean
     */
    public function getMollieLive()
    {
        return $this->mollie_live;
    }
	
	
	
	/**
     * Set santander loan active
     *
     * @param string $santander_loan_active
     *
     * @return bool
     */
    public function setSantanderLoanActive($santanderLoanActive)
    {
        $this->santander_loan_active = $santanderLoanActive;

        return $this;
    }

    /**
     * Get santander loan active
     *
     * @return bool
     */
    public function getSantanderLoanActive()
    {
        return $this->santander_loan_active;
    }
	
	/**
     * Set santander is live
     *
     * @param string $santander_is_live
     *
     * @return bool
     */
    public function setSantanderIsLive($santanderIsLive)
    {
        $this->santander_is_live = $santanderIsLive;

        return $this;
    }

    /**
     * Get santander is live
     *
     * @return bool
     */
    public function getSantanderIsLive()
    {
        return $this->santander_is_live;
    }
	
	/**
     * Set santander loan api test
     *
     * @param string $santander_loan_api_test
     *
     * @return Settings
     */
    public function setSantanderLoanApiTest($santanderLoanApiTest)
    {
        $this->santander_loan_api_test = $santanderLoanApiTest;

        return $this;
    }

    /**
     * Get santander loan api test
     *
     * @return string
     */
    public function getSantanderLoanApiTest()
    {
        return $this->santander_loan_api_test;
    }
	
	/**
     * Set santander loan api live
     *
     * @param string $santander_loan_api_live
     *
     * @return Settings
     */
    public function setSantanderLoanApiLive($santanderLoanApiLive)
    {
        $this->santander_loan_api_live = $santanderLoanApiLive;

        return $this;
    }

    /**
     * Get santander loan api live
     *
     * @return string
     */
    public function getSantanderLoanApiLive()
    {
        return $this->santander_loan_api_live;
    }

    /**
     * Set piwikApiHash
     *
     * @param string $piwikApiHash
     *
     * @return Settings
     */
    public function setPiwikApiHash($piwikApiHash)
    {
        $this->piwik_api_hash = $piwikApiHash;

        return $this;
    }

    /**
     * Get piwikApiHash
     *
     * @return string
     */
    public function getPiwikApiHash()
    {
        return $this->piwik_api_hash;
    }

    /**
     * Set piwikSiteId
     *
     * @param integer $piwikSiteId
     *
     * @return Settings
     */
    public function setPiwikSiteId($piwikSiteId)
    {
        $this->piwik_site_id = $piwikSiteId;

        return $this;
    }

    /**
     * Get piwikSiteId
     *
     * @return integer
     */
    public function getPiwikSiteId()
    {
        return $this->piwik_site_id;
    }

    /**
     * Set cacheInvalidated
     *
     * @param boolean $cacheInvalidated
     *
     * @return Settings
     */
    public function setCacheInvalidated($cacheInvalidated)
    {
        $this->cache_invalidated = $cacheInvalidated;

        return $this;
    }

    /**
     * Get cacheInvalidated
     *
     * @return boolean
     */
    public function getCacheInvalidated()
    {
        return $this->cache_invalidated;
    }

    /**
     * Set footerBlock1
     *
     * @param string $footerBlock1
     *
     * @return Settings
     */
    public function setFooterBlock1($footerBlock1)
    {
        $this->footer_block_1 = $footerBlock1;

        return $this;
    }

    /**
     * Get footerBlock1
     *
     * @return string
     */
    public function getFooterBlock1()
    {
        return $this->footer_block_1;
    }

    /**
     * Set footerBlock2
     *
     * @param string $footerBlock2
     *
     * @return Settings
     */
    public function setFooterBlock2($footerBlock2)
    {
        $this->footer_block_2 = $footerBlock2;

        return $this;
    }

    /**
     * Get footerBlock2
     *
     * @return string
     */
    public function getFooterBlock2()
    {
        return $this->footer_block_2;
    }

    /**
     * Set footerBlock3
     *
     * @param string $footerBlock3
     *
     * @return Settings
     */
    public function setFooterBlock3($footerBlock3)
    {
        $this->footer_block_3 = $footerBlock3;

        return $this;
    }

    /**
     * Get footerBlock3
     *
     * @return string
     */
    public function getFooterBlock3()
    {
        return $this->footer_block_3;
    }

    /**
     * Set footerBlock4
     *
     * @param string $footerBlock4
     *
     * @return Settings
     */
    public function setFooterBlock4($footerBlock4)
    {
        $this->footer_block_4 = $footerBlock4;

        return $this;
    }

    /**
     * Get footerBlock4
     *
     * @return string
     */
    public function getFooterBlock4()
    {
        return $this->footer_block_4;
    }

    /**
     * Set footerBlock5
     *
     * @param string $footerBlock5
     *
     * @return Settings
     */
    public function setFooterBlock5($footerBlock5)
    {
        $this->footer_block_5 = $footerBlock5;

        return $this;
    }

    /**
     * Get footerBlock5
     *
     * @return string
     */
    public function getFooterBlock5()
    {
        return $this->footer_block_5;
    }

    /**
     * Set uptimeRobotKey
     *
     * @param string $uptimeRobotKey
     *
     * @return Settings
     */
    public function setUptimeRobotKey($uptimeRobotKey)
    {
        $this->uptime_robot_key = $uptimeRobotKey;

        return $this;
    }

    /**
     * Get uptimeRobotKey
     *
     * @return string
     */
    public function getUptimeRobotKey()
    {
        return $this->uptime_robot_key;
    }

    /**
     * Set language
     *
     * @param \App\CmsBundle\Entity\Language $language
     *
     * @return Settings
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
     * Set host
     *
     * @param string $host
     *
     * @return Settings
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set defaultTemplate
     *
     * @param string $defaultTemplate
     *
     * @return Settings
     */
    public function setDefaultTemplate($defaultTemplate)
    {
        $this->default_template = $defaultTemplate;

        return $this;
    }

    /**
     * Get defaultTemplate
     *
     * @return string
     */
    public function getDefaultTemplate()
    {
        return $this->default_template;
    }

    /**
     * Set googleUa
     *
     * @param string $googleUa
     *
     * @return Settings
     */
    public function setGoogleUa($googleUa)
    {
        $this->google_ua = $googleUa;

        return $this;
    }

    /**
     * Get googleUa
     *
     * @return string
     */
    public function getGoogleUa()
    {
        return $this->google_ua;
    }

    /**
     * Set snow
     *
     * @param boolean $snow
     *
     * @return Settings
     */
    public function setSnow($snow)
    {
        $this->snow = $snow;

        return $this;
    }

    /**
     * Get snow
     *
     * @return boolean
     */
    public function getSnow()
    {
        return $this->snow;
    }

    /**
     * Set layoutIncludeFont
     *
     * @param array $layoutIncludeFont
     *
     * @return Settings
     */
    public function setLayoutIncludeFont($layoutIncludeFont)
    {
        $this->layout_include_font = $layoutIncludeFont;

        return $this;
    }

    /**
     * Get layoutIncludeFont
     *
     * @return array
     */
    public function getLayoutIncludeFont($allowCache = false)
    {
        $patterns = ['/\(\s?\'(.*?)\'\s?\)/','/url\(\s?(.*?)\s?\)/'];

        $cacheDir = __DIR__ . '/../../../public/static/';
        $cacheDirFont = $cacheDir . 'font/';
        if($this->cache_cdn && $allowCache){
            if(!file_exists($cacheDir)){ @mkdir($cacheDir); }
            if(!file_exists($cacheDirFont)){ @mkdir($cacheDirFont); }
            if(file_exists($cacheDirFont) && is_writable($cacheDirFont)){
                $urls = [];
                foreach($this->layout_include_font as $k => $f){
                    $v = $this->guessVersion($f, true);
                    $filename = (!empty($v) ? $v . '_' : '') . basename($f);
                    if(!file_exists($cacheDirFont . $filename)){
                        $f_full = $f;
                        if(substr($f_full, 0, 2) == '//') $f_full = 'http:' . $f_full;
                        $data = file_get_contents($f_full);
                        if(strlen($data) > 50){

                            // Gather external assets
                            foreach($patterns as $pattern){
                                if(preg_match_all($pattern, $data, $matches)){
                                    foreach($matches[1] as $k => $include){

                                        if(empty($include)){
                                            if(!empty($matches[2][$k])){
                                                $include = $matches[2][$k];
                                            }
                                        }

                                        if(strpos($include, '.') !== false){
                                            $prev = $include;

                                            $uri = preg_replace('/\/[a-zA-Z0-9-_\.]+\.[a-z]+$/', '/', $f_full);
                                            $file_url = $uri . $include;
                                            $include = str_replace('../', '', $include);
                                            $include = preg_replace('/\?.*?$/', '', $include);
											$include = preg_replace('/\#.*?$/', '', $include);

                                            $new = $include;

                                            $data = str_replace($prev, $new, $data);

                                            $include = str_replace('./', '', $include);

                                            $path = explode('/', $include);
                                            $path_str = $cacheDir . 'font/';
                                            if(!file_exists($path_str)){
                                                mkdir($path_str);
                                            }
                                            foreach($path as $index => $dir){
                                                if($index < (count($path) - 1)){
                                                    if(!file_exists($path_str . $dir)){
                                                        mkdir($path_str . $dir);
                                                    }
                                                    $path_str = $path_str . $dir . '/';
                                                }
                                            }

                                            set_time_limit(0);
                                            $fp = fopen ($cacheDirFont . $include, 'w+');
                                            $ch = curl_init(str_replace(" ","%20",$file_url));
                                            curl_setopt($ch, CURLOPT_TIMEOUT, 50);
                                            curl_setopt($ch, CURLOPT_FILE, $fp);
                                            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                                            curl_exec($ch);
                                            curl_close($ch);
                                            fclose($fp);
                                        }
                                    }

                                    break;
                                }
                            }

							// check if there are any external (.map) files
							if (preg_match('/sourceMappingURL=(.+map)/', $data, $matches)) {
								if (isset($matches[1]))
								{
									$mapUrl = dirname($f_full) . '/' . $matches[1];
									
									$sourceFilename = (!empty($v) ? $v . '_' : '') . basename($matches[1]);

									set_time_limit(0);
									$fp = fopen ($cacheDirFont . $sourceFilename, 'w+');
									$ch = curl_init(str_replace(" ", "%20", $mapUrl));
									curl_setopt($ch, CURLOPT_TIMEOUT, 50);
									curl_setopt($ch, CURLOPT_FILE, $fp);
									curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
									curl_exec($ch);

									$info = curl_getinfo($ch);

									curl_close($ch);
									fclose($fp);

									if ($info['http_code'] == 200) {
										// update sourceMappingURL
										$data = str_replace($matches[1], '/static/font/' . $sourceFilename, $data);
									} else {
										// we got a error downloading the map file, deleting file and reference to it.
										if (file_exists($cacheDirFont . $sourceFilename)) {
											unlink($cacheDirFont . $sourceFilename);
										}

										$data = preg_replace('/sourceMappingURL=.+map/', '', $data);
									}
								}
							}

                            file_put_contents($cacheDirFont . $filename, $data);
                            $urls[] = '/static/font/' . $filename;
                        }else{
                            $urls[] = $f;
                        }
                    }else{
                        $urls[] = '/static/font/' . $filename;
                    }
                }

                return $urls;
            }
        }
        return $this->layout_include_font;
    }

    // HTML Minifier
    private function minify_html($input) {
        if(trim($input) === "") return $input;
        // Remove extra white-space(s) between HTML attribute(s)
        $input = preg_replace_callback('#<([^\/\s<>!]+)(?:\s+([^<>]*?)\s*|\s*)(\/?)>#s', function($matches) {
            return '<' . $matches[1] . preg_replace('#([^\s=]+)(\=([\'"]?)(.*?)\3)?(\s+|$)#s', ' $1$2', $matches[2]) . $matches[3] . '>';
        }, str_replace("\r", "", $input));
        // Minify inline CSS declaration(s)
        if(strpos($input, ' style=') !== false) {
            $input = preg_replace_callback('#<([^<]+?)\s+style=([\'"])(.*?)\2(?=[\/\s>])#s', function($matches) {
                return '<' . $matches[1] . ' style=' . $matches[2] . minify_css($matches[3]) . $matches[2];
            }, $input);
        }
        if(strpos($input, '</style>') !== false) {
          $input = preg_replace_callback('#<style(.*?)>(.*?)</style>#is', function($matches) {
            return '<style' . $matches[1] .'>'. minify_css($matches[2]) . '</style>';
          }, $input);
        }
        if(strpos($input, '</script>') !== false) {
          $input = preg_replace_callback('#<script(.*?)>(.*?)</script>#is', function($matches) {
            return '<script' . $matches[1] .'>'. minify_js($matches[2]) . '</script>';
          }, $input);
        }
        return preg_replace(
            array(
                // t = text
                // o = tag open
                // c = tag close
                // Keep important white-space(s) after self-closing HTML tag(s)
                '#<(img|input)(>| .*?>)#s',
                // Remove a line break and two or more white-space(s) between tag(s)
                '#(<!--.*?-->)|(>)(?:\n*|\s{2,})(<)|^\s*|\s*$#s',
                '#(<!--.*?-->)|(?<!\>)\s+(<\/.*?>)|(<[^\/]*?>)\s+(?!\<)#s', // t+c || o+t
                '#(<!--.*?-->)|(<[^\/]*?>)\s+(<[^\/]*?>)|(<\/.*?>)\s+(<\/.*?>)#s', // o+o || c+c
                '#(<!--.*?-->)|(<\/.*?>)\s+(\s)(?!\<)|(?<!\>)\s+(\s)(<[^\/]*?\/?>)|(<[^\/]*?\/?>)\s+(\s)(?!\<)#s', // c+t || t+o || o+t -- separated by long white-space(s)
                '#(<!--.*?-->)|(<[^\/]*?>)\s+(<\/.*?>)#s', // empty tag
                '#<(img|input)(>| .*?>)<\/\1>#s', // reset previous fix
                '#(&nbsp;)&nbsp;(?![<\s])#', // clean up ...
                '#(?<=\>)(&nbsp;)(?=\<)#', // --ibid
                // Remove HTML comment(s) except IE comment(s)
                '#\s*<!--(?!\[if\s).*?-->\s*|(?<!\>)\n+(?=\<[^!])#s'
            ),
            array(
                '<$1$2</$1>',
                '$1$2$3',
                '$1$2$3',
                '$1$2$3$4$5',
                '$1$2$3$4$5$6$7',
                '$1$2$3',
                '<$1$2',
                '$1 ',
                '$1',
                ""
            ),
        $input);
    }

    // CSS Minifier => http://ideone.com/Q5USEF + improvement(s)
    private function minify_css($input) {
        if(trim($input) === "") return $input;
        return preg_replace(
            array(
                // Remove comment(s)
                '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
                // Remove unused white-space(s)
                '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~+]|\s*+-(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
                // Replace `0(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)` with `0`
                '#(?<=[\s:])(0)(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)#si',
                // Replace `:0 0 0 0` with `:0`
                '#:(0\s+0|0\s+0\s+0\s+0)(?=[;\}]|\!important)#i',
                // Replace `background-position:0` with `background-position:0 0`
                '#(background-position):0(?=[;\}])#si',
                // Replace `0.6` with `.6`, but only when preceded by `:`, `,`, `-` or a white-space
                '#(?<=[\s:,\-])0+\.(\d+)#s',
                // Minify string value
                '#(\/\*(?>.*?\*\/))|(?<!content\:)([\'"])([a-z_][a-z0-9\-_]*?)\2(?=[\s\{\}\];,])#si',
                '#(\/\*(?>.*?\*\/))|(\burl\()([\'"])([^\s]+?)\3(\))#si',
                // Minify HEX color code
                '#(?<=[\s:,\-]\#)([a-f0-6]+)\1([a-f0-6]+)\2([a-f0-6]+)\3#i',
                // Replace `(border|outline):none` with `(border|outline):0`
                '#(?<=[\{;])(border|outline):none(?=[;\}\!])#',
                // Remove empty selector(s)
                '#(\/\*(?>.*?\*\/))|(^|[\{\}])(?:[^\s\{\}]+)\{\}#s'
            ),
            array(
                '$1',
                '$1$2$3$4$5$6$7',
                '$1',
                ':0',
                '$1:0 0',
                '.$1',
                '$1$3',
                '$1$2$4$5',
                '$1$2$3',
                '$1:0',
                '$1$2'
            ),
        $input);
    }

    // JavaScript Minifier
    private function minify_js($input) {
        if(trim($input) === "") return $input;
        return preg_replace(
            array(
                // Remove comment(s)
                '#\s*("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')\s*|\s*\/\*(?!\!|@cc_on)(?>[\s\S]*?\*\/)\s*|\s*(?<![\:\=])\/\/.*(?=[\n\r]|$)|^\s*|\s*$#',
                // Remove white-space(s) outside the string and regex
                '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/)|\/(?!\/)[^\n\r]*?\/(?=[\s.,;]|[gimuy]|$))|\s*([!%&*\(\)\-=+\[\]\{\}|;:,.<>?\/])\s*#s',
                // Remove the last semicolon
                '#;+\}#',
                // Minify object attribute(s) except JSON attribute(s). From `{'foo':'bar'}` to `{foo:'bar'}`
                '#([\{,])([\'])(\d+|[a-z_][a-z0-9_]*)\2(?=\:)#i',
                // --ibid. From `foo['bar']` to `foo.bar`
                '#([a-z0-9_\)\]])\[([\'"])([a-z_][a-z0-9_]*)\2\]#i'
            ),
            array(
                '$1',
                '$1$2',
                '}',
                '$1$3',
                '$1.$3'
            ),
        $input);
    }

    /**
     * Set mediaDimensions
     *
     * @param array $mediaDimensions
     *
     * @return Settings
     */
    public function setMediaDimensions($mediaDimensions)
    {
        $this->media_dimensions = $mediaDimensions;

        return $this;
    }

    /**
     * Get mediaDimensions
     *
     * @return array
     */
    public function getMediaDimensions()
    {
        $dimensions = $this->media_dimensions;

        if(empty($dimensions)){
            return [
                'full' => '1920',
                'large' => '900',
                'medium' => '600',
                'small' => '350',
                'thumb' => '150',
            ];
        }

        return $dimensions;
    }

    /**
     * Get mediaDimensions labels
     *
     * @return string
     */
    public function getDimensionLabel($key)
    {
        $trans = [
            'full' => 'Maximaal',
            'large' => 'Groot',
            'medium' => 'Middel',
            'small' => 'Klein',
            'thumb' => 'Thumbnail',
        ];

        return (!empty($trans[$key]) ? $trans[$key] : $key);
    }

    /**
     * Set cookiebar
     *
     * @param boolean $cookiebar
     *
     * @return Settings
     */
    public function setCookiebar($cookiebar)
    {
        $this->cookiebar = $cookiebar;

        return $this;
    }

    /**
     * Get cookiebar
     *
     * @return boolean
     */
    public function getCookiebar()
    {
        return $this->cookiebar;
    }

    /**
     * Set cacheCdn
     *
     * @param boolean $cacheCdn
     *
     * @return Settings
     */
    public function setCacheCdn($cacheCdn)
    {
        $this->cache_cdn = $cacheCdn;

        return $this;
    }

    /**
     * Get cacheCdn
     *
     * @return boolean
     */
    public function getCacheCdn()
    {
        return $this->cache_cdn;
    }

    /**
     * Set robots
     *
     * @param string $robots
     *
     * @return Settings
     */
    public function setRobots($robots)
    {
        $this->robots = $robots;

        return $this;
    }

    /**
     * Get robots
     *
     * @return string
     */
    public function getRobots()
    {
        return $this->robots;
    }

    /**
     * Set headerBar
     *
     * @param boolean $headerBar
     *
     * @return Settings
     */
    public function setHeaderBar($headerBar)
    {
        $this->header_bar = $headerBar;

        return $this;
    }

    /**
     * Get headerBar
     *
     * @return boolean
     */
    public function getHeaderBar()
    {
        return $this->header_bar;
    }

    /**
     * Set headerBarLeft
     *
     * @param string $headerBarLeft
     *
     * @return Settings
     */
    public function setHeaderBarLeft($headerBarLeft)
    {
        $this->header_bar_left = $headerBarLeft;

        return $this;
    }

    /**
     * Get headerBarLeft
     *
     * @return string
     */
    public function getHeaderBarLeft()
    {
        return $this->header_bar_left;
    }

    /**
     * Set headerBarRight
     *
     * @param string $headerBarRight
     *
     * @return Settings
     */
    public function setHeaderBarRight($headerBarRight)
    {
        $this->header_bar_right = $headerBarRight;

        return $this;
    }

    /**
     * Get headerBarRight
     *
     * @return string
     */
    public function getHeaderBarRight()
    {
        return $this->header_bar_right;
    }

    /**
     * Set logoAlt
     *
     * @param \App\CmsBundle\Entity\Media $logoAlt
     *
     * @return Settings
     */
    public function setLogoAlt(\App\CmsBundle\Entity\Media $logoAlt = null)
    {
        $this->logo_alt = $logoAlt;

        return $this;
    }

    /**
     * Get logoAlt
     *
     * @return \App\CmsBundle\Entity\Media
     */
    public function getLogoAlt($fallback = true)
    {
        if($this->hasLogoAlt()){
            return '/' . $this->logo_alt->getWebPath();
        }else{
            if($fallback){
                return '/bundles/cms/images/logo.png';
            }
        }

        return null;
    }

    /**
     * Get logoAlt object
     *
     * @return \App\CmsBundle\Entity\Media
     */
    public function getLogoAltObject()
    {
        if($this->hasLogoAlt()){
            return $this->logo_alt;
        }
        return null;
    }

    /**
     * Has logoAlt
     *
     * @return boolean
     */
    public function hasLogoAlt()
    {
        return !empty($this->logo_alt);
    }

    /**
     * Set forceHttps
     *
     * @param boolean $forceHttps
     *
     * @return Settings
     */
    public function setForceHttps($forceHttps)
    {
        $this->force_https = $forceHttps;

        return $this;
    }

    /**
     * Get forceHttps
     *
     * @return boolean
     */
    public function getForceHttps()
    {
        return $this->force_https;
    }

    /**
     * Set test.
     *
     * @param bool|null $test
     *
     * @return Settings
     */
    public function setTest($test = null)
    {
        $this->test = $test;

        return $this;
    }

    /**
     * Get test.
     *
     * @return bool|null
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * Set restrictAccessType.
     *
     * @param string|null $restrictAccessType
     *
     * @return Settings
     */
    public function setRestrictAccessType($restrictAccessType = null)
    {
        $this->restrict_access_type = $restrictAccessType;

        return $this;
    }

    /**
     * Get restrictAccessType.
     *
     * @return string|null
     */
    public function getRestrictAccessType()
    {
        return $this->restrict_access_type;
    }

    /**
     * Set googleGtm.
     *
     * @param string|null $googleGtm
     *
     * @return Settings
     */
    public function setGoogleGtm($googleGtm = null)
    {
        $this->google_gtm = $googleGtm;

        return $this;
    }

    /**
     * Get googleGtm.
     *
     * @return string|null
     */
    public function getGoogleGtm()
    {
        return $this->google_gtm;
    }

    /**
     * Set googleCc.
     *
     * @param string|null $googleCc
     *
     * @return Settings
     */
    public function setGoogleCc($googleCc = null)
    {
        $this->google_cc = $googleCc;

        return $this;
    }

    /**
     * Get googleCc.
     *
     * @return string|null
     */
    public function getGoogleCc()
    {
        return $this->google_cc;
    }

    /**
     * Set iosAppId.
     *
     * @param string|null $iosAppId
     *
     * @return Settings
     */
    public function setIosAppId($iosAppId = null)
    {
        $this->ios_app_id = $iosAppId;

        return $this;
    }

    /**
     * Get iosAppId.
     *
     * @return string|null
     */
    public function getIosAppId()
    {
        return $this->ios_app_id;
    }

    /**
     * Set ccAuthKey.
     *
     * @param string|null $ccAuthKey
     *
     * @return Settings
     */
    public function setCcAuthKey($ccAuthKey = null)
    {
        $this->cc_auth_key = $ccAuthKey;

        return $this;
    }

    /**
     * Get ccAuthKey.
     *
     * @return string|null
     */
    public function getCcAuthKey()
    {
        return $this->cc_auth_key;
    }

    /**
     * Set ccEnabled.
     *
     * @param bool|null $ccEnabled
     *
     * @return Settings
     */
    public function setCcEnabled($ccEnabled = null)
    {
        $this->cc_enabled = $ccEnabled;

        return $this;
    }

    /**
     * Get ccEnabled.
     *
     * @return bool|null
     */
    public function getCcEnabled()
    {
        return $this->cc_enabled;
    }

    /**
     * Set ccNotifyEmail.
     *
     * @param string|null $ccNotifyEmail
     *
     * @return Settings
     */
    public function setCcNotifyEmail($ccNotifyEmail = null)
    {
        $this->cc_notify_email = $ccNotifyEmail;

        return $this;
    }

    /**
     * Get ccNotifyEmail.
     *
     * @return string|null
     */
    public function getCcNotifyEmail()
    {
        return $this->cc_notify_email;
    }

    /**
     * Set ccExpires.
     *
     * @param \DateTime|null $ccExpires
     *
     * @return Settings
     */
    public function setCcExpires($ccExpires = null)
    {
        $this->cc_expires = $ccExpires;

        return $this;
    }

    /**
     * Get ccExpires.
     *
     * @return \DateTime|null
     */
    public function getCcExpires()
    {
        return $this->cc_expires;
    }

    /**
     * Set androidAppId.
     *
     * @param string|null $androidAppId
     *
     * @return Settings
     */
    public function setAndroidAppId($androidAppId = null)
    {
        $this->android_app_id = $androidAppId;

        return $this;
    }

    /**
     * Get androidAppId.
     *
     * @return string|null
     */
    public function getAndroidAppId()
    {
        return $this->android_app_id;
    }

    /**
     * Set appLabel.
     *
     * @param string|null $appLabel
     *
     * @return Settings
     */
    public function setAppLabel($appLabel = null)
    {
        $this->app_label = $appLabel;

        return $this;
    }

    /**
     * Get appLabel.
     *
     * @return string|null
     */
    public function getAppLabel()
    {
        return $this->app_label;
    }

    /**
     * Set app_icon
     *
     * @param \App\CmsBundle\Entity\Media $app_icon
     *
     * @return Settings
     */
    public function setAppIcon(\App\CmsBundle\Entity\Media $app_icon = null)
    {
        $this->app_icon = $app_icon;

        return $this;
    }

    /**
     * Get app_icon
     *
     * @return \App\CmsBundle\Entity\Media
     */
    public function getAppIcon()
    {
        if($this->hasAppIcon()){
            return '/' . $this->app_icon->getWebPath();
        }

        return null;
    }

    /**
     * Get app_icon object
     *
     * @return \App\CmsBundle\Entity\Media
     */
    public function getAppIconObject()
    {
        if($this->hasAppIcon()){
            return $this->app_icon;
        }
        return null;
    }

    /**
     * Has app_icon
     *
     * @return boolean
     */
    public function hasAppIcon()
    {
        return !empty($this->app_icon);
    }

    /**
     * Set cookiebarButton.
     *
     * @param bool|null $cookiebarButton
     *
     * @return Settings
     */
    public function setCookiebarButton($cookiebarButton = null)
    {
        $this->cookiebar_button = $cookiebarButton;

        return $this;
    }

    /**
     * Get cookiebarButton.
     *
     * @return bool|null
     */
    public function getCookiebarButton()
    {
        return $this->cookiebar_button;
    }

    /**
     * Set cookiebarButtonPosition.
     *
     * @param string|null $cookiebarButtonPosition
     *
     * @return Settings
     */
    public function setCookiebarButtonPosition($cookiebarButtonPosition = null)
    {
        $this->cookiebar_button_position = $cookiebarButtonPosition;

        return $this;
    }

    /**
     * Get cookiebarButtonPosition.
     *
     * @return string|null
     */
    public function getCookiebarButtonPosition()
    {
        return $this->cookiebar_button_position;
    }

    /**
     * Set cookiebarButtonOffset.
     *
     * @param int|null $cookiebarButtonOffset
     *
     * @return Settings
     */
    public function setCookiebarButtonOffset($cookiebarButtonOffset = null)
    {
        $this->cookiebar_button_offset = $cookiebarButtonOffset;

        return $this;
    }

    /**
     * Get cookiebarButtonOffset.
     *
     * @return int|null
     */
    public function getCookiebarButtonOffset()
    {
        return (int)$this->cookiebar_button_offset;
    }

    /**
     * Set maxMediaSize.
     *
     * @param string|null $maxMediaSize
     *
     * @return Settings
     */
    public function setMaxMediaSize($maxMediaSize = null)
    {
        $this->max_media_size = $maxMediaSize;

        return $this;
    }

    /**
     * Get maxMediaSize.
     *
     * @return string|null
     */
    public function getMaxMediaSize()
    {
        return $this->max_media_size;
    }

    /**
     * Get maxMediaSize.
     *
     * @return string|null
     */
    public function getMaxMediaSizeInKB()
    {
        if(preg_match('/^(\d+)([MK]{1})$/', strtoupper($this->max_media_size), $m))
        {
            $num = $m[1];
            $str = $m[2];

            switch ($str)
            {
               case 'M': return ($num * 1000); break;
               case 'K': return ($num); break;
            }
        }

        return '2000'; // 2M
    }

    /**
     * Set googleRecaptchaSitekey.
     *
     * @param string|null $googleRecaptchaSitekey
     *
     * @return Settings
     */
    public function hasGoogleRecaptcha()
    {
        if(!empty($this->google_recaptcha_sitekey) && !empty($this->google_recaptcha_secret)){
            return true;
        }

        return false;
    }

    /**
     * Set googleRecaptchaSitekey.
     *
     * @param string|null $googleRecaptchaSitekey
     *
     * @return Settings
     */
    public function setGoogleRecaptchaSitekey($googleRecaptchaSitekey = null)
    {
        $this->google_recaptcha_sitekey = $googleRecaptchaSitekey;

        return $this;
    }

    /**
     * Get googleRecaptchaSitekey.
     *
     * @return string|null
     */
    public function getGoogleRecaptchaSitekey()
    {
        return $this->google_recaptcha_sitekey;
    }

    /**
     * Set googleRecaptchaSecret.
     *
     * @param string|null $googleRecaptchaSecret
     *
     * @return Settings
     */
    public function setGoogleRecaptchaSecret($googleRecaptchaSecret = null)
    {
        $this->google_recaptcha_secret = $googleRecaptchaSecret;

        return $this;
    }

    /**
     * Get googleRecaptchaSecret.
     *
     * @return string|null
     */
    public function getGoogleRecaptchaSecret()
    {
        return $this->google_recaptcha_secret;
    }

    /**
     * Return Recaptcha widget if Recaptcha is enabled.
     *
     * @param type $optionalText Optional text under the widget
     * @return string
     */
    public function getGoogleRecaptchaWidget($optionalText = null)
    {
        $text = '<div class="recaptcha-wrapper">';
        if ($this->hasGoogleRecaptcha())
        {
            if($this->getGoogleRecaptchaMode() == '2_checkbox'){
                $text .= '<div class="g-recaptcha" data-sitekey="' . $this->getGoogleRecaptchaSitekey() . '"></div>';
                if ($optionalText || !empty($this->google_recaptcha_text))
                {
                    if (empty($optionalText))
                        $optionalText = $this->google_recaptcha_text;
                    $text .= '<div class="recaptcha-text">' . $optionalText .'</div>';
                }
            }else if($this->getGoogleRecaptchaMode() == '2_invisible'){

                $text .= '<script>
                function validateCaptcha(token) {
                    console.log( token );
                    $(\'[name="g-recaptcha-response"]\').val(token);
                }
                setTimeout(function(){ grecaptcha.execute(); }, 2000);
                </script>';
                $text .= '<div class="g-recaptcha" data-sitekey="' . $this->getGoogleRecaptchaSitekey() . '" data-callback="validateCaptcha" data-size="invisible"></div>';
            }else{
                $text .= '<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response-alt" value="" />
                <input type="text" style="display: none;" name="register-check" id="valid-check" value="" />
                <script>
					var recaptchaSiteKey = \'' . $this->getGoogleRecaptchaSitekey() . '\';
                </script>';
            }
        }
        return $text . '</div>';
    }

    /**
     * Check if the response we got from recapta in valid
     *
     * @param string $recaptchaReponse
     * @return boolean
     */
    public function validateGoogleRecaptcha($recaptchaReponse)
    {
        $status = true;

        if ($this->hasGoogleRecaptcha())
        {
            $status = false;

            $data = [
                'secret' => $this->getGoogleRecaptchaSecret(),
                'response' => $recaptchaReponse,
                'remoteip' => $_SERVER['REMOTE_ADDR'],
            ];

            dump($data);
            // dump(http_build_query($data));

            $verify = curl_init();
            curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($verify, CURLOPT_POST, true);
            curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
            $curl_dump = curl_exec($verify);
            $response = json_decode($curl_dump, true);
            // dump($response); die();

            if($response["success"] === true){
                if(isset($response["score"])){
                    if($response["score"] >= ($this->getCaptchaTreshold() / 100)){
                        $status = true;
                    }
                } else {
                    $status = true;
                }
            }
        }

        return $status;
    }

    /**
     * Set googleRecaptchaText.
     *
     * @param string|null $googleRecaptchaText
     *
     * @return Settings
     */
    public function setGoogleRecaptchaText($googleRecaptchaText = null)
    {
        $this->google_recaptcha_text = $googleRecaptchaText;

        return $this;
    }

    /**
     * Get googleRecaptchaText.
     *
     * @return string|null
     */
    public function getGoogleRecaptchaText()
    {
        return $this->google_recaptcha_text;
    }

    /**
     * Set buckarooWebsiteKey.
     *
     * @param string|null $buckarooWebsiteKey
     *
     * @return Settings
     */
    public function setBuckarooWebsiteKey($buckarooWebsiteKey = null)
    {
        $this->buckaroo_website_key = $buckarooWebsiteKey;

        return $this;
    }

    /**
     * Get buckarooWebsiteKey.
     *
     * @return string|null
     */
    public function getBuckarooWebsiteKey()
    {
        return $this->buckaroo_website_key;
    }

    /**
     * Set buckarooLive.
     *
     * @param bool|null $buckarooLive
     *
     * @return Settings
     */
    public function setBuckarooLive($buckarooLive = null)
    {
        $this->buckaroo_live = $buckarooLive;

        return $this;
    }

    /**
     * Get buckarooLive.
     *
     * @return bool|null
     */
    public function getBuckarooLive()
    {
        return $this->buckaroo_live;
    }

    /**
     * Set mollieEnabled.
     *
     * @param bool|null $mollieEnabled
     *
     * @return Settings
     */
    public function setMollieEnabled($mollieEnabled = null)
    {
        $this->mollie_enabled = $mollieEnabled;

        return $this;
    }

    /**
     * Get mollieEnabled.
     *
     * @return bool|null
     */
    public function getMollieEnabled()
    {
        return $this->mollie_enabled;
    }

    /**
     * Set buckarooEnabled.
     *
     * @param bool|null $buckarooEnabled
     *
     * @return Settings
     */
    public function setBuckarooEnabled($buckarooEnabled = null)
    {
        $this->buckaroo_enabled = $buckarooEnabled;

        return $this;
    }

    /**
     * Get buckarooEnabled.
     *
     * @return bool|null
     */
    public function getBuckarooEnabled()
    {
        return $this->buckaroo_enabled;
    }

    /**
     * Set omnikassaLive.
     *
     * @param bool|null $omnikassaLive
     *
     * @return Settings
     */
    public function setOmnikassaLive($omnikassaLive = null)
    {
        $this->omnikassa_live = $omnikassaLive;

        return $this;
    }

    /**
     * Get omnikassaLive.
     *
     * @return bool|null
     */
    public function getOmnikassaLive()
    {
        return $this->omnikassa_live;
    }

    /**
     * Set omnikassaEnabled.
     *
     * @param bool|null $omnikassaEnabled
     *
     * @return Settings
     */
    public function setOmnikassaEnabled($omnikassaEnabled = null)
    {
        $this->omnikassa_enabled = $omnikassaEnabled;

        return $this;
    }

    /**
     * Get omnikassaEnabled.
     *
     * @return bool|null
     */
    public function getOmnikassaEnabled()
    {
        return $this->omnikassa_enabled;
    }

    /**
     * Set mail_header
     *
     * @param \App\CmsBundle\Entity\Media $mail_header
     *
     * @return Settings
     */
    public function setMailHeader(\App\CmsBundle\Entity\Media $mail_header = null)
    {
        $this->mail_header = $mail_header;

        return $this;
    }

    /**
     * Get mail_header
     *
     * @return \App\CmsBundle\Entity\Media
     */
    public function getMailHeader()
    {
        if($this->hasMailHeader()){
            return '/' . $this->mail_header->getWebPath();
        }else{
            return '/bundles/cms/images/mail_header.jpg';
        }
    }

    /**
     * Get mail_header object
     *
     * @return \App\CmsBundle\Entity\Media
     */
    public function getMailHeaderObject()
    {
        if($this->hasMailHeader()){
            return $this->mail_header;
        }
        return null;
    }

    /**
     * Has mail_header
     *
     * @return boolean
     */
    public function hasMailHeader()
    {
        return !empty($this->mail_header);
    }

    /**
     * Set mailFooter.
     *
     * @param string|null $mailFooter
     *
     * @return Settings
     */
    public function setMailFooter($mailFooter = null)
    {
        $this->mail_footer = $mailFooter;

        return $this;
    }

    /**
     * Get mailFooter.
     *
     * @return string|null
     */
    public function getMailFooter()
    {
        return $this->mail_footer;
    }

    /**
     * Set buckarooSecret.
     *
     * @param string|null $buckarooSecret
     *
     * @return Settings
     */
    public function setBuckarooSecret($buckarooSecret = null)
    {
        $this->buckaroo_secret = $buckarooSecret;

        return $this;
    }

    /**
     * Get buckarooSecret.
     *
     * @return string|null
     */
    public function getBuckarooSecret()
    {
        return $this->buckaroo_secret;
    }

    /**
     * Set multisafepayApi.
     *
     * @param string|null $multisafepayApi
     *
     * @return Settings
     */
    public function setMultisafepayApi($multisafepayApi = null)
    {
        $this->multisafepay_api = $multisafepayApi;

        return $this;
    }

    /**
     * Get multisafepayApi.
     *
     * @return string|null
     */
    public function getMultisafepayApi()
    {
        return $this->multisafepay_api;
    }

    /**
     * Set multisafepayLive.
     *
     * @param bool|null $multisafepayLive
     *
     * @return Settings
     */
    public function setMultisafepayLive($multisafepayLive = null)
    {
        $this->multisafepay_live = $multisafepayLive;

        return $this;
    }

    /**
     * Get multisafepayLive.
     *
     * @return bool|null
     */
    public function getMultisafepayLive()
    {
        return $this->multisafepay_live;
    }

    /**
     * Set multisafepayEnabled.
     *
     * @param bool|null $multisafepayEnabled
     *
     * @return Settings
     */
    public function setMultisafepayEnabled($multisafepayEnabled = null)
    {
        $this->multisafepay_enabled = $multisafepayEnabled;

        return $this;
    }

    /**
     * Get multisafepayEnabled.
     *
     * @return bool|null
     */
    public function getMultisafepayEnabled()
    {
        return $this->multisafepay_enabled;
    }

    /**
     * Set multisafepayApiTest.
     *
     * @param string|null $multisafepayApiTest
     *
     * @return Settings
     */
    public function setMultisafepayApiTest($multisafepayApiTest = null)
    {
        $this->multisafepay_api_test = $multisafepayApiTest;

        return $this;
    }

    /**
     * Get multisafepayApiTest.
     *
     * @return string|null
     */
    public function getMultisafepayApiTest()
    {
        return $this->multisafepay_api_test;
    }

    /**
     * Set baseUri.
     *
     * @param string|null $baseUri
     *
     * @return Settings
     */
    public function setBaseUri($baseUri = null)
    {
        $this->base_uri = $baseUri;

        return $this;
    }

    /**
     * Get baseUri.
     *
     * @return string|null
     */
    public function getBaseUri()
    {
        return $this->base_uri;
    }

    /**
     * Set errorNotFound.
     *
     * @param string|null $errorNotFound
     *
     * @return Settings
     */
    public function setErrorNotFound($errorNotFound = null)
    {
        $this->errorNotFound = $errorNotFound;

        return $this;
    }

    /**
     * Get errorNotFound.
     *
     * @return string|null
     */
    public function getErrorNotFound()
    {
        return $this->errorNotFound;
    }

    /**
     * Set errorNoAccess.
     *
     * @param string|null $errorNoAccess
     *
     * @return Settings
     */
    public function setErrorNoAccess($errorNoAccess = null)
    {
        $this->errorNoAccess = $errorNoAccess;

        return $this;
    }

    /**
     * Get errorNoAccess.
     *
     * @return string|null
     */
    public function getErrorNoAccess()
    {
        return $this->errorNoAccess;
    }

    /**
     * Set errorSystem.
     *
     * @param string|null $errorSystem
     *
     * @return Settings
     */
    public function setErrorSystem($errorSystem = null)
    {
        $this->errorSystem = $errorSystem;

        return $this;
    }

    /**
     * Get errorSystem.
     *
     * @return string|null
     */
    public function getErrorSystem()
    {
        return $this->errorSystem;
    }

    /**
     * Set customNavigation.
     *
     * @param bool|null $customNavigation
     *
     * @return Settings
     */
    public function setCustomNavigation($customNavigation = null)
    {
        $this->custom_navigation = $customNavigation;

        return $this;
    }

    /**
     * Get customNavigation.
     *
     * @return bool|null
     */
    public function getCustomNavigation()
    {
        return $this->custom_navigation;
    }

    /**
     * Set serviceBackground.
     *
     * @param \App\CmsBundle\Entity\Media|null $serviceBackground
     *
     * @return Settings
     */
    public function setServiceBackground(\App\CmsBundle\Entity\Media $serviceBackground = null)
    {
        $this->service_background = $serviceBackground;

        return $this;
    }

    /**
     * Get serviceBackground
     *
     * @return \App\CmsBundle\Entity\Media
     */
    public function getServiceBackground()
    {
        if($this->hasServiceBackground()){
            return '/' . $this->service_background->getWebPath();
        }else{
            return '/bundles/cms/images/background.jpg';
        }
    }

    /**
     * Get serviceBackground object
     *
     * @return \App\CmsBundle\Entity\Media
     */
    public function getServiceBackgroundObject()
    {
        if($this->hasServiceBackground()){
            return $this->service_background;
        }
        return null;
    }

    /**
     * Has serviceBackground
     *
     * @return boolean
     */
    public function hasServiceBackground()
    {
        return !empty($this->service_background);
    }

    /**
     * Set piwikUrl.
     *
     * @param string|null $piwikUrl
     *
     * @return Settings
     */
    public function setPiwikUrl($piwikUrl = null)
    {
        $this->piwik_url = $piwikUrl;

        return $this;
    }

    /**
     * Get piwikUrl.
     *
     * @return string|null
     */
    public function getPiwikUrl()
    {
        return $this->piwik_url;
    }

    /**
     * Set payApiTest.
     *
     * @param string|null $payApiTest
     *
     * @return Settings
     */
    public function setPayApiTest($payApiTest = null)
    {
        $this->pay_api_test = $payApiTest;

        return $this;
    }

    /**
     * Get payApiTest.
     *
     * @return string|null
     */
    public function getPayApiTest()
    {
        return $this->pay_api_test;
    }

    /**
     * Set payApiLive.
     *
     * @param string|null $payApiLive
     *
     * @return Settings
     */
    public function setPayApiLive($payApiLive = null)
    {
        $this->pay_api_live = $payApiLive;

        return $this;
    }

    /**
     * Get payApiLive.
     *
     * @return string|null
     */
    public function getPayApiLive()
    {
        return $this->pay_api_live;
    }

    /**
     * Set payLive.
     *
     * @param bool|null $payLive
     *
     * @return Settings
     */
    public function setPayLive($payLive = null)
    {
        $this->pay_live = $payLive;

        return $this;
    }

    /**
     * Get payLive.
     *
     * @return bool|null
     */
    public function getPayLive()
    {
        return $this->pay_live;
    }

    /**
     * Set payEnabled.
     *
     * @param bool|null $payEnabled
     *
     * @return Settings
     */
    public function setPayEnabled($payEnabled = null)
    {
        $this->pay_enabled = $payEnabled;

        return $this;
    }

    /**
     * Get payEnabled.
     *
     * @return bool|null
     */
    public function getPayEnabled()
    {
        return $this->pay_enabled;
    }

    /**
     * Set payServiceId.
     *
     * @param string|null $payServiceId
     *
     * @return Settings
     */
    public function setPayServiceId($payServiceId = null)
    {
        $this->pay_service_id = $payServiceId;

        return $this;
    }

    /**
     * Get payServiceId.
     *
     * @return string|null
     */
    public function getPayServiceId()
    {
        return $this->pay_service_id;
    }

    /**
     * Set googleRecaptchaMode.
     *
     * @param string|null $googleRecaptchaMode
     *
     * @return Settings
     */
    public function setGoogleRecaptchaMode($googleRecaptchaMode = null)
    {
        $this->google_recaptcha_mode = $googleRecaptchaMode;

        return $this;
    }

    /**
     * Get googleRecaptchaMode.
     *
     * @return string|null
     */
    public function getGoogleRecaptchaMode()
    {
        if(empty($this->google_recaptcha_mode)){
            return '2_checkbox';
        }
        return $this->google_recaptcha_mode;
    }

    /**
     * Set avgCookie.
     *
     * @param string|null $avgCookie
     *
     * @return Settings
     */
    public function setAvgCookie($avgCookie = null)
    {
        $this->avg_cookie = $avgCookie;

        return $this;
    }

    /**
     * Get avgCookie.
     *
     * @return string|null
     */
    public function getAvgCookie()
    {
        return $this->avg_cookie;
    }

    /**
     * Set avgDisclaimer.
     *
     * @param string|null $avgDisclaimer
     *
     * @return Settings
     */
    public function setAvgDisclaimer($avgDisclaimer = null)
    {
        $this->avg_disclaimer = $avgDisclaimer;

        return $this;
    }

    /**
     * Get avgDisclaimer.
     *
     * @return string|null
     */
    public function getAvgDisclaimer()
    {
        return $this->avg_disclaimer;
    }

    /**
     * Set avgPrivacy.
     *
     * @param string|null $avgPrivacy
     *
     * @return Settings
     */
    public function setAvgPrivacy($avgPrivacy = null)
    {
        $this->avg_privacy = $avgPrivacy;

        return $this;
    }

    /**
     * Get avgPrivacy.
     *
     * @return string|null
     */
    public function getAvgPrivacy()
    {
        return $this->avg_privacy;
    }

    /**
     * Set instagram.
     *
     * @param string|null $instagram
     *
     * @return Settings
     */
    public function setInstagram($instagram = null)
    {
        $this->instagram = $instagram;

        return $this;
    }

    /**
     * Get instagram.
     *
     * @return string|null
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * Set youtube.
     *
     * @param string|null $youtube
     *
     * @return Settings
     */
    public function setYoutube($youtube = null)
    {
        $this->youtube = $youtube;

        return $this;
    }

    /**
     * Get youtube.
     *
     * @return string|null
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    /**
     * Set sisowMerchantId.
     *
     * @param string|null $sisowMerchantId
     *
     * @return Settings
     */
    public function setSisowMerchantId($sisowMerchantId = null)
    {
        $this->sisow_merchant_id = $sisowMerchantId;

        return $this;
    }

    /**
     * Get sisowMerchantId.
     *
     * @return string|null
     */
    public function getSisowMerchantId()
    {
        return $this->sisow_merchant_id;
    }

    /**
     * Set sisowMerchantKey.
     *
     * @param string|null $sisowMerchantKey
     *
     * @return Settings
     */
    public function setSisowMerchantKey($sisowMerchantKey = null)
    {
        $this->sisow_merchant_key = $sisowMerchantKey;

        return $this;
    }

    /**
     * Get sisowMerchantKey.
     *
     * @return string|null
     */
    public function getSisowMerchantKey()
    {
        return $this->sisow_merchant_key;
    }

    /**
     * Set sisowShopId.
     *
     * @param string|null $sisowShopId
     *
     * @return Settings
     */
    public function setSisowShopId($sisowShopId = null)
    {
        $this->sisow_shop_id = $sisowShopId;

        return $this;
    }

    /**
     * Get sisowShopId.
     *
     * @return string|null
     */
    public function getSisowShopId()
    {
        return $this->sisow_shop_id;
    }

    /**
     * Set sisowLive.
     *
     * @param bool|null $sisowLive
     *
     * @return Settings
     */
    public function setSisowLive($sisowLive = null)
    {
        $this->sisow_live = $sisowLive;

        return $this;
    }

    /**
     * Get sisowLive.
     *
     * @return bool|null
     */
    public function getSisowLive()
    {
        return $this->sisow_live;
    }

    /**
     * Set sisowEnabled.
     *
     * @param bool|null $sisowEnabled
     *
     * @return Settings
     */
    public function setSisowEnabled($sisowEnabled = null)
    {
        $this->sisow_enabled = $sisowEnabled;

        return $this;
    }

    /**
     * Get sisowEnabled.
     *
     * @return bool|null
     */
    public function getSisowEnabled()
    {
        return $this->sisow_enabled;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->linked = new ArrayCollection();
        $this->mediadirs = new ArrayCollection();
        $this->navigations = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->user_access = new ArrayCollection();
    }

    /**
     * Add page.
     *
     * @param \App\CmsBundle\Entity\Page $page
     *
     * @return Settings
     */
    public function addPage(\App\CmsBundle\Entity\Page $page)
    {
        $this->pages[] = $page;

        return $this;
    }

    /**
     * Remove page.
     *
     * @param \App\CmsBundle\Entity\Page $page
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePage(\App\CmsBundle\Entity\Page $page)
    {
        return $this->pages->removeElement($page);
    }

    /**
     * Get pages.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Get top-level pages.
     *
     * @return array
     */
    public function getTopLevelPages()
    {
        $list = [];
        foreach($this->pages as $Page){
            if($Page->getPage() == null){
                $list[] = $Page;
            }
        }
        return $list;
    }

    /**
     * Add user.
     *
     * @param \App\CmsBundle\Entity\User $user
     *
     * @return Settings
     */
    public function addUser(\App\CmsBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user.
     *
     * @param \App\CmsBundle\Entity\User $user
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeUser(\App\CmsBundle\Entity\User $user)
    {
        return $this->users->removeElement($user);
    }

    /**
     * Get users.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set calendar.
     *
     * @param bool|null $calendar
     *
     * @return Settings
     */
    public function setCalendar($calendar = null)
    {
        $this->calendar = $calendar;

        return $this;
    }

    /**
     * Get calendar.
     *
     * @return bool|null
     */
    public function getCalendar()
    {
        return $this->calendar;
    }

    /**
     * Add mediadir.
     *
     * @param \App\CmsBundle\Entity\Mediadir $mediadir
     *
     * @return Settings
     */
    public function addMediadir(\App\CmsBundle\Entity\Mediadir $mediadir)
    {
        $this->mediadirs[] = $mediadir;

        return $this;
    }

    /**
     * Remove mediadir.
     *
     * @param \App\CmsBundle\Entity\Mediadir $mediadir
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeMediadir(\App\CmsBundle\Entity\Mediadir $mediadir)
    {
        return $this->mediadirs->removeElement($mediadir);
    }

    /**
     * Get mediadirs.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMediadirs()
    {
        return $this->mediadirs;
    }

    /**
     * Set parent.
     *
     * @param \App\CmsBundle\Entity\Settings|null $parent
     *
     * @return Settings
     */
    public function setParent(\App\CmsBundle\Entity\Settings $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent.
     *
     * @return \App\CmsBundle\Entity\Settings|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add linked.
     *
     * @param \App\CmsBundle\Entity\Settings $linked
     *
     * @return Settings
     */
    public function addLinked(\App\CmsBundle\Entity\Settings $linked)
    {
        $this->linked[] = $linked;

        return $this;
    }

    /**
     * Remove linked.
     *
     * @param \App\CmsBundle\Entity\Settings $linked
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeLinked(\App\CmsBundle\Entity\Settings $linked)
    {
        return $this->linked->removeElement($linked);
    }

    /**
     * Get linked.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLinked()
    {
        return $this->linked;
    }

    public function __clone(){
        // Cleanup
        $this->linked    = new ArrayCollection();
        $this->mediadirs = new ArrayCollection();
        $this->users     = new ArrayCollection();
        $this->pages     = new ArrayCollection();
        $this->base_uri  = '';
        $this->id        = null;
    }

    /**
     * Set visibleBundles.
     *
     * @param array|null $visibleBundles
     *
     * @return Settings
     */
    public function setVisibleBundles($visibleBundles = null)
    {
        $this->visible_bundles = $visibleBundles;

        return $this;
    }

    /**
     * Get visibleBundles.
     *
     * @return array|null
     */
    public function getVisibleBundles()
    {
        if(empty($this->visible_bundles)){
            return ['TrinityBlogBundle', 'TrinitySliderBundle', 'TrinityFormsBundle'];
        }
        return $this->visible_bundles;
    }

    /**
     * Set linkedin.
     *
     * @param string|null $linkedin
     *
     * @return Settings
     */
    public function setLinkedin($linkedin = null)
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * Get linkedin.
     *
     * @return string|null
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Get prepared Tiniry object.
     *
     * @return Tinify
     */
    public function getTinifyObject(){
        $Tinify = null;
        if(!empty($this->tinypng_api)){
            $Tinify = new \App\CmsBundle\Classes\Tinify($this);
        }
        return $Tinify;
    }

    /**
     * Set tinypngApi.
     *
     * @param string|null $tinypngApi
     *
     * @return Settings
     */
    public function setTinypngApi($tinypngApi = null)
    {
        $this->tinypng_api = $tinypngApi;

        return $this;
    }

    /**
     * Get tinypngApi.
     *
     * @return string|null
     */
    public function getTinypngApi()
    {
        return $this->tinypng_api;
    }

    /**
     * Set bic.
     *
     * @param string|null $bic
     *
     * @return Settings
     */
    public function setBic($bic = null)
    {
        $this->bic = $bic;

        return $this;
    }

    /**
     * Get bic.
     *
     * @return string|null
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * Set invoicePeriod.
     *
     * @param string|null $invoicePeriod
     *
     * @return Settings
     */
    public function setInvoicePeriod($invoicePeriod = null)
    {
        $this->invoice_period = $invoicePeriod;

        return $this;
    }

    /**
     * Get invoicePeriod.
     *
     * @return string|null
     */
    public function getInvoicePeriod()
    {
        return $this->invoice_period;
    }

    /**
     * Set iban.
     *
     * @param string|null $iban
     *
     * @return Settings
     */
    public function setIban($iban = null)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get iban.
     *
     * @return string|null
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Set kvkLocation.
     *
     * @param string|null $kvkLocation
     *
     * @return Settings
     */
    public function setKvkLocation($kvkLocation = null)
    {
        $this->kvk_location = $kvkLocation;

        return $this;
    }

    /**
     * Get kvkLocation.
     *
     * @return string|null
     */
    public function getKvkLocation()
    {
        return $this->kvk_location;
    }

    /**
     * Add userAccess.
     *
     * @param \App\CmsBundle\Entity\User $userAccess
     *
     * @return Settings
     */
    public function addUserAccess(\App\CmsBundle\Entity\User $userAccess)
    {
        $this->user_access[] = $userAccess;

        return $this;
    }

    /**
     * Remove userAccess.
     *
     * @param \App\CmsBundle\Entity\User $userAccess
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeUserAccess(\App\CmsBundle\Entity\User $userAccess)
    {
        return $this->user_access->removeElement($userAccess);
    }

    /**
     * Get userAccess.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserAccess()
    {
        return $this->user_access;
    }

    /**
     * Set ignoreCmsBlocks.
     *
     * @param bool|null $ignoreCmsBlocks
     *
     * @return Settings
     */
    public function setIgnoreCmsBlocks($ignoreCmsBlocks = null)
    {
        $this->ignore_cms_blocks = $ignoreCmsBlocks;

        return $this;
    }

    /**
     * Get ignoreCmsBlocks.
     *
     * @return bool|null
     */
    public function getIgnoreCmsBlocks()
    {
        return $this->ignore_cms_blocks;
    }

    /**
     * Set omnikassaSign.
     *
     * @param string|null $omnikassaSign
     *
     * @return Settings
     */
    public function setOmnikassaSign($omnikassaSign = null)
    {
        $this->omnikassa_sign = $omnikassaSign;

        return $this;
    }

    /**
     * Get omnikassaSign.
     *
     * @return string|null
     */
    public function getOmnikassaSign()
    {
        return $this->omnikassa_sign;
    }

    /**
     * Set omnikassaRefresh.
     *
     * @param string|null $omnikassaRefresh
     *
     * @return Settings
     */
    public function setOmnikassaRefresh($omnikassaRefresh = null)
    {
        $this->omnikassa_refresh = $omnikassaRefresh;

        return $this;
    }

    /**
     * Get omnikassaRefresh.
     *
     * @return string|null
     */
    public function getOmnikassaRefresh()
    {
        return $this->omnikassa_refresh;
    }

    /**
     * Set omnikassaSignTest.
     *
     * @param string|null $omnikassaSignTest
     *
     * @return Settings
     */
    public function setOmnikassaSignTest($omnikassaSignTest = null)
    {
        $this->omnikassa_sign_test = $omnikassaSignTest;

        return $this;
    }

    /**
     * Get omnikassaSignTest.
     *
     * @return string|null
     */
    public function getOmnikassaSignTest()
    {
        return $this->omnikassa_sign_test;
    }

    /**
     * Set omnikassaRefreshTest.
     *
     * @param string|null $omnikassaRefreshTest
     *
     * @return Settings
     */
    public function setOmnikassaRefreshTest($omnikassaRefreshTest = null)
    {
        $this->omnikassa_refresh_test = $omnikassaRefreshTest;

        return $this;
    }

    /**
     * Get omnikassaRefreshTest.
     *
     * @return string|null
     */
    public function getOmnikassaRefreshTest()
    {
        return $this->omnikassa_refresh_test;
    }

    /**
     * Set siteKey.
     *
     * @param string|null $siteKey
     *
     * @return Settings
     */
    public function setSiteKey($siteKey = null)
    {
        $this->site_key = $siteKey;

        return $this;
    }

    /**
     * Get siteKey.
     *
     * @return string|null
     */
    public function getSiteKey()
    {
        return $this->site_key;
    }

    /**
     * Set payproKey.
     *
     * @param string|null $payproKey
     *
     * @return Settings
     */
    public function setPayproKey($payproKey = null)
    {
        $this->paypro_key = $payproKey;

        return $this;
    }

    /**
     * Get payproKey.
     *
     * @return string|null
     */
    public function getPayproKey()
    {
        return $this->paypro_key;
    }

    /**
     * Set payproLive.
     *
     * @param bool|null $payproLive
     *
     * @return Settings
     */
    public function setPayproLive($payproLive = null)
    {
        $this->paypro_live = $payproLive;

        return $this;
    }

    /**
     * Get payproLive.
     *
     * @return bool|null
     */
    public function getPayproLive()
    {
        return $this->paypro_live;
    }

    /**
     * Set payproEnabled.
     *
     * @param bool|null $payproEnabled
     *
     * @return Settings
     */
    public function setPayproEnabled($payproEnabled = null)
    {
        $this->paypro_enabled = $payproEnabled;

        return $this;
    }

    /**
     * Get payproEnabled.
     *
     * @return bool|null
     */
    public function getPayproEnabled()
    {
        return $this->paypro_enabled;
    }

    /**
     * Set mollieSubscription.
     *
     * @param bool|null $mollieSubscription
     *
     * @return Settings
     */
    public function setMollieSubscription($mollieSubscription = null)
    {
        $this->mollie_subscription = $mollieSubscription;

        return $this;
    }

    /**
     * Get mollieSubscription.
     *
     * @return bool|null
     */
    public function getMollieSubscription()
    {
        return $this->mollie_subscription;
    }

    /**
     * Set payproSubscription.
     *
     * @param bool|null $payproSubscription
     *
     * @return Settings
     */
    public function setPayproSubscription($payproSubscription = null)
    {
        $this->paypro_subscription = $payproSubscription;

        return $this;
    }

    /**
     * Get payproSubscription.
     *
     * @return bool|null
     */
    public function getPayproSubscription()
    {
        return $this->paypro_subscription;
    }

    /**
     * Set allowRegistration.
     *
     * @param bool|null $allowRegistration
     *
     * @return Settings
     */
    public function setAllowRegistration($allowRegistration = null)
    {
        $this->allow_registration = $allowRegistration;

        return $this;
    }

    /**
     * Get allowRegistration.
     *
     * @return bool|null
     */
    public function getAllowRegistration()
    {
        if($this->allow_registration === null){
            // Nothing set, default to true
            return true;
        }
        return $this->allow_registration;
    }

    /**
     * Set moderateRegistration.
     *
     * @param bool|null $moderateRegistration
     *
     * @return Settings
     */
    public function setModerateRegistration($moderateRegistration = null)
    {
        $this->moderate_registration = $moderateRegistration;

        return $this;
    }

    /**
     * Get moderateRegistration.
     *
     * @return bool|null
     */
    public function getModerateRegistration()
    {
        if($this->moderate_registration === null){
            // Nothing set, default to false
            return false;
        }
        return $this->moderate_registration;
    }

    /**
     * Set integrations.
     *
     * @param \App\CmsBundle\Entity\Integrations|null $integrations
     *
     * @return Settings
     */
    public function setIntegrations(\App\CmsBundle\Entity\Integrations $integrations = null)
    {
        $this->integrations = $integrations;

        return $this;
    }

    /**
     * Get integrations.
     *
     * @return \App\CmsBundle\Entity\Integrations|null
     */
    public function getIntegrations()
    {
        return $this->integrations;
    }

    /**
     * Set birthdayFields.
     *
     * @param bool|null $birthdayFields
     *
     * @return Settings
     */
    public function setBirthdayFields($birthdayFields = null)
    {
        $this->birthday_fields = $birthdayFields;

        return $this;
    }

    /**
     * Get birthdayFields.
     *
     * @return bool|null
     */
    public function getBirthdayFields()
    {
        return $this->birthday_fields;
    }

    /**
     * Set overrideKey.
     *
     * @param string|null $overrideKey
     *
     * @return Settings
     */
    public function setOverrideKey($overrideKey = null)
    {
        $this->override_key = $overrideKey;

        return $this;
    }

    /**
     * Get overrideKey.
     *
     * @return string|null
     */
    public function getOverrideKey()
    {
        return $this->override_key;
    }

    /**
     * Set googleG.
     *
     * @param string|null $googleG
     *
     * @return Settings
     */
    public function setGoogleG($googleG = null)
    {
        $this->google_g = $googleG;

        return $this;
    }

    /**
     * Get googleG.
     *
     * @return string|null
     */
    public function getGoogleG()
    {
        return $this->google_g;
    }

    /**
     * Set sisowOptions.
     *
     * @param array|null $sisowOptions
     *
     * @return Settings
     */
    public function setSisowOptions($sisowOptions = null)
    {
        $this->sisow_options = $sisowOptions;

        return $this;
    }

    /**
     * Get sisowOptions.
     *
     * @return array|null
     */
    public function getSisowOptions()
    {
        return $this->sisow_options;
    }

    /**
     * Add navigation.
     *
     * @param \App\CmsBundle\Entity\Navigation $navigation
     *
     * @return Settings
     */
    public function addNavigation(\App\CmsBundle\Entity\Navigation $navigation)
    {
        $this->navigations[] = $navigation;

        return $this;
    }

    /**
     * Remove navigation.
     *
     * @param \App\CmsBundle\Entity\Navigation $navigation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeNavigation(\App\CmsBundle\Entity\Navigation $navigation)
    {
        return $this->navigations->removeElement($navigation);
    }

    /**
     * Get navigations.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNavigations()
    {
        return $this->navigations;
    }

    /**
     * Set piwikContainerHashs.
     *
     * @param string|null $piwikContainerHashs
     *
     * @return Settings
     */
    public function setPiwikContainerHashs($piwikContainerHashs = null)
    {
        $this->piwik_container_hashs = $piwikContainerHashs;

        return $this;
    }

    /**
     * Get piwikContainerHashs.
     *
     * @return string|null
     */
    public function getPiwikContainerHashs()
    {
        return $this->piwik_container_hashs;
    }

    /**
     * Set faviconLocation.
     *
     * @param string|null $faviconLocation
     *
     * @return Settings
     */
    public function setFaviconLocation($faviconLocation = null)
    {
        $this->favicon_location = $faviconLocation;

        return $this;
    }

    /**
     * Get faviconLocation.
     *
     * @return string|null
     */
    public function getFaviconLocation()
    {
        if (is_null($this->favicon_location)) {
            return '';
        }

        return $this->favicon_location;
    }

    /**
     * Set author.
     *
     * @param string|null $author
     *
     * @return Settings
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
     * Set appleTouchIcon.
     *
     * @param string|null $appleTouchIcon
     *
     * @return Settings
     */
    public function setAppleTouchIcon($appleTouchIcon = null)
    {
        $this->apple_touch_icon = $appleTouchIcon;

        return $this;
    }

    /**
     * Get appleTouchIcon.
     *
     * @return string|null
     */
    public function getAppleTouchIcon()
    {
        return $this->apple_touch_icon;
    }

    /**
     * Set ogSiteName.
     *
     * @param string|null $ogSiteName
     *
     * @return Settings
     */
    public function setOgSiteName($ogSiteName = null)
    {
        $this->og_site_name = $ogSiteName;

        return $this;
    }

    /**
     * Get ogSiteName.
     *
     * @return string|null
     */
    public function getOgSiteName()
    {
        return $this->og_site_name;
    }

    /**
     * Set faceDomainKey.
     *
     * @param string|null $faceDomainKey
     *
     * @return Settings
     */
    public function setFaceDomainKey($faceDomainKey = null)
    {
        $this->face_domain_key = $faceDomainKey;

        return $this;
    }

    /**
     * Get faceDomainKey.
     *
     * @return string|null
     */
    public function getFaceDomainKey()
    {
        return $this->face_domain_key;
    }

    /**
     * Set captchaTreshold.
     *
     * @param int|null $captchaTreshold
     *
     * @return Settings
     */
    public function setCaptchaTreshold($captchaTreshold = null)
    {
        $this->captcha_treshold = $captchaTreshold;

        return $this;
    }

    /**
     * Get captchaTreshold.
     *
     * @return int|null
     */
    public function getCaptchaTreshold()
    {
        if (is_null($this->captcha_treshold)) {
            return 50;
        } else {
            return $this->captcha_treshold;
        }
    }

    public function getColorSwap(): ?array
    {
        return (empty($this->color_swap) ? [] : (array)$this->color_swap);
    }

    public function setColorSwap(?array $color_swap): self
    {
        $this->color_swap = $color_swap;

        return $this;
    }

    public function getFacebookPixel(): ?string
    {
        return $this->facebook_pixel;
    }

    public function setFacebookPixel(?string $facebook_pixel): self
    {
        $this->facebook_pixel = $facebook_pixel;

        return $this;
    }

    public function getMetaPixelId(): ?string
    {
        return $this->meta_pixel_id;
    }

    public function setMetaPixelId(?string $meta_pixel_id): self
    {
        $this->meta_pixel_id = $meta_pixel_id;

        return $this;
    }

    /**
     * Set api_postcode_token
     *
     * @param string $api_postcode_token
     *
     * @return string
     */
    public function setApiPostcodeToken($api_postcode_token)
    {
        $this->api_postcode_token = $api_postcode_token;

        return $this;
    }

    /**
     * Get api_postcode_token
     *
     * @return string
     */
    public function getApiPostcodeToken()
    {
        return $this->api_postcode_token;
    }

    /**
     * Set outOfOfficeStart.
     *
     * @param \DateTime|null $outOfOfficeStart
     *
     * @return Settings
     */
    public function setOutOfOfficeStart($outOfOfficeStart = null)
    {
        $this->ooo_start = $outOfOfficeStart;

        return $this;
    }

    /**
     * Get outOfOfficeStart.
     *
     * @return \DateTime|null
     */
    public function getOutOfOfficeStart()
    {
        return $this->ooo_start;
    }

    /**
     * Set outOfOfficeEnd.
     *
     * @param \DateTime|null $outOfOfficeEnd
     *
     * @return Settings
     */
    public function setOutOfOfficeEnd($outOfOfficeEnd = null)
    {
        $this->ooo_end = $outOfOfficeEnd;

        return $this;
    }

    /**
     * Get outOfOfficeEnd.
     *
     * @return \DateTime|null
     */
    public function getOutOfOfficeEnd()
    {
        return $this->ooo_end;
    }

    /**
    * Set outOfOfficeMessage
    *
    * @param string $outOfOfficeMessage
    *
    * @return Settings
    */
    public function setOutOfOfficeMessage($outOfOfficeMessage)
    {
        $this->ooo_msg = $outOfOfficeMessage;

        return $this;
    }

    /**
    * Get outOfOfficeMessage
    *
    * @return string
    */
    public function getOutOfOfficeMessage()
    {
        return $this->ooo_msg;
    }

    public function isOutOfOffice(){
        if($this->getOutOfOfficeEnabled()){
            if(!empty($this->getOutOfOfficeStart()) || !empty($this->getOutOfOfficeEnd())){
                if(
                    (empty($this->getOutOfOfficeStart()) || $this->getOutOfOfficeStart()->format('Ymd') <= date('Ymd')) &&
                    (empty($this->getOutOfOfficeEnd()) || $this->getOutOfOfficeEnd()->format('Ymd') >= date('Ymd'))
                ){
                    // Active
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Set ooo_enbl
     *
     * @param boolean $ooo_enbl
     *
     * @return Page
     */
    public function setOutOfOfficeEnabled($ooo_enbl)
    {
        $this->ooo_enbl = $ooo_enbl;

        return $this;
    }

    /**
     * Get ooo_enbl
     *
     * @return boolean
     */
    public function getOutOfOfficeEnabled()
    {
        return $this->ooo_enbl;
    }
	
	/**
     * Set lef api active
     *
     * @param string $lefApiActive
     * @return Settings
     */
    public function setLefApiActive($lefApiActive)
    {
        $this->lef_api_active = $lefApiActive;

        return $this;
    }

    /**
     * Get lef api active
     *
     * @return string
     */
    public function getLefApiActive()
    {
        return $this->lef_api_active;
    }

    /**
     * Set lef api live
     *
     * @param string $lefApiActive
     * @return Settings
     */
    public function setLefApiLive($lefApiLive)
    {
        $this->lef_api_live = $lefApiLive;

        return $this;
    }

    /**
     * Get lef api live
     *
     * @return string
     */
    public function getLefApiLive()
    {
        return $this->lef_api_live;
    }

    /**
     * Set lef test url
     *
     * @param string $lefApiTestUrl
     * @return Settings
     */
    public function setLefApiTestUrl($lefApiTestUrl)
    {
        $this->lef_api_test_url= $lefApiTestUrl;

        return $this;
    }

    /**
     * Get lef test url
     *
     * @return string
     */
    public function getLefApiTestUrl()
    {
        return $this->lef_api_test_url;
    }

    /**
     * Set lef live url
     *
     * @param string $lefApiLiveUrl
     * @return Settings
     */
    public function setLefApiLiveUrl($lefApiLiveUrl)
    {
        $this->lef_api_live_url = $lefApiLiveUrl;

        return $this;
    }

    /**
     * Get lef live url
     *
     * @return string
     */
    public function getLefApiLiveUrl()
    {
        return $this->lef_api_live_url;
    }

    /**
     * Set lef username
     *
     * @param string $lefUserName
     * @return Settings
     */
    public function setLefUserName($lefUserName)
    {
        $this->lef_user_name = $lefUserName;

        return $this;
    }

    /**
     * Get lef username
     *
     * @return string
     */
    public function getLefUserName()
    {
        return $this->lef_user_name;
    }

    /**
     * Set lef password
     *
     * @param string $lefPassword
     * @return Settings
     */
    public function setLefPassword($lefPassword)
    {
        $this->lef_password = $lefPassword;

        return $this;
    }

    /**
     * Get lef password
     *
     * @return string
     */
    public function getLefPassword()
    {
        return $this->lef_password;
    }	

    /**
     * Set lef occasion active
     *
     * @param string $lefOccasionRequest
     * @return Settings
     */
    public function setLefOccasionRequest($lefOccasionRequest)
    {
        $this->lef_occasion_request = $lefOccasionRequest;

        return $this;
    }

    /**
     * Get lef finance occasion active
     *
     * @return string
     */
    public function getLefFinanceOccasionRequest()
    {
        return $this->lef_finance_occassion_request;
    }	

    /**
     * Set lef occasion active
     *
     * @param string $lefFinanceOccasionRequest
     * @return Settings
     */
    public function setLefFinanceOccasionRequest($lefFinanceOccasionRequest)
    {
        $this->lef_finance_occassion_request = $lefFinanceOccasionRequest;

        return $this;
    }

    /**
     * Get lef occasion active
     *
     * @return string
     */
    public function getLefOccasionRequest()
    {
        return $this->lef_occasion_request;
    }

    /**
     * Set lef forms active
     *
     * @param string $lefFormsRequest
     * @return Settings
     */
    public function setLefFormsRequest($lefFormsRequest)
    {
        $this->lef_forms_request = $lefFormsRequest;

        return $this;
    }

    /**
     * Get lef private lease active
     *
     * @return string
     */
    public function getLefPrivateleaseRequest()
    {
        return $this->lef_privatelease_request;
    }
	

    /**
     * Set lef private lease active
     *
     * @param string $lefPrivateleaseRequest
     * @return Settings
     */
    public function setLefPrivateleaseRequest($lefPrivateleaseRequest)
    {
        $this->lef_privatelease_request = $lefPrivateleaseRequest;

        return $this;
    }

    /**
     * Get lef forms active
     *
     * @return string
     */
    public function getLefFormsRequest()
    {
        return $this->lef_forms_request;
    }
	
    /**
     * Set lef offers active
     *
     * @param string $lefFormsRequest
     * @return Settings
     */
    public function setLefOfferRequest($lefOfferRequest)
    {
        $this->lef_offer_request = $lefOfferRequest;

        return $this;
    }

    /**
     * Get lef offers active
     *
     * @return string
     */
    public function getLefOfferRequest()
    {
        return $this->lef_offer_request;
    }
	
    /**
     * Set lef testdrive active
     *
     * @param string $lefTestdriveRequest
     * @return Settings
     */
    public function setLefTestdriveRequest($lefTestdriveRequest)
    {
        $this->lef_testdrive_request = $lefTestdriveRequest;

        return $this;
    }

    /**
     * Get lef testdrive active
     *
     * @return string
     */
    public function getLefTestdriveRequest()
    {
        return $this->lef_testdrive_request;
    }

    /**
     * @return bool|null
     */
    public function isHummessengerApiEnabled()
    {
        return $this->Hummessenger_api_enabled;
    }

    /**
     * @param bool $Hummessenger_api_enabled
     */
    public function setHummessengerApiEnabled(bool $Hummessenger_api_enabled): void
    {
        $this->Hummessenger_api_enabled = $Hummessenger_api_enabled;
    }

    /**
     * @return string|null
     */
    public function getHummessengerApiUrl()
    {
        return $this->Hummessenger_api_url;
    }

    /**
     * @param string $Hummessenger_api_url
     */
    public function setHummessengerApiUrl(string $Hummessenger_api_url): void
    {
        $this->Hummessenger_api_url = $Hummessenger_api_url;
    }

    /**
     * @return string|null
     */
    public function getHummessengerApiKey()
    {
        return $this->Hummessenger_api_key;
    }

    /**
     * @param string $Hummessenger_api_key
     */
    public function setHummessengerApiKey(string $Hummessenger_api_key): void
    {
        $this->Hummessenger_api_key = $Hummessenger_api_key;
    }
	
	/**
     * set webshop is catalog.
     *
     * @return settings
     */
	public function setIsCatalog(bool $isCatalog): self{
                                    		$this->is_catalog = $isCatalog;
                                    
                                            return $this;
                                    	}
	
	/**
     * Get webshop is catalog
     *
     * @return bool
     */
	public function getIsCatalog(): bool{
                                    		return (empty($this->is_catalog) ? false: $this->is_catalog);
                                    	}

    public function getOpenaiKey(): ?string
    {
        return $this->openai_key;
    }

    public function setOpenaiKey(?string $openai_key): self
    {
        $this->openai_key = $openai_key;

        return $this;
    }

    public function getOpenaiModel(): ?string
    {
        return $this->openai_model;
    }

    public function setOpenaiModel(?string $openai_model): self
    {
        $this->openai_model = $openai_model;

        return $this;
    }

    public function getOpenaiTemp(): ?float
    {
        return $this->openai_temp;
    }

    public function setOpenaiTemp(?float $openai_temp): self
    {
        $this->openai_temp = $openai_temp;

        return $this;
    }

    public function getOpenaiStartprompt(): ?string
    {
        return $this->openai_startprompt;
    }

    public function setOpenaiStartprompt(?string $openai_startprompt): self
    {
        $this->openai_startprompt = $openai_startprompt;

        return $this;
    }


}
