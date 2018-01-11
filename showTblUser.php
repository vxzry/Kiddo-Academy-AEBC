<?php
include "db_connect.php";
$type=$_GET['selType'];
if($type=='FACULTY')
{
?>
<thead>
<tr>
<th hidden></th>
<th>Id</th>
<th>Name</th>
<th hidden></th>
<th>Role</th>
<th>Password</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$query="select tblFacultyId, concat(tblFacultyLname, ', ', tblFacultyFname, ' ', tblFacultyMname) as facultyname from tblfaculty where tblFacultyFlag=1";
$result=mysqli_query($con, $query);
while($row=mysqli_fetch_array($result)):
	$facultyid=$row['tblFacultyId'];
?>
<tr>
<td hidden><?php echo 1 ?></td>
<td><?php echo $row['tblFacultyId'] ?></td>
<td><?php echo $row['facultyname'] ?></td>
<?php
$query1="select u.tblUserName, u.tblUserPassword, r.tblRoleName, r.tblRoleId from tbluser u, tblrole r, tblfaculty f where u.tblUserName='$facultyid' and f.tblFaculty_tblUserId=u.tblUserId and u.tblUser_tblRoleId=r.tblRoleId and u.tblUserFlag=1 and r.tblRoleFlag=1";
$result1=mysqli_query($con, $query1);
$row1=mysqli_fetch_array($result1);
?>
<td hidden><?php echo $row1['tblRoleId'] ?></td>
<td><?php echo $row1['tblRoleName'] ?></td>
<td><?php echo $row1['tblUserPassword'] ?></td>
<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#mdlUser"><i class="fa fa-edit"></i></button></td>
</tr>
<?php endwhile; ?>
<?php 
}else if($type=='PARENT')
{
?>
<thead>
<tr>
<th hidden></th>
<th>Id</th>
<th>Name</th>
<th hidden></th>
<th>Role</th>
<th>Password</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$query="select tblParentId, concat(tblParentLname, ', ', tblParentFname, ' ', tblParentMname) as parentname from tblparent where tblParentFlag=1";
$result=mysqli_query($con, $query);
while($row=mysqli_fetch_array($result)):
	$parentid=$row['tblParentId'];
?>
<tr>
<td hidden><?php echo 2 ?></td>
<td><?php echo $row['tblParentId'] ?></td>
<td><?php echo $row['parentname'] ?></td>
<?php
$query1="select u.tblUserName, u.tblUserPassword, r.tblRoleName, r.tblRoleId from tbluser u, tblrole r, tblparent p where u.tblUserName='$parentid' and p.tblParent_tblUserId=u.tblUserId and u.tblUser_tblRoleId=r.tblRoleId and u.tblUserFlag=1 and r.tblRoleFlag=1";
$result1=mysqli_query($con, $query1);
$row1=mysqli_fetch_array($result1);
?>
<td hidden><?php echo $row1['tblRoleId'] ?></td>
<td><?php echo $row1['tblRoleName'] ?></td>
<td><?php echo $row1['tblUserPassword'] ?></td>
<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#mdlUser"><i class="fa fa-edit"></i></button></td>
</tr>
<?php endwhile; ?>
<?php
}
?>
</tbody>