<?php
    header("Content-Type: text/html; charset=utf8");
    $con = mysqli_connect("localhost", "root", "1513", "enb");
    mysqli_set_charset($con, "utf8");
    mysqli_query($con, "set session character_set_connection=utf8;");
    mysqli_query($con, "set session character_set_results=utf8;");
    mysqli_query($con, "set session character_set_client=utf8;");
 
    $sql = "SELECT food_keyword from food";
    $result = mysqli_query($con, $sql);
    $response = array();
    $a = 0;
    $response["success"] = false;

    while($row = mysqli_fetch_array($result)){
       $response["success"] = true;
       if($a==0){
        $response["c1"] = $row["food_keyword"];
       }
       else if($a==1){
        $response["c2"] = $row["food_keyword"];
       }
       else if($a==2){
        $response["c3"] = $row["food_keyword"];
       }
       else if($a==3){
        $response["c4"] = $row["food_keyword"];
       }
       else if($a==4){
        $response["c5"] = $row["food_keyword"];
       }
       else if($a==5){
        $response["c6"] = $row["food_keyword"];
       }
       else if($a==6){
        $response["c7"] = $row["food_keyword"];
       }
       else if($a==7){
        $response["c8"] = $row["food_keyword"];
       }
       else if($a==8){
        $response["c9"] = $row["food_keyword"];
       }
       else{
        $response["c10"] = $row["food_keyword"];
       }
       $a = $a+1;
    }

    echo json_encode($response, JSON_UNESCAPED_UNICODE);

   
?>