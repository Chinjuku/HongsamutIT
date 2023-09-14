<?php
    // session_start();
    // include 'layout/navbar.php';
?>

<!Document html>
<html lang="en">
<head>
    <title>HONGSAMUT</title>
    <link rel="stylesheet" href="addbook.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <section class="add-books">
        <h1 class="title">BOOK</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <h3>add a books</h3>
            <input type="text" name="name" class="box" placeholder="enter book name" require>
            <input type="text" name="name" class="box" placeholder="enter author" require>
            <!-- <input type="text" name="name" class="box" placeholder="enter category" require> -->
            <!-- ทำเป็นselector -->
            <input type="file" accept="image/jpg, image/jpeg, image/png" class="box1" require>
            <div>
                <input type="submit" value="add book" name="add_book" class="btn">
            </div>
        </form>

    </section>
    
</body>
</html>