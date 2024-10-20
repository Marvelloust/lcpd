<?php
$signupMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    include 'db_connection.php';

    // Sanitize and validate input fields
    $first_name = filter_var(trim($_POST['first_name']), FILTER_SANITIZE_STRING);
    $last_name = filter_var(trim($_POST['last_name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    // Handle profile image upload
    $profile_image = $_FILES['profile_image'];
    $image_name = $profile_image['name'];
    $image_tmp_name = $profile_image['tmp_name'];
    $image_size = $profile_image['size'];
    $image_error = $profile_image['error'];
    $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

    // Define allowed file extensions
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

    // Validate the image file
    if (!in_array($image_ext, $allowed_extensions)) {
        $signupMessage = "Invalid image file type. Only JPG, JPEG, PNG, and GIF are allowed.";
    } elseif ($image_error !== 0) {
        $signupMessage = "There was an error uploading the image.";
    } elseif ($image_size > 5000000) { // Limit file size to 5MB
        $signupMessage = "Image file is too large. Max size is 5MB.";
    } else {
        // Generate unique name for the image
        $image_new_name = uniqid('', true) . "." . $image_ext;
        $image_destination = './uploads/' . $image_new_name;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($image_tmp_name, $image_destination)) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Check if the email or phone already exists
            $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ? OR phone = ?");
            $stmt->bind_param("ss", $email, $phone);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $admin = $result->fetch_assoc();
                if ($admin['email'] == $email) {
                    $signupMessage = "Email is already in use.";
                } elseif ($admin['phone'] == $phone) {
                    $signupMessage = "Phone number is already in use.";
                }
            } else {
                // Insert the new admin with the profile image
                $stmt = $conn->prepare("INSERT INTO admins (first_name, last_name, email, phone, password, profile_image) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $first_name, $last_name, $email, $phone, $hashed_password, $image_new_name);

                if ($stmt->execute()) {
                    $signupMessage = "Signup successful!";
                } else {
                    $signupMessage = "Error: " . $stmt->error;
                }
            }

            $stmt->close();
        } else {
            $signupMessage = "Failed to move the uploaded image.";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/forms.css">
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="signup.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="file" name="profile_image" accept="image/*" required>
            <input type="submit" value="Sign Up">
            <p>Already have an account? <a href="login.php">Login In</a></p>
        </form>
        <div class="message">
            <?php echo $signupMessage; ?>
        </div>
    </div>
</body>
</html>
