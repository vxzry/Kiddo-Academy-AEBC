<?php
include "db_connect.php";
if(isset($_POST['btnUpdReq']))
{
	if(isset($_POST['txtUpdReqId']))
	{
	$reqId = $_POST['txtUpdReqId'];
	$reqName = strtoupper($_POST['txtUpdReqName']);
	$require = strtoupper($_POST['txtUpdReqDesc']);
	$query = "update tblrequirement set tblReqName = '$reqName' where tblReqId = '$reqId'";
	$result = mysqli_query($con, $query);
	$query = "update tblrequirement set tblReqDescription = '$require' where tblReqId = '$reqId'";
	$result = mysqli_query($con, $query);
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else{
	   header('location:requirement.php?message=4');
	}
}
}
?>