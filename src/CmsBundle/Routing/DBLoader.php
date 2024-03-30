<?php
namespace App\CmsBundle\Routing;

use Symfony\Component\Translation\Loader\LoaderInterface;
use \Doctrine\ORM\EntityManager;
use \Symfony\Component\Translation\MessageCatalogue;

class DBLoader implements LoaderInterface{
    private $transaltionRepository;
    private $languageRepository;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager){
        $this->transaltionRepository = $entityManager->getRepository("CmsBundle:LanguageTranslation");
        $this->languageRepository = $entityManager->getRepository("CmsBundle:Language");
    }

    function load($resource, $locale, $domain = 'messages'){
        //Load on the db for the specified local
        $language = $this->languageRepository->getLanguage($locale);

        $translations = $this->transaltionRepository->getTranslations($language, $domain);

        // dump($translations);

        $catalogue = new MessageCatalogue($locale);

        /**@var $translation Frtrains\CommonbBundle\Entity\LanguageTranslation */
        foreach($translations as $translation){
            if(trim($translation->getTranslation()) != ''){
                $catalogue->set($translation->getLanguageToken()->getToken(), $translation->getTranslation(), $domain);
            }
        }

        return $catalogue;
    }
}