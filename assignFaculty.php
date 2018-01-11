<?php
include "db_connect.php";
$sectid=$_POST['txtSectionId'];
$facultyid=$_POST['selFaculty'];

$query="update tblsection set tblSection_tblFacultyId='$facultyid' where tblSectionId='$sectid' and tblSectionFlag=1";
if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
}else
{
	header("location:sectioningv2.php");
}
?>