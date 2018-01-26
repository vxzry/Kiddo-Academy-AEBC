<?php
include "db_connect.php";
if(isset($_POST['btnDelDet']))
{
	$id = $_POST['txtDelDetId'];

	$query="update tblcurriculumdetail set tblDetailsFlag = 0 where tblCurriculumDetailId = '$id'";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	   header('location:curriculum.php?message=5');
	}else{
	   header('location:curriculum.php?message=6');
	}
}
?>