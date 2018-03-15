<?php
require ("fpdf.php");
// $con  = mysqli_connect("localhost","root","");
// mysqli_select_db($con,'dbkadc');
include "db_connect.php";

$query="select tblSchoolYrStart from tblschoolyear where tblSchoolYrActive='Active'";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$sy=substr($row['tblSchoolYrStart'], 2);
$query = "select * from tblstudent where left(tblStudentId, 2)='$sy' group by tblStudentId desc limit 0, 1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$studId=substr($row['tblStudentId'], 3);
if(empty($studId))
{
    $studId='001';
}else
{
    $studId++;
}
$id = sprintf('%03d', $studId);
$studentid=$sy.$id;

$query="select tblSchoolYrStart from tblschoolyear where tblSchoolYrActive='Active'";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$sy=substr($row['tblSchoolYrStart'], 2);

$req = $_POST['chkReq'];
$parentStat = $_POST['chkParentStat'];
$liveswith = $_POST['chkLivesWith'];

$type = $_POST['r3'];
$lvl = $_POST['selLevel'];
$fname = $_POST['txtStudFname'];
$lname = $_POST['txtStudLname'];
$mname = $_POST['txtStudMname'];
$bday = $_POST['txtStudBday'];
$bplace= $_POST['txtStudBplace'];
$nat = $_POST['txtStudNat'];
$gender = $_POST['txtStudGender'];
$religion = $_POST['txtStudReligion'];
$addBldg = $_POST['txtStudAddBldg'];
$addSt = $_POST['txtStudAddSt'];
$addBrgy = $_POST['txtStudAddBrgy'];
$addCity = $_POST['txtStudAddCity'];
$addCountry = $_POST['txtStudAddCountry'];
$lang1 = $_POST['txtStudLang1'];
$lang2 = $_POST['txtStudLang2'];

$fatherfname = $_POST['txtFatherFname'];
$fatherlname = $_POST['txtFatherLname'];
$fathermname = $_POST['txtFatherMname'];
$fathernum = $_POST['txtFatherNum'];
$fatheremail = $_POST['txtFatherEmail'];
$fatheraddbldg = $_POST['txtFatherAddBldg'];
$fatheraddst = $_POST['txtFatherAddSt'];
$fatheraddbrgy = $_POST['txtFatherAddBrgy'];
$fatheraddcity = $_POST['txtFatherAddCity'];
$fatheraddcountry = $_POST['txtFatherAddCountry'];
$fathertelnum = $_POST['txtFatherTelnum'];
$fatherjob = $_POST['txtFatherJob'];
$fathercom = $_POST['txtFatherCompany'];
$fathercomaddbldg = $_POST['txtFatherComAddBldg'];
$fathercomaddst = $_POST['txtFatherComAddSt'];
$fathercomaddbrgy = $_POST['txtFatherComAddBrgy'];
$fathercomaddcity = $_POST['txtFatherComAddCity'];
$fathercomaddcountry = $_POST['txtFatherComAddCountry'];
$fathercomnum = $_POST['txtFatherComNum'];

$motherfname = $_POST['txtMotherFname'];
$motherlname = $_POST['txtMotherLname'];
$mothermname = $_POST['txtMotherMname'];
$mothernum = $_POST['txtMotherNum'];
$motheremail = $_POST['txtMotherEmail'];
$motheraddbldg = $_POST['txtMotherAddBldg'];
$motheraddst = $_POST['txtMotherAddSt'];
$motheraddbrgy = $_POST['txtMotherAddBrgy'];
$motheraddcity = $_POST['txtMotherAddCity'];
$motheraddcountry = $_POST['txtMotherAddCountry'];
$mothertelnum = $_POST['txtMotherTelnum'];
$motherjob = $_POST['txtMotherJob'];
$mothercom = $_POST['txtMotherCompany'];
$mothercomaddbldg = $_POST['txtMotherComAddBldg'];
$mothercomaddst = $_POST['txtMotherComAddSt'];
$mothercomaddbrgy = $_POST['txtMotherComAddBrgy'];
$mothercomaddcity = $_POST['txtMotherComAddCity'];
$mothercomaddcountry = $_POST['txtMotherComAddCountry'];
$mothercomnum = $_POST['txtMotherComNum'];

$allergies = $_POST['txtHealthAllergies'];
$illness = $_POST['txtHealthIllness'];
$meds = $_POST['txtHealthMeds'];
$btype = $_POST['selHealthBtype'];
$h2 = $_POST['h2'];
$reason = $_POST['txtHealthReason'];
$r1 = $_POST['r1'];
$doctor = $_POST['txtHealthDoctor'];
$hospital = $_POST['txtHealthHospital'];
$hosnum = $_POST['txtHealthHosNum'];
$hosaddbldg = $_POST['txtHealthAddBldg'];
$hosaddst = $_POST['txtHealthAddSt'];
$hosaddbrgy = $_POST['txtHealthAddBrgy'];
$hosaddcity = $_POST['txtHealthAddCity'];
$hosaddcountry = $_POST['txtHealthAddCountry'];

$sibName=$_POST['txtSiblName'];
$sibAge=$_POST['txtSiblAge'];
$sibGrd=$_POST['txtSiblGrd'];
$sibSchool=$_POST['txtSiblSchool'];
$relName=$_POST['txtRelName'];
$relAge=$_POST['txtRelAge'];
$relRelation=$_POST['txtRelRelation'];
$emName=$_POST['txtEmName'];
$emRel=$_POST['txtReltoStud'];
$emNum=$_POST['txtEmNum'];
$emAddress=$_POST['txtEmAdress'];


$query="insert into tblstudent(tblStudentId, tblStudentType, tblStudent_tblLevelId, tblStudentFlag, tblStudentTransferee) values ('$studentid', 'APPLICANT', '$lvl', 1, '$type')";
$result=mysqli_query($con, $query);

$x=count($sibName);
for($i=0; $i<$x; $i++)
{
    $sname=$sibName[$i];
    $sage=$sibAge[$i];
    $sgrd=$sibGrd[$i];
    $sschool=$sibSchool[$i];
    $query="select * from tblstudsiblings order by tblStudSibId desc limit 0, 1";
    $result=mysqli_query($con, $query);
    $row=mysqli_fetch_array($result);
    $siblingid=$row['tblStudSibId'];
    $siblingid++;
    $query="insert into tblstudsiblings(tblStudSibId, tblStudSibName, tblStudSibAge, tblStudSibGrade, tblStudSibSchool, tblStudSib_tblStudId) values ('$siblingid','$sname', '$sage', '$sgrd', '$sschool', '$studentid')";
    if (!$query = mysqli_query($con, $query)) {
       exit(mysqli_error($con));
    }
    
}

$y=count($relName);
for($j=0; $j<$y; $j++)
{
    $rname=$relName[$j];
    $rage=$relAge[$j];
    $rrelation=$relRelation[$j];
    $query="select * from tblstudrelative order by tblStudRelId desc limit 0, 1";
    $result=mysqli_query($con, $query);
    $row=mysqli_fetch_array($result);
    $relativeid=$row['tblStudRelId'];
    $relativeid++;
    $query="insert into tblstudrelative(tblStudRelId, tblStudRelName, tblStudRelAge, tblStudRelRelation, tblStudRel_tblStudentId) values ('$relativeid', '$rname', '$rage', '$rrelation', '$studentid')";
    if (!$query = mysqli_query($con, $query)) {
       exit(mysqli_error($con));
    }
}
/*added*/
$z=count($emName);
for($i=0; $i<$z; $i++)
{
    $ename=$emName[$i];
    $erel=$emRel[$i];
    $enum=$emNum[$i];
    $eaddress=$emAddress[$i];
    $query="select * from tblstudemergency order by tblStudEmId desc limit 0, 1";
    $result=mysqli_query($con, $query);
    $row=mysqli_fetch_array($result);
    $studemid=$row['tblStudEmId'];
    $studemid++;
    $query="insert into tblstudemergency(tblStudEmId, tblStudEmName, tblStudEmRelation, tblStudEmTelNo, tblStudEmAddress, tblStudEm_tblStudentId) values ('$studemid','$ename', '$erel', '$enum', '$eaddress', '$studentid')";
    if (!$query = mysqli_query($con, $query)) {
       exit(mysqli_error($con));
    }
    
}
/*added*/
$query = "select * from tblstudentinfo order by tblStudInfoId desc limit 0, 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$infoid = $row['tblStudInfoId'];
$infoid ++;
$query="insert into tblstudentinfo(tblStudInfoId, tblStudInfoFname, tblStudInfoLname, tblStudInfoMname, tblStudInfoBday, tblStudInfoBplace, tblStudInfoGender, tblStudInfoNationality, tblStudInfoReligion, tblStudInfoLang1, tblStudInfoLang2, tblStudInfo_tblStudentId, tblStudInfoAddBldg, tblStudInfoAddSt, tblStudInfoAddBrgy, tblStudInfoAddCity, tblStudInfoAddCountry) values ('$infoid', '$fname', '$lname', '$mname', '$bday', '$bplace', '$gender', '$nat', '$religion', '$lang1', '$lang2', '$studentid', '$addBldg', '$addSt', '$addBrgy', '$addCity', '$addCountry')";
if (!$query = mysqli_query($con, $query)) {
       exit(mysqli_error($con));
    }

$query = "select * from tblparent where left(tblParentId, 2)='$sy' group by tblParentId desc limit 0, 1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$parent=substr($row['tblParentId'], 3);
if(empty($parent))
{
    $parent='001';
}else
{
    $parent++;
}
$id2 = sprintf('%03d', $parent);
$parentid=$sy.$id2;
$query="insert into tblparent(tblParentId, tblParentRelation, tblParentFname, tblParentLname, tblParentMname, tblParentCpNo, tblParentEmail, tblParentTelNo, tblParentOccupation, tblParentCompany, tblParentWorkNo, tblParentAddBldg, tblParentAddSt, tblParentAddBrgy, tblParentAddCity, tblParentAddCountry, tblParentComAddBldg, tblParentComAddSt, tblParentComAddBrgy, tblParentComAddCity, tblParentComAddCountry) values ('$parentid', 'FATHER', '$fatherfname', '$fatherlname', '$fathermname', '$fathernum', '$fatheremail', '$fathertelnum', '$fatherjob', '$fathercom', '$fathercomnum', '$fatheraddbldg', '$fatheraddst', '$fatheraddbrgy', '$fatheraddcity', '$fatheraddcountry', '$fathercomaddbldg', '$fathercomaddst', '$fathercomaddbrgy', '$fathercomaddcity', '$fathercomaddcountry')";
if (!$query = mysqli_query($con, $query)) {
       exit(mysqli_error($con));
    }
$query = "select * from tblparentstudent order by tblParStudId desc limit 0, 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$parstudid = $row['tblParStudId'];
$parstudid ++;
$query="insert into tblparentstudent values('$parstudid', '$parentid', '$studentid', 1)";
if (!$query = mysqli_query($con, $query)) {
   exit(mysqli_error($con));
}

$query = "select * from tblparent where left(tblParentId, 2)='$sy' group by tblParentId desc limit 0, 1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$parent=substr($row['tblParentId'], 3);
if(empty($parent))
{
    $parent='001';
}else
{
    $parent++;
}
$id2 = sprintf('%03d', $parent);
$parentid=$sy.$id2;
$query="insert into tblparent(tblParentId, tblParentRelation, tblParentFname, tblParentLname, tblParentMname, tblParentCpNo, tblParentEmail, tblParentTelNo, tblParentOccupation, tblParentCompany, tblParentWorkNo, tblParentAddBldg, tblParentAddSt, tblParentAddBrgy, tblParentAddCity, tblParentAddCountry, tblParentComAddBldg, tblParentComAddSt, tblParentComAddBrgy, tblParentComAddCity, tblParentComAddCountry) values ('$parentid', 'MOTHER', '$motherfname', '$motherlname', '$mothermname', '$mothernum', '$motheremail', '$mothertelnum', '$motherjob', '$mothercom', '$mothercomnum', '$motheraddbldg', '$motheraddst', '$motheraddbrgy', '$motheraddcity', '$motheraddcountry', '$mothercomaddbldg', '$mothercomaddst', '$mothercomaddbrgy', '$mothercomaddcity', '$mothercomaddcountry')";
if (!$query = mysqli_query($con, $query)) {
       exit(mysqli_error($con));
    }
$query = "select * from tblparentstudent order by tblParStudId desc limit 0, 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$parstudid = $row['tblParStudId'];
$parstudid ++;
$query="insert into tblparentstudent values('$parstudid', '$parentid', '$studentid', 1)";
if (!$query = mysqli_query($con, $query)) {
   exit(mysqli_error($con));
}

$query = "select * from tblstudhealth order by tblStudHealthId desc limit 0, 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$healthid = $row['tblStudHealthId'];
$healthid ++;
$query="insert into tblstudhealth(tblStudHealthId, tblStudHealthAllergies, tblStudHealthIllness, tblStudHealthMedication, tblStudHealthBloodType, tblStudHealthHospitalized, tblStudHealthReason, tblStudHealthEmergency,  tblStudHealthDoctor, tblStudHealthHospital, tblStudHealthHospitalNo, tblStudHealth_tblStudentId, tblStudHealthHospAddBldg, tblStudHealthHospAddSt, tblStudHealthHospAddBrgy, tblStudHealthHospAddCity, tblStudHealthHospAddCountry) values ('$healthid', '$allergies', '$illness', '$meds', '$btype', '$h2', '$reason', '$r1', '$doctor', '$hospital', '$hosnum', '$studentid', '$hosaddbldg', '$hosaddst', '$hosaddbrgy', '$hosaddcity', '$hosaddcountry')";
if (!$query = mysqli_query($con, $query)) {
       exit(mysqli_error($con));
    }

$query = "select * from tblrequirement where tblRequirementFlag=1";
$result = mysqli_query($con, $query);
$arrreq=array();
while($row = mysqli_fetch_array($result))
{
    $reqid=$row['tblReqId'];
    array_push($arrreq, $reqid);
    
}
foreach ($arrreq as $value) {
    $query = "select * from tblstudreq order by tblStudReqId desc limit 0, 1";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $studreqid = $row['tblStudReqId'];
    $studreqid ++;
    $query="insert into tblstudreq(tblStudReqId, tblStudReq_tblStudentId, tblStudReq_tblReqId) values ('$studreqid', '$studentid', '$value')";
    $res=mysqli_query($con, $query);
}

foreach ($req as $val) {
    $query="update tblstudreq set tblStudReqStatus='Y' where tblStudReq_tblStudentId='$studentid' and tblStudReq_tblReqId='$val'";
    $result=mysqli_query($con, $query);
}

foreach($parentStat as $val1)
{
    $query="select * from tblparentstatus order by tblParentStatId desc limit 0, 1";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $parentstatid = $row['tblParentStatId'];
    $parentstatid ++;
    $query="insert into tblparentstatus(tblParentStatId, tblParentStatus, tblParentStat_tblStudentId) values ('$parentstatid', '$val1', '$studentid')";
    if (!$query = mysqli_query($con, $query)) {
       exit(mysqli_error($con));
    }
}

foreach($liveswith as $val2)
{
    $query="select * from tblstudliveswith order by tblLivesWithId desc limit 0, 1";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $liveswithid = $row['tblLivesWithId'];
    $liveswithid ++;
    $query="insert into tblstudliveswith(tblLivesWithId, tblLivesWithPerson, tblLivesWith_tblStudentId) values ('$liveswithid', '$val2', '$studentid')";
    if (!$query = mysqli_query($con, $query)) {
       exit(mysqli_error($con));
    }
}


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