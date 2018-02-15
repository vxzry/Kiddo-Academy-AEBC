<?php
include "db_connect.php";
$lvl=$_POST['txtLevel'];
$type=$_POST['txtFeeType'];
$feeid=$_POST['txtFeeId']
echo $type.'	'.$feeid.'<br/>';
if($type=='PER LEVEL')
{
foreach($lvl as $x)
{
	echo $x;
}
}
?>