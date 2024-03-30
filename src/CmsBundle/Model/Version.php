<?php
namespace App\CmsBundle\Model;

class Version {
	private $version = '';

	function __construct() {
		/*exec('git --git-dir="../src/CmsBundle/.git" --work-tree="../src/CmsBundle" describe --long --all',$version);
		if(!empty($version)){
			if(preg_match('/^([a-zA-Z0-9\.\/]+)/', (string)$version[0], $m)){
				$this->version = $m[1];
			}
		}*/
	}

	public function version(){
		return $this->version;
	}
}