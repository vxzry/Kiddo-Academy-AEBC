<?php
include "db_connect.php";

$sectid=$_POST['txtFillSectionId'];

$query="select tblSchoolYrId from tblschoolyear where tblSchoolYrActive='ACTIVE'";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$syid=$row['tblSchoolYrId'];

$query="select * from tblsection where tblSectionId='$sectid' and tblSectionFlag=1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$max=$row['tblSectionMaxCap'];
$lvl=$row['tblSection_tblLevelId'];

$query="select count(tblSectStudId) as count from tblsectionstud where tblSectStud_tblSectionId='$sectid' and tblSectStudFlag=1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$sectcnt=$row['count'];
$arrStud=array();
$x=$max-$sectcnt;
if($sectcnt < $max)
{
	$query="select s.tblStudentId,  concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name
from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId 
and s.tblStudentType='OFFICIAL'
and s.tblStudentFlag=1 order by tblStudentId and s.tblStudent_tblLevelId='$lvl'";
$result=mysqli_query($con, $query);
while($row=mysqli_fetch_array($result)):
	$studid=$row['tblStudentId'];
	$ctr = count($arrStud);
	if($ctr<$x)
	{
	if($studid!="")
	{
	array_push($arrStud, $studid);
	}
	}
endwhile;
$ctr=count($arrStud);
for($y=0; $y<$ctr; $y++)
{
	
	$stud=$arrStud[$y];

	$query1="select * from tblsectionstud order by tblSectStudId desc limit 0, 1";
	$result1=mysqli_query($con, $query1);
	$row1=mysqli_fetch_array($result1);
	$sectstudid=$row1['tblSectStudId'];
	$sectstudid++;
	$query="insert into tblsectionstud(tblSectStudId, tblSectStud_tblSectionId, tblSectStud_tblStudentId, tblSectStud_tblSchoolYrId) values ('$sectstudid', '$sectid', '$stud', '$syid')";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else
	{
		header("location:sectioning.php");
	}

}

}
?>