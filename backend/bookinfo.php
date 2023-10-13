<?php
// Step 1: Establish a database connection
    include 'database.php'; // Include your database connection script


    $sql = "SELECT * FROM books"; // Replace 'your_table_name' with your actual table name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $allbook_page = $_SERVER['REQUEST_URI'];
        //if page = allbook and cateid = 1-12
        if ($allbook_page === "/frontend/allbook.php") {
            while($row = $result->fetch_assoc()) {
                echo '<div class="nabox">';
                echo '<img class="pic" src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p class="bookname">' . $row['book_name'] . '</p>';
                echo '<p>' . $row['book_owner'] . '</p>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
            }
        }
        if ($allbook_page === "/frontend/comic.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 1){
                echo '<div class="nabox">';
                echo '<img class="pic" src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p class="bookname">' . $row['book_name'] . '</p>';
                echo '<p>' . $row['book_owner'] . '</p>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
                }
            }
        }
        if ($allbook_page === "/frontend/detective.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 2){
                echo '<div class="nabox">';
                echo '<img class="pic" src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p class="bookname">' . $row['book_name'] . '</p>';
                echo '<p>' . $row['book_owner'] . '</p>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/fantasy.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 3){
                echo '<div class="nabox">';
                echo '<img class="pic" src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p class="bookname">' . $row['book_name'] . '</p>';
                echo '<p>' . $row['book_owner'] . '</p>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/fantasy.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 3){
                echo '<div class="nabox">';
                echo '<img class="pic" src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p class="bookname">' . $row['book_name'] . '</p>';
                echo '<p>' . $row['book_owner'] . '</p>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/fiction.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 4){
                echo '<div class="nabox">';
                echo '<img class="pic" src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p class="bookname">' . $row['book_name'] . '</p>';
                echo '<p>' . $row['book_owner'] . '</p>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/guide.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 5){
                echo '<div class="nabox">';
                echo '<img class="pic"  src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p class="bookname">' . $row['book_name'] . '</p>';
                echo '<p>' . $row['book_owner'] . '</p>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/health.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 6){
                echo '<div class="nabox">';
                echo '<img class="pic"  src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p class="bookname">' . $row['book_name'] . '</p>';
                echo '<p>' . $row['book_owner'] . '</p>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/history.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 7){
                echo '<div class="nabox">';
                echo '<img class="pic" src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p class="bookname">' . $row['book_name'] . '</p>';
                echo '<p>' . $row['book_owner'] . '</p>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
                }
        }
        if ($allbook_page === "/frontend/horror.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 9){
                echo '<div class="nabox">';
                echo '<img class="pic" src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p class="bookname">' . $row['book_name'] . '</p>';
                echo '<p>' . $row['book_owner'] . '</p>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
            }
        }
        if ($allbook_page === "/frontend/knowledge.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 10){
                echo '<div class="nabox">';
                echo '<img class="pic" src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p class="bookname">' . $row['book_name'] . '</p>';
                echo '<p>' . $row['book_owner'] . '</p>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
            }
        }
        if ($allbook_page === "/frontend/mystery.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 11){
                echo '<div class="nabox">';
                echo '<img class="pic" src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p class="bookname">' . $row['book_name'] . '</p>';
                echo '<p>' . $row['book_owner'] . '</p>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
            }
        }
        if ($allbook_page === "/frontend/romance.php"){
            while($row = $result->fetch_assoc()) {
                if($row['cate_id'] == 12){
                echo '<div class="nabox">';
                echo '<img class="pic" src="' . $row['imgsrc'] . '" alt="Image">', '<br>';
                echo '<p class="bookname">' . $row['book_name'] . '</p>';
                echo '<p>' . $row['book_owner'] . '</p>';
                echo '<button class="clicktoview" onclick="togglePopup(\'' . $row['book_name'] . '\', \'' . $row['book_owner'] . '\', \'' . $row['imgsrc'] . '\',  \'' . $row['book_id'] . '\')">VIEW</button>';
                echo '</div>';
                    }
            }
        }
// Step 4: Close the database connection
$conn->close();
?>
<style>
    .nabox{
    position: relative;
    background-color: #fffcee;
    width: 20%;
    height: 290px;
    /* border-radius: 10px; */
    
    text-align: center;
    margin: 10px;
    border-style: solid;
    border-width: thin;
    box-shadow: 10px 10px 5px #fdf1b9;
    
}
    .pic{
        margin-top: 7%;
        width: 95px;
        height: 140px;
    }
    .bookname{
        font-weight:bold;
    }
    .square2{
        position: absolute;
        
        margin-top: 0rem;
        margin-left: 32.5rem;
        width: 150px;
        height: 500px;
        background-color: #485545;
    }
    p{  
        font-family:"Poppings";
        /* font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; */
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
    hr{
        color:#485545;
        border-top: 1px solid #485545;
        background: #485545;
        position: absolute;
        width: 360px;
        margin-top: 5rem;
        margin-left: 4rem;
        /* padding-left:5rem; */
    }
    /* Style for the popup content */
    .popup-content {
        font-family:"Poppings";
        background-color: #FDF5D0;
        padding: 0px;
        width: 800px;
        height: 500px;
        /* border-radius: 5px; */
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
    }

    /* Close button style */
    .popup-close {
        position: absolute;
        width:400px;
        margin-top: 1rem;
        margin-left: 48rem;
        cursor: pointer;
    }
    .popup-pic{
        position:absolute;
        display:inline-block;
        /* background:lightgreen; */
        margin-top:75px;
        width: 220px;
        height: 340px;
        margin-left:30rem;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
    }
    .aa{  
        margin: 30px 0;
        border: solid black 1px;
        padding: 10px;
        text-decoration: none;
        border-radius: 10px;
    }
    .clicktoview{

    width: 30%;
    background: #485545;
    padding: 5px 10px;
    color: #FDF5D0;
    border-radius: 20px;
    box-shadow: 2px 2px rgb(39,34,34);
    }
    .clicktoview:hover{
        background: #657661;
        box-shadow: 2px 2px rgb(39,34,34);
    }
    .popup-bookname{
        font-family:"Poppings";
        position:absolute;
        display:inline-block;
        /* background-color:lightcoral; */
        padding:20px 0px 20px 40px;
        margin-top: 60px;
        margin-left:30px;
        margin-right:55rem;
        font-size:40px;
        font: "Poppings";
    }
    .clicktoborrow{
        position:absolute;
        display:inline-block;
        width: 10%;
        margin-left:100px;
        margin-top:20rem;
        background: #485545;
        padding: 20px 15px 20px 15px;
        color: #FDF5D0;
        border-radius: 3px;
        box-shadow: 2px 2px rgb(39,34,34);
    }
    .clicktoborrow:hover{
        position:absolute;
        display:inline-block;
        width: 10%;
        margin-left:100px;
        margin-top:20rem;
        background: #657661;

        color: #FDF5D0;
        border-radius: 3px;
        box-shadow: 2px 2px rgb(39,34,34);
    }
    .popup-author{
        margin:50px 0 50px 70px;
        font-family:"Poppings";
        position:absolute;
        display:inline-block;
        /* background-color:lightskyblue; */
    }
</style>

<script>
    function togglePopup(bookName, bookOwner, imgSrc, bookId) {
        var popup = document.getElementById('popup');
        var popupContent = document.getElementById('popup-content');
                            
        popupContent.innerHTML = '<form action="../backend/borrow.php" method="post">' +
                                '<span class="popup-close" onclick="closePopup()">X</span>' +
                                
                                '<input type="hidden" name="book_id" value="' + bookId + '">' +
                                '<div class="square2"></div>' +
                                '<img class="popup-pic" src="' + imgSrc + '" alt="Image">' + '<br>' +
                                '<h1 class="popup-bookname">Title : ' + bookName + '</h1>' +
                                '<p class="popup-author">by ' + ' ' + bookOwner + '</p>' +
                                // '<hr>'+
                                '<button type="submit" class="clicktoborrow">BORROW NOW</button>' + 
                                '</form>';

        popup.style.display = 'flex';
    }

    function closePopup() {
        var popup = document.getElementById('popup');
        popup.style.display = 'none';
    }
</script>

<!DOCTYPE html>
<html>
    <body>
        <div class="popup-overlay" id="popup">
            <div class="popup-content" id="popup-content">
                
            </div>
        </div>
    </body>

</html>


