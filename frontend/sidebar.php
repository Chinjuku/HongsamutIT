<?php
    // session_start();
    // include './layout/navbar.php';
    

?>
<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="sidebar.css">
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <script scr="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script scr="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
    <body>
    <nav class="sidebar">
        <div class="text">Menu</div>
        <ul>
            <li class="newarr">
                <a href="viewbook.php"><i class="bi bi-stars"></i> NEW ARRIVALS</a>
            </li>

            <li>
                <a href="#" class="feat-btn"><i class="bi bi-book"></i> CATEGORIES
                    <span><i class="bi bi-caret-down"></i></span>
                </a>
                <ul class="feat-show">
                    <li><a href="all.php">ALL BOOKS</a></li>
                    <li><a href="comic.php">COMIC</a></li>
                    <li><a href="#">DETECTIVE</a></li>
                    <li><a href="#">FANTASY</a></li>
                    <li><a href="#">FICTION</a></li>
                    <li><a href="#">GUIDE</a></li>
                    <li><a href="#">HEALTH</a></li>
                    <li><a href="#">HISTORY</a></li>
                    <li><a href="#">HORROR</a></li>
                    <li><a href="#">KNOWLEDGE</a></li>
                    <li><a href="#">MYSTERY</a></li>
                    <li><a href="#">ROMANCE</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- <script>
        $('.feat-btn').click(function(){
            $('nav ul .feat-show').toggleClass("show");
        });
    </script> -->


    </body>
</html>