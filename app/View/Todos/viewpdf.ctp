<?php

App::import('Vendor','xtcpdf');  
// Include the main TCPDF library (search for installation path).


$tcpdf = new XTCPDF(); 


//$html='';
$slno=1;
$textfont = 'times'; // looks better, finer, and more condensed than 'dejavusans'

//set margins
$tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

$tcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);

$tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);
//set auto page breaks
$tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
//$tcpdf->setHeaderFont(array($textfont, '', 25));
//$tcpdf->xheadercolor = array(255, 255, 255);
//$tcpdf->xheadertext = "Kopftext";
//$tcpdf->xfootertext = "Fußtext";
// remove default header/footer

// add a page (required with recent versions of tcpdf)
$tcpdf->AddPage(); // Front Page

$curNtDateTime = explode(' ', Date('d.m.Y H:i:s'));
$curDate = $curNtDateTime[0];
$curTime = $curNtDateTime[1];

$lefthtml = "<b>Date: </b>$curDate";

$tcpdf->SetY(-260);
$tcpdf->SetTextColor(0, 0, 0);
//$tcpdf->SetFont('dejavusans', '', 12);
$tcpdf->SetFont('times', '', 12);
$tcpdf->writeHTMLCell(-250, '', '', '', $lefthtml, 0, 0, false, true, 'L');


$righthtml = "<b>Time: </b>$curTime";

$tcpdf->SetY(-260);
$tcpdf->SetTextColor(0, 0, 0);
$tcpdf->SetFont('times', '', 12);
$tcpdf->writeHTMLCell(-250, '', '', '', $righthtml, 0, 0, false, true, 'R');

// Image example with resizing
//$tcpdf->Image('img/strand.jpg', 15, 140, 75, 113, 'JPG', 'http://www.wintech-edv.com', '', true, 150, '', false, false, 1, false, false, false);




$html = '<br /><h1></h1>

<table border="0">
  <tr>
    <th style="text-align:left;"><img src="img/todolist.png" border="0" height="41" width="41" align="left" /></th>
   </tr>
  <br /><h1><u>ToDo Details</u></h1>
<tr>
    <td width="100"; style="font-weight:bold">ID:</td>';
    $html.= '<td width="400">'. $todo['Todo']['id'] . '</td>
  </tr>
  <tr>
    <td width="100"; style="font-weight:bold">Due on:</td>';
    $html.= '<td width="400">'. $this->Time->format('d.m.Y, h:i',($todo['Todo']['due_on'])) . '</td>
  </tr>
  <tr>
    <td width="100"; style="font-weight:bold">Status:</td>';
    $html.= '<td width="400">'. $todo['Status']['name'] . '</td>
  </tr>
   <tr>
    <td width="100"; style="font-weight:bold"></td>';
    $html.= '<td width="400"></td>
  </tr> 

    <tr>
    <td width="100"; style="font-weight:bold">Task:</td>';
    $html.= '<td width="400">'. $todo['Todo']['name'] . '</td>
  </tr>
  <tr>
    <td width="100"; style="font-weight:bold">Description:</td>';
    $html.= '<td width="400">'. $todo['Todo']['description'] . '</td>
  </tr>
  <tr>
    <td width="100"; style="font-weight:bold">Comment:</td>';
    $html.= '<td width="400">'. $todo['Todo']['comment'] . '</td>
  </tr>
  <tr>
    <td width="100"; style="font-weight:bold"></td>';
    $html.= '<td width="400"></td>
  </tr> 
  <tr>
    <td width="100"; style="font-weight:bold">Priority:</td>';
    $html.= '<td width="400">'. $todo['Priority']['name'] . '</td>
  </tr>
  <tr>
    <td width="100"; style="font-weight:bold">Employee:</td>';
    $html.= '<td width="400">'. $todo['User']['name'] . '</td>
  </tr>
  <tr>
    <td width="100"; style="font-weight:bold"></td>';
    $html.= '<td width="400"></td>
  </tr> 
  <tr>  
    <td width="100"; style="font-weight:bold">Modified on:</td>';
    $html.= '<td width="400">'. $this->Time->format('d.m.Y, h:i',($todo['Todo']['modified_on'])) . '</td>
  </tr>
  <tr>
    <td width="100"; style="font-weight:bold">Created on:</td>';
    $html.= '<td width="400">'. $this->Time->format('d.m.Y, h:i',($todo['Todo']['created_on'])) . '</td>
  </tr>
</table>';

// output the HTML content
$tcpdf->writeHTML($html, true, false, true, false, '');


// reset pointer to the last page
$tcpdf->lastPage();

echo $tcpdf->Output('File_Name.pdf', 'I');
?>
