<?php
$server = "localhost";
$username = "root";
$password = "";
$dbnm = "cricketclub";

$con = mysqli_connect($server, $username, $password, $dbnm);

if (!$con) {
  echo "Error connecting to server" . mysqli_connect_error();
}

$query = "SELECT * FROM player_registration";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Registered Players</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
  body {
    font-family: Arial;
    background:rgb(224, 233, 241);
    padding: 20px;
  }

  h2 {
    text-align: center;
    margin-bottom: 20px;
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

  .scrollable-table {
    width: 95%;
    margin: auto;
    overflow-x: auto;
    max-height: 400px;
    border: 1px solid #ccc;
    background: white;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    min-width: 800px;
  }

  th, td {
    border: 1px solid #aaa;
    padding: 10px;
    text-align: left;
  }

  th {
    background-color: #cce5ff;
  }

  @media (max-width: 768px) {
    th, td {
      padding: 8px;
      font-size: 14px;
    }
  }

  @media (max-width: 480px) {
    th, td {
      padding: 6px;
      font-size: 12px;
    }
  }
</style>

</head>


<body>
  <a href="main.php" class="back-btn">⬅ Back</a>


  <h2>Registered Players</h2>
  <div class="scrollable-table">
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Age</th>
      <th>Role</th>
      <th>Address</th>
      <th>Contact</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
              <td>{$row['sr']}</td>
              <td>{$row['FullName']}</td>
              <td>{$row['Email']}</td>
              <td>{$row['Age']}</td>
              <td>{$row['Position']}</td>
              <td>{$row['Address']}</td>
              <td>{$row['Phone_No']}</td>
            </tr>";
    }
    ?>
  </table>
  </div>

</body>

</html>