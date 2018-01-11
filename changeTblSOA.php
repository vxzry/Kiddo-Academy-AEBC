<?php
include "db_connect.php";
$lvl=$_GET['selLevel'];
?>
<thead>
<tr>
<th>Student ID</th>
<th>Student Name</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$query="select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name, s.tblStudentType from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentFlag=1 and si.tblStudInfoFlag=1 and s.tblStudentType='OFFICIAL' and s.tblStudent_tblLevelId='$lvl'";
$result=mysqli_query($con, $query);
while($row=mysqli_fetch_array($result)):
?>
<tr>
<td><?php echo $row['tblStudentId'] ?></td>
<td><?php echo $row['name'] ?></td>
<td><form method="post" action="reportstatementofaccount.php"><input type="hidden" name="txtstudid" id="txtstudid" value="<?php echo $row['tblStudentId'] ?>"/><button type="submit" class="btn btn-success">Get Statement of Account</button></form></td>
</tr>
<?php endwhile; ?>
</tbody>