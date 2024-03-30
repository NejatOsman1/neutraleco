<?php

namespace App\CmsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * SettingsRepository
 */
class SettingsRepository extends EntityRepository
{

    const CACHE_KEY = 'QT_SETT';
    const ALIAS = 'QT_SETT';

    /**
     * Override - use cache.
     *
     * @param array $criteria
     * @param array|null $orderBy
     * @return mixed
     */
    public function findOneBy(array $criteria, array $orderBy = null, array $invalid_criteria = [])
    {
        $queryBuilder = $this->createQueryBuilder(self::ALIAS);
        foreach($criteria as $field => $value) {
            if($value == null){
        		$queryBuilder->andWhere(self::ALIAS . ".{$field} IS NULL");
        	}else{
        		$queryBuilder->andWhere(self::ALIAS . ".{$field} = :{$field}")->setParameter($field, $value);
        	}
        }
        foreach($invalid_criteria as $field => $value) {
            if($value == null){
                $queryBuilder->andWhere(self::ALIAS . ".{$field} NOT IS NULL");
            }else{
                $queryBuilder->andWhere(self::ALIAS . ".{$field} != :{$field}")->setParameter($field, $value);
            }
        }
        if (is_array($orderBy)) {
            foreach ($orderBy as $field => $dir) {
                $queryBuilder->addOrderBy(self::ALIAS . '.' . $field, $dir);
            }
        }
        $queryBuilder->setMaxResults(1);

        $query = $queryBuilder->getQuery();

        $query->useResultCache(true, 3600, self::CACHE_KEY);

        $result = $query->getResult();

        if ($result) return reset($result);

        if(empty($result)){
            return null;
        }

        return $result;
    }

    /**
     * Override - use cache.
     *
     * @param array $criteria
     * @param array|null $orderBy
     * @return mixed
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null, array $invalid_criteria = [])
    {
        $queryBuilder = $this->createQueryBuilder(self::ALIAS);
        foreach($criteria as $field => $value) {
        	if($value == null){
        		$queryBuilder->andWhere(self::ALIAS . ".{$field} IS NULL");
        	}else{
        		$queryBuilder->andWhere(self::ALIAS . ".{$field} = :{$field}")->setParameter($field, $value);
        	}
        }
        foreach($invalid_criteria as $field => $value) {
            if($value == null){
                $queryBuilder->andWhere(self::ALIAS . ".{$field} NOT IS NULL");
            }else{
                $queryBuilder->andWhere(self::ALIAS . ".{$field} != :{$field}")->setParameter($field, $value);
            }
        }
        if (is_array($orderBy)) {
            foreach ($orderBy as $field => $dir) {
                $queryBuilder->addOrderBy(self::ALIAS . '.' . $field, $dir);
            }
        }

	    if (!is_null($offset)){
	        $queryBuilder->setFirstResult($offset);
	    }

	    if (!is_null($limit)){
	        $queryBuilder->setMaxResults($limit);
	    }

        $query = $queryBuilder->getQuery();

        $query->useResultCache(true, 3600, self::CACHE_KEY);

    	$result = $query->getResult();

        return $result;
    }

	public function findByLanguage($language, $host = ''){
		$NL = $this->getEntityManager()->getRepository('CmsBundle:Language')->findOneBy(['locale' => 'nl']);
		$Default = $this->getEntityManager()->getRepository('CmsBundle:Settings')->findOneBy(['language' => $NL, 'host' => $host]);

        if(empty($Default)){
            $Default = $this->getEntityManager()->getRepository('CmsBundle:Settings')->findOneBy(['language' => $NL]);
        }

        $Result = null;
        if(!empty($Default)){
            if(empty($language)){

                $Result = $this->getEntityManager()->getRepository('CmsBundle:Settings')->findOneBy(['host' => $host]);
                if(!$Result){
                    $Result = clone $Default;
                    $Result->setId(null);
                }
            }else{
                $Result = $this->getEntityManager()->getRepository('CmsBundle:Settings')->findOneBy(['language' => $language, 'host' => $host]);
                if(!$Result){
                    $Result = clone $Default;
                    $Result->setLanguage($language);
                    $Result->setId(null);
                }

                if(empty($Result)){
                    $Result = $this->getEntityManager()->getRepository('CmsBundle:Settings')->findOneBy(['language' => $language]);
                    if(!$Result){
                        $Result = clone $Default;
                        $Result->setLanguage($language);
                        $Result->setId(null);
                    }
                }
            }
		}

		return $Result;
	}

    /**
     * Find settings with base URL set
     *
     * @param  string
     *
     * @return array
     */
    public function customLangPath(){
        $sql = "SELECT  S
                FROM    CmsBundle:Settings AS S
                WHERE   S.host LIKE '/%'
                ";
        return $this->getEntityManager()->createQuery($sql)->getResult();
    }

    /**
     * Count settings without site_key
     *
     * @param  string
     *
     * @return array
     */
    public function countWithoutSiteKey(){
        $sql = "SELECT  COUNT(S)
                FROM    CmsBundle:Settings AS S
                WHERE   S.site_key IS NULL OR S.site_key = ''
                ";
        return (int)$this->getEntityManager()->createQuery($sql)->getSingleScalarResult();
    }

    /**
     * Find settings without site_key
     *
     * @param  string
     *
     * @return array
     */
    public function findWithoutSiteKey(){
        $sql = "SELECT  S
                FROM    CmsBundle:Settings AS S
                WHERE   S.site_key IS NULL OR S.site_key = ''
                ";
        return $this->getEntityManager()->createQuery($sql)->getResult();
    }

    /**
     * Find settings with distinct site_key
     *
     * @param  string
     *
     * @return array
     */
    public function findUniqueSites(){
        $sql = "SELECT  S
                FROM    CmsBundle:Settings AS S
                GROUP BY S.site_key
                ORDER BY S.id
                ";
        return $this->getEntityManager()->createQuery($sql)->getResult();
    }

}