<?php include "db_connect.php" ?>

<!DOCTYPE html>
<html>
<head>
<h1>MATRIX!!!!!!!!!!!!</h1>
</head>
<body>
<form action="updateAccess.php" method="post">
<table>
<tr>
<th>Role</th>
<th>1</th>
<th>2</th>
</tr>
<?php
$query="select * from tblrole where tblRoleFlag=1";
$result=mysqli_query($con, $query);
while($row=mysqli_fetch_array($result)):
	$roleid=$row['tblRoleId'];
	$rolename=$row['tblRoleName'];
?>
<tr>
<td><input type="text" name="txtRole[]" id="txtRole" value="<?php echo $roleid ?>"><?php echo $rolename ?></td>
<?php
$query1="select * from tblmodule where tblModuleFlag=1 group by tblModuleType, tblModuleOrder";
$result1=mysqli_query($con, $query1);
while($row1=mysqli_fetch_array($result1)):
?>
<td><input type="checkbox" name="chkModule[]" id="chkModule" value="<?php echo $row1['tblModuleId'] ?>"/><?php echo $row1['tblModuleName'] ?></td>
<?php endwhile ?>
</tr>
<?php endwhile ?>
</table>
<button type="submit">WORK YOU FUCKER</button>
</form>
</body>
</html>