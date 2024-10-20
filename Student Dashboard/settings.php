<?php
// Start the session
session_start();

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Connect to the database
    include 'db_connection.php';

    // Handle profile update
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
        // Retrieve and sanitize input data
        $first_name = !empty($_POST['first_name']) ? htmlspecialchars(trim($_POST['first_name'])) : null;
        $last_name = !empty($_POST['last_name']) ? htmlspecialchars(trim($_POST['last_name'])) : null;
        $email = !empty($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : null;
        $phone = !empty($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : null;
        $profile_image = null;

        // Handle profile image upload if a file is provided
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['profile_image']['tmp_name'];
            $fileName = $_FILES['profile_image']['name'];
            $fileSize = $_FILES['profile_image']['size'];
            $fileType = $_FILES['profile_image']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            // Allowed file extensions
            $allowedfileExtensions = array('jpg', 'jpeg', 'png', 'gif');

            if (in_array($fileExtension, $allowedfileExtensions)) {
                // Sanitize file name and set a new name
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

                // Directory in which the uploaded file will be moved
                $uploadFileDir = '../uploads/';
                if (!is_dir($uploadFileDir)) {
                    mkdir($uploadFileDir, 0755, true);
                }
                $dest_path = $uploadFileDir . $newFileName;

                // Move the file
                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $profile_image = $dest_path;
                } else {
                    $error_message = "There was an error uploading the profile image.";
                }
            } else {
                $error_message = "Invalid file type for profile image. Allowed types: " . implode(', ', $allowedfileExtensions);
            }
        }

        // Fetch current user data to retain unupdated fields
        $stmt = $conn->prepare("SELECT first_name, last_name, email, phone, profile_image FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $current_user = $result->fetch_assoc();

        if ($current_user) {
            // Set updated values or retain existing ones
            $first_name = $first_name ?? $current_user['first_name'];
            $last_name = $last_name ?? $current_user['last_name'];
            $email = $email ?? $current_user['email'];
            $phone = $phone ?? $current_user['phone'];
            $profile_image = $profile_image ?? $current_user['profile_image'];

            // Update the database
            $update_stmt = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ?, profile_image = ? WHERE id = ?");
            $update_stmt->bind_param("sssssi", $first_name, $last_name, $email, $phone, $profile_image, $user_id);
            $update_stmt->execute();

            if ($update_stmt->affected_rows >= 0) { // >=0 to include cases where no change was made
                $success_message = "Profile updated successfully!";
            } else {
                $error_message = "Failed to update profile. Please try again.";
            }
        } else {
            $error_message = "user not found.";
        }
    }

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
        $profile_image = !empty($user['profile_image']) ? $user['profile_image'] : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMwAAADACAMAAAB/Pny7AAAAJFBMVEXd3d3////a2tro6Ojg4OD8/Pzw8PDl5eX19fX5+fnt7e3X19cEfWo1AAAJMElEQVR4nO2d67KjKhCFCQqKvv/7HgExRkFgdaPuqbN+TU3VNvkCNPQNxYdBupdSECRlrzm+h6A+QI3DTCJZeeZhVM/CKLMMCp1k5em1ofFQYNTYCTYUhyM60vDgMEozo6w4GsdBYZQe+FE8zgDjgDCtUALOjTDj0AokaBhvglHNURwOMNfqYaZm8+tXcmoOY9qtlRONME1h1F3DsuJMdXOtBkaN/Z0oVn2VIaiAUdPdKFY1g1MO094eRyUrrHQxzMR3oqyk6YvNWilM9wyJV8cL88wU2zQwwpjbrdhRfdGWUwIzPo1iVWIGCmD00xxeBSfpPMy9m35aBWe1LMwjO2VcWZoczItY8jQZmEe3l7MyG841TPeS9RIkr2kuYV42LlaXNFcwr1ovQVfr5gLmlSyXNGkY/bL1EiTTu2cS5hVnmLiSJ5sUjBleOjDWwUmdOhMw6r0s1vlMuNJxmGfc/XIlAgNxmLcu/qCEEYjCmKe/bF7RZROFedyxzKsvhXnY4S9TLCwQgXn7gvGKLZszjPoTLAvN2aKdYf7EJLM6T7QTzEvCFyU6TbQjzPMhsnKdjjVHmBf6Y2kdPbUDzP0ZGIqO2ZtfmBbnS7mK/cHnE+cvzMj5kXKexdBNWutxHPXUDb3kKBn6+YgxDWP4zPI899O5Dkbpjhdo+LEBPzBce7+8SncpxkKowzlgD8N1WM5Wi5iOz87sh2YPwzIwfVeUg5yYZvTP0OxgFMOjC1E+viyKRbuFuYMh5y5kXf3OgsNRD7mLo+1gyI/tawvFDEvuJwZDXjFdbanLx544yDi7VfOFIT5SYPV7hiHRcIahRTBlXZHLTgy1RdtHbzAkyy97QtErORC8BTcCDG3DLCw6SNFQt9CwWAMMyY+hsdDHJvg1AYbw40gqC3lswjxbYTT+NAYWauQhtEWsMPgsSycY6mhINq3bw+CODG6TDyJZ6NWt8TCEUWZpfPlQPXa9g4G34UxivkaUzWH9Gg4GnmVyYFkwXpQAhP8eDgafZVyTzEpRjml6g4EXH98ksyJEU71XY2HgzDKPVf4Kt89+vlsYeP/lHRhSqMvtEILyg5Db947Ck9zORbMw6JKp7wnJCW/NcYtGWCsC/j37wFCGplMOBjUi3CvGCjdo1hhZGGyWzcymzAufZx4GXP+yBQtuWa0FEOjGe1H2RRLIshzPlIXBRrbF8reCPavBwWB/S4nHXAmPB1gYbP0DjYeFgr0RY2Fm6E+ZHMyzUAswWxjMmMkmhtkKXTSLRRLgYabVksFPisvEF+A21TWDUdC0FzYUKbA5WtvbWiMUpodhGm2ZViCLg8HWfzNjhpszucC8zDLjZ835I7D11hIGtc2zEtieWdRp+D8M7m3O5t+CGf+dNTP+D/NS0wzDNDwBwD7AG2FQ7wyHaXdqhg+aMAx0+1CZYBdggQH3mXbOGZxAwzfN97nNFgYc1fcFNOzZDFxvjGnmg+Ds2Yw6Z6JBpskLTxZb5wz80zZJAFJ5FRoDEC3yZk44Sw+HmoQQ+S8GiFD4YkNNaCnBy5JN1iShEU1Br/+LiVbXIPAdt0WGhrD8l50PzQKIJlsNpYHHZQEI/Qzsq4bUue8yZ/g0fVG5iTv6CrimwYr5gEYqbXQJWlItESsLqSDYp87RogYnzmMAqXguFDUQiiOZ6oC9iD0vKwxl2fHFAojte4OHoTV9cE00RWsLcqk8UvGcE5NFIzYFbcVztLaCN5TP78oaaV3ApEagjYWGshY200qBvaLXptzL8i0FJj+LSsNw1cW3SJvcbU6baQwsu/J52t7raAhWgIFlDX17T558aVZ992wQz4VdfrfzMBxXZ2AFKDyXwq0dSWuMhaMDHHnLAtNFB+vpPTTQMTxR9rWDY7guhvltoGO6O6fqbUWK7dr0YH5CKI/rKpDyuTbxXT0RfMQAw3fTZFnnFuulg+EH3IKsfI+WWcNmOt47dTaGFj+VlINWcSClzCTQSF1C0wkGT/JEJRfbNhqjNqblX8aM9j1P3BcdfZsSvjDsdzPb+5mGzt1vpPVkrzfiBxE/gdUvTKPr82TDi6f8B6gIzOuuzS7TPuK9g6HEz57TPoe/z3/9xaH5SUX8XDz1F2FSF0/RfbTb9VuQ9HtZ25+6EdCqT1/WBkWvlh+g74dlQ8E1DH3vHlSrQ9nbL0xdZENaik4bliigWk4Hlqnq5zyEHg7Z/HInbTmvDJNmTgQaPQ01r4A9uE8HmNLWwOWgErm/kENqnIrfCHms4DvWWRSFNuwrPJvVm9nxKXvt6OlilVPRSIFbLmkvVy2QGkt2iVN++ASTTT5Lhtf4luBkY1DnMOq5nCdTsdGyCPhXmX0iUosYqU26mmjM+eWMLgcnUoQQK7R6w7B4XQ1O7ItH/i/ppnHfZpJX8oAVrUKKlsAlfhDO639KlTiTxKdIvJ4vahgbVsxfKFoNkyioSrwYJLL0GraZXiqS80i95iRRaWmOYeC7l/5ex1mfrAtJlY0eTpzzgyzLlzlEDVNfJlkDO72H5UiTLApJF/TuFt7c7FqGUk07mnTJ3kV18mYU29X9l+trXy/OIFel1oGmXeNPuTZH6+o8dVk37k3aE3vlWX73lJf1E5cwvmzq4cUfpEW2Tue6ot9tnkgWmV/2HdjJd4KtyrQn2DS9rEq7NpLNsWfvhsz1Wviig+dNsyi55zLbOOLu7X7aOPvvkDVE+S4YH4G+1cM8ahBlba4lLT3uLNCuMTMnH2IpmRtF/Um+UvAhM+COvGX3XJU1W43+gQ8MzlqnXLY7FHaOOV/86kUsjeSjZ6Wxh9I2OOe9om8yQKW0C9MW++vlPX2uBunWwXHDIvvyTa6iQTE8+6bBUfW/Xk235RpauGdwRn/mr/rp6lpHzV1OQTjw131QbR/s6r82PqxNmLde3dTrfRzZ7rZGu0fLvO8SE9Ch7N/uIGUbM620z2kifgfSbq38m72WXYd97Ri/s4geigVjveOm85Mt9pY5XGqc1scib0z6oDCL5Vxx+FK1IS1b8Xqxo/Cu/g2HY3jsoFBRKDALzuQKEFx5A2kjHddSBlfYSXgO7b4Fo309hS08AfPpahnhdVBkT5yy1MsjlOnkFgcear+M+b5Tbxadoc5Wjpswxm+5S/kK2laJ37RYXmPzHw7bZv1JdaUSAAAAAElFTkSuQmCC'; // Default image if none is set
    } else {
        // If no user is found, redirect to login or show an error
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
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="../img/licon.png" type="image/x-icon">
    <style>

/* Card Styling */
.card {
    background-color: #fff;
    padding: 25px;
    margin-top: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.card h3 {
    margin-bottom: 20px;
    color: #2c3e50;
}

.card img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    display: block;
    margin: 0 auto 20px auto;
    border: 3px solid #3498db;
}

.card p {
    margin: 10px 0;
    font-size: 16px;
}

.card p strong {
    color: #34495e;
}

/* Buttons Styling */
.btn {
    padding: 12px 25px;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    margin-right: 15px;
    font-size: 16px;
    transition: background 0.3s, transform 0.3s;
}

.btn-primary {
    background-color: #3498db;
    color: #fff;
}

.btn-primary:hover {
    background-color: #2980b9;
    transform: scale(1.05);
}

.btn-danger {
    background-color: #e74c3c;
    color: #fff;
}

.btn-danger:hover {
    background-color: #c0392b;
    transform: scale(1.05);
}

.btn-secondary {
    background-color: #95a5a6;
    color: #fff;
}

.btn-secondary:hover {
    background-color: #7f8c8d;
    transform: scale(1.05);
}

/* Modal Styling */
.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.6);
    transition: opacity 0.3s;
}

.modal-content {
    background-color: #fff;
    margin: 8% auto;
    padding: 30px;
    border-radius: 10px;
    width: 90%;
    max-width: 500px;
    position: relative;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    animation: fadeIn 0.3s;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-50px); }
    to { opacity: 1; transform: translateY(0); }
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.modal-header h5 {
    font-size: 22px;
    color: #2c3e50;
}

.close-btn {
    background: none;
    border: none;
    font-size: 28px;
    color: #7f8c8d;
    cursor: pointer;
    transition: color 0.3s;
}

.close-btn:hover {
    color: #e74c3c;
}

.modal-body form .mb-3 {
    margin-bottom: 20px;
}

.modal-body form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #34495e;
}

.modal-body form input {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #bdc3c7;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s;
}

.modal-body form input:focus {
    border-color: #3498db;
    outline: none;
}

.modal-footer {
    text-align: right;
}

.modal-footer .btn {
    margin-left: 10px;
}

/* Notification Messages */
.message {
    padding: 15px 20px;
    margin-top: 20px;
    border-radius: 5px;
    font-size: 16px;
    text-align: center;
}

.success {
    background-color: #2ecc71;
    color: #fff;
}

.error {
    background-color: #e74c3c;
    color: #fff;
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
                <h2>Settings Overview</h2>
                <div class="user-wrapper">
                    <img src="<?php echo $profile_image; ?>" alt="User Image" style="width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;">
                    <div>
                        <h4><?php echo htmlspecialchars($first_name . ' ' . $last_name); ?></h4>
                        <small>Super user</small>
                    </div>
                </div>
            </header>

            <!-- Notification Messages -->
            <?php if (isset($success_message)): ?>
                <div class="message success"><?php echo $success_message; ?></div>
            <?php endif; ?>
            <?php if (isset($error_message)): ?>
                <div class="message error"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <!-- User Info Card -->
            <div class="card">
                <h3>User Information</h3>
                <img src="<?php echo $profile_image; ?>" alt="User Image" style="width: 200px; height: 200px; border-raduis: 50%; object-fit: cover;">
                <p><strong>First Name:</strong> <?php echo htmlspecialchars($first_name); ?></p>
                <p><strong>Last Name:</strong> <?php echo htmlspecialchars($last_name); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></p>
                <p><strong>Role:</strong> Super user</p>
            </div>

            <!-- Settings Buttons -->
            <div style="margin-top: 20px;">
                <button class="btn btn-primary" id="editProfileBtn">Edit Profile</button>
                <button class="btn btn-secondary" id="changePasswordBtn">Change Password</button>
                <button class="btn btn-danger" onclick="logout()">Logout</button>
            </div>

            <!-- Edit Profile Modal -->
            <div class="modal" id="editModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Edit Profile</h5>
                        <button class="close-btn" id="closeEditModal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="dashboard.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="update_profile" value="1">
                            <div class="mb-3">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" value="<?php echo htmlspecialchars($first_name); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" value="<?php echo htmlspecialchars($last_name); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($phone); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="profile_image">Profile Image</label>
                                <input type="file" name="profile_image" id="profile_image" accept="image/*">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="closeEditModalFooter">Close</button>
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Change Password Modal -->
            <div class="modal" id="changePasswordModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Change Password</h5>
                        <button class="close-btn" id="closeChangePasswordModal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="change_password.php" method="POST">
                            <div class="mb-3">
                                <label for="current_password">Current Password</label>
                                <input type="password" name="current_password" id="current_password" required>
                            </div>
                            <div class="mb-3">
                                <label for="new_password">New Password</label>
                                <input type="password" name="new_password" id="new_password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password">Confirm New Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="closeChangePasswordModalFooter">Close</button>
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Logout Function -->
            <script>
                function logout() {
                    if (confirm("Are you sure you want to logout?")) {
                        window.location.href = "logout.php";
                    }
                }

                // Toggle Sidebar (for mobile)
                const toggleBtn = document.getElementById('toggle-btn');
                const sidebar = document.querySelector('.sidebar');

                toggleBtn.addEventListener('click', () => {
                    sidebar.classList.toggle('hidden');
                });

                // Edit Profile Modal
                const editProfileBtn = document.getElementById('editProfileBtn');
                const editModal = document.getElementById('editModal');
                const closeEditModal = document.getElementById('closeEditModal');
                const closeEditModalFooter = document.getElementById('closeEditModalFooter');

                editProfileBtn.addEventListener('click', () => {
                    editModal.style.display = 'block';
                });

                closeEditModal.addEventListener('click', () => {
                    editModal.style.display = 'none';
                });

                closeEditModalFooter.addEventListener('click', () => {
                    editModal.style.display = 'none';
                });

                // Change Password Modal
                const changePasswordBtn = document.getElementById('changePasswordBtn');
                const changePasswordModal = document.getElementById('changePasswordModal');
                const closeChangePasswordModal = document.getElementById('closeChangePasswordModal');
                const closeChangePasswordModalFooter = document.getElementById('closeChangePasswordModalFooter');

                changePasswordBtn.addEventListener('click', () => {
                    changePasswordModal.style.display = 'block';
                });

                closeChangePasswordModal.addEventListener('click', () => {
                    changePasswordModal.style.display = 'none';
                });

                closeChangePasswordModalFooter.addEventListener('click', () => {
                    changePasswordModal.style.display = 'none';
                });

                // Close modals when clicking outside
                window.addEventListener('click', (event) => {
                    if (event.target == editModal) {
                        editModal.style.display = 'none';
                    }
                    if (event.target == changePasswordModal) {
                        changePasswordModal.style.display = 'none';
                    }
                });
            </script>
        </div>
    </div>
</body>

</html>