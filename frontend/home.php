<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'layout/navbar.php';
    if (isset($_SESSION['id']) == null) {
        header("location: login.php");
    }
    ?>
    <h1>kuy</h1>
</body>
</html>