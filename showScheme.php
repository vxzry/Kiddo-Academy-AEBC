<?php
include "db_connect.php";
$scheme=$_GET['txtFeeId2'];
echo '<tr><th>Scheme Id</th><th>Scheme Name</th></tr>';
$query=mysqli_query($con, "select * from tblscheme where tblScheme_tblFeeId='$scheme' and tblSchemeFlag=1");
while($row=mysqli_fetch_array($query))
{
echo '<tr><td>'.$row["tblSchemeId"].'</td>';
echo '<td>'.$row["tblSchemeType"].'</td></tr>';
}
?>