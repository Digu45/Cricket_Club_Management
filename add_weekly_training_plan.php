<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "cricketclub";

$con = mysqli_connect($server, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $player_name = $_POST['player_name'];
    $coach = $_POST['coach'];

    $data = [];
    $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
    foreach ($days as $day) {
        $data[$day . '_activity'] = $_POST[$day . '_activity'];
        $data[$day . '_time'] = $_POST[$day . '_time'];
    }

    $sql = "INSERT INTO weekly_training_plan (player_name, coach, 
        monday_activity, monday_time,
        tuesday_activity, tuesday_time,
        wednesday_activity, wednesday_time,
        thursday_activity, thursday_time,
        friday_activity, friday_time,
        saturday_activity, saturday_time,
        sunday_activity, sunday_time
    ) VALUES (
        '$player_name', '$coach',
        '{$data['monday_activity']}', '{$data['monday_time']}',
        '{$data['tuesday_activity']}', '{$data['tuesday_time']}',
        '{$data['wednesday_activity']}', '{$data['wednesday_time']}',
        '{$data['thursday_activity']}', '{$data['thursday_time']}',
        '{$data['friday_activity']}', '{$data['friday_time']}',
        '{$data['saturday_activity']}', '{$data['saturday_time']}',
        '{$data['sunday_activity']}', '{$data['sunday_time']}'
    )";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Training Plan Added Successfully!');</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Weekly Training Plan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .container-box {
            max-height: 90vh;
            overflow-y: auto;
            padding: 20px;
            background-color:rgb(215, 226, 224);
            border-radius: 10px;
            margin-top: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        .submit-btn {
            margin-top: 20px;
        }

        @media screen and (max-width: 768px) {
            .form-control {
                font-size: 16px;
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
    </style>
</head>
<body>
<a href="dashboard.php" class="back-btn">⬅ Back</a>

<div class="container">
    <div class="container-box">
        <h3 class="text-center">Add Weekly Training Plan</h3>
        <form method="post" action="">
            <div class="form-group">
                <label>Player Name</label>
                <input type="text" name="player_name" class="form-control" required>
            </div>

            <?php
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            foreach ($days as $day) {
                echo '<div class="form-group">';
                echo "<label>{$day} Activity</label>";
                echo "<input type='text' name='" . strtolower($day) . "_activity' class='form-control' required>";
                echo '</div>';

                echo '<div class="form-group">';
                echo "<label>{$day} Time</label>";
                echo "<input type='time' name='" . strtolower($day) . "_time' class='form-control' required>";
                echo '</div>';
            }
            ?>

            <div class="form-group">
                <label>Coach</label>
                <input type="text" name="coach" class="form-control" required>
            </div>

            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary submit-btn">Submit</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
