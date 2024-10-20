<?php
session_start();
include 'db_connection.php';

// Initialize message variable
$message = '';

// Check if the admin is logged in
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];

    // Fetch the logged-in admin's details from the database
    $stmt = $conn->prepare("SELECT first_name, last_name, profile_image FROM admins WHERE id = ?");
    $stmt->bind_param("i", $admin_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // If the admin is found
    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        $first_name = $admin['first_name'];
        $last_name = $admin['last_name'];

        // Check if the profile image exists; if not, use a default image
        $profile_image = !empty($admin['profile_image']) ? $admin['profile_image'] : 'data:image/png;base64,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'; // Default image if none is set
    } else {
        // If no admin is found, redirect to login
        header("Location: login.php");
        exit();
    }
} else {
    // If no session is set, redirect to login
    header("Location: login.php");
    exit();
}

// Handle approval request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $studentId = $_POST['id'];

        // Prepare and execute the update statement
        $query = "UPDATE students SET status = 'Approved' WHERE id = ?";
        $stmt = $conn->prepare($query);

        // Check if the prepare statement was successful
        if ($stmt) {
            $stmt->bind_param("i", $studentId);

            if ($stmt->execute()) {
                $message = 'Student approved successfully.';
            } else {
                $message = 'Failed to approve student.';
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            $message = 'Failed to prepare the SQL statement.';
        }
    }
}

// Fetch registered students from the database
$query = "SELECT * FROM students";
$result = $conn->query($query);

// Check if the query was successful
if (!$result) {
    die("Database query failed: " . $conn->error);
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
    <link rel="stylesheet" href="css/students.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="../img/licon.png" type="image/x-icon">
</head>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Main Content -->
        <div class="main-content" id="main-content">
            <header>
                <button class="toggle-btn" id="toggle-btn">&#9776;</button>
                <h2>Students List</h2>
                <div class="user-wrapper">
                    <img src="<?php echo $profile_image; ?>" alt="User Image" style="width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;">
                    <div>
                        <h4><?php echo $first_name . ' ' . $last_name; ?></h4>
                        <small>Super Admin</small>
                    </div>
                </div>
            </header>

            <!-- Display success message -->
            <?php if ($message): ?>
                <div class="alert">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <div class="students-list">
                <table>
                    <thead>
                        <tr>
                            <th>S/N</th> <!-- Serial Number Header -->
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Selected Course</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $serialNumber = 1;
                        while ($row = mysqli_fetch_assoc($result)):
                        ?>
                            <tr>
                                <td><?php echo $serialNumber++; ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone_number']; ?></td>
                                <td><?php echo $row['selected_course']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td>
                                    <?php if ($row['status'] === 'approved'): ?>
                                        <button class="approve-btn" disabled>Approved</button>
                                    <?php else: ?>
                                        <button class="approve-btn" data-id="<?php echo $row['id']; ?>">Approve</button>
                                    <?php endif; ?>
                                    <button class="view-btn" data-id="<?php echo $row['id']; ?>">View</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <!-- Student Detail Sidebar -->
            <div id="student-details-sidebar" class="sidebar-details">
                <div class="sidebar-content">
                    <span class="close-sidebar" id="close-sidebar">&times;</span>
                    <h3>Student Details</h3>
                    <p><strong>First Name:</strong> <span id="student-first-name"></span></p>
                    <p><strong>Last Name:</strong> <span id="student-last-name"></span></p>
                    <p><strong>Email:</strong> <span id="student-email"></span></p>
                    <p><strong>Phone Number:</strong> <span id="student-phone"></span></p>
                    <p><strong>Nationality:</strong> <span id="student-nationality"></span></p>
                    <p><strong>State of Origin:</strong> <span id="student-state"></span></p>
                    <p><strong>Selected Course:</strong> <span id="student-course"></span></p>
                    <p><strong>Qualification:</strong> <span id="student-qualification"></span></p>
                    <p><strong>Address 1:</strong> <span id="student-address1"></span></p>
                    <p><strong>Address 2:</strong> <span id="student-address2"></span></p>
                    <p><strong>How Did You Hear About Us?</strong> <span id="student-heard"></span></p>
                    <p><strong>Uploaded Qualification:</strong></p>
                    <img id="student-qualification-img" src="" alt="Qualification Image" style="width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </div>

    <script src="js/scripts.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const viewButtons = document.querySelectorAll('.view-btn');
            const sidebar = document.getElementById('student-details-sidebar');
            const closeSidebar = document.getElementById('close-sidebar');

            viewButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const studentId = button.getAttribute('data-id');

                    fetch(`get_student_details.php?id=${studentId}`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('student-first-name').textContent = data.first_name;
                            document.getElementById('student-last-name').textContent = data.last_name;
                            document.getElementById('student-email').textContent = data.email;
                            document.getElementById('student-phone').textContent = data.phone_number;
                            document.getElementById('student-nationality').textContent = data.nationality;
                            document.getElementById('student-state').textContent = data.state_of_origin;
                            document.getElementById('student-course').textContent = data.selected_course;
                            document.getElementById('student-qualification').textContent = data.qualification;
                            document.getElementById('student-address1').textContent = data.address1;
                            document.getElementById('student-address2').textContent = data.address2;
                            document.getElementById('student-heard').textContent = data.heard_about_us;
                            document.getElementById('student-qualification-img').src = data.qualification_image;

                            sidebar.classList.add('active');
                        });
                });
            });

            closeSidebar.addEventListener('click', () => {
                sidebar.classList.remove('active');
            });

            window.addEventListener('click', (event) => {
                if (event.target == sidebar) {
                    sidebar.classList.remove('active');
                }
            });

            // Approve Button Click Event
            // Approve Button Click Event
            const approveButtons = document.querySelectorAll('.approve-btn');

            approveButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const studentId = button.getAttribute('data-id');

                    fetch('', { // Sending request to the same PHP file
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: `id=${studentId}`,
                        })
                        .then(response => response.text())
                        .then(data => {
                            if (data.includes('Student approved successfully.')) {
                                // Update the button text and disable it
                                button.textContent = 'Approved';
                                button.disabled = true;

                                // Reload the page to reflect changes
                                location.reload(); // Reload the page
                            } else {
                                alert(data); // Display error message
                            }
                        });
                });
            });
        });
    </script>
</body>

</html>