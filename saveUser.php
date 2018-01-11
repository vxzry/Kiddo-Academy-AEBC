<?php
include "db_connect.php";
$type=$_POST['txtType'];
$id=$_POST['txtId'];
$name=$_POST['txtName'];
$roleid=$_POST['selRole'];
$pass=$_POST['txtPass'];

if($type==1)
{
	$query="select * from tblfaculty where tblFacultyId='$id' and tblFacultyFlag=1";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$user=$row['tblFaculty_tblUserId'];
	if(empty($user))
	{
		$query="select * from tbluser order by tblUserId desc limit 0, 1";
		$result=mysqli_query($con, $query);
		$row=mysqli_fetch_array($result);
		$userid=$row['tblUserId'];
		$userid++;
		$query="insert into tbluser values ('$userid', '$id', '$pass', '$roleid', 1)";
		if (!$query = mysqli_query($con, $query)) {
	    exit(mysqli_error($con));
		}else{
	    $query="update tblfaculty set tblFaculty_tblUserId='$userid' where tblFacultyId='$id' and tblFacultyFlag=1";
	    if (!$query = mysqli_query($con, $query)) {
	    exit(mysqli_error($con));
		}else{
	    header('location:createUser.php');
		}
		}
	}else if(!empty($user))
	{
		$query="update tbluser set tblUser_tblRoleId='$roleid', tblUserPassword='$pass' where tblUserId='$user' and tblUserFlag=1";
		if (!$query = mysqli_query($con, $query)) {
	    exit(mysqli_error($con));
		}else{
	    header('location:createUser.php');
		}
	}
	
}else if($type==2)
{
	$query="select * from tblparent where tblParentId='$id' and tblParentFlag=1";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$user=$row['tblParent_tblUserId'];
	if(empty($user))
	{
		$query="select * from tbluser order by tblUserId desc limit 0, 1";
		$result=mysqli_query($con, $query);
		$row=mysqli_fetch_array($result);
		$userid=$row['tblUserId'];
		$userid++;
		$query="insert into tbluser values ('$userid', '$id', '$pass', '$roleid', 1)";
		if (!$query = mysqli_query($con, $query)) {
	    exit(mysqli_error($con));
		}else{
	    $query="update tblparent set tblParent_tblUserId='$userid' where tblParentId='$id' and tblParentFlag=1";
	    if (!$query = mysqli_query($con, $query)) {
	    exit(mysqli_error($con));
		}else{
	    header('location:createUser.php');
		}
		}
	}else if(!empty($user))
	{
		$query="update tbluser set tblUser_tblRoleId='$roleid', tblUserPassword='$pass' where tblUserId='$user' and tblUserFlag=1";
		if (!$query = mysqli_query($con, $query)) {
	    exit(mysqli_error($con));
		}else{
	    header('location:createUser.php');
		}
	}
}
?>

