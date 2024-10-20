<?php
// Start the session
session_start();

// Check if admin is logged in
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];

    // Connect to the database
    include 'db_connection.php';

    // Fetch admin details
    $stmt = $conn->prepare("SELECT first_name, last_name, profile_image FROM admins WHERE id = ?");
    $stmt->bind_param("i", $admin_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        $first_name = htmlspecialchars($admin['first_name']);
        $last_name = htmlspecialchars($admin['last_name']);
        $profile_image = !empty($admin['profile_image']) ? $admin['profile_image'] : 'data:image/png;base64,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'; // Default image if none is set
    } else {
        header("Location: login.php");
        exit();
    }

    // Fetch dynamic data for overview cards
    // Total Courses
    $result = $conn->query("SELECT COUNT(*) AS total_courses FROM courses");
    $total_courses = $result->fetch_assoc()['total_courses'];

    // Active Instructors
    $result = $conn->query("SELECT COUNT(*) AS active_instructors FROM instructors WHERE status = 'Active'");
    $active_instructors = $result->fetch_assoc()['active_instructors'];

    // Enrolled Students
    $result = $conn->query("SELECT COUNT(*) AS enrolled_students FROM students WHERE status = 'Approved'");
    $enrolled_students = $result->fetch_assoc()['enrolled_students'];

    // Pending Approvals
    $result = $conn->query("SELECT COUNT(*) AS pending_approvals FROM students WHERE status = 'Pending'");
    $pending_approvals = $result->fetch_assoc()['pending_approvals'];

    // Total Tasks
    $stmt = $conn->prepare("SELECT COUNT(*) AS total_tasks FROM admin_tasks WHERE user_id = ?");
    $stmt->bind_param("i", $admin_id);
    $stmt->execute();
    $total_tasks = $stmt->get_result()->fetch_assoc()['total_tasks'];

    // Total Assignments
    $result = $conn->query("SELECT COUNT(*) AS total_assignments FROM assignments");
    $total_assignments = $result->fetch_assoc()['total_assignments'];

    // Fetch recent activities
    $stmt = $conn->prepare("SELECT activity_title, activity_start_date, activity_end_date, status FROM activities WHERE status = 'Pending' OR status = 'Ended'");
    $stmt->execute();
    $activities_result = $stmt->get_result();
} else {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/course.css">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="../img/licon.png" type="image/x-icon">
    <style>
        /* Additional CSS for improved styling */
        /* Additional CSS for improved styling */
        .widget {
            background: linear-gradient(135deg, #f0f8ff, #e6f7ff);
            border-radius: 20px;
            padding: 30px;
            margin: 20px 0;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
            position: relative;
            overflow: hidden;
            max-width: 500px;
            /* Increased the widget width */
        }

        .widget:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
        }

        .widget::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1), transparent 70%);
            animation: pulse 4s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }

        .clock {
            font-size: 48px;
            /* Increased clock size */
            font-weight: bold;
            margin-bottom: 15px;
            color: #000;
            /* Added color for the numbers */
            text-shadow: 1px 1px 10px rgba(0, 0, 0, 0.2);
            animation: glow 1s ease-in-out infinite alternate;
        }

        .date {
            font-size: 24px;
            /* Increased date size */
            color: #e74c3c;
            /* Changed the color of the date */
            font-weight: 600;
            letter-spacing: 1px;
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 15px #00aaff, 0 0 30px #00aaff, 0 0 45px #00aaff, 0 0 60px #00aaff;
            }

            to {
                text-shadow: none;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <?php include 'sidebar.php' ?>

        <!-- Main Content -->
        <div class="main-content" id="main-content">
            <header>
                <button class="toggle-btn" id="toggle-btn">&#9776;</button>
                <h2>Dashboard Overview</h2>
                <div class="user-wrapper">
                    <img src="<?php echo $profile_image; ?>" alt="User Image" style="width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;">
                    <div>
                        <h4><?php echo $first_name . ' ' . $last_name; ?></h4>
                        <small>Super Admin</small>
                    </div>
                </div>
            </header>

            <!-- Clock and Date Widget -->
            <div class="widget">
                <div class="clock">
                    <span id="clock"></span>
                </div>
                <div class="date">
                    <span id="date"></span>
                </div>
            </div>

            <!-- Overview Cards -->
            <div class="overview">
                <div class="card">
                    <h3>Total Courses</h3>
                    <p><?php echo $total_courses; ?></p>
                </div>
                <div class="card">
                    <h3>Active Instructors</h3>
                    <p><?php echo $active_instructors; ?></p>
                </div>
                <div class="card">
                    <h3>Enrolled Students</h3>
                    <p><?php echo $enrolled_students; ?></p>
                </div>
                <div class="card">
                    <h3>Pending Approvals</h3>
                    <p><?php echo $pending_approvals; ?></p>
                </div>
                <div class="card">
                    <h3>Total Tasks</h3>
                    <p><?php echo $total_tasks; ?></p>
                </div>
                <div class="card">
                    <h3>Total Assignments</h3>
                    <p><?php echo $total_assignments; ?></p>
                </div>
            </div>

            <!-- Recent Activities Section -->
            <section class="recent-activities">
                <h3>Recent Activities</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Activity Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($activity = $activities_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $activity['activity_title']; ?></td>
                                <td><?php echo $activity['activity_start_date']; ?></td>
                                <td><?php echo $activity['activity_end_date']; ?></td>
                                <td><?php echo $activity['status']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>

    <script src="js/scripts.js"></script>
    <script>
        // JavaScript code to update the clock and date
        function updateClock() {
            const clock = document.getElementById('clock');
            const date = document.getElementById('date');
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();
            const day = now.getDate();
            const month = now.getMonth() + 1;
            const year = now.getFullYear();

            clock.textContent = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            date.textContent = `${day}/${month}/${year}`;
        }

        updateClock();
        setInterval(updateClock, 1000);
    </script>
</body>

</html>