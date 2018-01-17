<?php
    include "db_connect.php";
    if(isset($_POST['btnDelSy'])){
        $id = $_POST['txtDelSyId'];
        $query="select tblSchoolYrActive from tblschoolyear where tblSchoolYrId='$id'";
        $result=mysqli_query($con, $query);
        $row=mysqli_fetch_assoc($result);
        $active=$row['tblSchoolYrActive'];
        if($active=="INACTIVE")
        {
            $query="update tblgradingperiod set tblGradingFLag = 0 where tblGrading_tblSchoolYrId = '$id'";
            $result=mysqli_query($con, $query);
        	$query="update tblschoolyear set tblSchoolYearFlag = 0 where tblSchoolYrId = '$id'";
			if (!$query = mysqli_query($con, $query)) {
	   			exit(mysqli_error($con));
			}else{
	   			header('location:school-year.php?message=6');
			}
        }else if($active=="ACTIVE")
        {
        	header('location:school-yearphp?message=7');
        }
    }
?>