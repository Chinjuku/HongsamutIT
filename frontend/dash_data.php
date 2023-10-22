<?php
    header('Content-Type: application/json');

    require_once '../backend/database.php';

    $sqlQuery = "SELECT * FROM subscription_plans WHERE plan_id < 4 ORDER BY plan_id";
    
    $result = mysqli_query($conn, $sqlQuery);
    $data = array();

    foreach($result as $row){
        $data[] = $row;
    }

    mysqli_close($conn);

    echo json_encode($data);

?>
