<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="availabilty_nd_booking.css">
    <link rel="stylesheet" href="mobile.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="location.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Bus-Availability</title>
    <script src="https://kit.fontawesome.com/792b524030.js" crossorigin="anonymous"></script>
    
     <link rel="stylesheet" href="SignupLogin.css">
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
                    <li class="logout-btn">Welcome '.$_SESSION["username"].'!!</li>
                    <li class="logout-btn">'.$_SESSION["email"].'</li>
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
        .seat.selected { 
            background-color: #db6060;
            color: white;
        }
        .seat.unavailable { 
            background-color: #767676;
            color: white;
            cursor: not-allowed;
        }
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
          p.busdetails {
            float:left;
            margin-right: 100px;
            font-size: 14px;
          }
          
          .bus-info{
            padding: 15px;
            border-radius: 5px;
          }
          h5.busname{
           margin-left:-20%;
           padding-bottom: 5%;
          }
         .logout-btn{
            margin-top:5px;
            margin-bottom:5px;
         }
      </style>
    <style>
    </style>
</head>

<body >
    <div id="container">
    <div class="nav_cover"> 
        <div id="header"> </div>

    <!-- <nav>
        <a href="../../Mohit Codes/akash code/homePage.html"><img src="https://s3.rdbuz.com/web/images/home/sgp/r_logo.png" alt=""></a>
        <h2 class="center">NavBar</h2>
    </nav> -->
<?php
$fromcity=$_REQUEST['fromcity'];
$tocity=$_REQUEST['tocity'];
$date=$_REQUEST['date'];
echo'
</div>
    <div id="header_cover">
    <div id="headerDet">
        <p id="piclup_point">'.$fromcity.'</p>
        <p><i class="fa-solid fa-right-long"></i></p>
        <p id="desti_point">'.$tocity.'</p>
        <p class="hide"><i class="fa-solid fa-angle-left"></i></p>
        <p id="date">'.$date.'</p>
        <p class="hide"><i class="fa-solid fa-angle-right"></i></p>
        <a href="../main/index.php"><button id="modify_btn">Modify</button></a>
    </div>
</div>';
?>
    <main>
        <!-- <div id="left_section_coverDiv"> -->
            <div class="left_section">
                <h6 id="p">FILTER</h6>
                <hr>
                <div id="heading_line" class="filter_div">
                    <P id="p1">Live Tracking (15)</P>
                </div>
                <hr>
                <div class="filter_div">
                    <p id="p2">DEPARTURE TIME</p>
                    <label for=""><input type="checkbox" value="" id="before-6am">Before 6 am (<span id="span1">0</span>)</label>
                    <label for=""><input type="checkbox" value="" id="morning">6 am to 12 pm (<span id="span2">0</span>)</label>
                    <label for=""><input type="checkbox" value="" id="evening">12 pm to 6 pm (<span id="span3">0</span>)</label>
                    <label for=""><input type="checkbox" value="">After 6 pm (0)</label>
                </div>
                <div class="filter_div">
                    <p id="p2">BUS TYPES</p>
                    <label for=""><input type="checkbox" value="" id="seater">SEATER (<span id="span4">0</span>)</label>
                    <label for=""><input type="checkbox" value="" id="sleeper">SLEEPER (<span id="span5">0</span>)</label>
                    <label for=""><input type="checkbox" value="" id="ac">AC (23)</label>
                </div>
                <div class="filter_div">
                    <p id="p2">SEAT AVAILABILITY</p>
                    <label for=""><input type="checkbox" value="">Single Seats (9)</label>
                </div>
                <div class="filter_div">
                    <p id="p2">ARRIVAL TIME</p>
                    <label for="" ><input type="checkbox" value="" >Before 6 am (5)</label>
                    <label for=""><input type="checkbox" value="">6 am to 12 pm (18)</label>
                    <label for=""><input type="checkbox" value="">12 pm to 6 pm (0)</label>
                    <label for=""><input type="checkbox" value="">After 6 pm (0)</label>
                </div>
                <div class="points_div">
                    <p id="p3">BOARDING POINT</p>
                    <label for=""><i class="fa-solid fa-magnifying-glass"></i><input type="text" name="" id=""
                            placeholder="BOARDING POINT"></label>
                </div>
                <div class="points_div">
                    <p id="p3">DROPPING POINT</p>
                    <label for=""><i class="fa-solid fa-magnifying-glass"></i><input type="text" name="" id=""
                            placeholder="DROPPING POINT"></label>
                </div>
                <div class="points_div">
                    <p id="p3">OPERATOR</p>
                    <label for=""><i class="fa-solid fa-magnifying-glass"></i><input type="text" name="" id=""
                            placeholder="OPERATOR"></label>
                </div>
                <div class="points_div">
                    <p id="p3">AMENITIES</p>
                    <ul class="amenties">
                        <li>WIFI (23)</li>
                        <li>Water Bottle (23)</li>
                        <li>Blankets (4)</li>
                        <li>Charging Point (4)</li>
                        <li>Movie (0)</li>
                        <li>Track My Bus (4)</li>
                        <li>Emergency Contact Nu... (1)</li>
                        <li>Toilet (1)</li>
                    </ul>
                </div>
            </div>
        <div class="right_section">
                       

            <?php
            $conn = mysqli_connect("localhost", "root", "", "test");
        
            // Check connection
            if($conn === false){
                die("ERROR: Could not connect. " 
                    . mysqli_connect_error());
            }
            $fromcity=$_REQUEST['fromcity'];
            $tocity=$_REQUEST['tocity'];
            $date=$_REQUEST['date'];
            $sql = "SELECT * FROM bus where fromcity='$fromcity' AND tocity='$tocity' AND date='$date'";
            $result = $conn->query($sql);
            
            echo '<div id="heading_line">
                <p id="p4"><i class="fa-solid fa-shield-virus"></i>All bus ratings include safety as a major factor</p>
                <hr class="heading_hr">
            </div>
            <div id="details_sorting_heading">
                <p id="p-span" ><span id="no_of_buses" class="bold">'.$result->num_rows.' </span> Buses <span id="span" class="bold" >found</span> </p>
                <p class="bold">SORT BY:</p>
                <p id="departure" class="p">Departure <span id="order_departure_icon" class="p"></span></p>
                <p id="duration" class="p">Duration</p>
                <p id="arrival" class="p">Arrival</p>
                <p id="rating" class="p">Ratings</p>
                <p id="price" class="p">Fare</p>
                <p id="seat" class="p">Seats Available</p>
                <hr>
            </div>';

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo'<div id="bus_details_section" >
                <div class="bus-info">
                    <div class="details">
                        <div class="text-right">
                        <h5 class="busname">'.$row["name"].'</h5>
                        <p class="busdetails">Vehicle Number : '.$row["busnumber"].'</p><br>
                        <p class="busdetails" >'.$row["bustype"].'</p>
                        </div>
                        <div class="text-right">
                            <p class="busdetails">Departure : '.$row["departure"].'</p><br>
                            <p class="busdetails">Duration : '.$row["duration"].'</p><br>
                            <p class="busdetails">Arrival : '.$row["arrival"].'</p>
                        </div>
                        <div class="text-right">        
                        <p class="busdetails">Rating : '.$row["rating"].'</p><br>
                        <p class="busdetails">Fare : INR '.$row["fare"].'/-</p>
                        </div>
                        <div class="view">
                        <button class="view-seats-btn" id="view-seats-btn" data-busnumber=' . $row["busnumber"] . ' onclick="proceedToBook('.$row["busnumber"].')">View Seats</button>
                        </div>
                    </div>
                </div>
                
                <div class="seat-map" id="seat-map-' . $row["busnumber"] . '" style="display: none;">
                    <!-- <div class="seatdecks"> -->
                    <div id="seat-layout" class="seat-container">
                        <h5>Lower Deck</h5>
                        <div class="seats">
                            <!-- Lower Deck Seats -->
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="L1">L1</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="L2">L2</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="L3">L3</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="L4">L4</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="L5">L5</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="L6">L6</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="L7">L7</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="L8">L8</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="L9">L9</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="L10">L10</div>
                        </div>
                    </div>

                    <div id="seat-layout" class="seat-container">
                        <h5>Upper Deck</h5>
                        <div class="seats">
                            <!-- Upper Deck Seats -->
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="U1">U1</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="U2">U2</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="U3">U3</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="U4">U4</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="U5">U5</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="U6">U6</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="U7">U7</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="U8">U8</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="U9">U9</div>
                            <div class="seat" data-bus='.$row["busnumber"].' data-seat="U10">U10</div>
                        </div>
                    </div>

                    <div class="container box" id="seat-map">
                        <div id="selectionScreen">
                            <div class="tabs">
                                <div class="tab active" id="tab-' . $row["busnumber"] . '" data-busnumber=' . $row["busnumber"] . ' onclick="showTab(\'boarding-' . $row["busnumber"] . '\')">BOARDING POINT</div>
                                <div class="tab" id="tab-' . $row["busnumber"] . '" data-busnumber=' . $row["busnumber"] . ' onclick="showTab(\'dropping-' . $row["busnumber"] . '\')">DROPPING POINT</div>
                            </div>
                            <form id="seat-form" action="confirm_booking.php" method="post">
                            <input type="hidden" name="selected_seat" id="selected_seat-'.$row["busnumber"].'" required>
                            <input type="hidden" name="selected_bus" id="selected_bus" value='.$row["busnumber"].' required>
                            <div id="boarding-' . $row["busnumber"] . '" class="content active">
                                <div class="point">
                                    <input type="radio" name="boarding" id='.$row["boardingpoint1"].' value="'.$row["boardingtime1"].' '.$row["boardingpoint1"].'" required>
                                    <label for='.$row["boardingpoint1"].'>'.$row["boardingtime1"].'  '.$row["boardingpoint1"].'  </label>
                                </div>
                                <div class="point">
                                    <input type="radio" name="boarding" id='.$row["boardingpoint2"].' value="'.$row["boardingtime2"].' '.$row["boardingpoint2"].'" required>
                                    <label for='.$row["boardingpoint2"].'>'.$row["boardingtime2"].'  '.$row["boardingpoint2"].' </label>
                                </div>
                                <div class="amount">
                                Amount ( Incl. of all taxes )<br>
                                <strong>INR '.$row["fare"].'</strong>
                                </div>
                                <button type="button" class="button" data-busnumber=' . $row["busnumber"] . ' onclick="showTab(\'dropping-' . $row["busnumber"] . '\')">Next</button>
                            </div>
                            <div id="dropping-' . $row["busnumber"] . '" class="content">
                                <div class="point">
                                    <input type="radio" name="dropping" id='.$row["droppingpoint1"].' value="'.$row["droppingtime1"].' '.$row["droppingpoint1"].'" required>
                                    <label for='.$row["droppingpoint1"].'>'.$row["droppingtime1"].'  '.$row["droppingpoint1"].'  </label>
                                </div>
                                <div class="point">
                                    <input type="radio" name="dropping" id='.$row["droppingpoint2"].' value="'.$row["droppingtime2"].' '.$row["droppingpoint2"].'" required>
                                    <label for='.$row["droppingpoint2"].'>'.$row["droppingtime2"].'  '.$row["droppingpoint2"].'  </label>
                                </div>
                                <div class="amount">
                                Amount ( Incl. of all taxes )<br>
                                <strong>INR '.$row["fare"].'</strong>
                                </div>
                            <button type="submit" class="button">Proceed</button>
                            </div>
                            
                            </form>
                        </div>
                    
                        <div id="confirmationScreen" style="display: none;">
                            <h5>Boarding & Dropping <span style="color: rgb(237, 112, 112); cursor: pointer;" onclick="goBackToSelection()">CHANGE</span></h5>
                            <div class="point">
                                <span>Gachibowli</span> <span style="float: right;">16:30</span>
                                <div class="description">Infront of Centro Mall, Towards Kondapur (Hyderabad)</div>
                            </div>
                            <div class="point">
                                <span>Gummadipundi</span> <span style="float: right;">05:45 </span>
                                <div class="description">Infront of Gummadipudi Railway Station (Chennai)</div>
                            </div>
                            <div style="margin-top: 20px;">
                                <strong>Seat No.</strong> 6LC
                            </div>
                            
                            <div class="amount">
                                Amount - 
                                <strong>INR 1408.00</strong>
                                (Incl. of all taxes)
                            </div>
                            <button class="button" >PROCEED TO BOOK</a>
                        </div>
                    </div>
               </div>
            </div>';
                }}
                else{
                    echo 'No results found';
                }
                ?>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "test");
        
                // Check connection
                if($conn === false){
                    die("ERROR: Could not connect. " 
                        . mysqli_connect_error());
                }

                $bookinglist = "SELECT seat, busnumber FROM booking";
                $seats = $conn->query($bookinglist);
                if ($seats->num_rows > 0) {
                    while($rows = $seats->fetch_assoc()) {
                        
                        echo '<script>
                                document.querySelectorAll(".seat").forEach(seats => {
                                var seat = seats.getAttribute("data-seat");
                                var bus = seats.getAttribute("data-bus");
                                if(bus == "'.$rows["busnumber"].'" && seat == "'.$rows["seat"].'") {
                                    seats.classList.add("unavailable");
                                }
                                
                            });
                             </script>';
                    }
                }
                ?>
        </div>
    </main>

    <!--============= Seat POP-UP code ============= -->
    <div id="bg-modal">
        <div id="pop-up_box" class="pop-up_box">
            <p class="cross">+</p>
            <span id="pop_line">Click on an available seat to proceed with your transaction</span>
            <div id="seats_contents">
                <div id="seats_contents_left">
                    <p>Upper Deck</p>
                 <div id="upper_deck_box">
                   <!-- Seats wiil be here  ===============-->
                  <p class="seat"></p>
                 </div>
                    <p>Lower Deck</p>
                 <div id="lower_deck_box">
                </div>
                </div>
                <div id="seats_contents_right">
                  <h6>SEAT LEGEND</h6>
                  <div id="seat_legends">
                  <p><span  id="avl_seat"></span>Available </p>
                  <p><span id="unavl_seat"></span>Unailable </p>
                  <p> <span id="fem_seat"></span>Female </p>
                  <p><span id="male_seat"></span> Male  </p>
                   </div>
                   <h6>ThIS BOOKING IS NON REFUNDABLE</h6>
                </div>
 
                <!--========= After selected the seat ======== -->
                <div id="seats_contents_right-2">
                  <div id="confirm_points">
                    <div id="boardPoint_div" class="points_heading">
                        <p>BOADING POINT</p>
                    </div>
                    <div id="dropPoint_div" class="points_heading">
                        <p>DROPPING POINT</p>
                    </div>
                </div>
                <div id="boarding-points" class="boarding-points">
                    <!-- <div>
                        <input type="checkbox"><p class="bold" id="pick_time">23:00 </p><p class="bold" id="boarding-point"> Kashmiri Gate</p>
                    </div>        -->
                </div>
                  <button id="continue_btn" class="btn">Continue</button>
                </div>
                
                <!--========= After contnue of points ======== -->
                <div id="confirm_booiking_box">
                   
                </div>      
            </div>
            <!-- <button id="confirm_btn">confirm</button> -->
        </div>
    </div>
</div>
<script src="scripts1.js"></script>
    <script src="script.js"></script>

    <!-- POP-UP , will make at last if have time -->
    <!-- <div class="pop_up_div">
        <h2>IMPORTANT TIP</h2>
        <div id="content">
            <img src="https://s3.rdbuz.com/images/carousel/coachmark-two.gif" alt="">
            <p>Showing results from your searched boarding and drop location. Scroll down to see 99 more bus options from DELHI to LUCKNOW</p>
            <button>Ok, got it</button>
        </div>
    </div> -->
    <script type="module" src="availabilty_nd_booking.js"></script>
    <script type="module" src="show_pop_up.js"></script>
   
    <!-- <script type="module" src="seats_pop_up.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="test.js"></script>


    <script>
        // JavaScript to handle seat selection
        function proceedToBook(bus){
            var busnum = bus
            document.querySelectorAll('.seat').forEach(seat => {
            seat.addEventListener('click', () => {
                if (!seat.classList.contains('unavailable')) {
                    document.querySelectorAll('.seat.selected').forEach(selected => {
                        selected.classList.remove('selected');
                    });
                    seat.classList.add('selected');
                    document.getElementById(`selected_seat-${busnum}`).value = seat.getAttribute('data-seat');
                    // document.getElementById('selected_bus').value = seat.getAttribute('data-bus');
                }
            });
        });
        }
                
// document.getElementById('view-seats-btn').addEventListener('click', function() {
//     const seatMap = document.getElementById('seat-map');
//     seatMap.style.display = seatMap.style.display === 'none' ? 'block' : 'none';

    
// });
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.view-seats-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            const busNumber = this.getAttribute('data-busnumber');
            const seatMap = document.getElementById(`seat-map-${busNumber}`);
            seatMap.style.display = seatMap.style.display === 'none' ? 'block' : 'none';
        });
    });
});


</script>
<script>
    function showTab(tabName) {
    // alert(tabName);
    // const bus=document.getElementById(`bus_details_section`)
    var busNumber = tabName.split('-')[1];
    // alert(busNumber);
    document.querySelectorAll(`#tab-${busNumber}`).forEach(tab => {
    tab.classList.remove('active');
    });
    document.querySelectorAll(`#boarding-${busNumber}`).forEach(content => {
    content.classList.remove('active');
    });
    document.querySelectorAll(`#dropping-${busNumber}`).forEach(content => {
    content.classList.remove('active');
    });
    document.querySelector(`[onclick="showTab('${tabName}')"]`).classList.add('active');
    document.getElementById(tabName).classList.add('active');

}
</script>
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