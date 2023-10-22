<?php
    header('Content-Type: application/json');

    require_once '../backend/database.php';

    $sqlQuery = "SELECT * FROM categories ORDER BY cate_id";
    
    $result = mysqli_query($conn, $sqlQuery);
    $data = array();

    foreach($result as $row){
        $data[] = $row;
    }

    mysqli_close($conn);

    echo json_encode($data);

?>
