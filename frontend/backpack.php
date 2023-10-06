<?php
    // session_start();
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
                            <?php
                            $sql = "SELECT b.book_name, c.category_name, bb.date_borrow, bb.date_return, b.imgsrc
                                    FROM borrow_books bb
                                    INNER JOIN books b ON bb.book_id = b.book_id
                                    INNER JOIN categories c ON b.cate_id = c.cate_id
                                    WHERE bb.user_id = '{$_SESSION['user_id']}' AND bb.date_return > CURDATE()";
                            
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $book_name = $row['book_name'];
                                    $category_name = $row['category_name'];
                                    $date_borrow = $row['date_borrow'];
                                    $date_return = $row['date_return'];
                                    $imgsrc = $row['imgsrc'];

                                    echo "<tr>";
                                    echo "<td><img src='{$imgsrc}' width='120' height='150'></td>";
                                    echo "<td>{$book_name}</td>";
                                    echo "<td>{$category_name}</td>";
                                    echo "<td>{$date_borrow}</td>";
                                    echo "<td>{$date_return}</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
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