<?php
include 'db.php';

$employeeDetails = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission, update data in database
    $employeeID = $_POST['employee_id'];

    // Fetch employee details for reference
    $sql = "SELECT * FROM employees WHERE employee_id = '$employeeID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $employeeDetails = $result->fetch_assoc();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_employee'])) {
    // Handle form submission, update data in database
    $employeeID = $_POST['employee_id'];
    $employeeName = $_POST['employee_name'];
    $departmentName = $_POST['department_name'];
    $phoneNumber = $_POST['phone_number'];
    $joiningDate = $_POST['joining_date'];

    $sql = "UPDATE employees SET 
            employee_name = '$employeeName',
            department_name = '$departmentName',
            phone_number = '$phoneNumber',
            joining_date = '$joiningDate'
            WHERE employee_id = '$employeeID'";

    if ($conn->query($sql) === TRUE) {
        header("Location: acknowledge.php?message=employee_updated");
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
    <title>Update Employee Details</title>
</head>
<body>
    <h2>Update Employee Details</h2>
    <form action="update_employee.php" method="post">
        <label for="employee_id">Enter Employee ID:</label>
        <input type="text" name="employee_id" required><br>

        <?php if (!empty($employeeDetails)) : ?>
            <label for="employee_name">Employee Name:</label>
            <input type="text" name="employee_name" value="<?= $employeeDetails['employee_name'] ?>" required><br>

            <label for="department_name">Department Name:</label>
            <input type="text" name="department_name" value="<?= $employeeDetails['department_name'] ?>" required><br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" value="<?= $employeeDetails['phone_number'] ?>" required><br>

            <label for="joining_date">Joining Date:</label>
            <input type="date" name="joining_date" value="<?= $employeeDetails['joining_date'] ?>" required><br>

            <input type="submit" name="update_employee" value="Update Employee">
        <?php endif; ?>
    </form>
</body>
</html>
