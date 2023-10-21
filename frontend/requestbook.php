<?php
    include './layout/navbar.php';
    // include './managebook/showManageBook.php';
    // $manage = new showManageBook();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HONGSAMUT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="requestbook.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    
    <section>
    
        <div class="left">
            <div class="text1">CAN'T FIND BOOK?</div>
            <div class="text">FEELS FREE TO BRING THE NEW <br>BOOKS TO OUR LIBRARY</div>
            <img src="image2.png" alt="Girl in a jacket" style="width:300px;height:350px;">
        </div>
        
        
        <div class="form-box">
            <div class="form-value">
                <form action="">
                    <h2>REQUESTING BOOK</h2>
                    <div class="inputbox">
                        <input type="Book's name" required>
                        <label for="">Book's name</label>
                    </div>
                    <div class="inputbox">
                        <input type="Author" required>
                        <label for="">Author</label>
                    </div>
                    <button>
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </section>
       

    </body>
</html>
