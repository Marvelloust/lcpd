<?php
// Start the session
session_start();

// Assuming you have stored the user's ID in the session during login
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Connect to the database
    include 'db_connection.php';

    // Fetch the logged-in user's details from the database
    $stmt = $conn->prepare("SELECT first_name, last_name, profile_image FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // If the user is found
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];
        // Check if the profile image exists; if not, use a default image
        $profile_image = !empty($user['profile_image']) ? $user['profile_image'] : 'data:image/png;base64,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'; // Default image if none is set
    } else {
        // If no user is found, redirect to login or show an error
        header("Location: ../login.php");
        exit();
    }
} else {
    // If no session is set, redirect to login
    header("Location: ../login.php");
    exit();
}

// Include the database connection file
include 'db_connection.php';

// Get the assignment ID from the URL
$assignment_id = isset($_GET['assignment_id']) ? $_GET['assignment_id'] : null;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_answer'])) {
    // Get the submitted answer
    $answer = $_POST['answer'];
    $assignment_id = $_POST['assignment_id'];

    // Insert the answer into the database
    $stmt = $conn->prepare("INSERT INTO answers (user_id, assignment_id, answer) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $assignment_id, $answer);
    $stmt->execute();

    // Redirect to the dashboard
    header("Location: assignment.php");
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
    <link rel="stylesheet" href="css/courses.css">
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
            <?php
            // Check if the assignment ID is set
            if ($assignment_id) {
                // Check if the user has already submitted an answer for the assignment
                $stmt = $conn->prepare("SELECT * FROM answers WHERE user_id = ? AND assignment_id = ?");
                $stmt->bind_param("is", $user_id, $assignment_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // If the user has already submitted an answer, display an error message
                    echo '<p>Error: You have already submitted an answer for this assignment.</p>';
                } else {
                    // If the user has not submitted an answer, display the form
            ?>
                    <section class="upload-form-section" id="upload-form-section">
                        <h2>Submit Answer for Assignment <?php echo htmlspecialchars($assignment_id); ?></h2>
                        <form action="" method="post">
                            <div class="form-group">
                                <textarea name="answer" placeholder="Enter your answer here..."></textarea>
                            </div>
                            <input type="hidden" name="assignment_id" value="<?php echo htmlspecialchars($assignment_id); ?>">
                            <button type="submit" name="submit_answer">Submit Answer</button>
                        </form>
                    </section>
            <?php
                }
            } else {
                // Display an error message if the assignment ID is not set
                echo '<p>Error: Assignment ID not found.</p>';
            }
            ?>
        </div>
    </div>
</body>

</html>