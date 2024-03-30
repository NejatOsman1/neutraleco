<?php
namespace App\CmsBundle\Classes\Payment;

class Paypro
{

		private $config  = [];
		private $live    = false;
		
		private $PayPro  = null;
		private $api_url = 'https://www.paypro.nl/post_api/';
		private $api_key = '';
		private $methods = [
				'ideal' => [
						'label'       => 'iDEAL',
						'minimum'     => null,
						'maximum'     => null,
						'image'       => null,
						'image_large' => null,
						'has_issuers' => true,
				],
		];
		private $issuers = [];

		public function __construct($config){
				$this->config = $config;

				$this->api_key = $config['key'];
				if($config['live_mode']){
						$this->live = true;
				}



				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $this->api_url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, array("apikey"  => $this->api_key, "command" => 'get_all_pay_methods', "params"  => json_encode([])));
				$response = json_decode(curl_exec($ch), true);
				curl_close($ch);

				if(!empty($response['return'])){
						foreach($response['return']['data'] as $key => $data){
								$this->methods[$key] = [
										'label'       => $data['description'],
										'minimum'     => null,
										'maximum'     => null,
										'image'       => null,
										'image_large' => null,
										'has_issuers' => ($key == 'ideal' ? true : false),
								];

								if($key == 'ideal'){
										foreach($data['methods'] as $issuer){
												$this->issuers[$issuer['id']] = ['label' => $issuer['name'], 'image' => null, 'image_large' => null];
										}
								}
						}
				}
		}

		/**
		 * Create payment
		 *
		 * @return String
		 */
		public function createPayment($data, $currency = 'EUR', $locale = 'nl_NL'){
				$ch = curl_init();

				$makeSubscription = (isset($data['subscription']) ? $data['subscription'] : false);

				$product_id = 0;
				if($makeSubscription){
					if(empty($data['label']) || empty($data['url']) || empty($data['periods']) || empty($data['every'])){
						$product_id = $this->createProduct($data['redirectUrl']);
					}else{
						$product_id = $this->createProduct($data['redirectUrl'], $data['label'], ($data['amount'] * 100), $data['url']);
					}

					if(!empty($product_id)){
						// Create subscription
						$this->createSubscription($product_id, ($data['amount'] * 100), $data['periods'], $data['every']);
					}
				}

				$params = [
						'product_id'     => $product_id,
						'return_url'     => $data['redirectUrl'],
						'pay_method'     => (!empty($data['issuer']) ? $data['issuer'] : $data['method']),
						'amount'         => ($data['amount'] * 100),
						'consumer_email' => 'jelle@beyonit.nl',
					];

				if($this->live == false){
						$params['test_mode'] = 'true';
				}

				if(!isset($params['postback_url']) && !preg_match('/local/', $params['return_url'])){
						$params['postback_url'] = $params['return_url'];
				}

				if(!empty($locale)){
						$params['locale'] = substr($locale, 3);
				}

				curl_setopt($ch, CURLOPT_URL, $this->api_url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, array(
					"apikey"  => $this->api_key,
					"command" => 'create_product_payment',
					"params"  => json_encode($params)
				));
				$response = json_decode(curl_exec($ch), true);
				curl_close($ch);

				/*if(empty($response['return']['payment_hash'])){
					dump($response);die();
				}*/

				return [
						'id'     => $response['return']['payment_hash'],
						'status' => 'waiting',
						'url'    => $response['return']['payment_url'],
				];
		}

		public function createSubscription($product_id, $price, $period_amount, $period_type){
			$params = [
				// 'affiliate_commission_1'   => 0,
				// 'affiliate_commission_n'   => 0,
				'initiate_with_bancontact' => 'true',
				'initiate_with_ideal'      => 'true',
				'initiate_with_paypal'     => 'true',
				'number_of_periods'        => $period_amount,
				'price_1'                  => (float)number_format($price, 2, '.', ''),
				'price_n'                  => (float)number_format($price, 2, '.', ''),
				'product_id'               => $product_id,
				'time_multiplier'          => 1,
				'time_type'                => $period_type,
				'vat_1'                    => 21,
			];

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $this->api_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, array(
				"apikey"  => $this->api_key,
				"command" => 'update_product_subscription',
				"params"  => json_encode($params)
			));
			$response_raw = curl_exec($ch);
			$response = json_decode($response_raw, true);
			curl_close($ch);

			if($response['errors'] == 'false'){
				if(!empty($response['return']['product_id'])){
					return true;
				}
			}

			return false;
		}

		public function createProduct($returnUrl, $label = 'Test product', $price = 20.00, $url = null){
			if($url == null){
				$url = 'http://' . $_SERVER['HTTP_HOST'];
			}
			$params = [
				'title'          => $label,
				'url'            => $url,
				'description'    => $label,
				'return_url'     => $returnUrl,
				'price'          => (float)number_format($price, 2, '.', ''),
				'has_ideal'      => 'true',
				'has_paypal'     => 1,
				'has_machtiging' => 'true',
				'is_editable'    => false,
				'goods_type'     => 'physical',
			];

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $this->api_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, array(
				"apikey"  => $this->api_key,
				"command" => 'create_product',
				"params"  => json_encode($params)
			));
			$response_raw = curl_exec($ch);
			$response = json_decode($response_raw, true);
			curl_close($ch);

			if($response['errors'] == 'false'){
				if(!empty($response['return']['product_id'])){
					return $response['return']['product_id'];
				}
			}

			return null;
		}

		/**
		 * Get payment
		 *
		 * @return String
		 */
		public function getPayment($payment_id){
				$ch = curl_init();

				$params = [
						'payment_hash'     => $payment_id,
					];

				curl_setopt($ch, CURLOPT_URL, $this->api_url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, array(
					"apikey"  => $this->api_key,
					"command" => 'get_sale',
					"params"  => json_encode($params)
				));
				$response = json_decode(curl_exec($ch), true);
				curl_close($ch);

				$status = 'open';
				switch ($response['return']['current_status']) {
						case 'completed':
								$status = 'paid'; break;
						default:
								$status = $response['return']['current_status']; break;
				}

				return [
						'status' => $status,
				];
		}


		/**
		 * Get payment methods
		 *
		 * @return array
		 */
		public function getMethods(){
				return $this->methods;
		}

		/**
		 * Get iDEAL issuers
		 *
		 * @return array
		 */
		public function getIssuers(){
				return $this->issuers;
		}

		/**
		 * Check if payment class is instantiated successfully.
		 *
		 * @return boolean
		 */
		public function isValid(){
				return true;
		}

		/**
		 * Respond subscription status
		 *
		 * @return boolean
		 */
		public function hasSubscription(){
			if(is_null($this->config['subscription'])){
				return false;
			}
			return $this->config['subscription'];
		}

}
