<?php
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
  $ms = $_POST['message'];

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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        background: url("https://e1.pxfuel.com/desktop-wallpaper/564/701/desktop-wallpaper-wonderful-cricket-ground-stadium.jpg");
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .main {
        width: 100%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .navbar {
        width: 100%;
        height: 50px;
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 20px;
        background: rgba(0, 0, 0, 0.6); /* Darker background for better contrast */
    }

    .navbar>span {
        color: #FFD700; /* Gold color for the title */
        font-size: 32px;
        font-weight: bold;
        letter-spacing: 10px;
    }

    .navbar>button {
        padding: 10px 20px;
        background: orange;
        border: 1px solid black;
        border-radius: 50px;
        transition: 0.3s ease-in-out;
    }

    .navbar>button:hover {
        color: black;
        background-color: white;
      }

    .navbar>button>a {
        font-size: 15px;
        color: black;
        text-decoration: none;
    }

    .form {
        width: 100%;
        max-width: 400px;
        padding: 30px;
        background: rgba(0, 0, 0, 0.8); /* Dark semi-transparent background */
        border-radius: 20px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.5);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .form h2 {
        text-align: center;
        color: #FFD700; /* Gold color for the heading */
        margin-bottom: 20px;
    }

    .form input {
        width: 100%;
        height: 40px;
        background: transparent;
        border: 1px solid #FFD700; /* Gold border */
        border-radius: 5px;
        margin-bottom: 15px;
        padding-left: 10px;
        color: #FFD700; /* Gold text color */
    }

    .form input::placeholder {
        color: #FFD700; /* Gold placeholder text */
    }

    .logbtn input {
        width: 100%;
        height: 45px;
        background: #FF4500; /* Orange-red button */
        border: none;
        border-radius: 5px;
        color: #fff; /* White text */
        font-size: 18px;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .logbtn input:hover {
        background: #FFD700; /* Gold hover effect */
        color: black; /* Black text on hover */
    }

    .msg {
        color: red;
        font-size: 14px;
        margin-bottom: 10px;
        text-align: center;
    }

    .form p {
        text-align: center;
        color: #FFD700; /* Gold text */
        margin-top: 10px;
    }

    .form p a {
        color: #FF4500; /* Orange-red links */
        text-decoration: none;
    }

    .form p a:hover {
        text-decoration: underline;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .navbar>span {
            font-size: 24px;
            letter-spacing: 5px;
        }

        .form {
            width: 90%;
            padding: 20px;
        }

        .navbar>button {
            width: 80px;
            height: 35px;
        }
    }

    @media (max-width: 480px) {
        .navbar>span {
            font-size: 18px;
            letter-spacing: 3px;
        }

        .navbar>button {
            padding: 5px 10px;
            font-size: 12px;
        }

        .form {
            padding: 15px;
        }

        .form h2 {
            font-size: 20px;
        }

        .form input {
            height: 35px;
        }

        .logbtn input {
            height: 40px;
            font-size: 16px;
        }
    }
</style>
</head>

<body>
  <div class="main">
    <div class="navbar">
      <button><a href="index.php">Back</a></button><span>BLAZE</span>
    </div>

    <div class="form">
      <form method="POST" enctype="multipart/form-data">
        <h2>Register Club</h2>
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="id" placeholder="Email-Id" required>
        <input type="password" name="pass" placeholder="Password" required>

        <div class="msg">
          <script>
            var message = "<?php echo $message; ?>";
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
