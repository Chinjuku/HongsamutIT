<?php
if (isset($_SESSION['user_id'])) {
    echo '<script>window.location.href = "./frontend/";</script>';
}
else{
    echo '<script>window.location.href = "./landing.php";</script>';
}
?>
