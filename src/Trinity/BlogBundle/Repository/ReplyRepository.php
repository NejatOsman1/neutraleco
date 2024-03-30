<?php

namespace App\Trinity\BlogBundle\Repository;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

class ReplyRepository extends EntityRepository
{

    public function findByNotApproved($blog)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            "
            SELECT p
            FROM TrinityBlogBundle:Reply p
            JOIN p.entry as e
            WHERE 1=1
            AND p.approved = 0
            AND e.blog = " . $blog->getId() . "
            ORDER BY p.id DESC
            "
        );

        return $query->getResult();
    }
    
    public function findByBlog($blog, $limit)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            "
            SELECT p
            FROM TrinityBlogBundle:Reply p
            JOIN p.entry as e
            WHERE e.blog = " . $blog->getId() . "
            ORDER BY p.id DESC
            "
        );

        return $query->getResult();
    }
    
    public function searchByBlog($blog, $q = '', $limit = null, $offset = null, $Entry = null)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            "
            SELECT p
            FROM TrinityBlogBundle:Reply p
            JOIN p.entry as e
            WHERE e.blog = " . $blog->getId() . "
            " . (
                $q != '' ? "AND (
                    p.firstname like '%" . $q . "%'
                    OR p.lastname like '%" . $q . "%'
                    OR p.email like '%" . $q . "%'
                    OR p.ip like '%" . $q . "%'
                    OR p.comment like '%" . $q . "%'
                )" : ""
            ) . "
            " . ($Entry != null ? "
            AND e.id = " . $Entry->getId() . "
            " : "") . "
            ORDER BY p.id DESC
            "
        );

        if($limit){
            $query->setMaxResults($limit);
        }
        if($offset){
            $query->setFirstResult($offset);
        }

        return $query->getResult();
    }
    
    public function searchByBlogCount($blog, $q = '', $limit = null, $offset = null, $Entry = null)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            "
            SELECT COUNT(p)
            FROM TrinityBlogBundle:Reply p
            JOIN p.entry as e
            WHERE e.blog = " . $blog->getId() . "
            " . (
                $q != '' ? "AND (
                    p.firstname like '%" . $q . "%'
                    OR p.lastname like '%" . $q . "%'
                    OR p.email like '%" . $q . "%'
                    OR p.ip like '%" . $q . "%'
                    OR p.comment like '%" . $q . "%'
                )" : ""
            ) . "
            " . ($Entry != null ? "
            AND e.id = " . $Entry->getId() . "
            " : "") . "
            ORDER BY p.id DESC
            "
        );

        return $query->getSingleScalarResult();
    }
}

