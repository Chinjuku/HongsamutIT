<?php
    // session_start();
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
                    <div class="newarrival"><b>ALL</b><br>BOOKS</div>
                    
                </div>
                
                <div class="container">
                    <!-- <button onclick="togglePopup()" class="nabox"> -->
                    <?php
                        include '../backend/bookinfoez.php';
                    ?>
            </div>
            
        </div>
                    

        <script src="javascript/addbook.js"></script>
    </body>
</html>