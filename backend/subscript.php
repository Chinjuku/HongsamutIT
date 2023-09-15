<!-- create supscription system for already login user -->
<?php
    include 'database.php';
    require_once 'gbprimepay.php';
  
    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['email'];
    $plan_id = $_SESSION['plan_id'];
    $selected_plan_id = $_POST['plan_id'];// รับค่า plan id ที่ user เลือกมา


    $sql = "SELECT * FROM user WHERE email = '{$email}' AND plan_id = NULL"; // ดึงข้อมูล user ที่มี email ตรงกับที่ user กรอกมา และยังไม่มี subscription plan
    $result = $conn->query($sql); // ดึงข้อมูล user ที่มี email ตรงกับที่ user กรอกมา และยังไม่มี subscription plan

    if ($result->num_rows == 1) {

      $subscription_sql = "SELECT * FROM subscription_plans WHERE plan_id = {$selected_plan_id}"; 
      $subscription_result = $conn->query($subscription_sql); // ดึงข้อมูล subscription plan ที่ user เลือก
      if ($subscription_result->num_rows > 0) { // ถ้ามี subscription plan ที่ user เลือกอยู่ในระบบ
        $subscription_row = $subscription_result->fetch_assoc(); // ดึงข้อมูล subscription plan ที่ user เลือก
        $plan_price = $subscription_row['price']; // ดึงราคา subscription plan ที่ user เลือก

        $current_date = date('Y-m-d'); // วันที่ปัจจุบัน
        $start_date = $current_date; // วันที่เริ่มต้น
        
        $insert_payment_sql = "INSERT INTO payments (amount, user_id, date_paid, is_success) VALUES ('$plan_price', '{$user_id}', '{$start_date}', 0)"; // สร้าง payment ใหม่
        
        $payment_sql = "SELECT * FROM payments WHERE user_id = '{$user_id}' AND is_success = 0"; // ดึง payment ที่สร้างไปใหม่
        $payment_result = $conn->query($payment_sql);
        $payment_row = $payment_result->fetch_assoc();
        $payment_id = $payment_row['payment_id']; // ดึง payment id จาก payment ที่สร้างไปใหม่


        $token = "wait_for_me dont touch this mf"; // ใส่ token ที่ได้จากการสร้าง token ใน gbprimepay.com
        $gbprimepay = new GBPrimePay();
        $qrcode = $gbprimepay->promptpay([ // สร้าง qrcode สำหรับชำระเงิน
            'amount' => '$plan_price',
            'referenceNo' => '$payment_id',
            'backgroundUrl' => 'https://hongsamutit2.iservkmitl.tech/gbprimepay.webhook.php', // ให้ GBPrimePay ส่งข้อมูลกลับมาที่ไหน
        ], $token);
        echo '<img src="' . $qrcode . '">'; // แสดง qrcode สำหรับชำระเงิน
        
        
      } else {
        $_SESSION['subscription_status'] = "Invalid subscription plan selected.";
      }
    } else {
      echo "YOU ALREADY SUBSCRIBED TO A PLAN";
    }
    
    header('location:../frontend/index.php');
