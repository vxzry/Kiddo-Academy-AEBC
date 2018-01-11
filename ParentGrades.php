<?php 
include "db_connect.php";
include "session.php";
$arrSubj=array();
$query="select * from tblschoolyear where tblSchoolYearFlag=1 and tblSchoolYrActive='ACTIVE'";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$syid=$row['tblSchoolYrId'];
$sy=$row['tblSchoolYrYear'];
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
                  <img src="images/Employees/parent.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $namess ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="images/Employees/parent.jpg" class="img-circle" alt="User Image">

                    <p>
                      <?php echo $namess ?>
                      <small>Parent</small>
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
               <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
              <img src="images/Employees/parent.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info" style="margin-top: 3%">
              <p><?php echo $namess ?><i class="fa fa-circle text-success" style="margin-left: 5px"></i></p>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" style="font-size:17px;">
            <li class="header" style="color: white">Welcome!</li> 
            <li class="treeview active">
              <a href="ParentMessage.html">
                <i class="fa fa-envelope-o"></i> <span>Message <?php echo $namess ?></span>
              </a>
            </li>
         <?php
              $query="select * from tblrolemodule rm, tblmodule m where m.tblModuleId=rm.tblRoleModule_tblModuleId and rm.tblRoleModule_tblRoleId='$roleid'";
              $result=mysqli_query($con, $query);
              while($row=mysqli_fetch_array($result)):
            ?>
           <li class="treeview">
              <a href="<?php echo $row['tblModuleLinks'] ?>">
                <i class="fa fa-list"></i> <span><?php echo $row['tblModuleName'] ?></span>
              </a>
            </li>
          <?php endwhile ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <ol class="breadcrumb" style="font-size:15px;">
            <li><a href="#" style="color: black;"><i class="fa fa-th-list"></i> Grades</a></li>
          </ol>
        </section>

      <?php
      $query="select * from tblparentstudent where tblParStud_tblParentid='$id' and tblParStudFlag=1";
      $result=mysqli_query($con, $query);
      while($row=mysqli_fetch_array($result)):
        $studid=$row['tblParStud_tblStudentId'];
        $query1="select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as studentname, l.tblLevelName, l.tblLevelId from tblstudent s, tblstudentinfo si, tbllevel l where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudent_tblLevelId=l.tblLevelId and s.tblStudentId='$studid' and s.tblStudentFlag=1";
        $result1=mysqli_query($con, $query1);
        $row1=mysqli_fetch_array($result1);
        $lvlid=$row1['tblLevelId'];
      ?>
       <!-- Main content -->
        <section class="content" style="margin-top: 3%">
          <div class="row">
              <div class="col-md-12">
                <div class="box box-default">
                  <div class="box-header with-border"></div>
                  <div class="box-body">
                    <div class="box-header with-border">
                      <h2 class="box-title" style="font-size:20px;"></h2>
                        <h4>Student ID: <?php echo $row1['tblStudentId'] ?></h4>
                        <h4>Student Name: <?php echo $row1['studentname'] ?></h4>
                        <div class="form-group" style="margin-left: 2%"></div>
                      </div>

                    <div class="tab-content">

                      <div class="tab-pane active" id="tab_1">
                        <div class="box">
                          <div class="box-header"> </div>
                            <div class="box-body">
                              <h5 style="font-weight: bold">School Year: <?php echo $sy ?></h5>
                              <h5 style="font-weight: bold">Level: <?php echo $row1['tblLevelName'] ?></h5>
                              <?php
                              $query2="select * from tblsection s, tblstudent st, tblsectionstud ss where st.tblStudentId=ss.tblSectStud_tblStudentId and s.tblSectionId=ss.tblSectStud_tblSectionId and ss.tblSectStud_tblSchoolYrId='$syid' and ss.tblSectStudFlag=1 and s.tblSectionFlag=1 and st.tblStudentFlag=1 and st.tblStudentId='$studid'";
                              $result2=mysqli_query($con, $query2);
                              $row2=mysqli_fetch_array($result2);
                              ?>
                              <h5 style="font-weight: bold">Section: <?php echo $row2['tblSectionName'] ?></h5>
                              <?php 
                                $fid=$row2['tblSection_tblFacultyId'];
                                $query3="select concat(tblFacultyLname, ', ', tblFacultyFname, ' ', tblFacultyMname) as facultyname from tblfaculty where tblFacultyId='$fid' and tblFacultyFlag=1";
                                $result3=mysqli_query($con, $query3);
                                $row3=mysqli_fetch_array($result3);
                              ?>
                              <h5 style="font-weight: bold">Adviser: <?php echo $row3['facultyname'] ?></h5>
                              <hr>
                              <table id="datatable" name="datatable" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Subject</th>
                                  <th>1st Grading</th>
                                  <th>2nd Grading</th>
                                  <th>3rd Grading</th>
                                  <th>4th Grading</th>
                                  <th>Final</th>
                                  <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $query4="select distinct(tblGrade_tblSubjectId) from tblgrade where tblGrade_tblStudentId='$studid' and tblGradeFlag=1";
                                $result4=mysqli_query($con, $query4);
                                while($row4=mysqli_fetch_array($result4))
                                {
                                  $ave=0;
                                  $subjid=$row4['tblGrade_tblSubjectId'];
                                  $query5="select * from tblsubject where tblSubjectId='$subjid' and tblSubjectFlag=1";
                                  $result5=mysqli_query($con, $query5);
                                  $row5=mysqli_fetch_array($result5);
                                ?>
                                <tr>
                                  <td><?php echo $row5['tblSubjectDesc'] ?></td>
                                  <?php
                                  $query6="select * from tblgradingperiod where tblGrading_tblSchoolYrId='$syid'";
                                  $result6=mysqli_query($con, $query6);
                                  while($row6=mysqli_fetch_array($result6))
                                  { 
                                    $gperiod=$row6['tblGradingPeriod'];
                                    $query7="select * from tblgrade g, tblgradingperiod gp where gp.tblGradingPeriod='$gperiod' and g.tblGrade_tblGradingId=gp.tblGradingId and tblGrade_tblStudentId='$studid' and tblGrade_tblSubjectId='$subjid' and tblGradeFlag=1 group by tblGrade_tblGradingId";
                                    $result7=mysqli_query($con, $query7);
                                    $row7=mysqli_fetch_array($result7);
                                    $grade=$row7['tblGradeGrade'];
                                    $ave+=$grade;
                                    if(empty($grade))
                                    {
                                      $grd="[not set]";
                                    }else if(!empty($grade))
                                    {
                                      $grd=$row7['tblGradeGrade'];
                                    }
                                  ?>
                                  <td><?php echo $grd ?></td>
                                  <?php } ?>
                                  <?php
                                  $genave=$ave/4;
                                  if($genave < 70)
                                  {
                                    $stat='FAILED';
                                  }else if($genave >= 70)
                                  {
                                    $stat='PASSED';
                                  }
                                  ?>
                                  <td><?php echo $genave ?></td>
                                  <td><?php echo $stat ?></td>
                                  
                                </tr>
                                <?php } ?>
                                </tbody>
                                </table>
                                <hr>
                                <form class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label class="col-lg-9 control-label right">General Average:</label>
                                    <div class="col-lg-3">
                                      <input class="form-control" type="text" disabled="disabled">
                                    </div>
                                  </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box -->
                      </div>
                      <!-- /.tab pane tab_1 -->
                    </div>
                    <!-- /. tab content -->
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
      <?php endwhile ?>
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
      $(document).ready(function() {
        $(".choose").select2();
      });

    </script>
  </body>

</html>
