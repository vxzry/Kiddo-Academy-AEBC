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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <link href="css/multiple-select.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/Addmdesign.css">

    <script>
    function disabledReason() {
    var txtHealthReason = document.getElementById('txtHealthReason');
    txtHealthReason.readOnly = true;
    }
    function disabledEmergency() {
    var txtHealthDoctor = document.getElementById('txtHealthDoctor');
    var txtHealthHospital = document.getElementById('txtHealthHospital');
    var txtHealthHosNum = document.getElementById('txtHealthHosNum');
    var txtHealthAddBldg = document.getElementById('txtHealthAddBldg');
    var txtHealthAddSt = document.getElementById('txtHealthAddSt');
    var txtHealthAddBrgy = document.getElementById('txtHealthAddBrgy');
    var txtHealthAddCity = document.getElementById('txtHealthAddCity');
    var txtHealthAddCountry = document.getElementById('txtHealthAddCountry');
    txtHealthDoctor.readOnly = true;
    txtHealthHospital.readOnly = true;
    txtHealthHosNum.readOnly = true;
    txtHealthAddBldg.readOnly = true;
    txtHealthAddSt.readOnly = true;
    txtHealthAddBrgy.readOnly = true;
    txtHealthAddCity.readOnly = true;
    txtHealthAddCountry.readOnly = true;
    }

    function addSibling()
    {
      var objTo = document.getElementById('sibling');
      var divingr = document.createElement("div");
      divingr.innerHTML = '<br /><label class="col-lg-2 control-label left" style="margin-bottom:10%">Name:</label><div class="col-lg-8"><input class="form-control" type="text" name="txtSiblName[]" id="txtSiblName"></div><label class="col-lg-2 control-label left">Age:</label><div class="col-lg-8"><input class="form-control" type="text" name="txtSiblAge[]" id="txtSiblAge"></div><label class="col-lg-2 control-label left">Grade/Level:</label><div class="col-lg-8"><input class="form-control" type="text" name="txtSiblGrd[]" id="txtSiblGrd"></div><label class="col-lg-2 control-label left">School:</label><div class="col-lg-8"><input class="form-control" type="text" name="txtSiblSchool[]" id="txtSiblSchool"></div>';
      objTo.appendChild(divingr);
    }

    function addRelative()
    {
      var objTo2 = document.getElementById('relative');
      var divingr2 = document.createElement("div");
      divingr2.innerHTML = '<br /><label class="col-lg-2 control-label left">Name:</label><div class="col-lg-8"><input class="form-control" type="text" name="txtRelName[]" id="txtRelName"></div><label class="col-lg-2 control-label left">Age:</label><div class="col-lg-8"><input class="form-control" type="number" name="txtRelAge[]" id="txtRelAge"></div><label class="col-lg-2 control-label left">Relation:</label><div class="col-lg-8"><input class="form-control" type="text" name="txtRelRelation[]" id="txtRelRelation"></div>';
      objTo2.appendChild(divingr2);
    }

    function addEmergencyContact()
    {
      var objTo2 = document.getElementById('relative');
      var divingr2 = document.createElement("div");
      divingr2.innerHTML = '<br /> <label class="col-lg-4 control-label">Name:</label><div class="col-lg-8"><input class="form-control" type="text" name="txtEmName[]" id="txtEmName"></div><label class="col-lg-4 control-label">Relation to Student:</label><div class="col-lg-8"><input class="form-control" type="text" name="txtReltoStud[]" id="txtReltoStud"><label class="col-lg-4 control-label">Tel/Mobile Number:</label><div class="col-lg-8"><input class="form-control" type="text" name="txtEmNum[]" id="txtEmNum"></div><label class="col-lg-4 control-label">Address:</label><div class="col-lg-8"><input class="form-control" type="text" name="txtEmAdress[]" id="txtEmAdress"></div>';
      objTo2.appendChild(divingr2);
    }
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
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel"  style="margin-top: 8%; background-color: #e0e0e0;">
            <div class="pull-left image">
              <img src="images/Employees/admin.png" class="img-circle" alt="User Image">
            </div>

            <div class="pull-left info">
              <p><?php echo $namess ?><i class="fa fa-circle text-success" style="margin-left: 7px;"></i>
                <div style="margin-top:-16px; margin-left: 20px;"><br><small><?php echo $rolename ?></small></br></div>
              </p>
            </div>
          </div>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" style="font-size:17px;">
            <li class="header" style="color: black; font-size: 17px; margin-top: 3%">Welcome!</li>
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
          <section class="content-header"></section>
          <!-- Main content -->
          <section class="content">
            <div class="row">
                <div class="col-md-12">
                  <div class="box box-default">
                    <div class="box-header with-border"></div>

                    <div class="box-body">
                      <div style="margin-left:3%; margin-bottom:2%;">
                        <label style="padding: 3%">Parent: </label>
                        <select class="form-control choose" name="parentChoose" id="parentChoose" style="width: 40%">
                          <option selected="selected" disabled>--Select Parent--</option>
                              <?php
                              $query="select tblParentId, concat(tblParentLname, ', ', tblParentFname, ' ', tblParentMname) as names from tblparent where tblParentFlag=1";
                              $result = mysqli_query($con, $query);
                              while($row = mysqli_fetch_array($result))
                              {
                              ?>
                                <option value="<?php echo $row['tblParentId'] ?>"><?php echo $row['names'] ?></option>
                              <?php } ?>
                        </select>
                    </div>
                      <section>
                        <!--<center><b><h2>ADMISSION</h2></b></center>-->
                        <div class="container">
<div class="wizard stepwizard">
  <div class="wizard-inner stepwizard-row setup-panel">
      <div class="stepwizard-step">
          <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
          <p>Step 1</p>
      </div>
      <div class="stepwizard-step">
          <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
          <p>Step 2</p>
      </div>
      <div class="stepwizard-step">
          <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
          <p>Step 3</p>
      </div>
      <div class="stepwizard-step">
          <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
          <p>Step 4</p>
      </div>
  </div>
</div>
<form role="form" method="post" action="saveadmission.php">
  <div class="row setup-content" id="step-1">
      <div class="col-xs-12">
          <div class="col-xs-10">
              <center><h2 style="margin-bottom: 2%; margin-left: 3%">Check Requirements</h2></center>
              <div class="form-group" style="margin-top: 3%; margin-left:5%">
                <div class="radio">
                  <label>
                    <input type="radio" name="r3" id="r3" value="New Student" checked>
                    New Student
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="r3" id="r3" value="Transferee">
                    Transferee
                  </label>
                </div>
                </div>
              <div class="form-group" style="margin-top: 3%;margin-left:5%">
                <label style="width: 35%">Admission for:</label>
                <div>
                  <select class="form-control" style="width: 20%;" name="selLevel" id="selLevel">
                          <option selected="selected" disabled>--Choose Level--</option>
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

              <div class="fieldset" style="border: 2px solid gray; margin-top: 5%">

                  <fieldset style="margin-top: 2%; margin-left: 2%">
                    <h3>REQUIREMENTS</h3>
                      <?php
                    $query="select * from tblrequirement where tblRequirementFlag=1 and tblReqType='ADMISSION'";
                    $result=mysqli_query($con, $query);
                    while($row=mysqli_fetch_array($result))
                    {
                    ?>
                      <div class="form-group">
                        <label>
                          <input type="checkbox" class="flat-red" name="chkReq[]" id="chkReq" value="<?php echo $row['tblReqId']; ?>">
                          <?php echo $row['tblReqName']; ?>
                        </label>
                      </div>
                      <?php } ?>
                  </fieldset>

              </div> <!-- fieldser -->
              <button class="btn btn-primary nextBtn btn-md pull-right" type="button" style="margin-top:20px;"  onclick="scrollWin()" >Next</button>
          </div>
      </div>
  </div>
  <div class="row setup-content" id="step-2">
      <div class="col-xs-12">
          <div class="col-xs-10">
            <center><h2 style="margin-bottom: 3%; margin-left: 3%">Student Information</h2></center>
            <div class="container">
              <div class="col-md-3">
                <div class="text-center" style="margin-top: 7%;">
                <img src="//placehold.it/200" id="profile-img-tag" class="avatar img-thumbnail" width="200px" />
                <input type="file" class="text-center center-block well well-sm" name="file" id="profile-img" accept="image/*" style="margin-top:3%;" required>
                </div>
              </div>

              <div class="col-md-9 personal-info">
                <h3>Personal Information</h3>

                  <div class="form-group"style=" margin-top:5%; margin-bottom:11%;">
                    <center><label class="col-lg-2 control-label"> First Name: <span style="color:red; padding:5%;">*</span></label></center>
                    <div class="col-lg-7">
                      <div class="input-group" style="width:60%;">
                        <div class="input-group-addon">
                          <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudFname" placeholder="Student's First Name" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom:17%">
                    <center><label class="col-lg-2 control-label"> Middle Name: </label></center>
                    <div class="col-lg-7">
                      <div class="input-group" style="width:60%;">
                        <div class="input-group-addon">
                          <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudMname" placeholder="Student's Middle Name" >
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom:23%">
                    <center><label class="col-lg-2 control-label"> Last Name: <span style="color:red; padding:5%;">*</span></label></center>
                    <div class="col-lg-7">
                      <div class="input-group" style="width:60%;">
                        <div class="input-group-addon">
                          <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudLname" placeholder="Student's Last Name" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom:29%">
                    <center><label class="col-lg-2 control-label"> Birthdate: <span style="color:red; padding:5%;">*</span></label></center>
                    <div class="col-lg-7">
                      <div class="input-group" style="width:36%">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                        <input class="form-control" type="date" name="txtStudBday" id="txtStudBday" placeholder="Student's Birthdate" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom:35%;">
                    <center><label class="col-lg-2 control-label left">Birthplace: <span style="color:red; padding:5%;">*</span></label></center>
                    <div class="col-lg-7">
                      <div class="input-group" style="width:60%;">
                        <div class="input-group-addon">
                          <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudBplace" id="txtStudBplace" placeholder="Student's Birthplace" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom:41%;">
                    <center><label class="col-lg-2 control-label left">Nationality:</label></center>
                    <div class="col-lg-7">
                      <div class="input-group" style="width:45%;">
                        <div class="input-group-addon">
                          <i class="fa fa-flag" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudNat" id="txtStudNat" placeholder="Student's Nationality" >
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom:47%;">
                    <center><label class="col-lg-2 control-label left">Religion:</label></center>
                    <div class="col-lg-7">
                      <div class="input-group" style="width:45%;">
                        <div class="input-group-addon">
                          <i class="fa fa-hand-paper-o" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudReligion" id="txtStudReligion" placeholder="Student's Religion" >
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom:53%;">
                    <center><label class="col-lg-2 control-label"> Home Address: <span style="color:red; padding:5%;">*</span></label></center>
                    <div class="col-lg-5">
                      <div class="input-group" style="width:41%">
                        <div class="input-group-addon">
                          <i class="fa fa-home" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudAddBldg" id="txtStudAddBldg" placeholder="Unit/Bldg. No." required >
                      </div>
                    </div>
                    <div class="col-lg-5" style="width:20%; margin-left:-213px;">
                      <input class="form-control" type="text" placeholder="Street Name/No." name="txtStudAddSt" id="txtStudAddSt">
                    </div>
                    <div class="col-lg-5" style="width:20%; margin-left:-75px;">
                      <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtStudAddBrgy" id="txtStudAddBrgy">
                    </div>
                  </div>

                  <div class="form-group" style="margin-bottom:59%;">
                    <label class="col-lg-2 control-label left"></label>
                    <div class="col-lg-5" style="width:33%">
                      <input class="form-control" type="text" placeholder="City/Municipality" name="txtStudAddCity" id="txtStudAddCity" required>
                    </div>

                    <div class="col-lg-3" style="margin-left:-15px;">
                      <input class="form-control" type="text" value="Philippines" name="txtStudAddCountry" id="txtStudAddCountry">
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom:65%;">
                    <center><label class="col-lg-2 control-label">Spoken Language:</label></center>
                    <div class="col-lg-7" style="width:27%;">
                      <div class="input-group" >
                        <div class="input-group-addon">
                          <i class="fa fa-language" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudLang1" id="txtStudLang1" placeholder="First Language" >
                      </div>
                    </div>
                  </div>

                  <div class="form-group" style="margin-bottom:58%;">
                    <center><label class="col-lg-2 control-label"></label></center>
                    <div class="col-lg-7" style="width:27%;">
                      <div class="input-group" >
                        <div class="input-group-addon">
                          <i class="fa fa-language" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudLang2" id="txtStudLang2" placeholder="Second Language" >
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          <button class="btn btn-primary nextBtn btn-md pull-right" type="button" style="margin-top:20px;" onclick="scrollWin()">Next</button>
      </div>
    </div>
  </div>
  <div class="row setup-content" id="step-3">
      <div class="col-xs-12">
        <div class="col-xs-10">
          <center><h2 style="margin-bottom: 3%; margin-left: 3%">Guardian/s Information</h2></center>
          <div class="container">
            <div class="col-md-3">
              <div class="text-center" style="margin-top: 7%;">
              <img src="//placehold.it/200" id="profile-img-tag" class="avatar img-thumbnail" width="200px" />
              <input type="file" class="text-center center-block well well-sm" name="file" id="profile-img" accept="image/*" style="margin-top:3%;" required>
              </div>
            </div>

            <div class="col-md-9 personal-info">
              <h3>Father's Information</h3>

              <div class="form-group" style="margin-top:3%;margin-bottom:9%;">
                <label class="col-lg-2 control-label left">First name: <span style="color:red; padding:5%;">*</span></label>
                <div class="col-lg-7">
                  <div class="input-group" style="width:60%;">
                    <div class="input-group-addon">
                      <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <input class="form-control" type="text" name="txtFatherFname" id="txtFatherFname" required>
                  </div>
                </div>
              </div>
              <div class="form-group" style="margin-bottom:15%;">
                <label class="col-lg-2 control-label left">Middle name: </label>
                <div class="col-lg-7">
                  <div class="input-group" style="width:60%;">
                    <div class="input-group-addon">
                      <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <input class="form-control" type="text" name="txtFatherMname" id="txtFatherMname">
                  </div>
                </div>
              </div>
              <div class="form-group" style="margin-bottom:21%;">
                <label class="col-lg-2 control-label left">Last name: <span style="color:red; padding:5%;">*</span></label>
                <div class="col-lg-7">
                  <div class="input-group" style="width:60%;">
                    <div class="input-group-addon">
                      <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <input class="form-control" type="text" name="txtFatherLname" id="txtFatherLname" required>
                  </div>
                </div>
              </div>
              <div class="form-group" style="margin-bottom:27%;">
                <label class="col-lg-2 control-label left">Mobile Number: <span style="color:red; padding:2%;">*</span></label>
                <div class="col-lg-7">
                  <div class="input-group" style="width:35%;">
                    <div class="input-group-addon">
                      <i class="fa fa-mobile" aria-hidden="true"></i>
                    </div>
                    <input class="form-control" type="text" name="txtFatherNum" id="txtFatherNum" required maxlength="11">
                  </div>
                </div>
              </div>
              <div class="form-group" style="margin-bottom:33%;">
                <label class="col-lg-2 control-label left">E-mail Address: <span style="color:red; padding:2%;">*</span></label>
                <div class="col-lg-8">
                  <div class="input-group" style="width:40%;">
                    <div class="input-group-addon">
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                    <input class="form-control" type="email" name="txtFatherEmail" id="txtFatherEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="required">
                  </div>
                </div>
              </div>
              <div class="form-group" style="margin-bottom:39%;">
                <label class="col-lg-2 control-label left">Home Address: <span style="color:red; padding:2%;">*</span></label>
                <div class="col-lg-3">
                  <div class="input-group" style="width:80%;">
                    <div class="input-group-addon">
                      <i class="fa fa-home" aria-hidden="true"></i>
                    </div>
                    <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtFatherAddBldg" id="txtFatherAddBldg" required>
                  </div>
                </div>
                <div class="col-lg-3" style="width:20%; margin-left:-60px;">
                  <input class="form-control" type="text" placeholder="Street Name/No." name="txtFatherAddSt" id="txtFatherAddSt">
                </div>
                <div class="col-lg-3" style="width:20%; margin-left:-23px;">
                  <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtFatherAddBrgy" id="txtFatherAddBrgy">
                </div>
              </div>
              <div class="form-group" style="margin-bottom:45%;">
                <label class="col-lg-2 control-label left"></label>
                <div class="col-lg-6" style="width:33%">
                  <input class="form-control" type="text" placeholder="City/Municipality" name="txtFatherAddCity" id="txtFatherAddCity" required>
                </div>
                <div class="col-lg-2" style="margin-left:-15px;">
                  <input class="form-control" type="text" value="Philippines" name="txtFatherAddCountry" id="txtFatherAddCountry">
                </div>
              </div>
              <div class="form-group" style="margin-bottom:51%;">
                <label class="col-lg-2 control-label left">Home Tel. Number: <span style="color:red; padding:2%;">*</span></label>
                <div class="col-lg-8">
                  <div class="input-group" style="width:35%;">
                    <div class="input-group-addon">
                      <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <input class="form-control" type="text" name="txtFatherTelnum" id="txtFatherTelnum" required>
                  </div>
                </div>
              </div>

              <div class="form-group" style="margin-bottom:57%;">
                <label class="col-lg-2 control-label left">Occupation/Title:</label>
                <div class="col-lg-8">
                  <div class="input-group" style="width:60%;">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    </div>
                    <input class="form-control" type="text" name="txtFatherJob" id="txtFatherJob">
                  </div>
                </div>
              </div>

              <div class="form-group" style="margin-bottom:63%;">
                <label class="col-lg-2 control-label left">Company Name:</label>
                <div class="col-lg-8">
                  <div class="input-group" style="width:60%;">
                    <div class="input-group-addon">
                      <i class="fa fa-industry" aria-hidden="true"></i>
                    </div>
                    <input class="form-control" type="text" name="txtFatherCompany" id="txtFatherCompany">
                  </div>
                </div>
              </div>

              <div class="form-group" style="margin-bottom:69%;">
                <label class="col-lg-2 control-label left">Company Address:</label>
                <div class="col-lg-3">
                  <div class="input-group" style="width:80%;">
                    <div class="input-group-addon">
                      <i class="fa fa-home" aria-hidden="true"></i>
                    </div>
                    <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtFatherComAddBldg" id="txtFatherComAddBldg">
                  </div>
                </div>
                <div class="col-lg-3" style="width:20%; margin-left:-60px;">
                  <input class="form-control" type="text" placeholder="Street Name/No." name="txtFatherComAddSt" id="txtFatherComAddSt">
                </div>
                <div class="col-lg-3" style="width:20%; margin-left:-23px;">
                  <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtFatherComAddBrgy" id="txtFatherComAddBrgy">
                </div>
              </div>
              <div class="form-group" style="margin-bottom:75%;">
                <label class="col-lg-2 control-label left"></label>
                <div class="col-lg-6" style="width:33%">
                  <input class="form-control" type="text" placeholder="City/Municipality" name="txtFatherComAddCity" id="txtFatherComAddCity">
                </div>
                <div class="col-lg-2">
                  <input class="form-control" type="text" value="Philippines" name="txtFatherComAddCountry" id="txtFatherComAddCountry">
                </div>
              </div>
              <div class="form-group" style="margin-bottom:51%;">
                <label class="col-lg-2 control-label left">Work Phone Number: </label>
                <div class="col-lg-8">
                  <div class="input-group" style="width:60%;">
                    <div class="input-group-addon">
                      <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <input class="form-control" type="text" name="txtFatherComNum" id="txtFatherComNum">
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="container">
           <hr>
         <div class="row">
             <center><h3>Mother's Information</h3></center>
             <!-- left column -->
             <div class="col-md-3">
               <div class="text-center" style="margin-top: 7%;">
               <img src="//placehold.it/200" id="profile-img-tag" class="avatar img-thumbnail" width="200px" />
               <input type="file" class="text-center center-block well well-sm" name="file" id="profile-img" accept="image/*" style="margin-top:3%;" required>
               </div>
             </div>

             <!-- edit form column -->
             <div class="col-md-9 personal-info">

                 <div class="form-group" style="margin-top:3%; margin-bottom:9%;">
                   <label class="col-lg-2 control-label left">First name: <span style="color:red; padding:5%;">*</span></label>
                   <div class="col-lg-7">
                     <div class="input-group" style="width:60%;">
                       <div class="input-group-addon">
                         <i class="fa fa-user" aria-hidden="true"></i>
                       </div>
                       <input class="form-control" type="text" name="txtMotherFname" id="txtMotherFname" required>
                     </div>
                   </div>
                 </div>

                 <div class="form-group" style="margin-bottom:15%;">
                   <label class="col-lg-2 control-label left">Middle name:</label>
                   <div class="col-lg-7">
                     <div class="input-group" style="width:60%;">
                       <div class="input-group-addon">
                         <i class="fa fa-user" aria-hidden="true"></i>
                       </div>
                       <input class="form-control" type="text" name="txtMotherMname" id="txtMotherMname">
                     </div>
                   </div>
                 </div>

                 <div class="form-group" style="margin-bottom:21%;">
                   <label class="col-lg-2 control-label left">Last name: <span style="color:red; padding:5%;">*</span></label>
                   <div class="col-lg-7">
                     <div class="input-group" style="width:60%;">
                       <div class="input-group-addon">
                         <i class="fa fa-user" aria-hidden="true"></i>
                       </div>
                       <input class="form-control" type="text" name="txtMotherLname" id="txtMotherLname" required>
                     </div>
                   </div>
                 </div>

                 <div class="form-group" style="margin-bottom:27%;">
                   <label class="col-lg-2 control-label left">Mobile Number <span style="color:red; padding:5%;">*</span></label>
                   <div class="col-lg-7">
                     <div class="input-group" style="width:35%;">
                       <div class="input-group-addon">
                         <i class="fa fa-mobile" aria-hidden="true"></i>
                       </div>
                       <input class="form-control" type="text" name="txtMotherNum" id="txtMotherNum" required>
                     </div>
                   </div>
                 </div>

                 <div class="form-group" style="margin-bottom:33%;">
                   <label class="col-lg-2 control-label left">E-mail Address: <span style="color:red; padding:5%;">*</span></label>
                   <div class="col-lg-7">
                     <div class="input-group" style="width:60%;">
                       <div class="input-group-addon">
                         <i class="fa fa-envelope" aria-hidden="true"></i>
                       </div>
                       <input class="form-control" type="email" name="txtMotherEmail" id="txtMotherEmail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                     </div>
                   </div>
                 </div>

                 <div class="form-group" style="margin-bottom:39%;">
                   <label class="col-lg-2 control-label left">Home Address:<span style="color:red; padding:5%;">*</span></label>
                   <div class="col-lg-3">
                     <div class="input-group" style="width:80%;">
                       <div class="input-group-addon">
                         <i class="fa fa-home" aria-hidden="true"></i>
                       </div>
                       <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtMotherAddBldg" id="txtMotherAddBldg" required>
                     </div>
                   </div>

                   <div class="col-lg-3" style="margin-left:-55px;">
                     <input class="form-control" type="text" placeholder="Street Name/No." name="txtMotherAddSt" id="txtMotherAddSt">
                   </div>

                   <div class="col-lg-3" style="margin-left:-20px;">
                     <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtMotherAddBrgy" id="txtMotherAddBrgy">
                   </div>
                 </div>

                 <div class="form-group" style="margin-bottom:45%;">
                   <label class="col-lg-2 control-label left"></label>
                   <div class="col-lg-6" style="width:33%">
                     <input class="form-control" type="text" placeholder="City/Municipality" name="txtMotherAddCity" id="txtMotherAddCity" required>
                   </div>
                   <div class="col-lg-2">
                     <input class="form-control" type="text" value="Philippines" name="txtMotherAddCountry" id="txtMotherAddCountry">
                   </div>
                 </div>

                 <div class="form-group" style="margin-bottom:51%;">
                   <label class="col-lg-2 control-label left">Home Tel. Number: <span style="color:red; padding:5%;">*</span></label>
                   <div class="col-lg-7">
                     <div class="input-group" style="width:60%;">
                       <div class="input-group-addon">
                         <i class="fa fa-phone" aria-hidden="true"></i>
                       </div>
                       <input class="form-control" type="text" name="txtMotherTelnum" id="txtMotherTelnum" required>
                     </div>
                   </div>
                 </div>
                 <div class="form-group" style="margin-bottom:57%;">
                   <label class="col-lg-2 control-label left">Occupation/Title:</label>
                   <div class="col-lg-7">
                     <div class="input-group" style="width:60%;">
                       <div class="input-group-addon">
                         <i class="fa fa-id-card-o" aria-hidden="true"></i>
                       </div>
                       <input class="form-control" type="text" name="txtMotherJob" id="txtMotherJob">
                     </div>
                   </div>
                 </div>
                 <div class="form-group" style="margin-bottom:63%;">
                   <label class="col-lg-2 control-label left">Company Name:</label>
                   <div class="col-lg-7">
                     <div class="input-group" style="width:60%;">
                       <div class="input-group-addon">
                         <i class="fa fa-industry" aria-hidden="true"></i>
                       </div>
                       <input class="form-control" type="text" name="txtMotherCompany" id="txtMotherCompany">
                     </div>
                   </div>
                 </div>
                 <div class="form-group" style="margin-bottom:69%;">
                   <label class="col-lg-2 control-label left">Company Address:</label>
                   <div class="col-lg-3">
                     <div class="input-group" style="width:80%;">
                       <div class="input-group-addon">
                         <i class="fa fa-building" aria-hidden="true"></i>
                       </div>
                       <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtMotherComAddBldg" id="txtMotherComAddBldg">
                     </div>
                   </div>
                   <div class="col-lg-3" style="margin-left:-55px;">
                     <input class="form-control" type="text" placeholder="Street Name/No." name="txtMotherComAddSt" id="txtMotherComAddSt">
                   </div>
                   <div class="col-lg-3" style="margin-left:-19px;">
                     <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtMotherComAddBrgy" id="txtMotherComAddBrgy">
                   </div>
                 </div>
                 <div class="form-group" style="margin-bottom:75%;">
                   <label class="col-lg-2 control-label left"></label>
                   <div class="col-lg-6" style="width:33%">
                     <input class="form-control" type="text" placeholder="City/Municipality" name="txtMotherComAddCity" id="txtMotherComAddCity">
                   </div>
                   <div class="col-lg-2">
                     <input class="form-control" type="text" value="Philippines" name="txtMotherComAddCountry" id="txtMotherComAddCountry">
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="col-lg-2 control-label left">Work Phone Number:</label>
                   <div class="col-lg-7">
                     <div class="input-group" style="width:60%;">
                       <div class="input-group-addon">
                         <i class="fa fa-phone" aria-hidden="true"></i>
                       </div>
                       <input class="form-control" type="text" name="txtMotherComNum" id="txtMotherComNum">
                     </div>
                   </div>
                 </div>

             </div>
         </div>
       </div>

       <div class="container">
           <hr>
         <div class="row">
             <!-- left column -->
             <div class="col-md-3"></div>

             <!-- edit form column -->
             <div class="col-md-9 personal-info">

               <div class="form-group" style="margin-bottom:7%;">
                          <label class="col-lg-2 control-label left">Parent Status: <span style="color:red; padding:5%;">*</span></label>
                          <div class="col-lg-7">
                          <select required="required" multiple="multiple" class="select2" placeholder="Select" style="width: 50%" name="chkParentStat" id="chkParentStat">
                                  <option value="Parents Married">Parents Married</option>
                                  <option value="Father Deceased">Father Deceased</option>
                                  <option value="Father Remarried">Father Remarried</option>
                                  <option value="Mother Deceased">Mother Deceased</option>
                                  <option value="Mother Remarried">Mother Remarried</option>
                                  <option value="Applicant Adopted">Applicant Adopted</option>
                                  <option value="Single Parent">Single Parent</option>
                                  <option value="Parents Separated/Divorced">Parents Separated/Divorced</option>
                            </select>
                          </div>
                        </div>
                <div class="form-group" style="margin-bottom:13%;">
                          <label class="col-lg-2 control-label left">Applicant Lives With: <span style="color:red; padding:5%;">*</span></label>
                          <div class="col-lg-7">
                            <select required="required" multiple="multiple" class="select2 validate[required]" placeholder="Select" style="width: 50%" name="chkLivesWith" id="chkLivesWith">
                              <option value="Father and Mother">Father and Mother</option>
                              <option value="Stepfather and Mother">Stepfather and Mother</option>
                              <option value="Father">Father</option>
                              <option value="Stepmother and Father">Stepmother and Father</option>
                              <option value="Mother">Mother</option>
                              <option value="Relative/s">Relative/s</option>
                            </select>
                          </div>
                        </div>

                 </div>
                 </div>
                 </div>

                 <div class="container">
                     <hr>
                   <div class="row">
                       <!-- edit form column -->
                       <div class="col-md-9 personal-info">
                         <h3>Siblings</h3>
                         <div class= "right" style="margin-bottom:7%">
                                <a href="#"><span class="btn btn-info" id="siblingbutton" style="float: right;" onclick="addSibling();" >ADD</span></a>
                         </div>
                         <div class="form-group" id="sibling">

                             <label class="col-lg-4 control-label left">Name:</label>
                             <div class="col-lg-8">
                               <input class="form-control" type="text" name="txtSiblName[]" id="txtSiblName">
                             </div>
                             <label class="col-lg-4 control-label left">Age:</label>
                             <div class="col-lg-8">
                               <input class="form-control" type="text" name="txtSiblAge[]" id="txtSiblAge">
                             </div>
                             <label class="col-lg-4 control-label left">Grade/Level:</label>
                             <div class="col-lg-8">
                               <input class="form-control" type="text" name="txtSiblGrd[]" id="txtSiblGrd">
                             </div>
                             <label class="col-lg-4 control-label left">School:</label>
                             <div class="col-lg-8">
                               <input class="form-control" type="text" name="txtSiblSchool[]" id="txtSiblSchool">
                           </div>
                        </div>
                       </div>
                   </div>
                 </div>

                 <div class="container">
                     <hr>
                   <div class="row">
                       <!-- edit form column -->
                       <div class="col-md-9 personal-info">
                         <h3>Other members of the Household</h3>
                         <div class= "right" style="margin-bottom: 7%">
                                <a href="#"><span class="btn btn-info" id="relativebutton" style="float: right" onclick="addRelative();" >ADD</span></a>
                         </div>

                           <div class="form-group" id="relative">
                             <label class="col-lg-4 control-label left">Name:</label>
                             <div class="col-lg-8">
                               <input class="form-control" type="text" name="txtRelName[]" id="txtRelName">
                             </div>

                             <label class="col-lg-4 control-label left">Age:</label>
                             <div class="col-lg-8">
                               <input class="form-control" type="text" name="txtRelAge[]" id="txtRelAge">
                             </div>

                             <label class="col-lg-4 control-label left">Relation:</label>
                             <div class="col-lg-8">
                               <input class="form-control" type="text" name="txtRelRelation[]" id="txtRelRelation">
                             </div>
                           </div>

                       </div>
                   </div>
                 </div>

               <button class="btn btn-primary nextBtn btn-md pull-right" type="button" style="margin-top:20px;"  onclick="scrollWin()">Next</button>
    </div>
    </div>
  </div>
  <div class="row setup-content" id="step-4">
      <div class="col-xs-12">
          <div class="col-xs-10">
            <center><h2 style="margin-bottom: 3%; margin-left: 3%">Student Information</h2></center>
            <div class="container">
              <div class="col-md-3">
                <div class="text-center" style="margin-top: 7%;">
                <img src="//placehold.it/200" id="profile-img-tag" class="avatar img-thumbnail" width="200px" />
                <input type="file" class="text-center center-block well well-sm" name="file" id="profile-img" accept="image/*" style="margin-top:3%;" required>
                </div>
              </div>

              <div class="col-md-9 personal-info">
                <h3>Personal Information</h3>

                  <div class="form-group"style=" margin-top:5%; margin-bottom:11%;">
                    <center><label class="col-lg-2 control-label"> First Name: <span style="color:red; padding:5%;">*</span></label></center>
                    <div class="col-lg-7">
                      <div class="input-group" style="width:60%;">
                        <div class="input-group-addon">
                          <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudFname" placeholder="Student's First Name" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom:17%">
                    <center><label class="col-lg-2 control-label"> Middle Name: </label></center>
                    <div class="col-lg-7">
                      <div class="input-group" style="width:60%;">
                        <div class="input-group-addon">
                          <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudMname" placeholder="Student's Middle Name" >
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom:23%">
                    <center><label class="col-lg-2 control-label"> Last Name: <span style="color:red; padding:5%;">*</span></label></center>
                    <div class="col-lg-7">
                      <div class="input-group" style="width:60%;">
                        <div class="input-group-addon">
                          <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudLname" placeholder="Student's Last Name" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom:29%">
                    <center><label class="col-lg-2 control-label"> Birthdate: <span style="color:red; padding:5%;">*</span></label></center>
                    <div class="col-lg-7">
                      <div class="input-group" style="width:36%">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                        <input class="form-control" type="date" name="txtStudBday" id="txtStudBday" placeholder="Student's Birthdate" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom:35%;">
                    <center><label class="col-lg-2 control-label left">Birthplace: <span style="color:red; padding:5%;">*</span></label></center>
                    <div class="col-lg-7">
                      <div class="input-group" style="width:60%;">
                        <div class="input-group-addon">
                          <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudBplace" id="txtStudBplace" placeholder="Student's Birthplace" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom:41%;">
                    <center><label class="col-lg-2 control-label left">Nationality:</label></center>
                    <div class="col-lg-7">
                      <div class="input-group" style="width:45%;">
                        <div class="input-group-addon">
                          <i class="fa fa-flag" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudNat" id="txtStudNat" placeholder="Student's Nationality" >
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom:47%;">
                    <center><label class="col-lg-2 control-label left">Religion:</label></center>
                    <div class="col-lg-7">
                      <div class="input-group" style="width:45%;">
                        <div class="input-group-addon">
                          <i class="fa fa-hand-paper-o" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudReligion" id="txtStudReligion" placeholder="Student's Religion" >
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom:53%;">
                    <center><label class="col-lg-2 control-label"> Home Address: <span style="color:red; padding:5%;">*</span></label></center>
                    <div class="col-lg-5">
                      <div class="input-group" style="width:41%">
                        <div class="input-group-addon">
                          <i class="fa fa-home" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudAddBldg" id="txtStudAddBldg" placeholder="Unit/Bldg. No." required >
                      </div>
                    </div>
                    <div class="col-lg-5" style="width:20%; margin-left:-213px;">
                      <input class="form-control" type="text" placeholder="Street Name/No." name="txtStudAddSt" id="txtStudAddSt">
                    </div>
                    <div class="col-lg-5" style="width:20%; margin-left:-75px;">
                      <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtStudAddBrgy" id="txtStudAddBrgy">
                    </div>
                  </div>

                  <div class="form-group" style="margin-bottom:59%;">
                    <label class="col-lg-2 control-label left"></label>
                    <div class="col-lg-5" style="width:33%">
                      <input class="form-control" type="text" placeholder="City/Municipality" name="txtStudAddCity" id="txtStudAddCity" required>
                    </div>

                    <div class="col-lg-3" style="margin-left:-15px;">
                      <input class="form-control" type="text" value="Philippines" name="txtStudAddCountry" id="txtStudAddCountry">
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom:65%;">
                    <center><label class="col-lg-2 control-label">Spoken Language:</label></center>
                    <div class="col-lg-7" style="width:27%;">
                      <div class="input-group" >
                        <div class="input-group-addon">
                          <i class="fa fa-language" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudLang1" id="txtStudLang1" placeholder="First Language" >
                      </div>
                    </div>
                  </div>

                  <div class="form-group" style="margin-bottom:58%;">
                    <center><label class="col-lg-2 control-label"></label></center>
                    <div class="col-lg-7" style="width:27%;">
                      <div class="input-group" >
                        <div class="input-group-addon">
                          <i class="fa fa-language" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="txtStudLang2" id="txtStudLang2" placeholder="Second Language" >
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          <button class="btn btn-primary nextBtn btn-md pull-right" type="button" style="margin-top:20px;">Next</button>
            <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
      </div>
    </div>
  </div>
</form>
                      </section>
                    </div> <!-- /.box-body -->
                </div><!-- /.box-default -->
              </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
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
      <!-- InputMask -->
      <script src="jquery.inputmask.js"></script>
      <script src="jquery.inputmask.date.extensions.js"></script>
      <script src="jquery.inputmask.extensions.js"></script>
      <!-- DataTables -->
      <script src="plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
      <script src="js/select2.full.min.js"></script>
      <script type="text/javascript" src="formwizard.js"></script>
      <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
      <script src="js/multiple-select.js"></script>
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
        $('.select2').multipleSelect();
       	//Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        $(window).load(function(){
    	    $("#txtStudBday").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    	  });

      window.onload = function() {
            document.getElementById("txtStudBday").onblur = function() {
                ageCount(this.value);
            }
    	}

        function ageCount(dob) {
    		var date1 = new Date();
    		var date2 = new Date(dob);
    		var pattern = /(0\d{1}|1[0-2])\/([0-2]\d{1}|3[0-1])\/(19|20)\d{2}/; //Regex to validate date format (dd/mm/yyyy)
    		if(pattern.test(dob)) {
    			var y1 = date1.getFullYear(); //getting current year
    			var y2 = date2.getFullYear(); //getting dob year
    			var age = y1 - y2;           //calculating age
    			document.getElementById("agecalc").innerHTML = "Age: " + age;
    			return true;
    		}
    		else {
    			alert("Invalid date format. Please Input in (dd/mm/yyyy) format!");
    			return false;
    		}

    	}
      </script>



  </body>

  <script>
  function scrollWin() {
      window.scrollTo(0, -5000);
  }
  </script>

  <script>
  $(document).ready(function () {

  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});
  </script>

</html>
