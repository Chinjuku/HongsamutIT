<?php
    session_start();
    include 'database.php';
    $plan_id = $_SESSION['plan_id'];
    //check if user subscribe to any plan
    if ($plan_id == NULL) {
        echo '<script>alert("You have not subscribed to any plan.");</script>';
        echo '<script>window.location.href = "../frontend/member.php";</script>';
        exit();
    }
    $book_id = $_POST["book_id"];
    // $userid = $_SESSION['user_id'];
    date_default_timezone_set('Asia/Bangkok');
    $date_borrow = date('Y-m-d H:i:s');
    $date_return = date("Y-m-d H:i:s", strtotime("+7 days", strtotime($date_borrow)));

    $current_date = date('Y-m-d H:i:s');

    //check if user own more than 10 books.
    $check_sql = "SELECT * FROM borrow_books WHERE user_id = '{$_SESSION['user_id']}' AND date_return >= '{$date_borrow}'";
    // $check_sql = "SELECT * FROM borrow WHERE user_id = '{$_SESSION['user_id']}' AND  <= date_return";
    $check_stmt = $conn->query($check_sql);
    //check numrow

    //get max number of book that user can own.
    $num_book = "SELECT * FROM subscription_plans WHERE plan_id = '{$plan_id}'";
    $num_book_stmt = $conn->query($num_book);
    $num_book_row = $num_book_stmt->fetch_assoc();
    $max_book = $num_book_row['max_book'];

    if ($check_stmt->num_rows >= $max_book) {
        echo '<script>alert("You have reached the maximum number of books you can borrow.");</script>';
        echo '<script>window.location.href = "../frontend/allbook.php";</script>';
        exit();
    }else{
        //check if book is available
        $check_book_sql = "SELECT * FROM books WHERE book_id = '{$book_id}' AND status = 1";
        $check_book_stmt = $conn->query($check_book_sql);
        if ($check_book_stmt->num_rows == 0) {
            echo '<script>alert("This book is not available.");</script>';
            echo '<script>window.location.href = "../frontend/allbook.php";</script>';
            exit();
        }
        else{
            //add to borrow table
            $borrow_sql = "INSERT INTO borrow_books (book_id, user_id, date_borrow, date_return) VALUES ('{$book_id}', '{$_SESSION['user_id']}', '{$date_borrow}', '{$date_return}')";
            $borrow_stmt = $conn->prepare($borrow_sql);
            if ($borrow_stmt->execute()) {
                //update status in books table
                $update_sql = "UPDATE books SET status = 0 WHERE book_id = '{$book_id}'";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->execute();
                echo '<script>window.location.href = "../frontend/allbook.php";</script>';
                exit();
            } else {
                echo '<script>window.location.href = "../frontend/allbook.php";</script>';
                echo("Bruh");
                exit();
            }
        }
        
    }

    // // check returning books
    // $returndate = "SELECT * FROM borrow_books where date_return <= '{$current_date}'";
    // $date_return_stmt = $conn->query($returndate);
    // while ($row_return = $date_return_stmt->fetch_assoc()){
    //     $book_id_return = $date_return_row['book_id'];
    //     $date_return = $date_return_row['date_return'];
    //     if($current_date >= $date_return){
    //         $sql = "UPDATE books SET status = 1 where book_id = '{$book_id_return}'";
    //         $available_stmt = $conn->prepare($sql);
    //         $available_stmt->execute();
    //     }
    // }
?>
