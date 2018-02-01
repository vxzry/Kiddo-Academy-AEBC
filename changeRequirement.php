<?php
include "db_connect.php";
$feetype=$_GET['r3'];

// if ($feetype = 'NEW STUDENT') {
echo '<div class="fieldset" style="border: 1px solid #d3d3d3; margin-top: 5%" id="requirementfield">

    <fieldset style="margin-top: 3%; padding: 3%">
      <h3>REQUIREMENTS</h3>
      <hr>';
            $query="select * from tblrequirement where tblRequirementFlag=1 and tblReqType='ADMISSION' and (tblReqStudent = 'NEW' or tblReqStudent='NEW AND TRANSFEREE')";
            $result=mysqli_query($con, $query);
            while($row=mysqli_fetch_array($result))
            {
  echo '<div class="form-group">
          <label>
            <input type="checkbox" class="flat-red" name="chkReq[]" id="chkReq" value="'; echo $row['tblReqId']; echo '>';
            // <?php echo $row['tblReqName']; 
          echo '</label>
        </div>';
        } ?>
    </fieldset>

</div>;
<!-- } -->
?>