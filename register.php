<?php
    $con = mysqli_connect("localhost", "root", "1513", "enb");
    mysqli_query($con,'SET NAMES utf8');

    $userID = $_POST["userid"];
    $userPassword = $_POST["password"];
    $userEmail = $_POST["email"];

    $statement = mysqli_prepare($con, "INSERT INTO member VALUES (?,?,?,0,0,0,0,0,' ',' ',' ',' ',' ')");
    mysqli_stmt_bind_param($statement, "sss", $userID, $userPassword, $userEmail);
    mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = true;

    echo json_encode($response);
?>