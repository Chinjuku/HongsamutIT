<?php
    include 'database.php';

    session_start();
    $name = $_POST["inputname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirm-password"];
    $gender = $_POST["gender"];
    
    // คำสั่ง SQL สำหรับค้นหาชื่อและอีเมลในฐานข้อมูล
    $SELECT = "SELECT name, email FROM register WHERE name = ? OR email = ? LIMIT 1";

    // ใช้ prepared statement เพื่อตรวจสอบชื่อและอีเมล
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        echo '<script>alert("This name/email already existed.");</script>';
        echo '<script>window.location.href = "../frontend/regis.php";</script>';
        // header('Location: ../frontend/regis.php');
    } else {
        // ถ้าไม่มีชื่อหรืออีเมลนี้ในระบบ สามารถเพิ่มข้อมูลได้
        $INSERT = "INSERT INTO register (name, email, password, confirmpassword, gender) VALUES (?, ?, ?, ?, ?)";
        
        // ใช้ prepared statement
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sssss", $name, $email, $password, $confirmpassword, $gender);

        if ($stmt->execute()) {
            echo "New record created successfully";
            header('Location: ../frontend/home.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
            header('Location: ../frontend/regis.php');
            exit();
        }
    }

    $stmt->close(); // ปิด prepared statement
    $conn->close(); // ปิดการเชื่อมต่อฐานข้อมูล
?>