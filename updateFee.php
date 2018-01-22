<?php
	include "db_connect.php";
	if(isset($_POST['btnUpdFee']))
	{
		$fee = $_POST['txtUpdFeeId'];
		$fee1 = strtoupper($_POST['txtUpdFee']);
		$type=$_POST['selUpdFeeType'];
		$stat=$_POST['selUpdFeeMand'];
		if($stat=='Mandatory')
		{
			$stat1='Y';
		}else if($stat=='Optional')
		{
			$stat1='N';
		}
		$query = "update tblfee set tblFeeName='$fee1', tblFeeType='$type', tblFeeMandatory='$stat1' where tblFeeCode = '$fee'";
		$result = mysqli_query($con, $query);
		if (!$query = mysqli_query($con, $query)) {
    		exit(mysqli_error($con));
		}else{
    		header('location:payment.php?message=4');
		}
	}
?>