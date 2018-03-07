<?php
require ("fpdf.php");
$con  = mysqli_connect("localhost","root","");
mysqli_select_db($con,'dbkadc');

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
    $this->SetXY(30,50);//X-Left, Y- Down

   $tDate=date('Y-m-d');
    $this->Cell(10,10,'Date: '.$tDate,0,0,'');

    $this->SetXY(100,60);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,"DAILY COLLECTION REPORT",0,0,'C');

    $this->Ln(15);// Line break
    $this->SetFont('Arial','',8);
    $this->Cell(55,5,"Receive from",1,0,'C');
    $this->Cell(40,5,"Payment Date",1,0,'C');
    $this->Cell(35,5,"Official Receipt #",1,0,'C');
    $this->Cell(35,5,"Provisional Receipt #",1,0,'C');
    $this->Cell(30,5,"Amount",1,1,'C');
    
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

    //$query = mysqli_query(query)
    $tDate=date('Y-m-d');
  $query = mysqli_query($con, "Select a.tblStudentId, concat(ti.tblStudInfoLname, ', ', ti.tblStudInfoFname, ' ', ti.tblStudInfoMname) as studentname, fe.tblFeeName, ac.tblAccOR, ac.tblAccPR, ac.tblAccCredit FROM tblstudent a, tblstudentinfo ti, tblfee fe, tblscheme sc, tblaccount ac, tblstudscheme ssc WHERE a.tblStudentId = ti.tblStudInfo_tblStudentId AND a.tblStudentId=ssc.tblStudScheme_tblStudentId AND fe.tblFeeId=ssc.tblStudScheme_tblFeeId AND ssc.tblStudScheme_tblSchemeId=sc.tblSchemeId AND ac.tblAcc_tblStudSchemeId=ssc.tblStudScheme_tblFeeId and ac.tblAccPaymentDate='".$tDate."'");

while($row3=mysqli_fetch_array($query)){

    // $pdf->SetXY(40,85);
    $pdf->Cell(55, 5, $row3['studentname'], 1, 0);
    $pdf->Cell(40, 5, $row3['tblFeeName'], 1, 0);
    $pdf->Cell(35, 5, $row3['tblAccOR'], 1, 0);
    $pdf->Cell(35, 5, $row3['tblAccPR'], 1, 0);
    $pdf->Cell(30, 5, $row3['tblAccCredit'], 1, 1);
}

    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(30,225);//X-Left, Y- Down
    $pdf->Cell(10,10,'Aimee Tayag-Ang',0,0,'');
    $pdf->SetFont('Arial','',8);
    $pdf->SetXY(30,230);//X-Left, Y- Down
    $pdf->Cell(10,10,'School-Head',0,0,'');





	$pdf -> Output();


?>