<?php
include "db_connect.php";
$studid = $_POST['txtStudId'];
$action = $_POST['selChoose'];
$reason = $_POST['taReason'];

$query="update tblstudent set tblStudentType='$action' where tblStudentId='$studid'";
$result=mysqli_query($con, $query);

$query="select * from studdismisswithdraw order by tblStudDismissId desc limit 0, 1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$id=$row['tblStudDismissId'];
$id++;
$query="insert into studdismisswithdraw(tblStudDismissId, tblStudDismissAction, tblStudDismissReason, tblStudDismiss_tblStudentId) values ('$id', '$action', '$reason', '$studid')";
if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
}else
{
	header('location:dismiss-withdraw.php');
}

?>