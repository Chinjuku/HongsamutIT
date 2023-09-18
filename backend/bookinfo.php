<?php
// Step 1: Establish a database connection
include 'database.php'; // Include your database connection script

// Step 2: Execute a SQL query to retrieve data
    $sql = "SELECT * FROM books"; // Replace 'your_table_name' with your actual table name
    $result = $conn->query($sql);
        // $_SESSION['book_id'] = $row['book_id'];
        // $_SESSION['book_name'] = $row['book_name'];
        // $_SESSION['book_owner'] = $row['book_owner'];
        // $_SESSION['img_src'] = $row['imgsrc'];
        // $_SESSION['cate_id'] = $row['cate_id'];
// Step 3: Fetch and display the data
    if ($result->num_rows > 0) {
        // output data of each row
        $allbook_page = $_SERVER['REQUEST_URI'];
        if ($allbook_page === "/frontend/allbook.php") {
            while($row = $result->fetch_assoc()) {
                echo '<div class="nabox">';
                    echo '<p>Book: ' . $row['book_name'] . '</p>';
                    echo '<p>Author: ' . $row['book_owner'] . '</p>';
                    echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                    echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\')">CLICK TO VIEW</button>';
                    echo '</div>';
            }
        }
        if ($allbook_page === "/frontend/comic.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 1){
                    echo '<div class="nabox">';
                    echo '<p>Book: ' . $row['book_name'] . '</p>';
                    echo '<p>Author: ' . $row['book_owner'] . '</p>';
                    echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                    echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\')">CLICK TO VIEW</button>';
                    echo '</div>';
                    }
                }
            }
        }
        if ($allbook_page === "/frontend/detective.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 2){
                    echo '<div class="nabox">';
                    echo '<p>Book: ' . $row['book_name'] . '</p>';
                    echo '<p>Author: ' . $row['book_owner'] . '</p>';
                    echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                    echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\')">CLICK TO VIEW</button>';
                    echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/fantasy.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 3){
                    echo '<div class="nabox">';
                    echo '<p>Book: ' . $row['book_name'] . '</p>';
                    echo '<p>Author: ' . $row['book_owner'] . '</p>';
                    echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                    echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\')">CLICK TO VIEW</button>';
                    echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/fantasy.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 3){
                    echo '<div class="nabox">';
                    echo '<p>Book: ' . $row['book_name'] . '</p>';
                    echo '<p>Author: ' . $row['book_owner'] . '</p>';
                    echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                    echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\')">CLICK TO VIEW</button>';
                    echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/fiction.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 4){
                    echo '<div class="nabox">';
                    echo '<p>Book: ' . $row['book_name'] . '</p>';
                    echo '<p>Author: ' . $row['book_owner'] . '</p>';
                    echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                    echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\')">CLICK TO VIEW</button>';
                    echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/guide.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 5){
                    echo '<div class="nabox">';
                    echo '<p>Book: ' . $row['book_name'] . '</p>';
                    echo '<p>Author: ' . $row['book_owner'] . '</p>';
                    echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                    echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\')">CLICK TO VIEW</button>';
                    echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/health.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 6){
                    echo '<div class="nabox">';
                    echo '<p>Book: ' . $row['book_name'] . '</p>';
                    echo '<p>Author: ' . $row['book_owner'] . '</p>';
                    echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                    echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\')">CLICK TO VIEW</button>';
                    echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/history.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 7){
                    echo '<div class="nabox">';
                    echo '<p>Book: ' . $row['book_name'] . '</p>';
                    echo '<p>Author: ' . $row['book_owner'] . '</p>';
                    echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                    echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\')">CLICK TO VIEW</button>';
                    echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/horror.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 9){
                echo '<div class="nabox">';
                echo '<p>Book: ' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\')">CLICK TO VIEW</button>';
                echo '</div>';
                    }
            }
        }
        if ($allbook_page === "/frontend/knowledge.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 10){
                echo '<div class="nabox">';
                echo '<p>Book: ' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\')">CLICK TO VIEW</button>';
                echo '</div>';
                    }
            }
        }
        if ($allbook_page === "/frontend/mystery.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 11){
                echo '<div class="nabox">';
                echo '<p>Book: ' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\')">CLICK TO VIEW</button>';
                echo '</div>';
                    }
            }
        }
        if ($allbook_page === "/frontend/romance.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 12){
                echo '<div class="nabox">';
                echo '<p>Book: ' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\')">CLICK TO VIEW</button>';
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
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        align-items: center;
        justify-content: center;
        z-index: 1;
    }

    /* Style for the popup content */
    .popup-content {
        background-color: #fff;
        padding: 20px;
        /* width: 800px;
        height: 500px; */
        border-radius: 5px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
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
</style>

<script>
    function togglePopup(bookName, bookOwner, imgSrc) {
        var popup = document.getElementById('popup');
        var popupContent = document.getElementById('popup-content');

        popupContent.innerHTML = '<span class="popup-close" onclick="closePopup()">X</span>' +
                                 '<p>Author : ' + ' ' + bookOwner + '</p>' +
                                 '<h1>Book :' + ' ' +bookName + '</h1>' +
                                 '<img class="pic" src="' + imgSrc + '" alt="Image">' + '<br>' +
                                 '<a class="aa" href="../frontend/backpack.php">BORROW NOW</a>';

        popup.style.display = 'flex';
    }

    function closePopup() {
        var popup = document.getElementById('popup');
        popup.style.display = 'none';
    }
</script>

<html>
<div class="popup-overlay" id="popup">
    <div class="popup-content" id="popup-content"></div>
</div>
</html>


