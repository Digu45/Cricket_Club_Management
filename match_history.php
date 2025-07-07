<?php
$server = "localhost";
$username = "root";
$password = "";
$dbnm = "cricketclub";

$con = mysqli_connect($server, $username, $password, $dbnm);

if (!$con) {
    echo "Error connecting to server" . mysqli_connect_error();
}

$sql = "SELECT * FROM add_matches ORDER BY match_date DESC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Match History</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
    body {
        font-family: Arial;
        background: #fff8dc;
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
</style>

</head>

<body>
    <a href="dashboard.php" class="back-btn">⬅ Back</a>

    <h2>Match History</h2>
    <div class="scrollable-table">
    <table>
        <tr>
            <th>ID</th>
            <th>Our Team</th>
            <th>Opponent Team</th>
            <th>Date</th>
            <th>Location</th>
            <th>Result</th>
            <th>Match Summary</th>
        </tr>
        <?php
        while ($match = mysqli_fetch_assoc($result)) {
            echo "<tr>
              <td>{$match['id']}</td>
     <td>Blaze Cricket Club</td>
        <td>{$match['opponent_team']}</td>
              <td>{$match['match_date']}</td>
              <td>{$match['location']}</td>
              <td>{$match['result']}</td>
              <td>{$match['match_summary']}</td>
            </tr>";
        }
        ?>
    </table>
    </div>

</body>

</html>