<?php

namespace App\CmsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MetatagRepository
 */
class MetatagRepository extends EntityRepository
{

    /**
     * Get metatags by system selector
     *
     * @param  integer $isSystem Use '1' to target system tags, otherwise '0'
     * @param  boolean $page     Mixed page selector (id, object, slug)
     *
     * @return [type]
     */
    public function getBySystem($isSystem = 1, $page = false, $showEmpty = true, $replacement = array()){
        $em = $this->getEntityManager();

        $allSorted = [];
        $allSortedSlug = [];
        $allMetatags = $this->getAll();
        foreach($allMetatags as $k => $t){
            if(!isset($allSorted[(int)$t['id']])) $allSorted[(int)$t['id']] = [];

            if(!empty($t['slug']) && empty($t['page'])){
                $allSortedSlug[(int)$t['id']][(int)$t['slug']] = $t['value'];
            }else{
                $allSorted[(int)$t['id']][(int)$t['page']] = $t['value'];
            }


            unset($allMetatags[$k]);
        }
        unset($allMetatags);

        $metatags = $em->getRepository('CmsBundle:Metatag')->findBySystem((int)$isSystem);
		// handle that isSystem == null
		if (empty($metatags) && $isSystem == 0) {
			$metatags_temp = $em->getRepository('CmsBundle:Metatag')->findBySystem(null);
			// array merge
			$metatags = array_merge($metatags_temp, $metatags);
		}

        foreach($metatags as $key => $Metatag){
            if($page !== 0){
                if($page instanceof \App\CmsBundle\Entity\Page){
                    // Page object
                    $Metatag->setValue( (!empty($allSorted[$Metatag->getId()][$page->getId()]) ? $allSorted[$Metatag->getId()][$page->getId()] : '') );
                }else if(is_string($page)){
                    // Slug
                    $Metatag->setValue( (!empty($allSortedSlug[$Metatag->getId()][$page]) ? $allSortedSlug[$Metatag->getId()][$page] : '') );
                }else if(is_numeric($page)){
                    // Page ID
                    $Metatag->setValue( (!empty($allSorted[$Metatag->getId()][$page]) ? $allSorted[$Metatag->getId()][$page] : '') );
                }else{
                    // Globally
                    $Metatag->setValue( (!empty($allSorted[$Metatag->getId()][0]) ? $allSorted[$Metatag->getId()][0] : '') );
                }
            }

            if(!empty($replacement)){
                foreach($replacement as $k => $v){
                    $val = $Metatag->getValue();
                    $val = str_replace($k, $v, $val);
                    $Metatag->setValue($val);
                }
            }

            if(!$showEmpty && $Metatag->getValue() == ''){
                unset($metatags[$key]);
            }
        }
        return $metatags;
    }

    /**
     * Get value using the Page entity
     *
     * @param  object $Metatag CmsBundle\Entity\Metatag
     * @param  object $Page    CmsBundle\Entity\Page
     *
     * @return void
     */
    public function getValueByPage($Metatag, $Page){
        return $this->getValueByPageId($Metatag, $Page->getId());
    }

    /**
     * Get value using the page slug
     *
     * @param  object $Metatag CmsBundle\Entity\Metatag
     * @param  string $slug    Slug identifier of an Page entity
     *
     * @return void
     */
    public function getValueBySlug($Metatag, $slug){
        $PageMetatag = $this->getPageMetatagBySlug($Metatag, $slug);
        return $PageMetatag->getValue();
    }

    /**
     * Get value using the page id
     *
     * @param  object $Metatag CmsBundle\Entity\Metatag
     * @param  int    $pageid  ID of an Page entity
     *
     * @return void
     */
    public function getValueByPageId($Metatag, $pageid){
        $PageMetatag = $this->getPageMetatagByPageId($Metatag, $pageid);
        return $PageMetatag->getValue();
    }

    /**
     * Get value without checkers
     *
     * @param  object $Metatag CmsBundle\Entity\Metatag
     *
     * @return void
     */
    public function getValue($Metatag){
        $PageMetatag = $this->getPageMetatag($Metatag);
        return $PageMetatag->getValue();
    }

    /**
     * Get PageMetatag by slug
     *
     * @param  object $Metatag Metatag
     * @param  string $slug    Page slug
     *
     * @return PageMetatag
     */
    public function getPageMetatagBySlug($Metatag, $slug){
        $em = $this->getEntityManager();
        $sql = "SELECT      M
                FROM        CmsBundle:Page AS P
                JOIN        CmsBundle:PageMetatag AS M
                WHERE       P.slug = '" . (string)$slug . "'
                AND         M.page = P.id
                AND         M.metatagid = " . (int)$Metatag->getId() . "
                ";
        $result = $this->getEntityManager()->createQuery($sql)->getResult();
        if( !empty($result) ){
            if(is_array($result)) $result = $result[0];
            return $result;
        }
        return new \App\CmsBundle\Entity\PageMetatag();
    }

    /**
     * Get PageMetatag by page ID
     *
     * @param  object $Metatag Metatag
     * @param  integer $pageid    Page ID
     *
     * @return PageMetatag
     */
    public function getPageMetatagByPageId($Metatag, $pageid){
        $em = $this->getEntityManager();
        $sql = "SELECT      M
                FROM        CmsBundle:PageMetatag AS M
                WHERE       M.metatagid = " . (int)$Metatag->getId() . "
                AND         M.page = " . (int)$pageid . "
                ";
        $result = $this->getEntityManager()->createQuery($sql)->getResult();
        if( !empty($result) ){
            if(is_array($result)) $result = $result[0];
            return $result;
        }
        return new \App\CmsBundle\Entity\PageMetatag();
    }

    /**
     * Get PageMetatag globally
     *
     * @param  object $Metatag Metatag
     *
     * @return PageMetatag
     */
    public function getPageMetatag($Metatag){
        $em = $this->getEntityManager();
        $sql = "SELECT      M
                FROM        CmsBundle:PageMetatag AS M
                WHERE       M.metatagid = " . (int)$Metatag->getId() . "
                ";
        $result = $this->getEntityManager()->createQuery($sql)->getResult();
        if( !empty($result) ){
            if(is_array($result)) $result = $result[0];
            return $result;
        }
        return new \App\CmsBundle\Entity\PageMetatag();
    }

    /**
     * Get system Metatag
     *
     * @param  object $Metatag Metatag
     *
     * @return PageMetatag
     */
    public function getSystemTagByMetatag($Metatag){
        $em = $this->getEntityManager();
        $sql = "SELECT      M
                FROM        CmsBundle:PageMetatag AS M
                WHERE       M.metatagid = " . (int)$Metatag->getId() . "
                ";
        $result = $this->getEntityManager()->createQuery($sql)->getResult();
        if( !empty($result) ){
            if(is_array($result)) $result = $result[0];
            return $result;
        }
        return new \App\CmsBundle\Entity\PageMetatag();
    }

    /**
     * Get system Metatag
     *
     * @param  object $Metatag Metatag
     *
     * @return PageMetatag
     */
    public function getAll(){
        $em = $this->getEntityManager();
        $sql = "SELECT      IDENTITY(M.metatagid) as id,
                            IDENTITY(M.page) as page,
                            M.pageSlug as slug,
                            M.value
                FROM        CmsBundle:PageMetatag AS M
                ";
        $result = $this->getEntityManager()->createQuery($sql)->getResult();
        return $result;
    }

}
