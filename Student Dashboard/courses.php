<?php
session_start();
include 'db_connection.php';

$successMessage = '';
$errors = [];

// Assuming you have stored the user's ID in the session during login
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch the logged-in user's details from the database
    $stmt = $conn->prepare("SELECT first_name, last_name, email, phone, profile_image FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // If the user is found
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];
        $email = $user['email'];
        $phone = $user['phone'];
        // Check if the profile image exists; if not, use a default image
        $profile_image = !empty($user['profile_image']) ? $user['profile_image'] : 'data:image/png;base64,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'; // Default image if none is set
    } else {
        // If no user is found, redirect to login or show an error
        header("Location: login.php");
        exit();
    }
} else {
    // If not logged in, redirect to login
    header("Location: ../login.php");
    exit();
}

// Fetch courses from the database
$sql = "SELECT * FROM courses ORDER BY id DESC";
$result = $conn->query($sql);

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form inputs
    $user_id = $_POST['user_id'];
    $course_id = $_POST['course_id'];
    $first_name = $user['first_name']; // From session/user data
    $last_name = $user['last_name'];   // From session/user data
    $email = $user['email'];           // From session/user data
    $phone_number = $user['phone'];    // From session/user data

    // Other form inputs
    $nationality = trim($_POST['nationality']);
    $state_of_origin = trim($_POST['state_of_origin']);
    $qualification = trim($_POST['qualification']);
    $address1 = trim($_POST['address1']);
    $address2 = trim($_POST['address2']);
    $heard_about_us = trim($_POST['heard_about_us']);

    // Handle File Upload
    if (isset($_FILES['qualification_upload']) && $_FILES['qualification_upload']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['qualification_upload']['tmp_name'];
        $fileName = $_FILES['qualification_upload']['name'];
        $fileSize = $_FILES['qualification_upload']['size'];
        $fileType = $_FILES['qualification_upload']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Sanitize file name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Check allowed file extensions
        $allowedfileExtensions = ['jpg', 'gif', 'png', 'jpeg', 'pdf'];
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Directory in which the uploaded file will be moved
            $uploadFileDir = '../uploads/';
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0755, true);
            }
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $qualification_image = $dest_path;
            } else {
                $errors[] = 'There was an error moving the uploaded file.';
            }
        } else {
            $errors[] = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
        }
    } else {
        $errors[] = 'Qualification image is required.';
    }

    // Validate required fields
    if (empty($nationality)) {
        $errors[] = 'Nationality is required.';
    }
    if (empty($state_of_origin)) {
        $errors[] = 'State of Origin is required.';
    }
    if (empty($qualification)) {
        $errors[] = 'Qualification is required.';
    }
    if (empty($address1)) {
        $errors[] = 'Address Line 1 is required.';
    }
    if (empty($heard_about_us)) {
        $errors[] = 'This field is required.';
    }

    // Check if the user has already enrolled in the selected course
    $checkStmt = $conn->prepare("SELECT id FROM students WHERE user_id = ? AND course_id = ?");
    $checkStmt->bind_param("ii", $user_id, $course_id);
    $checkStmt->execute();
    $checkStmt->store_result();
    if ($checkStmt->num_rows > 0) {
        $errors[] = 'You have already enrolled in this course.';
    }
    $checkStmt->close();

    // If no errors, proceed to insert into the database
    if (empty($errors)) {
        $insertStmt = $conn->prepare("INSERT INTO students (user_id, course_id, first_name, last_name, email, phone_number, nationality, state_of_origin, selected_course, qualification, address1, address2, heard_about_us, qualification_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $selected_course = ''; // You can fetch the course title based on course_id if needed
        // Fetch course title
        $courseStmt = $conn->prepare("SELECT course_title FROM courses WHERE id = ?");
        $courseStmt->bind_param("i", $course_id);
        $courseStmt->execute();
        $courseResult = $courseStmt->get_result();
        if ($courseResult->num_rows > 0) {
            $courseData = $courseResult->fetch_assoc();
            $selected_course = $courseData['course_title'];
        }
        $courseStmt->close();

        $insertStmt->bind_param("iissssssssssss", $user_id, $course_id, $first_name, $last_name, $email, $phone_number, $nationality, $state_of_origin, $selected_course, $qualification, $address1, $address2, $heard_about_us, $qualification_image);

        if ($insertStmt->execute()) {
            $successMessage = 'You have successfully enrolled in the course.';
        } else {
            if ($conn->errno === 1062) { // Duplicate entry
                $errors[] = 'An account with this email or phone number already exists.';
            } else {
                $errors[] = 'Database error: ' . $conn->error;
            }
        }

        $insertStmt->close();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/courses.css">
    <!-- Optional: Include Google Fonts for better typography -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="../img/licon.png" type="image/x-icon">
</head>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <?php include 'sidebar.php' ?>

        <!-- Main Content -->
        <div class="main-content" id="main-content">
            <header>
                <button class="toggle-btn" id="toggle-btn">
                    <i class='bx bx-menu'></i>
                </button>
                <h2>Courses Overview</h2>
                <div class="user-wrapper">
                    <img src="<?php echo htmlspecialchars($profile_image); ?>" alt="User Image" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                    <div>
                        <h4><?php echo htmlspecialchars($first_name . ' ' . $last_name); ?></h4>
                        <small>Super user</small>
                    </div>
                </div>
            </header>

            <!-- Toggle Buttons -->
            <div class="toggle-buttons" style="display: none;">
                <button id="show-courses-btn" class="active">View Courses</button>
                <button id="show-enroll-form-btn">Enroll in a Course</button>
            </div>

            <!-- Course Overview Section -->
            <section class="course-overview" id="course-overview">
                <!-- Display Success or Error Messages -->
                <?php if (!empty($successMessage)) : ?>
                    <div class="success-message"><?php echo htmlspecialchars($successMessage); ?></div>
                <?php endif; ?>
                <?php if (!empty($errors)) : ?>
                    <div class="error-messages">
                        <?php foreach ($errors as $error) : ?>
                            <p><?php echo htmlspecialchars($error); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="overview">
                    <!-- Example Course Card -->
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="card">
                            <img src="../<?php echo htmlspecialchars($row['course_image']); ?>" alt="Course Image">
                            <div class="card-content">
                                <h3><?php echo htmlspecialchars($row['course_title']); ?></h3>
                                <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                                <div class="card-actions">
                                    <button class="view-btn" data-course-id="<?php echo htmlspecialchars($row['id']); ?>">
                                        <i class='bx bx-show'></i> View
                                    </button>
                                    <button class="enroll-btn" data-course-id="<?php echo htmlspecialchars($row['id']); ?>">
                                        <i class='bx bx-pencil'></i> Enroll
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section>

            <!-- Enrollment Form Section -->
            <section class="upload-form-section" id="upload-form-section" style="display: none;">
                <h2>Course Enrollment</h2>
                <!-- Display Success or Error Messages -->
                <?php if (!empty($successMessage)) : ?>
                    <div class="success-message"><?php echo htmlspecialchars($successMessage); ?></div>
                <?php endif; ?>
                <?php if (!empty($errors)) : ?>
                    <div class="error-messages">
                        <?php foreach ($errors as $error) : ?>
                            <p><?php echo htmlspecialchars($error); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <form id="enrollment-form" method="POST" action="" enctype="multipart/form-data">
                    <!-- Hidden Fields -->
                    <input type="hidden" id="enrollment-user-id" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
                    <input type="hidden" id="enrollment-course-id" name="course_id" value="">

                    <!-- First Name (Read-Only) -->
                    <div class="form-group">
                        <label for="enrollment-first-name">First Name:</label>
                        <input type="text" id="enrollment-first-name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" readonly>
                    </div>

                    <!-- Last Name (Read-Only) -->
                    <div class="form-group">
                        <label for="enrollment-last-name">Last Name:</label>
                        <input type="text" id="enrollment-last-name" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" readonly>
                    </div>

                    <!-- Email (Read-Only) -->
                    <div class="form-group">
                        <label for="enrollment-email">Email:</label>
                        <input type="email" id="enrollment-email" name="email" value="<?php echo htmlspecialchars($email); ?>" readonly>
                    </div>

                    <!-- Phone Number (Read-Only) -->
                    <div class="form-group">
                        <label for="enrollment-phone">Phone Number:</label>
                        <input type="tel" id="enrollment-phone" name="phone_number" value="<?php echo htmlspecialchars($phone); ?>" readonly>
                    </div>

                    <!-- Nationality -->
                    <div class="form-group">
                        <label for="enrollment-nationality">Nationality:</label>
                        <input type="text" id="enrollment-nationality" name="nationality" required>
                    </div>

                    <!-- State of Origin -->
                    <div class="form-group">
                        <label for="enrollment-state">State of Origin:</label>
                        <input type="text" id="enrollment-state" name="state_of_origin" required>
                    </div>

                    <!-- Qualification -->
                    <div class="form-group">
                        <label for="enrollment-qualification">Highest Qualification:</label>
                        <input type="text" id="enrollment-qualification" name="qualification" required>
                    </div>

                    <!-- Address Line 1 -->
                    <div class="form-group">
                        <label for="enrollment-address1">Address Line 1:</label>
                        <input type="text" id="enrollment-address1" name="address1" required>
                    </div>

                    <!-- Address Line 2 -->
                    <div class="form-group">
                        <label for="enrollment-address2">Address Line 2:</label>
                        <input type="text" id="enrollment-address2" name="address2">
                    </div>

                    <!-- How Did You Hear About Us -->
                    <div class="form-group">
                        <label for="enrollment-reference">How did you hear about us?</label>
                        <textarea id="enrollment-reference" name="heard_about_us" required></textarea>
                    </div>

                    <!-- Upload Qualification Image -->
                    <div class="form-group">
                        <label for="enrollment-qualification-upload">Upload Your Qualification:</label>
                        <input type="file" id="enrollment-qualification-upload" name="qualification_upload" accept="image/*,application/pdf" required>
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="form-actions">
                        <button type="submit" class="submit-btn">Enroll</button>
                        <button type="button" id="cancel-enrollment-btn" class="cancel-btn">Cancel</button>
                    </div>
                </form>
            </section>

            <!-- View Sidebar -->
            <div class="view-sidebar" id="view-sidebar">
                <div class="view-header">
                    <h3>Course Details</h3>
                    <span class="close-sidebar" id="close-view-sidebar" aria-label="Close sidebar" role="button" tabindex="0">&times;</span>
                </div>
                <div class="view-content">
                    <img src="" alt="Course Image" id="view-course-image">
                    <h4 id="view-course-title"><strong>Course Title</strong></h4>
                    <p id="view-course-category"><strong>Category:</strong> ...</p>
                    <p id="view-start-date"><strong>Start Date:</strong> ...</p>
                    <p id="view-end-date"><strong>End Date:</strong> ...</p>
                    <p id="view-eligibility"><strong>Eligibility:</strong> ...</p>
                    <p id="view-curriculum"><strong>Curriculum:</strong> ...</p>
                    <p id="view-specializations"><strong>Specializations:</strong> ...</p>
                    <p id="view-course-type"><strong>Type:</strong> ...</p>
                    <p id="view-course-level"><strong>Level:</strong> ...</p>
                    <p id="view-description"><strong>Course Description:</strong> ...</p>
                </div>
                <div class="view-actions">
                    <button class="delete-btn enroll-course-btn" data-course-id="">
                        <i class="fas fa-trash-alt"></i> Enroll Course
                    </button>
                    <button class="close-btn" id="close-sidebar-btn">
                        <i class="fas fa-times"></i> Close
                    </button>
                </div>
            </div>

        </div>
    </div>

    <script src="js/scripts.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Sidebar Toggle Functionality
            const toggleBtn = document.getElementById('toggle-btn');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');

            if (toggleBtn && sidebar && mainContent) {
                toggleBtn.addEventListener('click', () => {
                    sidebar.classList.toggle('closed');
                    mainContent.classList.toggle('closed');
                });
            }

            // Toggle Buttons for Switching Sections
            const showCoursesBtn = document.getElementById('show-courses-btn');
            const showEnrollFormBtn = document.getElementById('show-enroll-form-btn');
            const courseOverview = document.getElementById('course-overview');
            const uploadFormSection = document.getElementById('upload-form-section');

            showCoursesBtn.addEventListener('click', () => {
                courseOverview.style.display = 'block';
                uploadFormSection.style.display = 'none';
                showCoursesBtn.classList.add('active');
                showEnrollFormBtn.classList.remove('active');
            });

            showEnrollFormBtn.addEventListener('click', () => {
                courseOverview.style.display = 'none';
                uploadFormSection.style.display = 'block';
                showCoursesBtn.classList.remove('active');
                showEnrollFormBtn.classList.add('active');
            });

            // Enroll Button in Course Cards
            const enrollButtons = document.querySelectorAll('.enroll-btn');
            const enrollmentFormSection = document.getElementById('upload-form-section');
            const cancelEnrollmentBtn = document.getElementById('cancel-enrollment-btn');

            enrollButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const courseId = button.getAttribute('data-course-id');
                    // Set the course_id in the hidden field
                    document.getElementById('enrollment-course-id').value = courseId;

                    // Optionally, you can fetch and display the course title or other details in the form
                    // For simplicity, we're just showing the form

                    // Show the enrollment form and hide the course overview
                    courseOverview.style.display = 'none';
                    uploadFormSection.style.display = 'block';
                    showCoursesBtn.classList.remove('active');
                    showEnrollFormBtn.classList.add('active');
                });
            });

            // Handle Cancel Enrollment
            cancelEnrollmentBtn.addEventListener('click', () => {
                uploadFormSection.style.display = 'none';
                courseOverview.style.display = 'block';
                showCoursesBtn.classList.add('active');
                showEnrollFormBtn.classList.remove('active');

                // Clear the course_id from the hidden field
                document.getElementById('enrollment-course-id').value = '';
            });

            // View Sidebar Functionality
            const viewButtons = document.querySelectorAll('.view-btn');
            const viewSidebar = document.getElementById('view-sidebar');
            const closeViewSidebar = document.getElementById('close-view-sidebar');
            const closeSidebarBtn = document.getElementById('close-sidebar-btn');

            let currentCourseId = null; // To keep track of the currently viewed course

            if (viewButtons && viewSidebar && closeViewSidebar && closeSidebarBtn) {
                viewButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        const courseId = this.getAttribute('data-course-id');
                        currentCourseId = courseId; // Set the current course ID

                        // Fetch the course data using AJAX
                        fetch('get_course_details.php?id=' + encodeURIComponent(courseId))
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .then(data => {
                                if (data.error) {
                                    alert('Course not found!');
                                    return;
                                }

                                // Populate the sidebar with fetched course data
                                const courseImage = document.getElementById('view-course-image');
                                const courseTitle = document.getElementById('view-course-title');
                                const courseCategory = document.getElementById('view-course-category');
                                const startDate = document.getElementById('view-start-date');
                                const endDate = document.getElementById('view-end-date');
                                const eligibility = document.getElementById('view-eligibility');
                                const curriculum = document.getElementById('view-curriculum');
                                const specializations = document.getElementById('view-specializations');
                                const courseType = document.getElementById('view-course-type');
                                const courseLevel = document.getElementById('view-course-level');
                                const description = document.getElementById('view-description');

                                // Update sidebar content
                                courseImage.src = '../' + (data.course_image || 'default-image.jpg');
                                courseImage.alt = data.course_title ? `${data.course_title} Image` : 'Course Image';
                                courseTitle.textContent = data.course_title || 'N/A';
                                courseCategory.textContent = 'Category: ' + (data.course_category || 'N/A');
                                startDate.textContent = 'Start Date: ' + (data.start_date || 'N/A');
                                endDate.textContent = 'End Date: ' + (data.end_date || 'N/A');
                                eligibility.textContent = 'Eligibility: ' + (data.course_eligibility || 'N/A');
                                curriculum.textContent = 'Curriculum: ' + (data.curriculum || 'N/A');
                                specializations.textContent = 'Specializations: ' + (data.specializations || 'N/A');
                                courseType.textContent = 'Type: ' + (data.course_type || 'N/A');
                                courseLevel.textContent = 'Level: ' + (data.course_level || 'N/A');
                                description.textContent = data.description || 'N/A';

                                // Set the course ID in the enroll button inside the sidebar
                                const enrollCourseBtn = document.querySelector('.enroll-course-btn');
                                enrollCourseBtn.setAttribute('data-course-id', courseId);

                                // Show the sidebar by adding the 'active' class
                                viewSidebar.classList.add('active');
                            })
                            .catch(error => {
                                console.error('Error fetching course details:', error);
                                alert('An error occurred while fetching course details.');
                            });
                    });
                });

                // Close Sidebar Functionality
                const closeSidebar = () => {
                    viewSidebar.classList.remove('active');
                    currentCourseId = null; // Reset current course ID
                };

                closeViewSidebar.addEventListener('click', closeSidebar);
                closeSidebarBtn.addEventListener('click', closeSidebar);
            }

            // Handle Enrollment from Sidebar
            const enrollCourseBtn = document.querySelector('.enroll-course-btn');
            if (enrollCourseBtn) {
                enrollCourseBtn.addEventListener('click', () => {
                    const courseId = enrollCourseBtn.getAttribute('data-course-id');
                    if (courseId) {
                        // Set the course_id in the hidden field
                        document.getElementById('enrollment-course-id').value = courseId;

                        // Show the enrollment form and hide the course overview
                        courseOverview.style.display = 'none';
                        uploadFormSection.style.display = 'block';
                        showCoursesBtn.classList.remove('active');
                        showEnrollFormBtn.classList.add('active');

                        // Close the sidebar
                        viewSidebar.classList.remove('active');
                    }
                });
            }

            // Close Modal and Sidebar when clicking outside of them
            window.addEventListener('click', (event) => {
                if (viewSidebar && !viewSidebar.contains(event.target) && event.target !== closeViewSidebar) {
                    viewSidebar.classList.remove('active');
                }
            });
        });
    </script>

</body>

</html>
