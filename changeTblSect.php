<?php
include "db_connect.php";
$lvl = $_GET['selLevel'];
?>
<thead>
<tr>
<th>Section Name</th>
<th>Session</th>
<th>Number of Students</th>
<th>Faculty-in-Charge</th>
</tr>
</thead>
<tbody>
<?php
$query="select tblsection.tblSectionId, tblsection.tblSectionName, tbllevel.tblLevelName, tbldivision.tblDivisionName, tblsection.tblSectionSession, count(tblsectionstud.tblSectStud_tblSectionId) as sectCount, tblsection.tblSection_tblFacultyId, tblsection.tblSectionMaxCap from tblsection inner join tbllevel on tblsection.tblSection_tblLevelId=tbllevel.tblLevelId inner join tbldivision on tbllevel.tblLevel_tblDivisionId=tbldivision.tblDivisionId left join tblsectionstud on tblsection.tblSectionId=tblsectionstud.tblSectStud_tblSectionId where tbllevel.tblLevelId='$lvl' and tblsection.tblSectionFlag=1 group by tblsection.tblSectionId";
$result=mysqli_query($con, $query);
while($row=mysqli_fetch_array($result)):
	$facultyid=$row['tblSection_tblFacultyId'];
?>
<tr>
<td><?php echo $row['tblSectionName'] ?></td>
<td><?php echo $row['tblSectionSession'] ?></td>
<td><?php echo $row['sectCount'] ?></td>
<?php
$query1="select tblFacultyId, concat(tblFacultyLname, ', ', tblFacultyFname, ' ', tblFacultyMname) as facultyname from tblfaculty where tblFacultyId='$facultyid' and tblFacultyFlag=1";
$result1=mysqli_query($con, $query1);
$row1=mysqli_fetch_array($result1);
?>
<td><?php echo $row1['facultyname'] ?></td>
</tr>
<?php endwhile; ?>
</tbody>