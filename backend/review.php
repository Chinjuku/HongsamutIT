<?php
    include 'database.php';
    session_start();

    date_default_timezone_set('Asia/Bangkok');
    $datereview = date('Y-m-d H:i:s');
    $bookid = $_POST['book_id'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO review (user_id, book_id, review_in, datetime_review, like_amount) 
            VALUES (?, ?, ?, ?, 0)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("iiss", $_SESSION['user_id'], $bookid, $comment, $datereview);

    if ($stmt->execute()) {
        echo "<script>alert('Review submitted!');</script>";
        echo "<script>window.location.href='../frontend/allbook.php';</script>";
        exit();
    } else {
        echo "Error: " . $stmt->error;
        echo "<script>alert('Review doesn't sent!');</script>";
        echo '<script>window.location.href = "../frontend/review.php";</script>';
        exit();
    }
?>
