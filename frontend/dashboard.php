<?php
    include '../backend/database.php';
    // include './layout/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>HONGSAMUT</title>
  <link rel="stylesheet" href="style.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
  
  <div class="container">
    

    <section class="main">
      <div class="main-top">
        <h1>DASHBOARD</h1>
        <i class="fa-solid fa-house"></i>
      </div>
      <div class="users">
        <div class="card">
          <h4>กราฟ</h4>
          <p>หนังสือแต่ละประเภท</p>
        </div>
        <div class="card">
          <h4>กราฟ2</h4>
          <p>หนังสือแต่ละประเภท</p>
        </div>
      </div>

      <section class="attendance1">
        <div class="attendance-list1">
          <h1>ตาราง1</h1>
          <table class="table">
            <thead>
              <tr>
                <th>BORROOWID</th>
                <th>USERNAME</th>
                <th>BOOKNAME</th>
                <th>CATEGORY</th>
                <th>BORROWSTARTEDTIME</th>
                <th>BORROWENDTIME</th>
              </tr>
            </thead>
            <tbody>
                      <?php
                            include '../backend/database.php';
                            
                            $sql = "SELECT * FROM borrow_books";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $sql2 = "SELECT * FROM users WHERE user_id = '{$row['user_id']}'";
                                    $result2 = $conn->query($sql2);
                                    while($row2 = $result2->fetch_assoc()) {
                                        $username = $row2['user_name'];
                                    }
                                    $sql3 = "SELECT * FROM books WHERE book_id = '{$row['book_id']}'";
                                    $result3 = $conn->query($sql3);
                                    while($row3 = $result3->fetch_assoc()) {
                                        $bookname = $row3['book_name'];
                                        $sql4 = "SELECT * FROM categories WHERE cate_id = '{$row3['cate_id']}'";
                                        $result4 = $conn->query($sql4);
                                        while($row4 = $result4->fetch_assoc()) {
                                        $category = $row4['category_name'];
                                        }
                                    }
                                    echo "<tr>";
                                    echo "<td>" . $row['borrow_id'] . "</td>";
                                    echo "<td>" . $username . "</td>";
                                    echo "<td>" . $bookname . "</td>";
                                    echo "<td>" . $category . "</td>";
                                    echo "<td>" . $row['date_borrow'] . "</td>";
                                    echo "<td>" . $row['date_return'] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
          </table>
        </div>
    </section>
    <section class="attendance2">
        <div class="attendance-list2">
          <h1>ตาราง</h1>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>USERNAME</th>
                <th>PAID</th>
                <th>DATE</th>
                
              </tr>
            </thead>
            <tbody>
                    <?php
                        include '../backend/database.php';
                        
                        $sql = "SELECT * FROM payments";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $sql2 = "SELECT * FROM users where user_id = '{$row['user_id']}'";
                                $results = $conn->query($sql2);
                                while($rows = $results->fetch_assoc()) {
                                $username = $rows['user_name'];
                            }
                                echo "<tr>";
                                echo "<td>" . $row['payment_id'] . "</td>";
                                echo "<td>" . $username . "</td>";
                                echo "<td>" . $row['amount'] . "</td>";
                                echo "<td>" . $row['date_paid'] . "</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
            </tbody>
          </table>
        </div>
      </section> 
  </div>
</body>
</html>
