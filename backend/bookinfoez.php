<?php
include 'database.php';

$sql = "SELECT * FROM books"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $allbook_page = $_SERVER['REQUEST_URI'];
    
    while ($row = $result->fetch_assoc()) {
        if (!empty($_POST['categories']) && $row['cate_id'] == $_POST['categories']) {
            $display = true;
        } elseif (empty($_POST['categories'])) {
            $display = true;
        } else {
            $display = false;
        }
        if ($display) {
            echo '';
            echo '<div class="nabox">';
            echo '<p>Book: ' . $row['book_name'] . '</p>';
            echo '<p>Author: ' . $row['book_owner'] . '</p>';
            echo '<img src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
            echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
            echo '</div>';
        }
    }
}
$conn->close();
?>