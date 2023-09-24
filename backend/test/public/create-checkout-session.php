<?php
session_start();
include '../../database.php';
require_once '../../../vendor/autoload.php';
// require_once('/path/to/stripe-php/init.php');
require_once '../secrets.php';

\Stripe\Stripe::setApiKey("$stripeSecretKey");

header('Content-Type: application/json');

$YOUR_DOMAIN = 'https://hongsamutit2.iservkmitl.tech/backend/test/public';

function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[random_int(0, $charactersLength - 1)];
  }
  return $randomString;
}
$_SESSION['ref'] = generateRandomString();

$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$plan_id = $_SESSION['plan_id'];
$selected_plan_id = $_POST['lookup_key'];// รับค่า plan id ที่ user เลือกมา
$_SESSION['selected_plan_id'] = $selected_plan_id;



$sql = "SELECT * FROM users WHERE email = '{$email}' AND plan_id IS NULL;"; // ดึงข้อมูล user ที่มี email ตรงกับที่ user กรอกมา และยังไม่มี subscription plan
$result = $conn->query($sql); // ดึงข้อมูล user ที่มี email ตรงกับที่ user กรอกมา และยังไม่มี subscription plan
if ($result->num_rows == 1) {

  $subscription_sql = "SELECT * FROM subscription_plans WHERE plan_id = {$selected_plan_id}"; 
  $subscription_result = $conn->query($subscription_sql); // ดึงข้อมูล subscription plan ที่ user เลือก
  if ($subscription_result->num_rows > 0) { // ถ้ามี subscription plan ที่ user เลือกอยู่ในระบบ
    $subscription_row = $subscription_result->fetch_assoc(); // ดึงข้อมูล subscription plan ที่ user เลือก
    $plan_price = $subscription_row['price']; // ดึงราคา subscription plan ที่ user เลือก

    $current_date = date('Y-m-d'); // วันที่ปัจจุบัน
    $start_date = $current_date; // วันที่เริ่มต้น
        
    $insert_payment_sql = "INSERT INTO payments (amount, date_paid, user_id, is_success, ref) VALUES ('{$plan_price}', '{$start_date}', '{$user_id}', 0, '{$_SESSION['ref']}')"; // สร้าง payment ใหม่
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
  echo '<script>alert("YOU ALREADY SUBSCRIBED TO A PLAN");</script>';
  echo '<script>window.location.href = "../../../frontend/profile.php";</script>';
}
    


try {
  $prices = \Stripe\Price::all([
    // retrieve lookup_key from form data POST body
    'lookup_keys' => [$selected_plan_id],
    'expand' => ['data.product']
  ]);

  $checkout_session = \Stripe\Checkout\Session::create([
    'line_items' => [[
      'price' => $prices->data[0]->id,
      'quantity' => 1,
    ]],
    'mode' => 'subscription',
    'success_url' => $YOUR_DOMAIN . '/success.php?session_id={CHECKOUT_SESSION_ID}',
    'cancel_url' => 'https://hongsamutit2.iservkmitl.tech/frontend/member.php',
  ]);

  header("HTTP/1.1 303 See Other");
  header("Location: " . $checkout_session->url);
} catch (Error $e) {
  http_response_code(500);
  echo json_encode(['error' => $e->getMessage()]);
}