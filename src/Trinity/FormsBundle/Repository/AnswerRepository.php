<?php

namespace App\Trinity\FormsBundle\Repository;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

class AnswerRepository extends EntityRepository
{

    public function filter($formid, $doCount = false, $offset = 0, $limit = null, $filter = []){
        $em = $this->getEntityManager();

        $q          = (!empty($filter) && !empty($filter['q']) ? $filter['q'] : null);

        $sort       = (!empty($filter['sort']) && $filter['sort'] != '' ? $filter['sort'] : 'p.id');
        $order      = (!empty($filter['order']) && $filter['order'] == 'asc' ? 'asc' : 'desc');

        // Force $q to array
        if(!is_array($q)){
            $q = [$q];
        }

        $queries = [];
        foreach($q as $part){
            if(empty($part)) continue;
            $queries[] = "
            (
                p.answer LIKE '%" . $part . "%'
            )
            ";
        }

        $sql = "
        SELECT " . ($doCount ? "count(p)" : "p") . "
        FROM TrinityFormsBundle:Answer p
        WHERE 1 = 1
        AND p.form = " . $formid . "

        " . (!empty($queries) ? " AND " . implode(" AND ", $queries) : "") . "

        ORDER BY {$sort} {$order}
        ";

        $query = $em->createQuery($sql);

        if($doCount){
            return $query->getSingleScalarResult();
        }else{
            // dump($query->getResult());
            // die();
        }

        return $query->setFirstResult($offset)->setMaxResults($limit)->getResult();
    }

}

