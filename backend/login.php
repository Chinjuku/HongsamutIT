<?php
include 'database.php';
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
// $type = $_GET['type'];
// echo $type;

$sql = "SELECT * FROM register where email = '{$email}' and password = '{$password}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  // output data of each row

  while($row = $result->fetch_assoc()) {

    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['gender'] = $row['gender'];

  }
  header('location:../frontend/index.php');
  
} else {
  // echo '<script>alert("Your account is incorrect.");</script>';
  echo '<script>window.location.href = "../frontend/login.php";</script>';
}

?>
