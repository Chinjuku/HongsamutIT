<?php
    // session_start();
    include '../backend/database.php';
    include './layout/navbar.php';
    include './layout/sidebar.php';
    $cates = $_POST['categories'];
?>

<!DOCTYPE html>
    <head>
        <title>HONGSAMUT</title>
        <meta name="viewport" content="width=1920, height=1080, initial-scale=1">
        <link rel="stylesheet" href="css/allbook.css">
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <style>
            .ssquare1{
                margin-top: 9%;
                width: 10px;
                height: 120px;
                background-color: #485545;
            }
            .ssquare2{
                margin-top: 7%;
                width: 10px;
                height: 50px;
                background-color: #485545;
            }
        </style>
    </head>
    <body>
        <div class="main">
            <div class="mid">
                    <form action="" class="search">
                    <input type="search" name="" placeholder="search here..." id="search-box">
                    <label for="search-box" class="fas fa-search"></label>
                    </form>
                <div class="head">
                    <?php
                        $sql = "SELECT * FROM categories";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            if($cates == $row['cate_id']){
                                echo '<div class="ssquare2"></div>';
                                echo '<div class="newarrival">';
                                echo '<b>' . strtoupper($row['category_name']) . '</b>';
                                echo '</div>';
                            } 
                            else if(empty($cates)){
                                echo '<div class="ssquare1"></div>';
                                echo '<div class="newarrival">';
                                echo '<b>ALL</b><br>BOOKS';
                                echo '</div>';
                                break;
                            }
                        }
                    ?>
                </div>
                
                <div class="container">
                    <!-- <button onclick="togglePopup()" class="nabox"> -->
                    <?php
                        function show_book($conn)
                        {$sql = "SELECT * FROM books b INNER JOIN author a ON b.author_id = a.author_id;";
                            $result = $conn->query($sql);
                            $sql2 = "SELECT * FROM users";
                            $result2 = $conn->query($sql2);
                            while ($row2 = $result2->fetch_assoc()) {
                                $user = $row2['user_type_id'];
                            }
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    if (!empty($cates) && $row['cate_id'] == $cates) {
                                        $display = true;
                                    } elseif (empty($cates)) {
                                        $display = true;
                                    } else {
                                        $display = false;
                                    }
                                    if ($display) {
                                        echo '<div class="nabox">';
                                        echo '<img class="pic" src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                                        $book_name_wow = $row['book_name'];
                                        echo '<p class="bookname">' . $book_name_wow . '</p>';
                                        echo '<p>' . $row['author_name'] . '</p>';
                                        if($row['copy'] == 0){
                                            echo '<p class="bookname un">The book is unavaliable.</p>';
                                        }
                                        if ($book_name_wow == "Don't do that!"){
                                            $book_name_wow = "Don\'t do that!";
                                        }
                                        echo '<button class="clicktoview" onclick="togglePopup(\'' . $book_name_wow . '\', \'' . $row['author_name'] . '\',
                                        \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\',  \'' . $_SESSION['user_type'] . '\', \'' .$row['cnt_like']. '\')">VIEW</button>';
                                        echo '</div>';
                                    }
                                }
                            }
                            $conn->close();
                        }


                        show_book($conn);
                    ?>
            </div>
        </div>
        <div class="popup-overlay" id="popup">
            <div class="popup-content" id="popup-content">
        
            </div>
        </div>
        <script src = "./allbook.js"></script>
    </body>
</html>

