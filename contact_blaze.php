<?php
$server = "localhost";
$username = "root";
$password = "";
$dbnm = "cricketclub";

$con = mysqli_connect($server, $username, $password, $dbnm);

if (!$con) {
  echo "Error connecting to server" . mysqli_connect_error();
} else {
  #echo "Connecting to the server";
}

// For Register Database

$message = ""; // Variable to store alert message

// For Player Registration
if (isset($_POST['sub1'])) {

  $nm = $_POST['name'];
  $id = $_POST['email'];
  $msg = $_POST['message'];


  //  echo "Jay Shree Ram";
  // Insert data into the database
  $sql = "INSERT INTO `Contact Blaze` (Name, Email, Message) VALUES ('$nm', '$id', '$msg');";
  // echo $sql;
  //$sql= "INSERT INTO `player_registration`(`sr`, `FirstName`, `LastName`, `Email`, `Age`, `Position`, `Address`, `Phone_No`) VALUES
  if ($con->query($sql) == true) {
    echo "<script>
                alert('Your Record Saved Successfully');
                window.location.href = 'main.php';
              </script>";
  } else {
    echo "Error inserting data: " . mysqli_error($con);
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cricket Academy Contact Form</title>
  <style>
    /* General Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-image: url("https://st.depositphotos.com/2288675/2452/i/450/depositphotos_24525711-stock-photo-cricket-bat-and-ball.jpg");
      background-size: cover;
      background-attachment: fixed;
      font-family: 'Arial', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    /* Form Container */
    form {
      background: rgba(255, 255, 255, 0.9);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
      margin: 20px;
    }

    h2 {
      color: #007bff;
      margin-bottom: 20px;
      text-align: center;
      font-size: 24px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #333;
      font-size: 16px;
    }

    input,
    textarea {
      width: 100%;
      padding: 12px;
      margin-bottom: 16px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 14px;
    }

    input[type="submit"] {
      background-color: #28a745;
      color: #fff;
      cursor: pointer;
      border: none;
      padding: 12px;
      border-radius: 8px;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #218838;
    }

    /* Back Button */
    button {
      position: absolute;
      top: 10px;
      left: 10px;
      background-color: #ff9800;
      border: 1px solid orange;
      padding: 10px 20px;
      border-radius: 50px;
      cursor: pointer;
      font-size: 16px;
      color: #fff;
      transition: background-color 0.3s ease-in-out;
    }

    button:hover {
      background-color:white;
    }

    button a {
      color:black;
      text-decoration: none;
      font-family: Arial, Helvetica, sans-serif;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
      form {
        width: 100%;
        margin: 10px;
      }

      button {
        font-size: 14px;
        padding: 8px 16px;
      }

      h2 {
        font-size: 20px;
      }
    }

    @media (max-width: 576px) {
      form {
        padding: 20px;
      }

      input,
      textarea {
        padding: 10px;
        font-size: 14px;
      }

      input[type="submit"] {
        font-size: 14px;
        padding: 10px;
      }

      button {
        font-size: 12px;
        padding: 6px 12px;
      }
     
    }
  </style>
</head>

<body>
  <button><a href="main.php">Back</a></button>
  <form action="#" method="POST">
    <h2>Contact Blaze</h2>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="Enter your full name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" rows="4" placeholder="Write your message" required></textarea>

    <input type="submit" value="Submit" name="sub1">
  </form>
</body>

</html>
