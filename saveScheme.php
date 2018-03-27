<?php
	include "db_connect.php";
	$fee = $_POST['selAddSchemeFee'];
	$scheme = strtoupper($_POST['txtAddScheme']);
	$no = $_POST['txtAddSchemeNo'];
	$arrLvl = array();

	$query = "select * from tblfee where tblFeeName = '$fee'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$feeId = $row['tblFeeId'];
	$query="select tblSchemeId from tblscheme order by tblSchemeId desc limit 0, 1";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$amntId = $row['tblSchemeId'];
	$amntId++;
	$query = "insert into tblscheme values ('$amntId', '$scheme', '$no', '$feeId', 1)";
	$result = mysqli_query($con, $query);
	$query  = "select * from tbllevel where tblLevelFlag = 1";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result))
	{
		array_push($arrLvl, $row['tblLevelId']);
	}
	foreach($arrLvl as $val)
	{
		for($i = 1; $i <= $no; $i++)
		{
		
		$query = "select tblSchemeDetailId from tblschemedetail order by tblSchemeDetailId desc limit 0, 1";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$detId = $row['tblSchemeDetailId'];
		$detId++;
		$query = "insert into tblschemedetail(tblSchemeDetailId, tblSchemeDetailName, tblSchemeDetail_tblLevel, tblSchemeDetail_tblScheme, tblSchemeDetail_tblFee) values ('$detId', '$i', '$val', '$amntId', '$feeId')";
		$result = mysqli_query($con, $query);
		}
		$query  = "select * from tbllevel where tblLevelFlag = 1";
		$result = $con->query($query);
		$num = $result->num_rows;	
		if($val > $num)
		{
			break;
		}
	}
	if (!$query = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
	}else{
    header('location:payment.php?message=2');
	}
?>