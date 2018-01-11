<?php
include "db_connect.php";
if(isset($_POST['btnUpdDiv']))
{
	$divId = $_POST['txtUpdDivId'];
	$div = strtoupper($_POST['txtUpdDiv']);

	$query = "update tbldivision set tblDivisionName = '$div' where tblDivisionId = '$divId'";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else{
	   header('location:curriculum.php?message=4');
	}
}
?>