<!-- create supscription system for already login user -->
<?php
    session_start();
    include 'database.php';
    require_once 'gbprimepay.php';
  
    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['email'];
    $plan_id = $_SESSION['plan_id'];
    $selected_plan_id = $_POST['plan_id'];// รับค่า plan id ที่ user เลือกมา


    $sql = "SELECT * FROM users WHERE email = '{$email}' AND plan_id IS NULL;"; // ดึงข้อมูล user ที่มี email ตรงกับที่ user กรอกมา และยังไม่มี subscription plan
    $result = $conn->query($sql); // ดึงข้อมูล user ที่มี email ตรงกับที่ user กรอกมา และยังไม่มี subscription plan
    var_dump($result->num_rows);
    if ($result->num_rows == 1) {

      $subscription_sql = "SELECT * FROM subscription_plans WHERE plan_id = {$selected_plan_id}"; 
      $subscription_result = $conn->query($subscription_sql); // ดึงข้อมูล subscription plan ที่ user เลือก
      if ($subscription_result->num_rows > 0) { // ถ้ามี subscription plan ที่ user เลือกอยู่ในระบบ
        $subscription_row = $subscription_result->fetch_assoc(); // ดึงข้อมูล subscription plan ที่ user เลือก
        $plan_price = $subscription_row['price']; // ดึงราคา subscription plan ที่ user เลือก

        $current_date = date('Y-m-d H:i:s'); // วันที่ปัจจุบัน
        $start_date = $current_date; // วันที่เริ่มต้น
        
        $insert_payment_sql = "INSERT INTO payments (amount, date_paid, user_id, is_success) VALUES ('{$plan_price}', '{$start_date}', '{$user_id}', 0)"; // สร้าง payment ใหม่
        $conn->query($insert_payment_sql); // สร้าง payment ใหม่

        
        // $payment_sql = "SELECT * FROM payments WHERE user_id = '{$user_id}' AND is_success = 0"; // ดึง payment ที่สร้างไปใหม่
        // $payment_result = $conn->query($payment_sql);
        // $payment_row = $payment_result->fetch_assoc();
        // $payment_id = $payment_row['payment_id']; // ดึง payment id จาก payment ที่สร้างไปใหม่

        // $subscription_sql = "SELECT * FROM subscription_plans WHERE plan_id = '{$_SESSION['selected_plan_id']}'"; // ดึงข้อมูล subscription plan ที่ user เลือก
        // $subscription_result = $conn->query($subscription_sql); 
        // $subscription_row = $subscription_result->fetch_assoc();  
        // $plan_duration = $subscription_row['duration']; // ดึงระยะเวลา subscription plan ที่ user เลือก

        
        // $update_payment = "UPDATE payments SET is_success = 1 WHERE payment_id = '{$json_obj->referenceNo}'";// อัพเดท payment ว่าสำเร็จ
        // $conn->query($update_payment);

        // $current_date = date('Y-m-d');
        // $start_date = $current_date;
        // $end_date = date('Y-m-d', strtotime("+$plan_duration days", strtotime($current_date)));

        // $insert_subscription_sql = "INSERT INTO user_subscriptions (user_id, plan_id, date_start, date_end) VALUES ('{$_SESSION['user_id']}', '{$_SESSION['selected_plan_id']}', '{$start_date}', '{$end_date}')"; //
        // $conn->query($insert_subscription_sql);// เพิ่ม subscription plan ให้ user
        // $update_user_sql = "UPDATE user SET plan_id = '{$_SESSION['selected_plan_id']}' WHERE user_id = '{$_SESSION['user_id']}'"; // อัพเดท user ว่ามี subscription plan อะไร
        // $conn->query($update_user_sql);// อัพเดท user ว่ามี subscription plan อะไร
        // echo '<script>alert("success");</script>';
        // echo '<script>window.location.href = "../frontend/profile.php";</script>';
        
      } else {
        $_SESSION['subscription_status'] = "Invalid subscription plan selected.";
      }
    } else {
      echo "YOU ALREADY SUBSCRIBED TO A PLAN";
    }
    
    // header('location:../frontend/index.php');
