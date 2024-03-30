<?php
namespace App\CmsBundle\Classes;

use \App\CmsBundle\Classes\Payment\Buckaroo;
use \App\CmsBundle\Classes\Payment\Mollie;
use \App\CmsBundle\Classes\Payment\Omnikassa;

class Pay{

	public $method       = '';
	private $className   = '';
	private $Object      = null;
	private $config      = [];
	public $raw_response = '';
	private $test        = false;
	
	public $id           = null;
	public $url          = '';
	public $status       = '';

	/**
	 * Initialize payment class
	 *
	 * @param $method string Name of payment method
	 * @config $config array Config data for payment sub-class
	 */
	public function __construct($method = '', $config = []){
		$this->method = ucfirst(strtolower($method));
		$this->config = $config;

		$className = "App\CmsBundle\\Classes\\Payment\\" . $this->method;

		$this->className = $className;

		if(!empty($config) && !empty($className)){
			$this->Object = new $className($config);
		}
	}

	public function getLabel(){
		return $this->method;
	}

	public function setTest($bool){
		$this->test = $bool;
	}

	/**
	 * Create payment
	 *
	 * @return mixed
	 */
	public function createPayment($data, $currency = 'EUR', $locale = 'nl_NL'){

		if($data['method'] == 'billink'){
			$data['products'][] = [
	            'sku'              => 'PAYMENTFEE',
	            'label'            => 'Betaling',
	            'type'             => 'digital',
	            'amount'           => 1,
	            'price'            => 1.00,
	            'total_price'      => 1.00,
	            'total_price_excl' => 0.83,
	            'tax'              => 0.17,
	            'tax_perc'         => 2100,
	        ];
		}

		$response = $this->Object->createPayment($data, $currency, $locale);
		if(is_array($response)){
			$this->id           = $response['id'];
			$this->status       = $response['status'];
			$this->url          = $response['url'];
			$this->raw_response = (!empty($response['raw_response']) ? $response['raw_response'] : '');
			return true;
		}

		return $response;
	}

	/**
	 * Get payment
	 *
	 * @return mixed
	 */
	public function getPayment($payment_id){
		$response = $this->Object->getPayment($payment_id);
		
		if(is_array($response)){
			if($response['status'] == 'completed') $response['status'] = 'paid';
			if($response['status'] == 'success') $response['status'] = 'paid';
			$this->status = $response['status'];
		}
	}

	/**
	 * Get config
	 *
	 * @return array
	 */
	public function getConfig(){
		if(!empty($this->config)){
			return $this->config;
		}

		return [];
	}

	/**
	 * Get payment methods
	 *
	 * @return array
	 */
	public function getMethods(){
		if($this->Object){
			return $this->Object->getMethods();
		}

		return [];
	}

	/**
	 * Get payment methods for testing
	 *
	 * @return array
	 */
	public function getMethodsForTesting(){
		if($this->Object){
			return $this->Object->getMethods(true);
		}

		return [];
	}

	/**
	 * Get payment method by key
	 *
	 * @return array
	 */
	public function getMethod($key){
		if(!empty($this->Object)){
			$methods = $this->Object->getMethods();
			return isset($methods[$key]) ? $methods[$key] : null;
		}

		return null;
	}

	/**
	 * Get iDEAL issuers
	 *
	 * @return array
	 */
	public function getIssuers(){
		if($this->Object){
			return $this->Object->getIssuers();
		}

		return [];
	}

	/**
	 * Get payment issuer by key
	 *
	 * @return array
	 */
	public function getIssuer($key){
		$issuers = $this->Object->getIssuers();
		return isset($issuers[$key]) ? $issuers[$key] : null;
	}

	/**
	 * Check if payment method has subscription
	 *
	 * @return boolean
	 */
	public function hasSubscription(){
		if(!empty($this->method) && method_exists($this->Object, 'hasSubscription')){
			return $this->Object->hasSubscription();
		}
		return false;
	}

	/**
	 * Check if payment class is instantiated successfully.
	 *
	 * @return boolean
	 */
	public function isValid(){
		$className = $this->className;
		if(!empty($this->method) && !empty($this->config) && $this->Object instanceof $className && $this->Object->isValid()){
			return true;
		}
		return false;
	}

	public function __toString(){
		return $this->method;
	}

}