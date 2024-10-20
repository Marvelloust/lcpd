<?php
// Start the session
session_start();

// Assuming you have stored the admin's ID in the session during login
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];

    // Connect to the database
    include 'db_connection.php';

    // Get the assignment ID, user ID, and grade from the form
    $assignment_id = $_POST['assignment_id'];
    $user_id = $_POST['user_id'];
    $grade = $_POST['grade'];

// Check if the grade ID is set
if (isset($_POST['grade_id'])) {
    // Update the grade in the database
    $stmt = $conn->prepare("UPDATE grades SET grade = ? WHERE id = ?");
    $stmt->bind_param("ii", $_POST['grade'], $_POST['grade_id']);
    $stmt->execute();
} else {
    // Insert the grade into the database
    $stmt = $conn->prepare("INSERT INTO grades (assignment_id, user_id, grade) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $_POST['assignment_id'], $_POST['user_id'], $_POST['grade']);
    $stmt->execute();
}

    // Redirect to the view submissions page
    header("Location: view_submissions.php?assignment_id=" . $assignment_id);
    exit();
} else {
    // Redirect to the login page if the admin is not logged in
    header("Location: login.php");
    exit();
}
?>