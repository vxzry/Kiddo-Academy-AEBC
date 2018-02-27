<?php
include "db_connect.php";
$chk=$_POST['txtChkId'];
$studid=$_POST['txtStudId'];
$query="update tblcheck set tblChkRTag='PAID' where tblChkId='$chk' and tblChkFlag=1";
if (!$query = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}else
{
	header("location:collectionMain.php");
}
?>