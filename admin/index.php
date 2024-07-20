<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('inc/head.php');?>
<body>

<?php include('inc/sidebar.php');?>
<!-- CONTENT -->
<section id="content">
    <?php include('inc/navbar.php');?>
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
    </div> <!-- Add this closing div tag -->
    <!-- MAIN -->
</section>
<!-- CONTENT -->
 <!-- Modal structure -->
<div class="modal-wrapper">
    <div class="modal">
        <!-- modal content -->
        <div class="content">
        <div class="container d-flex justify-content-center pt-2">

          <a class="btn-close" href="#">
        <i class="fa fa-times" aria-hidden="true"></i> Close
    </a>
  </div>
  </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<!-- Bootstrap 5 JS -->
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'></script>
<!-- Multi-step Form JS -->
<script src="js/bootstrap-multi-step-form.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>

<script>
$(document).ready(function() {
    $('#add-applicants-btn').on('click', function(e) {
        e.preventDefault();
        $('.modal-wrapper').fadeIn();
        $('body').addClass('blur-it');
    });

    $('.btn-close').on('click', function(e) {
        e.preventDefault();
        $('.modal-wrapper').fadeOut();
        $('body').removeClass('blur-it');
    });
});



</script>
</body> <!-- Add this closing body tag -->
</html>