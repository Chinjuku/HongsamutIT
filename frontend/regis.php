<?php
session_start();
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["inputname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirm-password"];
    $gender = $_POST["gender"];

    if (!empty($name) || !empty($email) || !empty($password)
        || !empty($confirmpassword) || !empty($gender)){
            $host = "localhost";
            $dbUsername = "root";
            $dbPassword = "";
            $dbname = "db_login";
            $port = "3306";

            //create connection
            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname, $port);

            if(mysqli_connect_error()){
                die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
            }
            else{
                $SELECT = "SELECT email From register Where email = ? Limit 1";
                $INSERT = "INSERT into register (name, email, password, confirmpassword, gender)
                            values(?, ?, ?, ?, ?)";

                //prepare statement
                $stmt = $conn->prepare($SELECT);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->bind_result($email);
                $stmt->store_result();
                $rnum = $stmt->num_rows;

                if ($rnum==0){
                    $stmt->close();
                    $stmt = $conn->prepare($INSERT);
                    $stmt->bind_param("sssss", $name, $email, $password, $confirmpassword, $gender);
                    $stmt->execute();
                    echo "New record Successfully";
                    session_start();
                    header('location:home.php');
                
                }
            }
    } else{
        echo "All field are required";
    }
}
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
        <form class="page" action="/db-project/backend/userconnect.php" method="post">
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




