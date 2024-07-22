<?php
session_start(); // Start the session

// Check if user is already logged in
if (isset($_SESSION['Email_Session'])) {
    header("Location: welcome.php");
    exit();
}

include('config.php');

$msg = "";

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
if (isset($_POST['submit'])) {
    $input = mysqli_real_escape_string($conx, $_POST['email']); // Use a generic variable for input
    $password = mysqli_real_escape_string($conx, md5($_POST['Password']));

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
                    header("Location: admin/index.php");
                    break;
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="style.css" />
  <title>Sign in & Sign up Form</title>
  <style>
    .alert {
      padding: 1rem;
      border-radius: 5px;
      color: white;
      margin: 1rem 0;
      font-weight: 500;
      width: 65%;
    }
    .alert-success { background-color: #42ba96; }
    .alert-danger { background-color: #fc5555; }
    .alert-info { background-color: #2E9AFE; }
    .alert-warning { background-color: #ff9966; }
    .Forget-Pass { display: flex; width: 65%; }
    .Forget { color: #2E9AFE; font-weight: 500; text-decoration: none; margin-left: auto; }
    .back-link { position: absolute; top: 20px; left: 1800px; font-size: 24px; color: #333; text-decoration: none; }
    .back-link:hover { color: #555; }
  </style>
</head>
<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="POST" class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <?php echo $msg ?>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="email" placeholder="Email or Username" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="Password" placeholder="Password" required />
          </div>
          <div class="Forget-Pass">
            <a href="Forget.php" class="Forget">Forget Password?</a>
          </div>
          <input type="submit" name="submit" value="Sign In" class="btn solid" />
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </form>
      </div>
    </div>
    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here?</h3>
          <p>Don't have an account? Create an account</p>
          <a href="SignUp.php" class="btn transparent" id="sign-in-btn" style="padding:10px 20px;text-decoration:none">Sign up</a>
          <a href="index.php" class="btn transparent" id="sign-in-btn" style="padding:10px 20px;text-decoration:none">Back to home</a>
        </div>
        <img src="logo.png" class="image" alt="Tricycle Image" />
      </div>
    </div>
  </div>
  <script src="app.js"></script>
</body>
</html>
