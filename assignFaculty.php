<?php
include "db_connect.php";
$sectid=trim($_POST['txtSectionId']);
$facultyid=trim($_POST['selFaculty']);
$session=trim($_POST['txtSession']);

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