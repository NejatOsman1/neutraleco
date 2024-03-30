<?php
namespace App\CmsBundle\Classes\Payment;

class Multisafepay
{

    private $config   = [];
    private $live     = false;
    private $base_url = 'https://testapi.multisafepay.com/v1/json';
    private $key      = '';

    private $methods  = [];
    private $issuers  = [];

    public function __construct($config){
        $this->config = $config;
        $this->key = $config['api_key_test'];
        if($config['live_mode']){
            $this->key = $config['api_key_live'];
            $this->base_url = 'https://api.multisafepay.com/v1/json';
        }

        $raw_methods = $this->call('/gateways?locale=' . $this->config['locale']);
        foreach($raw_methods['data'] as $method){
            $this->methods[$method['id']] = [
                'label'       => $method['description'],
                'minimum'     => null,
                'maximum'     => null,
                'image'       => null,
                'image_large' => null,
                'has_issuers' => ($method['id'] == 'IDEAL'),
            ];
        }

        $raw_issuers = $this->call('/issuers/IDEAL?locale=' . $this->config['locale']);
        foreach($raw_issuers['data'] as $issuer){
            $this->issuers[$issuer['code']] = [
                'label'   => $issuer['description'],
                'image'   => null,
                'image_large' => null,
            ];
        }
    }

    /**
     * Create payment
     *
     * @return String
     */
    public function createPayment($data, $currency = 'EUR'){
        $response = $this->call('/orders', [
            'type' => 'redirect', // default
            'order_id' => $data['id'],
            'currency' => $currency,
            'amount' => (round($data['amount'], 2)*100), // Cents
            'description' => $data['description'],
            'gateway' => $data['method'],
            'gateway_info' => [
                'issuer_id' => (!empty($data['issuer']) ? $data['issuer'] : null),
            ],
            'payment_options' => [
                'notification_url' => $data['redirectUrl'],
                'redirect_url' => $data['redirectUrl'],
                'cancel_url' => $data['redirectUrl'],
            ],
        ]);
        return [
            'id'     => $response['data']['order_id'],
            'status' => '',
            'url'    => $response['data']['payment_url'],
        ];
    }

    /**
     * Get payment
     *
     * @return String
     */
    public function getPayment($payment_id){
        $response = $this->call('/orders/' . $payment_id);
        $raw_status = $response['data']['status'];

        switch ($raw_status) {
            case 'completed': return ['status' => 'paid']; break;
            // case 'declined': return ['status' => 'declined']; break;
            // case 'opencompleted': return ['status' => 'opencompleted']; break;
            // case 'opendeclined': return ['status' => 'opendeclined']; break;
            // case 'cancelled': return ['status' => 'cancelled']; break;
            case 'void': return ['status' => 'cancelled']; break;
        }

        return ['status' => $raw_status];
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
        if(!empty($this->methods) && !empty($this->issuers)){
            return true;
        }

        return false;
    }

    private function call($uri, $postData = []){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->base_url . $uri);
        if(!empty($postData)){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($postData));
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [ 'api_key: ' . $this->key ]);

        $output = curl_exec ($ch);

        curl_close ($ch);

        return json_decode($output, true);
    }

}
