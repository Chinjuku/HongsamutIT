<!-- update all user's amount_book column in database using user_id in borrow_books table where date_return > today-->
<?php
    include 'return.php';
    include 'database.php';
    function update_amount_book($conn){
        date_default_timezone_set('Asia/Bangkok');
        $today = date('Y-m-d');
        // fetch to all user_id in user table
        $user_sql = "SELECT user_id FROM users";
        $user_result = $conn->query($user_sql);
        if ($user_result->num_rows > 0) {
            while($user_row = $user_result->fetch_assoc()){
                $user_id = $user_row['user_id'];
                $sql2 = "SELECT * FROM borrow_books WHERE user_id = '{$user_id}' AND date_return > '{$today}'";
                $result2 = $conn->query($sql2);
                $amount_book = $result2->num_rows;
                $sql3 = "UPDATE users SET amount_book = '{$amount_book}' WHERE user_id = '{$user_id}'";
                $conn->query($sql3);
            }
        }
    }
    



?>
