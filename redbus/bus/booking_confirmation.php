<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>pasenger Details</title>
  <link rel="stylesheet" href="passengerDetails.css" />
  <link rel="stylesheet" href="passenger.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a href="index2.html"><img src="brand.jpg" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
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
                    <li class="logout-btn">Welcome '.$_SESSION["username"].'!!</li>
                    <li class="logout-btn">'.$_SESSION["email"].'</li>
                    <button class="logout-btn" id="logout-button" type="submit" onclick="logOut()">Log out</button></li>

                    <li><a class="dropdown-item" href="PageMytrip.html">My Trips</a></li>
                    <li><a class="dropdown-item" href="PageWalletAndCard.html">Wallet/Card</a></li>
                    <li><a class="dropdown-item" href="PageCancelTicket.html">Cancel Ticket</a></li>
                    <li><a class="dropdown-item" href="emailsms.html">Email Ticket</a></li>
                  </ul>';
            }
            else{
                echo'<ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../main/login/login.html">Login/signup</a></li>
                    <li><a class="dropdown-item" href="emailsms.html">Email Ticket</a></li>
                  </ul>';
            }
            ?>
          
        </li>
        </ul>

      </div>
    </div>
  </nav>
  <style>
    nav {
      background-color: crimson;
      display: flex;
      flex-direction: row-reverse;
      justify-content: space-evenly;
    }

    nav ul li a {
      color: white;
    }

    .container-fluid img {
      width: 150px;
    }

    .nav-item {
      color: white;
      margin-left: 50px;
    }

    .nav-link {
      color: white;
    }

    a.nav-link.active {
      color: white;
    }
    .boarddetails{
      float:right;
      margin-top : -45px;
      margin-right:25px;
    }
    .fromdetails{
      margin-top : 20px;
      margin-left:25px;
    }
    .class1{
      margin-left:25px;
    }
    .heading{
      text-align:center;
    }
    .ticket{
      margin-bottom:-5px;
    }
    #main_container{
      margin-top:5px;
    }
    .logout-btn{
      margin-top:5px;
      margin-bottom:5px;
    }
  </style>
</head>

<body>
  <?php
  $pnr=$_GET['pnr'];
      $conn = mysqli_connect("localhost", "root", "", "test");
  
      // Check connection
      if($conn === false){
          die("ERROR: Could not connect. " 
              . mysqli_connect_error());
      } 
  
      $query="SELECT * FROM BOOKING WHERE pnr='$pnr'";
      $result = mysqli_query($conn, $query);
      $booking = mysqli_fetch_assoc($result);
      // printr($booking);
  echo '<div id="main_container">
    <div id="container">
      <h3 class="heading"> Booking Details </h3>
      <div class="class1">
          <span class="Bus No"><b>Booking Date : </b>'.$booking["bookingdate"].' | <b>PNR : </b>'.$booking["pnr"].' | <b>Journey Date : </b>'.$booking["date"].' | <b>Bus No : </b>'.$booking["busnumber"].' | <b>Seat No : </b>'.$booking["seat"].'</span>
        </div>
        <div class="location">
          <div class="fromdetails">
          <span class="From"><b>Source - </b>'.$booking["fromcity"].'</span><br>
          <span class="to"><b>Destination - </b>'.$booking["tocity"].'</span>
          </div>
          <div class="boarddetails">
          <span class="board"><b>Boarding Point - </b>'.$booking["boardingpoint"].'</span><br>
          <span class="drop"><b>Dropping Point - </b>'.$booking["droppingpoint"].'</span>
          </div>
        </div>

      <form id="bookingForm" action="booking_handler.php" method="post">
    <div class="box1">
        <div class="passenger_details">
            <h4>Passenger Details</h4>
        </div>
        <input type="hidden" name="pnr" value='.$pnr.' required>
        <div class="name">
            <label for="inputName">Name</label>
            <input id="inputName" type="text" name="name" placeholder="Name" />
        </div>

        <div id="box">
            <div>
                <div class="gender">
                    <label for="">Gender</label>
                </div>

                <div class="gender_bottom">
                    <div>
                        <input class="genderName" type="radio" name="gender" value="M" />
                        <label for="genderMale">Male</label>
                    </div>
                    <div>
                        <input class="genderName" type="radio" name="gender" value="F" />
                        <label for="genderFemale">Female</label>
                    </div>
                </div>
            </div>

            <div>
                <div class="age">
                    <label for="input" class="age1">Age</label>
                    <input id="input" type="number" name="age" placeholder="Age"/>
                </div>
            </div>
        </div>

        <div id="contactDetails">
            <span>&nbsp; <b>Contact Details</b></span>
        </div>

        <div id="emailBox">
            <div class="ticket">Your ticket will be sent to this email</div>
            <div class="email">
                <label for="email">Email ID</label>
                <input type="email" id="email" name="email" placeholder="Email address"/>
            </div>
            <div class="phone">
                <div>
                    <label for="phoneNumber">Phone</label>
                </div>
                <div class="phoneNo">
                    <input id="phoneNumber" type="number" name="phone" placeholder="Phone Number"/>
                </div>
            </div>
        </div>
    <br>

    <div class="pR">
        <div class="booking-amt-details fl clearfix f-bold">
            <div class="booking-amt-title fl">Total Amount :</div>
            <div class="booking-amt fl">
                INR <span id="tot_price" class="f-bold">'.$booking["fare"].'/-</span>
            </div>
        </div>

        <div class="button-container fr">
            <button type="submit" name="action" value="proceed" class="button main-btn gtm-continueBooking">Proceed to pay</button>
            <button type="submit" name="action" value="cancel" class="button cancelbutton">Cancel</button>
            <br>
        </div>
    </div>
    </div>
</form>
</div>
</div>'
?>

    <script>
    function logOut() {
      const urlParams = new URLSearchParams(window.location.search);
      const pnr = urlParams.get('pnr');
     
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
            // Redirect to login page or show a message
            window.location.href = "../main/index.php"; // Replace with your login page URL
      }
      };
      if (pnr) {
                xhr.send("action=logout&pnr=" + pnr);
      }      
      else{
        xhr.send("action=logout");
      }
        
        // $_SESSION['username'] = NULL;
        // session_destroy();
    }
</script>
<?php
    // Check if the request method is POST and the action is 'logout'
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'logout') {
      if (isset($_POST['pnr'])) {
        $pnr = $_POST['pnr'];

        // Database connection
        $conn = new mysqli("localhost", "root", "", "test");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Delete the booking with the given PNR
        $sql = "DELETE FROM booking WHERE pnr = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $pnr);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

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

<!-- <script>
  let booking_details = JSON.parse(localStorage.getItem("booking_details"));
  let today = new Date();
  let time = today.getHours() + " : " + today.getMinutes();
  let date =
    today.getDate() + " - " + today.getMonth() + " - " + today.getFullYear();
  let date_time = time + "  " + date;

  document.getElementById("tot_price").innerHTML = booking_details.tot_price;

  async function postData() {
    let input_obj = JSON.parse(localStorage.getItem("user_inputs"));
    let name = document.getElementById("inputName").value;
    // let genderName = document.querySelector(
    //   input[name="gender"]:checked
    // ).value;

    let age = document.querySelector("#input").value;
    let email = document.getElementById("email").value;
    let phone = document.getElementById("phoneNumber").value;
    //  store values in local storage

    let seatNo = localStorage.getItem("selected_seat_id");
    let busNo = localStorage.getItem("selected_busID");
    seatNo = parseInt(seatNo);
    busNo = parseInt(busNo);
    let ticketNo = 200 + seatNo + busNo;
    localStorage.setItem("ticketNo", ticketNo);

    let ticketDetails = {
      name: name,
      // gender: genderName,
      age: age,
      email: email,
      phone: phone,
      booked_bus: booking_details.booked_bus,
      booked_seatID: booking_details.booked_seatID,
      booked_price: booking_details.tot_price,
      cur_Dt_time: date_time,
      user_points_input: input_obj,
      ticketN0: ticketNo,
    };
    localStorage.setItem("booking_details", JSON.stringify(ticketDetails));

    // let url = https://my-databases-json.herokuapp.com/Tickets;
    let url = https://json-server-02.onrender.com/Tickets;
    let res = await fetch(url, {
      method: "POST",
      body: JSON.stringify(ticketDetails),
      headers: {
        "Content-Type": "application/json",
      },
    });
    StoreValues();
    location.href = "../Payment_Page/payment.html";
  }

  //   store value for details page don't change this values
  function StoreValues() {
    let name = document.getElementById("inputName").value;

    let age = document.getElementById("input").value;
    let OBj = {
      name: name,
      age: age

    }
    console.log(OBj);
    localStorage.setItem("user_data", JSON.stringify(OBj));

  }

</script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="test.js"></script>
