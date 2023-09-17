<?php
    session_start();
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
        font-family: "Poppings", sans-serif;
    }
    /* body{ */
        /* background-color: #FDF5D0; */
    /* } */
    .menubar a::before,.menubar a::after {
        content: '';
        position: absolute;
        width: 100%;

    }
    .menubar a::before {
        background-color: #FBFCF8;
        height: 3px;
        bottom: 3px;
        transform-origin: 100% 50%;
        transform: scaleX(0);
        transition: transform .3s cubic-bezier(0.76, 0, 0.24, 1);
    }
    .menubar a:hover::before {
        transform-origin: 0% 50%;
        transform: scaleX(1);
    }
    .menubar a:hover::after {
        transform: translate3d(0, 0, 0);
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
        transition: 0.3s;
    }
    </style>
</head>
<body>
<ul>
        <header class="header"> 

            <H2 class="logo"><a href="index.php">HONGSAMUT</a></H2>
            <nav class="menubar">
                <a href="borrowbook.php">ฝาก POPUP</a>
                <a href="viewbook.php">VIEW BOOK</a>
                <?php
                    $check_type = $_SESSION['user_type'];
                    if($check_type == "user") {
                        echo "<a href='member.php'>MEMBER</a>";
                    }
                ?>
                
                <a href="backpack.php">BACKPACK</a>
                <a href="profile.php">
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
