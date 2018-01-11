<?php 
include "db_connect.php"; 
if(isset($_POST['btnProceed']))
{
  $studid = $_POST['txtStudentId'];
  $clear=$_POST['chkClear'];
  $session=$_POST['selSession'];
  $optfees=$_POST['optionalfees'];
  // $query="select * from tblstudenroll order by tblStudEnrollId desc limit 0, 1";
  // $result = mysqli_query($con, $query);
  // $row = mysqli_fetch_assoc($result);
  // $enrollid = $row['tblStudEnrollId'];
  // $enrollid++;
  // $query="insert into tblstudenroll(tblStudEnrollId, tblStudEnrollPreferedSession, tblStudEnrollClearance, tblStudEnroll_tblStudentId) values ('$enrollid', '$session', '$clear', '$studid')";
  // $result=mysqli_query($con, $query);

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
  function showLevel()
    {
      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open("GET","showTblStudent.php?selLevel="+document.getElementById("selLevel").value,false);
      xmlhttp.send(null);

      document.getElementById("datatable1").innerHTML=xmlhttp.responseText;
    }

  function addRow()
  {
      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open("GET","addScheme.php?optionalfees="+document.getElementById("optionalfees").value,false);
      xmlhttp.send(null);

      document.getElementById("tb").append(xmlhttp.responseText);
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
            <div class="box box-default">
              <div class="box-header with-border"></div>
                <div class="box-body">
                  <div class="box-header with-border">
                    <h2 class="box-title" style="font-size:20px;">Enrollment</h2>
                      <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                  </div>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box">
                        <div class="box-header"></div>
                        <form action="EnrollStudent.php" method="post">
                            <div class="box-body">
                            <input type="text" name="txtStudId" id="txtStudId" value="<?php echo $studid ?>"/>
                            <input type="text" name="txtClear" id="txtClear" value="<?php echo $clear ?>"/>
                            <input type="text" name="txtSession" id="txtSession" value="<?php echo $session ?>"/>
                            <?php
                            $query="select concat(tblstudentinfo.tblStudInfoLname, ', ', tblstudentinfo.tblStudInfoFname, ' ', tblstudentinfo.tblStudInfoMname) as name from tblstudentinfo join tblstudent on tblstudent.tblStudentId=tblstudentinfo.tblStudInfo_tblStudentId where tblstudent.tblStudentId='$studid' and tblstudent.tblStudentFlag=1";
                            $result=mysqli_query($con, $query);
                            $row=mysqli_fetch_array($result);
                            ?> 
                             <hr> 
                                <div class="form-group" style="margin-top: 0%">
                                <h2>Payment Schemes</h2>
                                <small>These are the fees availed. Please choose payment scheme.</small>
                                <h4 style="margin-top: 5%"><input type="hidden" name="txtId" id="txtId" value="<?php echo $studid ?>" />Student Id: <?php echo $studid ?></h4>
                             <h4>Student Name: <?php echo $row['name'] ?></h4>
                                 <div class="col-md-12" style="margin-top: 6%">
                                    <table id="datatable2" class="table table-bordered table-striped">
                                      <thead>
                                        <tr>
                                          <th hidden>Fee Id</th>
                                          <th>Fee Code</th>
                                          <th>Fee Description</th>
                                          <th>Scheme</th>
                                        </tr>
                                      </thead>
                                      <tbody id="tb">
                                      <?php 
                                      $query="select * from tblfee where tblFeeMandatory='Y' and tblFeeFlag=1 group by tblFeeId";
                                      $result=mysqli_query($con, $query);
                                      while($row=mysqli_fetch_array($result)):
                                      ?>
                                        <tr>
                                          <td hidden><input type="hidden" name="txtFeeId1[]" id="txtFeeId1" value="<?php echo $row['tblFeeId'] ?>" /><?php echo $row['tblFeeId'] ?></td>
                                          <td><?php echo $row['tblFeeCode'] ?></td>
                                          <td><?php echo $row['tblFeeName'] ?></td>
                                          <td>
                                          <select class="form-control" style="width: 50%;" name="selSchemeMand[]" id="selSchemeMand" >
                                            <option selected="selected" disabled>--CHOOSE SCHEME--</option>
                                          <?php 
                                          $feeid=$row['tblFeeId'];
                                          $query1="select * from tblScheme where tblScheme_tblFeeId='$feeid' and tblSchemeFlag=1";
                                          $result1=mysqli_query($con, $query1);
                                          while($row1=mysqli_fetch_array($result1)){
                                          ?>
                                            <option value="<?php echo $row1['tblSchemeId'] ?>"><?php echo $row1['tblSchemeType'] ?></option>
                                          <?php } ?>
                                          </select>
                                          </td>
                                        </tr>
                                      <?php endwhile; ?>  
                                      <?php
                                      foreach ($optfees as $val) {
                                        $query="select * from tblfee where tblFeeId='$val' and tblFeeMandatory='N' and tblFeeFlag=1 group by tblFeeId";
                                        $result=mysqli_query($con, $query);
                                        $row=mysqli_fetch_array($result);
                                      ?>
                                      <tr>
                                      <td hidden><input type="hidden" name="txtFeeId2[]" id="txtFeeId2" value="<?php echo $row['tblFeeId'] ?>" /><?php echo $row['tblFeeId'] ?></td>
                                      <td><?php echo $row['tblFeeCode'] ?></td>
                                      <td><?php echo $row['tblFeeName'] ?></td>
                                      <td><select class="form-control" style="width: 50%;" name="selSchemeOpt[]" id="selSchemeOpt">
                                      <option selected="selected" disabled>--CHOOSE SCHEME--</option>
                                      <?php 
                                          $feeid=$row['tblFeeId'];
                                          $query1="select * from tblScheme where tblScheme_tblFeeId='$feeid' and tblSchemeFlag=1";
                                          $result1=mysqli_query($con, $query1);
                                          while($row1=mysqli_fetch_array($result1)){
                                          ?>
                                          <option value="<?php echo $row1['tblSchemeId'] ?>"><?php echo $row1['tblSchemeType'] ?></option>
                                          <?php } ?>
                                      </select></td>
                                      </tr>
                                      <?php } ?>
                                      </tbody>
                                    </table>
                                  </div> <!-- col-md-12 tab_2
                                </div> -->
                          <div class="pull-right" style="margin-top: 5%">
                  <button type="submit" class="btn btn-success" name="btnProceed" id="btnProceed">Proceed to Collection</button>
                         </div>
                        </div> <!-- box body tab_! -->
                        </form>
                      </div> <!-- box tab_1 -->
                    </div> <!-- tab pane tab_1 -->
                  </div>
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
