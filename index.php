<?php
session_start(); // Start the session

// Check if user is already logged in
if (isset($_SESSION['Email_Session'])) {
    header("Location: welcome.php");
    exit();
}

include('config.php');

$msg = "";
$Error_Pass = "";

// Handle account verification
if (isset($_GET['Verification'])) {
    $verificationToken = mysqli_real_escape_string($conx, $_GET['Verification']);
    $raquet = mysqli_query($conx, "SELECT * FROM user WHERE token='{$verificationToken}'");

    if (mysqli_num_rows($raquet) > 0) {
        $query = mysqli_query($conx, "UPDATE user SET active='1' WHERE token='{$verificationToken}'");
        if ($query) {
            $rowv = mysqli_fetch_assoc($raquet);
            header("Location: welcome.php?id={$rowv['id']}");
            exit();
        } else {
            header("Location: index.php");
            exit();
        }
    } else {
        header("Location: index.php");
        exit();
    }
}

// Handle user login
if (isset($_POST['signin_submit'])) {
    $input = mysqli_real_escape_string($conx, $_POST['username']); // Use a generic variable for input
    $password = mysqli_real_escape_string($conx, md5($_POST['password']));

    // Query to check if the input matches email or username
    $sql = "SELECT * FROM user WHERE (email='{$input}' OR username='{$input}') AND password='{$password}'";
    $result = mysqli_query($conx, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['active'] === '1') {
            $_SESSION['Email_Session'] = $row['email']; // Store email in session
            $_SESSION['role'] = $row['role']; // Save role in session
            
            // Redirect based on role
            switch ($row['role']) {
                case 'admin':
                case 'verifier':
                    header("Location: admin/index.php");
                    break;
                default:
                    header("Location: welcome.php");
            }
            exit();
        } else {
            $msg = "<div class='alert alert-info'>Please verify your account first.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>Email/Username or Password is incorrect.</div>";
    }
}

// Handle user signup
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['signup_submit'])) {
    $name = mysqli_real_escape_string($conx, $_POST['username']);
    $email = mysqli_real_escape_string($conx, $_POST['email']);
    $password = mysqli_real_escape_string($conx, md5($_POST['password']));
    $Confirm_Password = mysqli_real_escape_string($conx, md5($_POST['conf_password']));
    $token = md5(rand()); // Generate a unique verification code
    $role = 'user'; // Default role

    if (mysqli_num_rows(mysqli_query($conx, "SELECT * FROM user WHERE email='{$email}'")) > 0) {
        $msg = "<div class='alert alert-danger'>This Email: '{$email}' has already been registered.</div>";
    } else {
        if ($password === $Confirm_Password) {
            $query = "INSERT INTO user(`email`, `password`, `username`, `token`, `active`, `role`) VALUES ('$email', '$password', '$name', '$token', '0', '$role')";
            $result = mysqli_query($conx, $query);
            
            if ($result) {
                // Create a verification link
                $verificationLink = 'http://localhost/TricyclePermitMS/verify.php?Verification=' . $token;

                // Send email
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'balayanbplo24@gmail.com';
                    $mail->Password = 'tawn wged durl tngn';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );
                    
                    //Recipients
                    $mail->setFrom('balayanbplo24@gmail.com', 'BPLO Balayan');
                    $mail->addAddress($email, $name);
                    //Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Welcome To My Website';
                    $mail->Body = '<p>This is the Verification Link: <b><a href="' . $verificationLink . '">' . $verificationLink . '</a></b></p>';
                    $mail->send();
                    
                    $msg = "<div class='alert alert-info'>A verification code has been sent to your email address.</div>";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Something went wrong with registration.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match.</div>";
            $Error_Pass = 'style="border:1px Solid red;box-shadow:0px 1px 11px 0px red"';
        }
    }
}

// Handle forget password
if (isset($_POST['forget_submit'])) {
    $email = mysqli_real_escape_string($conx, $_POST['email']);
    $CodeReset = mysqli_real_escape_string($conx, md5(rand()));
    if (mysqli_num_rows(mysqli_query($conx, "SELECT * FROM user WHERE email='{$email}'")) > 0) {
        $query = mysqli_query($conx, "UPDATE user SET token='{$CodeReset}' WHERE email='{$email}'");
        if ($query) {
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'balayanbplo24@gmail.com';
                $mail->Password = 'tawn wged durl tngn';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                //Recipients
                $mail->setFrom('balayanbplo24@gmail.com', 'BPLO Balayan');
                $mail->addAddress($email);
                //Content
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Request';
                $mail->Body = '<p>This is the Reset Link: <b><a href="http://localhost/TricyclePermitMS/change-Password.php?Reset=' . $CodeReset . '">' . 'http://localhost/TricyclePermitMS/change-Password.php?Reset=' . $CodeReset . '</a></b></p>';
                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            $msg = "<div class='alert alert-info'>We've sent a verification code to your email address</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>This email: '{$email}' was not found</div>";
    }
}
?>
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

  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css" />

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">  

    <div class="topbar d-flex align-items-center">
    </a>
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
          <img src="balayan.png" alt="">
          <h1 class="sitename">TriPermit</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#hero" class="active">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#footer">Track</a></li>
            <!-- <li><a href="#" data-toggle="modal" data-target="#signInModal">Sign In</a></li> -->
            <li><button type="button" class="btn transparent" data-toggle="modal" data-target="#signInModal">Sign Up</button></li>
            <!-- <li><a href="SignUp.php">
              <button style="background-color: #DB504A; border: none; border-radius: 10px; padding: 10px 20px; font-size: 16px; color: #FFFFFF; cursor: pointer; border: 2px solid #DB504A;">
                Sign Up
              </button> -->
            </a></li>
          </ul>
          
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>Welcome to <span>TriPermit</span></h1>
            <p>We streamline tricycle permits for Balayan's Business Permit and Licensing Office.</p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Get Started</a>
              <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-activity icon"></i></div>
              <h4><a href="" class="stretched-link">Efficient Permitting</a></h4>
              <p>Ensuring seamless and efficient tricycle permit management for Balayan.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
              <h4><a href="" class="stretched-link">Reliable Support</a></h4>
              <p>Dedicated assistance to address all your permit-related concerns.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
              <h4><a href="" class="stretched-link">Streamlined Processes</a></h4>
              <p>Continuous improvements for better efficiency and convenience.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-broadcast icon"></i></div>
              <h4><a href="" class="stretched-link">Community Focused</a></h4>
              <p>Committed to serving the tricycle operators and community of Balayan.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p><span>Discover More</span> <span class="description-title">About Us</span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-3">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/balayan_image02.jpeg" alt="" class="img-fluid">
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="about-content ps-0 ps-lg-3">
              <h3>Ensuring smooth and efficient tricycle permit management for all.</h3>
              <p class="fst-italic">
                We are dedicated to providing excellent service and support, simplifying the process for everyone involved.
              </p>
              <ul>
                <li>
                  <i class="bi bi-diagram-3"></i>
                  <div>
                    <h4>Streamlined processes for better efficiency</h4>
                    <p>"Facilitating a seamless application and approval process to ensure quick and effective permit management."</p>
                  </div>
                </li>
                <li>
                  <i class="bi bi-fullscreen-exit"></i>
                  <div>
                    <h4>Continuous improvements for your convenience</h4>
                    <p>"Implementing regular updates and enhancements to make the permit application process more user-friendly and accessible."</p>
                  </div>
                </li>
              </ul>
              <p>
                We strive to make your experience hassle-free and effective, ensuring you receive the best possible service. Join us in making permit management easier and more accessible for the community of Balayan.
              </p>
            </div>

          </div>
        </div>

      </div>

    </section><!-- /About Section -->
    <!-- Skills Section -->
    <section id="skills" class="skills section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row skills-content skills-animation">

          <div class="col-lg-6">

            <div class="progress">
              <span class="skill"><span>Green</span> <i class="val">43%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%; background-color: green;"></div>
              </div>
            </div>
            <!-- End Skills Item -->


          </div>

          <div class="col-lg-6">

            <div class="progress">
              <span class="skill"><span>Red</span> <i class="val">57%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div><!-- End Skills Item -->

          </div>

        </div>

      </div>

    </section>

    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-emoji-smile"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="894" data-purecounter-duration="1" class="purecounter"></span>
              <p>Green</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-journal-richtext"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="1229" data-purecounter-duration="1" class="purecounter"></span>
              <p>Red</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-headset"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="2078" data-purecounter-duration="1" class="purecounter"></span>
              <p>Tricycle Drivers</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-people"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
              <p>BPLO Staff</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p><span>Check Our</span> <span class="description-title">Services</span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-activity"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Online Application Submission</h3>
              </a>
              <p>Our system provides tricycle drivers with an easy-to-use online platform to submit their permit applications, ensuring a hassle-free and accessible process.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-broadcast"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Efficient Document Management</h3>
              </a>
              <p>Securely store and manage all application-related documents in a centralized database, allowing for quick retrieval and review by BPLO staff.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-easel"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Real-Time Application Tracking</h3>
              </a>
              <p>Tricycle drivers can track the status of their applications in real-time, ensuring transparency and keeping applicants informed throughout the approval process.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-bounding-box-circles"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Streamlined Review Process</h3>
              </a>
              <p>BPLO staff can efficiently review applications through a web server interface, reducing processing times and ensuring thorough evaluations of all submitted documents.</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-calendar4-week"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Data-Driven Decision Making</h3>
              </a>
              <p>The BPLO head can utilize a dynamic dashboard to visualize real-time data, enabling proactive management and predictive analysis to improve overall process efficiency.</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-chat-square-text"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Secure and Reliable</h3>
              </a>
              <p>Our system ensures the security and integrity of all data, protecting sensitive information and maintaining a reliable record of all permit applications.</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Faq Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p><span>Need Help?</span> <span class="description-title">Contact Us</span></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>Balayan Government Center, Balayan 4213 Batangas, Philippines</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+63 997 281 7807</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>balayanbplo24@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3877.6488531052264!2d120.72757761483093!3d13.940859490250837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd7a8f8ffb8e81%3A0xf2d83e05ebd6b6b7!2sBalayan%2C%20Batangas%2C%20Philippines!5e0!3m2!1sen!2sus!4v1689439459870!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Your Name</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Message</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

<!-- Modal HTML -->
<div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="signInModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="circle-container">
          <div class="circle-content">
          </div>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Sign Up Form (Default View) -->
        <div id="signUpForm">
          <form action="" method="POST" class="sign-in-form">
            <h2 class="title">Sign Up</h2>
            <?php echo $msg; ?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="conf_password" placeholder="Confirm Password" required>
            </div>
            <input type="submit" class="btn" value="Sign Up" name="signup_submit">
            <a href="#" class="back-to-signin" onclick="showSignInForm()"><i style="color: black;">Already a member? Click here </i>Sign In</a>
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </form>
        </div>
        
        <!-- Sign In Form -->
        <div id="signInForm" style="display: none;">
          <form action="" method="POST" class="sign-in-form">
            <h2>Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required>
            </div>
            <a href="#" class="forgot-password" onclick="showForgetPasswordForm()">Forgot Password?</a>
            <button type="submit" class="btn" name="signin_submit">Sign In</button>
            <br>
            <a href="#" class="signup" onclick="showSignUpForm()"><i style="color: black;">Don't have an account? Create an account</i>Sign Up</a>
            <br>
            <p>Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </form>
        </div>
        
        <!-- Forget Password Form -->
        <div id="forgetPasswordForm" style="display: none;">
          <form action="" method="POST" class="sign-in-form">
            <h2 class="title">Forget Password</h2>
            <?php echo $msg; ?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="email" placeholder="Email" />
            </div>
            <input type="submit" name="forget_submit" value="Send" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </form>
          <a href="#" class="back-to-signin" onclick="showSignInForm()">Back to Sign In</a>
        </div>
      </div>
    </div>
  </div>
</div>

<section id="tracking" class="tracking section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Tracking</h2>
        <p><span>Track Your</span> <span class="description-title">Application</span></p>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-8">
            <form id="tracking-form" class="php-email-form">
              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="text" name="tracking_number" class="form-control" id="tracking_number" placeholder="Enter Tracking Number" required>
                </div>
              </div>
              <div class="text-center mt-3">
                <button type="button" onclick="trackApplication()">Track</button>
              </div>
            </form>
            <div id="tracking-result" class="mt-3"></div>
          </div>
        </div>
      </div>
    </section>



<!-- End of modal -->
<div id="overlay" class="overlay" style="display: none;"></div>
  <footer id="footer" class="footer">
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
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
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
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/js/main.js"></script>
  <!-- Custom JS for Tracking -->
  <script>
    function trackApplication() {
      const trackingNumber = document.getElementById('tracking_number').value;
      const trackingResult = document.getElementById('tracking-result');

      // Dummy tracking statuses for demonstration
      const trackingData = {
        'ABC123': 'Your application is under review.',
        'DEF456': 'Your application has been approved.',
        'GHI789': 'Your application has been rejected.',
      };

      if (trackingNumber in trackingData) {
        trackingResult.innerHTML = '<div class="alert alert-success">' + trackingData[trackingNumber] + '</div>';
      } else {
        trackingResult.innerHTML = '<div class="alert alert-danger">Invalid tracking number. Please try again.</div>';
      }
    }
  </script>


</body>

</html>