<?php

namespace App\CmsBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

/**
 * Media
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\CmsBundle\Repository\MediaRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Media
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(type="integer", length=20, nullable=true)
     */
    private $old_id;

    /**
     * @ORM\Column(type="string", length=200)
     * @Assert\NotBlank
     */
    public $label;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    public $label_alt;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    public $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    public $description_alt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;

    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="integer", nullable=true)
     */
    public $size;

    /**
     * @var integer
     *
     * @ORM\Column(name="width", type="integer", nullable=true)
     */
    public $width;

    /**
     * @var integer
     *
     * @ORM\Column(name="height", type="integer", nullable=true)
     */
    public $height;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=true)
     */
    public $type;

    /**
     * @var string
     *
     * @ORM\Column(name="mime", type="string", length=40, nullable=true)
     */
    public $mime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $remote_url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $original_path;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    public $original_size;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    public $original_width;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    public $original_height;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    public $original_mime;

    /**
     * @var string
     *
     * @ORM\Column(name="deleted", type="boolean")
     */
    public $deleted = false;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_add", type="datetime", nullable=true)
     */
    public $dateAdd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_edit", type="datetime", nullable=true)
     */
    public $dateEdit;

    public $temp;

    /**
     * @ORM\ManyToOne(targetEntity="Mediadir", inversedBy="media")
     * @ORM\JoinColumn(name="parentid", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $parent;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="media")
     * @ORM\JoinTable(name="tags_media")
     */
    protected $tags;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $used = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $secure = false;

    /**
     * @var array
     *
     * @ORM\Column(type="array", nullable=true)
     */
    private $used_in = [];

    /**
     * @var string
     */
    public $webpath;

    /**
     * @var string
     */
    public $filepath;

    /**
     * @ORM\OneToMany(targetEntity="PageBlock", mappedBy="media")
     */
    protected $block;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    public $position;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $crop_source;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $crop_box;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    public $crop_ratio;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    public $crop_flip_x;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    public $crop_flip_y;

    public function __construct(){
        $this->tags = new ArrayCollection();

        $this->webpath = $this->getWebPath();
        $this->block = new ArrayCollection();
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
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;

        // Set file metadata
        $this->setSize($file->getSize());
        $this->setMime($file->getMimeType());

        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    private $replaceFile = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $generate_webp;

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload($keepFilename = false)
    {
        $this->replaceFile = $keepFilename;
        if (null !== $this->getFile()) {
            if($keepFilename && !empty($this->temp)){
                $filename = preg_replace('/^[0-9]+\//', '', $this->temp);
            }else{
                $filename = rand(1000,9999) . '_' . $this->doSluggify($this->label);
            }

            $filename = preg_replace('/^(.*?)-(\w{3,4})$/', '$1.$2', $filename);

            $this->path = $filename;
        }
    }

    private function doSluggify($str, $replace=array(), $delimiter='-')
    {
        if( !empty($replace) ) {
            $str = str_replace((array)$replace, ' ', $str);
        }

        $slugify = new \Cocur\Slugify\Slugify();

        return $slugify->slugify($str, $delimiter);
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload($Settings = null)
    {
        if (null === $this->getFile()) {
            return;
        }

        $dateFolderShort = date('Ymd');
        $dateFolder = '/' . date('Ymd');
        if($this->replaceFile){
            $dateFolderShort = preg_replace('/^([0-9]+)\/.*?$/', '$1', $this->temp);
            $dateFolder = '/' . preg_replace('/^([0-9]+)\/.*?$/', '$1', $this->temp);
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir() . $dateFolder, $this->path);

        $this->path = $dateFolderShort . '/' . $this->path;

        // check if we have an old image
        $previousFile = null;
        if (isset($this->temp)) {
            $previousFile = $this->temp;
            if(!$this->replaceFile){
                // delete the old image
                if(file_exists($this->getUploadRootDir() . $dateFolder.'/'.$this->temp)){
                    unlink($this->getUploadRootDir() . $dateFolder.'/'.$this->temp);
                }else{
                    if(file_exists($this->getUploadRootDir() . '/' . $this->temp)){
                        unlink($this->getUploadRootDir() . '/' . $this->temp);
                    }
                }
            }
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;

        if($this->type == 'images' && !str_contains($this->mime, 'image/svg')){
            // Resize
            if($Settings){
                $dimensions = $Settings->getMediaDimensions();
            }else{
                // Global, off-settings
                $dimensions = [
                    'full' => '1920',
                    'large' => '900',
                    'medium' => '600',
                    'small' => '350',
                    'thumb' => '150',
                ];
            }
            foreach($dimensions as $key => $maxWidth){
				$this->resize($key, $maxWidth, $previousFile);
            }

            // Create WebP image (disabled for now)
            // $this->createWebP($Settings, $previousFile);
			// $this->createLowRes($Settings, $previousFile);
        }
    }

    /**
     * Create WebP image from original file
     */
    public function createWebP($Settings, $previousFile, $createNew = false){
        $dateFolder = '/' . date('Ymd');
        $isLegacy = false;
        if($previousFile && ($this->replaceFile || $createNew)){
            if(preg_match('/^([0-9]+)\/.*?$/', $previousFile) >= 1){
                $dateFolder = '/' . preg_replace('/^([0-9]+)\/.*?$/', '$1', $previousFile);
            } else {
                //This is for legacy media files with a hash in the filename.
                $isLegacy = true;
                $dateFolder = '';
            }
        }

		if ($this->type != 'images') {
			return false;
		}

        $source = $this->getAbsolutePath();
        
        if(!file_exists($this->getUploadRootDir() . '/webp')){
            mkdir($this->getUploadRootDir() . '/webp');
        }
        if(!file_exists($this->getUploadRootDir() . '/webp' . $dateFolder)){
            mkdir($this->getUploadRootDir() . '/webp' . $dateFolder);
        }
        $destination = $this->getUploadRootDir() . '/webp' . $dateFolder . '/' . preg_replace('/^.*?\//', '', $this->getPath());
        $destination = preg_replace('/\.[a-z]+$/', '.webp', $destination); // .xxx to .webp

        switch ($this->mime) {
            case 'image/jpeg':
                if (!$image = @imagecreatefromjpeg($source)){
                    return false;
                }
                $quality = 50;
                break;
            case 'image/png':
                if (!$image = @imagecreatefrompng($source)){
                    return false;
                }
                $quality = 4;
                break;
            case 'image/webp':
                // COPY MANUALLY, WEBP CANNOT BE CONVERTED TO SELF
                copy($source, $destination);
                return false;
                break;
            default:
                return false;
                break;
        }

        if(!file_exists($this->getUploadRootDir() . '/webp')){
            mkdir($this->getUploadRootDir() . '/webp');
        }
        if(!file_exists($this->getUploadRootDir() . '/webp' . $dateFolder)){
            mkdir($this->getUploadRootDir() . '/webp' . $dateFolder);
        }
        $destination = $this->getUploadRootDir() . '/webp' . $dateFolder . '/' . preg_replace('/^.*?\//', '', $this->getPath());
        $destination = preg_replace('/\.[a-z]+$/', '.webp', $destination); // .xxx to .webp

        if ($isLegacy && is_dir($destination)) {
            foreach (new \DirectoryIterator($destination) as $fileInfo) {
                if(!$fileInfo->isDot()) {
                    unlink($fileInfo->getPathname());
                }
            }

            rmdir($destination);
        }

        imagepalettetotruecolor($image);
        imagealphablending($image, true);
        imagesavealpha($image, true);
        imagewebp($image, $destination, 50);
        imagedestroy($image);

		if ($Settings) {
			$dimensions = $Settings->getMediaDimensions();
		} else {
			// Global, off-settings
			$dimensions = [
				'full' => '1920',
				'large' => '900',
				'medium' => '600',
				'small' => '350',
				'thumb' => '150',
			];
		}

		foreach($dimensions as $key => $maxWidth){
			$this->resizeWebp($key, $maxWidth, $previousFile);
		}

        return true;
    }

    /**
     * Create WebP image from original file
     */
    public function createRemoteWebP($Settings, $previousFile, $createNew = false){
        if($this->secure){
            $mediaDir =  __DIR__.'/../../../media';    
        } else {
            $mediaDir =  __DIR__.'/../../../web/media';
        }

        $source = $mediaDir . (str_replace('media', '', $this->getRemoteUrl()));

        $sz = getimagesize($source);
        $this->setMime($sz['mime']);

        switch ($this->mime) {
            case 'image/jpeg':
                if (!$image = @imagecreatefromjpeg($source)){
                    return false;
                }
                $quality = 50;
                break;
            case 'image/png':
                if (!$image = @imagecreatefrompng($source)){
                    return false;
                }
                $quality = 4;
                break;
            case 'image/webp':
                // COPY MANUALLY, WEBP CANNOT BE CONVERTED TO SELF
                copy($source, $destination);
                return false;
                break;
            default:
                return false;
                break;
        }

        if(!file_exists($mediaDir . '_webp')){
            mkdir($mediaDir . '_webp');
        }
        $destination = $mediaDir. '_webp' . '/' . preg_replace('/^.*?\//', '', (str_replace('media', '', $this->getRemoteUrl())));
        $destination = preg_replace('/\.[a-z]+$/', '.webp', $destination); // .xxx to .webp

        imagepalettetotruecolor($image);
        imagealphablending($image, true);
        imagesavealpha($image, true);
        imagewebp($image, $destination, 50);
        imagedestroy($image);

        return true;
    }

	/**
	 * Generate a low quality and blurred image for preloading
	 *
	 * @param type $previousFile
	 * @param type $createNew
	 * @return boolean
	 */
	public function createLowRes($Settings, $previousFile, $createNew = false, $includeWebp = false) : bool
    {
        $dateFolder = '/' . date('Ymd');
        $isLegacy = false;
        if($previousFile && ($this->replaceFile || $createNew)){
            if(preg_match('/^([0-9]+)\/.*?$/', $previousFile) >= 1){
                $dateFolder = '/' . preg_replace('/^([0-9]+)\/.*?$/', '$1', $previousFile);
            } else {
                //This is for legacy media files with a hash in the filename.
                $isLegacy = true;
                $dateFolder = '';
            }
        }

        if ($this->type != 'images') {
            return false;
        }

        $source = $this->getAbsolutePath();

        switch ($this->mime) {
            case 'image/jpeg':
                if (!$image = @imagecreatefromjpeg($source)){ return false; } $quality = 50; break;
            case 'image/png':
                if (!$image = @imagecreatefrompng($source)){ return false; } $quality = 6; break;
            case 'image/webp':
                if (!$image = @imagecreatefromwebp($source)) { return false; } $quality = 10; break;
            default:
                return false; break;
        }






        // normal jpeg/png
        if(!file_exists($this->getUploadRootDir() . '/lowres')){
            mkdir($this->getUploadRootDir() . '/lowres');
        }
        if(!file_exists($this->getUploadRootDir() . '/lowres' . $dateFolder)){
            mkdir($this->getUploadRootDir() . '/lowres' . $dateFolder);
        }
        $destination_normal = $this->getUploadRootDir() . '/lowres' . $dateFolder . '/' . preg_replace('/^.*?\//', '', $this->getPath());

        if ($isLegacy && is_dir($destination_normal)) {
            foreach (new \DirectoryIterator($destination_normal) as $fileInfo) {
                if(!$fileInfo->isDot()) {
                    unlink($fileInfo->getPathname());
                }
            }
            rmdir($destination_normal);
        }






        // normal webp
        if($includeWebp){
            if(!file_exists($this->getUploadRootDir() . '/webp')){
                mkdir($this->getUploadRootDir() . '/webp');
            }
            if(!file_exists($this->getUploadRootDir() . '/webp/lowres')){
                mkdir($this->getUploadRootDir() . '/webp/lowres');
            }
            if(!file_exists($this->getUploadRootDir() . '/webp/lowres' . $dateFolder)){
                mkdir($this->getUploadRootDir() . '/webp/lowres' . $dateFolder);
            }

            $destination_webp = $this->getUploadRootDir() . '/webp/lowres' . $dateFolder . '/' . preg_replace('/^.*?\//', '', $this->getPath());
            $destination_webp = preg_replace('/\.[a-z]+$/', '.webp', $destination_webp);

            if ($isLegacy && is_dir($destination_webp)) {
                foreach (new \DirectoryIterator($destination_webp) as $fileInfo) {
                    if(!$fileInfo->isDot()) {
                        unlink($fileInfo->getPathname());
                    }
                }
                rmdir($destination_webp);
            }
        }






        list($width, $height) = getimagesize($source);

        $newImage = imagecreatetruecolor($width, $height);

        imagealphablending($newImage, false);
        imagesavealpha($newImage, true);
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $width, $height, $width, $height);

        $gaussian = [[1.0, 2.0, 1.0], [2.0, 4.0, 2.0], [1.0, 2.0, 1.0]];
        //$gaussian = [[2.0, 3.0, 2.0], [3.0, 6.0, 3.0], [2.0, 3.0, 2.0]];

        $blurs = 10;
        for ($i = 0; $i < $blurs; $i++) {
            imageconvolution($newImage, $gaussian, 16, 0);
        }

        switch ($this->mime) {
            case 'image/jpeg': imagejpeg($newImage, $destination_normal, $quality); break;
            case 'image/png': imagepng($newImage, $destination_normal, $quality); break;
            default: break;
            break;
        }

        // webp
        if($includeWebp){
            imagepalettetotruecolor($newImage);
            imagewebp($newImage, $destination_webp, $quality);
        }

        // Free up the memory.
        imagedestroy($image);
        imagedestroy($newImage);

        if ($Settings) {
            $dimensions = $Settings->getMediaDimensions();
        } else {
            // Global, off-settings
            $dimensions = [ 'full' => '1920', 'large' => '900', 'medium' => '600', 'small' => '350', 'thumb' => '150', ];
        }

        foreach($dimensions as $key => $maxWidth){
            $this->resizeLowres($key, $maxWidth, $destination_normal);
        }

        if($includeWebp){
            foreach($dimensions as $key => $maxWidth){
                // $destination_normal is correct, all the code assumes the mime of the original image.
                $this->resizeLowresWebp($key, $maxWidth, $destination_normal);
            }
        }

        return true;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        /*$file = $this->getAbsolutePath();

        $logFile = str_replace('src/CmsBundle/Entity/Media.php', 'var/logs/delete.log', __FILE__);
        if(!file_exists($logFile)){ file_put_contents($logFile, ''); }
        file_put_contents($logFile, '[AUTO | ' . date('Y-m-d H:i:s') . '] Removed file, media ID #' . $this->getId() . ', file: ' . $file . "\n", FILE_APPEND);
        file_put_contents($logFile, '[AUTO | ' . date('Y-m-d H:i:s') . '] TRACE:' . "\n" . $this->generateCallTrace() . "\n\n", FILE_APPEND);*/
    }

    /*function generateCallTrace()
    {
        $e = new \Exception();
        $trace = explode("\n", $e->getTraceAsString());
        // reverse array to make steps line up chronologically
        $trace = array_reverse($trace);
        array_shift($trace); // remove {main}
        array_pop($trace); // remove call to this method
        $length = count($trace);
        $result = array();

        for ($i = 0; $i < $length; $i++)
        {
            $result[] = ($i + 1)  . ')' . substr($trace[$i], strpos($trace[$i], ' ')); // replace '#someNum' with '$i)', set the right ordering
        }

        return "\t" . implode("\n\t", $result);
    }*/

    public function removePhysicalFiles(){
        $file = $this->getAbsolutePath();

        /*$logFile = str_replace('src/CmsBundle/Entity/Media.php', 'var/logs/delete.log', __FILE__);
        if(!file_exists($logFile)){ file_put_contents($logFile, ''); }
        file_put_contents($logFile, '[MANUAL | ' . date('Y-m-d H:i:s') . '] Removed file, media ID #' . $this->getId() . ', file: ' . $file . "\n", FILE_APPEND);
        file_put_contents($logFile, '[MANUAL | ' . date('Y-m-d H:i:s') . '] TRACE:' . "\n" . $this->generateCallTrace() . "\n\n", FILE_APPEND);*/

        if ($file && file_exists($file)) {
            @unlink($file);
        }

        $webp_file = str_replace(['jpg', 'jpeg', 'png', 'gif', 'bmp'], 'webp', str_replace('images/', 'images/webp/', $file));
        if ($file && file_exists($webp_file)) {
            @unlink($webp_file);
        }

		// FIXME dimensions zijn aanpasbaar, dus dit moet nog dynamisch gefixed worden....
		$dimensions = ['small', 'medium', 'large', 'thumb', 'full'];
		$types = ['', 'lowres/', 'webp/', 'webp/lowres/'];

		foreach($types as $type)
		{
			foreach ($dimensions as $dim)
			{
				$newfile = str_replace('/images', '/images/' . $type . $dim, $file);

                if ($newfile && file_exists($newfile)) {
					@unlink($newfile);
				}

                $webp_newfile = str_replace(['jpg', 'jpeg', 'png', 'gif', 'bmp'], 'webp', $newfile);
                if ($webp_newfile && file_exists($webp_newfile)) {
					@unlink($webp_newfile);
				}
			}
		}
    }

    public function getAbsolutePath($scale = '')
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir() . (!empty($scale) ? '/' . $scale : '').'/'.$this->path;
    }

    public function getWebPath($scale = '')
    {
		if (str_contains($this->mime, 'image/svg')) {
			$scale = '';
		}

        if(!empty($this->remote_url)){
            return $this->remote_url;
        } else {
            if(null === $this->path){
                return null;
            }else{
                $fullPath  = $this->getUploadDir() . (!empty($scale) && $this->type == 'images' ? '/' . $scale : '') .'/'.$this->path;
                $fullPathReal  = $this->getUploadRootDir() . (!empty($scale) && $this->type == 'images' ? '/' . $scale : '') .'/'.$this->path;
                if($scale == 'full'){
                    if(!file_exists($fullPathReal)){
                        $scale = ''; // Fallback when full doesn't exist
                        $fullPath  = $this->getUploadDir() . (!empty($scale) && $this->type == 'images' ? '/' . $scale : '') .'/'.$this->path;
                    }
                }
                return $fullPath;
            }
        }
    }

    public function getUploadTempDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        if($this->secure){
            return __DIR__.'/../../../'.$this->getUploadDir(true);    
        }
        return __DIR__.'/../../../public/'.$this->getUploadDir(true);
    }

    public function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        if($this->secure){
            return __DIR__.'/../../../'.$this->getUploadDir();    
        }
        return __DIR__.'/../../../public/'.$this->getUploadDir();
    }

    public function getUploadDir($temp = false)
    {
        $mimeToFolder = array(
            // Images
            'image/bmp'                              => 'images',
            'image/gif'                              => 'images',
            'image/jpeg'                             => 'images',
            'image/png'                              => 'images',
            'image/svg+xml'                          => 'images',
            'image/tiff'                             => 'images',

            // Documents
            'text/plain'                             => 'documents',
            'text/richtext'                          => 'documents',
            'application/msword'                     => 'documents',
            'application/excel'                      => 'documents',
            'application/vnd.ms-excel'               => 'documents',
            'application/x-excel'                    => 'documents',
            'application/x-msexcel'                  => 'documents',
            'application/pdf'                        => 'documents',
            'application/mspowerpoint'               => 'documents',
            'application/powerpoint'                 => 'documents',
            'application/vnd.ms-powerpoint'          => 'documents',
            'application/x-mspowerpoint'             => 'documents',
            'application/x-iwork-keynote-sffkey'     => 'documents',
            'application/x-iwork-numbers-sffnumbers' => 'documents',
            'application/vnd.apple.keynote'          => 'documents',
            'application/vnd.apple.pages'            => 'documents',
            'application/vnd.apple.numbers'          => 'documents',
            'application/csv'                        => 'documents',
            'text/csv'                               => 'documents',

            // Source code
            'application/x-rar-compressed'           => 'archive',
            'application/octet-stream'               => 'archive',
            'application/zip'                        => 'archive',

            // Source code
            'text/html'                              => 'sourcecode',
            'text/css'                               => 'sourcecode',
            'text/php'                               => 'sourcecode',
            'text/asp'                               => 'sourcecode',
            'text/x-c'                               => 'sourcecode',
            'text/x-script.csh'                      => 'sourcecode',
            'text/x-script.elisp'                    => 'sourcecode',
            'text/x-setext'                          => 'sourcecode',
            'text/webviewhtml'                       => 'sourcecode',
            'text/x-java-source'                     => 'sourcecode',
            'text/x-pascal'                          => 'sourcecode',
            'text/pascal'                            => 'sourcecode',
            'text/x-script.perl'                     => 'sourcecode',
            'text/x-script.perl-module'              => 'sourcecode',
            'text/x-script.phyton'                   => 'sourcecode',
            'text/x-asm'                             => 'sourcecode',
            'text/sgml'                              => 'sourcecode',
            'text/x-sgml'                            => 'sourcecode',
            'text/x-script.sh'                       => 'sourcecode',
            'text/x-server-parsed-html'              => 'sourcecode',
            'text/uri-list'                          => 'sourcecode',
            'text/x-uuencode'                        => 'sourcecode',

            // Videos
            'video/msvideo'                          => 'videos',
            'video/avi'                              => 'videos',
            'video/x-msvideo'                        => 'videos',
            'video/mpeg'                             => 'videos',
            'video/mp4'                             => 'videos',
            'video/quicktime'                        => 'videos',

            // Audio
            'audio/basic'                            => 'audio',
            'audio/x-midi'                           => 'audio',
            'audio/mpeg'                             => 'audio',
            'audio/vorbis'                           => 'audio',
            'audio/ogg'                              => 'audio',
            'audio/x-pn-realaudio'                   => 'audio',
            'audio/vnd.rn-realaudio'                 => 'audio',
            'audio/wav'                              => 'audio',
            'audio/x-wav'                            => 'audio',
        );

        $dest = 'unsorted';
        if(isset($mimeToFolder[$this->mime])){
            $dest = $mimeToFolder[$this->mime];
        }

        $this->setType($dest);

        // Add additional when image
        if($dest == 'images' && !empty($this->file)){
            try {
                $size = getimagesize($this->file->getPathName());
                $this->setWidth($size[0]);
                $this->setHeight($size[1]);
            } catch (\Exception $e) {
            }
        }

        if($temp){
            $dest = 'temp';
        }

        if($this->secure){
            return 'secure/' . $dest;
        }
        return 'uploads/' . $dest;
    }

    public function getFileImage(){
        $find = array(
            // Images
            'image/bmp'                              => 'png.png',
            'image/gif'                              => 'png.png',
            'image/jpeg'                             => 'png.png',
            'image/png'                              => 'png.png',
            'image/svg+xml'                          => 'png.png',
            'image/tiff'                             => 'png.png',

            // Documents
            'text/plain'                             => 'txt.png',
            'text/richtext'                          => 'otf.png',
            'application/msword'                     => 'word.png',
            'application/excel'                      => 'excel.png',
            'application/vnd.ms-excel'               => 'excel.png',
            'application/x-excel'                    => 'excel.png',
            'application/x-msexcel'                  => 'excel.png',
            'application/pdf'                        => 'acrobat.png',
            'application/mspowerpoint'               => 'powerpoint.png',
            'application/powerpoint'                 => 'powerpoint.png',
            'application/vnd.ms-powerpoint'          => 'powerpoint.png',
            'application/x-mspowerpoint'             => 'powerpoint.png',
            'application/x-iwork-keynote-sffkey'     => 'excel.png',
            'application/x-iwork-numbers-sffnumbers' => 'excel.png',
            'application/vnd.apple.keynote'          => 'powerpoint.png',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'            => 'word.png',
            'application/vnd.apple.pages'            => 'word.png',
            'application/vnd.apple.numbers'          => 'excel.png',
            'application/csv'                        => 'txt.png',
            'text/csv'                               => 'txt.png',

            // Source code
            'application/x-rar-compressed'           => 'archive.png',
            'application/octet-stream'               => 'archive.png',
            'application/zip'                        => 'archive.png',

            // Source code
            'text/html'                              => 'html.png',
            'text/css'                               => 'css.png',
            'text/php'                               => 'php.png',
            'text/asp'                               => 'html.png',
            'text/x-c'                               => 'html.png',
            'text/x-script.csh'                      => 'html.png',
            'text/x-script.elisp'                    => 'html.png',
            'text/x-setext'                          => 'html.png',
            'text/webviewhtml'                       => 'html.png',
            'text/x-java-source'                     => 'html.png',
            'text/x-pascal'                          => 'html.png',
            'text/pascal'                            => 'html.png',
            'text/x-script.perl'                     => 'html.png',
            'text/x-script.perl-module'              => 'html.png',
            'text/x-script.phyton'                   => 'html.png',
            'text/x-asm'                             => 'html.png',
            'text/sgml'                              => 'html.png',
            'text/x-sgml'                            => 'html.png',
            'text/x-script.sh'                       => 'html.png',
            'text/x-server-parsed-html'              => 'html.png',
            'text/uri-list'                          => 'html.png',
            'text/x-uuencode'                        => 'html.png',

            // Videos
            'video/msvideo'                          => 'video.png',
            'video/avi'                              => 'video.png',
            'video/x-msvideo'                        => 'video.png',
            'video/mpeg'                             => 'video.png',
            'video/quicktime'                        => 'video.png',

            // Audio
            'audio/basic'                            => 'wav.png',
            'audio/x-midi'                           => 'wav.png',
            'audio/mpeg'                             => 'wav.png',
            'audio/vorbis'                           => 'wav.png',
            'audio/ogg'                              => 'wav.png',
            'audio/x-pn-realaudio'                   => 'wav.png',
            'audio/vnd.rn-realaudio'                 => 'wav.png',
            'audio/wav'                              => 'wav.png',
            'audio/x-wav'                            => 'wav.png',
        );

        if(!empty($find[$this->mime])){
            return $find[$this->mime];
        }
        return '';
    }

    /**
     * Set label
     *
     * @param \label $label
     *
     * @return Media
     */
    public function setLabel($label)
    {
        if(preg_match('/^(.*?)\.([a-zA-Z]+)$/', $label, $m)){
            $label = $this->doSluggify($m[1]) . '.' . $m[2];
        }
        $this->label = $label;

		if (!empty($this->label) && empty($this->getDescriptionAlt())) {
			$description_alt = $this->getLabelWithoutExtension();

			// replace all non printable chars UTF-8 style
			//$description_alt = preg_replace('/[\x00-\x1F\x7F]/u', ' ', $description_alt);

			$parterns = [];
			$parterns[0] = '/_/';
			$parterns[1] = '/-/';

			$replacements = [];
			$replacements[0] = ' ';
			$replacements[1] = ' ';

			$description_alt = preg_replace($parterns, $replacements, $description_alt);

			$this->description_alt = $description_alt;
		}

        return $this;
    }

    /**
     * Get label
     *
     * @return \label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Get extension
     *
     * @return \label
     */
    public function getExtension()
    {
        return preg_replace('/^.*?\.([\w]+)$/', '$1', $this->label);
    }

    public function hasWebp(){
        $p = str_replace('uploads/images', 'uploads/images/webp', $this->getAbsolutePath());
        $p = preg_replace('/\.[a-z]+$/', '.webp', $p); // .xxx to .webp
        return file_exists($p);
    }

    public function hasRemoteWebp(){
        $p = str_replace('media', 'media_webp', $this->getRemoteUrl());
        $p = preg_replace('/\.[a-z]+$/', '.webp', $p); // .xxx to .webp
        return file_exists($p);
    }

    public function getAbsoluteWebpPath(){
        $p = str_replace('uploads/images', 'uploads/images/webp', $this->getAbsolutePath());
        $p = preg_replace('/\.[a-z]+$/', '.webp', $p); // .xxx to .webp
        return $p;
    }

    public function getWebpPath($scale = ''){
        $p = str_replace('uploads/images', 'uploads/images/webp' . (!empty($scale) ? '/' . $scale : '') , $this->getWebPath());
        $p = preg_replace('/\.[a-z]+$/', '.webp', $p); // .xxx to .webp
        $chk_path = $this->getUploadRootDir() . str_replace('uploads/images', '', $p);
        if(!file_exists($chk_path)){
            $scale = '';
            $p = str_replace('uploads/images', 'uploads/images/webp' . (!empty($scale) ? '/' . $scale : '') , $this->getWebPath());
            $p = preg_replace('/\.[a-z]+$/', '.webp', $p); // .xxx to .webp
        }
        return $p;
    }

    public function getRemoteWebpPath(){
        $p = str_replace('media', 'media_webp', $this->getRemoteUrl());
        $p = preg_replace('/\.[a-z]+$/', '.webp', $p); // .xxx to .webp
        return $p;
    }

	public function hasBlurred() {
         		$p = str_replace('uploads/images', 'uploads/images/lowres', $this->getAbsolutePath());
                 //$p = preg_replace('/\.[a-z]+$/', '.webp', $p); // .xxx to .webp
                 return file_exists($p);
         	}

	public function getAbsoluteBlurredPath(){
                 $p = str_replace('uploads/images', 'uploads/images/lowres', $this->getAbsolutePath());
                 //$p = preg_replace('/\.[a-z]+$/', '.webp', $p); // .xxx to .webp
                 return $p;
             }

	public function getBlurredWebPath($scale = '') {
                 $p = str_replace('uploads/images', 'uploads/images/lowres' . (!empty($scale) ? '/' . $scale : ''), $this->getWebPath());
                 //$p = preg_replace('/\.[a-z]+$/', '.webp', $p); // .xxx to .webp
                 return $p;
             }

	public function hasBlurredWebp() {
         		$p = str_replace('uploads/images', 'uploads/images/webp/lowres', $this->getAbsolutePath());
                 $p = preg_replace('/\.[a-z]+$/', '.webp', $p); // .xxx to .webp
                 return file_exists($p);
         	}

	public function getAbsoluteBlurredWebpPath(){
                 $p = str_replace('uploads/images', 'uploads/images/webp/lowres', $this->getAbsolutePath());
                 $p = preg_replace('/\.[a-z]+$/', '.webp', $p); // .xxx to .webp
                 return $p;
             }

	public function getBlurredWebpPath($scale = '') {
                 $p = str_replace('uploads/images', 'uploads/images/webp/lowres' . (!empty($scale) ? '/' . $scale : '') , $this->getWebPath());
                 $p = preg_replace('/\.[a-z]+$/', '.webp', $p); // .xxx to .webp
                 return $p;
             }

    /**
     * Get label without extension
     *
     * @return \label
     */
    public function getLabelWithoutExtension()
    {
        return preg_replace('/^(.*?)\.[\w]+$/', '$1', $this->label);
    }

    /**
     * Set labelAlt.
     *
     * @param string|null $labelAlt
     *
     * @return Media
     */
    public function setLabelAlt($labelAlt = null)
    {
        $this->label_alt = $labelAlt;

        return $this;
    }

    /**
     * Get labelAlt.
     *
     * @return string|null
     */
    public function getLabelAlt()
    {
        return $this->label_alt;
    }

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return Media
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set mime
     *
     * @param string $mime
     *
     * @return Media
     */
    public function setMime($mime)
    {
        $this->mime = $mime;

        return $this;
    }

    /**
     * Get mime
     *
     * @return string
     */
    public function getMime()
    {
        return $this->mime;
    }

    /**
     * Set filepath
     *
     * @param string $filepath
     *
     * @return Media
     */
    public function setFilepath($filepath)
    {
        $this->filepath = $filepath;

        return $this;
    }

    /**
     * Get filepath
     *
     * @return string
     */
    public function getFilepath()
    {
        return $this->filepath;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     *
     * @return Media
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set dateAdd
     *
     * @param \DateTime $dateAdd
     *
     * @return Media
     */
    public function setDateAdd()
    {
        $this->dateAdd = new \DateTime('now');

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
     * Set dateEdit
     *
     * @param \DateTime $dateEdit
     *
     * @return Media
     */
    public function setDateEdit()
    {
        $this->dateEdit = new \DateTime('now');

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
     * Set path
     *
     * @param string $path
     *
     * @return Media
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set parent
     *
     * @param \App\CmsBundle\Entity\Mediadir $parent
     *
     * @return Media
     */
    public function setParent(\App\CmsBundle\Entity\Mediadir $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \App\CmsBundle\Entity\Mediadir
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Check tag
     *
     * @param \App\CmsBundle\Entity\Tag $tag
     *
     * @return boolean
     */
    public function hasTag(\App\CmsBundle\Entity\Tag $tag)
    {
        $idlist = array();
        foreach($this->tags as $storedtag){
            $idlist[] = $storedtag->getId();
        }

        return in_array($tag->getId(), $idlist);
    }

    /**
     * Add tag
     *
     * @param \App\CmsBundle\Entity\Tag $tag
     *
     * @return Media
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
     * Set type
     *
     * @param string $type
     *
     * @return Media
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get type label
     *
     * @return string
     */
    public function getTypeLabel()
    {
        $type = $this->getType();
        switch($type){
            case 'images': return 'Afbeelding'; break;
            case 'documents': return 'Document'; break;
            case 'sourcecode': return 'Broncode'; break;
            case 'videos': return 'Video'; break;
            case 'audio': return 'Audio'; break;
        }

        return 'Bestand';
    }

    /**
     * Set width
     *
     * @param integer $width
     *
     * @return Media
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     *
     * @return Media
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set originalPath
     *
     * @param string $originalPath
     *
     * @return Media
     */
    public function setOriginalPath($originalPath)
    {
        $this->original_path = $originalPath;

        return $this;
    }

    /**
     * Get originalPath
     *
     * @return string
     */
    public function getOriginalPath()
    {
        return $this->original_path;
    }

    /**
     * Set originalSize
     *
     * @param integer $originalSize
     *
     * @return Media
     */
    public function setOriginalSize($originalSize)
    {
        $this->original_size = $originalSize;

        return $this;
    }

    /**
     * Get originalSize
     *
     * @return integer
     */
    public function getOriginalSize()
    {
        return $this->original_size;
    }

    /**
     * Set originalWidth
     *
     * @param integer $originalWidth
     *
     * @return Media
     */
    public function setOriginalWidth($originalWidth)
    {
        $this->original_width = $originalWidth;

        return $this;
    }

    /**
     * Get originalWidth
     *
     * @return integer
     */
    public function getOriginalWidth()
    {
        return $this->original_width;
    }

    /**
     * Set originalHeight
     *
     * @param integer $originalHeight
     *
     * @return Media
     */
    public function setOriginalHeight($originalHeight)
    {
        $this->original_height = $originalHeight;

        return $this;
    }

    /**
     * Get originalHeight
     *
     * @return integer
     */
    public function getOriginalHeight()
    {
        return $this->original_height;
    }

    /**
     * Set originalMime
     *
     * @param string $originalMime
     *
     * @return Media
     */
    public function setOriginalMime($originalMime)
    {
        $this->original_mime = $originalMime;

        return $this;
    }

    /**
     * Get originalMime
     *
     * @return string
     */
    public function getOriginalMime()
    {
        return $this->original_mime;
    }

    /**
     * Alter media
     *
     * @return boolean
     */
    public function alter($base64_string){

        $this->setOriginalPath(preg_replace('/(\.[a-zA-Z]+)$/', '-original$1', $this->getPath()));

        $current = $this->getUploadRootDir() . '/' . $this->getPath();
        $copy = $this->getUploadRootDir() . '/' . $this->getOriginalPath();

        $fs = new Filesystem();
        try{
            $fs->copy($current, $copy, true);

            // Copy original data before alting
            $this->setOriginalSize($this->getSize());
            $this->setOriginalWidth($this->getWidth());
            $this->setOriginalHeight($this->getHeight());
            $this->setOriginalMime($this->getMime());

            // Store new content
            $ifp = fopen($current, "wb");
            $data = explode(',', $base64_string);
            fwrite($ifp, base64_decode($data[1]));
            fclose($ifp);

            // Set new file info
            $sz = getimagesize($current);
            $this->setSize(filesize($current));
            $this->setWidth($sz[0]);
            $this->setHeight($sz[1]);
            $this->setMime($sz['mime']);

            return true;
        }catch(\Exception $e){
            die( "<pre>" . print_r( $e->getMessage(), 1 ) . "</pre>" );
        }

        return false;
    }

    /**
     * Restore media
     *
     * @return boolean
     */
    public function restore(){
        $current = $this->getUploadRootDir() . '/' . $this->getPath();
        $copy = $this->getUploadRootDir() . '/' . $this->getOriginalPath();

        $this->setOriginalPath(null);

        $fs = new Filesystem();
        try{
            if(file_exists($copy) && preg_match('/\.[a-zA-Z]+$/', $copy)){
                $fs->copy($copy, $current, true);
                $fs->remove($copy);
            }

            // Copy original data back
            $this->setSize($this->getOriginalSize());
            $this->setWidth($this->getOriginalWidth());
            $this->setHeight($this->getOriginalHeight());
            $this->setMime($this->getOriginalMime());

            // Copy original data before alting
            $this->setOriginalSize(null);
            $this->setOriginalWidth(null);
            $this->setOriginalHeight(null);
            $this->setOriginalMime(null);

            return true;
        }catch(\Exception $e){
            die( "<pre>" . print_r( $e->getMessage(), 1 ) . "</pre>" );
        }

        return false;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Media
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set descriptionAlt.
     *
     * @param string|null $descriptionAlt
     *
     * @return Media
     */
    public function setDescriptionAlt($descriptionAlt = null)
    {
        $this->description_alt = $descriptionAlt;

        return $this;
    }

    /**
     * Get descriptionAlt.
     *
     * @return string|null
     */
    public function getDescriptionAlt()
    {
        return $this->description_alt;
    }

    /**
     * Get all page parents
     *
     * @return array
     */
    public function getFolderPath()
    {
        $list = [];

        $parent = $this->getParent();
        if($parent != null){
            while($parent != null){
                $list[] = $parent->getLabel();
                $parent = $parent->getParent();
            }
        }

        return implode(' / ', $list) . ' / ';
    }

    public function resize($key, $maxWidth, $previousFile = null){

		if (!empty($this->getDateAdd())) {
			$_date = $this->getDateAdd();
			$dateFolder = '/' . $_date->format('Ymd');
		} else {
			$dateFolder = '/' . date('Ymd');
		}
        if($previousFile && $this->replaceFile){
            $dateFolder = '/' . preg_replace('/^([0-9]+)\/.*?$/', '$1', $previousFile);
        }

        $source = $this->getAbsolutePath();

		// Create custom sizes.
		if(!file_exists($this->getUploadRootDir() . '/' . $key)){
			// Create size folder if not exists yet
			mkdir($this->getUploadRootDir() . '/' . $key);
		}
		// Create custom sizes.
		if(!file_exists($this->getUploadRootDir() . '/' . $key . $dateFolder)){
			// Create size folder if not exists yet
			mkdir($this->getUploadRootDir() . '/' . $key . $dateFolder);
		}
		$destination = $this->getUploadRootDir() . '/' . $key . $dateFolder . '/' . preg_replace('/^.*?\//', '', $this->getPath());

        switch ($this->mime) {
            case 'image/jpeg':
                if (!$image = @imagecreatefromjpeg($source)){
                    return false;
                }
                $quality = 50;
                break;
            case 'image/png':
                if (!$image = @imagecreatefrompng($source)){
                    return false;
                }
                $quality = 4;
                break;
            case 'image/gif':
                // COPY MANUALLY TO DIMENSIONS, GIF CANNOT BE RESIZED LIKE THAT
                copy($source, $destination);
                return false;
                break;
            default:
                return false;
                break;
        }

        //Check if image has an orientation specified within EXIF data.
        $exif = null;
        if ($this->mime == 'image/jpeg') {
		    try {
                if(function_exists('exif_read_data')){
                    $exif = exif_read_data($source);
                    if(!empty($exif['Orientation'])) {
                        //Rotate accordingly
                        switch($exif['Orientation']) {
                            case 8:
                                $image = imagerotate($image,90,0);
                                break;
                            case 3:
                                $image = imagerotate($image,180,0);
                                break;
                            case 6:
                                $image = imagerotate($image,-90,0);
                                break;
                        }
                    }
				}
			} catch (\Exception $e) {
			}
        }

        if(!empty($exif) && !empty($exif['Orientation'])) {
            // Get dimensions of new image resource.
            $origWidth  = imagesx($image);
            $origHeight = imagesy($image);
        } else {
            // Get dimensions of source image.
            list($origWidth, $origHeight) = getimagesize($source);
        }

        if($key == 'full'){
            $this->setOriginalWidth($origWidth);
            $this->setOriginalHeight($origHeight);
            $this->setOriginalSize(filesize($source));
        }

        $maxHeight = 0;

        // Calculate ratio of desired maximum sizes and original sizes.
        $ratio = $maxWidth / $origWidth;

        // Calculate new image dimensions.
        $newWidth  = (int)$origWidth  * $ratio;
        $newHeight = (int)$origHeight * $ratio;

		if($newWidth > (int)$origWidth || $newHeight > (int)$origHeight) {
			$newWidth  = (int)$origWidth;
			$newHeight = (int)$origHeight;
		}

        if($key == 'full'){
            $this->setWidth($newWidth);
            $this->setHeight($newHeight);
        }

        // Create final image with new dimensions.
		$newImage = imagecreatetruecolor($newWidth, $newHeight);

        if($this->mime == 'image/png'){
            imagealphablending($newImage, FALSE);
            imagesavealpha($newImage, TRUE);
        }

		if ($key == 'full') {
			imagecopyresized($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
		} else {
			imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
		}

        switch ($this->mime) {
            case 'image/jpeg':
                imagejpeg($newImage, $destination, $quality);
                break;
            case 'image/png':
                imagepng($newImage, $destination, $quality);
                break;
            default: break;
        }

		if ($key == 'full') {
			$this->setSize(filesize($destination));
		}

        // Free up the memory.
        imagedestroy($image);
        imagedestroy($newImage);

        return true;
    }

	/**
	 * Take original resized images and convert them to webp
	 *
	 * @param type $key
	 * @param type $maxWidth
	 * @param type $previousFile
	 * @return boolean
	 */
	public function resizeWebp($key, $maxWidth, $previousFile = null)
         	{
         		$date = $this->getDateAdd();
                 $dateFolder = '/' . $date->format('Ymd');
         
                 if($previousFile && $this->replaceFile){
                     $dateFolder = '/' . preg_replace('/^([0-9]+)\/.*?$/', '$1', $previousFile);
                 }
         
                 $source = $this->getAbsolutePath($key);
         
         		// Create custom sizes.
         		if(!file_exists($this->getUploadRootDir() . '/webp/' . $key)){
         			// Create size folder if not exists yet
         			mkdir($this->getUploadRootDir() . '/webp/' . $key);
         		}
         		// Create custom sizes.
         		if(!file_exists($this->getUploadRootDir() . '/webp/' . $key . $dateFolder)){
         			// Create size folder if not exists yet
         			mkdir($this->getUploadRootDir() . '/webp/' . $key . $dateFolder);
         		}
         
         		$webpFilename = preg_replace('/\.[a-z]+$/', '.webp', $this->getPath());
         		$destination = $this->getUploadRootDir() . '/webp/' . $key . $dateFolder . '/' . preg_replace('/^.*?\//', '', $webpFilename);
         
                 switch ($this->mime) {
                     case 'image/jpeg':
                         if (!$image = @imagecreatefromjpeg($source)){
                             return false;
                         }
                         $quality = 50;
                         break;
                     case 'image/png':
                         if (!$image = @imagecreatefrompng($source)){
                             return false;
                         }
                         $quality = 50;
                         break;
                     case 'image/gif':
                         // COPY MANUALLY TO DIMENSIONS, GIF CANNOT BE RESIZED LIKE THAT
                         copy($source, $destination);
                         return false;
                         break;
         			case 'image/webp':
         				if (!$image = @imagecreatefromwebp($source)){
                             return false;
                         }
                         $quality = 50;
                         break;
                     default:
                         return false;
                         break;
                 }
         
                 // Get dimensions of source image.
                 list($origWidth, $origHeight) = getimagesize($source);
         
                 $maxHeight = 0;
         
                 // Calculate ratio of desired maximum sizes and original sizes.
                 $ratio = $maxWidth / $origWidth;
         
                 // Calculate new image dimensions.
                 $newWidth  = (int)$origWidth  * $ratio;
                 $newHeight = (int)$origHeight * $ratio;
         
         		if($newWidth > (int)$origWidth || $newHeight > (int)$origHeight) {
         			$newWidth  = (int)$origWidth;
         			$newHeight = (int)$origHeight;
         		}
         
                 // Create final image with new dimensions.
                 $newImage = imagecreatetruecolor($newWidth, $newHeight);
         
                 imagesetinterpolation($newImage, IMG_SINC);
         
                 if($this->mime == 'image/png'){
                     imagealphablending($newImage, FALSE);
                     imagesavealpha($newImage, TRUE);
                 }
         
         		imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
         
         		imagepalettetotruecolor($newImage);
                 imagealphablending($newImage, true);
                 imagesavealpha($newImage, true);
         		imagewebp($newImage, $destination, $quality);
         
                 // Free up the memory.
                 imagedestroy($image);
                 imagedestroy($newImage);
         		
                 return true;
             }

	private function resizeLowres($key, $maxWidth, $source = null)
         	{
         		$date = $this->getDateAdd();
                 $dateFolder = '/' . $date->format('Ymd');
         
                 if($source && $this->replaceFile){
                     $dateFolder = '/' . preg_replace('/^([0-9]+)\/.*?$/', '$1', $source);
                 }
         
         		// Create custom sizes.
         		if(!file_exists($this->getUploadRootDir() . '/lowres/' . $key)){
         			// Create size folder if not exists yet
         			mkdir($this->getUploadRootDir() . '/lowres/' . $key);
         		}
         		// Create custom sizes.
         		if(!file_exists($this->getUploadRootDir() . '/lowres/' . $key . $dateFolder)){
         			// Create size folder if not exists yet
         			mkdir($this->getUploadRootDir() . '/lowres/' . $key . $dateFolder);
         		}
         
         		$destination = $this->getUploadRootDir() . '/lowres/' . $key . $dateFolder . '/' . preg_replace('/^.*?\//', '', $this->getPath());
         
                 switch ($this->mime) {
                     case 'image/jpeg':
                         if (!$image = @imagecreatefromjpeg($source)){
                             return false;
                         }
                         $quality = 50;
                         break;
                     case 'image/png':
                         if (!$image = @imagecreatefrompng($source)){
                             return false;
                         }
                         $quality = 4;
                         break;
                     case 'image/gif':
                         // COPY MANUALLY TO DIMENSIONS, GIF CANNOT BE RESIZED LIKE THAT
                         copy($source, $destination);
                         return false;
                         break;
         			case 'image/webp':
         				if (!$image = @imagecreatefromwebp($source)){
                             return false;
                         }
                         $quality = 50;
                         break;
                     default:
                         return false;
                         break;
                 }
         
                 // Get dimensions of source image.
                 list($origWidth, $origHeight) = getimagesize($source);
         
                 $maxHeight = 0;
         
                 // Calculate ratio of desired maximum sizes and original sizes.
                 $ratio = $maxWidth / $origWidth;
         
                 // Calculate new image dimensions.
                 $newWidth  = (int)$origWidth  * $ratio;
                 $newHeight = (int)$origHeight * $ratio;
         
         		if($newWidth > (int)$origWidth || $newHeight > (int)$origHeight) {
         			$newWidth  = (int)$origWidth;
         			$newHeight = (int)$origHeight;
         		}
         
                 // Create final image with new dimensions.
                 $newImage = imagecreatetruecolor($newWidth, $newHeight);
         
                 if($this->mime == 'image/png'){
                     imagealphablending($newImage, FALSE);
                     imagesavealpha($newImage, TRUE);
                 }
         
         		if ($key == 'full') {
         			imagecopyresized($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
         		} else {
         			imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
         		}
         
         		imagepalettetotruecolor($newImage);
                 imagealphablending($newImage, true);
                 imagesavealpha($newImage, true);
         
         		switch ($this->mime) {
         			case 'image/jpeg':
         				imagejpeg($newImage, $destination, $quality);
         				break;
         			case 'image/png':
         				imagepng($newImage, $destination, $quality);
         				break;
         			case 'iamge/webp':
         				imagewebp($newImage, $destination, $quality);
         				break;
         			default: break;
         				break;
         		}
         
                 // Free up the memory.
                 imagedestroy($image);
                 imagedestroy($newImage);
         
                 return true;
             }

	private function resizeLowresWebp($key, $maxWidth, $source = null)
         	{
         		$date = $this->getDateAdd();
                 $dateFolder = '/' . $date->format('Ymd');
         
                 if($source && $this->replaceFile){
                     $dateFolder = '/' . preg_replace('/^([0-9]+)\/.*?$/', '$1', $source);
                 }
         
         		// Create custom sizes.
         		if(!file_exists($this->getUploadRootDir() . '/webp/lowres/' . $key)){
         			// Create size folder if not exists yet
         			mkdir($this->getUploadRootDir() . '/webp/lowres/' . $key);
         		}
         		// Create custom sizes.
         		if(!file_exists($this->getUploadRootDir() . '/webp/lowres/' . $key . $dateFolder)){
         			// Create size folder if not exists yet
         			mkdir($this->getUploadRootDir() . '/webp/lowres/' . $key . $dateFolder);
         		}
         
         		$webpFilename = preg_replace('/\.[a-z]+$/', '.webp', $this->getPath());
         		$destination = $this->getUploadRootDir() . '/webp/lowres/' . $key . $dateFolder . '/' . preg_replace('/^.*?\//', '', $webpFilename);
         
                 switch ($this->mime) {
                     case 'image/jpeg':
                         if (!$image = @imagecreatefromjpeg($source)){
                             return false;
                         }
                         $quality = 50;
                         break;
                     case 'image/png':
                         if (!$image = @imagecreatefrompng($source)){
                             return false;
                         }
                         $quality = 4;
                         break;
                     case 'image/gif':
                         // COPY MANUALLY TO DIMENSIONS, GIF CANNOT BE RESIZED LIKE THAT
                         copy($source, $destination);
                         return false;
                         break;
         			case 'image/webp':
         				if (!$image = @imagecreatefromwebp($source)){
                             return false;
                         }
                         $quality = 50;
                         break;
                     default:
                         return false;
                         break;
                 }
         
                 // Get dimensions of source image.
                 list($origWidth, $origHeight) = getimagesize($source);
         
                 $maxHeight = 0;
         
                 // Calculate ratio of desired maximum sizes and original sizes.
                 $ratio = $maxWidth / $origWidth;
         
                 // Calculate new image dimensions.
                 $newWidth  = (int)$origWidth  * $ratio;
                 $newHeight = (int)$origHeight * $ratio;
         
         		if($newWidth > (int)$origWidth || $newHeight > (int)$origHeight) {
         			$newWidth  = (int)$origWidth;
         			$newHeight = (int)$origHeight;
         		}
         
         		// Create final image with new dimensions.
                 $newImage = imagecreatetruecolor($newWidth, $newHeight);
         
                 if($this->mime == 'image/png'){
                     imagealphablending($newImage, FALSE);
                     imagesavealpha($newImage, TRUE);
                 }
         
         		if ($key == 'full') {
         			imagecopyresized($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
         		} else {
         			imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
         		}
         		imagepalettetotruecolor($newImage);
                 imagealphablending($newImage, true);
                 imagesavealpha($newImage, true);
         		imagewebp($newImage, $destination, $quality);
         
                 // Free up the memory.
                 imagedestroy($image);
                 imagedestroy($newImage);
         
                 return true;
             }

    /**
     * Add block.
     *
     * @param \App\CmsBundle\Entity\PageBlock $block
     *
     * @return Media
     */
    public function addBlock(\App\CmsBundle\Entity\PageBlock $block)
    {
        $this->block[] = $block;

        return $this;
    }

    /**
     * Remove block.
     *
     * @param \App\CmsBundle\Entity\PageBlock $block
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeBlock(\App\CmsBundle\Entity\PageBlock $block)
    {
        return $this->block->removeElement($block);
    }

    /**
     * Get block.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * Set used.
     *
     * @param bool|null $used
     *
     * @return Media
     */
    public function setUsed($used = null)
    {
        $this->used = $used;

        return $this;
    }

    /**
     * Get used.
     *
     * @return bool|null
     */
    public function getUsed()
    {
        return $this->used;
    }

    /**
     * Set usedIn.
     *
     * @param array|null $usedIn
     *
     * @return Media
     */
    public function setUsedIn($usedIn = null)
    {
        $this->used_in = $usedIn;

        return $this;
    }

    /**
     * Get usedIn.
     *
     * @return array|null
     */
    public function getUsedIn()
    {
        return $this->used_in;
    }

    /**
     * Set position.
     *
     * @param int|null $position
     *
     * @return Media
     */
    public function setPosition($position = null)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position.
     *
     * @return int|null
     */
    public function getPosition()
    {
        return $this->position;
    }

    public function source(){
        return file_get_contents($this->getAbsolutePath());
    }

    /**
     * Set cropSource.
     *
     * @param string|null $cropSource
     *
     * @return Media
     */
    public function setCropSource($cropSource = null)
    {
        $this->crop_source = $cropSource;

        return $this;
    }

    /**
     * Get cropSource.
     *
     * @return string|null
     */
    public function getCropSource()
    {
        if(empty($this->crop_source)){
            return '/' . $this->getWebPath();
        }

        return null === $this->crop_source
            ? null
            : '/' . $this->getUploadDir() .'/'.$this->crop_source;
    }

    /**
     * Get real cropSource.
     *
     * @return string|null
     */
    public function getRealCropSource()
    {
        return $this->crop_source;
    }

    /**
     * Set cropBox.
     *
     * @param string|null $cropBox
     *
     * @return Media
     */
    public function setCropBox($cropBox = null)
    {
        $this->crop_box = $cropBox;

        return $this;
    }

    /**
     * Get cropBox.
     *
     * @return string|null
     */
    public function getCropBox()
    {
        return $this->crop_box;
    }

    /**
     * Set cropRatio.
     *
     * @param string|null $cropRatio
     *
     * @return Media
     */
    public function setCropRatio($cropRatio = null)
    {
        $this->crop_ratio = $cropRatio;

        return $this;
    }

    /**
     * Get cropRatio.
     *
     * @return string|null
     */
    public function getCropRatio()
    {
        return $this->crop_ratio;
    }

    /**
     * Set cropFlipX.
     *
     * @param string|null $cropFlipX
     *
     * @return Media
     */
    public function setCropFlipX($cropFlipX = null)
    {
        $this->crop_flip_x = $cropFlipX;

        return $this;
    }

    /**
     * Get cropFlipX.
     *
     * @return string|null
     */
    public function getCropFlipX()
    {
        return $this->crop_flip_x;
    }

    /**
     * Set cropFlipY.
     *
     * @param string|null $cropFlipY
     *
     * @return Media
     */
    public function setCropFlipY($cropFlipY = null)
    {
        $this->crop_flip_y = $cropFlipY;

        return $this;
    }

    /**
     * Get cropFlipY.
     *
     * @return string|null
     */
    public function getCropFlipY()
    {
        return $this->crop_flip_y;
    }

    /**
     * Set oldId.
     *
     * @param int|null $oldId
     *
     * @return Media
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
     * Set secure.
     *
     * @param bool|null $secure
     *
     * @return Media
     */
    public function setSecure($secure = null)
    {
        $this->secure = $secure;

        return $this;
    }

    /**
     * Get secure.
     *
     * @return bool|null
     */
    public function getSecure()
    {
        return $this->secure;
    }

    /**
     * Set remoteUrl.
     *
     * @param string|null $remoteUrl
     *
     * @return Media
     */
    public function setRemoteUrl($remoteUrl = null)
    {
        $this->remote_url = $remoteUrl;

        return $this;
    }

    /**
     * Get remoteUrl.
     *
     * @return string|null
     */
    public function getRemoteUrl()
    {
        return $this->remote_url;
    }

	/**
	 * Check if remoteUrl us used.
	 * 
	 * @return boolean
	 */
	public function hasRemoteUrl()
         	{
         		return !empty($this->remote_url) ? true : false;
         	}

    public function getGenerateWebp(): ?bool
    {
        return $this->generate_webp;
    }

    public function setGenerateWebp(?bool $generate_webp): self
    {
        $this->generate_webp = $generate_webp;

        return $this;
    }
}
