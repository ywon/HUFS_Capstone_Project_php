<?php
    $con = mysqli_connect("localhost", "root", "1513", "enb");
    mysqli_query($con,'SET NAMES utf8');

    $userID = $_POST["userid"] ?? '';
    $r1 = $_POST["r1"] ?? '';
    $r2 = $_POST["r2"] ?? '';
    $r3 = $_POST["r3"] ?? '';
    $r4 = $_POST["r4"] ?? '';
    $tr = $_POST["tr"] ?? '';

    $statement = mysqli_prepare($con, "SELECT result_1, result_2, result_3, result_4, test_result from member where id = ?");
    mysqli_stmt_bind_param($statement, "s", $userID);
    mysqli_stmt_execute($statement);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $r1, $r2, $r3, $r4, $tr);

    $response = array();
    $response["success"] = false;

    while(mysqli_stmt_fetch($statement)) {
        $response["success"] = true;
        $response["result_1"] = $r1;
        $response["result_2"] = $r2;
        $response["result_3"] = $r3;
        $response["result_4"] = $r4;
        $response["test_result"] = $tr;
    }

    echo json_encode($response);
?>