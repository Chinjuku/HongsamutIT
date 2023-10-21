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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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

        <div>
            <form action="" class="search">
                <input type="search" name="" placeholder="search here..." id="search-box">
                <label for="search-box" class="fas-fa-search"></label>
            </form>
        </div>

        <div class="main">
            <div class="mid">
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
                        $sql = "SELECT * FROM books b INNER JOIN author a ON b.author_id = a.author_id;";
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
                                    \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\',  \'' . $_SESSION['user_type'] . '\')">VIEW</button>';
                                    echo '</div>';
                                }
                            }
                        }
                        $conn->close();
                    ?>
            </div>
        </div>
        <div class="popup-overlay" id="popup">
            <div class="popup-content" id="popup-content">
        
            </div>
        </div>
        <script>
            function togglePopup(bookName, bookOwner, imgSrc, bookId, userType) {
                var popup = document.getElementById('popup');
                var popupContent = document.getElementById('popup-content');
                                    
                var popupcoN = '<form action="../backend/borrow.php" method="post">' +
                                        '<span class="popup-close" onclick="closePopup()">X</span>' +
                                        '<input type="hidden" name="book_id" value="' + bookId + '">' +
                                        '<div class="square2"></div>' +
                                        '<img class="popup-pic" src="' + imgSrc + '" alt="Image">' + '<br>' +
                                        '<h1 class="popup-bookname">Title : ' + bookName + '</h1>' +
                                        '<p class="popup-author">by ' + ' ' + bookOwner + '</p>';
                                        if (userType == 1) {
                                            popupcoN += '<button type="submit" class="clicktoborrow">BORROW NOW</button>';
                                        }
                                        popupcoN += '</form>';
                                        popupContent.innerHTML = popupcoN;
                                        // '<button type="submit" class="clicktoborrow">BORROW NOW</button>' + 
                                        // '</form>';

                popup.style.display = 'flex';
            }

            function closePopup() {
                var popup = document.getElementById('popup');
                popup.style.display = 'none';
            }
        </script>
    </body>
</html>

