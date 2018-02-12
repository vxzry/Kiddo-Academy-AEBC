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
	}
	$name = $_FILES['file']['name'];
	 $target_dir = "upload/";
	 $target_file = $target_dir . basename($_FILES["file"]["name"]);

	 // Select file type
	 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	 // Valid file extensions
	 $extensions_arr = array("jpg","jpeg","png","gif");

	 // Check extension
	 if( in_array($imageFileType,$extensions_arr) ){
	 
	  // Convert to base64 
	  $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
	  $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
	  // Insert record
	  $query = "update tblstudentinfo set tblStudInfoImage='".$image."' where tblStudInfo_tblStudentId='$id'";
	  mysqli_query($con,$query);
	  
	  // Upload file
	  move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
	 }
	 
	header("location:profile.php");

}
?>