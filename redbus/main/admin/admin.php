<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        footer{
            height:10%;
        }
        nav{
            margin-top:17px;
        }
        h1{
            color : black;
        }
        .header{
            float:left;
            margin-left:120px;
            margin-top:20px;
        }
        .header-right{
            float:right;
            margin-right:120px;
            margin-top:50px;
        }
        button.logout{
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            background-color: hsl(0, 3%, 43%);
            color: #fff;
            border: none;
            border-radius: 5px;
        }
        button.logout:hover {
            background-color: #555;
        }
        img.logo{
            width:350px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
        <div class="header">
            <img src="logo.png" alt="Logo" class="logo">
            <h1>Welcome to the Admin Dashboard</h1>
        </div>
        <div class="header-right"><button class="logout" onclick="window.location.href='../index.php'">Logout</button></div>
        </header>
        <main>
            
            <section id="userList" class="section hidden">
                <h2>User List</h2>
                <div id="userListContent">
                    <!-- User List Will Be Populated Here -->
                </div>
            </section>

            <section id="bus list" class="section hidden">
                <h2>Bus List</h2>
                <div id=" busListContent">
                    <!-- bus List Will Be Populated Here -->
                </div>
                <!-- bus list Form Goes Here -->
            </section>

            <section id="Add bus" class="section hidden">
                <h2>Add Bus</h2>
                <div id="addbusContent">
                    <!-- add bus Will Be Populated Here -->
                </div>
                <!-- Add bus Form Goes Here -->
            </section>

            <section id="view booking" class="section hidden">
                <h2>View Booking</h2>
                <div id="view bookingContent">
                    <!--  view Booking Will Be Populated Here -->
                </div>
            </section>
        </main>
        <footer>
            <nav>
                <button onclick="location.href='userlist.php'">User List</button>
                <button onclick="location.href='buslist.php'">Bus List</button>
                <button onclick="location.href='addbus.php'">Add Bus</button>
                <button onclick="location.href='viewbooking.php'">View Booking</button>
            </nav>
        </footer>
    </div>
    <script src="admin.js"></script>
</body>
</html>
