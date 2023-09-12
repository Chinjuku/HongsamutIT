<?php
    // include './frontend/layout/navbar.php';
    // include './layout/leftbar.php';
?>

<!DOCTYPE html>
    <head>
        <title>HONGSAMUT</title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>
    <body>
    <ul>
        <header class="header"> 
            <H2 class="logo"><a href="home.php">HONGSAMUT</a></H2>
            <nav class="menubar">
                <a href="allbook.php">VIEW BOOK</a>
                <a href="backpack.php">BACKPACK</a>
                <?php
                    if (isset($_SESSION['id'])){
                        echo $_SESSION['name'];
                    }
                ?>
                <a href="./frontend/login.php">
                    <i href="login.php" class="bi bi-person-circle"></i>
                </a>
            </nav>
        </header>
    </ul>

        <div class="main">
            <div class="mid">
                <div class="newarrival">NEW ARRIVALS</div>
                <div class="container">
                    <div class="nabox">Box1</div>
                    <div class="nabox">Box2</div>
                    <div class="nabox">Box3</div>
                    <div class="nabox">Box4</div>
                    <div class="nabox">Box5</div>
                </div>  
            </div>
            
        </div>
        <a href="./frontend/login.php">Login</a>
    </body>
</html>