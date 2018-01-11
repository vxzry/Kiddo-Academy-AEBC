<?php
include "db_connect.php";
$sect = $_GET['selSect'];
if($sect!="")
{
    $query = "select sb.tblSubjectId, sc.tblSched_tblSectionId, sc.tblSchedDay, sb.tblSubjectDesc, sc.tblSchedStartOfSubj, sc.tblSchedEndOfSubj from tblsubject sb, tblsched sc where sc.tblSched_tblSectionId = '$sect' and sc.tblSched_tblSubjectId = sb.tblSubjectId and tblSchedFlag = 1 and sc.tblSchedDay = 'FRIDAY'";
    $result = mysqli_query($con, $query);
    
    echo '<thead>
    <tr>
    <th hidden>Day</th>
    <th hidden>Section Id</th>
    <th>Subject Code</th>
    <th>Subject Name</th>
    <th>Start of Time</th>
    <th>End of Time</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>';
    while($row = mysqli_fetch_array($result))
    {
    $start=$row['tblSchedStartOfSubj'];
    $end=$row['tblSchedEndOfSubj'];
    $hr=substr($start, 0, 2);
    $min=substr($start, 3, 2);
    $hr2=substr($end, 0, 2);
    $min2=substr($end, 3, 2);
    if($hr >= 12)
    {
        if($hr!=12)
        {
            $hr-=12;
        }
        $hr=$hr.":".$min." PM";
    }else if($hr < 12 && $hr != 0)
    {
        $hr=$hr.":".$min." AM";
    }else if($hr == 00 && $start!=null)
    {
        $hr=$hr.":".$min." AM";
    }
    if($hr2 >= 12)
    {
        if($hr2!=12)
        {
            $hr2-=12;
        }
        $hr2=$hr2.":".$min2." PM";
    }else if($hr2 < 12 && $hr2 != 0)
    {
        $hr2=$hr2.":".$min2." AM";
    }else if($hr2 == 00 && $end!=null)
    {
        $hr2=$hr2.":".$min2." AM";
    }
    echo '<tr>
    <td hidden>'; echo $row['tblSchedDay']; echo '</td>
    <td hidden>'; echo $row['tblSched_tblSectionId']; echo '</td>
    <td>'; echo $row['tblSubjectId']; echo '</td>
    <td>'; echo $row['tblSubjectDesc']; echo'</td>
    <td>'; echo $hr; echo '</td>
    <td>'; echo $hr2; echo '</td>
    <td>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalEditFri"><i class="fa fa-edit"></i></button>
    </td>
    </tr>';
    }
    echo '</tbody>';
}
?>