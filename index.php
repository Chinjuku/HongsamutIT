<?php
session_start();
if (isset($_SESSION['user_id'])) {
    echo '<script>window.location.href = "./frontend/home.php";</script>';
}
else{
    echo '<script>window.location.href = "./landing.php";</script>';
}
?>
