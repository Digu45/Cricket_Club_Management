<?php
session_start();
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blaze Cricket Club</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/blaze-cricket-club.css" rel="stylesheet">
    <style>
        .msg {
            width: 100%;
            align-items: center;
            height: 30px;
            color: red;
            margin-bottom: 10px;
            font-size: 18px;
            text-align: center;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .form-container {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 600px;
            border: 2px solid #007bff;
            /* Add border */
        }

        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        .form-control {
            border: 2px solid #007bff;
            /* Add border */
            border-radius: 4px;
            padding: 10px;
            font-size: 16px;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .btn-primary {
            background-color: orange;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            color: white;
        }

        .navbar-brand-image {
            max-width: 50px;
        }

        .footer {
            background-color: #216382;
            /* color: white; */
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: 7vh;
        }

        .footer p {
            color: white;
        }

        .navbar {
            background-color: #64b8be;
            padding: 15px 20px;
            /* Responsive padding */
            position: fixed;
            top: 0px;
            width: 100%;
            z-index: 1000;
        }
/* General section styles */
.membership-section {
  background-color: #f8f9fa;
  padding: 40px 20px;
}

/* .container {
  max-width: 600px;
  margin: auto;
  background-color: #ffffff;
  border-radius: 12px;
  padding: 30px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Form header */
.container h2 {
  text-align: center;
  background-color:rgb(83, 147, 126);
  margin-bottom: 25px;
  color: #2d5871;
  border: 1px solid black;
}


.container button:hover {
  background-color: #1a3b4d;
} */

/* Labels and inputs */
form label {
  display: block;
  margin-bottom: 6px;
  margin-top: 15px;
  font-weight: bold;
  color: #333;
}

form input[type="text"],
form input[type="email"],
form input[type="number"],
form input[type="textarea"],
form textarea {
  width: 100%;
  padding: 10px 12px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 14px;
  box-sizing: border-box;
}

form input[type="textarea"] {
  resize: vertical;
}

/* Submit button */
.text-center {
  text-align: center;
  margin-top: 25px;
}

form input[type="submit"] {
  padding: 10px 30px;
  font-size: 16px;
  color: white;
  background-color: #2d5871;
  border: none;
  border-radius: 25px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

form input[type="submit"]:hover {
  background-color: #1a3b4d;
}

/* Responsive for small screens */
@media (max-width: 480px) {
  .container {
    padding: 20px;
  }

  form input[type="submit"] {
    width: 100%;
  }
}

    </style>
</head>

<body>

    <main>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="logo.html">
                    <img src="PngItem_3571362.png" class="navbar-brand-image img-fluid" alt="Blaze Cricket Club">
                    <span class="navbar-brand-text">
                        Blaze
                        <small>Cricket Club</small>

                    </span>
                </a>
                <!-- 
                <div class="d-lg-none ms-auto me-3">
                    <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="#offcanvasExample"
                        role="button" aria-controls="offcanvasExample">Member Login</a>
                </div> -->

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">About</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link click-scroll" href="membership.php">Membership</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link click-scroll" href="contact_blaze.php">Contact Us</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_6">Club Registration</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_6">Player Registration</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="gallery.html">Gallery</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Schedule</a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="upcoming_events.php">Event Listing</a></li>
                                <li><a class="dropdown-item" href="timetable_session.php">Sessions</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="members.php">Members</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="match_results.php">Match Results</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="notices.php">Notices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="profile.html">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="logout.html">Logout</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="offcanvas offcanvas-end" data-bs-scroll="true" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header"></div>
        </div>

        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                        <div class="card ms-4"
                            style="max-width: 400px; padding: 20px; border: 2px solid #000; border-radius: 15px; background-color: #87CEEB; color: #000;">
                            <div class="text-center">
                                <h5><strong>Welcome</strong></h5>
                                <h3><strong><?php echo $_SESSION['user_name']; ?></strong></h3>
                                <h5><strong>To the Club</strong></h5>
                            </div>
                        </div>





                        <h5 class="cd-headline rotate-1 text-white mb-4 pb-2">
                            <!-- <span>Blaze</span> -->
                            <span class="cd-words-wrapper">
                                <b class="is-visible"></b>
                            </span>
                            </h1>
                            <div class="custom-btn-group">
                                <a href="#section_2" class="btn custom-btn smoothscroll me-3" style="margin-left: 25%;">Our Story</a>
                            </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="ratio ratio-16x9">
                            <img src="main-qimg-0b1a1ad9f6a0a0082ce1df6f8b0fe436.jpeg" class="img-fluid"
                                alt="Cricket Image" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-section section-padding" id="section_2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-lg-5 mb-4">About Blaze Club</h2>
                    </div>
                    <div class="col-lg-5 col-12 me-auto mb-4 mb-lg-0">
                        <h3 class="mb-3">Blaze Club History</h3>
                        <p><strong>Since 1995</strong></p>
                        <p>Former Western Railways player and employee, Coach Dinesh Lad has been giving cricket
                            coaching in Mumbai since 1995. Coach Lad has produced cricket stars such as Rohit Sharma,
                            India's current captain, Shardul Thakur. His own son Siddhesh Lad is a Ranji Trophy winner.
                            He has molded nearly 80.</p>
                        <p>Blaze is ranked #3 in the top 10 cricket clubs in India. Dinesh Lad started Blaze Cricket
                            academy. To expand the business, he registered the firm as a public limited company.
                            Membership fees and rental incomes from facilities owned/leased by the company generated the
                            main revenues of the firm. The academy is doing great as some of the good players trained in
                            the academy are representing their states and zonal teams in reputed domestic cricket
                            leagues.</p>
                    </div>
                    <div class="col-lg-5 col-12 ms-auto mb-4 mb-lg-0">
                        <h3 class="mb-3">Blaze Club Facilities</h3>
                        <p><strong>Fabulous Facilities</strong></p>
                        <p>Blaze Club is an eco-friendly cricket club with superb facilities. The club has a large
                            cricket ground, multiple practice nets, a gym, and a swimming pool. The club is dedicated to
                            providing the best environment for cricket players to hone their skills. In addition to the
                            physical facilities, Blaze also provides training programs led by experienced coaches.</p>
                        <p>In-house facilities include a modern gym, a well-maintained cricket ground, high-quality
                            practice nets, and a canteen. Blaze Club also organizes cricket tournaments and leagues to
                            give players competitive experience.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="membership-section section-padding" id="section_6">
            <div class="container">
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


                    <div class="text-center">
                        <input type="submit" value="Register" name="sub" style="background-color: #2d5871; margin-bottom:20px;">
                    </div>
                </form>
            </div>
        </section>

        <footer class="footer text-center">
            <div class="container">
                <p class="mb-0">Powered By Blaze Cricket Club</p>
            </div>
        </footer>

        <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>