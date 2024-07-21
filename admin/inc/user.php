<?php
// error_reporting(0); // Disable all error reporting
// ini_set('display_errors', 0); // Hide errors on the page
include('../../config.php'); // Adjust the path as needed

// Debugging step: Check if $conx is set and a valid connection
if (!isset($conx) || !$conx) {
    die('Database connection failed.');
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debugging step: Ensure that $_POST contains the expected keys
    if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['role'])) {
        $username = mysqli_real_escape_string($conx, $_POST['username']);
        $email = mysqli_real_escape_string($conx, $_POST['email']);
        $password = mysqli_real_escape_string($conx, md5($_POST['password']));
        $role = mysqli_real_escape_string($conx, $_POST['role']);
        $active = ($role === 'admin' || $role === 'verifier') ? 1 : 0; // Ensure active status based on role

        // Check if email already exists
        $email_check_query = "SELECT * FROM user WHERE email='{$email}'";
        $email_check_result = mysqli_query($conx, $email_check_query);

        if ($email_check_result && mysqli_num_rows($email_check_result) > 0) {
            echo "This Email '{$email}' is already registered.";
        } else {
            // Insert new account into database
            $query = "INSERT INTO user (username, email, password, role, token, active) VALUES ('$username', '$email', '$password', '$role', '', '$active')";
            if (mysqli_query($conx, $query)) {
                echo "Account successfully created.";
            } else {
                echo "Error: " . mysqli_error($conx);
            }
        }
        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $query = "DELETE FROM user WHERE id = '$id'";
            if (mysqli_query($conx, $query)) {
                echo "User deleted successfully.";
            } else {
                echo "Error deleting user: " . mysqli_error($conx);
            }
        }
    } else {
        echo "Invalid form submission.";
    }
}

// Fetch user data for display
$query = "SELECT id, username, email, role, created_at, active FROM user";
$result = mysqli_query($conx, $query);

// Ensure that the query was successful
if (!$result) {
    die('Error retrieving user data: ' . mysqli_error($conx));
}
?>
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
        <table id="users-table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $status = $row['active']? 'Active' : 'Inactive';
                        echo "<tr>
                                <td>{$row['username']}</td>
                                <td>{$row['created_at']}</td>
                                <td>{$status}</td>
                                <td>{$row['role']}</td>
                                <td>
                                    <button class='btn btn-edit' data-id='{$row['id']}'>Edit</button> 
                                    <button class='btn btn-delete' data-id='{$row['id']}'>Delete</button>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No users found</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
</main>

<!-- Modal -->
<div id="add-applicants-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Add Account</h2>
        <form id="add-account-form">
            <div class="input-field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-field">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="verifier">Verifier</option>
                </select>
            </div>
            <div class="input-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Create Account</button>
        </form>
        <div id="message"></div>
    </div>
</div>
<!-- Edit Modal -->
<div id="edit-applicants-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Account</h2>
        <form id="edit-account-form">
            <input type="hidden" id="edit-id" name="id">
            <div class="input-field">
                <label for="edit-username">Username</label>
                <input type="text" id="edit-username" name="username" required>
            </div>
            <div class="input-field">
                <label for="edit-email">Email</label>
                <input type="email" id="edit-email" name="email" required>
            </div>
            <div class="input-field">
                <label for="edit-role">Role</label>
                <select id="edit-role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="verifier">Verifier</option>
                </select>
            </div>
            <div class="input-field">
                <label for="edit-active">Status</label>
                <select id="edit-active" name="active" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <button type="submit">Update Account</button>
        </form>
        <div id="edit-message"></div>
    </div>
</div>

</main>
