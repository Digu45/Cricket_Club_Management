<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel - Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    body {
      background-image:url('images/dashboard.jpg');
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
      margin-top: 50px;
    }

    h2 {
      margin-bottom: 40px;
      color: #003366;
      font-weight: bold;
    }

    .dashboard-card {
      background: #ffffff;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: 0.3s ease-in-out;
      padding: 25px;
      margin-bottom: 30px;
      height: 180px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      text-align: left;
    }

    .dashboard-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .card-icon {
      font-size: 30px;
      margin-bottom: 10px;
    }

    .card-title {
      font-size: 20px;
      font-weight: bold;
    }

    .card-text {
      font-size: 14px;
      color: #555;
    }

    @media (max-width: 768px) {
      .dashboard-card {
        height: auto;
      }
    }
  </style>
</head>
<body>


<nav class="navbar navbar-default" style="background-color:rgb(167, 211, 212); border: none; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="font-weight: bold; color: #000;">
        <img src="images/PngItem_3571362.png" alt="Logo" style="width:30px; display:inline-block; margin-right: 10px;">
        Blaze Cricket Club
      </a>
    </div>

    <ul class="nav navbar-nav navbar-right">
        <!-- Registered Player link -->
  <li>
    <a href="registered_players.php" style="font-weight: bold;">
      <span class="glyphicon glyphicon-education"></span> Registered Player
    </a>
  </li>

  <!-- Match History link -->
  <li>
    <a href="match_history.php" style="font-weight: bold;">
      <span class="glyphicon glyphicon-list-alt"></span> Match History
    </a>
  </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-weight: bold;">
          <span class="glyphicon glyphicon-user"></span> Profile <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Logged in as: <strong><?= $_SESSION['admin'] ?></strong></a></li>
          <li class="divider"></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>


<div class="container text-center">
  <h2>Welcome, <?= $_SESSION['admin'] ?>! 🎉</h2>
  <div class="row">

 

<div class="col-xs-12 col-sm-6 col-md-4">
  <a href="add_notice.php" class="dashboard-card" style="background-color: #FFA500;">
    <div class="card-icon">📢</div>
    <div class="card-title">Add Notice</div>
    <div class="card-text">Post important announcements for members.</div>
  </a>
</div>

<div class="col-xs-12 col-sm-6 col-md-4">
  <a href="add_match.php" class="dashboard-card" style="background-color: #17a2b8;">
    <div class="card-icon">🏏</div>
    <div class="card-title">Add Match</div>
    <div class="card-text">Schedule new matches with date, time, and location.</div>
  </a>
</div>

<div class="col-xs-12 col-sm-6 col-md-4">
  <a href="add_member.php" class="dashboard-card" style="background-color: #28a745;">
    <div class="card-icon">👥</div>
    <div class="card-title">Add Member</div>
    <div class="card-text">Register a new club member with their details.</div>
  </a>
</div>

<div class="col-xs-12 col-sm-6 col-md-4">
  <a href="add_training_session.php" class="dashboard-card" style="background-color: #20c997;">
 
    <div class="card-icon">📅</div>
    <div class="card-title">Add Timetable</div>
    <div class="card-text">Add or update daily training sessions for the week.</div>
  </a>
</div>
<div class="col-xs-12 col-sm-6 col-md-4">
  <a href="add_weekly_training_plan.php" class="dashboard-card" style="background-color:rgb(170, 198, 108);">
    <div class="card-icon">🧑‍🏫</div>
    <div class="card-title">Add Training</div>
    <div class="card-text">Plan coaching or training sessions for players.
    </div>
  </a>
</div>
<div class="col-xs-12 col-sm-6 col-md-4">
<a href="add_upcoming_events.php" class="dashboard-card" style="background-color:rgb(98, 140, 136);">
  <div class="card-icon">📅</div>
  <div class="card-title">Upcoming Events</div>
  <div class="card-text">View scheduled matches & training</div>
</a>
</div>

<div class="col-xs-12 col-sm-6 col-md-4">
<a href="add_scheduled_matches.php" class="dashboard-card" style="background-color:rgb(154, 170, 169);">
  <div class="card-icon">📅</div>
  <div class="card-title">Sceduled Matches</div>
  <div class="card-text">View Scheduled Matches</div>
</a>
</div>

<div class="col-xs-12 col-sm-6 col-md-4">
  <a href="logout.php" class="dashboard-card" style="background-color: #dc3545;">
    <div class="card-icon">🔐</div>
    <div class="card-title">Logout</div>
    <div class="card-text">Log out from the admin panel securely.</div>
  </a>
</div>





  </div>
</div>

</body>
</html>
