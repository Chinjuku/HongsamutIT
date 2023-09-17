<?php
// Step 1: Establish a database connection
include 'database.php'; // Include your database connection script

// Step 2: Execute a SQL query to retrieve data
    $sql = "SELECT * FROM books"; // Replace 'your_table_name' with your actual table name
    $result = $conn->query($sql);

// Step 3: Fetch and display the data
    if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        // $_SESSION['book_id'] = $row['book_id'];
        // $_SESSION['book_name'] = $row['book_name'];
        // $_SESSION['book_owner'] = $row['book_owner'];
        // $_SESSION['img_src'] = $row['imgsrc'];
        // $_SESSION['cate_name'] = $row['cate_id'];
        echo '<div class="nabox">';
        echo '<p>' . $row['book_name'] . '</p>';
        echo '<p>' . $row['book_owner'] . '</p>';
        echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
        // include 'borrowbook.php';
        echo '<button onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\')">CLICK TO VIEW</button>';
        echo '</div>';
        }
    }
 else {
    echo "No records found.";
}
// echo $_SESSION['book_id'], $_SESSION['book_owner'];
// Step 4: Close the database connection
$conn->close();
?>
<style>
    /* Style for the popup overlay */
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
    // Function to toggle the popup
    function togglePopup(bookName, bookOwner, imgSrc) {
        var popup = document.getElementById('popup');
        var popupContent = document.getElementById('popup-content');

        // Set the content for the popup
        popupContent.innerHTML = '<span class="popup-close" onclick="closePopup()">X</span>' +
                                 '<h2>Book name :' + ' ' +bookName + '</h2>' +
                                 '<p>Author : ' + ' ' + bookOwner + '</p>' +
                                 '<img class="pic" src="' + imgSrc + '" alt="Image">' + '<br>' +
                                 '<a class="aa" href="../frontend/backpack.php">BORROW NOW</a>';

        // Show the popup
        popup.style.display = 'flex';
    }

    // Function to close the popup
    function closePopup() {
        var popup = document.getElementById('popup');
        popup.style.display = 'none';
    }
</script>

<html>
<div class="popup-overlay" id="popup">
    <div class="popup-content" id="popup-content">
        <!-- <span class="popup-close" onclick="closePopup()">X</span> -->
    </div>
</div>
</html>


