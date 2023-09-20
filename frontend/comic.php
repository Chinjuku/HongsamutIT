<?php
    // session_start();
    include './layout/navbar.php';
    include './layout/sidebar.php';

?>
<!DOCTYPE html>
    <head>
        <title>HONGSAMUT</title>
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@300;400;500;600;700&family=Mitr:wght@200;300;400;500;600;700&display=swap" 
        rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/categories.css">
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        
    </head>
    <body>
        
        <div class="main">
            <div class="mid">
            <div class="head">
                <div class="square"></div>
                <div class="newarrival"><b>COMIC</b></div>
                    
            </div>
            <div class="container">
                <?php
                    include '../backend/bookinfo.php';
                            // echo '<div class="nabox">';
                            // echo '<p>' . $row['book_name'] . '</p>';
                            // echo '<p>' . $row['book_owner'] . '</p>';
                            // echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                            // // include 'borrowbook.php';
                            // echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\')">CLICK TO VIEW</button>';
                            // echo '</div>';
                ?>
            </div>
            
            </div>
        </div>    
    </body>
</html>