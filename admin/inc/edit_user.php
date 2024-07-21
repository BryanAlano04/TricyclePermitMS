<?php
include('../../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'], $_POST['username'], $_POST['email'], $_POST['role'], $_POST['active'])) {
        $id = intval($_POST['id']);
        $username = mysqli_real_escape_string($conx, $_POST['username']);
        $email = mysqli_real_escape_string($conx, $_POST['email']);
        $role = mysqli_real_escape_string($conx, $_POST['role']);
        $active = intval($_POST['active']);

        $query = "UPDATE user SET username = '$username', email = '$email', role = '$role', active = $active WHERE id = $id";
        if (mysqli_query($conx, $query)) {
            echo "User updated successfully.";
        } else {
            echo "Error: " . mysqli_error($conx);
        }
    } else {
        echo "Invalid request.";
    }
}
?>
