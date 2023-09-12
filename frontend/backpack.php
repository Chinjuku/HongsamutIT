<?php
    include './layout/navbar.php';
    // include './layout/leftbar.php';
?>

<!DOCTYPE html>
    <head>
        <title>HONGSAMUT</title>
        <link rel="stylesheet" href="css/backpack.css">
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        
    </head>
    <body>
        <?php
            if (isset($_SESSION['id']) == null) {
                header("location: login.php");
            }
        ?>
        <div class="mid">
            <div class="backpack ">BACKPACK JA</div>
        </div>    

    </body>
</html>