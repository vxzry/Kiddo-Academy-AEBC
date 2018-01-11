<?php
include "db_connect.php";
if(isset($_POST['btnUpdGra']))
{
	$graId=$_POST['txtUpdGraId'];
	$syId=$_POST['txtUpdGraSyId'];
	$graDate=$_POST['txtUpdGraDate'];
	$graDateEnd=$_POST['txtUpdGraDateEnd'];

	$query="update tblgradingperiod set tblGradingStartDate='$graDate', tblGradingEndDate='$graDateEnd' where tblGradingId='$graId' and tblGradingFlag=1";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else{
	   header('location:gradingperiod.php?message=8');
	}
}
?>