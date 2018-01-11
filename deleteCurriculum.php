<?php
include "db_connect.php";
if(isset($_POST['btnDelCurr']))
{
	$id = $_POST['txtDelCurrId'];
	$search = "select * from tblschoolyear where tblSchoolYr_tblCurriculum='$id' and tblSchoolYrActive='ACTIVE'";
	$find=$con->query($search);
	$search="select * from tblcurriculumdetail where tblCurriculumDetail_tblCurriculumId=$id";
	$find2=$con->query($search);
	if($find->num_rows == 0 or $find2->num_rows == 0)
	{
		$query="update tblcurriculum set tblCurriculumFlag = 0 where tblCurriculumId = '$id'";
		$result=mysqli_query($con, $query);
		if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	   header('location:curriculum.php?message=5');
		}else{
	   header('location:curriculum.php?message=6');
		}
	}else if($find->num_rows > 0 or $find2->num_rows > 0)
	{
		header('location:curriculum.php?message=7');
	}
	
}
?>