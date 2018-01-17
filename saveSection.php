<?php
include "db_connect.php";
if(isset($_POST['addSectBtn']))
{
	if(isset($_POST['addLvlSelect']))
	{
	$subjid  = array();
	$day = array("MONDAY","TUESDAY","WEDNESDAY","THURSDAY","FRIDAY");
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
			

			// $query = "select * from tblsched order by tblSchedId desc limit 0, 1";
			// $result = mysqli_query($con, $query);
			// $row = mysqli_fetch_assoc($result);
			// $schedid = $row['tblSchedId'];

			// $query = "select l.tblLevelName, s.tblSubjectId, s.tblSubjectDesc, sc.tblSectionId, sc.tblSectionName from tbllevel l, tblsubject s, tblsection sc, tblcurriculumdetail c, tblcurriculum cu where l.tblLevelid=c.tblCurriculumDetail_tblLevelId and s.tblSubjectId=c.tblCurriculumDetail_tblSubjectId and sc.tblSection_tblLevelId=l.tblLevelId and l.tblLevelId='$lvlSel' and sc.tblSectionName='$section' and cu.tblCurriculumActive='ACTIVE' and cu.tblCurriculumFlag=1";
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

	}

}
mysqli_close($con);
?>
