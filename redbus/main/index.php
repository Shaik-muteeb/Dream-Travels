<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Bus Travels, AC Volvo Bus - Dream Travels</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="SignupLogin.css">
    <link rel="stylesheet" href="landingPage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a href="index.php"><img src="brand.jpg" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="../bus/help.php">Help</a>
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
                    <button class="logout-btn" type="submit" onclick="logOut()">Log out</button></li>

                    <li><a class="dropdown-item" href="../bus/PageMytrip.php">My Trips</a></li>
                    <li><a class="dropdown-item" href="../bus/PageWalletAndCard.php">Wallet/Card</a></li>
                    <li><a class="dropdown-item" href="../bus/PageCancelTicket.php">Cancel Ticket</a></li>
                    <li><a class="dropdown-item" href="../bus/emailsms.php">Email Ticket</a></li>
                  </ul>';
            }
            else{
                echo'<ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="login/login.html">Login/signup</a></li>
                    <li><a class="dropdown-item" href="../bus/emailsms.php">Email Ticket</a></li>
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
          .logout-btn{
            margin-top:5px;
            margin-bottom:5px;
          }
          .hh{
            margin-left: 300px;
          }
          .input-search-container{
            margin-left: 200px;
          }
      </style>
</head>
<body>
    <div class="position-relative">
        <div>
            <div class="home-banner"></div>
        </div>
        <div class="hh">
            <h1 class="text-center">Your safe journey is our main goal..!</h1>
        </div>
        <div class="input-search-container">
            <form class="d-flex justify-content-center" action="../bus/availabilty_nd_booking.php" method="post">
                <div class="d-inline-block position-relative">
                    
                    <label class="inputLabel-default" for="input-label-from"></label>
                    <span class="inputIcon"><i class="far fa-building"></i></span>
                    <input name="fromcity" id="input-label-from" class="inputForm" type="text" list="input-from-list" placeholder=" From" required>
                    <datalist id="input-from-list">
                        <?php
                            $query = "SELECT DISTINCT fromcity FROM `bus`";
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='".$row['fromcity']."'>";
                                }
                                ?>
                    </datalist>
                </div>
      
                <div class="d-inline-block position-relative">
                    <span class="inputIcon"><i class="far fa-building"></i></span>
                    <label class="inputLabel-default" for="input-label-to"></label>
                    <input name="tocity" id="input-label-to" class="inputForm" type="text" list="input-to-list" placeholder=" To" required>
                    <datalist id="input-to-list">
                    <?php
                            $query = "SELECT DISTINCT tocity FROM `bus`";
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='".$row['tocity']."'>";
                                }
                                ?>
                    </datalist>
                </div>
      
                <div class="d-inline-block position-relative">
                    <span class="inputIcon"><i class="fas fa-calendar-alt"></i></span>
                    <label class="inputLabel-default" for="input-label-onward-date"></label>
                    <input id="input-label-onward-date" name="date" class="inputForm" type="date" min="" max="2030-12-31" placeholder="Onward-Date" required>
                </div>
      
      
                <div class="d-inline-block position-relative">
                    <input class="btn btn-danger rounded-5 pl-3 pr-3 pb-2" type="submit" name="button" value="Search Buses">
                </div>
            </form>
        </div>
    </div>

    <!-- banner  -->
    <div id="poster_container">
        

    </div>
    <!-- main-div1 -->
    <!-- main-div2 -->

<div class="back">
    <div class="main-div2">
       
        <div class="div2-inner ">
            <div class="contant">
             <p id="heading">CONVENIENCE ON-THE-GO.</p>
             <p id="contant">
                Enjoy the following exclusive features on the Dream Travels <br><br>
            Last Minute Booking - In a hurry to book a bus at the last minute? Choose the bus passing from your nearest boarding point and book in a few easy steps. <br><br>
            Boarding Point Navigation - Never lose your way while travelling to your boarding point! <br><br>
            Comprehensive Ticket Details- Everything that you need to make the travel hassle free - rest stop details, boarding point images, chat with co-passengers, wake-up alarm and much more! <br><br>
            Enter your mobile number below to download the Dream Travels mobile app.
             </p>

             <div class="input-div">
                <div class="input">
                    
                </div>
                
             </div>
            </div>
            <div>
                <img src="https://s1.rdbuz.com/web/images/home/IOS_Android_device.png" alt="">
            </div>
        </div>
    </div>
<img src="" alt="" id="img">
</div>
   


       <!------- main-div3 ------>

       <div class="main-div3">
        <div class="div3-inner animate">
                <img src="https://s1.rdbuz.com/web/images/home/promise.png" alt="">
                <p>WE PROMISE TO DELIVER</p>
            <div class="benifit-service">
                <div>
                    <img src="https://s2.rdbuz.com/web/images/home/benefits.png" alt="">
                    <p>UNMATCHED BENEFITS</p>
                    <p>
                        We take care of your travel beyond ticketing by <br> providing you with innovative and unique <br> benefits.
                    </p>
                </div>
                <div>
                    <img src="https://s1.rdbuz.com/web/images/home/customer_care.png" alt="">
                    <p>CUSTOMER  SERVICE</p>
                    <p>
                        We put our experience and relationships to <br> good use and are available to solve your travel <br> issues.
                    </p>
                </div>
                <div>
                    <img src="https://s1.rdbuz.com/web/images/home/lowest_Fare.png" alt="">
                    <p>LOWEST PRICES</p>
                    <p>
                        We always give you the lowest price with the <br> best partner offers.
                    </p>
                </div>
            </div>
            
        </div>
       </div>



       <!-------- Award recogination div ----------->

    
    

    

    <!--------------- India flag div ----------------->


    




    <!--------- THE NUMBERS ARE GROWING! div ------------>

    <div class="main-div6">
        <p class="p-tag">THE NUMBERS ARE GROWING!</p>
        <div class="div6Inner animate">
           
            <div>
                <p >CUSTOMERS</p>
                <p class="red-tag">36 M</p>
                <p>
                  Dream Travels is trusted by over 36 <br> million happy customers <br> globally
                </p>
            </div>
            <div>
                <p>OPERATORS</p>
                <p class="red-tag">3500</p>
                <p>
                    network of over 3500 bus <br> operators worldwide
                </p>
            </div>
            <div>
                <p>BUS TICKETS</p>
                <p class="red-tag">220+ M</p>
                <p>
                    Over 220 million trips <br> booked using Dream Travels
                </p>
            </div>
        </div>
    </div>


    <!-------- bus route and all city div  --------->


   <!--<div class="main-div7">
        <div class="div7-inner animate">
            <div>
                <ul style="list-style-type:none">
                    <li class="ul-li-heading">Top Bus Route</li>
                    <li>Hyderabad to Bangalore Bus</li>
                    <li>Bangalore to Chennai Bus</li>
                    <li>Pune to Bangalore Bus</li>
                    <li>Mumbai to Bangalore Bus</li>
                    <li>More ></li>
                </ul>
            </div>
            <div>
                <ul style="list-style-type:none">
                    <li class="ul-li-heading">Top Cities</li>
                    <li>Hyderabad Bus Tickets</li>
                    <li>Banglore Bus Service</li>
                    <li>Chennai bus Tickets</li>
                    <li>Pune Bus Tickets</li>
                    <li>More ></li>
                </ul>
            </div>
            <div>
                <ul style="list-style-type:none">
                    <li class="ul-li-heading">Top RTC's</li>
                    <li>APSRTC</li>
                    <li>GSRTC</li>
                    <li>MSRTC</li>
                    <li>TNSTC</li>
                    <li>More ></li>
                </ul>
            </div>
            <div>
                <ul style="list-style-type:none">
                    <li class="ul-li-heading">Other</li>
                    <li>TSRTC</li>
                    <li>SBRTC</li>
                    <li>RSRTC</li>
                    <li>KeralaRTC</li>
                    <li>More ></li>
                </ul>
            </div>
            <div>
                <ul style="list-style-type:none">
                    <li class="ul-li-heading">Tempo Traveller in Cities</li>
                    <li>Tempo traveller in Bangalore</li>
                    <li>Tempo traveller in chennai</li>
                    <li>Tempo traveller in Hyderabad</li>
                    <li>Tempo traveller in Mumbai</li>
                    <li>Tempo traveller in Ahmedabad</li>
                </ul>
                
            </div>
         </div>
      
<hr>
         <div class="top-oprator animate">
            <p>Top Operator</p>
            <p>SRS Travels  | Kallada Travels | KPN Travels | Orang Travels | Praveen Travels | Rajadhani Travels | VRL Travels |  Chrtered  Bus | Bengal Tiger | <br>
                SRM Travels | Infant Jesus | Patel Travels | JBT travels | Shatabdi Travels | Egal Travels | Kanker Roadwars | Komitla | Sri Krishna travels | <br> Humsafar Travels |  Mahasagar Travels | Raj  Express | Sharma Travels | Shrinath Travels | Universal Travels | Verma Travels | Gujrat Travels | <br> Madurai Travels | Patel Tour And Travels | Paulo Travels | Royal Travels | Amarnath Travels | Vaibhav Travels |  Ganesh Travels | Jabbar Travels | <br> Jain Travels |  Manish Travels |  Pradhan Travels | YBM Travels | Hebron Transport |  Mahalaxmi Travels | MR Travels | <br>  Vivegam travels | VST Travels | Jaksha Travels | Mahendra Travels | Neeta Tours And Travels | Yamini Travels | Arthi Travels</p>
                <p>All Operator ></p>
         </div>
    </div>-->


<!------------ main page fooder div ------------>
<div class="main-div8">
    <div class="div8-inner">
        <div>
        <ul>
            <li class="ul-li-head">About Dream Travels</li>
            <li>About Us</li>
            <li>Contact Us</li>
            
        </ul>

        </div>
        <div>
            <ul>
                <li class="ul-li-head">Info</li>
                <li>T & C</li>
                <li>Privacy Policy</li>
                <li>FAQ</li>
                <li>Blog</li>
                
            </ul>
        </div>
        
        <div>
            <ul>
                <li class="ul-li-head">Our Partener</li>
                <li>VTS</li>
                
            </ul>
        </div>
        <div class="red-bus">
            <img src="brand.jpg" alt="" height="50px" width="140px">
            <p>Dream Travels is the world's largest online bus ticket booking service trusted by over 25 million happy customers globally. We offers bus ticket booking through its website,iOS and Android mobile apps for all major routes.</p>
            
        </div>
    </div>
</div>

<script src="index.js">
    

</script>
<script src="homePage.js" type="module"></script>
<script src="SignupLogin.js" ></script>
<script src="lsndingPage.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="test.js"></script>
  <script>
    const currentDate = new Date();
    const formattedDate = currentDate.toISOString().slice(0,10);
    // alert(formattedDate);
    document.getElementById("input-label-onward-date").min=formattedDate;
</script>
<script>
    function logOut() {
      var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Redirect to login page or show a message
                    window.location.href = "index.php"; // Replace with your login page URL
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
