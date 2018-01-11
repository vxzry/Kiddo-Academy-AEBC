<?php
    include "db_connect.php";
    if(isset($_POST['btnDelFee'])){
        $fee = $_POST['txtDelFee'];

		$query="update tblfee set tblFeeFlag = 0 where tblFeeName = '$fee'";
		$result = mysqli_query($con, $query);
		$query="select tblFeeId from tblfee where tblFeeName='$fee'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$feeId = $row['tblFeeId'];
		$query = "update tblfeeamount set tblFeeAmountFlag = 0 where tblFeeAmount_tblFeeId = '$feeId'";
		$result=mysqli_query($con, $query);
		$query="update tblfeedetail set tblFeeDetailFlag=0 where tblFeeDetail_tblFeeId='$feeId'";
		$result=mysqli_query($con, $query);
		$query="update tblscheme set tblSchemeFlag=0 where tblScheme_tblFeeId='$feeId'";
		if (!$query = mysqli_query($con, $query)) {
	   	exit(mysqli_error($con));
		}else{
	   	header('location:payment.php?message=6');
		}
    }
?>