<?php
include "db_connect.php";
if(isset($_POST['btnHealth']))
{
	  $studId = $_POST['txtHStudId'];
	  $allergy = $_POST['txtHealthAllergy'];
      $illness = $_POST['txtHealthIllness'];
      $medication = $_POST['txtHealthMedic'];
      $bloodtype = $_POST['txtHealthBlood'];
      $hospitalized = $_POST['h2'];
      $reason = $_POST['txtHealthReason'];
      $doctor = $_POST['txtHealthDoctor'];
      $hospital = $_POST['txtHealthHospital'];
      $hospitalno = $_POST['txtHealthNo'];
      $hospitaladd = $_POST['txtHealthAdd'];
      $emergency = $_POST['r1'];

      $query = "update tblstudhealth set tblStudHealthAllergies='$allergy', tblStudHealthIllness='$illness', tblStudHealthMedication='$medication', tblStudHealthBloodType='$bloodtype', tblStudHealthHospitalized='$hospitalized', tblStudHealthReason='$reason', tblStudHealthDoctor='$doctor', tblStudHealthHospital='$hospital', tblStudHealthHospitalNo='$hospitalno', tblStudHealthHospitalAdd='$hospitaladd', tblStudHealthEmergency='$emergency' where tblStudHealth_tblStudentId = '$studId' and tblStudHealthFlag = 1";
      $result = mysqli_query($con, $query);
      if (!$query = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }else{
	        header('location:profilev2.php');
	    }
}
?>