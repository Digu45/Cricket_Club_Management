<?php
$server = "localhost";
$username = "root";
$password = "";
$dbnm = "cricketclub";

$con = mysqli_connect($server, $username, $password, $dbnm);

if (!$con) {
    echo "Error connecting to server: " . mysqli_connect_error();
} else {
    // Connection successful
}

$message = ""; // Variable to store alert message

// For Club Registration
if (isset($_POST['club-reg-button'])) {
    $cnm = $_POST['clubnm'];
    $date = $_POST['date'];
    $hNo = $_POST['houseNo'];
    $location = $_POST['location'];
    $dc = $_POST['district'];
    $postC = $_POST['postCode'];



    // Insert data into the database
    $sql = "INSERT INTO club_registration (clubName, date, HouseNo, location, dist, postCode) 
            VALUES ('$cnm', '$date', '$hNo', '$location', '$dc', '$postC')";

    if ($con->query($sql) === TRUE) {
        echo "<script>
                alert('Club Registered Successfully');
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
            height:7vh;
        }
        .footer p{
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
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="membership.php">Membership</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="contact_blaze.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_6">Club Registration</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="playerregistration.php">Player Registration</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="gallery.html">Gallery</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Schedule</a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="event-listing.html">Event Listing</a></li>
                                <li><a class="dropdown-item" href="event-detail.html">Event Detail</a></li>
                                <li><a class="dropdown-item" href="timetable.html">Sessions</a></li>
                            </ul>
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
                        <h2 class="text-white">Welcome to the club</h2>
                        <h1 class="cd-headline rotate-1 text-white mb-4 pb-2">
                            <span>Blaze</span>
                            <span class="cd-words-wrapper">
                                <b class="is-visible"></b>
                            </span>
                        </h1>
                        <div class="custom-btn-group">
                            <a href="#section_2" class="btn custom-btn smoothscroll me-3">Our Story</a>
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
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-lg-5 mb-4"><u style="color: #ABBDFF;">Club Registration</u></h2>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="form-container">
                            <form action="" method="post">

                                <div class="mb-3">
                                    <label for="clubnm" class="form-label">Club Name</label>
                                    <input type="text" class="form-control" id="clubnm" name="clubnm" required>
                                </div>
                                <div class="mb-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="houseNo" class="form-label">House Number</label>
                                    <input type="text" class="form-control" id="houseNo" name="houseNo" required>
                                </div>
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" required>
                                </div>
                                <div class="mb-3">
                                    <label for="district" class="form-label">District</label>
                                    <input type="text" class="form-control" id="district" name="district" required>
                                </div>
                                <div class="mb-3">
                                    <label for="postCode" class="form-label">Post Code</label>
                                    <input type="text" class="form-control" id="postCode" name="postCode" required>
                                </div>
                                <button type="submit" name="club-reg-button" class="btn btn-primary">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
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