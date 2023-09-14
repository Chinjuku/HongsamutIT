<?php
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
            session_start();
            include './layout/navbar.php';
            if (isset($_SESSION['user_id'])) {
                echo '<script>window.location.href = "login.php";</script>';
            }
        ?>
        <div class="mid">
            <div class="backpack ">BACKPACK JA</div>
        </div>    

    </body>
</html>
