<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['email']) && isset($_POST['pnr'])) {
        $user=$_SESSION["email"];
        $pnr=$_REQUEST["pnr"];

        $conn = mysqli_connect("localhost", "root", "", "test");
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
        

        // Construct the SQL query without using prepared statements
        $sql = "DELETE FROM booking WHERE useremail='$user' AND pnr='$pnr'";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            if ($conn->affected_rows > 0) {
                echo "<script>alert('Ticket with PNR number " . htmlspecialchars($pnr) . " has been successfully cancelled.');
                window.location.href='PageCancelTicket.php'</script>";
            } else {
                echo "<script>alert('No matching record found for the PNR number " . htmlspecialchars($pnr) . " and user " . htmlspecialchars($user) . "');
                 window.location.href='PageCancelTicket.php'</script>";
            }
        } else {
            echo "Error: " . $conn->error;
        }

        // Close connection
        $conn->close();
    } else {
        echo "User is not logged in or PNR number is missing.";
    }
} else {
    echo "Invalid request method.";
}

?>



