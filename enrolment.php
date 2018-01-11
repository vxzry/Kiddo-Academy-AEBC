<?php include "db_connect.php"; ?>
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
  function showLevel()
    {
      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open("GET","showTblStudent.php?selLevel="+document.getElementById("selLevel").value,false);
      xmlhttp.send(null);

      document.getElementById("datatable1").innerHTML=xmlhttp.responseText;
    }

    (function(){
    if(window.addEventListener){
      window.addEventListener('load',run,false);
    }else if(window.attachEvent){
      window.attachEvent('onload',run);
    }
    function run(){
      var t=document.getElementById('datatable1');
      t.onclick=function(event){
        event=event || window.event;
        var target=event.target||event.srcElement;
        while (target&&target.nodeName!='TR'){
          target=target.parentElement;
        }
        var cells=target.cells;

        if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
        var f1=document.getElementById('txtStudentId');
        f1.value=cells[0].innerHTML;
        /*f8.value=cells[5].innerHTML;*/
      };
    }})();
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
                  <img src="images/Employees/registrar.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Park Chanyeol</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="images/Employees/registrar.jpg" class="img-circle" alt="User Image">

                    <p>
                      Park Chanyeol
                      <small>Registrar</small>
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
              <img src="images/Employees/registrar.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info" style="margin-top: 3%">
              <p>Park Chanyeol<i class="fa fa-circle text-success" style="margin-left: 5px"></i></p>
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
           <ul class="sidebar-menu"  style="font-size:17px;">
            <li class="header" style="color: white">Welcome!</li>
            <li class="treeview">
              <a href="RegistrarMessage.html">
                <i class="fa fa-envelope-o"></i> <span>Message</span>
              </a>
            </li>
           <li class="treeview">
              <a href="admissionV2.html">
                <i class="fa fa-users"></i> <span>Admission</span>
              </a>
            </li>
            <li class="treeview active">
              <a href="enrolment.html">
                <i class="fa fa-child"></i> <span>Enrollment</span>
              </a>
            </li>
            <li class="treeview">
              <a href="billing2.html">
                <i class="fa fa-calculator"></i> <span>Billing</span>
              </a>
            </li>
            <li class="treeview">
              <a href="registrar-profile.html">
                <i class="fa fa-user"></i> <span>Profile</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <ol class="breadcrumb"  style="font-size:15px;">
            <li><a href="RegistrarMessage.html" style="color: black;"><i class="fa fa-envelope-o"></i> Message</a></li>
            <li class="active">Enrollment</li>
          </ol>
          </h5>
        </section>

        <!-- Main content -->
        <section class="content" style="margin-top: 4%">
         <div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Enrollment</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Confirmation</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="tab-pane active" id="tab_1">
                      <div class="box">
                        <div class="box-body">
                          <form role="form">
                            <div class="box-body">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Filter by Level:</label>
                                  <select class="form-control" sty  le="width: 50%" name="selLevel" id="selLevel" onchange="showLevel();">
                                    <option selected disabled>--Choose Level--</option>
                                    <?php
                                    $query="select * from tbllevel where tblLevelFlag=1 group by tblLevelName";
                                    $result=mysqli_query($con, $query);
                                    while($row=mysqli_fetch_array($result)):
                                    
                                    ?>
                                    <option value="<?php echo $row['tblLevelId'] ?>"><?php echo $row['tblLevelName']; ?></option>
                                    <?php endwhile; ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-12">
                                <table id="datatable1" class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th>Student Id</th>
                                      <th>Student Name</th>
                                      <th>Type</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  $query="select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name, s.tblStudentType from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentFlag=1 and si.tblStudInfoFlag=1";
                                  $result=mysqli_query($con, $query);
                                  while($row=mysqli_fetch_array($result)):
                                  ?>
                                    <tr>
                                      <td><?php echo $row['tblStudentId'] ?></td>
                                      <td><?php echo $row['name'] ?></td>
                                      <td><?php echo $row['tblStudentType'] ?></td>
                                      <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModalOne">Proceed</button></td>
                                    </tr>
                                  <?php endwhile; ?>
                                  </tbody>
                                </table>
                              </div>
                            </div> <!-- box body tab_1 -->
                          </form>

                          <div class="modal fade" id="addModalOne" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title" style="font-style: bold">Enrollment</h3>
                                </div>
                                <form method="post" action="EnrollStudent.php"/>
                                <div class="form-group">
                                  <input type="text" name="txtStudentId" id="txtStudentId"/>
                                </div>
                                <div class="form-group" style="margin-top: 5%">
                                  <input class="col-sm-4" type="checkbox" name="chkEnClearance" id="chkEnClearance" value="1">Clearance
                                </div>

                                <div class="form-group" style="margin-top: 10%">
                                  <label class="col-sm-4" style="text-align: right">Session</label>
                                  <div class="col-sm-7">
                                    <select class="form-control choose" style="width: 100%;" name="selEnSession" id="selEnSession" >
                                      <option selected="selected">--CHOOSE SESSION--</option>
                                      <option value="MORNING">MORNING</option>
                                      <option value="AFTERNOON">AFTERNOON</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="form-group" style="margin-top: 20%">
                                  <label class="col-sm-4" style="text-align: right">Payment Scheme</label>
                                    <div class="col-sm-7">
                                    <select class="form-control choose" style="width: 100%;" name="selEnPayment" id="selEnPayment" >
                                      <option selected="selected">--CHOOSE PAYMENT SCHEME--</option>
                                      <?php
                                        $query="select s.tblSchemeId, s.tblSchemeType from tblfee f, tblscheme s where f.tblFeeId=s.tblScheme_tblFeeId and f.tblFeeName='TUITION FEE'";
                                        $result=mysqli_query($con, $query);
                                        while($row=mysqli_fetch_array($result)):
                                      ?>
                                      <option value="<?php echo $row['tblSchemeId'] ?>"><?php echo $row['tblSchemeType'] ?></option>
                                      <?php endwhile; ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="modal-footer" style="margin-top: 35%; float: center">
                                  <button type="submit" class="btn btn-danger" name="btnDel" id="btnDel">OK</button>
                                  <button type="button" class="btn btn-info" data-dismiss="modal">CANCEL</button>
                                </div>
                                </form>
                              </div> <!-- modal content -->
                            </div> <!-- modal dialog -->
                          </div> <!-- modal fade -->
                        </div> <!-- box body tab_! -->
                      </div> <!-- box tab_1 -->
                    </div> <!-- tab pane tab_1 -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <div class="box">
                      <div class="box-body">
                        <form role="form">
                          <div class="box-body">
                            <div class="col-md-12">
                              <table id="datatable2" class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>74873-25785</td>
                                    <td>Last, First</td>
                                    <td>Grade 1</td>
                                    <td><button type="button" class="btn btn-success">Change Status to Official</button></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div> <!-- col-md-12 tab_2 -->
                          </div> <!-- box- body -->
                        </form>
                      </div> <!-- box-body -->
                    </div> <!-- box -->
                  </div>
                  <!-- /.tab-pane -->
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
