<?php
include "db_connect.php";
$feeid=$_GET['selFee'];
$type=$_GET['type'];
	echo '<input type="hidden" value="'.$feeid.'" name="txtFeeId" id="txtFeeId" />';
	if(!empty($feeid))
	{
	echo '<select name="selScheme" id="selScheme"><option selected disabled>--Select Scheme--</option>';
	$query="select tblSchemeId, tblSchemeType from tblscheme where tblScheme_tblFeeId='$feeid' and tblSchemeFlag=1";
	$result=mysqli_query($con, $query);
	while($row=mysqli_fetch_array($result)):
		echo '<option value="'; echo $row["tblSchemeId"]; echo '">'; echo $row["tblSchemeType"]; echo '</option>';
	endwhile;
	echo '</select>';
	}
	if($type=='0')
	{
		echo '<h4>Levels: </h4>';
		echo '<input type="hidden" value="PER LEVEL" name="txtFeeType" id="txtFeeType" />';
		$query=mysqli_query($con, "select tblLevelId, tblLevelName from tbllevel where tblLevelFlag=1");
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