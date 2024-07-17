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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const ctxBar = document.getElementById('barChart').getContext('2d');
    const ctxLine = document.getElementById('lineChart').getContext('2d');

    const barChart = new Chart(ctxBar, {
      type: 'bar',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May'],
        datasets: [{
          label: 'Approved Permits',
          data: [12, 19, 3, 5, 2],
          backgroundColor: 'rgba(219, 80, 74, 0.2)',
          borderColor: 'rgba(219, 80, 74, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          legend: {
            labels: {
              color: 'var(--dark)'
            }
          }
        }
      }
    });

    const lineChart = new Chart(ctxLine, {
      type: 'line',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May'],
        datasets: [{
          label: 'Total Revenue',
          data: [3000, 4000, 2000, 5000, 7000],
          backgroundColor: 'rgba(219, 80, 74, 0.2)',
          borderColor: 'rgba(219, 80, 74, 1)',
          borderWidth: 2,
          fill: true,
          tension: 0.4
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          legend: {
            labels: {
              color: 'var(--dark)'
            }
          }
        }
      }
    });
  });
</script>

</body> <!-- Add this closing body tag -->
</html>