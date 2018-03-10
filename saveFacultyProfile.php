<?php
include "db_connect.php";
if(isset($_POST['btnAdd']))
{
	$fname=$_POST['txtFname'];
	$lname=$_POST['txtLname'];
	$mname=$_POST['txtMname'];
	$bday=$_POST['txtBday'];
	$bplace=$_POST['txtBplace'];
	$gender=$_POST['optradio'];
	$add=$_POST['txtAdd'];
	$no=$_POST['txtNo'];
	$email=$_POST['txtEmail'];
	$position=$_POST['selPosition'];

	$query="select tblSchoolYrStart from tblschoolyear where tblSchoolYrActive='Active'";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$sy=substr($row['tblSchoolYrStart'], 2);
$query = "select * from tblfaculty where left(tblFacultyId, 2)='$sy' group by tblFacultyId desc limit 0, 1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$fid=substr($row['tblFacultyId'], 3);
if(empty($fid))
{
	$fid='001';
}else
{
	$fid++;
}
$id = sprintf('%03d', $fid);
$facultyid=$sy.$id;
	

		// $query = "select * from tbluser order by tblUserId desc limit 0, 1";
		// $result = mysqli_query($con, $query);
		// $row = mysqli_fetch_assoc($result);
		// $userId = $row['tblUserId'];
		// $userId ++;
		// $fullname=$fname.$lname;
		// $query="insert into tbluser(tblUserId, tblUserName, tblUser_tblRoleId, tblUserFlag) values ('$userId', '$facultyid', '$roleid', 1)";
		// $result=mysqli_query($con, $query);
	// User end

	$query="insert into tblfaculty(tblFacultyId, tblFacultyFname, tblFacultyLname, tblFacultyMname, tblFacultyGender, tblFacultyEmail, tblFacultyFlag, tblFacultyContact, tblFacultyAddress, tblFacultyBday, tblFacultyBplace, tblFacultyPosition) values ('$facultyid', '$fname', '$lname', '$mname', '$gender', '$email', 1, '$no', '$add', '$bday', '$bplace' , '$position')";
	if (!$query = mysqli_query($con, $query)) {
    	exit(mysqli_error($con));
	}else{
    	header('location:profile.php');
	}
}
?>