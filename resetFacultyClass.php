<?php
include "db_connect.php";
if(isset($_POST['btnDel']))
{
	$id = $_POST['txtDelSect'];
	$query = "update tblsection set tblSection_tblFacultyId = null where tblSectionId = '$id'";
	$result = mysqli_query($con, $query);
	if (!$query = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }else{
	        header('location:facultyv2.php');
	    }
}
?>