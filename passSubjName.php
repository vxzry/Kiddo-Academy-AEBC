<?php
include "db_connect.php";
$id = $_GET['selAddDetSubj'];
$query = "select * from tblsubject where tblSubjectId='$id' and tblSubjectFlag=1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
echo $row['tblSubjectDesc'];
?>