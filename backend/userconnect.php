<?php
session_start();
echo 'hee';
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

            //create connection
            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

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
                    // session_start();
                    // header('location:/db-project/frontend/home.php');
                
                }
            }
    } else{
        echo "All field are required";
    }
}