<?php
    session_start();
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@300;400;500;600;700&family=Mitr:wght@200;300;400;500;600;700&display=swap" 
        rel="stylesheet">
        <link rel="stylesheet" href="css/navbar.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <title>Document</title>

    </head>
    <body>
    <ul>
        <header class="header"> 

            <H2 class="logo"><a href="home.php">HONGSAMUT</a></H2>
            <input type="checkbox" id="check">
            <label for="check" class="icon">
                <i class="bi bi-list" id="menu-icon"></i>
                <i class="bi bi-x-square"id="close-icon"></i>
            </label>
            <nav class="menubar">
                <a href="allbook.php" style="--i:1;">VIEW BOOK</a>
                <?php
                    $check_type = $_SESSION['user_type'];
                    if($check_type == 1) {
                        echo "<a href='member.php'>MEMBER</a>";
                        echo "<a href='backpack.php' style='--i:2;'>BACKPACK</a>";
                    }
                ?>
                
                <?php
                    if($_SESSION['user_type'] == 2) {
                        echo "<a href='addbook.php'>ADD BOOK</a>";
                        echo "<a href='historyborrow.php'>HISTORY</a>";
                    }
                ?>
                
                <a href="profile.php" style="--i:3;">
                    <?php
                    if (isset($_SESSION['user_id'])){
                        echo '<i class="bi bi-person-circle"></i>', ' ' ,$_SESSION['user_name'];
                        }
                    else{
                        echo 'LOGIN';
                    }
                    ?>
                </a>

            </nav>
        </header>
    </div>
    </ul>
    </body>
</html>
