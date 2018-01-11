<?php
include "db_connect.php";
$sy = $_GET['selGrading'];
echo '<thead>
 <tr>
<th hidden></th>
<th hidden></th>
<th>Grading Period</th>
<th>Date of Start</th>
<th>Date of End</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>';
$query="select * from tblgradingperiod where tblGrading_tblSchoolYrId = '$sy' and tblGradingFlag=1";
$result=mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{
echo '<tr><td hidden>'; echo $row['tblGradingId']; echo '</td>';
echo '<td hidden>'; echo $row['tblGrading_tblSchoolYrId']; echo '</td>';
echo '<td>'; echo $row['tblGradingPeriod']; echo '</td>';
echo '<td>'; echo $row['tblGradingStartDate']; echo '</td>';
echo '<td>'; echo $row['tblGradingEndDate']; echo '</td>
<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalTwo"><i class="fa fa-edit"></i></button></td>
</tr>
</tbody>';
}
?>