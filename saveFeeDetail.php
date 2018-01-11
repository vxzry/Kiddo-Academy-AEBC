<?php
	include "db_connect.php";
	$feeDet = $_POST['txtFeeDet'];
	$feeId = strtoupper($_POST['txtFeeDetFee']);
	$query  = "select * from tbllevel where tblLevelFlag = 1";
	$result = $con->query($query);
	$num = $result->num_rows;
	for($i = 0; $i < $num; $i++)
	{
		$j = $i;
		$j++;
		$val = $_POST['txtName'][$i];
		$query="select * from tblfeedetail order by tblFeeDetailId desc limit 0, 1";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
		$detId = $row['tblFeeDetailId'];
		$detId++;
		$query = "insert into tblfeedetail values ('$detId', '$feeDet', '$val', '$feeId', '$j', 1)";
		$result=mysqli_query($con, $query);
		$query = "select tblFeeAmountAmount from tblfeeamount where tblFeeAmount_tblFeeId = '$feeId' and tblFeeAmount_tblLevelId='$j' and tblFeeAmountFlag = 1";
		$result=mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$amnt = $row['tblFeeAmountAmount'];
		$amnt = $amnt + $val;
		$query = "update tblfeeamount set tblFeeAmountAmount = '$amnt' where tblFeeAmount_tblFeeId = '$feeId' and tblFeeAmount_tblLevelId='$j' and tblFeeAmountFlag = 1";
		if (!$query = mysqli_query($con, $query)) {
    		exit(mysqli_error($con));
		}else{
    		header('location:payment.php?message=2');
		}	
	}
?>