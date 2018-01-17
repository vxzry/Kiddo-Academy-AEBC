<?php
	include "db_connect.php";
	if(isset($_POST['btnUpdReq']))
	{
		$id = ($_POST['txtUpdSyId']);
		$yr = $_POST['txtUpdSyYear'];
		$curr = $_POST['selUpdSyCurr'];
		$active = $_POST['selUpdSyAct'];
		$yr2 = $yr + 1;
		$year = 'S.Y. '.$yr.'-'.$yr2;
		$search = "select tblSchoolYrYear from tblschoolyear where tblSchoolYrYear = '$year' and tblSchoolYrId <> '$id' and tblSchoolYearFlag = 1";
		$result = $con->query($search);
		if ($result->num_rows > 0) 
		{
			header('Location: school-year.php?msg=1');
		}else{
		$query = "select tblCurriculumId from tblcurriculum where tblCurriculumName = '$curr'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$currId = $row['tblCurriculumId'];
		$query = "UPDATE tblschoolyear SET tblSchoolYrStart='$yr', tblSchoolYrYear='$year', tblSchoolYr_tblCurriculumId = '$currId' WHERE tblSchoolYrId = '$id'";
		$result = mysqli_query($con, $query);
		/*if (!$query = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }else
	    {
	    	header('Location: school-year.php?msg=2');
	    }
*/		if($active == 'ACTIVE')
		{
			$query = "UPDATE tblschoolyear SET tblSchoolYrActive = 'INACTIVE' WHERE tblSchoolYrActive = 'ACTIVE' and tblSchoolYrYear<>'$year'";
			$result = mysqli_query($con, $query);
			$query = "update tblschoolyear set tblSchoolYrActive = 'ACTIVE' where tblSchoolYrYear = '$year'";
			$result = mysqli_query($con, $query);
			header('Location: school-year.php?message=4');
		}else
		{
			$query = "select tblSchoolYrActive from tblschoolyear where tblSchoolYrActive = 'ACTIVE' and tblSchoolYrId <> '$id' and tblSchoolYearFlag = 1";
			$result = $con->query($search);
			if ($result->num_rows > 0) 
			{
				$query = "update tblschoolyear set tblSchoolYrActive = '$active' where tblSchoolYrId = '$id'";
				$result = mysqli_query($con, $query);
				
			}else
			{
				header('Location: school-year.php?message=3');
			}
			header('Location: school-year.php?message=4');
		}
	}
}
    mysqli_close($con);
?>