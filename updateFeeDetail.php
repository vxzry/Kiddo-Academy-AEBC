<?php
include "db_connect.php";
if(isset($_POST['btnFeeDet']))
{
	$feeId = $_POST['txtUpdDetFeeId'];
	$lvlId = $_POST['txtUpdDetLvlId'];
	$tempDet = $_POST['txtTempDetName'];
	$det = strtoupper($_POST['txtUpdDetName']);
	$amnt = $_POST['txtUpdDetAmnt'];
	$query="select tblFeeDetailAmount from tblfeedetail where tblFeeDetailName = '$tempDet' and tblFeeDetailFlag = 1";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$tempAmnt = $row['tblFeeDetailAmount'];
	$query  = "select * from tbllevel where tblLevelFlag = 1";
	$result = $con->query($query);
	$num = $result->num_rows;
	for($i = 0; $i < $num; $i++)
	{
	$query = "update tblfeedetail set tblFeeDetailName = '$det' where tblFeeDetailName = '$tempDet' and tblFeeDetailFlag = 1";
	$result = mysqli_query($con, $query);
	}
	$query = "update tblfeedetail set tblFeeDetailAmount = '$amnt' where tblFeeDetailName = '$det' and tblFeeDetail_tblLevelId='$lvlId'";
	$result = mysqli_query($con, $query);
	$query = "select * from tblfeeamount where tblFeeAmount_tblLevelId = '$lvlId' and tblFeeAmount_tblFeeId = '$feeId'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$amount = $row['tblFeeAmountAmount'];
	$amount = $amount - $tempAmnt;
	$amount = $amount + $amnt;
	$query = "update tblfeeamount set tblFeeAmountAmount = '$amount' where tblFeeAmount_tblLevelId = '$lvlId' and tblFeeAmount_tblFeeId = '$feeId'";
	$result = mysqli_query($con, $query);
	if (!$query = mysqli_query($con, $query)) {
    		exit(mysqli_error($con));
		}else{
    		header('location:payment.php');
		}

}
?>