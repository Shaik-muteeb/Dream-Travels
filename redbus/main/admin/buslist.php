<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve buses
$sql = "SELECT * FROM bus";
$result = $conn->query($sql);

$buses = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $buses[] = $row;
    }
}

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_bus'])) {
    $busId = $_POST['delete_bus'];
    // Perform delete operation securely, here's a basic example
    $sql = "DELETE FROM bus WHERE busnumber = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $busId);
    if ($stmt->execute()) {
        // Delete successful, refresh page or handle as needed
        header("Location: buslist.php");
        exit;
    } else {
        echo "Error deleting bus: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus List</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 3px;
        }

        .delete-btn:hover {
            background-color: #cc0000;
        }
        .back-btn{
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 3px;
            float: right;
            margin-right:10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Bus List</h1>
            <button type="button" onclick="window.location.href='admin.php'" class="back-btn">Back</button><br><br>
        </header>
        <main>
            <table id="busTable">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Bus Name</th>
                        <th>Bus Number</th>
                        <th>Bus Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Rating</th>
                        <th>Fare</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($buses as $bus): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($bus['date']); ?></td>
                            <td><?php echo htmlspecialchars($bus['name']); ?></td>
                            <td><?php echo htmlspecialchars($bus['busnumber']); ?></td>
                            <td><?php echo htmlspecialchars($bus['bustype']); ?></td>
                            <td><?php echo htmlspecialchars($bus['fromcity']); ?></td>
                            <td><?php echo htmlspecialchars($bus['tocity']); ?></td>
                            <td><?php echo htmlspecialchars($bus['departure']); ?></td>
                            <td><?php echo htmlspecialchars($bus['arrival']); ?></td>
                            <td><?php echo htmlspecialchars($bus['rating']); ?></td>
                            <td><?php echo htmlspecialchars($bus['fare']); ?></td>
                            <td>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <input type="hidden" name="delete_bus" value="<?php echo $bus['busnumber']; ?>">
                                    <button type="submit" class="delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>
