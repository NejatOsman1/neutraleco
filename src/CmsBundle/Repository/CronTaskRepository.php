<?php

namespace App\CmsBundle\Repository;

use Doctrine\ORM\EntityRepository;
use App\CmsBundle\Entity\CronTask;

/**
 * Cron Task service repository
 */
class CronTaskRepository extends EntityRepository {

    /**
     * Esta función nos arroja las tareas que estan activas y pueden ser ejecutadas
     *
     * @return array
     */
    public function tasksActive() {

        $em = $this->getEntityManager();
        $consult = $em->createQuery("
        SELECT ct FROM CmsBundle:CronTask ct
        WHERE ct.statusTask = :statusTask ");
        $consult->setParameter('statusTask', CronTask::ENABLED);
        return $consult->getResult();
    }

}

?>
