<?php
include "db_connect.php";
$lvl = $_GET['selLevel'];
?>
<thead>
<tr>
<th>Subject Code</th>
<th>Subject Description</th>
</tr>
</thead>
<tbody>
<?php
$query="select l.tblLevelId, l.tblLevelName, s.tblSubjectId, s.tblSubjectId, s.tblSubjectDesc from tbllevel l, tblcurriculumdetail c, tblsubject s where l.tblLevelId='$lvl' and l.tblLevelId=c.tblCurriculumDetail_tblLevelId and s.tblSubjectId=c.tblCurriculumDetail_tblSubjectId and l.tblLevelFlag=1 and s.tblSubjectFlag=1 and c.tblDetailsFlag=1 group by s.tblSubjectId";
$result=mysqli_query($con, $query);
while($row=mysqli_fetch_array($result)):
?>
<tr>
<td><?php echo $row['tblSubjectId'] ?></td>
<td><?php echo $row['tblSubjectDesc'] ?></td>
</tr>
<?php endwhile; ?>
</tbody>