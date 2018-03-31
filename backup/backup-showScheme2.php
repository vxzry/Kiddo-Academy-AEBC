<?php
include "db_connect.php";
$feeid=$_GET['optionalfees'];
$lvlid=$_GET['level'];
$query=mysqli_query($con, "select * from tblfee where tblFeeId='$feeid' and tblFeeFlag=1");
$row=mysqli_fetch_array($query);
$fee=$row['tblFeeName'];
$query="select * from tblscheme where tblScheme_tblFeeId='$feeid' and tblSchemeFlag=1";
$result=$con->query($query);
if($result->num_rows >= 1)
{
echo '<div><label>'.$fee.'</label>';
echo '<select class="form-control" style="width:30%" name="selSchemeOpt[]" id="selSchemeOpt"><option disabled selected>--Select Scheme--</option>';
$query1=mysqli_query($con, "select * from tblscheme where tblScheme_tblFeeId='$feeid' and tblSchemeFlag=1");
while($row=mysqli_fetch_array($result))
{
	$schemeid=$row['tblSchemeId'];
	echo '<option value="'.$row["tblSchemeId"].'" >'.$row["tblSchemeType"].'</option>';
}
echo '</select></div>';
}
?>
<div style="margin-top: 5%; margin-bottom: 5%">
 <table class="table table-bordered table-striped">
 <thead>
   <tr>
     <th>Level</th>
     <th>Order of Payment</th>
     <th>Due Date</th>
     <th>Amount</th>
   </tr>
   </thead>
   <tbody>
   <?php
     $query3=mysqli_query($con, "select * from tblschemedetail where tblSchemeDetail_tblScheme='$schemeid' and tblSchemeDetailFlag=1 and tblSchemeDetail_tblLevel='$lvlid'");
     while($row3=mysqli_fetch_array($query3)):
       $query4=mysqli_query($con, "select * from tbllevel where tblLevelId='$lvlid' and tblLevelFlag=1");
       $row4=mysqli_fetch_array($query4);
       $lvlname=$row4['tblLevelName'];
   ?>
     <tr>
       <td><?php echo $lvlname ?></td>
       <td><?php echo $row3['tblSchemeDetailName'] ?></td>
       <td><?php echo $row3['tblSchemeDetailDueDate'] ?></td>
       <td><?php echo $row3['tblSchemeDetailAmount'] ?></td>
     </tr>
   <?php endwhile; ?>
   </tbody>
  </table>
</div>