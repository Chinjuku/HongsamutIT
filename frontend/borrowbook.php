<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/css/borrowbook.css">
        
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
    <!-- javascript -->
    <script>
        function togglePopup(){
            document.getElementById("popup-1").classList.toggle("active");
        }
    </script>
    <body>

</html>