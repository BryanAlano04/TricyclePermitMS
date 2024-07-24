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
    header("Location: index.php"); // Redirect to sign-in page after logout
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

  <!-- Bootstrap 5 CSS -->  
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css'>
    <!-- Font Awesome 5 -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'>
    
	<!-- Demo CSS -->
	<!-- <link rel="stylesheet" href="css/demo.css"> -->

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <!-- <link href="assets/css/style.css" rel="stylesheet"> -->

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
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#featured-services">Application</a></li>
          <li><a href="#profile">Profile</a></li>
          <li><a href="#contact">Contact</a></li>
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

  <!-- <main class="main"> -->
  <section id="featured-services" class="featured-services section">
<div class="container">
  <?php include('MultiStep.php');?>
</div>
</section>
<!-- partial -->
  
</section>
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

</section

  <footer id="footer" class="footer">

    <!-- <div class="footer-newsletter">
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
    </div> -->
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

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<!-- Bootstrap 5 JS -->
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'></script>
<!-- Multi-step Form JS -->
<!-- <script src="js/bootstrap-multi-step-form.js"></script> -->
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

 <script>
  $(document).ready(function() {
  var currentStep = 0;
  var steps = $(".step");
  var indicators = $(".step-indicators .indicator");

  function showStep(index) {
      steps.removeClass("active");
      $(steps[index]).addClass("active");
      indicators.removeClass("completed");
      indicators.each(function(i) {
          if (i <= index) {
              $(this).addClass("completed");
          }
      });
  }

  $(".btn-next").click(function() {
      if (currentStep < steps.length - 1) {
          currentStep++;
          showStep(currentStep);
      }
  });

  $(".btn-prev").click(function() {
      if (currentStep > 0) {
          currentStep--;
          showStep(currentStep);
      }
  });

  $("#multiStepForm").submit(function(event) {
      event.preventDefault();
      alert("Form submitted!");
  });
}); 

const form = document.getElementById('multiStepForm');
    const steps = Array.from(form.getElementsByClassName('step'));
    const nextButtons = Array.from(form.getElementsByClassName('btn-next'));
    const prevButtons = Array.from(form.getElementsByClassName('btn-prev'));
    let currentStep = 0;

    function showStep(step) {
        steps.forEach((step, index) => {
            step.classList.toggle('active', index === currentStep);
        });
    }

    nextButtons.forEach(button => {
        button.addEventListener('click', () => {
            currentStep = Math.min(currentStep + 1, steps.length - 1);
            showStep(currentStep);
        });
    });

    prevButtons.forEach(button => {
        button.addEventListener('click', () => {
            currentStep = Math.max(currentStep - 1, 0);
            showStep(currentStep);
        });
    });

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const availabilityMWF = document.getElementById('availabilityMWF').checked;
        const availabilityTTS = document.getElementById('availabilityTTS').checked;
        const income = document.getElementById('income').value;

        // Determine color coding based on survey responses
        let colorCode = '';
        if (availabilityMWF && !availabilityTTS) {
            colorCode = 'Red';
        } else if (!availabilityMWF && availabilityTTS) {
            colorCode = 'Green';
        } else {
            colorCode = 'Not Determined'; // This can be adjusted based on additional criteria
        }

        alert(`Survey Submitted! Your tricycle's color code is: ${colorCode}`);

        // Optionally, you can submit the form data to the server here
    });

    showStep(currentStep);
 </script>
</body>

</html>