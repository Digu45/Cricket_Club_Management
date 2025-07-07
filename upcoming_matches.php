<?php
$server = "localhost";
$username = "root";
$password = "";
$dbnm = "cricketclub";

$con = mysqli_connect($server, $username, $password, $dbnm);

if (!$con) {
    echo "Error connecting to server" . mysqli_connect_error();
}

// Fetch all scheduled matches
$sql = "SELECT * FROM add_scheduled_matches ORDER BY match_date ASC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Upcoming Matches</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f4f8ff;
      font-family: 'Segoe UI', Tahoma, sans-serif;
    }

    .container {
      margin-top: 40px;
    }

    .scroll-table {
      max-height: 450px;
      overflow-y: auto;
      border-radius: 10px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.1);
    }

    .table {
      margin-bottom: 0;
    }

    .table th {
      background-color: #007bff;
      color: white;
      position: sticky;
      top: 0;
    }

    .upcoming-row {
      background-color: #e6ffed; /* light green */
      font-weight: bold;
    }

    .past-row {
      background-color: #f0f0f0; /* grayish blur */
      color: #888;
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

    @media (max-width: 768px) {
      .table th, .table td {
        font-size: 13px;
      }
    }
    .upcoming-row {
  background-color: #d4edda; /* soft green */
  color: #155724;
  font-weight: 600;
  border-left: 6px solid #28a745;
}

.past-row {
  background-color: #f8f9fa; /* light gray */
  color: #6c757d;
  font-style: italic;
  opacity: 0.75;
}

  </style>
</head>
<body>
<a href="main.php" class="back-btn">⬅ Back</a>

<div class="container">
  <h4 class="text-center">
    <span style="display: inline-block; border: 3px solid #28a745; border-radius: 12px; padding: 10px 20px; background-color: #e9f7ef; color: #1b5e20;">
      🏏 Upcoming Matches
    </span>
  </h4>

  <div class="scroll-table table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Sr No</th>
          <th>Match Title</th>
          <th>Match Date</th>
          <th>Time</th>
          <th>Opponent Team</th>
          <th>Location</th>
          <th>Type</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
  <?php
  $i = 1;
  while ($row = mysqli_fetch_assoc($result)):
    $matchDate = strtotime($row['match_date']);
    $isUpcoming = $matchDate >= strtotime(date("Y-m-d"));
    $rowClass = $isUpcoming ? 'upcoming-row' : 'past-row';
  ?>
  <tr class="<?= $rowClass ?>">
    <td><?= $i++ ?></td>
    <td><?= $row['match_title'] ?></td>
    <td><?= date("F j, Y", $matchDate) ?></td>
    <td><?= $row['match_time'] ?></td>
    <td><?= $row['opponent_team'] ?></td>
    <td><?= $row['location'] ?></td>
    <td><?= $row['match_type'] ?></td>
    <td><?= $row['description'] ?></td>
  </tr>
  <?php endwhile; ?>
</tbody>


    </table>
  </div>
</div>

</body>
</html>
