<?php
    // include '../backend/bookinfo.php'
// include 'database.php'; // Include your database connection script

// // Step 2: Execute a SQL query to retrieve data
//     $sql = "SELECT * FROM books"; // Replace 'your_table_name' with your actual table name
//     $result = $conn->query($sql);

// // Step 3: Fetch and display the data
//     if ($result->num_rows > 0) {

//         while ($row = $result->fetch_assoc()) {
//             echo '<div class="popup" id="popup-1">';
//             echo '<div class="overlay"></div>';
//             echo '<div class="content"> ';
//             echo '<div class="bg"></div>';
//             echo '<div class="left">';
//             echo '<div class="author">' . $row['book_owner'] . '</div>';
//             echo '<div class="title">' . $row['book_name'] . '</div>';
//             echo '<hr>';
//             echo '<button class="borrow">BORROW NOW</button>';
//             echo '</div>';
//             echo '<div class="right">';
//             echo '<div class="icon">';
//             echo '<i class="bi bi-dash-square" onclick="togglePopup()"></i>';
//             echo '</div>';
//             echo '<img src="' . $row['imgsrc'] . '" alt="Books">';
//             echo '</div>';
//             echo '</div>';
//             echo '<button onclick="togglePopup()"> CLICK TO VIEW</button>';
//             echo '</div>';
//             echo '<script src="javascript/borrowbook.js"></script>';
//         }
//     }
?>



<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/borrowbook.css">
        
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

        <div class="popup" id="popup-1">
            <div class="overlay"></div>
            <div class="content"> 
                <div class="bg"></div>
                <div class="left">
                    
                    <div class="author">J.K.Rowling</div>
                    
                    <div class="title">HARRY POTTER AND THE SORCERER’S STONE</div>
                    <hr>
                    <button class="borrow">BORROW NOW</button>
                </div>
                <div class="right">
                    <div class="icon">
                    <i class="bi bi-dash-square" onclick="togglePopup()"></i>
                    </div>
                    
                    <img src="harry.jpg" alt="Books">
                    <?php
                        // echo '<img src="'. $_SESSION['imgsrc'] .'" alt="Books">';
                    ?>
                </div>  
            </div>
            <button onclick="togglePopup()"> CLICK TO VIEW</button>
        </div>
    </head>
    <script>
        function togglePopup(){
            document.getElementById("popup-1").classList.toggle("active");
        }
    </script>
    <body>

</html>