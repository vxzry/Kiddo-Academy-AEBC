<?php
include "db_connect.php";
if(isset($_POST['btnUpdSubj']))
{
	$id = $_POST['txtUpdSubjId'];
	$name = strtoupper($_POST['txtUpdSubj']);
	$lvlid = $_POST['chkUpdLvlId'];
	$query = "update tblsubject set tblSubjectDesc = '$name' where tblSubjectId = '$id'";
	$result = mysqli_query($con, $query);
	$query="update tbllevelsubject set tblLvlSubjFlag=0 where tblLvlSubj_tblSubjectId='$id'";
	$result=mysqli_query($con, $query);

	foreach($lvlid as $val)
	{
		$query="select * from tbllevelsubject where tblLvlSubj_tblLevelId='$val' and tblLvlSubj_tblSubjectId='$id'";
		$result=mysqli_query($con, $query);
		if(mysqli_num_rows($result)==0)
		{
			$query1="select tblLevelName from tbllevel where tblLevelId='$val' and tblLevelFlag=1";
			$result1=mysqli_query($con, $query1);
			$row1=mysqli_fetch_array($result1);
			$lvlname=$row1['tblLevelName'];

			$words = explode(" ", $lvlname);
			$suffix = "";

			foreach ($words as $w) {
			  $suffix .= $w[0];
			}
			$subjcode=$id."-".$suffix;
			$query3 = "select tblLvlSubjId from tbllevelsubject order by tblLvlSubjId desc limit 0, 1";
			$result3 = mysqli_query($con, $query3);
			$row3 = mysqli_fetch_array($result3);
			$lsid=$row3['tblLvlSubjId'];
			$lsid++;
			$query2="insert into tbllevelsubject(tblLvlSubjId, tblLvlSubj_tblSubjectId, tblLvlSubj_tblLevelId, tblLvlSubjCode, tblLvlSubjFlag) values ('$lsid', '$id', '$val', '$subjcode', 1)";
			if (!$query2 = mysqli_query($con, $query2)) {
	   			exit(mysqli_error($con));
			}else{
				   header('location:curriculum.php?message=4');
				}
		}else if(mysqli_num_rows($result)>=1)
		{
			while($row = mysqli_fetch_array($result))
			{
				$query4="update tbllevelsubject set tblLvlSubjFlag=1 where tblLvlSubj_tblLevelId='$val' and tblLvlSubj_tblSubjectId='$id'";
				if (!$query4 = mysqli_query($con, $query4)) {
				   exit(mysqli_error($con));
				}else{
				   header('location:curriculum.php?message=4');
				}
			}
		}
	}
}
?>
