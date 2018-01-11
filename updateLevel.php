<?php
include "db_connect.php";
if(isset($_POST['btnUpdLvl']))
{
	$lvlId = $_POST['txtUpdLvlId'];
	$lvlName = strtoupper($_POST['txtUpdLvl']);
	$divName = $_POST['selUpdLvlDiv'];
	$query = "select tblDivisionId, tblDivisionName from tbldivision where tblDivisionName='$divName'";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$divId=$row['tblDivisionId'];
	$query = "update tbllevel set tblLevelName='$lvlName', tblLevel_tblDivisionId='$divId' where tblLevelId='$lvlId'";
		if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else{
	   header('location:curriculum.php?message=4');
	}

}
?>