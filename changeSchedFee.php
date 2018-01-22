<?php
include "db_connect.php";
$fee = $_GET['selSchedFee'];
if($fee!="")
{
	/*$query = "select country.id from country where country.title = $division"*/
	$query = "select * from tblscheme where tblSchemeFlag = 1 and tblScheme_tblFeeId = '$fee' ";
	$result = mysqli_query($con, $query);
	echo "<option selected>--Select Scheme--</option>";
	while ($row = mysqli_fetch_array($result))
	{
		echo '<option value ="'; echo $row['tblSchemeId'];
		echo '">' ; 
		echo $row['tblSchemeType']; 
		echo "</option>";
	}
}
?>