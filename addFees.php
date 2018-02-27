<?php
include "db_connect.php";
$feeid=$_POST['selAddFee'];
$schemeid=$_POST['selAddScheme'];
$studid=$_POST['txtStud'];
$query="select tblSchoolYrId from tblschoolyear where tblSchoolYrActive='ACTIVE' and tblSchoolYearFlag=1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$syid=$row['tblSchoolYrId'];

$query="select * from tblstudent where tblStudentId='$studid' and tblStudentFlag=1";
$row=mysqli_fetch_array(mysqli_query($con, $query));
$lvlid=$row['tblStudent_tblLevelId'];

$query="select * from tblstudscheme order by tblStudSchemeId desc limit 0, 1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$studschemeid=$row['tblStudSchemeId'];
$studschemeid++;
$query="insert into tblstudscheme(tblStudSchemeId, tblStudScheme_tblSchemeId, tblStudScheme_tblFeeId, tblStudScheme_tblStudentId, tblStudScheme_tblSchoolYrId) values ('$studschemeid', '$schemeid', '$feeid', '$studid', '$syid')";
if (!$query = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}

if(empty($schemeid))
{
	$query="select * from tblfeeamount where tblFeeAmount_tblFeeId='$feeid' and tblFeeAmountFlag=1";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$amount=$row['tblFeeAmountAmount'];
	$query="select * from tblaccount order by tblAccId desc limit 0, 1";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	$id = $row['tblAccId'];
	$id ++;
	$query="insert into tblaccount(tblAccId, tblAcc_tblStudentId, tblAcc_tblStudSchemeId, tblAccCredit, tblAccPaymentNum, tblAccRunningBal) values ('$id', '$studid', '$studschemeid', '$amount', 1, '$amount')";
	if (!$query = mysqli_query($con, $query)) {
		exit(mysqli_error($con));
	}
}else if(!empty($schemeid))
{
	$query4="select * from tblschemedetail where tblSchemeDetail_tblScheme='$schemeid' and tblSchemeDetail_tblLevel='$lvlid' and tblSchemeDetailFlag=1";
	$result3=mysqli_query($con, $query4);
	while($row3=mysqli_fetch_array($result3))
	{
		$duedate=$row3['tblSchemeDetailDueDate'];
		$payment=$row3['tblSchemeDetailAmount'];
		$paymentnum=$row3['tblSchemeDetailName'];
		$query5="select * from tblaccount order by tblAccId desc limit 0, 1";
		$result4=mysqli_query($con, $query5);
		$row4=mysqli_fetch_array($result4);
		$accountid=$row4['tblAccId'];
		$accountid ++; 
		$query5="insert into tblaccount(tblAccId, tblAcc_tblStudentId, tblAcc_tblStudSchemeId, tblAccCredit, tblAccDueDate, tblAccPaymentNum, tblAccRunningBal) values ('$accountid', '$studid', '$studschemeid', '$payment', '$duedate', '$paymentnum', '$payment')";
		if (!$query5 = mysqli_query($con, $query5)) {
			exit(mysqli_error($con));	
		}
	}
}
header("location:billing.php");

?>
