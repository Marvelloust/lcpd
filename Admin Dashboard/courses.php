<?php
session_start();
include 'db_connection.php';

$successMessage = '';
$errors = [];

// Assuming you have stored the admin's ID in the session during login
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
        // If no admin is found, redirect to login or show an error
        header("Location: login.php");
        exit();
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input data
    $courseTitle = filter_var(trim($_POST['course-title']), FILTER_SANITIZE_STRING);
    $courseCategory = filter_var(trim($_POST['course-category']), FILTER_SANITIZE_STRING);
    $startDate = $_POST['start-duration'];
    $endDate = $_POST['end-duration'];
    $courseEligibility = filter_var(trim($_POST['course-eligibility']), FILTER_SANITIZE_STRING);
    $curriculum = filter_var(trim($_POST['course-curriculum']), FILTER_SANITIZE_STRING);
    $specializations = filter_var(trim($_POST['course-specializations']), FILTER_SANITIZE_STRING);
    $courseType = filter_var(trim($_POST['course-type']), FILTER_SANITIZE_STRING);
    $courseLevel = filter_var(trim($_POST['course-level']), FILTER_SANITIZE_STRING);
    $title2 = filter_var(trim($_POST['course-title-2']), FILTER_SANITIZE_STRING);
    $description = filter_var(trim($_POST['course-description']), FILTER_SANITIZE_STRING);

    // Handle file upload
    if (isset($_FILES['course-image']) && $_FILES['course-image']['error'] !== UPLOAD_ERR_NO_FILE) {
        $courseImage = $_FILES['course-image'];
        $targetDir = "uploads/"; // Ensure this directory exists and is writable
        $targetFile = $targetDir . basename($courseImage["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an actual image
        $check = getimagesize($courseImage["tmp_name"]);
        if ($check === false) {
            $errors[] = "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size (limit to 2MB)
        if ($courseImage["size"] > 2000000) {
            $errors[] = "File is too large. Maximum size is 2MB.";
            $uploadOk = 0;
        }

        // Allow only certain file formats
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            $errors[] = "Only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if there were any errors before uploading
        if ($uploadOk === 1) {
            // Generate a unique filename to prevent overwriting
            $uniqueName = uniqid('course_', true) . '.' . $imageFileType;
            $targetFile = $targetDir . $uniqueName;

            // Move the uploaded file
            if (move_uploaded_file($courseImage["tmp_name"], $targetFile)) {
                // File uploaded successfully
                // You can set a variable to store the image path
                $courseImagePath = $targetFile;
            } else {
                $errors[] = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $errors[] = "Course image is required.";
    }

    // If no errors, proceed to insert into the database
    if (empty($errors)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO courses (course_title, course_category, start_date, end_date, course_eligibility, curriculum, specializations, course_type, course_level, title_2, description, course_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            $errors[] = "Database error: Unable to prepare statement.";
        } else {
            $stmt->bind_param("ssssssssssss", $courseTitle, $courseCategory, $startDate, $endDate, $courseEligibility, $curriculum, $specializations, $courseType, $courseLevel, $title2, $description, $courseImagePath);

            // Execute the statement
            if ($stmt->execute()) {
                $successMessage = "Course uploaded successfully!";
                // Optionally, reset the POST data to clear the form
                $_POST = [];
            } else {
                $errors[] = "Error uploading course: " . $stmt->error;
                // Optionally, delete the uploaded file if the DB insertion fails
                if (file_exists($courseImagePath)) {
                    unlink($courseImagePath);
                }
            }

            // Close the statement
            $stmt->close();
        }
    }
}

// Fetch courses from the database
$sql = "SELECT * FROM courses ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/course.css">
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
                        <img src="<?php echo !empty($admin['profile_image']) ? htmlspecialchars($profile_image, ENT_QUOTES, 'UTF-8') : $profile_image; ?>" alt="User Image" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                        <div>
                            <h4><?php echo $first_name . ' ' . $last_name; ?></h4>
                            <small>Super Admin</small>
                        </div>
                    </div>
            </header>

            <!-- Add Course Button -->
            <div class="add-course-container">
                <button class="add-course-btn" id="add-course-btn">
                    <i class='bx bx-plus'></i> Add New Course
                </button>
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
                            <img src="../<?php echo $row['course_image']; ?>" alt="Course Image">
                            <div class="card-content">
                                <h3><?php echo $row['course_title']; ?></h3>
                                <p class="card-text"><?php echo $row['description']; ?></p>
                                <div class="card-actions">
                                    <button class="view-btn" data-course-id="<?php echo $row['id']; ?>">
                                        <i class='bx bx-show'></i> View
                                    </button>
                                    <button class="edit-btn" onclick="location.href='edit-course.php?id=<?php echo $row['id']; ?>'">
                                        <i class='bx bx-edit'></i> Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section>

            <!-- Upload Form Section -->
            <section class="upload-form-section" id="upload-form-section"
                style="display: none">
                <h3>Upload New Course</h3>
                <form id="upload-course-form" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="course-title">Course Title</label>
                        <input type="text" id="course-title" name="course-title" required>
                    </div>
                    <div class="form-group">
                        <label for="course-category">Category</label>
                        <select id="course-category" name="course-category" required>
                            <option value="Tech">Tech</option>
                            <option value="Business">Business</option>
                            <option value="Design">Design</option>
                            <!-- Add more categories as needed -->
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="start-duration">Start Date</label>
                            <input type="date" id="start-duration" name="start-duration" required>
                        </div>
                        <div class="form-group">
                            <label for="end-duration">End Date</label>
                            <input type="date" id="end-duration" name="end-duration" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="course-eligibility">Eligibility</label>
                        <select id="course-eligibility" name="course-eligibility" required>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="course-curriculum">Curriculum</label>
                        <textarea id="course-curriculum" name="course-curriculum" rows="3" placeholder="Enter curriculum items separated by commas"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="course-specializations">Specializations</label>
                        <textarea id="course-specializations" name="course-specializations" rows="3" placeholder="Enter specializations separated by commas"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="course-type">Course Type</label>
                        <select id="course-type" name="course-type" required>
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                            <option value="Hybrid">Hybrid</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="course-level">Course Level</label>
                        <select id="course-level" name="course-level" required>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="course-title-2">Title-2</label>
                        <input type="text" id="course-title-2" name="course-title-2" required>
                    </div>
                    <div class="form-group">
                        <label for="course-description">Description</label>
                        <textarea id="course-description" name="course-description" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="course-image">Course Image</label>
                        <input type="file" id="course-image" name="course-image" accept="image/*" required>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="submit-btn">Upload Course</button>
                        <button type="button" class="cancel-btn" id="cancel-upload-btn">Cancel</button>
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
                    <button class="delete-btn" id="delete-course-btn" style="display: none;">
                        <i class="fas fa-trash-alt"></i> Delete Course
                    </button>
                    <button class="close-btn" id="close-sidebar-btn">
                        <i class="fas fa-times"></i> Close
                    </button>
                </div>
            </div>

            <!-- Loading Spinner -->
            <div id="loading-spinner">
                <div class="spinner"></div>
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

            // Add Course Toggle Functionality
            const addCourseBtn = document.getElementById('add-course-btn');
            const uploadFormSection = document.getElementById('upload-form-section');
            const courseOverview = document.getElementById('course-overview');
            const cancelUploadBtn = document.getElementById('cancel-upload-btn');

            if (addCourseBtn && uploadFormSection && courseOverview && cancelUploadBtn) {
                addCourseBtn.addEventListener('click', () => {
                    uploadFormSection.style.display = 'block';
                    courseOverview.style.display = 'none';
                });

                cancelUploadBtn.addEventListener('click', () => {
                    uploadFormSection.style.display = 'none';
                    courseOverview.style.display = 'block';
                });
            }

            // Handle Upload Form Submission
            const uploadCourseForm = document.getElementById('upload-course-form');
            const successAlert = document.querySelector('.success-alert');
            const errorAlert = document.querySelector('.error-alert');

            if (successAlert) {
                setTimeout(() => {
                    successAlert.style.opacity = '0';
                    successAlert.style.transition = 'opacity 0.5s ease';
                    setTimeout(() => successAlert.remove(), 500);
                }, 5000); // 5 seconds
            }

            if (errorAlert) {
                setTimeout(() => {
                    errorAlert.style.opacity = '0';
                    errorAlert.style.transition = 'opacity 0.5s ease';
                    setTimeout(() => errorAlert.remove(), 500);
                }, 10000); // 10 seconds
            }

            // View Sidebar Functionality
            const viewButtons = document.querySelectorAll('.view-btn');
            const viewSidebar = document.getElementById('view-sidebar');
            const closeViewSidebar = document.getElementById('close-view-sidebar');
            const closeSidebarBtn = document.getElementById('close-sidebar-btn');
            const deleteCourseBtn = document.getElementById('delete-course-btn');

            let currentCourseId = null; // To keep track of the currently viewed course

            if (viewButtons && viewSidebar && closeViewSidebar && closeSidebarBtn && deleteCourseBtn) {
                viewButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const courseId = this.getAttribute('data-course-id');
                        currentCourseId = courseId; // Set the current course ID
                        console.log('View button clicked for course ID:', courseId); // Debugging

                        // Fetch the course data using AJAX
                        fetch('get_course_details.php?id=' + encodeURIComponent(courseId))
                            .then(response => {
                                console.log('Fetch response status:', response.status); // Debugging
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .then(data => {
                                console.log('Fetched data:', data); // Debugging
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

                                // Check if all elements exist
                                if ([courseImage, courseTitle, courseCategory, startDate, endDate, eligibility, curriculum, specializations, courseType, courseLevel, description].includes(null)) {
                                    console.error('One or more sidebar elements not found');
                                    return;
                                }

                                // Update sidebar content
                                courseImage.src = '../' + data.course_image || 'default-image.jpg';
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

                // Delete Course Functionality
                deleteCourseBtn.addEventListener('click', () => {
                    if (!currentCourseId) {
                        alert('No course selected.');
                        return;
                    }

                    // Confirm Deletion
                    const confirmation = confirm('Are you sure you want to delete this course? This action cannot be undone.');
                    if (!confirmation) return;

                    // Send DELETE request to the server
                    fetch('delete_course.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `id=${currentCourseId}`,
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Course deleted successfully.');

                                // Remove the course card from the overview
                                const courseCard = document.querySelector(`.view-btn[data-course-id="${currentCourseId}"]`).closest('.card');
                                if (courseCard) {
                                    courseCard.remove();
                                }

                                // Close the sidebar
                                closeSidebar();
                            } else {
                                alert('Failed to delete the course. Please try again.');
                                console.error('Deletion error:', data.error);
                            }
                        })
                        .catch(error => {
                            console.error('Error deleting course:', error);
                            alert('An error occurred while deleting the course.');
                        });
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