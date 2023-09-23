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
            margin: 30px 30px;
            padding: 30px;
            height: auto;
            justify-content: space-around;

        }
        .navhistory {
            color:white;
            text-decoration: none;
            margin: 0 -10px;
            padding: 1rem 3%;
        }
        .bor{
            border-radius: 50px 0 0 50px;
            background-color: #657661;
            background-color: #2e2a2a;
        }
        .pay{
            background-color: #2e2a2a;
            border-left:1px solid white;
            border-radius: 0 50px 50px 0;
            
        }
        .bor:hover{
            background-color: #657661;
        }
        .pay:hover{
            
            background-color: #657661;
        }
        .pay::after{
            
            background-color: #2e2a2a;
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