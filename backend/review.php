<?php
    include 'database.php';
    session_start();

    date_default_timezone_set('Asia/Bangkok');
    $datereview = date('Y-m-d H:i:s');
    $bookid = $_POST['book_id'];
    $userId = $_SESSION['user_id'];
    $_SESSION['book_id'] = $bookid;
    $comment = $_POST['comment'];

    class ReviewController {
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function submitReview($bookid, $comment, $datereview, $userId) {
            $sql = "INSERT INTO review (user_id, book_id, review_in, datetime_review, like_amount) VALUES (?, ?, ?, ?, 0)";
            $stmt = $this->conn->prepare($sql);

            $stmt->bind_param("iiss", $userId, $bookid, $comment, $datereview);

            if ($stmt->execute()) {
                // Review successfully submitted
                return true;
            } else {
                // Review submission failed
                return false;
            }
        }
    }

    $reviewController = new ReviewController($conn);
    $userId = $_SESSION['user_id'];

    if ($reviewController->submitReview($bookid, $comment, $datereview, $userId)) {
        echo "<script>window.location.href='../frontend/reviewbook.php';</script>";
        exit();
    } else {
        echo "Error: " . $conn->error;
        echo "<script>alert('Review doesn't sent!');</script>";
        echo '<script>window.location.href = "../frontend/reviewbook.php";</script>';
        exit();
    }
?>

<?php
    // include 'database.php';
    // session_start();

    // date_default_timezone_set('Asia/Bangkok');
    // $datereview = date('Y-m-d H:i:s');
    // $bookid = $_POST['book_id'];
    // $_SESSION['book_id'] = $bookid;
    // $comment = $_POST['comment'];

    // function review($conn, $bookid, $comment, $datereview){
    //     $sql = "INSERT INTO review (user_id, book_id, review_in, datetime_review, like_amount) 
    //             VALUES (?, ?, ?, ?, 0)";
    //     $stmt = $conn->prepare($sql);

    //     $stmt->bind_param("iiss", $_SESSION['user_id'], $bookid, $comment, $datereview);

    //     if ($stmt->execute()) {
    //         // echo "<script>alert('Review submitted!: " .$comment. "');</script>";
    //         echo "<script>window.location.href='../frontend/reviewbook.php';</script>";    
    //         exit();
    //     } else {
    //         echo "Error: " . $stmt->error;
    //         echo "<script>alert('Review doesn't sent!');</script>";
    //         echo '<script>window.location.href = "../frontend/reviewbook.php";</script>';
    //         exit();
    //     }
    // }

    // review($conn, $bookid, $comment, $datereview);
?>
