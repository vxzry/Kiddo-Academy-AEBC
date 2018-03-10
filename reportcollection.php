<?php
require ("fpdf.php");
include "db_connect.php";
$type=$_POST['txttype'];
$sysy=$_POST['txtsy'];
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('images/logo.png',35,10,150,30);
    // Arial bold 10
    $this->SetFont('Arial','',8);
    // Set placement
    $this->SetXY(111,25);
    // Contact Details
    $this->Cell(10,10,"2/F GA Tower, # 83 EDSA, Mandaluyong City 1550, Philippines",0,0,'C');
    $this->Ln(3);// Line break
    $this->SetX(111);
    $this->Cell(10,10,"Telephone Nos.: 576-4171/0905-5529605",0,0,'C');
    $this->Ln(3);// Line break
    $this->SetX(111);
    $this->Cell(10,10,"E-mail: kiddo_academy@yahoo.com",0,0,'C');
    $this->Ln(3);// Line break
    $this->SetX(111);
    $this->Cell(10,10,"Website: www.kiddoacademy.com",0,0,'C');

    $this->SetFont('Arial','',10);
    $this->SetXY(170,50);//X-Left, Y- Down

    $tDate=date('Y-m-d');
    $this->Cell(10,10,'Date: '.$tDate,0,0,'');
    
}



 // function Content()

// Page footer
function Footer()
{
   // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

	$pdf = new PDF();
	$pdf -> AliasNbPages();
	$pdf -> AddPage("P","Letter",0);
    //$pdf -> SetFont('Arial','',8);

    $pdf->SetXY(100,60);
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(10,10,"Collection Report(".$type.")",0,0,'C');

    $pdf->Ln(15);// Line break
    $pdf->SetFont('Arial','',8);
    $pdf->SetX('40');
    $pdf->Cell(55,5,"Fee Name",1,0,'C');
    $pdf->Cell(40,5,"# of Transactions",1,0,'C');
    $pdf->Cell(35,5,"Amount",1,1,'C');
    //$query = mysqli_query(query)
    $tDate=date('Y-m-d');
    if($type=='Annually')
    {
    $tamount=0;
    $query = mysqli_query($con, "select tblFeeId, tblFeeName, tblFeeCode from tblfee where tblFeeFlag=1");
    while($row=mysqli_fetch_array($query))
    {
        $feeid=$row['tblFeeId'];
        $query1=mysqli_query($con, "select tblfee.tblFeeName, COUNT(tblaccount.tblAccId) as numtrans, tblaccount.tblAcc_tblStudentId, SUM(tblaccount.tblAccPayment) as totalp from tblfee, tblaccount, tblstudscheme where tblfee.tblFeeId=tblstudscheme.tblStudScheme_tblFeeId and tblaccount.tblAcc_tblStudSchemeId=tblstudscheme.tblStudSchemeId and tblstudscheme.tblStudScheme_tblSchoolYrId='$sysy' and tblaccount.tblAccFlag=1 and tblaccount.tblAccPaid='PAID' and tblfee.tblFeeId='$feeid'");
        $row1=mysqli_fetch_array($query1);

    $pdf->SetX(40);
    $pdf->Cell(55, 5, $row1['tblFeeName'], 1, 0);
    $pdf->Cell(40, 5, $row1['numtrans'], 1, 0);
    $pdf->Cell(35, 5, $row1['totalp'], 1, 1);

    $tamount+=$row1['totalp'];
    }}
    $pdf->SetX(40);
    $pdf->Cell(95, 5, 'TOTAL: ', 1, 0);
    $pdf->Cell(35, 5, $tamount, 1, 1);


    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(30,225);//X-Left, Y- Down
    $pdf->Cell(10,10,'Aimee Tayag-Ang',0,0,'');
    $pdf->SetFont('Arial','',8);
    $pdf->SetXY(30,230);//X-Left, Y- Down
    $pdf->Cell(10,10,'School-Head',0,0,'');





	$pdf -> Output();


?>