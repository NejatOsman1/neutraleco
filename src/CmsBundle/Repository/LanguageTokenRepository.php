<?php

namespace App\CmsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * LanguageTokenRepository
 */
class LanguageTokenRepository extends EntityRepository
{

	public function findWithLanguage($languageId){
		$sql = "SELECT      T.id as tokenid, LT.id as translationid, T.token, LT.catalogue, LT.translation
                FROM        CmsBundle:LanguageToken AS T
                LEFT JOIN   CmsBundle:LanguageTranslation AS LT WITH(LT.languageToken = T AND LT.language = " . $languageId . ")
                ORDER BY    T.id asc
                ";
	    return $this->getEntityManager()->createQuery($sql)->getResult();
	}

}
