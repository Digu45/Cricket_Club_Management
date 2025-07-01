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


$message = ""; // Variable to store alert message

// For Player Registration
if (isset($_POST['sub'])) {

  $fnm = $_POST['fName'];
  // $lnm = $_POST['lastName'];
  $id = $_POST['email'];
  $ag = $_POST['age'];
  // $gen = $_POST['gender'];  
  $pos = $_POST['position'];
  $add = $_POST['address'];
  $phno = $_POST['phoneNumber'];


  // Insert data into the database
  $sql = "INSERT INTO player_registration (FullName,Email,Age,Position,Address,Phone_No) VALUES ('$fnm','$id','$ag','$pos','$add','$phno');";
  // echo $sql;
  //$sql= "INSERT INTO `player_registration`(`sr`, `FirstName`, `LastName`, `Email`, `Age`, `Position`, `Address`, `Phone_No`) VALUES
  if ($con->query($sql) == true) {
    echo "<script>
                alert('Registered Successfully');
                window.location.href = 'main.php';
              </script>";
    // $regmsg = "You Register Successfully.";
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
  <title>Cricket Player Registration</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    body {
      background-image: url("https://t4.ftcdn.net/jpg/03/69/85/87/360_F_369858767_Bgb4XiQUvX6jOsJXEJHN8jGv2PJXGuaH.jpg");
      background-size: cover;
      background-attachment: fixed;
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 500px;
      height: auto;
      margin: 5px auto;
      background: linear-gradient(to right top, #697671, #67897f, #619c8e, #55b0a0, #3ec4b4);
      margin-top: 30px;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
      position: relative;
    }

    button {
      position: fixed;
      top: 10px;
      left: 10px;
      background-color: orange;
      border: none;
      padding: 10px 20px;
      border-radius: 50px;
      cursor: pointer;
      font-size: 16px;
      color: #fff;
      border: 1px solid orange;
      transition: background-color 0.3s ease;
      z-index: 1000;
    }

    button:hover {
      background-color: white;
    }

    button a {
      color: black;
      text-decoration: none;
      /* font-family: Arial, Helvetica, sans-serif; */
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin: 10px 0 5px;
      color: #555;
    }

    input,
    textarea {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      cursor: pointer;
      border: none;
      padding: 12px;
      border-radius: 8px;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    input:hover {
      background-color: #f0f0f0;
    }

    textarea {
      resize: vertical;
      height: 100px;
    }

    .msg {
      width: 100%;
      color: red;
      margin-bottom: 15px;
      font-size: 18px;
      text-align: center;
    }

    /* Media Queries for Mobile Responsiveness */
    @media (max-width: 600px) {
      .container {
        max-width: 90%;
        margin: 20px auto;
        padding: 20px;
        margin-top: 70px;
      }

      button {
        top: 10px;
        left: 10px;
        padding: 8px 16px;
        font-size: 14px;
      }

      h2 {
        font-size: 20px;
        margin-bottom: 15px;
      }

      label {
        margin: 8px 0 4px;
      }

      input,
      textarea {
        padding: 10px;
        margin-bottom: 10px;
      }

      input[type="submit"] {
        padding: 10px;
        font-size: 14px;
      }

      .msg {
        font-size: 16px;
      }
    }
  </style>
  <script>
    function validateForm() {
      var mobile = document.getElementById("phoneNumber").value;
      var mobilePattern = /^[0-9]{10}$/;
      if (!mobilePattern.test(mobile)) {
        alert("Please enter a valid 10-digit mobile number.");
        return false;
      }

      var email = document.getElementById("email").value;
      var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
      }
      return true;
    }
  </script>

</head>

<body>

  <div class="container">
    <button><a href="main.php">Back</a></button>
    <h2>Cricket Player Registration</h2>
    <form action=" " method="POST" onsubmit="return validateForm()">
      <b><label for="firstName">Full Name:</label></b>
      <input type="text" id="firstName" name="fName" required>

      <!-- <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" required> -->

      <b><label for="lastName">Email:</label></b>
      <input type="email" id="email" name="email" required>

      <b><label for="age">Age:</label></b>
      <input type="number" id="age" name="age" required>


      <b><label for="position">Playing Position:</label></b>
      <b></b><input type="text" id="position" name="position" required>

      <b><label for="address">Address:</label></b>
      <input type="textarea" rows="3" cols="50" id="address" name="address" placeholder="Enter Address Here" required>

      <b><label for="phoneNumber">Phone Number:</label></b>
      <input type="number" id="phoneNumber" name="phoneNumber" pattern="[0-9]{10}" required>

      <!-- <label for="qualification">Qualification:</label>
    <input type="text" id="qualification" name="qualification" required> -->

      <!-- <div class="msg">
          
                <script>
                      var message = "<?php echo $regmsg; ?>";
                      if(message!="")
                          {
                              document.write(message);
                          }
                  </script>
          </div> -->

      <div class="text-center">
        <input type="submit" value="Register" name="sub" style="background-color: #2d5871;">
      </div>
    </form>
  </div>

</body>

</html>