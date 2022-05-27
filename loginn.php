<?php
    $con = mysqli_connect("localhost", "root", "1513", "enb");
    mysqli_query($con,'SET NAMES utf8');

    $userID = $_POST["userid"] ?? '';
    $userPassword = $_POST["password"] ?? '';

    $statement = mysqli_prepare($con, "SELECT id, pw FROM member WHERE id = ? AND pw = ?");
    mysqli_stmt_bind_param($statement, "ss", $userID, $userPassword);
    mysqli_stmt_execute($statement);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $userPassword);

    $response = array();
    $response["success"] = false; 

    while(mysqli_stmt_fetch($statement)) {
        $response["success"] = true;
        $response["id"] = $userID;
        $response["pw"] = $userPassword;
    }

    echo json_encode($response);

?>