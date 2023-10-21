<?php
    include 'database.php';
    session_start();
    $userid = $_SESSION['user_id'];
    $sql2 = "SELECT user_id, MAX(cate_id) AS maxCate, COUNT(cate_id) AS countCate
            FROM borrow_books
            WHERE user_id = ?
            GROUP BY cate_id;";
    $stmt = $conn->prepare($sql2);
    $stmt->bind_param("i", $userid);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result2 = $stmt->get_result();

    // Initialize $cate_id
    $cate_id = null;

    while ($row2 = $result2->fetch_assoc()) {
        $_SESSION['max_cate'] = $row2['maxCate'];
        $count = $row2['countCate'];
    }
    echo "max" , $_SESSION['max_cate'] , "count" , $count;
?>