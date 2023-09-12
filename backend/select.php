<?php
include 'database.php';
session_start();
$sql = "SELECT * FROM users where user_id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["user_id"]. " - Name: " . $row["fn"]. " " . $row["ln"]. "<br>";
    $_SESSION['id'] = $row['user_id'];
    $_SESSION['fn'] = $row['fn'];
    $_SESSION['ln'] = $row['ln'];
  }
  
} else {
  echo "0 results";
}
header('location:test.php');
?>