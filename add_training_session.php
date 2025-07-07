<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$dbnm = "cricketclub";

$con = mysqli_connect($server, $username, $password, $dbnm);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit();
}

if (isset($_POST['submit'])) {
  $day = $_POST['day'];
  $morning_time = $_POST['morning_time'];
  $morning_activity = $_POST['morning_activity'];
  $morning_coach = $_POST['morning_coach'];
  $evening_time = $_POST['evening_time'];
  $evening_activity = $_POST['evening_activity'];
  $evening_coach = $_POST['evening_coach'];

  $sql = "INSERT INTO timetable_sessions 
          (day, morning_time, morning_activity, morning_coach, evening_time, evening_activity, evening_coach) 
          VALUES 
          ('$day', '$morning_time', '$morning_activity', '$morning_coach', '$evening_time', '$evening_activity', '$evening_coach')";

  mysqli_query($con, $sql);
  echo "<script>alert('Training Timetable Added');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Training Timetable</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background:rgb(233, 231, 231);
      font-family: 'Segoe UI', sans-serif;
    }

    .container {
  max-width: 600px;
  height: 80vh; /* fixed height */
  background: rgb(147, 187, 196);
  padding: 30px;
  margin: 40px auto;
  border-radius: 10px;
  box-shadow: 0 0 15px rgba(0,0,0,0.1);
  overflow-y: auto; /* make form scrollable */
}


    .form-group label {
      font-weight: 600;
    }

    .btn-primary {
      width: 100%;
      background-color: orange;
      border: none;
      font-weight: bold;
    }

    .btn-primary:hover {
      background-color: #ffcc80;
      color: black;
    }

    .back-btn {
      margin: 15px;
      display: inline-block;
      background-color: orange;
      padding: 8px 20px;
      border-radius: 30px;
      text-decoration: none;
      color: black;
      font-weight: bold;
      border: 1px solid orange;
      transition: all 0.3s ease-in-out;
    }

    .back-btn:hover {
      background-color: white;
    }

    fieldset {
      margin-top: 20px;
      border: 1px solid #dee2e6;
      padding: 15px;
      border-radius: 5px;
    }

    legend {
      font-size: 1.1rem;
      font-weight: bold;
      padding: 0 10px;
      width: auto;
    }
  </style>
</head>
<body>

<a href="dashboard.php" class="back-btn">⬅ Back</a>

<div class="container">
  <h3 class="text-center mb-4">Add Weekly Training Timetable</h3>
  <form method="post">
    <div class="form-group">
      <label>Day</label>
      <input type="text" name="day" class="form-control" placeholder="e.g. Monday" required>
    </div>

    <fieldset>
      <legend>Morning Session</legend>
      <div class="form-group">
        <label>Time</label>
        <input type="text" name="morning_time" class="form-control" placeholder="e.g. 6 AM - 8 AM" required>
      </div>
      <div class="form-group">
        <label>Activity</label>
        <input type="text" name="morning_activity" class="form-control" placeholder="e.g. Warm-up + Nets" required>
      </div>
      <div class="form-group">
        <label>Coach Name</label>
        <input type="text" name="morning_coach" class="form-control" placeholder="Coach Name" required>
      </div>
    </fieldset>

    <fieldset>
      <legend>Evening Session</legend>
      <div class="form-group">
        <label>Time</label>
        <input type="text" name="evening_time" class="form-control" placeholder="e.g. 4 PM - 6 PM" required>
      </div>
      <div class="form-group">
        <label>Activity</label>
        <input type="text" name="evening_activity" class="form-control" placeholder="e.g. Fielding + Fitness" required>
      </div>
      <div class="form-group">
        <label>Coach Name</label>
        <input type="text" name="evening_coach" class="form-control" placeholder="Coach Name" required>
      </div>
    </fieldset>

    <button type="submit" name="submit" class="btn btn-primary mt-3">Add Timetable</button>
  </form>
</div>

<!-- Bootstrap JS for responsiveness -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
