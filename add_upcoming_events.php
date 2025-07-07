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
    $name = $_POST['event_name'];
    $type = $_POST['event_type'];
    $date = $_POST['event_date'];
    $time = $_POST['event_time'];
    $location = $_POST['location'];
    $desc = $_POST['description'];

    $sql = "INSERT INTO upcoming_events (event_name, event_type, event_date, event_time, location, description)
            VALUES ('$name', '$type', '$date', '$time', '$location', '$desc')";

    if (mysqli_query($con, $sql)) {
        $msg = "✅ Event added successfully!";
    } else {
        $msg = "❌ Failed to add event: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Upcoming Event</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #f7f7f7, #d4ecff);
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
      background: white;
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
      border: 1px solid #aaa;
      border-radius: 5px;
      font-size: 15px;
    }

    textarea {
      resize: vertical;
    }

    .btn {
      margin-top: 20px;
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 50px;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    .msg {
      text-align: center;
      font-weight: bold;
      margin-top: 10px;
      color: green;
    }

    @media (max-width: 600px) {
      .container {
        padding: 15px;
      }

      .back-btn {
        padding: 8px 16px;
        font-size: 14px;
      }

      h2 {
        font-size: 20px;
      }

      .btn {
        font-size: 15px;
        padding: 10px;
      }
    }
  </style>
</head>
<body>

<a href="dashboard.php" class="back-btn">⬅ Back</a>

<div class="container">
  <h2>Add Upcoming Event</h2>

  <?php if (!empty($msg)) echo "<div class='msg'>$msg</div>"; ?>

  <form method="post">
    <label>Event Name</label>
    <input type="text" name="event_name" required>

    <label>Event Type</label>
    <select name="event_type" required>
      <option value="">-- Select Type --</option>
      <option value="Match">Match</option>
      <option value="Tournament">Tournament</option>
      <option value="Practice">Practice</option>
      <option value="Training">Training</option>
      <option value="Other">Other</option>
    </select>

    <label>Event Date</label>
    <input type="date" name="event_date" required>

    <label>Event Time</label>
    <input type="text" name="event_time" placeholder="e.g., 10:00 AM" required>

    <label>Location</label>
    <input type="text" name="location" required>

    <label>Description</label>
    <textarea name="description" rows="4" placeholder="Optional notes..."></textarea>

    <button type="submit" class="btn" name="submit">Add Event</button>
  </form>
</div>

</body>
</html>
