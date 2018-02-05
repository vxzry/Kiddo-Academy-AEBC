<?php
include "db_connect.php";
if(isset($_POST['btnSubmit']))
{
	$studId = $_POST['txtFStudId'];
	$fatherid = $_POST['txtId'];
	$fatherfname = $_POST['txtParentFname'];
	$fatherlname = $_POST['txtParentLname'];
	$fathermname = $_POST['txtParentMname'];
	$fatheraddst = $_POST['txtParentAddSt'];
	$fatheraddbrgy = $_POST['txtParentAddBrgy'];
	$fatheraddcity = $_POST['txtParentAddCity'];
	$fatheraddcountry = $_POST['txtParentAddCountry'];
	$fathertelno = $_POST['txtParentTelNo'];
	$fathercpno = $_POST['txtParentCpNo'];
	$fatherjob = $_POST['txtParentOccupation'];
	$fathercompany = $_POST['txtParentCompany'];
	$fathercompanyaddst = $_POST['txtParentCompanyAddSt'];
	$fathercompanyaddbrgy = $_POST['txtParentCompanyAddBrgy'];
	$fathercompanyaddcity = $_POST['txtParentCompanyAddCity'];
	$fathercompanyaddcountry = $_POST['txtParentCompanyAddCountry'];
	$fatherworkno = $_POST['txtParentWorkNo'];
	$fatheremail = $_POST['txtParentEmail'];

	$mid = $_POST['txtPmId'];
	$motherfname = $_POST['txtParentMFname'];
	$motherlname = $_POST['txtParentMLname'];
	$mothermname = $_POST['txtParentMMname'];
	$motheraddst = $_POST['txtParentMAddSt'];
	$motheraddbrgy = $_POST['txtParentMAddBrgy'];
	$motheraddcity = $_POST['txtParentMAddCity'];
	$motheraddcountry = $_POST['txtParentMAddCountry'];
	$mothertelno = $_POST['txtParentMTelNo'];
	$mothercpno = $_POST['txtParentMCpNo'];
	$motherjob = $_POST['txtParentMJob'];
	$mothercompany = $_POST['txtParentMCompany'];
	$mothercompanyaddst = $_POST['txtParentMComAddSt'];
	$mothercompanyaddbrgy = $_POST['txtParentMComAddBrgy'];
	$mothercompanyaddcity = $_POST['txtParentMComAddCity'];
	$mothercompanyaddcountry = $_POST['txtParentMComAddCountry'];
	$motherworkno = $_POST['txtParentMWorkNo'];
	$motheremail = $_POST['txtParentMEmail'];

	$query = "update tblparent set tblParentFname = '$fatherfname', tblParentLname='$fatherlname', tblParentMname = '$fathermname', tblParentAddSt = '$fatheraddst', tblParentAddBrgy = '$fatheraddbrgy', tblParentAddCity = '$fatheraddcity', tblParentAddCountry = '$fatheraddcountry', tblParentTelNo= '$fathertelno', tblParentCpNo= '$fathercpno', tblParentOccupation= '$fatherjob', tblParentCompany= '$fathercompany', tblParentComAddSt= '$fathercompanyaddst', tblParentComAddBrgy= '$fathercompanyaddbrgy', tblParentComAddCity= '$fathercompanyaddcity', tblParentComAddCountry= '$fathercompanyaddcountry', tblParentWorkNo= '$fatherworkno', tblParentEmail= '$fatheremail' where tblParentId = '$fatherid' and tblParentRelation='Father' and tblParentFlag=1";
	$result = mysqli_query($con, $query);
	$query = "update tblparent set tblParentFname = '$motherfname', tblParentLname='$motherlname', tblParentMname = '$mothermname', tblParentAddSt = '$motheraddst', tblParentAddBrgy = '$motheraddbrgy', tblParentAddCity = '$motheraddcity', tblParentAddCountry = '$motheraddcountry', tblParentTelNo= '$mothertelno', tblParentCpNo= '$mothercpno', tblParentOccupation= '$motherjob', tblParentCompany= '$mothercompany', tblParentComAddSt= '$mothercompanyaddst', tblParentComAddBrgy= '$mothercompanyaddbrgy', tblParentComAddCity= '$mothercompanyaddcity', tblParentComAddCountry= '$mothercompanyaddcountry', tblParentWorkNo= '$motherworkno', tblParentEmail= '$motheremail' where tblParentId = '$mid' and tblParentRelation='Mother' and tblParentFlag=1";
	$result = mysqli_query($con, $query);
	if (!$query = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }else{
	        header('location:profile.php');
	    }
		
}
?>