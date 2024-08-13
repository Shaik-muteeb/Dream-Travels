<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Simple login logic (replace with actual authentication)
        if ($username == 'admin' && $password == 'password') {
            session_start();
            $_SESSION['loggedin'] = true;
            echo "Login successful";
        } else {
            echo "Invalid credentials";
        }
    }

    if ($action == 'add_bus') {
        $bus_number = $_POST['bus_number'];
        $route = $_POST['route'];
        $timing = $_POST['timing'];

        $sql = "INSERT INTO buses (bus_number, route, timing) VALUES ('$bus_number', '$route', '$timing')";
        if ($conn->query($sql) === TRUE) {
            echo "Bus added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Handle GET requests
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        if ($action == 'get_users') {
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            echo json_encode($users);
        }

        if ($action == 'get_buses') {
            $sql = "SELECT * FROM buses";
            $result = $conn->query($sql);
            $buses = [];
            while ($row = $result->fetch_assoc()) {
                $buses[] = $row;
            }
            echo json_encode($buses);
        }
    } else {
        echo " ";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Booking System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        nav button {
            padding: 10px 20px;
            cursor: pointer;
        }

        .section {
            display: none;
        }

        .hidden {
            display: none;
        }

        .section.visible {
            display: block;
        }

        form {
            max-width: 400px;
            margin: auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        form label {
            font-weight: bold;
        }

        form input, form button {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Bus Booking System</h1>
            <nav>
                <button onclick="showSection('login')">Login</button>
                <button onclick="showSection('booking')">Booking</button>
                <button onclick="showSection('users')">Users List</button>
                <button onclick="showSection('buses')">Bus List</button>
                <button onclick="showSection('add_bus')">Add Bus</button>
                <button onclick="logout()">Logout</button>
            </nav>
        </header>
        
        <main>
            <section id="login" class="section">
                <h2>Login</h2>
                <form id="loginForm">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <button type="submit">Login</button>
                </form>
            </section>

            <section id="booking" class="section hidden">
                <h2>Book a Bus</h2>
                <!-- Booking Form Goes Here -->
            </section>

            <section id="users" class="section hidden">
                <h2>Users List</h2>
                <div id="userList">
                    <!-- User List Will Be Populated Here -->
                </div>
            </section>

            <section id="buses" class="section hidden">
                <h2>Bus List</h2>
                <div id="busList">
                    <!-- Bus List Will Be Populated Here -->
                </div>
            </section>

            <section id="add_bus" class="section hidden">
                <h2>Add Bus</h2>
                <form id="addBusForm">
                    <label for="bus_number">Bus Number:</label>
                    <input type="text" id="bus_number" name="bus_number" required>
                    <label for="route">Route:</label>
                    <input type="text" id="route" name="route" required>
                    <label for="timing">Timing:</label>
                    <input type="text" id="timing" name="timing" required>
                    <button type="submit">Add Bus</button>
                </form>
            </section>
        </main>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.getElementById("loginForm").addEventListener("submit", handleLogin);
            document.getElementById("addBusForm").addEventListener("submit", handleAddBus);
            // Add more event listeners as needed
        });

        function showSection(sectionId) {
            const sections = document.querySelectorAll(".section");
            sections.forEach(section => {
                section.classList.add("hidden");
                section.classList.remove("visible");
            });
            document.getElementById(sectionId).classList.remove("hidden");
            document.getElementById(sectionId).classList.add("visible");
        }

        function handleLogin(event) {
            event.preventDefault();
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;

            const formData = new FormData();
            formData.append('action', 'login');
            formData.append('username', username);
            formData.append('password', password);

            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                if (data === "Login successful") {
                    showSection('booking');
                }
            });
        }

        function handleAddBus(event) {
            event.preventDefault();
            const busNumber = document.getElementById("bus_number").value;
            const route = document.getElementById("route").value;
            const timing = document.getElementById("timing").value;

            const formData = new FormData();
            formData.append('action', 'add_bus');
            formData.append('bus_number', busNumber);
            formData.append('route', route);
            formData.append('timing', timing);

            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                // Optionally refresh the bus list here
            });
        }

        function logout() {
            // Implement logout logic here
            alert("Logged out!");
            showSection('login');
        }
    </script>
</body>
</html>
