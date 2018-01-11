<?php
include "db_connect.php";
if(isset($_POST['delSectBtn']))
{
	$id = $_POST['txtDelSectId'];

	$query="update tblsection set tblSectionFlag = 0 where tblSectionId = '$id'";
	$result=mysqli_query($con, $query);
	$query="update tblstudent set tblStudent_tblSectionId=null where tblStudent_tblSectionId='$id'";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else{
	   header('location:section.php?msg=2');
	}
}
?>