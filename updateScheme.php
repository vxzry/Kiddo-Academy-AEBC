<?php
include "db_connect.php";
if(isset($_POST['btnUpdScheme']))
{
	$id = $_POST['txtUpdSchemeId'];
	$scheme = $_POST['txtUpdScheme'];
	$no = $_POST['txtUpdSchemeNo'];

	$query = "update tblscheme set tblSchemeType = '$scheme', tblSchemeNoOfPayment = '$no' where tblSchemeId = '$id'";
	if (!$query = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
	}else{
    header('location:payment.php');
	}
}
?>