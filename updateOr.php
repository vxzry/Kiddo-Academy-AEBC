<?php
include "db_connect.php";
$or=$_POST['or'];
$query=mysqli_query($con, "select * from tblornumber where tblOrFlag=1");
if($query->num_rows == 0)
{
	$query1=mysqli_query($con, "insert into tblornumber(tblOrNum) values ('$or')");

}else if($query->num_rows >= 1)
{
	$query1=mysqli_query($con, "update tblornumber set tblOrNum='$or' where tblOrFlag=1");
}
    header('location:ornumber.php');
?>