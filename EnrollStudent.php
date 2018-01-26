<?php
include "db_connect.php";
if(isset($_POST['btnProceed']))
{
	$studid = $_POST['txtStudId'];
	$clear=$_POST['txtClear'];
	$session=$_POST['txtSession'];
	$schemem=$_POST['selSchemeMand'];
	$schemeo=$_POST['selSchemeOpt'];
	
		$feeId=$_POST['txtFeeId2'];
	
	
	$feeId1=$_POST['txtFeeId1'];
	$query="select tblSchoolYrId from tblschoolyear where tblSchoolYrActive='ACTIVE' and tblSchoolYearFlag=1";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$syid=$row['tblSchoolYrId'];
	$query="select tblStudent_tblLevelId from tblstudent where tblStudentId='$studid'";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$lvlid=$row['tblStudent_tblLevelId'];

	 $query="select * from tblstudenroll order by tblStudEnrollId desc limit 0, 1";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	$enrollid = $row['tblStudEnrollId'];
	$enrollid++;
	$query="insert into tblstudenroll(tblStudEnrollId, tblStudEnrollPreferedSession, tblStudEnrollClearance, tblStudEnroll_tblStudentId) values ('$enrollid', '$session', '$clear', '$studid')";
	$result=mysqli_query($con, $query);

	foreach($schemem as $val)
	{
		$query="select * from tblstudscheme order by tblStudSchemeId desc limit 0, 1";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
		$studschemeid = $row['tblStudSchemeId'];
		$studschemeid++;
		$query="select * from tblscheme where tblSchemeId='$val' and tblSchemeFlag=1";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
		$fee=$row['tblScheme_tblFeeId'];
		$query="insert into tblStudScheme(tblStudSchemeId, tblStudScheme_tblSchemeId, tblStudScheme_tblFeeId, tblStudScheme_tblStudentId, tblStudScheme_tblSchoolYrId) values ('$studschemeid', '$val', '$fee', '$studid', '$syid')";
		if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
		}
	}
	/*
	$length1=count($schemem);
	foreach($feeId1 as $val1)
	{
		for($i=0; $i<=$length1; $i++)
		{
			$scheme1=$schemem[$i];
			if($scheme1=='None')
			{
				$scheme1="";
			}
			$search="select * from tblscheme where tblScheme_tblFeeId='$val1' and tblSchemeId='$scheme1' and tblSchemeFlag=1";
			$result=$con->query($search);
			if($result->num_rows > 0)
			{
				$query="select * from tblstudscheme order by tblStudSchemeId desc limit 0, 1";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_assoc($result);
				$studschemeid = $row['tblStudSchemeId'];
				$studschemeid++;
				$query="insert into tblstudscheme(tblStudSchemeId, tblStudScheme_tblSchemeId, tblStudScheme_tblFeeId, tblStudScheme_tblStudentId, tblStudScheme_tblSchoolYrId) values ('$studschemeid', '$scheme1', '$val1', '$studid', '$syid')";
				if (!$query = mysqli_query($con, $query)) {
				exit(mysqli_error($con));
				 }
			}else if($result->num_rows == 0)
			{
				$query="select * from tblstudscheme order by tblStudSchemeId desc limit 0, 1";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_assoc($result);
				$studschemeid = $row['tblStudSchemeId'];
				$studschemeid++;
				$query="insert into tblstudscheme(tblStudSchemeId, tblStudScheme_tblFeeId, tblStudScheme_tblStudentId, tblStudScheme_tblSchoolYrId) values ('$studschemeid', '$val1', '$studid', '$syid')";
				if (!$query = mysqli_query($con, $query)) {
				exit(mysqli_error($con));
				 }
			}
		}
		
	} //foreach feeId(mandatory)*/
	$length=count($schemeo);
	if($feeId != 'None')
	{
	foreach($feeId as $val2)
	{
		$query="select * from tblscheme where tblScheme_tblFeeId='$val2' and tblSchemeFlag=1";
		$result=mysqli_fetch_array(mysqli_query($con, $query));
		$q=$result['tblSchemeId'];
		if(!empty($q))
		{
			foreach($schemeo as $val3)
			{
				$query6="select * from tblscheme where tblScheme_tblFeeId='$val2' and tblSchemeId='$val3' and tblSchemeFlag=1";
				$result6 = $con->query($query6);
				if ($result6->num_rows > 0)
				{
				$query7="insert into tblstudscheme(tblStudScheme_tblSchemeId, tblStudScheme_tblFeeId, tblStudScheme_tblStudentId, tblStudSchemeFlag) value ('$val3', '$val2', '$studid', 1)";
				if (!$query7 = mysqli_query($con, $query7)){
    					exit(mysqli_error($con));
    					
				}
				}
			}
		}else if(empty($q))
		{
			$query8="insert into tblstudscheme(tblStudScheme_tblFeeId, tblStudScheme_tblStudentId, tblStudSchemeFlag) value ('$val2', '$studid', 1)";
			if (!$query8 = mysqli_query($con, $query8)){
    			exit(mysqli_error($con));
    					
			}
		}
		/* for($i=0; $i<$length; $i++)
		{
			$scheme=$schemeo[$i];
			if($scheme == 'None')
			{
				$scheme = "";
			}
			$search="select * from tblscheme where tblScheme_tblFeeId='$val2' and tblSchemeId='$scheme' and tblSchemeFlag=1";
			$result=$con->query($search);
			if($result->num_rows > 0)
			{
				$query="select * from tblstudscheme order by tblStudSchemeId desc limit 0, 1";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_assoc($result);
				$studschemeid = $row['tblStudSchemeId'];
				$studschemeid++;
				$query="insert into tblstudscheme(tblStudSchemeId, tblStudScheme_tblSchemeId, tblStudScheme_tblFeeId, tblStudScheme_tblStudentId, tblStudScheme_tblSchoolYrId) values ('$studschemeid', '$scheme', '$val2', '$studid', '$syid')";
				if (!$query = mysqli_query($con, $query)) {
				exit(mysqli_error($con));
				 }
			}else if($result->num_rows == 0)
			{
				$query="select * from tblstudscheme order by tblStudSchemeId desc limit 0, 1";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_assoc($result);
				$studschemeid = $row['tblStudSchemeId'];
				$studschemeid++;
				$query="insert into tblstudscheme(tblStudSchemeId, tblStudScheme_tblFeeId, tblStudScheme_tblStudentId, tblStudScheme_tblSchoolYrId) values ('$studschemeid', '$val2', '$studid', '$syid')";
				if (!$query = mysqli_query($con, $query)) {
				exit(mysqli_error($con));
				 }
			}
		} */
	
	}
	}

	 $query="select * from tblstudscheme where tblStudScheme_tblStudentId='$studid' and tblStudScheme_tblSchoolYrId='$syid' and tblStudSchemeFlag=1";
	$result=mysqli_query($con, $query);
	while($row=mysqli_fetch_array($result)):
		$studscheme=$row['tblStudSchemeId'];
		$schemeId=$row['tblStudScheme_tblSchemeId'];
		$studfeeid=$row['tblStudScheme_tblFeeId'];
		if(!empty($schemeId))
		{
			$query4="select * from tblschemedetail where tblSchemeDetail_tblScheme='$schemeId' and tblSchemeDetail_tblLevel='$lvlid' and tblSchemeDetailFlag=1 and tblSchemeDetail_tblFee='$studfeeid'";
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
				$query5="insert into tblaccount(tblAccId, tblAcc_tblStudentId, tblAcc_tblStudSchemeId, tblAccCredit, tblAccDueDate, tblAccPaymentNum, tblAccRunningBal) values ('$accountid', '$studid', '$studscheme', '$payment', '$duedate', '$paymentnum', '$payment')";
				if (!$query5 = mysqli_query($con, $query5)) {
				exit(mysqli_error($con));	
				}
			}

			
		}else if(empty($schemeId))
		{
			$query1="select * from tblfeeamount where tblFeeAmount_tblFeeId='$studfeeid' and tblFeeAmountFlag=1 and tblFeeAmount_tblLevelId='$lvlid'";
			$result1=mysqli_query($con, $query1);
			$row1=mysqli_fetch_array($result1);
			$feeamnt=$row1['tblFeeAmountAmount'];
			$query2="select * from tblaccount order by tblAccId desc limit 0, 1";
			$result2 = mysqli_query($con, $query2);
			$row2 = mysqli_fetch_assoc($result2);
			$id = $row2['tblAccId'];
			$id ++;
			$query3="insert into tblaccount(tblAccId, tblAcc_tblStudentId, tblAcc_tblStudSchemeId, tblAccCredit, tblAccPaymentNum, tblAccRunningBal) values ('$id', '$studid', '$studscheme', '$feeamnt', 1, '$feeamnt')";
			if (!$query3 = mysqli_query($con, $query3)) {
				exit(mysqli_error($con));
			}

		}
	endwhile;
	
	$query="update tblstudent set tblStudentPreferSession='$session' where tblStudentId='$studid' and tblStudentFlag=1";
	if (!$query = mysqli_query($con, $query)) {
				exit(mysqli_error($con));
	}else
	{
		header("location:collection2.php?studentid=$studid");

	}
	
}//btnProceed
?>

