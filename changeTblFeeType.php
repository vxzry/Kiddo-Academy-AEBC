<?php
include "db_connect.php";
$feetype=$_GET['selFeeType'];
if(!empty($feetype))
{
echo '<option selected disabled>--Select Fee Type--</option>';
$query="select tblFeeId, tblFeeName from tblfee where tblFeeType='$feetype' and tblFeeFlag=1";
$result=mysqli_query($con, $query);
while($row=mysqli_fetch_array($result))
{
	echo '<option value="'; echo $row['tblFeeId']; echo '">'; echo $row['tblFeeName']; echo '</option>';
}
}
?>