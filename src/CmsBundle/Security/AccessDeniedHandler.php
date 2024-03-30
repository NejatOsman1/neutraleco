<?php
namespace App\CmsBundle\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;

class AccessDeniedHandler implements AccessDeniedHandlerInterface
{
    private $em = null;
    private $security = null;
    private $session = null;
    private $kernel = null;
    private $requestStack = null;
    private $container = null;

    public function __construct(EntityManager $entityManager, TokenStorage $security, Session $session, \AppKernel $kernel, RequestStack $requestStack, ContainerInterface $container)
    {
        $this->em       = $entityManager;
        $this->security = $security;
        $this->session  = $session;
        $this->kernel  = $kernel;
        $this->requestStack  = $requestStack;
        $this->container  = $container;
    }

    public function handle(Request $request, AccessDeniedException $accessDeniedException)
    {
        $this->security->setToken(null);
        $this->session->invalidate();

        return new \Symfony\Component\HttpFoundation\RedirectResponse($this->container->get('router')->generate('admin'));
    }
}