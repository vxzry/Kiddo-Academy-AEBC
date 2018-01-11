<?php
    include "db_connect.php";
    if(isset($_POST['btnDelScheme'])){
        $scheme = $_POST['txtDelScheme'];

		$query="update tblscheme set tblSchemeFlag = 0 where tblSchemeId = '$scheme'";
		$result = mysqli_query($con, $query);
		$query="update tblschemedetail set tblSchemeDetailFlag=0 where tblSchemeDetail_tblScheme='$scheme'";
		if (!$query = mysqli_query($con, $query)) {
	   	exit(mysqli_error($con));
		}else{
	   	header('location:payment.php?message=6');
		}
    }
?>