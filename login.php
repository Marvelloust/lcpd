<?php
$loginMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    include 'db_connection.php';

    // Input validation and sanitization
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    // Validate inputs
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $loginMessage = "Invalid email format.";
    } else {
        // Check if user exists and verify password
        $sql = "SELECT id, first_name, password FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $first_name, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                // Store user info in session
                $_SESSION['user_id'] = $id;
                $_SESSION['first_name'] = $first_name;

                // Redirect to dashboard
                header("Location: Student Dashboard/index.php");
                exit;
            } else {
                $loginMessage = "Incorrect password.";
            }
        } else {
            $loginMessage = "No user found with this email.";
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
    <title>Login</title>
    <link rel="stylesheet" href="css/forms.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </form>
        <div class="message">
            <?php echo $loginMessage; ?>
        </div>
    </div>
</body>
</html>
