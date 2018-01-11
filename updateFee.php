<?php
	include "db_connect.php";
	if(isset($_POST['btnUpdFee']))
	{
		$fee = $_POST['txtUpdFeeId'];
		$fee1 = strtoupper($_POST['txtUpdFee']);

		$query = "update tblfee set tblFeeName='$fee1' where tblFeeName = '$fee'";
		$result = mysqli_query($con, $query);
		if (!$query = mysqli_query($con, $query)) {
    		exit(mysqli_error($con));
		}else{
    		header('location:payment.php?message=4');
		}
	}
?>