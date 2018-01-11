<?php 
include "db_connect.php";
if(isset($_POST['btnAddF']))
{
	if(isset($_POST['selAddFName']))
	{
		$facultyid = $_POST['selAddFName'];
		$sectionid = $_POST['selAddFSect'];
		$query = "update tblsection set tblSection_tblFacultyId = '$facultyid' where tblSectionId = '$sectionid'";
		$result = mysqli_query($con, $query);
		if (!$query = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }else{
	        header('location:facultyv2.php?message=2');
	    }
	}
}
?>