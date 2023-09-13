<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/leftbar.css">
    <title>Document</title>
</head>
<body>
<div class="leftbar"> 
    <h3><a href="viewbook.php">NEW ARRIVALS</a></h3>
    <header>CATEGORIES</header>
    <div class="leftbarlist">
        <a href="all.php">ALL BOOKS</a>
        <a href="comic.php">COMIC</a>
        <a href="#">DETECTIVE</a>
        <a href="#">FANTASY</a>
        <a href="#">FICTION</a>
        <a href="#">GUIDE</a>
        <a href="#">HEALTH</a>
        <a href="#">HISTORY</a>
        <a href="#">HORROR</a>
        <a href="#">KNOWLEDGE</a>
        <a href="#">MYSTERY</a>
        <a href="#">ROMANCE</a>
    </div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        // Wait for the document to be fully loaded before binding the click event.
        $("a").click(function(event) {
            event.preventDefault(); // Prevent the default behavior of the anchor element.
            
            // Remove background color from all anchor elements.
            $("a").css("background-color", "");
            
            // Set the background color of the clicked anchor element to white.
            $(this).css("background-color", "white");
        });
    });
</script>
</script>
</html>