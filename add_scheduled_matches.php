<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$dbnm = "cricketclub";

$con = mysqli_connect($server, $username, $password, $dbnm);

if (!$con) {
    echo "Error connecting to server" . mysqli_connect_error();
}

$msg = "";

if (isset($_POST['submit'])) {
    $title = $_POST['match_title'];
    $date = $_POST['match_date'];
    $time = $_POST['match_time'];
    $opponent = $_POST['opponent_team'];
    $location = $_POST['location'];
    $type = $_POST['match_type'];
    $desc = $_POST['description'];

    $sql = "INSERT INTO matches (match_title, match_date, match_time, opponent_team, location, match_type, description)
            VALUES ('$title', '$date', '$time', '$opponent', '$location', '$type', '$desc')";

    if (mysqli_query($con, $sql)) {
        $msg = "✅ Match added successfully!";
    } else {
        $msg = "❌ Failed to add match: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Match</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #dbe9ff, #a2c4ff);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .back-btn {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: orange;
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            color: black;
            font-weight: bold;
            border: 1px solid orange;
            transition: 0.3s ease-in-out;
        }

        .back-btn:hover {
            background-color: white;
        }

        .container {
            background: #fff;
            width: 95%;
            max-width: 600px;
            padding: 20px;
            margin-top: 80px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        label {
            font-weight: bold;
            margin-top: 12px;
            display: block;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 50px;
            margin-top: 20px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .msg {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }

        @media (max-width: 600px) {
            h2 {
                font-size: 20px;
            }

            label, input, select, textarea {
                font-size: 14px;
            }

            .btn {
                font-size: 15px;
                padding: 10px;
            }

            .back-btn {
                padding: 8px 16px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<a href="dashboard.php" class="back-btn">⬅ Back</a>

<div class="container">
    <h2>Add Match</h2>

    <?php if ($msg != "") echo "<div class='msg'>$msg</div>"; ?>

    <form method="post">
        <label>Match Title</label>
        <input type="text" name="match_title" required>

        <label>Match Date</label>
        <input type="date" name="match_date" required>

        <label>Match Time</label>
        <input type="text" name="match_time" placeholder="e.g. 3:00 PM" required>

        <label>Opponent Team</label>
        <input type="text" name="opponent_team" required>

        <label>Location</label>
        <input type="text" name="location" required>

        <label>Match Type</label>
        <select name="match_type" required>
            <option value="">-- Select Type --</option>
            <option value="League">League</option>
            <option value="Friendly">Friendly</option>
            <option value="Final">Final</option>
            <option value="Knockout">Knockout</option>
        </select>

        <label>Description</label>
        <textarea name="description" rows="3" placeholder="Match details or rules..."></textarea>

        <button type="submit" name="submit" class="btn">Add Match</button>
    </form>
</div>

</body>
</html>
