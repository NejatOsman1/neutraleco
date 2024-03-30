<?php

namespace App\CmsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * LanguageRepository
 */
class LanguageRepository extends EntityRepository
{

    const CACHE_KEY = 'QT_LANG';
    const ALIAS = 'QT_LANG';

    /**
     * Depending how you hydrate the entities may make more
     * sense to use cache layer at findAll
     *
     * @param void
     * @return array The entities.
     */
    public function findAll()
    {
        $query = $this->getEntityManager()->createQuery('SELECT ' . self::ALIAS . ' FROM CmsBundle:Language ' . self::ALIAS);
        $query->useResultCache(true, 3600, self::CACHE_KEY);

        $result = $query->getResult();
        return $result;
    }

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

	public function getLanguage($locale){
		$id=1;
		try{
			$sql = "SELECT      L
	                FROM        CmsBundle:Language AS L
	                WHERE   	L.locale LIKE '" . $locale . "'
	                ";
	                // dump($sql);
		    $Language = $this->getEntityManager()->createQuery($sql)->getSingleResult();
			if($Language){
				$id = $Language->getId();
			}else{
				throw new \Exception('Nothing found!');
			}
		}catch(\Exception $e){
			// throw $e;
		}
		return $id;
	}
}
