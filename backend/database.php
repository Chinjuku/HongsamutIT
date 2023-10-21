<?php
    $host = "localhost";
    $dbUsername = "root";

    $conn = new mysqli($host, $dbUsername, "", "ebook", 3306);

    if($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
?>