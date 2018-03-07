<?php
include "db_connect.php";
$studid=$_POST['stud'];
$grd=$_POST['grdave'];
$i=0;
foreach($studid as $val)
{
	if($grd[$i]>=75)
	{
		$stat='PASSED';
	}else
	{
		$stat='FAILED';
	}
	$grade=$grd[$i];
	$query="insert into tblgradeave(tblGenAverage, tblGenAveStatus, tblGenAve_tblStudentId, tblGenAve_tblSchoolYrId) value ('$grade', '$stat', '$val', '$syid')";
	if (!$query = mysqli_query($con, $query)) {
		   exit(mysqli_error($con));
	}
	$i++;
}
header("location:grade(first).php");
?>