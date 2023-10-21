<!-- update cate_id in borrow_books table using book_id column -->
<?php
    
    include '../backend/database.php';
    
    function update_cate_id($conn){
        // fetch to all book_id in borrow_books table
        $book_id_sql = "SELECT book_id FROM borrow_books";
        $book_id_result = $conn->query($book_id_sql);
        if ($book_id_result->num_rows > 0) {
            while($book_id_row = $book_id_result->fetch_assoc()){
                $book_id = $book_id_row['book_id'];
                // fetch to all cate_id in books table
                $cate_id_sql = "SELECT cate_id FROM books WHERE book_id = '{$book_id}'";
                $cate_id_result = $conn->query($cate_id_sql);
                if ($cate_id_result->num_rows > 0) {
                    while($cate_id_row = $cate_id_result->fetch_assoc()){
                        $cate_id = $cate_id_row['cate_id'];
                        // update cate_id in borrow_books table
                        $update_cate_id_sql = "UPDATE borrow_books SET cate_id = '{$cate_id}' WHERE book_id = '{$book_id}'";
                        $conn->query($update_cate_id_sql);
                    }
                }
            }
            echo '<script>alert("wowowowowow");</script>';
            echo '<script>window.location.href = "../index.php";</script>';
        }
    }
    update_cate_id($conn);



?>
