<?php
    session_start();
    // include './layout/leftbar.php';
    include './layout/navbar.php';
?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HONGSAMUT</title>
        <link rel="stylesheet" href="./css/backpack.css">
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        
    </head>
    <body>
        <?php
            if ($_SESSION['user_id'] == NULL) {
                echo '<script>window.location.href = "login.php";</script>';
            }
        ?>
        <div class="main">
            <div class="mid">
                <div class="mybackpack">MY BACKPACK</div>
                <!-- <div class="mybackpackdes">my borrowing books!</div> -->
                <table class="table2">
                    <thead>
                        <tr>
                        <th>TITLE</th>
                        <th>CATEGORY</th>
                        <!-- <th>STATUS</th> -->
                        <th>STARTED</th>
                        <th>FINISHED</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                        <td>bibibiibbibibiibibibibibibbibibi</td>
                        <td>romance</td>
                        <!-- <td>available</td> -->
                        <td>01/07/66</td>
                        <td>8/07/66</td>
                        </tr>

                        <tr>
                        <td>cheraim</td>
                        <td>fiction</td>
                        <!-- <td>available</td> -->
                        <td>01/07/66</td>
                        <td>8/07/66</td>
                        </tr>

                        <tr>
                        <td>nornor</td>
                        <td>comic</td>
                        <!-- <td>unavailble</td> -->
                        <td>01/07/66</td>
                        <td>8/07/66</td>
                        </tr>

                        <tr>
                        <td>chinjuku</td>
                        <td>fantasy</td>
                        <!-- <td>unavailble</td> -->
                        <td>01/07/66</td>
                        <td>8/07/66</td>
                        </tr>

                        <tr>
                        <td>sprite</td>
                        <td>detective</td>
                        <!-- <td>unavailble</td> -->
                        <td>01/07/66</td>
                        <td>8/07/66</td>
                        </tr>
                    </tbody>
                    
                </table>
                <hr>

            <div class="bottombar">
                
                <div class="container">
                    <div class="borrowing">BORROWING
                        <div class="circle1"></div>
                        <div class="circle2"></div>
                        <div class="circle3"></div>
                        <div class="circle4"></div>
                        <div class="circle5"></div>
                    </div> 
                </div>
                
            </div>
        </div>    

    </body>
</html>
