<?php
$server = "localhost";
$username = "root";
$password = "";
$dbnm = "cricketclub";

$con = mysqli_connect($server, $username, $password, $dbnm);

if (!$con) {
    echo "Error connecting to server" . mysqli_connect_error();
}


$result = mysqli_query($con, "SELECT * FROM timetable_sessions ORDER BY 
  FIELD(day, 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday')");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cricket Timetable</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
html, body {
    height: 100%;
    margin: 4px;
    padding: 0;
}

body {
    background-image: url("pngtree-d-illustration-of-a-cricket-stadium-showcasing-the-lush-outfield-and-image_3701620.jpg");
    background-size: cover;            /* Ensures image covers entire screen */
    background-repeat: no-repeat;      /* No repeating */
    background-position: center center;/* Centers image horizontally & vertically */
    background-attachment: fixed;      /* Optional: image stays fixed on scroll */
}

  h2 {
    text-align: center;
    margin: 20px;
    color: #000;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    background: rgba(197, 215, 227, 0.9);
  }
  th, td {
    padding: 10px;
    border: 1px solid #aaa;
    text-align: left;
  }
  th {
    background-color: #f0f0f0;
  }
  .navbar {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .navbar button {
            width: 100px;
            height: 40px;
            background-color: orange;
            border: 1px solid orange;
            border-radius: 50px;
            transition: 0.3s ease-in-out;
        }

        .navbar button:hover {
            color: black;
            background: #ffffff;
        }

        .navbar button a {
            font-size: 15px;
            font-family: Arial, Helvetica, sans-serif;
            text-decoration: none;
            color: black;
            display: block;
            text-align: center;
            line-height: 40px;
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
        width: 100%;
        overflow-x: auto;
        border: 1px solid #ccc;
        background: white;
        border-radius: 5px;
        margin: auto;
    }

    table {
        width: 100%;
        min-width: 700px;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #aaa;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #ffe0b3;
    }

    @media (max-width: 768px) {
        th,
        td {
            font-size: 14px;
            padding: 8px;
        }
    }

    @media (max-width: 480px) {
        th,
        td {
            font-size: 13px;
            padding: 6px;
        }
    }
    @media (max-width: 768px) {
    body {
        background-attachment: scroll;  /* Removes fixed background on mobile */
    }
}

</style>

</head>
<body>



  <a href="main.php" class="back-btn">⬅ Back</a>


  <h2>Club Timetable</h2>
  <div class="scrollable-table">
  <table>
    <tr>
      <th>Day</th>
      <th>Morning Session</th>
      <th>Evening Session</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?= $row['day'] ?></td>
        <td>
          <?= $row['morning_time'] ?> - <?= $row['morning_activity'] ?><br>
          <strong>Coach:</strong> <?= $row['morning_coach'] ?>
        </td>
        <td>
          <?= $row['evening_time'] ?> - <?= $row['evening_activity'] ?><br>
          <strong>Coach:</strong> <?= $row['evening_coach'] ?>
        </td>
      </tr>
    <?php } ?>
  </table>
  </div>

</body>
</html>
