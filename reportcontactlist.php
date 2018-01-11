<?php
require ("fpdf.php");
include "db_connect.php";
$stud=$_POST['txtstud'];

/*
$query=mysqli_query($con, "Select * FROM tblsection WHERE tblSectionId = '1' AND tblSectionFlag = 1");
$row=mysqli_fetch_array($query);
$levelid=$row['tblSection_tblLevelId'];
$query=mysqli_query($con, "Select * FROM tblLevel WHERE tblLevelId = '$levelid' AND tblLevelFlag = 1");
$row1=mysqli_fetch_array($query);*/

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('images/logo.png',70,10,150,30);
    // Arial bold 10
    $this->SetFont('Arial','',8);
    // Set placement
    $this->SetXY(140,25);
    // Contact Details
    $this->Cell(10,10,"2/F GA Tower, # 83 EDSA, Mandaluyong City 1550, Philippines",0,0,'C');
    $this->Ln(3);// Line break
    $this->SetX(140);
    $this->Cell(10,10,"Telephone Nos.: 576-4171/0905-5529605",0,0,'C');
    $this->Ln(3);// Line break
    $this->SetX(140);
    $this->Cell(10,10,"E-mail: kiddo_academy@yahoo.com",0,0,'C');
    $this->Ln(3);// Line break
    $this->SetX(140);
    $this->Cell(10,10,"Website: www.kiddoacademy.com",0,0,'C');

    $this->SetFont('Arial','',10);
    $this->SetXY(30,50);//X-Left, Y- Down
    $this->Cell(10,10,'Level: ',0,0,'');
    $this->SetXY(155,50);
    $this->Cell(10,10,"Section:",0,0,'');
    $this->SetXY(30,55);
    $this->Cell(10,10,"Teacher:",0,0,'');


    $this->SetXY(130,65);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,"PARENT CONTACT INFORMATION",0,0,'C');

    $this->Ln(15);// Line break
    $this->SetFont('Arial','',8);
    $this->Cell(30,5,"Student Id",1,0,'C');
    $this->Cell(45,5,"Student Name",1,0,'C');
    $this->Cell(45,5,"Parent's Name",1,0,'C');
    $this->Cell(35,5,"Home Address",1,0,'C');
    $this->Cell(30,5,"Work Phone",1,0,'C');
    $this->Cell(30,5,"Home Phone",1,0,'C');
    $this->Cell(40,5,"E-mail",1,1,'C');

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
    $pdf->SetDrawColor(50,50,100);

$query = mysqli_query($con, "select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as studentname, concat(p.tblParentLname, ', ', p.tblParentFname, ' ', p.tblParentMname) as parentname, concat(p.tblParentAddBldg, ' ', p.tblParentAddSt, ' ', p.tblParentAddBrgy, ' ', p.tblParentAddCity, ' ', p.tblParentAddCountry)  as address,  p.tblParentCpNo, p.tblParentWorkNo, p.tblParentEmail from tblstudent s, tblstudentinfo si, tblparent p, tblparentstudent ps where s.tblStudentId='$stud' and s.tblStudentFlag=1 and p.tblParentFlag=1 and ps.tblParStudFlag=1 and tblStudInfoFlag=1 and s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentId=ps.tblParStud_tblStudentId and p.tblParentId=ps.tblParStud_tblParentId group by p.tblParentId");
while($row3=mysqli_fetch_array($query)):
    $pdf->Cell(30, 5, $row3['tblStudentId'], 1, 0);
    $pdf->Cell(45, 5, $row3['studentname'], 1, 0);
    $pdf->Cell(45, 5, $row3['parentname'], 1, 0);
    $pdf->Cell(35, 5, $row3['address'], 1, 0);
    $pdf->Cell(30, 5, $row3['tblParentCpNo'], 1, 0);
    $pdf->Cell(30, 5, $row3['tblParentWorkNo'], 1, 0);
    $pdf->Cell(40, 5, $row3['tblParentEmail'], 1, 1);
endwhile;
    
    $pdf->SetXY(50,55);
    $pdf->Cell(10, 10, 0, 0);
    $pdf->SetXY(170,50);
    $pdf->Cell(10, 10, 0, 0);
    $pdf->SetXY(50,50);
    $pdf->Cell(10, 10, 0, 0);








    $pdf -> Output();


?>