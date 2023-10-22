<?php
    include '../backend/database.php';
    include './layout/page.php';
    include './layout/navbar.php';
    $cates = $_POST['categories'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HONGSAMUT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/managebook.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
    <style>

    </style>
<body>
    <section class="add-books">
        <h1 class="title">ADD NEW BOOK</h1>
        <!-- AddBook -->
        <form action="../backend/addbook.php" method="post" enctype="multipart/form-data">
            <input type="text" name="bookname" class="box" placeholder="Enter your book name" required>
            <input type="text" name="bookowner" class="box" placeholder="Enter author" required>
            <input type="url" name="imgsrc" class="box" placeholder="Enter your url image" required>
            <input type="url" name="urlbook" class="box" placeholder="Enter your url book" required>
            <div class="selects">
                <label for="select">Catagories :</label>
                <select name="cate_id">
                    <option value=8 name="cate_id" required>Miscellaneous</option>
                    <option value=1 name="cate_id">Comic</option>
                    <option value=2 name="cate_id">Detective</option>
                    <option value=3 name="cate_id">Fantasy</option>
                    <option value=4 name="cate_id">Fiction</option>
                    <option value=5 name="cate_id">Guide</option>
                    <option value=6 name="cate_id">Health</option>
                    <option value=7 name="cate_id">History</option>
                    <option value=9 name="cate_id">Horror</option>
                    <option value=10 name="cate_id">Knowledge</option>
                    <option value=11 name="cate_id">Mystery</option>
                    <option value=12 name="cate_id">Romance</option>
                </select>
            </div>
            <!-- ทำเป็นselector -->
            <input type="number" name="copy_book" placeholder="Enter your copy" class="box">
            <div>
                <input type="submit" value="add book" name="add_book" class="btn">
            </div>
        </form>
    </section>
    
    <!-- Edit & Delete -->
            <div class="mid">
                <div class="head">
                    EDIT & DELETE
                </div>
                <div class="container">
                    <!-- <button onclick="togglePopup()" class="nabox"> -->
                    <?php
                        $sql = "SELECT * FROM books b INNER JOIN author a ON b.author_id = a.author_id;";
                        $result = $conn->query($sql);
                        $sql2 = "SELECT * FROM users";
                        $result2 = $conn->query($sql2);
                        while ($row2 = $result2->fetch_assoc()) {
                            $user = $row2['user_type_id'];
                        }
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if (!empty($cates) && $row['cate_id'] == $cates) {
                                    $display = true;
                                } elseif (empty($cates)) {
                                    $display = true;
                                } else {
                                    $display = false;
                                }
                                if ($display) {
                                    $book_name_wow = $row['book_name'];
                                    echo '<div class="nabox">';
                                    echo '<img class="pic" src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                                    echo '<p class="bookname">' . $book_name_wow . '</p>';
                                    echo '<p>' . $row['author_name'] . '</p>';
                                    echo '<p>Amount : ' . $row['copy'] . '</p>';
                                    
                                    if ($book_name_wow == "Don't do that!"){
                                        $book_name_wow = "Don't do that!";
                                    }
                                    echo '<button class="clicktoview" onclick="togglePopup(\'' . $book_name_wow . '\', \'' . $row['author_name'] . '\',
                                    \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\',  \'' . $row['author_id'] . '\')">Edit Book</button>';
                                    // delete //
                                    echo '<form action="../backend/deletebook.php" method="post">';
                                    echo '<button class="clicktoview" type="submit" value="'. $row["book_id"] .'" name="book_id">Delete Book</button>';
                                    echo '</form>';
                                    echo '</div>';
                                }
                            }
                        }
                        $conn->close();
                    ?>
            </div>
        </div>
        <div class="popup-overlay" id="popup">
            <div class="popup-content" id="popup-content">
        
            </div>
        </div>
        <script>
            function togglePopup(bookName, bookOwner, imgSrc, bookId, authorId) {
                var popup = document.getElementById('popup');
                var popupContent = document.getElementById('popup-content');
                                    
                var popupcoN = '<form action="../backend/editbook.php" method="post">' +
                                        '<input type="hidden" name="author_id" value="' + authorId + '">' +
                                        '<input type="hidden" name="book_id" value="' + bookId + '">' +
                                        '<span class="popup-close" onclick="closePopup()">X</span>' +
                                        '<h3> Edit Book </h3>' +
                                        '<div class="boxesz">' +
                                        '<label class="name 1">Edit book name</label>' +
                                        '<input class="input 1" type="text" name="book_name" value="' + bookName + '">' +
                                        '</div>' +
                                        '<div class="boxesz">' +
                                        '<label class="name 2">Edit Author book</label>' +
                                        '<input class="input 2" type="text" name="book_owner" value="' + bookOwner + '">' +
                                        '</div>' +
                                        '<div class="boxesz">' +
                                        '<label class="name 3">Edit Image book</label>' +
                                        '<input class="input 3" type="text" name="img" value="' + imgSrc + '">' + '<br>' +
                                        '</div>' +
                                        '<button class="inputsubmit" type="submit" class="clicktoborrow">Submit</button>' +
                                        '</form>';
                popupContent.innerHTML = popupcoN;
                popup.style.display = 'flex';
            }

            function closePopup() {
                var popup = document.getElementById('popup');
                popup.style.display = 'none';
            }
        </script>
</body>
</html>
