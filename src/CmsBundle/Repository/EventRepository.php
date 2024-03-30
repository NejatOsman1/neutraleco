<?php

namespace App\CmsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * EventRepository
 */
class EventRepository extends EntityRepository
{

    public function findUpcoming() {
        $em = $this->getEntityManager();
        $query = $em->createQuery("
        SELECT e
        FROM CmsBundle:Event e
        WHERE e.start > '" . date('Y-m-d H:i:s') . "'
        ORDER BY e.start ASC
        ");
        return $query->getResult();
    }

}
