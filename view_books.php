<?php
include 'db.php';

$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
</head>
<body>
    <h2>Book Records</h2>
    <table border="1">
        <tr>
            <th>Book Name</th>
            <th>ISBN No</th>
            <th>Book Title</th>
            <th>Author Name</th>
            <th>Publisher Name</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['book_name']}</td><td>{$row['isbn']}</td><td>{$row['title']}</td><td>{$row['author']}</td><td>{$row['publisher']}</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
