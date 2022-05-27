<?php
    $con = mysqli_connect("localhost", "root", "1513", "enb");
    mysqli_query($con,'SET NAMES utf8');

    $userID = $_POST["userid"] ?? '';
    $tr = $_POST["tr"] ?? '';
    $userEmail = $_POST["email"] ?? '';

    $statement = mysqli_prepare($con, "SELECT test_result, email, id from member where id = ?");
    mysqli_stmt_bind_param($statement, "s", $userID);
    mysqli_stmt_execute($statement);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $tr, $userEmail, $userID);

    $response = array();
    $response["success"] = false;

    while(mysqli_stmt_fetch($statement)) {
        $response["success"] = true;
        $response["test_result"] = $tr;
        $response["email"] = $userEmail;
        $response["id"] = $userID;
    }

    echo json_encode($response);
?>