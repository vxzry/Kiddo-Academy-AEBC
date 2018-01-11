<?php
include "db_connect.php";
$currName = $_GET['selCurrName'];
if($currName!="")
{
	echo '<thead>
    <tr>
    <th hidden>Curriculum Id</th>
    <th hidden>Detail Id</th>
    <th hidden>Division Id</th>
    <th hidden>Level Id</th>
    <th>Division</th>
    <th>Level</th>
    <th>Subject Code</th>
    <th>Subject Name</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>';
    $query = "select c.tblCurriculumId, cd.tblCurriculumDetailId, d.tblDivisionName, d.tblDivisionId, l.tblLevelId, l.tblLevelName, s.tblSubjectId, s.tblSubjectDesc from tblcurriculum c,tblcurriculumdetail cd, tbldivision d, tbllevel l, tblsubject s where cd.tblCurriculumDetail_tblCurriculumId = c.tblCurriculumId and cd.tblCurriculumDetail_tblDivisionId = d.tblDivisionId and cd.tblCurriculumDetail_tblLevelId = l.tblLevelId and cd.tblCurriculumDetail_tblSubjectId = s.tblSubjectId and c.tblCurriculumId = '$currName'";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result))
    {
    echo '<tr>
      <td hidden>'; echo $row['tblCurriculumId']; echo '</td>
      <td hidden>'; echo $row['tblCurriculumDetailId']; echo '</td>
      <td hidden>'; echo $row['tblDivisionId']; echo '</td>
      <td hidden>'; echo $row['tblLevelId']; echo '</td>
      <td>'; echo $row['tblDivisionName']; echo '</td>
      <td>'; echo $row['tblLevelName']; echo '</td>
      <td>'; echo $row['tblSubjectId']; echo '</td>
      <td>'; echo $row['tblSubjectDesc']; echo '</td>
      <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalTwo"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalTwo"><i class="fa fa-trash"></i></button></td>
    </tr>
    </tbody>';
	}
}else{
	echo "no data";
}
?>