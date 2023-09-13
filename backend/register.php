<?php
    include 'database.php';
    
    $name = $_POST["inputname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone_num = $_POST["phone_num"];
    
    // คำสั่ง SQL สำหรับค้นหาชื่อและอีเมลในฐานข้อมูล
    $sql = "SELECT * FROM register WHERE email = '{$email}' LIMIT 1";
    $stmt = $conn->query($sql);

    $sql_2 = "SELECT * FROM register WHERE phone_number = '{$phone_num}' LIMIT 1";
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
