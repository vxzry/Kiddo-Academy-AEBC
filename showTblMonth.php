<?php
include "db_connect.php";
$sy = $_GET['getSySelect'];
if($sy!="")
{
	echo'<thead>
         <tr>
         <th hidden></th>
         <th>Month</th>
         <th>No. of Days</th>
         <th>Action</th>
         </tr>
         </thead>
         <tbody>';
     $query = "select * from tblnumberclass where tblNumClass_tblSy = '$sy' and tblNumCLassFlag=1";
     $result = mysqli_query($con, $query);
     while($row = mysqli_fetch_array($result))
     {
     echo '<tr><td hidden>'; echo $row['tblNumClassid']; echo '</td>
     <td>'; echo $row['tblNumClassMonth']; echo '</td>
     <td>'; echo $row['tblNumClassDay']; echo '</td>
     <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalTwo"><i class="fa fa-edit"></i></button>
         <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#resetModalTwo"><i class="fa fa-trash"></i></button></td>
     </tr>';
 	}
     echo '</tbody>';
}
?>