<?php
include "db_connect.php";
$arrSubj=array();
$query="select * from tblschoolyear where tblSchoolYearFlag=1 and tblSchoolYrActive='ACTIVE'";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$syid=$row['tblSchoolYrId'];
$gpid=$_GET['selGP'];
$sectid=$_GET['sect'];
$query4="select * from tblgradingperiod where tblGrading_tblSchoolYrId='$syid' and tblGradingFlag=1";
$result4=mysqli_query($con, $query4);
while($row4=mysqli_fetch_array($result4)):
$gradingid=$row4['tblGradingId'];
$gradingperiod=$row4['tblGradingPeriod'];
$datestart=$row4['tblGradingStartDate'];
$dateend=$row4['tblGradingEndDate'];
$datenow=date('Y-m-d');
$start_ts = strtotime($datestart);
$end_ts = strtotime($dateend);
$now_ts = strtotime($datenow);
if(($now_ts >= $start_ts) && ($now_ts <= $end_ts))
{
$active=$gradingid;
$gp=$gradingperiod;
}
endwhile;
echo
'<thead>
<tr>
<th hidden>grading id</th>
<th>Student Id</th>
<th>Student Name</th>';
$count=0;
$query="select * from tbllevel join tblsection on tblsection.tblSection_tblLevelId=tbllevel.tblLevelId join tblcurriculumdetail on tblcurriculumdetail.tblCurriculumDetail_tblLevelId=tbllevel.tblLevelId join tblsubject on tblsubject.tblSubjectId=tblcurriculumdetail.tblCurriculumDetail_tblSubjectId where tblsubject.tblSubjectFlag=1 and tblsection.tblSectionId='$sectid' group by tblsubject.tblSubjectId";
$result=mysqli_query($con, $query);
while($row=mysqli_fetch_array($result)){
$count++;
$subjid=$row['tblSubjectId'];
array_push($arrSubj, $subjid);
echo '<th>'.$row['tblSubjectDesc'].'</th>';
}
echo '<th>General Average</th>
<th>Status</th>';
echo '</tr></thead><tbody>';
$a=0;
$query="select tblstudent.tblStudentId, concat(tblstudentinfo.tblStudInfoLname, ', ', tblstudentinfo.tblStudInfoFname, ' ', tblstudentinfo.tblStudInfoMname) as name from tblsectionstud join tblstudent on tblstudent.tblStudentId=tblsectionstud.tblSectStud_tblStudentId join tblstudentinfo on tblstudentinfo.tblStudInfo_tblStudentId=tblstudent.tblStudentId join tblsection on tblsection.tblSectionId=tblsectionstud.tblSectStud_tblSectionId join tblschoolyear on tblschoolyear.tblSchoolYrId=tblsectionstud.tblSectStud_tblSchoolYrId where tblsection.tblSectionId='$sectid' and tblschoolyear.tblSchoolYrActive='ACTIVE'";
$result=mysqli_query($con, $query);
while($row=mysqli_fetch_array($result)){
$x=0;
$studid=$row['tblStudentId'];
echo '<tr>
<input type="hidden" name="txtSectId" value="'.$sectid.'"/>
<td hidden><input type="hidden" name="txtGpId" id="txtGpId" value="'.$gp.'" /></td>
<td><input type="hidden" name="txtStudId[]" value="'.$row['tblStudentId'].'"/>'.$row['tblStudentId'].'</td><td>'.$row['name'].'</td>';
while($x<$count)
{
$subject=$arrSubj[$x];
$query2="select * from tblgrade where tblGrade_tblStudentId='$studid' and tblGrade_tblSubjectId='$subject' and tblGrade_tblGradingId='$gpid'";
$result2=mysqli_query($con, $query2);
$row2=mysqli_fetch_array($result2);
if($row2['tblGradeGrade'] > 0)
{
$grade=$row2['tblGradeGrade'];
}else if($row2['tblGradeGrade'] == 0)
{
$grade = null;
}
echo '<td> <input type="text" name="txtGrade[]" id="txtGrade" value="'.$grade.'"/></td>';
$x++;
$a++;
}
$query3="select * from tblgradeave where tblGenAve_tblStudentId='$studid' and tblGenAve_tblGradingId='$gpid' and tblGenAve_tblSchoolYrId='$syid' and tblGenAveFlag=1";
$result3=mysqli_query($con, $query3);
$row3=mysqli_fetch_array($result3);
$genaverage=$row3['tblGenAverage'];
if($genaverage==0)
{
$genaverage=null;
$genavestatus=null;
}else if($genaverage>=1)
{
$genaverage=$row3['tblGenAverage'];
$genavestatus=$row3['tblGenAveStatus'];
}
echo '<td>'.$genaverage.'</td>
<td>'.$genavestatus.'</td>';
echo '</tr>';
}
echo '</tbody>';
?>