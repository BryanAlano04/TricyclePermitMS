<?php
// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include configuration and dependencies
include('../config.php'); 

// Start output buffering
ob_start();
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
                    case 'charts':
                        include('inc/charts.php');
                        break;
                case 'permit':
                    include('inc/permit.php');
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
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<!-- Bootstrap 5 JS -->
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'></script>
<!-- Main JS File -->
<script src="../assets/js/main.js"></script>
<script src="script.js"></script>

<script>
// JavaScript for Modal Handling and Form Submission
document.getElementById('add-applicants-btn').onclick = function() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('add-applicants-modal').style.display = 'block';
};

document.querySelectorAll('.close').forEach(button => {
    button.onclick = function() {
        this.closest('.modal').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    };
});

document.getElementById('cancel-button').addEventListener('click', function() {
    document.getElementById('add-applicants-modal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
});

document.getElementById('edit-cancel-button').addEventListener('click', function() {
    document.getElementById('edit-applicants-modal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
});

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

// Function to generate the permit and show the modal
function generatePermit(ownerName, driverName, driverAddress, driverContact, plateNo, franchiseNo) {
    document.getElementById('ownerName').innerText = ownerName;
    document.getElementById('driverName').innerText = driverName;
    document.getElementById('driverAddress').innerText = driverAddress;
    document.getElementById('driverContact').innerText = driverContact;
    document.getElementById('plateNo').innerText = plateNo;
    document.getElementById('franchiseNo').innerText = franchiseNo;

    // Show the modal
    document.getElementById('edit-applicants-modal').style.display = 'block';

    // Ensure permit container is visible
    document.getElementById('permitContainer').style.display = 'block';
}

// Function to print the permit
function printPermit() {
    window.print();
}

$(document).ready(function() {
  var currentStep = 0;
  var steps = $(".step");
  var indicators = $(".step-indicators .indicator");

  function showStep(index) {
      steps.removeClass("active");
      $(steps[index]).addClass("active");
      indicators.removeClass("completed");
      indicators.each(function(i) {
          if (i <= index) {
              $(this).addClass("completed");
          }
      });
  }

  $(".btn-next").click(function() {
      if (currentStep < steps.length - 1) {
          currentStep++;
          showStep(currentStep);
      }
  });

  $(".btn-prev").click(function() {
      if (currentStep > 0) {
          currentStep--;
          showStep(currentStep);
      }
  });

  $("#multiStepForm").submit(function(event) {
      event.preventDefault();
      alert("Form submitted!");
  });
}); 

const form = document.getElementById('multiStepForm');
const steps = Array.from(form.getElementsByClassName('step'));
const nextButtons = Array.from(form.getElementsByClassName('btn-next'));
const prevButtons = Array.from(form.getElementsByClassName('btn-prev'));
let currentStep = 0;

function showStep(step) {
    steps.forEach((step, index) => {
        step.classList.toggle('active', index === currentStep);
    });
}

nextButtons.forEach(button => {
    button.addEventListener('click', () => {
        currentStep = Math.min(currentStep + 1, steps.length - 1);
        showStep(currentStep);
    });
});

prevButtons.forEach(button => {
    button.addEventListener('click', () => {
        currentStep = Math.max(currentStep - 1, 0);
        showStep(currentStep);
    });
});

form.addEventListener('submit', (event) => {
    event.preventDefault();
    const availabilityMWF = document.getElementById('availabilityMWF').checked;
    const availabilityTTS = document.getElementById('availabilityTTS').checked;
    const income = document.getElementById('income').value;

    // Determine color coding based on survey responses
    let colorCode = '';
    if (availabilityMWF && !availabilityTTS) {
        colorCode = 'Red';
    } else if (!availabilityMWF && availabilityTTS) {
        colorCode = 'Green';
    } else {
        colorCode = 'Not Determined'; // This can be adjusted based on additional criteria
    }

    alert(`Survey Submitted! Your tricycle's color code is: ${colorCode}`);

    // Optionally, you can submit the form data to the server here
});

showStep(currentStep);
</script>
</body> <!-- Add this closing body tag -->
</html>

<?php
// Flush the output buffer
ob_end_flush();
?>
