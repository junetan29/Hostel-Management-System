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
$pay = mysqli_query($connect,"select * from payment where ID = '$id' ");
$pay1 = mysqli_fetch_array($pay);
$sid = $pay1["StudId"];
$hid = $pay1["HosId"];
$vid = $pay1["VouId"];
$bid = $pay1["BookId"];

$book= mysqli_query($connect, "SELECT * from book where Id = '$bid'");
$book1 = mysqli_fetch_array($book);
$troom = $book1["TotRoom"];

$vou = mysqli_query($connect, "SELECT * from voucher where Id = '$vid'");
$vou1 = mysqli_fetch_array($vou);
$coup = $vou1["CoupId"];

$cou = mysqli_query($connect, "SELECT * from coupon where coupon_id = '$coup'");
$cou1 = mysqli_fetch_array($cou);
$dis = $cou1["coupon_discount"];
$dis1 = $dis * 100;

$stud = mysqli_query($connect, "SELECT * from studregister where User_id = '$sid'");
$stud1 = mysqli_fetch_array($stud);

$hos = mysqli_query($connect, "SELECT * from hostel where ID = '$hid'");
$hos1 = mysqli_fetch_array($hos);
$cid = $hos1["Cat_id"];
$oid = $hos1["Own_id"];

$cat = mysqli_query($connect, "SELECT * from category where ID ='$cid'");
$cat1 = mysqli_fetch_array($cat);

$own = mysqli_query($connect, "SELECT * from owner where owner_id ='$oid'");
$own1 = mysqli_fetch_array($own);

// create some HTML content
$html = '<h3 style="color:#522157;"><em>Hostel:<br>'.$hos1["HosName"].'</em></h3><br /><br />
				<h3 style="color:#522157;"><em>Category:<br>'.$cat1["Category"].'</em></h3><br /><br /><hr>
		<p><h3>Hostel Details: </h3></p>
		<span><b>Owner Name : </b></span>'.$own1["owner_name"].'<span><br/></span><br/>
		<span><b>Contact Number : </b></span><span>'.$own1["owner_phnum"].'</span><br/>
		<span><b>Email : </b></span><span>'.$own1["owner_email"].'</span><br/></span>
		<span><b>Hostel Name : </b></span><span> #'.$hos1["HosName"].'</span><br/>
		<span><b>Hostel Price  : </b></span><span>RM '.$hos1["HosPrice"].'</span><br/>
		<span><b>Room Left : </b></span><span>'.$hos1["TotRoom"].'</span><br/>';
		
$html3 = '<span><b>Student Name : </b></span><span>'.$stud1["Studname"].'</span><br/></span>
				<span><b>Contact Number : </b></span><span> '.$stud1["Studphnum"].'</span><br/>
				<span><b>Email : </b></span><span>'.$stud1["Studemail"].'</span><br/>
				<span><b>Bank : </b></span><span>'.$pay1["Bank"].'</span><br/></span>
				<span><b>Payment Date : </b></span><span> '.$pay1["PaymentDate"].'</span><br/>
				<span><b>Payment : </b></span><span>RM '.$pay1["Price"].'</span><br/>
				<span><b>Voucher Type: </b></span><span>'.$cou1["coupon_title"].'</span><br/></span>
				<span><b>Discount : </b></span><span> '.$dis1.'%</span><br/>
				<span><b>Move In Date : </b></span><span>'.$pay1["MoveIn"].'</span><br/>';
				
		
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
	
$price = $hos1["HosPrice"] * $troom;
$comm = $price*0.1;
$total = $price-$comm;

if($vid=='0')
{
	$com= $hos1["HosPrice"] * 0.10;
}
else
{
	$disc = $cou1["coupon_discount"];
	$com = $price * $disc;
}

$tbl .='
 <tr nobr="true">
   <td>RM '.number_format($pay1["Price"], 2, '.', '').'</td>
   <td>RM '.number_format($com, 2, '.', '').'</td>
   <td>'.number_format($total, 2, '.', '').'</td>
 </tr>';

}

 $tbl .='
 <hr>

 <tr nobr="true">
  <td></td>
  <td></td>
  <td colspan="3"><span style="font-size:18px;"><b>Total : </b></span><span style="font-size:18px; color:#43978D;"><b>RM'.number_format($com, 2, '.', '').'</b></span></td>
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