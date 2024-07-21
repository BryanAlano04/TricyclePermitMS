<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include('../config.php'); // Correct include path for config.php
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
                case 'user':
                    include('inc/user.php');
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
 // JavaScript for Modal Handling and Form Submission
document.getElementById('add-applicants-btn').onclick = function() {
    document.getElementById('add-applicants-modal').style.display = 'block';
};

document.querySelector('.close').onclick = function() {
    document.getElementById('add-applicants-modal').style.display = 'none';
};

document.getElementById('add-account-form').onsubmit = function(event) {
    event.preventDefault();

    let username = document.getElementById('username').value;
    let email = document.getElementById('email').value;
    let role = document.getElementById('role').value;
    let password = document.getElementById('password').value;
    let active = (role === 'admin' || role === 'verifier') ? 1 : 0;

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'inc/user.php', true); // Path to PHP file
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        let messageDiv = document.getElementById('message');
        if (xhr.status === 200) {
            messageDiv.innerHTML = `<div class="alert alert-info">${xhr.responseText}</div>`;
            document.getElementById('add-applicants-modal').style.display = 'none';
            loadUsers(); // Reload the table data
        } else {
            messageDiv.innerHTML = `<div class="alert alert-danger">Error: ${xhr.status}</div>`;
        }
    };
    xhr.send(`username=${encodeURIComponent(username)}&email=${encodeURIComponent(email)}&role=${encodeURIComponent(role)}&password=${encodeURIComponent(password)}&active=${active}`);
};

document.addEventListener('DOMContentLoaded', function() {
    // Edit button click event
    document.querySelectorAll('.btn-edit').forEach(button => {
        button.addEventListener('click', function() {
            let row = this.closest('tr');
            let username = row.querySelector('td:nth-child(1)').textContent;
            let email = row.querySelector('td:nth-child(2)').textContent;
            let role = row.querySelector('td:nth-child(4)').textContent;
            let active = row.querySelector('td:nth-child(3)').textContent === 'Active' ? 1 : 0;

            // Open edit modal and populate fields
            document.getElementById('edit-applicants-modal').style.display = 'block';
            document.getElementById('edit-username').value = username;
            document.getElementById('edit-email').value = email;
            document.getElementById('edit-role').value = role;
            document.getElementById('edit-active').value = active;
            document.getElementById('edit-id').value = this.dataset.id;
        });
    });

    document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function() {
        if (confirm('Are you sure you want to delete this user?')) {
            let userId = this.dataset.id;
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'inc/delete_user.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    alert('User deleted successfully.');
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert('Error deleting user.');
                }
            };
            xhr.send(`id=${userId}`);
        }
    });
});
});

document.getElementById('edit-account-form').onsubmit = function(event) {
    event.preventDefault();

    let id = document.getElementById('edit-id').value;
    let username = document.getElementById('edit-username').value;
    let email = document.getElementById('edit-email').value;
    let role = document.getElementById('edit-role').value;
    let active = document.getElementById('edit-active').value;

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'inc/edit_user.php', true); // Path to PHP file
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        let messageDiv = document.getElementById('edit-message');
        if (xhr.status === 200) {
            messageDiv.innerHTML = `<div class="alert alert-info">${xhr.responseText}</div>`;
            document.getElementById('edit-applicants-modal').style.display = 'none';
            loadUsers(); // Reload the table data
        } else {
            messageDiv.innerHTML = `<div class="alert alert-danger">Error: ${xhr.status}</div>`;
        }
    };
    xhr.send(`id=${encodeURIComponent(id)}&username=${encodeURIComponent(username)}&email=${encodeURIComponent(email)}&role=${encodeURIComponent(role)}&active=${encodeURIComponent(active)}`);
};

    </script>
</body> <!-- Add this closing body tag -->
</html>
