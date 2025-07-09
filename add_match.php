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

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $opponent = $_POST['opponent'];
    $match_date = $_POST['match_date'];
    $location = $_POST['location'];
    $result = $_POST['result'];

    mysqli_query($con, "INSERT INTO add_matches (opponent_team, match_date, location, result) 
                        VALUES ('$opponent', '$match_date', '$location', '$result')");

    echo "<script>alert('Match Added');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Match Result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(-45deg, #ffecd2, #fcb69f, #a1c4fd, #c2e9fb);
            background-size: 400% 400%;
            animation: gradientBG 12s ease infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .form-container {
            max-width: 500px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .form-container h3 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-group label {
            font-weight: bold;
        }

        .back-btn {
            display: inline-block;
            margin: 20px;
            background-color: orange;
            padding: 10px 25px;
            border-radius: 50px;
            text-decoration: none;
            color: black;
            font-weight: bold;
            border: 1px solid orange;
            transition: all 0.3s ease-in-out;
        }

        .back-btn:hover {
            background-color: white;
            color: orange;
        }

        @media (max-width: 600px) {
            .form-container {
                margin: 30px 20px;
                padding: 20px;
            }

            .back-btn {
                font-size: 14px;
                padding: 8px 20px;
            }
        }
    </style>
</head>
<body>

<a href="dashboard.php" class="back-btn">⬅ Back</a>

<div class="form-container">
    <h3>Add Match Result</h3>
    <form method="post">
        <div class="form-group">
            <label>Opponent Team</label>
            <input name="opponent" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Match Date</label>
            <input type="date" name="match_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Location</label>
            <input name="location" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Result</label>
            <select name="result" class="form-control" required>
                <option value="">Select Result</option>
                <option value="Won">Won</option>
                <option value="Lost">Lost</option>
                <option value="Draw">Draw</option>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-success btn-block">Add Match</button>
    </form>
</div>

</body>
</html>
