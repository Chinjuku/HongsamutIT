<!-- insert request to request table -->
<?php
    include 'database.php';
    $req_book = $_POST['req_book'];
    $req_auth = $_POST['req_auth'];
    // check if request book is already in request table
    $check_req_sql = "SELECT * FROM request WHERE req_bookname = '{$req_book}' AND req_author = '{$req_auth}'";
    $check_req_stmt = $conn->query($check_req_sql);
    if ($check_req_stmt->num_rows > 0) {
        // add req_cnt
        $req_cnt_sql = "UPDATE request SET req_cnt = req_cnt + 1 WHERE req_bookname = '{$req_book}' AND req_author = '{$req_auth}'";
        $req_cnt_stmt = $conn->prepare($req_cnt_sql);
        $req_cnt_stmt->execute();
        exit();
    }else{
        $sql = "INSERT INTO request (req_bookname, req_author) VALUES ('{$req_book}', '{$req_auth}')";
        $conn->query($sql);
        echo '<script>alert("Your request has been submit");</script>';
        echo '<script>window.location.href = "../frontend/requestbook.php";</script>';
    }
    
?>
