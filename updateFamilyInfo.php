<?php
include "db_connect.php";
if(isset($_POST['btnSubmit']))
{
	$studId = $_POST['txtFStudId'];
	$fatherfname = $_POST['txtParentFname'];
	$fatherlname = $_POST['txtParentLname'];
	$fathermname = $_POST['txtParentMname'];
	$fatheradd = $_POST['txtParentAdd'];
	$fathertelno = $_POST['txtParentTelNo'];
	$fathercpno = $_POST['txtParentCpNo'];
	$fatherjob = $_POST['txtParentOccupation'];
	$fathercompany = $_POST['txtParentCompany'];
	$fathercompanyadd = $_POST['txtParentCompanyAdd'];
	$fatherworkno = $_POST['txtParentWorkNo'];
	$fatheremail = $_POST['txtParentEmail'];

	$motherfname = $_POST['txtParentMFname'];
	$motherlname = $_POST['txtParentMLname'];
	$mothermname = $_POST['txtParentMMname'];
	$motheradd = $_POST['txtParentMAdd'];
	$mothertelno = $_POST['txtParentMTelNo'];
	$mothercpno = $_POST['txtParentMCpNo'];
	$motherjob = $_POST['txtParentMJob'];
	$mothercompany = $_POST['txtParentMCompany'];
	$mothercompanyadd = $_POST['txtParentMCompanyAdd'];
	$motherworkno = $_POST['txtParentMWorkNo'];
	$motheremail = $_POST['txtParentMEmail'];

	$query = "update tblparent set tblParentFname = '$fatherfname', tblParentLname='$fatherlname', tblParentMname = '$fathermname', tblParentAdd = '$fatheradd', tblParentTelNo= '$fathertelno', tblParentCpNo= '$fathercpno', tblParentOccupation= '$fatherjob', tblParentCompany= '$fathercompany', tblParentCompanyAdd= '$fathercompanyadd', tblParentWorkNo= '$fatherworkno', tblParentEmail= '$fatheremail' where tblParent_tblStudentId = '$studId' and tblParentRelation='Father' and tblParentFlag=1";
	$result = mysqli_query($con, $query);
	$query = "update tblparent set tblParentFname = '$motherfname', tblParentLname='$motherlname', tblParentMname = '$mothermname', tblParentAdd = '$motheradd', tblParentTelNo= '$mothertelno', tblParentCpNo= '$mothercpno', tblParentOccupation= '$motherjob', tblParentCompany= '$mothercompany', tblParentCompanyAdd= '$mothercompanyadd', tblParentWorkNo= '$motherworkno', tblParentEmail= '$motheremail' where tblParent_tblStudentId = '$studId' and tblParentRelation='Mother' and tblParentFlag=1";
	$result = mysqli_query($con, $query);
	if (!$query = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }else{
	        header('location:profilev2.php');
	    }
		
}
?>