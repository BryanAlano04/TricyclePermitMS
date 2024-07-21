<?php
include('../../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $query = "DELETE FROM user WHERE id = '$id'";
        if (mysqli_query($conx, $query)) {
            echo "User deleted successfully.";
        } else {
            echo "Error deleting user: " . mysqli_error($conx);
        }
    } else {
        echo "Invalid request.";
    }
}
?>
