<?php
namespace App\CmsBundle\Classes\Payment;

class Buckaroo
{

    private $config   = [];
    private $live     = false;
    private $base_url = 'testcheckout.buckaroo.nl/json';
    private $key      = '';
    private $secret      = '';

    private $methods  = [
        'ideal' => [
            'label'       => 'iDEAL',
            'minimum'     => null,
            'maximum'     => null,
            'image'       => null,
            'image_large' => null,
            'has_issuers' => true,
        ],
        'paypal' => [
            'label'       => 'PayPal',
            'minimum'     => null,
            'maximum'     => null,
            'image'       => null,
            'image_large' => null,
            'has_issuers' => false,
        ]
    ];
    private $issuers  = [
        'ABNANL2A' => ['label' => 'ABN AMRO', 'image' => null, 'image_large' => null],
        'ASNBNL21' => ['label' => 'ASN Bank', 'image' => null, 'image_large' => null],
        'INGBNL2A' => ['label' => 'ING', 'image' => null, 'image_large' => null],
        'RABONL2U' => ['label' => 'Rabobank', 'image' => null, 'image_large' => null],
        'SNSBNL2A' => ['label' => 'SNS Bank', 'image' => null, 'image_large' => null],
        'RBRBNL21' => ['label' => 'SNS Regio Bank', 'image' => null, 'image_large' => null],
        'TRIONL2U' => ['label' => 'Triodos Bank', 'image' => null, 'image_large' => null],
        'FVLBNL22' => ['label' => 'Van Lanschot', 'image' => null, 'image_large' => null],
        'KNABNL2H' => ['label' => 'Knab', 'image' => null, 'image_large' => null],
        'BUNQNL2A' => ['label' => 'Bunq', 'image' => null, 'image_large' => null],
        'MOYONL21' => ['label' => 'Moneyou', 'image' => null, 'image_large' => null],
    ];

    public function __construct($config){
        $this->config = $config;
        $this->key = $config['key'];
        $this->secret = $config['secret'];
        if($config['live_mode']){
            $this->base_url = 'checkout.buckaroo.nl/json';
        }
    }

    /**
     * Create payment
     *
     * @return String
     */
    public function createPayment($data, $currency = 'EUR'){

        $issuerParams = [];
        if($data['method'] == 'ideal' && !empty($data['issuer'])){
            $issuerParams = [[
                "Name" => "issuer",
                "Value" => $data['issuer']
            ]];
        }

        $postArray = array(
            "Currency" => $currency,
            "AmountDebit" => $data['amount'],
            "Invoice" => (!empty($data['order_id']) ? $data['order_id'] : $data['id']),
            "Description" => $data['description'],
            "ReturnURL" => $data['redirectUrl'],
            // "ReturnURLCancel" => "https://nu.nl",
            // "ReturnURLError" => "https://nu.nl",
            // "ReturnURLReject" => "https://nu.nl",
            "Services" => array(
                "ServiceList" => array(
                    array(
                        "Action" => "Pay",
                        "Name" => $data['method'],
                        "Parameters" => $issuerParams
                    )
                )
            )
        );

        ksort($postArray);

        $post    = json_encode($postArray, JSON_PRESERVE_ZERO_FRACTION);
        $raw_uri = $this->base_url . '/Transaction';
        $nonce   = 'nonce_' . rand(0000000, 9999999);
        $time    = time();
        $hmac    = base64_encode(hash_hmac('sha256', $this->key . 'POST' . strtolower(urlencode($raw_uri)) . $time . $nonce . base64_encode(md5($post, true)), $this->secret, true));

        // REQUEST
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        curl_setopt($curl, CURLOPT_URL, 'https://' . $raw_uri);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: hmac ' .$this->key.':'.$hmac .':'.$nonce . ':'.$time, 'Content-Type: application/json', 'Content-Length: ' . strlen($post)]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($curl);
        $response = json_decode($result, true);

        curl_close($curl);
        return [
            'id'     => $response['Key'],
            'status' => 'waiting',
            'url'    => $response['RequiredAction']['RedirectURL'],
        ];
    }

    /**
     * Get payment
     *
     * @return String
     */
    public function getPayment($payment_id){

        $raw_uri = $this->base_url . '/transaction/status/' . $payment_id;
        $nonce   = 'nonce_' . rand(0000000, 9999999);
        $time    = time();
        $hmac    = base64_encode(hash_hmac('sha256', $this->key . 'GET' . strtolower(urlencode($raw_uri)) . $time . $nonce, $this->secret, true));

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://' . $raw_uri);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: hmac ' .$this->key.':'.$hmac .':'.$nonce . ':'.$time, 'Content-Type: application/json']);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $result = json_decode(curl_exec($curl), true);
        $raw_status = $result['Status']['Code']['Description'];

        switch (strtolower($raw_status)) {
            case 'failed':
                return ['status' => 'failed'];
                break;
            case 'validation failure':
                return ['status' => 'failed'];
                break;
            case 'technical failure':
                return ['status' => 'failed'];
                break;
            case 'cancelled by user':
                return ['status' => 'cancelled'];
                break;
            case 'cancelled by merchant':
                return ['status' => 'cancelled'];
                break;
            case 'rejected':
                return ['status' => 'declined'];
                break;
            case 'pending input':
                return ['status' => 'waiting'];
                break;
            case 'pending processing':
                return ['status' => 'waiting'];
                break;
            case 'awaiting consumer':
                return ['status' => 'waiting'];
                break;
            case 'success':
                return ['status' => 'paid'];
                break;
        }

        dump($raw_status);die();

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
        if(!empty($this->methods) && !empty($this->issuers) && !empty($this->key) && !empty($this->secret)){
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
