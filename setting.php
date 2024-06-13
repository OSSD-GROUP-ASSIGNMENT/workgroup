<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Settings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .light-theme {
            background-color: #f4f4f4;
            color: #333;
        }

        .dark-theme {
            background-color: #333;
            color: #f4f4f4;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* Toggle button styles */
        #theme-toggle {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Styles for on state */
        #theme-toggle.on {
            background-color: #28a745;
        }

        /* Styles for off state */
        #theme-toggle.off {
            background-color: #dc3545;
        }
    </style>
</head>
<body class="light-theme">
    <h2 style="text-align: center;">User Settings</h2>
    <form action="update_settings.php" method="POST">
        <!-- Your form inputs here -->
        <input type="submit" value="Save Changes">
    </form>

    <!-- Toggle theme button -->
    <button id="theme-toggle" class="off">Dark Mode</button>

    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const body = document.body;

        themeToggleBtn.addEventListener('click', () => {
            body.classList.toggle('dark-theme');
            themeToggleBtn.classList.toggle('on');
            themeToggleBtn.classList.toggle('off');
            if (themeToggleBtn.classList.contains('on')) {
                themeToggleBtn.textContent = 'Light Mode';
            } else {
                themeToggleBtn.textContent = 'Dark Mode';
            }
        });
    </script>
</body>
</html>
