<?php
include 'db.php';

$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
</head>
<body>
    <h2>Flight Booking Records</h2>
    <table border="1">
        <tr>
            <th>Passenger Name</th>
            <th>From</th>
            <th>To</th>
            <th>Date</th>
            <th>Departure Date</th>
            <th>Arrival Date</th>
            <th>Phone Number</th>
            <th>Email ID</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['passenger_name']}</td><td>{$row['from_location']}</td><td>{$row['to_location']}</td><td>{$row['date']}</td><td>{$row['departure_date']}</td><td>{$row['arrival_date']}</td><td>{$row['phone_number']}</td><td>{$row['email']}</td></tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
