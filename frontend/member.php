<?php
    session_start();
    include './layout/page.php';
    include './layout/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/member.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Choose your plan</h2>
        <div class="pricerow">
            <div class="pricecol">
                <p>Starter</p>
                <h3>1฿ <span>/ month</span></h3>
                <ul>
                    <li>สามารถยืมหนังสือได้สูงสุด 10 เล่ม</li>
                    <li>1 ครั้ง / 1 เดือน</li>
                </ul>
                <button>Add to Member</button>
            </div>
            <div class="pricecol">
                <p>Premium</p>
                <h3>15$ <span>/ month</span></h3>
                <ul>
                    <li>สามารถยืมหนังสือได้สูงสุด 20 เล่ม</li>
                    <li>1 ครั้ง / 1 เดือน</li>
                </ul>
                <button>Add to Member</button>
            </div>
            <div class="pricecol">
                <p>All-in</p>
                <h3>100$ <span>/ year</span></h3>
                <ul>
                    <li>สามารถยืมหนังสือสูงสุด 10 เล่ม</li>
                    <li>1 ครั้ง / 1 ปี</li>
                </ul>
                <button>Add to Member</button>
            </div>
        </div>
    </div>
</body>
</html>