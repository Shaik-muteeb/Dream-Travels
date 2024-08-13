<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Booking Chatbot</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="SignupLogin.css">
    <link rel="stylesheet" href="landingPage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a href="../main/index.php"><img src="brand.jpg" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="help.php">Help</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Account
                </a>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "test");
                // Check connection
                if($conn === false){
                    die("ERROR: Could not connect. " 
                        . mysqli_connect_error());
                }
            session_start();
            if (isset($_SESSION['username'])) {
                echo'
                <ul class="dropdown-menu">

                    <li><h6>Profile</h6>
                    <li class="logout-btn">Welcome '.$_SESSION["username"].'!!</li>
                    <li class="logout-btn">'.$_SESSION["email"].'</li>
                    <button class="logout-btn" type="submit" onclick="logOut()">Log out</button></li><br>
                    <li><a class="dropdown-item" href="PageMytrip.php">My Trips</a></li>
                    <li><a class="dropdown-item" href="PageWalletAndCard.php">Wallet/Card</a></li>
                    <li><a class="dropdown-item" href="PageCancelTicket.php">Cancel Ticket</a></li>
                    <li><a class="dropdown-item" href="emailsms.php">Email Ticket</a></li>
                  </ul>';
            }
            else{
                echo'<ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../main/login/login.html">Login/signup</a></li>
                    <li><a class="dropdown-item" href="emailsms.php">Email Ticket</a></li>
                  </ul>';
            }
            ?>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
      <style>
         nav{
              background-color: crimson;
              display: flex;
              flex-direction: row-reverse;
              justify-content: space-evenly;
          }
          nav ul li a{
              color: white;
          }
          .container-fluid img{
            width: 150px;
          }
          .nav-item {
            color: white;
            margin-left: 50px;
          }
          .nav-link  {
            color: white;
          }
          a.nav-link.active {
            color: white;
          }
          
      </style>
</head>
<body>
    <div class="chat-container">
      <div class="img">
        <img src="chatbot.jpg" alt="Chatbot image" width="700px" height="540px">
    </div>
        
        <div class="chat-box" id="chatBox">
        <h4>Dream Travels : Buddy</h4>
          <p>Have a query related to your bookings or any other concerns?</p>
      
            <div class="chat-message bot">Hello! How can I assist you with your bus booking today?</div>
        </div>
        <input type="text" id="userInput" placeholder="Type a message..." onkeydown="if(event.key === 'Enter') sendMessage()">
        <button class="send" onclick="sendMessage()">Send</button>
    </div>

    
    <script src="homePage.js" type="module"></script>
<script src="SignupLogin.js" ></script>
<script src="lsndingPage.js"></script>
    <script src="js.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="test.js"></script>
  <script>
    function logOut() {
      var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Redirect to login page or show a message
                    window.location.href = "../main/index.php"; // Replace with your login page URL
                }
            };
            xhr.send("action=logout");
        
        // $_SESSION['username'] = NULL;
        // session_destroy();
       
        
        //  window.location.href="index.php";
    }
</script>

<?php
    // Check if the request method is POST and the action is 'logout'
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'logout') {
        session_start();

        // Unset all session variables
        $_SESSION = array();

        // Finally, destroy the session.
        session_destroy();

        // Optionally, you can echo a message or handle other logic
        echo "Logged out successfully";
        exit; // Ensure no further processing is done
    }
    ?>
</body>
</html>