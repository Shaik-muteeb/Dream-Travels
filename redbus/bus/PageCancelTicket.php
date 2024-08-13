<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel-Ticket</title>
    <link rel="stylesheet" href="MangingSection.css">
    <link rel="stylesheet" href="SignupLogin.css">
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
                <a class="nav-link " aria-current="page" href="help.php">Help</a>
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
                    <li><p>Welcome '.$_SESSION["username"].'!!</p></li>
                    <li><p>'.$_SESSION["email"].'</p></li>
                    <button class="logout-btn" type="submit" onclick="logOut()">Log out</button></li>

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
    <style>
        body {
            overflow-x: hidden;
            margin: 0px;
            padding: 0px;
            font: 100% Helvetica, sans-serif;
            height: 100%;
            /* font-family: Montserrat; */
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        #root {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            flex-direction: column;
            margin-top: 30px;
            margin-bottom: 20px;
            padding: 20px;
        }

        .cancelfromMain{
            width: 100%;
            display: block;
            margin: auto;
            color: #000;

        }

        .bold {
            font-weight: bold;
        }

        .center {
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        #ticket_container {
            margin-bottom: 100px;
            display: flex;
            justify-content: center;
        }

        #ticketCard {
            padding: 9px 20px;
            border: 1px solid rgb(219, 212, 212);
            border-radius: 12px;
            background-color: rgb(244, 250, 250);
            box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
            width: 45%;
        }

        #ticketCard>* {
            margin-top: -5px;
        }

        #ticketCancel_btn {
            background-color: rgb(207, 0, 0);
            color: white;
            padding: 7px 5px;
            border-radius: 6px;
            cursor: pointer;
        }

        #ticketCancel_btn:hover {
            background-color: crimson;
        }
        .cancel-container{
                width: 100%;
                margin: auto;
            }

        @media screen and (max-width : 869px) {
            .cancel-container{
                width: 100%;
            }
        }
        .logout-btn{
            margin-bottom: 7px;
        }
 
    </style>
</head>

<body>
    
    <div id="root">
        <div class="cancelfromMain">
            <h2>CANCEL TICKET</h2><br>
            <h4>Enter PNR to cancel your ticket!!</h4><br>
            <div class="cancel-container">
                <form action="cancelTicket.php" method="post">
                <input name="pnr" id="cancel-input" class="ticket_no" type="text" value="" placeholder="Enter your ticket number" required> 
                <button id="cancel-button" class="search_btn">Cancel</button>
                </form>
            </div>
        </div>
    </div>

    <div id="ticket_container">
        <!-- Ticket will show here  -->
    </div>

    <!-- <d id="footer">  </d iv> -->

    <script type="module" src="Pages.js"></script>
    <script type="module" src="PageCancelTicket.js"></script>
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