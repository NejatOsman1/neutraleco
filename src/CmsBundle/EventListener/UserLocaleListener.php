<?php
namespace App\CmsBundle\EventListener;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

/**
 * Stores the locale of the user in the session after the
 * login. This can be used by the LocaleListener afterwards.
 */
class UserLocaleListener
{
    /**
     * @var Session
     */
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * @param InteractiveLoginEvent $event
     */
    public function onInteractiveLogin(InteractiveLoginEvent $event)
    {
        $user = $event->getAuthenticationToken()->getUser();

        // $isAdmin = !preg_match('/(^admin_|^admin$)/', $request->get('_route'));

        $session_name = '_locale';
        // if($isAdmin){
        //     $session_name = 'admin_locale';
        // }

        if (null !== $user->getLocale()) {
            $this->session->set($session_name, $user->getLocale());
        }
    }
}