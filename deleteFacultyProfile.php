<?php
include "db_connect.php";
if(isset($_POST['btnDel']))
{
	$id=$_POST['txtDelId'];
	$query="select tblFaculty_tblUserId from tblfaculty where tblFacultyId='$id'";
	$result=mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	$user=$row['tblFaculty_tblUserId'];
	$query="update tbluser set tblUserFlag=0 tblUserId='$user'";
	$result=mysqli_query($con, $query);
	$query="update tblfaculty set tblFacultyFlag=1 where tblFacultyId='$id'";
	$result=mysqli_query($con, $query);
	$query="update tblsection set tblSection_tblFacultyId=null where tblSection_tblFacultyId='$id'";
	if (!$query = mysqli_query($con, $query)) {
    	exit(mysqli_error($con));
	}else{
    	header('location:profile.php?message=6');
	}
}
?>