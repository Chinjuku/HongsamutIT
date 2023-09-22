<?php
// Step 1: Establish a database connection
    include 'database.php'; // Include your database connection script


    $sql = "SELECT * FROM books"; // Replace 'your_table_name' with your actual table name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $allbook_page = $_SERVER['REQUEST_URI'];
        //if page = allbook and cateid = 1-12
        if ($allbook_page === "/frontend/allbook.php") {
            while($row = $result->fetch_assoc()) {
                echo '<div class="nabox">';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p>' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
            }
        }
        if ($allbook_page === "/frontend/comic.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 1){
                echo '<div class="nabox">';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p>' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
                }
            }
        }
        if ($allbook_page === "/frontend/detective.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 2){
                echo '<div class="nabox">';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p>' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/fantasy.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 3){
                echo '<div class="nabox">';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p>' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/fantasy.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 3){
                echo '<div class="nabox">';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p>' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/fiction.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 4){
                echo '<div class="nabox">';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p>' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/guide.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 5){
                echo '<div class="nabox">';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p class="bookname">' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/health.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 6){
                echo '<div class="nabox">';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p class="bookname">' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/history.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 7){
                echo '<div class="nabox">';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p>' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/horror.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 9){
                echo '<div class="nabox">';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p>' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
            }
        }
        if ($allbook_page === "/frontend/knowledge.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 10){
                echo '<div class="nabox">';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p>' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
            }
        }
        if ($allbook_page === "/frontend/mystery.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 11){
                echo '<div class="nabox">';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p>' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
            }
        }
        if ($allbook_page === "/frontend/romance.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 12){
                echo '<div class="nabox">';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p>' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
            }
        }
// Step 4: Close the database connection
$conn->close();
?>
<style>
    p{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        margin: 3px 0;
    }
    .popup-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%) scale(1.15);
        opacity: 0;
        background-color: #FDF5D0;
        width: 800px;
        height: 500px;
        z-index: 2;
        transition: all 300ms ease-in-out;
    }

    /* Style for the popup content */
    .popup-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%) scale(1.15);
        opacity: 0;
        background-color: #FDF5D0;
        width: 800px;
        height: 500px;
        z-index: 2;
        transition: all 300ms ease-in-out;
    }

    /* Close button style */
    .popup-close {
        /* position: absolute; */
        top: 10px;
        right: 10px;
        cursor: pointer;
    }
    .pic{
        width: 300px;
        height: 350px;
        margin-bottom: 20px;
    }
    .aa{  
        margin: 30px 0;
        border: solid black 1px;
        padding: 10px;
        text-decoration: none;
        border-radius: 10px;
    }
    .clicktoview{
    width: 50%;
    background: #485545;
    padding: 5px 10px;
    color: #FDF5D0;
    border-radius: 5px;
    box-shadow: 2px 2px rgb(39,34,34);
    }
    .clicktoview:hover{
        color: #485545;
        box-shadow: 1.5px 1.5px rgb(253,245,208, 0.8);
    }
</style>

<script>
    function togglePopup(bookName, bookOwner, imgSrc, bookId) {
        var popup = document.getElementById('popup');
        var popupContent = document.getElementById('popup-content');
                            
        popupContent.innerHTML = '<form action="../backend/borrow.php" method="post">' +
                                 '<span class="popup-close" onclick="closePopup()">X</span>' +
                                 '<p>Author : ' + ' ' + bookOwner + '</p>' +
                                 '<input type="hidden" name="book_id" value="' + bookId + '">' +
                                 '<h1>Book :' + ' ' + bookName + '</h1>' +
                                 
                                 '<img class="pic" src="' + imgSrc + '" alt="Image">' + '<br>' +
                                 '<button type="submit" class="clicktoview">BORROW NOW</button>' + 
                                 '</form>';

        popup.style.display = 'flex';
    }

    function closePopup() {
        var popup = document.getElementById('popup');
        popup.style.display = 'none';
    }
</script>

<html>
<div class="popup-overlay" id="popup">
    <div class="popup-content" id="popup-content">
        
    </div>
</div>
</html>


