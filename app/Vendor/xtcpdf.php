<?php 
App::import('Vendor','tcpdf/tcpdf'); 

class XTCPDF  extends TCPDF 
{ 

    var $xheadertext  = 'PDF created using CakePHP and TCPDF'; 
    var $xheadercolor = array(0,0,200); 
    var $xfootertext  = 'Copyright © %d WinTech-EDV.'; 
    var $xfooterfont  = PDF_FONT_NAME_MAIN ; 
    var $xfooterfontsize = 8 ; 


    /** 
    * Overwrites the default header 
    * set the text in the view using 
    $fpdf->xheadertext = 'YOUR ORGANIZATION'; 
    * set the fill color in the view using 
    * fpdf->xheadercolor = array(0,0,100); (r, g, b) 
    * set the font in the view using 
    * $fpdf->setHeaderFont(array('YourFont','',fontsize)); 
    $fpdf->setHeaderFont(array('helvetica','',10)); 
	*/ 
    function Header() 
    { 

       // list($r, $b, $g) = $this->xheadercolor; 
        // Logo neu ust
       /* $image_file = K_PATH_IMAGES.'logo_example.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        //
        $this->setY(10); // shouldn't be needed due to page margin, but helas, otherwise it's at the page top 
        $this->SetFillColor($r, $b, $g); 
        $this->SetTextColor(0 , 0, 0); 
        //$this->Cell(0,20, '', 0,1,'C', 1); 
         $this->Cell(0,20, '', 0,1,'C', 1); 
        //$this->Text(15,26,$this->xheadertext ); */
        //Page header
  
       /**
        * Custom header from TCPDF Example3 "custom Header and Footer"
        */
        // Logo
        $image_file = K_PATH_IMAGES.'logo.png';
       // $this->Image($image_file, 10, 10, 15, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->Image($image_file, 15, 10, 40, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->SetTextColor(255, 0, 0);
        // Set font
        $this->SetFont('helvetica', 'B', 18);
        // Title
       // $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        //$this->Cell(0, 15, 'Datenbanken - für Desktop und Browser...', 0, false, 'C', 0, '', 0, false, 'T', 'T');
        $this->Cell(0, 9, 'Databases - for desktop and Browser...','B',1,'C'); 
        // $this->Text(40,26,$this->xheadertext ); 
        
    } 

    /** 
    * Overwrites the default footer 
    * set the text in the view using 
    * $fpdf->xfootertext = 'Copyright © %d YOUR ORGANIZATION. All rights reserved.'; 
    */ 
   function Footer() 
    { 
        $year = date('Y'); 
        $footertext = sprintf($this->xfootertext, $year); 
        $this->SetY(-20); 
        $this->SetTextColor(0, 0, 0); 
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize); 
        //$this->Cell(0,8, $footertext,'T',1,'C'); 
        //$this->Cell(0,8, 'Seite '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
       $this->Cell(0,8, 'Seite '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 'T',1,'C'); 
    } 
/**
 * Footer aus TCPDF Example3 "custom Header and Footer"
 */
 /*   public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Seite '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }*/
   
    
    } 
?>