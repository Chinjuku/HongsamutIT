<?php
    // session_start();
    include './layout/navbar.php';
    // include './layout/sidebar.php';
    include '../backend/database.php';
    
?>

<!DOCTYPE html>
    <head>
        <title>HONGSAMUT</title>
        <meta name="viewport" content="width=1920, height=1080, initial-scale=1">
        <link rel="stylesheet" href="home.css">
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

        
            <div class="greenbg">
                <div class="greentext">
                    <div class="gt1">Welcome to our <br>E-Book library</div>
                    <div class="gt2">you can explore all books in our library for free.</div>
                    <img class="img1" src="../img/homecover.jpg" alt="Girl in a jacket" style="width:250px;height:350px;">
                    <img class="img3" src="../img/img3.png" alt="Girl in a jacket" style="width:250px;height:350px;">
                    <img class="img2" src="../img/img2.jpg" alt="Girl in a jacket" style="width:250px;height:350px;">
                    
                </div>
            </div>
                <button class="explorebut">EXPLORE OUR BOOKS</button>
            </div>
                <div class="mid">
                    <div class="midsub">
                        <div class="newarrival"><i>NEW ARRIVALS</i></div>
                        <hr class="hr1">
                        <div class="newarrdes">our newest books is here!</div>

                    <div class="container">
                        <!-- ใส่ new book นะ (ใส่ไว้ได้เลย แต่เอาข้อมูลหนังสือใหม่เข้า database ด้วย)-->
                        <?php
                            $sql = "SELECT * FROM books b INNER JOIN author a ON b.author_id = a.author_id order by book_id desc";
                            $result = $conn->query($sql);
                            $num = 1;
                            while ($row = $result->fetch_assoc()){
                                if($num <= 5){
                                    echo '<div class="nabox">';
                                    echo '<img class="pic" src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                                    echo '<p class="bookname">' . $row['book_name'] . '</p>';
                                    echo '<p>' . $row['author_name'] . '</p>';
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
                </div>
                <div class="space1"></div>
                <div class="recommend">
                    <div class="head2">
                        <div class="recommendtxt"><i>RECOMMENDED BOOKS</i></div>
                        <hr class="hr1">
                        <div class="recdes">we bring out the book that relate to your recently borrowed book✦</div>
            
                    </div>
                    <div class="container"> 
                    <?php
                            $sql = "SELECT * from books order by book_id desc";
                            $result = $conn->query($sql);
                            $num = 1;
                            while ($row = $result->fetch_assoc()){
                                if($num <= 5){
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
                </div>
                <div class="space"></div>
                <div class="space"></div>
                
            </div>
            <div class="brown"></div>
    </body>
</html>
