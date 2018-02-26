<?php
include "db_connect.php";
$sectid=$_POST['txtSectionId'];
$facultyid=$_POST['selFaculty'];
$session=$_POST['txtSession'];

$query="select tblSectionId from tblsection where tblSectionSession='$session' and tblSection_tblFacultyId='$facultyid'";
$result=$con->query($query);
if($result->num_rows == 0)
{
	$query="update tblsection set tblSection_tblFacultyId='$facultyid' where tblSectionId='$sectid' and tblSectionFlag=1";
	if (!$query = mysqli_query($con, $query)) {
		   exit(mysqli_error($con));
	}
}
header("location:sectioning.php");
?>