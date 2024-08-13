<!-- confirm_booking.php -->
<?php
session_start();
// include 'db_connection.php'; 
$conn = mysqli_connect("localhost", "root", "", "test");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}// Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['email'])){
    // Retrieve form data
    // $user_id = $_SESSION['user_id']; // Assuming user is logged in and user ID is stored in session
    $user_id = $_SESSION['email']; // Assuming user is logged in and user ID
    $selected_bus = $_POST['selected_bus'];
    $selected_seat = $_POST['selected_seat'];
    $boarding_point = $_POST['boarding'];
    $dropping_point = $_POST['dropping'];

    $sql = "SELECT u.name, b.date, b.fromcity, b.tocity, b.fare 
        FROM user u 
        JOIN bus b ON b.busnumber = '$selected_bus'
        WHERE u.email = '$user_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Fetch the result
        $row = $result->fetch_assoc();
        //print row
        // echo "Name: " . $row["name"]. "<br>";
        $name = $row['name'];
        $date = $row['date'];
        $fromcity = $row['fromcity'];
        $tocity = $row['tocity'];
        $fare = $row['fare'];
    
        // Generate a 6-digit PNR
        $pnr = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
    
        // Insert into BOOKING
        $insert_sql = "INSERT INTO booking VALUES ('$pnr', NOW(),'$user_id', '$name', '$date', '$selected_bus', '$selected_seat' ,'$fromcity', '$boarding_point', '$tocity', '$dropping_point','$fare')";
    
        if ($conn->query($insert_sql) === TRUE) {
            // echo '<script>window.location.href="booking_confirmation.php?pnr='.$pnr'";</script>';
            echo '<script>window.location.href="booking_confirmation.php?pnr='.$pnr.'";</script>';


        } else {
            echo "<script>alert('Unable to book, please try again!');</script>";
        }
        }  else {
        echo "<script>alert('User or bus details not found!');</script>";
        }
    }
    else{
        echo "<script>alert('Please login to book!!');
        window.location.href='../main/index.php';</script>";
        }
    
            
    exit;
    }
      
?>







