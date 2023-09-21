<?php
// Step 1: Establish a database connection
include 'database.php'; // Include your database connection script

// Step 2: Execute a SQL query to retrieve data
    $sql = "SELECT * FROM books"; // Replace 'your_table_name' with your actual table name
    $result = $conn->query($sql);
    // echo $_POST['categories'];
// Step 3: Fetch and display the data
    if ($result->num_rows > 0) {
        // output data of each row
        $allbook_page = $_SERVER['REQUEST_URI'];
        //if page = allbook and cateid = 1-12
        if ($allbook_page === "/frontend/allbookez.php") {
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] === $_POST['categories']){
                echo '<div class="nabox">';
                echo '<p>Book: ' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                }
            else{
                echo '<div class="nabox">';
                echo '<p>Book: ' . $row['book_name'] . '</p>';
                echo '<p>Author: ' . $row['book_owner'] . '</p>';
                echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                }
            }
        }
    }