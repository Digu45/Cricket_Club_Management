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
  $opponent = $_POST['opponent'];
  $match_date = $_POST['match_date'];
  $location = $_POST['location'];
  $result = $_POST['result'];
  mysqli_query($con, "INSERT INTO add_matches (opponent_team, match_date, location, result) VALUES ('$opponent', '$match_date', '$location', '$result')");
  echo "<script>alert('Match Added');</script>";
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Match</title></head>
<style>
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
<body>
<a href="dashboard.php" class="back-btn">⬅ Back</a>

  <h2>Add Match Result</h2>
  <form method="post">
    <input name="opponent" placeholder="Opponent Team" required><br><br>
    <input type="date" name="match_date" required><br><br>
    <input name="location" placeholder="Location" required><br><br>
    <select name="result" required>
      <option value="">Select Result</option>
      <option value="Won">Won</option>
      <option value="Lost">Lost</option>
      <option value="Draw">Draw</option>
    </select><br><br>
    <button name="submit">Add Match</button>
  </form>
</body>
</html>
