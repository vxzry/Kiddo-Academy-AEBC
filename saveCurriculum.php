<?php
include "db_connect.php";
$currName = strtoupper($_POST['txtAddCurr']);
$active = $_POST['selAddActive'];

$query = "select * from tblcurriculum order by tblCurriculumId desc limit 0, 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$id = $row['tblCurriculumId'];
$id ++;
$query = "insert into tblcurriculum(tblCurriculumId, tblCurriculumName, tblCurriculumFlag, tblCurriculumActive) values ('$id','$currName',1,'$active')";
if (!$query = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}else{
    header('location:curriculum.php?message=2');
}
?>