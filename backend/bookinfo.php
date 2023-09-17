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
        echo '<button onclick="togglePopup()"> CLICK TO VIEW </button>';
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
    p{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        margin: 3px 0;
    }
</style>

