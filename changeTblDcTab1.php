<?php
include "db_connect.php";
$lvl=$_GET['selLvl'];
echo '<option disabled selected>--Select Section--</option>';
$query=mysqli_query($con, "select * from tblsection where tblSection_tblLevelId='$lvl' and tblSectionFlag=1");
while($row=mysqli_fetch_array($query))
{

	echo '<option value="'.$row['tblSectionId'].'">'.$row["tblSectionName"].'</option>';
}
?>