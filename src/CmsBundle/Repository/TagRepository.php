<?php

namespace App\CmsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TagRepository
 */
class TagRepository extends EntityRepository
{

	public function getOrCreateByLabel($label = ''){
		$Tag = null;
		if(is_numeric($label)){
			try{
				$sql = "SELECT      T
						FROM        CmsBundle:Tag AS T
						WHERE 	T.id = " . (int)$label . "
						";
						dump($sql);
				$Tag = $this->getEntityManager()->createQuery($sql)->getSingleResult();
			}catch( \Exception $e ){}
		}else{
			try{
				$sql = "SELECT      T
						FROM        CmsBundle:Tag AS T
						WHERE 	T.label LIKE '" . $label . "'
						";
						dump($sql);
				$Tag = $this->getEntityManager()->createQuery($sql)->getSingleResult();
			}catch( \Exception $e ){}
		}

		if($Tag == null){
			$Tag = new \App\CmsBundle\Entity\Tag();
            $Tag->setLabel($label);
            $this->getEntityManager()->persist($Tag);
            $this->getEntityManager()->flush();
		}
		return $Tag;
	}

	public function findAllNotEmpty(){
		$sql = "SELECT      T
				FROM        CmsBundle:Tag AS T
				";
		$tags = $this->getEntityManager()->createQuery($sql)->getResult();

		$all = 0;
		foreach($tags as $i => $Tag){
			$all += $Tag->countMedia();
			$all += $Tag->countMediadirs();
			$all += $Tag->countUsers();
			$all += $Tag->countPages();

			if($all == 0){
				unset($tags[$i]);
			}
		}

		return $tags;
	}

	/**
	 * Search
	 *
	 * @param  string
	 *
	 * @return array
	 */
	public function search($q){
		$sql = "SELECT	T
				FROM	CmsBundle:Tag AS T
				WHERE	T.label LIKE '%" . $q . "%'
				";
		return $this->getEntityManager()->createQuery($sql)->getResult();
	}

}