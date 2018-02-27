<?php
include 'db_connect.php';
if(isset($_POST['btnAddReq']))
{
	$reqName = strtoupper($_POST['txtAddReqName']);
	$reqDesc = strtoupper($_POST['txtAddReqDesc']);
	$reqType = strtoupper($_POST['addReqType']);
	$reqStud = strtoupper($_POST['addReqStudent']);

	$query = "select * from tblrequirement order by tblReqId desc limit 0, 1";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	$reqid = $row['tblReqId'];
	$reqid ++;
	$query = "INSERT INTO tblrequirement(tblReqId, tblReqName, tblReqDescription, tblReqType, tblReqStudent, tblRequirementFlag) VALUES('$reqid','$reqName', '$reqDesc', '$reqType', '$reqStud', 1)";
	if (!$query = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
	}else{
    header('location:requirement.php?message=2');;
	}
}else if(isset($_POST['btnUpdReq']))
{
	if(isset($_POST['txtUpdReqId']))
	{
	$reqId = $_POST['txtUpdReqId'];
	$reqName = strtoupper($_POST['txtUpdReqName']);
	$require = strtoupper($_POST['txtUpdReqDesc']);
	$reqtype = strtoupper($_POST['updReqType']);
	$reqstud = strtoupper($_POST['updReqStudent']);
	$query = "update tblrequirement set tblReqName = '$reqName' where tblReqId = '$reqId'";
	$result = mysqli_query($con, $query);
	$query = "update tblrequirement set tblReqDescription = '$require', tblReqType = '$reqtype', tblReqStudent = '$reqstud' where tblReqId = '$reqId'";
	$result = mysqli_query($con, $query);
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else{
	   header('location:requirement.php?message=4');
	}
	}
}else if(isset($_POST['btnDelReq']))
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