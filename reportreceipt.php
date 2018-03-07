<?php
require ("fpdf.php");
include "db_connect.php";
$amnt=$_POST['amnt'];
$studname=$_POST['name'];
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
    $this->SetXY(105,25);
    // Contact Details
    $this->Cell(10,10,"2/F GA Tower, # 83 EDSA, Mandaluyong City 1550, Philippines",0,0,'C');
    $this->Ln(3);// Line break
    $this->SetX(105);
    $this->Cell(10,10,"Telephone Nos.: 576-4171/0905-5529605",0,0,'C');
    $this->Ln(3);// Line break
    $this->SetX(105);
    $this->Cell(10,10,"E-mail: kiddo_academy@yahoo.com",0,0,'C');
    $this->Ln(3);// Line break
    $this->SetX(105);
    $this->Cell(10,10,"Website: www.kiddoacademy.com",0,0,'C');

    $this->SetXY(35,55);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,"RECEIPT",0,0);
    $this->SetFont('Arial','',10);
    $this->SetX(145);
    $this->Cell(10,10,'Date: ',0,0);
    
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


    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(30,80);//X-Left, Y- Down
    $pdf->Cell(10,5,'Received from',0,0,'');
    $pdf->Cell(80,5,0,0,'');
    $pdf->SetXY(30,90);
    $pdf->Cell(10,5,'with address at ',0,0,'');
    $pdf->Line(57,95,180,95);
    $pdf->Cell(176,95,',',0,0,'');
    $pdf->SetXY(30,100);//X-Left, Y- Down
    $pdf->Cell(10,10,'the sum of P ',0,0,'');
    $pdf->Line(53,106,83,106);
    $pdf->SetXY(84,100);//X-Left, Y- Down
    $pdf->Cell(10,10,'in partial/full payment of ',0,0,'');
    $pdf->Line(123,106,180,106);
    $pdf->Line(30,115,180,115);

    $pdf->SetXY(30,130);//X-Left, Y- Down
    $pdf->Cell(10,5,'Check: ',0,0,'');
    $pdf->Line(53,135,83,135);
    $pdf->SetXY(30,135);
    $pdf->Cell(10,5,'Amount:',0,0,'');
    $pdf->Line(53,140,83,140);
    $pdf->SetXY(30,140);
    $pdf->Cell(10,5,'Bank: ',0,0,'');
    $pdf->Line(53,145,83,145);
    $pdf->SetXY(30,145);
    $pdf->Cell(10,5,'Date:',0,0,'');
    $pdf->Line(53,150,83,150);




    
    $pdf->SetXY(95,180);//X-Left, Y- Down
    $pdf->Line(125,183,180,183);
    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(137,185);//X-Left, Y- Down
    $pdf->Cell(10,10,'Authorized Signature',0,0,'');





	$pdf -> Output();


?>