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
    $this->Image('images/logo.png',65,10,150,30);
    // Arial bold 10
    $this->SetFont('Arial','',8);
    // Set placement
    $this->SetXY(135,25);
    // Contact Details
    $this->Cell(10,10,"2/F GA Tower, # 83 EDSA, Mandaluyong City 1550, Philippines",0,0,'C');
    $this->Ln(3);// Line break
    $this->SetX(135);
    $this->Cell(10,10,"Telephone Nos.: 576-4171/0905-5529605",0,0,'C');
    $this->Ln(3);// Line break
    $this->SetX(135);
    $this->Cell(10,10,"E-mail: kiddo_academy@yahoo.com",0,0,'C');
    $this->Ln(3);// Line break
    $this->SetX(135);
    $this->Cell(10,10,"Website: www.kiddoacademy.com",0,0,'C');

    $this->SetFont('Arial','',10);
    $this->SetXY(30,50);//X-Left, Y- Down
    $this->Cell(10,10,'Name of Student: ',0,0,'');
    $this->SetXY(180,50);
    $this->Cell(10,10,'Student #: ',0,0,'');
    $this->SetXY(30,55);
    $this->Cell(10,10,'Level: ',0,0,'');
    $this->SetXY(180,55);
    $this->Cell(10,10,'Date: ',0,0,'');
    $this->SetXY(30,60);
    $this->Cell(10,10,'Scheme Type: ',0,0,'');

    $this->SetXY(130,70);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,"STATEMENT OF ACCOUNT",0,0,'C');

    $this->Ln(15);// Line break
    $this->SetFont('Arial','',8);
    $this->Cell(25,5,"Due/Payment Date",1,0,'C');
    $this->Cell(15,5,"Code",1,0,'C');
    $this->Cell(40,5,"Details",1,0,'C');
    $this->Cell(15,5,"TN#",1,0,'C');
    $this->Cell(25,5,"Credit",1,0,'C');
    $this->Cell(25,5,"Receipt Number",1,0,'C');
    $this->Cell(25,5,"Payment Date",1,0,'C');
    $this->Cell(25,5,"Payment",1,0,'C');
    $this->Cell(25,5,"Running Balance",1,0,'C');
    $this->Cell(40,5,"Remarks",1,1,'C');
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
	$pdf -> AddPage("L","Letter",0);
    //$pdf -> SetFont('Arial','',8);

    //$query = mysqli_query(query)


    
    $pdf->Cell(80,5,"Total on School Year End",1,0,'C');
    $pdf->Cell(15,5," ",1,0,'C');
    $pdf->Cell(25,5," ",1,0,'C');
    $pdf->Cell(25,5," ",1,0,'C');
    $pdf->Cell(25,5," ",1,0,'C');
    $pdf->Cell(25,5," ",1,0,'C');
    $pdf->Cell(25,5," ",1,0,'C');
    $pdf->Cell(40,5," ",1,0,'C');
  



    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(30,180);//X-Left, Y- Down
    $pdf->Cell(10,10,'Aimee Tayag-Ang',0,0,'');
    $pdf->SetFont('Arial','',8);
    $pdf->SetXY(30,185);//X-Left, Y- Down
    $pdf->Cell(10,10,'School-Head',0,0,'');






	$pdf -> Output();


?>