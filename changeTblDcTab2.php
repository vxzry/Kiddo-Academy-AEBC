<?php
include "db_connect.php";
$sect=$_GET['selSect'];
echo '<thead>
                      <tr>
                        <th>Student Id</th>
                        <th>Student Name</th>
                        <th>Action</th>
                      </tr>
                    </thead><tbody>';
$query=mysqli_query($con, "select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as studentname from tblstudent s, tblstudentinfo si, tblsectionstud ss where si.tblStudInfo_tblStudentId=s.tblStudentId and ss.tblSectStud_tblStudentId=s.tblStudentId and ss.tblSectStud_tblSectionId='$sect'");
while($row=mysqli_fetch_array($query))
{
	echo '<tr><td>'.$row['tblStudentId'].'</td><td>'.$row['studentname'].'</td><td><form action="reportor.php" method="post"><input type="text" name="txtstud" id="txtstud" value="'.$row["tblStudentId"].'"/><button type="submit" class="btn btn-success">Generate Report</button></form></td></tr>';
}
echo '</tbody>';	
?>