<?php

namespace App\CmsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MediaRepository
 */
class MediaRepository extends EntityRepository
{

	/**
	 * Search
	 *
	 * @param  string
	 *
	 * @return array
	 */
	public function search($q){
		$sql = "SELECT	M
				FROM	CmsBundle:Media AS M
				WHERE	M.label LIKE '%" . $q . "%'
				";
		return $this->getEntityManager()->createQuery($sql)->getResult();
	}

}
