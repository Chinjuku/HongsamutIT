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
    <script src="https://js.stripe.com/v3/"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>CHOOSE YOUR PLAN</h2>
        
        <div class="pricerow">
            <div class="pricecol">
                <p>Starter</p>
                <h3>99฿ <span>/ month</span></h3>
                <ul>
                    <li>สามารถยืมหนังสือได้สูงสุด 10 เล่ม</li>
                    <li>1 ครั้ง / 1 เดือน</li>
                </ul>
                <form action="../backend/test/public/create-checkout-session.php" method="POST">
                <input type="hidden" name="lookup_key" value= 1 />
                <button type="submit">Checkout</button></form>
            </div>
            <div class="pricecol">
                <p>Premium</p>
                <h3>199฿ <span>/ month</span></h3>
                <ul>
                    <li>สามารถยืมหนังสือได้สูงสุด 20 เล่ม</li>
                    <li>1 ครั้ง / 1 เดือน</li>
                </ul>
                <form action="../backend/test/public/create-checkout-session.php" method="POST">
                <input type="hidden" name="lookup_key" value= 2 />
                <button type="submit">Checkout</button></form>
            </div>
            <div class="pricecol">
                <p>All-in</p>
                <h3>990฿ <span>/ year</span></h3>
                <ul>
                    <li>สามารถยืมหนังสือสูงสุด 10 เล่ม</li>
                    <li>1 ครั้ง / 1 ปี</li>
                </ul>
                <form action="../backend/test/public/create-checkout-session.php" method="POST">
                <input type="hidden" name="lookup_key" value= 3 />
                <button type="submit">Checkout</button></form>
            </div>
        </div>

    </div>
</body>
</html>