<?php

    $host = "localhost";
    $dbUsername = "root";
    
    $conn = new mysqli($host, $dbUsername, "", "db_login");

    if($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    echo "Connect Successfully";

?>