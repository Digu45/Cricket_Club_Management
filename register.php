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

if (isset($_POST['sub'])) {
  $nm = $_POST['name'];
  $id = $_POST['id'];
  $pass = $_POST['pass'];
  $ms = $_POST['message'] ?? '';

  $check_query = "SELECT * FROM register1 WHERE email='$id'";
  $result = mysqli_query($con, $check_query);

  if (mysqli_num_rows($result) > 0) {
    echo "<script>
      alert('*Username already exists*');
      window.location.href = 'register.php';
    </script>";
  } else {
    $sql = "INSERT INTO register1 (name,email,password,comment,date) VALUES ('$nm','$id', '$pass','$ms',NOW());";

    if ($con->query($sql) == true) {
      $_SESSION['user_name'] = $nm;
      echo "<script>
                alert('Account Created Successfully');
                window.location.href = 'login.php';
              </script>";
    } else {
      echo "Error inserting data: " . mysqli_error($con);
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Create Account</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html,
    body {
      height: 100%;
      overflow: hidden;
      /* prevents scroll */
      font-family: Arial, sans-serif;
    }

    .main {
      height: 100vh;
      width: 100vw;
      background: linear-gradient(135deg, #74ebd5, #acb6e5, #f5b2ca, #fdd6bd);
      background-size: 400% 400%;
      animation: gradientFlow 12s ease infinite;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    @keyframes gradientFlow {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }
    

    .navbar {
      position: absolute;
      top: 20px;
      left: 20px;
      width: calc(100% - 40px);
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
      z-index: 10;
      background-color: #2c3e50;
    }

    .navbar>span {
      font-size: 32px;
      font-weight: bold;
      letter-spacing: 6px;
      color: #ffffff;
      text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.4);
    }

    .navbar button {
      width: 100px;
      height: 50px;
      background-color: orange;
      margin: 5px;
      border: 1px solid orange;
      border-radius: 50px;
      transition: 0.3s ease-in-out;
      font-weight: bold;
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


    .form {
      width: 100%;
      max-width: 450px;
      padding: 30px;
      background-color: #fff;
      border-radius: 16px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }

    .form h2 {
      text-align: center;
      margin-bottom: 25px;
      font-size: 24px;
      color: #2c3e50;
    }

    .form input {
      width: 100%;
      height: 40px;
      padding: 0 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
    }

    .form input::placeholder {
      color: #999;
    }

    .logbtn input {
      width: 100%;
      height: 42px;
      background: #f39c12;
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }

    .logbtn input:hover {
      background-color: #ffd700;
      color: black;
    }

    .form p {
      text-align: center;
      font-size: 14px;
      margin-top: 10px;
    }

    .form p a {
      color: #007acc;
      text-decoration: none;
      transition: transform 0.2s ease-in-out;
      display: inline-block;
    }

    .form p a:hover {
      text-decoration: underline;
      transform: scale(1.05);
    }

    @media (max-width: 500px) {
      .form {
        padding: 20px;
        max-width: 90%;
      }


    }

    @media (max-width: 500px) {
      .navbar>span {
        font-size: 22px;
        letter-spacing: 4px;
      }

      .navbar button {
        width: 80px;
        height: 40px;
      }

      .navbar button a {
        font-size: 13px;
        line-height: 35px;
      }
    }
  </style>
</head>

<body>
  <div class="main">
    <div class="navbar">
      <button><a href="index.php">⬅ Back</a></button>
      <span>BLAZE</span>
    </div>

    <div class="form">
      <form method="POST" enctype="multipart/form-data">
        <h2>Register Club</h2>
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="id" placeholder="Email-Id" required>
        <input type="password" name="pass" placeholder="Password" required>

        <div class="msg">
          <script>
            var message = "<?php echo $message ?? ''; ?>";
            if (message != "") {
              document.write(message);
            }
          </script>
        </div>

        <div class="logbtn">
          <input type="submit" name="sub" value="Submit">
        </div>

        <p>Already registered? <a href="login.php">Login here</a></p>
      </form>
    </div>
  </div>
</body>

</html>