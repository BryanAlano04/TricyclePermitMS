<?php 
$navbarColor = '';
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'verifier') {
        $navbarColor = '#F9F9F9';
    } else {
        $navbarColor = ''; // Default color or you can specify a default color here
    }
} else {
    $navbarColor = ''; // Default color or you can specify a default color here
}
?>
<!-- NAVBAR -->
<nav style="background-color: <?php echo $navbarColor; ?>">
    <i class='bx bx-menu'></i>
    <a href="#" class="nav-link"></a>
    <form action="#">
        <div class="form-input">
            <input type="search" placeholder="Search...">
            <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
        </div>
    </form>
    <a href="#" class="notification">
        <i class='bx bxs-bell'></i>
        <span class="num">8</span>
    </a>
    <a href="#" class="profile">
        <img src="img/profileko.png" alt="Profile Picture">
    </a>
</nav>
