<?php
include "db_connect.php";
if(isset($_POST['btnDelFeeDet']))
{
	$feeName = $_POST['txtDelFeeDet'];
	$amnt = $_POST['txtDelAmnt'];

	$query = "select tblFeeDetail_tblFee from tblfeedetail where tblFeeDetailName = '$feeName'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$feeId = $row['tblFeeDetail_tblFee'];
	$query = "select tblFeeAmountAmount from tblfeeamount where tblFeeAmount_tblFeeId = '$feeId'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$amount = $row['tblFeeAmountAmount'];
	$amount = $amount - $amnt;
	$query = "update tblfeeamount set tblFeeAmountAmount = '$amount' where tblFeeAmount_tblFeeId = '$feeId'";
	$result = mysqli_query($con, $query);
	$query  = "select * from tbllevel where tblLevelFlag = 1";
	$result = $con->query($query);
	$num = $result->num_rows;
	for($i = 0; $i < $num; $i++)
	{
	$query = "update tblfeedetail set tblFeeDetailFlag = 0 where tblFeeDetailName = '$feeName'";
	$result = mysqli_query($con, $query);
	if (!$query = mysqli_query($con, $query)) {
    	exit(mysqli_error($con));
	}else{
    	header('location:payment.php');
	}
	}
}
?>