<?php

namespace App\Trinity\SearchBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * IndexRepository
 */
class IndexRepository extends EntityRepository
{

    public function getBundles($language, $settings){
        $em = $this->getEntityManager();

        $sql = "SELECT distinct(si.bundle)
                FROM   TrinitySearchBundle:SearchIndex si
                WHERE    si.language = " . $language->getId() . "
                AND    si.settings = " . $settings->getId() . "
                ";

        $query = $em->createQuery($sql);
        return $query->getResult();
    }

    public function getGroupsByBundle($bundle, $language, $settings){
        $em = $this->getEntityManager();

        $sql = "SELECT distinct(si.category)
                FROM   TrinitySearchBundle:SearchIndex si
                WHERE  si.bundle = '" . $bundle . "'
                AND    si.language = " . $language->getId() . "
                AND    si.settings = " . $settings->getId() . "
                ";

        $query = $em->createQuery($sql);
        return $query->getResult();
    }

    public function search($q, $bundlefilter, $language, $settings){
        $em = $this->getEntityManager();

        // TODO als iets tussen twee quotes staat niet splitten
        // TODO check if searchterms minimale lengte hebben en dan full text search doen?
        $q = explode(' ', trim($q));

        $restrictions = '';
        foreach ($q as $key => $substring)
        {
            if ($restrictions != '') {
                $restrictions .= ' AND ';
            }
            $restrictions .= "(" .
                    "si.content LIKE '%" . $substring . "%' " .
                    "OR si.label LIKE '%" . $substring . "%' " .
                    "OR si.uri LIKE '%" . $substring . "%' " .
                    "OR si.extra LIKE '%" . $substring . "%' " .
                    "OR si.second_extra LIKE '%" . $substring . "%' " .
                    "OR si.third_extra LIKE '%" . $substring . "%'" .
                    ")";
        }

        $sql = "SELECT si
                FROM   TrinitySearchBundle:SearchIndex si
                WHERE  " . $restrictions . "
                AND    si.language = " . $language->getId() . "
                AND    si.settings = " . $settings->getId() . "
                " . (!empty($bundlefilter) ? "AND si.bundle = '" . $bundlefilter . "'" : "") . "
                GROUP BY si.object, si.object_id
                ";

        $query = $em->createQuery($sql);
        $results = $query->getResult();

        foreach($results as $res){
            $res->calculateWeight($q);
        }

        usort($results, function($a, $b) {return $a->getWeight() <= $b->getWeight();});

        return $results;
    }

    public function fullTextSearch($q, $language, $settings) {
        // Defaults
        // ft-max-word-len 84
        // ft-min-word-len  4

        $em = $this->getEntityManager();

        // construct search string
        $searchWords = explode(' ', $q);
        $searchString = '';
        foreach($searchWords as $words) {
            // +WORD word means it is mandetory
            $searchString .= '+' . $words;
        }

        /* 
         * Pure SQL which works:
           select *
           from search_index si
           where match(si.label,si.content,si.extra,si.second_extra) against ('pelikan in boolean mode')
         */

        // Explanation why Boolean is not full mysql syntax https://github.com/beberlei/DoctrineExtensions/pull/332
        $qb = $this->createQueryBuilder('si');
        
        //$qb->where("MATCH (si.label, si.content, si.extra, si.second_extra) AGAINST (:searchString) > 0");

        // $language->getId()
        // $settings->getId()

        // if search is empyt don't return 
        $qb->where("MATCH (si.label, si.content, si.extra, si.second_extra, si.third_extra) AGAINST (:searchString boolean) > 0");

        // 
        $qb->setParameter('searchString', (string)$searchString);
// also check $language and $settings
        $query = $qb->getQuery();
        $results = $query->getResult();

        foreach($results as $res){
            $res->calculateWeigth('hp');
            die();
            //calculate weight
            // order hier op gewicht
        }
dump($results);;
die();

        return null;
    }
}
