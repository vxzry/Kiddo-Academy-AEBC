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

	$query="select * from tblfaculty;";
	$result=$con->query($query);
	if($result->num_rows == 0)
	{	
		$zero = (string) "0000";
		$id=(string)"1";
	}else
	{
		$query="select * from tblfaculty group by tblFacultyId desc limit 0, 1";
		$result=mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
		$id = $row['tblFacultyId'];
		$id +=1;
		$lId=(string) strlen($id);
		if($lId==1)
		{
			$zero=(string)"0000";
		}else if($lId==2)
		{
			$zero=(string)"000";
		}else if($lId==3)
		{
			$zero=(string)"00";
		}else if($lId==4)
		{
			$zero=(string)"0";
		}else if($lId==5)
		{
			$zero=(string)"";
		}
	}
	$format='%s%d';
	$realid = sprintf($format,$zero,$id);
	

		$query = "select * from tbluser order by tblUserId desc limit 0, 1";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
		$userId = $row['tblUserId'];
		$userId ++;
		$fullname=$fname.$lname;
		$query="insert into tbluser(tblUserId, tblUserName, tblUser_tblRoleId, tblUserFlag) values ('$userId', '$fullname', '$roleid', 1)";
		$result=mysqli_query($con, $query);
	// User end

	$query="insert into tblfaculty(tblFacultyId, tblFacultyFname, tblFacultyLname, tblFacultyMname, tblFacultyGender, tblFacultyEmail, tblFacultyFlag, tblFacultyContact, tblFacultyAddress, tblFacultyBday, tblFacultyBplace, tblFaculty_tblUserId) values ('$realid', '$fname', '$lname', '$mname', '$gender', '$email', 1, '$no', '$add', '$bday', '$bplace', '$userId')";
	if (!$query = mysqli_query($con, $query)) {
    	exit(mysqli_error($con));
	}else{
    	header('location:faculty-add.php');
	}
}
?>