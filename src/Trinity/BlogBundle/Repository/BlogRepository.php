<?php

namespace App\Trinity\BlogBundle\Repository;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

class BlogRepository extends EntityRepository
{

    /**
     * Count unlinked blogs (likely after multisite migration)
     *
     * @return integer
     */
    public function countUnlinked(){
        $sql = "SELECT  COUNT(P)
                FROM    TrinityBlogBundle:Blog AS P
                WHERE   P.settings IS NULL
                ";
        return (int)$this->getEntityManager()->createQuery($sql)->getSingleScalarResult();
    }

}

