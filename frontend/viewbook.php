<?php
    session_start();
    include './layout/navbar.php';
    include './layout/sidebar.php';
    include '../backend/bookinfo.php';
?>

<!DOCTYPE html>
    <head>
        <title>HONGSAMUT</title>
        <meta name="viewport" content="width=1920, height=1080, initial-scale=1">
        <link rel="stylesheet" href="css/viewbook.css">
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&amp;display=swap"
            data-tag="font"
        />
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
                <div class="newarrival">NEW ARRIVALS</div>
                <div class="container">
                    <button onclick="togglePopup()" class="nabox"><?php $imageURL = $_SESSION['img_src'];
                    echo $_SESSION['book_name'],'<br>',$_SESSION['book_owner'], '<br>' ,'<img src="' . $imageURL . '" alt="Image">';?></button>
                    
                
                    <!-- <div class="nabox">Box2</div>
                    <div class="nabox">Box3</div>
                    <div class="nabox">Box4</div>
                    <div class="nabox">Box5</div> -->
                </div>  
            </div>
            
        </div>
                    

        <script src="javascript/addbook.js"></script>
    </body>
</html>
