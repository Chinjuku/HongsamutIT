<?php
    // session_start();
    include 'database.php';
    $book_name = $_POST['bookname'];
    $book_owner = $_POST['bookowner'];   
    $cate_id = $_POST['cate_id']; //รับมาจากไอดีหมวดหมู่ 1-7 (เบ็ดเตล็ด == 8 - ค่าเริ่มต้น)
    $url = $_POST['imgsrc'];
    $bookurl = $_POST['urlbook'];
    date_default_timezone_set('Asia/Bangkok');
    $date_addbook = date('Y-m-d H:i:s');

    $sql = "INSERT INTO books (book_name, book_owner, cate_id, imgsrc, urlbook, status, date_addbook) 
            VALUES ('{$book_name}', '{$book_owner}', '{$cate_id}', '{$url}', '{$bookurl}', 1, '{$date_addbook}')";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        echo '<script>window.location.href = "../frontend/allbook.php";</script>';
        exit();
    } else {
        echo '<script>window.location.href = "../frontend/addbook.php";</script>';
        exit();
    }
?>
