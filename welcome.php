<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['Email_Session'])) {
    header("Location: SignIn.php"); // Redirect to sign-in page if not logged in
    exit();
}

// Logout functionality
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: SignIn.php"); // Redirect to sign-in page after logout
    exit();
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <div>
        <h1>Welcome, <php echo $_SESSION['Email_Session']; ?></h1>
        <form method="POST" action="">
            <input type="submit" name="logout" value="Logout">
        </form>
    </div>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>TriPermit</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/web-logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <style>
        body {
            background: rgba(0,0,0,.1);
            line-height: 1.45rem;
            color: #444;
        }

        h1 {
            margin: 0;
            margin-bottom: 2rem;
            text-align: center;
            font-weight: normal;
            line-height: 2.2rem;
        }

        .section {
            max-width: 500px;
            padding: 4rem;
            margin: 5vh auto 0 auto;
            background: white;
            box-shadow: 0 1px 2px rgba(0,0,0,.3);
            position: relative;
        }

        .section:before {
            content: "";
            width: 100%;
            background: #a1d3a2;
            height: 170px;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            border-bottom: 1px solid rgba(0,0,0,.2);
        }

        .form-instructions {
            text-align: center;
        }

        form {
            margin: 2rem auto;
            width: 100%;  
            max-width: 330px; 
            will-change: transform;
        }

        .fieldgroup {
            margin: 1.5rem 0;
            position: relative;
        }

        label {
            position: absolute;
            top: .8rem; 
            left: 0;
            display: block;
            font-size: 1rem;
            opacity: .5;
            will-change: top, font-size;
            transition: .2s ease-out;
        }

        input {
            border: 1px solid #fff;
            font-size: 1.2rem;
            padding: .6rem;
            padding-left: 0;
            background: transparent;
            border: none;
            border-bottom: 2px solid #444;
            width: calc(100% - .6rem);
            max-width: 350px;
            transition: .2s;
            border-radius: 0;
        }

        input:focus {
            outline: none;
        }

        input:valid {
            border-color: #444;
        }

        input:focus + label,
        input.hasInput + label {
            top: -.8rem;
            font-size: .7rem;
        }

        .btn {
            color: #fff;
            background-color: rgb(11, 204, 108);
            padding: .8rem;
            font-size: 1.2rem;
            line-height: 1.2rem;
            border-radius: 5px;
            border: 2px solid transparent;
            min-width: 45px !important;
        }

        .btn:hover {
            color: #fff;
            text-shadow: 0 1px 3px rgba(0,0,0,.3);
            transition: .2s;
        }

        .btn:active {
            color: #fff;
            background-color: darken(rgb(11, 204, 108), 20%);
            box-shadow: inset 0 2px 10px rgba(0,0,0,.3);
            outline: 2px solid rgb(11, 204, 108);
        }

        .btn-alt {
            background-color: transparent;
            color: rgb(11, 204, 108);
            border: 2px solid rgb(11, 204, 108);
        }

        .btn-alt:hover {
            background-color: transparent;
            color: darken(rgb(11, 204, 108), 40%);
            border-color: darken(rgb(11, 204, 108), 40%);
        }

        .form-progress {
            position: relative;
            display: block;
            margin: 3rem auto;
            width: 100%;
            max-width: 400px;
        }

        progress {
            display: block;
            position: relative;
            top: 5px;
            left: 5px;
            appearance: none;
            background: rgb(11, 204, 108);
            width: 100%;
            height: 5px;
            background: none;
            transition: 1s;
        }

        progress::-webkit-progress-bar {
            background-color: #ddd;
        }

        progress::-webkit-progress-value {
            background-color: rgb(11, 204, 108);
            transition: all 0.5s ease-in-out;
        }

        .form-progress-indicator {
            position: absolute;
            top: -6px;
            left: 0;
            display: inline-block;
            width: 20px;
            height: 20px;
            background: white;
            border: 3px solid #ddd;
            border-radius: 50%;
            transition: all .2s ease-in-out;
            transition-delay: .3s;
        }

        .form-progress-indicator.one   { left: 0; }
        .form-progress-indicator.two   { left: 33%; }
        .form-progress-indicator.three { left: 66%; }  
        .form-progress-indicator.four  { left: 100%; } 

        .form-progress-indicator.active {
            animation: bounce .5s forwards;
            animation-delay: .5s;
            border-color: rgb(11, 204, 108);
        }

        .animation-container {
            position: relative;
            width: 100%;
            transition: .3s;
            will-change: padding;
            overflow: hidden;
        }

        .form-step {
            position: absolute;
            transition: 1s ease-in-out;
            will-change: transform, opacity;
        }

        .form-step.leaving {
            animation: left-and-out .5s forwards;
        }

        .form-step.waiting {
            transform: translateX(400px);
        }

        .form-step.coming {
            animation: right-and-in .5s forwards;
        }

        @keyframes left-and-out {
            100% {
                opacity: 0;
                transform: translateX(-400px);
            }
        }

        @keyframes right-and-in {
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes bounce {
            50% {
                transform: scale(1.5);
            }
            100% {
                transform: scale(1);
            }
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0,0,0,0);
            border: 0;
        }

        .hidden {
            display: none;
        }
    </style>

</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">balayanbplo24@gmail.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+63 997 281 7807</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1 class="sitename">TriPermit</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#footer">Track</a></li>
            <li>
                <form method="POST" action="">
                    <button type="submit" name="logout" 
                            style="background-color: #DB504A; border: none; border-radius: 10px; padding: 10px 20px; font-size: 16px; color: #FFFFFF; cursor: pointer; border: 2px solid #DB504A;"
                            onclick="return confirm('Are you sure you want to log out?');">
                        Logout
                    </button>
                </form>
            </li>
          </ul>
          
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>

  <main class="main">

  <section class="section">
        <h1>Tricycle Permit Application</h1>
        <div class="form-instructions">Please complete the form below to apply for a tricycle permit.</div>
        <form id="main-form">
            <div class="animation-container">
                <div class="form-step">
                    <div class="fieldgroup">
                        <input type="text" name="firstname" id="firstname" required />
                        <label for="firstname">First Name</label>
                    </div>
                    <div class="fieldgroup">
                        <input type="text" name="lastname" id="lastname" required />
                        <label for="lastname">Last Name</label>
                    </div>
                    <button type="button" class="btn next">Next</button>
                </div>
                <div class="form-step waiting">
                    <div class="fieldgroup">
                        <input type="email" name="email" id="email" required />
                        <label for="email">Email</label>
                    </div>
                    <div class="fieldgroup">
                        <input type="tel" name="phone" id="phone" required />
                        <label for="phone">Phone</label>
                    </div>
                    <button type="button" class="btn next">Next</button>
                </div>
                <div class="form-step waiting">
                    <div class="fieldgroup">
                        <input type="text" name="address" id="address" required />
                        <label for="address">Address</label>
                    </div>
                    <div class="fieldgroup">
                        <input type="text" name="city" id="city" required />
                        <label for="city">City</label>
                    </div>
                    <button type="button" class="btn next">Next</button>
                </div>
                <div class="form-step waiting">
                    <div class="fieldgroup">
                        <input type="text" name="tricycle" id="tricycle" required />
                        <label for="tricycle">Tricycle Model</label>
                    </div>
                    <div class="fieldgroup">
                        <input type="text" name="plate" id="plate" required />
                        <label for="plate">Plate Number</label>
                    </div>
                    <button type="submit" class="btn">Submit</button>
                </div>
            </div>
            <div class="form-progress">
                <progress value="0" max="100"></progress>
                <span class="form-progress-indicator one"></span>
                <span class="form-progress-indicator two"></span>
                <span class="form-progress-indicator three"></span>
                <span class="form-progress-indicator four"></span>
            </div>
        </form>
    </section>

  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Track your permit</h4>
            <p>Enter your tracking number to see the status of your application for tricycle permit.</p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Track"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">BPLO</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Batangas State University Road, Balayan</p>
            <p> 4213 Batangas, Philippines</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+63 997 281 7807</span></p>
            <p><strong>Email:</strong> <span>balayanbplo24@gmail.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Online Application Submission</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Document Management</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Real-Time Application Tracking</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Efficient Review Process</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <p>Stay updated with the latest news and updates on our tricycle permit management system.</p>
          <div class="social-links d-flex">
            <a href="https://twitter.com/yourprofile" target="_blank"><i class="bi bi-twitter"></i></a>
            <a href="https://facebook.com/yourprofile" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="https://instagram.com/yourprofile" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="https://linkedin.com/yourprofile" target="_blank"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
        

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">DevKnights</strong> <span>All Rights Reserved</span></p>
      <div class="credits">

        Designed by <a href="#">DevKnights</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

 
</body>

</html>