<?php

namespace App\CmsBundle\Controller;

use App\CmsBundle\Entity\Page;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use App\CmsBundle\Util\Mailer;
use Symfony\Component\HttpFoundation\Response;

class ErrorController extends StorageController
{
    public function __construct()
    {
        // echo '<pre>' . print_r('CONSTRUCT ERROR', true) . '</pre>'; die();
    }

    public function show(FlattenException $exception, Request $request, TranslatorInterface $translator, ContainerInterface $containerInterface, Mailer $mailer): Response
    {
        // dd(func_get_args());
        parent::init($request, $translator, $containerInterface, $mailer);

        // Find page with slug 'error'
        $Page = $this->getDoctrine()->getRepository(Page::class)->findOneBy(['slug' => 'error', 'enabled' => true]);
        if(empty($Page)){
            // Find page with label 'error' if slug cannot be found
            $Page = $this->getDoctrine()->getRepository(Page::class)->findOneBy(['label' => 'error', 'enabled' => true]);
        }
        if(empty($Page)){
            $title = 'Fout opgetreden';
            switch ($exception->getStatusCode()) {
                case 404: $title = 'Pagina niet gevonden'; break;
                case 500: $title = 'Server probleem'; break;
            }

            // Create new temporary error page based on settings
            $Page = new Page();
            $Page->exception = $exception;
            $Page->setLabel('error');
            $Page->setTitle($title);
            $Page->setLanguage($this->language);
            $Page->setSettings($this->Settings);
            $Page->setEnabled(true);
            $Page->setVisible(false);
            $Page->setOptionTitle(false);
            $Page->setController('CmsBundle:Page:page');
            $Page->setSlug('error');
            $Page->setSlugkey('pages_tmperror');
        }

        // Based on Easify page named 'error'
        $response = $this->render('@Cms/page/page.html.twig', $this->attributes([
            'bodyClass'       => 'dynamic',
            'Page'            => $Page,
            // 'customTitle'     => null,
            'blockData'       => null,
            'content'         => [],
            'metatags'        => [],
            'systemMetatags'  => [],
            'bundle_metatags' => [],
            'timer_result'    => $this->Timer->show(false),
            'code'            => $exception->getStatusCode(),
            'message'         => $exception->getStatusText()
        ]));

        return $response;
    }
}