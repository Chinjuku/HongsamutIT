<?php
    // session_start();
    // include 'layout/navbar.php';
?>

<!Document html>
<html lang="en">
<head>
    <title>HONGSAMUT</title>
    <link rel="stylesheet" href="css/addbook.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <section class="add-books">
        <h1 class="title">BOOK</h1>

        <form action="../backend/addbook.php" method="post" enctype="multipart/form-data">
            <h3>Add new book</h3>
            <input type="text" name="bookname" class="box" placeholder="Enter your book name" require>
            <input type="text" name="bookowner" class="box" placeholder="Enter author" require>
            <div class="selects">
                <label for="select">Catagory :</label>
                <select name="cate_id">
                    <option value="miscellaneous" name="cate_id" required>Miscellaneous</option>
                    <option value="comic" name="cate_id">Comic</option>
                    <option value="detective" name="cate_id">Detective</option>
                    <option value="fantasy" name="cate_id">Fantasy</option>
                    <option value="fiction" name="cate_id">Fiction</option>
                    <option value="guide" name="cate_id">Guide</option>
                    <option value="health" name="cate_id">Health</option>
                    <option value="history" name="cate_id">History</option>
                    <option value="horror" name="cate_id">Horror</option>
                    <option value="knowledge" name="cate_id">Knowledge</option>
                    <option value="mystery" name="cate_id">Mystery</option>
                    <option value="romance" name="cate_id">Romance</option>
                </select>
            </div>
            <!-- ทำเป็นselector -->
            <input type="file" accept="image/jpg, image/jpeg, image/png" class="box1" require>
            <div>
                <input type="submit" value="add book" name="add_book" class="btn">
            </div>
        </form>

    </section>
    
</body>
</html>