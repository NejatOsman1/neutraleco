<?php
namespace App\CmsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Scheb\TwoFactorBundle\Model\Totp\TotpConfiguration;
use Scheb\TwoFactorBundle\Model\Totp\TotpConfigurationInterface;
use Scheb\TwoFactorBundle\Model\Totp\TwoFactorInterface;
use Scheb\TwoFactorBundle\Model\BackupCodeInterface;

/**
 * @ORM\Entity(repositoryClass="App\CmsBundle\Repository\UserRepository")
 */
class User implements UserInterface, TwoFactorInterface, BackupCodeInterface
{


    const ALLOW_PAGE           = 1;
    const ALLOW_NAVIGATION     = 2;
    const ALLOW_MEDIA          = 4;
    const ALLOW_ANALYTICS      = 8;
    const ALLOW_USERS          = 16;
    const ALLOW_CONFIGURATION  = 32;
    const ALLOW_BUNDLES        = 64;
    const ALLOW_PROFILE        = 128;
    const ALLOW_REDIRECTS      = 256;
    const ALLOW_SITE_SWITCHING = 512;
    const ALLOW_DASHBOARD      = 1024;
    const ALLOW_WEBSHOP        = 2048;
    const ALLOW_EMAIL_TEMPLATES = 4096;
    
    const PERM_PATHS           = [
        'ALLOW_DASHBOARD'      => 'admin',
        'ALLOW_PAGE'           => 'admin_page',
        'ALLOW_NAVIGATION'     => 'admin_navigation',
        'ALLOW_MEDIA'          => 'admin_media',
        'ALLOW_ANALYTICS'      => 'admin_analytics',
        'ALLOW_USERS'          => 'admin_users',
        'ALLOW_CONFIGURATION'  => 'admin_settings',
        'ALLOW_BUNDLES'        => null,
        'ALLOW_PROFILE'        => 'admin_profile',
        'ALLOW_REDIRECTS'      => 'admin_redirects',
        'ALLOW_WEBSHOP'        => 'admin_mod_webshop',
        'ALLOW_SITE_SWITCHING' => null,
        'ALLOW_EMAIL_TEMPLATES' => 'admin_mod_email_templates',

        'ECOMM_DASHBOARD'      => 'admin_mod_webshop',
        'ECOMM_SALES'          => 'admin_mod_webshop_orders',
        'ECOMM_PRODUCTS'       => 'admin_mod_webshop_products',
        'ECOMM_PROMOTIONS'     => 'admin_mod_webshop_promotions',
        'ECOMM_CONFIG'         => 'admin_mod_webshop_config',
    ];
    
    const ECOMM_DASHBOARD      = 1;
    const ECOMM_SALES          = 2;
    const ECOMM_PRODUCTS       = 4;
    const ECOMM_CATEGORIES     = 8;
    const ECOMM_CUSTOMERS      = 16;
    const ECOMM_CARTS          = 32;
    const ECOMM_PROMOTIONS     = 64;
    const ECOMM_REVIEWS        = 128;
    const ECOMM_REPORTS        = 256;
    const ECOMM_CONFIG         = 512;
    const ECOMM_SYSTEM         = 1024;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $registration;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    protected $expire = false;


    /**
     * @var string
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $expire_date;


    /**
     * @var string
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $import_date;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    protected $expire_delete = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $lockin_uri = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $firstname = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $lastname = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $street = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $number = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $postalcode = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $city = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    protected $province = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    protected $country = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $phone = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    protected $mobile = '';

    /**
     * @var string
     *
     * @ORM\Column(name="dateofbirth", type="datetime", nullable=true)
     */
    protected $dateOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="bd_notify", type="datetime", nullable=true)
     */
    protected $birthdate_notify;

    /**
     * @var string
     *
     * @ORM\Column(name="nw_notify", type="datetime", nullable=true)
     */
    protected $new_user_notify;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20)
     */
    protected $gender = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=2)
     */
    protected $locale = 'nl';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    protected $admin_locale = null;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $is_company = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $company = '';

    /**
     * @var string
     *
     * @ORM\Column(name="company_email", type="string", length=50, nullable=true)
     */
    protected $companyEmail = '';

    /**
     * @var string
     *
     * @ORM\Column(name="company_phone", type="string", length=30, nullable=true)
     */
    protected $companyPhone = '';

    /**
     * @var string
     *
     * @ORM\Column(name="company_kvk", type="string", length=30, nullable=true)
     */
    protected $companyKvk = '';

    /**
     * @var string
     *
     * @ORM\Column(name="company_tax_no", type="string", length=30, nullable=true)
     */
    protected $companyTaxNo = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $website = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    protected $iban = '';

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=1)
     */
    protected $newsletter = 0;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="users")
     * @ORM\JoinTable(name="tags_users")
     */
    protected $tags;

    /**
     * @var string
     *
     * @ORM\Column(type="array", nullable=true)
     */
    protected $dashboard_blocks = '';

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $dark = false;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $moderation = false;

    /**
     * @ORM\ManyToOne(targetEntity="Language")
     * @ORM\JoinColumn(name="language_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $language;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=100)
     */
    protected $permissions = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=100)
     */
    protected $ecomm_permissions = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=1)
     */
    protected $login_attempts = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $login_last_attempt;

    /**
     * @ORM\OneToOne(targetEntity="Ipcheck")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $ip_check;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $ip;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $expire_password_enable;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $expire_password_date;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $expire_password_period;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $deny_user_name_change;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $deny_user_removal;

    /**
     * @ORM\ManyToOne(targetEntity="Settings", inversedBy="users")
     * @ORM\JoinColumn(name="settings_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $settings;

    /**
     * @ORM\ManyToMany(targetEntity="Settings", inversedBy="user_access")
     * @ORM\JoinTable(name="users_sites")
     */
    private $sites;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    protected $b2b = false;

    /**
     * @var string
     * 
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $username;

    /**
     * @var string
     * 
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $usernameCanonical;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @var string
     * 
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $emailCanonical;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    protected $enabled;

    /**
     * The salt to use for hashing.
     *
     * @var string
     * 
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $salt;

    /**
     * Plain password. Used for model validation. Must not be persisted.
     *
     * @var string
     * 
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $plainPassword;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $lastLogin;

    /**
     * Random string sent to the user email address in order to verify it.
     *
     * @var string|null
     * 
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $confirmationToken;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $passwordRequestedAt;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $roles = [];

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $import_id;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $number_add;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $deleted = false;

    /**
     * @var string
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $deleted_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $user_hash;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $user_hash_expire;

    /**
     * @ORM\Column(name="totpSecret", type="string", nullable=true)
     */
    private $totpSecret;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $totpEnabled = false;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $trustedVersion = 0;

    /**
     * @ORM\Column(type="json")
     */
    private $backupCodes = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $totp_init = false;

    public static function checkPassword($pwd) {
        $errors = [];

        if (strlen($pwd) < 8) {
            $errors[] = "Het wachtwoord is te kort (minimaal 8 tekens).";
        }

        if (!preg_match("#[0-9]+#", $pwd)) {
            $errors[] = "Het wachtwoord moet minimaal een cijfer bevatten.";
        }

        if (!preg_match("#[a-z]+#", $pwd)) {
            $errors[] = "Het wachtwoord moet minimaal een letter bevatten.";
        }

        if (!preg_match("#[A-Z]+#", $pwd)) {
            $errors[] = "Het wachtwoord moet minimaal een hoofdletter bevatten.";
        }

        if (!preg_match("#[.,\-=!@\#%]+#", $pwd)) {
            $errors[] = "Het wachtwoord moet minimaal één van de volgende tekens bevatten: . , \ - = ! @ # %";
        }

        return $errors;
    }

    public function __construct()
    {
        $this->roles = array('ROLE_USER');
        $this->tags = new ArrayCollection();
        $this->registration = new \DateTime();
        $this->sites = new ArrayCollection();
    }

    public function getId(){
        return (int)$this->id;
    }

    public function setUsername($value){
        $this->username = $value;
    }

    public function getLastLogin( $format = 'd-m-Y H:i:s' ){
        if($format == ''){
            if( !is_null( $this->lastLogin ) && $this->lastLogin instanceof \DateTime ){
                return $this->lastLogin;
            }
            return new \DateTime;
        }
        if( !is_null( $this->lastLogin ) && $this->lastLogin instanceof \DateTime ){
            return $this->lastLogin->format($format);
        }
        return '';
    }

    public function isEnabled(){
        if( (int)$this->enabled === 1 ) return true;
        return false;
    }

    public function setEnabled($value){
        $this->enabled = $value;
    }

    public function getEnabled(){
        return $this->enabled;
    }

    public function getFirstname(){
        return $this->firstname;
    }

    public function getLastname(){
        return $this->lastname;
    }

    public function getFullname(){
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getStreet(){
        return $this->street;
    }

    public function getNumber(){
        return $this->number;
    }

    public function getPostalcode(){
        return $this->postalcode;
    }

    public function getCity(){
        return $this->city;
    }

    public function getProvince(){
        return $this->province;
    }

    public function getCountry(){
        return $this->country;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getName(){
        return implode( ' ', array( $this->firstname, $this->lastname ));
    }

    /*public function getRolesAsString(){
        $roleTranslate = array(
            'ROLE_USER'        => 'Gebruiker',
            'ROLE_SUPER_ADMIN' => 'Beheerder',
        );
        $return = array();
        foreach($this->roles as $role){
            if( isset($roleTranslate[$role]) ){
                $return[] = $roleTranslate[$role];
            }else{
                $return[] = $role;
            }
        }

        if(empty($return)){
            // Always return 'regular' user if this is empty
            $return[] = $roleTranslate['ROLE_USER'];
        }

        return implode( ', ', $return );
    }*/

    public function setFirstname( $value ){
        $this->firstname = $value;
    }

    public function setLastname( $value ){
        $this->lastname = $value;
    }

    public function setStreet( $value ){
        $this->street = $value;
    }

    public function setNumber( $value ){
        $this->number = $value;
    }

    public function setPostalcode( $value ){
        $this->postalcode = $value;
    }

    public function setCity( $value ){
        $this->city = $value;
    }

    public function setProvince( $value ){
        $this->province = $value;
    }

    public function setCountry( $value ){
        $this->country = $value;
    }

    public function setPhone( $value ){
        $this->phone = $value;
    }

    public function setRole($role){
        $this->setRoles([$role]);
    }

    public function hasRole($role = null){
		if (empty($role)) {
			return false;
		}
        return in_array($role, $this->roles);
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

   /* public function getRoles( $seperator = null ){
        $roles = $this->roles;

        foreach ($this->getGroups() as $group) {
            $roles = array_merge($roles, $group->getRoles());
        }

        // we need to make sure to have at least one role
        $roles[] = static::ROLE_DEFAULT;

        if( is_null($seperator) ){
            return array_unique($roles);
        }
        return implode($seperator, $roles);
    }*/

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateEdit
     * @return User
     */
    public function setDateOfBirth( $dateOfBirth )
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Get dateOfBirth (formatted)
     *
     * @return \DateTime
     */
    public function getDateOfBirthFormat()
    {
        if(!empty($this->dateOfBirth)){
            return $this->dateOfBirth->format('Y-m-d');
        }

        return '';
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Auction
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set newsletter
     *
     * @param int $newsletter
     * @return Auction
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * Get newsletter
     *
     * @return int
     */
    public function getNewsletter()
    {
        return ($this->newsletter == 1);
    }

    /**
     * Echo the user fullname
     *
     * @return string
     */
    public function __toString(){
        return $this->getUsername();
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * Add tag
     *
     * @param \App\CmsBundle\Entity\Tag $tag
     *
     * @return User
     */
    public function addTag(\App\CmsBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \App\CmsBundle\Entity\Tag $tag
     */
    public function removeTag(\App\CmsBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set locale
     *
     * @param string $locale
     *
     * @return User
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
     * Set company
     *
     * @param string $company
     *
     * @return User
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
     * Set companyEmail
     *
     * @param string $companyEmail
     *
     * @return User
     */
    public function setCompanyEmail($companyEmail)
    {
        $this->companyEmail = $companyEmail;

        return $this;
    }

    /**
     * Get companyEmail
     *
     * @return string
     */
    public function getCompanyEmail()
    {
        return $this->companyEmail;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set companyKvk
     *
     * @param integer $companyKvk
     *
     * @return User
     */
    public function setCompanyKvk($companyKvk)
    {
        $this->companyKvk = $companyKvk;

        return $this;
    }

    /**
     * Get companyKvk
     *
     * @return integer
     */
    public function getCompanyKvk()
    {
        return $this->companyKvk;
    }

    /**
     * Set companyTaxNo
     *
     * @param integer $companyTaxNo
     *
     * @return User
     */
    public function setCompanyTaxNo($companyTaxNo)
    {
        $this->companyTaxNo = $companyTaxNo;

        return $this;
    }

    /**
     * Get companyTaxNo
     *
     * @return integer
     */
    public function getCompanyTaxNo()
    {
        return $this->companyTaxNo;
    }

    /**
     * Set website
     *
     * @param string $website
     *
     * @return User
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set companyPhone
     *
     * @param integer $companyPhone
     *
     * @return User
     */
    public function setCompanyPhone($companyPhone)
    {
        $this->companyPhone = $companyPhone;

        return $this;
    }

    /**
     * Get companyPhone
     *
     * @return integer
     */
    public function getCompanyPhone()
    {
        return $this->companyPhone;
    }

    /**
     * Set dashboardBlocks
     *
     * @param string $dashboardBlocks
     *
     * @return User
     */
    public function setDashboardBlocks($dashboardBlocks)
    {
        $this->dashboard_blocks = $dashboardBlocks;

        return $this;
    }

    /**
     * Get dashboardBlocks
     *
     * @return string
     */
    public function getDashboardBlocks()
    {
        return $this->dashboard_blocks;
    }

    /**
     * Set mobile.
     *
     * @param string|null $mobile
     *
     * @return User
     */
    public function setMobile($mobile = null)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile.
     *
     * @return string|null
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set dark.
     *
     * @param bool $dark
     *
     * @return User
     */
    public function setDark($dark)
    {
        $this->dark = $dark;

        return $this;
    }

    /**
     * Get dark.
     *
     * @return bool
     */
    public function getDark()
    {
        return $this->dark;
    }

    /*
     * Set language.
     *
     * @param \App\CmsBundle\Entity\Language|null $language
     *
     * @return User
     */
    public function setLanguage(\App\CmsBundle\Entity\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /*
     * Get language.
     *
     * @return \App\CmsBundle\Entity\Language|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set registration.
     *
     * @param \DateTime|null $registration
     *
     * @return User
     */
    public function setRegistration($registration = null)
    {
        $this->registration = $registration;

        return $this;
    }

    /**
     * Get registration.
     *
     * @return \DateTime|null
     */
    public function getRegistration()
    {
        return $this->registration;
    }

    /**
     * Set isCompany.
     *
     * @param bool $isCompany
     *
     * @return User
     */
    public function setIsCompany($isCompany)
    {
        $this->is_company = $isCompany;

        return $this;
    }

    /**
     * Get isCompany.
     *
     * @return bool
     */
    public function getIsCompany()
    {
        return $this->is_company;
    }

    /**
     * Set expire.
     *
     * @param bool $expire
     *
     * @return User
     */
    public function setExpire($expire)
    {
        $this->expire = $expire;

        return $this;
    }

    /**
     * Get expire.
     *
     * @return bool
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * Set expireDate.
     *
     * @param \DateTime|null $expireDate
     *
     * @return User
     */
    public function setExpireDate($expireDate = null)
    {
        $this->expire_date = $expireDate;

        return $this;
    }

    /**
     * Get expireDate.
     *
     * @return \DateTime|null
     */
    public function getExpireDate()
    {
        return $this->expire_date;
    }

    /**
     * Set expireDelete.
     *
     * @param bool $expireDelete
     *
     * @return User
     */
    public function setExpireDelete($expireDelete)
    {
        $this->expire_delete = $expireDelete;

        return $this;
    }

    /**
     * Get expireDelete.
     *
     * @return bool
     */
    public function getExpireDelete()
    {
        return $this->expire_delete;
    }

    /**
     * Set permissions.
     *
     * @param int $permissions
     *
     * @return User
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * Get permissions.
     *
     * @return int
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Set ecomm_permissions.
     *
     * @param int $ecomm_permissions
     *
     * @return User
     */
    public function setEcommPermissions($ecomm_permissions)
    {
        $this->ecomm_permissions = $ecomm_permissions;

        return $this;
    }

    /**
     * Get ecomm_permissions.
     *
     * @return int
     */
    public function getEcommPermissions()
    {
        return $this->ecomm_permissions;
    }

    /**
     * Check permission.
     *
     * @return boolean
     */
    public function listPermissions()
    {

        $data = [];
        $oClass = new \ReflectionClass(__CLASS__);
        $consts = $oClass->getConstants();

        
        foreach($consts as $perm => $value){
            if(substr($perm, 0, 6) == 'ECOMM_'){
                if(((int)$this->ecomm_permissions & $value) > 0){
                    $data[$perm] = (!empty(self::PERM_PATHS[$perm]) ? self::PERM_PATHS[$perm] : null);
                }
            }
        }
        
        if($this->lockin_uri != '/admin/webshop'){
            foreach($consts as $perm => $value){
                if(substr($perm, 0, 6) == 'ALLOW_'){
                    if(((int)$this->permissions & $value) > 0){
                        $data[$perm] = (!empty(self::PERM_PATHS[$perm]) ? self::PERM_PATHS[$perm] : null);
                    }
                }
            }
        }

        /*if(empty($data)){
            foreach($consts as $perm => $value){
                if(substr($perm, 0, 6) == 'ECOMM_'){
                    if(((int)$this->ecomm_permissions & $value) > 0){
                        $data[$perm] = (!empty(self::PERM_PATHS[$perm]) ? self::PERM_PATHS[$perm] : null);
                    }
                }
            }
        }*/
        return $data;
    }

    /**
     * Check permission.
     *
     * @return boolean
     */
    public function checkPermissions($key)
    {

        $webshop = false; if(strpos($key, 'ECOMM_') !== false){ $webshop = true; }

        $checkPermissions = ((int)$this->permissions > 0);
        if($webshop){
            $checkPermissions = ((int)$this->ecomm_permissions > 0);
        }

        if($checkPermissions){
            if(is_array($key)){
                foreach($key as $k){
                    if($webshop){
                        if(((int)$this->ecomm_permissions & constant('self::' . $key)) <= 0){
                            return false;
                        }
                    }else{
                        if(((int)$this->permissions & constant('self::' . $key)) <= 0){
                            return false;
                        }
                    }
                }
            }else{
                // Only validate if permissions are configured. (For the sake of consistancy)
                if($webshop){
                    return ((int)$this->ecomm_permissions & constant('self::' . $key)) > 0;
                }else{
                    return ((int)$this->permissions & constant('self::' . $key)) > 0;
                }
            }
        }

        return true;
    }

    /**
     * Set moderation.
     *
     * @param bool $moderation
     *
     * @return User
     */
    public function setModeration($moderation)
    {
        $this->moderation = $moderation;

        return $this;
    }

    /**
     * Get moderation.
     *
     * @return bool
     */
    public function getModeration()
    {
        return $this->moderation;
    }

    /**
     * Set loginAttempts.
     *
     * @param int $loginAttempts
     *
     * @return User
     */
    public function setLoginAttempts($loginAttempts)
    {
        $this->login_attempts = $loginAttempts;

        return $this;
    }

    /**
     * Get loginAttempts.
     *
     * @return int
     */
    public function getLoginAttempts()
    {
        return $this->login_attempts;
    }

    /**
     * Set loginLastAttempt.
     *
     * @param \DateTime|null $loginLastAttempt
     *
     * @return User
     */
    public function setLoginLastAttempt($loginLastAttempt = null)
    {
        $this->login_last_attempt = $loginLastAttempt;

        return $this;
    }

    /**
     * Get loginLastAttempt.
     *
     * @return \DateTime|null
     */
    public function getLoginLastAttempt()
    {
        return $this->login_last_attempt;
    }

    /**
     * Set ipCheck.
     *
     * @param \App\CmsBundle\Entity\Ipcheck|null $ipCheck
     *
     * @return User
     */
    public function setIpCheck(\App\CmsBundle\Entity\Ipcheck $ipCheck = null)
    {
        $this->ip_check = $ipCheck;

        return $this;
    }

    /**
     * Get ipCheck.
     *
     * @return \App\CmsBundle\Entity\Ipcheck|null
     */
    public function getIpCheck()
    {
        return $this->ip_check;
    }

    /**
     * Set expirePasswordEnable.
     *
     * @param bool $expirePasswordEnable
     *
     * @return User
     */
    public function setExpirePasswordEnable($expirePasswordEnable)
    {
        $this->expire_password_enable = $expirePasswordEnable;

        return $this;
    }

    /**
     * Get expirePasswordEnable.
     *
     * @return bool
     */
    public function getExpirePasswordEnable()
    {
        return $this->expire_password_enable;
    }

    /**
     * Set expirePasswordDate.
     *
     * @param \DateTime|null $expirePasswordDate
     *
     * @return User
     */
    public function setExpirePasswordDate($expirePasswordDate = null)
    {
        $this->expire_password_date = $expirePasswordDate;

        return $this;
    }

    /**
     * Get expirePasswordDate.
     *
     * @return \DateTime|null
     */
    public function getExpirePasswordDate()
    {
        return $this->expire_password_date;
    }

    /**
     * Set expirePasswordPeriod.
     *
     * @param int $expirePasswordPeriod
     *
     * @return User
     */
    public function setExpirePasswordPeriod($expirePasswordPeriod)
    {
        $this->expire_password_period = $expirePasswordPeriod;

        return $this;
    }

    /**
     * Get expirePasswordPeriod.
     *
     * @return int
     */
    public function getExpirePasswordPeriod()
    {
        return $this->expire_password_period;
    }

    /**
     * Return if password is expired or not
     *
     * @return boolean
     */
    public function isPasswordExpired()
    {
        $date = new \Datetime();
        return ($this->getExpirePasswordEnable() ? ($this->getExpirePasswordDate()->format('Ymd') <= $date->format('Ymd') ? true : false) : false);
    }

    /**
     * Set denyUserNameChange.
     *
     * @param bool $denyUserNameChange
     *
     * @return User
     */
    public function setDenyUserNameChange($denyUserNameChange)
    {
        $this->deny_user_name_change = $denyUserNameChange;

        return $this;
    }

    /**
     * Get denyUserNameChange.
     *
     * @return bool
     */
    public function getDenyUserNameChange()
    {
        return $this->deny_user_name_change;
    }

    /**
     * Set denyUserRemoval.
     *
     * @param bool $denyUserRemoval
     *
     * @return User
     */
    public function setDenyUserRemoval($denyUserRemoval)
    {
        $this->deny_user_removal = $denyUserRemoval;

        return $this;
    }

    /**
     * Get denyUserRemoval.
     *
     * @return bool
     */
    public function getDenyUserRemoval()
    {
        return $this->deny_user_removal;
    }

    /**
     * Set iban.
     *
     * @param string|null $iban
     *
     * @return User
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
     * Set settings.
     *
     * @param \App\CmsBundle\Entity\Settings|null $settings
     *
     * @return User
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
     * Set adminLocale.
     *
     * @param string $adminLocale
     *
     * @return User
     */
    public function setAdminLocale($adminLocale)
    {
        $this->admin_locale = $adminLocale;

        return $this;
    }

    /**
     * Get adminLocale.
     *
     * @return string
     */
    public function getAdminLocale()
    {
        return $this->admin_locale;
    }

    /**
     * Set lockinUri.
     *
     * @param string $lockinUri
     *
     * @return User
     */
    public function setLockinUri($lockinUri)
    {
        $this->lockin_uri = $lockinUri;

        return $this;
    }

    /**
     * Get lockinUri.
     *
     * @return string
     */
    public function getLockinUri()
    {
        return $this->lockin_uri;
    }

    /**
     * Set b2b.
     *
     * @param bool $b2b
     *
     * @return User
     */
    public function setB2b($b2b)
    {
        $this->b2b = $b2b;

        return $this;
    }

    /**
     * Get b2b.
     *
     * @return bool
     */
    public function getB2b()
    {
        return $this->b2b;
    }

    /**
     * Add site.
     *
     * @param \App\CmsBundle\Entity\Settings $site
     *
     * @return User
     */
    public function addSite(\App\CmsBundle\Entity\Settings $site)
    {
        $this->sites[] = $site;

        return $this;
    }

    /**
     * Remove site.
     *
     * @param \App\CmsBundle\Entity\Settings $site
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSite(\App\CmsBundle\Entity\Settings $site)
    {
        return $this->sites->removeElement($site);
    }

    /**
     * Get sites.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSites()
    {
        return $this->sites;
    }

    /**
     * Get languages (based on sites).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLanguages()
    {
        $return = [];
        if(!empty($this->sites)){
            foreach($this->sites as $Settings){
                $Language = $Settings->getLanguage();
                if(!empty($Language)){
                    $return[$Language->getId()] = $Language;
                }
            }
        }
        return $return;
    }

    /**
     * Set ip.
     *
     * @param string|null $ip
     *
     * @return User
     */
    public function setIp($ip = null)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip.
     *
     * @return string|null
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set importDate.
     *
     * @param \DateTime|null $importDate
     *
     * @return User
     */
    public function setImportDate($importDate = null)
    {
        $this->import_date = $importDate;

        return $this;
    }

    /**
     * Get importDate.
     *
     * @return \DateTime|null
     */
    public function getImportDate()
    {
        return $this->import_date;
    }

    public function getUsernameCanonical(): ?string
    {
        return $this->usernameCanonical;
    }

    public function setUsernameCanonical(?string $usernameCanonical): self
    {
        $this->usernameCanonical = $usernameCanonical;

        return $this;
    }

    public function getEmailCanonical(): ?string
    {
        return $this->emailCanonical;
    }

    public function setEmailCanonical(?string $emailCanonical): self
    {
        $this->emailCanonical = $emailCanonical;

        return $this;
    }

    public function setSalt(?string $salt): self
    {
        $this->salt = $salt;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    public function setLastLogin(?\DateTimeInterface $lastLogin): self
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    public function getConfirmationToken(): ?string
    {
        return $this->confirmationToken;
    }

    public function setConfirmationToken(?string $confirmationToken): self
    {
        $this->confirmationToken = $confirmationToken;

        return $this;
    }

    public function getPasswordRequestedAt(): ?\DateTimeInterface
    {
        return $this->passwordRequestedAt;
    }

    public function setPasswordRequestedAt(?\DateTimeInterface $passwordRequestedAt): self
    {
        $this->passwordRequestedAt = $passwordRequestedAt;

        return $this;
    }

    /**
     * Set birthdateNotify.
     *
     * @param \DateTime|null $birthdateNotify
     *
     * @return User
     */
    public function setBirthdateNotify($birthdateNotify = null)
    {
        $this->birthdate_notify = $birthdateNotify;

        return $this;
    }

    /**
     * Get birthdateNotify.
     *
     * @return \DateTime|null
     */
    public function getBirthdateNotify()
    {
        return $this->birthdate_notify;
    }

    /**
     * Set newUserNotify.
     *
     * @param \DateTime|null $newUserNotify
     *
     * @return User
     */
    public function setNewUserNotify($newUserNotify = null)
    {
        $this->new_user_notify = $newUserNotify;

        return $this;
    }

    /**
     * Get newUserNotify.
     *
     * @return \DateTime|null
     */
    public function getNewUserNotify()
    {
        return $this->new_user_notify;
    }

    public function getImportId(): ?int
    {
        return $this->import_id;
    }

    public function setImportId(?int $import_id): self
    {
        $this->import_id = $import_id;

        return $this;
    }

    public function getNumberAdd()
    {
        return $this->number_add;
    }

    public function setNumberAdd($number_add)
    {
        $this->number_add = $number_add;

        return $this;
    }

    /**
     * Set deleted.
     *
     * @param bool $deleted
     *
     * @return User
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted.
     *
     * @return bool
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set deleted_date
     *
     * @param \DateTime $deleted_date
     * @return User
     */
    public function setDeletedDate( $deleted_date )
    {
        $this->deleted_date = $deleted_date;

        return $this;
    }

    /**
     * Get deleted_date
     *
     * @return \DateTime
     */
    public function getDeletedDate()
    {
        return $this->deleted_date;
    }

    public function getUserHash(): ?string
    {
        return $this->user_hash;
    }

    public function setUserHash(?string $user_hash): self
    {
        $this->user_hash = $user_hash;

        return $this;
    }

    public function getUserHashExpire(): ?\DateTimeInterface
    {
        return $this->user_hash_expire;
    }

    public function setUserHashExpire(?\DateTimeInterface $user_hash_expire): self
    {
        $this->user_hash_expire = $user_hash_expire;

        return $this;
    }

    public function getTotpSecret(): ?string
    {
        return $this->totpSecret;
    }

    public function setTotpSecret(string $totpSecret): self
    {
        $this->totpSecret = $totpSecret;

        return $this;
    }

    public function isTotpAuthenticationEnabled(): bool
    {
        return ($this->isTotpEnabled() === true && !empty($this->totpSecret));
    }

    public function getTotpAuthenticationUsername(): string
    {
        return $this->username;
    }

    public function getTotpAuthenticationConfiguration(): TotpConfigurationInterface
    {
        // You could persist the other configuration options in the user entity to make it individual per user.
        return new TotpConfiguration($this->totpSecret, TotpConfiguration::ALGORITHM_SHA1, 30, 6);
    }

    public function isTotpEnabled(): ?bool
    {
        return $this->totpEnabled;
    }

    public function setTotpEnabled(?bool $totpEnabled): self
    {
        $this->totpEnabled = $totpEnabled;

        return $this;
    }

    public function getTrustedTokenVersion(): int
    {
        return $this->trustedVersion;
    }

    public function setTrustedTokenVersion(int $trustedVersion): self
    {
        $this->trustedVersion = $trustedVersion;

        return $this;
    }

    /**
     * Check if it is a valid backup code.
     *
     * @param string $code
     *
     * @return bool
     */
    public function isBackupCode(string $code): bool
    {
        return in_array($code, ($this->backupCodes ?? []));
    }

    /**
     * Invalidate a backup code
     *
     * @param string $code
     */
    public function invalidateBackupCode(string $code): void
    {
        $key = array_search($code, $this->backupCodes);
        if ($key !== false){
            unset($this->backupCodes[$key]);
        }
    }

    /**
     * Add a backup code
     *
     * @param string $backUpCode
     */
    public function addBackUpCode(string $backUpCode): void
    {
        if (!in_array($backUpCode, $this->backupCodes)) {
            $this->backupCodes[] = $backUpCode;
        }
    }

    /**
     * Set an array of backup codes
     *
     * @param array $backUpCodes
     */
    public function setBackUpCodes(array $backupCodes): void
    {
        $this->backupCodes = $backupCodes;
    }

    /**
     * Generate random list of backup codes
     *
     * @param int $amount
     */
    public function generateBackUpCodes(int $amount = 10): void
    {
        $hashes = [];
        for($i = 0; $i < $amount; $i++){
            $hash = strtoupper(substr(md5(rand(10000000,99999999) . md5(time()) . md5($this->getId()) . rand(10000000,99999999)), 0, 12));
            $hashes[] = $hash;
        }

        $this->backupCodes = $hashes;
    }

    /**
     * Get current backup codes
     */
    public function getBackUpCodes(): array
    {
        return $this->backupCodes;
    }

    public function getTotpInit(): ?bool
    {
        return $this->totp_init;
    }

    public function setTotpInit(bool $totp_init): self
    {
        $this->totp_init = $totp_init;

        return $this;
    }
}
