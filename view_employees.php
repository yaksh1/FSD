<?php
include 'db.php';

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employees</title>
</head>
<body>
    <h2>Employee Records</h2>
    <table border="1">
        <tr>
            <th>Employee Name</th>
            <th>Employee ID</th>
            <th>Department Name</th>
            <th>Phone Number</th>
            <th>Joining Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['employee_name']}</td><td>{$row['employee_id']}</td><td>{$row['department_name']}</td><td>{$row['phone_number']}</td><td>{$row['joining_date']}</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
