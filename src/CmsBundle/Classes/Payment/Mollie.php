<?php
namespace App\CmsBundle\Classes\Payment;

class Mollie
{

    private $config  = [];
    private $live    = false;

    private $Mollie  = null;
    private $methods = [];
    private $issuers = [];

    private $supported_locale = [
        'en_US',
        'nl_NL',
        'nl_BE',
        'fr_FR',
        'fr_BE',
        'de_DE',
        'de_AT',
        'de_CH',
        'es_ES',
        'ca_ES',
        'pt_PT',
        'it_IT',
        'nb_NO',
        'sv_SE',
        'fi_FI',
        'da_DK',
        'is_IS',
        'hu_HU',
        'pl_PL',
        'lv_LV',
        'lt_LT',
    ];

    public function __construct($config){
        $this->config = $config;

        $key = $config['key_test'];
        if($config['live_mode']){
            $this->live = true;
            $key = $config['key_live'];
        }
        if(!empty($key)){
            $this->Mollie = new \Mollie\Api\MollieApiClient;
            $this->Mollie->setApiKey($key);
            if($this->isValid()){
                try {
                    foreach($this->Mollie->methods->allActive(['includeWallets' => 'applepay', 'resource' => 'payments']) as $Method){
                        $this->methods[$Method->id] = [
                            'label'        => $Method->description,
                            'minimum'      => ($Method->minimumAmount ? (float)$Method->minimumAmount->value : 0),
                            'maximum'      => ($Method->maximumAmount ? (float)$Method->maximumAmount->value : 0),
                            'image'        => $Method->image->size1x,
                            'image_large'  => $Method->image->size2x,
                            'image_vector' => $Method->image->svg,
                            'has_issuers'  => ($Method->id == 'ideal'),
                        ];
    
                        if ($Method->id == 'ideal') {
                            $iDEAL = $this->Mollie->methods->get(\Mollie\Api\Types\PaymentMethod::IDEAL, ["include" => "issuers"]);
                            foreach($iDEAL->issuers as $Issuer){
                                $this->issuers[$Issuer->id] = [
                                    'label'        => $Issuer->name,
                                    'image'        => $Issuer->image->size1x,
                                    'image_large'  => $Issuer->image->size2x,
                                    'image_vector' => $Issuer->image->svg,
                                ];
                            }
                        }
                    }
                } catch (\Throwable $th) {
                    //MOLLIE IS DOWN
                } catch (\Mollie\Api\Exceptions\ApiException $th) {
                    //MOLLIE IS DOWN
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
        $data['amount'] = number_format($data['amount'], 2, '.', '');
        $data['amount'] = [
            'currency' => $currency,
            'value' => "{$data['amount']}"
        ];

        if(!isset($data['webhookUrl']) && !preg_match('/local/', $data['redirectUrl'])){
            $data['webhookUrl'] = $data['redirectUrl'];
        }

        if(!empty($locale)){
            // Only set locale if it is supported
            if (in_array($locale, $this->supported_locale)) {
                $data['locale'] = $locale;
            }
        }

        if(isset($data['id'])){
            unset($data['id']);
        }
        if(isset($data['order_id'])){
            unset($data['order_id']);
        }
        if(isset($data['personal'])){
			unset($data['personal']);
        }
        if(isset($data['products'])){
			unset($data['products']);
        }
        // mollie subscription field is named sequenceType
        if(isset($data['subscription'])){
            unset($data['subscription']);
        }

        $Payment = $this->Mollie->payments->create($data);
        return [
            'id'     => $Payment->id,
            'status' => $Payment->status,
            'url'    => $Payment->getCheckoutUrl(),
        ];
    }

    /**
     * Get payment
     *
     * @return String
     */
    public function getPayment($payment_id){
        if(!empty($payment_id)){
            $Payment = $this->Mollie->payments->get($payment_id);
            return [
                'status' => $Payment->status,
            ];
        }
        return [
            'status' => '',
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
        if(!empty($this->Mollie)){
            return true;
        }

        return false;
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
