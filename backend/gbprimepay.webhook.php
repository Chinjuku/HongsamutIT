+<?php
// ถ้าเป็น ip ของ GBPrimePay ถึงจะให้ทำงานโค้ดใน if
include 'database.php';

$white_list = [
    '203.151.205.45',
    '203.151.205.33',
    '18.143.213.62',
    '13.215.225.183',
    '54.254.171.101',
    '18.141.54.201',
    '54.151.232.117',
    '54.255.79.153'
];

if (in_array($_SERVER['REMOTE_ADDR'], $white_list)) {
    $respFile = fopen("resp-log.json", "w") or die("Unable to open file!");
    $json_str = file_get_contents('php://input');
    fwrite($respFile, $json_str . "nn");
    $json_obj = json_decode($json_str);

    $subscription_sql = "SELECT * FROM subscription_plans WHERE plan_id = '{$_SESSION['selected_plan_id']}'"; // ดึงข้อมูล subscription plan ที่ user เลือก
    $subscription_result = $conn->query($subscription_sql); 
    $subscription_row = $subscription_result->fetch_assoc();  
    $plan_duration = $subscription_row['duration']; // ดึงระยะเวลา subscription plan ที่ user เลือก

    
    $update_payment = "UPDATE payments SET is_success = 1 WHERE payment_id = '{$json_obj->referenceNo}'";// อัพเดท payment ว่าสำเร็จ
    $conn->query($update_payment);

    $current_date = date('Y-m-d');
    $start_date = $current_date;
    $end_date = date('Y-m-d', strtotime("+$plan_duration days", strtotime($current_date)));

    $insert_subscription_sql = "INSERT INTO user_subscriptions (user_id, plan_id, date_start, date_end) VALUES ('{$_SESSION['user_id']}', '{$_SESSION['selected_plan_id']}', '{$start_date}', '{$end_date}')"; //
    $conn->query($insert_subscription_sql);// เพิ่ม subscription plan ให้ user
    $update_user_sql = "UPDATE user SET plan_id = '{$_SESSION['selected_plan_id']}' WHERE user_id = '{$_SESSION['user_id']}'"; // อัพเดท user ว่ามี subscription plan อะไร
    $conn->query($update_user_sql);// อัพเดท user ว่ามี subscription plan อะไร

    fwrite($respFile, $json_obj);
    fclose($respFile);
} else {
    die('Access Denied');
}
header('location:../frontend/index.php'); // ไปหน้า index
