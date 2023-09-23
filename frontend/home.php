<?php
    // session_start();
    include './layout/navbar.php';
    include './layout/sidebarez.php';
    
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

        <div class="main">
            <div class="mid">
                <div class="head">
                    <!-- <div class="square"></div> -->
                    <div class="newarrival">NEW ARRIVALS</div>
                </div>
                <div class="container">
                        <!-- ใส่ new book นะ (ใส่ไว้ได้เลย แต่เอาข้อมูลหนังสือใหม่เข้า database ด้วย)-->
                </div>
                <br>
                    
                <div class="container">
                    <!-- <button onclick="togglePopup()" class="nabox"> -->
                    <?php
                        // include '../backend/bookinfo.php';
                    ?>
            </div>
            
        </div>
                    

        <script src="javascript/addbook.js"></script>
    </body>
</html>