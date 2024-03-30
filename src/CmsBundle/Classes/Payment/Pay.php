<?php
namespace App\CmsBundle\Classes\Payment;

class Pay
{

    private $config  = [];
    private $live    = false;
    private $key    = null;
    private $serviceId    = null;

    private $methods = [
        'ideal' => [
            'label'       => 'iDEAL',
            'minimum'     => null,
            'maximum'     => null,
            'image'       => null,
            'image_large' => null,
            'has_issuers' => false,
        ]
    ];
    private $issuers = [];

    public function __construct($config){
        $this->config = $config;

        $this->key = $config['key_test'];
        $this->serviceId = $config['service_id'];
        if($config['live_mode']){
            $this->live = true;
            $this->key = $config['key_live'];
        }
    }

    /**
     * Create payment
     *
     * @return String
     */
    public function createPayment($data, $currency = 'EUR'){
        # Setup API URL
        $strUrl = 'https://rest-api.pay.nl/v7/Transaction/start/json?';

        # Add arguments
        $arrArguments['token'] = $this->key;
        $arrArguments['serviceId'] = $this->serviceId;
        $arrArguments['ipAddress'] = $_SERVER['REMOTE_ADDR'];
        $arrArguments['amount'] = ($data['amount'] * 100);
        $arrArguments['finishUrl'] = $data['redirectUrl'];
        // $arrArguments['paymentOptionId'] = 10;
        $arrArguments['transaction']['description'] = $data['description'];

        # Prepare and call API URL
        $strUrl .= http_build_query($arrArguments);
        $jsonResult = @file_get_contents($strUrl);
        $result = json_decode($jsonResult);
        if(!empty($result) && !empty($result->transaction) && !empty($result->transaction->transactionId)){
            return [
                'id'     => $result->transaction->transactionId,
                'status' => '',
                'url'    => $result->transaction->paymentURL,
            ];
        }

        return null;
    }

    /**
     * Get payment
     *
     * @return String
     */
    public function getPayment($payment_id){
        # Setup API URL
        $strUrl = 'https://token:' . $this->key . '@rest-api.pay.nl/v7/Transaction/info/json?';

        # Add arguments
        // $arrArguments['token'] = $this->key;
        // $arrArguments['serviceId'] = $this->serviceId;
        $arrArguments['transactionId'] = $payment_id;

        # Prepare and call API URL
        $strUrl .= http_build_query($arrArguments);
        $jsonResult = @file_get_contents($strUrl);
        $result = json_decode($jsonResult);
        if(!empty($result) && !empty($result->paymentDetails)){
            $status = strtolower($result->paymentDetails->stateName);

            if($status == 'cancel'){
                $status = 'cancelled';
            }

            return [
                'status' => $status,
            ];
        }

        return null;
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

}
