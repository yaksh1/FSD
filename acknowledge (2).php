<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acknowledgement</title>
</head>
<body>
    <h2>Operation Successful</h2>
    <?php
    $message = $_GET['message'];
    
    if ($message === 'book_added') {
        echo "<p>Book added successfully!</p>";
    } elseif ($message === 'book_deleted') {
        echo "<p>Book deleted successfully!</p>";
    } elseif ($message === 'book_updated') {
        echo "<p>Book details updated successfully!</p>";
    }
    ?>
    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
