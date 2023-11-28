<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission, delete data from database
    $phoneNumber = $_POST['phone_number'];

    $sql = "DELETE FROM bookings WHERE phone_number = '$phoneNumber'";

    if ($conn->query($sql) === TRUE) {
        header("Location: acknowledge.php?message=booking_cancelled");
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
    <title>Cancel Booking</title>
</head>
<body>
    <h2>Cancel Booking</h2>
    <form action="delete_booking.php" method="post">
        <label for="phone_number">Enter Phone Number to Cancel Booking:</label>
        <input type="text" name="phone_number" required><br>

        <input type="submit" value="Cancel Booking">
    </form>
</body>
</html>
