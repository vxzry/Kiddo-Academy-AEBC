<?php
include "db_connect.php";
$lvl=$_GET['selSchedLvl'];
$query="update tblschemedetail set tblSchedDetailCtr=1 where tblSchemeDetail_tblLevel='$lvl'";
$result=mysqli_query($con, $query);
$query="update tblschemedetail set tblSchedDetailCtr=0 where tblSchemeDetail_tblLevel<>'$lvl'";
$result=mysqli_query($con, $query);
?>