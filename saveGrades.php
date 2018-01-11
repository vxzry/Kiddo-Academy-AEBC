<?php
include "db_connect.php";
$subj=array();

$status='';
$stud=$_POST['txtStudId'];
$sectid=$_POST['txtSectId'];
$gpid=$_POST['txtGpId'];
$grd=$_POST['txtGrade'];
$query="select * from tblschoolyear where tblSchoolYearFlag=1 and tblSchoolYrActive='ACTIVE'";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$syid=$row['tblSchoolYrId'];
$query="select * from tbllevel join tblsection on tblsection.tblSection_tblLevelId=tbllevel.tblLevelId join tblcurriculumdetail on tblcurriculumdetail.tblCurriculumDetail_tblLevelId=tbllevel.tblLevelId join tblsubject on tblsubject.tblSubjectId=tblcurriculumdetail.tblCurriculumDetail_tblSubjectId where tblsubject.tblSubjectFlag=1 and tblsection.tblSectionId='$sectid' group by tblsubject.tblSubjectId";
$result=mysqli_query($con, $query);
while($row=mysqli_fetch_array($result))
{
	$subjId=$row['tblSubjectId'];
	array_push($subj, $subjId);
}
$i=0;
foreach($stud as $value)
{
	$ave=0;
	$studLength=count($subj);
	for($x=0; $x<$studLength; $x++)
	{
		$grades=$grd[$i] ? $grd[$i] : 0;
		$subject=$subj[$x];
		$query="select * from tblgrade where tblGrade_tblStudentId='$value' and tblGrade_tblSubjectId='$subj[$x]' and tblGrade_tblGradingId='$gpid' and tblGradeFlag=1";
		$result = $con->query($query);
		if ($result->num_rows == 0)	
		{ 
		$query1="select * from tblgrade order by tblGradeId desc limit 0, 1";
		$result1=mysqli_query($con, $query1);
		$row1=mysqli_fetch_array($result1);
		$gradeid=$row1['tblGradeId'];
		$gradeid++;
		$query2="insert into tblgrade(tblGradeId, tblGradeGrade, tblGrade_tblStudentId, tblGrade_tblSubjectId, tblGrade_tblGradingId) values ('$gradeid', '$grades', '$value', '$subject', '$gpid')";
		if (!$query2 = mysqli_query($con, $query2)) {
	   	exit(mysqli_error($con));
		}
		}else if ($result->num_rows >= 1) 
		{
			$query1="select * from tblgrade order by tblGradeId desc limit 0, 1";
			$result1=mysqli_query($con, $query1);
			$row1=mysqli_fetch_array($result1);
			$gradeid=$row1['tblGradeId'];
			$gradeid++;
			$query="update tblgrade set tblGradeGrade='$grades' where tblGrade_tblStudentId='$value' and tblGrade_tblSubjectId='$subject' and tblGrade_tblGradingId='$gpid' and tblGradeFlag=1";
			if (!$query = mysqli_query($con, $query)) {
		   	exit(mysqli_error($con));
			}
		}
		$i++;
		$ave+=$grades;
	}//for numofsubjects
	$genave=$ave/$studLength;
	if($genave < 70)
	{
		$status='FAILED';
	}else if($genave>=70)
	{
		$status='PASSED';
	}
	$query3="select * from tblgradeave where tblGenAve_tblStudentId='$value' and tblGenAve_tblGradingId='$gpid' and tblGenAve_tblSchoolYrId='$syid' and tblGenAveFlag=1";
	$result3=$con->query($query3);
	if($result3->num_rows == 0)
	{
		$query4="select * from tblgradeave order by tblGenAveId desc limit 0, 1";
		$result4=mysqli_query($con, $query4);
		$row4=mysqli_fetch_array($result4);
		$genaveid=$row4['tblGenAveId'];
		$genaveid++;
		$query4="insert into tblgradeave(tblGenAveId, tblGenAverage, tblGenAveStatus, tblGenAve_tblStudentId, tblGenAve_tblGradingId, tblGenAve_tblSchoolYrId) values ('$genaveid', '$genave', '$status', '$value', '$gpid', '$syid')";
		if (!$query4 = mysqli_query($con, $query4)) {
	   	exit(mysqli_error($con));
		}
	}else if($result3->num_rows >= 1)
	{
		$query4="update tblgradeave set tblGenAverage='$genave', tblGenAveStatus='$status' where tblGenAve_tblStudentId='$value' and tblGenAve_tblGradingId='$gpid' and tblGenAve_tblSchoolYrId='$syid' and tblGenAveFlag=1";
		if (!$query = mysqli_query($con, $query4)) {
	   	exit(mysqli_error($con));
		}
	}
}
header('location:grade(first).php');
// foreach($stud as $val1)
// {
// 	echo $val1.'<br/>';
// }
// foreach($grd as $val)
// {
// 	echo $val;
// }

?>