<?php
    // session_start();
    include 'database.php';
    $book_name = $_POST['bookname'];
    $book_owner = $_POST['bookowner'];   
    $cate_id = $_POST['cate_id']; //รับมาจากไอดีหมวดหมู่ 1-7 (เบ็ดเตล็ด == 8 - ค่าเริ่มต้น)
    $url = $_POST['imgsrc'];
    $bookurl = $_POST['urlbook'];

    $sql = "INSERT INTO books (book_name, book_owner, cate_id, status, imgsrc, urlbook) VALUES ('{$book_name}', '{$book_owner}', '{$cate_id}', 1, '{$url}', '{$urlbook}')";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        echo '<script>window.location.href = "../frontend/allbook.php";</script>';
        exit();
    } else {
        echo '<script>window.location.href = "../frontend/addbook.php";</script>';
        exit();
    }
?>
