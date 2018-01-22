<?php
include "db_connect.php";
$lvlId = $_GET['selFeeLvl'];
if($lvlId!="")
{
	echo '<thead>
    <tr>
    <th hidden>Fee Id</th>
    <th hidden>Level Id</th>
    <th>Fee Code</th>
    <th>Fee Name</th>
    <th>Fee Type</th>
    <th>Fee Status</th>
    <th>Fee Amount</th>
    </tr>
    </thead>
    <tbody>';
    $query = "select f.tblFeeId, f.tblFeeCode, f.tblFeeType, f.tblFeeMandatory, f.tblFeeName, fa.tblFeeAmountAmount, fa.tblFeeAmount_tblLevelId from tblfee f, tblfeeamount fa where fa.tblFeeAmount_tblLevelId = '$lvlId' and f.tblFeeFlag = 1 and fa.tblFeeAmount_tblFeeId=f.tblFeeId";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result))
    {
    $type=$row['tblFeeType'];
    $stat=$row['tblFeeMandatory'];
    if($stat=='Y')
    {
        $stat1='Mandatory';
    }else if($stat=='N')
    {
        $stat1='Optional';
    }
    echo '<tr>
    <td hidden>'; echo $row['tblFeeId']; echo '</td>
    <td hidden>'; echo $row['tblFeeAmount_tblLevelId']; echo '</td>
    <td>'; echo $row['tblFeeCode']; echo '</td>
    <td>'; echo $row['tblFeeName']; echo '</td>
    <td>'; echo $row['tblFeeType']; echo '</td>
    <td>'; echo $stat1; echo '</td>
    <td>'; echo $row['tblFeeAmountAmount']; echo'</td>
    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalOne"><i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mdlFeeDetails">Fee Details</i></button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalOne"><i class="fa fa-trash"></i></button></td>
    </tr>
    </tbody>';
	}
}
?>