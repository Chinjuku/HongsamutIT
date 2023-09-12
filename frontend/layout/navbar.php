<?php
session_start();
// $yourname = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Document</title>
    <style>
    *{
        margin: 0%;
        padding: 0%;
        box-sizing: border-box;
        font: comic;
    }
    /* body{
        height: 100vh;
        background-color: #FDF5D0;
        text-align: center;
        display: flex;
        flex-direction: column;
    } */
    .menubar a:after{
    content: "";
    position: absolute;
    background-color: #FDF5D0;
    height: 3px;
    width: 0%;
    left: 0;
    bottom: -10px;
    }
    .menubar a:hover::after{
    width: 100%;
    }
    .header{
        position: fixed;
        display: flex;
        background-color: #2D342C;
        justify-content: space-between;
        align-items: center;
        top: 0;
        left: 0;
        width: 100%;
        color: #eaeaea;
        padding: 1.3rem 10%;
        z-index: 100;
    }
    .menubar{
        padding-right: 0%;
    }
    .menubar a{
        position: relative;
        text-decoration: none;
        color: #FBFCF8;
        font-size: 1.1rem;
        font-weight: 500;
        margin-left: 3rem;
    }
    .logo a{
        text-decoration: none;
        color: #FBFCF8;
        align-items: center;
        padding: 1px 20px;
    }
    i {
        margin-left: 30px;
    }
    </style>
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
                <a href="profile.php">
                    <i href="login.php" class="bi bi-person-circle"></i>
                </a>
            </nav>
        </header>
  </div>
</ul>
</body>
</html>