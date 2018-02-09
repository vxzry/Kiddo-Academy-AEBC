<?php
include "db_connect.php";
if(isset($_POST['btnUpd']))
{
	$id=$_POST['txtId'];
	$fname=$_POST['txtFname'];
	$lname=$_POST['txtLname'];
	$mname=$_POST['txtMname'];
	$bday=$_POST['txtBday'];
	$bplace=$_POST['txtBplace'];
	$gender=$_POST['optradio'];
	$add=$_POST['txtAdd'];
	$no=$_POST['txtNo'];
	$email=$_POST['txtEmail'];
	$position=$_POST['selPosition'];

	$query="update tblfaculty set tblFacultyFname='$fname', tblFacultyLname='$lname', tblFacultyMname='$mname', tblFacultyBday='$bday', tblFacultyBplace='$bplace', tblFacultyGender='$gender', tblFacultyAddress='$add', tblFacultyContact='$no', tblFacultyEmail='$email', tblFaculty_tblFacultyPositionId='$position' where tblFacultyId='$id'";
	$result=mysqli_query($con, $query);

	$query="select tblFaculty_tblUserId from tblfaculty where tblFacultyId='$id'";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$userId=$row['tblFaculty_tblUserId'];

	$query="select tblFacultyPosName from tblfacultyposition where tblFacultyPosId='$position'";
		$result=mysqli_query($con, $query);
		$row=mysqli_fetch_array($result);
		$posName=$row['tblFacultyPosName'];
		$query="select tblRoleId from tblrole where tblRoleName='$posName'";
		$result=mysqli_query($con, $query);
		$row=mysqli_fetch_array($result);
		$roleid=$row['tblRoleId'];
	$query="update tbluser set tblUser_tblRoleId='$roleid' where tblUserId='$userId'";
	if (!$query = mysqli_query($con, $query)) {
    	exit(mysqli_error($con));
	}else{
    	header('location:profile.php?message=4');
	}
}
?>