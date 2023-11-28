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
    
    if ($message === 'booking_added') {
        echo "<p>Booking added successfully!</p>";
    } elseif ($message === 'booking_cancelled') {
        echo "<p>Booking cancelled successfully!</p>";
    } elseif ($message === 'booking_updated') {
        echo "<p>Booking details updated successfully!</p>";
    }
    ?>
    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
