<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission, delete data from database
    $employeeID = $_POST['employee_id'];

    $sql = "DELETE FROM employees WHERE employee_id = '$employeeID'";

    if ($conn->query($sql) === TRUE) {
        header("Location: acknowledge.php?message=employee_deleted");
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
    <title>Delete Employee</title>
</head>
<body>
    <h2>Delete Employee</h2>
    <form action="delete_employee.php" method="post">
        <label for="employee_id">Enter Employee ID to Delete:</label>
        <input type="text" name="employee_id" required><br>

        <input type="submit" value="Delete Employee">
    </form>
</body>
</html>
