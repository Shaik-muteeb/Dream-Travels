<?php
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Example of fetching user-specific data from session or database
$adminName = "Admin"; // Replace with actual admin name fetched from session or database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('background.jpg'); /* Replace with your background image path */
            background-size: cover;
            background-position: center;
            color: #333;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
            padding-top: 20px;
        }

        header img {
            width: 150px; /* Adjust the logo size as needed */
            height: auto;
        }

        .btn-container {
            text-align: center;
            margin-top: 50px;
        }

        .btn-container button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 18px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .btn-container button:hover {
            background-color: #45a049;
        }

        .logout {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <img src="logo.png" alt="Company Logo"> <!-- Replace with your logo image path -->
            <h1>Welcome, <?php echo htmlspecialchars($adminName); ?>!</h1>
        </header>

        <div class="btn-container">
            <button onclick="location.href='userlist.php'">User List</button>
            <button onclick="location.href='booking.php'">Booking</button>
            <button onclick="location.href='bus_list.php'">Bus List</button>
        </div>
    </div>

    <form action="logout.php" method="post" class="logout">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
