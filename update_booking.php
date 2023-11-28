<?php
include 'db.php';

$bookingDetails = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission, update data in database
    $phoneNumber = $_POST['phone_number'];

    // Fetch booking details for reference
    $sql = "SELECT * FROM bookings WHERE phone_number = '$phoneNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $bookingDetails = $result->fetch_assoc();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_booking'])) {
    // Handle form submission, update data in database
    $phoneNumber = $_POST['phone_number'];
    $passengerName = $_POST['passenger_name'];
    $fromLocation = $_POST['from_location'];
    $toLocation = $_POST['to_location'];
    $date = $_POST['date'];
    $departureDate = $_POST['departure_date'];
    $arrivalDate = $_POST['arrival_date'];
    $email = $_POST['email'];

    $sql = "UPDATE bookings SET 
            passenger_name = '$passengerName',
            from_location = '$fromLocation',
            to_location = '$toLocation',
            date = '$date',
            departure_date = '$departureDate',
            arrival_date = '$arrivalDate',
            email = '$email'
            WHERE phone_number = '$phoneNumber'";

    if ($conn->query($sql) === TRUE) {
        header("Location: acknowledge.php?message=booking_updated");
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
    <title>Update Booking Details</title>
</head>
<body>
    <h2>Update Booking Details</h2>
    <form action="update_booking.php" method="post">
        <label for="phone_number">Enter Phone Number:</label>
        <input type="text" name="phone_number" required><br>

        <?php if (!empty($bookingDetails)) : ?>
            <label for="passenger_name">Passenger Name:</label>
            <input type="text" name="passenger_name" value="<?= $bookingDetails['passenger_name'] ?>" required><br>

            <label for="from_location">From:</label>
            <input type="text" name="from_location" value="<?= $bookingDetails['from_location'] ?>" required><br>

            <label for="to_location">To:</label>
            <input type="text" name="to_location" value="<?= $bookingDetails['to_location'] ?>" required><br>

            <label for="date">Date:</label>
            <input type="date" name="date" value="<?= $bookingDetails['date'] ?>" required><br>

            <label for="departure_date">Departure Date:</label>
            <input type="date" name="departure_date" value="<?= $bookingDetails['departure_date'] ?>" required><br>

            <label for="arrival_date">Arrival Date:</label>
            <input type="date" name="arrival_date" value="<?= $bookingDetails['arrival_date'] ?>" required><br>

            <label for="email">Email ID:</label>
            <input type="email" name="email" value="<?= $bookingDetails['email'] ?>" required><br>

            <input type="submit" name="update_booking" value="Update Booking">
        <?php endif; ?>
    </form>
</body>
</html>
