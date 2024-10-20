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

// Get the course ID from the URL
$course_id = $_GET['id'];

// Check if the course ID is valid
$stmt = $conn->prepare("SELECT * FROM courses WHERE id = ?");
$stmt->bind_param("i", $course_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $course = $result->fetch_assoc();

    // If the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $course_title = $_POST['edit-course-title'];
        $course_category = $_POST['edit-course-category'];
        $start_duration = $_POST['start-duration'];
        $end_duration = $_POST['end-duration'];
        $eligibility = $_POST['edit-course-eligibility'];
        $curriculum = $_POST['edit-course-curriculum'];
        $specializations = $_POST['edit-course-specializations'];
        $course_type = $_POST['edit-course-type'];
        $course_level = $_POST['edit-course-level'];
        $title_2 = $_POST['edit-course-title-2'];
        $description = $_POST['edit-course-description'];

        // Check if a new image is uploaded
        if (!empty($_FILES['edit-course-image']['name'])) {
            $course_image = $_FILES['edit-course-image'];
            $image_path = '../uploads/' . $course_image['name'];
            move_uploaded_file($course_image['tmp_name'], $image_path);
        } else {
            $image_path = $course['course_image'];
        }

        // Validate form data
        if (empty($course_title) || empty($start_duration) || empty($end_duration)) {
            $errors[] = "Please fill out all required fields.";
        }

        // Only proceed if there are no validation errors
        if (empty($errors)) {
            // Prepare SQL to update course details
            $stmt = $conn->prepare("UPDATE courses SET 
            course_title=?, 
            course_category=?, 
            start_date=?, 
            end_date=?, 
            course_eligibility=?, 
            curriculum=?, 
            specializations=?, 
            course_type=?, 
            course_level=?, 
            title_2=?, 
            description=?, 
            course_image=? 
            WHERE id=?");

            // Bind parameters
            $stmt->bind_param(
                "ssssssssssssi",
                $course_title,
                $course_category,
                $start_duration,
                $end_duration,
                $eligibility,
                $curriculum,
                $specializations,
                $course_type,
                $course_level,
                $title_2,
                $description,
                $image_path,
                $course_id
            );

            // Execute the statement
            if ($stmt->execute()) {
                $successMessage = "Course updated successfully!";
                header("Location: courses.php?success=true");
                exit;
            } else {
                $errors[] = "Error updating course: " . $stmt->error;
                header("Location: courses.php?error=true");
                exit;
            }
        }
    }
} else {
    // If no course is found, redirect to course list or show an error
    header("Location: courses.php");
    exit();
}

// Display the course details
$course_title = $course['course_title'];
$course_category = $course['course_category'];
$start_duration = $course['start_date'];
$end_duration = $course['end_date'];
$eligibility = $course['course_eligibility'];
$curriculum = $course['curriculum'];
$specializations = $course['specializations'];
$course_type = $course['course_type'];
$course_level = $course['course_level'];
$title_2 = $course['title_2'];
$description = $course['description'];
$course_image = $course['course_image'];

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
                <h2>Edit Courses</h2>
                <div class="user-wrapper">
                    <img src="<?php echo $profile_image; ?>" alt="User Image" style="width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;">
                    <div>
                        <h4><?php echo $first_name . ' ' . $last_name; ?></h4>
                        <small>Super Admin</small>
                    </div>
                </div>
            </header>

            <!-- Edit Modal -->
            <h3>Edit Course</h3>
            <section class="upload-form-section">
                <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
                    <div class="alert alert-success">
                        Course updated successfully!
                    </div>
                <?php elseif (isset($_GET['error']) && $_GET['error'] == 'true'): ?>
                    <div class="alert alert-danger">
                        Error updating course!
                    </div>
                <?php endif; ?>
                <form id="edit-course-form" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="edit-course-title">Course Title</label>
                        <input type="text" id="edit-course-title" name="edit-course-title" value="<?php echo $course_title; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-course-category">Category</label>
                        <select id="edit-course-category" name="edit-course-category" required>
                            <option value="Tech" <?php if ($course_category == 'Tech') echo 'selected'; ?>>Tech</option>
                            <option value="Business" <?php if ($course_category == 'Business') echo 'selected'; ?>>Business</option>
                            <option value="Design" <?php if ($course_category == 'Design') echo 'selected'; ?>>Design</option>
                            <!-- Add more categories as needed -->
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="start-duration">Start Date</label>
                            <input type="date" id="start-duration" name="start-duration" value="<?php echo $start_duration; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="end-duration">End Date</label>
                            <input type="date" id="end-duration" name="end-duration" value="<?php echo $end_duration; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit-course-eligibility">Eligibility</label>
                        <select id="edit-course-eligibility" name="edit-course-eligibility" required>
                            <option value="Beginner" <?php if ($eligibility == 'Beginner') echo 'selected'; ?>>Beginner</option>
                            <option value="Intermediate" <?php if ($eligibility == 'Intermediate') echo 'selected'; ?>>Intermediate</option>
                            <option value="Advanced" <?php if ($eligibility == 'Advanced') echo 'selected'; ?>>Advanced</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit-course-curriculum">Curriculum</label>
                        <textarea id="edit-course-curriculum" name="edit-course-curriculum" rows="3" placeholder="Enter curriculum items separated by commas"><?php echo $curriculum; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit-course-specializations">Specializations</label>
                        <textarea id="edit-course-specializations" name="edit-course-specializations" rows="3" placeholder="Enter specializations separated by commas"><?php echo $specializations; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit-course-type">Course Type</label>
                        <select id="edit-course-type" name="edit-course-type" required>
                            <option value="Online" <?php if ($course_type == 'Online') echo 'selected'; ?>>Online</option>
                            <option value="Offline" <?php if ($course_type == 'Offline') echo 'selected'; ?>>Offline</option>
                            <option value="Hybrid" <?php if ($course_type == 'Hybrid') echo 'selected'; ?>>Hybrid</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit-course-level">Course Level</label>
                        <select id="edit-course-level" name="edit-course-level" required>
                            <option value="Beginner" <?php if ($course_level == 'Beginner') echo 'selected'; ?>>Beginner</option>
                            <option value="Intermediate" <?php if ($course_level == 'Intermediate') echo 'selected'; ?>>Intermediate</option>
                            <option value="Advanced" <?php if ($course_level == 'Advanced') echo 'selected'; ?>>Advanced</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit-course-title-2">Title-2</label>
                        <input type="text" id="edit-course-title-2" name="edit-course-title-2" value="<?php echo $title_2; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-course-description">Description</label>
                        <textarea id="edit-course-description" name="edit-course-description" rows="4" required><?php echo $description; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit-course-image">Course Image</label>
                        <input type="file" id="edit-course-image" name="edit-course-image" accept="image/*">
                        <img src="<?php echo $course_image; ?>" alt="Course Image" style="width: auto; height: 200px; border-radius: 10%; object-fit: cover; margin-top: 15px;">
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="submit-btn">Save Changes</button>
                        <button type="button" class="cancel-btn" id="cancel-edit-btn" onclick="location.href='courses.php'">Cancel</button>
                    </div>
                </form>
            </section>
        </div>
    </div>

    <script src="js/scripts.js"></script>

</body>

</html>