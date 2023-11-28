<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission, insert data into database
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $rollNo = $_POST['roll_no'];
    $password = $_POST['password'];
    $contactNumber = $_POST['contact_number'];

    $sql = "INSERT INTO students (first_name, last_name, roll_no, password, contact_number) VALUES ('$firstName', '$lastName', '$rollNo', '$password', '$contactNumber')";

    if ($conn->query($sql) === TRUE) {
        header("Location: acknowledge.php?message=registration_successful");
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
    <title>Student Registration</title>
</head>
<body>
    <h2>Student Registration</h2>
    <form action="register.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br>

        <label for="roll_no">Roll No/ID:</label>
        <input type="text" name="roll_no" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required><br>

        <label for="contact_number">Contact Number:</label>
        <input type="text" name="contact_number" required><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
