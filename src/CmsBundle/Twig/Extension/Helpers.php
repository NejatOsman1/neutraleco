<?php
namespace App\CmsBundle\Twig\Extension;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use App\CmsBundle\Entity\Settings;

class Helpers extends AbstractExtension
{

    protected $em;
    protected $translator;

    public function __construct(EntityManagerInterface $em, TranslatorInterface $translator) {
        $this->em = $em;
        $this->translator = $translator;
    }

    /**
     * Return the functions registered as twig extensions
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new TwigFunction('file_exists', 'file_exists'),
            new TwigFunction('filesize', 'filesize'),
            new TwigFunction('scandir', 'scandir'),
            new TwigFunction('json_decode', 'json_decode'),
            new TwigFunction('json_load', array($this, 'json_load')),
            new TwigFunction('json_load_raw', array($this, 'json_load_raw')),
            new TwigFunction('version_compare', 'version_compare'),
            new TwigFunction('format_bytes', array($this, 'formatBytes')),
            new TwigFunction('sluggify', array($this, 'doSluggify')),
            new TwigFunction('promobar', array($this, 'getPromobar'), array('is_safe' => array('html'))),
        );
    }

    public function getPromobar(Settings $Settings) {
        $return = '';
        try {
            $Webshop = $this->em->getRepository(\App\Trinity\WebshopBundle\Entity\Webshop::class)->findOneBy(['cms_settings' => $Settings]);

            $promotion_bar = [];
            $promotionBars = $this->em->getRepository(\App\Trinity\WebshopBundle\Entity\PromotionPopup::class)->findBy(['webshop' => $Webshop, 'code' => 'bar', 'enabled' => true]);
            if(!empty($promotionBars)){
                foreach($promotionBars as $PromotionBar){
                    if(!empty($PromotionBar->getDateStart()) && $PromotionBar->getDateStart()->format('YmdHi') > date('YmdHi')){
                        // Not started yet
                        continue;
                    }
    
                    if(!empty($PromotionBar->getDateEnd()) && $PromotionBar->getDateEnd()->format('YmdHi') <= date('YmdHi')){
                        // Ended
                        continue;
                    }
    
                    /* $data = [
                        'id'      => $PromotionBar->getId(),
                        'label'      => $PromotionBar->getLabel(),
                        'delay'      => (int)$PromotionBar->getDelay(),
                        'auto_hide'  => (int)$PromotionBar->getAutoHide(),
                        'cookie_age' => (int)$PromotionBar->getCookieAge(),
                        'content'    => $PromotionBar->getContent(),
                    ];
    
                    if(empty($promotion_bar)){
                        $promotion_bar = $data;
                    } */

                    $return = '<div id="promotion_bar" class="actionbar">
                        <a href="' . $PromotionBar->getContent() . '">
                            <div class="container" id="promotion_bar_title">' . $PromotionBar->getLabel() . '</div>
                        </a>
                    </div>';
                    break;
                }
            }
        } catch (\Throwable $th) {
            // 
        }
        return $return;
    }

    /**
     * Return the functions registered as twig extensions
     *
     * @return array
     */
    public function getFilters()
    {
        return array(
            new TwigFilter('trans_replace', array($this, 'trans_replace')),
            new TwigFilter('sluggify', array($this, 'doSluggify')),
            new TwigFilter('preg_replace', array($this, 'pregReplaceFilter')),
            new TwigFilter('cast_to_array', array($this, 'objectFilter')),
        );
    }

    public function pregReplaceFilter($str, $search, $replace = null)
    {
        return preg_replace($search, $replace, $str);
    }

    function formatBytes($bytes, $precision = 2)
    {
        if(is_string($bytes) && strlen($bytes) > 10){
            if(file_exists($bytes)){
                $bytes = filesize($bytes);
            }else{
                $bytes = 0;
            }
        }

        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
         $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    function trans_replace($str, $catalog = '', $language = null){
        if(preg_match_all('/<!-- tr -->(.*?)<!-- \/tr -->/', $str, $m)){
            foreach($m[0] as $k => $v){
                $s = $m[1][$k];
                if(!empty($language) && !empty($catalog)){
                    $s = $this->translator->trans($s, [], $catalog, $language->getLocale());
                }
                $str = str_replace($v, $s, $str);
            }
        }
        return $str;
    }

    function json_load($file, $parse = true){
        $return = [];
        if(!$parse){ $return = ''; }
        if(file_exists($file)){
            $raw = file_get_contents($file);
            if(!empty($raw)){
                if($parse){
                    $return = json_decode($raw, true);
                }else{
                    $return = $raw;
                }
            }
        }







        /*if(!empty($return)){

            if(!$parse){
                $return = json_decode($return, true);
            }

            $sorted = [];
            $sorter = [];
            foreach($return as $k => $v){
                $childs_sorter = [];
                foreach($v['children'] as $sk => $sv){
                    $childs_sorter[] = $sv . '|' . $sk;
                }
                sort($childs_sorter);
                $sorter[$v['name'] . '|' . $k] = $childs_sorter;
            }
            ksort($sorter);

            foreach($sorter as $sb => $sc){
                $sb = explode('|', $sb);
                $sorted['id_' . $sb[1]] = ['name' => $sb[0], 'children' => []];
                foreach($sc as $scc){
                    $scc = explode('|', $scc);
                    $sorted['id_' . $sb[1]]['children']['id_' . $scc[1]] = $scc[0];
                }
            }

            if($parse){
                $return = $sorted;
            }else{
                $return = json_encode($sorted);
            }
        }*/


        return $return;
    }

    function json_load_raw($file){
        return $this->json_load($file, false);
    }

    function doSluggify($str, $replace=array(), $delimiter='-')
    {
        if( !empty($replace) ) {
            $str = str_replace((array)$replace, ' ', $str);
        }

        $slugify = new \Cocur\Slugify\Slugify();

        return $slugify->slugify($str, $delimiter);
    }

    public function objectFilter($stdClassObject) {
        // Just typecast it to an array
        $response = (array)$stdClassObject;

        return $response;
    }

    public function getName()
    {
        return 'Helpers';
    }
}