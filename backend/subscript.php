<?php
    include 'database.php';
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $plan_id = $_POST['plan'];

    $sql = "SELECT * FROM register WHERE email = '{$email}' AND password = '{$password}'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['password'] = $row['password'];
      }


      $subscription_sql = "SELECT * FROM subscription_plans WHERE id = {$plan_id}";
      $subscription_result = $conn->query($subscription_sql);

      if ($subscription_result->num_rows > 0) {
        $subscription_row = $subscription_result->fetch_assoc();
        $plan_name = $subscription_row['name'];
        $plan_price = $subscription_row['price'];
        $plan_duration = $subscription_row['duration'];


        $current_date = date('Y-m-d');
        $start_date = $current_date;
        $end_date = date('Y-m-d', strtotime("+$plan_duration days", strtotime($current_date)));


        $user_id = $_SESSION['id'];
        $insert_subscription_sql = "INSERT INTO user_subscriptions (user_id, plan_id, date_start, date_end) VALUES ({$user_id}, {$plan_id}, '{$start_date}', '{$end_date}')";

        if ($conn->query($insert_subscription_sql) === TRUE) {

          $_SESSION['subscription_status'] = "You have subscribed to the '{$plan_name}' plan for {$plan_duration} days.";
        } else {
          $_SESSION['subscription_status'] = "Subscription failed: " . $conn->error;
        }
      } else {
        $_SESSION['subscription_status'] = "Invalid subscription plan selected.";
      }
    } else {
      echo "0 results";
    }

    header('location:../frontend/index.php');
?>
