<?php
include "db_connect.php";
$lvl=$_GET['selLevel'];

echo '<thead><tr><th>Student ID</th><th>Student Name</th><th>Action</th></tr></thead><tbody>';
$query=mysqli_query($con, "select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as studentname from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentType='OFFICIAL' and s.tblStudentFlag=1 and s.tblStudent_tblLevelId='$lvl'");
while($row=mysqli_fetch_array($query)):
echo '<tr><td>'.$row["tblStudentId"].'</td>';
echo '<td>'.$row["studentname"].'</td>';
echo '<td><form action="BILLINGMAIN.php" method="post">
      <input type="hidden" value="'.$row["tblStudentId"].'" name="txtStudId" id="txtStudId"/>
      <button type="submit" class="btn btn-success" name="btnStud" id="btnStud"><i class="fa fa-edit"></i>Proceed to Billing</button></form><form action="reportstatementofaccount.php" method="post" target="_blank"><input type="hidden" value="'.$row["tblStudentId"].'" name="studentid" id="studentid"/><button class="btn btn-info" type="submit">Get Statement of Account</button></form></td></tr>';
endwhile;
echo '</tbody>';
?>