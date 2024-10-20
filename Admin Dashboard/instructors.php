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
        $first_name = htmlspecialchars($admin['first_name'], ENT_QUOTES, 'UTF-8');
        $last_name = htmlspecialchars($admin['last_name'], ENT_QUOTES, 'UTF-8');
        // Check if the profile image exists; if not, use a default image
        $profile_image = !empty($admin['profile_image']) ? '../uploads/' . htmlspecialchars($admin['profile_image'], ENT_QUOTES, 'UTF-8') : 'data:image/png;base64,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'; // Default image if none is set
    } else {
        // If no admin is found, redirect to login or show an error
        header("Location: login.php");
        exit();
    }
} else {
    // If no session is set, redirect to login
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
    <!-- Optional: Include Google Fonts for better typography -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
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
                <h2>Instructors Overview</h2>
                <div class="user-wrapper">
                    <img src="<?php echo !empty($admin['profile_image']) ? htmlspecialchars($profile_image, ENT_QUOTES, 'UTF-8') : $profile_image; ?>" alt="User Image" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                    <div>
                        <h4><?php echo $first_name . ' ' . $last_name; ?></h4>
                        <small>Super Admin</small>
                    </div>
                </div>
            </header>

            <div class="instructors-container">
                <button class="instructor-btn" id="toggle-view-btn" style="margin-bottom: 20px;">Toggle View</button>
                <div class="instructors-table" id="instructors-table">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="instructors-tbody">
                            <?php
                            // Fetch instructors from database
                            $stmt = $conn->prepare("SELECT id, name, email, phone FROM instructors");
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($instructor = $result->fetch_assoc()) {
                                echo '<tr id="instructor-' . htmlspecialchars($instructor['id'], ENT_QUOTES, 'UTF-8') . '">';
                                echo '<td>' . htmlspecialchars($instructor['id'], ENT_QUOTES, 'UTF-8') . '</td>';
                                echo '<td>' . htmlspecialchars($instructor['name'], ENT_QUOTES, 'UTF-8') . '</td>';
                                echo '<td>' . htmlspecialchars($instructor['email'], ENT_QUOTES, 'UTF-8') . '</td>';
                                echo '<td>' . htmlspecialchars($instructor['phone'], ENT_QUOTES, 'UTF-8') . '</td>';
                                echo '<td><button class="submit-btn" data-id="' . htmlspecialchars($instructor['id'], ENT_QUOTES, 'UTF-8') . '">Edit</button> <button class="delete-btn" data-id="' . htmlspecialchars($instructor['id'], ENT_QUOTES, 'UTF-8') . '">Delete</button></td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <section class="upload-form-section" id="instructors-form" style="display: none;">
                    <form id="add-instructor-form">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" id="phone" name="phone" required>
                        </div>
                        <button type="submit" class="submit-btn">Add Instructor</button>
                    </form>
                </section>
            </div>

            <div class="error-message" id="error-message" style="color: red;"></div>
            <div class="success-message" id="success-message" style="color: green;"></div>

        </div>
    </div>

    <script src="js/scripts.js"></script>
    <script>
        // Toggle view button
        document.getElementById('toggle-view-btn').addEventListener('click', function() {
            var table = document.getElementById('instructors-table');
            var form = document.getElementById('instructors-form');

            if (table.style.display === 'none') {
                table.style.display = 'block';
                form.style.display = 'none';
            } else {
                table.style.display = 'none';
                form.style.display = 'block';
            }
        });

        // Handle form submission using AJAX
        document.getElementById('add-instructor-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            var name = document.getElementById('name').value.trim();
            var email = document.getElementById('email').value.trim();
            var phone = document.getElementById('phone').value.trim();

            if (name === '' || email === '' || phone === '') {
                document.getElementById('error-message').innerText = 'All fields are required.';
                document.getElementById('success-message').innerText = '';
                return;
            }

            // Prepare data for POST
            var formData = new FormData();
            formData.append('name', name);
            formData.append('email', email);
            formData.append('phone', phone);

            // Send AJAX request to add_instructor.php
            fetch('add_instructor.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('success-message').innerText = data.message;
                    document.getElementById('error-message').innerText = '';

                    // Optionally, append the new instructor to the table
                    var tbody = document.getElementById('instructors-tbody');
                    var newRow = document.createElement('tr');
                    newRow.id = 'instructor-' + data.instructor.id;
                    newRow.innerHTML = `
                        <td>${data.instructor.id}</td>
                        <td>${data.instructor.name}</td>
                        <td>${data.instructor.email}</td>
                        <td>${data.instructor.phone}</td>
                        <td><button class="edit-btn" data-id="${data.instructor.id}">Edit</button> <button class="delete-btn" data-id="${data.instructor.id}">Delete</button></td>
                    `;
                    tbody.appendChild(newRow);

                    // Reset the form
                    document.getElementById('add-instructor-form').reset();
                } else {
                    document.getElementById('error-message').innerText = data.message;
                    document.getElementById('success-message').innerText = '';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('error-message').innerText = 'An error occurred while adding the instructor.';
                document.getElementById('success-message').innerText = '';
            });
        });
    </script>
</body>

</html>
