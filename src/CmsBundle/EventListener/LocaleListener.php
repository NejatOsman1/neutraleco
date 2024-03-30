<?php
namespace App\CmsBundle\EventListener;

use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityManagerInterface;

class LocaleListener implements EventSubscriberInterface
{
    private $defaultLocale;
    private $em;

    public function __construct(EntityManagerInterface $em, string $defaultLocale = 'nl')
    {
        $this->defaultLocale = $defaultLocale;
        $this->em = $em;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        $request = $event->getRequest();
        if (!$request->hasPreviousSession()) {
            return;
        }

        /*if (!preg_match('/\/admin/', $_SERVER['REQUEST_URI'])) {
            $language = null;
            $languages = $this->em->getRepository('CmsBundle:Language')->findAll();
            $Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['host' => str_replace('www.', '', $request->getHttpHost())]);
            if(!empty($Settings) && !preg_match('/(^admin_|^admin$)/', $request->get('_route'))){
                $Settings = $Settings;
                $language = $Settings->getLanguage();
            }else{
                $locale = $request->getSession()->get('_locale');
                if($locale){
                    $language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale);
                }else{
                    $language = null;
                }
            }
        }

        if(!preg_match('/\/admin/', $_SERVER['REQUEST_URI']) && $language){
            $request->getSession()->set('_locale', $language->getLocale());
            $request->setLocale($language->getLocale());
        }else{*/
            $isAdmin = preg_match('/(^admin_|^admin$)/', $request->get('_route'));

            $session_name = '_locale';
            if($isAdmin){
                $session_name = 'admin_locale';
            }

            $break = false;

            if($isAdmin){
                // Check is custom admin locale is enabled
                if (($locale = $request->getSession()->get('admin_custom_locale')) && !empty($locale)) {
                    $request->setLocale($locale);
                    $break = true;
                }
            }

            // try to see if the locale has been set as a _locale routing parameter
            if(!$break){
                if (($locale = $request->attributes->get($session_name)) !== null) {
                    $request->getSession()->set($session_name, $locale);
                } elseif ($locale = $request->getSession()->get($session_name)) {
                    $locale = $request->getSession()->get($session_name);
                    $request->setLocale($locale);
                } elseif ($locale = $request->attributes->get('locale')) {
                    // Fallback for Trinity page loader
                    $request->getSession()->set($session_name, $locale);
                    $request->setLocale($locale);
                } else {
                    // if no explicit locale has been set on this request, use one from the session
                    $request->setLocale($request->getSession()->get($session_name, $this->defaultLocale));
                }
            }
        // }
    }

    public static function getSubscribedEvents()
    {
        return array(
            // must be registered after the default Locale listener
            KernelEvents::REQUEST => array(array('onKernelRequest', 15)),
			KernelEvents::EXCEPTION => [['onKernelRequest', 10]],
        );
    }
}