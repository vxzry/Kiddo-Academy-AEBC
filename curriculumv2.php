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
  <link rel="stylesheet" href="css/select2.min.css">
  <!-- sweetalert -->
  <script src="sweetalert-master/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css">

    <link rel="stylesheet" type="text/css" href="css/validDesignCurriculum.css">
    <link rel="stylesheet" type="text/css" href="css/validDesignSubject.css">
    <link rel="stylesheet" type="text/css" href="css/validDesignLevel.css">
    <link rel="stylesheet" type="text/css" href="css/validDesignDetails.css">
    <link rel="stylesheet" type="text/css" href="css/validDesignDivision.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script>  
  //CURRICULUM
  (function(){
  if(window.addEventListener){
    window.addEventListener('load',run,false);
  }else if(window.attachEvent){
    window.attachEvent('onload',run);
  }
function run(){
  var t=document.getElementById('datatable');
  t.onclick=function(event){
    event=event || window.event;
    var target=event.target||event.srcElement;
    while (target&&target.nodeName!='TR'){
      target=target.parentElement;
    }
    var cells=target.cells;
    
    if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
    var f1=document.getElementById('txtUpdCurrId');
    var f2=document.getElementById('txtUpdCurr');
    var f3=document.getElementById('selUpdActive');
    var f4=document.getElementById('txtDelCurrId');
    f1.value=cells[0].innerHTML;
    f2.value=cells[1].innerHTML;
    f3.value=cells[2].innerHTML;
    f4.value=cells[0].innerHTML;
  };
}})();
//CURRICULUM DETAIL
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
    var f1=document.getElementById('txtUpdDetCurrId');
    var f2=document.getElementById('txtUpdDetId');
    var f3=document.getElementById('txtUpdDetDivId');
    var f4=document.getElementById('txtUpdDetLvlId');
    var f5=document.getElementById('selUpdDetDiv');
    var f6=document.getElementById('selUpdDetLvl');
    var f7=document.getElementById('selUpdDetSubj');
    var f8=document.getElementById('txtUpdDetSubj');
    var f9=document.getElementById('txtDelDetId');
    f1.value=cells[0].innerHTML;
    f2.value=cells[1].innerHTML;
    f3.value=cells[2].innerHTML;
    f4.value=cells[3].innerHTML;
    f5.value=cells[4].innerHTML;
    f6.value=cells[5].innerHTML;
    f7.value=cells[6].innerHTML;
    f8.value=cells[7].innerHTML;
    f9.value=cells[1].innerHTML;
  };
}})();
  //DIVISION
  (function(){
  if(window.addEventListener){
    window.addEventListener('load',run,false);
  }else if(window.attachEvent){
    window.attachEvent('onload',run);
  }
function run(){
  var t=document.getElementById('datatable2');
  t.onclick=function(event){
    event=event || window.event;
    var target=event.target||event.srcElement;
    while (target&&target.nodeName!='TR'){
      target=target.parentElement;
    }
    var cells=target.cells;
    
    if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
    var f1=document.getElementById('txtUpdDivId');
    var f2=document.getElementById('txtUpdDiv');
    f1.value=cells[0].innerHTML;
    f2.value=cells[1].innerHTML;
  };
}})();
//LEVEL
(function(){
  if(window.addEventListener){
    window.addEventListener('load',run,false);
  }else if(window.attachEvent){
    window.attachEvent('onload',run);
  }
function run(){
  var t=document.getElementById('datatable3');
  t.onclick=function(event){
    event=event || window.event;
    var target=event.target||event.srcElement;
    while (target&&target.nodeName!='TR'){
      target=target.parentElement;
    }
    var cells=target.cells;
    
    if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
    var f1=document.getElementById('txtUpdLvlId');
    var f2=document.getElementById('txtUpdLvl');
    var f3=document.getElementById('selUpdLvlDiv');
    var f5=document.getElementById('txtDelLvlId');
    f1.value=cells[0].innerHTML;
    f2.value=cells[1].innerHTML;
    f3.value=cells[2].innerHTML;
    f5.value=cells[0].innerHTML;
  };
}})();
//SUBJECT
  (function(){
  if(window.addEventListener){
    window.addEventListener('load',run,false);
  }else if(window.attachEvent){
    window.attachEvent('onload',run);
  }
function run(){
  var t=document.getElementById('datatable4');
  t.onclick=function(event){
    event=event || window.event;
    document.getElementById("txtUpdSubjId2").disabled=true;
    var target=event.target||event.srcElement;
    while (target&&target.nodeName!='TR'){
      target=target.parentElement;
    }
    var cells=target.cells;
    
    if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
    var f1=document.getElementById('txtUpdSubjId');
    var f2=document.getElementById('txtUpdSubjId2');
    var f3=document.getElementById('txtUpdSubj');
    var f5=document.getElementById('txtDelSubjId');
    f1.value=cells[0].innerHTML;
    f2.value=cells[0].innerHTML;
    f3.value=cells[1].innerHTML;
    f5.value=cells[0].innerHTML;
  };
}})();

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
    if($message == 7) {
      echo "<script> swal('Deletion Failed. Curriculum is in use', ' ', 'error'); </script>";
    }
    if($message == 8) {
      echo "<script> swal('Deletion Failed. Level is in use', ' ', 'error'); </script>";
    }
    if($message == 9) {
      echo "<script> swal('Deletion Failed. Subject is in use', ' ', 'error'); </script>";
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
        <li class="active">Curriculum</li>
      </ol>
      </h5>
    </section>

    <!-- Main content -->
    <section class="content" style="margin-top: 3%">
    <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
        <div class="box-body">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" id="myTab">
              <li class="active"><a href="#tab_1" data-toggle="tab">Curriculum</a></li>
              <li><a href="#tab_2" data-toggle="tab">Subject</a></li>
              <li><a href="#tab_3" data-toggle="tab">Division</a></li>
              <li><a href="#tab_4" data-toggle="tab">Level</a></li>
              <li><a href="#tab_5" data-toggle="tab">Curriculum Details</a></li>
            </ul>
            <div class="tab-content">
          

          <div class="tab-pane fade in active" id="tab_1">
            <div class="box">
            <div class="box-header">
            </div>

              <div class="box-body">
                    <div class="btn-group" style="margin-bottom: 3%">
                      <button id="addCurrName" type="reset" class="btn btn-info" onclick="myFunction()" value="Reset form" data-toggle="modal" data-target="#addModalOne"><i class="fa fa-plus"></i>Add</button>
                    </div>

 <!-- Modal starts here-->
  <div class="modal fade" id="addModalOne" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Add Curriculum</h3>
        </div>
        <form autocomplete="off" data-toggle="validator" role="form" method="post" action="saveCurriculum.php" name="addCurriculum" id="addCurriculum">
        <div class="modal-body">
         
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Curriculum Name</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" name="txtAddCurr" id="txtAddCurr" style="text-transform:uppercase ;" />
                </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Status</label>
                <div class="col-sm-7 selectContainer">
                <select id="select" required="required" class="form-control" style="width: 100%;" name="selAddActive" id="selAddActive">
                <option selected="selected" disabled="disabled">--Select Status--</option>
                  <option>ACTIVE</option>
                  <option>INACTIVE</option>
                </select>
                </div>
        </div>        
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnAddCurr" id="btnAddCurr">Save</button>
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
          <h3 class="modal-title" style="font-style: bold">Update Curriculum</h3>
        </div>
        <form autocomplete="off" data-toggle="validator" method="post" action="updateCurriculum.php" name="UpdCurriculum" id="UpdCurriculum">
        <div class="modal-body">
        <div class="form-group"  style="margin-top: 5%">
             <div><input type="hidden" id="txtUpdCurrId" name="txtUpdCurrId"/></div>
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right;">Curriculum Name</label>
            <div class="col-sm-7 selectContainer">
              <input type="text" class="form-control" name="txtUpdCurr" id="txtUpdCurr" style="text-transform:uppercase ;">
            </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Status</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selUpdActive" id="selUpdActive">
                  <option selected>ACTIVE</option>
                  <option>INACTIVE</option>
                </select>
                </div>
        </div>       
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnUpdCurr" id="btnUpdCurr">Save</button>
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
          <h3 class="modal-title" style="font-style: bold">Delete Curriculum</h3>
        </div>
        <form method = "post" action = "deleteCurriculum.php">
        <div class="modal-body">
        <div><input type="hidden" name="txtDelCurrId" id="txtDelCurrId"/></div>
        <div>
        <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
        </div>
        </div>
        <div class="modal-footer" style="margin-top: 10%; float: center">
        <button type="submit" class="btn btn-danger" name="btnDelCurr" id="btnDelCurr">Delete</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!--modal delete end-->

              <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th hidden></th>
                  <th>Curriculum Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $query = "select * from tblcurriculum where tblCurriculumFlag=1";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                <tr>
                <td style="width:100px;" hidden><?php echo $row['tblCurriculumId'] ?></td>
                <td style="width:100px;"><?php echo $row['tblCurriculumName'] ?></td>
                <td style="width:100px;"><?php echo $row['tblCurriculumActive'] ?></td>
                <td style="width:100px;"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalOne"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalOne"><i class="fa fa-trash"></i></button></td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane fade" id="tab_2">
               <div class="box">
            <div class="box-header">
            </div>
              <div class="box-body">
               <div class="btn-group" style="margin-bottom: 3%">
                      <button type="button" class="btn btn-info" data-toggle="modal"  onclick="myFunction()" value="Reset form" data-target="#addModalFive"><i class="fa fa-plus"></i>Add</button>
                    </div>
       <!-- Modal starts here-->
  <div class="modal fade" id="addModalFive" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Add Subject</h3>
        </div>
        <form autocomplete="off" method="post" action="saveSubject.php" data-toggle="validator" role="form" name="addSubject" id="addSubject">
        <div class="modal-body">
        
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Subject Code</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" name="txtAddSubjId" id="txtAddSubjId" style="text-transform:uppercase ;">
                </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Subject Name</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" name="txtAddSubj" id="txtAddSubj" style="text-transform:uppercase ;">
                </div>
        </div>  
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnAddLvl" id="btnAddLvl">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="updateModalFive" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Update Subject</h3>
        </div>
        <form autocomplete="off" method="post" action="updateSubject.php" name="UpdSubject" id="UpdSubject">
        <div class="modal-body">
        <div class="form-group"  style="margin-top: 5%">
             <div><input type="hidden" class="form-control" name="txtUpdSubjId" id="txtUpdSubjId"></div>
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Subject Code</label>
            <div class="col-sm-7 selectContainer">
              <input type="text" class="form-control" name="txtUpdSubjId2" id="txtUpdSubjId2" style="text-transform:uppercase ;">
            </div>
        </div> 
        <div class="form-group"  style="margin-top: 15%">
             
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Subject Name</label>
            <div class="col-sm-7 selectContainer">
              <input type="text" class="form-control" name="txtUpdSubj" id="txtUpdSubj" style="text-transform:uppercase;" maxlength="20">
            </div>
        </div>        
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnUpdSubj" id="btnUpdSubj">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  
  <div class="modal fade" id="deleteModalFive" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Delete Subject</h3>
        </div>
        <form method="post" action="deleteSubject.php">
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
        <div><input type="hidden" name="txtDelSubjId" id="txtDelSubjId"/></div>
        <div>
        <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
        </div>
        </div>
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnDelSubj" id="btnDelSubj">Delete</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!--modal delete end-->
              <table id="datatable4" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Subject Code</th>
                  <th>Subject Name</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $query = "select tblSubjectId, tblSubjectDesc from tblsubject where tblSubjectFlag = 1";
                $result = mysqli_query($con, $query);
                
                while($row = mysqli_fetch_array($result))
                {
                ?>
                <tr>
                <td style="width:100px;"><?php echo $row['tblSubjectId']; ?></td>
                <td style="width:100px;"><?php echo $row['tblSubjectDesc']; ?></td>
                <td style="width:100px;"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalFive"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalFive"><i class="fa fa-trash"></i></button></td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
              </div>
              <!-- /.tab-pane -->

        <div class="tab-pane fade" id="tab_3">
          <div class="box">
              <div class="box-body">
               <div class="btn-group" style="margin-bottom: 3%">
                      <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModalThree"><i class="fa fa-plus"></i>Add</button> -->
                    </div>

  <!-- Modal starts here-->
  <div class="modal fade" id="updateModalThree" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Update Division</h3>
        </div>
        <form autocomplete="off" method="post" action="updateDivision.php" name="UpdDivision" id="UpdDivision"
        <div class="modal-body">
        <div class="form-group"  style="margin-top: 5%">
             <div><input type="hidden" name="txtUpdDivId" id="txtUpdDivId"></div>
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Division Name</label>
            <div class="col-sm-7 selectContainer">
              <input type="text" class="form-control" name="txtUpdDiv" id="txtUpdDiv" style="text-transform:uppercase ;">
            </div>
        </div> 
        <div class="modal-footer" style="margin-top: 15%">
        <button type="submit" class="btn btn-info" name="btnUpdDiv" id="btnUpdDiv">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
              <table id="datatable2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th hidden></th>
                  <th>Division Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "select * from tbldivision where tblDivisionFlag=1";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                <tr>
                <td style="width:100px;" hidden><?php echo $row['tblDivisionId']; ?></td>
                <td style="width:100px;"><?php echo $row['tblDivisionName']; ?></td>
                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalThree"><i class="fa fa-edit"></i></button>
                </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
              </div>
              <!-- /.tab-pane -->
       
         <div class="tab-pane fade" id="tab_4">
               <div class="box">
            <div class="box-header">
            </div>
              <div class="box-body">
               <div class="btn-group" style="margin-bottom: 3%">
                      <button type="button" class="btn btn-info" data-toggle="modal"  onclick="myFunction()" value="Reset form" data-target="#addModalFour"><i class="fa fa-plus"></i>Add</button>
                    </div>

   <!-- Modal starts here-->
  <div class="modal fade" id="addModalFour" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" style="font-style: bold">Add Level</h3>
        </div>
        <form autocomplete="off" method="post" action="saveLevel.php" data-toggle="validator" role="form" name="addLevel" id="addLevel"
        <div class="modal-body">
         
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Level Name</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" name="txtAddLvl" id="txtAddLvl" style="text-transform:uppercase ;">
                </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Division</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selAddLvlDiv" id="selAddLvlDiv">
                <option selected="selected">--Select Division--</option>
                <?php
                $query = "select * from tbldivision where tblDivisionFlag = 1";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                  <option value="<?php echo $row['tblDivisionId'] ?>"><?php echo $row['tblDivisionName'] ?></option>
                <?php } ?>
                </select>
                </div>
        </div> 
            <div class="modal-footer" style="margin-top: 30%">
            <button type="submit" class="btn btn-info" name="btnAddLvl" id="btnAddLvl">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
      </form>
      </div>    
    </div>
  </div>

  <div class="modal fade" id="updateModalFour" role="dialog">
    <div class="modal-dialog"> 
<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Update Level</h3>
        </div>
        <form autocomplete="off" data-toggle="validator" role="form" action="updateLevel.php" method="post" name="UpdLevel" id="UpdLevel">
        <div class="modal-body">
        
        <div class="form-group"  style="margin-top: 5%">
             <div><input type="hidden" name="txtUpdLvlId" id="txtUpdLvlId"></div>
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Level Name</label>
            <div class="col-sm-7 selectContainer">
              <input type="text" class="form-control" name="txtUpdLvl" id="txtUpdLvl" style="text-transform:uppercase ;">
            </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Division Name</label>
                <div class="col-sm-7 selectContainer">
                <?php
                $query = "select * from tbldivision where tblDivisionFlag = 1";
                $result = mysqli_query($con, $query);
                ?>
                <select class="form-control choose" style="width: 100%;" name="selUpdLvlDiv" id="selUpdLvlDiv">
               <option selected="selected">--Select Division--</option>
                <?php
                while($row = mysqli_fetch_array($result))
                {
                ?>
                  <option><?php echo $row['tblDivisionName']; ?></option>
                <?php } ?>
                </select>
                </div>
        </div>      
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnUpdLvl" id="btnUpdLvl">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="deleteModalFour" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Delete Level</h3>
        </div>
        <form action="deleteLevel.php" method="post">
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
        <div><input type="hidden" name="txtDelLvlId" id="txtDelLvlId"/></div>
        <div>
        <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
        </div>
        </div>
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnDelLvl" id="btnDelLvl">Delete</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!--modal delete end-->
              <table id="datatable3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th hidden></th>
                  <th>Level Name</th>
                  <th>Division</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "select l.tblLevel_tblDivisionId, l.tblLevelId, l.tblLevelName, d.tblDivisionName from tbllevel l, tbldivision d where tblLevelFlag = 1 and l.tblLevel_tblDivisionId = d.tblDivisionId order by d.tblDivisionId";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_assoc($result))
                {
                ?>
                <tr>
                <td hidden><?php echo $row['tblLevelId'] ?></td>
                <td><?php echo $row['tblLevelName'] ?></td>
                <td><?php echo $row['tblDivisionName'] ?></td>
                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalFour"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalFour"><i class="fa fa-trash"></i></button>
                </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
            <!-- /.box-body -->
       </div>
   <!-- /.tab-pane -->


         <div class="tab-pane fade" id="tab_5">
          <div class="box">
            <div class="box-header">
            </div>
              <div class="box-body">

          <div class="form-inline">
            <div class="container">
            <form method="get">
                      <label>View by Curriculum: </label>
                      <select class="form-control" style="width: 30%" name="selCurrName" id="selCurrName" onchange="showDetail(); ">
                        <option selected>--Select Here--</option>
                        <?php
                        $query = "select tblCurriculumId, tblCurriculumName from tblcurriculum where tblCurriculumFlag=1";
                        $result = mysqli_query($con, $query);
                        while($row = mysqli_fetch_array($result))
                        {
                        ?>
                        <option value="<?php echo $row['tblCurriculumId'] ?>"><?php echo $row['tblCurriculumName'] ?></option>
                        <?php } ?>
                      </select>
                      <div id="detail"></div>
            </form>
            </div>
            </div>
             <div class="btn-group" style="margin-bottom: 3%; margin-top: 1%">
                      <button type="button" class="btn btn-info" id="btnAdd" data-toggle="modal" data-target="#addModalTwo" disabled><i class="fa fa-plus"></i>Add</button>
            </div>

    <!-- Modal starts here-->
  <div class="modal fade" id="addModalTwo" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Add Details</h3>
        </div>
        <form method="post" action="saveCurriculumDetail.php" data-toggle="validator" role="form" name="addCurrDetails" id="addCurrDetails">
        <div class="modal-body">
         
        <div class="form-group" style="margin-top: 5%">
        <div><input type="hidden" name="txtAddDetCurr" id="txtAddDetCurr"/></div>
                <label class="col-sm-4" style="text-align: right">Division</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selAddDetDiv" id="selAddDetDiv" onchange="changeDiv();">
                  <option disabled="disabled" selected="selected">--SELECT DIVISION--</option>
                  <?php
                  $query = "select * from tbldivision where tblDivisionFlag = 1";
                  $result = mysqli_query($con, $query);
                  while($row = mysqli_fetch_array($result))
                  {
                  ?>
                  <option value="<?php echo $row['tblDivisionId']; ?>"><?php echo $row['tblDivisionName']; ?></option>
                  <?php } ?>
                </select>
                </div>
        </div>   
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Level</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selAddDetLvl" id="selAddDetLvl" disabled>
                  <option disabled="disabled" selected="selected">--SELECT LEVEL--</option>
                  <?php
                  $query = "select * from tbllevel where tblLevelFlag = 1";
                  $result = mysqli_query($con, $query);
                  while($row = mysqli_fetch_array($result))
                  {
                  ?>
                  <option value="<?php echo $row['tblLevelId']; ?>"><?php echo $row['tblLevelName']; ?></option>
                  <?php } ?>
                </select>
                </div>
        </div>   
        <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">Subject Code</label>
                <div class="col-sm-7 selectContainer">
                <select class="required form-control choose" style="width: 100%;" name="selAddDetSubj" id="selAddDetSubj" onchange="passSubjName();">
                  <option disabled="disabled" selected="selected">--SELECT SUBJECT CODE--</option>
                  <?php
                  $query = "select * from tblsubject where tblSubjectFlag = 1";
                  $result = mysqli_query($con, $query);
                  while($row = mysqli_fetch_array($result))
                  {
                  ?>
                  <option value="<?php echo $row['tblSubjectId']; ?>"><?php echo $row['tblSubjectId']; ?></option>
                  <?php } ?>
                </select>
                </div>
        </div>   
        <div class="form-group" style="margin-top: 35%">
                <label class="col-sm-4" style="text-align: right">Subject Name</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" name="txtAddDetSubj" id="txtAddDetSubj" disabled/>
                </div>
        </div>        
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnAddDet" id="btnAddDet">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="updateModalTwo" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Update Curriculum Details</h3>
        </div>
        <form autocomplete="off" data-toggle="validator" role="form" method="post" action="updateCurriculumDetail.php" name="UpdCurrDetails" id="UpdCurrDetails">
        <div class="modal-body">
      <div class="form-group" style="margin-top: 5%">
                <div><input type="hidden" name="txtUpdDetCurrId" id="txtUpdDetCurrId"/>
                <input type="hidden" name="txtUpdDetId" id="txtUpdDetId"/>
                <input type="hidden" name="txtUpdDetDivId" id="txtUpdDetDivId"/>
                <input type="hidden" name="txtUpdDetLvlId" id="txtUpdDetLvlId"/></div>
                <label class="col-sm-4" style="text-align: right">Division</label>
                <div class="col-sm-7" selectContainer>
                <select class="form-control choose" style="width: 100%;" name="selUpdDetDiv" id="selUpdDetDiv" onchange="changeUpdDiv();">
                  <option selected="selected">--SELECT DIVISION--</option>
                  <?php
                  $query = "select * from tbldivision where tblDivisionFlag = 1";
                  $result = mysqli_query($con, $query);
                  while($row = mysqli_fetch_array($result))
                  {
                  ?>
                  <option value="<?php echo $row['tblDivisionName']; ?>"><?php echo $row['tblDivisionName']; ?></option>
                  <?php } ?>
                </select>
                </div>
        </div>   
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Level</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selUpdDetLvl" id="selUpdDetLvl" disabled>
                  <option selected="selected">--SELECT LEVEL--</option>
                  <?php
                  $query = "select * from tbllevel where tblLevelFlag = 1";
                  $result = mysqli_query($con, $query);
                  while($row = mysqli_fetch_array($result))
                  {
                  ?>
                  <option value="<?php echo $row['tblLevelName']; ?>"><?php echo $row['tblLevelName']; ?></option>
                  <?php } ?>
                </select>
                </div>
        </div>   
        <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">Subject Code</label>
                <div class="col-sm-7">
                <select class="form-control choose" style="width: 100%;" name="selUpdDetSubj" id="selUpdDetSubj" onchange="passSubjNameUpd();">
                  <option selected="selected">--SELECT SUBJECT CODE--</option>
                  <?php
                  $query = "select * from tblsubject where tblSubjectFlag = 1";
                  $result = mysqli_query($con, $query);
                  while($row = mysqli_fetch_array($result))
                  {
                  ?>
                  <option value="<?php echo $row['tblSubjectId']; ?>"><?php echo $row['tblSubjectId']; ?></option>
                  <?php } ?>
                </select>
                </div>
        </div>   
        <div class="form-group" style="margin-top: 35%">
                <label class="col-sm-4" style="text-align: right">Subject Name</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="txtUpdDetSubj" id="txtUpdDetSubj" disabled/>
                </div>
        </div>           
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnUpdDet" id="btnUpdDet">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="deleteModalTwo" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Delete Detail</h3>
        </div>
        <form method="post" action="deleteCurriculumDetail.php">
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
          <div><input type="hidden" name="txtDelDetId" id="txtDelDetId"/></div>
          <div>
            <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
          </div>
        </div>
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnDelDet" id="btnDelDet">Delete</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!--modal delete end-->
              <table id="datatable1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th hidden>Curriculum Id</th>
                  <th hidden>Detail Id</th>
                  <th hidden>Division Id</th>
                  <th hidden>Level Id</th>
                  <th>Division</th>
                  <th>Level</th>
                  <th>Subject Code</th>
                  <th>Subject Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <!-- <tbody>
                <?php
                $query = "select c.tblCurriculumId, cd.tblCurriculumDetailId, d.tblDivisionName, d.tblDivisionId, l.tblLevelId, l.tblLevelName, s.tblSubjectId, s.tblSubjectDesc from tblcurriculum c,tblcurriculumdetail cd, tbldivision d, tbllevel l, tblsubject s where cd.tblCurriculumDetail_tblCurriculumId = c.tblCurriculumId and cd.tblCurriculumDetail_tblDivisionId = d.tblDivisionId and cd.tblCurriculumDetail_tblLevelId = l.tblLevelId and cd.tblCurriculumDetail_tblSubjectId = s.tblSubjectId and cd.tblCurriculumFlag=1";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                <tr>
                  <td hidden><?php echo $row['tblCurriculumId'] ?></td>
                  <td hidden><?php echo $row['tblCurriculumDetailId'] ?></td>
                  <td hidden><?php echo $row['tblDivisionId'] ?></td>
                  <td hidden><?php echo $row['tblLevelId'] ?></td>
                  <td><?php echo $row['tblDivisionName'] ?></td>
                  <td><?php echo $row['tblLevelName'] ?></td>
                  <td><?php echo $row['tblSubjectId'] ?></td>
                  <td><?php echo $row['tblSubjectDesc'] ?></td>
                  <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalTwo"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalTwo"><i class="fa fa-trash"></i></button></td>
                </tr>
                <?php } ?>
                </tbody> -->
              </table>
            </div>
            </div>
            <!-- /.box-body -->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
          </div>
          <!-- box body -->
         </div>
         <!-- box box-default -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- row -->  
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
<script>
function showDetail()
  {
    document.getElementById("btnAdd").disabled=false;
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","changeTblCurrDetail.php?selCurrName="+document.getElementById("selCurrName").value,false);
    xmlhttp.send(null);
    
    document.getElementById("datatable1").innerHTML=xmlhttp.responseText;
    var currId = document.getElementById("selCurrName").value;
    document.getElementById("txtAddDetCurr").value = currId
  }
function changeDiv()
  {
    document.getElementById('selAddDetLvl').disabled = false;
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","changeDivCurriculumDetail.php?selAddDetDiv="+document.getElementById("selAddDetDiv").value,false);
    xmlhttp.send(null);
    
    document.getElementById("selAddDetLvl").innerHTML=xmlhttp.responseText;

  }
  function changeUpdDiv()
  {
    document.getElementById('selUpdDetLvl').disabled = false;
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","changeDivUpdDetail.php?selUpdDetDiv="+document.getElementById("selUpdDetDiv").value,false);
    xmlhttp.send(null);
    
    document.getElementById("selUpdDetLvl").innerHTML=xmlhttp.responseText;

  }
function passSubjName()
  {
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","passSubjName.php?selAddDetSubj="+document.getElementById("selAddDetSubj").value,false);
    xmlhttp.send(null);
    
    document.getElementById("txtAddDetSubj").value=xmlhttp.responseText;

  }
function passSubjNameUpd()
  {
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","passSubjNameUpdDetail.php?selUpdDetSubj="+document.getElementById("selUpdDetSubj").value,false);
    xmlhttp.send(null);
    
    document.getElementById("txtUpdDetSubj").value=xmlhttp.responseText;

  }
</script>
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
<script>
  $(function () {
    $("#datatable").DataTable();
    $("#datatable1").DataTable();
    $("#datatable2").DataTable();
    $("#datatable3").DataTable();
    $("#datatable4").DataTable();
    $("#datatable5").DataTable();
  });
</script>

<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

<script>
   $(document).ready(function() {
    $('#addCurriculum').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            txtAddCurr: {
                validators: {
                  
                    stringLength: {  
                        min: 3,
                        max: 20,

                        message: 'Please enter 3-20 characters.'
                    },
                       regexp: {
                        regexp: /^[a-zA-Z_][0-9a-zA-Z_][\w-'\s]+$/,
                        message: 'The first letter should be an alphabet (Must not contain special characters.).'
                    },
                        notEmpty: {
                        message: 'Curriculum name is required'
                    }
                }
            },
            selAddActive: {
                validators: {
                  notEmpty: {
                      message: 'Status is required.'
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
           $('#addCurriculum').find().focus();
        })
        .on('hidden.bs.modal', function () {
            $('#addCurriculum').bootstrapValidator('resetForm', true);
        });
});
</script>

<script>
   $(document).ready(function() {
    $('#addSubject').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            txtAddSubjId: {
                validators: {
                    stringLength: {  
                        min: 5,
                        max: 20,
                        message: 'Please enter 5-20 characters.'
                    },

                    regexp: {
                        regexp: /^[a-zA-Z_][0-9a-zA-Z_][\w-'\s]+$/,
                        message: 'The first letter should be an alphabet (Must not contain special characters.).'
                    },
                        notEmpty: {
                        message: 'Subject code is required'
                    }
                }
            },
            txtAddSubj: {
                validators: {
                    stringLength: {  
                        min: 5,
                        max: 30,
                        message: 'Please enter 5-30 characters.'
                    },

                     regexp: {
                        regexp: /^[a-zA-Z_][0-9a-zA-Z_][\w-'\s]+$/,
                        message: 'The first letter should be an alphabet (Must not contain special characters.).'
                    },
                        notEmpty: {
                        message: 'Subject name is required'
                    }
                }
            },
            selAddSubjId: {
                validators: {
                  notEmpty: {
                      
                      message: 'Status is required.'
                  },
                }
            },
            }
        })
           .on('success.form.bv', function (e) {
        // Prevent form submission
        e.preventDefault();
    });

    $('#addModalFive')
       .on('shown.bs.modal', function () {
           $('#addSubject').find().focus();
        })
        .on('hidden.bs.modal', function () {
            $('#addSubject').bootstrapValidator('resetForm', true);
        });
});
</script>

<script>
   $(document).ready(function() {
    $('#addLevel').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            txtAddLvl: {
                validators: {
                    stringLength: {  
                        min: 5,
                        max: 20,
                        message: 'Please enter 5-20 characters.'
                    },

                     regexp: {
                        regexp: /^[a-zA-Z_][0-9a-zA-Z_][\w-'\s]+$/,
                        message: 'The first letter should be an alphabet (Must not contain special characters.).'
                    },
                        notEmpty: {
                        message: 'Level name is required'
                    }
                }
            },
          selAddLvlDiv: {
                validators: {
                  greaterThan: {
                      value: 1,
                      message: 'Division is required.'
                  },
                }
            },
           selAddLvlAct: {
                validators: {
                  notEmpty: {     
                      message: 'Status is required.'
                  },
                }
            },
            }
        })
        .on('success.form.bv', function (e) {
        // Prevent form submission
        e.preventDefault();
    });

    $('#addModalFour')
       .on('shown.bs.modal', function () {
           $('#addLevel').find().focus();
        })
        .on('hidden.bs.modal', function () {
            $('#addLevel').bootstrapValidator('resetForm', true);
        });
});
</script>

<script>
   $(document).ready(function() {
    $('#addCurrDetails').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          selAddDetDiv: {
                validators: {
                  notEmpty: {
                      message: 'Division is required.'
                  },
                }
            },
            selAddDetLvl: {
                validators: {
                  notEmpty: {
                      message: 'Level is required.'
                  },
                }
            },
            selAddDetSubj: {
                validators: {
                  notEmpty: {
                      
                      message: 'Subject is required.'
                  },
                }
            },
            }
        })
        .on('success.form.bv', function (e) {
        // Prevent form submission
        e.preventDefault();
    });

    $('#addModalTwo')
       .on('shown.bs.modal', function () {
           $('#addCurrDetails').find().focus();
        })
        .on('hidden.bs.modal', function () {
            $('#addCurrDetails').bootstrapValidator('resetForm', true);
        });
});
};
</script>

<!--             UPDATES                 -->

<script>
   $(document).ready(function() {
    $('#UpdCurriculum').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            txtUpdCurr: {
                validators: {
                    stringLength: {  
                        min: 3,
                        max: 20,
                        message: 'You have to input least input 3 characters'
                    },

                    regexp: {
                        regexp: /^[a-zA-Z_][0-9a-zA-Z_][\w-'\s]+$/,
                        message: 'The first letter should be an alphabet (Must not contain special characters.).'
                    },
                        notEmpty: {
                        message: 'Curriculum name is required'
                    }
                }
            },
            selUpdActive: {
                validators: {
                  notEmpty: {
                      message: 'Status is required.'
                  },
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
           $('#UpdCurriculum').find().focus();
        })
        .on('hidden.bs.modal', function () {
            $('#UpdCurriculum').bootstrapValidator('resetForm', true);
        });
});
</script>

<script>
   $(document).ready(function() {
    $('#UpdSubject').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            txtUpdSubj: {
                validators: {
                    stringLength: {  
                        min: 5,
                        max: 20,
                        message: 'You have to input characters between 5 to 20.'
                    },

                    regexp: {
                        regexp: /^[a-zA-Z_][0-9a-zA-Z_][\w-'\s]+$/,
                        message: 'The first letter should be an alphabet (Must not contain special characters.).'
                    },
                        notEmpty: {
                        message: 'Curriculum name is required'
                    }
                }
            },
            selUpdActive: {
                validators: {
                  notEmpty: {
                      message: 'Status is required.'
                  },
                }
            },
            }
        })
    
     .on('success.form.bv', function (e) {
        // Prevent form submission
        e.preventDefault();
    });

    $('#updateModalFive')
       .on('shown.bs.modal', function () {
           $('#UpdSubject').find().focus();
        })
        .on('hidden.bs.modal', function () {
            $('#UpdSubject').bootstrapValidator('resetForm', true);
        });
});
</script>

<script>
   $(document).ready(function() {
    $('#UpdDivision').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            txtUpdDiv: {
                validators: {
                    stringLength: {  
                        min: 5,
                        max: 20,
                        message: 'You have to input characters between 5 to 20.'
                    },

                    regexp: {
                        regexp: /^[a-zA-Z_][0-9a-zA-Z_][\w-'\s]+$/,
                        message: 'The first letter should be an alphabet (Must not contain special characters.).'
                    },
                        notEmpty: {
                        message: 'Division name is required'
                    }
                }
            }
            }
        })
    
     .on('success.form.bv', function (e) {
        // Prevent form submission
        e.preventDefault();
    });

    $('#updateModalThree')
       .on('shown.bs.modal', function () {
           $('#UpdDivision').find().focus();
        })
        .on('hidden.bs.modal', function () {
            $('#UpdDivision').bootstrapValidator('resetForm', true);
        });
});
</script>

<script>
   $(document).ready(function() {
    $('#UpdLevel').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           txtUpdLvl: {
                validators: {
                  
                    stringLength: {  
                        min: 5,
                        max: 20,

                        message: 'Please enter between 5 to 20 characters.'
                    },
                       regexp: {
                        regexp: /^[a-zA-Z_][0-9a-zA-Z_][\w-'\s]+$/,
                        message: 'The first letter should be an alphabet (Must not contain special characters.).'
                    },
                        notEmpty: {
                        message: 'Level name is required'
                    }
                }
            },
            selUpdLvlDiv: {
                validators: {
                  notEmpty: {
                      message: 'Division is required.'
                  },
                }
            },
            selUpdLvlAct: {
                validators: {
                  notEmpty: {
                      message: 'Status is required.'
                  },
                }
            },
            }
        })
         .on('success.form.bv', function (e) {
        // Prevent form submission
        e.preventDefault();
    });

    $('#updateModalFour')
       .on('shown.bs.modal', function () {
           $('#UpdLevel').find().focus();
        })
        .on('hidden.bs.modal', function () {
            $('#UpdLevel').bootstrapValidator('resetForm', true);
        });
});
</script>

<script>
   $(document).ready(function() {
    $('#addCurrDetails').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          selAddDetDiv: {
                validators: {
                  notEmpty: {
                      message: 'Division Name is required.'
                  },
                }
            },
            selAddDetLvl: {
                validators: {
                  notEmpty: {
                      message: 'Level Name is required.'
                  },
                }
            },
            selAddDetSubj: {
                validators: {
                  notEmpty: {
                      
                      message: 'Subject is required.'
                  },
                }
            },
            }
        })
        .on('success.form.bv', function (e) {
        // Prevent form submission
        e.preventDefault();
    });

    $('#addModalTwo')
       .on('shown.bs.modal', function () {
           $('#addCurrDetails').find().focus();
        })
        .on('hidden.bs.modal', function () {
            $('#addCurrDetails').bootstrapValidator('resetForm', true);
        });
});

   document.querySelector('ul.examples li.timer button').onclick = function(){
  swal({
    title: "Auto close alert!",
    text: "I will close in 2 seconds.",
    timer: 2000,
    showConfirmButton: false
  });
};
</script>

<script>
   $(document).ready(function() {
    $('#UpdCurrDetails').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          selUpdDetDiv: {
                validators: {
                  notEmpty: {
                      message: 'Division Name is required.'
                    }
                  },
                }
            },
            selUpdDetLvl: {
                validators: {
                  notEmpty: {
                      message: 'Level Name is required.'
                  },
                }
            },
            selUpdDetSubj: {
                validators: {
                  notEmpty: {
                      
                      message: 'Subject is required.'
                  },
                }
            },
            }
        })
        .on('success.form.bv', function (e) {
        // Prevent form submission
        e.preventDefault();
    });

    $('#updateModalTwo')
       .on('shown.bs.modal', function () {
           $('#UpdCurrDetails').find().focus();
        })
        .on('hidden.bs.modal', function () {
            $('#UpdCurrDetails').bootstrapValidator('resetForm', true);
        });
});
};
</script>
</body>
</html>
