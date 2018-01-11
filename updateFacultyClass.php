<?php
include "db_connect.php";
if(isset($_POST['btnUpdF']))
{
	if(isset($_POST['selUpdFName']))
	{
		$facultyid = $_POST['selUpdFName'];
		$sectionId = $_POST['txtUpdFSectId'];
		$query = "update tblsection set tblSection_tblFacultyId = '$facultyid' where tblSectionId = '$sectionId'";
		$result = mysqli_query($con, $query);
		if (!$query = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }else{
	        header('location:facultyv2.php?message=4');
	    }
	}
}
?>