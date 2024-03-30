<?php
namespace App\CmsBundle\Classes;

use Symfony\Component\Console\Output\OutputInterface;

class Meta
{
	private $key        = null;
	private $pixel        = null;
	private $url 		= 'https://graph.facebook.com/v14.0/';
	
	/**
	 * Construct
	 * 
	 * @param $Settings \App\CmsBundle\Entity\Settings The Trinity settings object
	 */
	public function __construct(\App\CmsBundle\Entity\Settings $Settings){
		//Set key and stuff
		$this->key = $Settings->getMetaApiToken();
		$this->pixel = $Settings->getFacebookPixel();
	}

	/**
	 * Register a page view action over the API
	 * 
	 * @param $Request request object
	 */
	public function registerView($Request, string $Type, $content_id = null, $content_name = null){
		$data = [
			"data" => [
				[
				"event_name" => "ViewContent",
				"event_time" => time(),
				"event_source_url" => $Request->getUri(),         
				"action_source" => "website",
				"user_data" => [
					"client_ip_address" => $Request->getClientIp(),
					"client_user_agent" => $Request->headers->get('User-Agent')
				],
				"custom_data" => [
					"content_type" => $Type,
					"content_id"   => $content_id,
					"content_name" => $content_name
				],
				"opt_out" => false
				]
			]
		];

		$response = $this->sendPayload($data);
	}

	/**
	 * Register a purchase action over the API
	 * 
	 * @param $Order entity
	 * @param $Request request object
	 * 
	 */
	public function registerPurchase($Order, $Request){
		$products_arr = [];
		
		foreach ($Order->getProducts() as $key => $prod) {
			$products_arr[$key]['id'] = $prod->getSku();
			$products_arr[$key]['quantity'] = $prod->getAmount();
		}

		$data = [
			"data" => [
				[
				"event_name" => "Purchase",
				"event_time" => time(),
				"event_source_url" => $Request->getUri(),         
				"action_source" => "website",
				"user_data" => [
					"client_ip_address" => $Request->getClientIp(),
					"client_user_agent" => $Request->headers->get('User-Agent'),
					"em" => [
						$this->normalizeData($Order->getEmail(), 'email')
					],
					"fn" => $this->normalizeData($Order->getFirstName()),
					"ct" => $this->normalizeData($Order->getCity()),
					"zp" => $this->normalizeData($Order->getPostalCode()),
					"ge" => (!empty($Order->getGender()) ? $this->normalizeData($Order->getGender()) : null),
					"country" => $this->normalizeData($Order->getCountry()),
				],
				"contents" => $products_arr,
				"custom_data" => [
					"value" => $Order->getTotalPrice(),
					"currency" => "EUR"
				],
				"opt_out" => false
				]
			]
		];

		$response = $this->sendPayload($data);
	}

	/**
	 * Register a add to cart action over the API
	 * 
	 * @param $Product entity
	 * @param $Request request object
	 * 
	 */
	public function registerAddToCart($Product, $Amount, $Request){
		$products_arr = [];
		
		$products_arr[0]['id'] = $Product->getSku();
		$products_arr[0]['quantity'] = $Amount;

		$data = [
			"data" => [
				[
				"event_name" => "AddToCart",
				"event_time" => time(),
				"event_source_url" => $Request->getUri(),         
				"action_source" => "website",
				"user_data" => [
					"client_ip_address" => $Request->getClientIp(),
					"client_user_agent" => $Request->headers->get('User-Agent')
				],
				"contents" => $products_arr,
				"custom_data" => [
					"value" => $Product->getPriceIncl(),
					"currency" => "EUR"
				],
				"opt_out" => false
				]
			]
		];

		$response = $this->sendPayload($data);
	}

	private function sendPayload($data) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url . $this->pixel . "/events?access_token=" . $this->key);

		$dataString = json_encode($data);  

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 400);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                  
			'User-Agent: Easify CMS',
			'Content-Type: application/json',
			'Content-Length: ' . strlen($dataString))                                                             
		);     

		$result = curl_exec($ch);
		$info = curl_getinfo($ch);

		curl_close($ch);

		$response = json_decode($result, true);
	}

	private function normalizeData(string $input, string $type = null) {
		if($type == 'email'){
			$input = trim($input);
			$input = strtolower($input);
			$input = hash('sha256', $input);
		} else if($type == 'phone'){
			$input = trim($input);
			$input = strtolower($input);
			$input = hash('sha256', $input);
		} else {
			$input = strtolower($input);
			$input = utf8_encode($input);
			//$input = htmlspecialchars($input, ENT_QUOTES, "UTF-8");
			$input = hash('sha256', $input);
		}

		return $input;
	}
}