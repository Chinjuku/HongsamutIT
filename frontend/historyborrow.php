<?php
    // session_start();
    include '../backend/database.php';
    // include './layout/leftbar.php';
    include './layout/navbar.php';
?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HONGSAMUT</title>
        <link rel="stylesheet" href="css/historypage.css">
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
        
        <div class="main">
            <div class="mid">
                <?php
                    include './layout/historynav.php';
                ?>
                <div class="borrow"><h2 style="font-size: 50px;text-align: center;">History of Borrow</h2></div>
                <table class="table2">
                    <thead>
                        <tr>
                        <th>USERNAME</th>
                        <th>TITLE</th>
                        <th>CATEGORY</th>
                        <!-- <th>STATUS</th> -->
                        <th>STARTED</th>
                        <th>FINISHED</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../backend/database.php';
                            
                            $sql = "SELECT * FROM borrow_books";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $sql2 = "SELECT * FROM users WHERE user_id = '{$row['user_id']}'";
                                    $result2 = $conn->query($sql2);
                                    while($row2 = $result2->fetch_assoc()) {
                                        $username = $row2['user_name'];
                                    }
                                    $sql3 = "SELECT * FROM books WHERE book_id = '{$row['book_id']}'";
                                    $result3 = $conn->query($sql3);
                                    while($row3 = $result3->fetch_assoc()) {
                                        $bookname = $row3['book_name'];
                                        $sql4 = "SELECT * FROM categories WHERE cate_id = '{$row3['cate_id']}'";
                                        $result4 = $conn->query($sql4);
                                        while($row4 = $result4->fetch_assoc()) {
                                        $category = $row4['category_name'];
                                        }
                                    }
                                    echo "<tr>";
                                    echo "<td>" . $username . "</td>";
                                    echo "<td>" . $bookname . "</td>";
                                    echo "<td>" . $category . "</td>";
                                    echo "<td>" . $row['date_borrow'] . "</td>";
                                    echo "<td>" . $row['date_return'] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </body>