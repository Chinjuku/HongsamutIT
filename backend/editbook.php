<?php
include 'database.php';
$bookid = $_POST['book_id'];
$bookname = $_POST['book_name'];
$bookowner = $_POST['book_owner'];
$img = $_POST['img'];
$author_id = $_POST['author_id'];

$sql = "UPDATE books b, author a SET b.book_name = ?, a.author_name = ?, b.imgsrc = ? 
WHERE b.book_id = ? and a.author_id = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sssii", $bookname, $bookowner, $img, $bookid, $author_id);
    if ($stmt->execute()) {
        echo '<script>window.location.href = "../frontend/managebook.php" </script>';
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
