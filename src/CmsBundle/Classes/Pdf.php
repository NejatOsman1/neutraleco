<?php
namespace App\CmsBundle\Classes;

class Pdf extends \TCPDF
{
    protected $brd            = 0;
    
    public $end               = 0;
    public $title             = null;
    public $Settings          = null;
    public $next              = false;
    public $enable_logo       = true;
    public $enable_company    = true;
    public $enable_background = true;
    
    /**
     * Initialize PDF based on TCPDF
     * 
     * @param $orientation  P|L (default: p | portrait))
     * @param $unit         Unit type (default: mm | millimeters))
     * @param $format       Paper format (default: A4)
     * @param $unicode      Enable unicode (true|false)
     * @param $encoding     Character encoding (default: UTF-8)
     * @param $diskcache    Use disk cache
     * @param $pdfa         No idea what this is... :-/
     */
    public function __construct($orientation='P', $unit='mm', $format='A4', $unicode=true, $encoding='UTF-8', $diskcache=false, $pdfa=false) {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);

        $this->setAuthor('Trinity');
        $this->SetCreator('Trinity');

        // set image scale factor
        $this->setImageScale(PDF_IMAGE_SCALE_RATIO);
    }

    /**
     * Global function mainly used for borders to test element positions
     */
    public function setBrd($data){
        $this->brd = $data;
    }

    /**
     * Global function mainly used for borders to test element positions
     */
    public function getBrd(){
        return (int)$this->brd;
    }

    /**
     * Set PDF header
     */
    public function Header(){
        $startY = 10;
        if($this->title){
            $this->SetY(10);
            $this->Cell(190, null, 'Documentatie: ' . $this->title, $this->brd);
        }else{
            if(!empty($this->Settings)){
                // ======================================================
                // ADD LOGO
                // ======================================================
                if($this->enable_logo && $this->Settings->getLogoObject() && file_exists($this->Settings->getLogoObject()->getAbsolutePath())){
                    $logoFile = $this->Settings->getLogoObject()->getAbsolutePath();
                    if (strpos(mime_content_type($logoFile), 'svg') !== false) {
                        $this->ImageSVG($logoFile, 10, 10, 50, 50, false, 'C');
                    } else {
                        $this->Image($logoFile, 10, 10, null, 50, null, false, 'C', false, 300);
                    }
                }

                // ======================================================
                // COMPANY ADDRESS
                // ======================================================
                if($this->enable_company && $this->Settings->getCompany()){
                    $this->SetY(20);

                    $this->SetTextColor(0,0,0);
                    $this->SetX(100);
                    $this->SetFontSize(8);
                    $this->SetFont('', 'B');
                    $this->cell(95, null, $this->Settings->getCompany(), $this->getBrd(), 1, 'R');
                    $this->SetX(100);
                    $this->SetFont('', '');
                    $this->cell(95, null, $this->Settings->getAddress(), $this->getBrd(), 2, 'R');
                    $this->SetX(100);
                    $this->cell(95, null, $this->Settings->getPostalcode() . ' ' . $this->Settings->getPlace(), $this->getBrd(), 1, 'R');
                    $this->SetX(100);
                    $this->cell(95, null, 'Telefoon: ' . $this->Settings->getPhone(), $this->getBrd(), 1, 'R');
                    $this->SetX(100);
                    $this->cell(95, null, $this->Settings->getSystemEmail(), $this->getBrd(), 1, 'R');
                    $this->SetTextColor(0,0,0);
                }

                $startY = 60;
            }
        }


        // Set page background image if '/pdf_bg.png' exists
        $pdf_bg = str_replace('src/CmsBundle/Classes', 'pdf_bg.png', __DIR__);
        if($this->enable_background && file_exists($pdf_bg)){
            $bMargin = $this->getBreakMargin();
            $auto_page_break = $this->getAutoPageBreak();
            $this->SetAutoPageBreak(false, 0);
            $this->Image($pdf_bg, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
            $this->SetAutoPageBreak($auto_page_break, $bMargin);
            $this->setPageMark();
        }

        $this->SetY($startY);
    }

    /**
     * Set PDF footer
     */
    public function Footer(){
        // 
    }

    /**
     * Display inline
     * 
     * @param $filename Filename to use when save from preview
     */
    public function display($filename = 'Trinity_PDF'){
        $this->Output($filename . '.pdf', 'I');
    }

    /**
     * Alias for 'display'
     * 
     * @param $filename Filename to use when save from preview
     */
    public function show($filename = 'Trinity_PDF'){
        $this->display($filename);
    }

    /**
     * Download as PDF file
     * 
     * @param $filename Filename to use when download
     */
    public function download($filename = 'Trinity_PDF'){
        $this->Output($filename . '.pdf', 'D');
    }

    /**
     * Percent width
     * 
     * @param $percent The percentage to calculate over the page width
     */
    public function percentWidth($percent){
        return (($this->getPageWidth() - ($this->lMargin + $this->rMargin)) / 100) * $percent;
    }

    /**
     * Save on server
     * 
     * @param $filepath Full path to PDF file
     * @return string
     */
    public function save($filepath = 'Trinity_PDF'){
        $this->Output($filepath . '.pdf', 'F');

        return $filepath . '.pdf';
    }

}