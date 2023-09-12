<?php
    include 'database.php';

    $name = $_POST["inputname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    
    // คำสั่ง SQL สำหรับค้นหาชื่อและอีเมลในฐานข้อมูล
    $sql = "SELECT * FROM register WHERE email = '{$email}' LIMIT 1";
    $stmt = $conn->query($sql);

    if ($stmt->num_rows == 1) {
        echo '<script>alert("This name/email already existed.");</script>';
        echo '<script>window.location.href = "../frontend/regis.php";</script>';
        // header('Location: ../frontend/regis.php');
    } else {
        // ถ้าไม่มีชื่อหรืออีเมลนี้ในระบบ สามารถเพิ่มข้อมูลได้
        $sql = "INSERT INTO register (name, email, password, gender)
         VALUES ('{$name}', '{$email}', '{$password}', '{$gender}')";

        // ใช้ prepared statement
        $stmt = $conn->prepare($sql);
        // $stmt->bind_param("ssss", $name, $email, $password, $gender);

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
?>