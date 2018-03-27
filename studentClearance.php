<?php
    function isPaid($account){
        return $account['tblAccPaid'] == 'PAID';
    }
    
    // check if all fees are paid
    $result = mysqli_query($con, "
        select * from tblAccount 
        where   tblAcc_tblStudentId='$studid' 
        and     tblAccFlag=1");
    if(count(array_filter($result, "isPaid")) == 0){
        
        // check if student passed 
        $result = mysqli_query($con, "
            select * 
            from tblgradeave 
            where   tblGenAve_tblStudentId='$studid' 
            and     tblGenAve_tblSchoolYrId='$schoolyr' 
            group by tblGenAve_tblStudentId 
            order by tblGenAveId desc");
        
        if($row['tblGenAveStatus'] == 'PASSED'){
            
            // update clearance to 'Y'
            mysqli_query($con, "
                update tblstudenroll 
                where tblStudEnroll_tblStudentId='$studid' 
                set tblStudEnrollClearance='Y'");
            
            // update student status to 'ENROLLEE'
            mysqli_query($con, "
                update tblstudent 
                where   tblStudentId='$studid' 
                and     tblStudentFlag=1
                set tblStudentType='ENROLLEE'");
        }
    }