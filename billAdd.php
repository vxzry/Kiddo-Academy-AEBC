<?php
include "db_connect.php";
$feeid=$_GET['selFee'];
$type=$_GET['type'];
	echo '<input type="hidden" value="'.$feeid.'" name="txtFeeId" id="txtFeeId" />';
	if($type=='0')
	{
		echo '<h4>Levels: </h4>';
		echo '<input type="hidden" value="PER LEVEL" name="txtFeeType" id="txtFeeType" />';
		$query=mysqli_query($con, "select * from tbllevel where tblLevelFlag=1");
		while($row=mysqli_fetch_array($query))
		{
			echo '<div><input type="checkbox" name="txtLevel[]" value="'.$row["tblLevelId"].'"/><label>'.$row['tblLevelName'].' </label><div>';
		}
	}else if($type==1)
	{
		echo '<input type="hidden" value="GENERAL" name="txtFeeType" id="txtFeeType"/>';
		echo '<input type="hidden" name="txtLevel" id="txtLevel" value="None"/>';
	}

?>