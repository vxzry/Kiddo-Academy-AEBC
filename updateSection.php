<?php
include "db_connect.php";
if(isset($_POST['updSectBtn']))
{
	if(isset($_POST['updLvlName']))
	{
	$lvlName = $_POST['updLvlName'];
	$sectId = $_POST['updSectId'];
	$sectName = strtoupper($_POST['updSectName']);
	$session = $_POST['updSesSelect'];
	$maxcap = $_POST['updMaxCap'];
	$mincap = $_POST['updMinCap'];
	$session = $_POST['updSesSelect'];
	$search = "select * from tblsection where tblSectionName = '$sectName' and tblSectionFlag=1";
	$result = $con->query($search);
	$res=mysqli_query($con, $search);
	$row=mysqli_fetch_array($res);
	$name=$row['tblSectionName'];
	if ($result->num_rows == 0 or $sectName=$name)
	{
	$query = "select tblLevelId from tbllevel where tblLevelName = '$lvlName'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$lvlId = $row['tblLevelId'];
	$query = "update tblsection set tblSectionName = '$sectName', tblSection_tblLevelId = '$lvlId', tblSectionSession = '$session', tblSectionMaxCap='$maxcap', tblSectionMinCap='$mincap' where tblSectionId = '$sectId'";

		if (!$query = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }else{
	        header('location:section.php?message=4');
	    }
	}else if ($result->num_rows > 0 or $sectName!=$name)
	{
		header('location:section.php?message=3');
	}
	}
}
?>
