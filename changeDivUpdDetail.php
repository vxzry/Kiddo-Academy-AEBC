<?php
include "db_connect.php";
$division = $_GET['selUpdDetDiv'];
if($division!="")
{
	$query = "select tblDivisionId from tbldivision where tblDivisionName = '$division' and tblDivisionFlag = 1";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$divId = $row['tblDivisionId'];
	$query = "SELECT tblLevelId, tblLevelName FROM tbllevel WHERE tblLevel_tblDivisionId='$divId' and tblLevelFlag = 1";
	$result = mysqli_query($con, $query);
	echo "<option selected>--Select Level--</option>";
	while ($row = mysqli_fetch_array($result))
	{
		echo '<option value ="'; echo $row['tblLevelName'];
		echo '">' ; 
		echo $row['tblLevelName']; 
		echo "</option>";
	}
}
?>