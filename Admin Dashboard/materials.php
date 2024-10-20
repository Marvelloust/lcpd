<?php
// Start the session
session_start();

// Assuming you have stored the admin's ID in the session during login
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];

    // Connect to the database
    include 'db_connection.php';

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
        $profile_image = !empty($admin['profile_image']) ? $admin['profile_image'] : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMwAAADACAMAAAB/Pny7AAAAJFBMVEXd3d3////a2tro6Ojg4OD8/Pzw8PDl5eX19fX5+fnt7e3X19cEfWo1AAAJMElEQVR4nO2d67KjKhCFCQqKvv/7HgExRkFgdaPuqbN+TU3VNvkCNPQNxYdBupdSECRlrzm+h6A+QI3DTCJZeeZhVM/CKLMMCp1k5em1ofFQYNTYCTYUhyM60vDgMEozo6w4GsdBYZQe+FE8zgDjgDCtUALOjTDj0AokaBhvglHNURwOMNfqYaZm8+tXcmoOY9qtlRONME1h1F3DsuJMdXOtBkaN/Z0oVn2VIaiAUdPdKFY1g1MO094eRyUrrHQxzMR3oqyk6YvNWilM9wyJV8cL88wU2zQwwpjbrdhRfdGWUwIzPo1iVWIGCmD00xxeBSfpPMy9m35aBWe1LMwjO2VcWZoczItY8jQZmEe3l7MyG841TPeS9RIkr2kuYV42LlaXNFcwr1ovQVfr5gLmlSyXNGkY/bL1EiTTu2cS5hVnmLiSJ5sUjBleOjDWwUmdOhMw6r0s1vlMuNJxmGfc/XIlAgNxmLcu/qCEEYjCmKe/bF7RZROFedyxzKsvhXnY4S9TLCwQgXn7gvGKLZszjPoTLAvN2aKdYf7EJLM6T7QTzEvCFyU6TbQjzPMhsnKdjjVHmBf6Y2kdPbUDzP0ZGIqO2ZtfmBbnS7mK/cHnE+cvzMj5kXKexdBNWutxHPXUDb3kKBn6+YgxDWP4zPI899O5Dkbpjhdo+LEBPzBce7+8SncpxkKowzlgD8N1WM5Wi5iOz87sh2YPwzIwfVeUg5yYZvTP0OxgFMOjC1E+viyKRbuFuYMh5y5kXf3OgsNRD7mLo+1gyI/tawvFDEvuJwZDXjFdbanLx544yDi7VfOFIT5SYPV7hiHRcIahRTBlXZHLTgy1RdtHbzAkyy97QtErORC8BTcCDG3DLCw6SNFQt9CwWAMMyY+hsdDHJvg1AYbw40gqC3lswjxbYTT+NAYWauQhtEWsMPgsSycY6mhINq3bw+CODG6TDyJZ6NWt8TCEUWZpfPlQPXa9g4G34UxivkaUzWH9Gg4GnmVyYFkwXpQAhP8eDgafZVyTzEpRjml6g4EXH98ksyJEU71XY2HgzDKPVf4Kt89+vlsYeP/lHRhSqMvtEILyg5Db947Ck9zORbMw6JKp7wnJCW/NcYtGWCsC/j37wFCGplMOBjUi3CvGCjdo1hhZGGyWzcymzAufZx4GXP+yBQtuWa0FEOjGe1H2RRLIshzPlIXBRrbF8reCPavBwWB/S4nHXAmPB1gYbP0DjYeFgr0RY2Fm6E+ZHMyzUAswWxjMmMkmhtkKXTSLRRLgYabVksFPisvEF+A21TWDUdC0FzYUKbA5WtvbWiMUpodhGm2ZViCLg8HWfzNjhpszucC8zDLjZ835I7D11hIGtc2zEtieWdRp+D8M7m3O5t+CGf+dNTP+D/NS0wzDNDwBwD7AG2FQ7wyHaXdqhg+aMAx0+1CZYBdggQH3mXbOGZxAwzfN97nNFgYc1fcFNOzZDFxvjGnmg+Ds2Yw6Z6JBpskLTxZb5wz80zZJAFJ5FRoDEC3yZk44Sw+HmoQQ+S8GiFD4YkNNaCnBy5JN1iShEU1Br/+LiVbXIPAdt0WGhrD8l50PzQKIJlsNpYHHZQEI/Qzsq4bUue8yZ/g0fVG5iTv6CrimwYr5gEYqbXQJWlItESsLqSDYp87RogYnzmMAqXguFDUQiiOZ6oC9iD0vKwxl2fHFAojte4OHoTV9cE00RWsLcqk8UvGcE5NFIzYFbcVztLaCN5TP78oaaV3ApEagjYWGshY200qBvaLXptzL8i0FJj+LSsNw1cW3SJvcbU6baQwsu/J52t7raAhWgIFlDX17T558aVZ992wQz4VdfrfzMBxXZ2AFKDyXwq0dSWuMhaMDHHnLAtNFB+vpPTTQMTxR9rWDY7guhvltoGO6O6fqbUWK7dr0YH5CKI/rKpDyuTbxXT0RfMQAw3fTZFnnFuulg+EH3IKsfI+WWcNmOt47dTaGFj+VlINWcSClzCTQSF1C0wkGT/JEJRfbNhqjNqblX8aM9j1P3BcdfZsSvjDsdzPb+5mGzt1vpPVkrzfiBxE/gdUvTKPr82TDi6f8B6gIzOuuzS7TPuK9g6HEz57TPoe/z3/9xaH5SUX8XDz1F2FSF0/RfbTb9VuQ9HtZ25+6EdCqT1/WBkWvlh+g74dlQ8E1DH3vHlSrQ9nbL0xdZENaik4bliigWk4Hlqnq5zyEHg7Z/HInbTmvDJNmTgQaPQ01r4A9uE8HmNLWwOWgErm/kENqnIrfCHms4DvWWRSFNuwrPJvVm9nxKXvt6OlilVPRSIFbLmkvVy2QGkt2iVN++ASTTT5Lhtf4luBkY1DnMOq5nCdTsdGyCPhXmX0iUosYqU26mmjM+eWMLgcnUoQQK7R6w7B4XQ1O7ItH/i/ppnHfZpJX8oAVrUKKlsAlfhDO639KlTiTxKdIvJ4vahgbVsxfKFoNkyioSrwYJLL0GraZXiqS80i95iRRaWmOYeC7l/5ex1mfrAtJlY0eTpzzgyzLlzlEDVNfJlkDO72H5UiTLApJF/TuFt7c7FqGUk07mnTJ3kV18mYU29X9l+trXy/OIFel1oGmXeNPuTZH6+o8dVk37k3aE3vlWX73lJf1E5cwvmzq4cUfpEW2Tue6ot9tnkgWmV/2HdjJd4KtyrQn2DS9rEq7NpLNsWfvhsz1Wviig+dNsyi55zLbOOLu7X7aOPvvkDVE+S4YH4G+1cM8ahBlba4lLT3uLNCuMTMnH2IpmRtF/Um+UvAhM+COvGX3XJU1W43+gQ8MzlqnXLY7FHaOOV/86kUsjeSjZ6Wxh9I2OOe9om8yQKW0C9MW++vlPX2uBunWwXHDIvvyTa6iQTE8+6bBUfW/Xk235RpauGdwRn/mr/rp6lpHzV1OQTjw131QbR/s6r82PqxNmLde3dTrfRzZ7rZGu0fLvO8SE9Ch7N/uIGUbM620z2kifgfSbq38m72WXYd97Ri/s4geigVjveOm85Mt9pY5XGqc1scib0z6oDCL5Vxx+FK1IS1b8Xqxo/Cu/g2HY3jsoFBRKDALzuQKEFx5A2kjHddSBlfYSXgO7b4Fo309hS08AfPpahnhdVBkT5yy1MsjlOnkFgcear+M+b5Tbxadoc5Wjpswxm+5S/kK2laJ37RYXmPzHw7bZv1JdaUSAAAAAElFTkSuQmCC'; // Default image if none is set
    } else {
        // If no admin is found, redirect to login or show an error
        header("Location: ../login.php");
        exit();
    }
} else {
    // If no session is set, redirect to login
    header("Location: login.php");
    exit();
}

// Handle material upload
if (isset($_POST['upload_material'])) {
    $course_id = intval($_POST['course_id']);
    $material_type = isset($_POST['material_type']) ? $_POST['material_type'] : '';
    $material_file = $_FILES['material_file'];
    $material_description = htmlspecialchars($_POST['material_description']);

    // Validate the file upload
    if ($material_file['error'] === 0) {
        // Validate material type
        $allowed_types = ['video', 'document'];
        if (!in_array($material_type, $allowed_types)) {
            $error_message = 'Invalid material type selected.';
        } else {
            // Move the uploaded file to a designated directory
            $upload_dir = '../uploads/';
            // Ensure the upload directory exists
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            // Sanitize the file name to prevent security issues
            $file_name = basename($material_file['name']);
            $file_name = preg_replace("/[^A-Z0-9._-]/i", "_", $file_name);
            $file_path = $upload_dir . $file_name;
            if (move_uploaded_file($material_file['tmp_name'], $file_path)) {
                // Insert the material into the database
                $stmt = $conn->prepare("INSERT INTO course_materials (course_id, material_type, material_file, material_description) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("isss", $course_id, $material_type, $file_path, $material_description);
                if ($stmt->execute()) {
                    // Display a success message
                    $success_message = 'Material uploaded successfully!';
                } else {
                    // Display an error message
                    $error_message = 'Error uploading material: ' . htmlspecialchars($conn->error);
                }
            } else {
                $error_message = 'Error moving the uploaded file.';
            }
        }
    } else {
        // Display an error message
        $error_message = 'Error uploading material: ' . htmlspecialchars($material_file['error']);
    }
}

// Fetch all courses and their materials
$query = "
    SELECT c.id AS course_id, c.course_title, cm.id AS material_id, cm.material_type, cm.material_file, cm.material_description, cm.uploaded_at
    FROM courses c
    LEFT JOIN course_materials cm ON c.id = cm.course_id
    ORDER BY c.course_title ASC, cm.uploaded_at DESC
";
$result = $conn->query($query);

// Organize materials by course
$courses = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $course_id = $row['course_id'];
        if (!isset($courses[$course_id])) {
            $courses[$course_id] = [
                'course_title' => htmlspecialchars($row['course_title']),
                'materials' => []
            ];
        }
        if (!empty($row['material_id'])) { // Check if there's a material
            $courses[$course_id]['materials'][] = [
                'material_id' => $row['material_id'],
                'material_type' => htmlspecialchars($row['material_type']),
                'material_file' => htmlspecialchars($row['material_file']),
                'material_description' => htmlspecialchars($row['material_description']),
                'uploaded_at' => $row['uploaded_at']
            ];
        }
    }
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
    <link rel="stylesheet" href="css/materials.css">
    <!-- Optional: Include Google Fonts for better typography -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="../img/licon.png" type="image/x-icon">

</head>

<body>
    <div class="dashboard" style="display: flex;">
        <!-- Sidebar -->
        <?php include 'sidebar.php' ?>

        <!-- Main Content -->
        <div class="main-content" id="main-content">
            <header>
                <button class="toggle-btn" id="toggle-btn">&#9776;</button>
                <h2>Courses Materials</h2>
                <div class="user-wrapper">
                    <img src="<?php echo $profile_image; ?>" alt="User Image" style="width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;">
                    <div>
                        <h4><?php echo $first_name . ' ' . $last_name; ?></h4>
                        <small>Super Admin</small>
                    </div>
                </div>
            </header>

            <section class="upload-form-section" id="upload-form-section">
                <?php if (isset($success_message)) : ?>
                    <div class="alert alert-success">
                        <?php echo $success_message; ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($error_message)) : ?>
                    <div class="alert alert-danger">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                <!-- Upload Materials Form -->
                <form id="upload-materials-form" method="post" enctype="multipart/form-data">
                    <h2>Upload Materials for Course</h2>
                    <div class="form-group">
                        <label for="course-id">Select Course:</label>
                        <select id="course-id" name="course_id" required>
                            <option value="" disabled selected>Select a course</option>
                            <?php
                            // Fetch all courses from the database
                            $stmt = $conn->prepare("SELECT id, course_title FROM courses ORDER BY course_title ASC");
                            $stmt->execute();
                            $result_courses = $stmt->get_result();

                            // Populate the select options with course IDs and titles
                            while ($course = $result_courses->fetch_assoc()) {
                                echo '<option value="' . intval($course['id']) . '">' . htmlspecialchars($course['course_title']) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="material-type">Select Material Type:</label>
                        <select id="material-type" name="material_type" required>
                            <option value="" disabled selected>Select material type</option>
                            <option value="video">Video</option>
                            <option value="document">Document</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="material-file">Upload Material File:</label>
                        <input type="file" id="material-file" name="material_file" accept=".pdf,.docx,.jpg,.jpeg,.png,.mp4" required>
                    </div>
                    <div class="form-group">
                        <label for="material-description">Material Description:</label>
                        <textarea id="material-description" name="material_description" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="upload_material" class="submit-btn">Upload Material</button>
                </form>
            </section>

            <!-- Materials Display Section -->
            <section class="materials-section">
                <?php if (!empty($courses)) : ?>
                    <?php foreach ($courses as $course) : ?>
                        <div class="course-materials">
                            <h2><?php echo $course['course_title']; ?></h2>
                            <?php if (!empty($course['materials'])) : ?>
                                <div class="materials-list">
                                    <?php foreach ($course['materials'] as $material) : ?>
                                        <div class="material-card">
                                            <img src="<?php
                                                        // Display appropriate thumbnail based on material type
                                                        if ($material['material_type'] === 'video') {
                                                            echo '../img/video-icon.png'; // Ensure you have this icon
                                                        } elseif ($material['material_type'] === 'document') {
                                                            // Determine document type for specific icons
                                                            $file_extension = pathinfo($material['material_file'], PATHINFO_EXTENSION);
                                                            if (strtolower($file_extension) === 'pdf') {
                                                                echo '../img/pdf-icon.png';
                                                            } elseif (in_array(strtolower($file_extension), ['doc', 'docx'])) {
                                                                echo '../img/docs-icon.png';
                                                            } else {
                                                                echo '../img/file-icon.png';
                                                            }
                                                        } else {
                                                            echo '../img/file-icon.png';
                                                        }
                                                        ?>" alt="Material Thumbnail">
                                            <div class="material-info">
                                                <h4><?php echo $material['material_description']; ?></h4>
                                                <p>Uploaded on <?php echo date('F j, Y', strtotime($material['uploaded_at'])); ?></p>
                                            </div>
                                            <div class="material-actions">
                                                <a href="<?php echo $material['material_file']; ?>" download class="download-btn">Download</a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else : ?>
                                <p>No materials uploaded for this course.</p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No courses found.</p>
                <?php endif; ?>
            </section>

        </div>
    </div>

    <script src="js/scripts.js"></script>
</body>

</html>