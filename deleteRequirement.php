<?php
include "db_connect.php";
if(isset($_POST['btnDelReq']))
{
	$id = $_POST['txtDelReqId'];

	$query="update tblrequirement set tblRequirementFlag = 0 where tblReqId = '$id'";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else{
	   header('location:requirement.php?message=6');
	}
}
?>