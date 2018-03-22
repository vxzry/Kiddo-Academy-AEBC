<?php
include "db_connect.php";

$sectid=trim($_POST['txtFillSectionId']);

$query="select tblSchoolYrId from tblschoolyear where tblSchoolYrActive='ACTIVE'";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$syid=$row['tblSchoolYrId'];

$query="select * from tblsection where tblSectionId='$sectid' and tblSectionFlag=1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$max=$row['tblSectionMaxCap'];
$lvl=$row['tblSection_tblLevelId'];
$session=$row['tblSectionSession'];

// echo "$sectid, $query, $max, $lvl, $session\n";
// var_dump($row);
// die();

$query="select count(tblSectStudId) as count from tblsectionstud where tblSectStud_tblSectionId='$sectid' and tblSectStudFlag=1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$sectcnt=$row['count'];
$arrStud=array();
$x=$max-$sectcnt;


if($sectcnt < $max)
{
	$query="select s.tblStudentId,  concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name
	from tblstudent s, tblstudentinfo si, tblstudenroll se
	where s.tblStudentId=si.tblStudInfo_tblStudentId 
	and s.tblStudentId=se.tblStudEnroll_tblStudentId
	and s.tblStudentType='OFFICIAL'
	and s.tblStudentFlag=1 
	and s.tblStudent_tblLevelId='$lvl'
	and se.tblStudEnrollPreferedSession='$session'
	and s.tblStudent_tblSectionId is NULL
	order by tblStudentId
	limit $x";
	
$result=mysqli_query($con, $query);

echo 'query';
if(mysqli_num_rows($result) == 0){
	header('HTTP/1.1 500 Internal Server Error');
	header("location:sectioning.php");
	exit(1);
}

echo 'while';
while($row=mysqli_fetch_array($result)):
	$studid=$row['tblStudentId'];
	$ctr = count($arrStud);
	// if($ctr<$x)
	// {
	if($studid!="")
	{
		array_push($arrStud, $studid);
	}
	// }
endwhile;
echo 'end while';
$ctr=count($arrStud);

mysqli_begin_transaction($con, MYSQLI_TRANS_START_READ_WRITE);

for($y=0; $y<$ctr; $y++)
{
	$stud=$arrStud[$y];
	$query1="select * from tblsectionstud order by tblSectStudId desc limit 0, 1";
	$result1=mysqli_query($con, $query1);
	$row1=mysqli_fetch_array($result1);
	$sectstudid=$row1['tblSectStudId'];
	$sectstudid++;
	$query="insert into tblsectionstud(tblSectStudId, tblSectStud_tblSectionId, tblSectStud_tblStudentId, tblSectStud_tblSchoolYrId) values ('$sectstudid', '$sectid', '$stud', '$syid');";
	mysqli_query($con, $query);
	$query = "update tblstudent set tblStudent_tblSectionId=$sectid where tblStudentId=$stud;";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else
	{
		mysqli_commit($con);
		header("location:sectioning.php");
	}

}

}
?>