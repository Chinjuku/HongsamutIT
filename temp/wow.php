<!-- update cate_id in borrow_books table using book_id column -->
<?php
    
    include '../backend/database.php';
    
    function update_cate_id($conn){
        // fetch to all book_id in borrow_books table
        $book_id_sql = "SELECT book_id FROM borrow_books";
        $book_id_result = $conn->query($book_id_sql);
        if ($book_id_result->num_rows > 0) {
            while($book_id_row = $book_id_result->fetch_assoc()){
                $book_id = $book_id_row['book_id'];
                // fetch to all cate_id in books table
                $cate_id_sql = "SELECT cate_id FROM books WHERE book_id = '{$book_id}'";
                $cate_id_result = $conn->query($cate_id_sql);
                if ($cate_id_result->num_rows > 0) {
                    while($cate_id_row = $cate_id_result->fetch_assoc()){
                        $cate_id = $cate_id_row['cate_id'];
                        // update cate_id in borrow_books table
                        $update_cate_id_sql = "UPDATE borrow_books SET cate_id = '{$cate_id}' WHERE book_id = '{$book_id}'";
                        $conn->query($update_cate_id_sql);
                    }
                }
            }
            echo '<script>alert("wowowowowow");</script>';
            echo '<script>window.location.href = "../index.php";</script>';
        }
    }
    function update_cnt_plan($conn){
        // fecth to all plan_id in users table and count each plan id then update to cnt_plan column in plans table
        $plan_id_sql = "SELECT plan_id FROM users";
        $plan_id_result = $conn->query($plan_id_sql);
        if ($plan_id_result->num_rows > 0) {
            while($plan_id_row = $plan_id_result->fetch_assoc()){
                $plan_id = $plan_id_row['plan_id'];
                $cnt_plan_sql = "SELECT COUNT(plan_id) AS cnt_plan FROM users WHERE plan_id = '{$plan_id}'";
                $cnt_plan_result = $conn->query($cnt_plan_sql);
                if ($cnt_plan_result->num_rows > 0) {
                    while($cnt_plan_row = $cnt_plan_result->fetch_assoc()){
                        $cnt_plan = $cnt_plan_row['cnt_plan'];
                        $update_cnt_plan_sql = "UPDATE subscription_plans SET cnt_plan = '{$cnt_plan}' WHERE plan_id = '{$plan_id}'";
                        $conn->query($update_cnt_plan_sql);
                    }
                }
            }
            echo '<script>alert("plan_counts");</script>';
            echo '<script>window.location.href = "../index.php";</script>';
        }
    }

    function updaet_cnt_cate($conn){
        //fetch to all cate_id in borrow_books table and count each cate_id then update to cnt_cate column in categories table
        $cate_id_sql = "SELECT cate_id FROM borrow_books";
        $cate_id_result = $conn->query($cate_id_sql);
        if ($cate_id_result->num_rows > 0) {
            while($cate_id_row = $cate_id_result->fetch_assoc()){
                $cate_id = $cate_id_row['cate_id'];
                $cnt_cate_sql = "SELECT COUNT(cate_id) AS cnt_cate FROM borrow_books WHERE cate_id = '{$cate_id}'";
                $cnt_cate_result = $conn->query($cnt_cate_sql);
                if ($cnt_cate_result->num_rows > 0) {
                    while($cnt_cate_row = $cnt_cate_result->fetch_assoc()){
                        $cnt_cate = $cnt_cate_row['cnt_cate'];
                        $update_cnt_cate_sql = "UPDATE categories SET cnt_cate = '{$cnt_cate}' WHERE cate_id = '{$cate_id}'";
                        $conn->query($update_cnt_cate_sql);
                    }
                }
            }
            echo '<script>alert("cate_counts");</script>';
            echo '<script>window.location.href = "../index.php";</script>';
        }
    }

    // update_cnt_plan($conn)
    // updaet_cnt_cate($conn)

?>
