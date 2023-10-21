<?php
    include './layout/navbar.php';
    include './layout/page.php';
    include '../backend/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/profile.css">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_SESSION['user_id']) == null) {
            echo '<script>window.location.href = "login.php";</script>';
        }
        // echo "<a href='../backend/logout.php'> logout</a>";
    ?>
    <div id = "card">
        <div class="profile-box">
            <div class="back-icon">
            <a href="home.php"><i class="fa fa-backward" aria-hidden="true"></i></a>
            </div>
            <div class="txt_field">
                <label>Username : </label>
                <?php
                    echo '<label>' . $_SESSION['user_name'] . '</label>';
                ?>
            </div>
            <div class="txt_field1">
                <label>Name : </label>
                <?php
                    echo '<label>' . $_SESSION['first_name'], ' ' ,$_SESSION['last_name'] . '</label>';
                ?>
            </div>
            <div class="txt_field2">
                <label>Tel : </label>
                <?php
                    echo '<label>' . $_SESSION['phone_num'] . '</label>';
                ?>
            </div>
            <div class="txt_field1">
                <label>Email : </label>
                <?php
                    echo '<label>' . $_SESSION['email'] . '</label>';
                ?>
            </div>
            <div class="txt_field1">
                <label>Password : </label>
                <?php
                    echo '<label>' . $_SESSION['password'] . '</label>';
                ?>
            </div>
            <div class="txt_field1">
                <label>Plan name: </label>
                <?php
                    $sqli = "SELECT * from subscription_plans where plan_id = '{$_SESSION['plan_id']}'";
                    $result = $conn->query($sqli);
                        while ($row = ($result->fetch_assoc())){
                            echo '<label>' . $row['plan_name'] . '</label>';
                        }
                ?>
            </div>
            <div class="txt_field1">
                <label>User type: </label>
                <?php
                    $sql = "SELECT * from user_type where user_type_id = '{$_SESSION['user_type']}'";
                    $result2 = $conn->query($sql);
                        while ($row2 = ($result2->fetch_assoc())){
                            echo '<label>' . $row2['user_type'] . '</label>';
                        }
                ?>
            </div>
            <form action="../backend/logout.php" class="log">
            <button type="submit"> Logout </button>
            </form>
        </div>
    </div>
</body>
</html>
