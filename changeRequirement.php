<?php
include "db_connect.php";
$feetype=$_GET['r3'];

echo '<div class="fieldset" style="border: 2px solid gray; margin-top: 5%" id="requirementfield">

    <fieldset style="margin-top: 2%; margin-left: 2%">
      <h3>REQUIREMENTS</h3>';
            $query="select * from tblrequirement where tblRequirementFlag=1 and tblReqType='ADMISSION' and tblReqStudent = 'NEW' or 'NEW AND TRANSFEREE'";
            $result=mysqli_query($con, $query);
            while($row=mysqli_fetch_array($result))
            {
  echo '<div class="form-group">
          <label>
            <input type="checkbox" class="flat-red" name="chkReq[]" id="chkReq" value="'; echo $row['tblReqId']; echo ">';
            < echo $row['tblReqName']; echo >
          </label>
        </div>
        <?php } ?>
    </fieldset>

</div> <!-- fieldset -->'
?>
