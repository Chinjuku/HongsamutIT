<?php
    include './database.php';

    function get_books_img($conn, $book_id){
        // fetch to book_img in books table
        $book_img_sql = "SELECT imgsrc FROM books WHERE book_id = '{$book_id}'";
        $book_img_result = $conn->query($book_img_sql);
        if ($book_img_result->num_rows > 0) {
            while($book_img_row = $book_img_result->fetch_assoc()){
                $book_img = $book_img_row['imgsrc'];
                return $book_img;
            }
        }

    }

    function get_books_name($conn, $book_id){
        // fetch to book_name in books table
        $book_name_sql = "SELECT book_name FROM books WHERE book_id = '{$book_id}'";
        $book_name_result = $conn->query($book_name_sql);
        if ($book_name_result->num_rows > 0) {
            while($book_name_row = $book_name_result->fetch_assoc()){
                $book_name = $book_name_row['book_name'];
                return $book_name;
            }
        }
    }

    function get_books_author($conn, $book_id){
        //fetch to author_id in books table
        $author_id_sql = "SELECT author_id FROM books WHERE book_id = '{$book_id}'";
        $author_id_result = $conn->query($author_id_sql);
        if ($author_id_result->num_rows > 0) {
            while($author_id_row = $author_id_result->fetch_assoc()){
                $author_id = $author_id_row['author_id'];
                //fetch to author_name in author table
                $author_name_sql = "SELECT author_name FROM author WHERE author_id = '{$author_id}'";
                $author_name_result = $conn->query($author_name_sql);
                if ($author_name_result->num_rows > 0) {
                    while($author_name_row = $author_name_result->fetch_assoc()){
                        $author_name = $author_name_row['author_name'];
                        return $author_name;
                    }
                }
            }
        }

    }
?>
