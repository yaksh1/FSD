<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission, insert data into database
    $passengerName = $_POST['passenger_name'];
    $fromLocation = $_POST['from_location'];
    $toLocation = $_POST['to_location'];
    $date = $_POST['date'];
    $departureDate = $_POST['departure_date'];
    $arrivalDate = $_POST['arrival_date'];
    $phoneNumber = $_POST['phone_number'];
    $email = $_POST['email'];

    $sql = "INSERT INTO bookings (passenger_name, from_location, to_location, date, departure_date, arrival_date, phone_number, email) 
            VALUES ('$passengerName', '$fromLocation', '$toLocation', '$date', '$departureDate', '$arrivalDate', '$phoneNumber', '$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: acknowledge.php?message=booking_added");
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
    <title>Book a Flight</title>
</head>
<body>
    <h2>Book a Flight</h2>
    <form action="add_booking.php" method="post">
        <label for="passenger_name">Passenger Name:</label>
        <input type="text" name="passenger_name" required><br>

        <label for="from_location">From:</label>
        <input type="text" name="from_location" required><br>

        <label for="to_location">To:</label>
        <input type="text" name="to_location" required><br>

        <label for="date">Date:</label>
        <input type="date" name="date" required><br>

        <label for="departure_date">Departure Date:</label>
        <input type="date" name="departure_date" required><br>

        <label for="arrival_date">Arrival Date:</label>
        <input type="date" name="arrival_date" required><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" required><br>

        <label for="email">Email ID:</label>
        <input type="email" name="email" required><br>

        <input type="submit" value="Book Flight">
    </form>
</body>
</html>
