<?php
    include './layout/navbar.php';
    include './layout/page.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_SESSION['user_id']) == null) {
            header("location: login.php");
        }
        // echo "<a href='../backend/logout.php'> logout</a>";
    ?>
    <a href="../backend/logout.php">logout</a>
</body>
</html>