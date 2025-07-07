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
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $date = $_POST['joining_date'];
  mysqli_query($con, "INSERT INTO add_members (name, email, mobile, joining_date) VALUES ('$name', '$email', '$mobile', '$date')");
  echo "<script>alert('Member Added Successfully');</script>";
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Member</title></head>
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

  <h2>Add Member</h2>
  <form method="post">
    <input name="name" placeholder="Full Name" required><br><br>
    <input name="email" placeholder="Email" required><br><br>
    <input name="mobile" placeholder="Mobile Number" required><br><br>
    <input type="date" name="joining_date" required><br><br>
    <button name="submit">Add Member</button>
  </form>
</body>
</html>
