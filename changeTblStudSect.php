<?php
include "db_connect.php";
$sect=$_GET['selSection'];
$query="select * from tblschoolyear where tblSchoolYrActive='ACTIVE' and tblSchoolYearFlag=1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$syid=$row['tblSchoolYrId'];
?>
<thead>
<tr>
<th>Student ID</th>
<th>Student Name</th>
</tr>
</thead>
<tbody>
<?php
$query="select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name from tblstudent s, tblstudentinfo si, tblsectionstud ss where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentId=ss.tblSectStud_tblStudentId and ss.tblSectStud_tblSectionId='$sect' and ss.tblSectStud_tblSchoolYrId='$syid' and s.tblStudentFlag=1 and ss.tblSectStudFlag=1";
$result=mysqli_query($con, $query);
while($row=mysqli_fetch_array($result)):
?>
<tr>
<td><?php echo $row['tblStudentId'];?></td>
<td><?php echo $row['name']?></td>
</tr>
<?php endwhile; ?>
</tbody>