<?php
$current_page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<section id="sidebar">
    <a href="#" class="brand">
    <img src="../balayan.png" alt="Balayan Logo" class="logo">
        <span class="text">TPMS</span>
    </a>
    <ul class="side-menu top">
        <li class="<?php echo $current_page == 'dashboard' ? 'active' : ''; ?>">
            <a href="index.php?page=dashboard">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="<?php echo $current_page == 'applicants' ? 'active' : ''; ?>">
            <a href="index.php?page=applicants">
                <i class='bx bxs-shopping-bag-alt'></i>
                <span class="text">Applicants</span>
            </a>
        </li>
        <li class="<?php echo $current_page == 'documents' ? 'active' : ''; ?>">
            <a href="index.php?page=documents">
                <i class='bx bxs-shopping-bag-alt'></i>
                <span class="text">Documents</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Analytics</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-message-dots'></i>
                <span class="text">Message</span>
            </a>
        </li>
        <li class="<?php echo $current_page == 'user' ? 'active' : ''; ?>">
            <a href="index.php?page=user">
                <i class='bx bxs-group'></i>
                <span class="text">user</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-group'></i>
                <span class="text">User</span>
            </a>
        </li>
    </ul>
    <!-- <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog'></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="#" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul> -->
    <input type="checkbox" id="switch-mode" hidden>
    <label for="switch-mode" class="switch-mode"></label>
</section>
