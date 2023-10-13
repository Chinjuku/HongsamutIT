<?php
session_start();
include 'database.php';
$username = $_POST['user_name'];
$password = $_POST['password'];

$sql = "SELECT * FROM users where user_name = '{$username}' and password = '{$password}'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {

  // output data of each row

  while($row = $result->fetch_assoc()) {

    $_SESSION['email'] = $row['email'];
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['first_name'] = $row['first_name'];
    $_SESSION['last_name'] = $row['last_name'];
    $_SESSION['user_type'] = $row['user_type_id'];
    $_SESSION['phone_num'] = $row['phone_number'];
    $_SESSION['date_register'] = $row['date_register'];
    $_SESSION['plan_id'] = $row['plan_id'];
    // $plan_id_sql = "SELECT * FROM user WHERE email = '{$_SESSION['email']}' AND plan_id IS NULL"; // ดึงข้อมูล user ที่มี email ตรงกับที่ user กรอกมา และยังไม่มี subscription plan
    // $plan_id_result = $conn->query($sql);

    // if ($plan_id_result->num_rows == 0) { // ถ้ามี subscription plan ที่ user เลือกอยู่ในระบบ
    //   $_SESSION['plan_id'] = $row['plan_id'];
    // }
    // else{
    //   $_SESSION['plan_id'] = NULL;
    // }
  }
  echo '<script>window.location.href = "../frontend/home.php";</script>';
  
} else {
  echo '<script>alert("Your account is incorrect.");</script>';
  echo '<script>window.location.href = "../frontend/login.php";</script>';
}

?>
