<?php
    // session_start();
    include './layout/navbar.php';
    include './layout/sidebar.php';
    
?>

<!DOCTYPE html>
    <head>
        <title>HONGSAMUT</title>
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
                        include '../backend/bookinfo.php';
                        // $products = [
                        //     ["book_name" => $_SESSION['book_name'], "book_owner" => $_SESSION['book_owner'], "img_src" => $_SESSION['img_src']],
                        //     ["book_name" => "Book 2", "book_owner" => "Author 2", "img_src" => "image2.jpg"],
                        //     ["book_name" => "Book 2", "book_owner" => "Author 2", "img_src" => "image2.jpg"],
                        //     ["book_name" => "Book 2", "book_owner" => "Author 2", "img_src" => "image2.jpg"],
                        //     ["book_name" => "Book 2", "book_owner" => "Author 2", "img_src" => "image2.jpg"]
                        // ];
                        // foreach ($products as $product) {
                        //     echo '<div class="nabox">';
                        //     echo $product['book_name'], '<br>';
                        //     echo $product['book_owner'], '<br>';
                        //     echo '<img src="' . $product['img_src'] . '" alt="Image">';
                        //     echo '</div>';
                        // }
                    ?>
            </div>
            
        </div>
                    

        <script src="javascript/addbook.js"></script>
    </body>
</html>