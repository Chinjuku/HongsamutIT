<?php
    $session_start();
    include 'database.php';
    date_default_timezone_set('Asia/Bangkok');
    $current_date = date("Y-m-d H:i:s");
    // check returning books
    $returndate = "SELECT * FROM borrow_books where date_return <= '{$current_date}' AND is_check = 0 AND user_id = '{$_SESSION['user_id']}'";
    $date_return_stmt = $conn->query($returndate);
    while ($row_return = $date_return_stmt->fetch_assoc()){
        $book_id_return = $row_return['book_id'];
        $date_return = $row_return['date_return'];

        // get book_name from books table
        $book_name_sql = "SELECT book_name FROM books WHERE book_id = '{$book_id_return}'";
        $book_name_stmt = $conn->query($book_name_sql);
        $book_name_row = $book_name_stmt->fetch_assoc();
        $book_name = $book_name_row['book_name'];

        if($current_date >= $date_return){
            //check show returning
            //alert user
            echo '<script>alert("You have to return '.$book_name.' before '.$date_return.'");</script>';
            $sql = "UPDATE books SET copy = copy + 1 AND is_check = 1 where book_id = '{$book_id_return}' AND is_check = 0";
            $available_stmt = $conn->prepare($sql);
            $available_stmt->execute();
        }
    }
?>
