<?php

    include 'database.php';

    $book_name = $_POST['bookname'];
    $book_owner = $_POST['bookowner'];
    $cate_id = $_POST['cate_id']; //รับมาจากไอดีหมวดหมู่ 1-7 (เบ็ดเตล็ด == 8 - ค่าเริ่มต้น)
    $status = $_POST['status']; //0 false , 1 true

    $sql = "SELECT book_name, book_owner FROM books WHERE book_name = null LIMIT 0";
    $result1 = $conn->query($sql);

    $sql2 = "SELECT book_name, book_owner FROM books WHERE book_owner = null LIMIT 0";
    $result2 = $conn->query($sql2);

    if($result1->num_rows == 0){
        echo '<script>alert(You need to type your book name!)</script>';
        header('../frontend/addbook.php');
    }
    else if($result2->num_rows == 0){
        echo '<script>alert(You need to type your owner book!)</script>';
        header('../frontend/addbook.php');
    }
    else{
        // if(ชื่อหนังสือกับชื่อเจ้าของตรงกัน){
            //เพิ่มจำนวนหนังสือ +1
        // }
        $sql = "INSERT INTO books (book_name, book_owner, cate_id, status)
        VALUES ('{$book_name}', '{$book_owner}', '{$cate_id}', '{$status}')";
    }

?>