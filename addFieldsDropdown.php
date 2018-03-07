<?php 

  //--------------------------------------------------------------------------
  // Example php script for fetching data from mysql database
  //--------------------------------------------------------------------------
  //--------------------------------------------------------------------------
  // 1) Connect to mysql database
  //--------------------------------------------------------------------------
  include 'db_connect.php';

  //--------------------------------------------------------------------------
  // 2) Query database for data
  //--------------------------------------------------------------------------
  $result = mysqli_query($con, "SELECT tblFeeCode, tblFeeName FROM tblfee");          //query
  while ( $row = mysqli_fetch_row($result) )
  {
    $data[] = $row;
  }                        //fetch result    

  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------
  echo json_encode($data);

?>