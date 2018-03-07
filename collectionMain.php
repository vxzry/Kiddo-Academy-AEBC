<?php
   include('session.php');
   include('db_connect.php');
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
    $query="select * from tblrole where tblRoleId='$roleid' and tblRoleFlag=1";
    $result=mysqli_query($con, $query);
    $row=mysqli_fetch_array($result);
    $rolename=$row['tblRoleName'];
   }

// $studid=$_POST['txtStudId'];
// $query="select * from tblschoolyear where tblSchoolYrActive='ACTIVE'";
// $result=mysqli_query($con, $query);
// $row=mysqli_fetch_array($result);
// $syid=$row['tblSchoolYrId'];
// $query="select * from tblstudent where tblStudentId='$studid' and tblStudentFlag=1";
// $result=mysqli_query($con, $query);
// $row=mysqli_fetch_array($result);
// $lvlid=$row['tblStudent_tblLevelId'];
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
     <link rel="stylesheet" type="text/css" href="formwizard2.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <style>
      body {
        font-family: 'Noto Sans', sans-serif;
        font-weight: bold;
        font-size: 12px;
      }
    </style>
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
                      <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <p style="text-align: center; font-size: 20px; padding-top: 10px; color: white">Kiddo Academy AEBC</p>
          
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
          <ul class="sidebar-menu" style="font-size:15px;">
            <li class="header" style="color: black; font-size: 15px; margin-top: 3%">Welcome!</li>
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
        <section class="content"  style="margin-top: 4%">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-default">
                <div class="box-header with-border"></div>
                <div class="box-header with-border">
                    <h2 class="box-title" style="font-size:20px;">Collection</h2>
                    <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                  </div>
                <div class="box-body">
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs" id="myTab">
                      <li class="active"><a href="#tab_1" data-toggle="tab">Student's Payment</a></li>
                      <li><a href="#tab_2" data-toggle="tab">Checks</a></li>
                    </ul>

                  <div class="tab-content">

                    <div class="tab-pane" id="tab_2">
                      <div class="box">
                        <div class="box-header"></div>
                        <div class="box-body">
                          
                            <div class="col-md-12" style="margin-top: 5%">
                                <table id="datatable1" class="table table-bordered table-striped">
                                  <thead>
                                   <tr>
                                       <th>Student ID</th>
                                       <th>Student Name</th>
                                       <th>Check #</th>
                                       <th>Amount</th>
                                       <th>Bank Name</th>
                                       <th>Payment Date</th>
                                       <th>Action</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $query="select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as studentname, tblChkId, tblChkAmount, tblChkBank, tblChkDate, ca.tblChkNum from tblstudent s, tblstudentinfo si, tblcheck ca where ca.tblChk_tblStudentId=s.tblStudentId and s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentType='OFFICIAL' and s.tblStudentFlag=1 and ca.tblChkRTag!='PAID'";
                                    $result=mysqli_query($con, $query);
                                    while($row=mysqli_fetch_array($result)):
                                    ?>
                                    <tr>
                                      <td><?php echo $row['tblStudentId'] ?></td>
                                      <td><?php echo $row['studentname'] ?></td>
                                      <td><?php echo $row['tblChkNum'] ?></td>
                                      <td><?php echo $row['tblChkAmount'] ?></td>
                                      <td><?php echo $row['tblChkBank'] ?></td>
                                      <td><?php echo $row['tblChkDate'] ?></td>
                                      <td><form method="post" action="tagCheck.php"><input type="hidden" name="txtChkId" id="txtChkId" value="<?php echo $row['tblChkId'] ?>"/><input type="hidden" name="txtStudId" id="txtStudId" value="<?php echo $row['tblStudentId'] ?>"/><button type="submit" class="btn btn-success" name="btnStud" id="btnStud">Tag Check as Paid</button></form></td>
                                    </tr>
                                    <?php
                                    endwhile;
                                     ?>
                                  </tbody>
                                </table>

                        </div> <!-- box-body -->
                      
                      </div> <!-- box-->
                    </div> <!--tab pane tab_1 -->
                  </div>
                    <div class="tab-pane active" id="tab_1">
                      <div class="box">
                        <div class="box-header"></div>
                        <div class="box-body">
                            <div class="col-md-6"  style="margin-top: 3%">
                              <div class="form-group">
                                  <label>Level</label>
                                  <select class="form-control" style="width: 50%;" onchange="changeBillingLevel()" name="selLevel" id="selLevel">
                                    <option selected="selected" disabled>--Select Level--</option>
                                    <?php
                                    $query="select tblLevelId, tblLevelName from tbllevel where tblLevelFlag=1";
                                    $result = mysqli_query($con, $query);
                                    while($row=mysqli_fetch_array($result)):
                                    ?>
                                    <option value="<?php echo $row['tblLevelId'] ?>"><?php echo $row['tblLevelName'] ?></option>
                                    <?php endwhile ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-12" style="margin-top: 3%">
                                <table id="datatable1" class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th>Student ID</th>
                                      <th>Student Name</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead> 
                                  <tbody>
                                  <?php
                                    $query="select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as studentname from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentType='OFFICIAL' and s.tblStudentFlag=1;";
                                    $result=mysqli_query($con, $query);
                                    while($row=mysqli_fetch_array($result)):
                                  ?>
                                    <tr>
                                      <td><?php echo $row['tblStudentId'] ?></td>
                                      <td><?php echo $row['studentname'] ?></td>
                                      <td>
                                      <form action="BILLINGMAIN.php" method="post">
                                      <input type="hidden" value="<?php echo $row['tblStudentId'] ?>" name="txtStudId" id="txtStudId"/>
                                      <button type="submit" class="btn btn-success" name="btnStud" id="btnStud"><i class="fa fa-edit"></i>Proceed to Billing</button></form></td>
                                    </tr>
                                  <?php endwhile; ?>
                                  </tbody>
                                </table>
                              </div> <!-- col-md-12 -->
                            </div> <!-- box body -->
                      
                      </div> <!-- box-->
                    </div>
                    </div><!-- <div class="nav-tabs-custom"> -->
                </div> <!-- box body -->
              </div> <!-- box- box-default-->
            </div> <!-- col-md-12 -->
          </div> <!-- row -->
        </section>
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
