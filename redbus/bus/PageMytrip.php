<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyTrips</title>
    <link rel="stylesheet" href="leftpanel.css" />
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
                  <li><a class="dropdown-item" href="login/login.html">Login/signup</a></li>
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
    #ticketCard {
            padding: 9px 20px;
        border: 1px solid rgb(219, 212, 212);
        border-radius: 12px;
        background-color: rgb(244, 250, 250);
        box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
            width: 100%;
        }
      #ticketCard > * {
        margin-top: -5px;
      }

      #cancel-button {
        /* display: block;
            margin-top: 200px; */
        position: relative;
      }
      .trips_det {
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin: auto;
        width: 80%;
        /* jecndinefndh */
        padding: 5%;
        gap: 10px;
      }
        #header{
            width: 100vw;
        }

        #root {
            display: flex;
            justify-content: center;
            width: 100%;
            flex-direction: column;
        }

        .bold {
            font-weight: bold;
        }

        .center {
            text-align: center;
        }

        .row {
            display: flex;
            justify-content:  space-between;
        }

        #ticket_container {
         /* background-color: antiquewhite; */
            margin-bottom: 500px;
            display: flex;
            justify-content: center;
        }
        @media screen and (max-width : 869px) {
            .leftNav {
                display: none;
            }

            #headerBlock {
                justify-content: center;
                align-items: center;
            }

        }
        .section {
            margin-left: 10px;
            padding-top: 20px;
            
        }
        
        .title {
            font-weight: bold;
            font-size: 25px;
            padding-bottom: 10px;
            
        }
        .value {
            text-align: right;
            font-size: 19px;
        }
        .info {
            display: flex;
            justify-content: space-between;
            margin-right: 30px;
        }
        span.greyText{
          text-align:center;
        } 
        h3 {
            text-align: center;
            font-size: 20px;
        }
        p{
          font-size: 15px;
        }
        .t {
            padding-left: 20px;
            font-size: 19px;
          }
          .p1{
          overflow:auto;
          height: 260px;
          width:1100px;
        }
          .r1{
            margin-top:-150px;
          }
          .logout-btn{
            margin-bottom: 7px;
          }
    </style>
  </head>
  <body>
    
    <div class="r">
      <span class="greyText">My Trips</span>
      <div class="p1">
          <div class="section">
              <div class="title">Completed</div>
              <?php
                $conn = mysqli_connect("localhost", "root", "", "test");
                // Check connection
                if($conn === false){
                    die("ERROR: Could not connect. " 
                        . mysqli_connect_error());
                }
            
                $user=$_SESSION["email"];
                $sql = "SELECT * FROM booking WHERE useremail='$user' and date<CURRENT_DATE";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                          echo '<div class="info">
                                    <span class="t">'.$row["date"].'</span>
                                    <span class="t">PNR : '.$row["pnr"].'</span>
                                    <span class="t">Bus Number : '.$row["busnumber"].'</span>
                                    <span class="t">Seat : '.$row["seat"].'</span>
                                    <span class="t">'.$row["fromcity"].' -> '.$row["tocity"].'</span>
                                    <span class="t">Rs. '.$row["fare"].'</span>
                                </div><br>';
                  }
                }
                else{
                  echo '<h3>No Past Trips!!<h3>';
                }
            ?>
          </div>
      </div>

  </div>
  <div class="r1">

      <div class="p1">
          <div class="section">
              <div class="title">Upcomming</div>
              <?php
                $conn = mysqli_connect("localhost", "root", "", "test");
                // Check connection
                if($conn === false){
                    die("ERROR: Could not connect. " 
                        . mysqli_connect_error());
                }
            
                $user=$_SESSION["email"];
                $sql = "SELECT * FROM booking WHERE useremail='$user' and date>=CURRENT_DATE";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                          echo '<div class="info">
                  <span class="t">'.$row["date"].'</span>
                  <span class="t">PNR : '.$row["pnr"].'</span>
                  <span class="t">Bus Number : '.$row["busnumber"].'</span>
                  <span class="t">Seat : '.$row["seat"].'</span>
                  <span class="t">'.$row["fromcity"].'->'.$row["tocity"].'</span>
                  <span class="t">Rs. '.$row["fare"].'</span>
              </div><br>';
                  }
                }
                else{
                  echo '<h3>No Upcoming Trips!!<h3>';
                }
            ?>
          </div>
      </div>

  </div>


    <!-- <div id="footer"></div> -->
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

<script src="./Pages.js" type="module"></script>
<script src="./PageMytrip.js" type="module"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="test.js"></script>
