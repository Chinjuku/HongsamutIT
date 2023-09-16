<?php
    session_start();
    include './layout/navbar.php';
    
?>

<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="leftbar3.css">
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="leftbar">
            
            <div class="menutext">menu</div>

            <div class="boxnewarrivals">
                <i class="bi bi-stars"></i>
                <a href="#" class="newarrivals">NEW ARRIVALS</a>
            </div>
            
            <div class="boxcate">
                <div class="categories">
                    <i class="bi bi-book"></i>
                    <div class="catehead">CATEGORIES</div>    
                </div>

                <div class="cate">
                    <a href="all.php">ALL BOOKS</a>
                    <a href="comic.php">COMIC</a>
                    <a href="#">DETECTIVE</a>
                    <a href="#">FANTASY</a>
                    <a href="#">FICTION</a>
                    <a href="#">GUIDE</a>
                    <a href="#">HEALTH</a>
                    <a href="#">HISTORY</a>
                    <a href="#">HORROR</a>
                    <a href="#">KNOWLEDGE</a>
                    <a href="#">MYSTERY</a>
                    <a href="#">ROMANCE</a>
                </div>
                
                
            </div>
        </div>


    </body>
</html>