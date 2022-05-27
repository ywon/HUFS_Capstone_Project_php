<?php
    $con = mysqli_connect("localhost", "root", "1513", "enb");
    mysqli_query($con,'SET NAMES utf8');

    $userID = $_POST["userid"];
    $r1 = $_POST["r1"];
    $r2 = $_POST["r2"];
    $r3 = $_POST["r3"];
    $r4 = $_POST["r4"];
    $tr = $_POST["tr"];

    $statement = mysqli_prepare($con, "UPDATE member SET result_1 = ?, result_2 = ? , result_3 = ?, result_4 = ?, test_result = ?  where id=?");
    mysqli_stmt_bind_param($statement, "iiiiis", $r1, $r2, $r3, $r4, $tr, $userID);
    mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = true;

    echo json_encode($response);
?>