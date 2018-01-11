<?php
include "db_connect.php";
$scheme = $_GET['selSchedScheme'];
if($scheme!="")
{
	/*$query = "select country.id from country where country.title = $division"*/
	$query = "select * from tbllevel where tblLevelFlag = 1";
	$result = mysqli_query($con, $query);
	echo "<option selected>--Select Scheme--</option>";
	while ($row = mysqli_fetch_array($result))
	{
		echo '<option value ="'; echo $row['tblLevelId'];
		echo '">' ; 
		echo $row['tblLevelName']; 
		echo "</option>";
	}
}
?>