<?php
require ("fpdf.php");
// $con  = mysqli_connect("localhost","root","");
// mysqli_select_db($con,'dbkadc');
include "db_connect.php";

$query=mysqli_query($con, "Select * FROM tblschoolyear WHERE tblSchoolYrActive='ACTIVE' AND tblSchoolYearFlag = 1");
$row=mysqli_fetch_array($query);
$syid = $row['tblSchoolYrId'];
$firstname=$_POST['fname'];
$middlename=$_POST['mname'];
$lastname=$_POST['lname'];
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


    $this->SetXY(105,65);
    $this->SetFont('Arial','B',12);
    $this->Cell(5,10,"Notice of Admission",0,0,'C');


    
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

    $pdf->SetXY(25,80);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(5,10,"Dear",0,0,'C');
    $pdf->Cell(20,10,$lastname,0,0,'C');
    $pdf->Cell(30,10,$firstname,0,0,'C');
    $pdf->Cell(20,10,$middlename,0,0,'C');

    $pdf->SetXY(113,90);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(5,10,"We congratulate and inform you that you are now admitted to Kiddo Academy and",0,0,'C');

    $pdf->SetXY(102,100);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(5,10,"Development Center. You are requested to settle your bill and present the required documents",0,0,'C');

    $pdf->SetXY(42,110);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(5,10,"at the time of admission.",0,0,'C');

    $pdf->SetXY(108,120);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(5,10,"For further information, contact the management or go through the guidelines in",0,0,'C');

    $pdf->SetXY(60,130);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(5,10,"the website (https://kiddoacademy.com).",0,0,'C');

    $pdf->SetXY(50,140);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(5,10,"Thank you.",0,0,'C');



    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(150,230);//X-Left, Y- Down
    $pdf->Cell(10,10,'Aimee Tayag-Ang',0,0,'');
    $pdf->SetFont('Arial','',8);
    $pdf->SetXY(150,235);//X-Left, Y- Down
    $pdf->Cell(10,10,'School-Head',0,0,'');






    $pdf -> Output();


?>