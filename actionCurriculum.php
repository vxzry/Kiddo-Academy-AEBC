<?php
include 'db_connect.php';
if(isset($_POST['btnAddCurr']))
{
	$currName = strtoupper($_POST['txtAddCurr']);
	$active = $_POST['selAddActive'];

	$query = "select * from tblcurriculum order by tblCurriculumId desc limit 0, 1";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	$id = $row['tblCurriculumId'];
	$id ++;
	$query = "insert into tblcurriculum(tblCurriculumId, tblCurriculumName, tblCurriculumFlag, tblCurriculumActive) values ('$id','$currName',1,'$active')";
	if (!$query = mysqli_query($con, $query)) {
	    exit(mysqli_error($con));
	}else{
	    header('location:curriculum.php?message=2');
	}
}else if(isset($_POST['btnUpdCurr']))
{
	$currId = $_POST['txtUpdCurrId'];
	$curr = strtoupper($_POST['txtUpdCurr']);
	$active = $_POST['selUpdActive'];

	$query="update tblcurriculum set tblCurriculumName = '$curr', tblCurriculumActive = '$active' where tblCurriculumId='$currId'";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}else{
	   header('location:curriculum.php?message=4');
	}
}else if(isset($_POST['btnDelCurr']))
{
	$id = $_POST['txtDelCurrId'];
	$search = "select * from tblschoolyear where tblSchoolYr_tblCurriculum='$id' and tblSchoolYrActive='ACTIVE'";
	$find=$con->query($search);
	$search="select * from tblcurriculumdetail where tblCurriculumDetail_tblCurriculumId=$id";
	$find2=$con->query($search);
	if($find->num_rows == 0 or $find2->num_rows == 0)
	{
		$query="update tblcurriculum set tblCurriculumFlag = 0 where tblCurriculumId = '$id'";
		$result=mysqli_query($con, $query);
		if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	   header('location:curriculum.php?message=5');
		}else{
	   header('location:curriculum.php?message=6');
		}
	}else if($find->num_rows > 0 or $find2->num_rows > 0)
	{
		header('location:curriculum.php?message=7');
	}
}else if(isset($_POST['btnUpdDet']))
{
	$subjid = $_POST['chkDetSubjId'];
	$currid=$_POST['txtDetCurrId'];
	foreach($subjid as $val)
	{
		// $query="select * from tblcurriculumdetails where tblCurriculumDetail_tblCurriculumId='$currid' and tblCurriculumDetail_tblSubjectId='$'"
		$query5="update tblcurriculumdetail set tblDetailsFlag=0 where tblCurriculumDetail_tblCurriculumId='$currid' and tblCurriculumDetail_tblSubjectId='$val'";
				if (!$query5 = mysqli_query($con, $query5)) {
		   			exit(mysqli_error($con));
				}
		$query="select * from tbllevelsubject where tblLvlSubj_tblSubjectId='$val' and tblLvlSubjFlag=1";
		$result=mysqli_query($con, $query);
		while($row=mysqli_fetch_array($result))
		{
			$lvlid=$row['tblLvlSubj_tblLevelId'];
			$query4="select * from tbllevel where tblLevelId='$lvlid' and tblLevelFlag=1";
			$result4=mysqli_query($con, $query4);
			$row4=mysqli_fetch_array($result4);
			$divid=$row4['tblLevel_tblDivisionId'];

			$query1="select * from tblcurriculumdetail where tblCurriculumDetail_tblCurriculumId='$currid' and tblCurriculumDetail_tblSubjectId='$val' and tblCurriculumDetail_tblLevelId='$lvlid'";
			$result1=mysqli_query($con, $query1);
			if(mysqli_num_rows($result1)==0)
			{
				$query3 = "select tblCurriculumDetailId from tblcurriculumdetail order by tblCurriculumDetailId desc limit 0, 1";
				$result3 = mysqli_query($con, $query3);
				$row3 = mysqli_fetch_array($result3);
				$cdid=$row3['tblCurriculumDetailId'];
				$cdid++;
				$query2="insert into tblcurriculumdetail(tblCurriculumDetailId, tblCurriculumDetail_tblCurriculumId, tblCurriculumDetail_tblDivisionId, tblCurriculumDetail_tblLevelId, tblCurriculumDetail_tblSubjectId, tblDetailsFlag) values ('$cdid', '$currid', '$divid', '$lvlid', '$val', 1)";
				if (!$query2 = mysqli_query($con, $query2)) {
		   			exit(mysqli_error($con));
				}
			}else if(mysqli_num_rows($result1)>=1)
			{
				$query6="update tblcurriculumdetail set tblDetailsFlag=1 where tblCurriculumDetail_tblCurriculumId='$currid' and tblCurriculumDetail_tblSubjectId='$val' and tblCurriculumDetail_tblLevelId='$lvlid'";
				if (!$query6 = mysqli_query($con, $query6)) {
		   			exit(mysqli_error($con));
				}
			}
		}
	}
	header("location:curriculum.php");
}
?>