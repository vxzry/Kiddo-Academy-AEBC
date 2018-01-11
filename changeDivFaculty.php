<?php
include "db_connect.php";
$division = $_GET['addDivSelect'];
if($division!="")
{
	/*$query = "select country.id from country where country.title = $division"*/
	$query = "SELECT distinct tblLevelId, tblLevelName FROM tbllevel WHERE tblLevel_tblDivisionId='$division'";
	$result = mysqli_query($con, $query);
	echo "<option selected value = '0'>--Select Level--</option>";
	while ($row = mysqli_fetch_array($result))
	{
		echo '<option value ="'; echo $row['tblLevelId'];
		echo '">' ; 
		echo $row['tblLevelName']; 
		echo "</option>";
	}
}
?>
