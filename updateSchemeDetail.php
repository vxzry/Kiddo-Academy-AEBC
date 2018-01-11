<?php
include "db_connect.php";
if(isset($_POST['btnDetSave']))
{
	$id=$_POST['txtDetId'];
	$no=$_POST['txtDetNo'];
	$due=$_POST['txtDetDueDate'];
	$amount=$_POST['txtDetAmount'];

	$query="update tblschemedetail set tblSchemeDetailDueDate='$due', tblSchemeDetailAmount='$amount' where tblSchemeDetailId='$id' and tblSchemeDetailFlag=1 and tblSchemeDetailName='$no'";
	$result=mysqli_query($con, $query);
	header('location:payment.php');
}
?>