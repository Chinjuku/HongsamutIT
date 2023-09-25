<?php
  session_start();
  include '../../database.php';
  $subscription_sql = "SELECT * FROM subscription_plans WHERE plan_id = '{$_SESSION['selected_plan_id']}'"; // ดึงข้อมูล subscription plan ที่ user เลือก
  $subscription_result = $conn->query($subscription_sql); 
  $subscription_row = $subscription_result->fetch_assoc();  
  $plan_duration = $subscription_row['duration']; // ดึงระยะเวลา subscription plan ที่ user เลือก

  
  $update_payment = "UPDATE payments SET is_success = 1 WHERE ref = '{$_SESSION['ref']}'";// อัพเดท payment ว่าสำเร็จ
  $conn->query($update_payment);

  $current_date = date('Y-m-d');
  $start_date = $current_date;
  $end_date = date('Y-m-d', strtotime("+$plan_duration days", strtotime($current_date)));

  $insert_subscription_sql = "INSERT INTO user_subscriptions (user_id, plan_id, date_start, date_end) VALUES ('{$_SESSION['user_id']}', '{$_SESSION['selected_plan_id']}', '{$start_date}', '{$end_date}')"; //
  $conn->query($insert_subscription_sql);// เพิ่ม subscription plan ให้ user
  $update_user_sql = "UPDATE users SET plan_id = '{$_SESSION['selected_plan_id']}' WHERE user_id = '{$_SESSION['user_id']}'"; // อัพเดท user ว่ามี subscription plan อะไร
  $conn->query($update_user_sql);// อัพเดท user ว่ามี subscription plan อะไร
  $_SESSION['plan_id'] = $_SESSION['selected_plan_id'];
  echo '<script>window.location.href = "../../../frontend/profile.php";</script>';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Thanks for your order!</title>
  <link rel="stylesheet" href="style.css">
  <script src="client.js" defer></script>
</head>
<body>
  <section>
    <div class="product Box-root">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14px" height="16px" viewBox="0 0 14 16" version="1.1">
          <defs/>
          <g id="Flow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="0-Default" transform="translate(-121.000000, -40.000000)" fill="#E184DF">
                  <path d="M127,50 L126,50 C123.238576,50 121,47.7614237 121,45 C121,42.2385763 123.238576,40 126,40 L135,40 L135,56 L133,56 L133,42 L129,42 L129,56 L127,56 L127,50 Z M127,48 L127,42 L126,42 C124.343146,42 123,43.3431458 123,45 C123,46.6568542 124.343146,48 126,48 L127,48 Z" id="Pilcrow"/>
              </g>
          </g>
      </svg>
      <div class="description Box-root">
        <h3>Subscription to the plan successful!</h3>
      </div>
    </div>
    <form action="/create-portal-session.php" method="POST">
      <input type="hidden" id="session-id" name="session_id" value="" />
      <button id="checkout-and-portal-button" type="submit">Manage your billing information</button>
    </form>
  </section>
</body>
</html>
