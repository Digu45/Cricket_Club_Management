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
  mysqli_query($con, "INSERT INTO add_notices (title, description, date_posted) VALUES ('$title', '$desc', '$date')");
  echo "<script>alert('Notice Added');</script>";
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Notice</title></head>
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

  <h2>Add Notice</h2>
  <form method="post">
    <input name="title" placeholder="Notice Title" required><br><br>
    <textarea name="description" placeholder="Notice Description" required></textarea><br><br>
    <button name="submit">Add Notice</button>
  </form>
</body>
</html>
