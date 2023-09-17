<?php
    session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/navbar.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <title>Document</title>

    </head>
    <body>
    <ul>
        <header class="header"> 

            <H2 class="logo"><a href="index.php">HONGSAMUT</a></H2>
            <input type="checkbox" id="check">
            <label for="check" class="icon">
                <i class="bi bi-list" id="menu-icon"></i>
                <i class="bi bi-x-square"id="close-icon"></i>
            </label>
            <nav class="menubar">
                <a href="viewbook.php" style="--i:1;">VIEW BOOK</a>
                <?php
                    $check_type = $_SESSION['user_type'];
                    if($check_type == "user") {
                        echo "<a href='member.php'>MEMBER</a>";
                    }
                ?>
                
                <a href="backpack.php" style="--i:2;">BACKPACK</a>
                <a href="profile.php" style="--i:3;">
                    <i href="login.php" class="bi bi-person-circle"></i>
                    <?php
                    if (isset($_SESSION['user_id'])){
                        echo $_SESSION['user_name'];
                            if($_SESSION['user_type'] == "admin") {
                            echo "<a href='addbook.php'>ADD BOOK</a>";
                        }
                        }            
                    ?>
                </a>
                
            </nav>
        </header>
    </div>
    </ul>
    </body>
</html>
