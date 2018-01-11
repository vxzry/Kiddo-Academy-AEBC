<?php
include "db_connect.php";
// $lvlId = $_POST['txtAddFeeLvlId'];
$name = strtoupper($_POST['txtAddFeeName']);
$code = $_POST['txtAddFeeCode'];
$mand = $_POST['selAddFeeMand'];
// $arrLevel = array();
$query="select * from tblfee order by tblFeeId desc limit 0, 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$id = $row['tblFeeId'];
$id++;
$query = "insert into tblfee(tblFeeId, tblFeeName, tblFeeCode, tblFeeMandatory, tblFeeFlag) values ('$id', '$name', '$code', '$mand', 1)";
$result = mysqli_query($con, $query);
$query = "select tblLevelId, tblLevelName from tbllevel where tblLevelFlag = 1";
$result = $con->query($query);
$num = $result->num_rows;

$query = "select tblLevelId, tblLevelName from tbllevel where tblLevelFlag = 1";
$result=mysqli_query($con, $query);
while($row=mysqli_fetch_array($result))
{
	$levelid=$row['tblLevelId'];
	$query1="select * from tblfeeamount order by tblFeeAmountId desc limit 0, 1";
	$result1 = mysqli_query($con, $query1);
	$row1 = mysqli_fetch_assoc($result1);
	$amntId = $row1['tblFeeAmountId'];
	$amntId++;
	$query = "insert into tblfeeamount(tblFeeAmountId, tblFeeAmount_tblFeeId, tblFeeAmount_tblLevelId, tblFeeAmountFlag) values ('$amntId','$id','$levelid',1)";
	if (!$query = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
	}else{
    header('location:payment.php?message=2');
	}
}
?>