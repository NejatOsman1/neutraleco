<?php

namespace App\Trinity\BlogBundle\Repository;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

class EntryRepository extends EntityRepository
{

    public function filter($blogid, $doCount = false, $offset, $limit, $filter){
        $em = $this->getEntityManager();

        $q          = (!empty($filter) && !empty($filter['q']) ? $filter['q'] : null);

        $sort       = (!empty($filter['sort']) && $filter['sort'] != '' ? $filter['sort'] : 'p.id');
        $order      = (!empty($filter['order']) && $filter['order'] == 'asc' ? 'asc' : 'desc');
        $category      = (!empty($filter['category']) ? $filter['category'] : null);

        $concept = null;
        if($filter['concept'] != "")
        {
            if ($filter['concept'] == '1')
            {
                $concept = "AND p.concept = 1";
            }else {
                $concept = "AND p.concept = 0";
            }
        }

        // Force $q to array
        if(!is_array($q)){
            $q = [$q];
        }

        $queries = [];
        $joins = [];
        foreach($q as $part){
            if(empty($part)) continue;
            $queries[] = "
            (
                p.id LIKE '%" . $part . "%' OR
                p.label LIKE '%" . $part . "%'
            )
            ";
        }

        if($category){
            $joins[] = "
            JOIN p.category c
            ";
            $queries[] = "
            c.id = " . $category . "
            ";
        }

        $sql = "
        SELECT " . ($doCount ? "count(p)" : "p") . "
        FROM TrinityBlogBundle:Entry p
        " . (!empty($joins) ? implode("\n", $joins) : "") . "
        WHERE 1 = 1
        AND p.blog = " . $blogid . "
       " . $concept . "

        " . (!empty($queries) ? " AND " . implode(" AND ", $queries) : "") . "

        ORDER BY {$sort} {$order},p.id DESC
        ";
        // dump($sql);die();

        $query = $em->createQuery($sql);

        if($doCount){
            return $query->getSingleScalarResult();
        }else{
            // dump($query->getResult());
            // die();
        }

        return $query->setFirstResult($offset)->setMaxResults($limit)->getResult();
    }

    public function findByNot(array $criteria2, array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $expr = $this->getEntityManager()->getExpressionBuilder();

        $qb->select('Entry')
            ->from('TrinityBlogBundle:Entry', 'Entry');

        foreach ($criteria as $field => $value) {
            if (is_null($value)) {
                $qb->andWhere('Entry.' . $field . ' IS NOT NULL');
            } else {
                $qb->andWhere($expr->neq('Entry.' . $field, $value));
            }
        }
        foreach ($criteria2 as $field => $value) {
            $qb->andWhere($expr->eq('Entry.' . $field, $value));
        }

        $qb->andWhere('datePublish <= :date');
        $qb->setParameter('date', new \DateTime('now'));

        if ($orderBy) {
            foreach ($orderBy as $field => $order) {
                $qb->addOrderBy('Entry.' . $field, $order);
            }
        }
        if ($limit)
            $qb->setMaxResults($limit);

        if ($offset)
            $qb->setFirstResult($offset);
        $q = $qb->getQuery();
        return $q->getResult();
    }

//    public function getMostViewedByCategory()
//    {
//        $sql = "
//	        SELECT		C
//	        FROM		TrinityBlogBundle:Category AS C
//        ";
//
//        $result = $this->getEntityManager()->createQuery($sql)->getResult();
//        foreach($result as $cat){
//
//            $sql = "
//		        SELECT		E
//		        FROM		TrinityBlogBundle:Entry AS E
//		        WHERE 		E.category IN (" . $cat->getId() . ")
//		        GROUP BY 	E.id
//		        ORDER BY 	E.readcount DESC
//	        ";
////
//
//            $entry = $this->getEntityManager()->createQuery($sql)->getResult();
//            dump($entry);die;
//
////	        die();
//        }
////
////        die();
//    }

    /**
     * Find a number of random posts which are not displayed yet
     *
     * @param integer $limit Number of entries to return
     * @param array $neq Array of disallowed blog Entry id's
     * @return ArrayCollection
     */
    public function findByRandom($Blog, $limit = 8, $neq = []) {
        $qb = $this->createQueryBuilder('ran');

        $qb->andWhere('ran.blog = ' . $Blog->getId());

        $qb->andWhere('ran.datePublish <= :date');
        $qb->setParameter('date', new \DateTime('now'));

        foreach ($neq as $key => $id) {
            $qb->andWhere('ran.id != :id' . $key);
            $qb->setParameter('id' . $key, $id);
        }

        $query = $qb->getQuery();

        $entries = $query->execute();

        $max = (count($entries) < $limit) ? count($entries) : $limit;

        if (!empty($entries))
        {
            $entity_ids = array_rand($entries, $max);
        }else{
            $entity_ids = [];
        }

        $random_entities = new ArrayCollection();

        foreach ((array)$entity_ids as $eid) {
            $random_entities[] = $entries[$eid];
        }

        return $random_entities;
    }

    public function findEntriesByCategoryName($categoryName = '', $limit = null, $offset = 0){
        $em = $this->getEntityManager();

        if(!empty($categoryName)){
            $sql = "SELECT p
            FROM TrinityBlogBundle:Entry p
            JOIN p.category c
            WHERE c.category = '" . $categoryName . "'
            AND p.concept = 0
            AND p.datePublish <= '" . date('Y-m-d H:i:s') . "'
            AND (
                p.datePublishEnd >= '" . date('Y-m-d H:i:s') . "'
            OR
                p.datePublishEnd IS NULL
            )
            ORDER BY p.datePublish DESC";
        }else{
            $sql = "SELECT p
            FROM TrinityBlogBundle:Entry p
            WHERE p.concept = 0
            AND p.datePublish <= '" . date('Y-m-d H:i:s') . "'
            AND (
                p.datePublishEnd >= '" . date('Y-m-d H:i:s') . "'
            OR
                p.datePublishEnd IS NULL
            )
            ORDER BY p.datePublish DESC";
        }
        $query = $em->createQuery($sql);

        if ($limit) {
            $query->setMaxResults($limit);
        }
        $query->setFirstResult($offset);

        return $query->getResult();
    }

    public function findEntriesByCategory($blog, $categories, $concept = false, $limit = null, $offset = 0){
        $em = $this->getEntityManager();

        // Force $categories to array
        if(!is_array($categories) && !is_null($categories)){
            $categories = [$categories];
        }

        $sql = "
            SELECT p
            FROM TrinityBlogBundle:Entry p
        ";

        if(!empty($categories) && implode(',', $categories) != '') {
            $sql .= "
                JOIN p.category c
               ";
        }

        $sql .= "
            WHERE p.blog = " . $blog->getId() . "
            AND p.concept = " . ($concept ? 1 : 0) . "
            AND p.datePublish <= '" . date('Y-m-d H:i:s') . "'
            AND (
                p.datePublishEnd >= '" . date('Y-m-d H:i:s') . "'
            OR
                p.datePublishEnd IS NULL
            )
            ";

        if (!empty($categories)) {
            if(is_array($categories)) {
                $counter = 0;
                foreach ($categories as $cat) {
                    if (!empty($cat)) {
                        if ($counter == 0) {
                            $sql .= "AND (c.id = " . $cat . " ";
                        } else {
                            $sql .= "OR c.id = " . $cat . " ";
                        }
                        $counter += 1;
                    }
                }
                if ($counter >= 1) {
                    $sql .= ") ";
                }
            }
        }

        $sql .=  "
        ORDER BY p.datePublish DESC
            ";

        $query = $em->createQuery($sql);

        if ($limit) {
            $query->setMaxResults($limit);
        }
        $query->setFirstResult($offset);

        return $query->getResult();
    }

    public function findEntriesPublishedNow($blog, $concept = false, $limit = null, $offset = 0)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            "
            SELECT p
            FROM TrinityBlogBundle:Entry p
            WHERE p.blog = " . (!empty($blog) ? $blog->getId() : 0) . "
            AND (p.concept = " . ($concept ? 1 : 0 . " OR p.concept IS NULL") . ")
            AND p.datePublish <= '" . date('Y-m-d H:i:s') . "'
            AND (
                p.datePublishEnd >= '" . date('Y-m-d H:i:s') . "'
            OR
                p.datePublishEnd IS NULL
            )
            ORDER BY p.datePublish DESC
            "
        );

        if ($limit) {
            $query->setMaxResults($limit);
        }
        $query->setFirstResult($offset);

        return $query->getResult();
    }

    public function findPopularEntriesPublishedNow($blog, $limit = 10)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            "
            SELECT p
            FROM TrinityBlogBundle:Entry p
            WHERE p.blog = " . (!empty($blog) ? $blog->getId() : 0) . "
            AND p.concept = 0
            AND p.datePublish <= '" . date('Y-m-d H:i:s') . "'
            AND (
                p.datePublishEnd >= '" . date('Y-m-d H:i:s') . "'
            OR
                p.datePublishEnd IS NULL
            )
            ORDER BY p.readcount DESC
            "
        );

        if ($limit) {
            $query->setMaxResults($limit);
        }
        $query->setFirstResult(0);

        return $query->getResult();
    }

    public function findRecentEntriesPublishedNow($blog, $limit = 10, $ignoreIds = [])
    {
        $em = $this->getEntityManager();

        if(!is_array($ignoreIds)){
            $ignoreIds = [$ignoreIds];
        }

        $query = $em->createQuery(
            "
            SELECT p
            FROM TrinityBlogBundle:Entry p
            WHERE p.blog = " . $blog->getId() . "
            AND p.concept = 0
            AND p.body != ''
            AND p.id NOT IN(" . implode(',', $ignoreIds) . ")
            AND p.datePublish <= '" . date('Y-m-d H:i:s') . "'
            AND (
                p.datePublishEnd >= '" . date('Y-m-d H:i:s') . "'
            OR
                p.datePublishEnd IS NULL
            )
            ORDER BY p.datePublish DESC
            "
        );

        if ($limit) {
            $query->setMaxResults($limit);
        }
        $query->setFirstResult(0);

        return $query->getResult();
    }

    public function findPopularEntriesPublishedByCategoryNow($language, $categories, $limit = 10, $ignoreIds = [])
    {
        $em = $this->getEntityManager();

        // Force $categories to array
        if(!is_array($categories) && !is_null($categories)){
            $categories = [$categories];
        }

        if(!is_array($ignoreIds)){
            $ignoreIds = [$ignoreIds];
        }

        $sql = "
            SELECT e
            FROM TrinityBlogBundle:Entry e
            JOIN e.blog b
        ";

        if (!empty($categories)) {
            $sql .= "JOIN e.category c ";
        }

        $sql .= "
            WHERE b.language = " . $language->getId() . "
            AND e.concept = 0
            AND e.body != ''
            ";

        if (!empty($ignoreIds)) {
            $sql .= "
                AND e.id NOT IN(" . implode(',', $ignoreIds) . ")
            ";
        }

        $sql .= "AND e.datePublish <= '" . date('Y-m-d H:i:s') . "'
            ";

        if (!empty($categories)) {
            if(is_array($categories)) {
                $counter = 0;
                foreach ($categories as $cat) {
                    if (!empty($cat)) {
                        if ($counter == 0) {
                            $sql .= "AND (c.id = " . $cat . " ";
                        } else {
                            $sql .= "OR c.id = " . $cat . " ";
                        }
                        $counter += 1;
                    }
                }
                if ($counter >= 1) {
                    $sql .= ") ";
                }
            }
        }

        $sql .= "
            ORDER BY e.datePublish DESC
            ";

        $query = $em->createQuery($sql);

        return $query->getResult();
    }

    public function findEntriesByLanguage($language, $categories = null, $limit = null, $offset = 0)
    {
        $em = $this->getEntityManager();

        // Force $categories to array
        if(!is_array($categories) && !is_null($categories)){
            $categories = [$categories];
        }

        $sql = "
            SELECT e
            FROM TrinityBlogBundle:Entry e
            JOIN e.blog b
            ";

        if (!empty($categories)) {
            $sql .= "JOIN e.category c ";
        }

        $sql .= "
            WHERE b.language = '" . $language->getId() . "'
            AND e.concept = 0
            AND e.body != ''
            AND e.datePublish <= '" . date('Y-m-d H:i:s') . "'
            AND (
                e.datePublishEnd >= '" . date('Y-m-d H:i:s') . "'
            OR
                e.datePublishEnd IS NULL
            )
            ";

        if (!empty($categories)) {
            if(is_array($categories)) {
                $counter = 0;
                foreach ($categories as $cat) {
                    if (!empty($cat)) {
                        if ($counter == 0) {
                            $sql .= "AND (c.id = " . $cat . " ";
                        } else {
                            $sql .= "OR c.id = " . $cat . " ";
                        }
                        $counter += 1;
                    }
                }
                if ($counter >= 1) {
                    $sql .= ") ";
                }
            }
        }

        $sql .= "
            ORDER BY e.datePublish DESC
            ";

        $query = $em->createQuery($sql);

        if ($limit) {
            $query->setMaxResults($limit);
        }

        $query->setFirstResult($offset);

        return $query->getResult();
    }
}

