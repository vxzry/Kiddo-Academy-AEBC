<?php 
    include "db_connect.php";
    // die(var_dump($_POST));
    if(isset($_POST['submit'])){
        // var_dump($_POST);
        $subject = trim($_POST['subject']);
        $text = trim($_POST['text']);
        $sender = 1; // get logged in user 
        //$date = date('Y-m-d');

        
        foreach($_POST['receiver'] as $receiver){
            $query = "INSERT INTO tblmessage(tblMessageSubject, tblMessageText, tblMessageSender_tblUserId, tblMessageReceiver_tblUserId) values ('$subject', '$text', '$sender', '$receiver');";
            $result = mysqli_query($con, $query);
        }
        
        if (!$query = mysqli_query($con, $query)) {
           exit(mysqli_error($con));
        }else{
            mysqli_close($con);
            header('location:adminMessage.php'); 
        }
    }