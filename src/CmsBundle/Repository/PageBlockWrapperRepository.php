<?php

namespace App\CmsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PageBlockRepository
 */
class PageBlockWrapperRepository extends EntityRepository
{

	/**
	 * Find used media
	 *
	 * @param  string
	 *
	 * @return array
	 */
	public function getWithAnchor(){
		$sql = "SELECT	W
				FROM	CmsBundle:PageBlockWrapper AS W
				WHERE	W.anchor != ''
				ORDER BY W.pos ASC
				";
		return $this->getEntityManager()->createQuery($sql)->getResult();
	}

	/**
	 *
	 * @param  string
	 *
	 * @return array
	 */
	public function findAllCssClasses(){
		$sql = "SELECT	DISTINCT(W.css_class) as css_class
				FROM	CmsBundle:PageBlockWrapper AS W
				WHERE W.css_class != ''
				";
		return $this->getEntityManager()->createQuery($sql)->getResult();
	}
}
