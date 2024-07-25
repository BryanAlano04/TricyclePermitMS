<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Custom CSS -->
    <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard_theme_arrows.min.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            background-color: #eee;
        }
        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0rem rgba(0,123,255,.25);
        }
        .btn-secondary:focus {
            box-shadow: 0 0 0 0rem rgba(108,117,125,.5);
        }
        .close:focus {
            box-shadow: 0 0 0 0rem rgba(108,117,125,.5);
        }
        .mt-200 {
            margin-top: 200px;
        }
        .modal-content {
            border-radius: 8px;
            overflow: hidden;
        }
        .modal-header {
            border-bottom: none;
        }
        .modal-title {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .modal-body {
            padding: 2rem;
        }
        #smartwizard {
            margin: 0;
            padding: 0;
        }
        #smartwizard ul {
            padding: 0;
            margin: 0;
            list-style: none;
            display: flex;
            justify-content: space-between;
        }
        #smartwizard ul li {
            width: 23%;
            text-align: center;
        }
        #smartwizard ul li a {
            display: block;
            padding: 0.5rem;
            background-color: #f7f7f7;
            color: #333;
            text-decoration: none;
            border-radius: 4px;
        }
        #smartwizard ul li a.small {
            font-size: 0.75rem;
        }
        #smartwizard ul li a.active {
            background-color: #007bff;
            color: white;
        }
        #smartwizard ul li a.active small {
            color: white;
        }
        #smartwizard .sw-theme-arrows .sw-btn {
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            border: none;
        }
        #smartwizard .sw-theme-arrows .sw-btn:hover {
            background-color: #0056b3;
        }
        /* Smart Wizard Toolbar Buttons */
        .sw-toolbar {
            display: flex;
            justify-content: space-between;
            padding: 1rem;
            background: #f1f1f1;
            border-top: 1px solid #ddd;
        }
        .sw-toolbar .sw-btn {
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            margin: 0.25rem;
            cursor: pointer;
        }
        .sw-toolbar .sw-btn:hover {
            background-color: #0056b3;
        }
        .sw-toolbar .sw-btn:disabled {
            background-color: #c0c0c0;
            cursor: not-allowed;
        }
        .multi-step-form {
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .step-indicators {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .step-indicators .indicator .icon {
            width: 40px;
            height: 40px;
            line-height: 40px;
            font-size: 18px;
        }
        .step {
            display: none;
        }
        .step.active {
            display: block;
        }
        .btn-next, .btn-prev {
            background-color: #DB504A;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }
        .btn-prev {
            background-color: #ccc;
        }
        .form-group {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }
        .form-group .form-label {
            flex: 1 1 100%;
            margin-bottom: 5px;
        }
        .form-group .form-control {
            flex: 1 1 calc(50% - 10px);
            margin-right: 10px;
        }
        .form-group .form-control:last-child {
            margin-right: 0;
        }
</style>
</head>
<body>
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Applicants</h1>
                <ul class="breadcrumb">
                    <li><a href="#">Applicants</a></li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li><a class="active" href="#">Home</a></li>
                </ul>
            </div>
            <a href="#" class="btn-download" id="add-applicants-btn">
                <i class='bx bx-user-plus'></i>
                <span class="text">Add Applicants</span>
            </a>
        </div>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Users Info</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                <td>
                    <img src="img/profileko.png">
                    <p>Bryan Alano</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status completed">Completed</span></td>
                <td class="action-cell">
                    <button class="action-btn view-btn" id="add-applicants-btn" title="View"><i class="bx bx-show view-icon"></i></button>
                    <button class="action-btn update-btn" id="add-applicants-btn" title="Update"><i class="bx bxs-edit-alt update-icon"></i></button>
                    <button class="action-btn delete-btn" title="Delete"><i class="bx bx-trash delete-icon"></i></button>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="img/profileko.png">
                    <p>Bryan Alano</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status pending">Pending</span></td>
                <td class="action-cell">
                    <button class="action-btn view-btn" title="View"><i class="bx bx-show view-icon"></i></button>
                    <button class="action-btn update-btn" title="Update"><i class="bx bxs-edit-alt update-icon"></i></button>
                    <button class="action-btn delete-btn" title="Delete"><i class="bx bx-trash delete-icon"></i></button>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="img/profileko.png">
                    <p>Bryan Alano</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status process">Process</span></td>
                <td class="action-cell">
                    <button class="action-btn view-btn" title="View"><i class="bx bx-show view-icon"></i></button>
                    <button class="action-btn update-btn" title="Update"><i class="bx bxs-edit-alt update-icon"></i></button>
                    <button class="action-btn delete-btn" title="Delete"><i class="bx bx-trash delete-icon"></i></button>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="img/profileko.png">
                    <p>Bryan Alano</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status pending">Pending</span></td>
                <td class="action-cell">
                    <button class="action-btn view-btn" title="View"><i class="bx bx-show view-icon"></i></button>
                    <button class="action-btn update-btn" title="Update"><i class="bx bxs-edit-alt update-icon"></i></button>
                    <button class="action-btn delete-btn" title="Delete"><i class="bx bx-trash delete-icon"></i></button>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="img/profileko.png">
                    <p>Bryan Alano</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status completed">Completed</span></td>
                <td class="action-cell">
                    <button class="action-btn view-btn" title="View"><i class="bx bx-show view-icon"></i></button>
                    <button class="action-btn update-btn" title="Update"><i class="bx bxs-edit-alt update-icon"></i></button>
                    <button class="action-btn delete-btn" title="Delete"><i class="bx bx-trash delete-icon"></i></button>
                </td>
            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

<!-- Overlay -->
<div id="overlay" class="overlay" style="display: none;"></div>

<!-- Modal -->
<div id="add-applicants-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <?php include('../MultiStep.php');?>
    </div>
</div>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include Smart Wizard JS -->
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.smartWizard.min.js"></script>
    <script>
  document.addEventListener('DOMContentLoaded', function() {
    const steps = document.querySelectorAll('.step');
    const nextBtns = document.querySelectorAll('.btn-next');
    const prevBtns = document.querySelectorAll('.btn-prev');
    let currentStep = 0;

    function showStep(stepIndex) {
      steps.forEach((step, index) => {
        step.classList.toggle('active', index === stepIndex);
      });
    }

    nextBtns.forEach(btn => btn.addEventListener('click', () => {
      currentStep = Math.min(currentStep + 1, steps.length - 1);
      showStep(currentStep);
    }));

    prevBtns.forEach(btn => btn.addEventListener('click', () => {
      currentStep = Math.max(currentStep - 1, 0);
      showStep(currentStep);
    }));

    showStep(currentStep);
  });
</script>
</body>
</html>
