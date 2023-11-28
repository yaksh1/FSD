<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission, update data in database
    $isbn = $_POST['isbn'];
    $bookName = $_POST['book_name'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];

    $sql = "UPDATE books SET 
            book_name = '$bookName',
            title = '$title',
            author = '$author',
            publisher = '$publisher'
            WHERE isbn = '$isbn'";

    if ($conn->query($sql) === TRUE) {
        header("Location: acknowledge.php?message=book_updated");
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
    <title>Update Book Details</title>
</head>
<body>
    <h2>Update Book Details</h2>
    <form action="update_book.php" method="post">
        <label for="isbn">Enter ISBN No:</label>
        <input type="text" name="isbn" required><br>

        <label for="book_name">Book Name:</label>
        <input type="text" name="book_name" required><br>

        <label for="title">Book Title:</label>
        <input type="text" name="title" required><br>

        <label for="author">Author Name:</label>
        <input type="text" name="author" required><br>

        <label for="publisher">Publisher Name:</label>
        <input type="text" name="publisher" required><br>

        <input type="submit" value="Update Book">
    </form>
</body>
</html>
