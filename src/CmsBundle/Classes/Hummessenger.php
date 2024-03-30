<?php

namespace App\CmsBundle\Classes;

class Hummessenger
{

    protected string $api_url;

    protected string $api_key;

    protected string $api_list_uid;

    protected string $email;

    protected string $name;

    protected string $surname;

    protected string $subscriber_uid;

    protected $subscriber;

    /**
     * @param string $api_url
     * @param string $api_key
     * @param string $api_list_uid
     */
    public function __construct(string $api_url, string $api_key, string $api_list_uid)
    {
        $this->api_url = $api_url;
        $this->api_key = $api_key;
        $this->api_list_uid = $api_list_uid;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getSubscriberUid(): string
    {
        return $this->subscriber_uid;
    }

    /**
     * @param string $subscriber_uid
     */
    public function setSubscriberUid(string $subscriber_uid): void
    {
        $this->subscriber_uid = $subscriber_uid;
    }

    /**
     * @return mixed
     */
    public function getSubscriber()
    {
        return $this->subscriber;
    }

    /**
     * @param mixed $subscriber
     */
    public function setSubscriber($subscriber): void
    {
        $this->subscriber = $subscriber;
    }



    public function getSubscriberByEmail($addSubscriber = false)
    {
        $api_Url_Request = $this->api_url . '/subscribers/email/' . $this->getEmail();

        $responce = $this->sendRequest($api_Url_Request, array(), "GET");

        foreach ($responce->subscribers as $subscriber) {
            $this->setSubscriber($subscriber);
            $this->setSubscriberUid($subscriber->subscriber_uid);
            return $subscriber;
        }

        if($addSubscriber) {
            return $this->addSubscriberByEmail();
        }
        return null;
    }

    public function addSubscriberByEmail()
    {
        $api_Url_Request = $this->api_url . '/subscribers';

        $data = array('EMAIL' => $this->email, 'list_uid' => $this->api_list_uid);

        if (!empty($this->getName())) {
            $data = array_merge($data, ['FIRST_NAME' => $this->getName()]);
        }
        if (!empty($this->getSurname())) {
            $data = array_merge($data, ['LAST_NAME' => $this->getSurname()]);
        }
        $responce = $this->sendRequest($api_Url_Request, $data, 'POST');
        $this->setSubscriberUid($responce->subscriber_uid);

        $api_Url_Request = $this->api_url . '/subscribers/' . $this->getSubscriberUid();

        $responce = $this->sendRequest($api_Url_Request, array(), 'GET');

        $this->setSubscriber($responce->subscriber);

        return $responce->subscriber;

    }

    public function checkList()
    {
        $api_Url_Request = $this->api_url . '/lists/' . $this->api_list_uid;

        $responce = $this->sendRequest($api_Url_Request, array(), "GET");

        if(isset($responce->list)) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     *
     * returns false when in list
     */
    public function checkEmailInList($addSubscriber = false)
    {
        $subscriber = $this->getSubscriberByEmail($addSubscriber);

        if (isset($subscriber->list_uid)) {
            if ($subscriber->list_uid !== $this->api_list_uid) {
                return true;
            }
        }
        return false;
    }

    public function EditToList()
    {
        if ($this->checkList()) {
            if ($this->checkEmailInList(true)) {
                $api_Url_Request = $this->api_url . '/lists/' . $this->api_list_uid . '/subscribers/' . $this->getSubscriberUid() . '/subscribe';

                $responce = $this->sendRequest($api_Url_Request, array(), "POST");
                if (isset($responce['status'])) {
                    return $responce;
                }
                return json_encode(array('responce' => 'er is iets foutgegaan', 'error' => 1));
            } else {
                return json_encode(array('responce' => 'Email staat al in list', 'error' => 0));
            }
        } else {
            return json_encode(array('responce' => 'List bestaat niet', 'error' => 1));
        }
    }

    private function sendRequest($url, $data, $method)
    {
        $curl = curl_init();
        if($method === 'POST'){
            curl_setopt($curl, CURLOPT_POST, true);
        }
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . $this->api_key,
                "Content-Type: application/json",
                "Postman-Token: 41fb5406-d0b7-40e3-b168-2645967314b0",
                "cache-control: no-cache"
            )
        ));
        $responce = curl_exec($curl);
        curl_close($curl);
        return json_decode($responce);
    }
}