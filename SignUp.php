<?php
session_start();
if (isset($_SESSION['Email_Session'])) {
    header("Location: welcome.php");
    die();
}
include('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$msg = "";
$Error_Pass = "";

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conx, $_POST['Username']);
    $email = mysqli_real_escape_string($conx, $_POST['Email']);
    $Password = mysqli_real_escape_string($conx, md5($_POST['Password']));
    $Confirm_Password = mysqli_real_escape_string($conx, md5($_POST['Conf-Password']));
    $Code = md5(rand()); // Generate a unique verification code

    if (mysqli_num_rows(mysqli_query($conx, "SELECT * FROM register where email='{$email}'")) > 0) {
        $msg = "<div class='alert alert-danger'>This Email: '{$email}' has already been registered.</div>";
    } else {
        if ($Password === $Confirm_Password) {
            $query = "INSERT INTO register(`Username`, `email`, `Password`, `CodeV`, `verification`) values('$name','$email','$Password','$Code', '0')";
            $result = mysqli_query($conx, $query);
            
            if ($result) {
                // Create a verification link
                $verificationLink = 'http://localhost/login-register-form-with-email-verification-main/verify.php?Verification=' . $Code;

                // Send email
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'balayanbplo24@gmail.com';
                    $mail->Password = 'acsv muxe rkoq ohsu';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
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

        .alert-success {
            background-color: #42ba96;
        }

        .alert-danger {
            background-color: #fc5555;
        }

        .alert-info {
            background-color: #2E9AFE;
        }

        .alert-warning {
            background-color: #ff9966;
        }
    </style>
</head>

<body>
    <div class="container sign-up-mode">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" method="POST" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <?php echo $msg ?>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="Username" placeholder="Username" value="<?php if (isset($_POST['Username'])) { echo $name; } ?>" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="Email" placeholder="Email" value="<?php if (isset($_POST['Email'])) { echo $email; } ?>" />
                    </div>
                    <div class="input-field" <?php echo $Error_Pass?>>
                        <i class="fas fa-lock"></i>
                        <input type="password" name="Password" placeholder="Password" />
                    </div>
                    <div class="input-field" <?php echo $Error_Pass?>>
                        <i class="fas fa-lock"></i>
                        <input type="password" name="Conf-Password" placeholder="Confirm Password" />
                    </div>
                    <input type="submit" name="submit" class="btn" value="Sign up" />
                    <p class="social-text">Or Sign up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        wewfvv vrovigg eveeorgrem trut[hwr eoiejery o]
                    </p>
                    <a href="index.php" class="btn transparent" id="sign-in-btn" style="padding:10px 20px;text-decoration:none">
                        Sign in
                    </a>
                </div>
                <img src="img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>
</body>

</html>
