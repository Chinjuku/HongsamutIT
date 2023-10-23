<!-- return book function -->
<?php
    // echo $_POST["book_id_return"];
    session_start();
    include 'database.php';
    // return book function
    $user_id = $_SESSION['user_id'];
    $book_id_return = $_POST['book_id_return'];

    function return_book($conn, $book_id_return, $user_id){
        date_default_timezone_set('Asia/Bangkok');
        $current_date = date("Y-m-d H:i:s");

        // get book_name from books table
        $book_name_sql = "SELECT book_name FROM books WHERE book_id = '{$book_id_return}'";
        $book_name_stmt = $conn->query($book_name_sql);
        $book_name_row = $book_name_stmt->fetch_assoc();
        $book_name = $book_name_row['book_name'];

        //check show returning
        //alert user
        $sql = "UPDATE books b , borrow_books bb SET b.copy = b.copy + 1 AND bb.is_check = 1 where book_id = '{$book_id_return}' AND bb.is_check = 0";
        $available_stmt = $conn->prepare($sql);
        $available_stmt->execute();

        // update copy in books table
        $update_copy_sql = "UPDATE books SET copy = copy + 1 WHERE book_id = '{$book_id_return}'";
        $update_copy_stmt = $conn->prepare($update_copy_sql);
        $update_copy_stmt->execute();

        // update is_check in borrow_books table
        $update_is_check_sql = "UPDATE borrow_books SET is_check = 1 WHERE book_id = '{$book_id_return}' AND user_id = '{$user_id}' AND is_check = 0";
        $update_is_check_stmt = $conn->prepare($update_is_check_sql);
        $update_is_check_stmt->execute();



        // update amount_book in users table
        $update_amount_book_sql = "UPDATE users SET amount_book = amount_book - 1 WHERE user_id = '{$user_id}'";
        $update_amount_book_stmt = $conn->prepare($update_amount_book_sql);
        $update_amount_book_stmt->execute();

        echo '<script>alert("'.$user_id.' have return '.$book_name.' at '.$current_date.'");</script>';
        echo '<script>window.location.href = "../frontend/backpack.php";</script>';
    }

    return_book($conn, $book_id_return, $user_id);
?>
