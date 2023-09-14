<?php
session_start();
include 'database.php';
$username = $_POST['user_name'];
$password = $_POST['password'];

$sql = "SELECT * FROM user where user_name = '{$username}' and password = '{$password}'";
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
    $_SESSION['phone_num'] = $row['phone_number'];

  }
  echo '<script>window.location.href = "../frontend/index.php";</script>';
  
} else {
  // echo '<script>alert("Your account is incorrect.");</script>';
  echo '<script>window.location.href = "../frontend/login.php";</script>';
}

?>
