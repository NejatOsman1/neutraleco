<?php

/**========================================================================
 * ?                                ABOUT
 * @author         :  Roan van der Duim
 * @email          :  roan@beyonit.nl
 * @repo           :  n.v.t
 * @createdOn      :  30-09-2023
 * @updatedOn      :  30-09-2023
 * @description    :  OpenAI class
 *========================================================================**/


namespace App\CmsBundle\Classes;

class Openai
{
    private $Settings = null;
    private $authorization = "Authorization: Bearer";

    public function __construct($Settings)
    {
        $this->Settings = $Settings;

        $this->authorization .= ' ' . $this->Settings->getOpenAIKey();
    }

    // Do a request to the OpenAI Chat API
    public function doPrompt($prompt = 'Hello there'){
        $model = $this->Settings->getOpenAIModel();
        $temp = $this->Settings->getOpenAITemp();

        $prompts = array(
            array(
                "role" => "user",
                "content" => 'Je bent EasifyGPT, je gaat exclusief content genereren voor gebruik in het website CMS EasifyCMS. Je genereert content zonder OpenAI of ChatGPT te noemen. Alle content die je maakt kan gelijk gebruikt worden in het CMS.'
            ),
            array(
                "role" => "assistant",
                "content" => 'Oke! Ik ga nu content genereren voor Easify CMS, wat moet ik doen?'
            ),
            array(
                "role" => "user",
                "content" => $prompt
            )
        );

        $data = array(
            "model" => $model,
            "messages" => $prompts,
            "temperature" => $temp,
        );

        $data_string = json_encode($data);

        $curl = curl_init();

        // Set the headers
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.openai.com/v1/chat/completions",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => array('Content-Type: application/json' , $this->authorization),
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data_string
        ));

        // Send the request
        $response = curl_exec($curl);

        // Decode the response
        $result = json_decode($response, true);

        curl_close($curl);

        if(!empty($result['choices'])){
            return $result['choices'][0]['message']['content'];
        } else {
            return 'Error';
        }
    }
}