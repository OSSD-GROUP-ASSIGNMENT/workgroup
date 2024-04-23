<?php
include 'database.php';

// Check if ID is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Check if form is submitted for deletion
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_delete'])) {
        // Delete student record based on ID
        $sql = "DELETE FROM student WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if($stmt->execute()) {
            header("Location: view.php");
            exit();
        } else {
            echo "Error deleting student record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Display confirmation message
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Delete Student</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                }

                .container {
                    max-width: 600px;
                    margin: 50px auto;
                    background-color: #fff;
                    border-radius: 10px;
                    padding: 30px;
                    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                    text-align: center;
                }

                h2 {
                    margin-bottom: 20px;
                }

                form {
                    display: inline-block;
                }

                input[type="submit"] {
                    padding: 10px 20px;
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
            <h2>Do you want to delete this student record?</h2>
            <form method="POST">
                <input type="submit" name="confirm_delete" value="Yes, Delete">
            </form>
            <a href="view.php">No, Cancel</a>
        </div>

        </body>
        </html>
        <?php
    }
} else {
    echo "ID not provided.";
}

$conn->close();
?>
