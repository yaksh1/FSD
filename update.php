<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission, update all details in the database
    $rollNo = $_POST['roll_no'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $contactNumber = $_POST['contact_number'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Error: Passwords do not match.";
        exit();
    }

    $sql = "UPDATE students SET 
            first_name = '$firstName',
            last_name = '$lastName',
            password = '$password',
            contact_number = '$contactNumber'
            WHERE roll_no = '$rollNo'";

    if ($conn->query($sql) === TRUE) {
        header("Location: acknowledge.php?message=update_successful");
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
    <title>Update Student Details</title>
</head>
<body>
    <h2>Update Student Details</h2>
    <form action="update.php" method="post">
        <label for="roll_no">Enter Roll No/ID:</label>
        <input type="text" name="roll_no" required><br>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required><br>

        <label for="contact_number">Contact Number:</label>
        <input type="text" name="contact_number" required><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
