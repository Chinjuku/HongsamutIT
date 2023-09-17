<?php
    // session_start();
    $host = "161.246.127.24";
    $dbUsername = "admin";

    $conn = new mysqli($host, $dbUsername, "admin", "hongsamutit", 9059);

    if($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    // else{
    //     echo "Connect Successfully";
    // }
?>
