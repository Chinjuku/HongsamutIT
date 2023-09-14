<?php
    include 'database.php';
    $username = $_POST["user_name"];
    $firstname = $_POST["first_name"];
    $lastname = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone_num = $_POST["phone_num"];
    $usertype = $_POST["user_type"];

    $sql = "SELECT * FROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {

    $_SESSION['email'] = $row['email'];
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['first_name'] = $row['first_name'];
    $_SESSION['last_name'] = $row['last_name'];
    $_SESSION['user_type'] = $row['user_type'];
    $_SESSION['phone_num'] = $row['phone_num'];

     }
    }

?>