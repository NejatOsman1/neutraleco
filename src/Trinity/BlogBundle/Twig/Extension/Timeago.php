<?php
namespace App\Trinity\BlogBundle\Twig\Extension;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Translation\DataCollectorTranslator;
use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use Doctrine\ORM\EntityManagerInterface;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class Timeago extends AbstractExtension
{

    private $em;
    protected $request;
    private $container;
    private $translator;

    public function __construct(EntityManagerInterface $em, RequestStack $request_stack, $translator = null, $container = null)
    {
        $this->em = $em;
	$this->request = $request_stack->getCurrentRequest();
	$this->container = $container;
	$this->translator = $translator;
    }

    public function getFilters()
    {
        return array(
            new \Twig\TwigFilter('timeago', array($this, 'timeagoFilter')),
        );
    }

    public function getFunctions() {
        return array(
            new \Twig\TwigFunction('blog_posts', array($this, 'blogPosts'), array('is_safe' => array('html'))),
        );
    }

    public function blogPosts($category = null, $start = 0, $limit = 9){
    	$posts = $this->em->getRepository('TrinityBlogBundle:Entry')->findEntriesByCategoryName($category, $limit, $start);
    	return $posts;
    }

    public function timeagoFilter($datetime)
    {
		if(!is_null($this->request)){
			$l = $this->request->getLocale();

			// Set locale for strftime based on locale currently configured in Symfony
			$fullLocale = strtolower($l) . '_' . strtoupper($l);
			setlocale(LC_ALL, $fullLocale);
		} else  {
			$fullLocale = 'nl_NL';
            $l = 'nl';
        }

		$realTime = $datetime->getTimestamp();
        $time = (time()-$realTime);

		$prefix = '';
                if (!empty($this->translator)) {
                    $suffix = ' ' . $this->translator->trans('geleden', [], 'messages', $fullLocale);
                } else {
                    $suffix = ' geleden';
                }
		if($time < 0){
                    if (!empty($this->translator)) {
			$prefix = $this->translator->trans('Over', [], 'messages', $fullLocale) . ' ';
                    } else {
                        $prefix = 'Over ';
                    }
			$suffix = '';
			$time = (int)abs($time);
		}

                if (!empty($this->translator)) {
                    $units = array (
			31536000 => array($this->translator->trans('jaar', [], 'messages', $fullLocale), $this->translator->trans('jaar', [], 'messages', $fullLocale)),
			2592000  => array(lcfirst($this->translator->trans('Maand', [], 'messages', $fullLocale)), $this->translator->trans('maanden', [], 'messages', $fullLocale)),
			604800   => array(lcfirst($this->translator->trans('Week', [], 'messages', $fullLocale)), $this->translator->trans('weken', [], 'messages', $fullLocale)),
			86400    => array(lcfirst($this->translator->trans('Dag', [], 'messages', $fullLocale)), $this->translator->trans('dagen', [], 'messages', $fullLocale)),
			3600     => array($this->translator->trans('uur', [], 'messages', $fullLocale), $this->translator->trans('uren', [], 'messages', $fullLocale)),
			60       => array(lcfirst($this->translator->trans('Minuut', [], 'messages', $fullLocale)), $this->translator->trans('minuten', [], 'messages', $fullLocale)),
			1        => array($this->translator->trans('seconde', [], 'messages', $fullLocale), $this->translator->trans('seconden', [], 'messages', $fullLocale))
                    );
                } else {
                    $units = array (
			31536000 => array('jaar', 'jaar'),
			2592000  => array('maand', 'maanden'),
			604800   => array('week', 'weken'),
			86400    => array('dag', 'dagen'),
			3600     => array('uur', 'uren'),
			60       => array('minuut', 'minuten'),
			1        => array('seconde', 'seconden')
                    );
                }

		if($time < (60*2)){
                    if (!empty($this->translator)) {
			return $this->translator->trans('zojuist', [], 'messages', $fullLocale);
                    } else {
                        return 'zojuist';
                    }
		}else if(date('Y', $realTime) < date('Y')){
			return strftime('%e %b. %Y', $realTime);
		}else if($time > (2592000*2)){
			return utf8_encode(strftime('%e %b', $realTime));
		}

		foreach ($units as $unit => $val) {
			if ($time < $unit) { continue; }
			$numberOfUnits = floor($time / $unit);
                        if (!empty($this->translator)) {
                            return $prefix . ($val == 'second'? $this->translator->trans('zojuist', [], 'messages', $fullLocale) : $numberOfUnits . ' '.($numberOfUnits > 1 ? $val[1] : $val[0]).$suffix);
                        } else {
                            return $prefix . ($val == 'second'? 'zojuist' : $numberOfUnits . ' '.($numberOfUnits > 1 ? $val[1] : $val[0]).$suffix);
                        }
		}
    }

    public function getName()
    {
        return 'timeago';
    }
}
