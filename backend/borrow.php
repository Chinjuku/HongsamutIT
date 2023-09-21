<?php
    include 'database.php';
    $plan_id = $_SESSION['plan_id'];
    $book_id = $_POST["book_id"];
    // $userid = $_SESSION['user_id'];
    date_default_timezone_set('Asia/Bangkok');
    $date_borrow = date('Y-m-d H:i:s');
    $date_return = date("Y-m-d H:i:s", strtotime("+30 days", strtotime($date_borrow)));;
    
    echo $book_id, '<br>', $date_borrow , '<br>', $date_return;
    // $sql = "INSERT INTO borrow&return_books (book_id, date_borrow)
    // VALUES ('{$book_id}', '{$date_borrow}')";

    
?>