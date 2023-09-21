<?php
    // session_start();
    include 'database.php';
    $book_name = $_POST['bookname'];
    $book_owner = $_POST['bookowner'];   
    $cate_id = $_POST['cate_id']; //รับมาจากไอดีหมวดหมู่ 1-7 (เบ็ดเตล็ด == 8 - ค่าเริ่มต้น)
    $url = $_POST['imgsrc'];
    // $imagePath = $_FILES['imgsrc']['tmp_name'];  // เปลี่ยนเป็นตำแหน่งของรูปภาพของคุณ
    // $imageData = file_get_contents($imagePath);
    // $url = base64_encode($imageData);
    // $status = $_POST['status']; //0 false , 1 true

    $sql = "SELECT * FROM books WHERE book_name IS NULL";
    $result1 = $conn->query($sql);

    $sql2 = "SELECT * FROM books WHERE book_owner is NULL";
    $result2 = $conn->query($sql2);

    if($result1 == NULL){
        echo '<script>alert(You need to type your book name!)</script>';
        header('../frontend/addbook.php');
    }
    else if($result2 == NULL){
        echo '<script>alert(You need to type your owner book!)</script>';
        header('../frontend/addbook.php');
    }
    else{
        // if(ชื่อหนังสือกับชื่อเจ้าของตรงกัน){
            //เพิ่มจำนวนหนังสือ +1
        // }
        $sql = "INSERT INTO books (book_name, book_owner, cate_id, status, imgsrc)
        VALUES ('{$book_name}', '{$book_owner}', '{$cate_id}', 1, '{$url}')";

        $stmt = $conn->prepare($sql);

        if ($stmt->execute()) {
            echo '<script>window.location.href = "../frontend/allbook.php";</script>';
            exit();
        } else {
            echo '<script>window.location.href = "../frontend/addbook.php";</script>';
            exit();
        }
        
    }
?>
