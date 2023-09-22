<?php
    session_start();
    include '../backend/database.php';
    include './layout/navbar.php';
    include './layout/sidebarez.php';
    
?>

<!DOCTYPE html>
    <head>
        <title>HONGSAMUT</title>
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@300;400;500;600;700&family=Mitr:wght@200;300;400;500;600;700&display=swap" 
        rel="stylesheet"> -->
        <meta name="viewport" content="width=1920, height=1080, initial-scale=1">
        <link rel="stylesheet" href="css/allbook.css">
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <style>
            img{
                width: 150px;
                height: 180px;
            }
        </style>
    </head>
    <body>

        <div class="main">
            <div class="mid">
                <div class="head">
                    <div class="square"></div>
                    <div class="newarrival">
                    <?php
                        // $sql = "SELECT * FROM books";
                        // $sql2 = "SELECT * from categories";
                        // while ($row = $result->fetch_assoc()) {

                        // }
                    ?>
                    <b>ALL</b><br>BOOKS</div>
                    
                </div>
                
                <div class="container">
                    <!-- <button onclick="togglePopup()" class="nabox"> -->
                    <?php
                        $sql = "SELECT * FROM books"; 
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {

                            $allbook_page = $_SERVER['REQUEST_URI'];
                            
                            while ($row = $result->fetch_assoc()) {
                                if (!empty($_POST['categories']) && $row['cate_id'] == $_POST['categories']) {
                                    $display = true;
                                } elseif (empty($_POST['categories'])) {
                                    $display = true;
                                } else {
                                    $display = false;
                                }
                                if ($display) {
                                    echo '<div class="nabox">';
                                    echo '<p>Book: ' . $row['book_name'] . '</p>';
                                    echo '<p>Author: ' . $row['book_owner'] . '</p>';
                                    echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                                    echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                                    echo '</div>';
                                } 
                            }
                        }
                        $conn->close();
                    ?>
            </div>
            
        </div>
    </body>
</html>