<?php

namespace App\CmsBundle\Repository;

use App\CmsBundle\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;

/**
 * UserRepository
 */
class UserRepository extends ServiceEntityRepository implements UserLoaderInterface
{

    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, User::class);
    }

    public function loadUserByIdentifier(string $usernameOrEmail): ?User
    {
        $entityManager = $this->getEntityManager();

        return $entityManager->createQuery(
                'SELECT u
                FROM CmsBundle:User u
                WHERE u.username = :query
                OR u.email = :query'
            )
            ->setParameter('query', $usernameOrEmail)
            ->getOneOrNullResult();
    }

    public function loadUserByUsername($username)
    {
        $entityManager = $this->getEntityManager();

        return $entityManager->createQuery(
                'SELECT u
                FROM CmsBundle:User u
                WHERE u.username = :query
                OR u.email = :query'
            )
            ->setParameter('query', $username)
            ->getOneOrNullResult();
    }

    public function filter($doCount = false, $offset = 0, $limit = 20, $filter = [], $hideWebshopUsers = false){
        $em = $this->getEntityManager();

        $q      = (!empty($filter) && !empty($filter['q']) ? $filter['q'] : null);
        $role   = (!empty($filter) && !empty($filter['role']) ? $filter['role'] : null);
        $status = (!empty($filter) && isset($filter['status']) && $filter['status'] != '' ? $filter['status'] : null);
        
        $sort   = (!empty($filter['sort']) && $filter['sort'] != '' ? $filter['sort'] : 'p.id');
        $order  = (!empty($filter['order']) && $filter['order'] == 'asc' ? 'asc' : 'desc');

        // Force $q to array
        if(!is_array($q)){
            $q = [$q];
        }

        $queries = [];
        foreach($q as $part){
            if(empty($part)) continue;
            $queries[] = "
            (
                p.id LIKE '%" . $part . "%' OR
                p.firstname LIKE '%" . $part . "%' OR
                p.lastname LIKE '%" . $part . "%' OR
                p.email LIKE '%" . $part . "%'
            )
            ";
        }

        $sql = "
        SELECT " . ($doCount ? "count(p)" : "p") . "
        FROM CmsBundle:User p
        WHERE p.username != 'admin'
        AND p.id != 1
        AND p.username != 'guest'
        AND p.moderation = 0

        " . (!empty($queries) ? " AND " . implode(" AND ", $queries) : "") . "
        " . (!empty($role) ? ($role == 'other' ? " AND p.roles NOT LIKE '%admin%' AND p.roles NOT LIKE '%user%'" : " AND p.roles LIKE '%" . $role . "%'") : "") . "
        " . ($status !== null ? " AND p.enabled = " . $status . "" : "") . "

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

    public function getLatest($limit = 0){
        try{
            $sql = "SELECT      U
                    FROM        CmsBundle:User AS U
                    WHERE       U.username != 'admin'
                    ORDER BY    U.id DESC
                    ";
            if( $limit > 0 ){
                return $this->getEntityManager()->createQuery($sql)->setFirstResult(0)->setMaxResults($limit)->getResult();
            }
            return $this->getEntityManager()->createQuery($sql)->getResult();
        }catch( \Exception $e ){ die( "<pre>" . print_r( $e->getMessage(), 1 ) . "</pre>" );}
        return null;
    }

    public function countModeration(){
        try{
            $sql = "SELECT      COUNT(U)
                    FROM        CmsBundle:User AS U
                    WHERE       U.moderation = 1
                    ";
            return $this->getEntityManager()->createQuery($sql)->getSingleScalarResult();
        }catch( \Exception $e ){ die( "<pre>" . print_r( $e->getMessage(), 1 ) . "</pre>" );}
        return 0;
    }

	public function getModeration(){
		try{
			$sql = "SELECT      U
					FROM        CmsBundle:User AS U
					WHERE		U.moderation = 1
					";
			return $this->getEntityManager()->createQuery($sql)->getResult();
		}catch( \Exception $e ){ die( "<pre>" . print_r( $e->getMessage(), 1 ) . "</pre>" );}
		return [];
	}

    public function getAdmins(){
        $sql = "SELECT      U
                FROM        CmsBundle:User AS U
                WHERE       U.roles LIKE '%ROLE_ADMIN%'
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
	public function search($q){
		$sql = "SELECT	U
				FROM	CmsBundle:User AS U
				WHERE	U.username != 'admin'
				AND		(
							U.username LIKE '%" . $q . "%' OR
							U.firstname LIKE '%" . $q . "%' OR
							U.lastname LIKE '%" . $q . "%' OR
							U.email LIKE '%" . $q . "%'
						)
				";
		return $this->getEntityManager()->createQuery($sql)->getResult();
	}

	public function findUserByUsernameOrEmail($user)
	{
		$sql = "SELECT	U
			FROM	CmsBundle:User AS U
			WHERE	U.username = '" . $user . "'
			OR		U.email = '" . $user . "'";

		return $this->getEntityManager()->createQuery($sql)->getOneOrNullResult();
	}

	public function findUserByEmail($user)
	{
		$sql = "SELECT	U
			FROM	CmsBundle:User AS U
			WHERE	U.email = '" . $user . "'";

		return $this->getEntityManager()->createQuery($sql)->getOneOrNullResult();
	}

	public function findUserByUsername($user)
	{
		$sql = "SELECT	U
			FROM	CmsBundle:User AS U
			WHERE	U.username = '" . $user . "'";

		return $this->getEntityManager()->createQuery($sql)->getOneOrNullResult();
	}
}
