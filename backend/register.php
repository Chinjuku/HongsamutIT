<?php
    // session_start();
    include 'database.php';

    $username = $_POST["user_name"];
    $firstname = $_POST["first_name"];
    $lastname = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone_num = $_POST["phone_num"];
    $usertypeid = $_POST["user_type"];
    date_default_timezone_set('Asia/Bangkok');
    $date_register = date('Y-m-d H:i:s');

    // คำสั่ง SQL สำหรับค้นหาชื่อและอีเมลในฐานข้อมูล
    $sql = "SELECT * FROM users WHERE email = '{$email}' LIMIT 1";
    $stmt = $conn->query($sql);

    $sql_2 = "SELECT * FROM users WHERE phone_number = '{$phone_num}' LIMIT 1";
    $stmt_2 = $conn->query($sql_2);

    $sql_3 = "SELECT * FROM users WHERE user_name = '{$username}' LIMIT 1";
    $stmt_3 = $conn->query($sql_3);

    if ($stmt->num_rows == 1) {
        echo '<script>alert("This email already existed.");</script>';
        echo '<script>window.location.href = "../frontend/regis.php";</script>';
        // header('Location: ../frontend/regis.php');
    }
    else if($stmt_2->num_rows == 1){
        echo '<script>alert("This phone number already existed.");</script>';
        echo '<script>window.location.href = "../frontend/regis.php";</script>';
    }
    else if($stmt_3->num_rows == 1){
        echo '<script>alert("This username already existed.");</script>';
        echo '<script>window.location.href = "../frontend/regis.php";</script>';
    }
    else {
        // ถ้าไม่มีชื่อหรืออีเมลนี้ในระบบ สามารถเพิ่มข้อมูลได้
        $sql = "INSERT INTO users (user_name, first_name, last_name, email, password, phone_number, user_type_id, date_register)
        VALUES ('{$username}', '{$firstname}', '{$lastname}','{$email}', '{$password}', '{$phone_num}', '{$usertypeid}', '{$date_register}')";

        // ใช้ prepared statement
        $stmt = $conn->prepare($sql);

        if ($stmt->execute()) {
            session_start();
            echo "New record created successfully";
            echo '<script>window.location.href = "../frontend/login.php";</script>';
            exit();
        } else {
            echo "Error: " . $stmt->error;
            echo '<script>window.location.href = "../frontend/regis.php";</script>';
            exit();
        }
    }

?>


