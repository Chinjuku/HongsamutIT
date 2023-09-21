<?php
    session_start();
    // include './layout/page.php';
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
        <form action="../backend/subscript.php" method="post">
        <div class="pricerow">
            <div class="pricecol">
                <p>Starter</p>
                <h3>1฿ <span>/ month</span></h3>
                <ul>
                    <li>สามารถยืมหนังสือได้สูงสุด 10 เล่ม</li>
                    <li>1 ครั้ง / 1 เดือน</li>
                </ul>
                <input name="plan_id" type="hidden" value="1">
                <button type="submit">Add to Member</button>
            </div>
            <div class="pricecol">
                <p>Premium</p>
                <h3>15$ <span>/ month</span></h3>
                <ul>
                    <li>สามารถยืมหนังสือได้สูงสุด 20 เล่ม</li>
                    <li>1 ครั้ง / 1 เดือน</li>
                </ul>
                <input name="plan_id" type="hidden" value="2">
                <button type="submit">Add to Member</button>
            </div>
            <div class="pricecol">
                <p>All-in</p>
                <h3>100$ <span>/ year</span></h3>
                <ul>
                    <li>สามารถยืมหนังสือสูงสุด 10 เล่ม</li>
                    <li>1 ครั้ง / 1 ปี</li>
                </ul>
                <input name="plan_id" type="hidden" value="3">
                <button type="submit">Add to Member</button>
            </div>
        </div>
        </form>
    </div>
</body>
</html>