<?php
// Database configuration
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fromcity = $_POST['fromcity'];
    $tocity = $_POST['tocity'];
    $date = $_POST['date'];
    $name = $_POST['name'];
    $busnumber = $_POST['busnumber'];
    $bustype = $_POST['bustype'];
    $departure = $_POST['departure'];
    $duration = $_POST['duration'];
    $arrival = $_POST['arrival'];
    $rating = $_POST['rating'];
    $fare = $_POST['fare'];
    $boardingpoint1 = $_POST['boardingpoint1'];
    $boardingtime1 = $_POST['boardingtime1'];
    $boardingpoint2 = $_POST['boardingpoint2'];
    $boardingtime2 = $_POST['boardingtime2'];
    $droppingpoint1 = $_POST['droppingpoint1'];
    $droppingtime1 = $_POST['droppingtime1'];
    $droppingpoint2 = $_POST['droppingpoint2'];
    $droppingtime2 = $_POST['droppingtime2'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO bus VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssiissssssss", $fromcity, $tocity, $date, $name, $busnumber, $bustype, $departure, $duration, $arrival, $rating, $fare, $boardingpoint1, $boardingtime1, $boardingpoint2, $boardingtime2, $droppingpoint1, $droppingtime1, $droppingpoint2, $droppingtime2);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "<script>window.location.href='admin.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
