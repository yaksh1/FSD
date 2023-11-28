<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission, insert data into database
    $bookName = $_POST['book_name'];
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];

    $sql = "INSERT INTO books (book_name, isbn, title, author, publisher) VALUES ('$bookName', '$isbn', '$title', '$author', '$publisher')";

    if ($conn->query($sql) === TRUE) {
        header("Location: acknowledge.php?message=book_added");
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
    <title>Add Book</title>
</head>
<body>
    <h2>Add a Book</h2>
    <form action="add_book.php" method="post">
        <label for="book_name">Book Name:</label>
        <input type="text" name="book_name" required><br>

        <label for="isbn">ISBN No:</label>
        <input type="text" name="isbn" required><br>

        <label for="title">Book Title:</label>
        <input type="text" name="title" required><br>

        <label for="author">Author Name:</label>
        <input type="text" name="author" required><br>

        <label for="publisher">Publisher Name:</label>
        <input type="text" name="publisher" required><br>

        <input type="submit" value="Add Book">
    </form>
</body>
</html>
