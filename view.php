<?php
// Include the database connection file
include 'database.php';

// Retrieve student data from the database
$sql = "SELECT * FROM student";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .action-icons {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .action-icons a {
            margin-right: 5px;
            color: #007bff;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">View Student Information</h2>
    <table>
        <thead>
            <tr>
                <th>S/NO</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $serialNumber = 1;
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $serialNumber . "</td>";
                    echo "<td>" . $row["firstName"] . "</td>";
                    echo "<td>" . $row["lastName"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>" . $row["dob"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td class='action-icons'>
                            <a href='edit.php?id=" . $row["id"] . "'><i class='fas fa-edit'></i></a>
                            <a href='delete.php?id=" . $row["id"] . "'><i class='fas fa-trash-alt'></i></a>
                          </td>";
                    echo "</tr>";
                    $serialNumber++;
                }
            } else {
                echo "<tr><td colspan='9'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
