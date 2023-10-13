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
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@300;400;500;600;700&family=Mitr:wght@200;300;400;500;600;700&display=swap" 
        rel="stylesheet"> -->
        <meta name="viewport" content="width=1920, height=1080, initial-scale=1">
        <link rel="stylesheet" href="css/allbook.css">
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <style>
            .pic{
                margin-top: 7%;
                width: 95px;
                height: 140px;
            }
            .bookname{
                font-weight:bold;
            }
            .square2{
                position: absolute;
                
                margin-top: 0rem;
                margin-left: 32.5rem;
                width: 150px;
                height: 500px;
                background-color: #485545;
            }
            p{  
                font-family:"Poppings";
                /* font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; */
                margin: 3px 0;
            }
            .popup-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.7);
                align-items: center;
                justify-content: center;
                z-index: 1;
            }
            hr{
                color:#485545;
                border-top: 1px solid #485545;
                background: #485545;
                position: absolute;
                width: 360px;
                margin-top: 5rem;
                margin-left: 4rem;
                /* padding-left:5rem; */
            }
            /* Style for the popup content */
            .popup-content {
                font-family:"Poppings";
                background-color: #FDF5D0;
                padding: 0px;
                width: 800px;
                height: 500px;
                /* border-radius: 5px; */
                box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
            }

            /* Close button style */
            .popup-close {
                position: absolute;
                width:400px;
                margin-top: 1rem;
                margin-left: 48rem;
                cursor: pointer;
            }
            .popup-pic{
                position:absolute;
                display:inline-block;
                /* background:lightgreen; */
                margin-top:75px;
                width: 220px;
                height: 340px;
                margin-left:30rem;
                box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
            }
            .aa{  
                margin: 30px 0;
                border: solid black 1px;
                padding: 10px;
                text-decoration: none;
                border-radius: 10px;
            }
            .clicktoview{
            width: 30%;
            background: #485545;
            padding: 4px 10px;
            color: #FDF5D0;
            border-radius: 5px;
            /* box-shadow: 2px 2px rgb(39,34,34); */
            }
            .clicktoview:hover{
                background: #657661;
                box-shadow: 2px 2px rgb(39,34,34);
            }
            .popup-bookname{
                font-family:"Poppings";
                position:absolute;
                display:inline-block;
                /* background-color:lightcoral; */
                padding:20px 0px 20px 40px;
                margin-top: 60px;
                margin-left:30px;
                margin-right:55rem;
                font-size:40px;
                font: "Poppings";
            }
            .clicktoborrow{
                position:absolute;
                display:inline-block;
                width: 10%;
                margin-left:100px;
                margin-top:20rem;
                background: #485545;
                padding: 20px 15px 20px 15px;
                color: #FDF5D0;
                border-radius: 3px;
                box-shadow: 2px 2px rgb(39,34,34);
            }
            .clicktoborrow:hover{
                position:absolute;
                display:inline-block;
                width: 10%;
                margin-left:100px;
                margin-top:20rem;
                background: #657661;

                color: #FDF5D0;
                border-radius: 3px;
                box-shadow: 2px 2px rgb(39,34,34);
            }
            .popup-author{
                margin:50px 0 50px 70px;
                font-family:"Poppings";
                position:absolute;
                display:inline-block;
                /* background-color:lightskyblue; */
            }
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
            .un{
                color: red;
                font-size: 14px;
            }
        </style>
    </head>
    <body>

        <div class="main">
            <div class="mid">
                <div class="head">
                    <!-- <div class="square"></div> -->
                    <!-- <div class="newarrival"> -->
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
                    <!-- </div> -->
                    
                </div>
                
                <div class="container">
                    <!-- <button onclick="togglePopup()" class="nabox"> -->
                    <?php
                        $sql = "SELECT * FROM books"; 
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
                                    echo '<p class="bookname">' . $row['book_name'] . '</p>';
                                    echo '<p>' . $row['book_owner'] . '</p>';
                                    if($row['status'] == 0){
                                        echo '<p class="bookname un">The book is unavaliable.</p>';
                                    }
                                    echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\',
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

