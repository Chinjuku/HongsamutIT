<?php
    header('Content-Type: application/json');

    require_once '../../backend/database.php';

    $sqlQuery = "SELECT * FROM users WHERE amount_book > 0 ORDER BY user_id";
    $result = mysqli_query($conn, $sqlQuery);

    $data = array();

    foreach($result as $row){
        $data[] = $row;
    }

    mysqli_close($conn);

    echo json_encode($data);

?>
