<?php
include "db_connect.php";
$curr = $_POST['txtAddDetCurr'];
$div = $_POST['selAddDetDiv'];
$lvl = $_POST['selAddDetLvl'];
$subj = $_POST['selAddDetSubj'];

$query = "select * from tblcurriculumdetail order by tblCurriculumDetailId desc limit 0, 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$id = $row['tblCurriculumDetailId'];
$id ++;
$query = "insert into tblcurriculumdetail values ('$id','$curr','$div','$lvl','$subj',1)";
if (!$query = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}else{
    header('location:curriculum.php?message=2');
}
?>