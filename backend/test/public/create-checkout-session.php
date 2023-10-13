<?php
session_start();
include '../../database.php';
require_once '../../../vendor/autoload.php';
// require_once('/path/to/stripe-php/init.php');
require_once '../secrets.php';

\Stripe\Stripe::setApiKey("$stripeSecretKey");

header('Content-Type: application/json');

$YOUR_DOMAIN = 'https://hongsamutit.iservkmitl.tech/backend/test/public';
// $YOUR_DOMAIN = 'http://localhost/backend/test/public';

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
    'cancel_url' => 'https://hongsamutit.iservkmitl.tech/frontend/member.php',
    // 'cancel_url' => 'http://localhost/frontend/member.php',
  ]);

  header("HTTP/1.1 303 See Other");
  header("Location: " . $checkout_session->url);
} catch (Error $e) {
  http_response_code(500);
  echo json_encode(['error' => $e->getMessage()]);
}
