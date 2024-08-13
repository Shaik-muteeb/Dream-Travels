<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// servername => localhost
// username => root
// password => empty
// database name => staff
$conn = mysqli_connect("localhost", "root", "", "test");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}


$email = $_REQUEST['remail'];
$password = $_REQUEST['rpassword'];
                
$query1 = "SELECT * from user where email='$email'";
if (mysqli_num_rows(mysqli_query($conn, $query1)) == 1) {
    $query = "UPDATE user SET password='$password' where email='$email'";
    if(mysqli_query($conn, $query)){
        echo '<script>alert("Password Changed Successfully!");
        window.location.href="login.html"</script>';
    }
    
    else {
        echo '<script>alert("Unable to change password. Try again!");
    window.location.href="login.html"</script>';
    }
} else {
    echo '<script>alert("No such user exists!");
    window.location.href="login.html"</script>';
}




// Close connection
mysqli_close($conn);

?>

</body>
</html>