<?php include "db_connect.php" ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kiddo Academy SIS</title>
  <link rel="icon" type="image/gif" href="images/symbol.png"/>
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
  <!-- sweetalert -->
  <script src="sweetalert-master/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css">


   <link rel="stylesheet" type="text/css" href="css/validDesignReq.css">

  <script>
    (function(){
  if(window.addEventListener){
    window.addEventListener('load',run,false);
  }else if(window.attachEvent){
    window.attachEvent('onload',run);
  }
function run(){
  var t=document.getElementById('tblReq');
  t.onclick=function(event){
    event=event || window.event;
    var target=event.target||event.srcElement;
    while (target&&target.nodeName!='TR'){
      target=target.parentElement;
    }
    var cells=target.cells;
    
    if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
    var f1=document.getElementById('txtUpdReqId');
    var f2=document.getElementById('txtUpdReqName');
    var f3=document.getElementById('txtUpdReqDesc');
    var f4=document.getElementById('txtDelReqId');
    f1.value=cells[0].innerHTML;
    f2.value=cells[1].innerHTML;
    f3.value=cells[2].innerHTML;
    f4.value=cells[0].innerHTML;
  };
}})();
  </script>
</head>

<body class="hold-transition skin-green-light sidebar-mini">

<?php
    $message = isset($_GET['message'])?intval($_GET['message']):0;
    
    if($message == 1) {
      echo "<script> swal('Data insertion failed!', ' ', 'error'); </script>";
    }
    
    if($message == 2) {
      echo "<script> swal('Added succesfully!', ' ', 'success'); </script>";
    }
    
    if($message == 3) {
      echo "<script> swal('Data update failed!', ' ', 'error'); </script>";
    }
    
    if($message == 4) {
      echo "<script> swal('Updated succesfully!', ' ', 'success'); </script>";
    }
    
    if($message == 5) {
      echo "<script> swal('Data deletion failed!', ' ', 'error'); </script>";
    }
    
    if($message == 6) {
      echo "<script> swal('Deleted succesfully!', ' ', 'success'); </script>";
    }
  ?>

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="home.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><image src="logo.ico" style="width: 50px; padding: 3px"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><image src="logo.png" style="width: 200px; padding: 3px;"></span>
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
              <img src="admin.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Kim Shook Jin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="admin.jpg" class="img-circle" alt="User Image">

                <p>
                  Kim Shook Jin
                  <small>Head Teacher</small>
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
          <img src="admin.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info" style="margin-top: 3%">
          <p>Kim Shook Jin<i class="fa fa-circle text-success" style="margin-left: 5px"></i></p>
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
      <ul class="sidebar-menu">
        <li class="header" style="color: white">Welcome!</li>
        <li class="treeview">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Maintenance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="curriculumv2.php"><i class="fa fa-circle-o"></i>Curriculum</a></li>
            <li><a href="school-yearv2.php"><i class="fa fa-circle-o"></i>School Year</a></li>
            <li><a href="sectionv2.php"><i class="fa fa-circle-o"></i>Section</a></li>
            <li><a href="requirementv2.php"><i class="fa fa-circle-o"></i>Requirement</a></li>
            <li><a href="paymentv2.php"><i class="fa fa-circle-o"></i>Payment</a></li>
            <li><a href="profilev2.php"><i class="fa fa-circle-o"></i>Profile</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-refresh"></i> <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admission.html"><i class="fa fa-circle-o"></i>Admission</a></li>
            <li><a href="enrollment.html"><i class="fa fa-circle-o"></i>Enrollment</a></li>
             <li><a href="view-gradesv2.html"><i class="fa fa-circle-o"></i>Promotion</a></li>
            <li><a href="sectioningv2.html"><i class="fa fa-circle-o"></i>Sectioning</a></li>
            <li><a href="dismiss-withdraw.html"><i class="fa fa-circle-o"></i>Dismissal/ Withdrawal</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-bottom: -25px;">
    <h5>
      <ol class="breadcrumb">
        <li><a href="#" style="color: black;"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#" style="color: black;">Maintenance</a></li>
        <li class="active">Requirement</li>
      </ol>
      </h5>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="box box-primary" style="margin-top: 3%">
            <div class="box-header with-border">
            <div class="box-header with-border">
              <h2 class="box-title" style="font-size:25px;">REQUIREMENT</h2>
              <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
            </div>

              <div class="btn-group" style="float: left;  margin-bottom: 2%">
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModalOne"><i class="fa fa-plus"></i>Add</button>
                    </div>
            </div>
    <div class="modal fade" id="addModalOne" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Add Requirement</h3>
        </div>
        <form data-toggle="validator" role="form" action="saveRequirement.php" method="post" name="addReq" id="addReq">
        <div class="modal-body">
         
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Requirement Name</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" style="text-transform: uppercase;" class="form-control" name="txtAddReqName" id="txtAddReqName">
                </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Requirement Description</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" style="text-transform: uppercase;" class="form-control" name="txtAddReqDesc" id="txtAddReqDesc">
                </div>
        </div>        
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnAddReq" id="btnAddReq">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="updateModalOne" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Update Requirement</h3>
        </div>
        <form data-toggle="validation" role="form" action="updateRequirement.php" method="post" name="UpdReq" id="UpdReq">
        <div class="modal-body">
         <div><input type="hidden" name="txtUpdReqId" id="txtUpdReqId"/></div>
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Requirement Name</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" style="text-transform: uppercase;" class="form-control" name="txtUpdReqName" id="txtUpdReqName">
                </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right" >Requirement Description</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" style="text-transform: uppercase;" class="form-control" name="txtUpdReqDesc" id="txtUpdReqDesc">
                </div>
        </div>         
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnUpdReq" id="btnUpdReq">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="deleteModalOne" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Delete Requirement</h3>
        </div>
        <form action="deleteRequirement.php" method="post">
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
          <div><input type="hidden" name="txtDelReqId" id="txtDelReqId"/></div>
          <div>
            <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
          </div>
        </div>         
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnDelReq" id="btnDelReq">Yes</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
              
             <div class="box-body">
              <table id="tblReq" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th hidden></th>
                  <th>Requirement Name</th>
                  <th>Requirement Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "select * from tblrequirement where tblRequirementFlag = 1";
                $result = mysqli_query($con, $query)or die(mysqli_error());
                
                while($row1 = mysqli_fetch_array($result))
                {
                ?>
                <tr><td style="width:100px;" hidden><?php echo $row1['tblReqId']; ?></td>
                <td style="width:100px;"><?php echo $row1['tblReqName']; ?></td>
                <td style="width:100px;"><?php echo $row1['tblReqDescription']; ?></td>
                <td style="width:30px;"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalOne"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalOne"><i class="fa fa-trash"></i></button></td>
                </tr>
                <?php } ?>  
                </tbody>
              </table>
            </div>
            
            </form>
          </div>
          <!-- /.
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
<script>
  $(function () {
    $("#datatable").DataTable();
    $("#datatable1").DataTable();
    $("#tblReq").DataTable();
    $("#datatable3").DataTable();
  });
</script>

<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

<script>
   $(document).ready(function() {
    $('#addReq').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            txtAddReqName: {
                validators: {
                    stringLength: {  
                        min: 5,
                        max: 20,
                        message: 'You have to input characters between 5 to 20 chracters'
                    },

                    regexp: {
                        regexp: /^[a-zA-Z_][0-9a-zA-Z_][\w-\s]+$/,
                        message: 'The first letter should be an alphabet (Must not contain special characters.).'
                    },
                        notEmpty: {
                        message: 'Requirement name is required'
                    }
                }
            },
            txtAddReqDesc: {
                validators: {
                    stringLength: {  
                        min: 5,
                        max: 20,
                        message: 'You have to input characters between 5 to 20 chracters'
                    },

                    
                        notEmpty: {
                        message: 'Requirement description is required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z_][0-9a-zA-Z_][\w-\s]+$/,
                        message: 'The first letter should be an alphabet (Must not contain special characters.).'
                    },
                }
            },
            }
        })
    
  
      .on('success.form.bv', function (e) {
        // Prevent form submission
        e.preventDefault();
    });

    $('#addModalOne')
       .on('shown.bs.modal', function () {
           $('#addReq').find().focus();
        })
        .on('hidden.bs.modal', function () {
            $('#addReq').bootstrapValidator('resetForm', true);
        });
});
</script>

<script>
   $(document).ready(function() {
    $('#UpdReq').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            txtUpdReqName: {
                validators: {
                    stringLength: {  
                        min: 5,
                        max: 20,
                        message: 'You have to input characters between 5 to 20 chracters'
                    },

                    regexp: {
                       regexp: /^[a-zA-Z_][0-9a-zA-Z_][\w-\s]+$/,
                        message: 'The first letter should be an alphabet (Must not contain special characters.).'
                    },
                        notEmpty: {
                        message: 'Requirement name is required'
                    }
                }
            },
            txtUpdReqDesc: {
                validators: {
                    stringLength: {  
                        min: 5,
                        max: 20,
                        message: 'You have to input characters between 5 to 20 chracters'
                    },

                    regexp: {
                       regexp: /^[a-zA-Z_][0-9a-zA-Z_][\w-\s]+$/,
                        message: 'The first letter should be an alphabet (Must not contain special characters.).'
                    },
                        notEmpty: {
                        message: 'Requirement description is required'
                    }
                }
            },
            }
        })
        .on('success.form.bv', function (e) {
        // Prevent form submission
        e.preventDefault();
    });

    $('#updateModalOne')
       .on('shown.bs.modal', function () {
           $('#UpdReq').find().focus();
        })
        .on('hidden.bs.modal', function () {
            $('#UpdReq').bootstrapValidator('resetForm', true);
        });
});
</script>

</body>
</html>
