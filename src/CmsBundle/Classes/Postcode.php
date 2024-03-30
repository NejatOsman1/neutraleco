<?php
namespace App\CmsBundle\Classes;

use ApiPostcode\Client\PostcodeClient;
use ApiPostcode\Exception\InvalidPostcodeException;
use App\CmsBundle\Entity\Settings;

class Postcode
{

    private $provider = null;
    private $Settings = null;

    public function __construct(Settings $Settings)
    {
        $this->Settings = $Settings;

        // Fetch which postcode API is enabled
        if(!empty($Settings->getApiPostcodeToken())){
            $this->provider = 'ApiPostcode';
        }
    }

    public function fetch($postalcode, $number)
    {

        $postalcode = preg_replace('/\s+/', '', strtoupper(trim($postalcode)));
        $number     = trim($number);

        $cacheData = [];
        $cachePath = str_replace('src/CmsBundle/Classes', 'var/cache/', __DIR__);
        $cacheFile = $cachePath . 'postalcode.json';

        if(file_exists($cacheFile)){
            $cacheData = json_decode(file_get_contents($cacheFile), true);
            if(!empty($cacheData) && isset($cacheData[$postalcode . '_' . $number])){
                // Returned cached value
                return $cacheData[$postalcode . '_' . $number];
            }
        }

        $result = null; // Fallback, always return null when something goes wrong

        if(!empty($this->provider))
        {
            switch($this->provider)
            {
                case 'ApiPostcode':
                    // https://www.api-postcode.nl
                    $result = $this->fetchApiPostcode($postalcode, $number); break;
            }

            if(is_array($result)){
                // Cache, no need to fetch twice the same address from an API
                $cacheData[$postalcode . '_' . $number] = $result;
                file_put_contents($cacheFile, json_encode($cacheData));
            }
        }

        return $result;
    }

    private function fetchApiPostcode($postalcode, $number)
    {
        $token = $this->Settings->getApiPostcodeToken();
        $client = new PostcodeClient($token);

        try{
            $address = $client->fetchAddress($postalcode, $number);
            if(!empty($address->getStreet())){
                // Assume it worked okay
                return [
                    'address'    => $address->getStreet(),
                    'number'     => $address->getHouseNumber(),
                    'postalcode' => $address->getZipCode(),
                    'city'       => $address->getCity(),
                    'province'   => $address->getProvince(),
                    'latitude'   => $address->getLatitude(),
                    'longitude'  => $address->getLongitude(),
                ];
            }
        }catch(InvalidPostcodeException $e){
            // Found error
        }

        return null;
    }
}
