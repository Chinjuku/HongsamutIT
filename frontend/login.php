<!-- <?php
    // include "layout/navbar.php";
    // include 'layout/page.php';
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<div class="nav-bar">
            <h1><a href="../frontend/index.php">Home</a></h1>
</div>
    <div class="main">
        <h1>Login</h1>
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
                Not member? <a href="regis.php">Sign up</a>
            </div>
        </form>
</div>
</body>
</html>