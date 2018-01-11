<?php
include "db_connect.php";
if(isset($_POST['btnUpdCurr']))
{
	$currId = $_POST['txtUpdCurrId'];
	$curr = strtoupper($_POST['txtUpdCurr']);
	$active = $_POST['selUpdActive'];

	$query="update tblcurriculum set tblCurriculumName = '$curr', tblCurriculumActive = '$active' where tblCurriculumId='$currId'";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else{
	   header('location:curriculum.php?message=4');
	}
}
?>