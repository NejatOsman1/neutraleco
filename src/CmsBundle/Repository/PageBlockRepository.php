<?php

namespace App\CmsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PageBlockRepository
 */
class PageBlockRepository extends EntityRepository
{

	/**
	 * Search
	 *
	 * @param  string
	 *
	 * @return array
	 */
	public function findByData($q1, $q2 = null, $q3 = null){
		$sql = "SELECT	P
				FROM	CmsBundle:PageBlock AS P
				WHERE	(
					P.bundle_data LIKE '%" . $q1 . "%'
					" . ($q2 ? " AND		P.bundle_data LIKE '%" . $q2 . "%' " : "") . "
                                        " . ($q3 ? " AND		P.bundle_data LIKE '%" . $q3 . "%' " : "") . "
				)
				";
		return $this->getEntityManager()->createQuery($sql)->getResult();
	}

	/**
	 * Search
	 *
	 * @param  string
	 *
	 * @return array
	 */
	public function findOneByData($q1, $q2 = null, $q3 = null){
		$sql = "SELECT	P
				FROM	CmsBundle:PageBlock AS P
				WHERE	(
					P.bundle_data LIKE '%" . $q1 . "%'
					" . ($q2 ? " AND		P.bundle_data LIKE '%" . $q2 . "%' " : "") . "
                                        " . ($q3 ? " AND		P.bundle_data LIKE '%" . $q3 . "%' " : "") . "
				)
				";
		return $this->getEntityManager()->createQuery($sql)->setMaxResults(1)->getOneOrNullResult();
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

}
