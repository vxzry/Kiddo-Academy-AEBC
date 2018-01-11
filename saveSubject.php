<?php
include "db_connect.php";
if(isset($_POST['btnAddLvl']))
{
	$subjid = strtoupper($_POST['txtAddSubjId']);
	$name = strtoupper($_POST['txtAddSubj']);
	$levelid = $_POST['chkAddLvlId'];

	$query = "insert into tblsubject(tblSubjectId, tblSubjectDesc, tblSubjectFlag) values('$subjid', '$name', 1)";
	$result = mysqli_query($con, $query);
	foreach ($levelid as $value) {
		$query="select tblLevelName from tbllevel where tblLevelId='$value' and tblLevelFlag=1";
		$result=mysqli_query($con, $query);
		$row=mysqli_fetch_array($result);
		$lvlname=$row['tblLevelName'];

		$words = explode(" ", $lvlname);
		$suffix = "";

		foreach ($words as $w) {
		  $suffix .= $w[0];
		}
		$subjcode=$subjid."-".$suffix;

		$query = "select tblLvlSubjId from tbllevelsubject order by tblLvlSubjId desc limit 0, 1";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$id=$row['tblLvlSubjId'];
		$id++;
		$query="insert into tbllevelsubject(tblLvlSubjId, tblLvlSubj_tblSubjectId, tblLvlSubj_tblLevelId, tblLvlSubjCode, tblLvlSubjFlag) values ('$id', '$subjid', '$value', '$subjcode', 1)";
		if (!$query = mysqli_query($con, $query)) {
    		exit(mysqli_error($con));
		}else{
    		header('location:curriculum.php?message=2');;
		}
	}
}
?>