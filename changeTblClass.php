<?php
include "db_connect.php";
$lvl=$_GET['selLevel'];
$sysy=$_GET['selSy'];
$fac=$_GET['selFac'];
echo '<thead><tr>  <th>Section ID</th>  <th>Section Name</th>  <th>Generate</th></tr></thead><tbody>';
if($lvl!=0 && $fac!=0)
{
$query=mysqli_query($con, "select * from tblsection where tblSectionFlag=1 and tblSection_tblLevelId='$lvl' and tblSection_tblFacultyId='$fac'");
while($row=mysqli_fetch_array($query))
{
	echo '<tr><td>'.$row['tblSectionId'].'</td><td>'.$row['tblSectionName'].'</td>
		<td><form method="post" action="reportclasslist.php"><input type="text" name="txtSy" id="txtSy" value="'.$sysy.'"/><input type="hidden" name="txtsect" id="txtsect" value="'.$row["tblSectionId"].'"/><button type="submit" class="btn btn-success"> Generate Report </button></form></td>
                </tr>';
}
}
if($lvl==0)
{
	$query=mysqli_query($con, "select * from tblsection where tblSectionFlag=1 and tblSection_tblFacultyId='$fac'");
	while($row=mysqli_fetch_array($query))
	{
		echo '<tr><td>'.$row['tblSectionId'].'</td><td>'.$row['tblSectionName'].'</td>
			<td><form method="post" action="reportclasslist.php"><input type="text" name="txtSy" id="txtSy" value="'.$sysy.'"/><input type="hidden" name="txtsect" id="txtsect" value="'.$row["tblSectionId"].'"/><button type="submit" class="btn btn-success"> Generate Report </button></form></td>
	                </tr>';
	}
}if($fac==0)
{
	$query=mysqli_query($con, "select * from tblsection where tblSectionFlag=1 and tblSection_tblLevelId='$lvl'");
	while($row=mysqli_fetch_array($query))
	{
		echo '<tr><td>'.$row['tblSectionId'].'</td><td>'.$row['tblSectionName'].'</td>
			<td><form method="post" action="reportclasslist.php"><input type="text" name="txtSy" id="txtSy" value="'.$sysy.'"/><input type="hidden" name="txtsect" id="txtsect" value="'.$row["tblSectionId"].'"/><button type="submit" class="btn btn-success"> Generate Report </button></form></td>
	                </tr>';
	}
}
echo '</body>';
?>