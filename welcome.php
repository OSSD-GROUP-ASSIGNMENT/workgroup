<?php
// Start the session
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION["email"])) {
    header("location: login.php");
    exit();
}

// Retrieve the user's email from the session
$email = $_SESSION["email"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .welcome {
            text-align: center;
            margin-bottom: 20px;
        }

        .dashboard {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .dashboard-item {
            width: 200px;
            height: 150px;
            margin: 10px;
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .dashboard-item:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome">
            <h2>Welcome <?php echo $email; ?> to the Dashboard</h2>
        </div>
        <div class="dashboard">
            <div class="dashboard-item">
                <h3>Profile</h3>
                <p>View and edit your profile</p>
                <a href="profile.php" style="color: #fff; text-decoration: none;">Go to Profile</a>
            </div>
            <div class="dashboard-item">
                <h3>Settings</h3>
                <p>Change your account settings</p>
                <a href="settings.php" style="color: #fff; text-decoration: none;">Go to Settings</a>
            </div>
            <div class="dashboard-item">
                <h3>Logout</h3>
                <p>Logout from your account</p>
                <a href="logout.php" style="color: #fff; text-decoration: none;">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
