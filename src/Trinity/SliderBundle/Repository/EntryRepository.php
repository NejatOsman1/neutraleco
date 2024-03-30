<?php

namespace App\Trinity\SliderBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EntryRepository extends EntityRepository
{
    public function getHighestPosition($sliderId)
    {
        $qb = $this->createQueryBuilder('e');
        $qb->select('e');
        $qb->where('e.slider = :sliderid');
        $qb->setParameter('sliderid', $sliderId);

        $query = $qb->getQuery();

        $result = [];
        foreach ($query->execute() as $entry)
        {
            $result[] = $entry->getPosition();
        }

        if(!empty($result))
        {
            return max($result) + 1;
        }else
            return 1;
    }
}
