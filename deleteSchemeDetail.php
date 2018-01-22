<?php
include "db_connect.php";
if(isset($_POST['btnReset']))
{
	$id=$_POST['txtDetDelId'];
	$query="update tblschemedetail set tblSchemeDetailDueDate=NULL, tblSchemeDetailAmount=NULL where tblSchemeDetailId='$id'";
	if (!$query = mysqli_query($con, $query)) {
    	exit(mysqli_error($con));
	}else{
    	header('location:payment.php?message=7');
	}
}
?>