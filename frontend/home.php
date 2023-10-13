<?php
    // session_start();
    include './layout/navbar.php';
    include './layout/sidebar.php';
    include '../backend/database.php';
    
?>

<!DOCTYPE html>
    <head>
        <title>HONGSAMUT</title>
        <meta name="viewport" content="width=1920, height=1080, initial-scale=1">
        <link rel="stylesheet" href="css/home.css">
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
                <div class="greenbg"></div>
                <div class="head">
                    <!-- <div class="square"></div> -->
                    <div class="newarrival"><i>NEW ARRIVALS</i></div>
                </div>
                <div class="container">
                    <!-- ใส่ new book นะ (ใส่ไว้ได้เลย แต่เอาข้อมูลหนังสือใหม่เข้า database ด้วย)-->
                    <?php
                        $sql = "SELECT * from books order by book_id desc";
                        $result = $conn->query($sql);
                        $num = 1;
                        while ($row = $result->fetch_assoc()){
                            if($num <= 8){
                                echo '<div class="nabox">';
                                echo '<img class="pic" src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                                echo '<p class="bookname">' . $row['book_name'] . '</p>';
                                echo '<p>' . $row['book_owner'] . '</p>';
                                // echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                                echo '</div>';
                                $num++;
                                }
                            else{
                                break;
                            }
                        }
                    ?>
                </div>
                <br>
            </div>
        </div>
    </body>
</html>