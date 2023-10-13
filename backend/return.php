<?php
    include 'database.php';
    date_default_timezone_set('Asia/Bangkok');
    $current_date = date("Y-m-d H:i:s");
    // check returning books
    $returndate = "SELECT * FROM borrow_books where date_return <= '{$current_date}'";
    $date_return_stmt = $conn->query($returndate);
    while ($row_return = $date_return_stmt->fetch_assoc()){
        $book_id_return = $row_return['book_id'];
        $date_return = $row_return['date_return'];
        if($current_date >= $date_return){
            //check show returning
            echo $date_return, 'and', $book_id_return, '<br>';
            $sql = "UPDATE books SET status = 1 where book_id = '{$book_id_return}'";
            $available_stmt = $conn->prepare($sql);
            $available_stmt->execute();
        }
    }
?>