<?php
    $con = mysqli_connect("localhost", "root", "1513", "enb");
    mysqli_query($con,'SET NAMES utf8');

    $userID = $_POST["userid"];
    $s1 = $_POST["s1"];
    $s2 = $_POST["s2"];
    $s3 = $_POST["s3"];
    $s4 = $_POST["s4"];

    $statement = mysqli_prepare($con, "UPDATE member SET store_name = ?, category = ? , open_date = ?, sns = ?  where id=?");
    mysqli_stmt_bind_param($statement, "sssss", $s1, $s2, $s3, $s4, $userID);
    mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = true;

    echo json_encode($response);
?>