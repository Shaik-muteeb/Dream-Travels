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

// Handle deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM booking WHERE pnr = $delete_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: viewbooking.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Retrieve bookings
$sql = "SELECT * FROM booking";
$result = $conn->query($sql);

$bookings = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bookings[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            /* padding: 0; */
            /* display: flex; */
            justify-content: center;
            /* align-items: center; */
            /* min-height: 100vh; */
            text-align:center;
        }

        .container {
            width: 90%;
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

        button.delete {
            color: #fff;
            background-color: #e74c3c;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        button.delete:hover {
            background-color: #c0392b;
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
        <h1>View Bookings</h1>
        <button type="button" onclick="window.location.href='admin.php'" class="back-btn">Back</button><br><br>
        </header>
        <table id="bookingTable">
            <thead>
                <tr>
                    <th>PNR</th>
                    <th>Booking Date</th>
                    <th>User Email</th>
                    <th>User Name</th>
                    <th>Date</th>
                    <th>Bus Number</th>
                    <th>Seat</th>
                    <th>From City</th>
                    <th>Boarding Point</th>
                    <th>To City</th>
                    <th>Dropping Point</th>
                    <th>Fare</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($booking['pnr']); ?></td>
                        <td><?php echo htmlspecialchars($booking['bookingdate']); ?></td>
                        <td><?php echo htmlspecialchars($booking['useremail']); ?></td>
                        <td><?php echo htmlspecialchars($booking['username']); ?></td>
                        <td><?php echo htmlspecialchars($booking['date']); ?></td>
                        <td><?php echo htmlspecialchars($booking['busnumber']); ?></td>
                        <td><?php echo htmlspecialchars($booking['seat']); ?></td>
                        <td><?php echo htmlspecialchars($booking['fromcity']); ?></td>
                        <td><?php echo htmlspecialchars($booking['boardingpoint']); ?></td>
                        <td><?php echo htmlspecialchars($booking['tocity']); ?></td>
                        <td><?php echo htmlspecialchars($booking['droppingpoint']); ?></td>
                        <td><?php echo htmlspecialchars($booking['fare']); ?></td>
                        <td>
                            <form method="post" action="" onsubmit="return confirmDelete()">
                                <input type="hidden" name="delete_id" value="<?php echo $booking['pnr']; ?>">
                                <button type="submit" class="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this booking?");
        }
    </script>
</body>
</html>
