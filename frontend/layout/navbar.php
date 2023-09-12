<?php
session_start();
// $yourname = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            }
        ul .list a{
            margin-right: 30px;
        }
    </style>
</head>
<body>
<ul>
  <div class="list"><a href="default.asp">Home</a>
       <a href="allbook.php">News</a>
       <a href="contact.asp">Contact</a>
       <a href="login.php">login</a></div>
  <div><a href="about.asp">About</a>
  <?php
  if (isset($_SESSION['id'])){
    echo $_SESSION['name'];
    echo "<a href='../backend/logout.php'> logout</a>";
  }
  ?></div>
</ul>
</body>
</html>