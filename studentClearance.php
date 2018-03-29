<?php    
    include "db_connect.php";

    $studid = $_POST['txtStudentId'];
    // $studid = '17001'; // debugging purposes... 

    function isPaid($account){
        return $account['tblAccPaid'] == 'PAID';
    }

    /* set autocommit to off */
    $con->autocommit(FALSE);


    // check if all fees are paid
    $result = mysqli_query($con, "
        select * from tblAccount 
        where   tblAcc_tblStudentId='$studid' 
        and     tblAccFlag=1");

    // die(var_dump($result->fetch_all(MYSQLI_ASSOC))); // debugging purposes... 

    // count no of fees for student 
    $fee_count = $result->num_rows;
    // count paid fees 
    $paid_count = count(array_filter($result->fetch_all(MYSQLI_ASSOC), "isPaid"));

    // echo $fee_count.' '.$paid_count;

    // if all fees are paid
    if($fee_count == $paid_count){
        // check if student passed 
        $result = mysqli_query($con, "
            select * 
            from    tblgradeave 
            where   tblGenAve_tblStudentId='$studid' 
            and     tblGenAve_tblSchoolYrId='$syid' 
            and     tblGenAveId IN 
                    (
                        select max(tblGenAveId) 
                        from tblgradeave 
                        group by tblGenAve_tblStudentId 
                        order by tblGenAveId desc
                    )
            limit 1
            ");
        
        $row = mysqli_fetch_assoc($result);
        
        if($row['tblGenAveStatus'] == 'PASSED'){
            
            // update clearance to 'Y'
            mysqli_query($con, "
                update tblstudenroll 
                set tblStudEnrollClearance='Y'
                where tblStudEnroll_tblStudentId='$studid'
            ");
            
            // update student status to 'ENROLLEE'
            mysqli_query($con, "
                update  tblstudent 
                set tblStudentType='PROMOTED'
                where   tblStudentId='$studid' 
                and     tblStudentFlag=1
            ");
            
            /* commit transaction */
            if (!$con->commit()) {
                print("Transaction commit failed\n");
                exit();
            }

            // echo 'Cleared';

        } else {
            // failed
            // echo 'Failed';
        }
    } else {
        // not fully paid
        // echo 'Not fully paid';
    }