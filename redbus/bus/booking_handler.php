<?php
$conn = new mysqli("localhost","root", "", "test");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    $pnr = $_POST['pnr'];

    if ($action == "proceed") {
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = "INSERT INTO passengerdetails VALUES ('$pnr', '$name', '$gender', $age, '$email', $phone)";

        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('Payment success!'); window.location.href='../main/index.php'; window.open('http://localhost/redbus/muteeb/bus/payment.html','_blank');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($action == "cancel") {
        $sql = "DELETE FROM booking WHERE pnr='$pnr'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Booking cancelled!'); window.location.href='../main/index.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
