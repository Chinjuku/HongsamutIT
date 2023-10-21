<!-- insert request to request table -->
<?php
    include 'database.php';
    $req_book = $_POST['req_book'];
    $req_auth = $_POST['req_auth'];
    $sql = "INSERT INTO request (req_bookname, req_author) VALUES ('{$req_book}', '{$req_auth}')";
    $conn->query($sql);
    echo '<script>alert("Your request has been submit");</script>';
    echo '<script>window.location.href = "../frontend/requestbook.php";</script>';
?>
