<?php
namespace App\CmsBundle\EventListener;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

use App\CmsBundle\Entity\Settings;
use Twig\Environment;

class ExceptionListener
{
    private $em;
    private $container;
    private $twig;

    function __construct(EntityManager $em, $container, Environment $twig) {
        $this->em = $em;
        $this->container = $container;
        $this->twig = $twig;
    }


    public function onKernelException(ExceptionEvent $event)
    {
        // You get the exception object from the received event
        $exception = $event->getThrowable();

        $session = $this->container->get('session');
        $request = $this->container->get('request_stack')->getCurrentRequest() ;

        $language = null;
        $languages = $this->em->getRepository('CmsBundle:Language')->findAll();

		if (empty($request)) {
			$localeInRequest = 'nl';
		} else {
			$localeInRequest = $request->getLocale();
		}
        if ($localeInRequest == 'en') {
            $localeInRequest = 'gb';
        }

        // THIS should be in setRequest() but needs more testing. And other Settings queries need to be adapted.
        $language = $this->em->getRepository('CmsBundle:Language')->findOneBy(['locale' => $localeInRequest]);
        if(empty($language)){
            $language = $this->em->getRepository('CmsBundle:Language')->findOneBy([], ['id' => 'asc']);
        }

        $Settings = null;
		if (!empty($request)) {
			if(preg_match('/(\/[a-z]{2})(\/.*?)?$/', $request->getPathInfo(), $m)){
				$Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['base_uri' => $m[1]]);
			}else{
				$Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy(['host' => str_replace('www.', '', $request->getHttpHost())]);
			}
		} else {
			$Settings = $this->em->getRepository(Settings::class)->findOneBy(['language' => $language]);
		}

        if(empty($Settings)){
            $locale = $session->get('_locale');
            if($locale){
                $language = $this->em->getRepository('CmsBundle:Language')->findOneByLocale($locale);
            }else{
                $language = $languages[0];
            }
        }else{
            $language = $Settings->getLanguage();
        }

        if($language == null){
            // Might happen after changing locale for a language
            $language = $languages[0];
        }

        if(empty($Settings)){
            $Settings = $language->getSettings()->first();
        }

        if(empty($Settings)){
            $Settings = $this->em->getRepository('CmsBundle:Settings')->findOneBy([]);
        }

        if($this->container->getParameter('kernel.environment') == 'dev'){
            dump($exception);
	    die();
        }


        $Page = $this->em->getRepository('CmsBundle:Page')->findOneBy(['label' => 'error', 'enabled' => true, 'settings' => $Settings]);
        if(empty($Page)){
            $Page = $this->em->getRepository('CmsBundle:Page')->findOneBy(['page' => null, 'enabled' => true, 'settings' => $Settings], ['sort' => 'asc']);
        }

        $pageMetatags = [];
        $systemMetatags = [];

        if(!empty($Page)){
            $Page->exception = $exception;
			$Page->mode = $this->container->getParameter('kernel.environment');

            $pageMetatags   = $this->em->getRepository('CmsBundle:Metatag')->getBySystem(0, (int)$Page->getId(), true);
            $systemMetatags = $this->em->getRepository('CmsBundle:Metatag')->getBySystem(1, false, false);
        }

        $response = new Response($this->twig->render('@Cms/page/page.html.twig', array(
            'exception' => $exception,
            'Page' => $Page,
            'metatags' => $pageMetatags,
            'systemMetatags' => $systemMetatags,
            'language' => $language,
            'Settings' => $Settings,
            'languages' => $languages,
            'version' => '',
        )));

        // sends the modified response object to the event
        $event->setResponse($response);
    }
}
