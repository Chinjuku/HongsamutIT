<?php
    // include "layout/navbar.php";
    // include 'layout/page.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <a href="../frontend/index.php">Back</a>
    <form action="../backend/login.php" method="post">
        <input type="text" name="user_name" id="username">
        <input type="password" name="password" id="password">
        <br><button type="submit">sign in</button>
    </form>
</body>
</html>