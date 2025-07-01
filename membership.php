<?php
$server = "localhost";
$username = "root";
$password = "";
$dbnm = "cricketclub";

$con = mysqli_connect($server, $username, $password, $dbnm);

if (!$con) {
  echo "Error connecting to server" . mysqli_connect_error();
}

$message = ""; // Variable to store alert message

// For Player Registration
if (isset($_POST['sub2'])) {
  $nm = $_POST['name'];
  $id = $_POST['email'];
  $phno = $_POST['phone'];
  $db = $_POST['dob'];
  $add = $_POST['address'];
  $mtype = $_POST['membershipType'];

  $regmsg = "";

  $sql = "INSERT INTO player_registration (Name,Email,Ph_No,DOB,Address,MType) VALUES ('$nm','$id', '$phno','$db','$add','$mtype');";
  if ($con->query($sql) == true) {
    $regmsg = "Thank You For Membership.";
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
  <title>Cricket Club Membership Form</title>
  
  <style>
    body {
      background-image: url("images/membership.png");
      background-size: cover;
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      position: relative;
    }

    .container {
      position: absolute;
      top: 20px;
      left: 20px;
    }

    .container > button {
      width: 100px;
      height: 40px;
      background-color:orange; /* Light blue */
      color: white;
      border: 1px solid orange; /* Darker blue */
      border-radius: 50px;
      transition: 0.3s ease-in-out;
      cursor: pointer;
    }

    .container > button:hover {
      background-color: white; /* Dark blue */
    }

    .container > button > a {
      font-size: 15px;
      text-decoration: none;
      color: black;
      display: block;
      text-align: center;
      line-height: 40px;
    }

    form {
      background: linear-gradient(90deg, hsla(259, 84%, 78%, 1) 0%, hsla(206, 67%, 75%, 1) 100%);

      padding: 20px; /* Adjusted padding for a lighter feel */
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
      width: 90%; /* Full width on mobile */
      max-width: 450px; /* Max width */
      position: relative;
    }

    /* Media query for further adjustments on smaller screens */
    @media (max-width: 567px) {
      form {
        width: 80%;
        height: auto;
        padding: 10px; /* Further reduced padding */
        border-radius: 10px; /* Smaller border radius */
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1); /* Even lighter shadow */
        max-width: 90%; /* Allow more space on very small screens */
      }
    }

    h2 {
      text-align: center;
      color: #2c3e50; /* Darker text */
      margin-bottom: 20px;
      font-size: 24px; /* Slightly smaller font size */
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #2c3e50;
      font-weight: bold;
    }

    input,
    select,
    textarea {
      width: calc(100% - 16px);
      padding: 10px;
      margin-bottom: 12px;
      box-sizing: border-box;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="date"] {
      height: 40px;
      font-size: 16px;
    }

    textarea {
      resize: vertical;
      font-size: 16px;
    }

    select {
      height: 40px;
      font-size: 16px;
    }

    .button1 input {
      background-color: #2a686e; 
      color: white;
      padding: 12px;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
      transition: 0.3s ease-in-out;
    }

    .button1 input:hover {
      background-color: #d35400; /* Darker orange */
    }

    .msg {
      width: 100%;
      height: 30px;
      color: #e74c3c; /* Error message color */
      margin-bottom: 10px;
      font-size: 18px;
      text-align: center;
    }

    /* Media Queries for Mobile Responsiveness */
    @media (max-width: 480px) {
      .container {
        top: 10px;
        left: 10px;
      }

      form {
        padding: 15px; /* Less padding on mobile */
      }

      h2 {
        font-size: 20px; /* Smaller heading on mobile */
      }

      .container > button {
        width: 80px; /* Smaller button width on mobile */
      }

      .button1 input {
        font-size: 16px; /* Smaller button text on mobile */
      }

      .msg {
        font-size: 16px; /* Smaller message text on mobile */
      }
    }

    /* Flexbox for Inline Inputs */
    .inline-inputs {
      display: flex;
      justify-content: space-between;
      gap: 10px; /* Space between inputs */
    }

    .inline-inputs input {
      flex: 1; /* Allow inputs to grow and take available space */
    }
  </style>
</head>

<body>
  <div class="container">
    <button><a href="main.php">Back</a></button>
  </div>
  <form>
    <h2>Club Membership Form</h2>

    <label for="name">Full Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <div class="inline-inputs">
      <div>
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>
      </div>
      <div>
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>
      </div>
    </div>

    <label for="address">Address:</label>
    <textarea id="address" name="address" rows="4" required></textarea>

    <label for="membershipType">Select Membership Type:</label>
    <select id="membershipType" name="membershipType">
      <option value="club">Select Membership</option>
      <option value="club">Club Membership - 5000rs/year</option>
      <option value="insurance">Club Insurance - 1800rs/year</option>
      <option value="facilities">Facilities Access - 1000rs/year</option>
    </select>

    <div class="msg">
      <script>
        var message = "<?php echo $regmsg; ?>";
        if (message != "") {
          document.write(message);
        }
      </script>
    </div>
    <div class="button1">
      <input type="button" class="btn btn-primary" value="Pay now" name="sub2" onclick="submitForm()">
    </div>
  </form>

  <div id="qrcode-container"></div>
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

  <script>
    function submitForm() {
      var qrCodeImageUrl = 'your-qr-code-image-url';
      window.location.href = 'qr_display.html?image=' + encodeURIComponent(qrCodeImageUrl);
    }
  </script>
</body>
</html>
