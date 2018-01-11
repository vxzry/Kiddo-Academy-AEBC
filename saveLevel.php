<?php
include "db_connect.php";

$lvlName = strtoupper($_POST['txtAddLvl']);
$divId = $_POST['selAddLvlDiv'];

$query = "select * from tbllevel order by tblLevelId desc limit 0, 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$id = $row['tblLevelId'];
$id ++;
$query = "insert into tbllevel(tblLevelId, tblLevelName, tblLevel_tblDivisionId, tblLevelFlag) value ('$id', '$lvlName', '$divId', 1)";
if (!$query = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}else{
    header('location:curriculum.php?message=2');
}
?>