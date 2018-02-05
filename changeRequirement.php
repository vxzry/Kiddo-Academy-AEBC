<?php
include "db_connect.php";
$reqtype=$_GET['r3'];
if ($reqtype == 'NEW STUDENT') 
{
echo '<fieldset style="margin-top: 3%; padding: 3%">
      <h3>REQUIREMENTS</h3>
      <hr>';
            $query="select * from tblrequirement where tblRequirementFlag=1 and tblReqType='ADMISSION' and (tblReqStudent = 'NEW' or tblReqStudent='NEW AND TRANSFEREE')";
            $result=mysqli_query($con, $query);
            while($row=mysqli_fetch_array($result))
            {
  echo '<div class="form-group">
          <label>
            <input type="checkbox" class="flat-red" name="chkReq[]" id="chkReq" value="'; echo $row['tblReqId']; echo '"/>'; echo $row['tblReqName']; 
          echo '</label>
        </div>';
        } ?>
    </fieldset>
<?php }else if($reqtype=='TRANSFEREE')
{
	echo '<fieldset style="margin-top: 3%; padding: 3%">
      <h3>REQUIREMENTS</h3>
      <hr>';
            $query="select * from tblrequirement where tblRequirementFlag=1 and tblReqType='ADMISSION' and (tblReqStudent = 'TRANSFEREE' or tblReqStudent='NEW AND TRANSFEREE')";
            $result=mysqli_query($con, $query);
            while($row=mysqli_fetch_array($result))
            {
  echo '<div class="form-group">
          <label>
            <input type="checkbox" class="flat-red" name="chkReq[]" id="chkReq" value="'; echo $row['tblReqId']; echo '"/>'; echo $row['tblReqName']; 
          echo '</label>
        </div>';
        } ?>
    </fieldset>
<?php } ?>