<?php
include "db_connect.php";
$grade=$_POST['txtGrade1'];
foreach($grade as $a)
{
	echo $a."< br/>";
}
?>

<?php
                        $query4="select * from tblgradingperiod where tblGrading_tblSchoolYrId='$syid' and tblGradingFlag=1";
                        $result4=mysqli_query($con, $query4);
                        while($row4=mysqli_fetch_array($result4)):
                          $active="INACTIVE";
                          $gradingid=$row4['tblGradingId'];
                          $gradingperiod=$row4['tblGradingPeriod'];
                          $datestart=$row4['tblGradingStartDate'];
                          $dateend=$row4['tblGradingEndDate'];
                          $datenow=date('Y-m-d');

                          $start_ts = strtotime($datestart);
                          $end_ts = strtotime($dateend);
                          $now_ts = strtotime($datenow);

                          if(($now_ts >= $start_ts) && ($now_ts <= $end_ts))
                          {
                            $active='ACTIVE';
                          }
                          
                        ?>
                              <?php
                          if($active=='INACTIVE')
                          {
                            echo '<script>disableGrading();</script>';
                          }else if($active=='ACTIVE')
                          {
                            echo '<script>enableGrading();</script>';
                          }
                                ?>
                                                <?php endwhile; ?>