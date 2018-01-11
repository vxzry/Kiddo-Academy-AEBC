<?php
include "db_connect.php";

$role=$_POST['selRole'];

$maintenance=$_POST['home'];
$maintenance=$_POST['maintenance'];
$transaction=$_POST['transaction'];
$report=$_POST['report'];
$query=$_POST['query'];
$utility=$_POST['utility'];

$query="delete from tblrolemodule where tblRoleModule_tblRoleId='$role'";
$result=mysqli_query($con, $query);

foreach($home as $val1)
{
	$query="select * from tblrolemodule order by tblRoleModuleId desc limit 0, 1";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$rmid=$row['tblRoleModuleId'];
	$rmid++;
	$query="insert into tblrolemodule values('$rmid', '$role', '$val1')";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else
	{
		header("location:useraccess.php");
	}
}
foreach($maintenance as $val1)
{
	$query="select * from tblrolemodule order by tblRoleModuleId desc limit 0, 1";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$rmid=$row['tblRoleModuleId'];
	$rmid++;
	$query="insert into tblrolemodule values('$rmid', '$role', '$val1')";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else
	{
		header("location:useraccess.php");
	}
}

foreach($transaction as $val2)
{
	$query="select * from tblrolemodule order by tblRoleModuleId desc limit 0, 1";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$rmid=$row['tblRoleModuleId'];
	$rmid++;
	$query="insert into tblrolemodule values('$rmid', '$role', '$val2')";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else
	{
		header("location:useraccess.php");
	}
}

foreach($report as $val2)
{
	$query="select * from tblrolemodule order by tblRoleModuleId desc limit 0, 1";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$rmid=$row['tblRoleModuleId'];
	$rmid++;
	$query="insert into tblrolemodule values('$rmid', '$role', '$val2')";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else
	{
		header("location:useraccess.php");
	}
}

foreach($query as $val2)
{
	$query="select * from tblrolemodule order by tblRoleModuleId desc limit 0, 1";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$rmid=$row['tblRoleModuleId'];
	$rmid++;
	$query="insert into tblrolemodule values('$rmid', '$role', '$val2')";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else
	{
		header("location:useraccess.php");
	}
}

foreach($utility as $val2)
{
	$query="select * from tblrolemodule order by tblRoleModuleId desc limit 0, 1";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$rmid=$row['tblRoleModuleId'];
	$rmid++;
	$query="insert into tblrolemodule values('$rmid', '$role', '$val2')";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else
	{
		header("location:useraccess.php");
	}
}
?>