<?php
    include './layout/navbar.php';
    include '../backend/get_book.php';
    include '../backend/database.php';
    session_start();
    // check if book_id session
    if (isset($_SESSION['book_id'])){
        $bookid = $_SESSION['book_id'];
        unset($_SESSION['book_id']);
    } else {
        // alert
        $bookid = $_POST['book_id'];
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
                echo '<p class="like_contain"><img class="like_svg" src= "./heart-solid.svg"><button class="likebutt"></button>"    '.$book_like. '"</p>';
                echo '</div>';
            ?>
            
            
            <div class="form-box">
            <div class="form-value">
                <?php
                    echo '<form action="../backend/review.php" method="post">';
                    echo '<div class="reviewtitle">WRITE A REVIEW</div>';
                    echo '<div class="inputbox">';
                    echo '<input type="hidden" name="book_id" value="' . $bookid . '">';
                    echo '<textarea class ="txtarea"placeholder = "type review text here" conname="comment" id="" rows="8" required></textarea>';
                    echo '</div><button class="sentcom" type="submit">Sent comment</button></form>';
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
            <!-- <div class="box">
                <div class="profile">
                    <div class="iconcomment"><i class="bi bi-person-circle"></i> </div>
                    <div class="protext">
                        <div class="username">nai cheraaim</div>
                        <div class="date"> 10/11/2003 9.30 A.M </div>
                    </div>
                    
                </div>
                <div class="inboxtext">
                    
                    <div class="comment">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,</div>               
                </div>
            </div> -->

            <!-- <div class="box">
                <div class="profile">
                    <div class="iconcomment"><i class="bi bi-person-circle"></i> </div>
                    <div class="protext">
                        <div class="username">นางชินจัง</div>
                        <div class="date"> 10/11/2003 9.30 A.M </div>
                    </div>
                    
                </div>
                <div class="inboxtext">
                    
                    <div class="comment">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human h</div>               
                </div>
            </div>

            <div class="box">
                <div class="profile">
                    <div class="iconcomment"><i class="bi bi-person-circle"></i> </div>
                    <div class="protext">
                        <div class="username">ดช สไป้</div>
                        <div class="date"> 10/11/2003 9.30 A.M </div>
                    </div>
                    
                </div>
                <div class="inboxtext">
                    
                    <div class="comment">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by thei</div>               
                </div>
            </div>

            <div class="box">
                <div class="profile">
                    <div class="iconcomment"><i class="bi bi-person-circle"></i> </div>
                    <div class="protext">
                        <div class="username">ป๋วยป๋วยเอง</div>
                        <div class="date"> 10/11/2003 9.30 A.M </div>
                    </div>
                    
                </div>
                <div class="inboxtext">
                    
                    <div class="comment">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by thei</div>               
                </div>
            </div> -->
            

        </div>
    </div> 
    </body>
</html>
