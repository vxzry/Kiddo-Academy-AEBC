<?php
include "db_connect.php";
if(isset($_POST['btnpersonal']))
{
	$id = $_POST['txtPerId'];
	$lname = $_POST['txtPerLname'];
	$fname = $_POST['txtPerFname'];
	$mname = $_POST['txtPerMname'];
	$bday = $_POST['txtPerBday'];
	$bplace = $_POST['txtPerBplace'];
	$addst = $_POST['txtAddSt'];
	$addbrgy = $_POST['txtAddBrgy'];
	$addcity = $_POST['txtAddCity'];
	$addcountry = $_POST['txtAddCountry'];
	$gender = $_POST['optradio'];
	$religion = $_POST['txtReligion'];
	$nationality = $_POST['txtNationality'];
	$lang1 = $_POST['txtlang1'];
	$lang2 = $_POST['txtlang2'];

	$query = "update tblstudentinfo set tblStudInfoFname = '$fname', tblStudInfoLname = '$lname', tblStudInfoMname = '$mname', tblStudInfoBday = '$bday', tblStudInfoBplace = '$bplace', tblStudInfoAddSt = '$addst', tblStudInfoAddBrgy = '$addbrgy', tblStudInfoAddCity = '$addcity', tblStudInfoAddCountry = '$addcountry', tblStudInfoGender = '$gender', tblStudInfoReligion = '$religion', tblStudInfoNationality = '$nationality', tblStudInfoLang1 = '$lang1', tblStudInfoLang2 = '$lang2' where tblStudInfo_tblStudentId = '$id'";
	if (!$query = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }else{
	        header('location:profile.php');
	    }
}
?>