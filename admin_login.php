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

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $res = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($res) > 0) {
        $_SESSION['admin'] = $username;
        echo "<script>alert('Admin Login Successful'); window.location.href = 'dashboard.php';</script>";
        exit();
    } else {
        echo "<script>alert('Invalid Admin Credentials');</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 3.4.1 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background-image: url('images/admin.png'); /* Replace with actual path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            overflow-x: hidden;
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
            color: orange;
        }

        .admin-side-icon {
            position: fixed;
            top: 35%;
            font-size: 100px;
            color: rgba(72, 63, 63, 0.3);
            z-index: 1;
        }

        .admin-side-icon.left {
            left: 20px;
        }

        .admin-side-icon.right {
            right: 20px;
        }

        .login-box {
            position: relative;
            z-index: 2;
            background-color: rgba(185, 195, 198, 0.95);
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            margin-top: 60px;
            min-height: 480px;
        }

        h2 {
            text-align: center;
            color: #2d5871;
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 8px;
            font-size: 16px;
            height: 45px;
        }

        .btn-primary {
            background-color: #2d5871;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            padding: 10px;
        }

        .btn-primary:hover {
            background-color: #1a3b4d;
        }

        .login-icon {
            font-size: 60px;
            text-align: center;
            display: block;
            color: #2d5871;
            margin-bottom: 10px;
        }

        .label-icon {
            margin-right: 5px;
        }

        @media (max-width: 768px) {
            .admin-side-icon {
                display: none;
            }

            .login-box {
                margin-top: 40px;
                padding: 30px 20px;
            }

            h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>

<a href="login.php" class="back-btn">⬅ Back</a>

<!-- Side Icons -->
<div class="admin-side-icon left">🛡️</div>
<div class="admin-side-icon right">⚙️</div>

<!-- Login Form -->
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="login-box">
                <div class="login-icon">🔐</div>
                <h2>Admin Login</h2>
                <form method="post">
                    <label><span class="label-icon">🧑‍💼</span>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Admin Username" required><br>

                    <label><span class="label-icon">🔒</span>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required><br>

                    <button class="btn btn-primary btn-block" name="login">🔐 Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
