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

$today = date('Y-m-d');
$query = "SELECT * FROM upcoming_events WHERE event_date >= '$today' ORDER BY event_date ASC";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upcoming Events</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      box-sizing: border-box;
    }
   


    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background: url('https://us.123rf.com/450wm/jpdccouk/jpdccouk2305/jpdccouk230500189/204011728-cricket-ball-and-bat-on-green-grass-field-3d-render.jpg?ver=6') no-repeat center center fixed;
      background-size: cover;
    }

    h2 {
      text-align: center;
      margin-top: 20px;
      font-size: 2rem;
      color: #fff;
      background: rgba(0, 0, 0, 0.5);
      display: inline-block;
      padding: 10px 30px;
      border-radius: 10px;
    }

    .table-container {
      margin: 30px auto;
      width: 95%;
      max-width: 1100px;
      background-color: rgba(255, 255, 255, 0.95);
      border-radius: 10px;
      overflow-x: auto;
      padding: 20px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 16px;
    }

    th, td {
      padding: 12px;
      border: 1px solid #ccc;
      text-align: left;
    }

    th {
      background-color: #444;
      color: #fff;
    }

    tr:hover {
      background-color: #f5f5f5;
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

    @media only screen and (max-width: 768px) {
      table {
        font-size: 14px;
      }

      h2 {
        font-size: 1.5rem;
        padding: 8px 20px;
      }

      .back-btn {
        padding: 8px 20px;
        font-size: 14px;
      }
    }

    @media only screen and (max-width: 480px) {
      th, td {
        padding: 8px;
      }

      h2 {
        font-size: 1.3rem;
      }

      .back-btn {
        margin: 10px;
      }
    }
  </style>
</head>
<body>

<a href="main.php" class="back-btn">⬅ Back</a>

<center><h2>Upcoming Events</h2></center>

<div class="table-container">
  <table>
    <thead>
      <tr>
        <th>Date</th>
        <th>Time</th>
        <th>Event Name</th>
        <th>Type</th>
        <th>Location</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (mysqli_num_rows($result) > 0) {
          while ($event = mysqli_fetch_assoc($result)) {
              echo "<tr>
                      <td>" . $event['event_date'] . "</td>
                      <td>" . $event['event_time'] . "</td>
                      <td>" . $event['event_name'] . "</td>
                      <td>" . $event['event_type'] . "</td>
                      <td>" . $event['location'] . "</td>
                      <td>" . $event['description'] . "</td>
                    </tr>";
          }
      } else {
          echo "<tr><td colspan='6' style='text-align:center;'>No upcoming events found.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
