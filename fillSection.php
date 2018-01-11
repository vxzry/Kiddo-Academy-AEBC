<?php
include "db_connect.php";

$sectid=$_POST['txtFillSectionId'];

$query="select tblSchoolYrId from tblschoolyear where tblSchoolYrActive='ACTIVE'";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$syid=$row['tblSchoolYrId'];

$query="select count(tblSectStudId) as count from tblsectionstud where tblSectStud_tblSectionId='$sectid' and tblSectStudFlag=1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$sectcnt=$row['count'];
$arrStud=array();

if($sectcnt < 15)
{
	$query="select s.tblStudentId,  concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name
from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId 
and s.tblStudentType='OFFICIAL'
and s.tblStudentFlag=1 order by rand() limit 15";
$result=mysqli_query($con, $query);
while($row=mysqli_fetch_array($result)):
	$studid=$row['tblStudentId'];
	array_push($arrStud, $studid);
endwhile;
$x=15-$sectcnt;
for($y=0; $y<$x; $y++)
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