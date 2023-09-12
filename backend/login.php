<?php
include 'database.php';
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users where email = '{$email}' and password = '{$password}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['gender'] = $row['gender'];
  }
  
} else {
  echo "0 results";
}
header('location:home.php');
?>