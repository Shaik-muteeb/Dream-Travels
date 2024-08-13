<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            justify-content: center;
            text-align: center;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        header {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .form-column {
            width: 48%;
            box-sizing: border-box;
        }

        button.add {
            color: #fff;
            background-color: #e74c3c;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        button.add:hover {
            background-color: #c0392b;
        }

        .back-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 3px;
            float: right;
            margin-right: 10px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Add Bus</h1>
        </header>
        <form action="insertbus.php" method="post">
            <div class="form-row">
                <div class="form-group form-column">
                    <label for="fromcity">From City</label>
                    <input type="text" id="fromcity" name="fromcity" required>
                </div>
                <div class="form-group form-column">
                    <label for="tocity">To City</label>
                    <input type="text" id="tocity" name="tocity" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group form-column">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-group form-column">
                    <label for="name">Bus Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group form-column">
                    <label for="busnumber">Bus Number</label>
                    <input type="text" id="busnumber" name="busnumber" required>
                </div>
                <div class="form-group form-column">
                    <label for="bustype">Bus Type</label>
                    <input type="text" id="bustype" name="bustype" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group form-column">
                    <label for="departure">Departure Time</label>
                    <input type="time" id="departure" name="departure" required>
                </div>
                <div class="form-group form-column">
                    <label for="duration">Duration</label>
                    <input type="text" id="duration" name="duration" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group form-column">
                    <label for="arrival">Arrival Time</label>
                    <input type="time" id="arrival" name="arrival" required>
                </div>
                <div class="form-group form-column">
                    <label for="rating">Rating</label>
                    <input type="number" step="0.1" id="rating" name="rating" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group form-column">
                    <label for="fare">Fare</label>
                    <input type="number" id="fare" name="fare" required>
                </div>
                <div class="form-group form-column">
                    <label for="boardingpoint1">Boarding Point 1</label>
                    <input type="text" id="boardingpoint1" name="boardingpoint1" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group form-column">
                    <label for="boardingtime1">Boarding Time 1</label>
                    <input type="time" id="boardingtime1" name="boardingtime1" required>
                </div>
                <div class="form-group form-column">
                    <label for="boardingpoint2">Boarding Point 2</label>
                    <input type="text" id="boardingpoint2" name="boardingpoint2" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group form-column">
                    <label for="boardingtime2">Boarding Time 2</label>
                    <input type="time" id="boardingtime2" name="boardingtime2" required>
                </div>
                <div class="form-group form-column">
                    <label for="droppingpoint1">Dropping Point 1</label>
                    <input type="text" id="droppingpoint1" name="droppingpoint1" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group form-column">
                    <label for="droppingtime1">Dropping Time 1</label>
                    <input type="time" id="droppingtime1" name="droppingtime1" required>
                </div>
                <div class="form-group form-column">
                    <label for="droppingpoint2">Dropping Point 2</label>
                    <input type="text" id="droppingpoint2" name="droppingpoint2" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group form-column">
                    <label for="droppingtime2">Dropping Time 2</label>
                    <input type="time" id="droppingtime2" name="droppingtime2" required>
                </div>
            </div>
            <div class="btn-container">
                <button type="button" class="back-btn" onclick="window.location.href='admin.php'">Back</button>
                <button type="submit" class="add">Add</button>
            </div>
        </form>
    </div>
</body>
</html>
