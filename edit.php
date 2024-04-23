<?php
include 'database.php';

// Check if ID is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve student data based on ID
    $sql = "SELECT * FROM student WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display form with student data for editing
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Check if form is submitted for updating
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Update student data in the database
            $update_sql = "UPDATE student SET firstName=?, lastName=?, email=?, phone=?, gender=?, dob=?, address=? WHERE id=?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("sssssssi", $_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["phone"], $_POST["gender"], $_POST["dob"], $_POST["address"], $id);

            if ($update_stmt->execute()) {
                // Redirect back to view.php after successful update
                header("Location: view.php");
                exit();
            } else {
                echo "Error updating record: " . $update_stmt->error;
            }
        }

        // Display form with data for editing
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Student Information</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                }

                .container {
                    max-width: 600px;
                    margin: 50px auto;
                    background-color: #fff;
                    border-radius: 10px;
                    padding: 30px;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                }

                h2 {
                    text-align: center;
                    margin-bottom: 30px;
                }

                form {
                    display: grid;
                    gap: 20px;
                }

                label {
                    font-weight: bold;
                }

                input[type="text"],
                input[type="email"],
                input[type="tel"],
                select,
                textarea {
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    box-sizing: border-box;
                }

                select {
                    height: 40px;
                }

                textarea {
                    resize: vertical;
                }

                input[type="submit"] {
                    width: 100%;
                    padding: 12px;
                    border: none;
                    border-radius: 5px;
                    background-color: #007bff;
                    color: #fff;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }

                input[type="submit"]:hover {
                    background-color: #0056b3;
                }
            </style>
        </head>
        <body>

        <div class="container">
            <h2>Edit Student Information</h2>
            <form method="POST">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" value="<?php echo $row['firstName']; ?>" required>

                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" value="<?php echo $row['lastName']; ?>" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="male" <?php if ($row['gender'] == 'male') echo 'selected'; ?>>Male</option>
                    <option value="female" <?php if ($row['gender'] == 'female') echo 'selected'; ?>>Female</option>
                    <option value="other" <?php if ($row['gender'] == 'other') echo 'selected'; ?>>Other</option>
                </select>

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>" required>

                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="4" required><?php echo $row['address']; ?></textarea>

                <input type="submit" value="Update">
            </form>
        </div>

        </body>
        </html>
        <?php
    } else {
        echo "Student not found.";
    }
} else {
    echo "ID not provided.";
}

$stmt->close();
$conn->close();
?>
