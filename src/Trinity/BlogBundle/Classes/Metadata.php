<?php
namespace App\Trinity\BlogBundle\Classes;
class Metadata
{
 
	private $em = null;
	private $params = null;
	private $config = null;
 
	public function __construct($em, $params, $config){
		$this->em = $em;
		$this->params = $params;
		$this->config = $config;
	}
 
	public function parse(){
		if(!empty($this->params[0])){

			$Blog = $this->em->getRepository('TrinityBlogBundle:Blog')->findOneById($this->config['id']);

			if(!is_numeric($this->params[0])){
			    $Entry = $this->em->getRepository('TrinityBlogBundle:Entry')->findOneBy(['slug' => $this->params[0], 'blog' => $Blog]);
			}else{
			    $Entry = $this->em->getRepository('TrinityBlogBundle:Entry')->findOneBy(['id' => $this->params[0], 'blog' => $Blog]);
			}

                        if (empty($Entry)) {
                            return null;
                        }

			return [
	            'title' => $Entry->getSeoTitle(),
	            'description' => $Entry->getSeoDescription(),
	            'keywords' => $Entry->getSeoKeywords(),
	        ];
		}

		return null;
	}
}
