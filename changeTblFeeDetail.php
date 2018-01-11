<?php
include "db_connect.php";
$feeId = $_GET['selFee'];
if($feeId != "")
{
	echo '<thead>
    <tr>
    <th hidden>Level Id</th>
    <th>Level</th>
    <th>Detail Name</th>
    <th>Amount</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>';
    $query="select l.tblLevelId, l.tblLevelName,f.tblFeeDetailName, f.tblFeeDetailAmount from tblfeedetail f, tbllevel l where f.tblFeeDetail_tblFeeId = '$feeId' and f.tblFeeDetail_tblLevelId = l.tblLevelId and f.tblFeeDetailFlag = 1";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result))
    {
    echo '<tr>
    <td hidden>'; echo $row['tblLevelId']; echo '</td>
    <td>'; echo $row['tblLevelName']; echo '</td>
    <td>'; echo $row['tblFeeDetailName']; echo '</td>
    <td>'; echo $row['tblFeeDetailAmount']; echo'</td>
    <td>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalFive"><i class="fa fa-edit"></i></button>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalFive"><i class="fa fa-trash"></i></button>
    </td>
    </tr>';
	}
    echo '</tbody>';
}
?>