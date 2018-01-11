<?php
include "db_connect.php";
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
?>