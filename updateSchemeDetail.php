<?php
include "db_connect.php";
	$id=$_POST['txtDetId'];
	$no=$_POST['txtDetNo'];
	$due=$_POST['txtDetDueDate'];
	$amount=$_POST['txtDetAmount'];
	if(empty($due))
	{
		$due="0000-00-00";
	}
	$query="update tblschemedetail set tblSchemeDetailDueDate='$due', tblSchemeDetailAmount='$amount' where tblSchemeDetailId='$id' and tblSchemeDetailFlag=1 and tblSchemeDetailName='$no'";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else
	{
		header("location:payment.php?message=4");
	}
?>