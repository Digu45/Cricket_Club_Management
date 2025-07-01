<?php
$server = "localhost";
$username = "root";
$password = "";
$dbnm = "cricketclub";

$con = mysqli_connect($server, $username, $password, $dbnm);

if (!$con) {
    echo "Error connecting to server" . mysqli_connect_error();
} else {
    // echo "Connecting to the server";
}


$message = ""; // Variable to store alert message


// For Club Registration
if (isset($_POST['club-reg-button'])) 
{
    
    $cnm = $_POST['clubnm'];
    $date = $_POST['date'];
    $hNo = $_POST['houseNo'];
    $location = $_POST['location'];  
    $dc = $_POST['district'];  
    $postC = $_POST['postCode'];  

    $regmsg="";

        // Insert data into the database
        $sql = "INSERT INTO club_registration (clubName,date,HouseNo,location, dist,postCode) VALUES ('$cnm','$date', '$hNo','$location','$dc','$postC')";

        if ($con->query($sql) == true) 
        {
            $regmsg = "Register Successfully.";
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
        .msg
        {
          width: 100%;
          align-items: center;
          height: 30px;
          
          color: red;
          margin-bottom: 10px;
          font-size: 18px;
          text-align: center;
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

                    <div class="d-lg-none ms-auto me-3">
                        <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">Member Login</a>
                    </div>
    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                                <a class="nav-link click-scroll" href="#section_4">Events</a>
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
                                <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Schedule</a>

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

            <div class="offcanvas offcanvas-end" data-bs-scroll="true" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">                
                <div class="offcanvas-header">

                </div>

                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3D405B" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg> -->
            </div>
            

            <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">

                <div class="section-overlay"></div>

                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3D405B" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg> -->

                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <h2 class="text-white">Welcome to the club</h2>

                            <h1 class="cd-headline rotate-1 text-white mb-4 pb-2">
                                <span>Blaze</span>
                                <span class="cd-words-wrapper">
                                    <b class="is-visible"></b>
                                    <!-- <b>Creative</b> -->
                                </span>
                            </h1>

                            <div class="custom-btn-group">
                                <a href="#section_2" class="btn custom-btn smoothscroll me-3">Our Story</a>
                                
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="ratio ratio-16x9">

                                <iframe  src="main-qimg-0b1a1ad9f6a0a0082ce1df6f8b0fe436.jpeg" frameborder="0"  autoplay;  allowfullscreen></iframe>
                            </div>
                        </div>

                    </div>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
            </section>


            <section class="about-section section-padding" id="section_2">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center">
                            <h2 class="mb-lg-5 mb-4">About Blaze Club</h2>
                        </div>

                        <div class="col-lg-5 col-12 me-auto mb-4 mb-lg-0">
                            <h3 class="mb-3">Blaze Club History</h3>

                            <p><strong>Since 1995</strong><p>Former Western Railways player and employee, Coach Dinesh Lad has been giving cricket Blaze Cricket coaching in Mumbai since 1995. Coach Lad has produced cricket stars such as Rohit Sharma, India's current captain, Shardul Thakur. His own son Siddhesh Lad is a Ranji Trophy winner. He has molded nearly 80.</p><br><p>Blaze is ranked #3 in the top 10 cricket clubs in India.Dinesh Lad started Blaze Cricket academy. To expand the business, he registered the firm as a public limited company. Membership fees and rental incomes from facilities owned/leased by the company generated the main revenues of the firm. The academy is doing great as some of the good players trained in the academy are representing their states and zonal teams in reputed domestic cricket leagues.</p></p>

                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-0">
                            <div class="member-block">
                                <div class="member-block-image-wrap">
                                    <img src="WhatsApp Image 2023-11-28 at 9.33.12 PM.jpeg" class="member-block-image img-fluid" alt="">

                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="member-block-info d-flex align-items-center">
                                    <h4>Dinesh Lad</h4>

                                    <p class="ms-auto">Founder</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="member-block">
                                <div class="member-block-image-wrap">
                                    <img src="WhatsApp Image 2023-11-28 at 9.53.57 PM.jpeg" class="member-block-image img-fluid" alt="">

                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="member-block-info d-flex align-items-center">
                                    <h4>Rajkumar Sharma</h4>

                                    <p class="ms-auto">Co-Founder</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="section-bg-image">
                <svg viewBox="0 0 1265 144" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="rgba(255, 255, 255, 1)" d="M 0 40 C 164 40 164 20 328 20 L 328 20 L 328 0 L 0 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 327 20 C 445.5 20 445.5 89 564 89 L 564 89 L 564 0 L 327 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 563 89 C 724.5 89 724.5 48 886 48 L 886 48 L 886 0 L 563 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 885 48 C 1006.5 48 1006.5 67 1128 67 L 1128 67 L 1128 0 L 885 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 1127 67 C 1196 67 1196 0 1265 0 L 1265 0 L 1265 0 L 1127 0 Z" stroke-width="0"></path></svg>

                <div class="container">
                    <div class="row">

                        <!-- <div class="col-lg-6 col-12">
                            <div class="section-bg-image-block">
                                <h2 class="mb-lg-3">Get our newsletter</h2>

                               

                                <form action="#" method="get" class="custom-form mt-lg-4 mt-2" role="form">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bi-envelope" id="basic-addon1"></span>

                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">



                                        <button type="submit" class="form-control" name="form-control">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div> -->

                    </div>
                </div>

                <svg viewBox="0 0 1265 144" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="rgba(255, 255, 255, 1)" d="M 0 40 C 164 40 164 20 328 20 L 328 20 L 328 0 L 0 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 327 20 C 445.5 20 445.5 89 564 89 L 564 89 L 564 0 L 327 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 563 89 C 724.5 89 724.5 48 886 48 L 886 48 L 886 0 L 563 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 885 48 C 1006.5 48 1006.5 67 1128 67 L 1128 67 L 1128 0 L 885 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 1127 67 C 1196 67 1196 0 1265 0 L 1265 0 L 1265 0 L 1127 0 Z" stroke-width="0"></path></svg>
            </section>


            <section class="events-section section-bg section-padding" id="section_4">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h2 class="mb-lg-3">Upcoming Events</h2>
                        </div>

                        <div class="row custom-block custom-block-bg">
                            <div class="col-lg-2 col-md-4 col-12 order-2 order-md-0 order-lg-0">
                                <div class="custom-block-date-wrap d-flex d-lg-block d-md-block align-items-center mt-3 mt-lg-0 mt-md-0">
                                    <h6 class="custom-block-date mb-lg-1 mb-0 me-3 me-lg-0 me-md-0"></h6>
                                    
                                    <strong class="text-white">Feb-March 2024</strong>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-8 col-12 order-1 order-lg-0">
                                <div class="custom-block-image-wrap">
                                    <a href="event-listing.html">
                                        <img src="WhatsApp Image 2023-11-28 at 11.03.14 PM.jpeg" class="custom-block-image img-fluid" alt="">

                                        <i class="custom-block-icon bi-link"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12 order-3 order-lg-0">
                                <div class="custom-block-info mt-2 mt-lg-0">
                                    <a href="event-listing.html" class="events-title mb-3"></a>

                                    <p class="mb-0">Click On This Image</p>

                                    <div class="d-flex flex-wrap border-top mt-4 pt-3">
        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="contact-section section-padding" id="section_5">
                <div class="container">
                    <!-- <div class="row">

                        <div class="col-lg-5 col-12">
                            <form action="#" method="post" class="custom-form contact-form" role="form">
                                <h2 class="mb-4 pb-2">Contact Blaze</h2>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="full-name" id="full-name" class="form-control" placeholder="Full Name" required="">
                                            
                                            <label for="floatingInput">Full Name</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12"> 
                                        <div class="form-floating">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">
                                            
                                            <label for="floatingInput">Email address</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" id="message" name="message" placeholder="Describe message here"></textarea>
                                            
                                            <label for="floatingTextarea">Message</label>
                                        </div>

                                        <button type="submit" class="form-control">Submit Form</button>
                                 
                                    </div>
                                </div>
                            </form>
                        </div> -->

                        <div class="col-lg-6 col-12">
                            <div class="contact-info mt-5">
                                <div class="contact-info-item">
                                    <div class="contact-info-body">
                                        <strong>Kolhapur,Maharashtra</strong>

                                        <p class="mt-2 mb-1">
                                            <a href="tel: 02336-256184" class="contact-link">
                                               contact@blazeacademy.com
                                            </a>
                                        </p>

                                        <p class="mb-0">
                                            <a href="mailto:blaze1961@gmail.com" class="contact-link">
                                                blaze4545@gmail.com
                                        </p>
                                    </div>

                                </div>

                                <img src="images/WorldMap.svg" class="img-fluid" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 me-auto mb-5 mb-lg-0">
                        <a class="navbar-brand d-flex align-items-center" href="logo.html">
                            <img src="PngItem_3571362.png" class="navbar-brand-image img-fluid" alt="">
                            <span class="navbar-brand-text">
                               Blaze 
                                <small>Cricket Club</small>
                            </span>
                        </a>
                    </div>

                    <div class="col-lg-3 col-12">
                        <h5 class="site-footer-title mb-4">Timing of Club</h5>

                        <p class="d-flex border-bottom pb-3 mb-3 me-lg-3">
                            <span>Mon-Fri</span>
                            6:00 AM - 4:00 PM
                        </p>

                        <p class="d-flex me-lg-3">
                            <span>Sat-Sun</span>
                            6:30 AM - 6:30 PM
                        </p>
                        <br>
                    </div>

                </div>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#81B29A" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
        </footer>


        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
     

    </body>
</html>


<!-- club registration -->

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Club Registration Form</title>

  <link rel="stylesheet" type="text/css" href="css/blaze-cricket-club.css">
</head>

<body>


  <section>

    <section class="club registration-section section-padding" id="section_6">
        <div class="container">
            <div class="row">

    <div class="container-fluid">
      <div class="container">
        <div class="formBox">
          <form action="#" method="POST">
            <div class="row">
              <div class="col-sm-12">
                <h1>Club Registration Form</h1>
              </div>
                
              <div class="form-floating">
                <input type="text" name="clubnm" id="name of club" class="form-control" placeholder="Name Of The Club" required="">
                
                <label for="floatingInput">Name Of The Club</label>
            </div>
<!-- 
            <div class="form-floating">
                <input type="date" name="date" id="Date Of Establishment" class="form-control" placeholder="Date Of Establishment" required="">
                
                <label for="floatingInput">Date Of Establishment</label>
            </div> -->

            <div class="form-floating">
                <input type="number" name="houseNo" id="house no" class="form-control" placeholder="house no" required="">
                
                <label for="floatingInput">House No</label>
            </div>

            <div class="form-floating">
                <input type="text" name="location" id="location" class="form-control" placeholder="location" required="">
                
                <label for="floatingInput">Location</label>
            </div>

            <div class="form-floating">
                
                <input type="text" name="district" id="on" class="form-control" placeholder="district" required="">
                
                <label for="floatingInput">District</label>
            </div>
            
            <div class="form-floating">
            
                <input type="text" name="postCode" id="on" class="form-control" placeholder="post code" required="">
                
                <label for="floatingInput">Post Code</label>
            </div>

                <div class="msg">
                <script>
                                            var message = "<?php echo $regmsg; ?>";
                                            if(message!="")
                                            {
                                                document.write(message);
                                            }
                                            </script>
                </div>

           <div class="col-sm-12">
                <input type="submit" class="club-reg-button" id="club-reg-button" name="club-reg-button" value="Register">
             </div>
            </div>
          </form>
        </div>
      </div>
    </div>  
   </div>
  </div>
 </section>>
</section>
</body>

</html>



