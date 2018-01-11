<?php
include "db_connect.php";
if(isset($_POST['btnAddReq']))
{
	$reqName = strtoupper($_POST['txtAddReqName']);
	$reqDesc = strtoupper($_POST['txtAddReqDesc']);

	$query = "select * from tblrequirement order by tblReqId desc limit 0, 1";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	$reqid = $row['tblReqId'];
	$reqid ++;
	$query = "INSERT INTO tblrequirement(tblReqId, tblReqName, tblReqDescription, tblRequirementFlag) VALUES('$reqid','$reqName', '$reqDesc', 1)";
	if (!$query = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
	}else{
    header('location:requirement.php?message=2');;
	}
}
?>