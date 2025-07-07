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
    $id = $_POST['id'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM register1 WHERE email='$id' AND password='$pass'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_name']  = $row['name'];

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
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #acb6e5, #f5b2ca, #fdd6bd);
            background-size: 400% 400%;
            animation: gradientFlow 12s ease infinite;
            display: flex;
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

        .login-container {
            width: 100%;
            max-width: 500px;
            background-color:rgb(213, 212, 212);
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.25);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group input {
            width: 100%;
            height: 45px;
            padding: 0 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            font-size: 16px;
        }

        .form-group input:focus {
            border-color: #3498db;
        }

        .login-btn {
            width: 100%;
            background-color: #f39c12;
            border: none;
            padding: 14px;
            font-size: 18px;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: bold;
        }

        .login-btn:hover {
            background-color: #e67e22;
        }

        .extra-links {
            text-align: center;
            margin-top: 25px;
        }

        .extra-links a:hover {
            text-decoration: underline;
            transform: scale(1.1);
        }

        .extra-links a {
            display: inline-block;
            transition: transform 0.2s ease-in-out;
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


        @media (max-width: 500px) {
            .login-container {
                padding: 30px 20px;
            }

            .login-container h2 {
                font-size: 24px;
            }

            .form-group input {
                height: 40px;
                font-size: 15px;
            }

            .login-btn {
                font-size: 16px;
            }
        }

        .admin-box {
            margin-top: 20px;
            border: 2px solid #007acc;
            border-radius: 10px;
            padding: 10px 20px;
            display: inline-block;
            transition: 0.3s ease-in-out;
            background-color: rgb(211, 216, 221);
            box-shadow: 0 4px 10px rgba(0, 122, 204, 0.1);
        }

        .admin-box:hover {
            background-color: #e6f3ff;
            box-shadow: 0 6px 14px rgba(0, 122, 204, 0.2);
            transform: scale(1.05);
        }

        .admin-box a {
            color: #007acc;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: transform 0.2s ease-in-out;
            display: inline-block;
        }

        .admin-box a:hover {
            text-decoration: underline;
            transform: scale(1.05);
        }
    </style>
</head>

<body>

    <div class="navbar">
        <button><a href="register.php">⬅ Back</a></button>
    </div>

    <div class="login-container">
        <h2>Club Member Login</h2>
        <form method="post">
            <div class="form-group">
                <input type="email" name="id" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <input type="password" name="pass" placeholder="Enter your password" required>
            </div>
            <button type="submit" name="sub" class="login-btn">Login</button>
        </form>

        <div class="extra-links">
            <a href="register.php">Don't have an account? Register Club</a><br>
            <div class="admin-box">
                <a href="admin_login.php">Admin Login</a>
            </div>
        </div>
    </div>

</body>

</html>