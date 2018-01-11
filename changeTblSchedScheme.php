<?php
include "db_connect.php";
$scheme = $_GET['selSchedScheme'];
if($scheme!="")
{
	echo '<thead>
    <tr>
    <th hidden>Id</td>
    <th>Payment Order</th>
    <th>Due Date</th>
    <th>Amount on Due Date</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>';
    $query = "select * from tblschemedetail sd, tblscheme s, tblfee f where sd.tblSchedDetailCtr=1 and sd.tblSchemeDetail_tblScheme='$scheme' and sd.tblSchemeDetail_tblScheme=s.tblSchemeId and s.tblScheme_tblFeeId=f.tblFeeId";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result))
    {
    echo '<tr>
    <td hidden>'; echo $row['tblSchemeDetailId']; echo '</td>
    <td>'; echo $row['tblSchemeDetailName']; echo '</td>
    <td>'; echo $row['tblSchemeDetailDueDate']; echo '</td>
    <td>'; echo $row['tblSchemeDetailAmount']; echo '</td>
    <td>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalThree"><i class="fa fa-edit"></i></button>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalThree"><i class="fa fa-reset"></i></button>
    </td>
    </tr>';
	}
    echo '</tbody>';
}
?>