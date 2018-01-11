<?php
include "db_connect.php";
$feeid=$_GET['selAddFee'];
$query="select * from tblscheme where tblScheme_tblFeeId='$feeid' and tblSchemeFlag=1";
$result=mysqli_query($con, $query);
echo "<option selected disabled>--Select Scheme--</option>";
while($row=mysqli_fetch_array($result))
{
echo '<option value="'; echo $row['tblSchemeId']; echo '">'; echo $row['tblSchemeType']; echo '</option>';
}
?>