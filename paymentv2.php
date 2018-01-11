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

  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- sweetalert -->
  <script src="sweetalert-master/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css">
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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

<script>
    function changeTblFee()
  {
    var lvl = document.getElementById("selFeeLvl").value;
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","changeTblFee.php?selFeeLvl="+document.getElementById("selFeeLvl").value,false);
    xmlhttp.send(null);
    
    document.getElementById("datatable").innerHTML=xmlhttp.responseText;

  }

  function changeSchedSchemeLvl()
  {
    document.getElementById("selSchedFee").disabled = false;
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","changeSchedSchemeLvl.php?selSchedLvl="+document.getElementById("selSchedLvl").value,false);
    xmlhttp.send(null);
  }
    function changeFee()
  {
    document.getElementById("selSchedScheme").disabled = false;
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","changeSchedFee.php?selSchedFee="+document.getElementById("selSchedFee").value,false);
    xmlhttp.send(null);
    
    document.getElementById("selSchedScheme").innerHTML=xmlhttp.responseText;

  }
  function changeTblSchedScheme()
  {
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","changeTblSchedScheme.php?selSchedScheme="+document.getElementById("selSchedScheme").value,false);
    xmlhttp.send(null);
    
    document.getElementById("datatable2").innerHTML=xmlhttp.responseText;

  }
  function changeTblFeeDetail()
  {
    document.getElementById("btnbtn").disabled=false;
    var feeId2 = document.getElementById("selFee").value;
    document.getElementById("txtUpdDetFeeId").value = feeId2;
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","changeTblFeeDetail.php?selFee="+document.getElementById("selFee").value,false);
    xmlhttp.send(null);
    
    document.getElementById("datatable4").innerHTML=xmlhttp.responseText;

  }
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
    var f1=document.getElementById('txtUpdFeeId');
    var f2=document.getElementById('txtUpdFee');
    var f3=document.getElementById('txtDelFee');
    f1.value=cells[2].innerHTML;
    f2.value=cells[2].innerHTML;
    f3.value=cells[2].innerHTML;
  };
}})();
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
    var f1=document.getElementById('txtUpdSchemeId');
    var f2=document.getElementById('txtUpdFeeName');
    var f3=document.getElementById('txtUpdScheme');
    var f4=document.getElementById('txtUpdSchemeNo');
    var f5=document.getElementById('txtDelScheme');
    f1.value=cells[0].innerHTML;
    f2.value=cells[1].innerHTML;
    f3.value=cells[2].innerHTML;
    f4.value=cells[3].innerHTML;
    f5.value=cells[0].innerHTML;
  };
}})();
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
    var target=event.target||event.srcElement;
    while (target&&target.nodeName!='TR'){
      target=target.parentElement;
    }
    var cells=target.cells;
    
    if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
    var f1=document.getElementById('txtUpdDetLvl');
    var f2=document.getElementById('txtUpdDetName');
    var f3=document.getElementById('txtUpdDetAmnt');
    var f4=document.getElementById('txtUpdDetLvlId');
    var f5=document.getElementById('txtTempDetName');
    var f6=document.getElementById('txtDelFeeDet');
    var f7=document.getElementById('txtDelAmnt');
    f1.value=cells[1].innerHTML;
    f2.value=cells[2].innerHTML;
    f3.value=cells[3].innerHTML;
    f4.value=cells[0].innerHTML;
    f5.value=cells[2].innerHTML;
    f6.value=cells[2].innerHTML;
    f7.value=cells[3].innerHTML;
  };
}})();

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
      var f1=document.getElementById('txtDetId');   
      var f2=document.getElementById('txtDetNo');   
      var f3=document.getElementById('txtDetDueDate');    
      var f4=document.getElementById('txtDetAmount');   
      var f5=document.getElementById('txtDetDelId');    
      f1.value=cells[0].innerHTML;    
      f2.value=cells[1].innerHTML;    
      f3.value=cells[2].innerHTML;    
      f4.value=cells[3].innerHTML;    
      f5.value=cells[0].innerHTML;    
    };    
  }})();

function getFeeId()
{
  var fee = document.getElementById("txtFeeDetName").value;
  document.getElementById("txtFeeDet").value = fee;
  var feeId = document.getElementById("selFee").value;
  document.getElementById("txtFeeDetFee").value = feeId;
  
}

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
    <section class="content-header" style="margin-bottom: -25px; ">
    <h5>
      <ol class="breadcrumb">
        <li><a href="#" style="color: black;"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#" style="color: black;">Maintenance</a></li>
        <li class="active">Payment</li>
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
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Fees</a></li>
              <li><a href="#tab_2" data-toggle="tab">Payment Scheme Type</a></li>
              <li><a href="#tab_3" data-toggle="tab">Payment Schedule</a></li>
              <li><a href="#tab_4" data-toggle="tab">Fee Details</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
            <div class="box">
            <div class="box-header">
            </div>

              <div class="box-body">
              <div class="container">
                      <label class="col-sm-1">Level: </label>
                      <select class="form-control" style="width: 30%; margin-bottom: 1%" name="selFeeLvl" id="selFeeLvl" onchange = "changeTblFee();">
                        <option>--Select Here--</option>
                        <?php
                        $query = "select tblLevelId, tblLevelName from tbllevel where tblLevelFlag = 1";
                        $result = mysqli_query($con, $query);
                        while($row = mysqli_fetch_array($result))
                        {
                        ?>
                        <option value="<?php echo $row['tblLevelId'] ?>"><?php echo $row['tblLevelName'] ?></option>
                        <?php } ?>  
                      </select>
            </div>
                    <div class="btn-group" style="margin-bottom: 3%">
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModalOne"><i class="fa fa-plus"></i>Add</button>
                    </div>

 <!-- Modal starts here-->
  <div class="modal fade" id="addModalOne" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Add Fee</h3>
        </div>
        <form method="post" action="saveFee.php">
        <div class="modal-body">
        <input name="txtAddFeeLvlId" id="txtAddFeeLvlId" hidden/>
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Fee Name</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="txtAddFeeName" id="txtAddFeeName" style="text-transform:uppercase ;">
                </div>
        </div>       
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info">Save</button>
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
          <h3 class="modal-title" style="font-style: bold" id="feename">Update Fee Name</h3>
        </div>
        <form method="post" action="updateFee.php">
        <div class="modal-body">
        
        <div class="form-group"  style="margin-top: 3%">
             <input type="hidden" class="form-control" name="txtUpdFeeId" id="txtUpdFeeId">
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Fee Name</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="txtUpdFee" id="txtUpdFee" style="text-transform:uppercase ;">
            </div>
        </div>     
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnUpdFee" id="btnUpdFee">Save</button>
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
          <h3 class="modal-title" style="font-style: bold">Delete Fee</h3>
        </div>
        <form method="post" action="deleteFee.php">
        <div class="modal-body">
        <input type="text" name="txtDelFee" id="txtDelFee" hidden/>
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
              <h4><center>Are you sure you want to delete this record?</center></h4>
            </div>
                  
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnDelFee" id="btnDelFee">Delete</button>
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
                  <th>Fee Name</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <!-- <tr>
                  <td>Tuition Fee</td>
                  <td>12,000</td>
                   <td>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalOne"><i class="fa fa-edit"></i></button>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalOne"><i class="fa fa-trash"></i></button>
                   </td>
                </tr> -->
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
              </div>
              <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
          <div class="box">
            <div class="box-header">
            </div>
              <div class="box-body">

             <div class="btn-group" style="margin-bottom: 3%; margin-top: 1%">
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModalTwo"><i class="fa fa-plus"></i>Add</button>
            </div>

    <!-- Modal starts here-->
  <div class="modal fade" id="addModalTwo" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Add Payment Scheme</h3>
        </div>
        <form method="post" action="saveScheme.php">
        <div class="modal-body">
         
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Fee</label>
                <div class="col-sm-7">
                <select class="form-control choose" style="width: 100%;" name="selAddSchemeFee" id="selAddSchemeFee">
                  <option selected="selected">--Select Fee--</option>
                  <?php
                    $query = "select distinct tblFeeName from tblfee where tblFeeFlag = 1";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_array($result))
                    {
                  ?>
                  <option value="<?php echo $row['tblFeeName'] ?>"><?php echo $row['tblFeeName'] ?></option>
                  <?php } ?>
                </select>
                </div>
        </div>
        <div class="form-group"  style="margin-top: 15%">
             
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Scheme Name</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="txtAddScheme" id="txtAddScheme" style="text-transform:uppercase;">
            </div>
        </div>   
        <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">No. of Payments</label>
                <div class="col-sm-7">
                <input class="rem" type="number" min="1" max="31" name="txtAddSchemeNo" id="txtAddSchemeNo">
                </div>
        </div>  
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info">Save</button>
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
          <h3 class="modal-title" style="font-style: bold">Update Payment Scheme</h3>
        </div>
        <form method="post" action="updateScheme.php">
        <div class="modal-body">
        <input type="text" name="txtUpdSchemeId" id="txtUpdSchemeId" hidden/>
        <div class="form-group"  style="margin-top: 5%">
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Fee</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="txtUpdFeeName" id="txtUpdFeeName" disabled>
            </div>
        </div> 
      <div class="form-group"  style="margin-top: 15%">
             
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Scheme Name</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="txtUpdScheme" id="txtUpdScheme">
            </div>
        </div>   
        <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">No. of Payments</label>
                <div class="col-sm-7">
                <input class="rem" type="number" min="1" max="31" name="txtUpdSchemeNo" id="txtUpdSchemeNo">
                </div>
        </div>  
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnUpdScheme" id="btnUpdScheme">Save</button>
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
          <h3 class="modal-title" style="font-style: bold">Delete Payment Scheme</h3>
        </div>
        <form method="post" action="deleteScheme.php">
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
          <input type="text" name="txtDelScheme" id="txtDelScheme" hidden/>
          <h4><center>Are you sure you want to delete this record?</center></h4>
        </div>
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnDelScheme" id="btnDelScheme">Delete</button>
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
                  <th hidden>Scheme Id</th>
                  <th>Fee</th>
                  <th>Scheme</th>
                  <th>No. of Payments</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "select s.tblSchemeId, f.tblFeeName, s.tblSchemeType, s.tblSchemeNoOfPayment from tblscheme s, tblfee f where s.tblScheme_tblFeeId = f.tblFeeId and f.tblFeeFlag = 1 and s.tblSchemeFlag=1";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                <tr>
                  <td hidden><?php echo $row['tblSchemeId'] ?></td>
                  <td><?php echo $row['tblFeeName'] ?></td>
                  <td><?php echo $row['tblSchemeType'] ?></td>
                  <td><?php echo $row['tblSchemeNoOfPayment'] ?></td>
                   <td>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalTwo"><i class="fa fa-edit"></i></button>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalTwo"><i class="fa fa-trash"></i></button>
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
        <div class="tab-pane" id="tab_3">
          <div class="box">
            <div class="box-header">
            </div>
              <div class="box-body">
              <div class="form-inline">
            <div class="container">
                  <label class="col-sm-1">Level: </label>   
                        <select class="form-control" style="width: 30%; margin-bottom: 1%" name="selSchedLvl" id="selSchedLvl" onchange="changeSchedSchemeLvl()">  
                          <option>--Select Here--</option>    
                        <?php   
                        $query="select * from tbllevel where tblLevelFlag=1";   
                        $result=mysqli_query($con, $query);   
                        while($row=mysqli_fetch_array($result))   
                        {   
                        ?>    
                        <option value="<?php echo $row['tblLevelId']; ?>"><?php echo $row['tblLevelName'] ?></option>   
                        <?php } ?>    
                        </select>   
              </div>    
              </div>    
                <div class="form-inline">   
              <div class="container">
                      <label class="col-sm-1">Fee: </label>
                      <select class="form-control" style="width: 30%; margin-bottom: 1%" name="selSchedFee" id="selSchedFee" onchange="changeFee()" disabled>
                        <option>--Select Here--</option>
                        <?php 
                          $query = "select tblFeeId, tblFeeName from tblfee where tblFeeFlag = 1";
                          $result = mysqli_query($con, $query);
                          while($row = mysqli_fetch_array($result))
                          {
                        ?>
                        <option value="<?php echo $row['tblFeeId'] ?>"><?php echo $row['tblFeeName'] ?></option>
                        <?php } ?>
                      </select>
            </div>
            </div>
            <div class="form-inline">
            <div class="container">
                      <label class="col-sm-1">Scheme: </label>
                      <select class="form-control" style="width: 30%; margin-bottom: 1%" disabled name="selSchedScheme" id="selSchedScheme" onchange="changeTblSchedScheme()">
                        <option>--Select Here--</option>
                      </select>
            </div>
            </div>
               <div class="btn-group" style="margin-bottom: 3%">

                    </div>
  <div class="modal fade" id="updateModalThree" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Update Schedule</h3>
        </div>
        <form method="post" action="updateSchemeDetail.php">
        <div class="modal-body">
        <input type="hidden" class="form-control" name="txtDetId" id="txtDetId">
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Payment Order</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" readonly name="txtDetNo" id="txtDetNo">
                </div>
        </div>
        <div class="form-group"  style="margin-top: 15%">
             
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Due Date</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtDetDueDate" id="txtDetDueDate">
            </div>
        </div> 
        <div class="form-group"  style="margin-top: 25%">
             
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Amount on Due Date</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="txtDetAmount" id="txtDetAmount">
            </div>
        </div>       
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info"  name="btnDetSave" id="btnDetSave">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  
  <div class="modal fade" id="deleteModalThree" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Reset</h3>
        </div>
        <form method="post" action="deleteSchemeDetail.php">
        <div class="modal-body">
        <input type="hidden" class="form-control" name="txtDetDelId" id="txtDetDelId">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
              <h3 align="center"> Are you sure you want to reset?</h3>
            </div>
                  
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnReset" id="bnReset">Reset</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!--modal delete end-->
              <table id="datatable2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Payment</th>
                  <th>Due Date</th>
                  <th>Amount on Due Date</th>
                  <th>Action</th>
                </tr>
                </thead>
               
              </table>
            </div>
            </div>
            <!-- /.box-body -->
              </div>
                <!-- /.tab-pane -->

      <div class="tab-pane" id="tab_4">
          <div class="box">
            <div class="box-header">
            </div>
              <div class="box-body">
              <div class="form-inline">
            <div class="container">
                      <label class="col-sm-1">Fee: </label>
                      <select class="form-control" style="width: 30%; margin-bottom: 1%" name="selFee" id="selFee" onchange="changeTblFeeDetail()">
                        <option>--Select Here--</option>
                        <?php
                        $query = "select tblFeeId, tblFeeName from tblfee where tblFeeFlag=1";
                        $result=mysqli_query($con, $query);
                        while($row=mysqli_fetch_array($result))
                        {
                        ?>
                        <option value="<?php echo $row['tblFeeId'] ?>"><?php echo $row['tblFeeName'] ?></option>
                        <?php } ?>
                      </select>
            </div>
            </div>
            
               <div class="btn-group" style="margin-bottom: 3%">
                  <button type="button" class="btn btn-info" id="btnbtn" name="btnbtn" data-toggle="modal" data-target="#addModalFive" disabled="disabled"><i class="fa fa-plus"></i>Add</button>
              </div>
  
  <div class="modal fade" id="addModalFive" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Add Fee Detail</h3>
        </div>
        <div class="modal-body">
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Detail Name:</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="txtFeeDetName" id="txtFeeDetName" style="text-transform:uppercase ;">
                </div>
        </div>
        
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="button" class="btn btn-info" data-toggle="modal" href="#updateModalTemp" onclick="getFeeId()">Next</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="updateModalTemp" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Add Amount Detail</h3>
        </div>
        <form method="post" action="saveFeeDetail.php">
        <div class="modal-body">
        <div><input type="hidden" name="txtFeeDet" id="txtFeeDet"/>
        <input type="hidden" name="txtFeeDetFee" id="txtFeeDetFee"/></div>
        <?php
        $query = "select tblLevelName, tblLevelId from tbllevel where tblLevelFlag = 1";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result))
        {
        ?>
        <div class="form-group">
                <label class="col-sm-4" style="text-align: right; margin-top: 5%"><?php echo $row['tblLevelName'] ?></label>
                <div class="col-sm-7" style="margin-top: 5%">
                <input type="text" class="form-control" name="txtName[]">
                </div>
        </div>
        <?php } ?>  
        </div>
        <div class="modal-footer" style="margin-top: 70%">
        <button type="submit" class="btn btn-info">Save</button>
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
          <h3 class="modal-title" style="font-style: bold">Update Fee Detail</h3>
        </div>
        <form method="post" action="updateFeeDetail.php">
        <div class="modal-body">
        <input name="txtUpdDetFeeId" id="txtUpdDetFeeId" hidden/>
        <input name="txtUpdDetLvlId" id="txtUpdDetLvlId" hidden/>
        <input name="txtTempDetName" id="txtTempDetName" hidden/>
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Level Name:</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" disabled name="txtUpdDetLvl" id="txtUpdDetLvl">
                </div>
        </div>
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Detail Name:</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="txtUpdDetName" id="txtUpdDetName">
                </div>
        </div>
        <div class="form-group"  style="margin-top: 25%">
             
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Amount</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="txtUpdDetAmnt" id="txtUpdDetAmnt">
            </div>
        </div>       
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" id="btnFeeDet" name="btnFeeDet">Save</button>
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
          <h3 class="modal-title" style="font-style: bold">Delete</h3>
        </div>
        <form method="post" action="deleteFeeDetail.php">
        <div class="modal-body">
        <div><input type="hidden" name="txtDelFeeDet" id="txtDelFeeDet"/>
        <input type="hidden" name="txtDelAmnt" id="txtDelAmnt"/></div>
       <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
       <h3><center>Are you sure you want to delete this record?</center></h3>
       </div>
                  
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnDelFeeDet" id="btnDelFeeDet">Delete</button>
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
                  <th>Level</th>
                  <th>Detail Name</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
                </thead>
                
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
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
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
