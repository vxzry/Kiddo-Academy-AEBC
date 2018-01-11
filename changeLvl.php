<?php
include "db_connect.php";
$level = $_GET['selAddFLvl'];
if($level!="")
{
	/*$query = "select country.id from country where country.title = $division"*/
	$query = "SELECT distinct tblSectionId, tblSectionName FROM tblsection WHERE tblSection_tblLevelId='$level' and tblSection_tblFacultyId is null and tblSectionFlag=1";
	$result = mysqli_query($con, $query);
	echo "<option selected>--Select Section--</option>";
	while ($row = mysqli_fetch_array($result))
	{
		echo '<option value ="'; echo $row['tblSectionId'];
		echo '">' ; 
		echo $row['tblSectionName']; 
		echo "</option>";
	}
}
?>
