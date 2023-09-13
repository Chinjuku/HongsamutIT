<?php
    include 'database.php';

    $book_name = $_POST['bookname'];
    $book_owner = $_POST['bookowner'];
    $status = $_POST['status'];

    $sql = "SELECT book_name, book_owner FROM books WHERE book_name = null or book_owner = null";


    $sql = "INSERT INTO books (name, email, password, gender)
    VALUES ('{$book_name}', '{$book_owner}', '{$password}', '{$gender}')";



?>