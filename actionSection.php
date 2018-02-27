<?php
include "db_connect.php";
if(isset($_POST['btnAddSect']))
{
	$lvlSel = $_POST['addLvlSelect'];
	$maxcap = $_POST['addMaxCap'];
	$mincap = $_POST['addMinCap'];
	$section = strtoupper($_POST['addSectTxt']);
	$session = $_POST['addSesSelect'];
	$search = "select * from tblsection where tblSectionName = '$section' and tblSectionFlag=1";
	$result = $con->query($search);
	if ($result->num_rows == 0)
	{
		$search = "select * from tblsection where tblSectionName = '$section' and tblSectionFlag=0";
		$result = $con->query($search);
		if($result->num_rows == 0)
		{
			$query = "select * from tblsection order by tblSectionId desc limit 0, 1";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_assoc($result);
			$sectid = $row['tblSectionId'];
			$sectid ++;
			$sql = "select `tblLevelId` from `tbllevel` where `tblLevelName` = '$lvlSel' order by `tblLevelId` desc limit 0, 1";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_assoc($result);
			$lvlid = $row['tblLevelId'];
			$query = "insert ignore into `tblsection`(`tblSectionId`, `tblSectionName`, `tblSection_tblLevelId`, `tblSectionFlag`, `tblSectionSession`, `tblSectionMaxCap`, `tblSectionMinCap`) values ('$sectid', '$section', '$lvlSel', 1, '$session', '$maxcap', '$mincap')";
			if (!$query = mysqli_query($con, $query)) {
    					exit(mysqli_error($con));
    					
					}else{
    					header('location:section.php?message=2');
					}
		}else
		{
			$query="update tblsection set tblSectionFlag=1 where tblSectionName='$section'";
			$result = mysqli_query($con, $query);
			$query="select * from tblsection where tblSectionName='$section'";
			$result=mysqli_query($con, $query);
			$row=mysqli_fetch_array($result);
			$sectionId = $row['tblSectionId'];
			$query = "update tblsched set tblSchedFlag=1 where tblSched_tblSectionId = '$sectionId'";
			if (!$query = mysqli_query($con, $query)) {
    			exit(mysqli_error($con));
    			
			}else{
   				header('location:section.php?message=2');
			}
		}
	}else
	{
		header('Location: section.php?message=1');
	}
}else if(isset($_POST['btnUpdSect']))
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
}else if(isset($_POST['btnDelSect']))
{
	$id = $_POST['txtDelSectId'];
	$query="update tblsection set tblSectionFlag = 0 where tblSectionId = '$id'";
	$result=mysqli_query($con, $query);
	$query="update tblstudent set tblStudent_tblSectionId=null where tblStudent_tblSectionId='$id'";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else{
	   header('location:section.php?message=6');
	}
}
?>