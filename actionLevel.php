<?php
include "db_connect.php";

if(isset($_POST['btnAddLvl']))
{
	$lvlname=$_POST['txtAddLvl'];
	$seldiv=$_POST['selAddLvlDiv'];
	echo $lvlname."	".$seldiv;
}else if(isset($_POST['btnUpdLvl']))
{
	$lvlid=$_POST['txtUpdLvlId'];
	$lvlnameupd=$_POST['txtUpdLvl'];
	$divname=$_POST['selUpdLvlDiv'];
	echo $lvlid."	".$lvlnameupd."	".$divname;
}else if(isset($_POST['btnDelLvl']))
{
	$subjid=$_POST['txtDelSubjId'];
	$lvliddel=$_POST['txtDelLvlId'];
	echo $subjid."	".$lvliddel;
}
?>