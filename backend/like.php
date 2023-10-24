<?php
    include 'database.php';
    session_start();
    if (!isset($_SESSION['user_id'])) {
        echo '<script>alert("LOGIN FIRST!");</script>';
        echo '<script>window.location.href = "../frontend/login.php";</script>';
        exit();
    }
    if(isset($_SESSION['book_id'])){
        $bookid = $_SESSION['book_id'];
    }
    else{
        $bookid = $_GET["uid"];;
        $_SESSION['book_id'] = $bookid;
    }
    
    
    // update cnt_like in books table from book_id
    

    $like_sql = "SELECT * FROM book_like WHERE user_id = '{$_SESSION['user_id']}' AND book_id = '{$bookid}'";
    $like_stmt = $conn->query($like_sql);
    if ($like_stmt->num_rows > 0) {
        $did_like = 1;
    } else {
        $did_like = 0;
    }

    
    if($did_like == 0){
        // add to book_like table
        $like_sql = "INSERT INTO book_like (user_id, book_id) VALUES ('{$_SESSION['user_id']}', '{$bookid}')";
        $like_stmt = $conn->prepare($like_sql);
        $like_stmt->execute();

        $sql = "UPDATE books SET cnt_like = cnt_like + 1 WHERE book_id = '{$bookid}'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    else{
        // delete from book_like table
        $like_sql = "DELETE FROM book_like WHERE user_id = '{$_SESSION['user_id']}' AND book_id = '{$bookid}'";
        $like_stmt = $conn->prepare($like_sql);
        $like_stmt->execute();

        $sql = "UPDATE books SET cnt_like = cnt_like - 1 WHERE book_id = '{$bookid}'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    


    echo '<script>window.location.href = "../frontend/reviewbook.php";</script>';
    exit();
?>
