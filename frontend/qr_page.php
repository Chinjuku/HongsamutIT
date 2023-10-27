<?php
    // get amount from post
    $amount_wow = $_POST['lookup_key'];
    // $amount_wow = 100;


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="./css/qr_page.css">
</head>
<body>
    <svg class="black" width="100%" height="100%">
        <rect/>
    </svg>
    <div class="main_contain">
        <p>SCAN Si</p>
        <img id=qr_pc class=qr_pc src=""/>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        var amount = parseFloat("<?php echo $amount_wow ?>")
        $.ajax({
            method: 'post',
            url: 'http://localhost:3000/generateQR',
            data: {
                amount: amount
            },
            // headers: {
            //     'Content-Type':'application/json'
            // },
            success: function(response){
                console.log('good', response)
                $("#qr_pc").attr('src', response.url)
            },
            error : function(err){
                console.log('bad', response)
            }
        })
    </script>
</body>
