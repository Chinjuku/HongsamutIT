<?php
    session_start();
    include 'database.php';

    $username = $_POST["user_name"];
    $firstname = $_POST["first_name"];
    $lastname = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone_num = $_POST["phone_num"];
    
    // คำสั่ง SQL สำหรับค้นหาชื่อและอีเมลในฐานข้อมูล
    $sql = "SELECT * FROM user WHERE email = '{$email}' LIMIT 1";
    $stmt = $conn->query($sql);

    $sql_2 = "SELECT * FROM user WHERE phone_number = '{$phone_num}' LIMIT 1";
    $stmt_2 = $conn->query($sql_2);

    if ($stmt->num_rows == 1) {
        echo '<script>alert("This email already existed.");</script>';
        echo '<script>window.location.href = "../frontend/regis.php";</script>';
        // header('Location: ../frontend/regis.php');
    }
    else if($stmt_2->num_rows == 1){
        echo '<script>alert("This phonenumber already existed.");</script>';
        echo '<script>window.location.href = "../frontend/regis.php";</script>';

    } else {
        // ถ้าไม่มีชื่อหรืออีเมลนี้ในระบบ สามารถเพิ่มข้อมูลได้
        $sql = "INSERT INTO user (user_name, first_name, last_name, email, password, phone_number)
         VALUES ('{$username}', '{$firstname}', '{$lastname}','{$email}', '{$password}', '{$phone_num}')";

        // ใช้ prepared statement
        $stmt = $conn->prepare($sql);

        if ($stmt->execute()) {
            echo "New record created successfully";
            header('Location: ../frontend/index.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
            header('Location: ../frontend/regis.php');
            exit();
        }
    }
?>
