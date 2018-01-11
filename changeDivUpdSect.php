<?php
include "db_connect.php";
$division = $_GET['updDivSelect'];
if($division!="")
{
	/*$query = "select country.id from country where country.title = $division"*/
	$query="select tblDivisionId from tbldivision where tblDivisionName='$division'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$divId = $row['tblDivisionId'];
	$query = "SELECT distinct tblLevelId, tblLevelName FROM tbllevel WHERE tblLevel_tblDivisionId='$divId' and tblLevelFlag = 1";
	$result = mysqli_query($con, $query);
	echo "<option selected>--SELECT LEVEL--</option>";
	while ($row = mysqli_fetch_array($result))
	{
		echo '<option value ="'; echo $row['tblLevelId'];
		echo '">' ; 
		echo $row['tblLevelName']; 
		echo "</option>";
	}
}
?>
