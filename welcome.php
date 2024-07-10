<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['Email_Session'])) {
    header("Location: index.php"); // Redirect to sign-in page if not logged in
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <div>
        <h1>Welcome, <?php echo $_SESSION['Email_Session']; ?></h1>
        <form method="POST" action="">
            <input type="submit" name="logout" value="Logout">
        </form>
    </div>
</body>
</html>
