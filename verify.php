<?php
include('config.php');

if (isset($_GET['Verification'])) {
    $verificationCode = $_GET['Verification'];
    $query = mysqli_query($conx, "UPDATE register SET verification='1' WHERE CodeV='{$verificationCode}'");

    if ($query) {
        // Optional: Fetch user details for further processing
        $result = mysqli_query($conx, "SELECT * FROM register WHERE CodeV='{$verificationCode}'");
        $user = mysqli_fetch_assoc($result);

        // Redirect to login page with a success message or directly to welcome page
        header("Location: index.php?verified=1");
        exit();
    } else {
        echo "Verification failed. Please try again.";
    }
}
?>
