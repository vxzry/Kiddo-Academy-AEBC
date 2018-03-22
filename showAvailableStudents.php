<?php
    include "db_connect.php";

    $sectid=trim($_GET['id']);

    $query="select tblSchoolYrId from tblschoolyear where tblSchoolYrActive='ACTIVE'";
    $result=mysqli_query($con, $query);
    $row=mysqli_fetch_array($result);
    $syid=$row['tblSchoolYrId'];

    $query="select * from tblsection where tblSectionId='$sectid' and tblSectionFlag=1";
    $result=mysqli_query($con, $query);
    $row=mysqli_fetch_array($result);
    $max=$row['tblSectionMaxCap'];
    $lvl=$row['tblSection_tblLevelId'];
    $session=$row['tblSectionSession'];

    // echo "$sectid, $query, $max, $lvl, $session\n";
    // var_dump($row);
    // die();


    $query="select count(tblSectStudId) as count from tblsectionstud where tblSectStud_tblSectionId='$sectid' and tblSectStudFlag=1";
    $result=mysqli_query($con, $query);
    $row=mysqli_fetch_array($result);
    $sectcnt=$row['count'];
    $x=$max-$sectcnt;
        
    if($sectcnt < $max)
    {
        $query="select s.tblStudentId,  concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name
        from tblstudent s, tblstudentinfo si, tblstudenroll se
        where s.tblStudentId=si.tblStudInfo_tblStudentId 
        and s.tblStudentId=se.tblStudEnroll_tblStudentId
        and s.tblStudentType='OFFICIAL'
        and s.tblStudentFlag=1 
        and s.tblStudent_tblLevelId='$lvl'
        and se.tblStudEnrollPreferedSession='$session'
        and s.tblStudent_tblSectionId is NULL
        order by tblStudentId
        limit $x";
        
        $result=mysqli_query($con, $query);
        $available_students = $result;

        // echo "$sectid, $query, $max, $lvl, $session\n";
        // var_dump($row);
        // die();
        
        if(mysqli_num_rows($result) == 0){
            header('HTTP/1.1 500 Internal Server Error');
            die('No available students');
        }

        while($row=mysqli_fetch_array($result)):
            $studid=$row['tblStudentId'];
            $studname = $row['name'];
            if($studid!="")
            {
                echo "[$studid] $studname\n";
            }
        endwhile;
    }
?>