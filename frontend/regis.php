<?php
    session_start();
    include './layout/navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>HongsamutIT</title>
    <link rel="stylesheet" href="./css/regispage.css">
    <link rel="icon" href="https://th.bing.com/th/id/OIP.nBwIfauMfjWd0qbnifW7YgHaHa?pid=ImgDet&rs=1">
</head>
<body>
<div class="container">
        <form class="page" action="../backend/register.php" method="post">
            <!-- /db-project/backend/userconnect.php -->
            <h3 class="lb">Registor Form</h3>
            
            <div class="form-control">    
            <label class="lb">Fullname</label>
             <input id="inputname" type="text" name="inputname" placeholder="Fullname" class="input" required>
            <small>type error</small>
            </div>
            
            <div class="form-control">    
            <label for="input-email" class="lb">Email</label>
             <input id="input-email" type="text" name="email" placeholder="Email" class="input" required>
            <small>type error</small>
            </div>

            <div class="form-control">    
            <label for="input-password" class="lb">Password</label>
             <input id="input-password" type="password" name="password" placeholder="Password" class="input" required>
            <small>type error</small>
            </div>  

            <div class="form-control">
            <label for="input-confirm-password" class="lb">Confirm Password</label>
             <input id="input-confirm-password" type="password" name="confirm-password" placeholder="Confirm-Password" class="input" required>
            <small>type error</small>
            </div>

            <div class="form-control">    
            <label for="input-gender" class="lb">Gender</label>
            <div><input type="radio" id="male" name="gender" value="male" required><label for="male">Male</label></div>
            <div><input type="radio" id="female" name="gender" value="female" required><label for="female">Female</label></div>
            <small>type error</small>
            </div>

            <button type="submit" class="button mar" value="submit">Registor</button>
        </form>
    </div>
    <p id="child" class="ageform">kk
    </p>
</body>
</html>




