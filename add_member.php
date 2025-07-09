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
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $position = $_POST['position'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $query = "INSERT INTO player_registration (FullName, Email, Age, Position, Address, Phone_No) 
              VALUES ('$fullname', '$email', '$age', '$position', '$address', '$phone')";
    mysqli_query($con, $query);

    echo "<script>alert('Player added successfully!');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Player</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(-45deg, #ff9a9e, #fad0c4, #a1c4fd, #c2e9fb);
            background-size: 400% 400%;
            animation: gradientBG 10s ease infinite;
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
    <h3>Add Player</h3>
    <form method="post">
        <div class="form-group">
            <label>Full Name</label>
            <input name="fullname" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input name="email" type="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Age</label>
            <input name="age" type="number" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Position</label>
            <input name="position" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input name="phone" type="text" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success btn-block">Add Player</button>
    </form>
</div>

</body>
</html>
