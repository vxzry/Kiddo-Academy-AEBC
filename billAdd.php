<?php
include "db_connect.php";
if(isset($_POST['btnAdd']))
{
echo '<div class="col-md-12" style="margin-top: 3%">
	<label>Select Fee: </label>
	<select>
		<option disabled selected>--Select Fee--</option>';
		$query="select * from tblfee where tblFeeFlag=1 and tblFeeMandatory='N'";
		while($row=mysqli_fetch_array(mysqli_query($con, $query))):
		echo '<option value="'.$row["tblFeeId"].'">'.$row["tblFeeCode"].':'.$row["tblFeeName"].'</option>';
	endwhile;
	echo '</select>
</div>';
}
?>