<!-- update all user's amount_book column in database using user_id in borrow_books table where date_return > today-->
<?php
    include 'return.php';
    include 'database.php';
    function update_amount_book($conn){
        date_default_timezone_set('Asia/Bangkok');
        $today = date('Y-m-d');
        // fetch to all user_id in user table
        $user_sql = "SELECT user_id FROM users";
        $user_result = $conn->query($user_sql);
        if ($user_result->num_rows > 0) {
            while($user_row = $user_result->fetch_assoc()){
                $user_id = $user_row['user_id'];
                $sql2 = "SELECT * FROM borrow_books WHERE user_id = '{$user_id}' AND date_return > '{$today}'";
                $result2 = $conn->query($sql2);
                $amount_book = $result2->num_rows;
                $sql3 = "UPDATE users SET amount_book = '{$amount_book}' WHERE user_id = '{$user_id}'";
                $conn->query($sql3);
            }
        }
    }

    function add_author_name($conn){
        // fetch to all book_owner in books table
        $book_owner_sql = "SELECT book_owner FROM books";
        $book_owner_result = $conn->query($book_owner_sql);
        if ($book_owner_result->num_rows > 0) {
            while($book_owner_row = $book_owner_result->fetch_assoc()){
                $book_owner = $book_owner_row['book_owner'];

                // check if author_name already exist in author table
                $author_sql = "SELECT * FROM author WHERE author_name = '{$book_owner}'";
                $author_result = $conn->query($author_sql);
                if ($author_result->num_rows == 0) {
                    // add author_name to author table
                    $author_sql = "INSERT INTO author (author_name) VALUES ('{$book_owner}')";
                    $conn->query($author_sql);
                }
                


            }
        }
    }

    function add_author_id($conn){
        // update author_id to books table
        // fetch to all author_id in author table
        $author_id_sql = "SELECT * FROM author";
        $author_id_result = $conn->query($author_id_sql);
        if ($author_id_result->num_rows > 0) {
            while($author_id_row = $author_id_result->fetch_assoc()){
                $author_id = $author_id_row['author_id'];
                $author_name = $author_id_row['author_name'];

                // update author_id to books table
                $update_author_id_sql = "UPDATE books SET author_id = '{$author_id}' WHERE book_owner = '{$author_name}'";
                $conn->query($update_author_id_sql);

            }
            echo '<script>alert("done");</script>';
        }

    }
    



?>
