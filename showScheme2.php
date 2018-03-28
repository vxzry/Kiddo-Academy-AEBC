<?php
include "db_connect.php";
$schemeid=$_GET['scheme'];
$lvlid=$_GET['level'];
?>
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