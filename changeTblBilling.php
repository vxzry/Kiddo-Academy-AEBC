<?php
include "db_connect.php";
$lvl=$_GET['selLevel'];
echo '<thead>
<tr>
<th>Student ID</th>
<th>Student Name</th>
<th>Action</th>
</tr>
</thead>
<tbody>';

  $query="select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as studentname from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentType='OFFICIAL' and s.tblStudentFlag=1 and s.tblStudent_tblLevelId='$lvl'";
  $result=mysqli_query($con, $query);
  while($row=mysqli_fetch_array($result)):
?>
<tr>
<td><?php echo $row['tblStudentId'] ?></td>
<td><?php echo $row['studentname'] ?></td>
<td>
<form action="BILLINGMAIN.php" method="post">
<input type="hidden" value="<?php echo $row['tblStudentId'] ?>" name="txtStudId" id="txtStudId"/>
<button type="submit" class="btn btn-success" name="btnStud" id="btnStud"><i class="fa fa-edit"></i>Proceed to Billing</button></form></td>
</tr><?php endwhile; ?> </tbody>