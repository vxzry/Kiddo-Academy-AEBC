<?php
include "db_connect.php";
if(isset($_POST['btnUpd']))
{
	$id=$_POST['txtId'];
	$name=$_POST['txtName'];
	$percent=$_POST['txtPercent'];
	$no=$_POST['txtNo'];

	$percent /= 100;
	$query="update tblgradecomponent set tblGradePercent='$percent', tblGradeNo='$no' where tblgradeId='$id'";
	if (!$query = mysqli_query($con, $query)) {
    	exit(mysqli_error($con));
	}else{
    	header('location:grades.php?message=4');;
	}	
}
?>