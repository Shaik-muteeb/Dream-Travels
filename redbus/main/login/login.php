<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >
<?php
session_start();
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


$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
                

$query = "SELECT * from user where email='$email' AND password='$password'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    if ($user['name'] == 'admin' AND $user['email'] == 'admin@gmail.com'){
        echo '<script>alert("Admin login successful!");
window.location.href="../admin/admin.php"</script>';
    }
    else{
        $_SESSION['username'] = $user['name'];
        $_SESSION['email'] = $user['email'];
    //  echo $_SESSION['username'];
        echo '<script>alert("Login successful!");
    window.location.href="../index.php"</script>';
    }
   
} else {
    echo '<script>alert("Invalid username or password. Try again!");
window.location.href="login.html"</script>';
}

// Close connection
mysqli_close($conn);

?>

</body>
</html>