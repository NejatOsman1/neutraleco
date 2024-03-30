<?php

namespace App\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Integrations
 *
 * @ORM\Table(name="integrations")
 * @ORM\Entity()
 */
class Integrations
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Settings", inversedBy="integrations")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $settings;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tg_nbl", type="boolean", nullable=true)
     */
    protected $telegram = false;

    /**
     * @var string
     *
     * @ORM\Column(name="tg_cid", type="string", length=255, nullable=true)
     */
    protected $telegram_chat_id = '';

    /**
     * @var string
     *
     * @ORM\Column(name="tg_tkn", type="string", length=255, nullable=true)
     */
    protected $telegram_token = '';

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set settings.
     *
     * @param \App\CmsBundle\Entity\Settings|null $settings
     *
     * @return Integrations
     */
    public function setSettings(\App\CmsBundle\Entity\Settings $settings = null)
    {
        $this->settings = $settings;

        return $this;
    }

    /**
     * Get settings.
     *
     * @return \App\CmsBundle\Entity\Settings|null
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Set telegram.
     *
     * @param bool|null $telegram
     *
     * @return Integrations
     */
    public function setTelegram($telegram = null)
    {
        $this->telegram = $telegram;

        return $this;
    }

    /**
     * Get telegram.
     *
     * @return bool|null
     */
    public function getTelegram()
    {
        return $this->telegram;
    }

    /**
     * Send message via telegram.
     *
     * @return bool|null
     */
    public function sendTelegram($message)
    {
        if($this->getTelegram()){
            // Telegram is enabled
            $url = "https://api.telegram.org/bot" . $this->telegram_token . "/sendMessage?chat_id=" . $this->telegram_chat_id;
            $url = $url . "&text=" . urlencode($message);
            $ch = curl_init();
            $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
            curl_setopt_array($ch, $optArray);
            $result = curl_exec($ch);
            curl_close($ch);
            if(!empty($result)){
                $result = json_decode($result, true);
                if(!empty($result['ok']) && $result['ok'] == true){
                    return true;
                }else{
                    return false;
                }
            }
        }
        return null;
    }

    /**
     * Set telegramChatId.
     *
     * @param string|null $telegramChatId
     *
     * @return Integrations
     */
    public function setTelegramChatId($telegramChatId = null)
    {
        $this->telegram_chat_id = $telegramChatId;

        return $this;
    }

    /**
     * Get telegramChatId.
     *
     * @return string|null
     */
    public function getTelegramChatId()
    {
        return $this->telegram_chat_id;
    }

    /**
     * Set telegramToken.
     *
     * @param string|null $telegramToken
     *
     * @return Integrations
     */
    public function setTelegramToken($telegramToken = null)
    {
        $this->telegram_token = $telegramToken;

        return $this;
    }

    /**
     * Get telegramToken.
     *
     * @return string|null
     */
    public function getTelegramToken()
    {
        return $this->telegram_token;
    }
}
