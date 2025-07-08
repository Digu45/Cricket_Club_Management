<?php
// DB connection
$server = "localhost";
$username = "root";
$password = "";
$database = "cricketclub";

$con = mysqli_connect($server, $username, $password, $database);


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch notices
$sql = "SELECT * FROM add_notices ORDER BY date_posted DESC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Notices</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background: rgb(156, 161, 172);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            margin-top: 40px;
        }

        .notice-card {
            background: #ffffff;
            padding: 20px 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: 0.3s ease-in-out;
        }

        .notice-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .notice-title {
            font-size: 20px;
            font-weight: bold;
            color: #003366;
        }

        .notice-date {
            font-size: 13px;
            color: #999;
            margin-bottom: 10px;
        }

        .notice-message {
            font-size: 15px;
            color: #444;
        }

        @media (max-width: 768px) {
            .notice-title {
                font-size: 18px;
            }

            .notice-message {
                font-size: 14px;
            }
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
        .upcoming {
            background: linear-gradient(135deg, #e0ffe0, #ccffcc);
            border-left: 5px solid #28a745;
        }

        .past {
            background-color: #ffffff;
        }

        .ribbon {
            position: absolute;
            top: -10px;
            right: -10px;
            background: #28a745;
            color: white;
            padding: 5px 12px;
            font-size: 12px;
            border-radius: 3px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .notice-wrapper {
            position: relative;
        }

        body {
            background: #e8f1ff;
            /* Lighter blue to match card styling */
        }

        .scrollable-list {
            max-height: 500px;
            /* You can adjust this height */
            overflow-y: auto;
            padding-right: 10px;
        }

        /* Optional scrollbar styling */
        .scrollable-list::-webkit-scrollbar {
            width: 6px;
        }

        .scrollable-list::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 4px;
        }

  </style>
</head>

<body>
    <a href="main.php" class="back-btn">⬅ Back</a>
    <h2 class="text-center">
  <span style="display: inline-block; border: 3px solid orange; border-radius: 12px; padding: 10px 20px; background-color: #fff8e1; color:rgb(203, 159, 87);">
    📢 Latest Notices
  </span>
</h2>

    <div class="container">

        <div class="scrollable-list" style="padding-top: 15px;">

            <?php while ($row = mysqli_fetch_assoc($result)):
                $isUpcoming = strtotime($row['date_posted']) > time();
            ?>
                <div class="notice-card notice-wrapper <?= $isUpcoming ? 'upcoming' : 'past' ?>">
                    <?php if ($isUpcoming): ?>
                        <div class="ribbon">Upcoming</div>
                    <?php endif; ?>
                    <div class="notice-title"><?= $row['title'] ?></div>
                    <div class="notice-date"><?= date("F j, Y, g:i A", strtotime($row['date_posted'])) ?></div>
                    <div class="notice-message"><?= nl2br($row['description']) ?></div>
                </div>
            <?php endwhile; ?>
        </div>

    </div>

</body>

</html>