<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('inc/head.php'); ?>
<body>

<?php include('inc/sidebar.php'); ?>

<!-- CONTENT -->
<section id="content">
    <?php include('inc/navbar.php'); ?>
    <!-- MAIN -->
    <div id="main-content">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'dashboard':
                    include('inc/dashboard.php');
                    break;
                case 'applicants':
                    include('inc/applicants.php');
                    break;
                case 'documents':
                    include('inc/documents.php');
                    break;
                default:
                    include('inc/dashboard.php');
            }
        } else {
            include('inc/dashboard.php');
        }
        ?>
    </div>
    <!-- MAIN -->
</section>
<!-- CONTENT -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
</body>
</html>
