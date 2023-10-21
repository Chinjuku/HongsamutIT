<?php
    include 'database.php';
    
    $book = $_POST["book_id"];
    $sql = "DELETE FROM books WHERE book_id = {$book};";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    echo '<script>alert("You Already Delete Book");</script>';
    echo '<script>window.location.href = "../frontend/managebook.php";</script>';
    exit();
?>