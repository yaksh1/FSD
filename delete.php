<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission, delete data from database
    $rollNo = $_POST['roll_no'];

    $sql = "DELETE FROM students WHERE roll_no = '$rollNo'";

    if ($conn->query($sql) === TRUE) {
        header("Location: acknowledge.php?message=deletion_successful");
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
    <title>Delete Student</title>
</head>
<body>
    <h2>Delete Student</h2>
    <form action="delete.php" method="post">
        <label for="roll_no">Enter Roll No/ID to Delete:</label>
        <input type="text" name="roll_no" required><br>

        <input type="submit" value="Delete">
    </form>
</body>
</html>
