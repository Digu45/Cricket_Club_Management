<?php
$server = "localhost";
$username = "root";
$password = "";
$dbnm = "cricketclub";

$con = mysqli_connect($server, $username, $password, $dbnm);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM add_matches ORDER BY match_date DESC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Previous Matches</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Important for mobile -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background:rgb(225, 226, 227);
            font-family: 'Segoe UI', sans-serif;
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
        }

        .container {
            padding-top: 10px;
            max-width: 850px;
            margin-bottom: 30px;
        }

        .scroll-box {
            max-height: 70vh; /* Set scroll height relative to screen */
            overflow-y: auto;
            padding-right: 10px;
        }

        .match-card {
            background: #fff;
            border-left: 5px solid #337ab7;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.08);
        }

        .match-card:hover {
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        .match-title {
            font-size: 18px;
            font-weight: bold;
            color: #222;
        }

        .match-details {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }

        @media (max-width: 768px) {
            .match-card {
                padding: 15px;
            }
            .match-title {
                font-size: 16px;
            }
            .match-details {
                font-size: 13px;
            }
        }
    </style>
</head>
<body>

<a href="main.php" class="back-btn">⬅ Back</a>

<div class="container">
<h4 class="text-center">
    <span style="display: inline-block; border: 3px solid #28a745; border-radius: 12px; padding: 10px 20px; background-color: #e9f7ef; color: #1b5e20;">
      🏏 Completed Matches
    </span>
  </h4>

    <div class="scroll-box">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="match-card">
                    <div class="match-title">Blaze Cricket Club vs <?= $row['opponent_team'] ?></div>
                    <div class="match-details">
                        <strong>Date:</strong> <?= date('d M Y', strtotime($row['match_date'])) ?><br>
                        <strong>Location:</strong> <?= $row['location'] ?><br>
                        <strong>Result:</strong> <?= $row['result'] ?><br>
                        <strong>Match Summary:</strong> <?= $row['match_summary'] ?>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center'>No previous matches found.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>
