<?php

namespace App\CmsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * LanguageTranslationRepository
 */
class LanguageTranslationRepository extends EntityRepository
{

	/**
     * Return all translations for specified token
     * @param type $token
     * @param type $domain
     */
    public function getTranslations($language, $catalogue = "messages"){
        $query = $this->getEntityManager()->createQuery("SELECT t FROM CmsBundle:LanguageTranslation t WHERE t.language = :language AND t.catalogue = :catalogue");
        $query->setParameter("language", $language);
        $query->setParameter("catalogue", $catalogue);

        return $query->getResult();
    }

}
