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
    $query1="select * from tbluser u, tblrole r where u.tblUserId='$user_id' and u.tblUser_tblRoleId=r.tblRoleId and u.tblUserFlag=1";
    $result1=mysqli_query($con, $query1);
    $row1=mysqli_fetch_array($result1);
    $roleid=$row1['tblUser_tblRoleId'];
    $rolename=$row1['tblRoleName'];
   }else if($x=="F")
   {
    $query="select tblFacultyId, concat(tblFacultyLname, ', ', tblFacultyFname, ' ', tblFacultyMname) as names from tblfaculty where tblFaculty_tblUserId='$user_id' and tblFacultyFlag=1";
    $result=mysqli_query($con, $query);
    $row=mysqli_fetch_array($result);
    $id=$row['tblFacultyId'];
    $namess=$row['names'];
    $query1="select * from tbluser u, tblrole r where u.tblUserId='$user_id' and u.tblUser_tblRoleId=r.tblRoleId and u.tblUserFlag=1";
    $result1=mysqli_query($con, $query1);
    $row1=mysqli_fetch_array($result1);
    $roleid=$row1['tblUser_tblRoleId'];
    $rolename=$row1['tblRoleName'];
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
        <section class="content-header" style="margin-bottom: -15px;">
          <ol class="breadcrumb" style="font-size:15px;">
            <li><a href="ParentMessage.html" style="color: black;"><i class="fa fa-envelope-o"></i> Message</a></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content" style="margin-top: 4%">
         <div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Inbox</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Outbox</a></li>
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-envelope-o"></i></a></li>
                </ul>

                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="box-header with-border">
                      <a href="ParentCompose.html" class="btn btn-primary btn-block margin-bottom" style="width: 17%;">Compose</a>
                      <div class="box-tools pull-right">
                        <div class="has-feedback">
                          <input type="text" class="form-control input-sm" placeholder="Search Mail">
                          <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                      </div>
                        <!-- /.box-tools -->
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                        <div class="mailbox-controls">
                          <!-- Check all button -->
                          <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                          <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                          </div>
                          <!-- /.btn-group -->
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                          <div class="pull-right">
                            3-50/200
                            <div class="btn-group">
                              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                            </div>
                            <!-- /.btn-group -->
                          </div>
                          <!-- /.pull-right -->
                        </div>

                        <div class="table-responsive mailbox-messages">
                          <table class="table table-hover table-striped">
                            <tbody>
                              <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                              <td class="mailbox-name"><a href="ParentReadMail.html">Alexander Pierce</a></td>
                              <td class="mailbox-subject"><b>Payment</b> - Your due date for this month's... </td>
                              <td class="mailbox-attachment"></td>
                              <td class="mailbox-date">5 mins ago</td>
                              </tr>
                              <tr>
                                <td><input type="checkbox"></td>
                                <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                                <td class="mailbox-name"><a href="ParentReadMail.html">Waxillium Ladrian</a></td>
                                <td class="mailbox-subject"><b>Student</b> - There had been some problems...
                                </td>
                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                <td class="mailbox-date">28 mins ago</td>
                              </tr>
                              <tr>
                                <td><input type="checkbox"></td>
                                <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                                <td class="mailbox-name"><a href="ParentReadMail.html">Percy Jackson</a></td>
                                <td class="mailbox-subject"><b>Grades</b> - There would be a meeting for... </td>
                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                <td class="mailbox-date">11 hours ago</td>
                              </tr>
                            </tbody>
                          </table>
                          <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer no-padding">
                        <div class="mailbox-controls">
                          <!-- Check all button -->
                          <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                          <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                          </div>
                          <!-- /.btn-group -->
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                          <div class="pull-right">
                            3-50/200
                            <div class="btn-group">
                              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                            </div>
                            <!-- /.btn-group -->
                          </div>
                          <!-- /.pull-right -->
                        </div>
                      </div>
                  </div>
                  <!-- /.tab-pane tab_! -->
                  <div class="tab-pane" id="tab_2">
                    <div class="box-header with-border">
                      <a href="ParentCompose.html" class="btn btn-primary btn-block margin-bottom" style="width: 17%;">Compose</a>
                      <div class="box-tools pull-right">
                        <div class="has-feedback">
                          <input type="text" class="form-control input-sm" placeholder="Search Mail">
                          <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                      <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                          3-50/200
                          <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                          </div>
                          <!-- /.btn-group -->
                        </div>
                        <!-- /.pull-right -->
                      </div>

                      <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                          <tbody>
                            <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                              <td class="mailbox-name"><a href="ParentReadMail.html">Kim Taehyung</a></td>
                              <td class="mailbox-subject"><b>Payment</b> - I'd like to say that... </td>
                              <td class="mailbox-attachment"></td>
                              <td class="mailbox-date">2 mins ago</td>
                            </tr>
                            <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                              <td class="mailbox-name"><a href="ParentReadMail.html">Byun Baekhyun</a></td>
                              <td class="mailbox-subject"><b>Payment</b> - I'd like to say that... </td>
                              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                              <td class="mailbox-date">10 mins ago</td>
                            </tr>
                            <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                              <td class="mailbox-name"><a href="ParentReadMail.html">Do Kyungsoo</a></td>
                              <td class="mailbox-subject"><b>Payment</b> - I'd like to say that... </td>
                              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                              <td class="mailbox-date">1 hour ago</td>
                            </tr>
                          </tbody>
                        </table> <!-- /.table -->
                      </div> <!-- /.mail-box-messages -->
                    </div> <!-- /.box-body -->

                    <div class="box-footer no-padding">
                      <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                          3-50/200
                          <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                          </div>
                          <!-- /.btn-group -->
                        </div>
                        <!-- /.pull-right -->
                      </div>
                      <!-- mailbox-controls -->
                    </div>
                  <!-- /. box -->
                  </div>
                  <!-- /.tab-pane tab_2 -->
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
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

  </body>
</html>
