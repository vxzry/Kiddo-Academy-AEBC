<?php
require ("fpdf.php");
// $con  = mysqli_connect("localhost","root","");
// mysqli_select_db($con,'dbkadc');
include "db_connect.php";
$sect=$_POST['txtsect'];
/*8
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

    $this->SetFont('Arial','B',10);
    $this->SetXY(30,50);//X-Left, Y- Down
    $this->Cell(10,10,'Level: ',0,0,'');
    $this->SetXY(150,50);
    $this->Cell(10,10,"Section:",0,0,'');
    $this->SetXY(30,55);
    $this->Cell(10,10,"Teacher:",0,0,'');


    $this->SetXY(105,65);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,"CLASS LIST",0,0,'C');

    $this->SetXY(40,80);
    $this->SetFont('Arial','B',8);
    $this->Cell(40,5,"Student Id",1,0,'C');
    $this->Cell(100,5,"Student Name",1,1,'C');

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

   $query = mysqli_query($con, "Select a.tblStudentId, concat(ti.tblStudInfoLname, ', ', ti.tblStudInfoFname, ' ', ti.tblStudInfoMname) as studentname, concat(fc.tblFacultyLname, ', ', fc.tblFacultyFname, ' ', fc.tblFacultyMname) as facultyname, st.tblSectionName, lv.tblLevelName FROM tblstudent a, tblstudentinfo ti, tblsection st, tblfaculty fc, tblLevel lv WHERE a.tblStudentId = ti.tblStudInfo_tblStudentId AND a.tblStudent_tblSectionId = st.tblSectionId and st.tblSection_tblFacultyId = fc.tblFacultyId and st.tblSection_tblLevelId=lv.tblLevelId and st.tblSectionId='".$sect."'");

while($row3=mysqli_fetch_array($query)){

    $pdf->SetXY(40,85);
    $pdf->Cell(40, 5, $row3['tblStudentId'], 1, 0);
    $pdf->Cell(100, 5, $row3['studentname'], 1, 1);
    $pdf->SetXY(50,55);
    $pdf->Cell(10, 10, $row3['facultyname'], 0, 0);
    $pdf->SetXY(170,50);
    $pdf->Cell(10, 10, $row3['tblSectionName'], 0, 0);
    $pdf->SetXY(50,50);
    $pdf->Cell(10, 10, $row3['tblLevelName'], 0, 0);
}

  
    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(30,230);//X-Left, Y- Down
    $pdf->Cell(10,10,'Aimee Tayag-Ang',0,0,'');
    $pdf->SetFont('Arial','',8);
    $pdf->SetXY(30,235);//X-Left, Y- Down
    $pdf->Cell(10,10,'School-Head',0,0,'');



    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(150,230);//X-Left, Y- Down
    $pdf->Cell(10,10,'Aimee Tayag-Ang',0,0,'');
    $pdf->SetFont('Arial','',8);
    $pdf->SetXY(150,235);//X-Left, Y- Down
    $pdf->Cell(10,10,'Teacher',0,0,'');






    $pdf -> Output();


?>