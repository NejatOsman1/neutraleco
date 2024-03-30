<?php
namespace App\CmsBundle\Classes\Payment;

class Sisow
{

    private $config       = [];
    private $live         = false;
    private $merchantId  = null;
    private $merchantKey = null;
    private $shopId      = null;

    private $methods = [
        'ideal'       => [
            'label' => 'iDEAL', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => true
        ],
        'idealqr'     => [
            'label' => 'iDEAL QR', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'overboeking' => [
            'label' => 'Overboeking vooraf', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'ebill'       => [
            'label' => 'Ebill', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'bunq'        => [
            'label' => 'bunq', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'creditcard'  => [
            'label' => 'Creditcard', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'maestro'     => [
            'label' => 'Maestro', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'vpay'        => [
            'label' => 'V PAY', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'sofort'      => [
            'label' => 'SOFORT Banking', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'giropay'     => [
            'label' => 'Giropay', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'eps'         => [
            'label' => 'EPS', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'mistercash'  => [
            'label' => 'Bancontact', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'belfius'     => [
            'label' => 'Belfius Pay Button', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'homepay'     => [
            'label' => 'ING Home’Pay', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'kbc'         => [
            'label' => 'KBC', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'cbc'         => [
            'label' => 'CBC', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'paypalec'    => [
            'label' => 'PayPal', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'afterpay'    => [
            'label' => 'Afterpay', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'billink'     => [
            'label' => 'Billink achteraf betalen (+ € 1,-)',
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false,
            'fee' => 1
        ],
        'capayable'   => [
            'label' => 'Capayable gespreid betalen', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'focum'       => [
            'label' => 'Focum AchterafBetalen', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'klarna'      => [
            'label' => 'Klarna Factuur', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'vvv'         => [
            'label' => 'VVV Giftcard', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
        'webshop'     => [
            'label' => 'Webshop Giftcard', 
            'minimum' => null, 
            'maximum' => null, 
            'image' => null, 
            'image_large' => null, 
            'has_issuers' => false
        ],
    ];
    private $issuers = [];

    public function __construct($config){
        $this->config = $config;

        if(empty($config['options']) || !is_array($config['options'])){ $config['options'] = []; }
        foreach($this->methods as $k => $m){ if(!in_array($k, $config['options'])){ unset($this->methods[$k]); } }

        $this->merchantId = $config['merchant_id'];
        $this->merchantKey = $config['merchant_key'];
        $this->shopId = $config['shop_id'];

        if($config['live_mode']){
            $this->live = true;
        }

        $issuers = null;
        $this->DirectoryRequest($issuers, false, ($this->live != true));

        foreach($issuers as $k => $v){
            $issuers[$k]['image_large'] = $v['image'];
        }

        $this->issuers = $issuers;
    }

    /**
     * Create payment
     *
     * @return String
     */
    public function createPayment($data, $currency = 'EUR'){
        $this->purchaseId = $data['id'];
        $this->description = (!empty($data['order_id']) ? $data['order_id'] : $data['description']);
        $this->amount = $data['amount'];
        $this->payment = $data['method'];
        if(!empty($data['issuer'])){
            // Only for iDEAL
            $this->issuerId = $data['issuer'];
        }
        $this->returnUrl = $data['redirectUrl'];
        $this->callbackUrl = $data['redirectUrl'];

        $params = [
            'billing_address1'    => (!empty($data['personal']['street']) ? $data['personal']['street'] . ' ' . $data['personal']['number'] : ''),
            'billing_zip'         => (!empty($data['personal']['postalcode']) ? $data['personal']['postalcode'] : ''),
            'billing_city'        => (!empty($data['personal']['city']) ? $data['personal']['city'] : ''),
            'billing_countrycode' => (!empty($data['personal']['country']) ? $data['personal']['country'] : ''),
            'billing_phone'       => (!empty($data['personal']['phone']) ? $data['personal']['phone'] : ''),
            'billing_mail'        => (!empty($data['personal']['email']) ? $data['personal']['email'] : ''),
            'billing_firstname'   => (!empty($data['personal']['firstname']) ? $data['personal']['firstname'] : ''),
            'billing_lastname'    => (!empty($data['personal']['lastname']) ? $data['personal']['lastname'] : ''),
            'ipaddress'           => (!empty($data['personal']['ip']) ? $data['personal']['ip'] : ''),
            'gender'              => (!empty($data['personal']['gender']) ? $data['personal']['gender'] : ''),
            'birthdate'           => (!empty($data['personal']['dob']) ? $data['personal']['dob']->format('dmY') : ''),
        ];

        $i = 1;
        foreach($data['products'] as $p){
            $params['product_id_' .          $i] = $p['sku']                                      ;
            $params['product_description_' . $i] = $p['label']                                    ;
            $params['product_quantity_' .    $i] = $p['amount']                                   ;
            $params['product_netprice_' .    $i] = round($p['price'] * 100)                       ;
            $params['product_total_' .       $i] = round($p['total_price'] * 100)                 ;
            $params['product_nettotal_' .    $i] = round($p['total_price_excl'] * 100)            ;
            $params['product_type_' .        $i] = (!empty($p['type']) ? $p['type'] : 'physical') ;
            $params['product_taxrate_' .     $i] = $p['tax_perc']                                 ;
            $i++;
        }

        // die( "<pre>" . print_r( $params, 1 ) . "</pre>" );

        if (($ex = $this->TransactionRequest($params)) < 0) {
            return $this->errorMessage . ' (' . $this->errorCode . ') | ' . $this->response;
        }
        return [
            'id'     => $this->trxId,
            'status' => '',
            'url'    => $this->issuerUrl,
            'raw_response' => $this->response,
        ];
    }

    /**
     * Get payment
     *
     * @return String
     */
    public function getPayment($payment_id){
        $this->StatusRequest($payment_id);
        if(!empty($this->status)){
            return ['status' => strtolower($this->status)];
        }
        return null;
    }


    /**
     * Get payment methods
     *
     * @return array
     */
    public function getMethods($test = false){

        if($test){
            $m = $this->methods;
            $m['billink'] = [
                'label' => 'Billink achteraf betalen (+ € 1,-)',
                'minimum' => null, 
                'maximum' => null, 
                'image' => null, 
                'image_large' => null, 
                'has_issuers' => false,
                'fee' => 1
            ];

            return $m;
        }

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
    protected static $lastcheck;

    public $response;

    // Transaction data
    public $payment;    // empty=iDEAL; sofort=DIRECTebanking; mistercash=MisterCash; ...
    public $issuerId;   // mandatory; sisow bank code
    public $purchaseId; // mandatory; max 16 alphanumeric
    public $entranceCode;   // max 40 strict alphanumeric (letters and numbers only)
    public $description;    // mandatory; max 32 alphanumeric
    public $amount;     // mandatory; min 0.45
    public $notifyUrl;
    public $returnUrl;  // mandatory
    public $cancelUrl;
    public $callbackUrl;

    // Status data
    public $status;
    public $timeStamp;
    public $consumerAccount;
    public $consumerName;
    public $consumerCity;
    
    // Invoice data
    public $invoiceNo;
    public $documentId;

    // Result/check data
    public $trxId;
    public $issuerUrl;

    // Error data
    public $errorCode;
    public $errorMessage;

    // Status
    const statusSuccess = "Success";
    const statusCancelled = "Cancelled";
    const statusExpired = "Expired";
    const statusFailure = "Failure";
    const statusOpen = "Open";

    private function error() {
        $this->errorCode = $this->parse("errorcode");
        $this->errorMessage = urldecode($this->parse("errormessage"));
    }

    private function parse($search, $xml = false) {
        if ($xml === false) {
            $xml = $this->response;
        }
        if (($start = strpos($xml, "<" . $search . ">")) === false) {
            return false;
        }
        $start += strlen($search) + 2;
        if (($end = strpos($xml, "</" . $search . ">", $start)) === false) {
            return false;
        }
        return substr($xml, $start, $end - $start);
    }

    public function send($method, array $keyvalue = NULL, $return = 1) {
        $url = "https://www.sisow.nl/Sisow/iDeal/RestHandler.ashx/" . $method;
        // dump($url);
        $options = array(
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_URL => $url,
            CURLOPT_FRESH_CONNECT => 1,
            CURLOPT_RETURNTRANSFER => $return,
            CURLOPT_FORBID_REUSE => 1,
            CURLOPT_TIMEOUT => 120,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POSTFIELDS => $keyvalue == NULL ? "" : http_build_query($keyvalue, '', '&'));
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $this->response = curl_exec($ch);
        curl_close($ch); 
        if (!$this->response) {
            return false;
        }
        return true;
    }

    private function getDirectory() {
        $diff = 24 * 60 *60;
        if (self::$lastcheck)
            $diff = time() - self::$lastcheck;
        if ($diff < 24 *60 *60)
            return 0;
        if (!$this->send("DirectoryRequest"))
            return -1;
        $search = $this->parse("directory");
        if (!$search) {
            $this->error();
            return -2;
        }
        $this->issuers = array();
        $iss = explode("<issuer>", str_replace("</issuer>", "", $search));
        foreach ($iss as $k => $v) {
            $issuerid = $this->parse("issuerid", $v);
            $issuername = $this->parse("issuername", $v);
            if ($issuerid && $issuername) {
                $this->issuers[$issuerid] = $issuername;
            }
        }
        self::$lastcheck = time();
        return 0;
    }

    // DirectoryRequest
    public function DirectoryRequest(&$output, $select = false, $test = false) {
        if ($test === true) {
            // kan ook via de gateway aangevraagd worden, maar is altijd hetzelfde
            if ($select === true) {
                $output = "<select id=\"sisowbank\" name=\"issuerid\">";
                $output .= "<option value=\"99\">Sisow Bank (test)</option>";
                $output .= "</select>";
            }
            else {
                $output = array("99" => ['label' => "Sisow Bank (test)", 'image' => null]);
            }
            return 0;
        }
        $output = false;
        $ex = $this->getDirectory();
        if ($ex < 0) {
            return $ex;
        }
        if ($select === true) {
            $output = "<select id=\"sisowbank\" name=\"issuerid\">";
        }
        else {
            $output = array();
        }
        foreach ($this->issuers as $k => $v) {
            if ($select === true) {
                $output .= "<option value=\"" . $k . "\">" . $v . "</option>";
            }
            else {
                $output[$k] = ['label' => $v, 'image' => null];
            }
        }
        if ($select === true) {
            $output .= "</select>";
        }
        return 0;
    }

    // TransactionRequest
    public function TransactionRequest($keyvalue = NULL) {
        $this->trxId = $this->issuerUrl = "";
        if (!$this->merchantId) {
            $this->errorMessage = 'No Merchant ID';
            return -1;
        }
        if (!$this->merchantKey) {
            $this->errorMessage = 'No Merchant Key';
            return -2;
        }
        if (!$this->purchaseId) {
            $this->errorMessage = 'No purchaseid';
            return -3;
        }
        if ($this->amount < 0.45) {
            $this->errorMessage = 'Amount < 0.45';
            return -4;
        }
        if (!$this->description) {
            $this->errorMessage = 'No description';
            return -5;
        }
        if (!$this->returnUrl) {
            $this->errorMessage = 'No returnurl';
            return -6;
        }
        if (!$this->issuerId && !$this->payment) {
            $this->errorMessage = 'No issuerid or no payment method';
            return -7;
        }
        if (!$this->entranceCode)
            $this->entranceCode = $this->purchaseId;
        $pars = array();
        $pars["merchantid"] = $this->merchantId;
        $pars["shopid"] = $this->shopId;
        $pars["payment"] = $this->payment;
        $pars["issuerid"] = $this->issuerId;
        $pars["purchaseid"] = $this->purchaseId; 
        $pars["amount"] = round($this->amount * 100);
        $pars["description"] = $this->description;
        $pars["entrancecode"] = $this->entranceCode;
        $pars["returnurl"] = $this->returnUrl;
        $pars["cancelurl"] = $this->cancelUrl;
        $pars["callbackurl"] = $this->callbackUrl;
        $pars["notifyurl"] = $this->notifyUrl;
        $pars["sha1"] = sha1($this->purchaseId . $this->entranceCode . round($this->amount * 100) . $this->shopId . $this->merchantId . $this->merchantKey);
        if ($keyvalue) {
            foreach ($keyvalue as $k => $v) {
                if(!empty($v)){
                    $pars[$k] = $v;
                }
            }
        }
        // die( "<pre>" . print_r( $pars, 1 ) . "</pre>" );
        if (!$this->send("TransactionRequest", $pars)){
            if(empty($this->errorCode)){
                $this->errorCode = '-8';
            }
            return -8;
        }
        $this->trxId = $this->parse("trxid");
        $this->issuerUrl = urldecode($this->parse("issuerurl"));
        $this->invoiceNo = $this->parse("invoiceno");
        $this->documentId = $this->parse("documentid");
        if (!$this->issuerUrl) {
            $this->error();
            if(empty($this->errorCode)){
                $this->errorCode = '-9';
            }
            return -9;
        }
        return 0;
    }

    // StatusRequest
    public function StatusRequest($trxid = false) {
        if ($trxid === false)
            $trxid = $this->trxId;
        if (!$this->merchantId){
            if(empty($this->errorCode)){
                $this->errorCode = '-1';
            }
            return -1;
        }
        if (!$this->merchantKey){
            if(empty($this->errorCode)){
                $this->errorCode = '-2';
            }
            return -2;
        }
        if (!$trxid){
            if(empty($this->errorCode)){
                $this->errorCode = '-3';
            }
            return -3;
        }
        $this->trxId = $trxid;
        $pars = array();
        $pars["merchantid"] = $this->merchantId;
        $pars["shopid"] = $this->shopId;
        $pars["trxid"] = $this->trxId;
        $pars["sha1"] = sha1($this->trxId . $this->shopId . $this->merchantId . $this->merchantKey);
        if (!$this->send("StatusRequest", $pars))
            return -4;
        $this->status = $this->parse("status");
        if (!$this->status) {
            $this->error();
            if(empty($this->errorCode)){
                $this->errorCode = '-5';
            }
            return -5;
        }
        $this->timeStamp = $this->parse("timestamp");
        $this->amount = $this->parse("amount") / 100.0;
        $this->consumerAccount = $this->parse("consumeraccount");
        $this->consumerName = $this->parse("consumername");
        $this->consumerCity = $this->parse("consumercity");
        $this->purchaseId = $this->parse("purchaseid");
        $this->description = $this->parse("description");
        $this->entranceCode = $this->parse("entrancecode");
        return 0;
    }

    // RefundRequest
    public function RefundRequest($trxid) {
        $pars = array();
        $pars["merchantid"] = $this->merchantId;
        $pars["trxid"] = $trxid;
        $pars["sha1"] = sha1($trxid . $this->merchantId . $this->merchantKey);
        if (!$this->send("RefundRequest", $pars)){
            if(empty($this->errorCode)){
                $this->errorCode = '-1';
            }
            return -1;
        }
        $this->documentId = $this->parse("refundid");
        if (!$this->documentId) {
            $this->error();
            if(empty($this->errorCode)){
                $this->errorCode = '-2';
            }
            return -2;
        }
        return $this->documentId;
    }

    // InvoiceRequest
    public function InvoiceRequest($trxid, $keyvalue = NULL) {
        $pars = array();
        $pars["merchantid"] = $this->merchantId;
        $pars["trxid"] = $trxid;
        $pars["sha1"] = sha1($trxid . $this->merchantId . $this->merchantKey);
        if ($keyvalue) {
            foreach ($keyvalue as $k => $v) {
                $pars[$k] = $v;
            }
        }
        if (!$this->send("InvoiceRequest", $pars)){
            if(empty($this->errorCode)){
                $this->errorCode = '-1';
            }
            return -1;
        }
        $this->invoiceNo = $this->parse("invoiceno");
        if (!$this->invoiceNo) {
            $this->error();
            if(empty($this->errorCode)){
                $this->errorCode = '-2';
            }
            return -2;
        }
                
        $this->documentId = $this->parse("documentid");
        return 0; //$this->invoiceNo;
    }

    // CancelReservationRequest
    public function CancelReservationRequest($trxid) {
        $pars = array();
        $pars["merchantid"] = $this->merchantId;
        $pars["trxid"] = $trxid;
        $pars["sha1"] = sha1($trxid . $this->merchantId . $this->merchantKey);
        if (!$this->send("CancelReservationRequest", $pars)){
            if(empty($this->errorCode)){
                $this->errorCode = '-1';
            }
            return -1;
        }
        return 0;
    }

    // CreditInvoiceRequest
    public function CreditInvoiceRequest($trxid, $keyvalue = NULL) {
        $pars = array();
        $pars["merchantid"] = $this->merchantId;
        $pars["trxid"] = $trxid;
        $pars["sha1"] = sha1($trxid . $this->merchantId . $this->merchantKey);
        if ($keyvalue) {
            foreach ($keyvalue as $k => $v) {
                $pars[$k] = $v;
            }
        }
        if (!$this->send("CreditInvoiceRequest", $pars)){
            if(empty($this->errorCode)){
                $this->errorCode = '-1';
            }
            return -1;
        }
        $this->invoiceNo = $this->parse("invoiceno");
        if (!$this->invoiceNo) {
            $this->error();
            if(empty($this->errorCode)){
                $this->errorCode = '-2';
            }
            return -2;
        }
        $this->documentId = $this->parse("documentid");
        return 0; //$this->invoiceNo;
    }

}
