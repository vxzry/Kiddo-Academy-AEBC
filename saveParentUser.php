<?php
include "db_connect.php";
$parentid=$_POST['txtParentId'];
$parentpass=$_POST['txtParentPass'];

$query="select * from tbluser order by tblFeeId desc limit 0, 1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$id=$row['tblUserId'];
$id++;
$query="insert into tbluser values ('$id', '$parentid', '$parentpass', 1, 1)";
if (!$query = mysqli_query($con, $query)) {
   exit(mysqli_error($con));
}else{
   $query="update tblparent set tblParent_tblUserId='$id' where tblParentId='$parentid' and tblParentFlag=1";
   if (!$query = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
	}else{
    header('location:enrolment(main).php');
	}
}

?>