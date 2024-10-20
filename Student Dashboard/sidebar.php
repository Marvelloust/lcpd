<?php
$currentPage = basename($_SERVER['PHP_SELF'], ".php");
?>

<link rel="stylesheet" href="css/styles.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<nav class="sidebar" id="sidebar">
    <div class="logo">
        <h2>Student Panel</h2>
    </div>
    <ul class="nav-links">
        <!-- Home Section -->
        <li>
            <a href="index.php" class="<?= ($currentPage == 'index') ? 'active' : ''; ?>">
                <i class='bx bx-home'></i>
                <span class="link-text">Dashboard</span>
            </a>
        </li>

        <!-- Courses Section -->
        <li>
            <a href="courses.php" class="<?= ($currentPage == 'courses') ? 'active' : ''; ?>">
                <i class='bx bx-book'></i>
                <span class="link-text">Courses</span>
            </a>
        </li>

        <!-- Enrolled Section -->
        <li>
            <a href="enrolled.php" class="<?= ($currentPage == 'enrolled') ? 'active' : ''; ?>">
                <i class='bx bx-bookmark'></i>
                <span class="link-text">Enrolled</span>
            </a>
        </li>

        <!-- Resources Section -->
        <li>
            <a href="resources.php" class="<?= ($currentPage == 'resources') ? 'active' : ''; ?>">
                <i class='bx bx-folder'></i>
                <span class="link-text">Resources</span>
            </a>
        </li>

        <!-- To-Do Section -->
        <li>
            <a href="to-do.php" class="<?= ($currentPage == 'to-do') ? 'active' : ''; ?>">
                <i class='bx bx-list-check'></i>
                <span class="link-text">To-Do</span>
            </a>
        </li>

        <!-- Activities Section -->
        <li>
            <a href="activities.php" class="<?= ($currentPage == 'activities') ? 'active' : ''; ?>">
                <i class='bx bx-run'></i>
                <span class="link-text">Activities</span>
            </a>
        </li>

        <!-- Grades Section -->
        <li>
            <a href="grades.php" class="<?= ($currentPage == 'grades') ? 'active' : ''; ?>">
                <i class='bx bx-award'></i>
                <span class="link-text">Grades</span>
            </a>
        </li>

        <!-- Assignments Section -->
        <li>
            <a href="assignment.php" class="<?= ($currentPage == 'assignment') ? 'active' : ''; ?>">
                <i class='bx bx-task'></i>
                <span class="link-text">Assignments</span>
            </a>
        </li>

        <!-- Messages Section -->
        <li>
            <a href="#" class="<?= ($currentPage == 'messages') ? 'active' : ''; ?>">
                <i class='bx bx-message-square-detail'></i>
                <span class="link-text">Messages</span>
            </a>
        </li>

        <!-- Calendar Section -->
        <li>
            <a href="#" class="<?= ($currentPage == 'calender') ? 'active' : ''; ?>">
                <i class='bx bx-calendar'></i>
                <span class="link-text">Calendar</span>
            </a>
        </li>

        <!-- Reports Section -->
        <li>
            <a href="#" class="<?= ($currentPage == 'reports') ? 'active' : ''; ?>">
                <i class='bx bx-bar-chart'></i>
                <span class="link-text">Reports</span>
            </a>
        </li>

        <!-- Settings Section -->
        <li>
            <a href="settings.php" class="<?= ($currentPage == 'settings') ? 'active' : ''; ?>">
                <i class='bx bx-cog'></i>
                <span class="link-text">Settings</span>
            </a>
        </li>
    </ul>
</nav>
