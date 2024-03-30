<?php

namespace App\CmsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * LogRepository
 */
class LogRepository extends EntityRepository
{

	public function filter($count, $Settings, $filter = null, $value = null, $start = '', $end = '', $limit = null, $offset = null){
		try{
			$end = date('Y-m-d', strtotime($end . '+1 day'));

			$where = "";
			if($filter == 'bundle'){
				$where = "AND L.bundle = '" . $value . "'";
			}
			if($filter == 'ip'){
				$where = "AND L.ip = '" . $value . "'";
			}
			if($filter == 'type'){
				$where = "AND L.type = '" . $value . "'";
			}

			$sql = "SELECT      " . ($count ? "COUNT(L.id)" : "L") . "
					FROM        CmsBundle:Log AS L
					JOIN		L.settings S
					WHERE 		S.id = " . $Settings->getId() . "
					" . $where . "
					AND			(L.date BETWEEN '" . $start . "' AND '" . $end . "')
					ORDER BY	L.date DESC
					";
			if($count){
				return $this->getEntityManager()->createQuery($sql)->getSingleScalarResult();
			}else{
				return $this->getEntityManager()->createQuery($sql)->setMaxResults($limit)->setFirstResult($offset)->getResult();
			}
		}catch( \Exception $e ){}
		return null;
	}

	public function dates($Settings){
		// try{
			$sql = "SELECT      DISTINCT YEAR(`date_posted`), MONTH(`date_posted`)
					FROM        CmsBundle:Log AS L
					JOIN		L.settings S
					WHERE 		S.id = " . $Settings->getId() . "
					ORDER BY	L.date DESC
					";
			return $this->getEntityManager()->createQuery($sql)->getResult();
		// }catch( \Exception $e ){}
		// return null;
	}

}
