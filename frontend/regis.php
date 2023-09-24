<?php
    // session_start();
    include './layout/page.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>HongsamutIT</title>
    <link rel="stylesheet" href="css/regispage.css">
    <link rel="icon" href="https://th.bing.com/th/id/OIP.nBwIfauMfjWd0qbnifW7YgHaHa?pid=ImgDet&rs=1">
</head>
<body>
<div class="container">
        <form class="page" action="../backend/register.php" method="post">
            <!-- /db-project/backend/userconnect.php -->
            <h3 class="lbb">Sign up</h3>
            
            <div class="form-control">    
            <label class="lb">Username</label>
            <input id="user_name" type="text" name="user_name" placeholder="Username" class="input" required>
            <small>type error</small>
            </div>

            <div class="form-control">    
            <label class="lb">First Name</label>
            <input id="first_name" type="text" name="first_name" placeholder="First name" class="input" required>
            <small>type error</small>
            </div>

            <div class="form-control">    
            <label class="lb">Last Name</label>
            <input id="last_name" type="text" name="last_name" placeholder="Last name" class="input" required>
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
            <label for="phone_num" class="lb">Phone Number</label>
            <input type="text" name="phone_num" placeholder="Phone number" class="input" required>
            <small>type error</small>
            </div>

            <div class="form-control">    
            <label for="phone_num" class="lb">User Type</label>
            <select name="user_type" class="input">
                <option value="1" name="user_type" required>User</option>
                <option value="2" name="user_type">Admin</option>
            </select>
            </div>

            <button type="submit" class="button mar" value="submit">CREATE ACCOUNT</button>
        </form>
    </div>
    <p id="child" class="ageform">
    </p>
</body>
</html>




