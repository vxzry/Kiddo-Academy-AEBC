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
  function appendScheme(i)
    {
      var objtofld = document.getElementById("fldst");
      var divingr = document.createElement("div");
      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open("GET","showScheme.php?optionalfees="+i.value,false);
      xmlhttp.send(null);
      // document.getElementById("fldst").innerHTML=xmlhttp.responseText;
      divingr.innerHTML =xmlhttp.responseText
      objtofld.appendChild(divingr);
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
                  <img src="images/Employees/admin.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $namess ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="images/Employees/admin.png" class="img-circle" alt="User Image">

                    <p>
                      <!--<?php echo $namess ?> -->
                      <small><?php echo $rolename ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <!--<div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>-->
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
         <p style="text-align: center; font-size: 14px; padding-top: 15px; color: white">Kiddo Academy Admission and Enrollment with Billing and Collection</p>
          
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
              <p><?php echo $namess ?><i class="fa fa-circle text-success" style="margin-left: 7px"></i></p>
              <p style="padding: 3px 30px; font-size: 12px;"><?php echo $rolename ?></p>
            </div>
          </div>
         
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" style="font-size:17px;">
           <li class="header" style="color:black;">
               <div>
           <?php
             $query="select * from tblschoolyear where tblSchoolYrActive='ACTIVE' and tblSchoolYearFlag=1";
             $result=mysqli_query($con, $query);
             $row=mysqli_fetch_array($result);
             $sy=$row['tblSchoolYrYear'];
           ?>
           <h4 style="padding-left:5%;"><?php echo $sy ?></h4>
           <p style="font-size: 12px; padding-left:5%;">Welcome!</p>

       </div>
            </li>
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

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          
        </section>

        <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border"></div>
                <div class="box-body">
                  <div class="box-header with-border">
                    <h2 class="box-title" style="font-size:20px;">Enrollment</h2>
                      <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                  </div>
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs" id="myTab">
                      <li class="active"><a href="#tab_1" data-toggle="tab">Enroll Students</a></li>
                      <li><a href="#tab_3" data-toggle="tab">Change Schemes</a></li>
                    </ul>
                  <div class="tab-content">
                    
                  <div class="tab-pane active" id="tab_1">
                        <div class="box">
                        <div class="box-header"></div>
                            <div class="box-body">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label></label><button class="btn btn-info"><a href="outputListOfFees.php" target="_blank" style="color: white;">List of Fees</a></button>
                                  <div style="margin-top: 5%">
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
                                  $query="select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name, s.tblStudentType from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentFlag=1 and si.tblStudInfoFlag=1 and (s.tblStudentType='APPLICANT' or s.tblStudentType='PROMOTED') and s.tblStudentFlag=1";
                                  $result=mysqli_query($con, $query);
                                  while($row=mysqli_fetch_array($result)):
                                  $studid=$row['tblStudentId'];
                                  ?>
                                    <tr>
                                      <td><?php echo $row['tblStudentId'] ?></td>
                                      <td><?php echo $row['name'] ?></td>
                                      <td><?php echo $row['tblStudentType'] ?></td>
                    <?php
                    $query1="select s.tblStudentId, s.tblStudentType, se.tblStudEnrollClearance from tblstudent s left join tblstudenroll se on se.tblStudEnroll_tblStudentId=s.tblStudentId where s.tblStudentId='$studid' and s.tblStudentFlag=1";
                    $row3=mysqli_fetch_array(mysqli_query($con, $query1));
                    $studclear=$row3['tblStudEnrollClearance'];
                    $studtype=$row3['tblStudentType'];
                    if($studtype=='PROMOTED' && $studclear='N')
                    {
                    ?>
                                      <td><form action="enrollmentscheme.php" method="post"><input type="hidden" name="txtstud" id="txtstud" value="<?php echo $row['tblStudentId'] ?>" /><button type="submit" class="btn btn-success" disabled>Change Student's Scheme</button></form></td>
                    <?php }else
                    { ?>
                    <td><form action="enrollmentscheme.php" method="post"><input type="hidden" name="txtstud" id="txtstud" value="<?php echo $row['tblStudentId'] ?>" /><button type="submit" class="btn btn-success">Enroll Student</button></form></td>
                    <?php } ?>
                                    </tr>
                                  <?php endwhile; ?>
                                  </tbody>
                                </table>
                              </div>
                              <div class="modal fade" id="mdlEnrollment" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title" style="font-style: bold">Enroll Student</h3>
                                </div>
                                 <div class="modal-body">
                                <form method="post" action="EnrollStudent.php"/>
                                  <input type="hidden" name="txtStudentId" id="txtStudentId"/>

                                <div class="form-group">
                                  <label class="col-sm-2" style="text-align: right">Session</label>
                                    <div class="col-sm-7">
                                    <select class="form-control choose" style="width: 100%;" name="selSession" id="selSession" >
                                      <option selected="selected" value="0" disabled>--CHOOSE SESSION--</option>
                                      <option value="MORNING">MORNING</option>
                                      <option value="AFTERNOON">AFTERNOON</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group">  
                                    <div class="col-sm-6">
                                        <div class="fieldset" style="border: 2px solid gray; margin-top: 5%">
                                        <fieldset style="margin-top: 2%; margin-left: 2%">

                                        <h4 style="font-weight: bold">Mandatory Fees</h4>
                                        <?php
                                        $query="select * from tblfee where tblFeeMandatory='Y' and tblFeeFlag=1";
                                        $result=mysqli_query($con, $query);
                                        while($row=mysqli_fetch_array($result)):
                                        ?>
                                        <div><p style="margin-top: 3%"> <?php echo $row['tblFeeName'] ?></p></div>
                                      <?php endwhile; ?>
                                        </fieldset>
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                        <div class="fieldset" style="border: 2px solid gray; margin-top: 5%">
                                        <fieldset style="margin-top: 2%; margin-left: 2%">
                                        <h4 style="font-weight: bold">Optional Fees</h4>
                                        <input type="hidden" name="optionalfees" value="None" />
                                        <input type="hidden" name="selSchemeMand" value="None" />
                                        <input type="hidden" name="selSchemeOpt" value="None" />
                                        <?php
                                        
                                        $query="select * from tblfee where tblFeeMandatory='N' and tblFeeFlag=1";
                                        $result=mysqli_query($con, $query);
                                        while($row=mysqli_fetch_array($result)):
                                        ?>
                                        <div>
                                          
                                          <input type="checkbox" class="optionalfees" name="optionalfees[]" id="optionalfees" style="margin-top: 3%" value="<?php echo $row['tblFeeId'] ?>" onclick="appendScheme(this)" /> <?php echo $row['tblFeeName'] ?></div>
                                          
                                      <?php endwhile; ?>
                                        </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="fieldset" style="border: 2px solid gray; margin-top: 5%">
                                        <fieldset style="margin-top: 2%; margin-left: 2%" id="fldst">
                                        <h4 style="font-weight: bold">Schemes</h4>
                                        <h4>Mandatory</h4>
                                        <?php
                                        $query="select * from tblfee where tblFeeMandatory='Y' and tblFeeFlag=1";
                                        $result=mysqli_query($con, $query);
                                        while($row=mysqli_fetch_array($result)):
                                          $feeid=$row['tblFeeId'];
                                          $query1=$con->query("select * from tblscheme where tblScheme_tblFeeId='$feeid' and tblSchemeFlag=1");
                                          if($query1->num_rows >=1 )
                                          {
                                        ?>
                                        <div><label> <?php echo $row['tblFeeName'] ?></label>
                                          <select class="form-control" name="selSchemeMand[]" id="selSchemeMand" style="width: 30%;">
                                            <option disabled selected value="0">--Select Scheme</option>
                                            <?php
                                            $query2=mysqli_query($con, "select * from tblscheme where tblScheme_tblFeeId='$feeid' and tblSchemeFlag=1");
                                            while($row2=mysqli_fetch_array($query2))
                                            { ?>
                                              <option value="<?php echo $row2['tblSchemeId'] ?>"><?php echo $row2['tblSchemeType'] ?></option>
                                            <?php } ?>
                                            ?>
                                          </select>
                                        </div>
                                        <?php }endwhile; ?>
                                        <div><h4>Optional</h4></div>
                                      
                                        </fieldset>
                                        </div>
                                        </div>
                                </div>
                                                          
                                <div class="modal-footer" style="margin-top: 30%; float: center">
                                  <button type="submit" class="btn btn-danger" name="btnProceed" id="btnProceed">OK</button>
                                  <button type="button" class="btn btn-info" data-dismiss="modal">CANCEL</button>
                                </div>
                                </form>
                              </div> <!-- modal content -->
                            </div> <!-- modal dialog -->
                          </div> <!-- modal fade -->
                            </div> <!-- box body tab_1 -->
                          

                          
                        </div> <!-- box body tab_! -->
                      </div> <!-- box tab_1 -->
                    </div> <!-- tab pane tab_1 -->
                    <div class="tab-pane" id="tab_3">
                        <div class="box">
                        <div class="box-header"></div>
                        <div class="box-body">
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
                          $query="select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name, s.tblStudentType from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentFlag=1 and si.tblStudInfoFlag=1 and s.tblStudentType='ENROLLEE' and s.tblStudentFlag=1";
                          $result=mysqli_query($con, $query);
                                  while($row=mysqli_fetch_array($result)):
                          $studid=$row['tblStudentId'];
                           ?>
                          <tr>
                            <td><?php echo $row['tblStudentId'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['tblStudentType'] ?></td>
                    <?php
                    $query1="select s.tblStudentId, s.tblStudentType, se.tblStudEnrollClearance from tblstudent s left join tblstudenroll se on se.tblStudEnroll_tblStudentId=s.tblStudentId where s.tblStudentId='$studid' and s.tblStudentFlag=1";
                    $row3=mysqli_fetch_array(mysqli_query($con, $query1));
                    $studclear=$row3['tblStudEnrollClearance'];
                    $studtype=$row3['tblStudentType']; ?>
                    <td><form action="enrollmentscheme.php" method="post"><input type="hidden" name="txtstud" id="txtstud" value="<?php echo $row['tblStudentId'] ?>" /><button type="submit" class="btn btn-success">Change Student's Scheme</button></form></td>
                    </tr>
                      <?php endwhile; ?>
                      </tbody>
                     </table>
                        </div>
                        </div> <!-- box body tab_! -->
                      </div> <!-- box tab_1 -->
                    </div>
                    </div> <!-- tab pane tab_1 -->
                  <!-- *tab content -->
                </div> <!-- nav tab -->
                </div>
                <!-- box body -->
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
  </script> selSession
  
  </body>
</html>