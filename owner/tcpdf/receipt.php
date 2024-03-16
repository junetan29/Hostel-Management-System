<?php 
$connect=mysqli_connect("localhost","root","","fyp");
include("library/tcpdf.php");
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'home.png';
        $this->Image($image_file, 90, 15, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
		$this->SetFont('helvetica', 'B', 20);
		$this->SetTextColor(180);
        // Title
        $this->Cell(0, 15, 'JTY Hostel', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('PDF_CREATOR','JTY Hostel');
$pdf->SetAuthor('JTY Hostel');
$pdf->SetTitle('Receipt');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 11);

// add a page
$pdf->AddPage();

if(isset($_GET["id"]))
{
$id = $_GET["id"];
$sql ="select * from payment where ID = '$id' ";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);
$sid=$row["StudId"];
$hid=$row["HosId"];
$bid=$row["BookId"];

$sql2 ="select * from studregister where User_id = '$sid' ";
$result2 = mysqli_query($connect,$sql2);
$row2 = mysqli_fetch_assoc($result2);

$sql3="select * from book where Id = '$bid'";
$result3=mysqli_query($connect,$sql3);
$row3=mysqli_fetch_assoc($result3);
$num=$row3['TotRoom'];

$sql4="select * from hostel where ID = '$hid'";
$result4=mysqli_query($connect,$sql4);
$row4=mysqli_fetch_assoc($result4);
$oid=$row4['Own_id'];
$cid=$row4['Cat_id'];
$hosprice=$row4["HosPrice"]*$num;

$sql5="select * from owner where owner_id = '$oid'";
$result5=mysqli_query($connect,$sql5);
$row5=mysqli_fetch_assoc($result5);

$sql6="select * from category where ID = '$cid'";
$result6=mysqli_query($connect,$sql6);
$row6=mysqli_fetch_assoc($result6);

// create some HTML content
$html = '<br/><h3 style="color:#522157;"><em>Dear '.$row5["owner_name"].',</em></h3><br/>
		<p>Your Hostel (<span style="color:#43978D;"><b>'.$row4["HosName"].'</b></span>) is being rented by</p><hr><br/>
		<p><span><b>Student Name : </b></span>'.$row2["Studname"].'<span><br/></span><br/>
		<span><b>Telephone : </b></span><span>'.$row2["Studphnum"].'</span><br/>
		<span><b>Email : </b></span><span>'.$row2["Studemail"].'</span><br/></span>
		<span><b>Payment ID : </b></span><span> #'.$row["ID"].'</span><br/>
		<span><b>Room ID : </b></span><span>'.$row3["Id"].'</span><br/>
		<span><b>Payment Date : </b></span><span>'.$row["PaymentDate"].'</span><br/>';
		
$html3 = '<span><b>Hostel Name : </b></span><span>'.$row4["HosName"].'</span><br/></span>
		<span><b>Hostel Price : </b></span><span> RM '.$row4["HosPrice"].'</span><br/>
		<span><b>Category : </b></span><span>'.$row6["Category"].'</span><br/>';
		
$html2 = '<br/><h2>Payment Details :</p><br/>';

// NON-BREAKING ROWS (nobr="true")
$tbl = '<table cellpadding="10" cellspacing="0" align="center">
 <tr>
  <th style="color:#7097A8;"><em><b>Student Paid Amount</b></em></th>
  <th style="color:#7097A8;"><em><b>Admin Commission</b></em></th>
  <th style="color:#7097A8;"><em><b>Owner Receive Amount</b></em></th>

 </tr>
 <hr>';
{
	
$price = $hosprice;
$comm = $price*0.1;
$total = $price-$comm;

$tbl .='
 <tr nobr="true">
   <td>'.$price.'</td>
   <td>(-'.$comm.')</td>
   <td>'.$total.'</td>
 </tr>';

}

 $tbl .='
 <hr>

 <tr nobr="true">
  <td></td>
  <td></td>
  <td colspan="3"><span style="font-size:18px;"><b>Total : </b></span><span style="font-size:18px; color:#43978D;"><b>RM'.number_format($total, 2, '.', '').'</b></span></td>
  <td></td>
 </tr>
</table>
';
}

// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);
$pdf->writeHTML($html3, true, 0, true, 0);
$pdf->writeHTML($html2, true, 0, true, 0);
//$pdf->SetLeftMargin(85);
$pdf->writeHTML($tbl, true, false, false, false, '');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

ob_end_clean();
//Close and output PDF document
$pdf->Output('Receipt.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+