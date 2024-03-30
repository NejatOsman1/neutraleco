<?php

namespace App\CmsBundle\Util;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Mailer\Exception\TransportException;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;
use Twig\Environment;

/**
 * Trinity mailer wrapper
 */
class Mailer{

    protected $em;
    protected $container;
    protected $mailer;
    protected $twig;
    protected $message;
    protected $Settings;
    protected $language;
    protected $languages;
    protected $request;
    protected $locale;
    protected $ignoreTestmode = false;
    protected $original_receivers = [];
    public $html = '';

    /**
     * Construct the Trinity mailer
     */
    public function __construct(EntityManagerInterface $entityManager, ContainerInterface $container, RequestStack $requestStack, MailerInterface $mailer, Environment $twig) {

        $this->em        = $entityManager;
        $this->container = $container;
        $this->mailer    = $mailer;
        $this->twig      = $twig;
        $this->locale    = $this->container->get('session')->get('_locale');

        if($this->locale){
            $this->language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($this->locale);
        }else{
            $this->languages = $this->em->getRepository('CmsBundle:Language')->findAll();
            if(!empty($this->languages)){
                $this->language = $this->languages[0];
            }
        }

        $this->request = $requestStack->getCurrentRequest();
        if (!empty($this->request)) {
            $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($this->language, str_replace('www.', '', $this->request->getHttpHost()));
        }

        if(is_null($this->Settings) || is_null($this->Settings->getId())){
            $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($this->language);
        }

        $this->message = (new Email());
        if($this->Settings){
            if($this->Settings->getTest()){
                $this->message->from(new Address(explode(';', $this->Settings->getAdminEmail())[0], $this->Settings->getAdminEmailFrom()));
                $this->message->sender(new Address(explode(';', $this->Settings->getAdminEmail())[0]));
                $this->message->returnPath(new Address(explode(';', $this->Settings->getAdminEmail())[0]));
            }else{
                $this->message->from(new Address($this->Settings->getSystemEmail(), $this->Settings->getSystemEmailFrom()));
                $this->message->sender($this->Settings->getSystemEmail());
                $this->message->returnPath($this->Settings->getSystemEmail());
            }
        }

        $this->ignoreTestmode = false;
    }

    public function init($reset = true){
        if ($reset) {
            $this->locale    = $this->container->get('session')->get('_locale');

            if($this->locale){
                $this->language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($this->locale);
            }else{
                $this->languages = $this->em->getRepository('CmsBundle:Language')->findAll();
                $this->language = $this->languages[0];
            }

            if (!empty($this->request)) {
                $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($this->language, str_replace('www.', '', $this->request->getHttpHost()));
            }

            if(is_null($this->Settings) || is_null($this->Settings->getId())){
                $this->Settings = $this->em->getRepository('CmsBundle:Settings')->findByLanguage($this->language);
            }
        }

        $this->message = (new Email());
        if($this->Settings->getTest() && $this->ignoreTestmode == false){
            $this->message->from(new Address(explode(';', $this->Settings->getAdminEmail())[0], $this->Settings->getAdminEmailFrom()));
            $this->message->sender(new Address(explode(';', $this->Settings->getAdminEmail())[0]));
            $this->message->returnPath(new Address(explode(';', $this->Settings->getAdminEmail())[0]));
        }else{
            $this->message->from(new Address($this->Settings->getSystemEmail(), $this->Settings->getSystemEmailFrom()));
            $this->message->sender($this->Settings->getSystemEmail());
            $this->message->returnPath($this->Settings->getSystemEmail());
        }
    }

    /**
     * Ignore test mode
     */
    public function setIgnoreTestmode(){
        $this->ignoreTestmode = true;

        return $this;
    }

    /**
     * E-mail subject
     *
     * @param string $value Email subject
     */
    public function setSubject($value){
        if($this->Settings->getTest() && $this->ignoreTestmode == false){
            $value = 'TEST: ' . $value;
        }
        $this->message->subject($value);

        return $this;
    }

    /**
     * Send email to
     *
     * @param mixed $value Emailaddress
     */
    public function setTo($value){
        if($this->Settings->getTest() && $this->ignoreTestmode == false){

            $this->original_receivers = (!is_array($value) ? [$value] : $value);

            $value = explode(';', $this->Settings->getAdminEmail());
        }else{
            $this->original_receivers = [];
        }

        if(is_array($value)){
            $newValue = [];
            foreach($value as $emailOrIndex => $nameOrEmail){
                if(is_string($emailOrIndex)){
                    $newValue[] = new Address($emailOrIndex, $nameOrEmail);
                }else{
                    $newValue[] = new Address($nameOrEmail);
                }
            }
            $value = $newValue;
        }

        if(is_array($value)){
            foreach($value as $Address){
                $this->message->addTo($Address);
            }
        }else{
            $this->message->to($value);
        }

        return $this;
    }

    /**
     * Send email to
     *
     * @param mixed $value Emailaddress
     */
    public function setFrom($email, $name){
        if($this->Settings->getTest() && $this->ignoreTestmode == false){
            $value = explode(';', $this->Settings->getAdminEmail())[0];
        }
        $this->message->from(new Address($email, $name));

        return $this;
    }

    /**
     * Send reply to
     *
     * @param mixed $value Emailaddress
     */
    public function setReplyTo($email){
        $this->message->setReplyTo($email);

        return $this;
    }

    /**
     * Send Settings
     *
     * @param mixed $value Settings
     */
    public function setSettings($Settings){
        $this->Settings = $Settings;

        return $this;
    }

    /**
     * Send carbon copy to...
     *
     * @param mixed $value Emailaddress
     */
    public function setBcc($value){
        if($this->Settings->getTest() && $this->ignoreTestmode == false){
            $value = explode(';', $this->Settings->getAdminEmail());
        }

        foreach($value as $k => $v){
            $bcc = new Address($v);
            $this->message->addBcc($bcc);
        }

        return $this;
    }

    /**
     * Set sender...
     *
     * @param string $value Emailaddress
     */
    public function setSender($value){
        $this->message->sender($value);
        return $this;
    }

    /**
     * Set return (bounce) path...
     *
     * @param string $value Emailaddress
     */
    public function returnPath($value){
        $this->message->returnPath($value);
        return $this;
    }

    /**
     * Set the HTML body
     *
     * @param string $value HTML body
     */
    public function setHtmlBody($value, $excludeMsg = false){
        if(!$excludeMsg && !empty($this->original_receivers) && $this->ignoreTestmode == false){
            $value = '<div style="background:#eee;padding:10px;font-size:11px;margin-bottom:15px;"><p>Deze e-mail wordt origineel verstuurd naar:</p><p>' . implode(', ', $this->original_receivers) . '</p></div>' . $value;
        }

		if (!empty($this->Settings->getColorSwap())) {
			$value = str_replace(array_keys($this->Settings->getColorSwap()), array_values($this->Settings->getColorSwap()), $value);
		}

        // Fixing special chars in Outlook/Live
        $special_characters = [ 'À' => '&Agrave;', 'à' => '&agrave;', 'Á' => '&Aacute;', 'á' => '&aacute;', 'Â' => '&Acirc;', 'â' => '&acirc;', 'Ã' => '&Atilde;', 'ã' => '&atilde;', 'Ä' => '&Auml;', 'ä' => '&auml;', 'Å' => '&Aring;', 'å' => '&aring;', 'Æ' => '&AElig;', 'æ' => '&aelig;', 'Ç' => '&Ccedil;', 'ç' => '&ccedil;', 'È' => '&Egrave;', 'è' => '&egrave;', 'É' => '&Eacute;', 'é' => '&eacute;', 'Ê' => '&Ecirc;', 'ê' => '&ecirc;', 'Ë' => '&Euml;', 'ë' => '&euml;', 'Ì' => '&Igrave;', 'ì' => '&igrave;', 'Í' => '&Iacute;', 'í' => '&iacute;', 'Î' => '&Icirc;', 'î' => '&icirc;', 'Ï' => '&Iuml;', 'ï' => '&iuml;', 'Ñ' => '&Ntilde;', 'ñ' => '&ntilde;', 'Ò' => '&Ograve;', 'ò' => '&ograve;', 'Ó' => '&Oacute;', 'ó' => '&oacute;', 'Ô' => '&Ocirc;', 'ô' => '&ocirc;', 'Õ' => '&Otilde;', 'õ' => '&otilde;', 'Ö' => '&Ouml;', 'ö' => '&ouml;', 'Ø' => '&Oslash;', 'ø' => '&oslash;', 'Œ' => '&OElig;', 'œ' => '&oelig;', 'ß' => '&szlig;', 'Ù' => '&Ugrave;', 'ù' => '&ugrave;', 'Ú' => '&Uacute;', 'ú' => '&uacute;', 'Û' => '&Ucirc;', 'û' => '&ucirc;', 'Ü' => '&Uuml;', 'ü' => '&uuml;', 'Ÿ' => '&Yuml;', 'ÿ' => '&yuml;'];
        $value = str_replace(array_keys($special_characters), array_values($special_characters), $value);

        $this->message->html($value, 'text/html');

        return $this;
    }

    /**
     * Set the plain body
     *
     * @param string $value plain body
     */
    public function setPlainBody($value){
        if(!empty($this->original_receivers) && $this->ignoreTestmode == false){
            $value = 'Deze e-mail wordt origineel verstuurd naar:' . "\n\n" . implode(', ', $this->original_receivers) . "\n\n" . $value;
        }

        $this->message->text($value, 'text/plain');

        return $this;
    }
    /**
     * Set the HTML body from twig
     *
     * @param string $twigFile file to load
     * @param string $params array of parameters to return to twig file
     */
    public function setTwigBody($twigFile, $params = []){
        if(!empty($this->original_receivers) && isset($params['message']) && $this->ignoreTestmode == false){
            $params['message'] = '<div style="background:#eee;padding:10px;font-size:11px;margin-bottom:15px;"><p>Deze e-mail wordt origineel verstuurd naar:</p><p>' . implode(', ', $this->original_receivers) . '</p></div>' . $params['message'];
        }

        $params['settings'] = $this->Settings;

        $this->html = $this->twig->render(
            $twigFile,
            $params
        );

        $this->html = str_replace(array_keys($this->Settings->getColorSwap()), array_values($this->Settings->getColorSwap()), $this->html);

        $this->setHtmlBody($this->html, true);

        return $this;
    }

    /**
     * Send email
     *
     * @return boolean response status
     */
    public function execute(){
        $this->ignoreTestmode = false;

        $status = false;
        try {
            $this->mailer->send($this->message);
            $status = true;
        } catch (TransportException $e) {
            // some error prevented the email sending; display an
            // error message or try to resend the message
        } catch (\Exception $e) {
            // some error prevented the email sending; display an
            // error message or try to resend the message
        }
        return $status;
    }

    /**
     * Send email (forced, dont wait for nice response)
     *
	 * @deprecated since 4.0 use execute() instead
	 *
     * @return boolean response status
     */
    public function execute_forced(){
        $status = $this->execute();

        /*if($status){
            $spool = $this->mailer->getTransport()->getSpool();
            $transport = $this->container->get('swiftmailer.transport.real');
            if ($spool and $transport){
                $spool->flushQueue($transport);
            }
        }*/

        $this->ignoreTestmode = false;

        return $status;
    }

    /**
     * Get mailer transport
     *
     * @return Mailer
     */
    public function getTransport(){
        return $this->mailer->getTransport();
    }

    /**
     * Attach calandar event string
     *
     * @param array $attendees List of attendees in format ['random@email.nl' => 'Firstname Lastname']
     * @param string $title Short event title (required)
     * @param string $location The event location
     * @param string $description The long description in the event detail
     * @param DateTime $start The start date and time
     * @param DateTime $start The end date and time
     * @param string $email The e-mailadres used as organiser (empty = system defaults from Settings)
     * @param string $name The (full-)name used as organiser (empty = system defaults from Settings)
     *
     * @return Mailer
     */
    public function addCalendarEvent(array $attendees = [], string $title = '', string $location = '', string $description = '', \DateTime $start = null, \DateTime $end = null, $email = null, $name = null){

        $endStr = "";
        if($end instanceof \DateTime){
            $endStr = "\nDTEND:".$end->format('Ymd\THis');
        }

        $now = new \DateTime();

        if($email == null){ $email = $this->Settings->getSystemEmail(); }
        if($name == null){ $name = $this->Settings->getSystemEmailFrom(); }

        $attendeesStr = '';
        $attendeesList = '\n\nDeelnemers:\n';
        foreach($attendees as $att_email => $att_name){
            $attendeesStr .= "\n" . 'ATTENDEE;CN="' . $att_name . '";CUTYPE=INDIVIDUAL;PARTSTAT' . "\n " . '=ACCEPTED:mailto:' . $att_email;
            $attendeesList .= '\n' . $att_name;
        }

        $icsContent = 'BEGIN:VCALENDAR
            VERSION:2.0
            PRODID:-//Easify CMS//Ical event//NL
            CALSCALE:GREGORIAN
            METHOD:PUBLISH
            BEGIN:VEVENT
            DTSTART:' . $start->format('Ymd\THis') . $endStr . '
            DTSTAMP:' . $now->format('Ymd\THis') . '
            ORGANIZER;CN=' . $name . ':mailto:' . $email . '
            UID:' . rand(5, 1500) . $attendeesStr . '
            DESCRIPTION:' . $description . (!empty($attendees) ? $attendeesList : '') . '
            LOCATION:' . $location . '
            SEQUENCE:0
            STATUS:CONFIRMED
            SUMMARY:' . $title . '
            TRANSP:OPAQUE
            END:VEVENT
            END:VCALENDAR'
        ;

        $icsContent = str_replace("\t", "", $icsContent);
        $icsContent = preg_replace("/\n\s{2,}/", "\n", $icsContent);

        $fs        = new Filesystem();
        $tmpFolder = str_replace('src/CmsBundle/Util', 'public/uploads/', __DIR__);
        $fileName  = 'meeting.ics';

        $icfFile = $fs->dumpFile($tmpFolder.$fileName, $icsContent);

        $this->addFile($tmpFolder.$fileName);

        return $this;
    }

    /**
     * Attach file
     *
     * @return Mailer
     */
    public function addFile($file, $filename = null){
        $this->message->attachFromPath($file, $filename);
        return $this;
    }

    /**
     * Attach embedded file
     *
     * @return $cid
     */
    public function embeddedFile($file){
        $cid = $this->message->embed(\Swift_Image::fromPath($file));
        return $cid;
    }

    /**
     * Attach file
     *
     * @return Mailer
     */
    public function addMedia(\App\CmsBundle\Entity\Media $file){
        $this->message->attachFromPath($file->getAbsolutePath(), $file->getLabel());
        return $this;
    }

    public function __toString(){
        return $this->message->getBody();
    }

}
