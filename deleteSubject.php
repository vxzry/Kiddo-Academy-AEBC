<?php
    include "db_connect.php";
    if(isset($_POST['btnDelSubj'])){
        $id = $_POST['txtDelSubjId'];

		$search="select * from tblcurriculumdetail where tblCurriculumDetail_tblSubjectId='$id'";
        $find=$con->query($search);
        if($find->num_rows == 0)
        {
        	$query="update tblsubject set tblSubjectFlag = 0 where tblSubjectId = '$id'";
        	if (!$query = mysqli_query($con, $query)) {
	   			exit(mysqli_error($con));
	   			header('location:curriculum.php?message=5');
			}else{
	   			header('location:curriculum.php?message=6');
			}
        }else if($find->num_rows > 0)
        {
        	header('location:curriculum.php?message=9');
        }
    }
?>