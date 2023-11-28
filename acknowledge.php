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
    
    if ($message === 'employee_added') {
        echo "<p>Employee added successfully!</p>";
    } elseif ($message === 'employee_deleted') {
        echo "<p>Employee deleted successfully!</p>";
    } elseif ($message === 'employee_updated') {
        echo "<p>Employee details updated successfully!</p>";
    }
    ?>
    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
