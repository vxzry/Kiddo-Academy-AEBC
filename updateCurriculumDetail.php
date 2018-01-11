<?php
include "db_connect.php";
if(isset($_POST['btnUpdDet']))
{
	$detId = $_POST['txtUpdDetId'];
	$currId = $_POST['txtUpdDetCurrId'];
	$div = $_POST['selUpdDetDiv'];
	$lvl = $_POST['selUpdDetLvl'];
	$subjId = $_POST['selUpdDetSubj'];

	$query = "select tblDivisionId from tbldivision where tblDivisionName='$div'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$divId = $row['tblDivisionId'];

	$query = "select tblLevelId from tbllevel where tblLevelName='$lvl'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$lvlId = $row['tblLevelId'];

	$query = "update tblcurriculumdetail set tblCurriculumDetail_tblDivisionId = '$divId', tblCurriculumDetail_tblLevelId = '$lvlId', tblCurriculumDetail_tblSubjectId = '$subjId' where tblCurriculumDetailId = '$detId'";
	if (!$query = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
	}else{
    header('location:curriculum.php?message=4');
	}
}
?>