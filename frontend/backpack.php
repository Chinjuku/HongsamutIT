<?php
    session_start();
    include '../backend/database.php';
    include './layout/navbar.php';
?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HONGSAMUT</title>
        <link rel="stylesheet" href="css/backpack.css">
        <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@300;400;500;600;700&family=Mitr:wght@200;300;400;500;600;700&display=swap" 
        rel="stylesheet">
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
            data-tag="font"
        />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
            data-tag="font"
        />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
            data-tag="font"
        />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&amp;display=swap"
            data-tag="font"
        />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&amp;display=swap"
            data-tag="font"
        />
    </head>
    <body>
        <?php
            if ($_SESSION['user_id'] == NULL) {
                echo '<script>window.location.href = "login.php";</script>';
            }
        ?>
        <div class="main">
            <div class="mid">
                <div class="mybackpack">MY BACKPACK</div>
                <!-- <div class="mybackpackdes">my borrowing books!</div> -->
                <table class="table2">
                    <thead>
                        <tr>
                        <th>COVER</th>
                        <th>TITLE</th>
                        <th>CATEGORY</th>
                        <!-- <th>STATUS</th> -->
                        <th>STARTED</th>
                        <th>FINISHED</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- get book id from borrow table where user_id = session-userid -->
                        <?php
                            $sql = "SELECT * FROM borrow_books WHERE user_id = '{$_SESSION['user_id']}'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) { // วนลูปแสดงรายการหนังสือที่ยืม
                                    $book_id = $row['book_id'];
                                    $book_sql = "SELECT * FROM books WHERE book_id = '{$book_id}'";
                                    $book_result = $conn->query($book_sql);
                                    if ($book_result->num_rows > 0) {
                                        while($row2 = $book_result->fetch_assoc()) {
                                            $book_name = $row2['book_name'];
                                            $cate_id = $row2['cate_id'];
                                            $status = $row2['status'];
                                            $imgsrc = $row2['imgsrc'];
                                            $cate_sql = "SELECT * FROM categories WHERE cate_id = '{$cate_id}'";
                                            $cate_res = $conn->query($cate_sql);
                                            if ($cate_res->num_rows > 0) {
                                                while($row3 = $cate_res->fetch_assoc()) {
                                                    $cate_name = $row3['category_name'];
                                                    $sql4 = "SELECT * FROM borrow_books WHERE book_id = '{$book_id}' AND user_id = '{$_SESSION['user_id']}' AND date_return > CURDATE()";
                                                    $result4 = $conn->query($sql4);
                                                    if ($result4->num_rows > 0) {
                                                        while($row4 = $result4->fetch_assoc()) {
                                                            $date_borrow = $row4['date_borrow'];
                                                            $date_return = $row4['date_return'];
                                                            echo "<tr>";
                                                            
                                                            echo "<td><img src='{$imgsrc}' width = '150' height = '150'></td>";
                                                            echo "<td>{$book_name}</td>";
                                                            echo "<td>{$cate_name}</td>";
                                                            echo "<td>{$date_borrow}</td>";
                                                            echo "<td>{$date_return}</td>";
                                                            echo "</tr>";
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }?>
                    </tbody>
                    
                </table>
                <hr>

            <div class="bottombar">
                
                <div class="container">
                    <div class="borrowing">BORROWING
                        <?php
                        // create bottom bar that increaseing when user borrow book
                        $sql = "SELECT * FROM borrow_books WHERE user_id = '{$_SESSION['user_id']}' AND date_return > CURDATE()";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $count++;
                            }
                        }

                        //get max number of book that user can own.
                        $plan_id = $_SESSION['plan_id'];
                        $num_book = "SELECT * FROM subscription_plans WHERE plan_id = '{$plan_id}'";
                        $num_book_stmt = $conn->query($num_book);
                        $num_book_row = $num_book_stmt->fetch_assoc();
                        $max_book = $num_book_row['max_book'];
                        // create circle that increaseing when user borrow book
                        
                        for ($i = 1; $i <= $max_book+1; $i++) {
                            if($i <= $count){
                                echo "<div class='circle1'></div>";
                            }
                            else{
                                echo "<div class='circle0'></div>";
                            }
                          }
                        ?>
                    </div> 
                </div>
                
            </div>
        </div>    

    </body>
</html>
