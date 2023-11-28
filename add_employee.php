<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission, insert data into database
    $employeeName = $_POST['employee_name'];
    $employeeID = $_POST['employee_id'];
    $departmentName = $_POST['department_name'];
    $phoneNumber = $_POST['phone_number'];
    $joiningDate = $_POST['joining_date'];

    $sql = "INSERT INTO employees (employee_name, employee_id, department_name, phone_number, joining_date) 
            VALUES ('$employeeName', '$employeeID', '$departmentName', '$phoneNumber', '$joiningDate')";

    if ($conn->query($sql) === TRUE) {
        header("Location: acknowledge.php?message=employee_added");
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
    <title>Add Employee</title>
</head>
<body>
    <h2>Add an Employee</h2>
    <form action="add_employee.php" method="post">
        <label for="employee_name">Employee Name:</label>
        <input type="text" name="employee_name" required><br>

        <label for="employee_id">Employee ID:</label>
        <input type="text" name="employee_id" required><br>

        <label for="department_name">Department Name:</label>
        <input type="text" name="department_name" required><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" required><br>

        <label for="joining_date">Joining Date:</label>
        <input type="date" name="joining_date" required><br>

        <input type="submit" value="Add Employee">
    </form>
</body>
</html>
