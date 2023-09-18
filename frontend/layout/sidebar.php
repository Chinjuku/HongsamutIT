<!DOCTYPE html>
    <head>
        <!-- <link rel="stylesheet" href="../css/sidebar.css"> -->
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <script scr="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script scr="https://kit.fontawesome.com/a076d05399.js"></script>
        <style>
            *{
                margin: 0;
                padding: 0;
                user-select: none;
                box-sizing: border-box;
                font-family: "Poppings", sans-serif;
            }
        .sidebar{
            position: fixed;
            border-radius: 30px;
            width: 250px;
            height: 100%;
            left: 0px;
            margin-top: 70px;
            padding-left: 0px;
            background-color: #272222;
        }
        .sidebar .text{
            color: white;
            font-size: 15px;
            font-weight: 600;
            line-height: 65px;
            text-align: center;
            background: #37322F;
            letter-spacing: 1px;
            border-bottom: 1px solid#7c7c7c;
        }
        nav ul{
            background-color: #272222;
            height: 100%;
            width: 100%;
            list-style: none;
        }

        nav ul li{
            
            line-height: 60px;

        }
        nav ul li a{
            
            position: relative;
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding-left: 40px;
            font-weight: 500;
            display: block;
            width: 100%;
            padding-left: 0px;
            margin-left: 0px;
            
        }
        nav ul ul li{
            text-align: start;
            line-height: 42px;
            border-bottom: none;

        }
        nav ul .feat-show.show{
            display: block;
            
        }
        nav ul ul{
            position: static;
            /* display: none; */
        }
        nav ul li a:hover{
            margin-right: 20%;
            padding-left: 20px;
            color: #FDF5D0;
            background-color: #485545;
        }
        nav ul ul li a:hover{
            font-size: 17px;
            padding-left: 60px;
        }
        nav ul ul li a{
            font-size: 17px;
            padding-left: 80px;

        }
        nav ul li a span{
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            font-size: 22px;
            transition: transform 0.4s;
        }
        nav ul li a:hover span{
            transform: translateY(-50%) rotate(-180deg);

        }
        .newarr{
            border-bottom: 0.1px solid rgb(158, 158, 158);
        }
        </style>
    </head>
    <body>
    <nav class="sidebar">
        <div class="text">Menu</div>
        <ul>
            <li class="newarr">
                <a href="viewbook.php"><i class="bi bi-stars"></i> NEW ARRIVALS</a>
            </li>

            <li>
                <a href="#" class="feat-btn"><i class="bi bi-book"></i> CATEGORIES
                    <span><i class="bi bi-caret-down"></i></span>
                </a>
                <ul class="feat-show">
                    <li><a href="./allbook.php">ALL BOOKS</a></li>
                    <li><a href="./comic.php">COMIC</a></li>
                    <li><a href="./detective.php">DETECTIVE</a></li>
                    <li><a href="./fantasy.php">FANTASY</a></li>
                    <li><a href="./fiction.php">FICTION</a></li>
                    <li><a href="./guide.php">GUIDE</a></li>
                    <li><a href="./health.php">HEALTH</a></li>
                    <li><a href="./history.php">HISTORY</a></li>
                    <li><a href="./horror.php">HORROR</a></li>
                    <li><a href="./knowledge.php">KNOWLEDGE</a></li>
                    <li><a href="./mystery.php">MYSTERY</a></li>
                    <li><a href="./romance.php">ROMANCE</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- <script>
        $('.feat-btn').click(function(){
            $('nav ul .feat-show').toggleClass("show");
        });
    </script> -->


    </body>
</html>