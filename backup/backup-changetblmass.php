<?php
include "db_connect.php";
$feetype=$_GET['chkPSchedStat'];
echo '<thead>
      <tr>
      <th hidden>SchemeDetailId</th>
      <th>Fee Code</th>
      <th>Fee Name</th>
      <th>Scheme Type</th>
      <th>Scheme Payment Order</th>
      <th>Due Date</th>
      <th>Amount on Due Date</th>
      <th>Action</th>
      </tr>
      </thead>
      <tbody>';
 $query="select distinct(s.tblSchemeType), f.tblFeeCode, sd.tblSchemeDetailId, f.tblFeeName, s.tblSchemeType, sd.tblSchemeDetailName, sd.tblSchemeDetailDueDate, sd.tblSchemeDetailAmount from tblfee f, tblscheme s, tblschemedetail sd where s.tblScheme_tblFeeId=f.tblFeeId and sd.tblSchemeDetail_tblScheme=s.tblSchemeId and f.tblFeeFlag=1 and f.tblFeeType='$feetype' group by s.tblSchemeType, sd.tblSchemeDetailName";
 $result=mysqli_query($con, $query);
 while($row=mysqli_fetch_array($result)){
  $due=$row['tblSchemeDetailDueDate'];
  if($due=='0000-00-00')
  {
    $due="";
  }
echo '<tr>
<td hidden>'; echo $row['tblSchemeDetailId']; echo '</td>
<td>'; echo $row['tblFeeCode']; echo '</td>
<td>'; echo $row['tblFeeName']; echo '</td>
<td>'; echo $row['tblSchemeType']; echo '</td>
<td>'; echo $row['tblSchemeDetailName']; echo '</td>
<td>'; echo $due; echo '</td>
<td>'; echo $row['tblSchemeDetailAmount']; echo '</td>
<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#mdlUpdateSched"><i class="fa fa-edit"></i></button>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalThree"><i class="fa fa-undo"></i></button></td>
</tr>'; } echo '
</tbody>';
?>