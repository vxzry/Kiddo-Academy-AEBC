<?php
include "db_connect.php";
$feeid=$_GET['optionalfees'];
$query=mysqli_query($con, "select * from tblfee where tblFeeId='$feeid' and tblFeeFlag=1");
$row=mysqli_fetch_array($query);
$fee=$row['tblFeeName'];
$query="select * from tblscheme where tblScheme_tblFeeId='$feeid' and tblSchemeFlag=1";
$result=$con->query($query);
if($result->num_rows >= 1)
{
echo '<div><label>'.$fee.'</label>';
echo '<select class="form-control" style="width:30%" name="selSchemeOpt[]" id="selSchemeOpt"><option disabled selected>--Select Scheme--</option>';
$query1=mysqli_query($con, "select * from tblscheme where tblScheme_tblFeeId='$feeid' and tblSchemeFlag=1");
while($row=mysqli_fetch_array($result))
{
	echo '<option value="'.$row["tblSchemeId"].'" >'.$row["tblSchemeType"].'</option>';
}
echo '</select></div>';
}
?>