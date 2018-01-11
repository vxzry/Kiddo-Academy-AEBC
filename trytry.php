<?php
include "db_connect.php";
$or=$_POST['txtOR'];
$id=$_POST['txtAccId'];
$pr=$_POST['txtPR'];
$i=0;
foreach($id as $x)
{
	$y=$or[$i];
	$z=$pr[$i];
	$datenow=date('Y-m-d');
	$query="select * from tblaccount where tblAccId='$x' and tblAccFlag=1";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$payment=$row['tblAccCredit'];
	$num=$row['tblAccPaymentNum'];
	$studid=$row['tblAcc_tblStudentId'];
	$query="update tblaccount set tblAccOR='$y', tblAccPR='$z', tblAccPayment='$payment', tblAccRunningBal=null, tblAccPaid='PAID', tblAccPaymentDate='$datenow' where tblAccId='$x' and tblAccFlag=1";
	if (!$query = mysqli_query($con, $query)) {
		exit(mysqli_error($con));
	}
	$i++;
}
if($num == 1)
{
	header("location:createUser.php?studentid=$studid");
}else if($num != 1)
{
	header("location:billing.php"); 
}
?>