<?php
   include('session.php');
   include('db_connect.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kiddo Academy SIS</title>
    <link rel="icon" type="image/gif" href="images/School Logo/symbol.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="css/bootstrapcss/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/adminLTEcss/AdminLTE.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="css/datatables/dataTables.bootstrap.css">
    <!-- bootstrap wysihtml5 - tex
    t editor -->
    <link rel="stylesheet" href="css/bootstrap3-wysihtml5.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="css/daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="css/datepicker/datepicker3.css">
    <link rel="stylesheet" href="css/adminLTEcss/skins/_all-skins.min.css">
    <link rel="stylesheet" href="css/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/formwizard2.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="css/css/validDesignReq.css">
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <link rel="stylesheet" href="css/fullcalendar.print.css" media="print">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="css/iCheck/all.css">
    
    
    <!-- jQuery 2.2.3 -->
    <script src="js/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="js/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="js/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="js/distjs/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="js/distjs/demo.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="js/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Sweetalert -->
    <script src="js/sweetalert.min.js"></script>
    <!-- Bootstrap validator -->
    <script src="js/bootstrapValidator.min.js"></script>
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
                  <img src="images/User/user.png" class="user-image" alt="User Image">
                  <span class="hidden-xs">Registrar</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="images/User/user.png" class="img-circle" alt="User Image">

                    <p>
                      Username
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
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="images/User/user.png" class="img-circle" alt="User Image">
            </div>

            <div class="pull-left info">
              <p>Registrar<i class="fa fa-circle text-success" style="margin-left: 5px"></i></p>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu"  style="font-size:17px;">
            <li class="header" style="color: white">Welcome!</li>
            <li class="treeview">
              <a href="RegistrarMessage.html">
                <i class="fa fa-envelope-o"></i> <span>Message</span>
              </a>
            </li>
           <li class="treeview">
              <a href="registrar-admission.php">
                <i class="fa fa-users"></i> <span>Admission</span>
              </a>
            </li>
            <li class="treeview">
              <a href="registrar-enrollment.php">
                <i class="fa fa-child"></i> <span>Enrollment</span>
              </a>
            </li>
            <li class="treeview active">
              <a href="registrar-billing.php">
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

   <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> Last na please
        </div>
        <strong>Copyright &copy; 2017 <a href="http://almsaeedstudio.com">Kiddo Academy and Development Center</a>.</strong> All rights
        reserved.
      </footer>
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
   <div class="control-sidebar-bg"></div>
   </div><!-- wrapper -->
          <script>
      $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
      $(".choose").select2();
      });
    </script>

    <script type="text/javascript" src="js/formwizard.js"></script>
    <script src="js/selectjs/select2.full.min.js"></script>
    <script>
    $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
      localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
      if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
      }
    });
    </script>
    <!-- DataTables -->
  <script src="js/datatables/jquery.dataTables.min.js"></script>
  <script src="js/datatables/dataTables.bootstrap.min.js"></script>
  <script>
  $(function () {
    $("#datatable").DataTable();
    $("#datatable1").DataTable();
    $("#datatable2").DataTable();
    $("#datatable3").DataTable();
    $("#tblReq").DataTable();
    $("#tblGrading").DataTable();
  });

  //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
</script>
    <!-- InputMask -->
    <script src="js/input-mask/jquery.inputmask.js"></script>
    <script src="js/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="js/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="js/icheck.min.js"></script>

<script>
  $(function () {
   //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
     $("#datemask3").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
    //Money Euro
    $("[data-mask]").inputmask();
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