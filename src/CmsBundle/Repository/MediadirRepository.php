<?php

namespace App\CmsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MediadirRepository
 */
class MediadirRepository extends EntityRepository
{

	public function findPathByName($em, $path, $language = null, $domain = null){
		$path = str_replace(["'"], [''], $path);
		$path = preg_replace('/\/$/', '', $path);
		$path = explode('/', $path);

        if(empty($domain) && is_array($path) && isset($path[0])) {
            $domain = $path[0];
        }

		if (!empty($language) && !empty($domain)) {
			$Settings = $em->getRepository('CmsBundle:Settings')->findOneBy(['language' => $language, 'host' => $domain]);
		}elseif(!empty($_SESSION['_sf2_attributes']['admin_msite'])){
			$msite = $_SESSION['_sf2_attributes']['admin_msite'];
			$Settings = $em->getRepository('CmsBundle:Settings')->find($msite);
		}else{
			if(!empty($_SERVER['HTTP_HOST'])){
				$host = str_replace(['http://','https://','www.'], [], preg_replace('/\/$/', '', $_SERVER['HTTP_HOST']));
				$Settings = $em->getRepository('CmsBundle:Settings')->findOneByHost($host);
			}
		}

		if(!isset($Settings)){
			$Settings = $em->getRepository('CmsBundle:Settings')->findOneBy([], ['id' => 'asc']);	
		}

		// Append locale in caps to the host if host matches the settings' host
		if(!empty($Settings) && $Settings instanceof \App\CmsBundle\Entity\Settings && !empty($language) && $language instanceof \App\CmsBundle\Entity\Language && !empty($Settings->getHost())){
			if($path[0] === $Settings->getHost()){
				$path[0] = $path[0] . ' (' . strtoupper($language->getLocale()) . ')';
			}
		}

		// Not found, lets create this now
		$Parent = null;
		foreach($path as $k => $v){
			try{
				if($k == 0){
					$sql = "SELECT M FROM CmsBundle:Mediadir AS M WHERE M.parent IS NULL AND M.settings = " . (int)$Settings->getId();
					$Parent = $this->getEntityManager()->createQuery($sql)->setMaxResults(1)->getSingleResult();
				}else{
					$sql = "SELECT M FROM CmsBundle:Mediadir AS M WHERE M.label LIKE '" . $v . "' AND M.parent = " . (int)$Parent->getId() . " AND M.settings = " . (int)$Settings->getId();
					$Parent = $this->getEntityManager()->createQuery($sql)->setMaxResults(1)->getSingleResult();
				}
			}catch( \Exception $e ){
				$Mediadir = new \App\CmsBundle\Entity\Mediadir();
				$Mediadir->setLabel($v);
	            $Mediadir->setDateAdd();
	            $Mediadir->setSettings($Settings);
	            if(!is_null($Parent)){
	                $Mediadir->setParent($Parent);
	            }
	            $em->persist($Mediadir);
	            $Parent = $Mediadir;
				$em->flush();
			}
		}

		return $Parent;
	}

	/**
	 * Search
	 *
	 * @param  string
	 *
	 * @return array
	 */
	public function search($q){
		$sql = "SELECT	M
				FROM	CmsBundle:Mediadir AS M
				WHERE	M.label LIKE '%" . $q . "%'
				";
		return $this->getEntityManager()->createQuery($sql)->getResult();
	}

}
