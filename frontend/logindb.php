<?php
session_start();
$host = "161.246.127.24";
$dbUsername = "admin";

$conn = new mysqli($host, $dbUsername, "admin", "hongsamutit", 9059);

if($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

$username = $_POST['user_name'];
$password = $_POST['password'];
// $type = $_GET['type'];
// echo $type;

$sql = "SELECT * FROM user where user_name = '{$username}' and password = '{$password}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  // output data of each row

  while($row = $result->fetch_assoc()) {

    $_SESSION['email'] = $row['email'];
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['password'] = $row['password'];

  }
  header('location:index.php');
  
} else {
  // echo '<script>alert("Your account is incorrect.");</script>';
  echo '<script>window.location.href = "login.php";</script>';
}

?>