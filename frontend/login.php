<!-- <?php
    // include "layout/navbar.php";
    // include 'layout/page.php';
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920, height=1080, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<!-- <div class="back"> -->
            <!-- <h2><a href="../frontend/index.php"><i class="fa fa-backward" aria-hidden="true"></i>Back</a></h2>
</div> -->
    <div class="main">
        <h1>login</h1>
        <form action="../backend/login.php" method="post">
            <div class="txt_field">
                <input type="text" name="user_name" id="username">
                <span></span><label>Username</label></div>
            <div class="txt_field">
                <input type="password" name="password" id="password">
                <span></span><label>Password</label>
            </div>
            <button type="submit">Login</button>
            <div class="signup_link">
                No account? <a href="regis.php">Sign up</a>
            </div>
        </form>
</div>
</body>
</html>
