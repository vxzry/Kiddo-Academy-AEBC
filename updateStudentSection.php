<?php
include "db_connect.php";
$studid=$_POST['txtStudId'];
$sectname=$_POST['selSection'];
$query="select * from tblsection where tblSectionName='$sectname' and tblSectionFlag=1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$sectid=$row['tblSectionId'];
$lvlid=$row['tblSection_tblLevelId'];
$query="update tblstudent set tblStudent_tblSectionId='$sectid' where tblStudentId='$studid' and tblStudentFlag=1";
if (!$query = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}else
{
	header("location:SectionStudent.php?txtlvl=$lvlid");
}

?>