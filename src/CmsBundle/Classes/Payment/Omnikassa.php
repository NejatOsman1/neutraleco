<?php
namespace App\CmsBundle\Classes\Payment;

use nl\rabobank\gict\payments_savings\omnikassa_sdk\model\Money;
use nl\rabobank\gict\payments_savings\omnikassa_sdk\model\OrderItem;
use nl\rabobank\gict\payments_savings\omnikassa_sdk\model\PaymentBrand;
use nl\rabobank\gict\payments_savings\omnikassa_sdk\model\PaymentBrandForce;
use nl\rabobank\gict\payments_savings\omnikassa_sdk\model\ProductType;
use nl\rabobank\gict\payments_savings\omnikassa_sdk\model\request\MerchantOrder;
use nl\rabobank\gict\payments_savings\omnikassa_sdk\model\Address;
use nl\rabobank\gict\payments_savings\omnikassa_sdk\model\CustomerInformation;
use nl\rabobank\gict\payments_savings\omnikassa_sdk\model\VatCategory;

use nl\rabobank\gict\payments_savings\omnikassa_sdk\model\Environment;
use nl\rabobank\gict\payments_savings\omnikassa_sdk\model\signing\SigningKey;
use nl\rabobank\gict\payments_savings\omnikassa_sdk\endpoint\Endpoint;
use nl\rabobank\gict\payments_savings\omnikassa_sdk\connector\TokenProvider;

/**
 * This is an in memory token provider copied from the official doc (PDF)
 * Class InMemoryTokenProvider
 */
class InMemoryTokenProvider extends TokenProvider
{
    private $map = array();
    
    /**
     * Construct the in memory token provider with the given refresh token.
     * @param string $refreshToken The refresh token used to retrieve the access tokens with.
     */
    public function __construct($refreshToken)
    {
        $this->setValue(static::REFRESH_TOKEN, $refreshToken);
    }
    
    /**
     * Retrieve the value for the given key.
     *
     * @param string $key
     * @return string Value of the given key or null if it does not exists.
     */
    protected function getValue($key)
    {
        return array_key_exists($key, $this->map) ? $this->map[$key] : null;
    }
    
    /**
     * Store the value by the given key.
     *
     * @param string $key
     * @param string $value
     */
    protected function setValue($key, $value)
    {
        $this->map[$key] = $value;
    }
    
    /**
     * Optional functionality to flush your systems.
     * It is called after storing all the values of the access token and can be used for example to clean caches or reload changes from the database.
    */
    protected function flush()
    {
    }
}

class Omnikassa
{

    private $config   = [];
    private $live     = false;
    private $key      = '';
    private $endpoint = null;

    private $methods  =  [
		'IDEAL' => [
			'label' => 'Ideal',
			'has_issuers' => false,
			'image_large' => null,
			'image' => null,
		],
		/*'AFTERPAY' => [
			'label' => 'AfterPay',
			'has_issuers' => false,
			'image_large' => null,
			'image' => null,
		],*/
		'PAYPAL' => [
			'label' => 'PayPal',
			'has_issuers' => false,
			'image_large' => null,
			'image' => null,
		],
		'MASTERCARD' => [
			'label' => 'Mastercard',
			'has_issuers' => false,
			'image_large' => null,
			'image' => null,
		],
		'VISA' => [
			'label' => 'Visa',
			'has_issuers' => false,
			'image_large' => null,
			'image' => null,
		],
		'BANCONTACT' => [
			'label' => 'Bancontact',
			'has_issuers' => false,
			'image_large' => null,
			'image' => null,
		],
		'MAESTRO' => [
			'label' => 'Maestro',
			'has_issuers' => false,
			'image_large' => null,
			'image' => null,
		],
		'V_PAY' => [
			'label' => 'V Pay',
			'has_issuers' => false,
			'image_large' => null,
			'image' => null,
		],
	];
    private $issuers  = [];

    public function getMethods(){
    	return $this->methods;
    }

    public function getIssuers(){
    	return [];
    }

    public function isValid(){
    	return true;
    }

    public function getPayment($status){
    	return ['status' => strtolower($status)];
    }

    /**
	 * id
	 * order_id
	 * amount
	 * description
	 * redirectUrl
	 * method
	 * issuer
	 */
    public function createPayment($data, $currency = 'EUR'){
		$order = MerchantOrder::createFrom([
		    'merchantOrderId' => $data['order_id'],
		    'description' => $data['description'],
		    'orderItems' => [],
		    'amount' => Money::fromDecimal($currency, $data['amount']),
		    'shippingDetail' => null,
		    'billingDetail' => null,
		    'customerInformation' => null,
		    'language' => 'NL',
		    'merchantReturnURL' => $data['redirectUrl'],
		    'paymentBrand' => strtoupper($data['method']),
		    'paymentBrandForce' => PaymentBrandForce::FORCE_ONCE
		]);

		$redirectUrl = $this->endpoint->announceMerchantOrder($order);
        return [
            'id'     => '',
            'status' => '',
            'url'    => $redirectUrl,
        ];
    }

    public function __construct($config){

    	if($config['live_mode']){
	    	$this->endpoint = Endpoint::createInstance(
				ENVIRONMENT::PRODUCTION,
				new SigningKey(base64_decode($config['signing_live'])),
				new InMemoryTokenProvider($config['refresh_live'])
			);
	    }else{
	    	$this->endpoint = Endpoint::createInstance(
				ENVIRONMENT::SANDBOX,
				new SigningKey(base64_decode($config['signing_test'])),
				new InMemoryTokenProvider($config['refresh_test'])
			);
	    }



		/*$orderItems = [OrderItem::createFrom([
		    'id' => '1',
		    'name' => 'Test product',
		    'description' => 'Description',
		    'quantity' => 1,
		    'amount' => Money::fromDecimal('EUR', 99.99),
		    'tax' => Money::fromDecimal('EUR', 21.00),
		    'category' => ProductType::DIGITAL,
		    'vatCategory' => VatCategory::HIGH
		])];
		$shippingDetail = Address::createFrom([
		    'firstName' => 'Jan',
		    'middleName' => 'van',
		    'lastName' => 'Veen',
		    'street' => 'Voorbeeldstraat',
		    'postalCode' => '1234AB',
		    'city' => 'Haarlem',
		    'countryCode' => 'NL',
		    'houseNumber' => '5',
		    'houseNumberAddition' => 'a'
		]);
		$billingDetails = Address::createFrom([
		    'firstName' => 'Jan',
		    'middleName' => 'van',
		    'lastName' => 'Veen',
		    'street' => 'Factuurstraat',
		    'postalCode' => '2314BA',
		    'city' => 'Haarlem',
		    'countryCode' => 'NL',
		    'houseNumber' => '15'
		]);
		$customerInformation = CustomerInformation::createFrom([
		    'emailAddress' => 'jan.van.veen@gmail.com',
		    'dateOfBirth' => '20-03-1987',
		    'gender' => 'M',
		    'initials' => 'J.M.',
		    'telephoneNumber' => '0204971111'
		]);
		$order = MerchantOrder::createFrom([
		    'merchantOrderId' => '100',
		    'description' => 'Order ID: 100',
		    'orderItems' => $orderItems,
		    'amount' => Money::fromDecimal('EUR', 99.99),
		    'shippingDetail' => $shippingDetail,
		    'billingDetail' => $billingDetails,
		    'customerInformation' => $customerInformation,
		    'language' => 'NL',
		    'merchantReturnURL' => 'http://beyonit.nl/admin/pay/test/omnikassa',
		    'paymentBrand' => PaymentBrand::IDEAL,
		    'paymentBrandForce' => PaymentBrandForce::FORCE_ONCE
		]);

		$redirectUrl = $endpoint->announceMerchantOrder($order);
		// Redirect user to Rabo OmniKassa
		header('Location: ' . $redirectUrl);
		exit;*/
    }

}
