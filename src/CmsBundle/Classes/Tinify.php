<?php
namespace App\CmsBundle\Classes;

use Symfony\Component\Console\Output\OutputInterface;

class Tinify
{

	private $key        = null;
	public $count       = 0;
	public $diff        = 0;
	public $source      = '';
	public $source_size = '';
	public $dest        = '';
	public $dest_size   = '';
	public $status      = 'Onbekend';
	
	/**
	 * Construct
	 * 
	 * @param $Settings \App\CmsBundle\Entity\Settings The Trinity settings object
	 */
	public function __construct(\App\CmsBundle\Entity\Settings $Settings){
		$this->key = $Settings->getTinypngApi();

		try {
			\Tinify\setKey($this->key);
			$this->count = \Tinify\compressionCount();
			$this->status = 'OK';
		} catch(\Tinify\AccountException $e) {
			$this->status = 'Verify your API key and account limit.';
		} catch(\Tinify\ClientException $e) {
			$this->status = 'Check your source image and request options.';
		} catch(\Tinify\ServerException $e) {
			$this->status = 'Temporary issue with the Tinify API.';
		} catch(\Tinify\ConnectionException $e) {
			$this->status = 'A network connection error occurred.';
		} catch(Exception $e) {
			$this->status = 'Something else went wrong, unrelated to the Tinify API.';
		}
	}

	/**
	 * Compress image
	 * 
	 * @param $file string Should be a path or url to image
	 * @param $dest string Optional destination path
	 */
	public function compress($file, $dest = null){
		try {
			$this->source = $file;
			$this->source_size = filesize($file);
			$this->dest = $dest;
			if(substr($this->source, 0, 4) == 'http'){
				$source = \Tinify\fromUrl($this->source);
			}else{
				$source = \Tinify\fromFile($this->source);
			}
			$source->toFile($this->dest);
			$this->count = \Tinify\compressionCount();
			if(file_exists($this->dest)){
				$this->dest_size = filesize($this->dest);
				$this->diff = (100 - (($this->dest_size / $this->source_size) * 100));
				$this->status = 'OK';
			}else{
				$this->status = 'Destination file could not be found...';
			}
		} catch(\Tinify\AccountException $e) {
			print("The error message is: " . $e->getMessage());
			$this->status = 'Verify your API key and account limit.';
		} catch(\Tinify\ClientException $e) {
			$this->status = 'Check your source image and request options.';
		} catch(\Tinify\ServerException $e) {
			$this->status = 'Temporary issue with the Tinify API.';
		} catch(\Tinify\ConnectionException $e) {
			$this->status = 'A network connection error occurred.';
		} catch(Exception $e) {
			$this->status = 'Something else went wrong, unrelated to the Tinify API.';
		}
	}

	/**
	 * Resize image via TinyPNG
	 * 
	 * Available resize methods:
	 * 
	 * scale: Scales image to dimensions (only width or height, default is width if filled)
	 * fit: Creates bounding box with given dimensions and put image in the middle
	 * cover: Crops image to given dimensions
	 * 
	 * @param $file string Should be a path or url to image
	 * @param $width integer Maximum width
	 * @param $height integer Maximum height
	 * @param $method string Resize method to use
	 * @param $dest string Optional destination path
	 */
	public function resize($file, $width = null, $height = null, $method = 'scale', $dest = null){
		try{
			$this->source = $file;
			$this->source_size = filesize($file);
			$this->dest = $dest;
			if(substr($this->source, 0, 4) == 'http'){
				$source = \Tinify\fromUrl($this->source);
			}else{
				$source = \Tinify\fromFile($this->source);
			}
			$source->toFile($this->dest);

			$resized = $source->resize([
			    "method" => $method,
			    "width" => $width,
			    "height" => $height
			]);
			$resized->toFile($this->dest);
			$this->count = \Tinify\compressionCount();
			if(file_exists($this->dest)){
				$this->dest_size = filesize($this->dest);
				$this->diff = round((100 - (($this->dest_size / $this->source_size) * 100)), 1);
				$this->status = 'OK';
			}else{
				$this->status = 'Destination file could not be found...';
			}
		} catch(\Tinify\AccountException $e) {
			print("The error message is: " . $e->getMessage());
			$this->status = 'Verify your API key and account limit.';
		} catch(\Tinify\ClientException $e) {
			$this->status = 'Check your source image and request options.';
		} catch(\Tinify\ServerException $e) {
			$this->status = 'Temporary issue with the Tinify API.';
		} catch(\Tinify\ConnectionException $e) {
			$this->status = 'A network connection error occurred.';
		} catch(Exception $e) {
			$this->status = 'Something else went wrong, unrelated to the Tinify API.';
		}
	}

}