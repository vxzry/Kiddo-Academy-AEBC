<?php
	include "db_connect.php";
	if(isset($_POST['btnResetNumClass']))
	{
		       
               $numId= $_POST['resetInp'];
               $query="select tblNumClass_tblSy from tblnumberclass where tblNumClassid='$numId'";
               $result = mysqli_query($con, $query);
			   $row = mysqli_fetch_assoc($result);
               $sy= $row['tblNumClass_tblSy'];
               $query = "update tblnumberclass set tblNumClassDay = 0 where tblNumClassDay > 0 and tblNumClass_tblSy = '$sy'";
               $result = mysqli_query($con, $query);
			   if (!$query = mysqli_query($con, $query)) {
	            exit(mysqli_error($con));
	           }
        
        header('location:school-yearV2.php');
	}
	mysqli_close($con);
?>