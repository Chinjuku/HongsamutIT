<?php
    include './layout/navbar.php';
    // include './managebook/showManageBook.php';
    // $manage = new showManageBook();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HONGSAMUT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reviewbook2.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    
    <div class="main">
        <div class="left">
            <div><img src="harry.jpg" alt="Girl in a jacket" style="width:200px;height:300px;">
            </div>
            <div class="textgroup">
                <div class="bookname">HARRY POTTER </div>
                <div class="author"> by J.K. ROWLING</div>
            </div>
            
            
            <div class="form-box">
            <div class="form-value">
                <form action="../backend/req.php" method="post">
                    <div class="reviewtitle">WRITE A REVIEW</div>
                    <div class="inputbox">
                        <textarea  id="" rows="8"></textarea>
                        <!-- <label for="message">Your view</label> -->
                    </div>

                    <button>
                        Sent comment
                    </button>
                </form>
            </div>
            </div>
        </div>

        <div class="right">

            <div class="box">
                <div class="profile">
                    <div class="iconcomment"><i class="bi bi-person-circle"></i> </div>
                    <div class="protext">
                        <div class="username">Bibibibibibibibi</div>
                        <div class="date"> 10/11/2003 9.30 A.M </div>
                    </div>
                    
                </div>
                <div class="inboxtext">
                    
                    <div class="comment">เล่มนี้สนุกมากเลอจ้า แนะนำให้ไปอ่านน้า เต้ม 10 เอาไป 11 สนุกกว่านี้ไม่มีล้า สนุกมากกด้อจ้า สนุกแบบวัวตายควายล้ม ตุ๊กล้มแล้วไม่ลุก นอนแล่วไม่หลับ หลับแล่้วไม่ตื่นเลอสู เอาจริงแกรต้องอ่านละ</div>               
                </div>
            </div>


            <div class="box">
                <div class="profile">
                    <div class="iconcomment"><i class="bi bi-person-circle"></i> </div>
                    <div class="protext">
                        <div class="username">nai cheraaim</div>
                        <div class="date"> 10/11/2003 9.30 A.M </div>
                    </div>
                    
                </div>
                <div class="inboxtext">
                    
                    <div class="comment">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,</div>               
                </div>
            </div>

            <div class="box">
                <div class="profile">
                    <div class="iconcomment"><i class="bi bi-person-circle"></i> </div>
                    <div class="protext">
                        <div class="username">นางชินจัง</div>
                        <div class="date"> 10/11/2003 9.30 A.M </div>
                    </div>
                    
                </div>
                <div class="inboxtext">
                    
                    <div class="comment">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human h</div>               
                </div>
            </div>

            <div class="box">
                <div class="profile">
                    <div class="iconcomment"><i class="bi bi-person-circle"></i> </div>
                    <div class="protext">
                        <div class="username">ดช สไป้</div>
                        <div class="date"> 10/11/2003 9.30 A.M </div>
                    </div>
                    
                </div>
                <div class="inboxtext">
                    
                    <div class="comment">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by thei</div>               
                </div>
            </div>

            <div class="box">
                <div class="profile">
                    <div class="iconcomment"><i class="bi bi-person-circle"></i> </div>
                    <div class="protext">
                        <div class="username">ป๋วยป๋วยเอง</div>
                        <div class="date"> 10/11/2003 9.30 A.M </div>
                    </div>
                    
                </div>
                <div class="inboxtext">
                    
                    <div class="comment">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by thei</div>               
                </div>
            </div>
            

        </div>
    </div> 
    </body>
</html>
