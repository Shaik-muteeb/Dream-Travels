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


$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
                
$query1 = "SELECT * from user where email='$email'";
if (mysqli_num_rows(mysqli_query($conn, $query1)) == 0) {
    $query = "INSERT INTO user VALUES ('$username', '$email','$password')";
    if(mysqli_query($conn, $query)){
        echo '<script>alert("Registered Successfully!!");
        window.location.href="login.html"</script>';
    }
    
    else {
        echo '<script>alert("Unable to register. Try again!");
    window.location.href="login.html"</script>';
    }
} else {
    echo '<script>alert("E-Mail already exists! Try another one!"); 
    window.location.href="login.html"</script>';
}

// Close connection
mysqli_close($conn);

?>

</body>
</html>