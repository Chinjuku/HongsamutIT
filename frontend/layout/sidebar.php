<?php
    // session_start();
    // include './layout/navbar.php';
    

?>
<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="../css/sidebar.css">
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
                    <li><a href="./all.php">ALL BOOKS</a></li>
                    <li><a href="./comic.php">COMIC</a></li>
                    <li><a href="./detective.php">DETECTIVE</a></li>
                    <li><a href="./fantasy.php">FANTASY</a></li>
                    <li><a href="./fiction.php">FICTION</a></li>
                    <li><a href="./guide.php">GUIDE</a></li>
                    <li><a href="./health.php">HEALTH</a></li>
                    <li><a href="./history.php">HISTORY</a></li>
                    <li><a href="./horror.php">HORROR</a></li>
                    <li><a href="./knowledge.php">KNOWLEDGE</a></li>
                    <li><a href="./mystery.php">MYSTERY</a></li>
                    <li><a href="./romance.php">ROMANCE</a></li>
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