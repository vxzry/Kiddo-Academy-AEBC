<?php
require ("fpdf.php");
$con  = mysqli_connect("localhost","root","");
mysqli_select_db($con,'dbkadc');

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

    $this->SetXY(105,55);
    $this->SetFont('Arial','B',15);
    $this->Cell(10,10,"STUDENT INFORMATION REPORT",0,0,'C');
    
}

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

    $query = mysqli_query($con, "Select concat(ti.tblStudInfoLname, ', ', ti.tblStudInfoFname, ' ', ti.tblStudInfoMname) as studentname, a.tblStudentId, l.tblLevelName, ti.tblStudInfoGender, ti.tblStudInfoNationality, ti.tblStudInfoBday, ti.tblStudInfoLang1, concat(ti.tblStudInfoAddBldg, ', ', ti.tblStudInfoAddSt) as addstreet, ti.tblStudInfoAddBrgy, ti.tblStudInfoAddCity, ti.tblStudInfoAddCountry, p.tblParentRelation, p.tblParentFName, p.tblParentLName, p.tblParentCpNo FROM tblstudent as a, tblstudentinfo as ti, tbllevel as l, tblParent as p WHERE ti.tblStudInfo_tblStudentId=a.tblStudentId and a.tblStudent_tblLevelId=l.tblLevelId and a.tblStudentId=17001 and p.tblParentId=17001");
 
 while($row3=mysqli_fetch_array($query)){
    $pdf->SetFont('Arial','',8);
    $pdf->SetXY(65,75);
    $pdf->Cell(10,5,$row3['studentname'],0,0);
    $pdf->SetXY(55,80);
    $pdf->Cell(10,5,$row3['tblStudentId'],0,0);
    $pdf->SetXY(55,85);
    $pdf->Cell(10,5,$row3['tblLevelName'],0,0);
    $pdf->SetXY(55,90);
    $pdf->Cell(10,5,$row3['tblStudInfoGender'],0,0);
    $pdf->SetXY(55,95);
    $pdf->Cell(10,5,$row3['tblStudInfoNationality'],0,0);
    $pdf->SetXY(55,100);
    $pdf->Cell(10,5,$row3['tblStudInfoBday'],0,0);
    $pdf->SetXY(55,105);
    $pdf->Cell(10,5,$row3['tblStudInfoLang1'],0,0);

    
    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(45,120);
    $pdf->Cell(10,10,$row3['addstreet'],0,0);
    $pdf->SetXY(45,125);
    $pdf->Cell(10,10,$row3['tblStudInfoAddBrgy'],0,0);
    $pdf->SetXY(45,130);
    $pdf->Cell(10,10,$row3['tblStudInfoAddCity'],0,0);
    $pdf->SetXY(45,135);
    $pdf->Cell(10,10,$row3['tblStudInfoAddCountry'],0,0);


    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(55,155);
    $pdf->Cell(10,10,$row3['tblParentRelation'],0,0);
    $pdf->SetXY(55,160);
    $pdf->Cell(10,10,$row3['tblParentFName'],0,0);
    $pdf->SetXY(55,165);
    $pdf->Cell(10,10,$row3['tblParentLName'],0,0);
    $pdf->SetXY(55,170);
    $pdf->Cell(10,10,$row3['tblParentCpNo'],0,0);
    $pdf->SetXY(55,175);
    $pdf->Cell(10,10,$row3['addstreet'],0,0);
    $pdf->SetXY(55,180);
    $pdf->Cell(10,10,$row3['tblStudInfoAddBrgy'],0,0);
    $pdf->SetXY(55,185);
    $pdf->Cell(10,10,$row3['tblStudInfoAddCity'],0,0);
    $pdf->SetXY(45,190);
    $pdf->Cell(10,10,$row3['tblStudInfoAddCountry'],0,0);

}

    $pdf->SetXY(35,70);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,5,"Personal Information",0,0);
    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(35,75);
    $pdf->Cell(10,5,"Student Name: ",0,0);
    $pdf->SetXY(35,80);
    $pdf->Cell(10,5,"Student ID: ",0,0);
    $pdf->SetXY(35,85);
    $pdf->Cell(10,5,"Grade: ",0,0);
    $pdf->SetXY(35,90);
    $pdf->Cell(10,5,"Gender: ",0,0);
    $pdf->SetXY(35,95);
    $pdf->Cell(10,5,"Nationality: ",0,0);
    $pdf->SetXY(35,100);
    $pdf->Cell(10,5,"Birth Date: ",0,0);
    $pdf->SetXY(35,105);
    $pdf->Cell(10,5,"Language Spoken: ",0,0);

    
    $pdf->SetXY(35,115);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,10,"Home Address",0,0);
    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(35,120);
    $pdf->Cell(10,10,"Address1: ",0,0);
    $pdf->SetXY(35,125);
    $pdf->Cell(10,10,"Address2: ",0,0);
    $pdf->SetXY(35,130);
    $pdf->Cell(10,10,"City: ",0,0);
    $pdf->SetXY(35,135);
    $pdf->Cell(10,10,"State: ",0,0);


    /*$pdf->SetXY(115,115);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,10,"Mailing Address",0,0);
    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(115,120);
    $pdf->Cell(10,10,"Address1: ",0,0);
    $pdf->SetXY(115,125);
    $pdf->Cell(10,10,"Address2: ",0,0);
    $pdf->SetXY(115,130);
    $pdf->Cell(10,10,"City: ",0,0);
    $pdf->SetXY(115,135);
    $pdf->Cell(10,10,"State: ",0,0);*/
  

    $pdf->SetXY(35,150);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,10,"Primary Emergency Contact",0,0);
    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(35,155);
    $pdf->Cell(10,10,"Relation: ",0,0);
    $pdf->SetXY(35,160);
    $pdf->Cell(10,10,"First Name: ",0,0);
    $pdf->SetXY(35,165);
    $pdf->Cell(10,10,"Last Name: ",0,0);
    $pdf->SetXY(35,170);
    $pdf->Cell(10,10,"Mobile No.: ",0,0);
    $pdf->SetXY(35,175);
    $pdf->Cell(10,10,"Address1: ",0,0);
    $pdf->SetXY(35,180);
    $pdf->Cell(10,10,"Address2: ",0,0);
    $pdf->SetXY(35,185);
    $pdf->Cell(10,10,"City: ",0,0);
    $pdf->SetXY(35,190);
    $pdf->Cell(10,10,"State: ",0,0);
    


    $pdf->SetXY(115,150);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,10,"Secondary Emergency Contact",0,0);
    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(115,155);
    $pdf->Cell(10,10,"Relation: ",0,0);
    $pdf->SetXY(115,160);
    $pdf->Cell(10,10,"First Name: ",0,0);
    $pdf->SetXY(115,165);
    $pdf->Cell(10,10,"Last Name: ",0,0);
    $pdf->SetXY(115,170);
    $pdf->Cell(10,10,"Mobile No.: ",0,0);
    $pdf->SetXY(115,175);
    $pdf->Cell(10,10,"Address1: ",0,0);
    $pdf->SetXY(115,180);
    $pdf->Cell(10,10,"Address2: ",0,0);
    $pdf->SetXY(115,185);
    $pdf->Cell(10,10,"City: ",0,0);
    $pdf->SetXY(115,190);
    $pdf->Cell(10,10,"State: ",0,0);
  

    $pdf -> Output();


?>