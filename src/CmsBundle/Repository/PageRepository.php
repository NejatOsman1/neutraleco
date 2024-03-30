<?php

namespace App\CmsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PageRepository
 */
class PageRepository extends EntityRepository
{

    const CACHE_KEY = 'QT_PAGE';
    const ALIAS = 'QT_PAGE';

    /**
     * Override - use cache.
     *
     * @param array $criteria
     * @param array|null $orderBy
     * @return mixed
     */
    public function findOneBy(array $criteria, array $orderBy = null)
    {
        $queryBuilder = $this->createQueryBuilder(self::ALIAS);
        foreach($criteria as $field => $value) {
            if($value == null){
        		$queryBuilder->andWhere(self::ALIAS . ".{$field} IS NULL");
        	}else{
        		$queryBuilder->andWhere(self::ALIAS . ".{$field} = :{$field}")->setParameter($field, $value);
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
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        $queryBuilder = $this->createQueryBuilder(self::ALIAS);
        foreach($criteria as $field => $value) {
        	if($value == null){
        		$queryBuilder->andWhere(self::ALIAS . ".{$field} IS NULL");
        	}else{
        		$queryBuilder->andWhere(self::ALIAS . ".{$field} = :{$field}")->setParameter($field, $value);
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

	/**
	 * Get list of slugs recursive
	 *
	 * @param  \App\CmsBundle\Entity\Page $Page      Current page to start from
	 * @param  string                 $seperator List seperator
	 *
	 * @return string
	 */
	public function getSlugPathByPage(\App\CmsBundle\Entity\Page $Page, $seperator = '/'){
		$pageslug = $Page->getSlug();

		$slugs = array($pageslug);
		// Find upper pages
		$ParentPage = $Page->getPage();
		while($ParentPage != null){
			$slugs[] = $ParentPage->getSlug();
			$ParentPage = $ParentPage->getPage();
		}

		$slugs = array_reverse($slugs);
		foreach($slugs as $k => $v){
			if($k > 0){
				$v = preg_replace('/^[a-z]+\//', '', $slugs[$k]);
				$slugs[$k] = $v;
			}
		}

		return implode($seperator, $slugs);
	}

	/**
	 * Get list of titles recursive
	 *
	 * @param  \App\CmsBundle\Entity\Page $Page      Current page to start from
	 * @param  string                 $seperator List seperator
	 *
	 * @return string
	 */
	public function getTitlePathByPage(\App\CmsBundle\Entity\Page $Page, $seperator = '/'){
		$pagestitle = $Page->getLabel();

		$titles = array($pagestitle);

		// Find upper pages
		$ParentPage = $Page->getPage();
		while($ParentPage != null){
			$titles[] = $ParentPage->getLabel();
			$ParentPage = $ParentPage->getPage();
		}

		return implode($seperator, array_reverse($titles));
	}

	/**
	 * Search
	 *
	 * @param  string
	 *
	 * @return array
	 */
	public function search($q, $language){
		$sql = "SELECT	P
				FROM	CmsBundle:Page AS P
				WHERE	(
					P.label LIKE '%" . $q . "%'
					OR		P.title LIKE '%" . $q . "%'
					OR		P.layout LIKE '%" . $q . "%'
				)
				AND P.language = " . $language->getId() . "
				";
		return $this->getEntityManager()->createQuery($sql)->getResult();
	}

	/**
	 * Find used media
	 *
	 * @param  string
	 *
	 * @return array
	 */
	public function getUsedMedia($pageid){
		$sql = "SELECT	M
				FROM	CmsBundle:Media AS M
				WHERE	(
					M.used_in LIKE '%Page: " . $pageid . "%'
				)
				GROUP BY M.id
				";
		return $this->getEntityManager()->createQuery($sql)->getResult();
	}

	/**
	 * Count unlinked pages (likely after multisite migration)
	 *
	 * @return integer
	 */
	public function countUnlinked(){
		$sql = "SELECT	COUNT(P)
				FROM	CmsBundle:Page AS P
				WHERE	P.settings IS NULL
				";
		return (int)$this->getEntityManager()->createQuery($sql)->getSingleScalarResult();
	}

	public function getUsedBlocksBySettings($Settings)
	{
		$query = $this->getEntityManager()->createQuery(
			'SELECT distinct bw.template_key
			FROM CmsBundle:Page p
			JOIN p.blocks bw
			WHERE p.settings = :settingsId'
		)
		->setParameter('settingsId', $Settings);

		$foundKeys = $query->getResult();

		$template_keys = [];
		// add default
		$template_keys[] = 'framework_empty';
		
		foreach($foundKeys as $rawKey) {
			if (!isset($rawKey['template_key'])) {
				continue;
			}

			$key = $rawKey['template_key'];
			if (!in_array($key, $template_keys)) {
				$template_keys[] = $key;
			}
		}

		return $template_keys;
	}
}
