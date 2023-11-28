<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission, delete data from database
    $isbn = $_POST['isbn'];

    $sql = "DELETE FROM books WHERE isbn = '$isbn'";

    if ($conn->query($sql) === TRUE) {
        header("Location: acknowledge.php?message=book_deleted");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Book</title>
</head>
<body>
    <h2>Delete Book</h2>
    <form action="delete_book.php" method="post">
        <label for="isbn">Enter ISBN No to Delete:</label>
        <input type="text" name="isbn" required><br>

        <input type="submit" value="Delete Book">
    </form>
</body>
</html>
