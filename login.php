<?php
$server = "localhost";
$username = "root";
$password = "";
$dbnm = "cricketclub";

$con = mysqli_connect($server, $username, $password, $dbnm);

if (!$con) {
    echo "Error connecting to server" . mysqli_connect_error();
}

//for login page

if (isset($_POST['sub'])) {
    $id = $_POST['id'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM register1 WHERE email='$id' AND password='$pass'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Redirect to another page upon successful login
        echo "<script>
                alert('Login Successful');
                window.location.href = 'main.php';
              </script>";
        exit();
    } else {
        echo "<script>
        alert('Id or Password do not Match');
        window.location.href = 'login.php';
      </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
        }

        .main {
            width: 100vw;
            height: 100vh;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.2) 50%, rgba(0, 0, 0, 0.2) 50%), url("https://png.pngtree.com/thumb_back/fh260/background/20230407/pngtree-cricket-background-image_2208069.jpg");
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
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

        .form {
            width: 350px;
            background:linear-gradient(to right top, #57aecc, #30a3aa, #329580, #498454, #5d702e);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
            color: white;
        }

        .form h2 {
            font-family: Arial, Helvetica, sans-serif;
            color: rgb(231, 155, 15);
            font-size: 24px;
            margin-bottom: 20px;
            background-color: white;
            padding: 10px;
            border-radius: 50px;
        }

        .form input {
            width: 100%;
            height: 35px;
            background: transparent;
            border: none;
            border-bottom: 1px solid white;
            margin-top: 20px;
            font-size: 15px;
            letter-spacing: 1px;
            font-family: sans-serif;
            color: #fff;
            padding: 0 10px;
        }

        .form input::placeholder {
            color: #fff;
        }

        .logbtn {
            margin-top: 30px;
        }

        .logbtn input {
            width: 100%;
            height: 40px;
            background: orange;
            border: 1px solid black;
            color: black;
            font-size: 18px;
            font-weight: bold;
            border-radius: 50px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        .logbtn input:hover {
            background-color: white;
        }

        .form .link {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17px;
            margin-top: 20px;
            color: #fff;
        }

        .logbtnsec {
            width: 100%;
            height: 40px;
            border: 1px solid black;
            border-radius: 50px;
            background: orange;
            margin-top: 10px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        .logbtnsec a {
            text-decoration: none;
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;
            color: black;
            font-weight: bold;
            display: block;
            line-height: 40px;
        }

        .logbtnsec:hover {
            background-color: white;
        }

        .msg {
            height: 30px;
            margin-top: 10px;
            color: red;
        }

        @media only screen and (max-width: 600px) {
            .form {
                width: 90%;
                padding: 20px;
            }

            .navbar button {
                width: 80px;
                height: 35px;
            }

            .navbar button a {
                font-size: 13px;
            }

            .form h2 {
                font-size: 20px;
            }

            .logbtn input,
            .logbtnsec a {
                font-size: 16px;
            }

            .form input {
                height: 30px;
                font-size: 14px;
            }
        }

        @media only screen and (max-width: 400px) {
            .form {
                width: 95%;
                padding: 15px;
            }

            .form h2 {
                font-size: 18px;
            }

            .logbtn input,
            .logbtnsec a {
                font-size: 14px;
            }

            .form input {
                height: 28px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="navbar">
            <button><a href="register.php">Back</a></button>
        </div>

        <div class="form">
            <h2>Login Here</h2>
            <form method="post">
                <input type="email" name="id" placeholder="Email-Id" required>
                <input type="password" name="pass" placeholder="Password" required><br>
                <div class="msg">
                    <script>
                        var message = "<?php echo $msg; ?>";
                        if (message != "") {
                            document.write(message);
                        }
                    </script>
                </div>

                <div class="logbtn">
                    <input type="submit" name="sub" value="Login">
                </div>
            </form>
            <p class="link">Don't have an account?</p><br>
            <button class="logbtnsec"><a href="register.php">Register Club</a></button>
        </div>
    </div>
</body>

</html>