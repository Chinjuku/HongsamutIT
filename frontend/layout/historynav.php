<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .select{
            align-items: center;
            align-content: center;
            text-align: center;
            margin: 30px 0;
            height: auto;
            justify-content: space-around;

        }
        .navhistory {
            background-color: #657661;
            color:white;
            text-decoration: none;
            margin: 0 -10px;
            padding: 1rem 3%;
        }
        .bor{
            border-radius: 50px 0 0 50px;
            background-color: #657661;
        }
        .pay{
            border-radius: 0 50px 50px 0;
            background-color: lightblue;
        }
    </style>
</head>
<body>
            <div class="select">
                <a href="historyborrow.php" class="navhistory bor">View BORROW</a>
                <a href="historypayment.php"class="navhistory pay">View PAYMENT</a>
            </div>
</body>
</html>