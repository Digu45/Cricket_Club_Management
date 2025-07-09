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
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $date = date('Y-m-d');
    mysqli_query($con, "INSERT INTO add_notices (title, description, date_posted) 
                        VALUES ('$title', '$desc', '$date')");
    echo "<script>alert('Notice Added');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Notice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(-45deg, #ff9a9e, #fad0c4, #fbc2eb, #a6c1ee);
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
            background: rgba(255, 255, 255, 0.85);
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

        textarea {
            resize: vertical;
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
    <h3>Add Notice</h3>
    <form method="post">
        <div class="form-group">
            <label>Notice Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Notice Description</label>
            <textarea name="description" rows="5" class="form-control" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Add Notice</button>
    </form>
</div>

</body>
</html>
