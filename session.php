<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select * from tbluser where tblUserName = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

   
   $login_session = $row['tblUserName'];
   $user_id = $row['tblUserId'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>