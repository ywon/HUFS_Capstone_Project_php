<?php
    $con = mysqli_connect("localhost", "root", "1513", "enb");
    mysqli_query($con,'SET NAMES utf8');

    $userID = $_POST["userid"] ?? '';
    $s1 = $_POST["s1"] ?? '';
    $s2 = $_POST["s2"] ?? '';
    $s3 = $_POST["s3"] ?? '';
    $s4 = $_POST["s4"] ?? '';

    $statement = mysqli_prepare($con, "SELECT store_name, category, open_date, sns from member where id=?");
    mysqli_stmt_bind_param($statement, "s", $userID);
    mysqli_stmt_execute($statement);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $s1, $s2, $s3, $s4);

    $response = array();
    $response["success"] = false;

    while(mysqli_stmt_fetch($statement)) {
        $response["success"] = true;
        $response["store_name"] = $s1;
        $response["category"] = $s2;
        $response["open_date"] = $s3;
        $response["sns"] = $s4;
    }

    echo json_encode($response);
?>