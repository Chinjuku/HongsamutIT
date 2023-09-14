<?php
    session_start();
    include './layout/navbar.php';
    include './layout/page.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/profile.css">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_SESSION['user_id']) == null) {
            header("location: login.php");
        }
        // echo "<a href='../backend/logout.php'> logout</a>";
    ?>
    <div id = "card">
        <div class="profile-box">
            <div class="back-icon">
            <a href="#"><i class="fa fa-backward" aria-hidden="true"></i></a>
            </div>
            <div class="txt_field">
                <label>Username: </label>
                <?php
                    echo $_SESSION['user_name'];
                ?>
            </div>
            <div class="txt_field1">
                <label>Name: </label>
                <?php
                    echo $_SESSION['first_name'], ' ' ,$_SESSION['last_name'];
                ?>
            </div>
            <div class="txt_field2">
                <label>Tel:</label>
                <?php
                    echo $_SESSION['phone_num'];
                    // var_dump($_SESSION['phone_num']);
                ?>
            </div>
            <div class="txt_field1">
                <label>Email:</label>
                <?php
                    echo $_SESSION['email'];
                ?>
            </div>
            <?php
                    // echo $_SESSION['user_type'];
                ?>
            <a href='../backend/logout.php'> logout</a>
        </div>
    </div>
</body>
</html>