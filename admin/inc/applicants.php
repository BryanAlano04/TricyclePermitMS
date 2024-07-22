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
            <a href="#" class="btn-download" id="add-applicants-btn" data-toggle="modal" data-target="#exampleModal">
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
                        <!-- Table rows here -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Smart Wizard Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Step 1<br /><small>Account Info</small></a></li>
                            <li><a href="#step-2">Step 2<br /><small>Personal Info</small></a></li>
                            <li><a href="#step-3">Step 3<br /><small>Payment Info</small></a></li>
                            <li><a href="#step-4">Step 4<br /><small>Confirm Details</small></a></li>
                        </ul>
                        <div class="mt-4">
                            <div id="step-1">
                                <div class="row">
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Name" required></div>
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Email" required></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Password" required></div>
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Repeat Password" required></div>
                                </div>
                            </div>
                            <div id="step-2">
                                <div class="row">
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Address" required></div>
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="City" required></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="State" required></div>
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Country" required></div>
                                </div>
                            </div>
                            <div id="step-3">
                                <div class="row">
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Card Number" required></div>
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Card Holder Name" required></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="CVV" required></div>
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Mobile Number" required></div>
                                </div>
                            </div>
                            <div id="step-4">
                                <div class="row">
                                    <div class="col-md-12"><span>Thanks For submitting your details. We will send you a confirmation email and review your details.</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include Smart Wizard JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.smartWizard.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'arrows',
                autoAdjustHeight: true,
                transitionEffect: 'fade',
                showStepURLhash: false,
                toolbarSettings: {
                    toolbarPosition: 'bottom',
                    toolbarButtonPosition: 'right',
                    showNextButton: true,
                    showPreviousButton: true,
                    toolbarExtraButtons: []
                }
            });
        });
    </script>
</body>
</html>
