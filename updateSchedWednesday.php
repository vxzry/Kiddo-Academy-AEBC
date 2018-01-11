<?php
include "db_connect.php";

if(isset($_POST['btnWed']))
{
	$day=$_POST['txtWedDay'];
	$sectid=$_POST['txtWedSectId'];
	$subjcode=$_POST['txtWedSubjCode'];
	$subj=$_POST['txtWedSubj'];
	$start=$_POST['txtWedStart'];
	$end=$_POST['txtWedEnd'];

	/*echo $day."	".$sectid."	".$subjcode."	".$subj."	".$start."	".$end;*/
	$x=substr($start, -2);
	$hr=substr($start, 0, 2);
	$min=substr($start, 3, 2);
	$y=substr($end, -2);
	$hr2=substr($end, 0, 2);
	$min2=substr($end, 3, 3);
	if(strtoupper($x) == "PM" && $hr!=12)
	{
		$hr += 12;
	}else if(strtoupper($x) == "AM" && $hr==12)
	{
		$hr = 00;
	}else if(strtoupper($x) == "PM" && $hr==12)
	{
		$hr = 12;
	}
	if(strtoupper($y) == "PM" && $hr2!=12)
	{
		$hr2 += 12;
	}else if(strtoupper($y) == "AM" && $hr2==12)
	{
		$hr2 = 00;
	}else if(strtoupper($y) == "PM" && $hr2==12)
	{
		$hr2 = 12;
	}
	$startTime = $hr.":".$min;
	$endTime = $hr2.":".$min2;
	if($hr2 > $hr && $hr2!=00 && $hr!=00)
	{
		fnTime($startTime, $endTime, $sectid, $subjcode);
	}else if($hr2 < $hr && $hr2!=00 && $hr!=00)
	{
		header('location:schedulev2.php?msg=1');
	}else if($hr == 00 || $hr2 == 00)
	{
		fnTime($startTime, $endTime, $sectid, $subjcode);
	}

	
}
function fnTime($a, $b, $id, $subjId)
	{
		include "db_connect.php";
		$query="update tblsched set tblSchedStartOfSubj='$a', tblSchedEndOfSubj='$b' where tblSched_tblSectionId='$id' and tblSched_tblSubjectId='$subjId' and tblSchedDay='WEDNESDAY'";
		if (!$query = mysqli_query($con, $query)) {
   			exit(mysqli_error($con));
		}else{
    		header('location:schedulev2.php?msg=2');
		}
	}
?>