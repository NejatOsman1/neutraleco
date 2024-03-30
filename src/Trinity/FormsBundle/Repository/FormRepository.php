<?php

namespace App\Trinity\FormsBundle\Repository;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

class FormRepository extends EntityRepository
{

    /**
     * Count unlinked forms (likely after multisite migration)
     *
     * @return integer
     */
    public function countUnlinked(){
        $sql = "SELECT  COUNT(P)
                FROM    TrinityFormsBundle:Form AS P
                WHERE   P.settings IS NULL
                ";
        return (int)$this->getEntityManager()->createQuery($sql)->getSingleScalarResult();
    }

}

