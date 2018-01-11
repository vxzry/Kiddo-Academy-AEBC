<?php
	include "db_connect.php";
	if(isset($_POST['submitNumClass']))
	{
		$id = $_POST['NumClassId'];
		$month = $_POST['updNumMonth'];
		$day = $_POST['updNumDay'];
			
			$query="UPDATE tblnumberclass SET tblNumClassDay ='$day' WHERE tblNumClassid='$id'";
			$result = mysqli_query($con, $query);
			if (!$query = mysqli_query($con, $query)) {
	            exit(mysqli_error($con));
	        }
			header('location:school-yearV2.php');
	}
    mysqli_close($con);
?>