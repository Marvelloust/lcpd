<?php
// Get the current file name without the extension
$currentPage = basename($_SERVER['PHP_SELF'], ".php");
?>

<link rel="stylesheet" href="css/styles.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<nav class="sidebar" id="sidebar">
    <div class="logo">
        <h2>Admin Panel</h2>
    </div>
    <ul class="nav-links">
        <!-- Dashboard Section -->
        <li>
            <a href="index.php" class="<?= ($currentPage == 'index') ? 'active' : ''; ?>">
                <i class='bx bx-home'></i>
                <span class="link-text">Dashboard</span>
            </a>
        </li>
        
        <!-- Management Section -->
        <li>
            <a href="courses.php" class="<?= ($currentPage == 'courses') ? 'active' : ''; ?>">
                <i class='bx bx-book'></i>
                <span class="link-text">Courses</span>
            </a>
        </li>
        <li>
            <a href="materials.php" class="<?= ($currentPage == 'materials') ? 'active' : ''; ?>">
                <i class='bx bx-folder'></i>
                <span class="link-text">Materials</span>
            </a>
        </li>
        <li>
            <a href="activities.php" class="<?= ($currentPage == 'activities') ? 'active' : ''; ?>">
            <i class='bx bx-run'></i>
                <span class="link-text">Activities</span>
            </a>
        </li>
        <li>
            <a href="task.php" class="<?= ($currentPage == 'task') ? 'active' : ''; ?>">
                <i class='bx bx-task'></i>
                <span class="link-text">Tasks</span>
            </a>
        </li>
        <li>
            <a href="to-do.php" class="<?= ($currentPage == 'to-do') ? 'active' : ''; ?>">
                <i class='bx bx-list-check'></i>
                <span class="link-text">To-do</span>
            </a>
        </li>
        
        <!-- People Management Section -->
        <li>
            <a href="students.php" class="<?= ($currentPage == 'students') ? 'active' : ''; ?>">
                <i class='bx bx-group'></i>
                <span class="link-text">Students</span>
            </a>
        </li>
        <li>
            <a href="instructors.php" class="<?= ($currentPage == 'instructors') ? 'active' : ''; ?>">
                <i class='bx bx-user'></i>
                <span class="link-text">Instructors</span>
            </a>
        </li>

        <!-- Partnerships and Communications -->
        <li>
            <a href="partnership.php" class="<?= ($currentPage == 'partnership') ? 'active' : ''; ?>">
                <i class='bx bx-briefcase'></i>
                <span class="link-text">Partnership</span>
            </a>
        </li>
        <li>
            <a href="newsletter.php" class="<?= ($currentPage == 'newsletter') ? 'active' : ''; ?>">
                <i class='bx bx-envelope'></i>
                <span class="link-text">Newsletters</span>
            </a>
        </li>
        <li>
            <a href="contact.php" class="<?= ($currentPage == 'contact') ? 'active' : ''; ?>">
                <i class='bx bx-phone'></i>
                <span class="link-text">Contact</span>
            </a>
        </li>
        
        <!-- Reports and Settings -->
        <li>
            <a href="reports.php" class="<?= ($currentPage == 'reports') ? 'active' : ''; ?>">
                <i class='bx bx-bar-chart-alt-2'></i>
                <span class="link-text">Reports</span>
            </a>
        </li>
        <li>
            <a href="settings.php" class="<?= ($currentPage == 'settings') ? 'active' : ''; ?>">
                <i class='bx bx-cog'></i>
                <span class="link-text">Settings</span>
            </a>
        </li>
    </ul>
</nav>
