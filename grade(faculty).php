<?php 
include "db_connect.php";
$sectid=$_POST['txtSectId'];
include "session.php";
$arrSubj=array();
$query="select * from tblschoolyear where tblSchoolYearFlag=1 and tblSchoolYrActive='ACTIVE'";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$syid=$row['tblSchoolYrId'];
$x=substr($login_session,0,1);
   if($x=="P")
   {
    $query="select tblParentId, concat(tblParentLname, ', ', tblParentFname, ' ', tblParentMname) as names from tblparent where tblParent_tblUserId='$user_id' and tblParentFlag=1";
    $result=mysqli_query($con, $query);
    $row=mysqli_fetch_array($result);
    $id=$row['tblParentId'];
    $namess=$row['names'];
    $query1="select * from tbluser where tblUserId='$user_id' and tblUserFlag=1";
    $result1=mysqli_query($con, $query1);
    $row1=mysqli_fetch_array($result1);
    $roleid=$row1['tblUser_tblRoleId'];
   }else if($x=="F")
   {
    $query="select tblFacultyId, concat(tblFacultyLname, ', ', tblFacultyFname, ' ', tblFacultyMname) as names from tblfaculty where tblFaculty_tblUserId='$user_id' and tblFacultyFlag=1";
    $result=mysqli_query($con, $query);
    $row=mysqli_fetch_array($result);
    $id=$row['tblFacultyId'];
    $namess=$row['names'];
    $query1="select * from tbluser where tblUserId='$user_id' and tblUserFlag=1";
    $result1=mysqli_query($con, $query1);
    $row1=mysqli_fetch_array($result1);
    $roleid=$row1['tblUser_tblRoleId'];
   }
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kiddo Academy SIS</title>
    <link rel="icon" type="image/gif" href="images/School Logo/symbol.png"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="formwizard2.css">
    <script>
    function changeGrade()
    {
    var sect=document.getElementById("txtSection").value;
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","changeGrading.php?selGP="+document.getElementById("selGP").value+"&sect="+document.getElementById("txtSection").value,false); 
    xmlhttp.send(null);
    
    document.getElementById("datatable").innerHTML=xmlhttp.responseText;
    }
    </script>
  </head>

 <body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="dashboard.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><image src="images/School Logo/logo.ico" style="width: 50px; padding: 3px"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><image src="images/School Logo/logo.png" style="width: 200px; padding: 3px;"></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="images/Employees/admin.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $namess ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="images/Employees/admin.png" class="img-circle" alt="User Image">

                    <p>
                      <?php echo $namess ?>
                      <small><?php echo $rolename ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="images/Employees/admin.png" class="img-circle" alt="User Image">
            </div>

            <div class="pull-left info" style="margin-top: 3%">
              <p><?php echo $namess ?><i class="fa fa-circle text-success" style="margin-left: 5px"></i></p>
            </div>
          </div>
         
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" style="font-size:17px;">
            <li class="header" style="color: black; font-size: 17px; margin-top: 3%">Welcome!</li>
           <?php 
        $query="select * from tblrole where tblRoleFlag=1 and tblRoleId='$roleid'";
        $result=mysqli_query($con, $query);
        $row=mysqli_fetch_array($result);
          $rolename=$row['tblRoleName'];
          if($rolename=='ADMIN' || $rolename=='REGISTRAR')
          {
            $query1="select distinct(m.tblModuleType) from tblmodule m, tblrole r, tblrolemodule rm where r.tblRoleId='$roleid' and r.tblRoleId=rm.tblRoleModule_tblRoleId and m.tblModuleId=rm.tblRoleModule_tblModuleId and m.tblModuleFlag=1 group by m.tblModuleId";
            $result1=mysqli_query($con, $query1);
            while($row1=mysqli_fetch_array($result1))
            {
              $modulename=$row1['tblModuleType'];

        ?>

        <li class="treeview"> 
          <a href="#">
            <i class="fa fa-gears"></i> <span><?php echo $modulename ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <?php
              $query2="select * from tblrolemodule rm, tblmodule m where m.tblModuleId=rm.tblRoleModule_tblModuleId and rm.tblRoleModule_tblRoleId='$roleid' and m.tblModuleType='$modulename' and m.tblModuleFlag=1 group by m.tblModuleId";
              $result2=mysqli_query($con, $query2);
              while($row2=mysqli_fetch_array($result2)):
            ?>
            <li><a href="<?php echo $row2['tblModuleLinks'] ?>"><i class="fa fa-circle-o"></i><?php echo $row2['tblModuleName'] ?></a></li>
            <?php endwhile; ?>
          </ul>
        </li>
      <?php 
      }//while
      }else
      {
              $query="select * from tblrolemodule rm, tblmodule m where m.tblModuleId=rm.tblRoleModule_tblModuleId and rm.tblRoleModule_tblRoleId='$roleid'";
              $result=mysqli_query($con, $query);
              while($row=mysqli_fetch_array($result)):
      ?>
           <li class="treeview">
              <a href="<?php echo $row['tblModuleLinks'] ?>">
                <i class="fa fa-list"></i> <span><?php echo $row['tblModuleName'] ?></span>
              </a>
            </li>
      <?php
       endwhile; } 
      ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content" style="margin-top: 3%">
          <div class="row">
              <div class="col-md-12">
                <div class="box box-default">
                  <div class="box-header with-border"></div>
                    <div class="box-body">
                      <div class="box-header with-border">
                      <?php
                        $query="select * from tblsection where tblSectionId='$sectid'";
                        $result=mysqli_query($con, $query);
                        $row=mysqli_fetch_array($result);
                        $sectName=$row['tblSectionName'];
                        $sectId=$row['tblSectionId'];
                      ?>
                      <input type="hidden" name="txtSection" id="txtSection" value="<?php echo $sectId?>"/>
                        <h2 class="box-title" style="font-size:20px;"></h2>
                          <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                        </div>

                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">
                        <div class="box">
                        <div class="box-header">
                        </div>
                        <form method="post" action="saveGrades.php" id="form1">
                          <div class="box-body">
                          <select class="form-control" style="width: 300px;" name="selGP" id="selGP" onchange="changeGrade()">
                          <option selected disabled>--Select Grading Period--</option>
                          <?php
                            $query="select * from tblgradingperiod where tblGrading_tblSchoolYrId='$syid' and tblGradingFlag=1";
                            $result=mysqli_query($con, $query);
                            while($row=mysqli_fetch_array($result)):
                          ?>
                          <option value="<?php echo $row['tblGradingId'] ?>"><?php echo $row['tblGradingPeriod'] ?></option>
                        <?php endwhile; ?>
                          </select>
                          <?php
                          $query4="select * from tblgradingperiod where tblGrading_tblSchoolYrId='$syid' and tblGradingFlag=1";
                        $result4=mysqli_query($con, $query4);
                        while($row4=mysqli_fetch_array($result4)):
                          
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
                            $active=$gradingid;
                            $gp=$gradingperiod;
                          }
                          endwhile;
                          ?>
                        <h3><?php echo $gp ?></h3>
                            <table id="datatable" name="datatable" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th hidden>grading id</th>
                                  <th>Student Id</th>
                                  <th>Student Name</th>
                                  <?php
                                    $count=0;
                                    $query="select * from tbllevel join tblsection on tblsection.tblSection_tblLevelId=tbllevel.tblLevelId join tblcurriculumdetail on tblcurriculumdetail.tblCurriculumDetail_tblLevelId=tbllevel.tblLevelId join tblsubject on tblsubject.tblSubjectId=tblcurriculumdetail.tblCurriculumDetail_tblSubjectId where tblsubject.tblSubjectFlag=1 and tblsection.tblSectionId='$sectid' group by tblsubject.tblSubjectId";
                                    $result=mysqli_query($con, $query);
                                    while($row=mysqli_fetch_array($result)){
                                      $count++;
                                      $subjid=$row['tblSubjectId'];
                                      array_push($arrSubj, $subjid);
                                  ?>
                                  <th><?php echo $row['tblSubjectDesc'] ?></th>
                                <?php } ?>
                                <th>General Average</th>
                                <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php 
                                $a=0;
                                $query="select tblstudent.tblStudentId, concat(tblstudentinfo.tblStudInfoLname, ', ', tblstudentinfo.tblStudInfoFname, ' ', tblstudentinfo.tblStudInfoMname) as name from tblsectionstud join tblstudent on tblstudent.tblStudentId=tblsectionstud.tblSectStud_tblStudentId join tblstudentinfo on tblstudentinfo.tblStudInfo_tblStudentId=tblstudent.tblStudentId join tblsection on tblsection.tblSectionId=tblsectionstud.tblSectStud_tblSectionId join tblschoolyear on tblschoolyear.tblSchoolYrId=tblsectionstud.tblSectStud_tblSchoolYrId where tblsection.tblSectionId='$sectid' and tblschoolyear.tblSchoolYrActive='ACTIVE'";
                                $result=mysqli_query($con, $query);
                                while($row=mysqli_fetch_array($result)){
                                  $x=0;
                                  $studid=$row['tblStudentId'];
                                ?>
                                <tr>
                                  <input type="hidden" name="txtSectId" value="<?php echo $sectid ?>"/>
                                  <td hidden><input type="hidden" name="txtGpId" id="txtGpId" value="<?php echo $active ?>" /></td>
                                  <td><input type="hidden" name="txtStudId[]" value="<?php echo $row['tblStudentId'] ?>"/><?php echo $row['tblStudentId'] ?></td>
                                  <td><?php echo $row['name'] ?></td>
                                  <?php
                                    while($x<$count)
                                    {
                                      $subject=$arrSubj[$x];
                                      $query2="select * from tblgrade where tblGrade_tblStudentId='$studid' and tblGrade_tblSubjectId='$subject' and tblGrade_tblGradingId='$active'";
                                      $result2=mysqli_query($con, $query2);
                                      $row2=mysqli_fetch_array($result2);
                                      if($row2['tblGradeGrade'] > 0)
                                      {
                                        $grade=$row2['tblGradeGrade'];
                                      }else if($row2['tblGradeGrade'] == 0)
                                      {
                                        $grade = null;
                                      }

                                  ?>
                                  <td> <input type="text" name="txtGrade[]" id="txtGrade" value="<?php echo $grade ?>"/></td>
                                  <?php 
                                  $x++;
                                  $a++;
                                  }
                                  ?>
                                  <?php
                                  $query3="select * from tblgradeave where tblGenAve_tblStudentId='$studid' and tblGenAve_tblGradingId='$active' and tblGenAve_tblSchoolYrId='$syid' and tblGenAveFlag=1";
                                  $result3=mysqli_query($con, $query3);
                                  $row3=mysqli_fetch_array($result3);
                                  $genaverage=$row3['tblGenAverage'];
                                  if($genaverage==0)
                                  {
                                    $genaverage=null;
                                    $genavestatus=null;
                                  }else if($genaverage>=1)
                                  {
                                    $genaverage=$row3['tblGenAverage'];
                                    $genavestatus=$row3['tblGenAveStatus'];
                                  }
                                  ?>
                                  <td><?php echo $genaverage ?></td>
                                  <td><?php echo $genavestatus ?></td>
                                </tr>
                              <?php } ?>
                                </tbody>
                                </table>
                          


                        <div class="btn-group" style="float: right; margin-top: 3%">
                          <button type="submit" class="btn btn-info">Save Grades</button>
                          <button type="button" class="btn btn-danger"></i>Reset</button>
                        </div>
                          </div>
                        
                          <!-- /.box-body -->
                          </form>
                          
                        </div>

                        <!-- /.box -->
                      </div>
                      <!-- /.tab pane -->
                    </div>
                    <!-- /.tab content -->
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box-default -->
              </div>
              <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> Last na please
        </div>
        <strong>Copyright &copy; 2017 <a href="http://almsaeedstudio.com">Kiddo Academy and Development Center</a>.</strong> All rights
        reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">

            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">

            </ul>
            <!-- /.control-sidebar-menu -->

          </div>
          <!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
          <!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>

              <h3 class="control-sidebar-heading">Message Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div>
              <!-- /.form-group -->
            </form>
          </div>
          <!-- /.tab-pane -->
        </div>
      </aside>
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="js/select2.full.min.js"></script>
    <script type="text/javascript" src="formwizard.js"></script>

    <script>

      $(function () {
        $("#datatable").DataTable();
        $("#datatable1").DataTable();
        $("#datatable2").DataTable();
        $("#datatable3").DataTable();
        $("#datatable4").DataTable();
      });
      

    </script>

  </body>

</html>
