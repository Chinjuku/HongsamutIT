<?php
    include './layout/navbar.php';
    include '../backend/get_book.php';
    include '../backend/database.php';
    session_start();
    // check if book_id session
    if (isset($_SESSION['book_id'])){
        $bookid = $_SESSION['book_id'];
        // unset($_SESSION['book_id']);
    } else {
        // alert
        $bookid = $_POST['book_id'];
        $_SESSION['book_id'] = $bookid;
        // echo '<script>alert("Please select a book.");</script>';
        // if not have book_id session
        // check if book_id post
        // if (isset($_POST['book_id'])){
        //     $bookid = $_POST['book_id'];
        // } else {
        //     // if not have book_id post
        //     // redirect to index.php
        //     // echo '<script>window.location.href = "./index.php";</script>';
        //     // exit();
        // }
    }

    // check if user like this book
    $like_sql = "SELECT * FROM book_like WHERE user_id = '{$_SESSION['user_id']}' AND book_id = '{$bookid}'";
    $like_stmt = $conn->query($like_sql);
    if ($like_stmt->num_rows > 0) {
        $did_like = 1;
    } else {
        $did_like = 0;
    }
    // get book data
    $book_img = get_books_img($conn, $bookid);
    $book_name = get_books_name($conn, $bookid);
    $book_author = get_books_author($conn, $bookid);
    $book_like = get_books_like($conn, $bookid);
    // include './managebook/showManageBook.php';
    // $manage = new showManageBook();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HONGSAMUT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reviewbook.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- <script src="https://fontawesome.com/icons/heart?f=classic&s=solid" crossorigin="anonymous"></script> -->
</head>
<body>
    
    <div class="main">
        <div class="left">
            <?php
                echo '<div><img class="cover"src=' . $book_img . ' alt="Girl in a jacket" style="width:200px;height:300px;">';
                echo '</div>';
                echo '<div class="textgroup">';
                echo '<div class="bookname">' . $book_name . '</div>';
                echo '<div class="author"> by ' . $book_author . '</div>';
                echo '<form action="../backend/like.php" method="post">';
                echo '<input type="hidden" name="book_id" value="' . $bookid . '">';
                echo '<p class="like_contain"><img id = "like_svg" class="like_svg" src= "./heart-solid.svg">' .$book_like. '</p></input></form>';
                // <button onclick="red_heart()" class="likebutt"></button>'
                echo '</div>';
            ?>
            
            
            <div class="form-box">
            <div class="form-value">
                <?php
                    echo '<form action="../backend/review.php" method="post">';
                    echo '<div class="reviewtitle">WRITE A REVIEW</div>';
                    echo '<div class="inputbox">';
                    // echo '<input type="hidden" name="comment">';
                    echo '<textarea name="comment" class ="txtarea"placeholder = "type review text here" conname="comment" id="" rows="8" required></textarea>';
                    echo '<input type="hidden" name="book_id" value="' . $bookid . '">';
                    echo '</div><button class="sentcom" type="submit">Sent comment</button></input></form>';
                ?>
            </div>
            </div>
        </div>

        <div class="right">
            <?php
                include '../backend/database.php';
                $sql = "SELECT * FROM review JOIN users USING (user_id) WHERE book_id = {$bookid}";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="box">';
                        echo '<div class="profile">';
                        echo '<div class="iconcomment"><i class="bi bi-person-circle"></i> </div>';
                        echo '<div class="protext">';
                        echo '<div class="username">' . $row['user_name'] . '</div>';
                        echo '<div class="date">' . $row['datetime_review'] . '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="inboxtext">';
                        echo '<div class="comment">' . $row['review_in'] . '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    // echo 'No reviews found.'; // Display a message if no reviews are found.
                }
                
            ?>
            
            

        </div>
    </div> 
    <script>

        var like_session = "<?php echo $did_like; ?>";
        if (like_session == 1){
            console.log("like");
            change_red();
        }else{
            console.log("not like");
        }


        function change_red(){
            document.getElementById("like_svg").style.filter="invert(66%) sepia(74%) saturate(5617%) hue-rotate(332deg) brightness(91%) contrast(85%)";
        }
        function red_heart() {
            if(like_session == 0){
                document.getElementById("like_svg").style.filter="invert(66%) sepia(74%) saturate(5617%) hue-rotate(332deg) brightness(91%) contrast(85%)";
            }else{
                document.getElementById("like_svg").style.filter="invert(26%) sepia(9%) saturate(850%) hue-rotate(11deg) brightness(93%) contrast(90%)";
            }
            
            window.location.href = "../backend/like.php";
        }

        document.getElementById("like_svg").addEventListener("click", red_heart);
        // document.getElementById("like_svg").addEventListener("click", red_heart, {once : true});
    </script>
    </body>
</html>
