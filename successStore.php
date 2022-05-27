<?php
    $con = mysqli_connect("localhost", "root", "1513", "enb");
    $sql = "SELECT store_name from member ORDER BY test_result DESC LIMIT 3";
    $result = mysqli_query($con, $sql);
    $response = array();
    $a = 0;
    $response["success"] = false;

    while($row = mysqli_fetch_array($result)){
       $response["success"] = true;
       if($a==0){
        $response["store_name1"] = $row["store_name"];
       }
       else if($a==1){
        $response["store_name2"] = $row["store_name"];
       }
       else{
        $response["store_name3"] = $row["store_name"];
       }
       $a = $a+1;
    }

    echo json_encode($response);

   
?>